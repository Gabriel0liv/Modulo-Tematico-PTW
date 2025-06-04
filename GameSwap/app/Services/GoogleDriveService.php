<?php

namespace App\Services;

use Google\Client as GoogleClient;
use Google\Service\Drive as GoogleDrive;
use Google\Service\Drive\DriveFile;
use GuzzleHttp\Client;

class GoogleDriveService
{
    protected $client; // Instância do Google Client
    protected $driveClient; // Instância da API Drive

    public function __construct()
    {
        // Inicializa o cliente do Google
        $this->client = new GoogleClient();
        $this->client->setClientId(env('GOOGLE_CLIENT_ID'));
        $this->client->setClientSecret(env('GOOGLE_CLIENT_SECRET'));
        $this->client->setAccessToken($this->refreshAccessToken());

        // Inicializa o serviço da API Google Drive
        $this->driveClient = new GoogleDrive($this->client);
    }

    /**
     * Atualiza o token de acesso usando o refresh_token do Google
     *
     * @return string
     */
    public function refreshAccessToken()
    {
        try {
            $httpClient = new Client();
            $response = $httpClient->post('https://oauth2.googleapis.com/token', [
                'form_params' => [
                    'client_id' => env('GOOGLE_CLIENT_ID'),
                    'client_secret' => env('GOOGLE_CLIENT_SECRET'),
                    'refresh_token' => env('GOOGLE_REFRESH_TOKEN'),
                    'grant_type' => 'refresh_token',
                ],
            ]);
            $data = json_decode($response->getBody(), true);

            if (!isset($data['access_token'])) {
                throw new \Exception('Falha ao obter o token de acesso do Google OAuth.');
            }

            return $data['access_token'];
        } catch (\Throwable $e) {
            \Log::error('Erro ao renovar token de acesso: ', ['erro' => $e->getMessage()]);
            throw new \Exception('Erro ao renovar token de acesso: ' . $e->getMessage()); // Para debug
        }

    }

    /**
     * Realiza o upload de um arquivo para o Google Drive na estrutura correta.
     *
     * @param string $filePath Caminho do arquivo no sistema
     * @param string $fileName Nome do arquivo no Google Drive
     * @param int $parentId Identificador do objeto pai (como ID do jogo, console ou usuário)
     * @param string $parentFolderName Nome da pasta principal (como 'jogos', 'consoles' ou 'users')
     * @return string URL pública do arquivo no Google Drive
     */

    public function upload($filePath, $fileName, $parentId, $parentFolderName)
    {
        // Obter ou criar a pasta principal (jogos, consoles, users, etc.)
        $parentFolderId = $this->ensureParentFolder($parentFolderName);

        // Verificar ou criar subpasta específica: jogos/{id}, consoles/{id}, users/{id}
        $subFolderId = $this->ensureSubFolder($parentId, $parentFolderId);

        // Enviar o arquivo para o Google Drive
        $fileMetadata = new DriveFile([
            'name' => $fileName,
            'parents' => [$subFolderId],
        ]);
        $content = file_get_contents($filePath);

        $uploadedFile = $this->driveClient->files->create($fileMetadata, [
            'data' => $content,
            'uploadType' => 'multipart',
            'fields' => 'id',
        ]);

        return "https://drive.google.com/uc?id=" . $uploadedFile->id;
    }


    private function ensureParentFolder($parentFolderName)
    {
        // Obtém o ID da pasta raiz a partir do .env
        $rootFolderId = env('GOOGLE_DRIVE_FOLDER_ID');

        // Busca pela pasta principal dentro da pasta raiz
        $folders = $this->driveClient->files->listFiles([
            'q' => "'$rootFolderId' in parents and name = '$parentFolderName' and mimeType = 'application/vnd.google-apps.folder'",
            'fields' => 'files(id, name)',
        ]);

        if (count($folders->getFiles()) > 0) {
            return $folders->getFiles()[0]->getId();
        }

        // Cria a pasta principal dentro da pasta raiz
        $folderMetadata = new DriveFile([
            'name' => $parentFolderName,
            'parents' => [$rootFolderId],
            'mimeType' => 'application/vnd.google-apps.folder',
        ]);

        $createdFolder = $this->driveClient->files->create($folderMetadata, ['fields' => 'id']);
        return $createdFolder->getId();
    }



    /**
     * Garante a existência de uma subpasta específica. Se não existir, será criada.
     *
     * @param int|string $subFolderName Nome ou ID da subpasta (ex.: user ID, jogo ID, etc.)
     * @param string $parentFolderId ID da pasta principal no Google Drive
     * @return string ID da subpasta no Google Drive
     */
    private function ensureSubFolder($subFolderName, $parentFolderId)
    {
        // Busca pela subpasta dentro da pasta principal
        $folders = $this->driveClient->files->listFiles([
            'q' => "'$parentFolderId' in parents and name = '$subFolderName' and mimeType = 'application/vnd.google-apps.folder'",
            'fields' => 'files(id, name)',
        ]);

        if (count($folders->getFiles()) > 0) {
            return $folders->getFiles()[0]->getId();
        }

        // Cria a subpasta caso não exista
        $folderMetadata = new DriveFile([
            'name' => $subFolderName,
            'parents' => [$parentFolderId],
            'mimeType' => 'application/vnd.google-apps.folder',
        ]);
        $createdFolder = $this->driveClient->files->create($folderMetadata, ['fields' => 'id']);

        return $createdFolder->getId();
    }

    /**
     * Deleta um arquivo do Google Drive pelo URL.
     *
     * @param string $fileUrl URL pública do arquivo no Google Drive.
     * @return void
     * @throws \Exception
     */
    public function delete($fileUrl)
    {
        // Obter o ID do arquivo a partir da URL
        if (preg_match('/\?id=([a-zA-Z0-9\-_]+)/', $fileUrl, $matches)) {
            $fileId = $matches[1];
        } else if (preg_match('/\/d\/([a-zA-Z0-9\-_]+)/', $fileUrl, $matches)) {
            $fileId = $matches[1];
        } else {
            throw new \Exception('Não foi possível extrair o ID do arquivo do URL fornecido.');
        }

        // Deletar o arquivo do Google Drive
        try {
            $this->driveClient->files->delete($fileId);
            Log::info('Arquivo deletado do Google Drive com sucesso.', ['file_id' => $fileId]);
        } catch (\Throwable $e) {
            Log::error('Erro ao deletar arquivo do Google Drive.', [
                'file_id' => $fileId,
                'error' => $e->getMessage(),
            ]);
            throw new \Exception('Erro ao deletar arquivo do Google Drive.');
        }
    }

}

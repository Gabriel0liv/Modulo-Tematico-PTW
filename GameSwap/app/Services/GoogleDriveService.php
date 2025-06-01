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
            throw new \Exception('Erro ao renovar o token de acesso: ' . $e->getMessage());
        }
    }

    /**
     * Realiza o upload de um arquivo para o Google Drive
     *
     * @param string $filePath Caminho do arquivo no sistema
     * @param string $fileName Nome do arquivo no Google Drive
     * @param int $consoleId ID do console (para criar uma pasta específica)
     * @return string URL do arquivo no Google Drive
     */
    public function upload($filePath, $fileName, $consoleId, $parentFolderName)
    {
        // Localiza ou cria a pasta principal (ex.: "consoles")
        $parentFolderId = $this->ensureParentFolder($parentFolderName);

        // Verifica ou cria a pasta do console dentro da pasta principal
        $consoleFolderId = $this->ensureConsoleFolder($consoleId, $parentFolderId);

        // Faz o upload do arquivo para a pasta do console
        $fileMetadata = new DriveFile([
            'name' => $fileName,
            'parents' => [$consoleFolderId],
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
        // Busca a pasta principal pelo nome
        $folders = $this->driveClient->files->listFiles([
            'q' => "name = '$parentFolderName' and mimeType = 'application/vnd.google-apps.folder'",
            'fields' => 'files(id, name)',
        ]);

        if (count($folders->getFiles()) > 0) {
            return $folders->getFiles()[0]->getId();
        }

        // Cria a pasta principal se não existir
        $folderMetadata = new DriveFile([
            'name' => $parentFolderName,
            'mimeType' => 'application/vnd.google-apps.folder',
        ]);

        $createdFolder = $this->driveClient->files->create($folderMetadata, ['fields' => 'id']);
        return $createdFolder->getId();
    }


    /**
     * Garante que a pasta do console existe no Google Drive
     *
     * @param int $consoleId ID do console
     * @param string $parentFolderId ID da pasta principal no Google Drive
     * @return string ID da pasta do console
     */
    private function ensureConsoleFolder($consoleId, $parentFolderId)
    {
        // Busca a pasta com o ID do console
        $folders = $this->driveClient->files->listFiles([
            'q' => "'$parentFolderId' in parents and name = '$consoleId' and mimeType = 'application/vnd.google-apps.folder'",
            'fields' => 'files(id, name)',
        ]);

        if (count($folders->getFiles()) > 0) {
            return $folders->getFiles()[0]->getId();
        }

        // Cria a pasta do console se não existir
        $folderMetadata = new DriveFile([
            'name' => $consoleId,
            'parents' => [$parentFolderId],
            'mimeType' => 'application/vnd.google-apps.folder',
        ]);

        $createdFolder = $this->driveClient->files->create($folderMetadata, ['fields' => 'id']);
        return $createdFolder->getId();
    }
}

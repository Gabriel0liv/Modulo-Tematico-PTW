<?php

namespace App\Services;

use Google_Client;
use Google_Service_Drive;
use Google_Service_Drive_DriveFile;

class GoogleDriveService
{
    protected $client;
    protected $service;

    public function __construct()
    {
        $this->client = new Google_Client();
        $this->client->setClientId(env('GOOGLE_CLIENT_ID'));
        $this->client->setClientSecret(env('GOOGLE_CLIENT_SECRET'));
        $this->client->refreshToken(env('GOOGLE_REFRESH_TOKEN'));
        $this->client->setScopes(['https://www.googleapis.com/auth/drive.file']);

        $this->service = new Google_Service_Drive($this->client);
    }

    public function upload($filePath, $fileName)
    {
        $file = new Google_Service_Drive_DriveFile();
        $file->setName($fileName);
        $file->setParents([env('GOOGLE_DRIVE_FOLDER_ID')]);

        $content = file_get_contents($filePath);

        $uploadedFile = $this->service->files->create($file, [
            'data' => $content,
            'mimeType' => mime_content_type($filePath),
            'uploadType' => 'multipart',
        ]);

        return "https://drive.google.com/uc?id=" . $uploadedFile->id;
    }
}

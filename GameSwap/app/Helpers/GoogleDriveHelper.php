<?php

namespace App\Helpers;

class GoogleDriveHelper
{
    public static function transformGoogleDriveUrl($url)
    {
        // Verifica pelo padrão "/d/{id}/"
        if (preg_match('/\/d\/(.+?)\//', $url, $matches)) {
            return url("/imagem-proxy/{$matches[1]}");
        }

        // Verifica pelo padrão "uc?id={id}"
        if (preg_match('/uc\?id=([a-zA-Z0-9\-_]+)/', $url, $matches)) {
            return url("/imagem-proxy/{$matches[1]}");
        }

        // Retorna a URL original caso não seja compatível
        return $url;
    }


}

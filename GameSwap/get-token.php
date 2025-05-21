<?php
require 'vendor/autoload.php';

$client = new Google_Client();
$client->setClientId('1011581317601-mnjhbm8f4kms5negsu0brstd5j3proav.apps.googleusercontent.com');
$client->setClientSecret('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');
$client->setRedirectUri('urn:ietf:wg:oauth:2.0:oob');
$client->setScopes(['https://www.googleapis.com/auth/drive']);
$client->setAccessType('offline');
$client->setPrompt('consent');

$authUrl = $client->createAuthUrl();
echo "Abra este link no seu navegador:\n$authUrl\n\n";

echo "Cole o código de autenticação aqui e pressione Enter:\n";
$authCode = trim(fgets(STDIN));

$accessToken = $client->fetchAccessTokenWithAuthCode($authCode);

if (isset($accessToken['refresh_token'])) {
    echo "==== SEU REFRESH TOKEN ====\n";
    echo $accessToken['refresh_token'] . "\n";
    echo "===========================\n";
} else {
    echo "Erro ao obter o refresh token. Detalhes:\n";
    print_r($accessToken);
}

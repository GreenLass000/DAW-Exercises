<?php
require_once 'vendor/autoload.php';
$client = new Google_Client();
try {
    $client->setAuthConfig('claves.json');
} catch (\Google\Exception $e) {
}
// Parámetros para conseguir permisos sin el usuario presente
$client->setAccessType('offline');
$client->setApprovalPrompt('force');
// En este caso solicitamos permisto para el email y el perfil
// Más en https://developers.google.com/identity/protocols/googlescopes
$client->addScope("email");
$client->addScope("profile");
// URL que tenemos autorizada en nuestro proyecto Google
$client->setRedirectUri('http://localhost/DAW-Exercises/Proyectos/Daw2023/inicio.php');
// Comprobamos si se ha identificado con anterioridad
if (!isset($_GET['code'])) { //Como no lo ha hecho redirigimos a Google
    echo "<a href='" . $client->createAuthUrl() . "'>Login en Google</a>";
} else { //Ya está autenticado
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token['access_token']);
    // Guardamos el token para otros accesos
    $google_oauth = new Google_Service_Oauth2($client);
    $google_account_info = $google_oauth->userinfo->get();
    $email = $google_account_info->email;
    $name = $google_account_info->name;
    echo $name . " - " . $email;
} // El resto del código ya tiene al usuario logueado

echo time();
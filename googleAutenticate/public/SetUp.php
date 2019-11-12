<?php

/*Configuraciones adiconales */
require_once 'relativeTime.php';

/**************Google API****************/
// Apis google
require_once 'sdk-google/apiClient.php';
require_once 'sdk-google/contrib/apiOauth2Service.php';
// Google API. obtenemos configuraciones de https://code.google.com/apis/console/
$redirect_url = 'http://localhost/crimeMap/html/profile.html'; // redirect url
$client_id = '249604237589-kfkc1kc4cuq1rc3cuunok36d8vlcmm88.apps.googleusercontent.com';
$client_secret = 'muDmAKUDJH4CQyynvk6qUAXP';
$api_key = 'AIzaSyAcPXPXaOSPKgexntLpqHF_LpV298tlItI'; //api key 1
/************end google api***************/

//Utilizamos la clase ORM de idiorm class
ORM::configure("mysql:host=".DB_HOST.";dbname=".DB_NAME);
ORM::configure('username', DB_USER);
ORM::configure('password', DB_PASS);
// cambiamos el juego de caracteres
ORM::configure('driver_options', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES '.DB_CHARSET));

?>

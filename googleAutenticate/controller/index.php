<?php
$client = new apiClient();
$client->setApplicationName("LabMapaDelito");

$client->setClientId($client_id);
$client->setClientSecret($client_secret);
$client->setDeveloperKey($api_key);
$client->setRedirectUri($redirect_url);
$client->setApprovalPrompt(false);
$oauth2 = new apiOauth2Service($client);

if (isset($_GET['code'])) {
	$client->authenticate();

	$info = $oauth2->userinfo->get();
	$person = ORM::for_table('google_users')->where('email', $info['email'])->find_one();

	if(!$person){
		print('entra aca');
		$person = ORM::for_table('google_users')->create();

		$person->email = $info['email'];
		$person->name = $info['name'];

		if(isset($info['picture'])){
			$person->photo = $info['picture'];
		}
		
		else{
			// caso contrario usamos el predeterminado del sistema
			$person->photo = 'view/assets/img/usuario.jpg';
		}

		// grabamos al usuario en la dB
		$person->save();
	}

	// guaradamos la sesion de usuario
	$_SESSION['demo_sesion_google'] = $person->id();

	// redireccionamos a la url especificada
	header("Location: $redirect_url");
	exit;
}

$person = null;
require_once('view/inc/header.php');

if(isset($_SESSION['demo_sesion_google'])){
	// obtenemos datos de usuario de la base de datos con el id del usuario de google session
	$person = ORM::for_table('google_users')->find_one($_SESSION['demo_sesion_google']);
  require_once('view/index.php');
}else{
  require_once('view/inc/nosesion.php');

}
?>

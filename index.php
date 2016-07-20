<?php
header('Content-Type: text/html; charset=UTF8');

include_once ('model/sessiongest.php');
include_once ('model/operation.php');

unset($_SESSION['post_id']);

//control de la direction et et d'un utilisateur valide
if (isset($_GET['p'])&& session::connected()){
	$page=$_GET['p'];

} else {

	$page= 'acceuil';
}


switch ($page) {

	case 'post':
		$post=$user->lire($_GET['id']);
		$compost=$user->chargecom($_GET['id']);
		$_SESSION['post_id']=$_GET['id'];
		include_once ('templates/post.php');
		break;

	case 'profil':
		$resultats=$user->charge($_SESSION['user']['id']);
		$com=$user->chargeComUser();
		include_once ('templates/profil.php');
		break;

	case 'listpost':
		$resultats=$user->charge();
		include_once ('templates/acceuilpost.php');
		break;

	case 'nouveau':
		include_once ('templates/nouveau.php');
		break;

	default:
		session::endSession();
		include_once ('templates/accueil.php');
		break;

}

?>
<?php
//session_start();
include_once ('../model/sessiongest.php');
include_once ('../model/operation.php');


if (!empty($_POST)) {

	$username = escapeHtml($_POST['username']);
	$password = escapeHtml($_POST['password']);

	if(!empty($username) && !empty($password)){
	    $user->connect($username,$password);

	    die();
	}else {
		$_SESSION['tableErreur']['connect']='Les champs username et password doivent etre rempli de maniére correct, merci de réessayer';
		header('location: ../index.php?p=accueil');
		die();
	}

}



?>





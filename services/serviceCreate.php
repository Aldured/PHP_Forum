<?php
//session_start();
include_once ('../model/sessiongest.php');
include_once ('../model/operation.php');


if (!empty($_POST)) {

	$username = escapeHtml($_POST['username']);
	$password = escapeHtml($_POST['password']);
	$name = escapeHtml($_POST['name']);
	$firstname = escapeHtml($_POST['firstname']);
	$email =escapeHtml($_POST['email']);
	$info =escapeHtml( $_POST['info']);

	if (!preg_match("#^[A-Za-z0-9_-]{3,16}$#", "$username")){
		$_SESSION['tableErreur']['user']='Attention un username doit contenir entre 3 et 16 caracteres alphanumerique,merci de saisir un nouvel username avec un format correcte';
	}

	if (!preg_match("#^[A-Za-z0-9_-]{3,16}$#", "$password")){
		$_SESSION['tableErreur']['password']='Attention un password doit contenir entre 3 et 16 caracteres alphanumerique,merci de saisir un nouveau password avec un format correcte';
	}

	if (!preg_match("#^[A-Za-z0-9_-]{1,24}$#", "$name")){
		$_SESSION['tableErreur']['named']='Attention un name doit contenir jusqu\'a 24 caracteres alphanumerique,merci de saisir un nouveau name avec un format correcte';
	}

	if (!preg_match("#^[A-Za-z0-9_-]{1,24}$#", "$firstname")){
		$_SESSION['tableErreur']['firstname']='Attention un firstname doit contenir jusqu\'a 24 caracteres alphanumerique,merci de saisir un nouveau firstname avec un format correcte';
	}

	if (!preg_match("#[A-Za-z0-9_-]+@[A-Za-z0-9_-]+\.[A-Za-z0-9_-]#", "$email")){
		$_SESSION['tableErreur']['email']='Attention votre email n\'est pas valide,merci de saisir un email valide';
	}

	if (!preg_match("#[A-Za-z0-9_-]#", "$info")){
		$_SESSION['tableErreur']['info']='Attention vos info ne peuvent contenir que des caracteres alphanumerique,merci de resaisir vos info';
	}

	if (!empty($_SESSION['tableErreur'])) {
		header('location: ../index.php?p=accueil');
		die();
	}

	$res_cre=$user->create($username,$password,$name,$firstname,$email,$info);

	if ($res_cre) {
		$user->connect($username,$password);

	}

}
?>
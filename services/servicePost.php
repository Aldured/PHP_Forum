<?php
//session_start();
include_once ('../model/sessiongest.php');
include_once ('../model/operation.php');


if (!empty($_POST)) {

	$userid = $_SESSION['user']['id'];
	$title = escapeHtml($_POST['title']);
	$content = escapeHtml($_POST['content']);
	if(empty($userid) || empty($title) || empty($content)){
		$_SESSION['tableErreur']['champ']='Attention tous les champs n\'étaient pas remplis correctement, merci de réessayer';
	    header('location: ../index.php?p=nouveau');
	    die();
	}

	$res = $user->nouveau($userid,$title,$content);

	if($res){
		$_SESSION['tableErreur']['succes']='Votre post a été enregistré avec succés';
	    header('location: ../index.php?p=nouveau');
	}else{
		$_SESSION['tableErreur']['post']='Votre envoie a echouée, merci de réessayer';
	    header('location: ../index.php?p=nouveau&failure=1');
	    die();
	}

}

 ?>

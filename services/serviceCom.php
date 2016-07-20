<?php
//session_start();
include_once ('../model/sessiongest.php');
include_once ('../model/operation.php');


if (!empty($_POST)) {

	$userid = $_SESSION['user']['id'];
	$postId = $_SESSION['post_id'];
	$comment = escapeHtml($_POST['comment']);
	if(empty($comment)){
		$_SESSION['tableErreur']['champ']='Impossible d\'enregistrer un commentaire vide';
	    header('location: ../index.php?p=post&id='.$postId);
	    die();
	}

	$res = $user->comment($userid,$postId,$comment);

	if($res){
		$_SESSION['tableErreur']['succes']='Votre commentaire a été enregistré avec succés';
	    header('location: ../index.php?p=post&id='.$postId);
	}else{
		$_SESSION['tableErreur']['post']='Votre envoie a echouée, merci de réessayer';
	    header('location: ../index.php?p=post&id='.$postId);
	    die();
	}

}

 ?>

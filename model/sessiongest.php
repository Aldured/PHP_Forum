

<?php

session_start();

class session{



	//enregistrement des information utilisateur à l'ouverture de session

	public static function demSession($infoUser){

		$_SESSION['user']=$infoUser[0];
		unset($_SESSION['user']['password']);
		header('location: ../index.php?p=listpost');

	}

	public static function connected(){

		return isset($_SESSION['user']['id'])?true:false;
	}

	public static function endSession(){

		unset($_SESSION['user']);
		$_SESSION['user']['username']='Aucun';

	}
}


?>
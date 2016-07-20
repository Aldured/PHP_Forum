<?php

class bddManager{
	private $_db;

	public function __construct(){
		$this->setDb();
	}

	public function setDb(){
		$connexion = new PDO('mysql:host=localhost;dbname=phpforum;charset=UTF8','root','root');
		$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$connexion->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
		$this->_db= $connexion;
	}

	function nouveau($userid,$title,$content){

		$date=date('y-m-d H:i:s');

		$query='INSERT INTO forumpost SET user_id=:userid,title=:title,content=:content,valtime=:valtime';

		$pdo=$this->_db->prepare($query);

		$pdo->execute(array(
			'userid'=> $userid,
			'title'=> $title,
			'content'=> $content,
			'valtime'=> $date,
		));

		return true;
	}

	function comment($userid,$postId,$comment){

		$date=date('y-m-d H:i:s');

		$query='INSERT INTO forumcomment SET user_id=:userid,post_id=:postId,comment=:comment,valtimeCom=:valtime';

		$pdo=$this->_db->prepare($query);

		$pdo->execute(array(
			'userid'=> $userid,
			'postId'=> $postId,
			'comment'=> $comment,
			'valtime'=> $date,
		));

		return true;
	}

	function charge($id=0){

		if ($id!==0){
			$object=$this->_db->prepare('SELECT u.username,p.*,(SELECT count(*) FROM forumcomment WHERE post_id=p.id) AS nb FROM forumuser AS U, forumpost AS p WHERE p.user_id=u.id and p.user_id=:userId');
			$object->execute(array('userId'=>$id));
		} else {
			$object=$this->_db->prepare('SELECT u.username,p.*,(SELECT count(*) FROM forumcomment WHERE post_id=p.id) AS nb FROM forumuser AS U, forumpost AS p WHERE u.id=p.user_id');
			$object->execute(array());
		}

		$result=$object->fetchALL(PDO::FETCH_ASSOC);
		return $result;
	}

	function chargecom($post_id){

		$object=$this->_db->prepare('SELECT u.username,c.* FROM forumuser AS U, forumcomment AS c WHERE u.id=c.user_id AND c.post_id=:postId ');

		$object->execute(array('postId'=>$post_id));
		$result=$object->fetchALL(PDO::FETCH_ASSOC);
		return $result;
	}

	function chargeComUser(){

		$object=$this->_db->prepare('SELECT u.username,p.*,c.post_id,c.valtimeCom FROM forumuser AS u LEFT JOIN forumpost As p ON u.id=p.user_id LEFT JOIN forumcomment AS c ON p.id=c.post_id WHERE c.user_id=:userId ORDER BY c.valtimeCom');

		$object->execute(array('userId'=>$_SESSION['user']['id']));
		$result=$object->fetchALL(PDO::FETCH_ASSOC);
		return $result;
	}

	function lire($id){

		$object=$this->_db->prepare('SELECT u.username,p.* FROM forumuser AS U, forumpost AS p WHERE u.id=p.user_id and p.id=:MonId');

		$object->execute(array('MonId'=>$id));
		$result=$object->fetchALL(PDO::FETCH_ASSOC);
		return $result;
	}


	function create($username,$password,$name,$firstname,$email,$info){

		$object=$this->_db->prepare('SELECT*FROM forumuser WHERE username=:Myusername');

		$object->execute(array('Myusername'=>$username));

		$resultUser=$object->fetchALL(PDO::FETCH_ASSOC);

		if (!$resultUser){

			$object=$this->_db->prepare('SELECT*FROM forumuser WHERE email=:Myemail');

			$object->execute(array('Myemail'=>$email));

			$resultMail=$object->fetchALL(PDO::FETCH_ASSOC);

			if (!$resultMail){

				$query='INSERT INTO forumuser SET username=:username,password=:password,name=:name,firstname=:firstname,email=:email,info=:info';

				$pdo=$this->_db->prepare($query);

				$pdo->execute(array(
					'username'=> $username,
					'password'=> $password,
					'name'=> $name,
					'firstname'=> $firstname,
					'email'=> $email,
					'info'=> $info,
				));

				return true;

			}else {
				$_SESSION['tableErreur']['contMail']='Un utilisateur utilise déjà cet email, merci de saisir un email différent';
				header('location: ../index.php?p=accueil');
			}

		}else {
			$_SESSION['tableErreur']['contMail']='Cet username existe déja, merci de choisir un nouvel autre nom d\'utilisateur';
			header('location: ../index.php?p=accueil');
		}
	}


	function connect($username,$password){

		$object=$this->_db->prepare('SELECT*FROM forumuser WHERE username=:Myusername');

		$object->execute(array('Myusername'=>$username));

		$result=$object->fetchALL(PDO::FETCH_ASSOC);

		if ($result[0]['password']===$password) {

			$object=$this->_db->prepare('SELECT*FROM forumuser WHERE username=:Myusername');

			$object->execute(array('Myusername'=>$username));

			$result=$object->fetchALL(PDO::FETCH_ASSOC);

			session::demSession($result);

		}else{
			$_SESSION['tableErreur']['connect']='Votre connexion a echouée, merci de réessayer';
			header('location: ../index.php?p=accueil');
		}
	}

}

function escapeHtml($value){
	$val=str_replace("<","&lt;",$value);
	$result=str_replace(">","&gt;",$val);
	return $result;
}

$user= new bddManager();

?>
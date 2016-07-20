<?php
include_once ('header.php');
	if( $_SESSION['user']['id'] ) :
?>
	<div class="jumbotron">
		<h2><?=$_SESSION['user']['username']; ?></h2>
		<h3>Nom : <?=$_SESSION['user']['name']; ?></h3>
		<h3>Prenom : <?=$_SESSION['user']['firstname']; ?></h3>
		<h3>email : <?=$_SESSION['user']['email']; ?></h3>
		<p>un peu plus sur moi : <?=$_SESSION['user']['info']; ?></p>
		<p><a class="btn btn-primary btn-lg" href="index.php?p=listpost" role="button">Retour</a></p>
	</div>

	<?php include_once ('listpost.php') ?>

	<div class="list-post">
		<h1>Mes commentaires</h1>
		<ul class="list-group">
			<?php foreach( $com as $c ):?>
				<li class="list-group-item">
					<a href="index.php?p=post&id=<?= $c['post_id']; ?>">
						le  <?= $c['valtimeCom']; ?>
						vous avez commenté
						<?= $c['title']; ?>
						 posté par  <?= $c['username']; ?>
						 le  <?= $c['valtime']; ?>


					</a>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>

<?php  else: ?>
	<div class="alert alert-danger">
		<strong>Erreur!</strong>
			<p>ERREUR : Aucun Profil trouvé !</p>
	</div>

<?php  endif;
include_once ('footer.php');
?>
<?php
include_once ('header.php');
	if( $post ) :
?>
	<div class="jumbotron">
		<h2><?=$post[0]['title']; ?></h2>
		<p>publié le <?=$post[0]['valtime']; ?> par <?=$post[0]['username']; ?></p>
		<p><?=$post[0]['content']; ?></p>
		<p><a class="btn btn-primary btn-lg" href="index.php?p=listpost" role="button">Retour</a></p>
	</div>

	<form action="services/serviceCom.php" method="post">

		<div class="form-groups">
			<label>Votre commentaire</label>
			<textarea class="form-control" name="comment" value=""></textarea>
		</div>

		<button class="btn btn-primary" type="submit">Envoyer</button>

	</form>

	<div class="list-post">
		<ul class="list-group">
			<?php foreach( $compost as $c ):?>
				<li class="jumbotron">
					<h7> <?= $c['comment']; ?> </h7></br>
						 posté le : <?= $c['valtimeCom']; ?>
						  par <?= $c['username']; ?>

					</a>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>


<?php  else: ?>
	<div class="alert alert-danger">
		<strong>Erreur!</strong>
			<p>ERREUR : Aucun Post trouvé !</p>
	</div>

<?php  endif;
include_once ('footer.php');
?>
<?php include_once ('header.php'); ?>
<h2>Nouveau POST</h2>

<p>
	Formulaire
</p>

<form action="services/servicePost.php" method="post">
	<div class="form-groups">
		<label>Username</label>
		<input class="form-control" readonly value="<?= $_SESSION['user']['username']?>" type="text" name="username" />
	</div>
	<div class="form-groups">
		<label>Titre</label>
		<input class="form-control" type="text" name="title" value="" />
	</div>
	<br />
	<div class="form-groups">
		<label>Contenu du Post</label>
		<textarea class="form-control" name="content" value=""></textarea>
	</div>

	<button class="btn btn-primary" type="submit">Envoyer</button>

</form>
<?php include_once ('footer.php'); ?>
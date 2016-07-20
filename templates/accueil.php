<?php

include ('header.php'); ?>

<div class="jumbotron">
    <h1>Page d'acceuil!</h1>
</div>

<h3>
	Connexion
</h3>

<form action="services/serviceConnect.php" method="post">
	<div class="form-groups">
		<label>Username</label>
		<input class="form-control" type="text" name="username" />
	</div>
	<div class="form-groups">
		<label>Password</label>
		<input class="form-control" type="password" name="password" />
	</div>
		<button class="btn btn-primary" name="connect" type="submit">Connexion</button>
</form>
<h3>C'est votre premiere visite ??? </br>Merci de completer les champs suivant :</h3>

<form action="services/serviceCreate.php" method="post">
	<div class="form-groups">
		<label>Username</label>
		<input class="form-control" type="text" name="username" />
	</div>
	<div class="form-groups">
		<label>Password</label>
		<input class="form-control" type="password" name="password" />
	</div>
	<div class="form-groups">
		<label>name</label>
		<input class="form-control" type="text" name="name" value="" />
	</div>
	<div class="form-groups">
		<label>firstname</label>
		<input class="form-control" type="text" name="firstname" value="" />
	</div>
	<div class="form-groups">
		<label>email</label>
		<input class="form-control" type="mail" name="email" value="" />
	</div>
	<br />
	<div class="form-groups">
		<label>Une petite desription de vous</label>
		<textarea class="form-control" name="info" value=""></textarea>
	</div>

	<button class="btn btn-primary" type="submit">Envoyer</button>

</form>
<?php include_once ('footer.php'); ?>
<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Mon forum</title>
		<script src="assets/js/jquery.js"></script>
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	</head>
	<body>
		<div class="container">
		<div id="body-wrapper">
			<div class="page-header">
				<h1>Mon forum</h1>
				<div class="btn-group" role="group" aria-label="...">
					<a href="index.php"><button type="button" class="btn btn-default">Deconnexion</button></a>
					<a href="index.php?p=listpost"><button type="button" class="btn btn-default">liste des Post</button></a>
					<a href="index.php?p=nouveau"><button type="button" class="btn btn-default">Nouveau Post</button></a>
					<a href="index.php?p=profil"><button type="button" class="btn btn-default">Mon profil</button></a>
				</div>
				<p>Utilisateur connecté :<?=$_SESSION['user']['username']?></p>

			</div>

			<div id="content">
			<?php include_once('alert.php'); ?>





<?php

if (isset($_SESSION['tableErreur'])) {
	foreach ($_SESSION['tableErreur'] as $key => $value) {

		if ($key==='succes'):?>

			<div class="alert alert-success">
				<strong>Validation!</strong>
				<?php  echo $value; ?>
			</div>

		<?php else: ?>

			<div class="alert alert-danger">
				<strong>Erreur!</strong>
				<?php  echo $value; ?>
			</div>

		<?php endif;
	}
	unset($_SESSION['tableErreur']);
}?>
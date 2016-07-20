<div class="list-post">
	<ul class="list-group">
		<?php foreach( $resultats as $r ):?>
			<li class="list-group-item">
				<a href="index.php?p=post&id=<?= $r['id']; ?>">
					<?= $r['title']; ?>
					 posté par  <?= $r['username']; ?>
					     le : <?= $r['valtime']; ?>
					     <?= $r['nb']; ?> <i class="fa fa-comment" aria-hidden="true"></i>

				</a>
			</li>
		<?php endforeach; ?>
	</ul>
</div>
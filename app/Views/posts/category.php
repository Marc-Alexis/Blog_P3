<h1><?= $categorie->name; ?></h1>

<div class="row">
	<div class="col-sm-8">
		<?php foreach ($articles as $post): ?>

			<h2><a href="<?= $post->url; ?>"><?= $post->title; ?></a></h2>

			<p><em><?= $post->category; ?></em></p>

			<p><?= $post->excerpt; ?></p>

		<?php endforeach; ?>
	</div>
	<div class="col-sm-4">
		<ul>
			<?php foreach ($categories as $category): ?>
				<li><a href="<?= $category->url; ?>"><?= $category->name; ?></a></li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>
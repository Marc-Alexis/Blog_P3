<h1>Administrer les articles</h1>

<p>
	<a href="<?= $config->get('posts_add'); ?>" class="btn btn-success">Ajouter</a>
    <a href="<?= $config->get('comments_reported'); ?>" class="btn btn-warning">Commentaires Signalés</a>
</p>

<table class="table">
	<thead>
		<tr>
			<td>ID</td>
			<td>Titre</td>
			<td>Actions</td>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($posts as $post): ?>
		<tr>
			<td><?= $post->id; ?></td>
			<td><?= $post->title; ?></td>
			<td>
				<a href="<?= $config->get('posts_edit') . $post->id; ?>" class="btn btn-primary">Editer</a>
				<form action="<?= $config->get('posts_delete'); ?>" method="post" style="display: inline;">
					<input type="hidden" name="id" value="<?= $post->id; ?>">
					<button type="submit" class="btn btn-danger">Supprimer</button>
				</form>
			</td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
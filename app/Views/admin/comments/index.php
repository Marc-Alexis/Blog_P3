<h1>Commentaires Signalés</h1>

<p>
    <a href="<?= $config->get('admin_posts'); ?>" class="btn btn-default">Articles</a>
	<a href="<?= $config->get('admin_categories'); ?>" class="btn btn-default">Catégories</a>
</p>

<table class="table">
	<thead>
		<tr>
			<td>Article</td>
			<td>Utilisateur</td>
            <td>Contenu</td>
			<td>Actions</td>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($comments as $comment): ?>
		<tr>
			<td><?= $comment->article; ?></td>
			<td><?= $comment->username; ?></td>
            <td><?= $comment->excerpt; ?></td>
			<td>
				<form action="<?= $config->get('comments_delete'); ?>" method="post" style="display: inline;">
					<input type="hidden" name="id" value="<?= $comment->id; ?>">
					<button type="submit" class="btn btn-danger">Supprimer</button>
				</form>
			</td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
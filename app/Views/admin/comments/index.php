<h1>Commentaires Signalés</h1>
<br>

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
			<td><a href="<?= $config->get('show').$comment->art_id ?>"><?= $comment->article; ?></a></td>
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
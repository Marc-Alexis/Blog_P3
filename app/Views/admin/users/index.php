<h1>Administrer les utilisateurs</h1>

<p>
	<a href="<?= $config->get('users_add'); ?>" class="btn btn-success">Ajouter</a>
</p>

<table class="table">
	<thead>
		<tr>
			<td>Nom</td>
			<td>Rôle</td>
			<td>Actions</td>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($items as $user): ?>
		<tr>
			<td><?= $user->username; ?></td>
            <td><?= $user->role; ?></td>
			<td>
				<a href="<?= $config->get('users_edit') . $user->id; ?>" class="btn btn-primary">Editer</a>
				<form action="<?= $config->get('users_delete'); ?>" method="post" style="display: inline;">
					<input type="hidden" name="id" value="<?= $user->id; ?>">
					<button type="submit" class="btn btn-danger">Supprimer</button>
				</form>
			</td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
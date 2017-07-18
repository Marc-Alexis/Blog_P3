<h1>Administrer les catégories</h1>

<p>
	<a href="<?= $config->get('categories_add'); ?>" class="btn btn-success">Ajouter</a>
	<a href="<?= $config->get('admin_posts'); ?>" class="btn btn-default">Articles</a>
    <a href="<?= $config->get('admin_users'); ?>" class="btn btn-default">Utilisateurs</a>
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
		<?php foreach ($items as $category): ?>
		<tr>
			<td><?= $category->id; ?></td>
			<td><?= $category->name; ?></td>
			<td>
				<a href="<?= $config->get('categories_edit'); ?><?= $category->id; ?>" class="btn btn-primary">Editer</a>
				<form action="<?= $config->get('categories_delete'); ?>" method="post" style="display: inline;">
					<input type="hidden" name="id" value="<?= $category->id; ?>">
					<button type="submit" class="btn btn-danger">Supprimer</button>
				</form>
			</td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<h1>Administrer les catégories</h1>

<p>
	<a href="<?= $config->get('categories_add'); ?>" class="btn btn-success">Ajouter</a>
</p>

<table class="table">
	<thead>
		<tr>
			<td>Titre</td>
			<td>Actions</td>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($items as $category): ?>
		<tr>
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
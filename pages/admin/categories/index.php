<?php
$categories = App::getInstance()->getTable('Category')->all();
?>

<h1>Administrer les catégories</h1>

<p>
	<a href="?p=categories.add" class="btn btn-success">Ajouter</a>
	<a href="admin.php" class="btn btn-default">Retour aux articles</a>
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
		<?php foreach ($categories as $category): ?>
		<tr>
			<td><?= $category->id; ?></td>
			<td><?= $category->name; ?></td>
			<td>
				<a href="?p=categories.edit&id=<?= $category->id; ?>" class="btn btn-primary">Editer</a>
				<form action="?p=categories.delete" method="post" style="display: inline;">
					<input type="hidden" name="id" value="<?= $category->id; ?>">
					<button class="btn btn-danger">Supprimer</button>
				</form>
			</td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<h1>Administrer les catégories</h1>

<p>
	<a href="/blog_P3/public/admin/categories/add" class="btn btn-success">Ajouter</a>
	<a href="/blog_P3/public/admin/posts" class="btn btn-default">Retour aux articles</a>
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
				<a href="/blog_P3/public/admin/categories/edit/<?= $category->id; ?>" class="btn btn-primary">Editer</a>
				<form action="/blog_P3/public/admin/categories/delete" method="post" style="display: inline;">
					<input type="hidden" name="id" value="<?= $category->id; ?>">
					<button type="submit" class="btn btn-danger">Supprimer</button>
				</form>
			</td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
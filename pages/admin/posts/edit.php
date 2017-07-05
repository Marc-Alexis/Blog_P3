<?php
$postTable = App::getInstance()->getTable('Post');
if (!empty($_POST)) {
	$result = $postTable->update($_GET['id'], [
		'title' => $_POST['title'],
		'content' => $_POST['content'],
		'cat_id' => $_POST['cat_id']
	]);
	if ($result) {
		?>
		<div class="alert alert-success">
			L'article a bien été modifié
			<a href="admin.php">Retour aux articles</a>
		</div>
		<?php
	}
}
$post = $postTable->find($_GET['id']);
$categories = App::getInstance()->getTable('Category')->extract('id', 'name');
$form = new \Core\HTML\BootstrapForm($post);
?>


<form method="post">
	<?= $form->input('title', 'Titre de l\'article'); ?>
	<?= $form->input('content', 'Contenu', ['type' => 'textarea']); ?>
	<?= $form->select('cat_id', 'Catégorie', $categories); ?>
	<button class="btn btn-primary">Sauvegarder</button>
</form>
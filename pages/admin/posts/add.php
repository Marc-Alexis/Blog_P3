<?php
$postTable = App::getInstance()->getTable('Post');
if (!empty($_POST)) {
	$result = $postTable->create([
		'title' => $_POST['title'],
		'content' => $_POST['content'],
		'cat_id' => $_POST['cat_id'],
	]);
	if ($result) {
		header('Location: admin.php');
	}
}
$categories = App::getInstance()->getTable('Category')->extract('id', 'name');
$form = new \Core\HTML\BootstrapForm($_POST);
?>


<form method="post">
	<?= $form->input('title', 'Titre de l\'article'); ?>
	<?= $form->input('content', 'Contenu', ['type' => 'textarea']); ?>
	<?= $form->select('cat_id', 'Catégorie', $categories); ?>
	<button class="btn btn-primary">Sauvegarder</button>
</form>
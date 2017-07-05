<?php
$table = App::getInstance()->getTable('Category');
if (!empty($_POST)) {
	$result = $table->create([
		'name' => $_POST['name']
	]);
	if ($result) {
		header('Location: admin.php?p=categories.index');
	}
}
$form = new \Core\HTML\BootstrapForm($_POST);
?>


<form method="post">
	<?= $form->input('name', 'Nom de la catégorie'); ?>
	<button class="btn btn-primary">Sauvegarder</button>
</form>
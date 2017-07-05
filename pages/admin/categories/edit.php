<?php
$table = App::getInstance()->getTable('Category');
if (!empty($_POST)) {
	$result = $table->update($_GET['id'], [
		'name' => $_POST['name']
	]);
	if ($result) {
		?>
		<div class="alert alert-success">
			La catégorie a bien été modifiée
			<a href="admin.php?p=categories.index">Retour aux catégories</a>
		</div>

		<?php
	}
}
$categorie = $table->find($_GET['id']);
$form = new \Core\HTML\BootstrapForm($categorie);
?>


<form method="post">
	<?= $form->input('name', 'Nom de la catégorie'); ?>
	<button class="btn btn-primary">Sauvegarder</button>
</form>
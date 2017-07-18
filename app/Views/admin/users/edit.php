<form method="post">
	<?= $form->input('username', 'Nom d\'utilisateur'); ?>
    <?= $form->input('password', 'Mot de passe'); ?>
	<?= $form->select('role', 'Rôle', $role); ?>
	<button class="btn btn-primary">Sauvegarder</button>
</form>
<br>
<div class="container">
<form method="post">
	<?= $form->input('username', 'Nom d\'utilisateur'); ?><br>
    <?= $form->input('password', 'Mot de passe'); ?><br>
	<?= $form->select('role', 'Rôle', $role); ?><br>
	<button class="btn btn-primary">Sauvegarder</button>
</form>
</div>
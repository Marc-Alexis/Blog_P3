<?php
$form = new \Core\HTML\BootstrapForm($_POST);
?>


<form method="post">
	<?= $form->input('username'); ?>
	<?= $form->input('password'); ?>
	<button class="btn btn-primary">Envoyer</button>
</form>
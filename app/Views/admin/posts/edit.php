<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=xg5b8wal7wapmakragdnti5zdthic4q1caucjf6y5iglep9o"></script>
<script>tinymce.init({ selector:'textarea' });</script>
<form method="post">
	<?= $form->input('title', 'Titre de l\'article'); ?>
	<?= $form->input('content', 'Contenu', ['type' => 'textarea']); ?>
	<?= $form->select('cat_id', 'Catégorie', $categories); ?>
	<button class="btn btn-primary">Sauvegarder</button>
</form>
<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=xg5b8wal7wapmakragdnti5zdthic4q1caucjf6y5iglep9o"></script>
<script>tinymce.init({ selector:'textarea' });</script>
<br>
<div class="container">
<form method="post">
	<?= $form->input('title', 'Titre de l\'article'); ?><br>
	<?= $form->input('content', 'Contenu', ['type' => 'textarea']); ?><br>
	<?= $form->select('cat_id', 'Catégorie', $categories); ?><br>
	<button class="btn btn-primary">Sauvegarder</button>
</form>
</div>
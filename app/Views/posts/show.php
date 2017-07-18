<h1><?= $article->title; ?></h1>
<p><em><?= $article->category; ?></em></p>

<p><?= $article->content; ?></p>
<hr>
<hr>
<h3>Commentaires</h3>
<?php if($comments) :
    foreach ($comments as $comment) : ?>
        <p>
            par <strong><?= $comment->username; ?></strong> |
            <em><?= $comment->date_posted; ?></em> |
            <?php if ($comment->reported == FALSE) : ?>
                <a href="<?= $config->get('comment_report') . $article->id .DS. $comment->id; ?>">Signaler</a>
            <?php endif; ?>
        </p>
        <p><?= $comment->content; ?></p>
        <hr>
    <?php endforeach;
    else: ?>
    <p><em>Pas de commentaires</em></p>
    <br>
<?php endif; ?>
<?php if($_SESSION): ?>
    <form action="<?= $config->get('posts_addComment') . $article->id; ?>" method="post">
        <p><strong>Ajouter un commentaire en tant que <?= $_SESSION['name'] ?></strong></p>
        <?= $form->input('content', '', ['type' => 'textarea']); ?>
        <button class="btn btn-primary">Poster</button>
    </form>
<?php else : ?>
    <p><em><a href="<?= $config->get('login') ?>">Connectez-vous</a> pour ajouter un commentaire</em></p>
<?php endif; ?>

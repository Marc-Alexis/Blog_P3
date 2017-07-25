<header class="intro-header" style="background-image: url('/blog_P3/public/img/post-bg.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h1><?= $article->title; ?></h1>
                    <hr class="small">
                    <span class="subheading"><em><?= $article->category; ?></em></span>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container">
    <div class="row">
        <div class="col-md-12">
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
                <hr>
            <?php endif; ?>
            <?php if($_SESSION): ?>
                <form action="<?= $config->get('posts_addComment') . $article->id; ?>" method="post">
                    <?= $form->input('content', 'Ajouter un commentaire en tant que ' . $_SESSION['name'], ['type' => 'textarea']); ?><br>
                    <button class="btn btn-primary">Poster</button>
                </form>
            <?php else : ?>
                <p><em><a href="<?= $config->get('login') ?>">Connectez-vous</a> ou <a href="<?= $config->get('register') ?>">Inscrivez-vous</a> pour ajouter un commentaire</em></p>
            <?php endif; ?>
        </div>
    </div>
</div>


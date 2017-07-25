<header class="intro-header" style="background-image: url('/blog_P3/public/img/home-bg.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h1>Billet simple pour l'Alaska</h1>
                    <hr class="small">
                    <span class="subheading">Un livre de Jean Forteroche</span>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container">
    <div class="row">
        <div class="col-md-9">
            <?php foreach ($posts as $post): ?>
            <div class="post-preview">
                <a href="<?= $post->url; ?>">
                    <h2 class="post-title">
                        <?= $post->title; ?>
                    </h2>
                </a>
                <em class="post-subtitle">
                    <?= $post->category; ?>
                </em>
                <p>
                    <?= $post->excerpt ?>
                </p>
            </div>
            <hr>
        <?php endforeach; ?>
        </div>
        <div class="col-md-3">
            <h4>Catégories</h4>
            <?php foreach (App::getInstance()->getTable('Category')->all() as $category): ?>
                <a href="<?= $category->url; ?>"><?= $category->name; ?></a><br>
            <?php endforeach; ?>
        </div>
    </div>
</div>

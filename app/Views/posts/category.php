<header class="intro-header" style="background-image: url('/blog_P3/public/img/contact-bg.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h1><?= $categorie->name; ?></h1>
                    <hr class="small">
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container">
    <div class="row">
        <div class="col-md-9">
            <?php foreach ($articles as $post): ?>
                <div class="post-preview">
                    <a href="<?= $post->url; ?>">
                        <h2 class="post-title">
                            <?= $post->title; ?>
                        </h2>
                    </a>
                    <p class="post-meta">
                        Posté le <?= $post->when; ?>
                    </p>
                </div>
                <hr>
            <?php endforeach; ?>
        </div>
        <div class="col-md-3">
            <h4>Catégories</h4>
            <?php foreach ($categories as $category): ?>
                <a href="<?= $category->url; ?>"><?= $category->name; ?></a><br>
            <?php endforeach; ?>
        </div>
    </div>
</div>


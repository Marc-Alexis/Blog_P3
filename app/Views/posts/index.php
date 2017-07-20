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
    <?php foreach (App::getInstance()->getTable('Category')->all() as $category): ?>
            <a href="<?= $category->url; ?>"><?= $category->name; ?></a><br>
    <?php endforeach; ?>
</div>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title><?= App::getInstance()->title; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="<?= $config->get('home'); ?>">Blog P3</a>
          <?php use Core\Auth\DBAuth; $app = App::getInstance(); $auth = new DBAuth($app->getDb()); ?>
          <?php if ($auth->loggedAdmin()) : ?>
            <a class="navbar-brand"><?= $_SESSION['name']?></a>
            <a class="navbar-brand" href="<?= $config->get('admin_posts'); ?>">Administration</a>
            <a class="navbar-brand" href="<?= $config->get('logout'); ?>">Déconnexion</a>
          <?php elseif ($auth->logged()) : ?>
            <a class="navbar-brand"><?= $_SESSION['name']?></a>
            <a class="navbar-brand" href="<?= $config->get('logout'); ?>">Déconnexion</a>
          <?php else: ?>
            <a class="navbar-brand" href="<?= $config->get('login'); ?>">Connexion</a>
            <a class="navbar-brand" href="<?= $config->get('register'); ?>">Inscription</a>
          <?php endif; ?>
        </div>
      </div>
    </nav>

    <div class="container">

      <div class="starter-template" style="padding-top: 100px;">
        <?= $content; ?>
      </div>

    </div><!-- /.container -->
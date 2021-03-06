<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= App::getInstance()->title; ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="/blog_P3/public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="/blog_P3/public/css/clean-blog.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/blog_P3/public/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-default navbar-custom navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                Menu <i class="fa fa-bars"></i>
            </button>
            <?php if ($_SESSION) : ?>
                <span class="navbar-brand"><i class="fa fa-user" aria-hidden="true"></i> <?= $_SESSION['name']?></span>
            <?php endif; ?>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="<?= $config->get('home'); ?>"><i class="fa fa-home" aria-hidden="true"></i> Accueil</a>
                </li>
                <?php if ($_SESSION && $_SESSION['role'] == 'admin') : ?>
                    <li>
                        <a class="navbar-brand" href="<?= $config->get('admin_posts'); ?>"><i class="fa fa-cogs" aria-hidden="true"></i> Administration</a>
                    </li>
                <?php endif; ?>
                <?php if ($_SESSION) : ?>
                    <li>
                        <a href="<?= $config->get('logout'); ?>"><i class="fa fa-power-off" aria-hidden="true"></i> Déconnexion</a>
                    </li>
                <?php else : ?>
                    <li>
                        <a class="navbar-brand" href="<?= $config->get('login'); ?>"><i class="fa fa-power-off" aria-hidden="true"></i> Connexion</a>
                    </li>
                    <li>
                        <a class="navbar-brand" href="<?= $config->get('register'); ?>"><i class="fa fa-pencil" aria-hidden="true"></i> Inscription</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<!-- Page Header -->
<!-- Main Content -->
<?= $content; ?>

<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <p class="copyright text-muted">Copyright &copy; Billet simple pour l'Alaska 2017</p>
            </div>
        </div>
    </div>
</footer>

<!-- jQuery -->
<script src="/blog_P3/public/vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="/blog_P3/public/vendor/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>
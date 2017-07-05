<?php
use Core\Auth\DBAuth;

define('DS', DIRECTORY_SEPARATOR); // meilleur portabilité sur les différents systemes.
require '../app/App.php';
App::load();

if (isset($_GET['p'])) {
	$page = $_GET['p'];
}else{
	$page = 'home';
}

//Auth
$app = App::getInstance();
$auth = new DBAuth($app->getDb());
if (!$auth->logged()) {
	$app->forbidden();
}

ob_start();
if ($page === 'home') {
	require '../pages/admin/posts/index.php';
} elseif ($page === 'posts.category') {
	require '../pages/admin/posts/category.php';
} elseif ($page === 'posts.show') {
	require '../pages/admin/posts/show.php';
}
$content = ob_get_clean();
require '../pages/templates/default.php';
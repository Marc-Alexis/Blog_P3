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
} elseif ($page === 'posts.edit') {
	require '../pages/admin/posts/edit.php';
} elseif ($page === 'posts.add') {
	require '../pages/admin/posts/add.php';
} elseif ($page === 'posts.delete') {
	require '../pages/admin/posts/delete.php';
} elseif ($page === 'categories.index') {
	require '../pages/admin/categories/index.php';
} elseif ($page === 'categories.edit') {
	require '../pages/admin/categories/edit.php';
} elseif ($page === 'categories.add') {
	require '../pages/admin/categories/add.php';
} elseif ($page === 'categories.delete') {
	require '../pages/admin/categories/delete.php';
}
$content = ob_get_clean();
require '../pages/templates/default.php';
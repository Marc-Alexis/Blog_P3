<?php
require '../app/App.php';
App::load();
define('DS', DIRECTORY_SEPARATOR); // meilleur portabilité sur les différents systemes.

if (isset($_GET['p'])) {
	$page = $_GET['p'];
}else{
	$page = 'home';
}

ob_start();
if ($page === 'home') {
	require '../pages/posts/home.php';
} elseif ($page === 'posts.category') {
	require '../pages/posts/category.php';
} elseif ($page === 'posts.show') {
	require '../pages/posts/show.php';
} elseif ($page === 'login') {
	require '../pages/users/login.php';
}
$content = ob_get_clean();
require '../pages/templates/default.php';

/*$router = new Router($_GET['url']);

$router->get('/', function(){ echo "Homepage"; });
$router->get('/posts', function(){ echo "Tous les articles"; });
$router->get('/article/:slud-:id/:page', 'Posts#show')->with('id', '[0-9]+')->with('page', '[0-9]+')->with('slug', '[a-z\-0-9]+');
$router->get('/article/:slud-:id', 'Posts#show')->with('id', '[0-9]+')->with('slug', '[a-z\-0-9]+');
$router->post('/posts/:id', function($id){ echo "Poster pour l'article " . $id . '<pre>' . print_r($_POST, true) . '</pre>'; });

$router->run();*/
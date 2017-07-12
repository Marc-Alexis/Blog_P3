<?php
require '../app/App.php';
define('DS', DIRECTORY_SEPARATOR); // meilleur portabilité sur les différents systemes.
define('ROOT', dirname(__DIR__));
App::load();
use Src\Router\Router;

$router = new Router($_GET['url']);

$router->get('/admin/categories/edit/:id', 'admin.categories.edit')->with('id', '[0-9]+');
$router->get('/admin/posts/edit/:id', 'admin.posts.edit')->with('id', '[0-9]+');
$router->post('/admin/categories/delete', 'admin.categories.delete');
$router->post('/admin/posts/delete', 'admin.posts.delete');
$router->get('/admin/categories/add', 'admin.categories.add');
$router->get('/admin/posts/add', 'admin.posts.add');
$router->get('/admin/posts', 'admin.posts.index');
$router->get('/admin/categories', 'admin.categories.index');
$router->get('/posts/:id', 'posts.show')->with('id', '[0-9]+');
$router->get('/category/:id', 'posts.category')->with('id', '[0-9]+');
$router->get('/', 'posts.index');

$router->run();


/*if (isset($_GET['p'])) {
	$page = $_GET['p'];
}else{
	$page = 'posts.index';
}

$page = explode('.', $page);
if ($page[0] == 'admin') {
	$controller = DS.'App'.DS.'Controller'.DS.'Admin'.DS . ucfirst($page[1]) . 'Controller';
	$action = $page[2];
} else {
	$controller = DS.'App'.DS.'Controller'.DS . ucfirst($page[0]) . 'Controller';
	$action = $page[1];
}
$controller = new $controller();
$controller->$action();*/
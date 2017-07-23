<?php

require '../app/App.php';
define('DS', DIRECTORY_SEPARATOR); // meilleur portabilité sur les différents systemes.
define('ROOT', dirname(__DIR__));
App::load();
use Src\Router\Router;

// Initialisation du router
$router = new Router($_GET['url']);

// Initialisation des routes
// Index
$router->get('/category/:id', 'posts.category')->with('id', '[0-9]+');
$router->get('/posts/:id', 'posts.show')->with('id', '[0-9]+');
$router->get('/', 'posts.index');

// Comments
$router->post('/posts/addcom/:id', 'posts.addComment')->with('id', '[0-9]+');
$router->get('/posts/report/:art_id/:id', 'posts.reportComment')->with('id', '[0-9]+');

// Users
$router->get('/logout', 'users.logout');
$router->get('/login', 'users.login');
$router->post('/login', 'users.login');
$router->get('/register', 'users.register');
$router->post('/register', 'users.register');

// Admin
// /Posts
$router->get('/admin/posts/edit/:id', 'admin.posts.edit')->with('id', '[0-9]+');
$router->post('/admin/posts/edit/:id', 'admin.posts.edit')->with('id', '[0-9]+');
$router->post('/admin/posts/delete', 'admin.posts.delete');
$router->get('/admin/posts/add', 'admin.posts.add');
$router->post('/admin/posts/add', 'admin.posts.add');
$router->get('/admin/posts', 'admin.posts.index');

// /Categories
$router->get('/admin/categories/edit/:id', 'admin.categories.edit')->with('id', '[0-9]+');
$router->post('/admin/categories/edit/:id', 'admin.categories.edit')->with('id', '[0-9]+');
$router->post('/admin/categories/delete', 'admin.categories.delete');
$router->get('/admin/categories/add', 'admin.categories.add');
$router->post('/admin/categories/add', 'admin.categories.add');
$router->get('/admin/categories', 'admin.categories.index');

// /Users
$router->get('/admin/users/edit/:id', 'admin.users.edit')->with('id', '[0-9]+');
$router->post('/admin/users/edit/:id', 'admin.users.edit')->with('id', '[0-9]+');
$router->post('/admin/users/delete', 'admin.users.delete');
$router->get('/admin/users/add', 'admin.users.add');
$router->post('/admin/users/add', 'admin.users.add');
$router->get('/admin/users', 'admin.users.index');

// /Comments
$router->get('/admin/comments', 'admin.comments.index');
$router->post('/admin/comments/delete', 'admin.comments.delete');

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
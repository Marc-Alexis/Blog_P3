<?php

require '../vendor/Autoloader.php';
use Src\Router\Router;

define('DS', DIRECTORY_SEPARATOR); // meilleur portabilité sur les différents systeme.

$router = new Router($_GET['url']);

$router->get('/', function(){ echo "Homepage"; });
$router->get('/posts', function(){ echo "Tous les articles"; });
$router->get('/article/:id-:slug', function($id, $slug) use ($router) { echo $router->url('posts.show', ['id' => 1, 'slug' => 'salut-les-gens']); }, 'posts.show')->with('id', '[0-9]+')->with('slug', '[a-z\-0-9]+');
$router->get('/posts/:id', 'Posts#show');
$router->post('/posts/:id', function($id){ echo "Poster pour l'article " . $id . '<pre>' . print_r($_POST, true) . '</pre>'; });

$router->run();
<?php

require '../vendor/Autoloader.php';
use Src\Router\Router;

define('DS', DIRECTORY_SEPARATOR); // meilleur portabilité sur les différents systeme.

$router = new Router($_GET['url']);

$router->get('/', function(){ echo "Homepage"; });
$router->get('/posts', function(){ echo "Tous les articles"; });
$router->get('/article/:slud-:id/:page', 'Posts#show')->with('id', '[0-9]+')->with('page', '[0-9]+')->with('slug', '[a-z\-0-9]+');
$router->get('/article/:slud-:id', 'Posts#show')->with('id', '[0-9]+')->with('slug', '[a-z\-0-9]+');
$router->post('/posts/:id', function($id){ echo "Poster pour l'article " . $id . '<pre>' . print_r($_POST, true) . '</pre>'; });

$router->run();
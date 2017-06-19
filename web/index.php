<?php
require '..\app\Autoloader.php';
use Dossier\TestDossier;
use Folder\TestFolder;
use App\Test;
use App\vendor\Test as T2;

define('DS', DIRECTORY_SEPARATOR); // meilleur portabilité sur les différents systeme.
define('ROOT', dirname(__FILE__).DS); // pour se simplifier la vie


$a = new Test();
$b = new TestFolder();
$c = new TestDossier();
$d = new T2();
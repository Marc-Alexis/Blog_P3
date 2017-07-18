<?php
namespace Core\Controller;
use Core\Config;

class Controller {

	protected $viewPath;
	protected $template;

	protected function render($view, $variables = []){
		ob_start();
		$config = Config::getInstance('../config/config.php');
		extract($variables);
		extract(compact($config));
		require($this->viewPath . str_replace('.', '/', $view) . '.php');
		$content = ob_get_clean();
		require($this->viewPath . 'templates/' . $this->template . '.php');
	}

	protected function forbidden(){
		header('HTTP/1.0 403 Forbidden');
		die('Accès Interdit');
	}

	protected function notFound(){
		header('HTTP/1.0 404 Not Found');
		die('Page Introuvable');
	}
}
<?php
namespace App\Controller;
use Core\Controller\Controller;
use \App;

class AppController extends Controller{

	protected $template = 'default';
	
	public function __construct(){
		$this->viewPath = ROOT . DS. 'app' . DS . 'Views'. DS;
	}

	protected function loadModel($modelName){
		$this->$modelName = App::getInstance()->getTable($modelName);
	}
}
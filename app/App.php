<?php
use Core\Config;
use Core\Database\MysqlDatabase;

/**
 * Class App
 * Factory gérant toute mon application
 */
class App
{
	/**
	 * @var $_instance L'instance de ma classe
	 */
	private static $_instance;

	/**
	 * @var $db_instance L'instance de ma base de données
	 */
	private $db_instance;

	/**
	 * @var $title Le titre de la page
	 */
	public $title = "Mon super blog";

	/**
	 * @return object L'instance de ma classe
	 */
	public static function getInstance(){
		if (is_null(self::$_instance)) {			
			self::$_instance = new App();
		}
		return self::$_instance;
	}

	/**
	 * Charge l'autoloader
	 */
	public static function load(){
		session_start();
		require 'Autoloader.php';
		require '../core/Autoloader.php';
	}

	/**
	 * @param $name
	 * @return string La table à instancier 
	 */
	public function getTable($name){
		$className = "App".DS."Table".DS. ucfirst($name) . "Table";
		return new $className($this->getDb());
	}

	/**
	 * @return object L'instance de ma base de données
	 */
	public function getDb(){
		$config = Config::getInstance('../config/config.php');
		if (is_null($this->db_instance)) {
			$this->db_instance = new MysqlDatabase($config->get('db_name'), $config->get('db_user'), $config->get('db_pass'), $config->get('db_host'));
		}
		return $this->db_instance;
	}
}
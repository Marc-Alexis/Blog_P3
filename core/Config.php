<?php
namespace Core;

class Config{

	private $settings = [];
	private static $_instance;

	// Crée une instance de Config si elle n'existe pas
	public static function getInstance($file){
		if (is_null(self::$_instance)) {
			self::$_instance = new Config($file);
		}
		return self::$_instance;
	}

	public function __construct($file){
		$this->settings = require($file);
	}

	/**
	 * @param $key
	 * @return null
	 * @return string
	 */
	public function get($key){
		if (!isset($this->settings[$key])) {
			return null;
		}
		return $this->settings[$key];
	}

}
<?php
namespace Core\Entity;

// Classe parent. Représente un objet.
class Entity{

	/**
	 * Méthode magique permettant de récupérer un getter.
	 */
	public function __get($key){
		$method = 'get' . ucfirst($key);
		$this->$key = $this->$method();
		return $this->$key;
	}

	protected function getUrl(){
		$config = Config::getInstance('../config/config.php');
		extract(compact($config));
	}
}
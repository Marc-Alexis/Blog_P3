<?php
namespace Core\Entity;

// Classe parent. Représente une entité.
class Entity{

	/**
	 * Méthode magique permettant de récupérer un getter.
	 */
	public function __get($key){
		$method = 'get' . ucfirst($key);
		$this->$key = $this->$method();
		return $this->$key;
	}
}
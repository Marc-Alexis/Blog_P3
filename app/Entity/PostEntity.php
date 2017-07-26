<?php
namespace App\Entity;
use Core\Entity\Entity;
use Core\Config;

/**
 * Class CategoryEntity
 * Représente UN article
 */
class PostEntity extends Entity{

	public function getUrl(){
		$config = Config::getInstance('../config/config.php');
		extract(compact($config));
		return $config->get('show') . $this->id;
	}
}
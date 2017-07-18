<?php
namespace App\Entity;
use Core\Entity\Entity;
use Core\Config;

/**
 * Class CategoryEntity
 * Représente UNE catégorie
 */
class CategoryEntity extends Entity{

	public function getUrl(){
		$config = Config::getInstance('../config/config.php');
		extract(compact($config));
		return $config->get('posts_category') . $this->id;
	}
}
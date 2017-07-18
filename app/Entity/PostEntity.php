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

	public function getExcerpt(){
		$html = '<p>' . substr($this->content, 0, 375) . '...</p>';
		$html .= '<p><a href="' . $this->getUrl() . '">Voir la suite</a></p>';
		return $html;

	}
}
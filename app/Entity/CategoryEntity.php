<?php
namespace App\Entity;
use Core\Entity\Entity;

/**
 * Class CategoryEntity
 * Représente UNE catégorie
 */
class CategoryEntity extends Entity{

	public function getUrl(){
		return 'index.php?p=posts.category&id=' . $this->id;
	}
}
<?php
namespace App\Entity;
use Core\Entity\Entity;

/**
 * Class CategoryEntity
 * Représente UNE catégorie
 */
class CommentEntity extends Entity{

    public function getExcerpt(){
        $html = '<p>' . substr($this->content, 0, 100) . '</p>';
        return $html;

    }
}
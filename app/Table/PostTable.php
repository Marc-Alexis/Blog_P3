<?php
namespace App\Table;
use Core\Table\Table;

/**
 * Class PostTable
 * Représente la table articles
 */
class PostTable extends Table{

	protected $table = 'articles';
	
	/**
	 * Récupère les derniers articles
	 * @return array
	 */
	public function last(){
		return $this->query("
			SELECT articles.id, articles.title, articles.content, articles.date, categories.name as category
			FROM articles
			LEFT JOIN categories ON cat_id = categories.id
			ORDER BY articles.date DESC");
	}

	/**
	 * Récupère les derniers articles de la catégorie associée
	 * @param $cat_id int
	 * @return array
	 */
	public function lastByCategory($cat_id){
		return $this->query("
			SELECT articles.id, articles.title, articles.content, articles.date, categories.name as category
			FROM articles
			LEFT JOIN categories ON cat_id = categories.id
			WHERE articles.cat_id = ?
			ORDER BY articles.date DESC", [$cat_id]);
	}

	/**
	 * Récupère un article en liant la catégorie associée
	 * @param $id int
	 * @return \App\Entity\PostEntity
	 */
	public function findWithCategory($id){
		return $this->query("
			SELECT articles.id, articles.title, articles.content, articles.date, categories.name as category
			FROM articles
			LEFT JOIN categories ON cat_id = categories.id
			WHERE articles.id = ?", [$id], true);
	}
}
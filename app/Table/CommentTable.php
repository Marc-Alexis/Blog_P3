<?php
namespace App\Table;
use Core\Table\Table;

/**
 * Class CommentTable
 * Représente la table articles
 */
class CommentTable extends Table{

	protected $table = 'comments';

    /**
     * Récupère les derniers commentaires de l'article associé
     * @param $art_id
     * @return array
     */
	public function lastByArticle($art_id){
		return $this->query("
			SELECT comments.id, comments.content, comments.reported, users.username as username,
			DAYNAME(comments.date_posted) as joursem, DAY(comments.date_posted) as jour, MONTHNAME(comments.date_posted) as mois, YEAR(comments.date_posted) as annee, 
			HOUR(comments.date_posted) as heure, MINUTE(comments.date_posted) as minute
			FROM comments
			LEFT JOIN users ON usr_id = users.id
			LEFT JOIN articles ON art_id = articles.id
			WHERE comments.art_id = ?
			ORDER BY comments.date_posted DESC", [$art_id]);
	}

    /**
     * Récupère les derniers commentaires de l'utilisateur associé
     * @param $usr_id
     * @return array
     */
	public function lastByUser($usr_id){
		return $this->query("
			SELECT comments.id, comments.content, comments.reported, users.username as username, articles.title as article,
			DAYNAME(comments.date_posted) as joursem, DAY(comments.date_posted) as jour, MONTHNAME(comments.date_posted) as mois, YEAR(comments.date_posted) as annee, 
			HOUR(comments.date_posted) as heure, MINUTE(comments.date_posted) as minute
			FROM comments
			LEFT JOIN users ON usr_id = users.id
			LEFT JOIN articles ON art_id = articles.id
			WHERE comments.usr_id = ?
			ORDER BY articles.date DESC", [$usr_id]);
	}

    /**
     * Récupère les commentaires signalés
     */
	public function lastReportedComments(){
		return $this->query("
			SELECT comments.id, comments.content, comments.reported, users.username as username, articles.title as article, comments.art_id,
			DAYNAME(comments.date_posted) as joursem, DAY(comments.date_posted) as jour, MONTHNAME(comments.date_posted) as mois, YEAR(comments.date_posted) as annee, 
			HOUR(comments.date_posted) as heure, MINUTE(comments.date_posted) as minute
			FROM comments
			LEFT JOIN users ON usr_id = users.id
			LEFT JOIN articles ON art_id = articles.id
			WHERE comments.reported = TRUE");
	}
}
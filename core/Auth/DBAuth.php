<?php
namespace Core\Auth;
use Core\Database\Database;

/**
 * Class DBAuth
 * Gère les authentifications avec la base de données
 */
class DBAuth{
	
	/**
	 * @var $db \Core\Database\Database object
	 */
	private $db;

	/**
	 * @param \Core\Database\Database $db
	 */
	public function __construct(Database $db){
		$this->db = $db;
	}

	/**
	 * @param $username
	 * @param $password
	 * @return boolean
	 */
	public function login($username, $password){
		$user = $this->db->prepare('SELECT * FROM users WHERE username = ?', [$username], null, true);
		var_dump($user);
	}

	/**
	 * @return boolean
	 */
	public function logged(){
		return isset($_SESSION['auth']);
	}
}
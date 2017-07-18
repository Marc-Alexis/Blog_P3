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

	public function getUserId(){
		if ($this->logged()) {
			return $_SESSION['auth'];
		}
		return false;
	}

	/**
	 * @param $username
	 * @param $password
	 * @return boolean
	 */
	public function login($username, $password){
		$user = $this->db->prepare('SELECT * FROM users WHERE username = ?', [$username], null, true);
		if ($user) {
			if ($user->password === sha1($password)){
				$_SESSION['auth'] = $user->id;
                $_SESSION['name'] = $user->username;
                $_SESSION['role'] = $user->role;
				return true;
			}
		}
		return false;
	}

	/**
	 * @return boolean
	 */
	public function logged(){
		return isset($_SESSION['auth']);
	}

    public function loggedAdmin(){
	    if ($_SESSION['role'] === 'admin'){
            return isset($_SESSION['auth']);
        }
    }
}
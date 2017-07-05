<?php

namespace Core\Database;
use \PDO;

/**
 * class MysqlDatabase
 * Gère les requêtes à la base de données MySQL
 */
class MysqlDatabase extends Database{

	/**
	 * informations de connexion
	 */
	private $dbName;
	private $dbUser;
	private $dbPassword;
	private $dbHost;
	private $pdo;

	public function __construct($dbName, $dbUser = 'root', $dbPassword = '', $dbHost = 'localhost'){
		$this->dbName = $dbName;
		$this->dbUser = $dbUser;
		$this->dbPassword = $dbPassword;
		$this->dbHost = $dbHost;
	}

	/**
	 * Crée une unique instance de la base de données. Si elle existe déjà, elle la retourne.
	 * @return object 
	 */
	private function getPDO(){
		if ($this->pdo === null) {			
			$pdo = new PDO('mysql:dbname=blogP3;host=localhost', 'root', '');
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->pdo = $pdo;
		}
		return $this->pdo;
	}

	/**
	 * @param $statement
	 * @param $className
	 * @param $one
	 * @return array
	 */
	public function query($statement, $className = null, $one = false){
		$req = $this->getPDO()->query($statement);
		if (
				strpos($statement, 'UPDATE') === 0 ||
				strpos($statement, 'INSERT') === 0 ||
				strpos($statement, 'DELETE') === 0
			) {
			return $req;
		}
		if ($className === null) {
			$req->setFetchMode(PDO::FETCH_OBJ);
		} else {
			$req->setFetchMode(PDO::FETCH_CLASS, $className);	
		}
		if ($one) {
			$datas = $req->fetch();	
		} else {
			$datas = $req->fetchAll();
		}
		return $datas;
	}

	/**
	 * @param $statement
	 * @param $attributes
	 * @param $className
	 * @param $one
	 * @return array
	 */
	public function prepare($statement, $attributes, $className = null, $one = false){
		$req = $this->getPDO()->prepare($statement);
		$res = $req->execute($attributes);
		if (
				strpos($statement, 'UPDATE') === 0 ||
				strpos($statement, 'INSERT') === 0 ||
				strpos($statement, 'DELETE') === 0
			) {
			return $res;
		}
		if ($className === null) {
			$req->setFetchMode(PDO::FETCH_OBJ);
		} else {
			$req->setFetchMode(PDO::FETCH_CLASS, $className);	
		}
		if ($one) {
			$datas = $req->fetch();	
		} else {
			$datas = $req->fetchAll();
		}
		return $datas;
	}

	public function lastInsertId(){
		return $this->getPDO()->lastInsertId();
	}
}
<?php
namespace Core\Table;
use Core\Database\Database;

// classe parent des tables.
class Table{

	protected $table;
	protected $db;

	public function __construct(Database $db){
		$this->db = $db;
		if (is_null($this->table)) {
			$parts = explode('\\', get_class($this));
			$className = end($parts);
			$this->table = strToLower(str_replace('Table', '', $className)) . 's';
		}
	}

	/**
	 * @return array
	 */
	public function all(){
		return $this->query('SELECT * FROM ' . $this->table);
	}

	/**
	 * @param $id
	 * @return array
	 */
	public function find($id){
		return $this->query("SELECT * FROM {$this->table} WHERE id = ?", [$id], true);
	}

	/**
	 * @return array
	 */
	public function query($statement, $attributes = null, $one = false){
		if ($attributes) {
			return $this->db->prepare(
				$statement, 
				$attributes, 
				str_replace('Table', 'Entity', get_class($this)), 
				$one
			);
		} else {
			return $this->db->query(
				$statement,
				str_replace('Table', 'Entity', get_class($this)), 
				$one
			);
		}
	}
}
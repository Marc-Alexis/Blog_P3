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
	 * @param $id
	 * @param $fields
	 * @return array
	 */
	public function update($id, $fields){
		$sql_parts = [];
		$attributes = [];
		foreach ($fields as $k => $v) {
			$sql_parts[] = "$k = ?";
			$attributes[] = $v;
		}
		$attributes[] = $id;
		$sql_part = implode(', ', $sql_parts);
		return $this->query("UPDATE {$this->table} SET $sql_part WHERE id = ?", $attributes, true);
	}

	/**
	 * @param $id
	 * @return array
	 */
	public function delete($id){
		return $this->query("DELETE FROM {$this->table} WHERE id = ?", [$id], true);
	}

	/**
	 * @param $fields
	 * @return array
	 */
	public function create($fields){
		$sql_parts = [];
		$attributes = [];
		foreach ($fields as $k => $v) {
		    if ($v == 'NOW()'){
		        $sql_parts[] = "$k = $v";
            } else{
                $sql_parts[] = "$k = ?";
                $attributes[] = $v;
            }

		}
		$sql_part = implode(', ', $sql_parts);
		$req = $this->query("INSERT INTO {$this->table} SET $sql_part", $attributes, true);
		return $req;
	}

	/**
	 * 
	 */
	public function extract($key, $value){
		$records = $this->all();
		$return = [];
		foreach ($records as $v) {
			$return[$v->$key] = $v->$value;
		}
		return $return;
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

    protected function strposa($haystack, $needle, $offset=0) {
        if(!is_array($needle)) $needle = array($needle);
        foreach($needle as $query) {
            if(strpos($haystack, $query, $offset) !== false) return true; // stop on first true result
        }
        return false;
    }
}
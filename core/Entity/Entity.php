<?php
namespace Core\Entity;

// Classe parent. Représente un objet.
class Entity{

	/**
	 * Méthode magique permettant de récupérer un getter.
	 */
	public function __get($key){
		$method = 'get' . ucfirst($key);
		$this->$key = $this->$method();
		return $this->$key;
	}

	protected function getUrl(){
		$config = Config::getInstance('../config/config.php');
		extract(compact($config));
	}

    public function getWhen(){
        switch ($this->minute) {
            case 1 : $this->minute = '01'; break;
            case 2 : $this->minute = '02'; break;
            case 3 : $this->minute = '03'; break;
            case 4 : $this->minute = '04'; break;
            case 5 : $this->minute = '05'; break;
            case 6 : $this->minute = '06'; break;
            case 7 : $this->minute = '07'; break;
            case 8 : $this->minute = '08'; break;
            case 9 : $this->minute = '09'; break;
        }
        $html = $this->jour.' '.$this->mois.' '.$this->annee.' à '.$this->heure.'h'.$this->minute;
        return $html;
    }
}
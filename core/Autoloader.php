<?php

namespace Core;

class Autoloader {

	/**
	 * Enregistrement de l'autoloader via "spl_auto_loader()"
	 */
	static function register(){
	    spl_autoload_register(array(__CLASS__, 'autoload'));
	}

	/**
	 * inclusion du fichier en fonction du dossier où il se trouve
	 *
	 * @param $class string Le nom de la classe à charger
	 */
	static function autoload($class){

                // découpage de la variable $class par "\"
                $parts = preg_split('#\\\#', $class);

                // extraction du dernier element 
                $className = array_pop($parts);

                // recollage du nom de la classe avec ses namespaces et accollage de l'extension
                // c'est le chemin vers notre fichier
                $path = implode(DS, $parts);
                $file = $className.'.php';

                // chemin vers le fichier ".php" requis
                $filepath = '..'.DS.strtolower($path).DS.$file;
                if (file_exists($filepath)) {
                    require $filepath;
                    // Vérifie si l'include a déclaré la classe
                    if (!class_exists($class, false)) {
                        trigger_error("Impossible de charger la classe : $class", E_USER_WARNING);
                    }
                } else {
                        throw new \Exception("Le fichier $filepath n'existe pas");
                        
                }
        
	}
}
Autoloader::register();
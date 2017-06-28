<?php
namespace Src\Controller;

/**
* 
*/
class ArticlesController{

	public function __construct(){
		
	}

	public function show($id){

		echo "Je suis l'article $id";
	}
}
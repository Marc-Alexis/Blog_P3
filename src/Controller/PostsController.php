<?php
namespace Src\Controller;

/**
* 
*/
class PostsController{

	public function __construct(){
		echo "La classe PostsController a bien été chargée";
	}

	public function show($id){

		echo "Je suis l'article $id";
	}
}
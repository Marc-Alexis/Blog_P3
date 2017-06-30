<?php
namespace Src\Controller;

/**
* 
*/
class PostsController{
	
	public function show($slug, $id, $page){

		echo "Je suis l'article $id, nommé $slug et je suis en page $page.";
	}
}
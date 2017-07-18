<?php
namespace App\Controller;

class PostsController extends AppController{

	public function __construct(){
		parent::__construct();
        $this->loadModel('Post');
        $this->loadModel('Category');
    }

	public function index(){
		$posts = $this->Post->last();
		$categories = $this->Category->all();
		$this->render('posts.index', compact('posts', 'categories'));
	}

    /**
     * @param $id
     */
    public function category($id){
		$categorie = $this->Category->find($id);
		if ($categorie === false) {
			$this->notFound();
		}
		$articles = $this->Post->lastByCategory($id);
		$categories = $this->Category->all();
		$this->render('posts.category', compact('articles', 'categories', 'categorie'));
	}

	public function show($id){
		$article = $this->Post->findWithCategory($id);
		$this->render('posts.show', compact('article'));
	}
}
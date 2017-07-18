<?php
namespace App\Controller\Admin;
use \Core\HTML\BootstrapForm;

class PostsController extends AppController{

	public function __construct(){
		parent::__construct();
		$this->loadModel('Post');
	}

	public function index(){
		$posts = $this->Post->all();
		$this->render('admin.posts.index', compact('posts'));
	}

	public function add(){
		if (!empty($_POST)) {
			$result = $this->Post->create([
				'title' => $_POST['title'],
				'content' => $_POST['content'],
				'cat_id' => $_POST['cat_id']
			]);
			if ($result) {
				return $this->index();
			}
		}
		$this->loadModel('Category');
		$categories = $this->Category->extract('id', 'name');
		$form = new BootstrapForm($_POST);
		$this->render('admin.posts.edit', compact('categories', 'form'));
		
	}

	public function edit($id){
		if (!empty($_POST)) {
			$result = $this->Post->update($id, [
				'title' => $_POST['title'],
				'content' => $_POST['content'],
				'cat_id' => $_POST['cat_id']
			]);
			if ($result) {
				return $this->index();
			}
		}
		$post = $this->Post->find($id);
		$this->loadModel('Category');
		$categories = $this->Category->extract('id', 'name');
		$form = new BootstrapForm($post);
		$this->render('admin.posts.edit', compact('categories', 'form'));
	}

	public function delete(){
		if (!empty($_POST)) {
			$result = $this->Post->delete($_POST['id']);
			return $this->index();
		}
	}
}
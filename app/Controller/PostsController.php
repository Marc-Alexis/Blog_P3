<?php
namespace App\Controller;
use \Core\HTML\BootstrapForm;

class PostsController extends AppController{

	public function __construct(){
		parent::__construct();
        $this->loadModel('Post');
        $this->loadModel('Category');
        $this->loadModel('Comment');
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
		$comments = $this->Comment->lastByArticle($id);
        $form = new BootstrapForm($_POST);
		$this->render('posts.show', compact('article', 'comments', 'form'));
	}

    public function addComment($id){
        if (!empty($_POST)) {
            $result = $this->Comment->create([
                'content' => $_POST['content'],
                'art_id' => $id,
                'usr_id' => $_SESSION['auth'],
                'date_posted' => 'NOW()'
            ]);
            if ($result) {
                return $this->show($id);
            }
        }
    }

    public function reportComment($art_id, $id){
        $result = $this->Comment->update($id, [
            'reported' => TRUE,
        ]);
        if ($result) {
            return $this->show($art_id);
        }
    }
}
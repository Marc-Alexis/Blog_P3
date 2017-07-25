<?php
namespace App\Controller;
use Core\HTML\BootstrapForm;
use Core\Auth\DBAuth;
use Core\Config;
use \App;

class UsersController extends AppController {

    protected $template = 'userlay';

    public function __construct(){
        parent::__construct();
        $this->loadModel('User');
    }

	public function login(){
		$errors = false;
		if (!empty($_POST)) {
			$auth = new DBAuth(App::getInstance()->getDb());
			$config = Config::getInstance('../config/config.php');
			if ($auth->login($_POST['username'], $_POST['password'])){
				header('Location: ' . $config->get('home'));
			} else {
				$errors = true;
			}
		}
		$form = new BootstrapForm($_POST);
		$this->render('users.login', compact('form', 'errors'));
	}

	public function logout(){
        $config = Config::getInstance('../config/config.php');
	    session_destroy();
        header('Location: ' . $config->get('home'));
    }

    public function register(){
	    $errUser = false;
	    $errPass = false;
        if (!empty($_POST)) {
            $auth = new DBAuth(App::getInstance()->getDb());
            $config = Config::getInstance('../config/config.php');
            if (!$auth->userExists($_POST['username'])){
                if ($_POST['password'] === $_POST['repeatpass']){
                    $result = $this->User->create([
                        'username' => $_POST['username'],
                        'password' => sha1($_POST['password']),
                        'role' => 'user'
                    ]);
                    if ($result) {
                        header('Location: ' . $config->get('home'));
                    }
                } else {
                    $errPass = true;
                }
            } else {
                $errUser = true;
            }
        }
        $form = new BootstrapForm($_POST);
        $this->render('users.register', compact('form', 'errUser', 'errPass'));
    }
}
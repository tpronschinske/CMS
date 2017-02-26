<?php namespace Controllers;

use \Core\View;
use \Helpers\Session;
use \Helpers\Password;
use \Helpers\Url;

class AuthController extends \Core\Controller {

    private $_auth;
    private $_user;

	public function __construct(){
		$this->_auth = new \Models\Auth();
		$this->_user = new \Models\Users();
	}

	public function login(){

		if(Session::get('loggedin')){
			Url::redirect('qadmin');
		}

		if(isset($_POST['submit'])){

			$username = $_POST['username'];
			$password = $_POST['password'];
			$passHashed = $this->_auth->getHash($username);

			if(Password::verify($password, $passHashed) == false){

				$error[] = 'Your Username or Password is incorrect. Please try again';

			} else {

				  $usersName = $this->_user->getUsersName($username);
				  Session::set('loggedin', true);
				  Session::set('user', $usersName);
				  Url::redirect('qadmin');
				
			}
		}

		View::rendertemplate('header', $data, 'admin/auth');
		View::render('authorize/login',$data, $error);
		View::rendertemplate('footer', $data, 'admin/auth');

	}


	public function logout(){

		Session::destroy();
		Url::redirect();

	}
}

?>

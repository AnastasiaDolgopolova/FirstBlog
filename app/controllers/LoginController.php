<?php
namespace App\Controllers;

use Delight\Auth\Auth;
use League\Plates\Engine;
use App\Model\Database\Connection;
use PDO;

class LoginController
{
	private $auth;
	private $db;
	private $templates;

	public function __construct()
    {
    	$this->db=Connection::make();
        $this->templates = new Engine('../app/views');
        $this->auth = new \Delight\Auth\Auth($this->db);
    }

    public function index()
	{
		echo $this->templates->render('auth/authorization');
	}

	public function login()
	{
		try {
	    $this->auth->login($_POST['email'], $_POST['password']);

	    echo 'User is logged in';
		}
		catch (\Delight\Auth\InvalidEmailException $e) {
		    die('Wrong email address');
		}
		catch (\Delight\Auth\InvalidPasswordException $e) {
		    die('Wrong password');
		}
		catch (\Delight\Auth\EmailNotVerifiedException $e) {
		    die('Email not verified');
		}
		catch (\Delight\Auth\TooManyRequestsException $e) {
		    die('Too many requests');
		}
	}

	public function logout()
	{
		$this->auth->logOut();
        header('Location: /');
        die;
    }
}
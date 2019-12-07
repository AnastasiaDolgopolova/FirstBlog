<?php
namespace App\Controllers;

use Delight\Auth\Auth;
use League\Plates\Engine;
use PDO;

class LoginController
{
	private $auth;
	private $db;
	private $templates;

	public function __construct(PDO $pdo, Engine $engine, Auth $auth)
    {
    	$this->pdo= $pdo;
        $this->templates = $engine;
        $this->auth = $auth;
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
		    flash()->error(['Wrong email address']);
		}
		catch (\Delight\Auth\InvalidPasswordException $e) {
		    flash()->error(['Wrong password']);
		}
		catch (\Delight\Auth\EmailNotVerifiedException $e) {
		    flash()->error(['Email not verified']);
		}
		catch (\Delight\Auth\TooManyRequestsException $e) {
		    flash()->error(['Too many requests']);
		}
		redirect("/login");
		exit;
	}

	public function logout()
	{
		$this->auth->logOut();
        header('Location: /');
        die;
    }
}
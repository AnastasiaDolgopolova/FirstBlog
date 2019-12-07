<?php
namespace App\Controllers;

use Delight\Auth\Auth;
use League\Plates\Engine;
use PDO;

class RegisterController
{
	private $auth;
	private $db;
	private $templates;

	public function __construct(PDO $pdo, Engine $engine, Auth $auth)
    {
    	$this->db= $pdo;
        $this->templates = $engine;
        $this->auth = $auth;
    }
	
	public function index()
	{
		echo $this->templates->render('auth/register');
	}

	public function register()
	{
			try {
	    $userId = $this->auth->register($_POST['email'], $_POST['password'], $_POST['username'], function ($selector, $token) {
	        echo 'Send ' . $selector . ' and ' . $token . ' to the user (e.g. via email)';
	    });

	    echo 'We have signed up a new user with the ID ' . $userId;
		}
		catch (\Delight\Auth\InvalidEmailException $e) {
		    flash()->error(['Invalid email address']);
		}
		catch (\Delight\Auth\InvalidPasswordException $e) {
		    flash()->error(['Invalid password']);
		}
		catch (\Delight\Auth\UserAlreadyExistsException $e) {
		    flash()->error(['User already exists']);
		}
		catch (\Delight\Auth\TooManyRequestsException $e) {
		    flash()->error(['Too many requests']);
		}
		header('Location: /register');
		exit;
	}

	public function email_verification()
	{
		try {
		    $this->auth->confirmEmail('L3e8e7fsn-Ch2P7k', 'qIOj6Sj4_hMuO26f');

		    echo 'Email address has been verified';
		}
		catch (\Delight\Auth\InvalidSelectorTokenPairException $e) {
		    die('Invalid token');
		}
		catch (\Delight\Auth\TokenExpiredException $e) {
		    die('Token expired');
		}
		catch (\Delight\Auth\UserAlreadyExistsException $e) {
		    die('Email address already exists');
		}
		catch (\Delight\Auth\TooManyRequestsException $e) {
		    die('Too many requests');
		}
	}
}
<?php
namespace App\Controllers;

use Delight\Auth\Auth;
use League\Plates\Engine;
use App\Model\Database\Connection;
use PDO;

class RegisterController
{
	private $auth;
	private $db;
	private $templates;

	public function __construct(Engine $engine, Auth $auth)
    {
    	$this->db=Connection::make();
        $this->templates = $engine('../app/views');
        $ContainerBuilder->addDefinitions(array(
    Engine::class => function () {
        return new Engine('../app/views');
    },
    PDO::class => function () {
        $driver = "mysql";
        $host = "localhost";
        $db_name = "phpblog";
        $user = "root";
        $password = "";
        return new PDO("$driver:host=$host;dbname=$db_name", $user, $password);
    },
    Auth::class => function ($container) {
        return new Auth($container->get('PDO'));
    },
    QueryFactory::class => function () {
        return new QueryFactory('mysql');
    },
    ImageManager::class => function () {
        return new ImageManager(array('driver' => 'imagick'));
    }
));
        $this->auth = $auth($this->db);
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
		    die('Invalid email address');
		}
		catch (\Delight\Auth\InvalidPasswordException $e) {
		    die('Invalid password');
		}
		catch (\Delight\Auth\UserAlreadyExistsException $e) {
		    die('User already exists');
		}
		catch (\Delight\Auth\TooManyRequestsException $e) {
		    die('Too many requests');
		}
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
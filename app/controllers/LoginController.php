<?php
namespace App\Controllers;

use League\Plates\Engine;

class LoginController
{
	public function __construct()
    {
        $this->templates = new Engine('../app/views');
    }
	
	public function index()
	{
		echo $this->templates->render('auth/authorization');
	}

	public function login()
	{
		
	}

	public function logout()
	{
		
    }

}
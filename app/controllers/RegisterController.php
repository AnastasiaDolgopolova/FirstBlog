<?php
namespace App\Controllers;

use League\Plates\Engine;

class RegisterController
{
	public function __construct()
    {
        $this->templates = new Engine('../app/views');
    }
	
	public function index()
	{
		echo $this->templates->render('auth/register');
	}

	public function register()
	{
		
	}

}
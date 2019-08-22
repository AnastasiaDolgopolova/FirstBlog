<?php
namespace App\Controllers;

use App\Model\Post;
use League\Plates\Engine;

class HomeController
{
	public function __construct()
    {
        $this->post= new Post;
        $this->templates = new Engine('../app/views');
    }
	
	public function homepage()
	{
		$posts=$this->post->getAll('posts');
		//var_dump($posts);die;
		echo $this->templates->render('home-page', ['postsView' => $posts]);
	}

	public function about()
	{
        echo $this->templates->render('about');
	}

	public function getCategory($name)
	{
        echo $this->templates->render('about');
	}

	public function adminPanel()
	{
        echo $this->templates->render('admin/admin-panel');
	}

}
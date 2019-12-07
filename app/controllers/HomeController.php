<?php
namespace App\Controllers;

use App\Model\Post;
use League\Plates\Engine;
use App\Model\Category;
use Delight\Auth\Auth;
use App\Controllers\UserController;

class HomeController
{
	public function __construct(Post $post, Engine $engine, Auth $auth, UserController $user)
    {
        $this->post= $post;
        $this->templates =$engine;
        $this->auth = $auth;
        $this->user = $user;
    }
	
	public function homepage()
	{
		/*if ($this->auth->isLoggedIn()) {
            $this->user->index();
        }*/
		$posts=$this->post->getAll('posts');
		//var_dump($posts);die;
		echo $this->templates->render('home-page', ['postsView' => $posts]);
		
	}

	public function about()
	{
        echo $this->templates->render('about');
	}

	public function categories()
	{
		$categories=Category::getCategories();
        echo $this->templates->render('categories',['categories' => $categories]);
	}

	public function adminPanel()
	{
        echo $this->templates->render('admin/admin-panel');
	}

}
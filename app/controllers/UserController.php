<?php
namespace App\Controllers;

use App\Model\Post;
use League\Plates\Engine;

class UserController
{
	public function __construct()
    {
        $this->user= new Post;
        $this->templates = new Engine('../app/views');
    }

    public function userProfile()
	{
		//$user = $this->user->show('user', $_GET['id']);
		echo $this->templates->render('user/profile',['user' => $user]);
	}

    public function index()
	{
		//echo $this->templates->render('post/post-page',['post' => $post]);
	}

	public function userPosts()
	{
		echo $this->templates->render('user/userposts',['post' => $post]);
	}
	

	public function getAll($table)
	{
		$posts=$this->post->getAll('user');
        echo $this->templates->render('home-page', ['postsView' => $posts]);
	}

    public function edit($table,$id)
	{
		$post = $this->post->show('posts', $_GET['id']);
 		echo $this->templates->render('post/edit', ['post' => $post]);
	}

    public function update($table,$data,$img)
	{
		$updatePost=$this->post->edit('posts',$_POST,$_FILES ['image']);
		//redirect();
	}

	public function changeAvatar()
	{
		
	}

	public function userPassword()
	{
		
	}

	public function changePassword()
	{
		//$post = $this->post->show('posts', $_GET['id']);
 		echo $this->templates->render('user/editpass');
	}


	public function delete($table,$id,$img=0)
	{
		$deletePost=$this->post->delete('posts',$_GET['id'],$_GET['image']);
	}


}
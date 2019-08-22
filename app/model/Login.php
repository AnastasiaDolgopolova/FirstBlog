<?php
namespace App\Controllers;

use App\Model\Post\Post;
use League\Plates\Engine;

class PostController
{
	public function __construct()
    {
        $this->post= new Post;
        $this->templates = new League\Plates\Engine('../app/views');
    }
	
	public function show($table,$id)
	{
		$post = $this->post->show('posts', $_GET['id']);
		echo $this->templates->render('post/post-page',['post' => $post]);
	}

	public function getAll($table)
	{
		$posts=$this->post->getAll('posts');
        echo $this->templates->render('home-page', ['postsView' => $posts]);
	}

	public function create($table,$data,$img)
	{
		echo $this->templates->render('post/create');
    }

	public function add($table,$data,$img)
	{
		$addPost=$this->post->add('posts',$_POST,$_FILES ['image']);
		//redirect(); 
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

	public function delete($table,$id,$img)
	{
		$deletePost=$this->post->delete('posts',$_GET['id'],$_GET['image']);
	}


}
<?php
namespace App\Controllers;

use App\Model\Post;
use League\Plates\Engine;

class PostController
{
	public function __construct()
    {
        $this->post= new Post;
        $this->templates = new Engine('../app/views');
    }
	
	public function show($id)
	{
		$post = $this->post->show('posts', $id['id']);
		
		//var_dump($post);die;
		echo $this->templates->render('post/post-page',['post' => $post]);
	}

	public function controlPost()
	{
		$posts=$this->post->getAll('posts');
        echo $this->templates->render('admin/admin-posts', ['posts' => $posts]);
	}

	public function add()
	{
		$categories=$this->post->getAll('category');
		echo $this->templates->render('post/create', ['categories' => $categories]);
    }

	public function create()
	{
		$addPost=$this->post->add('posts',$_POST,$_FILES ['image']);
		//redirect(); 
    }

    public function edit($id)
	{
		$post = $this->post->show('posts', $id['id']);
 		echo $this->templates->render('post/edit', ['post' => $post]);
	}

    public function update($id)
	{
		$updatePost=$this->post->update('posts',$_POST,$_FILES ['image'],$id['id']);
	
		//redirect();
	}

	public function delete($id)
	{
		$filename = $this->post->show('posts', $id['id']);
		$deletePost=$this->post->delete('posts',$id['id'],$filename['image']);
	
		header('Location: /');
	}


}
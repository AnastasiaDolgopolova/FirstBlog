<?php
namespace App\Controllers;

use App\Model\Post;
use App\Model\Category;
use League\Plates\Engine;

class PostController
{
	public function __construct(Post $model, Engine $engine)
    {
        $this->model= $model;
        $this->templates =$engine;
    }
	public function show($id)
	{
		$post = $this->model->showPost('posts', $id);
		//var_dump($post);die;
		echo $this->templates->render('post/post-page',['post' => $post]);
	}

	public function controlPost()
	{
		$posts=$this->model->getAll('posts');
        echo $this->templates->render('admin/admin-posts', ['posts' => $posts]);
	}

	public function add()
	{
		$categories=Category::getCategories();
		echo $this->templates->render('post/create', ['categories' => $categories]);
    }

	public function create()
	{
		$addPost=$this->model->add('posts',$_POST,$_FILES ['image']);
		//redirect(); 
    }

    public function edit($id)
	{
		$post = $this->model->show('posts', $id);
 		echo $this->templates->render('post/edit', ['post' => $post]);
	}

    public function update($id)
	{
		$updatePost=$this->model->update('posts',$_POST,$_FILES ['image'],$id);
	
		//redirect();
	}

	public function delete($id)
	{
		$filename = $this->model->show('posts', $id);
		$deletePost=$this->model->delete('posts',$id,$filename['image']);
	
		header('Location: /');
	}
}
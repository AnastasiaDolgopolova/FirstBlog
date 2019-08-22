<?php
namespace App\Controllers;

use App\Model\Post;
use League\Plates\Engine;

class CommentsController
{
	public function __construct()
    {
        $this->comment= new Post;
        $this->templates = new Engine('../app/views');
    }
	
	public function show($table,$id)
	{
		$comment = $this->comment->show('comments', $_GET['id']);
		echo $this->templates->render('post/post-page',['post' => $post]);
	}

	public function getAll($table)
	{
		$comment = $this->comment->getAll('comments');
        echo $this->templates->render('home-page', ['postsView' => $posts]);
	}

	public function create($table,$data,$img)
	{
		echo $this->templates->render('post/create');
    }

	public function add($table,$data,$img)
	{
		$addComment = $this->comment->add('comments',$_POST,$_FILES ['image']);
		//redirect(); 
    }

    public function edit($table,$id)
	{
		$comment = $this->comment->show('comments', $_GET['id']);
 		echo $this->templates->render('post/edit', ['post' => $post]);
	}

    public function update($table,$data,$img)
	{
		$updateComment = $this->comment->edit('comments',$_POST,$_FILES ['image']);
		//redirect();
	}

	public function delete($table,$id,$img=0)
	{
		$deleteComment = $this->comment->delete('comments',$_GET['id'],$img=0);
	}


}
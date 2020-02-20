<?php
namespace App\Controllers;

use Delight\Auth\Auth;
use App\Model\User;
use League\Plates\Engine;

class UserController
{
	public function __construct(Engine $engine, Auth $auth,User $user)
    {
        $this->model= $user;
        $this->templates = $engine;
        $this->auth = $auth;
        /*if (!$this->auth->isLoggedIn()) {
            flash()->error('Ты не залогинен');
            redirect("/");
            die;
        }*/
    }

    public function userProfile()
	{
		$userInfo = $this->model->show('users', $this->auth->getUserId());
		echo $this->templates->render('user/profile',['user' => $userInfo]);
	}

	public function userPosts()
	{
		echo $this->templates->render('user/userposts',['post' => $post]);
	}
	

	public function getAll($table)
	{
		$posts=$this->model->getAll('user');
        echo $this->templates->render('home-page', ['postsView' => $posts]);
	}

    public function edit($table,$id)
	{
		$post = $this->model->show('posts', $_GET['id']);
 		echo $this->templates->render('post/edit', ['post' => $post]);
	}

    public function update($table,$data,$img)
	{
		$updatePost=$this->model->edit('posts',$_POST,$_FILES ['image']);
		//redirect();
	}

	public function changeAvatar()
	{
		$updatePost=$this->model->updateImage('users',$_FILES ['avatar'],$this->auth->getUserId());
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
		$deletePost=$this->model->delete('posts',$_GET['id'],$_GET['image']);
	}


}
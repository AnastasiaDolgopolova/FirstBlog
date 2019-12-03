<?php
namespace App\Model;

use App\Model\Classes\ImageManager;
use App\Model\Classes\Validator;
use App\Model\Database\QueryBuilder;
use App\Model\Database\Connection;
use PDO;
use League\Plates\Engine;

class Post
{
	private $db;
    public function __construct(QueryBuilder $db, Engine $engine)
    {
        $this->db= $db;
        $this->templates =$engine;
    }

	public function show($table,$id)
	{
		$post = $this->db->getOne($table, $id);
		//var_dump($post);die;
		return $post;
	}
	public function showPost($table,$id)
	{
		$post = $this->db->getOnePost($table, $id);
		//var_dump($post);die;
		return $post;
	}

	public function getAll($table)
	{
		$posts = $this->db->getAlls($table);
		//var_dump($posts);die;
		return $posts;
	}
	public function add($table,$data,$img)
	{var_dump($data);die;
		$cleanData=Validator::clean($data);
		$Validator= new Validator;
		 $errorMessage=$Validator->validation($data);

		if(empty($errorMessage)){
			$errorMessage=$Validator->imgEmpty($img['name']);
			if($errorMessage === true){
	
	  		$image = new ImageManager();
				$filename=$image->uploadImage($img);
				
				$this->db->create($table, [
					'title' => $cleanData['title'],
					'description' => $cleanData['description'],
					'text' => $cleanData['text'],
					'category_id' => $cleanData['category'],
					'image' => $filename
				]);

				header('Location: /');
				}
			}
			if($errorMessage) {
				echo $this->templates->render('errors', ['errorMessage' => $errorMessage]);
			}
	}

	public function update($table,$data,$img,$id)
	{
		$cleanData=Validator::clean($data);
		 $Validator= new Validator;
		 $errorMessage=$Validator->validation($data);
		 
		if(empty($errorMessage)){
			if(!empty($img['tmp_name'])){
				$image = new ImageManager();
				$filename=$image->uploadImage($img);
				$image->deleteImage($_POST['oldImage']);
			}else{$filename = $_POST['oldImage'];
			  }
			$isImg=$Validator->imgEmpty($filename);
			if ($isImg === true) {
			$this->db->update($table, $data = [ 
				'title' => $cleanData['title'],
				'description' => $cleanData['description'],
				'text' => $cleanData['text'],
				'category_id' => $cleanData['category'],
				'image' => $filename
			], 
			$id);

			header('Location: /');
			}
}
	if($errorMessage) {
		echo $this->templates->render('errors', ['errorMessage' => $errorMessage]);
	}

	}

	public function deleteImage($delete_img)
	{
        unlink('uploads/'. $delete_img);
	}

	public function delete($table,$id,$img)
	{
		$this->db->delete($table, $id);
		if(!empty ($img)){
		$this->deleteImage($img);
		}
	}
}
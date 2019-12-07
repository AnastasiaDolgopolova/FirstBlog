<?php
namespace App\Model;

use App\Model\Classes\ImageManager;
use App\Model\Classes\Validator;
use App\Model\Database\QueryBuilder;
use App\Model\Database\Connection;
use PDO;

class Post
{
	private $db;
    public function __construct(QueryBuilder $db)
    {
        $this->db= $db;
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
	{
		$cleanData=Validator::clean($data);
		$Validator= new Validator;
		 $errorMessage=$Validator->validation($cleanData);
			$errorImage=$Validator->imgEmpty($img['name']);
			if($errorImage === false && empty($errorMessage)){
	
	  		$image = new ImageManager();
				$filename=$image->uploadImage($img);
				
				$this->db->create($table, [
					'title' => $cleanData['title'],
					'description' => $cleanData['description'],
					'text' => $cleanData['text'],
					'category_id' => $cleanData['category'],
					'image' => $filename
				]);
				flash()->success('Запись успешно добавлена');
				header('Location: /');
				exit;
			}
			if($errorMessage || $errorImage) {
				if(is_array($errorMessage)){
				foreach($errorMessage as $mesage){
		 		flash()->error($mesage);
		 		}
			}
				if($errorImage){
					flash()->error($errorImage);}
				header("Location: {$_SERVER['HTTP_REFERER']}");
   				 exit;
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
			if ($isImg === false) {
			$this->db->update($table, $data = [ 
				'title' => $cleanData['title'],
				'description' => $cleanData['description'],
				'text' => $cleanData['text'],
				'category_id' => $cleanData['category'],
				'image' => $filename
			], 
			$id);
			flash()->success('Запись успешно изменена');
			header('Location: /');
			exit;
			}
		}
			if($errorMessage || $isImg) {
				if(is_array($errorMessage)){
				foreach($errorMessage as $mesage){
		 		flash()->error($mesage);
		 		}
			}
				if($$isImg){
					flash()->error($isImg);}
				header("Location: {$_SERVER['HTTP_REFERER']}");
				exit;
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
				flash()->success('Запись удалена');
				}
			}
}
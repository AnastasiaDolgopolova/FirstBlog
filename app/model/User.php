<?php
namespace App\Model;

use App\Model\Classes\ImageManager;
use App\Model\Classes\Validator;
use App\Model\Database\QueryBuilder;
use PDO;

class User
{
	private $db;
    public function __construct(QueryBuilder $db)
    {
        $this->db= $db;
    }

	public function show($table,$id)
	{
		$post = $this->db->getOne($table, $id);
		return $post;
	}

	public function getAll($table)
	{
		$posts = $this->db->getAll($table);
		return $posts;
	}
	public function add($table,$data,$img)
	{
		$cleanData=Validator::clean($data);
		$Validator= new Validator;
		 $errorMessage=$Validator->validation($data);

		if(empty($errorMessage)){
			$errorMessage=$Validator->imgEmpty($img['name']);
			if($errorMessage === true){
	
	  		$image = new ImageManager($img );
				$filename=$image->uploadImage();
				
				$this->db->create($table, [
					'title' => $_POST['title'],
					'description' => $_POST['description'],
					'text' => $_POST['text'],
					'image' => $filename
				]);
				header('Location: /');
				}
			}
			if($errorMessage) {
				require __DIR__ .'/../views/errors.php';
				exit;
			}
	}

	public function edit($table,$data,$img)
	{var_dump($_POST['oldImage']);die;
		$cleanData=Validator::clean($data);
		 $Validator= new Validator;
		 $errorMessage=$Validator->validation($data);
		 
		if(empty($errorMessage)){
			if(!empty($img['tmp_name'])){
				$image = new ImageManager($img);
				$filename=$image->uploadImage();
				$image->deleteImage($_POST['oldImage']);
			}else{$filename = $_POST['oldImage'];
			  }
			$isImg=$Validator->imgEmpty($filename);
			if ($isImg === true) {
			$this->db->update($table, $data = [ 
				'title' => $_POST['title'],
				'description' => $_POST['description'],
				'text' => $_POST['text'],
				'image' => $filename
			], 
			$_GET['id']);


			header('Location: /');
			}
}
	if($errorMessage) {
		require __DIR__ .'/../views/errors.php';
		exit;
	}

	}

	public function updateImage($table,$img,$id)
	{
        if(!empty($img['tmp_name'])){
				$image = new ImageManager();
				$filename=$image->uploadImage($img);
				$image->deleteImage($_POST['oldImage']);
			}else{$filename = $_POST['oldImage'];
			  }
			  $Validator= new Validator;
			$isImg=$Validator->imgEmpty($filename);
			if ($isImg === false) {
				$this->db->update($table, ['avatar' => $filename], 
			$id);
			flash()->success('Аватарка успешно изменена');
			header('Location: /');
			exit;
			}
			if($errorMessage || $isImg) {
				if($errorMessage){
					flash()->error($errorMessage);
				}
        		if($isImg){
					flash()->error($isImg);
				}
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
		}
		header('Location: /');

	}
}
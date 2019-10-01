<?php
namespace App\Model;

use App\Model\Post;
use App\Model\Classes\ImageManager;
use App\Model\Classes\Validator;
use App\Model\Database\QueryBuilder;
use App\Model\Database\Connection;
use PDO;

class Category 
//extends Post
{
	private $db;
    public function __construct()
    {
        $this->db= new QueryBuilder;
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
					'image' => $filename
				]);
				header('Location: /categorycontrol');
				}
			}
			if($errorMessage) {
				echo 1233;
				require __DIR__ .'/../views/errors.php';
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
				$image = new ImageManager($img);
				$filename=$image->uploadImage();
				//$image->deleteImage($_POST['oldImage']);
			}else{$filename = $_POST['oldImage'];
			  }
			$isImg=$Validator->imgEmpty($filename);
			if ($isImg === true) {
			$this->db->update($table, $data = [ 
				'title' => $_POST['title'],
				'image' => $filename
			], 
			$id);


			header('Location: /categorycontrol');
			}
}
	if($errorMessage) {
		require __DIR__ .'/../views/errors.php';
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
		

	}
}
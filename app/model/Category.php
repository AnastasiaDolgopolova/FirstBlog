<?php
namespace App\Model;

use App\Model\Post;
use App\Model\Classes\ImageManager;
use App\Model\Classes\Validator;
use App\Model\Database\QueryBuilder;
use App\Model\Database\Connection;
use PDO;
use League\Plates\Engine;

class Category 
//extends Post
{
	private $db;
    public function __construct(QueryBuilder $db, Engine $engine)
    {
        $this->db= $db;
        $this->templates =$engine;
    }

    public static function getCategories()
	{
	    global $container;
	    $pdo = $container->get('PDO');
	    $query = $container->get('Aura\SqlQuery\QueryFactory');
	    $qb = new QueryBuilder($pdo, $query);
	    $categories=$qb->getAll('category');
	    return $categories;
	}

	public function show($table,$id)
	{
		$category = $this->db->getOne($table, $id);
		return $category;
	}

	public function getPosts( $id)
	{
		$posts = $this->db->getAllbyID( $id);
		return $posts;
	}

	public function getAll($table)
	{
		$categoryes = $this->db->getAll($table);
		return $categoryes;
	}
	public function add($table,$data,$img)
	{
		$cleanData=Validator::clean($data);
		$Validator= new Validator;
		 $errorMessage=$Validator->validation($data);

		if(empty($errorMessage)){
			$errorMessage=$Validator->imgEmpty($img['name']);
			if($errorMessage === true){
	
	  		$image = new ImageManager();
				$filename=$image->uploadImage($img);
				
				$this->db->create($table, [
					'category_name' => $cleanData['title'],
					'img' => $filename
				]);
				header('Location: /categorycontrol');
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
				'category_name' => $cleanData['title'],
				'img' => $filename
			], 
			$id);


			header('Location: /categorycontrol');
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
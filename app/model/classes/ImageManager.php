<?php
namespace App\Model\Classes; 

class ImageManager
{
	public $image;
	private $file_name;
	private $tmp_name;
	private $file_size;
	private $new_file_name;
	private $extension;
	public $delete_img;


	public function uploadImage($image)
	{
		$testImg=$this->file_size($image['size']);
			if($testImg === true){
		$testImg=$this->get_image_format($image['name']);}
			if($testImg === true){
		$this->new_file_name();
		$this->uploading ($image['tmp_name']);
		}elseif($testImg !== true){
			$errorMessage=$testImg;
			include __DIR__ .'/../../views/errors.php';
			exit;
			}
		 return $this->new_file_name;
	}

	public function file_size($file_size)
	{
		if($file_size >(1024000)){
			$errorMessage='Ошибка!Недопустимый размер файла.';
			return $errorMessage;
			die;
		}
		return true;
	}	

 	public function get_image_format($file_name)
	{ 
		$this->extension = pathinfo($file_name,PATHINFO_EXTENSION);
		$types = array('png','jpeg','jpg');
		if(!in_array($this->extension, $types)){
			$errorMessage='Ошибка!Недопустимый формат файла.';
			return $errorMessage;
			die;
		}
		 return true;
	}

 	public function new_file_name()
 	{
  		return $this->new_file_name = md5 (microtime()) . "." . $this->extension;
 	}

	public function uploading($tmp_name)
	{
		//var_dump($this->new_file_name);die;
    move_uploaded_file( $tmp_name, __DIR__ . '	/../../../public/uploads/'. $this->new_file_name);
  	}
  	
	public function deleteImage($delete_img)
	{
 		unlink('uploads/'. $delete_img);
 	}
}

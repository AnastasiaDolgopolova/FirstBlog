<?php
namespace App\Model\Classes; 

class Validator 
{
	public function validation($data)
	{
		$errorMessage=array();
		foreach ($data as $key => $value) {
			 if(empty($value)) {
		  	$errorMessage[]="поле $key не заполнено\n";
			 }
		}
	 return $errorMessage;
	}

	public  static function clean($data)
	{
 	$cleanData= array();

 	foreach ($data as $key => $value) {
         $value = trim($value);
         $value = stripslashes($value);
         $value = strip_tags($value);
         $value = htmlspecialchars($value);
         $cleanData[]= $value;
     	}
      return $cleanData;
	}

	public function imgEmpty($imgName)
	{
		if($imgName == '') {
			$errorMessage='Добавте картинку.';
			return $errorMessage;
			die;
		}
	return true;
	}
}

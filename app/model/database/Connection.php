<?php
namespace App\Model\Database;

use PDO;

class Connection 
{
    public static function make()
    {
    	$config = (require __DIR__ . '/../database/config.php')['db'];
        
     return new PDO(
   	"{$config['host']};dbname={$config['dbname']};charset={$config['charset']};", $config['user'], $config['password']); 
    }
}

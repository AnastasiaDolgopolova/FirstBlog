<?php
namespace App\Controllers; 

use App\Model\Post\Post;

$post=new Post;
$deletePost=$post->delete('posts',$_GET['id'],$_GET['image']);

header('Location: /');

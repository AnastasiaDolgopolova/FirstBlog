<?php
use League\Plates\Engine;
$templates = new League\Plates\Engine('../app/views');

use App\Model\Post\Post;

$post=new Post;

$addPost=$post->add('posts',$_POST,$_FILES ['image']);
echo $templates->render('post/create');

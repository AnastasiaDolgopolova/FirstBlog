<?php

use League\Plates\Engine;
$templates = new League\Plates\Engine('../app/views');

use App\Model\Post\Post;

$newPost=new Post;
$post = $newPost->show('posts', $_GET['id']);
echo $templates->render('post/edit', ['post' => $post]);

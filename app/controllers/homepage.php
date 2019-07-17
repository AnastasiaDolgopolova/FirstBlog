<?php
use App\Model\Post\Post;

$post=new Post;
$posts=$post->getAll('posts');

echo $templates->render('home-page', ['postsView' => $posts]);

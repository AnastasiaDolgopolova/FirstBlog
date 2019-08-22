<?php
use App\Model\Post;

$post=new Post;
$posts=$post->getAll('posts');

echo $templates->render('home-page', ['postsView' => $posts]);

<?php

use App\Model\Post\Post;

$post=new Post;
$updatePost=$post->edit('posts',$_POST,$_FILES ['image']);

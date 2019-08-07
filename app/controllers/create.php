<?php
use League\Plates\Engine;
$templates = new League\Plates\Engine('../app/views');

echo $templates->render('post/create');

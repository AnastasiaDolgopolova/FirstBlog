<?php
namespace App\Controllers;

use App\Model\Post;
use League\Plates\Engine;

class CategoryController
{
	public function __construct()
    {
        $this->category= new Post;
        $this->templates = new Engine('../app/views');
    }
	
	public function getPosts($id)
	{
		//$category = $this->category->show('category', $id['id']);
		echo $this->templates->render('category-page');
	}

	public function getPostsCount()
	{
		//$category = $this->category->show('category', $_GET['id']);
		//return 
	}

	public function getAll($table)
	{
		$category = $this->category->getAll('category');
        echo $this->templates->render('category-page', ['categoryView' => $category]);
	}

	public function control()
	{
		$category = $this->category->getAll('category');
        echo $this->templates->render('admin/category/admin-categories');
	}

	public function add()
	{
		echo $this->templates->render('admin/category/create');
    }

	public function create($data,$img)
	{
		$addCategory = $this->category->add('category',$_POST,$_FILES ['image']);
		//redirect(); 
    }

    public function edit()
	{
		$category = $this->category->show('category', $id['id']);
 		echo $this->templates->render('admin/category/edit');
	}

    public function update($data,$img)
	{
		$updateCategory = $this->category->update('category',$_POST,$_FILES ['image'],$id['id']);
		//redirect();
	}

	public function delete($id)
	{
		$filename = $this->category->show('category', $id['id']);
		$deleteCategory = $this->category->delete('category',$id['id'],$filename['image']);
	}


}
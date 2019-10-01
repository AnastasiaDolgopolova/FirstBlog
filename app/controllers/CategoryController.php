<?php
namespace App\Controllers;

use App\Model\Category;
use League\Plates\Engine;

class CategoryController
{
	public function __construct()
    {
        $this->category= new Category;
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
		$categoryes = $this->category->getAll('category');
        echo $this->templates->render('admin/category/admin-categories', ['categoryes' => $categoryes]);
	}

	public function add()
	{
		echo $this->templates->render('admin/category/create');
    }

	public function create()
	{
		$addCategory = $this->category->add('category',$_POST,$_FILES ['image']);
		//redirect(); 
    }

    public function edit($id)
	{
		$category = $this->category->show('category', $id['category_id']);
 		echo $this->templates->render('admin/category/edit', ['category' => $category]);
	}

    public function update($id)
	{
		$updateCategory = $this->category->update('category',$_POST,$_FILES ['image'],$id['category_id']);
		//redirect();
	}

	public function delete($id)
	{
		$filename = $this->category->show('category', $id['category_id']);
		$deleteCategory = $this->category->delete('category',$id['category_id'],$filename['image']);
		header('Location: /categorycontrol');
	}


}
<?php
namespace App\Controllers;

use App\Model\Category;
use League\Plates\Engine;

class CategoryController
{	
	public function __construct(Category $category, Engine $engine)
    {
        $this->category= $category;
        $this->templates =$engine;
    }
	
	public function showPosts($id)
	{
		$posts = $this->category->getPosts($id);
		$category_img=$posts[0]['img'];
		$category_name=$posts[0]['category_name'];
		//var_dump($posts);die;
		if(empty($posts)){
			flash()->error('Sorry this category is empty');
			header('Location: /');
			
		}
		else { 
			echo $this->templates->render('category-posts',['posts' => $posts,'category_img' =>$category_img, 'category_name' =>$category_name]);
			}
	}

	public function getPostsCount()
	{
		//$category = $this->category->show('category', $_GET['id']);
		//return 
	}

	/*public function getAll($table)
	{
		$categories = $this->category->getAll('category');
        echo $this->templates->render('category-page', ['categoryView' => $categories]);
	}
*/
	public function control()
	{
		$categories = $this->category->getAll('category');
        echo $this->templates->render('admin/category/admin-categories', ['categories' => $categories]);
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
		$category = $this->category->show('category', $id);
 		echo $this->templates->render('admin/category/edit', ['category' => $category]);
	}

    public function update($id)
	{
		$updateCategory = $this->category->update('category',$_POST,$_FILES ['image'],$id);
		//redirect();
	}

	public function delete($id)
	{
		$filename = $this->category->show('category', $id['category_id']);
		$deleteCategory = $this->category->delete('category',$id['category_id'],$filename['image']);
		header('Location: /categorycontrol');
	}


}
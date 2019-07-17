<?php 
require_once  __DIR__ . '/../../header.php';
//$this->layout('layout', ['title' => 'Postspage']);

//var_dump($templates);die;
//$db =include __DIR__ . '/../../model/database/start.php';
//$posts = $db->getAll('posts');

//echo $templates->render('admin\adminpanel', ['postsView' => $posts]);

?>


<div class="container">
    <div class="row">
      <div class="col-md-8 offest-md-2">
        <a href="/addcategory" class="btn btn-outline-success"><i class="fa fa-plus mr-2"></i>Add Categories</a>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Title</th>
              <th scope="col">Image</th>
              <th scope="col">Actions</th>

            </tr>
          </thead>
          <tbody>
            <?php// foreach($posts as $post):?>
               <tr>
              

              
              <td>  <ol><h5><li><h4><a href="/show?id=<?//php echo $post['id'];?>"><?php// echo $post['title'];?>Title</li></h5></a>
                
              </ol>
              </td>

              <td>
                  <img src="/../uploads/<?//=$post['image'] ?>" alt="" width="100" >        
              </td>

              <td>
                <a href="/editcategory?id=<?php echo $post['id'] ?>" class="btn btn-outline-warning"><i class="fa fa-edit mr-2"></i>Edit</a>
              </td>
              <td>
             <a href="/delete?id=<?php echo $post['id'] ?>&image=<?php echo $post['image'] ?>" 
                 class="btn btn-outline-danger" onclick="return confirm('are you shure?')"><i class="fa fa-times-circle mr-2"></i>Delete</a>
              </td>
            
            </tr>
            <?php //endforeach;?>
           
          </tbody>
        </table>
    </div>
  </div>
</div>
<?php
require_once  __DIR__ . '/../../footer.php';
?>
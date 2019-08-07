<?php
$this->layout('layout',['title' => 'Postspanel']);

use App\Model\Post\Post;

$post=new Post;
$posts=$post->getAll('posts');

//echo $templates->render('admin\adminpanel', ['postsView' => $posts]);

?>


<div class="container">
    <div class="row">
      <div class="col-md-10 offest-md-2">
        <a href="/add" class="btn btn-outline-success"><i class="fa fa-plus mr-2"></i>Add Post</a>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Title</th>
              <th scope="col">Image</th>
              <th scope="col">Date</th>
              <th scope="col">Actions</th>

            </tr>
          </thead>
          <tbody>
            <?php foreach($posts as $post):?>
               <tr>
              <th scope="row"><?php echo $post['id'];?></th>
              <td><a href="/show?id=<?php echo $post['id'];?>"><?php echo $post['title'];?></a></td>
              <td>
                  <img src="/../uploads/<?=$post['image'] ?>" alt="" width="100" >        
              </td>
              <td><?php echo $post['date'];?></td>
              <td>
                <a href="/edit?id=<?php echo $post['id'] ?>" class="btn btn-outline-warning"><i class="fa fa-edit mr-2"></i>Edit</a>
              </td>
              <td>
             <a href="/delete?id=<?php echo $post['id'] ?>&image=<?php echo $post['image'] ?>" 
                 class="btn btn-outline-danger" onclick="return confirm('are you shure?')"><i class="fa fa-times-circle mr-2"></i>Delete</a>
              </td>
              
            </tr>
            <?php endforeach;?>
           
          </tbody>
        </table>
    </div>
  </div>
</div>

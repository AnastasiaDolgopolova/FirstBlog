<?php
$this->layout('layout',['title' => 'Postspanel']);
?>


<div class="container">
    <div class="row">
      <div class="col-md-12 offest-md-2">
        <a href="/add" class="btn btn-outline-success"><i class="fa fa-plus mr-2"></i>Add Post</a>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Title</th>
              <th scope="col">Image</th>
              <th scope="col">Category</th>
              <th scope="col">Date</th>
              <th scope="col">Actions</th>

            </tr>
          </thead>
          <tbody>
            <?php foreach($posts as $post):?>
               <tr>
              <th scope="row"><?php echo $post['id'];?></th>
              <td><a href="/show/<?= $post['id'];?>"><?php echo $post['title'];?></a></td>
              <td>
                  <img src="/../uploads/<?=$post['image'] ?>" alt="" width="100" >        
              </td>
              <td><?php echo $post['date'];?></td>
              <td>
                <a href="/edit/<?= $post['id']?>" class="btn btn-outline-warning"><i class="fa fa-edit mr-2"></i>Edit</a>
              </td>
              <td>
             <a href="/delete/<?= $post['id'];?>" 
                 class="btn btn-outline-danger" onclick="return confirm('are you shure?')"><i class="fa fa-times-circle mr-2"></i>Delete</a>
              </td>
              
            </tr>
            <?php endforeach;?>
           
          </tbody>
        </table>
    </div>
  </div>
</div>

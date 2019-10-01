<?php
$this->layout('layout');

?>


<div class="container">
    <div class="row">
      <div class="col-md-8 offest-md-2">
        <a href="/addcategory" class="btn btn-outline-success"><i class="fa fa-plus mr-2"></i>Add Categories</a>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Title</th>
              <th scope="col">Image</th>
              <th scope="col">Actions</th>

            </tr>
          </thead>
          <tbody>
            <?php foreach($categoryes as $category):?>
               <tr>
              

              <th scope="row"><?php echo $category['category_id'];?></th>
              <td><h5><a href="/show/<?= $category['category_id'];?>"><?php echo $category['title'];?></h5></a>
              </td>

              <td>
                  <img src="/../uploads/<?= $category['image'] ?>" alt="" width="100" >        
              </td>

              <td>
                <a href="/editcategory/<?= $category['category_id'];?>" class="btn btn-outline-warning"><i class="fa fa-edit mr-2"></i>Edit</a>
              </td>
              <td>
             <a href="/deletecategory/<?= $category['category_id'];?>" 
                 class="btn btn-outline-danger" onclick="return confirm('are you shure?')"><i class="fa fa-times-circle mr-2"></i>Delete</a>
              </td>
            
            </tr>
            <?php endforeach;?>
           
          </tbody>
        </table>
    </div>
  </div>
</div>

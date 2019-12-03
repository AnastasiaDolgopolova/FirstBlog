<?php
$this->layout('layout');
use App\Model\Category;
$categories=Category::getCategories();
?>

    <div class="container">
      <div class="row">
        <div class="col-md-8 offet-md-2">
         <form action="/update/<?= $post['id'];?>" method="POST" enctype="multipart/form-data">
          <div class="form-group">
              <label for="">Title</label>
              <?=flash(); ?>
              <input type="text" name="title" class="form-control" value="<?php echo $post['title'];?>">
          </div>

          <div class="form-group">
            <label >Сhange image</label>
            <input type="file" class="form-control-file" name="image">
         </div>

         <div class="form-group my-3">
          <label for="">Сhange category</label>
            <select class="form-control" name="category">
                <?php foreach ($categories as $category): ?>
                <option value="<?=$category['id'] ?>" <?=($post['category_id'] == $category['id']) ? 'selected' : '' ?>><?=$category['category_name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

          <label for="">Description</label>
          <div class="form-group">
            <textarea name="description" class="form-control"rows="2" cols="60" maxlength="250" ><?php echo $post['description'];?></textarea>
         </div> 

        <label for="">Text</label>
          <div class="form-group">
            <textarea name="text" class="form-control" rows="6" cols="60"  maxlength="5000" ><?php echo $post['text'];?></textarea>
        </div>
        
        <div class="form-group">
           <img src="/../uploads/<?=$post['image'] ?>" alt="" width="200" >    
            <input type="hidden" name="oldImage" value="<? echo $post['image'] ?>">
        </div>
         
          <div class="form-group">
              <button class="btn btn-outline-success">Edit Post</button>
              <a href="/postcontrol" class="btn btn-outline-info">Back</a>
          </div>
        </form>
      </div>
    </div>
  </div>


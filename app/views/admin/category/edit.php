<?php
require_once  __DIR__ . '/../../header.php';
include __DIR__ . '/../../../model/functions.php';
//$db =include __DIR__ . '/../../../model/database/start.php';
//$post = $db->getOne('posts', $id);
//dd($post);
?>

    <div class="container" >
      <div class="row" style="background-color: #F5F5F5">
        <div class="col-md-8 offet-md-2 my-5 py-5" >
         <form action="/update?id=<?php echo $post['id'];?>" method="POST" enctype="multipart/form-data">
          <div class="form-group">
              <label for="">Category title</label>
              <input type="text" name="title" class="form-control" value="<?php echo $post['title'];?>">
          </div>
          
        <div class="form-group mt-5">
           <img src="/../uploads/<?=$post['image'] ?>" alt="" width="200" >    
            <input type="hidden" name="oldImage" value="<? echo $post['image'] ?>">
        </div>
         <div class="form-group">
            <label >Add image</label>
            <input type="file" class="form-control-file" name="image">
         </div>
          <div class="form-group">
              <button class="btn btn-outline-success">Edit Category</button>
              <a href="/categories" class="btn btn-outline-info">Back</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
<?php
require_once  __DIR__ . '/../../footer.php';
?>
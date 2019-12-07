<?php
$this->layout('layout',['title' => 'Add Category']);
?>
    <div class="container">
      <h1 class="text-left"><strong>Add new category</strong>
        </h1>
      <div class="row" style="background-color: #F5F5F5">
        <div class="col-md-8 offet-md-2 my-5 py-5">

         <form action="/storecategory" method="POST" enctype="multipart/form-data">
          <div class="form-group">
              <label for="">Category title</label>
              <?=flash(); ?>
              <input type="text"  name="title" class="form-control" required>
          </div>
          
        <div class="form-group mt-5">
          <label >Add image</label>
          <input type="file" class="form-control-file" name="image"  required>
         </div>
          <div class="form-group">
              <button class="btn btn-outline-success">Add Category</button>
              <a href="/categorycontrol" class="btn btn-outline-info">Back</a>
          </div>
        </form>
      </div>
    </div>
  </div>

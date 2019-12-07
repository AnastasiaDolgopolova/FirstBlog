<?php
use App\Model\Category;
$categories=Category::getCategories();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title><?=$this->e($title)?></title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <link href="/css/bootstrap.min.css" rel="stylesheet">
  <link href="/css/mdb.min.css" rel="stylesheet">
  <link href="/css/style.min.css" rel="stylesheet">
</head>

<body>
  <div class="col-md-4 mb-4">

  	<!--Auth form -->
  	  <div class="card mb-4 text-center wow fadeIn">

     <div class="card-header">Log in to post comments and articles</div>

      <div class="card-body">

        <form action="/login" method="post">
           <label class="grey-text">Email</label>
          <input type="email"  name="email" class="form-control">

           <br>
            <label  class="grey-text">Password</label>
             <input type="password" name="password" class="form-control">

            <div class="text-center mt-4">
            <button class="btn btn-info btn-md" type="submit">Login</button>
             <hr>
             <a href="/register" >Registration</a>
         </div>
      </form>
   </div>

  </div>
<!-- /Auth form-->
<!-- User Profile-->
<div class="card mb-4 text-center wow fadeIn">
  <div class="card-header">
    <a href="/profile" >My profile<i class="fa fa-edit ml-3"></i></a>
  </div>
    <div class="card-body">
      <div class="mx-5 my-5">
        <?
               if(!empty($user['avatar'])){
                  echo '<img class="rounded-circle img-fluid img-thumbnail" src="/../uploads/'.$user['avatar'].'" alt="..." class="img-thumbnail" width="200px">';
                 }
                else{
                echo '<img class="rounded-circle img-fluid img-thumbnail" src="/../img/default_user_photo.jpg" alt="..." class="rounded-circle img-thumbnail" width="200px">';
                  }
              ?>
        </div>
    <h1 class="blue-text mb-4">
      <?php echo $user['username'];?>
    </h1>

    <a class="btn btn-outline-info btn-md" href="/myposts">My Posts</a>
</div>
</div>
<!-- /User Profile-->


<!-- Categories -->
<div class="card mb-4 wow fadeIn">

      <div class="card-header">
        <a href="/Categories">Categories</a>
      </div>
        <div class="card-body">
        <div class="row">
                <div class="col-10">
                  <ul>
              <?php foreach($categories as $category):?>
              
             <li class="media mt-3">
              <div class="view overlay">
                
              <img class="rounded-circle media-middle mr-3" src="/../uploads/<?=$category['img'] ?>" alt="" height="60" width="60">
              <a href="/category-posts/<?= $category['id'];?>">
                  <div class="mask rgba-white-slight"></div>
                </a>
              </div>
               <div class="media-body mt-3">
                   <a href="/category-posts/<?= $category['id'];?>">
                   <h4 class="font-weight-bold"><?php echo $category['category_name'];?></h4>
                   </a>
                 </div>

               </li>
              <?php endforeach;?>
            </ul>
              </div>
                </div>
              </div>
            </div>
<!-- /Categories -->

<!-- Other Posts -->
 <div class="card mb-4 wow fadeIn">
       <div class="card-header">
         <a href="/categoryposts" >Other posts from the category</a>

       </div>

          <div class="card-body">

             <ul class="list-unstyled">
               <li class="media">
                 <img class="d-flex mr-3" src="https://mdbootstrap.com/img/Photos/Others/placeholder7.jpg" alt="Generic placeholder image">
                   <div class="media-body">
                    <a href="">
                       <h5 class="mt-0 mb-1 font-weight-bold">List-based media object</h5>
                    </a>
                      Cras sit amet nibh libero, in gravida nulla (...)
                   </div>
                </li>
                <li class="media my-4">
                    <img class="d-flex mr-3" src="https://mdbootstrap.com/img/Photos/Others/placeholder6.jpg" alt="An image">
                   <div class="media-body">
                     <a href="">
                       <h5 class="mt-0 mb-1 font-weight-bold">List-based media object</h5>
                      </a>
                      Cras sit amet nibh libero, in gravida nulla (...)
                    </div>
                </li>
                <li class="media">
                   <img class="d-flex mr-3" src="https://mdbootstrap.com/img/Photos/Others/placeholder5.jpg" alt="Generic placeholder image">
                   <div class="media-body">
                     <a href="">
                       <h5 class="mt-0 mb-1 font-weight-bold">List-based media object</h5>
                      </a>
                      Cras sit amet nibh libero, in gravida nulla (...)
                   </div>
              </li>
            </ul>

        </div>

     </div>

<!-- Other Posts -->

  </div>
<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="../js/popper.min.js"></script>
  <script type="text/javascript" src="../js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../js/mdb.min.js"></script>
  <script type="text/javascript">
    new WOW().init();

  </script>
</body>

</html>

<?php
$this->layout('layout',['title' => 'My profile']);
?>

<div class="container" >
     <br>
     <h1 class="text-center">My profile</h1>
     <?=flash(); ?>
     <br>
       <div class="row ">
         <div class="col-md-auto">
             <?
               if(!empty($user['avatar'])){
                  echo '<img src="/../uploads/'.$user['avatar'].'" alt="..." class="img-thumbnail" width="200px">';
                 }
                else{
                echo '<img src="/../img/default_user_photo.jpg" alt="..." class="rounded-circle img-thumbnail" width="200px">';
                  }
              ?>

      <form action="/edit_avatar" method="POST" enctype="multipart/form-data">
        <div class="form-group">
         <input name="avatar" type="file" required>
         <input type="hidden" name="oldImage" value="<?echo $user['avatar']?>">
        </div>
         <br><br>
         <button type="submit" class="btn btn-primary btn-sm">Update photo<i class="fa fa-camera ml-2"></i></button>
        </form>
         </div>
      <div class="col-sm">    
        <form action="user_update.php" method="POST">
        	<label  class="grey-text">Edit profile</label>
           <div class="input-group mb-3">
               <div class="input-group-prepend">
                 <span class="input-group-text" id="basic-addon1"> Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                  </div>
                 <input name="Name" class="form-control" value="<?php echo $user['username'];?>">
                </div>
                 <div class="input-group mb-3">
                 <div class="input-group-prepend">
                 <span class="input-group-text" id="basic-addon1">Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>
                  </div>
                  <input name="Email" maxlength="255" class="form-control" value="<?php echo $user['email']?>">
                 </div>
           		 <label  class="grey-text">Сonfirm your password</label>
                  <div class="input-group">

                  <div class="input-group-prepend">

                 <span class="input-group-text">Password</span> <!-- I apologies for this trash =) -->
                 </div>
                 <input name="Email" maxlength="255" class="form-control" aria-label="Postext" value="<?php echo $Email?>">
                 </div>
                 <br>
                 <button type="submit" class="btn btn-primary btn-sm">Change profile<i class="fa fa-user ml-2"></i></button>
                 <button type="button" class="btn btn-dark btn-sm" onclick="document.location='index.php'">Back</button>
                    </form>
                    <hr>
                    <a class="btn btn-outline-dark float-right ml-4 " href="/editpassword">Change password<i class="fa fa-key ml-2"></i></a>
                </div>           
            </div>
        </div>

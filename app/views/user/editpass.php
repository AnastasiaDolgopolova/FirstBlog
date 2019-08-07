<?php
$this->layout('layout',['title' => 'Change password']);
?>

<div class="container my-5 h-100"  style="background-color: #F5F5F5">
  <div class="row h-100 justify-content-center align-items-center" >
    <form class="col-5 text-center" action="register.php" method="post">
        
        <h2 class="blue-text my-4">Change password</h2>

        <div class="form-group my-3">
            <input type="password" class="form-control" placeholder="Password" name="password">
        </div>
        <div class="form-group my-3">
            <input type="password" class="form-control" placeholder="New password" name="password">
        </div>

        <div class="form-group my-3">
            <input type="password" class="form-control" placeholder="Repeat new assword" name="password">
        </div>
        <button class="btn btn-lg btn-outline-primary btn-block" type="submit">Change</button>
        <br>
        <a href="/profile">Back</a>
    </div>
</div>
</form>
</div>
</div>

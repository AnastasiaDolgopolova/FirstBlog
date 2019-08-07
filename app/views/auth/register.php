<?php
$this->layout('layout',['title' => 'Registration']);
?>


<div class="container my-5 h-100" style="background-color: #F5F5F5">
  <div class="row h-100 justify-content-center align-items-center" >
    <form class="col-5 text-center" action="register.php" method="post">
        
        <h2 class="blue-text my-4">Registration</h2>

        <div class="form-group my-3">
            <input type="name" class="form-control" placeholder="Name" name="name">
        </div>
        <div class="form-group">
            <input type="email" class="form-control" placeholder="Email" name="email">
        </div>
        <div class="form-group my-3">
            <input type="password" class="form-control" placeholder="Password" name="password">
        </div>

        <div class="form-group my-3">
            <input type="password" class="form-control" placeholder="Password" name="password">
        </div>
        <button class="btn btn-lg btn-outline-primary btn-block" type="submit">Register</button>
        <a href="/login">Login</a>
    </div>
</div>
</form>
</div>
</div>

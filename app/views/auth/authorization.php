<?php
$this->layout('layout',['title' => 'Authorization']);
?>

<div class="container my-5 h-100" style="background-color: #F5F5F5">
  <div class="row h-100 justify-content-center align-items-center" >
    <form class="col-4 text-center" action="/login" method="post">
    <h2 class="blue-text my-4">Authorization</h2>
        <div class="form-group">
            <input type="email" class="form-control" placeholder="Email" name="email">
        </div>
        <div class="form-group my-3">
            <input type="password" class="form-control" placeholder="Password" name="password">
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" name="remember">
            <label class="form-check-label" for="exampleCheck1">Запомнить меня</label>
        </div>
        <button class="btn btn-lg btn-outline-primary btn-block" type="submit">Login</button>
        <a href="/register" >Registration</a>
        <p class="mt-5 mb-3 text-muted">&copy; <?=date('Y') ?></p>
      </form>
    </div>
  </div>

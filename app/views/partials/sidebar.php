  <div class="col-md-4 mb-4">

  	<!--Auth form -->
    <!--
  	  <div class="card mb-4 text-center wow fadeIn">

     <div class="card-header">Log in to post comments and articles</div>

      <div class="card-body">

        <form action="login.php" method="post">
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

  </div> -->
<!-- /Auth form-->
<!-- User Profile-->
<div class="card mb-4 text-center wow fadeIn">
  <div class="card-header">My profile
    <a href="/profile"><i class="fa fa-edit ml-3"></i></a>
  </div>
    <div class="card-body">
      <div class="mx-5 my-5">
<img class="rounded-circle img-fluid img-thumbnail" src="/../img/default_user_photo.jpg" alt="Generic placeholder image">
</div>
<h1 class="blue-text mb-4">
    User Name
 </h1>

    <a class="btn btn-outline-info btn-md" href="/myposts">My Posts</a>
</div>
</div>
<!-- /User Profile-->
<!-- Categories -->
 <div class="card mb-4 wow fadeIn">

      <div class="card-header">Categories</div>
        <div class="card-body">

         <ul class="list-unstyled">
             <li class="media">
              <div class="view overlay">
              <img class="rounded-circle" src="https://mdbootstrap.com/img/Photos/Others/placeholder7.jpg" alt="Generic placeholder image">
              <a href="/categoryposts"><div class="mask rgba-white-slight"></div>
              </a>
            </div>
               <div class="media-body">
                   <a href="/categoryposts">
                   <h4 class="mt-0 mb-1 font-weight-bold">Title</h4>
                   </a>This is category about ...
                   <b> <?//= countCategory($category['id']) ?></b></li>
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


<!-- /Categories -->

<!-- Other Posts -->
 <div class="card mb-4 wow fadeIn">
       <div class="card-header">Other posts from the category</div>

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

<?php
$this->layout('layout',['title' => 'Myposts']);
?>

<main class="pt-5" style="background-color: #F5F5F5">
    <div class="container">
      <a href="/add" class="btn btn-outline-success float-right"><i class="fa fa-plus mr-2"></i>Add Post</a>
      <section class="pt-5">

        <div class="wow fadeIn">
          <h2 class="h1 text-center mb-5">What is MDB?</h2>
          <p class="text-center">MDB is world's most popular Material Design framework for building responsive,
            mobile-first websites
            and apps. </p>
          <p class="text-center mb-5 pb-5">Trusted by over
            <strong>400 000</strong> developers and designers. Easy to use & customize. 400+ material UI elements,
            templates
            & tutorials.</p>
        </div>
        
        
        <div class="row mt-3 wow fadeIn">

          <div class="col-lg-5 col-xl-4 mb-4">
            <div class="view overlay rounded z-depth-1">
              <img src="https://mdbootstrap.com/wp-content/uploads/2017/11/brandflow-tutorial-fb.jpg" class="img-fluid"
                alt="">
              <a href="#" target="_blank">
                <div class="mask rgba-white-slight"></div>
              </a>
            </div>
          </div>
         
          <div class="col-lg-7 col-xl-7 ml-xl-4 mb-4">
            <h3 class="mb-3 font-weight-bold dark-grey-text">
              <strong>Title</strong>
            </h3>
            <p class="grey-text">description/p>
              <br>
            <a href="/show?id=<?php echo $post['id'];?>" class="btn btn-outline-primary" target="_blank" >Read more<i class="fas fa-play ml-2"></i></a> 

            <a href="/edit?id=<?php echo $post['id'] ?>" class="btn btn-outline-warning">Edit<i class="fa fa-edit ml-2"></i></a>

            <a href="/delete?id=<?php echo $post['id'] ?>&image=<?php echo $post['image'] ?>" 
                 class="btn btn-outline-danger" onclick="return confirm('are you shure?')">Delete<i class="fa fa-times-circle ml-2"></i></a>
          </div>
          
        </div>
        
        <hr class="mb-5">

        <div class="row wow fadeIn">

          <div class="col-lg-5 col-xl-4 mb-4">
            <div class="view overlay rounded z-depth-1">
              <img src="https://mdbootstrap.com/wp-content/uploads/2018/01/push-fb.jpg" class="img-fluid" alt="">
              <a href="#" target="_blank">
                <div class="mask rgba-white-slight"></div>
              </a>
            </div>
          </div>
         
          <div class="col-lg-7 col-xl-7 ml-xl-4 mb-4">
            <h3 class="mb-3 font-weight-bold dark-grey-text">
              <strong>Web Push notifications</strong>
            </h3>
            <p class="grey-text">Push messaging provides a simple and effective way to re-engage with your users and in
              this tutorial
              you'll learn how to add push notifications to your web app</p>
            <a href="#" target="_blank" class="btn btn-primary btn-md">Read more
              <i class="fas fa-play ml-2"></i>
            </a>
          </div>
         
        </div>
       
        <hr class="mb-5">

        
        <nav class="d-flex justify-content-center wow fadeIn">
          <ul class="pagination pg-blue">

           
            <li class="page-item disabled">
              <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
              </a>
            </li>

            <li class="page-item active">
              <a class="page-link" href="#">1
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">2</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">3</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">4</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">5</a>
            </li>

            <li class="page-item">
              <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
              </a>
            </li>
          </ul>
        </nav>
       
      </section>

    </div>
  </main>

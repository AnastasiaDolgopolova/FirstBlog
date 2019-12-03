<?php
$this->layout('layout',['title' => 'Categories']);
?>

  <main class="mt-3 pt-5">
    <div class="container">
      <?=flash(); ?>

       <section class="card wow fadeIn">
        <img src="/../img/8.jpg" alt="Travel1" class="img-fluid">
      </section>
       
        <hr class="my-5">
        <section >
      <?php foreach($categories as $category):?>
        <div class="row mt-3 wow fadeIn">

      
          <div class="col-lg-5 col-xl-4 mb-4">
            <div class="view overlay rounded z-depth-1">
              <img src="/../uploads/<?=$category['img'] ?>" class="img-fluid"
                alt="">
              <a href="#" target="_blank">
                <div class="mask rgba-white-slight"></div>
              </a>
            </div>
          </div>
     
          <div class="col-lg-7 col-xl-7 ml-xl-4 mb-4">
            <h3 class="mb-3 font-weight-bold dark-grey-text">
              <strong><?php echo $category['category_name'];?></strong>
            </h3>
            <p class="grey-text">Especially for you, our team gathered here the most interesting and informative articles of the category <?php echo $category['category_name'];?>.</p>
            <a href="#" target="_blank" class="btn btn-primary btn-md">Read articles
              <i class="fas fa-play ml-2"></i>
            </a>
          </div>

        </div>
     

        <hr class="mb-5">
        <?php endforeach;?>


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

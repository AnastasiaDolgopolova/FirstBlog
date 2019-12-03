<?php
$this->layout('layout',['title' => 'Category Page']);
?>
  

  <main class="pt-5" style="background-color: #F5F5F5">
    <div class="container">
      <?=flash(); ?>
      <section class="card wow fadeIn" >
        <img src="/../uploads/<?=$category_img ?>">
      <div class="card-img-overlay">
     
        <div class="card-body text-white text-center py-5 px-5 my-5">

          <h1 class=" mb-4">
            <strong><?=$category_name?></strong>
          </h1>
          <p>
            <strong>Id nisl dicit vix, ex mea decore labitur hendrerit</strong>
          </p>
          <p class="mb-4">
            <strong>Lorem ipsum dolor sit amet, volumus eloquentiam vel ex. Id nisl dicit vix, ex mea decore labitur hendrerit. Ea ius choro vidisse, eam cu nulla laudem docendi. Qui eirmod persius partiendo ea.</strong>
          </p>
        </div>
   
      </section>
   

      <hr class="my-5">

      <section class="text-center" >
        <h1 class="text-left"><strong>All Posts</strong>
        </h1>
        <div class="row">
        
          <div class="col-md-8 mb-4">

      <?php foreach($posts as $post):?>
            
            <div class="card my-5">

              <div class="view overlay">
                <img class="card-img-top" src="/../uploads/<?=$post['image'] ?>" alt="">
                <a href="/show/<?=$post['id']?>">
                  <div class="mask rgba-white-slight"></div>
                </a>
              </div>

           
              <div class="card-body">
                            <div class="entry-header text-center text-uppercase">
                                <a href="#" class="post-cat"><?php echo $post['category_name'];?></a>
                            </div>
                <h4 class="card-title"><?php echo $post['title'];?></h4>
                <hr>
              
                <p class="card-text"><?php echo $post['description'] ?></p>
                <a href="/show/<?= $post['id'];?>" >Read more
                  <i class="fas fa-play ml-2"></i>
                </a>
              </div>

            </div>

          <?php endforeach;?>
          </div>

<?php $this->insert('/partials/sidebar'); ?>
     </div>
    
  </div>
     
  </div>
<?php $this->insert('/partials/pagination'); ?>
        <!--Pagination-->

      </section>
      <!--Section: Cards-->

    </div>
  </main>
  <!--Main layout-->

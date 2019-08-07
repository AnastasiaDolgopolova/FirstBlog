<?php
$this->layout('layout',['title' => 'Post']);
?>

  <!--Main layout-->
  <main class="pt-5" style="background-color: #F5F5F5">
    
    <div class="container">
      <h1 class="blue-text text-left"><strong><?=  $post['title']; ?></strong>
        </h1>
      <!--Section: Post-->
      <section class="mt-4">

        <!--Grid row-->
        <div class="row">

          <!--Grid column-->
          <div class="col-md-8 mb-4">

            <!--Featured Image-->
            <div class="card mb-4 wow fadeIn">

              <img src="/../uploads/<?=$post['image'] ?>"  class="img-fluid" alt="">

            </div>
            <!--/.Featured Image-->
            <!--Card-->
            <div class="card mb-4 wow fadeIn">

              <!--Card content-->
              <div class="card-body">

                <p class="h5 my-4"><?=  $post['title']; ?></p>

               <hr>
                <blockquote class="blockquote">
                  <p class="mb-0"><?php echo $post['description'] ?></p>
                  
                </blockquote>

                
               <?php echo $post['text'] ?>

                <hr>
                    <p>Запись добавлена: <b><?=$post['date'] ?></b></p>
              </div>

            </div>
            <!--/.Card-->

     <!--Comments--> 
<?php $this->insert('partials/comments'); ?>   
          </div>
         
<?php $this->insert('partials/sidebar'); ?>
  </div>

 </section>

    </div>
  </main>
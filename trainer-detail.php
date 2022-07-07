<?php

    $page = 'trainer';
    require('header.php');
    require('frontend-DB.php');
    $trainers = $db_object->get_all_trainers();

?>

<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs">
      <div class="container">
        <h2>Trainers</h2>
        <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Trainers Section ======= -->
    <section id="trainers" class="trainers">
      <div class="container" data-aos="fade-up">

        <div class="row" data-aos="zoom-in" data-aos-delay="100">
          
        <?php foreach($trainers as $trainer): ?>
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                <div class="member">
                    <img src="./admin/uploaded_images/<?= $trainer['trainer_image'] ?>" class="img-fluid" alt="">
                    <div class="member-content">
                    <h4><?= $trainer['name'] ?></h4>
                    <span><?= $trainer['domain'] ?></span>
                    <p>
                        <?php
                            echo substr(trim($trainer['about_trainer']), 0, 56);
                        ?>...
                    </p>
                    <div class="social">
                        <a href=""><i class="icofont-twitter"></i></a>
                        <a href=""><i class="icofont-facebook"></i></a>
                        <a href=""><i class="icofont-instagram"></i></a>
                        <a href=""><i class="icofont-linkedin"></i></a>
                    </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

        </div>

      </div>
    </section><!-- End Trainers Section -->

<?php 

    require('footer.php');

?>
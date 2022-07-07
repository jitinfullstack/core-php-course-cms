<?php

    $trainers = $db_object->get_all_trainers();

?>

<!-- ======= Trainers Section ======= -->
<section id="trainers" class="trainers">
    <div class="container" data-aos="fade-up">

    <div class="section-title">
        <h2>Trainers</h2>
        <p>Our Professional Trainers</p>
    </div>

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
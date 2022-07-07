<?php

    require('header.php');
    require('sidebar.php');
    require('DB.php');

    $course_id = $_GET['id'];
    
    if(is_numeric($course_id)) {

        $course_detail = $db_object->get_single_course($course_id);

    }

    $trainers = $db_object->get_all_trainers();

    if(isset($_POST['submit'])){

        if(empty($_FILES['file']['name'])) $files = null; else $files = $_FILES;

        // Save course page data
        if($db_object->update_course($_POST, $files)){                   

            header("location:course.php?message=updated");
            
        } else {
            $header("location:course.php?message=notupdated");
        }
    } else {
        $message = null;
    }

?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Edit Course Page</h1>
    <div class="card o-hidden border-0 shadow-lg my-2">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Edit an Course Page!</h1>
                        </div>
                        <form class="user" method="POST" action="edit_course.php" enctype="multipart/form-data">
                            <h6 class="mb-2 font-weight-bold text-primary"><?= $message ?></h6>
                            <input type="hidden" name="id" value="<?=$course_id?>">
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <input type="text" name="course_name" value="<?=$course_detail['course_name']?>" class="form-control border-left-primary rounded-3" placeholder="Course Name..." required />
                                </div>
                                <div class="col-sm-12">
                                    <textarea name="description" class="form-control border-left-primary rounded-3 mt-3" cols="30" rows="10" placeholder="Course Description..." required><?=$course_detail['description']?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <?php // if($course_detail['course_image']) { ?>
                                    <input type="File" name="file" class="form-control border-left-primary rounded-3" />
                                <?php // } ?>                                 
                            </div>
                            <?php 
                            if($course_detail['course_image']){
                                echo '<div class="form-group row">';
                                echo '<div class="col-sm-12 mb-3 mb-sm-0">';
                                echo '<img src="./uploaded_images/'.$course_detail['course_image'].'"';
                                echo 'alt="Course Page Image" width="100%" height="250px">';
                                echo '</div></div>';
                            }
                            ?>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="number" name="course_fee" value="<?=$course_detail['course_fee']?>" class="form-control border-left-primary rounded-3" placeholder="Course Fee..." required />
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <select name="trainer_id" class="form-control border-left-primary rounded-3" required >
                                        <option value="">Select Your Trainer...</option>
                                        <?php foreach($trainers as $trainer) { ?>
                                            <?php if($trainer['name'] == $course_detail['name']) { ?>
                                                <option value="<?=$trainer['id']?>" selected><?=$trainer['name']?> - (<span class="h6"><?= $trainer['domain']?></span>)</option>
                                            <?php } else { ?>
                                                <option value="<?=$trainer['id']?>"><?=$trainer['name']?> - (<span class="h6"><?= $trainer['domain']?></span>)</option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>    
                            <input type="submit" name="submit" value="Update Course Page" class="btn btn-primary btn-user btn-block" />
                            <hr>
                           
                        </form>
                        <hr>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>
<!-- /.container-fluid -->

<?php 

    require('footer.php');

?>
<?php

    require('header.php');
    require('sidebar.php');
    require('DB.php');    

    if(isset($_POST['submit'])){

        // Save about page data
        if($db_object->save($_POST, $_FILES)){                   

            $message = "About Page is Saved Successfully!";
            $data = $db_object->check_about_page_data();
            extract($data);
        } else {
            $message = "About Page is not Saved!";
        }
    } else {
        $message = null;
        if($db_object->check_about_page_data() == false) {
            // Initialize the variable
            $data['title'] = '';
            $data['description'] = '';
            $data['about_image'] = '';
            $data['no_students'] = '';
            $data['no_courses'] = '';
            $data['no_trainers'] = '';
            $data['no_events'] = '';
        } else {
            // Fetch the data
            $data = $db_object->check_about_page_data();
            extract($data);
        }
    }

?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">About Us Page</h1>
    <div class="card o-hidden border-0 shadow-lg my-2">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an About Us Page!</h1>
                        </div>
                        <form class="user" method="POST" action="" enctype="multipart/form-data">
                            <h6 class="mb-2 font-weight-bold text-primary"><?= $message ?></h6>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <input type="text" name="title" value="<?= $data['title'] ?>" class="form-control border-left-primary rounded-3" placeholder="Title..." required />
                                </div>
                                <div class="col-sm-12">
                                    <textarea name="description" class="form-control border-left-primary rounded-3 mt-3" cols="30" rows="10" placeholder="Description..." required><?= $data['description'] ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="File" name="file" class="form-control border-left-primary rounded-3" required />                                
                            </div>
                            <?php 
                            if($data['about_image']){
                                echo '<div class="form-group row">';
                                echo '<div class="col-sm-12 mb-3 mb-sm-0">';
                                echo '<img src="./uploaded_images/'.$data['about_image'].'"';
                                echo 'alt="About Page Image" width="100%" height="250px" style="repeat-y;" }">';
                                echo '</div></div>';
                            }
                            ?>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="number" name="no_students" value="<?= $data['no_students'] ?>" class="form-control border-left-primary rounded-3" placeholder="No. of Students..." required />
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="number" name="no_courses" value="<?= $data['no_courses'] ?>" class="form-control border-left-primary rounded-3" placeholder="No. of Courses..." required />
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="number" name="no_trainers" value="<?= $data['no_trainers'] ?>" class="form-control border-left-primary rounded-3" placeholder="No. of Trainers..." required />
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="number" name="no_events" value="<?= $data['no_events'] ?>" class="form-control border-left-primary rounded-3" placeholder="No. of Events..." required />
                                </div>
                            </div>
                            <input type="submit" name="submit" value="Create Account Page" class="btn btn-primary btn-user btn-block" />
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
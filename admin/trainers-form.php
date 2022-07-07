<?php

    require('header.php');
    require('sidebar.php');
    require('DB.php');    

    if(isset($_POST['submit'])){

        // Save trainer page data
        if($db_object->save_trainer($_POST, $_FILES)){                   

            $message = "Trainer Page is Saved Successfully!";
            
        } else {
            $message = "Trainer Page is not Saved!";
        }
    } else {
        $message = null;
    }

?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Trainer Page</h1>
    <div class="card o-hidden border-0 shadow-lg my-2">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Trainer Page!</h1>
                        </div>
                        <form class="user" method="POST" action="" enctype="multipart/form-data">
                            <h6 class="mb-2 font-weight-bold text-primary"><?= $message ?></h6>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <input type="text" name="name" class="form-control border-left-primary rounded-3" placeholder="Trainer Name..." required />
                                </div>
                                <div class="col-sm-12">
                                    <textarea name="about_trainer" class="form-control border-left-primary rounded-3 mt-3" cols="30" rows="10" placeholder="About Trainer..." required></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="File" name="file" class="form-control border-left-primary rounded-3" required />                                
                            </div>
                            <?php 
                            // if($data['course_image']){
                            //     echo '<div class="form-group row">';
                            //     echo '<div class="col-sm-12 mb-3 mb-sm-0">';
                            //     echo '<img src="./uploaded_images/'.$data['course_image'].'"';
                            //     echo 'alt="Course Page Image" width="100%" height="250px">';
                            //     echo '</div></div>';
                            // }
                            ?>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="number" name="course_id" class="form-control border-left-primary rounded-3" placeholder="Course Id..." required />
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" name="domain" class="form-control border-left-primary rounded-3" placeholder="Domain of Working..." required />
                                </div>
                            </div>    
                            <input type="submit" name="submit" value="Create Trainer Page" class="btn btn-primary btn-user btn-block" />
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
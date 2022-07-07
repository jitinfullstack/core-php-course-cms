<?php

    require('header.php');
    require('sidebar.php');
    require('DB.php');    

    $trainers = $db_object->get_all_trainers();

    if(isset($_POST['submit'])){

        // Save about page data
        if($db_object->save_course($_POST, $_FILES)){                   

            $message = "Course Page is Saved Successfully!";
            
        } else {
            $message = "Course Page is not Saved!";
        }
    } else {
        $message = null;
    }

?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Course Page</h1>
    <div class="card o-hidden border-0 shadow-lg my-2">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Course Page!</h1>
                        </div>
                        <form class="user" method="POST" action="" enctype="multipart/form-data">
                            <h6 class="mb-2 font-weight-bold text-primary"><?= $message ?></h6>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <input type="text" name="course_name" class="form-control border-left-primary rounded-3" placeholder="Course Name..." required />
                                </div>
                                <div class="col-sm-12">
                                    <textarea name="description" class="form-control border-left-primary rounded-3 mt-3" cols="30" rows="10" placeholder="Course Description..." required></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="File" name="file" class="form-control border-left-primary rounded-3" required />                                
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="number" name="course_fee" class="form-control border-left-primary rounded-3" placeholder="Course Fee..." required />
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <select name="trainer_id" class="form-control border-left-primary rounded-3" required >
                                        <option value="">Select Your Trainer...</option>
                                        <?php foreach($trainers as $trainer){ ?>
                                                <option value="<?=$trainer['id']?>"><?=$trainer['name']?> - (<span class="h6"><?= $trainer['domain']?></span>)</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>    
                            <input type="submit" name="submit" value="Create Course Page" class="btn btn-primary btn-user btn-block" />
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
<?php

    require('header.php');
    require('sidebar.php');
    require('DB.php');

    $course_id = $_GET['id'];
    
    if(is_numeric($course_id)) {

        $course_detail = $db_object->get_single_course($course_id);

    }

?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Course Related Details...</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Course Detail</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                        <tr>
                            <th>Course Name</th>
                            <td><?=$course_detail['course_name']?></td>
                        </tr>
                        <tr>
                            <th>Course Fee</th>
                            <td><?=$course_detail['course_fee']?></td>
                        </tr>
                        <tr>
                            <th>Course Description</th>
                            <td><?=$course_detail['description']?></td>
                        </tr>
                        <tr>
                            <th>Trainer Name</th>
                            <td><?=$course_detail['name']?></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <?php if($course_detail['course_image']){ ?>
                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                        <img src="./uploaded_images/<?=$course_detail['course_image']?>" alt="Course Page Image" width="350px" height="250px">
                                        </div>
                                    </div>
                                <?php } ?>
                            </td>
                        </tr>
                </table>
            </div>
        </div>
    </div>

</div>    

<?php 

    require('footer.php');

?>
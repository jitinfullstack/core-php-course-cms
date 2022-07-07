<?php

    require('header.php');
    require('sidebar.php');
    require('DB.php');

    $courses = $db_object->get_all_courses();

?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">List of All Courses...</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">All Courses</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                    <?php if(isset($_GET['message']) and $_GET['message'] == 'deleted') { ?>
                        <h6 class="mb-3 font-weight-bold text-primary">The Course has been deleted successfully...</h6>
                    <?php } elseif(isset($_GET['message']) and $_GET['message'] == 'notdeleted') { ?>
                        <h6 class="mb-3 font-weight-bold text-primary">The Course is not deleted...</h6>
                    <?php } else { ?>
                        <h6 class="mb-3 font-weight-bold text-primary"></h6>
                    <?php } ?>   

                    <?php if(isset($_GET['message']) and $_GET['message'] == 'updated') { ?>
                        <h6 class="mb-3 font-weight-bold text-primary">The Course has been updated successfully...</h6>
                    <?php } elseif(isset($_GET['message']) and $_GET['message'] == 'notupdated') { ?>
                        <h6 class="mb-3 font-weight-bold text-primary">The Course is not updated...</h6>
                    <?php } else { ?>
                        <h6 class="mb-3 font-weight-bold text-primary"></h6>
                    <?php } ?>                
                    <thead>
                        <tr>
                            <th>Course Name</th>
                            <th>Trainer</th>
                            <th>Course Fee</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Course Name</th>
                            <th>Trainer</th>
                            <th>Course Fee</th>
                            <th>Options</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach($courses as $course){ ?>
                            <tr>
                                <td><?=$course['course_name']?></td>
                                <td><?=$course['name']?></td>
                                <td><?=$course['course_fee']?></td>
                                <td>
                                    <a href="view.php?id=<?=$course['id']?>" class="btn btn-info btn-circle"><i class="fas fa-eye"></i></a>
                                    <a href="edit.php?id=<?=$course['id']?>" class="btn btn-warning btn-circle"><i class="fas fa-edit"></i></a>
                                    <a href="javascript:void()" onclick="deleteCourse(<?=$course['id']?>)" class="btn btn-danger btn-circle"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->


<?php

require('footer.php');

?>
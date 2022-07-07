<?php

    require('DB.php');
    $course_id = $_GET['id'];
    
    if(is_numeric($course_id)) {

        if($db_object->delete_course($course_id)) {
            
            header("location:courses.php?message=deleted");
        } else  {
            header("location:courses.php?message=notdeleted");
        }

    }

?>
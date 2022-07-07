<?php

    require('DB.php');

    if($db_object->update_course($_POST, $_FILES)) {
       
        header("location:courses.php?message=updated");
    } else  {
        header("location:courses.php?message=notupdated");
    }

?>
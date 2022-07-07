<?php
   class DB {

        private $username;
        private $password;
        private $databasename;
        private $server;
        private $connection;

        function __construct()
        {
            $this->username = 'root';
            $this->password = '';
            $this->databasename = 'coding_master';
            $this->server = 'localhost';
        }

        function connect()
        {
            $this->connection = mysqli_connect($this->server, $this->username, $this->password, $this->databasename);
        }

        // Save data in mysql database

        function save($user_data, $files)
        {
            $this->connect();
            extract($user_data);

            #file name with a random number so that similar dont get replaced
            // $fn = rand(1000,10000)."-".$_FILES["file"]["name"];
        
            #temporary file name to store file
            // $tname = $_FILES["file"]["tmp_name"];
        
            #upload directory path
            // $uploads_dir = 'uploaded_images';

            #TO move the uploaded file to specific location
            // move_uploaded_file($tname, $uploads_dir.'/'.$fn);

            // File upload by tutorial
            $fn = $files['file']['name'];
            $ftemp = $files['file']['tmp_name'];

            if($this->check_about_page_data() == false) {

                // Create new record/save data
                $sql = "INSERT INTO about VALUES(null, '$title', '$description', '$fn', '$no_students', '$no_courses', '$no_trainers', '$no_events')";
                $result = mysqli_query($this->connection, $sql);
                if($result == true){
                    
                    // File upload by tutorial                
                    if($fn != '') move_uploaded_file($ftemp, "uploaded_images/$fn");
                    
                    return true;
                }
                else {
                    return false;
                }
            } else {

                // Update record
                $sql = "UPDATE about SET title='$title', description='$description', about_image='$fn', no_students='$no_students', no_courses='$no_courses', no_trainers='$no_trainers', no_events='$no_events' WHERE true ";

                $result = mysqli_query($this->connection, $sql);

                if($result == true){

                    // File upload by tutorial                
                    if($fn != '') move_uploaded_file($ftemp, "uploaded_images/$fn");
                    return true;
                } else {
                    return false;
                }
            }

        }

        // Check that about page contain data or not?
        function check_about_page_data()
        {
            $this->connect();
            $sql = "SELECT * from about";
            $result = mysqli_query($this->connection, $sql);
            $number_records = mysqli_num_rows($result);
            if($number_records == 0) {
                return false;
            } else {
                $row = mysqli_fetch_assoc($result);
                return $row;
            }
        }

        // Save course data in mysql database

        function save_course($course_data, $files)
        {
            $this->connect();
            extract($course_data);

            // File upload by tutorial
            $fn = $files['file']['name'];
            $ftemp = $files['file']['tmp_name'];

            // Create new record/save data
            $sql = "INSERT INTO courses VALUES(null, '$course_name', '$description', '$course_fee', '$fn', '$trainer_id')";
            $result = mysqli_query($this->connection, $sql);
            if($result == true){
                
                // File upload by tutorial                
                if($fn != '') move_uploaded_file($ftemp, "uploaded_images/$fn");
                
                return true;
            }
            else {
                return false;
            }

        }    
        
        // Save trainer data in mysql database

        function save_trainer($trainer_data, $files)
        {
            $this->connect();
            extract($trainer_data);

            // File upload by tutorial
            $fn = $files['file']['name'];
            $ftemp = $files['file']['tmp_name'];

            // Create new record/save data
            $sql = "INSERT INTO trainers VALUES(null, '$name', '$about_trainer', '$course_id', '$fn', '$domain')";
            $result = mysqli_query($this->connection, $sql);
            if($result == true){
                
                // File upload by tutorial                
                if($fn != '') move_uploaded_file($ftemp, "uploaded_images/$fn");
                
                return true;
            }
            else {
                return false;
            }

        }

        // fetch trainer records from database
        function get_all_trainers()
        {
            $this->connect();
            $sql = "SELECT * from trainers";

            $result = mysqli_query($this->connection, $sql);

            if($result == true){

                $data = [];
                
                while($row = mysqli_fetch_assoc($result)){

                    $data[] = $row;
                }
            }
            
            return $data;
            
        }

        // fetch courses records from database
        function get_all_courses()
        {
            $this->connect();
            $sql = "SELECT course.id, course.course_name, course.course_fee, trainer.name FROM courses course LEFT JOIN trainers trainer ON course.trainer_id = trainer.id";

            $result = mysqli_query($this->connection, $sql);

            if($result == true){

                $data = [];
                
                while($row = mysqli_fetch_assoc($result)){

                    $data[] = $row;
                }
            }
            
            return $data;
            
        }

        // delete course from database with course_id
        function delete_course($course_id)
        {
            $this->connect();            
            $sql = "DELETE FROM courses WHERE id='$course_id'";

            $result = mysqli_query($this->connection, $sql);

            if($result == true) return true; else return false;
        }
        
        // get single course from database with course_id
        function get_single_course($course_id)
        {
            $this->connect();
            $sql = "SELECT course.id, course.course_name, course.course_image, course.description, course.course_fee, trainer.name FROM courses course LEFT JOIN trainers trainer ON course.trainer_id = trainer.id  WHERE course.id='$course_id'";
            // $sql = "SELECT * FROM courses WHERE id='$course_id'";
           
            $result = mysqli_query($this->connection, $sql);

            if($result == true) {
                $row = mysqli_fetch_assoc($result);
                return $row;
            } else {
                return false;
            }

        }

        // update course 
        function update_course($post, $files = "") 
        {
            $this->connect();
            extract($post);

            // var_dump($post);
            // echo "<br>";
            // var_dump($files);
            // exit;

            if($files == "") { // If image is not selected

                $sql = "UPDATE courses SET course_name='$course_name', description='$description', course_fee='$course_fee', trainer_id='$trainer_id' WHERE id='$id' ";
               
                $result = mysqli_query($this->connection, $sql);

                // var_dump($result);
                // exit;
                

            } else {

                // File upload by tutorial
                $fn = $files['file']['name'];
                $ftemp = $files['file']['tmp_name'];

                $sql = "UPDATE courses SET course_name='$course_name', description='$description', course_fee='$course_fee', course_image='$fn', trainer_id='$trainer_id' WHERE id='$id' ";

                $result = mysqli_query($this->connection, $sql);    
                
                // var_dump($result);
                // exit;

                if($result){

                    // File upload by tutorial                
                    if($fn != '') move_uploaded_file($ftemp, "uploaded_images/$fn");
                 
                } 
            }
            
            // echo "created";
            // exit;
            return true;
        }

        function admin_login($email, $password)
        {
            $this->connect();

            // To prevent sql injection
            $email = mysqli_real_escape_string($this->connection, $email);
            $password = mysqli_real_escape_string($this->connection, $password);

            $sql = "SELECT * FROM users WHERE email='$email' and password=sha1('$password') and role=9";

            $result = mysqli_query($this->connection, $sql);

            // $row = mysqli_fetch_assoc($result);
            $number = mysqli_num_rows($result); // 1 - logged in, 0 - invalid username and password
            if($number == 1) {
                return true;
            }
            else {
                return false;
            }
        }

    } // end of class

    $db_object = new DB();
?>
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

        // get about page data from mysql database
        function get_about_data()
        {
            $this->connect();
            $sql = "SELECT * FROM about";

            $result = mysqli_query($this->connection, $sql);

            $row = mysqli_fetch_assoc($result);

            return $row;
        }

        // fetch courses records from database
        function get_all_courses()
        {
            $this->connect();
            $sql = "SELECT course.id, course.course_name, course.course_image, course.description, course.course_fee, trainer.name, trainer.domain, trainer.trainer_image FROM courses course LEFT JOIN trainers trainer ON course.trainer_id = trainer.id";

            $result = mysqli_query($this->connection, $sql);

            if($result == true){

                $data = [];
                
                while($row = mysqli_fetch_assoc($result)){

                    $data[] = $row;
                }
            }
            
            return $data;
            
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

    }

    $db_object = new DB();
    
?>    
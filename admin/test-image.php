<html>
    <body>
        <form action="" method="POST" enctype="multipart/form-data"><br>
            <label>Title</label>
            <input type="text" name="title"><br><br>
            <label>File Upload</label>
            <input type="File" name="file"><br><br>
            <input type="submit" name="submit">
        </form>
    </body>
</html>

<?php 
$localhost = "localhost"; #localhost
$dbusername = "root"; #username of phpmyadmin
$dbpassword = "";  #password of phpmyadmin
$dbname = "coding_master";  #database name
 
#connection string
$conn = mysqli_connect($localhost,$dbusername,$dbpassword,$dbname);
 
if (isset($_POST["submit"]))
 {
    print_r($_POST);

    #retrieve file title
    $title = $_POST["title"];
     
    #file name with a random number so that similar dont get replaced
    $pname = rand(1000,10000)."-".$_FILES["file"]["name"];
 
    #temporary file name to store file
    $tname = $_FILES["file"]["tmp_name"];
   
    #upload directory path
    $uploads_dir = 'uploaded_images';

    #TO move the uploaded file to specific location
    move_uploaded_file($tname, $uploads_dir.'/'.$pname);
 
    #sql query to insert into database
    $sql = "INSERT into about(title,about_image) VALUES('$title','$pname')";
 
    if(mysqli_query($conn,$sql)){
 
    echo "File Sucessfully uploaded";
    }
    else{
        echo "Error";
    }
}
 
 
?>
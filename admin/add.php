<?php

include 'connection.php';

$title = mysqli_real_escape_string($conn, $_POST['title']);
$summary = mysqli_real_escape_string($conn, $_POST['summary']);
$ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);

$extension=array("jpeg","jpg","png","gif","jfif");
$file_name=$_FILES["file"]["name"];
$file_tmp=$_FILES["file"]["tmp_name"];
$ext=pathinfo($file_name,PATHINFO_EXTENSION);
if(in_array($ext,$extension)) {
    if(!file_exists("../admin/image/".$file_name)) {
        move_uploaded_file($file_tmp=$_FILES["file"]["tmp_name"],"../admin/image/".$file_name);
        $insert="INSERT Into foods (title, summary, ingredients, image) VALUES ('$title', '$summary', '$ingredients', '$file_name')";
        $res=mysqli_query($conn, $insert);
    }
    else {
        $filename=basename($file_name,$ext);
        $newFileName=$filename.time().".".$ext;
        move_uploaded_file($file_tmp=$_FILES["file"]["tmp_name"],"../admin/image/".$newFileName);
        $insert="INSERT Into foods (title, summary, ingredients, image) VALUES ('$title', '$summary', '$ingredients', '$newFileName')";
        $res=mysqli_query($conn, $insert);
    }
}

header('location: index.php');

?>
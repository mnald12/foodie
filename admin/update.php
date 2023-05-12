<?php

include 'connection.php';

$id = mysqli_real_escape_string($conn, $_POST['id']);
$title = mysqli_real_escape_string($conn, $_POST['title']);
$summary = mysqli_real_escape_string($conn, $_POST['summary']);
$ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);

$query = "SELECT * FROM foods where id = '$id' ";
$result = $conn->query($query);
$toupdate = $result->fetch_assoc();

if($_FILES['file']['name'] !== ""){
    $extension=array("jpeg","jpg","png","gif","jfif");
    $file_name=$_FILES["file"]["name"];
    $file_tmp=$_FILES["file"]["tmp_name"];
    $ext=pathinfo($file_name,PATHINFO_EXTENSION);
    if(in_array($ext,$extension)) {
        if(!file_exists("../admin/image/".$file_name)) {
            move_uploaded_file($file_tmp=$_FILES["file"]["tmp_name"],"../admin/image/".$file_name);
            $update="UPDATE foods set image = '$file_name' where id = '$id' ";
            $res=mysqli_query($conn, $update);
        }
        else {
            $filename=basename($file_name,$ext);
            $newFileName=$filename.time().".".$ext;
            move_uploaded_file($file_tmp=$_FILES["file"]["tmp_name"],"../admin/image/".$newFileName);
            $update="UPDATE foods set image = '$newFileName' where id = '$id' ";
            $res=mysqli_query($conn, $update);
        }
    }
}

if($title !== $toupdate['title']){
    $update = "UPDATE foods SET title = '$title' where id = '$id' ";
    $result = $conn->query($update);
}

if($summary !== $toupdate['summary']){
    $update = "UPDATE foods SET summary = '$summary' where id = '$id' ";
    $result = $conn->query($update);
}

if($ingredients !== $toupdate['ingredients']){
    $update = "UPDATE foods SET ingredients = '$ingredients' where id = '$id' ";
    $result = $conn->query($update);
}

header('location: index.php');

?>
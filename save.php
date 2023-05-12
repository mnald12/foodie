<?php
   
    $database = 'log';
    $username = 'root';
    $host = 'localhost';
    $password = '';
    
    $conn = new mysqli($host, $username, $password, $database);
    
    if($conn->connect_error){
        die("Connection Failed: ". $conn->connect_error());
    }

    $username = $conn->real_escape_string($_POST['uname']);
    $password = $conn->real_escape_string($_POST['psw']);
    $rpassword = $conn->real_escape_string($_POST['rpsw']);

    if($password == $rpassword){
        $insert="INSERT Into user (username, password) VALUES ('$username', '$password')";
        $res=mysqli_query($conn, $insert);
        session_start();
        $_SESSION['error_message'] = 'you have successfuly registered';
        header('location: index.php');
    }
    else{
        session_start();
        $_SESSION['error_message'] = 'password not match!';
        header('location: register.php');
    }

?>
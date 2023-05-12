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

    $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($query);
        
    if($result->num_rows){
        $row = $result->fetch_assoc();
        session_start();
        $_SESSION['userID'] = $row['id'];
        header('location: admin/index.php');
    }
    else{
        session_start();
        $_SESSION['error_message'] = 'username or password is incorrect!';
        header('location: index.php');
    }

?>
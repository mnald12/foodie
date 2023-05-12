
<?php

session_start();
if(!isset($_SESSION['userID'])){
   header('location: ../index.php');
}

include 'connection.php';

$id = mysqli_real_escape_string($conn, $_GET['id']);

$q = "SELECT * FROM foods Where id = '$id' ";
$lr = $conn->query($q);
$foods = $lr->fetch_assoc(); 

?>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FOODIE</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css?v=<?= time(); ?>" />
    <style>
        .btn-primary {
            color: #fff;
            background: #16a083;
        }
        .btn-warning {
            color: #fff;
            background: orange !important;
        }
        .btn-warning:hover{
            background-color: rgb(227, 152, 14) !important;
        }
        .btn-danger {
            color: #fff;
            background: red !important;
        }
        .btn-danger:hover{
            background-color: rgb(236, 18, 18) !important;
        }
        .food-title{
            font-size: 32px;
        }
        .summary{
            font-size: 17px !important;
            margin: 12px 0;
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <div class="navbar-container container">
            <input type="checkbox" name="" id="">
            <div class="hamburger-lines">
                <span class="line line1"></span>
                <span class="line line2"></span>
                <span class="line line3"></span>
            </div>
            <ul class="menu-items">
                <li><a href="index.php#home">Home</a></li>
                <li><a href="index.php#about">About</a></li>
                <li><a href="index.php#food">Category</a></li>
                <li><a href="index.php#food-menu">Menu</a></li>
                <li><a href="create.php">Add Food</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
            <h1 class="logo">Foodie</h1>
        </div>
    </nav>
    <section class="showcase-area" id="showcase">
        <div class="showcase-container">
            <h1 class="main-title" id="home">Eat Right Food</h1>
            <p>Eat Healty, it is good for our health.</p>
        </div>
    </section>

    <section id="about">
        <div class="about-wrapper container">
            <div class="about-text">
                <h2><?= nl2br($foods['title']) ?></h2>
                <br>
                <p><?= nl2br($foods['summary']) ?></p>
                <br>
                <p><?= nl2br($foods['ingredients']) ?></p>
            </div>
            <div class="about-img">
                <img src="image/<?= $foods['image'] ?>" alt="food" />
            </div>
        </div>
    </section>

    <footer id="footer">
        <h2>FOODIE &copy; all rights reserved</h2>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="app.js"></script>

</html>

</body>

</html>
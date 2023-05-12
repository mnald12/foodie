
<?php

session_start();
if(!isset($_SESSION['userID'])){
   header('location: ../index.php');
}

include 'connection.php';

$foods = [];
$q = "SELECT * FROM foods Order by id desc";
$lr = $conn->query($q);
while($row = $lr->fetch_assoc()){
   $foods[] = $row; 
}

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
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#food">Category</a></li>
                <li><a href="#food-menu">Menu</a></li>
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
            <a href="#food-menu" class="btn btn-primary">Menu</a>
        </div>
    </section>

    <section id="about">
        <div class="about-wrapper container">
            <div class="about-text">
                <p class="small">About Us</p>
                <h2>We've been making Delicious food for the last for 10 years</h2>
                <p>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Esse ab
                    eos omnis, nobis dignissimos perferendis et officia architecto,
                    fugiat possimus eaque qui ullam excepturi suscipit aliquid optio,
                    maiores praesentium soluta alias asperiores saepe commodi
                    consequatur? Perferendis est placeat facere aspernatur!
                </p>
            </div>
            <div class="about-img">
                <img src="foodie.jpg" alt="food" />
            </div>
        </div>
    </section>
    <section id="food">
        <h2>Types of food</h2>
        <div class="food-container container">
            <div class="food-type fruite">
                <div class="img-container">
                    <img src="foodie.jpg" alt="error" />
                    <div class="img-content">
                        <h3>Fruite</h3>
                        <a href="https://en.wikipedia.org/wiki/Fruit" class="btn btn-primary" target="blank">learn
                            more</a>
                    </div>
                </div>
            </div>
            <div class="food-type vegetable">
                <div class="img-container">
                    <img src="https://i.postimg.cc/Nffm6Rkk/food2.jpg" alt="error" />
                    <div class="img-content">
                        <h3>Vegetable</h3>
                        <a href="https://en.wikipedia.org/wiki/Vegetable" class="btn btn-primary" target="blank">learn
                            more</a>
                    </div>
                </div>
            </div>
            <div class="food-type grin">
                <div class="img-container">
                    <img src="https://i.postimg.cc/76ZwsPsd/food3.jpg" alt="error" />
                    <div class="img-content">
                        <h3>Grain</h3>
                        <a href="https://en.wikipedia.org/wiki/Grain" class="btn btn-primary" target="blank">learn
                            more</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="food-menu">
        <h2 class="food-menu-heading">Food Menu</h2>
        <div class="food-menu-container container">
            <?php foreach($foods as $row): ?>
                <div class="food-menu-item">
                <div class="food-img">
                    <img src="image/<?= $row['image'] ?>" alt="" />
                </div>
                <div class="food-description">
                    <h2 class="food-title"><?= $row['title'] ?></h2>
                    <p class="summary"><?= nl2br($row['summary']) ?></p>
                    <a class="btn btn-primary" href="ingredients.php?id=<?= $row['id'] ?>">View Ingredients</a>
                    <a class="btn btn-warning" href="edit.php?id=<?= $row['id'] ?>">Edit</a>
                    <a class="btn btn-danger" href="delete.php?id=<?= $row['id'] ?>">Delete</a>
                </div>
            </div>
            <?php endforeach ?>
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
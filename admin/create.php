
<?php

session_start();
if(!isset($_SESSION['userID'])){
   header('location: ../index.php');
}


include 'connection.php';

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
        form{
            width: 100%;
            height: 100%;
        }
        form label{
            display: block;
            font-size: 18px;
            margin-top: 12px;
            margin-bottom: 6px;
        }
        form input{
            width: 100%;
            border: none;
            outline: none;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 0 1px 0 black;
            font-size: 17px;
        }
        form textarea{
            width: 100%;
            height: 200px;
            border: none;
            outline: none;
            padding: 10px;
            border-radius: 5px;
            font-size: 17px;
            box-shadow: 0 0 1px 0 black;
        }
        form button{
            border: none;
            outline: none;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 0 1px 0 black;
            font-size: 17px;
            margin-top: 14px;
            cursor: pointer;
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
                <p class="small">Add Food</p>
                <form action="add.php" method="post" enctype="multipart/form-data">
                    <label for="file">Image</label>
                    <input id="file" type="file" name="file" onchange="c(event)">
                    <br>
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title">
                    <br>
                    <label for="sum">Summary</label>
                    <textarea name="summary" id="sum"></textarea>
                    <br>
                    <label for="ing">Ingredients</label>
                    <textarea name="ingredients" id="ing"></textarea>
                    <button>Submit</button>
                </form>
            </div>
            <div class="about-img">
                <img id="img" src="" alt="The picture you upload will appear here" />
            </div>
        </div>
    </section>

    <footer id="footer">
        <h2>FOODIE &copy; all rights reserved</h2>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="app.js"></script>

    <script>
        const c = (event) => {
            const img = document.getElementById('img')
            img.src = URL.createObjectURL(event.target.files[0])+'#toolbar=0'
        }
      </script>

</html>

</body>

</html>
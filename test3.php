<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikacja - konsultacje</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="index2.css">
    
    <style>
        
        .przycisk1
        {
            border-style: solid;
            border-radius: 50px;
            border-color: #85d138;
            color: #85d138;
            padding: 10px;
            width: 200px;
            transition: background-color 0.5s;
        }
        
        .przycisk1:hover
        {
            color: white;
            background-color: #85d138;
            cursor: pointer;
        }
        
        .przycisk2
        {
            border-style: solid;
            border-radius: 50px;
            border-color: red;
            color: red;
            padding: 10px;
            width: 150px;
            transition: background-color 0.5s;
        }
        
        .przycisk2:hover
        {
            color: white;
            background-color: red;
            cursor: pointer;
        }
        
        
        .navbar
        {
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.2);
        }
        
    </style>
    
</head>
<body>
    <nav class="navbar">
        <div class="logo_container">
            <a href="index.php">
                <img src="images/ue_logo.png" class="logo" alt="">
            </a>
        </div>
        <div class="account_container">
            <a href="">
                <img src="images/person_circle.svg" class="img_account" alt="">
            </a>
        </div>
    </nav>

    <div class="content" style="text-align:center; padding-top:100px">
        
        <form action="up.php" method="POST" enctype="multipart/form-data">
            
            <input type="file" name="file">
            <button type="submit" name="submit">Wyślij</button>
            
        </form>
        
    </div>

    

    <footer>
        <div class="second_logo_container">
            <img src="images/ue_logo2.jpg" alt="">
        </div>
        <div class="information_container">
            <h5>Uniwersytet Ekonomiczny w Katowicach</h5>
            <p>ul. 1 Maja 50, 40-287 Katowice</p>
            <p>tel. +48 32 257 70 00</p>
        </div>
        <div class="social_media_container">
            <h5>Odwiedź nasze profile</h5>
            <div class="social_media_imgs">
                <a href=""><img src="images/twitter.svg" alt=""></a>
                <a href=""><img src="images/facebook.svg" alt=""></a>
                <a href=""><img src="images/youtube.svg" alt=""></a>
                <a href=""><img src="images/instagram.svg" alt=""></a>
            </div>
        </div>
    </footer>
</body>
</html>
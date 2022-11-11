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

    <header class="header">
        <div class="message_container">
            <h1>Zapisz się na konsultacje!</h1>
        </div>
        <div class="input_container">
            <input type="text" placeholder="Znajdź swojego nauczyciela"/>
            <button class="button_search">
                <img src="images/search_icon.svg" alt="">
            </button>
        </div>
    </header>

    <section class="title_container">
        <h2>Nauczyciele akademiccy</h2>
    </section>

    <main class="teachers">
        <div class="teacher_container">
            <div class="profile_img_container">
                <img src="images/teacher_img.jpg" alt="">
            </div>
            <div class="description_container">
                <h3>dr Jan Kowalski</h3>
                <p>Katedra informatyki</p>
            </div>
            <div class="details_container">
                <a href="podstrona.php"><button class="deatils_btn">Sprawdź szczegóły</button> </a>
            </div>
        </div>

        <div class="teacher_container">
            <div class="profile_img_container">
                <img src="images/teacher_img.jpg" alt="">
            </div>
            <div class="description_container">
                <h3>dr Jan Kowalski</h3>
                <p>Katedra informatyki</p>
            </div>
            <div class="details_container">
                <button class="deatils_btn">Sprawdź szczegóły</button>
            </div>
        </div>

        <div class="teacher_container">
            <div class="profile_img_container">
                <img src="images/teacher_img.jpg" alt="">
            </div>
            <div class="description_container">
                <h3>dr Jan Kowalski</h3>
                <p>Katedra informatyki</p>
            </div>
            <div class="details_container">
                <button class="deatils_btn">Sprawdź szczegóły</button>
            </div>
        </div>


        <div class="teacher_container">
            <div class="profile_img_container">
                <img src="images/teacher_img.jpg" alt="">
            </div>
            <div class="description_container">
                <h3>dr Jan Kowalski</h3>
                <p>Katedra informatyki</p>
            </div>
            <div class="details_container">
                <button class="deatils_btn">Sprawdź szczegóły</button>
            </div>
        </div>


        <div class="teacher_container">
            <div class="profile_img_container">
                <img src="images/teacher_img.jpg" alt="">
            </div>
            <div class="description_container">
                <h3>dr Jan Kowalski</h3>
                <p>Katedra informatyki</p>
            </div>
            <div class="details_container">
                <button class="deatils_btn">Sprawdź szczegóły</button>
            </div>
        </div>

        <div class="teacher_container">
            <div class="profile_img_container">
                <img src="images/teacher_img.jpg" alt="">
            </div>
            <div class="description_container">
                <h3>dr Jan Kowalski</h3>
                <p>Katedra informatyki</p>
            </div>
            <div class="details_container">
                <button class="deatils_btn">Sprawdź szczegóły</button>
            </div>
        </div>
    </main>


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
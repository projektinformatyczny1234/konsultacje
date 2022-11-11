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
    
        .form-box
        {
            width: 600px;
            height: 1000px;
            border-radius: 30px;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.5);
            margin-top: 50px;
            margin-bottom: 50px;
            padding: 30px;
            padding-left: 75px;
            padding-right: 75px;
            
        }
        
        .przycisk
        {
            border-style: solid;
            border-radius: 50px;
            border-color: #85d138;
            color: #85d138;
            padding: 10px;
            width: 200px;
            transition: background-color 0.5s;
        }
        
        .przycisk:hover
        {
            color: white;
            background-color: #85d138;
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

    <div class="content" style="text-align:center">
        
        <div class="form-box">
            
            <form action="send-form.php" method="post">
                
                <label>Ile czasu będziesz potrzebował?</label>

                <select name="czas">
                      <option id="piec" value="5">5 minut</option>
                      <option id="dziesiec" value="10">10 minut</option>
                      <option id="dwadziescia" value="20">20 minut</option>
                      <option id="trzydziesci" value="30">30 minut</option>
                </select>
                
                <script>
                
                    var t=235;
                    
                    if(t<30){trzydziesci.style.display='none';}
                    if(t<20){dwadziescia.style.display='none';}
                    if(t<10){dziesiec.style.display='none';}
                    
                </script>
                
                <input type="email" name="email">
                
                <button type="sumbit">WYŚLIJ</button>
                
                <?php if (isset($_GET['error'])) { ?>
     	        	<p class="error"><?php echo $_GET['error']; ?></p>
                	<?php } ?> 
                
            </form>
            
        </div>
        
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
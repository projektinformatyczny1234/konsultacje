<!DOCTYPE html>

<?php
require_once "connect.php";
$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

    $idk=$_GET["idk"];
	
	if ($polaczenie->connect_errno!=0)
	{
		echo "Error: ";
	}
	else
	{
	    $query = "SELECT * FROM Konsultacje WHERE id_konsultacji = '$idk'";
	    $result = mysqli_query($polaczenie, $query);
	    
	    

        while ($record = mysqli_fetch_assoc($result))
        {
            
            $Data=date($record['data']);
            $IDN=$record['nauczyciel'];
            $Forma=$record['forma'];
            $GS=$record['g_start'];
            $GK=$record['g_stop'];
            $TL=$record['time'];
        }
        
        
        $query2 = "SELECT * FROM Nauczyciele WHERE id_nauczyciela = '$IDN'";
        $result2 = mysqli_query($polaczenie, $query2);
        
        while ($record2 = mysqli_fetch_assoc($result2))
        {
            
            $Imie = $record2['imie'];
            $Nazwisko = $record2['nazwisko'];
            $Stopien = $record2['stopien_naukowy'];
        }
        
        
        $result->free_result();
        $result2->free_result();
		$polaczenie->close();
	}
?>


<script>
    
    var GS = <?php echo json_encode($GS);?> ;
    var GK = <?php echo json_encode($GK);?> ;
    var t = <?php echo json_encode($TL);?> ;
    var FORMA = <?php echo json_encode($Forma);?> ;
    var DATA = <?php echo json_encode($Data);?> ;
    var GSH = <?php echo json_encode($GS);?> ; 
    var GSM = <?php echo json_encode($GS);?> ;
    var GKH = <?php echo json_encode($GK);?> ; 
    var GKM = <?php echo json_encode($GK);?> ;
    

    GSH = Math.floor(GS/60);GSM = GS % 60; if(GSM == '0') {GSM = '00'}
    GKH = Math.floor(GK/60);GKM = GK % 60; if(GKM == '0') {GKM = '00'}
        
    var TERMIN = GSH + ':' + GSM + '  -  ' + GKH + ':' + GKM;
    
    
    
</script>


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
            height: 1100px;
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
        
        .error
        {
            color: red;
            border-style: solid;
            border-color: red;
            border-radius: 10px;
            width: 300px;
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
        
        <div class="form-box" >
            
            
            <h2>Formularz zgłoszeniowy</h2><br><hr><br>
            
           <br> <h3>Szczegółowe informacje</h3><br><br>
            
            <div class="details" style="text-align:left; margin-left:auto; margin-right:auto">
                <h4>Prowadzący: <?php echo $Stopien; echo ' '; echo $Imie; echo ' '; echo $Nazwisko ?></h4>
                <h4>Termin konsultacji: <script>document.write(DATA)</script></h4>
                <h4>Czas trwania: <script>document.write(TERMIN)</script></h4>
                <h4>Forma konsultacji: <script>document.write(FORMA)</script></h4>
            </div><br><br><hr><br>
            
           <br><h3>Dane studenta</h3><br>
           
           <?php if (isset($_GET['error'])) { ?> <p class="error"><?php echo $_GET['error']; ?></p><?php } ?><br>
            
            <form action="send-form.php" method="post" enctype="multipart/form-data" style="text-align:left">
                
                <input type="number" name="idk" style="display:none" value="<?php echo $idk?>">
                <input type="number" name="IDN" style="display:none" value="<?php echo $IDN?>">
                <input type="number" name="time_left" style="display:none" value="<?php echo $TL?>">
                
                <label>Imię</label><input type="text" name="imie" style="margin-left: 49px" value="<?php if(isset($_GET['imie'])){echo $_GET['imie'];} ?>"><br><br>
                <label>Nazwisko</label><input type="text" name="nazwisko" style="margin-left: 10px" value="<?php if(isset($_GET['nazwisko'])){echo $_GET['nazwisko'];} ?>"><br><br>
                <label>Email</label><input type="email" name="email" style="margin-left: 40px" value="<?php if(isset($_GET['email'])){ echo $_GET['email']; }?>"><br><br>
                
                <label>Ile czasu będziesz potrzebował?</label>
                <select name="czas" style="margin-left: 10px">
                    <option id="piec" value="5">5 minut</option>
                    <option id="dziesiec" value="10">10 minut</option>
                    <option id="dwadziescia" value="20">20 minut</option>
                    <option id="trzydziesci" value="30">30 minut</option>
                </select><br><br>
                
                <label>Załącz plik</label>
                <input type="file" name="file" style="margin-left: 10px"><br><br>
                
                <label>Dodatkowe informacje dla prowadzącego</label>
                <textarea rows="6" cols="54" name="dodatkowe" style="padding: 10px; resize: none"></textarea><br><br><br>
                
                <script>
                
                    if(t<30){trzydziesci.style.display='none';}
                    if(t<20){dwadziescia.style.display='none';}
                    if(t<10){dziesiec.style.display='none';}
                    
                </script>
           
                <div style="text-align:center; margin-left:auto; margin-right:auto;">
     	        <button type="submit" name="submit" style="border-style: none; background-color: white; font-size: 18px;"><div class="przycisk">Wyślij zgłoszenie</div></button>
     	        </div>
                    
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
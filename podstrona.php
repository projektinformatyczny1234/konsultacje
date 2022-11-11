<!DOCTYPE html>

<?php
require_once "connect.php";
$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

    //$id=2;
    $id=$_GET["id"];
	
	if ($polaczenie->connect_errno!=0)
	{
		echo "Error: ";
	}
	else
	{
	    $query = "SELECT * FROM Konsultacje WHERE nauczyciel = '$id'";
	    $result = mysqli_query($polaczenie, $query);
	    
	    
	    
	    
	    
	    
	    
        $i = 0;
        while ($record = mysqli_fetch_assoc($result))
        {
            
            $ActiveDaysPHP[$i]=date( $record['data'] );
            $IDK[$i]=$record['id_konsultacji'];
            $Forma[$i]=$record['forma'];
            
            $GS[$i]=$record['g_start'];
            $GK[$i]=$record['g_stop'];
            $TL[$i]=$record['time'];
            
            $i = $i+1;
     
            
        }
        
        
        $query2 = "SELECT * FROM Nauczyciele WHERE id_nauczyciela = '$id'";
        $result2 = mysqli_query($polaczenie, $query2);
        
        $j = 0;
        while ($record2 = mysqli_fetch_assoc($result2))
        {
            
            $Imie = $record2['imie'];
            $Nazwisko = $record2['nazwisko'];
            $Stopien = $record2['stopien_naukowy'];
            $Katedra = $record2['katedra'];
            $Telefon = $record2['telefon'];
            $Email = $record2['email'];
            $Link = $record2['link_do_k_online'];
            $Adres = $record2['adres'];
            $Zdjecie = $record2['zdjecie'];
            
            $j = $j+1;
     
            
        }
        
        $result->free_result();
        $result2->free_result();
		$polaczenie->close();
	}
?>

<script>
    
    var id = <?php echo json_encode($id);?>
    
    var IDK = <?php echo json_encode($IDK);?> ;
    
    
    
    var GS = <?php echo json_encode($GS);?> ;
    var GK = <?php echo json_encode($GK);?> ;
    var TL = <?php echo json_encode($TL);?> ;
    var Forma = <?php echo json_encode($Forma);?> ;
    
    var D = <?php echo json_encode($ActiveDaysPHP);?> ;
    
    var Active = <?php echo json_encode($ActiveDaysPHP);?> ;
    var ActiveD = <?php echo json_encode($ActiveDaysPHP);?> ;
    var ActiveM = <?php echo json_encode($ActiveDaysPHP);?> ;
    var ActiveY = <?php echo json_encode($ActiveDaysPHP);?> ;
    
    for(let i = 0; i< ActiveD.length; i++)
    {
        if(ActiveD[i].charAt(8) == "0"){ActiveD[i]= ActiveD[i].charAt(9);}
        else{ActiveD[i]= ActiveD[i].charAt(8) + ActiveD[i].charAt(9);}
        
        if(ActiveM[i].charAt(5) == "0"){ActiveM[i]= ActiveM[i].charAt(6);}
        else{ActiveM[i]= ActiveM[i].charAt(5) + ActiveM[i].charAt(6);}
        
        ActiveY[i]= ActiveY[i].charAt(0) + ActiveY[i].charAt(1) + ActiveY[i].charAt(2) + ActiveY[i].charAt(3);
        Active[i]= ActiveY[i] + ActiveD[i] + "d" + ActiveM[i];
    }
    
    
    var GSH = <?php echo json_encode($GS);?> ; 
    var GSM = <?php echo json_encode($GS);?> ;
    var GKH = <?php echo json_encode($GK);?> ; 
    var GKM = <?php echo json_encode($GK);?> ;
    
    for(let i=0; i<GS.length; i++)
    {
        GSH[i] = Math.floor(GS[i]/60);
        GSM[i] = GS[i] % 60; if(GSM[i] == '0') {GSM[i] = '00'}
        
        
        GKH[i] = Math.floor(GK[i]/60);
        GKM[i] = GK[i] % 60; if(GKM[i] == '0') {GKM[i] = '00'}
        
        //document.write(GSH[i] + ' : ' + GSM[i] + '  -  ' + GKH[i] + ' : ' + GKM[i]);
        //document.write('<br>');
    }
    
    
</script>

<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikacja - konsultacje</title>
 
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
    />
    
    <link
        rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap"
    />
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="index2.css">
    
    <style>
        
                * {
          margin: 0;
          padding: 0;
          box-sizing: border-box;
          font-family: "Quicksand", sans-serif;
        }
        
        html {
          font-size: 62.5%;
        }
        
        .container {
          width: 100%;
          height: 100vh;
          background-color: gray;
          color: #eee;
          display: flex;
          justify-content: center;
          align-items: center;
        }
        
        .tooltip
        {
            position: relative;
            cursor: pointer;
            padding: 7px;
            font-size: 25px;
            font-weight: bold;
            font-family: sans-serif;
        }
        
        .tooltipText
        {
            position: absolute;
            left: 50%;
            top: 0;
            transform: translateX(-50%);
            background-color: black;
            color: white;
            white-space: nowrap;
            padding: 10px 15px;
            border-radius: 7px;
            visibility: hidden;
            opacity: 0;
            transition: opacity 0.4s ease;
        }
        
        .tooltipText::before
        {
            content: "";
            position: absolute;
            left: 50%;
            top: 100%;
            transform: translateX(-50%);
            border: 15px solid;
            border-color: #000 #0000 #0000 #0000;
        }
        
        .tooltip:hover .tooltipText
        {
            top: -210%;
            visibility: visible;
            opacity: 1;
            
        }
        
        
        .tooltipText2
        {
            position: absolute;
            left: 50%;
            top: 0;
            transform: translateX(-50%);
            background-color: black;
            color: white;
            white-space: nowrap;
            padding: 10px 15px;
            border-radius: 7px;
            visibility: hidden;
            opacity: 0;
            transition: opacity 0.4s ease;
        }
        
        .tooltipText2::before
        {
            content: "";
            position: absolute;
            left: 50%;
            top: 100%;
            transform: translateX(-50%);
            border: 15px solid;
            border-color: #000 #0000 #0000 #0000;
        }
        
        .tooltip:hover .tooltipText2
        {
            top: -250%;
            visibility: visible;
            opacity: 1;
            
        }
        
        
        
        .calendar {
          width: 45rem;
          height: 52rem;
          background-color: var(--bg_color);
          box-shadow: 0 0.5rem 3rem rgba(0, 0, 0, 0.4);
        }
        
        .month {
          width: 100%;
          height: 12rem;
          background-color: #05172f;
          display: flex;
          justify-content: space-between;
          align-items: center;
          padding: 0 2rem;
          text-align: center;
          text-shadow: 0 0.3rem 0.5rem rgba(0, 0, 0, 0.5);
        }
        
        .month i {
          font-size: 2.5rem;
          cursor: pointer;
        }
        
        .month h1 {
          font-size: 3rem;
          font-weight: 400;
          text-transform: uppercase;
          letter-spacing: 0.2rem;
        }
        
        .month p {
          font-size: 1.6rem;
          display: none;
        }
        
        .weekdays {
          width: 100%;
          height: 5rem;
          padding: 0 0.4rem;
          display: flex;
          align-items: center;
        }
        
        .weekdays div {
          font-size: 1.5rem;
          font-weight: 400;
          letter-spacing: 0.1rem;
          width: calc(44.2rem / 7);
          display: flex;
          justify-content: center;
          align-items: center;
          text-shadow: 0 0.3rem 0.5rem rgba(0, 0, 0, 0.5);
        }
        
        .days {
          width: 100%;
          display: flex;
          flex-wrap: wrap;
          padding: 0.2rem;
        }
        
        .days div {
          font-size: 1.4rem;
          margin: 0.3rem;
          width: calc(40.2rem / 7);
          height: 5rem;
          display: flex;
          justify-content: center;
          align-items: center;
          text-shadow: 0 0.3rem 0.5rem rgba(0, 0, 0, 0.5);
          transition: background-color 0.2s;
        }
        
        .days div:hover:not(.today,.active, .full) {
          background-color: #262626;
          border: 0.2rem solid #777;
          border-radius: 15px;
          cursor: pointer;
        }
        
        .prev-date,
        .next-date {
          opacity: 0.5;
        }
        
        .today {
          background-color: #05172f;
          border-radius: 15px;
        }
        
        .active {
          background-color: limegreen;
          border-radius: 15px;
        }
        
        .active:hover {
          border-style: solid;
          border-color: limegreen;
          background-color: #05172f;
        }
        
        .full {
          background-color: red;
          border-radius: 15px;
        }
        
        .full:hover {
          border-style: solid;
          border-color: red;
          background-color: #05172f;
        }
        
        .today:hover {
          background-color: black;
        }
        
        .day
        {
            font-size: 1.4rem;
          margin: 0.3rem;
          width: calc(40.2rem / 7);
          height: 5rem;
          display: flex;
          justify-content: center;
          align-items: center;
          text-shadow: 0 0.3rem 0.5rem rgba(0, 0, 0, 0.5);
          transition: background-color 0.2s;
        }
        
        
        
.button-box {
	width: 240px;
	margin: 15px auto;
	padding-right: 0px;
	position: relative;
	border-radius: 30px;
	background: #05172f;
	border-color: white;
	box-shadow: 0 0.5rem 2rem rgba(0, 0, 0, 0.2);
}

.toggle-btn {
	padding: 10px 15px 10px 35px;
	cursor: pointer;
	background: transparent;
	border: 0;
	outline: none;
	position: relative;
	text-align: center;
}

#btn {
	left: 0;
	top: 0;
	position: absolute;
	width: 120px;
	height: 100%;
	background: limegreen;
	border-radius: 30px;
	transition: .5s;
}
        
        
.photo
{
    width: 220px;
    height: 220px;
    border-radius: 50%;
    border-style: none;
    margin-top: 30px;
    margin-left:auto;
    margin-right:auto;
    background-image: url('<?php echo $Zdjecie ?>');
    background-size: 220px 220px;
    background-position: center;
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

<div class="content" style="width: 100%; height: auto;">
        
        <div class="inside" style="border-style: none; height: 900px; width: 1000px; margin-left:auto; margin-right:auto; margin-top: 50px;">
        
                 <div class="info" style="border-style: none; background-color: var(--bg_color); border-radius:20px; height:800px; width: 320px; margin: 20px; margin-left: 60px; margin-top: 10px; font-family: 'Poppins', sans-serif; color: white; font-size: 12px; text-align:center; float: left; box-shadow: 0 0.5rem 2rem rgba(0, 0, 0, 0.4);">
            
            <div class="photo"></div>
            <br>
            <h1 style="font-family: 'Poppins', sans-serif; font-weight: bold; font-size:24px"><?php echo $Stopien; echo ' '; echo $Imie; echo ' '; echo $Nazwisko ?></h1>
            <h1 style="font-family: 'Poppins', sans-serif; font-weight: bold; font-size:18px"><?php echo 'Katedra '; echo $Katedra ?></h1><br>
            
            <hr style="margin-left:40px; margin-right:40px;">
            
            <br><br><br>
               <h1 style="font-family: 'Poppins', sans-serif; font-weight: bold; font-size:18px;">Telefon:</h1>
             <h1 style="font-family: 'Poppins', sans-serif; font-weight: bold; font-size:18px;"><?php echo $Telefon ?></h1> <br>
             
            <h1 style="font-family: 'Poppins', sans-serif; font-weight: bold; font-size:18px;">Email:</h1>
             <h1 style="font-family: 'Poppins', sans-serif; font-weight: bold; font-size:18px;"><?php echo $Email ?></h1> <br>
             
            <h1 style="font-family: 'Poppins', sans-serif; font-weight: bold; font-size:18px;">Link do konsultacji online:</h1>
             <h1 style="font-family: 'Poppins', sans-serif; font-weight: bold; font-size:18px;"><?php echo $Link ?></h1> <br>
             
            <h1 style="font-family: 'Poppins', sans-serif; font-weight: bold; font-size:18px;">Adres:</h1>
             <h1 style="font-family: 'Poppins', sans-serif; font-weight: bold; font-size:18px;">A<?php echo $Adres ?></h1> <br>
            
         
            
            
            
        </div>
        
        <div class="main" style="border-style: none; float:left; height:800px; width: 500px; margin: 10px; margin-top:10px; text-align: center; margin-right:auto; margin-left: 50px; float:left;">
            
            
            <h1 style="margin-left: 0px; font-size:48px; color: #05172f; font-family: 'Poppins', sans-serif; white-space: nowrap;"><?php echo $Stopien; echo ' '; echo $Imie; echo ' '; echo $Nazwisko ?></h1><br>
            
                
               <h1 style=" color: #05172f; font-size:20px; font-weight:bold; font-family: 'Poppins', sans-serif;"> Wybierz formę konsultacji </h1>
                
            	<div class="form-box">
            		<div class="button-box">
            			<div id="btn"></div>
            			<button type="button" class="toggle-btn" onclick="leftClick()" style="	font-weight: bold; text-align: center; margin-left:0px; font-size: 14px; color:white;">Online</button>
            			<button type="button" class="toggle-btn" onclick="rightClick()" style="	font-weight: bold; margin-left:0px; font-size: 14px; color:white;">Stacjonarne</button>
            		</div>
            	</div>
            	
            	
            
            <br><br>
            
            
        
                
                    <div class="calendar" style="border-radius: 20px; margin-left: auto; margin-right:auto">
                    <div class="month" style="border-top-left-radius: 20px; border-top-right-radius: 20px; color: white;">
                      <i class="fas fa-angle-left prev" style="border-radius: 5%; padding-left:20px;"></i>
                      
                     
                     <div class="date" style="border-radius: 5%">
                
                        <h1></h1>
                        <h2></h2>
                       <p></p>
                      </div>
                      
                      
                      <i class="fas fa-angle-right next" style="border-radius: 5%; padding-right:20px;"></i>
                      
                      
                    </div>
                    <div class="weekdays" style="color: white">
                      <div>Nie</div>
                      <div>Pon</div>
                      <div>Wto</div>
                      <div>Śro</div>
                      <div>Czw</div>
                      <div>Pio</div>
                      <div>Sob</div>
                    </div>
                    <div class="days" style="border-radius: 5%; color: white"></div>
                  </div>
                
          
        
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
    
    <script src="script31.js"></script>
    
</body>
</html>
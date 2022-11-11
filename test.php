<! DOCTYPE html>

<?php
require_once "connect.php";
$connect = @new mysqli($host, $db_user, $db_password, $db_name);
	
	if ($connect->connect_errno!=0)
	{
		echo "Error: ";
	}
	else
	{
	    $query = 'SELECT * FROM Nauczyciele';
	    $result = mysqli_query($connect, $query);
	    
        $i = 0;

        while ($record = mysqli_fetch_assoc($result))
        {
            $imie[$i]=$record['imie'];
            $nazwisko[$i]=$record['nazwisko'];
            $stopien_naukowy[$i]=$record['stopien_naukowy'];
            $katedra[$i]=$record['katedra'];
            $zdjecie[$i]=$record['zdjecie'];
            
            $i = $i+1;
            
        }
        
        $result->free_result();
		$connect->close();
	}
?>

<script>
    
    var Imiona = <?php echo json_encode($imie);?>;
    var Nazwiska = <?php echo json_encode($nazwisko);?>;
    var Stopnie_naukowe = <?php echo json_encode($stopien_naukowy);?>;
    var Katedry = <?php echo json_encode($katedra);?>;
    var Zdjecia = <?php echo json_encode($zdjecie);?>;
    
    for (let i = 0; i < Imiona.length; i++)
    {
        document.write(Stopnie_naukowe[i] + ' ');
        document.write(Imiona[i] + ' ');
        document.write(Nazwiska[i] + '<br>');
        document.write('Katedra ' + Katedry[i] + '<br>');
        document.write('<img src="' + Zdjecia[i] + '" height="100" width="100" >' + '<br><br>');
    }
    
</script>

<html lang="pl">
    
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Konsultacje UE Katowice</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    </head>
    
    <body>
       
       <h1> <?php echo $stopien_naukowy[0]; echo ' '; echo $imie[0]; echo ' '; echo $nazwisko[0] ?> </h1>
       <img src="<?php echo $zdjecie[0] ?>" width="200" height="200 >
       
    </body>
    
</html>
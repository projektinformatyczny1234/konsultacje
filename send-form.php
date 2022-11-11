<?php 

session_start(); 
require_once "connect.php";
$conn = @new mysqli($host, $db_user, $db_password, $db_name);
if (!$conn) {echo "Connection failed!";}

if (isset($_POST['czas'])&&isset($_POST['imie'])&&isset($_POST['nazwisko'])&&isset($_POST['email']))
{

	function validate($data)
	{
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$czas = validate($_POST['czas']);
	$id_prowadzacego = validate($_POST['IDN']);
	$id_konsultacji_z = validate($_POST['idk']);
	$imie_s = validate($_POST['imie']);
	$nazwisko_s = validate($_POST['nazwisko']);
	$email_s = validate($_POST['email']);
	$dodatkowe_info = validate($_POST['dodatkowe']);
	$time_left = validate($_POST['time_left']) - $czas;
	$user_data = 'idk='. $id_konsultacji_z. '&IDN='. $id_prowadzacego. '&imie='. $imie_s. '&nazwisko='. $nazwisko_s. '&email='. $email_s;
	
	$fileNameNew = "brak";
	
	if (empty($imie_s)){header("Location: formularz.php?error=Podaj swoje imię&$user_data");exit();}
	else if (empty($nazwisko_s)){header("Location: formularz.php?error=Podaj swoje nazwisko&$user_data");exit();}
    else if (empty($email_s)){header("Location: formularz.php?error=Podaj adres email&$user_data");exit();}
    else
    {
        
            if(isset($_POST['submit']))
            {
                $file = $_FILES['file'];
                
                $fileName = $_FILES['file']['name'];
                $fileTmpName = $_FILES['file']['tmp_name'];
                $fileSize = $_FILES['file']['size'];
                $fileError = $_FILES['file']['error'];
                $fileType = $_FILES['file']['type'];
                
                $fileExt = explode('.', $fileName);
                $fileActualExt = strtolower(end($fileExt));
                
                $allowed = array('jpg', 'jpeg', 'png', 'pdf');
                
                if($fileActualExt)
                {
                    if($allowed)
                    {
                        if($fileError === 0)
                        {
                            if($fileSize< 5000000)
                            {
                                $fileNameNew = uniqid('', true).".".$fileActualExt;
                                $fileDestination = '/storage/ssd5/044/19769044/public_html/przeslane_pliki/'.$fileNameNew;
                                move_uploaded_file($fileTmpName, $fileDestination);
                                
                            }
                            else
                            {
                                header("Location: formularz.php?error=Za duży rozmiar pliku&$user_data");exit();
                            }
                        }
                        else{
                            header("Location: formularz.php?error=Błąd przesyłania pliku&$user_data");exit();
                        }
                    }
                    else{header("Location: formularz.php?error=Ten format pliku jest nieobsługiwany&$user_data");exit();}
                }
            }
        
        $sql = "INSERT INTO Zgloszenia(id_prowadzacego, id_konsultacji_z, imie_s, nazwisko_s, email_s, czas, dodatkowe_info, plik) VALUES('$id_prowadzacego', '$id_konsultacji_z', '$imie_s', '$nazwisko_s', '$email_s', '$czas', '$dodatkowe_info', '$fileNameNew')";
        
        $result = mysqli_query($conn, $sql);
        
        if ($result)
        {
        $sql2="UPDATE Konsultacje SET time='$time_left' WHERE id_konsultacji='$id_konsultacji_z'";
        $result2 = mysqli_query($conn, $sql2);
        
        if ($result2)
        {
            header("Location: potwierdzenie.php"); $conn->close();}
            else{$conn->close();header("Location: formularz.php");exit();}
        }
    }
}
else
{$conn->close();header("Location: formularz.php&fail");exit();}

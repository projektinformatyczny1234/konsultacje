<?php

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
    
    if(in_array($fileActualExt, $allowed))
    {
        if($fileError === 0)
        {
            if($fileSize< 5000000)
            {
                $fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDestination = '/storage/ssd5/044/19769044/public_html/przeslane_pliki/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                header("Location: test3.php?super");
            }
            else
            {
                echo "rucham ci matke";
            }
        }
        else{
            echo "chuj ci w dupe";
        }
    }
    else
    {
        echo"Spierdalaj!";
    }
}
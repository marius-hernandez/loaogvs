<?php
session_start();
include_once '../include/dbh.inc.php';
$first= $_SESSION['userfirst'];
$last= $_SESSION['userlast'];
$name = $first . $last;
if (isset($_POST['submit'])) {
    $file= $_FILES['file'];
    
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $filetype = $_FILES['file']['type'];

    $fileExt= explode('.', $fileName);
    $fileActualExt= strtolower(end($fileExt));

    $allowed = array('png', 'haha');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 500000) {
                $fileNameNew = $name . "." . $fileActualExt;
                $fileDestination=  'signatures/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                
                header("location: url.php?grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=one&error=none&data-slide-to=1");


            }
            else{
                echo "Your file is too big!";
            }
        }
        else{
            echo "There was an error uploading your file!";
        }
    }
    else{
        echo "You cannot upload this type of file!";
    }

}
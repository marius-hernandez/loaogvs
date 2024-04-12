<?php
    session_start();
    require '../../include/dbh.inc.php';
    require '../../include/functions.inc.php';
    error_reporting (E_ALL ^ E_NOTICE);

if (isset($_POST["submit"])) {
    $first= $_SESSION['userfirst'];
    $last= $_SESSION['userlast'];
    $class= $_POST["class"];
    $grade=$_POST["grade"];
    $track=$_POST["track"];
    $strand=$_POST["strand"];
    $spec=$_POST["spec"];

   
        if (emptyInputClass($class, $grade, $track, $strand, $spec) !== false) {
            header("location: ../verti-header.php?name=section&&error=emptyInput");
            exit();
            
        }

        else if (classesExists($conn, $class) !== false) {
            header("location: ../verti-header.php?name=section&&error=classExists");
            exit();
        }

        else if (specMatch($strand, $spec) !== false) {
            header("location: ../verti-header.php?name=section&&error=specMatch");
            exit();
        }
        
        else{
            createSections($conn, $last, $first, $class, $grade, $track, $strand, $spec);
            
            exit();
        }
}

else{
    header("location: ../change-name.php?error=waw");
    exit();
}

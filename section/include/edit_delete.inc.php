<?php

session_start();
include_once '../../include/dbh.inc.php';
include_once '../../include/functions.inc.php';



$first= $_SESSION['userfirst'];
$last= $_SESSION['userlast'];
$class= $_POST['class'];
$grade=$_POST['grade'];
$track=$_POST['track'];
$strand=$_POST['strand'];


    if (emptyInputClass($class, $grade, $track, $strand) !== false) {
        header("location: ../edit_delete.php?name=edit&&error=emptyInput");
        exit();
    }

    else if (classExists($conn, $class, $grade) !== false) {
        header("location: ../edit_delete.php?name=edit&&error=classExists");
        exit();
    }
    
    else{
        updateSection($conn, $last, $first, $class, $grade, $track, $strand);
        exit();
    }




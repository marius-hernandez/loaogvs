<?php

require_once '../../include/dbh.inc.php';
require_once '../../include/functions.inc.php';

    $lrn= $_POST['lrn'];
    $grade= $_POST['grade'];
    $section= $_POST['section'];
    $track= $_POST['track'];
    $strand= $_POST['strand'];
    $spec= $_POST['spec'];
    $section= $_POST['section'];
    $gender= $_POST['gender'];
    $first= $_POST['first'];
    $last= $_POST['last'];
    $middle= $_POST['middle'];
    $suffix= $_POST['suffix'];
    $email= $_POST['email'];
    $pwd= $_POST['pwd'];
    $conpwd= $_POST['conpwd'];
 
if (isset($_POST['submit'])) {
    if (emptyInputSignup($lrn, $grade, $section, $gender, $first, $last, $pwd, $conpwd) !== false) {
        header("location: ../verti-header.php?error=emptyinput&&name=add-student");
        exit();
    }
    else if (nameExists($conn, $first, $last, $middle) !== false) {
        header("location: ../verti-header.php?error=nameExists&&name=add-student");
        exit();
    }
    
    else if (specMatch($strand, $spec) !== false) {
        header("location: ../verti-header.php?name=add-student&&error=specMatch");
        exit();
    }
    

    else if (lrnExists($conn, $lrn) !== false) {
        header("location: ../verti-header.php?error=lrnExists&&name=add-student");
        exit();
    }
    else if (emailExists($conn, $email) !== false) {
        header("location: ../verti-header.php?error=emailExists&&name=add-student");
        exit();
    }

    else if (invalidEmail($email) !== false) {
        header("location: ../verti-header.php?error=invalidEmail&&name=add-student");
        exit();
    }

    else if (pwdMatch($pwd, $conpwd) !== false) {
        header("location: ../verti-header.php?error=pwdMatch&&name=add-student");
        exit();
    }

    else {
        createUser($conn, $lrn, $grade, $track, $strand, $spec, $section, $gender,$first, $last, $middle, $suffix, $email, $pwd);
        exit();
    }

}
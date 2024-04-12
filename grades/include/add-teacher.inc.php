<?php

require_once '../../include/dbh.inc.php';
require_once '../../include/functions.inc.php';
if (isset($_POST["submit"])) {
        $year=$_POST['year'];
        $id=$_POST['id'];
        $gender=$_POST['gender'];
        $first=$_POST['first'];
        $last=$_POST['last'];
        $middle=$_POST['middle'];
        $suffix=$_POST['suffix'];
        $email=$_POST['email'];
        $pwd=$_POST['pwd'];
        $conpwd=$_POST['conpwd'];
        $type="teacher";
        $admin="teacher";


        echo'<p>Teacher!</p>';
        if (emptyInputSignupT($year, $id, $gender, $first, $last, $email, $pwd, $conpwd, $year, $id) !== false) {
            header("location: ../verti-header.php?error=emptyinput&&name=teacher");
            exit();
        }
        
        else if (nameExistsT($conn, $first, $last, $middle) !== false) {
            header("location: ../verti-header.php?error=nameExists&&name=teacher");
            exit();
        }

        else if (idExistsT($conn, $year, $id) !== false) {
            header("location: ../verti-header.php?error=idExists&&name=teacher");
            exit();
        }
        else if (emailExistsT($conn, $email) !== false) {
            header("location: ../verti-header.php?error=emailExists&&name=teacher");
            exit();
        }

        else if (invalidEmail($email) !== false) {
            header("location: ../verti-header.php?error=invalidEmail&&name=teacher");
            exit();
        }
    
        else if (pwdMatch($pwd, $conpwd) !== false) {
            header("location: ../verti-header.php?error=pwdnotmatch&&name=teacher");
            exit();
        }
    
        else if (invalidpwd($pwd) !== false) {
            header("location: ../verti-header.php?error=invalidpwd&&name=teacher");
            exit();
        }
        else {
            createUserT($conn, $admin, $year, $id, $gender, $first, $last, $middle, $suffix, $email, $pwd, $type);
            exit();
        }
    
}

else {
    header("location: ../signup.php");
    exit();
}

        


    


    

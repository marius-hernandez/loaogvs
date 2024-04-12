<?php

require_once 'dbh.inc.php';
require_once 'functions.inc.php';
if (isset($_POST["submit"])) {
        $teacherid=$_POST['teacherid'];
        $gender=$_POST['gender'];
        $first=$_POST['first'];
        $last=$_POST['last'];
        $middle=$_POST['middle'];
        $suffix=$_POST['suffix'];
        $email=$_POST['email'];
        $pwd=$_POST['pwd'];
        $conpwd=$_POST['conpwd'];
        $admin="request";
        $type="teacher";
        $teacherid= (explode("-",$teacherid));


        echo'<p>Teacher!</p>';
        
        if (nameExistsT($conn, $first, $last, $middle) !== false) {
            header("location: ../signup.php?error=nameExists");
            exit();
        }

        else if (idExistsT($conn, $teacherid) !== false) {
            header("location: ../signup.php?error=idExists");
            exit();
        }
        else if (emailExistsT($conn, $email) !== false) {
            header("location: ../signup.php?error=emailExists");
            exit();
        }

        else if (invalidEmail($email) !== false) {
            header("location: ../signup.php?error=invalidemail");
            exit();
        }
    
        else if (pwdMatch($pwd, $conpwd) !== false) {
            header("location: ../signup.php?error=pwdnotmatch");
            exit();
        }
    
        else if (invalidpwd($pwd) !== false) {
            header("location: ../signup.php?error=invalidpwd");
            exit();
        }
        else if (requestExists($conn, $teacherid) !== false) {
            header("location: ../signup.php?error=idExists");
            exit();
        }
        else {
            createUserT($conn, $admin, $teacherid, $gender, $first, $last, $middle, $suffix, $email, $pwd, $type);
            exit();
        }
    
}

else {
    header("location: ../signup.php");
    exit();
}

        


    


    

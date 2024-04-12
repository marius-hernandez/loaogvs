<?php

require_once '../../include/dbh.inc.php';
require_once '../../include/functions.inc.php';
if (isset($_POST["submit"])) {
        $year="10";
        $id="10";
        $gender=$_POST['gender'];
        $first=$_POST['first'];
        $last=$_POST['last'];
        $middle=$_POST['middle'];
        $suffix=$_POST['suffix'];
        $email=$_POST['email'];
        $pwd=$_POST['pwd'];
        $conpwd=$_POST['conpwd'];
        $type="registrar";
        $admin="registrar";


        echo'<p>Admin!</p>';
        if (emptyInputSignupA($gender, $first, $last, $email, $pwd, $conpwd) !== false) {
            header("location: ../verti-header.php?error=emptyinput&&name=admin");
            exit();
        }
        
        else if (nameExistsT($conn, $first, $last, $middle) !== false) {
            header("location: ../verti-header.php?error=nameExists&&name=admin");
            exit();
        }

        else if (emailExistsT($conn, $email) !== false) {
            header("location: ../verti-header.php?error=emailExists&&name=admin");
            exit();
        }

        else if (invalidEmail($email) !== false) {
            header("location: ../verti-header.php?error=invalidEmail&&name=admin");
            exit();
        }
    
        else if (pwdMatch($pwd, $conpwd) !== false) {
            header("location: ../verti-header.php?error=pwdnotmatch&&name=admin");
            exit();
        }
    
        else if (invalidpwd($pwd) !== false) {
            header("location: ../verti-header.php?error=invalidpwd&&name=admin");
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

        


    


    

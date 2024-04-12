<?php
include_once 'dbh.inc.php';
include_once 'functions.inc.php';
    $not= mysqli_real_escape_string($conn, $_GET['not']);
      if(isset($_POST['submit'])){
        $pwd = $_POST['pwd'];
        $email = $_POST['email'];
        $emailExists= emailExists($conn,$email);
        $emailExistsT= emailExistsT($conn,$email);

        if ($emailExists xor $emailExistsT=== false) {
            echo "<script>alert('Wrong login details.')</script>";
            header("location: ../login.php?error=wrong");
        }
        else if ($emailExists) {
          $pwdHashed = $emailExists["user_pwd"];
          $type = $emailExists["type"];
          $checkPwd=password_verify($pwd, $pwdHashed);
          if ($checkPwd === false) {
            echo "<script>alert('Wrong password')</script>";
            header("location: ../login.php?error=wrong");
          }
          elseif ($checkPwd === true) {
                if ($type =='student') {
                  session_start();
                  $_SESSION['login'] = true;
                  $_SESSION['type'] = $emailExists['type'];
                  $_SESSION['userfirst'] = $emailExists['user_first'];
                  $_SESSION['userlast'] = $emailExists['user_last'];
                  $_SESSION['email'] = $emailExists['user_email'];
                  header("location: ../grades/verti-header.php?name=first");
                }
              else {
                session_start();
                echo "<script>alert('error!')</script>";
                header("location: ../login.php?error=wrong");
              }
            }
            else{
              echo "<script>alert('Password do not match!')</script>";
              header("location: ../login.php?error=wrong");
            }
        }
        else if ($emailExistsT) {
               $pwdHashed = $emailExistsT["user_pwd"];
               $type = $emailExistsT["type"];
               $checkPwd=password_verify($pwd, $pwdHashed);
       
               if ($checkPwd === true) {
                  echo "<script>alert('Wrong password')</script>";
                  header("location: ../login.php?error=wrong");

               }
               elseif ($checkPwd === false) {
                    if ($type =='admin') {
                      session_start();
                      $_SESSION['login'] = true;
                      $_SESSION['type'] = $emailExistsT['type'];
                      $_SESSION['userfirst'] = $emailExistsT['user_first'];
                      $_SESSION['userlast'] = $emailExistsT['user_last'];
                      $_SESSION['email'] = $emailExistsT['user_email'];
                      header("location: ../add/verti-header.php?name=home");
                    } 
                    elseif ($type == 'teacher') {
                      session_start();
                      
                      $_SESSION['login'] = true;
                      $_SESSION['type'] = $emailExistsT['type'];
                      $_SESSION['id'] = $emailExistsT['id'];
                      $_SESSION['userfirst'] = $emailExistsT['user_first'];
                      $_SESSION['userlast'] = $emailExistsT['user_last'];
                      $_SESSION['email'] = $emailExistsT['user_email'];
                      $first = $_SESSION['userfirst'];
                      $last = $_SESSION['userlast'];
                      $sqll="UPDATE teacher SET status= '1' WHERE user_first='$first' AND user_last='$last'";
                      $resultl = mysqli_query($conn, $sqll);  
                      header("location: ../section/verti-header.php?name=home");
                    }
                    elseif ($type == 'registrar') {
                      session_start();
                      $_SESSION['login'] = true;
                      $_SESSION['type'] = $emailExistsT['type'];
                      $_SESSION['id'] = $emailExistsT['id'];
                      $_SESSION['userfirst'] = $emailExistsT['user_first'];
                      $_SESSION['userlast'] = $emailExistsT['user_last'];
                      $_SESSION['email'] = $emailExistsT['user_email'];
                      header("location: ../registrar/verti-header.php?name=home");
                    }
                    else {
                      session_start();
                      header("location: ../login.php");
                    }
                  }
                  else{
                    echo "<script>alert('Wrong password')</script>";
                    header("location: ../login.php?error=wrong");
                  }
                }
            else {
                header("location: ../login.php?error=none");
            }
    
      }

      else{
        header("location: ../login.php");
      }
      ?>
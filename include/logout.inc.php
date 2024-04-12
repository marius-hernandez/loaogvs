<?php
session_start();
$first = $_SESSION['userfirst'];
$last = $_SESSION['userlast'];
$sqll="UPDATE teacher SET status= '0' WHERE user_first='$first' AND user_last='$last'";
$resultl = mysqli_query($conn, $sqll);  
    session_unset();
    session_destroy();
    header("location: ../login.php");
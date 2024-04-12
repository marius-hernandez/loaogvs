<?php

$first= $_SESSION['userfirst'];
   $last= $_SESSION['userlast'];
    
    $sql="SELECT * from section WHERE teacher_last= '$last' AND teacher_first = '$first';";
      $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt, $sql)) {
         header("location: ../subject.php?error=stmtfailed");
         exit();
      }
     $result = mysqli_query($conn, $sql);
     $queryResults= mysqli_num_rows($result);

     $row = mysqli_fetch_assoc($result);
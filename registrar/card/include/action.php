<?php
    include_once '../../../include/functions.inc.php';
    include_once '../../../include/dbh.inc.php';
    session_start();

    $sqlsemester = "SELECT * from disable_semester WHERE id='1'";
    $stmt=mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt, $sqlsemester)) {
        echo "Stmt";
        exit();
      }
    $resultsemester= mysqli_query($conn, $sqlsemester);
    $queryResultssemester = mysqli_num_rows($resultsemester);
    $rowsemester = mysqli_fetch_assoc($resultsemester);

    $first = $_POST['s_first'];
    $last = $_POST['s_last'];
    $radio = $_POST['radio'];
    $section= mysqli_real_escape_string($conn, $_GET['section']);
    $sem= mysqli_real_escape_string($conn, $_GET['sem']);
    error_reporting(0);

    $core1first = $_POST['core1first'];
    $core2first = $_POST['core2first'];
    $core3first = $_POST['core3first'];
    $app1first = $_POST['app1first'];
    $app2first = $_POST['app2first'];
    $app3first = $_POST['app3first'];
    $app4first = $_POST['app4first'];
    $app5first = $_POST['app5first'];
        
    $core1sec = $_POST['core1sec'];
    $core2sec = $_POST['core2sec'];
    $core3sec = $_POST['core3sec'];
    $app1sec = $_POST['app1sec'];
    $app2sec = $_POST['app2sec'];
    $app3sec = $_POST['app3sec'];
    $app4sec = $_POST['app4sec'];
    $app5sec = $_POST['app5sec'];

    $core1ave = $_POST['core1ave'];
    $core2ave = $_POST['core2ave'];
    $core3ave = $_POST['core3ave'];
    $app1ave = $_POST['app1ave'];
    $app2ave = $_POST['app2ave'];
    $app3ave = $_POST['app3ave'];
    $app4ave = $_POST['app4ave'];
    $app5ave = $_POST['app5ave'];

    $ave1 = $_POST['ave1'];
    $ave2 = $_POST['ave2'];
    $ave = $_POST['ave'];

    $seccore1first = $_POST['seccore1first'];
    $seccore2first = $_POST['seccore2first'];
    $seccore3first = $_POST['seccore3first'];
    $seccore4first = $_POST['seccore4first'];
    $secapp1first = $_POST['secapp1first'];
    $secapp2first = $_POST['secapp2first'];
    $secapp3first = $_POST['secapp3first'];
    $secapp4first = $_POST['secapp4first'];
        
    $seccore1sec = $_POST['seccore1sec'];
    $seccore2sec = $_POST['seccore2sec'];
    $seccore3sec = $_POST['seccore3sec'];
    $seccore4sec = $_POST['seccore4sec'];
    $secapp1sec = $_POST['secapp1sec'];
    $secapp2sec = $_POST['secapp2sec'];
    $secapp3sec = $_POST['secapp3sec'];
    $secapp4sec = $_POST['secapp4sec'];

    $seccore1ave = $_POST['seccore1ave'];
    $seccore2ave = $_POST['seccore2ave'];
    $seccore3ave = $_POST['seccore3ave'];
    $seccore4ave = $_POST['seccore4ave'];
    $secapp1ave = $_POST['secapp1ave'];
    $secapp2ave = $_POST['secapp2ave'];
    $secapp3ave = $_POST['secapp3ave'];
    $secapp4ave = $_POST['secapp4ave'];

    $secave1 = $_POST['secave1'];
    $secave2 = $_POST['secave2'];
    $secave = $_POST['secave'];

    $emailparent = $_POST['emailparent'];
    $emailparent1 = $_POST['emailparent1'];
    $emailparent2 = $_POST['emailparent2'];
    $emailparent3 = $_POST['emailparent3'];
    $mess = $_POST['mess'];
    $t_first= $_SESSION['userfirst'];
    $t_last= $_SESSION['userlast'];
    $nameteacher=$t_first . $t_last;
    $file="../signatures/" . $nameteacher . ".png";

    if(file_exists($file))
    {
      /*
      $sqlstudent = "SELECT * from student WHERE user_lrn='$lrn'";
      $stmt=mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sqlstudent)) {
          header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=2");
          exit();
        }
      $resultstudent= mysqli_query($conn, $sqlstudent);
      $rows = mysqli_fetch_assoc($resultstudent);


      $sql3 = "SELECT * from student";
      $stmt=mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql3)) {
          header("location: verti-header.php?error=stmtfailed&name=list&&section=".$rowclass['class_name']."");
          exit();
        }
      $result3= mysqli_query($conn, $sql3);
      while ($row3 = mysqli_fetch_assoc($result3)) { 
        if ($emailparent == $row3['user_email']) {
              header("location: ../url.php?grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=two&error=studentparent");
              exit();
        }
      }
      */
    $sql = "UPDATE ".$section."_student SET parent_email=?, parent_email1=?, parent_email2=?, parent_email3=?, sent=? WHERE student_first=? AND student_last=?";
          $stmt=mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
              echo "stmt";
              exit();
            }
          $result= mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          mysqli_stmt_bind_param($stmt, "sssssss", $emailparent, $emailparent1, $emailparent2, $emailparent3, $mess, $first, $last);
          mysqli_stmt_execute($stmt);
          


    if (isset($_POST['save']) || isset($_POST['parent']) || (isset($_POST['student'])) || (isset($_POST['all']))) {
      $sqlupdate = "SELECT * from ".$section."_grade_first_first WHERE student_first='".$first."' AND student_last='".$last."'";
      $stmt=mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sqlupdate)) {
          header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
          exit();
        }
      $resultupdate= mysqli_query($conn, $sqlupdate);
      $queryResults = mysqli_num_rows($resultupdate);
      mysqli_stmt_execute($stmt);
        if ($queryResults>0) {
          $sql = "UPDATE ".$section."_grade_first_first SET first_c_1=?, first_c_2=?, first_c_3=?, first_a_1=?, first_a_2=?, first_a_3=?, first_a_4=?, first_a_5=?, first_first_ave= ? WHERE student_first=? AND student_last=?";
          $stmt=mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
              header("../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
              exit();
            }
          $result= mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          mysqli_stmt_bind_param($stmt, "sssssssssss", $core1first, $core2first, $core3first, $app1first, $app2first, $app3first, $app4first, $app5first, $ave1, $first, $last);
          mysqli_stmt_execute($stmt);
        }
        else{
          $sql = "INSERT INTO ".$section."_grade_first_first (student_first, student_last, first_c_1, first_c_2, first_c_3, first_a_1, first_a_2, first_a_3, first_a_4, first_a_5, first_first_ave) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
          $stmt=mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
              echo "stmt";
              exit();
            }
          $result= mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          mysqli_stmt_bind_param($stmt, "sssssssssss", $first, $last, $core1first, $core2first, $core3first, $app1first, $app2first, $app3first, $app4first, $app5first, $ave1);
          mysqli_stmt_execute($stmt);          
        }


      $sqlupdate1 = "SELECT * from ".$section."_grade_first_sec WHERE student_first='".$first."' AND student_last='".$last."'";
      $stmt=mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sqlupdate1)) {
          header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
          exit();
        }
      $resultupdate1= mysqli_query($conn, $sqlupdate1);
      $queryResults1 = mysqli_num_rows($resultupdate1);
      mysqli_stmt_execute($stmt);
        if ($queryResults1>0) {
          $sql4 = "UPDATE ".$section."_grade_first_sec SET first_c_1=?, first_c_2=?, first_c_3=?, first_a_1=?, first_a_2=?, first_a_3=?, first_a_4=?, first_a_5=?, first_sec_ave=? WHERE student_first=? AND student_last=?";
          $stmt=mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql4)) {
              header("location: ../verti-header.php?error=stmtfailed&name=list&&section=".$rowclass['class_name']."");
              exit();
            }
          $result= mysqli_query($conn, $sql4);
          $row = mysqli_fetch_assoc($result);
          mysqli_stmt_bind_param($stmt, "sssssssssss", $core1sec, $core2sec, $core3sec, $app1sec, $app2sec, $app3sec, $app4sec, $app5sec, $ave2, $first, $last);
          mysqli_stmt_execute($stmt);
        }
        else{
          $sql5 = "INSERT INTO ".$section."_grade_first_sec (student_first, student_last, first_c_1, first_c_2, first_c_3, first_a_1, first_a_2, first_a_3, first_a_4, first_a_5, first_sec_ave) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
          $stmt=mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql5)) {
              header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
              exit();
            }
          $result= mysqli_query($conn, $sql5);
          $row = mysqli_fetch_assoc($result);
          mysqli_stmt_bind_param($stmt, "sssssssssss", $first, $last, $core1sec, $core2sec, $core3sec, $app1sec, $app2sec, $app3sec, $app4sec, $app5sec, $ave2);
          mysqli_stmt_execute($stmt);
        }



      $sqlupdate2 = "SELECT * from ".$section."_ave WHERE student_first='".$first."' AND student_last='".$last."'";
      $stmt=mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sqlupdate2)) {
          header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
          exit();
        }
      $resultupdate2= mysqli_query($conn, $sqlupdate2);
      $queryResults2 = mysqli_num_rows($resultupdate2);
      mysqli_stmt_execute($stmt);
        if ($queryResults2>0) {
          $sql6 = "UPDATE ".$section."_ave SET ave_c_1=?, ave_c_2=?, ave_c_3=?, ave_a_1=?, ave_a_2=?, ave_a_3=?, ave_a_4=?, ave_a_5=?, ave=? WHERE student_first=? AND student_last=?";
          $stmt=mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql6)) {
              echo "stmt";
              exit();
            }
          $result= mysqli_query($conn, $sql6);
          $row = mysqli_fetch_assoc($result);
          mysqli_stmt_bind_param($stmt, "sssssssssss", $core1ave, $core2ave, $core3ave, $app1ave, $app2ave, $app3ave, $app4ave, $app5ave, $ave, $first, $last);
          mysqli_stmt_execute($stmt);
        }
        else{
          $sql7 = "INSERT INTO ".$section."_ave (student_first, student_last, ave_c_1, ave_c_2, ave_c_3, ave_a_1, ave_a_2, ave_a_3, ave_a_4, ave_a_5, ave) VALUES (?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
          $stmt=mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql7)) {
              header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
              exit();
            }
          $result= mysqli_query($conn, $sql7);
          $row = mysqli_fetch_assoc($result);
          mysqli_stmt_bind_param($stmt, "sssssssssss", $first, $last, $core1ave, $core2ave, $core3ave, $app1ave, $app2ave, $app3ave, $app4ave, $app5ave, $ave);
          mysqli_stmt_execute($stmt);
          }
          if (isset($_POST['parent'])) {
            $sql5 = "UPDATE ".$section."_grade_sec_first SET sent='0' WHERE student_first=? AND student_last=?";
            $stmt=mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql5)) {
            header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=two");
            exit();
            }
            $result= mysqli_query($conn, $sql5);
            mysqli_stmt_bind_param($stmt, "ss", $first, $last);
            mysqli_stmt_execute($stmt);
            
            if ($rowsemester['first']=="yes") {
              if ($radio=="first") {
                header('location: pdf_new/ict-prog-1st.php?section='.$section.'&first='.$first.'&last='.$last.'&grading=first');
                exit();
              }
              elseif ($radio=="second") {
                header('location: pdf_new/ict-prog-1st.php?section='.$section.'&first='.$first.'&last='.$last.'&grading=second');
                exit();
              }
                
              
            }
            else {
              echo "error";
              exit();
            }

          }
          header("location: ../url.php?grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=one&error=none");
          exit();
      }
    
      else if (isset($_POST['student'])) {

        $sql5 = "UPDATE ".$section."_grade_first_first SET sent='1' WHERE student_first=? AND student_last=?";
        $stmt=mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql5)) {
        header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=2");
        exit();
        }
        $result= mysqli_query($conn, $sql5);
        mysqli_stmt_bind_param($stmt, "ss", $first, $last);
        mysqli_stmt_execute($stmt);
      
        $sql6 = "UPDATE ".$section."_student SET ifsent='Sent' WHERE student_first=? AND student_last=?";
        $stmt=mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql6)) {
        header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=2");
        exit();
        }
        $result6= mysqli_query($conn, $sql6);
        mysqli_stmt_bind_param($stmt, "ss", $first, $last);
        mysqli_stmt_execute($stmt);
        header("location: ../url.php?grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=one&error=none");
      }
      else if (isset($_POST['all'])) {
        $sql5 = "UPDATE ".$section."_grade_first_first SET sent='1' WHERE student_first=? AND student_last=?";
        $stmt=mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql5)) {
        header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=2");
        exit();
        }
        $result= mysqli_query($conn, $sql5);
        mysqli_stmt_bind_param($stmt, "ss", $first, $last);
        mysqli_stmt_execute($stmt);
      
        $sql6 = "UPDATE ".$section."_student SET ifsent='Sent' WHERE student_first=? AND student_last=?";
        $stmt=mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql6)) {
        header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=2");
        exit();
        }
        $result6= mysqli_query($conn, $sql6);
        mysqli_stmt_bind_param($stmt, "ss", $first, $last);
        mysqli_stmt_execute($stmt);

        $sqlupdate = "SELECT * from ".$section."_grade_first_first WHERE student_first='".$first."' AND student_last='".$last."'";
      $stmt=mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sqlupdate)) {
          header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
          exit();
        }
      $resultupdate= mysqli_query($conn, $sqlupdate);
      $queryResults = mysqli_num_rows($resultupdate);
      mysqli_stmt_execute($stmt);
        if ($queryResults>0) {
          $sql = "UPDATE ".$section."_grade_first_first SET first_c_1=?, first_c_2=?, first_c_3=?, first_a_1=?, first_a_2=?, first_a_3=?, first_a_4=?, first_a_5=?, first_first_ave= ? WHERE student_first=? AND student_last=?";
          $stmt=mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
              header("../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
              exit();
            }
          $result= mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          mysqli_stmt_bind_param($stmt, "sssssssssss", $core1first, $core2first, $core3first, $app1first, $app2first, $app3first, $app4first, $app5first, $ave1, $first, $last);
          mysqli_stmt_execute($stmt);
          header("location: ../url.php?grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
        }
        else{
          $sql = "INSERT INTO ".$section."_grade_first_first (student_first, student_last, first_c_1, first_c_2, first_c_3, first_a_1, first_a_2, first_a_3, first_a_4, first_a_5, first_first_ave) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
          $stmt=mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
              header("location: ../verti-header.php?error=stmtfailed&name=list&&section=".$rowclass['class_name']."");
              exit();
            }
          $result= mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          mysqli_stmt_bind_param($stmt, "sssssssssss", $first, $last, $core1first, $core2first, $core3first, $app1first, $app2first, $app3first, $app4first, $app5first, $ave1);
          mysqli_stmt_execute($stmt);
          header("location: ../url.php?grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1&error=none");
          
        }


      $sqlupdate1 = "SELECT * from ".$section."_grade_first_sec WHERE student_first='".$first."' AND student_last='".$last."'";
      $stmt=mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sqlupdate1)) {
          header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
          exit();
        }
      $resultupdate1= mysqli_query($conn, $sqlupdate1);
      $queryResults1 = mysqli_num_rows($resultupdate1);
      mysqli_stmt_execute($stmt);
        if ($queryResults1>0) {
          $sql4 = "UPDATE ".$section."_grade_first_sec SET first_c_1=?, first_c_2=?, first_c_3=?, first_a_1=?, first_a_2=?, first_a_3=?, first_a_4=?, first_a_5=?, first_sec_ave=? WHERE student_first=? AND student_last=?";
          $stmt=mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql4)) {
              header("location: ../verti-header.php?error=stmtfailed&name=list&&section=".$rowclass['class_name']."");
              exit();
            }
          $result= mysqli_query($conn, $sql4);
          $row = mysqli_fetch_assoc($result);
          mysqli_stmt_bind_param($stmt, "sssssssssss", $core1sec, $core2sec, $core3sec, $app1sec, $app2sec, $app3sec, $app4sec, $app5sec, $ave2, $first, $last);
          mysqli_stmt_execute($stmt);
          header("location: ../url.php?grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
        }
        else{
          $sql5 = "INSERT INTO ".$section."_grade_first_sec (student_first, student_last, first_c_1, first_c_2, first_c_3, first_a_1, first_a_2, first_a_3, first_a_4, first_a_5, first_sec_ave) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
          $stmt=mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql5)) {
              header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
              exit();
            }
          $result= mysqli_query($conn, $sql5);
          $row = mysqli_fetch_assoc($result);
          mysqli_stmt_bind_param($stmt, "sssssssssss", $first, $last, $core1sec, $core2sec, $core3sec, $app1sec, $app2sec, $app3sec, $app4sec, $app5sec, $ave2);
          mysqli_stmt_execute($stmt);
          header("location: ../url.php?grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1&error=none");
        }



      $sqlupdate2 = "SELECT * from ".$section."_ave WHERE student_first='".$first."' AND student_last='".$last."'";
      $stmt=mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sqlupdate2)) {
          header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
          exit();
        }
      $resultupdate2= mysqli_query($conn, $sqlupdate2);
      $queryResults2 = mysqli_num_rows($resultupdate2);
      mysqli_stmt_execute($stmt);
        if ($queryResults2>0) {
          $sql6 = "UPDATE ".$section."_ave SET ave_c_1=?, ave_c_2=?, ave_c_3=?, ave_a_1=?, ave_a_2=?, ave_a_3=?, ave_a_4=?, ave_a_5=?, ave=? WHERE student_first=? AND student_last=?";
          $stmt=mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql6)) {
              header("location: ../verti-header.php?error=stmtfailed&name=list&&section=".$rowclass['class_name']."");
              exit();
            }
          $result= mysqli_query($conn, $sql6);
          $row = mysqli_fetch_assoc($result);
          mysqli_stmt_bind_param($stmt, "sssssssssss", $core1ave, $core2ave, $core3ave, $app1ave, $app2ave, $app3ave, $app4ave, $app5ave, $ave, $first, $last);
          mysqli_stmt_execute($stmt);
          if ($rowsemester['first']=="yes") {
            if ($radio=="first") {
              header('location: pdf_new/ict-prog-1st.php?section='.$section.'&first='.$first.'&last='.$last.'&grading=first');
              exit();
            }
            elseif ($radio=="second") {
              header('location: pdf_new/ict-prog-1st.php?section='.$section.'&first='.$first.'&last='.$last.'&grading=second');
              exit();
            }
          }
          else {
            echo "error";
            exit();
          }
        }
        else{
          $sql7 = "INSERT INTO ".$section."_ave (student_first, student_last, ave_c_1, ave_c_2, ave_c_3, ave_a_1, ave_a_2, ave_a_3, ave_a_4, ave_a_5, ave) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
          $stmt=mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql7)) {
              header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
              exit();
            }
          $result= mysqli_query($conn, $sql7);
          $row = mysqli_fetch_assoc($result);
          mysqli_stmt_bind_param($stmt, "sssssssssss", $first, $last, $core1ave, $core2ave, $core3ave, $app1ave, $app2ave, $app3ave, $app4ave, $app5ave, $ave);
          mysqli_stmt_execute($stmt);
          if ($rowsemester['first']=="yes") {
            if ($radio=="first") {
              header('location: pdf_new/ict-prog-1st.php?section='.$section.'&first='.$first.'&last='.$last.'&grading=first');
              exit();
            }
            elseif ($radio=="second") {
              header('location: pdf_new/ict-prog-1st.php?section='.$section.'&first='.$first.'&last='.$last.'&grading=second');
              exit();
            }
              
            
          }
          else {
            echo "error";
            exit();
          }
        }
          if ($rowsemester['first']=="yes") {
            if ($radio=="first") {
              header('location: pdf_new/ict-prog-1st.php?section='.$section.'&first='.$first.'&last='.$last.'&grading=first');
              exit();
            }
            elseif ($radio=="second") {
              header('location: pdf_new/ict-prog-1st.php?section='.$section.'&first='.$first.'&last='.$last.'&grading=second');
              exit();
            }
              
            
          }
          else {
            echo "error";
            exit();
          }
        }

    elseif (isset($_POST['save-sec']) || isset($_POST['parent-sec']) ) {
      $sqlupdate = "SELECT * from ".$section."_grade_sec_first WHERE student_first='$first' AND student_last='$last'";
      $stmt=mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sqlupdate)) {
          header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
          exit();
        }
      $resultupdate= mysqli_query($conn, $sqlupdate);
      $queryResults = mysqli_num_rows($resultupdate);
      mysqli_stmt_execute($stmt);
        if ($queryResults>0) {
          $sql = "UPDATE ".$section."_grade_sec_first SET first_c_1=?, first_c_2=?, first_c_3=?, first_c_4=?, first_a_1=?, first_a_2=?, first_a_3=?, first_a_4=?, sec_first_ave= ? WHERE student_first='$first' AND student_last='$last'";
          $stmt=mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
              header("../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
              exit();
            }
          $result= mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          mysqli_stmt_bind_param($stmt, "sssssssss", $seccore1first, $seccore2first, $seccore3first, $seccore4first, $secapp1first, $secapp2first, $secapp3first, $secapp4first, $secave1);
          mysqli_stmt_execute($stmt);
          header("location: ../url.php?grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
        }
        else{
          $sql = "INSERT INTO ".$section."_grade_sec_first (student_first, student_last, first_c_1, first_c_2, first_c_3, first_c_4, first_a_1, first_a_2, first_a_3, first_a_4, sec_first_ave) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
          $stmt=mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
              header("location: ../verti-header.php?error=stmtfailed&name=list&&section=".$rowclass['class_name']."");
              exit();
            }
          $result= mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          mysqli_stmt_bind_param($stmt, "sssssssssss", $first, $last, $seccore1first, $seccore2first, $seccore3first, $seccore4first, $secapp1first, $secapp2first, $secapp3first, $secapp4first, $secave1);
          mysqli_stmt_execute($stmt);
          header("location: ../url.php?grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
          
        }


      $sqlupdate1 = "SELECT * from ".$section."_grade_sec_sec WHERE student_first='$first' AND student_last='$last'";
      $stmt=mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sqlupdate1)) {
          header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
          exit();
        }
      $resultupdate1= mysqli_query($conn, $sqlupdate1);
      $queryResults1 = mysqli_num_rows($resultupdate1);
      mysqli_stmt_execute($stmt);
        if ($queryResults1>0) {
          $sql4 = "UPDATE ".$section."_grade_sec_sec SET first_c_1=?, first_c_2=?, first_c_3=?, first_c_4=?, first_a_1=?, first_a_2=?, first_a_3=?, first_a_4=?, sec_sec_ave=? WHERE student_first='$first' AND student_last='$last'";
          $stmt=mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql4)) {
              header("location: ../verti-header.php?error=stmtfailed&name=list&&section=".$rowclass['class_name']."");
              exit();
            }
          $result= mysqli_query($conn, $sql4);
          $row = mysqli_fetch_assoc($result);
          mysqli_stmt_bind_param($stmt, "sssssssss", $seccore1sec, $seccore2sec, $seccore3sec, $seccore4sec, $secapp1sec, $secapp2sec, $secapp3sec, $secapp4sec, $secave2);
          mysqli_stmt_execute($stmt);
          header("location: ../url.php?grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
        }
        else{
          $sql5 = "INSERT INTO ".$section."_grade_sec_sec (student_first, student_last, first_c_1, first_c_2, first_c_3, first_c_4, first_a_1, first_a_2, first_a_3, first_a_4, sec_sec_ave) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
          $stmt=mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql5)) {
              header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
              exit();
            }
          $result= mysqli_query($conn, $sql5);
          $row = mysqli_fetch_assoc($result);
          mysqli_stmt_bind_param($stmt, "sssssssssss", $first, $last, $seccore1sec, $seccore2sec, $seccore3sec, $seccore4sec, $secapp1sec, $secapp2sec, $secapp3sec, $secapp4sec, $secave2);
          mysqli_stmt_execute($stmt);
          header("location: ../url.php?grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
        }



      $sqlupdate2 = "SELECT * from ".$section."_ave_sec WHERE student_first='$first' AND student_last='$last'";
      $stmt=mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sqlupdate2)) {
          header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
          exit();
        }
      $resultupdate2= mysqli_query($conn, $sqlupdate2);
      $queryResults2 = mysqli_num_rows($resultupdate2);
      mysqli_stmt_execute($stmt);
        if ($queryResults2>0) {
          $sql6 = "UPDATE ".$section."_ave_sec SET ave_c_1=?, ave_c_2=?, ave_c_3=?, ave_c_4=?, ave_a_1=?, ave_a_2=?, ave_a_3=?, ave_a_4=?, ave_sec=? WHERE student_first='$first' AND student_last='$last'";
          $stmt=mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql6)) {
              header("location: ../verti-header.php?error=stmtfailed&name=list&&section=".$rowclass['class_name']."");
              exit();
            }
          $result= mysqli_query($conn, $sql6);
          $row = mysqli_fetch_assoc($result);
          mysqli_stmt_bind_param($stmt, "sssssssss", $seccore1ave, $seccore2ave, $seccore3ave, $seccore4ave, $secapp1ave, $secapp2ave, $secapp3ave, $secapp4ave, $secave);
          mysqli_stmt_execute($stmt);
          header("location: ../url.php?grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
        }
        else{
          $sql7 = "INSERT INTO ".$section."_ave_sec (student_first, student_last, ave_c_1, ave_c_2, ave_c_3, ave_c_4, ave_a_1, ave_a_2, ave_a_3, ave_a_4, ave_sec) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
          $stmt=mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql7)) {
              header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=2");
              exit();
            }
          $result= mysqli_query($conn, $sql7);
          $row = mysqli_fetch_assoc($result);
          mysqli_stmt_bind_param($stmt, "sssssssssss", $first, $last, $seccore1ave, $seccore2ave, $seccore3ave, $seccore4ave, $secapp1ave, $secapp2ave, $secapp3ave, $secapp4ave, $secave);
          mysqli_stmt_execute($stmt);
        }
        if (isset($_POST['parent-sec'])) {
          $sql11 = "UPDATE ".$section."_student SET ifsent='Sent' WHERE student_first='$first' AND student_last='$last'";
          $stmt=mysqli_stmt_init($conn);
          if (!mysqli_stmt_prepare($stmt, $sql11)) {
          header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=two");
          exit();
          }
          $result11= mysqli_query($conn, $sql11);
          mysqli_stmt_execute($stmt);


          $sql5 = "UPDATE ".$section."_grade_sec_first SET sent='0' WHERE student_first='$first' AND student_last='$last'";
          $stmt=mysqli_stmt_init($conn);
          if (!mysqli_stmt_prepare($stmt, $sql5)) {
          header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=two");
          exit();
          }
          $result= mysqli_query($conn, $sql5);
          mysqli_stmt_execute($stmt);
          
          if ($rowsemester['second']=="yes") {
            if ($radio=="first") {
              header('location: pdf_new/ict-prog-2nd.php?section='.$section.'&first='.$first.'&last='.$last.'&grading=first');
              exit();
            }
            elseif ($radio=="second") {
              header('location: pdf_new/ict-prog-2nd.php?section='.$section.'&first='.$first.'&last='.$last.'&grading=second');
              exit();
            }
              
            
          }
          else {
            echo "error";
            exit();
          }

        }
        else {
          header("location: ../url.php?grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=two&error=none");
        }
    }

    else if (isset($_POST['student-sec'])) {
      $sql5 = "UPDATE ".$section."_grade_sec_first SET sent='1' WHERE student_first='$first' AND student_last='$last'";
      $stmt=mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt, $sql5)) {
      header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=2");
      exit();
      }
      $result= mysqli_query($conn, $sql5);
      mysqli_stmt_execute($stmt);
      header("location: ../url.php?grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=two&error=none");
  
      }
      
  
      else if (isset($_POST['all-sec'])) {
      $sql11 = "UPDATE ".$section."_student SET ifsent='Sent' WHERE student_first='$first' AND student_last='$last'";
      $stmt=mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql11)) {
        header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=two");
        exit();
      }
      $result11= mysqli_query($conn, $sql11);
      mysqli_stmt_execute($stmt);
      
      $sql5 = "UPDATE ".$section."_grade_sec_first SET sent='1' WHERE student_first='$first' AND student_last='$last'";
      $stmt=mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt, $sql5)) {
      header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=two");
      exit();
      }
      $result= mysqli_query($conn, $sql5);
      mysqli_stmt_execute($stmt);

      $sqlupdate = "SELECT * from ".$section."_grade_sec_first WHERE student_first='$first' AND student_last='$last'";
      $stmt=mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sqlupdate)) {
          header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
          exit();
        }
      $resultupdate= mysqli_query($conn, $sqlupdate);
      $queryResults = mysqli_num_rows($resultupdate);
      mysqli_stmt_execute($stmt);
        if ($queryResults>0) {
          $sql = "UPDATE ".$section."_grade_sec_first SET first_c_1=?, first_c_2=?, first_c_3=?, first_c_4=?, first_a_1=?, first_a_2=?, first_a_3=?, first_a_4=?, sec_first_ave= ? WHERE student_first='$first' AND student_last='$last'";
          $stmt=mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
              header("../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
              exit();
            }
          $result= mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          mysqli_stmt_bind_param($stmt, "sssssssss", $seccore1first, $seccore2first, $seccore3first, $seccore4first, $secapp1first, $secapp2first, $secapp3first, $secapp4first, $secave1);
          mysqli_stmt_execute($stmt);
          header("location: ../url.php?grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=two&error=none");
        }
        else{
          $sql = "INSERT INTO ".$section."_grade_sec_first (student_first, student_last, first_c_1, first_c_2, first_c_3, first_c_4, first_a_1, first_a_2, first_a_3, first_a_4, sec_first_ave) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
          $stmt=mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
              header("location: ../verti-header.php?error=stmtfailed&name=list&&section=".$rowclass['class_name']."");
              exit();
            }
          $result= mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);
          mysqli_stmt_bind_param($stmt, "sssssssssss", $first, $last, $seccore1first, $seccore2first, $seccore3first, $seccore4first, $secapp1first, $secapp2first, $secapp3first, $secapp4first, $secave1);
          mysqli_stmt_execute($stmt);
          header("location: ../url.php?grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=two&error=none");
          
        }


      $sqlupdate1 = "SELECT * from ".$section."_grade_sec_sec WHERE student_first='$first' AND student_last='$last'";
      $stmt=mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sqlupdate1)) {
          header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
          exit();
        }
      $resultupdate1= mysqli_query($conn, $sqlupdate1);
      $queryResults1 = mysqli_num_rows($resultupdate1);
      mysqli_stmt_execute($stmt);
        if ($queryResults1>0) {
          $sql4 = "UPDATE ".$section."_grade_sec_sec SET first_c_1=?, first_c_2=?, first_c_3=?, first_c_4=?, first_a_1=?, first_a_2=?, first_a_3=?, first_a_4=?, sec_sec_ave=? WHERE student_first='$first' AND student_last='$last'";
          $stmt=mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql4)) {
              header("location: ../verti-header.php?error=stmtfailed&name=list&&section=".$rowclass['class_name']."");
              exit();
            }
          $result= mysqli_query($conn, $sql4);
          $row = mysqli_fetch_assoc($result);
          mysqli_stmt_bind_param($stmt, "sssssssss", $seccore1sec, $seccore2sec, $seccore3sec, $seccore4sec, $secapp1sec, $secapp2sec, $secapp3sec, $secapp4sec, $secave2);
          mysqli_stmt_execute($stmt);
          header("location: ../url.php?grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=two&error=none");
        }
        else{
          $sql5 = "INSERT INTO ".$section."_grade_sec_sec (student_first, student_last, first_c_1, first_c_2, first_c_3, first_c_4, first_a_1, first_a_2, first_a_3, first_a_4, sec_sec_ave) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
          $stmt=mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql5)) {
              header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
              exit();
            }
          $result= mysqli_query($conn, $sql5);
          $row = mysqli_fetch_assoc($result);
          mysqli_stmt_bind_param($stmt, "sssssssssss", $first, $last, $seccore1sec, $seccore2sec, $seccore3sec, $seccore4sec, $secapp1sec, $secapp2sec, $secapp3sec, $secapp4sec, $secave2);
          mysqli_stmt_execute($stmt);
          header("location: ../url.php?grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=two&error=none");
        }



      $sqlupdate2 = "SELECT * from ".$section."_ave_sec WHERE student_first='$first' AND student_last='$last'";
      $stmt=mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sqlupdate2)) {
          header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
          exit();
        }
      $resultupdate2= mysqli_query($conn, $sqlupdate2);
      $queryResults2 = mysqli_num_rows($resultupdate2);
      mysqli_stmt_execute($stmt);
        if ($queryResults2>0) {
          $sql6 = "UPDATE ".$section."_ave_sec SET ave_c_1=?, ave_c_2=?, ave_c_3=?, ave_c_4=?, ave_a_1=?, ave_a_2=?, ave_a_3=?, ave_a_4=?, ave_sec=? WHERE student_first='$first' AND student_last='$last'";
          $stmt=mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql6)) {
              header("location: ../verti-header.php?error=stmtfailed&name=list&&section=".$rowclass['class_name']."");
              exit();
            }
          $result= mysqli_query($conn, $sql6);
          $row = mysqli_fetch_assoc($result);
          mysqli_stmt_bind_param($stmt, "sssssssss", $seccore1ave, $seccore2ave, $seccore3ave, $seccore4ave, $secapp1ave, $secapp2ave, $secapp3ave, $secapp4ave, $secave);
          mysqli_stmt_execute($stmt);
          if ($rowsemester['second']=="yes") {
            if ($radio=="first") {
              header('location: pdf_new/ict-prog-2nd.php?section='.$section.'&first='.$first.'&last='.$last.'&grading=first');
              exit();
            }
            elseif ($radio=="second") {
              header('location: pdf_new/ict-prog-2nd.php?section='.$section.'&first='.$first.'&last='.$last.'&grading=second');
              exit();
            }
              
            
          }
          else {
            echo "error";
            exit();
          }
        }
        else{
          $sql7 = "INSERT INTO ".$section."_ave_sec (student_first, student_last, ave_c_1, ave_c_2, ave_c_3, ave_c_4, ave_a_1, ave_a_2, ave_a_3, ave_a_4, ave_sec) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
          $stmt=mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql7)) {
              header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=2");
              exit();
            }
          $result= mysqli_query($conn, $sql7);
          $row = mysqli_fetch_assoc($result);
          mysqli_stmt_bind_param($stmt, "sssssssssss", $first, $last, $seccore1ave, $seccore2ave, $seccore3ave, $seccore4ave, $secapp1ave, $secapp2ave, $secapp3ave, $secapp4ave, $secave);
          mysqli_stmt_execute($stmt);

          if ($rowsemester['second']=="yes") {
            if ($radio=="first") {
              header('location: pdf_new/ict-prog-2nd.php?section='.$section.'&first='.$first.'&last='.$last.'&grading=first');
              exit();
            }
            elseif ($radio=="second") {
              header('location: pdf_new/ict-prog-2nd.php?section='.$section.'&first='.$first.'&last='.$last.'&grading=second');
              exit();
            }
              
            
          }
          else {
            echo "error";
            exit();
          }
        }
        
      }
}
    
    
    else
    {
      header("location: ../url.php?grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=one&error=signature");
      exit();
    }

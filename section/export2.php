<?php


$phpExcel = PHPExcel_IOFactory::load($filess);
// Get the first sheet


$sql7 = "SELECT * from ".$section."_student WHERE student_gender='Male' AND status='0'";
$stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql7)) {
    header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
    exit();
    }
$result= mysqli_query($conn, $sql7);
$queryResults= mysqli_num_rows($result);


$sheet = $phpExcel ->getActiveSheet();
$sheet->setCellValue('S7', $teacher_name);
$i=13;
while ($row = mysqli_fetch_assoc($result)) {
    $student_first= $row['student_first'];
    $student_last= $row['student_last'];
    $student_value= "B" . $i;
    $student_name = $row['student_last'] . $row['student_first'] . $row['student_middle'] . $row['student_suffix'];
    $sheet->setCellValue($student_value, $student_name);

    //core 1 first grad
    $sql1 = "SELECT * from ".$section."_grade_first_first WHERE student_first='$student_first' AND student_last='$student_last'";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql1)) {
    header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
    exit();
    }
    $result1= mysqli_query($conn, $sql1);
    while ($row1 = mysqli_fetch_assoc($result1)) {
        $student_value= "F" . $i;
        $student_grade = $row1['first_c_1'];
        if ($student_grade<=74) {
            $sheet->getStyle($student_value)->getFont()->setBold(true)
            ->getColor()
            ->setRGB('FF0000');
            $sheet->setCellValue($student_value, $student_grade);
        }
        $sheet->setCellValue($student_value, $student_grade);
    }
    //!core 1 first grad

    //core 1 sec grad
    $sql2 = "SELECT * from ".$section."_grade_first_sec WHERE student_first='$student_first' AND student_last='$student_last'";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql2)) {
    header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
    exit();
    }
    $result2= mysqli_query($conn, $sql2);
    while ($row2 = mysqli_fetch_assoc($result2)) {
        $student_value= "G" . $i;
        $student_grade = $row2['first_c_1'];
        if ($student_grade<=74) {
            $sheet->getStyle($student_value)->getFont()->setBold(true)
            ->getColor()
            ->setRGB('FF0000');
            $sheet->setCellValue($student_value, $student_grade);
        }
        $sheet->setCellValue($student_value, $student_grade);
    }
    //!core 1 sec grad

    //core 2 first grad
    $sql3 = "SELECT * from ".$section."_grade_first_first WHERE student_first='$student_first' AND student_last='$student_last'";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql3)) {
    header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
    exit();
    }
    $result3= mysqli_query($conn, $sql3);
    while ($row3 = mysqli_fetch_assoc($result3)) {
        $student_value= "H" . $i;
        $student_grade = $row3['first_c_2'];
        if ($student_grade<=74) {
            $sheet->getStyle($student_value)->getFont()->setBold(true)
            ->getColor()
            ->setRGB('FF0000');
            $sheet->setCellValue($student_value, $student_grade);
        }
        $sheet->setCellValue($student_value, $student_grade);
    }
    //!core 2 first grad

    //core 2 sec grad
    $sql4 = "SELECT * from ".$section."_grade_first_sec WHERE student_first='$student_first' AND student_last='$student_last'";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql4)) {
    header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
    exit();
    }
    $result4= mysqli_query($conn, $sql4);
    while ($row4 = mysqli_fetch_assoc($result4)) {
        $student_value= "I" . $i;
        $student_grade = $row4['first_c_2'];
        if ($student_grade<=74) {
            $sheet->getStyle($student_value)->getFont()->setBold(true)
            ->getColor()
            ->setRGB('FF0000');
            $sheet->setCellValue($student_value, $student_grade);
        }
        $sheet->setCellValue($student_value, $student_grade);
    }
    //!core 2 sec grad

    //core 3 first grad
    $sql5 = "SELECT * from ".$section."_grade_first_first WHERE student_first='$student_first' AND student_last='$student_last'";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql5)) {
    header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
    exit();
    }
    $result5= mysqli_query($conn, $sql5);
    while ($row5 = mysqli_fetch_assoc($result5)) {
        $student_value= "J" . $i;
        $student_grade = $row5['first_c_3'];
        if ($student_grade<=74) {
            $sheet->getStyle($student_value)->getFont()->setBold(true)
            ->getColor()
            ->setRGB('FF0000');
            $sheet->setCellValue($student_value, $student_grade);
        }
        $sheet->setCellValue($student_value, $student_grade);
    }
    //!core 3 first grad


    //core 3 sec grad
    $sql6 = "SELECT * from ".$section."_grade_first_sec WHERE student_first='$student_first' AND student_last='$student_last'";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql6)) {
    header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
    exit();
    }
    $result6= mysqli_query($conn, $sql6);
    while ($row6 = mysqli_fetch_assoc($result6)) {
        $student_value= "K" . $i;
        $student_grade = $row6['first_c_3'];
        if ($student_grade<=74) {
            $sheet->getStyle($student_value)->getFont()->setBold(true)
            ->getColor()
            ->setRGB('FF0000');
            $sheet->setCellValue($student_value, $student_grade);
        }
        $sheet->setCellValue($student_value, $student_grade);
    }
    //!core 3 sec grad


    //app 1 first grad
    $sql7 = "SELECT * from ".$section."_grade_first_first WHERE student_first='$student_first' AND student_last='$student_last'";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql7)) {
    header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
    exit();
    }
    $result7= mysqli_query($conn, $sql7);
    while ($row7 = mysqli_fetch_assoc($result7)) {
        $student_value= "S" . $i;
        $student_grade = $row7['first_a_1'];
        if ($student_grade<=74) {
            $sheet->getStyle($student_value)->getFont()->setBold(true)
            ->getColor()
            ->setRGB('FF0000');
            $sheet->setCellValue($student_value, $student_grade);
        }
        $sheet->setCellValue($student_value, $student_grade);
    }
    //!app 1 first grad

    //app 1 sec grad
    $sql8 = "SELECT * from ".$section."_grade_first_sec WHERE student_first='$student_first' AND student_last='$student_last'";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql8)) {
    header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
    exit();
    }
    $result8= mysqli_query($conn, $sql8);
    while ($row8 = mysqli_fetch_assoc($result8)) {
        $student_value= "T" . $i;
        $student_grade = $row8['first_a_1'];
        if ($student_grade<=74) {
            $sheet->getStyle($student_value)->getFont()->setBold(true)
            ->getColor()
            ->setRGB('FF0000');
            $sheet->setCellValue($student_value, $student_grade);
        }
        $sheet->setCellValue($student_value, $student_grade);
    }
    //!app 1 sec grad


    //app 2 first grad
    $sql9 = "SELECT * from ".$section."_grade_first_first WHERE student_first='$student_first' AND student_last='$student_last'";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql9)) {
    header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
    exit();
    }
    $result9= mysqli_query($conn, $sql9);
    while ($row9 = mysqli_fetch_assoc($result9)) {
        $student_value= "U" . $i;
        $student_grade = $row9['first_a_2'];
        if ($student_grade<=74) {
            $sheet->getStyle($student_value)->getFont()->setBold(true)
            ->getColor()
            ->setRGB('FF0000');
            $sheet->setCellValue($student_value, $student_grade);
        }
        $sheet->setCellValue($student_value, $student_grade);
    }
    //!app 2 first grad

    //app 2 sec grad
    $sql10 = "SELECT * from ".$section."_grade_first_first WHERE student_first='$student_first' AND student_last='$student_last'";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql10)) {
    header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
    exit();
    }
    $result10= mysqli_query($conn, $sql10);
    while ($row10 = mysqli_fetch_assoc($result10)) {
        $student_value= "V" . $i;
        $student_grade = $row10['first_a_2'];
        if ($student_grade<=74) {
            $sheet->getStyle($student_value)->getFont()->setBold(true)
            ->getColor()
            ->setRGB('FF0000');
            $sheet->setCellValue($student_value, $student_grade);
        }
        $sheet->setCellValue($student_value, $student_grade);
    }
    //!app 2 sec grad
        


    //app 3 first grad
    $sql11 = "SELECT * from ".$section."_grade_first_first WHERE student_first='$student_first' AND student_last='$student_last'";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql11)) {
    header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
    exit();
    }
    $result11= mysqli_query($conn, $sql11);
    while ($row11 = mysqli_fetch_assoc($result11)) {
        $student_value= "W" . $i;
        $student_grade = $row11['first_a_3'];
        if ($student_grade<=74) {
            $sheet->getStyle($student_value)->getFont()->setBold(true)
            ->getColor()
            ->setRGB('FF0000');
            $sheet->setCellValue($student_value, $student_grade);
        }
        $sheet->setCellValue($student_value, $student_grade);
    }
    //!app 3 first grad

    //app 3 sec grad
    $sql12 = "SELECT * from ".$section."_grade_first_sec WHERE student_first='$student_first' AND student_last='$student_last'";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql12)) {
    header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
    exit();
    }
    $result12= mysqli_query($conn, $sql12);
    while ($row12 = mysqli_fetch_assoc($result12)) {
        $student_value= "X" . $i;
        $student_grade = $row12['first_a_3'];
        if ($student_grade<=74) {
            $sheet->getStyle($student_value)->getFont()->setBold(true)
            ->getColor()
            ->setRGB('FF0000');
            $sheet->setCellValue($student_value, $student_grade);
        }
        $sheet->setCellValue($student_value, $student_grade);
    }
    //!app 3 sec grad

    //app 4 first grad
    $sql13 = "SELECT * from ".$section."_grade_first_first WHERE student_first='$student_first' AND student_last='$student_last'";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql13)) {
    header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
    exit();
    }
    $result13= mysqli_query($conn, $sql13);
    while ($row13 = mysqli_fetch_assoc($result13)) {
        $student_value= "Y" . $i;
        $student_grade = $row13['first_a_4'];
        if ($student_grade<=74) {
            $sheet->getStyle($student_value)->getFont()->setBold(true)
            ->getColor()
            ->setRGB('FF0000');
            $sheet->setCellValue($student_value, $student_grade);
        }
        $sheet->setCellValue($student_value, $student_grade);
    }
    //!app 4 first grad

    //app 4 sec grad
    $sql14 = "SELECT * from ".$section."_grade_first_sec WHERE student_first='$student_first' AND student_last='$student_last'";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql14)) {
    header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
    exit();
    }
    $result14= mysqli_query($conn, $sql14);
    while ($row14 = mysqli_fetch_assoc($result14)) {
        $student_value= "Z" . $i;
        $student_grade = $row14['first_a_4'];
        if ($student_grade<=74) {
            $sheet->getStyle($student_value)->getFont()->setBold(true)
            ->getColor()
            ->setRGB('FF0000');
            $sheet->setCellValue($student_value, $student_grade);
        }
        $sheet->setCellValue($student_value, $student_grade);
    }
    //!app 4 sec grad


    //app 5 first grad
    $sql15 = "SELECT * from ".$section."_grade_first_first WHERE student_first='$student_first' AND student_last='$student_last'";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql15)) {
    header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
    exit();
    }
    $result15= mysqli_query($conn, $sql15);
    while ($row15 = mysqli_fetch_assoc($result15)) {
        $student_value= "AA" . $i;
        $student_grade = $row15['first_a_5'];
        if ($student_grade<=74) {
            $sheet->getStyle($student_value)->getFont()->setBold(true)
            ->getColor()
            ->setRGB('FF0000');
            $sheet->setCellValue($student_value, $student_grade);
        }
        $sheet->setCellValue($student_value, $student_grade);
    }
    //!app 5 first grad

    //app 5 sec grad
    $sql16 = "SELECT * from ".$section."_grade_first_sec WHERE student_first='$student_first' AND student_last='$student_last'";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql16)) {
    header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
    exit();
    }
    $result16= mysqli_query($conn, $sql16);
    while ($row16 = mysqli_fetch_assoc($result16)) {
        $student_value= "AB" . $i;
        $student_grade = $row16['first_a_5'];
        if ($student_grade<=74) {
            $sheet->getStyle($student_value)->getFont()->setBold(true)
            ->getColor()
            ->setRGB('FF0000');
            $sheet->setCellValue($student_value, $student_grade);
        }
        $sheet->setCellValue($student_value, $student_grade);
    }
    //!app 5 sec grad


     //ave first grad
     $sql17 = "SELECT * from ".$section."_grade_first_first WHERE student_first='$student_first' AND student_last='$student_last'";
     $stmt=mysqli_stmt_init($conn);
     if (!mysqli_stmt_prepare($stmt, $sql17)) {
     header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
     exit();
     }
     $result17= mysqli_query($conn, $sql17);
     while ($row17 = mysqli_fetch_assoc($result17)) {
         $student_value= "AD" . $i;
         $student_grade = $row17['first_first_ave'];
         if ($student_grade<=74) {
             $sheet->getStyle($student_value)->getFont()->setBold(true)
             ->getColor()
             ->setRGB('FF0000');
             $sheet->setCellValue($student_value, $student_grade);
         }
         $sheet->setCellValue($student_value, $student_grade);
     }
     //!ave first grad
 
     //ave sec grad
     $sql18 = "SELECT * from ".$section."_grade_first_sec WHERE student_first='$student_first' AND student_last='$student_last'";
     $stmt=mysqli_stmt_init($conn);
     if (!mysqli_stmt_prepare($stmt, $sql18)) {
     header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
     exit();
     }
     $result18= mysqli_query($conn, $sql18);
     while ($row18 = mysqli_fetch_assoc($result18)) {
         $student_value= "AE" . $i;
         $student_grade = $row18['first_sec_ave'];
         if ($student_grade<=74) {
             $sheet->getStyle($student_value)->getFont()->setBold(true)
             ->getColor()
             ->setRGB('FF0000');
             $sheet->setCellValue($student_value, $student_grade);
         }
         $sheet->setCellValue($student_value, $student_grade);
     }
     //!ave sec grad


     //ave sec grad
     $sql19 = "SELECT * from ".$section."_ave WHERE student_first='$student_first' AND student_last='$student_last'";
     $stmt=mysqli_stmt_init($conn);
     if (!mysqli_stmt_prepare($stmt, $sql19)) {
     header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
     exit();
     }
     $result19= mysqli_query($conn, $sql19);
     while ($row19 = mysqli_fetch_assoc($result19)) {
         $student_value= "AF" . $i;
         $student_grade = $row19['ave'];
         if ($student_grade<=74) {
             $sheet->getStyle($student_value)->getFont()->setBold(true)
             ->getColor()
             ->setRGB('FF0000');
             $sheet->setCellValue($student_value, $student_grade);
         }
         $sheet->setCellValue($student_value, $student_grade);
     }
     //!ave sec grad

    $i++;
}


$sqlf = "SELECT * from ".$section."_student WHERE student_gender='Female'";
$stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqlf)) {
    header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
    exit();
    }
$resultf= mysqli_query($conn, $sqlf);
$i=39;
while ($rowf = mysqli_fetch_assoc($resultf)) {
    $student_first= $rowf['student_first'];
    $student_last= $rowf['student_last'];
    $student_value= "B" . $i;
    $student_name = $rowf['student_last'] . $rowf['student_first'] . $rowf['student_middle'] . $rowf['student_suffix'];
    $sheet->setCellValue($student_value, $student_name);


    $sql1 = "SELECT * from ".$section."_grade_first_first WHERE student_first='$student_first' AND student_last='$student_last'";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql1)) {
    header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
    exit();
    }
    $result1= mysqli_query($conn, $sql1);
    while ($row1 = mysqli_fetch_assoc($result1)) {
        $student_value= "F" . $i;
        $student_grade = $row1['first_c_1'];
        if ($student_grade<=74) {
            $sheet->getStyle($student_value)->getFont()->setBold(true)
            ->getColor()
            ->setRGB('FF0000');
            $sheet->setCellValue($student_value, $student_grade);
        }
        $sheet->setCellValue($student_value, $student_grade);
    }


    //core 1 first grad
    $sql1 = "SELECT * from ".$section."_grade_first_first WHERE student_first='$student_first' AND student_last='$student_last'";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql1)) {
    header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
    exit();
    }
    $result1= mysqli_query($conn, $sql1);
    while ($row1 = mysqli_fetch_assoc($result1)) {
        $student_value= "F" . $i;
        $student_grade = $row1['first_c_1'];
        if ($student_grade<=74) {
            $sheet->getStyle($student_value)->getFont()->setBold(true)
            ->getColor()
            ->setRGB('FF0000');
            $sheet->setCellValue($student_value, $student_grade);
        }
        $sheet->setCellValue($student_value, $student_grade);
    }
    //!core 1 first grad

    //core 1 sec grad
    $sql2 = "SELECT * from ".$section."_grade_first_sec WHERE student_first='$student_first' AND student_last='$student_last'";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql2)) {
    header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
    exit();
    }
    $result2= mysqli_query($conn, $sql2);
    while ($row2 = mysqli_fetch_assoc($result2)) {
        $student_value= "G" . $i;
        $student_grade = $row2['first_c_1'];
        if ($student_grade<=74) {
            $sheet->getStyle($student_value)->getFont()->setBold(true)
            ->getColor()
            ->setRGB('FF0000');
            $sheet->setCellValue($student_value, $student_grade);
        }
        $sheet->setCellValue($student_value, $student_grade);
    }
    //!core 1 sec grad

    //core 2 first grad
    $sql3 = "SELECT * from ".$section."_grade_first_first WHERE student_first='$student_first' AND student_last='$student_last'";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql3)) {
    header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
    exit();
    }
    $result3= mysqli_query($conn, $sql3);
    while ($row3 = mysqli_fetch_assoc($result3)) {
        $student_value= "H" . $i;
        $student_grade = $row3['first_c_2'];
        if ($student_grade<=74) {
            $sheet->getStyle($student_value)->getFont()->setBold(true)
            ->getColor()
            ->setRGB('FF0000');
            $sheet->setCellValue($student_value, $student_grade);
        }
        $sheet->setCellValue($student_value, $student_grade);
    }
    //!core 2 first grad

    //core 2 sec grad
    $sql4 = "SELECT * from ".$section."_grade_first_sec WHERE student_first='$student_first' AND student_last='$student_last'";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql4)) {
    header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
    exit();
    }
    $result4= mysqli_query($conn, $sql4);
    while ($row4 = mysqli_fetch_assoc($result4)) {
        $student_value= "I" . $i;
        $student_grade = $row4['first_c_2'];
        if ($student_grade<=74) {
            $sheet->getStyle($student_value)->getFont()->setBold(true)
            ->getColor()
            ->setRGB('FF0000');
            $sheet->setCellValue($student_value, $student_grade);
        }
        $sheet->setCellValue($student_value, $student_grade);
    }
    //!core 2 sec grad

    //core 3 first grad
    $sql5 = "SELECT * from ".$section."_grade_first_first WHERE student_first='$student_first' AND student_last='$student_last'";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql5)) {
    header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
    exit();
    }
    $result5= mysqli_query($conn, $sql5);
    while ($row5 = mysqli_fetch_assoc($result5)) {
        $student_value= "J" . $i;
        $student_grade = $row5['first_c_3'];
        if ($student_grade<=74) {
            $sheet->getStyle($student_value)->getFont()->setBold(true)
            ->getColor()
            ->setRGB('FF0000');
            $sheet->setCellValue($student_value, $student_grade);
        }
        $sheet->setCellValue($student_value, $student_grade);
    }
    //!core 3 first grad


    //core 3 sec grad
    $sql6 = "SELECT * from ".$section."_grade_first_sec WHERE student_first='$student_first' AND student_last='$student_last'";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql6)) {
    header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
    exit();
    }
    $result6= mysqli_query($conn, $sql6);
    while ($row6 = mysqli_fetch_assoc($result6)) {
        $student_value= "K" . $i;
        $student_grade = $row6['first_c_3'];
        if ($student_grade<=74) {
            $sheet->getStyle($student_value)->getFont()->setBold(true)
            ->getColor()
            ->setRGB('FF0000');
            $sheet->setCellValue($student_value, $student_grade);
        }
        $sheet->setCellValue($student_value, $student_grade);
    }
    //!core 3 sec grad


    //app 1 first grad
    $sql7 = "SELECT * from ".$section."_grade_first_first WHERE student_first='$student_first' AND student_last='$student_last'";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql7)) {
    header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
    exit();
    }
    $result7= mysqli_query($conn, $sql7);
    while ($row7 = mysqli_fetch_assoc($result7)) {
        $student_value= "S" . $i;
        $student_grade = $row7['first_a_1'];
        if ($student_grade<=74) {
            $sheet->getStyle($student_value)->getFont()->setBold(true)
            ->getColor()
            ->setRGB('FF0000');
            $sheet->setCellValue($student_value, $student_grade);
        }
        $sheet->setCellValue($student_value, $student_grade);
    }
    //!app 1 first grad

    //app 1 sec grad
    $sql8 = "SELECT * from ".$section."_grade_first_sec WHERE student_first='$student_first' AND student_last='$student_last'";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql8)) {
    header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
    exit();
    }
    $result8= mysqli_query($conn, $sql8);
    while ($row8 = mysqli_fetch_assoc($result8)) {
        $student_value= "T" . $i;
        $student_grade = $row8['first_a_1'];
        if ($student_grade<=74) {
            $sheet->getStyle($student_value)->getFont()->setBold(true)
            ->getColor()
            ->setRGB('FF0000');
            $sheet->setCellValue($student_value, $student_grade);
        }
        $sheet->setCellValue($student_value, $student_grade);
    }
    //!app 1 sec grad


    //app 2 first grad
    $sql9 = "SELECT * from ".$section."_grade_first_first WHERE student_first='$student_first' AND student_last='$student_last'";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql9)) {
    header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
    exit();
    }
    $result9= mysqli_query($conn, $sql9);
    while ($row9 = mysqli_fetch_assoc($result9)) {
        $student_value= "U" . $i;
        $student_grade = $row9['first_a_2'];
        if ($student_grade<=74) {
            $sheet->getStyle($student_value)->getFont()->setBold(true)
            ->getColor()
            ->setRGB('FF0000');
            $sheet->setCellValue($student_value, $student_grade);
        }
        $sheet->setCellValue($student_value, $student_grade);
    }
    //!app 2 first grad

    //app 2 sec grad
    $sql10 = "SELECT * from ".$section."_grade_first_first WHERE student_first='$student_first' AND student_last='$student_last'";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql10)) {
    header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
    exit();
    }
    $result10= mysqli_query($conn, $sql10);
    while ($row10 = mysqli_fetch_assoc($result10)) {
        $student_value= "V" . $i;
        $student_grade = $row10['first_a_2'];
        if ($student_grade<=74) {
            $sheet->getStyle($student_value)->getFont()->setBold(true)
            ->getColor()
            ->setRGB('FF0000');
            $sheet->setCellValue($student_value, $student_grade);
        }
        $sheet->setCellValue($student_value, $student_grade);
    }
    //!app 2 sec grad
        


    //app 3 first grad
    $sql11 = "SELECT * from ".$section."_grade_first_first WHERE student_first='$student_first' AND student_last='$student_last'";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql11)) {
    header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
    exit();
    }
    $result11= mysqli_query($conn, $sql11);
    while ($row11 = mysqli_fetch_assoc($result11)) {
        $student_value= "W" . $i;
        $student_grade = $row11['first_a_3'];
        if ($student_grade<=74) {
            $sheet->getStyle($student_value)->getFont()->setBold(true)
            ->getColor()
            ->setRGB('FF0000');
            $sheet->setCellValue($student_value, $student_grade);
        }
        $sheet->setCellValue($student_value, $student_grade);
    }
    //!app 3 first grad

    //app 3 sec grad
    $sql12 = "SELECT * from ".$section."_grade_first_sec WHERE student_first='$student_first' AND student_last='$student_last'";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql12)) {
    header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
    exit();
    }
    $result12= mysqli_query($conn, $sql12);
    while ($row12 = mysqli_fetch_assoc($result12)) {
        $student_value= "X" . $i;
        $student_grade = $row12['first_a_3'];
        if ($student_grade<=74) {
            $sheet->getStyle($student_value)->getFont()->setBold(true)
            ->getColor()
            ->setRGB('FF0000');
            $sheet->setCellValue($student_value, $student_grade);
        }
        $sheet->setCellValue($student_value, $student_grade);
    }
    //!app 3 sec grad

    //app 4 first grad
    $sql13 = "SELECT * from ".$section."_grade_first_first WHERE student_first='$student_first' AND student_last='$student_last'";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql13)) {
    header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
    exit();
    }
    $result13= mysqli_query($conn, $sql13);
    while ($row13 = mysqli_fetch_assoc($result13)) {
        $student_value= "Y" . $i;
        $student_grade = $row13['first_a_4'];
        if ($student_grade<=74) {
            $sheet->getStyle($student_value)->getFont()->setBold(true)
            ->getColor()
            ->setRGB('FF0000');
            $sheet->setCellValue($student_value, $student_grade);
        }
        $sheet->setCellValue($student_value, $student_grade);
    }
    //!app 4 first grad

    //app 4 sec grad
    $sql14 = "SELECT * from ".$section."_grade_first_sec WHERE student_first='$student_first' AND student_last='$student_last'";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql14)) {
    header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
    exit();
    }
    $result14= mysqli_query($conn, $sql14);
    while ($row14 = mysqli_fetch_assoc($result14)) {
        $student_value= "Z" . $i;
        $student_grade = $row14['first_a_4'];
        if ($student_grade<=74) {
            $sheet->getStyle($student_value)->getFont()->setBold(true)
            ->getColor()
            ->setRGB('FF0000');
            $sheet->setCellValue($student_value, $student_grade);
        }
        $sheet->setCellValue($student_value, $student_grade);
    }
    //!app 4 sec grad


    //app 5 first grad
    $sql15 = "SELECT * from ".$section."_grade_first_first WHERE student_first='$student_first' AND student_last='$student_last'";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql15)) {
    header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
    exit();
    }
    $result15= mysqli_query($conn, $sql15);
    while ($row15 = mysqli_fetch_assoc($result15)) {
        $student_value= "AA" . $i;
        $student_grade = $row15['first_a_5'];
        if ($student_grade<=74) {
            $sheet->getStyle($student_value)->getFont()->setBold(true)
            ->getColor()
            ->setRGB('FF0000');
            $sheet->setCellValue($student_value, $student_grade);
        }
        $sheet->setCellValue($student_value, $student_grade);
    }
    //!app 5 first grad

    //app 5 sec grad
    $sql16 = "SELECT * from ".$section."_grade_first_sec WHERE student_first='$student_first' AND student_last='$student_last'";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql16)) {
    header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
    exit();
    }
    $result16= mysqli_query($conn, $sql16);
    while ($row16 = mysqli_fetch_assoc($result16)) {
        $student_value= "AB" . $i;
        $student_grade = $row16['first_a_5'];
        if ($student_grade<=74) {
            $sheet->getStyle($student_value)->getFont()->setBold(true)
            ->getColor()
            ->setRGB('FF0000');
            $sheet->setCellValue($student_value, $student_grade);
        }
        $sheet->setCellValue($student_value, $student_grade);
    }
    //!app 5 sec grad



    $i++;
}
// Create the PHPExcel spreadsheet writer object
// We will create xlsx file (Excel 2007 and above)
$writer = PHPExcel_IOFactory::createWriter($phpExcel, "Excel2007");
// Save the spreadsheet
$writer->save($filess);
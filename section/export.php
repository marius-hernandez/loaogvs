<?php
include_once '../include/dbh.inc.php';
session_start();
// Include PHPExcel library and create its object
$section= mysqli_real_escape_string($conn, $_GET['section']);
$first= $_SESSION['userfirst'];
$last = $_SESSION['userlast'];

$teacher_name = $first . " " . $last;

$filess= "../excel/" . $section ."-1st Semester.xlsx";
copy('../excel/sample.xlsx', $filess);
$filesss= "../excel/" . $section ."-2nd Semester.xlsx";
copy('../excel/sample2.xlsx', $filesss);




require('Classes/PHPExcel.php');

// Load an existing spreadsheet
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






//Second Semester

$phpExcel = PHPExcel_IOFactory::load($filesss);
// Get the first sheet

$sheet = $phpExcel ->getActiveSheet();
$sheet->setCellValue('S7', $teacher_name);
$i=13;

$sqla7 = "SELECT * from ".$section."_student WHERE student_gender='Male' AND status='0'";
$stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqla7)) {
    header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
    exit();
    }
$resulta= mysqli_query($conn, $sqla7);
$queryResultsa= mysqli_num_rows($resulta);

while ($rowa = mysqli_fetch_assoc($resulta)) {
    $student_first= $rowa['student_first'];
    $student_last= $rowa['student_last'];
    $student_value= "B" . $i;
    $student_name = $rowa['student_last'] . $rowa['student_first'] . $rowa['student_middle'] . $rowa['student_suffix'];
    $sheet->setCellValue($student_value, $student_name);

    //core 1 first grad
    $sqla1 = "SELECT * from ".$section."_grade_sec_first WHERE student_first='$student_first' AND student_last='$student_last'";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqla1)) {
    header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
    exit();
    }
    $resulta1= mysqli_query($conn, $sqla1);
    while ($rowa1 = mysqli_fetch_assoc($resulta1)) {
        $student_value= "F" . $i;
        $student_grade = $rowa1['first_c_1'];
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
    $sqla2 = "SELECT * from ".$section."_grade_sec_sec WHERE student_first='$student_first' AND student_last='$student_last'";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqla2)) {
    header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
    exit();
    }
    $resulta2= mysqli_query($conn, $sqla2);
    while ($rowa2 = mysqli_fetch_assoc($resulta2)) {
        $student_value= "G" . $i;
        $student_grade = $rowa2['first_c_1'];
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
    $sqla3 = "SELECT * from ".$section."_grade_sec_first WHERE student_first='$student_first' AND student_last='$student_last'";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqla3)) {
    header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
    exit();
    }
    $resulta3= mysqli_query($conn, $sqla3);
    while ($rowa3 = mysqli_fetch_assoc($resulta3)) {
        $student_value= "H" . $i;
        $student_grade = $rowa3['first_c_2'];
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
    $sqla4 = "SELECT * from ".$section."_grade_sec_sec WHERE student_first='$student_first' AND student_last='$student_last'";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqla4)) {
    header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
    exit();
    }
    $resulta4= mysqli_query($conn, $sqla4);
    while ($rowa4 = mysqli_fetch_assoc($resulta4)) {
        $student_value= "I" . $i;
        $student_grade = $rowa4['first_c_2'];
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
    $sqla5 = "SELECT * from ".$section."_grade_sec_first WHERE student_first='$student_first' AND student_last='$student_last'";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqla5)) {
    header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
    exit();
    }
    $resulta5= mysqli_query($conn, $sqla5);
    while ($rowa5 = mysqli_fetch_assoc($resulta5)) {
        $student_value= "J" . $i;
        $student_grade = $rowa5['first_c_3'];
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
    $sqla6 = "SELECT * from ".$section."_grade_sec_sec WHERE student_first='$student_first' AND student_last='$student_last'";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqla6)) {
    header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
    exit();
    }
    $resulta6= mysqli_query($conn, $sqla6);
    while ($rowa6 = mysqli_fetch_assoc($resulta6)) {
        $student_value= "K" . $i;
        $student_grade = $rowa6['first_c_3'];
        if ($student_grade<=74) {
            $sheet->getStyle($student_value)->getFont()->setBold(true)
            ->getColor()
            ->setRGB('FF0000');
            $sheet->setCellValue($student_value, $student_grade);
        }
        $sheet->setCellValue($student_value, $student_grade);
    }
    //!core 3 sec grad



    //core 4 first grad
    $sqlaa5 = "SELECT * from ".$section."_grade_sec_first WHERE student_first='$student_first' AND student_last='$student_last'";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqlaa5)) {
    header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
    exit();
    }
    $resultaa5= mysqli_query($conn, $sqlaa5);
    while ($rowaa5 = mysqli_fetch_assoc($resultaa5)) {
        $student_value= "L" . $i;
        $student_grade = $rowaa5['first_c_4'];
        if ($student_grade<=74) {
            $sheet->getStyle($student_value)->getFont()->setBold(true)
            ->getColor()
            ->setRGB('FF0000');
            $sheet->setCellValue($student_value, $student_grade);
        }
        $sheet->setCellValue($student_value, $student_grade);
    }
    //!core 4 first grad


    //core 4 sec grad
    $sqlaa6 = "SELECT * from ".$section."_grade_sec_sec WHERE student_first='$student_first' AND student_last='$student_last'";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqlaa6)) {
    header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
    exit();
    }
    $resultaa6= mysqli_query($conn, $sqla6);
    while ($rowaa6 = mysqli_fetch_assoc($resultaa6)) {
        $student_value= "M" . $i;
        $student_grade = $rowaa6['first_c_4'];
        if ($student_grade<=74) {
            $sheet->getStyle($student_value)->getFont()->setBold(true)
            ->getColor()
            ->setRGB('FF0000');
            $sheet->setCellValue($student_value, $student_grade);
        }
        $sheet->setCellValue($student_value, $student_grade);
    }
    //!core 4 sec grad


    //app 1 first grad
    $sqla7 = "SELECT * from ".$section."_grade_sec_first WHERE student_first='$student_first' AND student_last='$student_last'";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqla7)) {
    header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
    exit();
    }
    $resulta7= mysqli_query($conn, $sqla7);
    while ($rowa7 = mysqli_fetch_assoc($resulta7)) {
        $student_value= "S" . $i;
        $student_grade = $rowa7['first_a_1'];
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
    $sqla8 = "SELECT * from ".$section."_grade_sec_sec WHERE student_first='$student_first' AND student_last='$student_last'";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqla8)) {
    header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
    exit();
    }
    $resulta8= mysqli_query($conn, $sqla8);
    while ($rowa8 = mysqli_fetch_assoc($resulta8)) {
        $student_value= "T" . $i;
        $student_grade = $rowa8['first_a_1'];
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
    $sqla9 = "SELECT * from ".$section."_grade_sec_first WHERE student_first='$student_first' AND student_last='$student_last'";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqla9)) {
    header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
    exit();
    }
    $resulta9= mysqli_query($conn, $sqla9);
    while ($rowa9 = mysqli_fetch_assoc($resulta9)) {
        $student_value= "U" . $i;
        $student_grade = $rowa9['first_a_2'];
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
    $sqla10 = "SELECT * from ".$section."_grade_sec_first WHERE student_first='$student_first' AND student_last='$student_last'";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqla10)) {
    header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
    exit();
    }
    $resulta10= mysqli_query($conn, $sqla10);
    while ($rowa10 = mysqli_fetch_assoc($resulta10)) {
        $student_value= "V" . $i;
        $student_grade = $rowa10['first_a_2'];
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
    $sqla11 = "SELECT * from ".$section."_grade_sec_first WHERE student_first='$student_first' AND student_last='$student_last'";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqla11)) {
    header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
    exit();
    }
    $resulta11= mysqli_query($conn, $sqla11);
    while ($rowa11 = mysqli_fetch_assoc($resulta11)) {
        $student_value= "W" . $i;
        $student_grade = $rowa11['first_a_3'];
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
    $sqla12 = "SELECT * from ".$section."_grade_sec_sec WHERE student_first='$student_first' AND student_last='$student_last'";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqla12)) {
    header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
    exit();
    }
    $resulta12= mysqli_query($conn, $sqla12);
    while ($rowa12 = mysqli_fetch_assoc($resulta12)) {
        $student_value= "X" . $i;
        $student_grade = $rowa12['first_a_3'];
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
    $sqla13 = "SELECT * from ".$section."_grade_sec_first WHERE student_first='$student_first' AND student_last='$student_last'";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqla13)) {
    header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
    exit();
    }
    $resulta13= mysqli_query($conn, $sqla13);
    while ($rowa13 = mysqli_fetch_assoc($resulta13)) {
        $student_value= "Y" . $i;
        $student_grade = $rowa13['first_a_4'];
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
    $sqla14 = "SELECT * from ".$section."_grade_sec_sec WHERE student_first='$student_first' AND student_last='$student_last'";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqla14)) {
    header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
    exit();
    }
    $resulta14= mysqli_query($conn, $sqla14);
    while ($rowa14 = mysqli_fetch_assoc($resulta14)) {
        $student_value= "Z" . $i;
        $student_grade = $rowa14['first_a_4'];
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
    $sqla15 = "SELECT * from ".$section."_grade_sec_first WHERE student_first='$student_first' AND student_last='$student_last'";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqla15)) {
    header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
    exit();
    }
    $resulta15= mysqli_query($conn, $sqla15);
    while ($rowa15 = mysqli_fetch_assoc($resulta15)) {
        $student_value= "AA" . $i;
        $student_grade = $rowa15['first_a_5'];
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
    $sqla16 = "SELECT * from ".$section."_grade_sec_sec WHERE student_first='$student_first' AND student_last='$student_last'";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqla16)) {
    header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
    exit();
    }
    $resulta16= mysqli_query($conn, $sqla16);
    while ($rowa16 = mysqli_fetch_assoc($resulta16)) {
        $student_value= "AB" . $i;
        $student_grade = $rowa16['first_a_5'];
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
     $sqla17 = "SELECT * from ".$section."_grade_sec_first WHERE student_first='$student_first' AND student_last='$student_last'";
     $stmt=mysqli_stmt_init($conn);
     if (!mysqli_stmt_prepare($stmt, $sqla17)) {
     header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
     exit();
     }
     $resulta17= mysqli_query($conn, $sqla17);
     while ($rowa17 = mysqli_fetch_assoc($resulta17)) {
         $student_value= "AD" . $i;
         $student_grade = $rowa17['sec_first_ave'];
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
     $sqla18 = "SELECT * from ".$section."_grade_sec_sec WHERE student_first='$student_first' AND student_last='$student_last'";
     $stmt=mysqli_stmt_init($conn);
     if (!mysqli_stmt_prepare($stmt, $sqla18)) {
     header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
     exit();
     }
     $resulta18= mysqli_query($conn, $sqla18);
     while ($rowa18 = mysqli_fetch_assoc($resulta18)) {
         $student_value= "AE" . $i;
         $student_grade = $rowa18['sec_sec_ave'];
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
     $sqla19 = "SELECT * from ".$section."_ave_sec WHERE student_first='$student_first' AND student_last='$student_last'";
     $stmt=mysqli_stmt_init($conn);
     if (!mysqli_stmt_prepare($stmt, $sqla19)) {
     header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
     exit();
     }
     $resulta19= mysqli_query($conn, $sqla19);
     while ($rowa19 = mysqli_fetch_assoc($resulta19)) {
         $student_value= "AF" . $i;
         $student_grade = $rowa19['ave_sec'];
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


$i=39;
$sqlaf = "SELECT * from ".$section."_student WHERE student_gender='Female' AND status='0'";
$stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqlaf)) {
    header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
    exit();
    }
$resultaf= mysqli_query($conn, $sqlaf);
$queryResultsaf= mysqli_num_rows($resultaf);
while ($rowaf = mysqli_fetch_assoc($resultaf)) {
    $student_first= $rowaf['student_first'];
    $student_last= $rowaf['student_last'];
    $student_value= "B" . $i;
    $student_name = $rowaf['student_last'] . $rowaf['student_first'] . $rowaf['student_middle'] . $rowaf['student_suffix'];
    $sheet->setCellValue($student_value, $student_name);


    $sqla1 = "SELECT * from ".$section."_grade_sec_first WHERE student_first='$student_first' AND student_last='$student_last'";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqla1)) {
    header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
    exit();
    }
    $resulta1= mysqli_query($conn, $sql1);
    while ($rowa1 = mysqli_fetch_assoc($resulta1)) {
        $student_value= "F" . $i;
        $student_grade = $rowa1['first_c_1'];
        if ($student_grade<=74) {
            $sheet->getStyle($student_value)->getFont()->setBold(true)
            ->getColor()
            ->setRGB('FF0000');
            $sheet->setCellValue($student_value, $student_grade);
        }
        $sheet->setCellValue($student_value, $student_grade);
    }


    //core 1 first grad
    $sqla1 = "SELECT * from ".$section."_grade_sec_first WHERE student_first='$student_first' AND student_last='$student_last'";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqla1)) {
    header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
    exit();
    }
    $resulta1= mysqli_query($conn, $sqla1);
    while ($rowa1 = mysqli_fetch_assoc($resulta1)) {
        $student_value= "F" . $i;
        $student_grade = $rowa1['first_c_1'];
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
    $sqla2 = "SELECT * from ".$section."_grade_sec_sec WHERE student_first='$student_first' AND student_last='$student_last'";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqla2)) {
    header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
    exit();
    }
    $resulta2= mysqli_query($conn, $sqla2);
    while ($rowa2 = mysqli_fetch_assoc($resulta2)) {
        $student_value= "G" . $i;
        $student_grade = $rowa2['first_c_1'];
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
    $sqla3 = "SELECT * from ".$section."_grade_sec_first WHERE student_first='$student_first' AND student_last='$student_last'";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqla3)) {
    header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
    exit();
    }
    $resulta3= mysqli_query($conn, $sqla3);
    while ($rowa3 = mysqli_fetch_assoc($resulta3)) {
        $student_value= "H" . $i;
        $student_grade = $rowa3['first_c_2'];
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
    $sqla4 = "SELECT * from ".$section."_grade_sec_sec WHERE student_first='$student_first' AND student_last='$student_last'";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqla4)) {
    header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
    exit();
    }
    $resulta4= mysqli_query($conn, $sqla4);
    while ($rowa4 = mysqli_fetch_assoc($resulta4)) {
        $student_value= "I" . $i;
        $student_grade = $rowa4['first_c_2'];
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
    $sqla5 = "SELECT * from ".$section."_grade_sec_first WHERE student_first='$student_first' AND student_last='$student_last'";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqla5)) {
    header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
    exit();
    }
    $resulta5= mysqli_query($conn, $sqla5);
    while ($rowa5 = mysqli_fetch_assoc($resulta5)) {
        $student_value= "J" . $i;
        $student_grade = $rowa5['first_c_3'];
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
    $sqla6 = "SELECT * from ".$section."_grade_sec_sec WHERE student_first='$student_first' AND student_last='$student_last'";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqla6)) {
    header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
    exit();
    }
    $resulta6= mysqli_query($conn, $sqla6);
    while ($rowa6 = mysqli_fetch_assoc($resulta6)) {
        $student_value= "K" . $i;
        $student_grade = $rowa6['first_c_3'];
        if ($student_grade<=74) {
            $sheet->getStyle($student_value)->getFont()->setBold(true)
            ->getColor()
            ->setRGB('FF0000');
            $sheet->setCellValue($student_value, $student_grade);
        }
        $sheet->setCellValue($student_value, $student_grade);
    }
    //!core 3 sec grad



    //core 3 first grad
    $sqlaa5 = "SELECT * from ".$section."_grade_sec_first WHERE student_first='$student_first' AND student_last='$student_last'";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqlaa5)) {
    header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
    exit();
    }
    $resultaa5= mysqli_query($conn, $sqlaa5);
    while ($rowaa5 = mysqli_fetch_assoc($resultaa5)) {
        $student_value= "L" . $i;
        $student_grade = $rowaa5['first_c_4'];
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
    $sqlaa6 = "SELECT * from ".$section."_grade_sec_sec WHERE student_first='$student_first' AND student_last='$student_last'";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqlaa6)) {
    header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
    exit();
    }
    $resultaa6= mysqli_query($conn, $sqlaa6);
    while ($rowaa6 = mysqli_fetch_assoc($resultaa6)) {
        $student_value= "M" . $i;
        $student_grade = $rowaa6['first_c_4'];
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
    $sqla7 = "SELECT * from ".$section."_grade_sec_first WHERE student_first='$student_first' AND student_last='$student_last'";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqla7)) {
    header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
    exit();
    }
    $resulta7= mysqli_query($conn, $sqla7);
    while ($rowa7 = mysqli_fetch_assoc($resulta7)) {
        $student_value= "S" . $i;
        $student_grade = $rowa7['first_a_1'];
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
    $sqla8 = "SELECT * from ".$section."_grade_sec_sec WHERE student_first='$student_first' AND student_last='$student_last'";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqla8)) {
    header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
    exit();
    }
    $resulta8= mysqli_query($conn, $sqla8);
    while ($rowa8 = mysqli_fetch_assoc($resulta8)) {
        $student_value= "T" . $i;
        $student_grade = $rowa8['first_a_1'];
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
    $sqla9 = "SELECT * from ".$section."_grade_sec_first WHERE student_first='$student_first' AND student_last='$student_last'";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqla9)) {
    header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
    exit();
    }
    $resulta9= mysqli_query($conn, $sqla9);
    while ($rowa9 = mysqli_fetch_assoc($resulta9)) {
        $student_value= "U" . $i;
        $student_grade = $rowa9['first_a_2'];
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
    $sqla10 = "SELECT * from ".$section."_grade_sec_first WHERE student_first='$student_first' AND student_last='$student_last'";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqla10)) {
    header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
    exit();
    }
    $resulta10= mysqli_query($conn, $sqla10);
    while ($rowa10 = mysqli_fetch_assoc($resulta10)) {
        $student_value= "V" . $i;
        $student_grade = $rowa10['first_a_2'];
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
    $sqla11 = "SELECT * from ".$section."_grade_sec_first WHERE student_first='$student_first' AND student_last='$student_last'";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqla11)) {
    header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
    exit();
    }
    $resulta11= mysqli_query($conn, $sqla11);
    while ($rowa11 = mysqli_fetch_assoc($resulta11)) {
        $student_value= "W" . $i;
        $student_grade = $rowa11['first_a_3'];
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
    $sqla12 = "SELECT * from ".$section."_grade_sec_sec WHERE student_first='$student_first' AND student_last='$student_last'";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqla12)) {
    header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
    exit();
    }
    $resulta12= mysqli_query($conn, $sqla12);
    while ($rowa12 = mysqli_fetch_assoc($resulta12)) {
        $student_value= "X" . $i;
        $student_grade = $rowa12['first_a_3'];
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
    $sqla13 = "SELECT * from ".$section."_grade_sec_first WHERE student_first='$student_first' AND student_last='$student_last'";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqla13)) {
    header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
    exit();
    }
    $resulta13= mysqli_query($conn, $sqla13);
    while ($rowa13 = mysqli_fetch_assoc($resulta13)) {
        $student_value= "Y" . $i;
        $student_grade = $rowa13['first_a_4'];
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
    $sqla14 = "SELECT * from ".$section."_grade_sec_sec WHERE student_first='$student_first' AND student_last='$student_last'";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqla14)) {
    header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
    exit();
    }
    $resulta14= mysqli_query($conn, $sqla14);
    while ($rowa14 = mysqli_fetch_assoc($resulta14)) {
        $student_value= "Z" . $i;
        $student_grade = $rowa14['first_a_4'];
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
    $sqla15 = "SELECT * from ".$section."_grade_sec_first WHERE student_first='$student_first' AND student_last='$student_last'";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqla15)) {
    header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
    exit();
    }
    $resulta15= mysqli_query($conn, $sqla15);
    while ($rowa15 = mysqli_fetch_assoc($resulta15)) {
        $student_value= "AA" . $i;
        $student_grade = $rowa15['first_a_5'];
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
    $sqla16 = "SELECT * from ".$section."_grade_sec_sec WHERE student_first='$student_first' AND student_last='$student_last'";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqla16)) {
    header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
    exit();
    }
    $resulta16= mysqli_query($conn, $sqla16);
    while ($rowa16 = mysqli_fetch_assoc($resulta16)) {
        $student_value= "AB" . $i;
        $student_grade = $rowa16['first_a_5'];
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
    $sqlaa15 = "SELECT * from ".$section."_grade_sec_first WHERE student_first='$student_first' AND student_last='$student_last'";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqlaa15)) {
    header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
    exit();
    }
    $resultaa15= mysqli_query($conn, $sqlaa15);
    while ($rowaa15 = mysqli_fetch_assoc($resultaa15)) {
        $student_value= "AD" . $i;
        $student_grade = $rowaa15['sec_first_ave'];
        if ($student_grade<=74) {
            $sheet->getStyle($student_value)->getFont()->setBold(true)
            ->getColor()
            ->setRGB('FF0000');
            $sheet->setCellValue($student_value, $student_grade);
        }
        $sheet->setCellValue($student_value, $student_grade);
    }
    //!app 5 first grad

    //ave sec grad
    $sqlaa16 = "SELECT * from ".$section."_grade_sec_sec WHERE student_first='$student_first' AND student_last='$student_last'";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqlaa16)) {
    header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
    exit();
    }
    $resultaa16= mysqli_query($conn, $sqlaa16);
    while ($rowaa16 = mysqli_fetch_assoc($resultaa16)) {
        $student_value= "AE" . $i;
        $student_grade = $rowaa16['sec_sec_ave'];
        if ($student_grade<=74) {
            $sheet->getStyle($student_value)->getFont()->setBold(true)
            ->getColor()
            ->setRGB('FF0000');
            $sheet->setCellValue($student_value, $student_grade);
        }
        $sheet->setCellValue($student_value, $student_grade);
    }
    //!app 5 sec grad


    //ave sec grad
    $sqlaaa16 = "SELECT * from ".$section."_ave_sec WHERE student_first='$student_first' AND student_last='$student_last'";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqlaaa16)) {
    header("location: ../url.php?error=stmtfailed&grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=1");
    exit();
    }
    $resultaaa16= mysqli_query($conn, $sqlaaa16);
    while ($rowaaa16 = mysqli_fetch_assoc($resultaaa16)) {
        $student_value= "AF" . $i;
        $student_grade = $rowaaa16['ave_sec'];
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
$writer->save($filesss);

echo "done";
//Second Semester

$files = array($filess, $filesss);
$date= date("Y/m/d");
$zipname = $section.".zip";
$zip = new ZipArchive;
$zip->open($zipname, ZipArchive::CREATE);
foreach ($files as $file) {
  $zip->addFile($file);
}
$zip->close();

header('Content-Type: application/zip');
header('Content-disposition: attachment; filename='.$zipname);
header('Content-Length: ' . filesize($zipname));
readfile($zipname);

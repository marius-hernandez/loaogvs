<?php
include_once '../../include/dbh.inc.php';

$first= mysqli_real_escape_string($conn, $_GET['first']);
$last= mysqli_real_escape_string($conn, $_GET['last']);
$gender= mysqli_real_escape_string($conn, $_GET['gender']);
$section= mysqli_real_escape_string($conn, $_GET['section']);

if (isset($_POST['retrieve-regular'])) {
    $sqlSection = "INSERT INTO ".$section."_student(student_gender, student_first, student_last) VALUES(?, ?, ?) ORDER by student_last;";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqlSection)) {
        echo "sftmt";
        exit();
    }
    mysqli_stmt_bind_param($stmt, "sss", $gender, $first, $last);
     mysqli_stmt_execute($stmt);
     mysqli_stmt_close($stmt);

     $sql = "DELETE from ".$section."_student_irregular WHERE student_first='$first' AND student_last='$last';";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "stmt";
        exit();
    }
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location:../verti-header.php?name=irregular&section=".$section."");
}
else {
    
    $sqlSection = "INSERT INTO ".$section."_student_irregular(student_gender, student_first, student_last) VALUES(?, ?, ?);";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqlSection)) {
        echo "sftmt";
        exit();
    }
    mysqli_stmt_bind_param($stmt, "sss", $gender, $first, $last);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    $sql = "DELETE from ".$section."_student WHERE student_first='$first' AND student_last='$last';";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "stmt";
        exit();
    }
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location:../verti-header.php?name=section_list&section=".$section."");
}
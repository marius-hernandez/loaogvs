<?php
include_once '../include/dbh.inc.php';
include_once '../include/functions.inc.php';
error_reporting(0);
session_start();
$grade= mysqli_real_escape_string($conn, $_GET['grade']);
$name= mysqli_real_escape_string($conn, $_GET['name']);
$track= mysqli_real_escape_string($conn, $_GET['track']);
$strand= mysqli_real_escape_string($conn, $_GET['strand']);
$spec= mysqli_real_escape_string($conn, $_GET['spec']);
$section= mysqli_real_escape_string($conn, $_GET['section']);
$lrnlist = $_POST['lrnlist'];
$lrn = $_POST['lrn'];
    if ($name=="add") {
        
        if ($_SESSION['section']=="not") {
            header("location:verti-header.php?name=student&&error=select");
            exit();
        }

        else{
            $sql = "SELECT * from student where user_lrn=$lrn";
            $result= mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $lrn=$row['user_lrn'];
            $gender=$row['user_gender'];
            $first=$row['user_first'];
            $last=$row['user_last'];
            $middle=$row['user_middle'];
            $suffix=$row['user_suffix'];
            
            if (studentExists($conn, $lrn) !== false) {
                header("location: verti-header.php?error=studentExists&name=list&&section=".$section."");
                exit();
            }
            else {
                $sql = "UPDATE student SET user_grade=?, user_track=?, user_strand=?, user_spec=?, user_section=? WHERE user_lrn= ? ";
                $stmt=mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("location: verti-header.php?error=stmtfailed&name=list&&section=".$rowclass['class_name']."");
                    exit();
                }
                mysqli_stmt_bind_param($stmt, "ssssss", $grade, $track, $strand, $spec, $section, $lrn);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);

                $sqlclass = "SELECT * from section";
                $result= mysqli_query($conn, $sqlclass);
                $row = mysqli_fetch_assoc($result);
                header("location: verti-header.php?name=list&&section=".$section."");

                $sqlIn = "INSERT INTO ".$section."_student (student_lrn, student_gender, student_first, student_last, student_middle, student_suffix) VALUES(?,?,?,?,?,?)";
                $stmt=mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sqlIn)) {
                    header("location: verti-header.php?error=stmtfailed&name=list&&section=".$rowclass['class_name']."");
                    exit();
                }
                mysqli_stmt_bind_param($stmt, "ssssss", $lrn, $gender, $first, $last, $middle, $suffix);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);

                $sqlclass = "SELECT * from section";
                $result= mysqli_query($conn, $sqlclass);
                $row = mysqli_fetch_assoc($result);
                header("location: verti-header.php?name=list&&section=".$section."");
                }
            
            }
    }
    elseif ($name=="delete") {
        $sql = "DELETE from ".$section."_student WHERE student_lrn= '$lrnlist'";
        $stmt=mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            $sqlclass = "SELECT * from section where class_name='$section' ";
            $resultclass= mysqli_query($conn, $sqlclass);
            $rowclass = mysqli_fetch_assoc($resultclass);
            header("location: verti-header.php?error=stmtfailed&name=list&&section=".$rowclass['class_name']."");
            exit();
        }
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: verti-header.php?name=list&&section=".$section."");
        exit();
    }
    
?>
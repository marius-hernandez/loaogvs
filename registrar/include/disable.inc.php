<?php
include_once '../../include/dbh.inc.php';

$sem=$_POST['sem'];
$gradfirst=$_POST['gradfirst'];
$gradsec=$_POST['gradsec'];

if (($sem=="first") && ($gradfirst=="first-grading") ) {
    if (($sem=="first") && ($gradsec=="sec-grading")) {
        $sql = "UPDATE disable_semester SET first='yes', second='', first_first='yes', first_second='yes', second_first='', second_second='' WHERE id='1';";
        $stmt=mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "stmt";
            exit();
        }
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../verti-header.php?name=home");
    }
    else {
        $sql = "UPDATE disable_semester SET first='yes', second='', first_first='yes', first_second='', second_first='', second_second='' WHERE id='1';";
        $stmt=mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "stmt";
            exit();
        }
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../verti-header.php?name=home");
    }
    
}

else if (($sem=="first") && ($gradsec=="sec-grading") ) {
    if (($sem=="first") && ($gradfirst=="first-grading")) {
        $sql = "UPDATE disable_semester SET first='yes', second='', first_first='yes', first_second='yes', second_first='', second_second='' WHERE id='1';";
        $stmt=mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "stmt";
            exit();
        }
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../verti-header.php?name=home");
    }
    else {
        $sql = "UPDATE disable_semester SET first='yes', second='', first_first='', first_second='yes', second_first='', second_second='' WHERE id='1';";
        $stmt=mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "stmt";
            exit();
        }
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../verti-header.php?name=home");
    }
}

else if (($sem=="sec") && ($gradfirst=="first-grading") ) {
    if (($sem=="sec") && ($gradsec=="sec-grading")) {
        $sql = "UPDATE disable_semester SET first='', second='yes', first_first='', first_second='', second_first='yes', second_second='yes' WHERE id='1';";
        $stmt=mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "stmt";
            exit();
        }
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../verti-header.php?name=home");
    }
    else {
        $sql = "UPDATE disable_semester SET first='', second='yes', first_first='', first_second='', second_first='yes', second_second='' WHERE id='1';";
        $stmt=mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "stmt";
            exit();
        }
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../verti-header.php?name=home");
    }
    
}

else if (($sem=="sec") && ($gradsec=="sec-grading") ) {
    if (($sem=="sec") && ($gradfirst=="first-grading")) {
        $sql = "UPDATE disable_semester SET first='', second='yes', first_first='', first_second='', second_first='yes', second_second='yes' WHERE id='1';";
        $stmt=mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "stmt";
            exit();
        }
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../verti-header.php?name=home");
    }
    else {
        $sql = "UPDATE disable_semester SET first='', second='yes', first_first='', first_second='', second_first='', second_second='yes' WHERE id='1';";
        $stmt=mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "stmt";
            exit();
        }
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../verti-header.php?name=home");
    }
    
}
else{
    header("location: ../verti-header.php?name=home&error=emptyInput");
}
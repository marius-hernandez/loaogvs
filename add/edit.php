<?php
include_once '../include/dbh.inc.php';
error_reporting(0);
$year=$_POST['year'];
$id=$_POST['id'];
$lrn=$_POST['lrn'];
$first=$_POST['first'];
$last=$_POST['last'];
if (isset($_POST['edit'])) {
    echo "edit";
    echo $year;
    echo $id;
}
else if (isset($_POST['delete'])) {
    $sql = "DELETE from teacher WHERE user_year= '$year' AND user_id= '$id' ";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: verti-header.php?name=all?error=stmtfailed");
        exit();
    }
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: verti-header.php?name=all&error=none");
}

else if (isset($_POST['delete-s'])) {
    $sql = "DELETE from student WHERE user_lrn='$lrn' ";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: verti-header.php?name=all?error=stmtfailed");
        exit();
    }
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: verti-header.php?name=all&error=none");
}

else if (isset($_POST['delete-a'])) {
    $sql = "DELETE from teacher WHERE user_first='$first' AND user_last='$last' AND type='admin' ";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: verti-header.php?name=all?error=stmtfailed");
        exit();
    }
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: verti-header.php?name=all&error=none");
}



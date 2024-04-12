<?php 
include_once '../include/dbh.inc.php';
include_once '../include/functions.inc.php';
$lrnlist = $_POST['lrnlist'];
$lrn=$_POST['lrn'];
$gender=$_POST['gender'];
$last=$_POST['last'];
$first=$_POST['first'];
$middle=$_POST['middle'];
$suffix=$_POST['suffix'];
$irreg=$_POST['irreg'];
$emailp=$_POST['emailp'];
$section= mysqli_real_escape_string($conn, $_GET['section']);

$sql = "SELECT * from ".$section."_student where student_lrn= $lrn";
$stmt=mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: verti-header.php?error=stmtfailed&name=list&&section=".$rowclass['class_name']."");
    exit();
  }
$result= mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$sql2 = "SELECT * from student where user_lrn= $lrn";
$stmt=mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql2)) {
    header("location: verti-header.php?error=stmtfailed&name=list&&section=".$rowclass['class_name']."");
    exit();
  }
$result2= mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_assoc($result2);
$oldfirst = $row2['user_first'];
$oldlast = $row2['user_last'];
$oldmiddle = $row2['user_middle'];

$sql3 = "SELECT * from student";
$stmt=mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql3)) {
    header("location: verti-header.php?error=stmtfailed&name=list&&section=".$rowclass['class_name']."");
    exit();
  }
$result3= mysqli_query($conn, $sql3);
$row3 = mysqli_fetch_assoc($result3);



if (emptyInputStudent($lrn, $gender, $first, $last) !== false) {
  header("location: verti-header.php?error=emptyinput&&name=list&&section=".$section."");
  exit();
}
/*
else if ($row['student_first'] !== $first && $row['student_last'] !== $last && $row['student_middle'] !== $middle && $row['student_suffix'] !== $suffix) {
  if (nameExists($conn, $first, $last, $middle) !== false) {
    header("location: verti-header.php?error=studentExists&&name=list&&section=".$section."");
    exit();
  }
  
}
*/

else if ($lrnlist !== $lrn) {
  if (lrnExists($conn, $lrn) !== false) {
    header("location: verti-header.php?error=lrnExists&&name=list&&section=".$section."");
    exit();
  }
}

elseif ($oldfirst !== $first && $oldlast !== $last && $oldmiddle !== $middle) {
  if (nameExists($conn, $first, $last, $middle) !== false) {
    header("location: verti-header.php?error=nameExists&&name=list&&section=".$section."");
    exit();
  }
}


else {
  while ($row3 = mysqli_fetch_assoc($result3)) { 
    if ($emailp == $row3['user_email']) {
          header("location: verti-header.php?error=emailExistsOnStudent&&name=list&&section=".$section."");
          exit();
    }
  }
  $sqlup = "UPDATE student SET user_lrn=?, user_section=?, user_gender=?, user_first=?, user_last=?, user_middle=?, user_suffix=? WHERE user_lrn= '$lrnlist' ";
  $stmt=mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sqlup)) {
    header("location: verti-header.php?error=stmtfailed&name=list&&section=".$rowclass['class_name']."");
    exit();
  }
  mysqli_stmt_bind_param($stmt, "sssssss", $lrn, $section, $gender, $first, $last, $middle, $suffix);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);

  $sqlIn = "UPDATE ".$section."_student SET student_lrn=?, student_gender=?, student_first=?, student_last=?, student_middle=?, student_suffix=?, parent_email=?, irregular=? WHERE student_lrn= '$lrnlist' ";
  $stmt=mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sqlIn)) {
    header("location: verti-header.php?error=stmtfailed&name=list&&section=".$rowclass['class_name']."");
    exit();
  }
  mysqli_stmt_bind_param($stmt, "ssssssss", $lrn, $gender, $first, $last, $middle, $suffix, $emailp, $irreg);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);

  $sqlclass = "SELECT * from section";
  $result= mysqli_query($conn, $sqlclass);
  $row = mysqli_fetch_assoc($result);
  header("location: verti-header.php?name=list&&section=".$section."");
}




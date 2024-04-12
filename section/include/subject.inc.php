<?php
    session_start();
    include_once '../../include/dbh.inc.php';
    include_once '../../include/functions.inc.php';

$conn = mysqli_connect("localhost", "root", "", "loags");
$number = count($_POST["name"]);
$number = count($_POST["c2name"]);
$number = count($_POST["a1name"]);
$number = count($_POST["a2name"]);
$number = count($_POST["code"]);



if($number > 1)
{
	for($i=0; $i<$number; $i++)
	{
		if(trim($_POST["name"][$i] != ''))
		{
			$type = "Core Subject";
			$sem = "1";
			$sql = "INSERT INTO subject(subject,code, type,semester) VALUES('".mysqli_real_escape_string($conn, $_POST["name"][$i])."', '".mysqli_real_escape_string($conn, $_POST["code"][$i])."', '".$type."','".$sem."')";
			$stmt = mysqli_stmt_init($conn);
			if (!mysqli_stmt_prepare($stmt, $sql)) {
				echo "stmt failed";
				exit();
			}
			mysqli_stmt_execute($stmt);
			
		}
		else if(trim($_POST["a1name"][$i] != ''))
		{
			$type= "Applied Subject";
			$sem = "1";
			$sql = "INSERT INTO subject(subject,code, type,semester) VALUES('".mysqli_real_escape_string($conn, $_POST["a1name"][$i])."', '".mysqli_real_escape_string($conn, $_POST["code"][$i])."', '".$type."','".$sem."')";
			$stmt = mysqli_stmt_init($conn);
			if (!mysqli_stmt_prepare($stmt, $sql)) {
				echo "stmt failed";
				exit();
			}
			mysqli_stmt_execute($stmt);
		}
		else if(trim($_POST["c2name"][$i] != ''))
		{
			$type = "Core Subject";
			$sem = "2";
			$sql = "INSERT INTO subject(subject,code, type,semester) VALUES('".mysqli_real_escape_string($conn, $_POST["c2name"][$i])."', '".mysqli_real_escape_string($conn, $_POST["code"][$i])."', '".$type."','".$sem."')";
			$stmt = mysqli_stmt_init($conn);
			if (!mysqli_stmt_prepare($stmt, $sql)) {
				echo "stmt failed";
				exit();
			}
			mysqli_stmt_execute($stmt);
		}
		else if(trim($_POST["a2name"][$i] != ''))
		{
			echo "Applied Subject";
			$sem = "2";
			$sql = "INSERT INTO subject(subject,code, type,semester) VALUES('".mysqli_real_escape_string($conn, $_POST["a2name"][$i])."', '".mysqli_real_escape_string($conn, $_POST["code"][$i])."', '".$type."','".$sem."')";
			$stmt = mysqli_stmt_init($conn);
			if (!mysqli_stmt_prepare($stmt, $sql)) {
				echo "stmt failed";
				exit();
			}
			mysqli_stmt_execute($stmt);
		}
	}
	echo "Data Inserted";
}
else
{
	echo "Please Enter Name";
}
    
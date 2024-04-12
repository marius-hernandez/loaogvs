<?php
include_once 'include/dbh.inc.php';
include_once('fpdf17/fpdf.php');

$section= mysqli_real_escape_string($conn, $_GET['section']);
$lrn= mysqli_real_escape_string($conn, $_GET['lrn']);

echo $section;
echo $lrn;
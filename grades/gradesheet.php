<?php
    include_once '../include/functions.inc.php';
    include_once '../include/dbh.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grades</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
</body>
</html>
<?php
$first=$_SESSION['userfirst'];
$last=$_SESSION['userlast'];
$sql = "SELECT * FROM student WHERE user_first='$first' AND user_last='$last'";
$stmt=mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: verti-header.php?error=stmtfailed&name=all");
    exit();
}
$result= mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$lrn=$row['user_lrn'];
$track=$row['user_track'];
$strand=$row['user_strand'];
$spec=$row['user_spec'];
$section=$row['user_section'];
$gender=$row['user_gender'];
$first=$row['user_first'];
$last=$row['user_last'];
$middle=$row['user_middle'];
$suffix=$row['user_suffix'];
$p_section=$row['p_section'];

if ($strand=="ABM") {
    include_once '../card/abm.php';
}

else if ($strand=="STEM") {
    include_once '../card/stem.php';
}

else if ($strand=="HUMSS") {
    include_once '../card/humss.php';
}
else if ($strand=="GAS") {
    include_once '../card/gas.php';
}
else if ($strand=="ICT") {
    if ($spec=="ICT Animation") {
        include_once '../card/ict-an.php';
    }
    else if ($spec=="ICT Programming") {
        include_once '../card/ict-prog.php';
    }
    else if ($spec=="ICT CSS") {
        include_once '../card/ict-css.php';
    } 
}

else if ($strand=="HE") {
    if ($spec=="HE Cookery") {
        include_once '../card/he-cook.php';
    }
    else if ($spec=="HE Tourism") {
        include_once '../card/he-tour.php';
    }
}

else if ($strand=="IA") {
    if ($spec=="IA Automotive") {
        include_once '../card/ia-auto.php';
    }
    else if ($spec=="IA SMAW") {
        include_once '../card/ia-smaw.php';
    }
}
else{
    echo "haha";
}



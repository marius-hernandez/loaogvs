<?
$name= mysqli_real_escape_string($conn, $_GET['name']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
*{
    text-align: center;
    max-width: 100%;
}
</style>
<body>
<?php
if ($name=="app") {
    echo"<h2>Instructions</h2>
    <p>All the pending accounts are listed in a box below.</p>
    <p>Please double check the Year and the ID.</p>
    <p>If you experienced any technical issue, please contact us.</p>";
}
elseif ($name=="all") {
    echo"<h2>Instructions</h2>
    <p>All the section(s) listed at the right side is all the section you have created in this website.</p>
    <p>Before clicking the ADD SUBJECT button, check all the information.</p>
    <p>Take note: The track/strand you have inputted is linked to a corresponding card layout which includes all the subjects and the semester.</p>";
}
else{
    echo"<h2>Instructions</h2>
    <p>All the section(s) listed at the right side is all the section you have created in this website.</p>
    <p>Before clicking the ADD SUBJECT button, check all the information.</p>
    <p>Take note: The track/strand you have inputted is linked to a corresponding card layout which includes all the subjects and the semester.</p>";
}
    

?>
</body>
</html>
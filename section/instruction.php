<?
session_start();

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
body{
    text-align: left;
    max-width: 100%;
}
.shark{
    top: 0;
}
.shark:hover{
    -webkit-animation:spin 2s linear infinite;
    -moz-animation:spin 2s linear infinite;
    animation:spin 2s linear infinite;
}
.cookie{
    background-color: #335779;
      color: white;
}
@-moz-keyframes spin { 100% { -ms-transform: rotate(360deg); } }
@-webkit-keyframes spin { 100% { -webkit-transform: rotate(360deg); } }
@keyframes spin { 100% { -webkit-transform: rotate(360deg); transform:rotate(360deg); } }
</style>
<body>
<div class='cookie'>
<?php
if ($_SESSION['name']=="input") {
    echo"<h2>Instructions</h2>
    <img src='../pics/icon.png' style='height: 100px;' alt='Shark Icon' class='shark'>
    <p>All the section(s) listed below is all the section you have created in this website.</p>
    <p>Before Proceeding: Take note that any sent grades to email cannnot be undo.</p>
    <p>Please check all the slides before sending the grades. </p>";
}
elseif ($_SESSION['name']=="section") { 
    echo"<h2>Instructions</h2>
    <img src='../pics/icon.png' style='height: 100px;' alt='Shark Icon' class='shark'>
    <p>All the section(s) listed at the right side is all the section you have created in this website.</p>
    <p>Before clicking the ADD SUBJECT button, check all the information.</p>
    <p>Take note: The track/strand you have inputted is linked to a corresponding card layout which includes all the subjects and the semester.</p>";
}
elseif ($_SESSION['name']=="student") { 
    echo"<h2>Instructions</h2>
    <img src='../pics/icon.png' style='height: 100px;' alt='Shark Icon' class='shark'>
    <p>All the section(s) and student(s) listed at the right side is all the section and student you/admin have created in this website.</p>
    <p>Before clicking the 'ADD' student button, make sure that selected a section first</p>
    <p>Take note: The track/strand you have inputted is linked to a corresponding card layout which includes all the subjects and the semester.</p>";
}
elseif ($_SESSION['name']=="add-student") { 
    echo"<h2>Instructions</h2>
    <img src='../pics/icon.png' style='height: 100px;' alt='Shark Icon' class='shark'>
    <p>All the section(s) and student(s) listed at the left side is all the student you have created in this website.</p>
    <p>Before clicking the ADD student button, make sure that you double check all the fields</p>
    <p>Take note: The track/strand you have inputted is linked to a corresponding card layout which includes all the subjects and the semester.</p>";
}
else{
    echo"<h2>Instructions</h2>
    <img src='../pics/icon.png' style='height: 100px;' alt='Shark Icon' class='shark'>
    <p>All the section(s) listed at the right side is all the section you have created in this website.</p>
    <p>Before clicking the ADD SUBJECT button, check all the information.</p>
    <p>Take note: The track/strand you have inputted is linked to a corresponding card layout which includes all the subjects and the semester.</p>";
}
    

?>
</div>
</body>
</html>
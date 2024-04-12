<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<style>
    body{
        text-align: center;
    }
    .btn-primary{
        height: 80px;
        margin: 20px;
    }
</style>
<body>
    <form action="strand12.php" method="POST">
    <input type="hidden" name='track'>
        <button type='submit' name='stem' class='btn btn-primary'>Science, Technology, Engineering and Mathematics</button>
        <button type='submit' name='humss' class='btn btn-primary'>Humanities and Social Sciences</button>
        <button type='submit' name='abm' class='btn btn-primary'>Accountancy, Business and Management</button>
        <br>
        <button type='submit' name='gas' class='btn btn-primary'>General Academics Strand</button>
        <button type='submit' name='css' class='btn btn-primary'>ICT - CSS</button>
        <button type='submit' name='prog' class='btn btn-primary'>ICT - Programming</button>
        <br>
        <button type='submit' name='ani' class='btn btn-primary'>ICT - Animation</button>
        <button type='submit' name='tour' class='btn btn-primary'>HE - Tourism</button>
        <button type='submit' name='cook' class='btn btn-primary'>HE - Cookery</button>
        <br>
        <button type='submit' name='smaw' class='btn btn-primary'>IA - SMAW</button>
        <button type='submit' name='auto' class='btn btn-primary'>IA - Automotive</button>
    </form>
</body>
</html>
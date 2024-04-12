<?php
    session_start();
    $sid = session_id();
    require_once 'include/dbh.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">    
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">

    <title>Lyceum of Alabang Online Grade Viewer</title>
</head>
<body>
    <nav>
        <div class="wrapper">
            <a href=""></a>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="">About Us</a></li>
                <?php
                    if (isset($_SESSION["id"])) {
                        echo "<li><a href='grades.php'>Grades</a></li>";
                        echo "<li><a href='setting.php'>Settings</a></li>";
                        echo "<li><a href='include/logout.inc.php'>Logout</a></li><br>";
                    }
                    else if (isset($_SESSION["idt"])) {
                        echo "<li><a href='section/all-section.php'>Section</a></li>";
                        echo "<li><a href='setting.php'>Settings</a></li>";
                        echo "<li><a href='include/logout.inc.php'>Logout</a></li><br>";
                    }
                    else {
                        echo"<li><a href='signup.php'>Sign up</a></li>";
                        echo"<li><a href='login.php'>Login</a></li>";
                    }
                ?>
                
            </ul>
        </div>
    </nav>
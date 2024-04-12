<?php
    $sid = session_id();
    //require_once 'include/dbh.inc.php';
    error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">    
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Lyceum of Alabang Online Grade Viewer</title>
</head>
<script>
        function myFunction() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
            x.className += " responsive";
        } else {
            x.className = "topnav";
        }
        }
    </script>
<style>
body{
    margin: 0px;
    padding-top: 70px;
}
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  position: fixed;
  top: 0;
  width: 100%;
  background-color: #3a6289;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  
}
li a:hover:not(.active) {
  background-color: #111;
}

.active {
  background-color: #4CAF50;
}
.topnav {
  overflow: hidden;
  background-color: #3a6289;
  position: -webkit-sticky; /* Safari */
  position: fixed;
  top: 0;
  width: 100%;
  z-index:9; 
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav .icon {
  display: none;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
  .top-nav{
    margin: 0px;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    margin-top: 0px;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    margin-top: 0px;
    float: none;
    display: block;
    text-align: left;
  }
}

</style>

<body>
        <div class="topnav" id="myTopnav">
                <a href="home.php" class='logo'>Lyceum of Alabang Inc. OGV</a>
                <a href="home.php" class="active">Home</a>
                <?php
                $first=$_SESSION['first'];
                $last=$_SESSION['last'];
                    if ($_SESSION['type']=="teacher") {
                        echo "<a href='section/section.php?name=input '>Section</a>";
                        echo "<a href='setting.php'>Settings</a>";
                        echo "<a href='include/logout.inc.php'>Logout</a>";
                    }
                    else if ($_SESSION['type']=="student") {
                        echo "<a href='grades/verti-header.php?name=all'>Grades</a>";
                        echo "<a href='setting.php'>Settings</a>";
                        echo "<a href='include/logout.inc.php'>Logout</a><br>";
                    }
                    else if ($_SESSION['type']=="admin") {
                        echo "<a href='approval.php'>Approval</a>";
                        echo "<a href='add/verti-header.php?name=all'>Users</a>";
                        echo "<a href='setting.php'>Settings</a>";
                        echo "<a href='include/logout.inc.php'>Logout</a><br>";
                    }
                    else {
                        echo"<a href='signup.php'>Sign up</a>";
                        echo"<a href='login.php'>Login</a>";
                    }
                ?>
                <a href='javascript:void(0);' class='icon' onclick='myFunction()'>
                    <i class='fa fa-bars'></i>
                  </a>

        </div>
    
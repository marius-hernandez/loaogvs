<?php
include_once '../include/functions.inc.php';
include_once '../include/dbh.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- ===== BOX ICONS ===== -->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

        <!-- ===== CSS ===== -->
        <link rel="stylesheet" href="assets/css/styles.css">

        <link rel="shortcut icon" href="../pics/loa.png">

        <title>Section</title>
    </head>
    <style>
        *{
            margin: 0%;
        }
        table{
            margin-left: auto;
            margin-right: auto;
            width: 100%;
        }
        td{
            vertical-align: top;
            font-size: 1vw;
        }
        h1, h3{
            text-align: center;
        }
        .title{
            font-size: 40px;
        }
        .student{        
        display: flex;
        align-items: center;
        }
        a:hover{
            text-decoration: none;
        }
        
        hr{
        background: linear-gradient(to right, #235789, #F1D302);
        height: 5px;
        width: 25%;
        }
        .title{
            margin-top: 80px;
            text-align: left;
            color: #333333;
            font-family: 'Raleway', sans-serif;
            
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script type="text/javascript">
            $(document).on('click', 'ul li', function(){
                $(this).addClass('active')
            })
        </script>
    
    <body id="body-pd">
        <header class="header" id="header">
            <div class="header__toggle">
                <i class='bx bx-menu' id="header-toggle"></i>
            </div>

        </header>
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script type="text/javascript">
            $(document).on('click', 'ul li', function(){
                $(this).addClass('active')
            })
        </script>

        <div class="l-navbar" id="nav-bar">
            <nav class="nav">
            
                <div>
                    <a href="verti-header.php?name=all" class="nav__logo">
                        <i class='bx bx-lock nav__logo-icon'></i>
                        <span class="nav__logo-name">Lyceum of Alabang Inc. OGV</span>
                    </a>
                    
                    <div class="nav__list">

                            <a href="verti-header.php?name=first" class="nav__link" id="nav_teacher">
                            <i class='bx bxs-user nav__icon' ></i>
                            <span class="nav__name">1st Semester</span>
                            </a>

                            <a href="verti-header.php?name=sec" class="nav__link" id="nav_student">
                            <i class='bx bx-user nav__icon' ></i>
                            <span class="nav__name">2nd Semester</span>
                            </a>
                            <a style= "text-decoration: none;" href="verti-header.php?name=setting" class="nav__link" id="nav_student">
                            <i class="bx bxs-edit nav__icon" ></i>
                            <span class="nav__name">Setting</span>
                            </a>

                            <a style= "text-decoration: none;" href="../include/logout.inc.php" class="nav__link" id="nav_student">
                            <i class="bx bx-log-out-circle nav__icon" ></i>
                            <span class="nav__name">Logout</span>
                            </a>

                    </div>
                </div>
            </nav>
        </div>
        
        <?php
        $name= mysqli_real_escape_string($conn, $_GET['name']);
            if ($name == "all") {
                ?>
                    <!--===== MAIN JS =====-->
                    <script src="assets/js/main.js"></script>
                    <table>
                        <tr>
                            <td><?php include_once "gradesheet.php"; ?></td> 
                        </tr>
                        <tr>
                            <button type='submit' class= 'btn btn-success' name='submit'>Return</button>
                        </tr>
                    </table>
                <?php
            }
            else if ($name=="first") {
                ?>
                <h1 class='title'>First Semester</h1>
                <hr>
                <?php
               include_once 'first.php';
            }
            else if ($name=='sec') {
                ?>
                <h1 class='title'>Second Semester</h1>
                <hr>
                <?php
                include_once 'sec.php';
            }
            else{
                echo "Error";
            }
        ?>
        
        
    </body>
    
</html>

<?php

if (isset($_GET["error"])) {
    if ($_GET["error"] =="select") {
        echo "<script>alert('Select section first!')</script>";
      }
    else if ($_GET["error"] =="stmtfailed") {
        echo "<script>alert('Something went wrong!')</script>";
    }
    else if ($_GET["error"] =="none") {
        echo "<script>alert('Done!')</script>";
    }
    else if ($_GET["error"] =="studentExists") {
        echo "<script>alert('Student is already exists or occupied')</script>";
    }
    else if ($_GET["error"] =="lrnExistsoutside") {
        echo "<script>alert('LRN already exists!')</script>";
    }
}
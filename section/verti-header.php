<?php
include_once '../include/functions.inc.php';
include_once '../include/dbh.inc.php';
error_reporting(0);
session_start();
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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,800;1,900&display=swap" rel="stylesheet">

        <title>Section</title>
    </head>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap');
        *{
            margin: 0%;
            
        }
        .left{
            float: left;
        }
        .right{
            float: right;
        }
        td{
            border: 2px;
        }
        h1, h3{
            font-size: 100%;
            text-align: center;
        }
        .title{
            font-size: 50px;
            margin-top: 80px;
            text-align: left;
            color: #333333;
            font-family: 'Raleway', sans-serif;
            
            
        }
        .row{
            font-size: 9vw;
            width: 150px;
            height: 150px;
            background-color: #fdda15;
            text-align: center;
            margin: 50px;
            text-align: center;

        }
        .student{        
        display: flex;
        align-items: center;
        }
        a:hover{
            text-decoration: none;
        }
        @media screen and (max-width: 600px){
            .title{
                display:inline-block;
                vertical-align:middle;
            }
            .right{
                float: bottom;
            }
        }
        .center{
            margin: auto;
            margin-bottom: 50px;
        }
        .wider{
            width: 1000px;
        }
        
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script type="text/javascript">
            $(document).on('click', 'ul li', function(){
                $(this).addClass('active')
            })
    </script>
<body>
    <div class='first'> 
    <?php
    if ($_SESSION['email']==NULL) {
        header("location: ../login.php");
    }
    $active_input= "nav__link";
    $active_section= "nav__link";
    $active_student= "nav__link";
    $active_add_student= "nav__link";
        $name= mysqli_real_escape_string($conn, $_GET['name']);

            if ($name == "home") {
                $name=="teacher";
                $active_input= "nav__link";
                $active_section= "nav__link";
                $active_student= "nav__link";
                $active_add_student= "nav__link";
                ?>
                    <h1 class='title'>Welcome user!</h1>
                    <hr>
                    <!--===== MAIN JS =====-->
                    <script src="assets/js/main.js"></script>
                    <table>
                        <tr>
                            <td><?php include_once "home.php"; ?></td>
                        </tr>
                    </table>
                </div>
                <?php
            }
            else if ($name == "input") {
                $_SESSION ['name'] = 'input';
                $name=="teacher";
                $active_input= "nav__link active";
                $active_section= "nav__link";
                $active_student= "nav__link";
                $active_add_student= "nav__link";
                ?>
                    
                    <h1 class='title'>Input Grades</h1><hr>
                    <!--===== MAIN JS =====-->
                    <script src="assets/js/main.js"></script>
                    <table class='center' style='width: 100%;'>
                    <tr>
                        <td valign='top'><?php include_once "instruction.php"; ?></td>
                        <td valign='top' class='wider'><?php include_once "all-section.php"; ?></td>
                    </tr>
                    </table>
                <?php
            }

            else if ($name == "section") {
                $_SESSION ['name'] = 'all';
                $active_input= "nav__link";
                $active_section= "nav__link active";
                $active_student= "nav__link";
                $active_add_student= "nav__link";
                $name="teacher";
                ?>
                    <h1 class='title'>All Section</h1>
                    <hr>
                    <!--===== MAIN JS =====-->
                    <script src="assets/js/main.js"></script>
                    <div>
                    <table class='center'>
                    <tr>
                    <td valign='top' colspan='2'><?php include_once "instruction.php"; ?></td>
                    </tr>
                        <tr>
                            <td valign='top'><?php include_once "add-section.php"; ?></td>
                            <td valign='top'><?php include_once "all-section.php"; ?></td>
                        </tr>
                    </table>
                    </div>
                <?php
            }

            else if ($name == "student") {
                $active_input= "nav__link";
                $active_section= "nav__link";
                $active_student= "nav__link active";
                $active_add_student= "nav__link";
                $name="student";
                ?>
                    <h1 class='title'>All Students</h1>
                    <hr>
                    <!--===== MAIN JS =====-->
                    <script src="assets/js/main.js"></script>
                    <table class='center'>
                        <tr>
                            <td valign='top' colspan='2'><?php include_once "instruction.php"; ?></td>
                        </tr>
                        <tr>
                            <td valign='top'><?php include_once "add-student.php"; ?></td>
                            <td valign='top'><?php include_once "all-section.php"; ?></td>
                        </tr>
                    </table>
                    
                <?php
            }

            else if ($name == "add-student") {
                $active_input= "nav__link";
                $active_section= "nav__link";
                $active_student= "nav__link";
                $active_add_student= "nav__link active";
                $name=" add student";
                ?>
                <h1 class='title'>Add Students</h1>
                <hr>
                <script src="assets/js/main.js"></script>
                    <table class='center'>
                    <tr>
                        <td valign='top'><?php include_once "instruction.php"; ?></td>
                    </tr>
                        <tr>
                            <td valign='top'><?php include_once "admin-add-student.php"; ?></td>
                        </tr>
                    </table>
                    
                <?php
            }

            else if ($name == "semester") {
                ?>
                    <h1 class='title'>Semesters</h1>
                    <hr>
                    <!--===== MAIN JS =====-->
                    <script src="assets/js/main.js"></script>
                    <table>
                        <tr>
                            <td><?php include_once "semester.php"; ?></td>
                        </tr>
                    </table>
                <?php
            }
            else if ($name == "list") {
                ?>
                    <!--===== MAIN JS =====-->
                    <script src="assets/js/main.js"></script>
                    <?php include_once "list.php"; ?>
                    <?php include_once "add-student.php"; ?>
                <?php
            }
            else if ($name == "info") {
                ?>
                    
                    <!--===== MAIN JS =====-->
                    <table>
                        <tr>
                            <td><?php include_once "info.php"; ?></td>
                        </tr>
                    </table>
                <?php
            }
            else if ($name == "search") {
                ?>
                    
                    <!--===== MAIN JS =====-->
                    <table>
                        <tr>
                            <td><?php include_once "search.php"; ?></td>
                        </tr>
                    </table>
                <?php
            }
            else if ($name == "url") {
                include_once "url.php";
            }
            else if ($name == "edit-section") {
                include_once "edit_delete.php";
            }
            else{
                echo "Error";
            }
        ?>
    
    <body id="body-pd">
        <header class="header" id="header">
            <div class="header__toggle">
                <i class='bx bx-menu' id="header-toggle"></i>
            </div>

        </header>

        <div class="l-navbar" id="nav-bar">
            <nav class="nav">
            
                <div>
                    <a href="verti-header.php?name=home" class="nav__logo">
                        <i class='bx bx-lock nav__logo-icon'></i>
                        <span class="nav__logo-name">Lyceum of Alabang Inc. OGV</span>
                    </a>
                    
                    <div class="nav__list">
                    <?php
                    echo '
                            <a style= "text-decoration: none;" href="verti-header.php?name=input" class="'; echo $active_input; echo'" id="nav_all">
                            <i class="bx bxs-pen nav__icon" ></i>
                            <span class="nav__name">Input Grades</span>
                            </a>

                            <a style= "text-decoration: none;" href="verti-header.php?name=section" class="'; echo $active_section; echo'" id="nav_teacher">
                            <i class="bx bxs-group nav__icon" ></i>
                            <span class="nav__name">Sections</span>
                            </a>

                            <a style= "text-decoration: none;" href="verti-header.php?name=student" class="'; echo $active_student; echo'" id="nav_student">
                            <i class="bx bx-group nav__icon" ></i>
                            <span class="nav__name">Students</span>
                            </a>

                            <a style= "text-decoration: none;" href="verti-header.php?name=add-student" class="'; echo $active_add_student; echo'" id="nav_student">
                            <i class="bx bxs-user-plus nav__icon" ></i>
                            <span class="nav__name">Add Student</span>
                            </a>

                            <a style= "text-decoration: none;" href="verti-header.php?name=setting" class="nav__link" id="nav_student">
                            <i class="bx bxs-edit nav__icon" ></i>
                            <span class="nav__name">Setting</span>
                            </a>

                            <a style= "text-decoration: none;" href="../include/logout.inc.php" class="nav__link" id="nav_student">
                            <i class="bx bx-log-out-circle nav__icon" ></i>
                            <span class="nav__name">Logout</span>
                            </a>
                            ';
                    ?>            
                                
                    </div>
                </div>
            </nav>
        </div>
        
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
        echo "<script>alert('LRN exists!')</script>";
    }
    else if ($_GET["error"] =="lrnExists") {
        echo "<script>alert('LRN exists!')</script>";
    }
    else if ($_GET["error"] =="nameExists") {
        echo "<script>alert('Name already exists!')</script>";
    }
    else if ($_GET["error"] =="emailExistsOnStudent") {
        echo "<script>alert('Email is already in use by a student')</script>";
    }
}
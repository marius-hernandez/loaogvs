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

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <title>Registrar</title>
        <script src='https://code.jquery.com/jquery-2.1.3.min.js'></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <style>
       @import url('https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap');
        *{
            margin: 0%;
            
        }
        .title{
            font-size: 50px;
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
        }
        .student{        
        display: flex;
        align-items: center;
        }
        @media screen and (max-width: 600px){
            .title{
                display:inline-block;
                vertical-align:middle;
            }
            .right{
                float: bottom;
            }
            .all-margin{
            margin: 0px;
        }
        }
        .add{
            background: linear-gradient(to right, #235789, #F1D302);
            height: 5px;
            width: 25%;
        }
        .user{
            margin-left: 120px;
        }
        tr{
            width: 100%;
        }
        .subject{
            width: 100%;
        }
        .all-margin{
            margin-left: 200px;
            margin-right: 200px;
        }
        .appsearch{
            width: 50px;
        }
        .nav__link{
            text-decoration: none;
        }
        .masterr{
            width: 70%;
            margin: auto;
        }


    </style>
    
    
    <body id="body-pd">
        <header class="header" id="header">
            <div class="header__toggle">
                <i class='bx bx-menu' id="header-toggle"></i>
            </div>

            <div class="header__img">
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
                        <a href="verti-header.php?name=app" class="nav__link" id="nav_admin">
                            <i class='bx bx-check-circle nav__icon' ></i>
                            <span class="nav__name">Approval</span>
                        </a>

                            <a href="verti-header.php?name=section" class="nav__link" id="nav_teacher">
                            <i class='bx bx-user nav__icon' ></i>
                            <span class="nav__name">Section</span>
                            </a>

                            <a href="verti-header.php?name=masterlist" class="nav__link" id="nav_all">
                            <i class='bx bx-group nav__icon' ></i>
                            <span class="nav__name">Masterlist</span>
                            </a>

                            <a href="verti-header.php?name=archive" class="nav__link" id="nav_teacher">
                            <i class='bx bx-user nav__icon' ></i>
                            <span class="nav__name">Archives</span>
                            </a>

                            <a style= "text-decoration: none;" href="../include/logout.inc.php" class="nav__link" id="nav_student">
                            <i class="bx bx-log-out-circle nav__icon" ></i>
                            <span class="nav__name">Logout</span>
                            </a>

                            

                    </div>
                </div>
            </nav>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script type="text/javascript">
            $(document).on('click', 'ul li', function(){
                $(this).addClass('active')
            })
        </script>
        <?php
        $name= mysqli_real_escape_string($conn, $_GET['name']);
            if ($name == "all") {
                ?>
                    <br><br><br>
                    <h1 class="title">All users</h1>
                    <hr class='add'>
                    <!--===== MAIN JS =====-->
                    <script src="assets/js/main.js"></script>
                    <table class='user'>
                        <tr>
                            <td valign="top"><?php include_once "teacher.php"; ?></td>
                            <td valign="top"><?php include_once "student.php"; ?></td>
                            <td valign="top"><?php include_once "admin.php"; ?></td>
                        </tr>
                    </table>
                <?php
            }
            else if ($name == "home") {
                ?>
                <br><br><br>
                    <!--===== MAIN JS =====-->
                    <script src="assets/js/main.js"></script>
                    <?php include_once "home.php"; ?>
                            
                <?php
            }
            else if ($name == "app") {
                ?>
                <br><br><br>
                    <h1 class="title">Approval</h1>
                    <hr class='add'>
                    <!--===== MAIN JS =====-->
                    <script src="assets/js/main.js"></script>
                    <table class="masterr">
                        <tr>
                            <td valign='top' colspan='2'><?php include_once "appsearch.php"; ?></td>
                        </tr>
                        <tr>
                            <td valign='top'><?php include_once "../approval.php"; ?></td>
                        </tr>
                    </table>
                <?php
            }

            else if ($name == "masterlist") {
                ?>
                <br><br><br>
                    <h1 class="title">Masterlist</h1>
                    <hr class='add'>
                    <!--===== MAIN JS =====-->
                    <script src="assets/js/main.js"></script>
                    <div>
                    <table>
                        <tr>
                            <td valign='top'><?php include_once "masterlist.php"; ?></td>
                        </tr>
                    </table>
                    </div>
                <?php
            }
            else if ($name == "archive") {
                ?>
                <br><br><br>
                    <h1 class="title">Archive</h1>
                    <hr class='add'>
                    <!--===== MAIN JS =====-->
                    <script src="assets/js/main.js"></script>
                    <div>
                    <table>
                        <tr>
                            <td valign='top' colspan='2'><?php include_once "archive.php"; ?></td>
                        </tr>
                    </table>
                    </div>
                <?php
            }
            else if ($name=="res-search") {
                ?>
                    
                <!--===== MAIN JS =====-->
                <table>
                    <tr>
                        <td><?php include_once "app-result.php"; ?></td>
                    </tr>
                </table>
            <?php
            }

            else if ($name == "ignore") {
                ?>
                <br><br><br>
                    <h1 class="title">Ignore Bin</h1>
                    <hr class='add'>
                    <!--===== MAIN JS =====-->
                    <script src="assets/js/main.js"></script>
                    <div>
                    <table>
                        <tr>
                            <td><?php include_once "ignore-bin.php"; ?></td>
                        </tr>
                    </table>
                    </div>
                <?php
            }
            else if ($name == "teacher-bin") {
                ?>
                <br><br><br>
                    <h1 class="title">Teacher Bin</h1>
                    <hr class='add'>
                    <!--===== MAIN JS =====-->
                    <script src="assets/js/main.js"></script>
                    <div>
                    <?php
                            include_once 'teacher_bin.php';
                        ?>
                    </div>
                <?php
            }
            else if ($name == "student-bin") {
                ?>
                <br><br><br>
                    <h1 class="title">Student Bin</h1>
                    <hr class='add'>
                    <!--===== MAIN JS =====-->
                    <script src="assets/js/main.js"></script>
                    <div>
                        <?php
                            include_once 'student_bin.php';
                        ?>
                    </div>
                <?php
            }

            else if ($name == "log") {
                ?>
                <br><br><br>
                    <h1 class="title">Log</h1>
                    <hr class='add'>
                    <!--===== MAIN JS =====-->
                    <script src="assets/js/main.js"></script>
                    <div>
                    <table>
                        <tr>
                            <td valign='top' colspan='2'><?php include_once 'log.php'; ?></td>
                        </tr>
                    </table>
                    </div>
                <?php
            }
            else if ($name == "section") {
                ?>
                <br><br><br>
                    <h1 class="title">Section</h1>
                    <hr class='add'>
                    <!--===== MAIN JS =====-->
                    <script src="assets/js/main.js"></script>
                    <?php include_once 'section.php'; ?>
                <?php
            }

            else if ($name == "section_list") {
                ?>
                <br><br><br>
                    <h1 class="title">Section List</h1>
                    <hr class='add'>
                    <!--===== MAIN JS =====-->
                    <script src="assets/js/main.js"></script>
                    <?php include_once 'section_list.php'; ?>
                <?php
            }

            else if ($name == "add-section") {
                ?>
                <br><br><br>
                    <h1 class="title">Add Section</h1>
                    <hr class='add'>
                    <!--===== MAIN JS =====-->
                    <script src="assets/js/main.js"></script>
                    <table>
                    <tr>
                    <td valign="top"><?php include_once 'add-section.php'; ?></td>
                    <td valign="top"><?php include_once 'excel.php'; ?></td>
                    </tr>
                    </table>
                    
                    
                <?php
            }



            else if ($name == "disable") {
                ?>
                <br><br><br>
                    <h1 class="title">Disable Semester</h1>
                    <hr class='add'>
                    <!--===== MAIN JS =====-->
                    <script src="assets/js/main.js"></script>
                    <table>
                    <tr>
                    <td valign="top"><?php include_once 'disable.php'; ?></td>
                    </tr>
                    </table>
                    
                    
                <?php
            }


            else if ($name == "irregular") {
                ?>
                <br><br><br>
                    <h1 class="title">Irregular Students</h1>
                    <hr class='add'>
                    <!--===== MAIN JS =====-->
                    <script src="assets/js/main.js"></script>
                    <table>
                    <tr>
                    <td valign="top"><?php include_once 'irregular.php'; ?></td>
                    </tr>
                    </table>
                    
                    
                <?php
            }
?>
        
    </body>
    <script src="js/main.js"></script>
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
    else if ($_GET["error"] =="emptyInputfields") {
        echo "<script>alert('Fill up all the important fields in the Excel.')</script>";
    }

    else if ($_GET["error"] =="emptyInput") {
        echo "<script>alert('Please select a grading')</script>";
    }

    else if ($_GET["error"] =="classExists") {
        echo "<script>alert('Section already exists!')</script>";
    }
    else if ($_GET["error"] =="emailExistsOnStudent") {
        echo "<script>alert('Email is already in use by a student')</script>";
    }
    else if ($_GET["error"] =="noneRetrieve") {
    }
    else if ($_GET["error"] =="noneDelete") {
    }
}
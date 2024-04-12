<?php
include_once '../include/functions.inc.php';
include_once '../include/dbh.inc.php';
error_reporting(0);
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

        <title>Users</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
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
                    <a href="verti-header.php?name=all" class="nav__logo">
                        <i class='bx bx-lock nav__logo-icon'></i>
                        <span class="nav__logo-name">Lyceum of Alabang Inc. OGV</span>
                    </a>
                    
                    <div class="nav__list">

                            <a href="verti-header.php?name=all" class="nav__link" id="nav_all">
                            <i class='bx bx-group nav__icon' ></i>
                            <span class="nav__name">All users</span>
                            </a>

                            <a href="verti-header.php?name=add-user" class="nav__link" id="nav_all">
                            <i class='bx bx-user-plus nav__icon' ></i>
                            <span class="nav__name">Add users</span>
                            </a> 

                            <a href="verti-header.php?name=back-up" class="nav__link" id="nav_admin">
                            <i class='bx bx-copy-alt nav__icon' ></i>
                            <span class="nav__name">Back-up database</span>
                            </a>

                            <a href="verti-header.php?name=log" class="nav__link" id="nav_admin">
                            <i class='bx bx-book-alt nav__icon' ></i>
                            <span class="nav__name">Log</span>
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
        if ($_SESSION['email']==NULL) {
            header("location: ../login.php");
        }

        $name= mysqli_real_escape_string($conn, $_GET['name']);
            if ($name == "all") {
                ?>
                    <br><br><br>
                    <h1 class="title">All users</h1>
                    <hr class='add'>
                    <!--===== MAIN JS =====-->
                    <script src="assets/js/main.js"></script>
                    <?php include_once 'all-user.php'; ?>
                <?php
            }

            else if ($name == "teacher") {
                ?>
                <br><br><br>
                    <h1 class="title">All teacher</h1>
                    <hr class='add'>
                    <!--===== MAIN JS =====-->
                    <script src="assets/js/main.js"></script>
                    <?php include_once "all-teacher.php"; ?>
                <?php
            }

            else if ($name == "student") {
                ?>
                <br><br><br>
                <h1 class="title">All Students</h1><hr class='add'>
                    <!--===== MAIN JS =====-->
                    <script src="assets/js/main.js"></script>
                        <table>
                            <form action="">
                                <tr>
                                    <td valign='top'><?php include_once "all-student.php"; ?></td>
                                </tr>
                            </form>
                        </table>
                    
                <?php
            }

            else if ($name == "admin") {
                ?>
                <br><br><br>
                    <h1 class="title">All Admin</h1>
                    <hr class='add'>
                    <!--===== MAIN JS =====-->
                    <script src="assets/js/main.js"></script>
                    <div class='all-margin'>
                    <table>
                        <tr>
                            <td valign='top'><?php include_once "admin.php"; ?></td>
                            <td valign='top'><?php include_once "add-admin.php"; ?></td>
                        </tr>
                    </table>
                    </div>
                <?php
            }

            else if ($name == "subject") {
                ?>
                <br><br><br>
                    <h1 class="title">Subject</h1>
                    <hr class='add'>
                    <!--===== MAIN JS =====-->
                    <script src="assets/js/main.js"></script>
                    <table class='subject'>
                        <tr>
                            <td valign='top'><?php include_once "subject.php"; ?></td>
                        </tr>
                    </table>
                <?php
            }

            else if ($name=="strand") {
                ?>
                <br><br><br><br>
                    <h1 class="title">All subject</h1>
                    <hr class='add'>
                    <!--===== MAIN JS =====-->
                    <script src="assets/js/main.js"></script>
                    <table class='subject'>
                        <tr>
                            <td valign='top'><?php include_once "strand.php"; ?></td>
                        </tr>
                    </table>
                <?php
            }
            else if ($name=="search") {
                ?>
                    
                <!--===== MAIN JS =====-->
                <table>
                    <tr>
                        <td><?php include_once "Tsearch.php"; ?></td>
                    </tr>
                </table>
            <?php
            }

            else if ($name=="s-search") {
                ?>
                    
                <!--===== MAIN JS =====-->
                <table>
                    <tr>
                        <td><?php include_once "Ssearch.php"; ?></td>
                    </tr>
                </table>
            <?php
            }

            else if ($name=="a-search") {
                ?>
                    
                <!--===== MAIN JS =====-->
                <table>
                    <tr>
                        <td><?php include_once "Asearch.php"; ?></td>
                    </tr>
                </table>
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


            else if ($name=="back-up") {
                ?>
                    
                <!--===== MAIN JS =====-->
                <table>
                    <tr>
                        <td><?php include_once "back-up.php"; ?></td>
                    </tr>
                </table>
            <?php
            }

            else if ($name=="add-user") {
                ?>
                    
                <!--===== MAIN JS =====-->
                <table>
                    <tr>
                        <td><?php include_once "add-user.php"; ?></td>
                    </tr>
                </table>
            <?php
            }

            else if ($name=="log") {
                ?>
                    
                <!--===== MAIN JS =====-->
                <table>
                    <tr>
                        <td><?php include_once "log.php"; ?></td>
                    </tr>
                </table>
            <?php
            }

            else if ($name=="back-up") {
                ?>
                    
                <!--===== MAIN JS =====-->
                <br><br><br>
                    <h1 class="title">All users</h1>
                    <hr class='add'>
                    <!--===== MAIN JS =====-->
                    <script src="assets/js/main.js"></script>
                    <?php include_once 'back-up.php'; ?>
            <?php
            }
        ?>

        
        
    </body>
    <script src="js/main.js"></script>
</html>
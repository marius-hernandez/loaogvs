<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<style>
body{
   background-color: #f4fcff;
}
h5, h3{
   font-size: 20px;
   font-family: 'Arial';
   color: #333333;

}
a{
   color: #333333;
}
a:hover{
   color: #2c3a2a;
}
hr{
   background: linear-gradient(to right, #055a87, #f9a404);
  height: 5px;
  width: 25%;
  }
.section{
     background-color: #f9a404;
     font-size: 20px;
   font-family: 'Arial';
   color: #333333;
}
@media screen and (max-width: 600px){
   h5{
      font-size: 20px;
   }
   h3{
      font-size: 20px;
   }
   .all{
        margin-right: 50px;
        padding: 0;
        width: 70%;
    }
}
.all-section{
   background-color: #fbd75c;
   box-shadow: 10px 10px #333333;
   font-family: 'Raleway', sans-serif;
   width: 50px;
}

.section-row{
   background-color: red;
   background-color: #fbd75c;
   box-shadow: 10px 10px #333333;
   float: left;
   font-family: 'Raleway', sans-serif;
}

.folder{
    font-size: 100px;
    text-decoration: none;
    background: -webkit-linear-gradient(red, yellow);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-size: 200% 100%;
    background-position: 100%;
    transition: background-position 275ms ease;
}
.folder:hover{
    background: -webkit-linear-gradient(#1c4966, #296d98);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}
.waowe{
   border-style: outset;

}
.label{
   font-size: 100px;
   margin-bottom: 100px;
   margin-left: 50px;
}
</style>
<script src="assets/js/main.js"></script>
<?php
include_once '../include/functions.inc.php';
include_once '../include/dbh.inc.php';
include_once("verti-header.php");
session_start();
$first= $_SESSION['userfirst'];
$last= $_SESSION['userlast'];
$_SESSION['section'] = "not";
$section= $_SESSION['section'];
   $sql="SELECT * from section WHERE teacher_last= '$last' AND teacher_first = '$first';";
      $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt, $sql)) {
         header("location: ../signup.php?error=stmtfailed");
         exit();
      }
     $result = mysqli_query($conn, $sql);
     $queryResults= mysqli_num_rows($result);
        if ($queryResults > 0) {
         echo "<body style='text-align: center'>";
            while ($row = mysqli_fetch_assoc($result)) {
                if ($name=="teacher") {
                  echo"<div class='waowe'>
                   <a style= 'text-decoration: none;' href='verti-header.php?name=semester&section=".$row['class_name']."&grade=".$row['class_grade']."&track=".$row['class_track']."&strand=".$row['class_strand']."&spec=".$row['class_spec']."' class='hover'><br><div class='article-box'>
                   ";
                }
                elseif ($name=="student") {
                   echo "<div class='waowe'>
                   <a style= 'text-decoration: none;' href='verti-header.php?name=list&section=".$row['class_name']."&grade=".$row['class_grade']."&track=".$row['class_track']."&strand=".$row['class_strand']."' class='hover'><br><div class='article-box'>
                   ";
                }
                else {
                  echo"<div class='waowe'>
                   <a style= 'text-decoration: none;' href='verti-header.php?name=semester&section=".$row['class_name']."&grade=".$row['class_grade']."&track=".$row['class_track']."&strand=".$row['class_strand']."&spec=".$row['class_spec']."' class='hover'><br><div class='article-box'>
                   ";
                }

                echo '<table>
                <tr>
                  <td>
                     <i class="bx bxs-pen folder"></i>
                     <span class="nav__name label">'.$row['class_name'].'</span>
                  </td>
                </tr>
                 
                 

                 </a>
                  </div></table>
                  ';

                
            }
            echo "</body>";
        }
        else {
           echo "There are no sections yet";
        }

        
        ?>

        
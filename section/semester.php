<?php
include_once 'verti-header.php';
$grade= mysqli_real_escape_string($conn, $_GET['grade']);
$track= mysqli_real_escape_string($conn, $_GET['track']);
$strand= mysqli_real_escape_string($conn, $_GET['strand']);
$spec= mysqli_real_escape_string($conn, $_GET['spec']);
$section= mysqli_real_escape_string($conn, $_GET['section']);
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
a #sem{
    padding: 100px;
    margin: 0px;
    border:1px solid green;
    text-decoration: none;
    font-size: 3vw;
}
.btn-primary, .btn-secondary{
    height: 200px;
    width: 200px;
    margin-bottom: 30px;
}
p{
    font-size: 30px;
}
.attention{
    font-size: 20px;
}
form{
    float: left;
    margin-left: 50px;
}
hr{
  background: linear-gradient(to right, #235789, #F1D302);
  height: 5px;
  width: 25%;
}
.down{
    margin-left: 70px;
}
.btn-primary{
    box-shadow: 8px 8px 5px grey;
    background-color: #335779;
    border: none;
}
.btn-primary:hover{
    background-color: yellow;
}
.foldah{
    font-size: 80px;
    text-decoration: none;
    background: -webkit-linear-gradient(red, yellow);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-size: 200% 100%;
    background-position: 100%;
    transition: background-position 275ms ease;
}
.progress{
    width: 450px;
    margin-left: 50px;
}
</style>
<body>
    <?php
    $active_input= "nav__link";
    $active_section= "nav__link active";
    $active_student= "nav__link";
    $active_add_student= "nav__link";

    if ($strand=="ABM") {
            
            echo "<form action='card/abm.php?grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=one&slide=1' method='POST'>
            <button type='submit' class='btn btn-primary' id='first' name='fir'><p>1st Semester</p></button>
            </form>
            <form action='card/abm.php?grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=two' method='POST'>
            <button type='submit' class='btn btn-primary' id='first' name='sec'><p>2nd Semester</p></button>
            </form>";
    }
    
    else if ($strand=="STEM") {
        include_once 'card/stem.php';
    }
    
    else if ($strand=="HUMSS") {
        include_once 'card/humss.php';
    }
    else if ($strand=="GAS") {
        include_once '../card/gas.php';
    }
    else if ($strand=="ICT") { 
        if ($spec=="ICT Animation") {
            include_once '../card/ict-an.php';
        }
        else if ($spec=="ICT Programming") {
            $sql="SELECT * from disable_semester";
            $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("location: verti-header.php?name=archive&error=stmtfailed");
                exit();
                }
            $result= mysqli_query($conn, $sql);
            $queryResults = mysqli_num_rows($result);
            $row = mysqli_fetch_assoc($result);

            $sql2="SELECT * from ".$section."_student";
            $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql2)) {
                echo $stmt;
                exit();
                }
            $result2= mysqli_query($conn, $sql2);
            $queryResults2 = mysqli_num_rows($result2);

            $sql3="SELECT * from ".$section."_student WHERE ifsent='sent'";
            $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql3)) {
                echo $stmt;
                exit();
                }
            $result3= mysqli_query($conn, $sql3);
            $queryResults3 = mysqli_num_rows($result3);

            $total=$queryResults2;
            $paid_amount=$queryResults3;
            $width = round(($paid_amount/$total)*100,2);


            echo "<table><tr>
            <td class='indicator' valign='top' style='width: 200px;'>
            <form class= 'down' action='export.php?section=".$section."' method='POST'>
            <p class='attention'>Class Record</p>
            <a href='export.php?section=".$section."' class='btn btn-success' type='submit' name='all'>Download</a>
            <br><br>
            <h4>Badges</h4>
            <i class='bx bxs-badge-check foldah'></i>
            <br>
            <span>Sent to all</span>
            <br>
            <i class='bx bxs-check-circle foldah'></i>
            <br>
            <span>Sent to parent</span>
            <br>
            <i class='bx bxs-check-square foldah'></i>
            <br>
            <span>Sent to student</span>
            </form></td><td valign='top'>";
            if ($row['first']=="yes") {
                echo "<form action='card/url.php?grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=one&slide=1' method='POST'>
                <button type='submit' class='btn btn-primary' id='first' name='fir'><p>1st Semester</p></button>
                </form>
                <form action='card/url.php?grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=two' method='POST'>
                <button type='submit' class='btn btn-secondary' id='first' name='sec' disabled><p>2nd Semester</p></button>
                </form>";
            }
            else if ($row['second']=="yes") {
                
                echo "<form action='card/url.php?grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=one&slide=1' method='POST'>
                <button type='submit' class='btn btn-secondary' id='first' name='fir' disabled><p>1st Semester</p></button>
                
                
                
                </form>
                <form action='card/url.php?grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=two' method='POST'>
                <button type='submit' class='btn btn-primary' id='first' name='sec'><p>2nd Semester</p></button>
                </form>
                <br>
                <div class='progress'>
                <div class='progress-bar progress-bar-success' role='progressbar' aria-valuenow='".$width."'
                aria-valuemin='0' aria-valuemax='".$total."' style='width:".$width."%'>
                    ".$width."% Complete 
                </div>
                </div>
                ";
            }
            else if ($row['all_all']=="yes") {
                echo "<form action='card/url.php?grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=one&slide=1' method='POST'>
                <button type='submit' class='btn btn-primary' id='first' name='fir'><p>1st Semester</p></button>
                </form>
                <form action='card/url.php?grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=two' method='POST'>
                <button type='submit' class='btn btn-primary' id='first' name='sec'><p>2nd Semester</p></button>
                </form>";
            }
            else{
                echo "<form action='card/ict-css.php?grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=one&slide=1' method='POST'>
                <button type='submit' class='btn btn-secondary' id='first' name='fir' disabled><p>1st Semester</p></button>
                </form>
                <form action='card/ict-css.php?grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=two' method='POST'>
                <button type='submit' class='btn btn-secondary' id='first' name='sec' disabled><p>2nd Semester</p></button>
                </form>";
            }
            echo "</td></tr></table>";
            
        }
        else if ($spec=="ICT CSS") {
            echo "
            <form action='all.php?section=".$section."' method='POST'>
            <p class='attention'>Before Clicking this button, make sure that you have saved and checked all the grades of each students, else the website will send blank grade sheet to parents/students</p>
            <button class='btn btn-success' type='submit' name='all'>Send to all Parents/Students</button>
            <br>
            </form>";
            
            echo "<form action='card/ict-css.php?grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=one&slide=1' method='POST'>
            <button type='submit' class='btn btn-primary' id='first' name='fir'><p>1st Semester</p></button>
            </form>
            <form action='card/ict-css.php?grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=two' method='POST'>
            <button type='submit' class='btn btn-primary' id='first' name='sec'><p>2nd Semester</p></button>
            </form>";
        } 
    }
    
    else if ($strand=="HE") {
        if ($spec=="HE Cookery") {
            include_once '../card/he-cook.php';
        }
        else if ($spec=="HE Tourism") {
            include_once '../card/he-tour.php';
        }
    }
    
    else if ($strand=="IA") {
        if ($spec=="IA Automotive") {
            include_once '../card/ia-auto.php';
        }
        else if ($spec=="IA SMAW") {
            include_once '../card/ia-smaw.php';
        }
    }
    else{

        echo "Error";
    }
    
    ?>

    </body>
</html>

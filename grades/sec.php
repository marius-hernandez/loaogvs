<?php
include_once '../include/dbh.inc.php';
error_reporting(0);
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
    .subject{
        border-collapse: collapse;

        box-shadow: 10px 10px 5px grey;
        vertical-align: top;
        display: inline-block;
        margin-top: 60px;
        margin-left: 150px;
        width: 70%;
        border: 1px solid black;
        
    }
    tr, td{
        border: 1px solid black;
    }
    table{
        text-align: center;
    }
    input{
        text-align: center;
    }
</style>
<body>
<?php
$first=$_SESSION['userfirst'];
$last=$_SESSION['userlast'];
$sqls = "SELECT * FROM student WHERE user_first='$first' AND user_last='$last'";
$stmt=mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sqls)) {
    header("location: verti-header.php?error=stmtfailed&name=all");
    exit();
}
$results= mysqli_query($conn, $sqls);
$rows = mysqli_fetch_assoc($results);
$section = $rows['user_section'];
$lrn = $rows['user_lrn'];

 $sql="SELECT * from ".$section."_student WHERE student_lrn='$lrn'";
 $stmt = mysqli_stmt_init($conn);
 if (!mysqli_stmt_prepare($stmt, $sql)) {
     header("location: url.php?error=stmtfailed");
     exit();
 }
 $result= mysqli_query($conn, $sql);
 $queryResults = mysqli_num_rows($result);
 $email=$_SESSION['email'];
 $last=$_SESSION['userlast'];
 $row = mysqli_fetch_assoc($result);
 $passfail="haha";
     $sql1="SELECT * FROM ".$section."_grade_sec_first WHERE student_lrn=".$row['student_lrn']."";
     $stmt = mysqli_stmt_init($conn);
     if (!mysqli_stmt_prepare($stmt, $sql1)) {
         header("location: url.php?error=stmtfailed");
         exit();
     }
     $result1= mysqli_query($conn, $sql1);
     $queryResults1 = mysqli_num_rows($result1);
     $row1 = mysqli_fetch_assoc($result1);
     $sent=$row1['sent'];
     
     $sql2="SELECT * FROM ".$section."_grade_sec_sec WHERE student_lrn=".$row['student_lrn']."";
     $stmt = mysqli_stmt_init($conn);
     if (!mysqli_stmt_prepare($stmt, $sql2)) {
         header("location: url.php?error=stmtfaileda");
         exit();
     }
     $result2= mysqli_query($conn, $sql2);
     $queryResults2 = mysqli_num_rows($result2);
     $row2 = mysqli_fetch_assoc($result2);

     $sql3="SELECT * FROM ".$section."_ave_sec WHERE student_lrn=".$row['student_lrn']."";
     $stmt = mysqli_stmt_init($conn);
     if (!mysqli_stmt_prepare($stmt, $sql3)) {
         header("location: url.php?error=stmtfaileda");
         exit();
     }
     $result3= mysqli_query($conn, $sql3);
     $queryResults3 = mysqli_num_rows($result3);
     $row3 = mysqli_fetch_assoc($result3);
     $lrn= $row['student_lrn'];

     if ($sent == 1) {
        echo"<table class='subject'>
        <tr>
            <td rowspan='2' colspan='2'>
                <b><p>Subjects</p></b>
            </td>
            <td colspan='2'>
                <b><p>Quarter</p></b>
            </td>
            <td rowspan='2' align='center'>
                <b><p>Final<br>Grade</p></b>
            </td>
        </tr>
        <tr align='center'>
            <td>
                <b><p>1</p></b>
            </td>
            
            <td>
                <b><p>2</p></b>
            </td>
            
        
        </tr>
        <tr style='text-align: left'>
            <td colspan='5'>
                <b><p>Core Subjects</p></b>
            </td>
        </tr>
        
        <tr>
            <td>
                <p>CS 6</p>
            </td>
            <td>
                <p>Contemporary Philippine Arts from the Region</p>
            </td>
        
            <td>
                <p><input type='number' name='seccore1first' class='kd1 ave q ".$passfail."' style='border:0' value='".$row1['first_c_1']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
            </td>
            <td>
                <p><input type='number' name='seccore1sec' class='kd2 ave q ".$passfail."' style='border:0' value='".$row2['first_c_1']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
            </td>
            <td align='center'>
                <p><input type='number' name='seccore1ave' class='result1 ".$passfail."' style='border:0' value='".$row3['ave_c_1']."' readonly> </p>     
            </td>
        </tr>
        <tr>
            <td>
                <p>CS 11</p>
            </td>
            <td>
                <p>Physical Science</p>
            </td>
            <td>
                <p><input type='number' name='seccore2first' class='kd1 ave q ".$passfail."' style='border:0' value='".$row1['first_c_2']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
            </td>
            <td>
                <p><input type='number' name='seccore2sec' class='kd2 ave q ".$passfail."' style='border:0' value='".$row2['first_c_2']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
            </td>
            <td align='center'>
                <p><input type='text' name='seccore2ave' size='5' class='result1 ".$passfail."' style='border:0' value='".$row3['ave_c_2']."' readonly></p> 
            </td>
        </tr>
        
        <tr>
            <td>
                <p>CS 13</p>
            </td>
            <td>
                <p>Understanding Culture, Society and Politics</p>
            </td>
            <td>
                <p><input type='number' name='seccore3first' class='kd1 ave q ".$passfail."' style='border:0' value='".$row1['first_c_3']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
            </td>
            <td>
                <p><input type='number' name='seccore3sec' class='kd2 ave q ".$passfail."' style='border:0' value='".$row2['first_c_3']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
            </td>
            <td align='center'>
                <p><input type='text' name='seccore3ave' size='5' class='result1 ".$passfail."' style='border:0' value='".$row3['ave_c_3']."' readonly></p> 
            </td>
        </tr>
        
        <tr>
            <td>
                <p>CS 15-4</p>
            </td>
            <td>
                <p>Physical Education and Health 4</p>
            </td>
            <td>
                <p><input type='number' name='seccore4first' class='kd1 ave q ".$passfail."' style='border:0' value='".$row1['first_c_4']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
            </td>
            <td>
                <p><input type='number' name='seccore4sec' class='kd2 ave q ".$passfail."' style='border:0' value='".$row2['first_c_4']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
            </td>
            <td align='center'>
                <p><input type='text' name='seccore4ave' size='5' class='result1 ".$passfail."' style='border:0' value='".$row3['ave_c_4']."' readonly></p> 
            </td>
        </tr>
        
        <tr style='text-align: left'>
            <td colspan='5'>
                <b><p>Applied and Specialized Subjects</p></b>
            </td>
        </tr>
        <tr>
            <td>
                <p>AS 7</p>
            </td>
            <td>
                <p>Research Project</p>
            </td>
            <td>
                <p><input type='number' name='secapp1first' class='kd1 ave q ".$passfail."' style='border:0' value='".$row1['first_a_1']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
            </td>
            <td>
                <p><input type='number' name='secapp1sec' class='kd2 ave q ".$passfail."' style='border:0' value='".$row2['first_a_1']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
        
            </td>
            <td align='center'>
                <p><input type='text' name='secapp1ave' size='5' class='result1 ".$passfail."' style='border:0' value='".$row3['ave_a_1']."' readonly></p> 
            </td>
        </tr>
        <tr>
            <td>
                <p>TVS 7</p>
            </td>
            <td>
                <p>Computer Programming 2A (WP)</p>
            </td>
            <td>
                <p><input type='number' name='secapp2first' class='kd1 ave q ".$passfail."' id= 'clear' style='border:0' value='".$row1['first_a_2']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
        
            </td>
            <td>
                <p><input type='number' name='secapp2sec' class='kd2 ave q ".$passfail."' id= 'clear' style='border:0'  value='".$row2['first_a_2']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
        
            </td>
            <td align='center'>
                <p><input type='text' name='secapp2ave' size='5' class='result1 ".$passfail."' style='border:0' value='".$row3['ave_a_2']."' readonly></p> 
            </td>
        </tr>
        <tr>
            <td>
                <p>TVS 8</p>
            </td>
            <td>
                <p>Computer Programming 2B (CSS)</p>
            </td>
            <td>
                <p><input type='number' name='secapp3first' class='kd1 ave q ".$passfail."' style='border:0' value='".$row1['first_a_3']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
        
            </td>
            <td>
                <p><input type='number' name='secapp3sec' class='kd2 ave q ".$passfail."' style='border:0' value='".$row2['first_a_3']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
        
            </td>
            <td align='center'>
                <p><input type='text' name='secapp3ave' size='5' class='result1 ".$passfail."' style='border:0' value='".$row3['ave_a_3']."' readonly></p> 
            </td>
        </tr>
        
        <tr>
            <td>
                <p>TVS 9</p>
            </td>
            <td>
                <p>Work Immersion/Career Advocacy/Culminating Activity</p>
            </td>
            <td>
                <p><input type='number' name='secapp4first' class='kd1 ave q ".$passfail."' style='border:0' value='".$row1['first_a_4']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
        
            </td>
            <td>
                <p><input type='number' name='secapp4sec' class='kd2 ave q ".$passfail."' style='border:0' value='".$row2['first_a_4']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
        
            </td>
            <td align='center'>
                <p><input type='text' name='secapp4ave' size='5' class='result1 ".$passfail."' style='border:0' value='".$row3['ave_a_4']."' readonly></p> 
            </td>
        </tr>
        
        <tr>
            <td>
                <p></p>
            </td>
            <td>
                <p align='right'>Average for the semester</p>
            </td>
            <td>
                <p><input type='text' size='5' class='ave1 ".$passfail."' name= 'secave1' style='border:0' value='".$row1['sec_first_ave']."' readonly></p> 
            </td>
            <td>
                <p><input type='text' size='5' class='ave2 ".$passfail."' name= 'secave2' style='border:0' value='".$row2['sec_sec_ave']."' readonly></p>  
            </td>
            <td>
                <p><input type='text' size='5' class='average ".$passfail."' name= 'secave' style='border:0' value='".$row3['ave_sec']."' readonly></p> 
            </td>
        </tr>
        </table>
        ";
     }
     else{
         echo "Empty, please contact your teacher";
     }
    ?>
</body>
</html>
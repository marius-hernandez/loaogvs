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
     $sql1="SELECT * FROM ".$section."_grade_first_first WHERE student_lrn=".$row['student_lrn']."";
     $stmt = mysqli_stmt_init($conn);
     if (!mysqli_stmt_prepare($stmt, $sql1)) {
         header("location: url.php?error=stmtfailed");
         exit();
     }
     $result1= mysqli_query($conn, $sql1);
     $queryResults1 = mysqli_num_rows($result1);
     $row1 = mysqli_fetch_assoc($result1);
     $sent=$row1['sent'];
     
     $sql2="SELECT * FROM ".$section."_grade_first_sec WHERE student_lrn=".$row['student_lrn']."";
     $stmt = mysqli_stmt_init($conn);
     if (!mysqli_stmt_prepare($stmt, $sql2)) {
         header("location: url.php?error=stmtfaileda");
         exit();
     }
     $result2= mysqli_query($conn, $sql2);
     $queryResults2 = mysqli_num_rows($result2);
     $row2 = mysqli_fetch_assoc($result2);

     $sql3="SELECT * FROM ".$section."_ave WHERE student_lrn=".$row['student_lrn']."";
     $stmt = mysqli_stmt_init($conn);
     if (!mysqli_stmt_prepare($stmt, $sql3)) {
         header("location: url.php?error=stmtfaileda");
         exit();
     }
     $result3= mysqli_query($conn, $sql3);
     $queryResults3 = mysqli_num_rows($result3);
     $row3 = mysqli_fetch_assoc($result3);
     $lrn= $row['student_lrn'];

     if ($sent==1) {
        echo"
        <table class='subject'>
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
                    <p>CS 5</p>
                </td>
                <td>
                    <p>21st Century Literature from the Philippines and the World</p>
                </td>
                <td>
                    <p><input type='disabled' name='core1first' class='kd1 ave q' style='border:0' value='".$row1['first_c_1']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                </td>
                <td>
                    <p><input type='disabled' name='core1sec' class='kd2 ave q' style='border:0' value='".$row2['first_c_1']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                </td>
                <td align='center'>
                    <p><input type='disabled' name='core1ave' class='result1' style='border:0' value='".$row3['ave_c_1']."' readonly> </p>     
                </td>
            </tr>
            <tr>
                <td>
                    <p>CS 7</p>
                </td>
                <td>
                    <p>Media and Information Literacy</p>
                </td>
                <td>
                    <p><input type='disabled' name='core2first' class='kd1 ave q' style='border:0' value='".$row1['first_c_2']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                </td>
                <td>
                    <p><input type='disabled' name='core2sec' class='kd2 ave q' style='border:0' value='".$row2['first_c_2']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                </td>
                <td align='center'>
                    <p><input type='disabled' name='core2ave' size='5' class='result1' style='border:0' value='".$row3['ave_c_2']."' readonly></p> 
                </td>
            </tr>
        
            <tr>
                <td>
                    <p>CS 15-3</p>
                </td>
                <td>
                    <p>Physical Education and Health 3</p>
                </td>
                <td>
                    <p><input type='disabled' name='core3first' class='kd1 ave q' style='border:0' value='".$row1['first_c_3']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                </td>
                <td>
                    <p><input type='disabled' name='core3sec' class='kd2 ave q' style='border:0' value='".$row2['first_c_3']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                </td>
                <td align='center'>
                    <p><input type='disabled' name='core3ave' size='5' class='result1' style='border:0' value='".$row3['ave_c_3']."' readonly></p> 
                </td>
            </tr>
            
            <tr style='text-align: left'>
                <td colspan='5'>
                    <b><p>Applied and Specialized Subjects</p></b>
                </td>
            </tr>
            <tr>
                <td>
                    <p>AS 3</p>
                </td>
                <td>
                    <p>Practical Research 2</p>
                </td>
                <td>
                    <p><input type='disabled' name='app1first' class='kd1 ave q' style='border:0' value='".$row1['first_a_1']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                </td>
                <td>
                    <p><input type='disabled' name='app1sec' class='kd2 ave q' style='border:0' value='".$row2['first_a_1']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
        
                </td>
                <td align='center'>
                    <p><input type='disabled' name='app1ave' size='5' class='result1' style='border:0' value='".$row3['ave_a_1']."' readonly></p> 
                </td>
            </tr>
            <tr>
                <td>
                    <p>AS 4</p>
                </td>
                <td>
                    <p>Pagsulat sa Filipino sa Larangan ng TVL</p>
                </td>
                <td>
                    <p><input type='disabled' name='app2first' class='kd1 ave q' id= 'clear' style='border:0' value='".$row1['first_a_2']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
        
                </td>
                <td>
                    <p><input type='disabled' name='app2sec' class='kd2 ave q' id= 'clear' style='border:0'  value='".$row2['first_a_2']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
        
                </td>
                <td align='center'>
                    <p><input type='disabled' name='app2ave' size='5' class='result1' style='border:0' value='".$row3['ave_a_2']."' readonly></p> 
                </td>
            </tr>
            <tr>
                <td>
                    <p>AS 6</p>
                </td>
                <td>
                    <p>Entrepreneurship</p>
                </td>
                <td>
                    <p><input type='disabled' name='app3first' class='kd1 ave q' style='border:0' value='".$row1['first_a_3']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
        
                </td>
                <td>
                    <p><input type='disabled' name='app3sec' class='kd2 ave q' style='border:0' value='".$row2['first_a_3']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
        
                </td>
                <td align='center'>
                    <p><input type='disabled' name='app3ave' size='5' class='result1' style='border:0' value='".$row3['ave_a_3']."' readonly></p> 
                </td>
            </tr>
        
            <tr>
                <td>
                    <p>TVS 5</p>
                </td>
                <td>
                    <p>Computer Programming 2A (SAUD)</p>
                </td>
                <td>
                    <p><input type='disabled' name='app4first' class='kd1 ave q' style='border:0' value='".$row1['first_a_4']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
        
                </td>
                <td>
                    <p><input type='disabled' name='app4sec' class='kd2 ave q' style='border:0' value='".$row2['first_a_4']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
        
                </td>
                <td align='center'>
                    <p><input type='disabled' name='app4ave' size='5' class='result1' style='border:0' value='".$row3['ave_a_4']."' readonly></p> 
                </td>
            </tr>
        
            <tr>
                <td>
                    <p>TVS 6</p>
                </td>
                <td>
                    <p>Computer Programming 2B (EEDP.Net)</p>
                </td>
                <td>
                    <p><input type='disabled' name='app5first' class='kd1 ave q' style='border:0' value='".$row1['first_a_5']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
        
                </td>
                <td>
                    <p><input type='disabled' name='app5sec' class='kd2 ave q' style='border:0' value='".$row2['first_a_5']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
        
                </td>
                <td align='center'>
                    <p><input type='disabled' name='app5ave' size='5' class='result1' style='border:0' value='".$row3['ave_a_5']."' readonly></p> 
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
                    <p><input type='disabled' size='5' class='ave1' name= 'ave1' style='border:0' value='".$row1['first_first_ave']."' readonly></p> 
                </td>
                <td>
                    <p><input type='disabled' size='5' class='ave2' name= 'ave2' style='border:0' value='".$row2['first_sec_ave']."' readonly></p>  
                </td>
                <td>
                    <p><input type='disabled' size='5' class='average' name= 'ave' style='border:0' value='".$row3['ave']."' readonly></p> 
                </td>
            </tr>
            </table>";
     }
     else{
         echo "Empty, contact your teacher";
     }
    ?>
</body>
</html>
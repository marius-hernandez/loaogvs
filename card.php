<?php
session_start();
include_once "include/functions.inc.php";
include_once "include/dbh.inc.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<script>
function goBack() {
  window.history.back();
}
</script>
<style>
#container{
    margin: 150px;
    
}
p{
    margin-left:50px;
    margin-right:50px;
}
</style>
<body>



<h1>Grade Sheet Preview</h1>
<button onclick="goBack()">Go Back</button>
<form action="" method='POST'>
<button><a link href="#">Proceed</a></button>
</form>

<div id="container">
<?php
            
                $name= mysqli_real_escape_string($conn, $_GET['name']);
                $grade= mysqli_real_escape_string($conn, $_GET['grade']);
                $sql="SELECT * from section WHERE class_name='$name' AND class_grade='$grade'";
                $result = mysqli_query($conn, $sql);
                $queryResults= mysqli_num_rows($result);

                if ($queryResults > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "
                            <form action=''>
                                <table border='1'>
                                    <tr>
                                        <tr>
                                        <td>
                                            <p>Dear Parents,</p>
                                            <p style='text-indent: 40px'>This digital card shows the ability and progress your child has made in different learning areas as well as his/her progress in character development.</p>
                                            <p style='text-indent: 40px'>The school welcomes you if you desire to know more about the progress of your child.</p>
                                            <img align='right' src='img/signature.jpg' style='height:100px; margin:0%' alt='Teacher's digitized signature'><br>
                                            ";
                                            echo " <br><br><br><br><h3 style='text-align:right'>".$row['teacher_first']. " ".$row['teacher_last']. "</h3>
                                            
                                            
                                            <p style='text-align: right; margin:0%'>Adviser's Signature over Printed Name</p>
                                            <br>
                                            <br>
                                            <br>
                                            <h3 style='text-align: center; margin:0%'>PARENT/GUARDIAN'S SIGNATURE</h3>
                                            <p style='text-align: center; margin:0%'>First Quarter: ___________________</p>
                                            <p style='text-align: center; margin:0%'>Second Quarter: _________________</p>
                                            <p style='text-align: center; margin:0%'>Third Quarter: ___________________</p>
                                            <p style='text-align: center; margin:0%'>Fourth Quarter: __________________</p>
                                            <br>
                                            <br>
                                            <h3 style='text-align: center; margin:0%'>CERTIFICATE TO TRANSFER</h3>
                                            <p style='text-align: center; margin:0%'>Admitted to Grade: ___________________</p>
                                            <p style='text-align: center; margin:0%'>Eligibility for admission to Grade: _________</p>
                                            <br><br>
                                            <h4 style='text-align: center ; margin:0%'>Engr. Rodrigo P. Calapan &nbsp;&nbsp;&nbsp; Ms. Charito F. Cano</h4>
                                            <p style='text-align: center; margin:0%'>Principal&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Directress</p>
                                        
                                            <br>
                                            <br>
                                            <h3 style='text-align: center; margin:0%'>CANCELLATION OF ELIGIBILITY TO TRANSFER</h3>
                                            <p style='text-align: center; margin:0%'>Admitted in: ___________________</p>
                                            <p style='text-align: center; margin:0%'>Date: _______________________</p>

                                            <br>
                                            <h4 style='text-align: center ; margin:0%'>Engr. Rodrigo P. Calapan &nbsp;&nbsp;&nbsp; Ms. Charito F. Cano</h4>
                                            <p style='text-align: center; margin:0%'>Principal&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Directress</p>
                                            <br>
                                            <br>
                                        </td>
                                        <td>
                                            <b><p>SF 9-SHS</p></b>      
                                            <p style='text-align: center; margin:0%''>Republic of the Philippines</p>
                                            <b><p style='text-align: center; margin:0%'>DEPARTMENT OF EDUCATION</p></b>
                                            <p style='text-align: center; margin:0%'>NATIONAL CAPITAL REGION</p>
                                            <p style='text-align: center; margin:0%'>Division of City Schools, Muntinlupa</p>
                                            <br>
                                            <br>
                                            <h1 style='text-align: center; margin:0%;'>LYCEUM OF ALABANG</h1>
                                            <p style='text-align: center; margin:0%'>KM. 30, National Road, Tunasan, Muntinlupa City</p>
                                            <p style='text-align: center; margin:0%'>1773 Philippines</p>
                                            <br><br><br>
                                            <h4 style='text-align: center; margin:0%;'>Basic Education Department</h4>
                                            <h2 style='text-align: center; margin:0%;'>SENIOR HIGH SCHOOL</h2>
                                            <h4 style='text-align: center; margin:0%;'>K-12 Curriculum</h4>
                                            <br><br><br>
                                            <h2 style='text-align: center; margin:0%;'>PROGRESS REPORT CARD</h2>
                                            <h4 style='text-align: center; margin:0%'>SCHOOL YEAR: <u>2019-2020</u></h4>
                                            <br>
                                            <br>
                                            <p style='text-align: center; margin:0%'>Name: _____________________________________</p>
                                            <p style='text-align: center; margin:0%'>LRN: _____________________________________</p>
                                            <p style='text-align: center; margin:0%'>Age: _________________&nbsp;Sex: _________________&nbsp; </p>";
                                            
                                            echo " <br>
                                            <p style='text-align: center; margin:0%; '>Grade: <u>____________________".$row['class_grade']. "____________________</u>Section: ____________________<u>".$row['class_name']. "____________________</u></p>
                                            <p style='text-align: center; margin:0%'>Track: <u>".$row['class_track']. "</u></p>
                                            <p style='text-align: center; margin:0%'>Strand: <u>".$row['class_strand']. "</u></p>
                                        <br>";

                                            
                                        echo "</td>
                                        </tr>
                                    </tr>
                                    
                                    <tr>
                                    <tr>
                                        <td>
                                            <b><p>REPORT ON LEARNING PROGRESS & ACHIEVEMENT</p></b>
                                            <b><p>First Semester</p></b>
                                            <table border='1' style='text-align: center; width: 100%; border-collapse: collapse'>
    <tr>
        <td rowspan='2' colspan='2'>
            <b><p>Subjects</p></b>
        </td>
        <td colspan='2'>
            <b><p>Quarter</p></b>
        </td>
        <td rowspan='2'>
            <b><p>Final Grade</p></b>
        </td>
    </tr>
    <tr>
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
            <p>CS 1</p>
        </td>
        <td>
            <p>Subject 1</p>
        </td>
        <td>
            <p>93</p>
        </td>
        <td>
            <p>95</p>
        </td>
        <td>
            <p>94</p>
        </td>
    </tr>
    <tr>
        <td>
            <p>CS 1</p>
        </td>
        <td>
            <p>Subject 1</p>
        </td>
        <td>
            <p>93</p>
        </td>
        <td>
            <p>95</p>
        </td>
        <td>
            <p>94</p>
        </td>
    </tr>
    <tr>
        <td>
            <p>CS 1</p>
        </td>
        <td>
            <p>Subject 1</p>
        </td>
        <td>
            <p>93</p>
        </td>
        <td>
            <p>95</p>
        </td>
        <td>
            <p>94</p>
        </td>
    </tr>
    <tr>
        <td>
            <p>CS 1</p>
        </td>
        <td>
            <p>Subject 1</p>
        </td>
        <td>
            <p>93</p>
        </td>
        <td>
            <p>95</p>
        </td>
        <td>
            <p>94</p>
        </td>
    </tr>
    <tr>
        <td>
            <p>CS 1</p>
        </td>
        <td>
            <p>Subject 1</p>
        </td>
        <td>
            <p>93</p>
        </td>
        <td>
            <p>95</p>
        </td>
        <td>
            <p>94</p>
        </td>
    </tr>
    <tr>
        <td>
            <p>CS 1</p>
        </td>
        <td>
            <p>Subject 1</p>
        </td>
        <td>
            <p>93</p>
        </td>
        <td>
            <p>95</p>
        </td>
        <td>
            <p>94</p>
        </td>
    </tr>
    
</table>

                                        </td>
                                        <td>
                                        </td>
                                        </tr>
                                    </tr>
                                    
                                </table>
                            </form>";

                    }
                    
                }
        
?>

</div>
    
</body>
</html>
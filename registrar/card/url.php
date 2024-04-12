<?php
    include '../include/dbh.inc.php';
    session_start();
    $section= mysqli_real_escape_string($conn, $_GET['section']);
    $sem= mysqli_real_escape_string($conn, $_GET['sem']);

    if(isset($_POST['signaturesubmit'])){ 
        $first= $_SESSION['userfirst'];
        $last= $_SESSION['userlast'];
        $name= $first . $last;
        $signature = $_POST['signature'];
        $signatureFileName = $name.'.png';
        $signature = str_replace('data:image/png;base64,', '', $signature);
        $signature = str_replace(' ', '+', $signature);
        $data = base64_decode($signature);
        $file = 'signatures/'.$signatureFileName;
        file_put_contents($file, $data);
    } 
    $sqldisable="SELECT * from disable_semester WHERE id=1";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqldisable)) {
        echo "stmt";
        exit();
    }
    $resultdisable= mysqli_query($conn, $sqldisable);
    $queryResultsdisable = mysqli_num_rows($resultdisable);
    $rowdis = mysqli_fetch_assoc($resultdisable);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Input Grades</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <script src='https://code.jquery.com/jquery-2.1.3.min.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
  <link rel="shortcut icon" href="../../pics/loa.png">
</head>
<style>
    .bg-image{
        /* The image used */
        background-image: url("../pics/33.jpg");
        background-attachment: fixed;
        /* Add the blur effect */
        filter: blur(8px);
        -webkit-filter: blur(8px);
        
        /* Full height */
        height: 100%; 
        /* Center and scale the image nicely */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
    .container-url{
        box-shadow: 10px 10px #333333;
        float: left;
        clear: none; 
        width: 90%;
        margin-left: 5%;

    }
    .form-control{
        box-shadow: 3px 3px 3px grey;
    }
    .subject{
        border-collapse: collapse;
        box-shadow: 10px 10px 5px grey;
        vertical-align: top;
        margin-right: 30px;
        display: inline-block;
        margin-top:30px;
    }
    table{
        vertical-align: top;
        margin-right: 30px;
        display: inline-block;
        margin-top:30px;
    }
    tr{
        margin: 0%;
    }
    td{
        margin: 0%;
    }
    p{
        margin: 0%;
        color: #3a3b3c;
    }
    label{
        color: #3a3b3c;
    }
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
    }
    input{
        width: 30px;
        -moz-appearance: textfield;
    }
    input[type=file]{
        width: 100%;
        -moz-appearance: textfield;
    }
  #item{
    margin-left: 75px;
    margin-right: 75px;
    margin-bottom: 75px;
    margin-top: 50px;
  }
  .h1-front{
    text-align: center;
    font-size: 100px;
    
    color: black;
    
  }
  .car{
      font-size: 20px;
  }
  td{
    border: 1px solid black;
  }
  #modal-td{
    border: none;
  }
  .name{
      border: none;
      text-align: center;
  }
  .carousel-control{
    background-color: black;
    background-image:none !important;
    filter:none !important;
    width: 50px;

  }
  li{
    color: black;
  }
  ol{
    background-color: black;
    color: black;
  }
  #button{
      margin-top: 50px;
  }
  .url-hr{
    background: linear-gradient(to right, blue, yellow);
  height: 5px;
  width: 40%;
  margin: auto;
  }
  @media screen and (max-width: 600px) {
    #car{
    text-align: center;
    font-size: 50px;
    color: black;
    }
    .subject{
        font-size: 10px;
    }
    .car{
        font-size: 20px;
    }

}
.front{
    text-align: center;
    font-size: 20px;
}
.modal-file{
    width: 100%;
}
.modal-table{
    border: none;
}
.modal-tr{
    border: none;
}
.modal-td{
    border: none;
}
.modal-sign{
    font-size: 20px;
}
.modal{
    margin: 0px;
}
#canvasDiv{
            position: relative;
            border: 2px dashed grey;
            height:100px;
            width: 200px;
            margin: 0px;
        }
        .prev{
            position: relative;
            border: 2px dashed grey;
            height:100px;
            width: 200px;
        }
        img{
            height:100px;
            width: 200px;
        }
        .fail{
            color: red;
        }
        .pass{
            color: #333333;
        }

.bx{
    font-size: 20px;
}
.shark{
    margin: auto;
}

.shark:hover{
    -webkit-animation:spin 2s linear infinite;
    -moz-animation:spin 2s linear infinite;
    animation:spin 2s linear infinite;
}
@-moz-keyframes spin { 100% { -ms-transform: rotate(360deg); } }
@-webkit-keyframes spin { 100% { -webkit-transform: rotate(360deg); } }
@keyframes spin { 100% { -webkit-transform: rotate(360deg); transform:rotate(360deg); } }

.foldah{
    font-size: 100px;
    text-decoration: none;
    background: -webkit-linear-gradient(red, yellow);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-size: 200% 100%;
    background-position: 100%;
    transition: background-position 275ms ease;
}
</style>

<script>
    $(document).ready(function(){
        $(".ave").keyup(function(){
            $.ajax({
                url: 'include/action.php',
                type: 'POST',
                data: $("#savegrade").serialize(),
                success: function(aresult){
                    $("#aresult").html(aresult);
                }
            });
        });
        
    });

</script>

<body>
<div class="bg-image"></div>
<div class="container-url">
  <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="false">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target='#myCarousel active' data-slide-to='0'></li>
      <?php
      $sql="SELECT * FROM ".$section."_student";
      $result= mysqli_query($conn, $sql);
      $queryResults = mysqli_num_rows($result);
            
      $slide=0;
        while ($row = mysqli_fetch_assoc($result)) {
            $slide++;
          echo "<li data-target='#myCarousel' data-slide-to='".$slide."'></li>";
        }
        $sql4="SELECT * FROM ".$section."_student_irregular";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql4)) {
                echo "stmft";
                exit();
            }
            $result4= mysqli_query($conn, $sql4);
            $queryResults4 = mysqli_num_rows($result4);
        
      ?>
      <li data-target='#myCarousel active' data-slide-to='<?php echo $slide; $slide++; ?>'></li>
      <li data-target='#myCarousel active' data-slide-to='<?php echo $slide;?>'></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class='carousel-inner' id='inner'>
      <div class='item active' id='item'>
      <img src='../../pics/icon.png' alt='Shark Icon' class='shark'>
        <h1 class='h1-front'>Hi there!</h1>
        <hr class='url-hr'>
        <br>
        <p class='front'>The student blank card with their names is where you will input the student's grades.</p>
        <br><br>
        <p class='front'>Carefully fill all the cell with their grades per subject, </p>
        <br><br>
        <p class='front'>The computation of average is automatically been computed and in round-off</p>
        <br>
      </div>
      
        <?php
        if ($sem==='two') {
            $sql="SELECT * from ".$section."_student";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                echo "stmt";
                exit();
            }
            $result= mysqli_query($conn, $sql);
            $queryResults = mysqli_num_rows($result);
            $email=$_SESSION['email'];
            $last=$_SESSION['userlast'];
        
          while ($row = mysqli_fetch_assoc($result)) { 
            $sql1="SELECT * FROM ".$section."_grade_sec_first WHERE student_first='".$row['student_first']."' AND student_last='".$row['student_last']."'";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql1)) {
                echo "stmyt";
                exit();
            }
            $result1= mysqli_query($conn, $sql1);
            $queryResults1 = mysqli_num_rows($result1);
            $row1 = mysqli_fetch_assoc($result1);
            
            $sql2="SELECT * FROM ".$section."_grade_sec_sec WHERE student_first='".$row['student_first']."' AND student_last='".$row['student_last']."'";

            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql2)) {
                echo "stmtt";
                exit();
            }
            $result2= mysqli_query($conn, $sql2);
            $queryResults2 = mysqli_num_rows($result2);
            $row2 = mysqli_fetch_assoc($result2);

            $sql3="SELECT * FROM ".$section."_ave_sec WHERE student_first='".$row['student_first']."' AND student_last='".$row['student_last']."'";

            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql3)) {
                echo "stmft";
                exit();
            }
            $result3= mysqli_query($conn, $sql3);
            $queryResults3 = mysqli_num_rows($result3);
            $row3 = mysqli_fetch_assoc($result3);
            
            $passfail="";
            $color="";
              
            if ($rowdis['second_first']=='yes') {
                if (($rowdis['second_first']=='yes') && ($rowdis['second_second']=='yes')) {
                    echo "<div class='item' id='item'>
                            <form action='include/action.php?name=save&section=".$section."&sem=2' method='POST' class='myform' id='savegrade'>
                            <label for='' class='text-dark'>To</label>
                            <div class='input-group'>
                                <input type='hidden' name='section' style='width: 50%;' class='form-control' value='".$section."'>
                                <input type='hidden' name='sem' style='width: 50%;' class='form-control' value='".$sem."'>
                                <input type='email' required id='some_id' autocomplete='new-password' class= 'to' name='emailparent' style='width: 50%;' class='form-control' value='".$row['parent_email']."'>
                                <input type='email' id='some_id' autocomplete='new-password' class= 'to' name='emailparent1' style='width: 50%;' class='form-control' value='".$row['parent_email1']."'>
                                <input type='email' id='some_id' autocomplete='new-password' class= 'to' name='emailparent2' style='width: 50%;' class='form-control' value='".$row['parent_email2']."'>
                                <input type='email' id='some_id' autocomplete='new-password' class= 'to' name='emailparent3' style='width: 50%;' class='form-control' value='".$row['parent_email3']."'>
                            </div>
                            <label for='' class='text-dark'>From</label>
                            <input type='text' disabled name= 'email' class='form-control' value='".$email."'>
                            <label for='' class='text-dark'>Message</label>
                            <input type='text' required name= 'mess' class='form-control' value='".$row['sent']."'>
                
                            <input type='hidden' name='emailp' placeholder='lrn' id='username' value='".$row['parent_email']."' />
                            <input type='hidden' name='s_first' placeholder='lrn' id='username' value='".$row['student_first']."' />
                            <input type='hidden' name='s_last' placeholder='lrn' id='username' value='".$row['student_last']."' />
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
                            <p>CS 6</p>
                        </td>
                        <td>
                            <p>Contemporary Philippine Arts from the Region</p>
                        </td>
                
                        <td>
                            <p><input type='number' min='60' max='100' step='0.5' name='seccore1first' class='kd1 ave q ".$passfail."' style='border:0; color: $color;' value='".$row1['first_c_1']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                        </td>
                        <td>
                            <p><input type='number' min='60' max='100' step='0.5' name='seccore1sec' class='kd2 ave q ".$passfail."' style='border:0; color: $color;' value='".$row2['first_c_1']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                        </td>
                        <td align='center'>
                            <p><input type='number' min='60' max='100' step='0.5' name='seccore1ave' class='result1 ".$passfail."' style='border:0; color: $color;' value='".$row3['ave_c_1']."' readonly> </p>     
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
                            <p><input type='number' min='60' max='100' step='0.5' name='seccore2first' class='kd1 ave q ".$passfail."' style='border:0; color: $color;' value='".$row1['first_c_2']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                        </td>
                        <td>
                            <p><input type='number' min='60' max='100' step='0.5' name='seccore2sec' class='kd2 ave q ".$passfail."' style='border:0; color: $color;' value='".$row2['first_c_2']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                        </td>
                        <td align='center'>
                            <p><input type='text' min='60' max='100' step='0.5' name='seccore2ave' size='5' class='result1 ".$passfail."' style='border:0; color: $color;' value='".$row3['ave_c_2']."' readonly></p> 
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
                            <p><input type='number' min='60' max='100' step='0.5' name='seccore3first' class='kd1 ave q ".$passfail."' style='border:0; color: $color;' value='".$row1['first_c_3']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                        </td>
                        <td>
                            <p><input type='number' min='60' max='100' step='0.5' name='seccore3sec' class='kd2 ave q ".$passfail."' style='border:0; color: $color;' value='".$row2['first_c_3']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                        </td>
                        <td align='center'>
                            <p><input type='text' min='60' max='100' step='0.5' name='seccore3ave' size='5' class='result1 ".$passfail."' style='border:0; color: $color;' value='".$row3['ave_c_3']."' readonly></p> 
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
                            <p><input type='number' min='60' max='100' step='0.5' name='seccore4first' class='kd1 ave q ".$passfail."' style='border:0' value='".$row1['first_c_4']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                        </td>
                        <td>
                            <p><input type='number' min='60' max='100' step='0.5' name='seccore4sec' class='kd2 ave q ".$passfail."' style='border:0' value='".$row2['first_c_4']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                        </td>
                        <td align='center'>
                            <p><input type='text' min='60' max='100' step='0.5' name='seccore4ave' size='5' class='result1 ".$passfail."' style='border:0' value='".$row3['ave_c_4']."' readonly></p> 
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
                            <p><input type='number' min='60' max='100' step='0.5' name='secapp1first' class='kd1 ave q ".$passfail."' style='border:0' value='".$row1['first_a_1']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                        </td>
                        <td>
                            <p><input type='number' min='60' max='100' step='0.5' name='secapp1sec' class='kd2 ave q ".$passfail."' style='border:0' value='".$row2['first_a_1']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                
                        </td>
                        <td align='center'>
                            <p><input type='text' min='60' max='100' step='0.5' name='secapp1ave' size='5' class='result1 ".$passfail."' style='border:0' value='".$row3['ave_a_1']."' readonly></p> 
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
                            <p><input type='number' min='60' max='100' step='0.5' name='secapp2first' class='kd1 ave q ".$passfail."' id= 'clear' style='border:0' value='".$row1['first_a_2']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                
                        </td>
                        <td>
                            <p><input type='number' min='60' max='100' step='0.5' name='secapp2sec' class='kd2 ave q ".$passfail."' id= 'clear' style='border:0'  value='".$row2['first_a_2']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                
                        </td>
                        <td align='center'>
                            <p><input type='text' min='60' max='100' step='0.5' name='secapp2ave' size='5' class='result1 ".$passfail."' style='border:0' value='".$row3['ave_a_2']."' readonly></p> 
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
                            <p><input type='number' min='60' max='100' step='0.5' name='secapp3first' class='kd1 ave q ".$passfail."' style='border:0' value='".$row1['first_a_3']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                
                        </td>
                        <td>
                            <p><input type='number' min='60' max='100' step='0.5' name='secapp3sec' class='kd2 ave q ".$passfail."' style='border:0' value='".$row2['first_a_3']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                
                        </td>
                        <td align='center'>
                            <p><input type='text' min='60' max='100' step='0.5' name='secapp3ave' size='5' class='result1 ".$passfail."' style='border:0' value='".$row3['ave_a_3']."' readonly></p> 
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
                            <p><input type='number' min='60' max='100' step='0.5' name='secapp4first' class='kd1 ave q ".$passfail."' style='border:0' value='".$row1['first_a_4']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                
                        </td>
                        <td>
                            <p><input type='number' min='60' max='100' step='0.5' name='secapp4sec' class='kd2 ave q ".$passfail."' style='border:0' value='".$row2['first_a_4']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                
                        </td>
                        <td align='center'>
                            <p><input type='text' min='60' max='100' step='0.5' name='secapp4ave' size='5' class='result1 ".$passfail."' style='border:0' value='".$row3['ave_a_4']."' readonly></p> 
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
                            <p><input type='text' min='60' max='100' step='0.5' size='5' class='ave1 ".$passfail."' name= 'secave1' style='border:0' value='".$row1['sec_first_ave']."' readonly></p> 
                        </td>
                        <td>
                            <p><input type='text' min='60' max='100' step='0.5' size='5' class='ave2 ".$passfail."' name= 'secave2' style='border:0' value='".$row2['sec_sec_ave']."' readonly></p>  
                        </td>
                        <td>
                            <p><input type='text' min='60' max='100' step='0.5' size='5' class='average ".$passfail."' name= 'secave' style='border:0' value='".$row3['ave_sec']."' readonly></p> 
                        </td>
                    </tr>
                    </table>
                <table id='name' align='center'>
                <tr>
                    <td valign='top' class='name'>
                    <p class='car'>".$row['student_last']." ".$row['student_first']." ".$row['student_middle']." ".$row['student_suffix']."</p>
                    <div id='button'>
                    <button type='submit' class='btn btn-danger' id='insert' name='save-sec' formnovalidate='formnovalidate'>Save</a>
                        <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal'>Signature</button>
                
                        <br>
                        <br>
                        <label for=''>Send to:</label>
                        <br>
                        <button type='submit' class='btn btn-primary' id='first' name='parent-sec'>Parent</button>
                        <button type='submit' class='btn btn-primary' id='first' name='student-sec'>Student</button>
                        <button type='submit' class='btn btn-primary' id='first' name='all-sec'>All</button>
                        <br>
                        <label for=''>Send as:</label>
                        <br>
                        <input type='radio' id= 'semester' class='btn btn-primary' id='first' name='radio' value='first' required>First Grading</input>
                        <input type='radio' id= 'all' class='btn btn-primary' id='first' name='radio' value='second' required>Second Grading</input>
                        </form>
                    </div>
                    </td>
                </tr>
                </table>
                ";
                    if ($row['ifsent']=="Sent") {
                        if (($row['ifsent']=="Sent") && ($row1['sent']==1)) {
                            echo"
                            <table align='center'>
                                <tr>
                                    <td class='name'>
                                        <i class='bx bxs-badge-check foldah'></i>
                                    </td>
                                </tr>
                            </table>";
                        }
                        else {
                            echo"
                            <table align='center'>
                                <tr>
                                    <td class='name'>
                                        <i class='bx bxs-check-circle foldah'></i>
                                    </td>
                                </tr>
                            </table>";
                        }
                        
                    }
                    else if ($row1['sent']==1) {
                        if (($row['ifsent']=="Sent") && ($row1['sent']==1)) {
                            echo"
                            <table align='center'>
                                <tr>
                                    <td class='name'>
                                        <i class='bx bxs-badge-check foldah'></i>
                                    </td>
                                </tr>
                            </table>";
                        }
                        else {
                            echo"
                            <table align='center'>
                                <tr>
                                    <td class='name'>
                                        <i class='bx bxs-check-square foldah'></i>
                                    </td>
                                </tr>
                            </table>";
                        }
                    }
                    
                

                echo"
                    </div>
                    ";
                }
                else{
                    echo "<div class='item' id='item'>
                            <form action='include/action.php?name=save&section=".$section."&sem=2' method='POST' class='myform'>
                            <label for='' class='text-dark'>To</label>
                            <div class='input-group'>
                                <input type='hidden' name='section' style='width: 50%;' class='form-control' value='".$section."'>
                                <input type='hidden' name='sem' style='width: 50%;' class='form-control' value='".$sem."'>
                                <input type='email' required id='some_id' autocomplete='new-password' class= 'to' name='emailparent' style='width: 50%;' class='form-control' value='".$row['parent_email']."'>
                                <input type='email' id='some_id' autocomplete='new-password' class= 'to' name='emailparent1' style='width: 50%;' class='form-control' value='".$row['parent_email1']."'>
                                <input type='email' id='some_id' autocomplete='new-password' class= 'to' name='emailparent2' style='width: 50%;' class='form-control' value='".$row['parent_email2']."'>
                                <input type='email' id='some_id' autocomplete='new-password' class= 'to' name='emailparent3' style='width: 50%;' class='form-control' value='".$row['parent_email3']."'>
                            </div>
                            <label for='' class='text-dark'>From</label>
                            <input type='text' disabled name= 'email' class='form-control' value='".$email."'>
                            <label for='' class='text-dark'>Message</label>
                            <input type='text' required name= 'mess' class='form-control' value='".$row['sent']."'>
                
                            <input type='hidden' name='emailp' placeholder='lrn' id='username' value='".$row['parent_email']."' />
                            <input type='hidden' name='s_first' placeholder='lrn' id='username' value='".$row['student_first']."' />
                            <input type='hidden' name='s_last' placeholder='lrn' id='username' value='".$row['student_last']."' />
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
                            <p>CS 6</p>
                        </td>
                        <td>
                            <p>Contemporary Philippine Arts from the Region</p>
                        </td>
                
                        <td>
                            <p><input type='number' min='60' max='100' step='0.5' name='seccore1first' class='kd1 ave q ".$passfail."' style='border:0; color: $color;' value='".$row1['first_c_1']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                        </td>
                        <td>
                            <p><input readonly type='number' min='60' max='100' step='0.5' name='seccore1sec' class='kd2 ave q ".$passfail."' style='border:0; color: $color;' value='".$row2['first_c_1']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                        </td>
                        <td align='center'>
                            <p><input type='number' min='60' max='100' step='0.5' name='seccore1ave' class='result1 ".$passfail."' style='border:0; color: $color;' value='".$row3['ave_c_1']."' readonly> </p>     
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
                            <p><input type='number' min='60' max='100' step='0.5' name='seccore2first' class='kd1 ave q ".$passfail."' style='border:0; color: $color;' value='".$row1['first_c_2']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                        </td>
                        <td>
                            <p><input readonly type='number' min='60' max='100' step='0.5' name='seccore2sec' class='kd2 ave q ".$passfail."' style='border:0; color: $color;' value='".$row2['first_c_2']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                        </td>
                        <td align='center'>
                            <p><input type='text' min='60' max='100' step='0.5' name='seccore2ave' size='5' class='result1 ".$passfail."' style='border:0; color: $color;' value='".$row3['ave_c_2']."' readonly></p> 
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
                            <p><input type='number' min='60' max='100' step='0.5' name='seccore3first' class='kd1 ave q ".$passfail."' style='border:0; color: $color;' value='".$row1['first_c_3']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                        </td>
                        <td>
                            <p><input readonly type='number' min='60' max='100' step='0.5' name='seccore3sec' class='kd2 ave q ".$passfail."' style='border:0; color: $color;' value='".$row2['first_c_3']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                        </td>
                        <td align='center'>
                            <p><input type='text' min='60' max='100' step='0.5' name='seccore3ave' size='5' class='result1 ".$passfail."' style='border:0; color: $color;' value='".$row3['ave_c_3']."' readonly></p> 
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
                            <p><input type='number' min='60' max='100' step='0.5' name='seccore4first' class='kd1 ave q ".$passfail."' style='border:0' value='".$row1['first_c_4']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                        </td>
                        <td>
                            <p><input readonly type='number' min='60' max='100' step='0.5' name='seccore4sec' class='kd2 ave q ".$passfail."' style='border:0' value='".$row2['first_c_4']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                        </td>
                        <td align='center'>
                            <p><input type='text' min='60' max='100' step='0.5' name='seccore4ave' size='5' class='result1 ".$passfail."' style='border:0' value='".$row3['ave_c_4']."' readonly></p> 
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
                            <p><input type='number' min='60' max='100' step='0.5' name='secapp1first' class='kd1 ave q ".$passfail."' style='border:0' value='".$row1['first_a_1']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                        </td>
                        <td>
                            <p><input readonly type='number' min='60' max='100' step='0.5' name='secapp1sec' class='kd2 ave q ".$passfail."' style='border:0' value='".$row2['first_a_1']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                
                        </td>
                        <td align='center'>
                            <p><input type='text' min='60' max='100' step='0.5' name='secapp1ave' size='5' class='result1 ".$passfail."' style='border:0' value='".$row3['ave_a_1']."' readonly></p> 
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
                            <p><input type='number' min='60' max='100' step='0.5' name='secapp2first' class='kd1 ave q ".$passfail."' id= 'clear' style='border:0' value='".$row1['first_a_2']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                
                        </td>
                        <td>
                            <p><input readonly type='number' min='60' max='100' step='0.5' name='secapp2sec' class='kd2 ave q ".$passfail."' id= 'clear' style='border:0'  value='".$row2['first_a_2']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                
                        </td>
                        <td align='center'>
                            <p><input type='text' min='60' max='100' step='0.5' name='secapp2ave' size='5' class='result1 ".$passfail."' style='border:0' value='".$row3['ave_a_2']."' readonly></p> 
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
                            <p><input type='number' min='60' max='100' step='0.5' name='secapp3first' class='kd1 ave q ".$passfail."' style='border:0' value='".$row1['first_a_3']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                
                        </td>
                        <td>
                            <p><input readonly type='number' min='60' max='100' step='0.5' name='secapp3sec' class='kd2 ave q ".$passfail."' style='border:0' value='".$row2['first_a_3']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                
                        </td>
                        <td align='center'>
                            <p><input type='text' min='60' max='100' step='0.5' name='secapp3ave' size='5' class='result1 ".$passfail."' style='border:0' value='".$row3['ave_a_3']."' readonly></p> 
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
                            <p><input type='number' min='60' max='100' step='0.5' name='secapp4first' class='kd1 ave q ".$passfail."' style='border:0' value='".$row1['first_a_4']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                
                        </td>
                        <td>
                            <p><input readonly type='number' min='60' max='100' step='0.5' name='secapp4sec' class='kd2 ave q ".$passfail."' style='border:0' value='".$row2['first_a_4']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                
                        </td>
                        <td align='center'>
                            <p><input type='text' min='60' max='100' step='0.5' name='secapp4ave' size='5' class='result1 ".$passfail."' style='border:0' value='".$row3['ave_a_4']."' readonly></p> 
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
                            <p><input type='text' min='60' max='100' step='0.5' size='5' class='ave1 ".$passfail."' name= 'secave1' style='border:0' value='".$row1['sec_first_ave']."' readonly></p> 
                        </td>
                        <td>
                            <p><input type='text' min='60' max='100' step='0.5' size='5' class='ave2 ".$passfail."' name= 'secave2' style='border:0' value='".$row2['sec_sec_ave']."' readonly></p>  
                        </td>
                        <td>
                            <p><input type='text' min='60' max='100' step='0.5' size='5' class='average ".$passfail."' name= 'secave' style='border:0' value='".$row3['ave_sec']."' readonly></p> 
                        </td>
                    </tr>
                    </table>
                <table id='name' align='center'>
                <tr>
                    <td valign='top' class='name'>
                    <p class='car'>".$row['student_last']." ".$row['student_first']." ".$row['student_middle']." ".$row['student_suffix']."</p>
                    <div id='button'>
                    <button type='submit' class='btn btn-danger' id='insert' name='save-sec' formnovalidate='formnovalidate'>Save</a>
                        <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal'>Signature</button>
                
                        <br>
                        <br>
                        <label for=''>Send to:</label>
                        <br>
                        <button type='submit' class='btn btn-primary' id='first' name='parent-sec'>Parent</button>
                        <button type='submit' class='btn btn-primary' id='first' name='student-sec'>Student</button>
                        <button type='submit' class='btn btn-primary' id='first' name='all-sec'>All</button>
                        <br>
                        <label for=''>Send as:</label>
                        <br>
                        <input type='radio' id= 'semester' class='btn btn-primary' id='first' name='radio' value='first' required>First Grading</input>
                        <input type='radio' id= 'all' class='btn btn-primary' id='first' name='radio' value='second' required>Second Grading</input>
                    </form>
                    </div>
                    </td>
                </tr>
                </table>";
                if ($row['ifsent']=="Sent") {
                    if (($row['ifsent']=="Sent") && ($row1['sent']==1)) {
                        echo"
                        <table align='center'>
                            <tr>
                                <td class='name'>
                                    <i class='bx bxs-badge-check foldah'></i>
                                </td>
                            </tr>
                        </table>";
                    }
                    else {
                        echo"
                        <table align='center'>
                            <tr>
                                <td class='name'>
                                    <i class='bx bxs-check-circle foldah'></i>
                                </td>
                            </tr>
                        </table>";
                    }
                    
                }
                else if ($row1['sent']==1) {
                    if (($row['ifsent']=="Sent") && ($row1['sent']==1)) {
                        echo"
                        <table align='center'>
                            <tr>
                                <td class='name'>
                                    <i class='bx bxs-badge-check foldah'></i>
                                </td>
                            </tr>
                        </table>";
                    }
                    else {
                        echo"
                        <table align='center'>
                            <tr>
                                <td class='name'>
                                    <i class='bx bxs-check-square foldah'></i>
                                </td>
                            </tr>
                        </table>";
                    }
                }

                    echo"</div>
                    ";
                }
              }
            
              else if ($rowdis['second_second']=='yes') {
                if (($rowdis['second_first']=='yes') && ($rowdis['second_second']=='yes')) {
                    echo "<div class='item' id='item'>
                    <form action='include/action.php?name=save&section=".$section."&sem=2' method='POST' class='myform'>
                    <label for='' class='text-dark'>To</label>
                    <div class='input-group'>
                        <input type='hidden' name='section' style='width: 50%;' class='form-control' value='".$section."'>
                        <input type='hidden' name='sem' style='width: 50%;' class='form-control' value='".$sem."'>
                        <input type='email' required id='some_id' autocomplete='new-password' class= 'to' name='emailparent' style='width: 50%;' class='form-control' value='".$row['parent_email']."'>
                        <input type='email' id='some_id' autocomplete='new-password' class= 'to' name='emailparent1' style='width: 50%;' class='form-control' value='".$row['parent_email1']."'>
                        <input type='email' id='some_id' autocomplete='new-password' class= 'to' name='emailparent2' style='width: 50%;' class='form-control' value='".$row['parent_email2']."'>
                        <input type='email' id='some_id' autocomplete='new-password' class= 'to' name='emailparent3' style='width: 50%;' class='form-control' value='".$row['parent_email3']."'>
                    </div>
                    <label for='' class='text-dark'>From</label>
                    <input type='text' disabled name= 'email' class='form-control' value='".$email."'>
                    <label for='' class='text-dark'>Message</label> 
                    <input type='text' required name= 'mess' class='form-control' value='".$row['sent']."'>
        
                    <input type='hidden' name='emailp' placeholder='lrn' id='username' value='".$row['parent_email']."' />
                    <input type='hidden' name='s_first' placeholder='lrn' id='username' value='".$row['student_first']."' />
                    <input type='hidden' name='s_last' placeholder='lrn' id='username' value='".$row['student_last']."' />
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
                            <p>CS 6</p>
                        </td>
                        <td>
                            <p>Contemporary Philippine Arts from the Region</p>
                        </td>
                
                        <td>
                            <p><input type='number' min='60' max='100' step='0.5' name='seccore1first' class='kd1 ave q ".$passfail."' style='border:0; color: $color;' value='".$row1['first_c_1']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                        </td>
                        <td>
                            <p><input type='number' min='60' max='100' step='0.5' name='seccore1sec' class='kd2 ave q ".$passfail."' style='border:0; color: $color;' value='".$row2['first_c_1']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                        </td>
                        <td align='center'>
                            <p><input type='number' min='60' max='100' step='0.5' name='seccore1ave' class='result1 ".$passfail."' style='border:0; color: $color;' value='".$row3['ave_c_1']."' readonly> </p>     
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
                            <p><input type='number' min='60' max='100' step='0.5' name='seccore2first' class='kd1 ave q ".$passfail."' style='border:0; color: $color;' value='".$row1['first_c_2']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                        </td>
                        <td>
                            <p><input type='number' min='60' max='100' step='0.5' name='seccore2sec' class='kd2 ave q ".$passfail."' style='border:0; color: $color;' value='".$row2['first_c_2']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                        </td>
                        <td align='center'>
                            <p><input type='text' min='60' max='100' step='0.5' name='seccore2ave' size='5' class='result1 ".$passfail."' style='border:0; color: $color;' value='".$row3['ave_c_2']."' readonly></p> 
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
                            <p><input type='number' min='60' max='100' step='0.5' name='seccore3first' class='kd1 ave q ".$passfail."' style='border:0; color: $color;' value='".$row1['first_c_3']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                        </td>
                        <td>
                            <p><input type='number' min='60' max='100' step='0.5' name='seccore3sec' class='kd2 ave q ".$passfail."' style='border:0; color: $color;' value='".$row2['first_c_3']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                        </td>
                        <td align='center'>
                            <p><input type='text' min='60' max='100' step='0.5' name='seccore3ave' size='5' class='result1 ".$passfail."' style='border:0; color: $color;' value='".$row3['ave_c_3']."' readonly></p> 
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
                            <p><input type='number' min='60' max='100' step='0.5' name='seccore4first' class='kd1 ave q ".$passfail."' style='border:0' value='".$row1['first_c_4']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                        </td>
                        <td>
                            <p><input type='number' min='60' max='100' step='0.5' name='seccore4sec' class='kd2 ave q ".$passfail."' style='border:0' value='".$row2['first_c_4']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                        </td>
                        <td align='center'>
                            <p><input type='text' min='60' max='100' step='0.5' name='seccore4ave' size='5' class='result1 ".$passfail."' style='border:0' value='".$row3['ave_c_4']."' readonly></p> 
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
                            <p><input type='number' min='60' max='100' step='0.5' name='secapp1first' class='kd1 ave q ".$passfail."' style='border:0' value='".$row1['first_a_1']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                        </td>
                        <td>
                            <p><input type='number' min='60' max='100' step='0.5' name='secapp1sec' class='kd2 ave q ".$passfail."' style='border:0' value='".$row2['first_a_1']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                
                        </td>
                        <td align='center'>
                            <p><input type='text' min='60' max='100' step='0.5' name='secapp1ave' size='5' class='result1 ".$passfail."' style='border:0' value='".$row3['ave_a_1']."' readonly></p> 
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
                            <p><input type='number' min='60' max='100' step='0.5' name='secapp2first' class='kd1 ave q ".$passfail."' id= 'clear' style='border:0' value='".$row1['first_a_2']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                
                        </td>
                        <td>
                            <p><input type='number' min='60' max='100' step='0.5' name='secapp2sec' class='kd2 ave q ".$passfail."' id= 'clear' style='border:0'  value='".$row2['first_a_2']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                
                        </td>
                        <td align='center'>
                            <p><input type='text' min='60' max='100' step='0.5' name='secapp2ave' size='5' class='result1 ".$passfail."' style='border:0' value='".$row3['ave_a_2']."' readonly></p> 
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
                            <p><input type='number' min='60' max='100' step='0.5' name='secapp3first' class='kd1 ave q ".$passfail."' style='border:0' value='".$row1['first_a_3']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                
                        </td>
                        <td>
                            <p><input type='number' min='60' max='100' step='0.5' name='secapp3sec' class='kd2 ave q ".$passfail."' style='border:0' value='".$row2['first_a_3']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                
                        </td>
                        <td align='center'>
                            <p><input type='text' min='60' max='100' step='0.5' name='secapp3ave' size='5' class='result1 ".$passfail."' style='border:0' value='".$row3['ave_a_3']."' readonly></p> 
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
                            <p><input type='number' min='60' max='100' step='0.5' name='secapp4first' class='kd1 ave q ".$passfail."' style='border:0' value='".$row1['first_a_4']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                
                        </td>
                        <td>
                            <p><input type='number' min='60' max='100' step='0.5' name='secapp4sec' class='kd2 ave q ".$passfail."' style='border:0' value='".$row2['first_a_4']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                
                        </td>
                        <td align='center'>
                            <p><input type='text' min='60' max='100' step='0.5' name='secapp4ave' size='5' class='result1 ".$passfail."' style='border:0' value='".$row3['ave_a_4']."' readonly></p> 
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
                            <p><input type='text' min='60' max='100' step='0.5' size='5' class='ave1 ".$passfail."' name= 'secave1' style='border:0' value='".$row1['sec_first_ave']."' readonly></p> 
                        </td>
                        <td>
                            <p><input type='text' min='60' max='100' step='0.5' size='5' class='ave2 ".$passfail."' name= 'secave2' style='border:0' value='".$row2['sec_sec_ave']."' readonly></p>  
                        </td>
                        <td>
                            <p><input type='text' min='60' max='100' step='0.5' size='5' class='average ".$passfail."' name= 'secave' style='border:0' value='".$row3['ave_sec']."' readonly></p> 
                        </td>
                    </tr>
                    </table>
                <table id='name' align='center'>
                <tr>
                    <td valign='top' class='name'>
                    <p class='car'>".$row['student_last']." ".$row['student_first']." ".$row['student_middle']." ".$row['student_suffix']."</p>
                    <div id='button'>
                    <button type='submit' class='btn btn-danger' id='insert' name='save-sec' formnovalidate='formnovalidate'>Save</a>
                        <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal'>Signature</button>
                
                        <br>
                        <br>
                        <label for=''>Send to:</label>
                        <br>
                        <button type='submit' class='btn btn-primary' id='first' name='parent-sec'>Parent</button>
                        <button type='submit' class='btn btn-primary' id='first' name='student-sec'>Student</button>
                        <button type='submit' class='btn btn-primary' id='first' name='all-sec'>All</button>
                        <br>
                        <label for=''>Send as:</label>
                        <br>
                        <input type='radio' id= 'semester' class='btn btn-primary' id='first' name='radio' value='first' required>First Grading</input>
                        <input type='radio' id= 'all' class='btn btn-primary' id='first' name='radio' value='second' required>Second Grading</input>
                    </form>
                    </div>
                    </td>
                </tr>
                </table>";
                if ($row['ifsent']=="Sent") {
                    if (($row['ifsent']=="Sent") && ($row1['sent']==1)) {
                        echo"
                        <table align='center'>
                            <tr>
                                <td class='name'>
                                    <i class='bx bxs-badge-check foldah'></i>
                                </td>
                            </tr>
                        </table>";
                    }
                    else {
                        echo"
                        <table align='center'>
                            <tr>
                                <td class='name'>
                                    <i class='bx bxs-check-circle foldah'></i>
                                </td>
                            </tr>
                        </table>";
                    }
                    
                }
                else if ($row1['sent']==1) {
                    if (($row['ifsent']=="Sent") && ($row1['sent']==1)) {
                        echo"
                        <table align='center'>
                            <tr>
                                <td class='name'>
                                    <i class='bx bxs-badge-check foldah'></i>
                                </td>
                            </tr>
                        </table>";
                    }
                    else {
                        echo"
                        <table align='center'>
                            <tr>
                                <td class='name'>
                                    <i class='bx bxs-check-square foldah'></i>
                                </td>
                            </tr>
                        </table>";
                    }
                }

                    echo"</div>
                    ";
                }
                else{
                    echo "<div class='item' id='item'>
                    <form action='include/action.php?name=save&section=".$section."&sem=2' method='POST' class='myform'>
                    <label for='' class='text-dark'>To</label>
                    <div class='input-group'>
                        <input type='hidden' name='section' style='width: 50%;' class='form-control' value='".$section."'>
                        <input type='hidden' name='sem' style='width: 50%;' class='form-control' value='".$sem."'>
                        <input type='email' required id='some_id' autocomplete='new-password' class= 'to' name='emailparent' style='width: 50%;' class='form-control' value='".$row['parent_email']."'>
                        <input type='email' id='some_id' autocomplete='new-password' class= 'to' name='emailparent1' style='width: 50%;' class='form-control' value='".$row['parent_email1']."'>
                        <input type='email' id='some_id' autocomplete='new-password' class= 'to' name='emailparent2' style='width: 50%;' class='form-control' value='".$row['parent_email2']."'>
                        <input type='email' id='some_id' autocomplete='new-password' class= 'to' name='emailparent3' style='width: 50%;' class='form-control' value='".$row['parent_email3']."'>
                    </div>
                    <label for='' class='text-dark'>From</label>
                    <input type='text' disabled name= 'email' class='form-control' value='".$email."'>
                    <label for='' class='text-dark'>Message</label>
                    <input type='text' required name= 'mess' class='form-control' value='".$row['sent']."'>
        
                    <input type='hidden' name='emailp' placeholder='lrn' id='username' value='".$row['parent_email']."' />
                    <input type='hidden' name='s_first' placeholder='lrn' id='username' value='".$row['student_first']."' />
                    <input type='hidden' name='s_last' placeholder='lrn' id='username' value='".$row['student_last']."' />
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
                            <p>CS 6</p>
                        </td>
                        <td>
                            <p>Contemporary Philippine Arts from the Region</p>
                        </td>
                
                        <td>
                            <p><input type='number' min='60' max='100' step='0.5' name='seccore1first' class='kd1 ave q ".$passfail."' style='border:0; color: $color;' value='".$row1['first_c_1']."' readonly></p>
                        </td>
                        <td>
                            <p><input type='number' min='60' max='100' step='0.5' name='seccore1sec' class='kd2 ave q ".$passfail."' style='border:0; color: $color;' value='".$row2['first_c_1']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                        </td>
                        <td align='center'>
                            <p><input type='number' min='60' max='100' step='0.5' name='seccore1ave' class='result1 ".$passfail."' style='border:0; color: $color;' value='".$row3['ave_c_1']."' readonly> </p>     
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
                            <p><input readonly type='number' min='60' max='100' step='0.5' name='seccore2first' class='kd1 ave q ".$passfail."' style='border:0; color: $color;' value='".$row1['first_c_2']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                        </td>
                        <td>
                            <p><input type='number' min='60' max='100' step='0.5' name='seccore2sec' class='kd2 ave q ".$passfail."' style='border:0; color: $color;' value='".$row2['first_c_2']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                        </td>
                        <td align='center'>
                            <p><input type='text' min='60' max='100' step='0.5' name='seccore2ave' size='5' class='result1 ".$passfail."' style='border:0; color: $color;' value='".$row3['ave_c_2']."' readonly></p> 
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
                            <p><input readonly type='number' min='60' max='100' step='0.5' name='seccore3first' class='kd1 ave q ".$passfail."' style='border:0; color: $color;' value='".$row1['first_c_3']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                        </td>
                        <td>
                            <p><input type='number' min='60' max='100' step='0.5' name='seccore3sec' class='kd2 ave q ".$passfail."' style='border:0; color: $color;' value='".$row2['first_c_3']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                        </td>
                        <td align='center'>
                            <p><input type='text' min='60' max='100' step='0.5' name='seccore3ave' size='5' class='result1 ".$passfail."' style='border:0; color: $color;' value='".$row3['ave_c_3']."' readonly></p> 
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
                            <p><input readonly type='number' min='60' max='100' step='0.5' name='seccore4first' class='kd1 ave q ".$passfail."' style='border:0' value='".$row1['first_c_4']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                        </td>
                        <td>
                            <p><input type='number' min='60' max='100' step='0.5' name='seccore4sec' class='kd2 ave q ".$passfail."' style='border:0' value='".$row2['first_c_4']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                        </td>
                        <td align='center'>
                            <p><input type='text' min='60' max='100' step='0.5' name='seccore4ave' size='5' class='result1 ".$passfail."' style='border:0' value='".$row3['ave_c_4']."' readonly></p> 
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
                            <p><input readonly type='number' min='60' max='100' step='0.5' name='secapp1first' class='kd1 ave q ".$passfail."' style='border:0' value='".$row1['first_a_1']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                        </td>
                        <td>
                            <p><input type='number' min='60' max='100' step='0.5' name='secapp1sec' class='kd2 ave q ".$passfail."' style='border:0' value='".$row2['first_a_1']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                
                        </td>
                        <td align='center'>
                            <p><input type='text' min='60' max='100' step='0.5' name='secapp1ave' size='5' class='result1 ".$passfail."' style='border:0' value='".$row3['ave_a_1']."' readonly></p> 
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
                            <p><input readonly type='number' min='60' max='100' step='0.5' name='secapp2first' class='kd1 ave q ".$passfail."' id= 'clear' style='border:0' value='".$row1['first_a_2']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                
                        </td>
                        <td>
                            <p><input type='number' min='60' max='100' step='0.5' name='secapp2sec' class='kd2 ave q ".$passfail."' id= 'clear' style='border:0'  value='".$row2['first_a_2']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                
                        </td>
                        <td align='center'>
                            <p><input type='text' min='60' max='100' step='0.5' name='secapp2ave' size='5' class='result1 ".$passfail."' style='border:0' value='".$row3['ave_a_2']."' readonly></p> 
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
                            <p><input readonly type='number' min='60' max='100' step='0.5' name='secapp3first' class='kd1 ave q ".$passfail."' style='border:0' value='".$row1['first_a_3']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                
                        </td>
                        <td>
                            <p><input type='number' min='60' max='100' step='0.5' name='secapp3sec' class='kd2 ave q ".$passfail."' style='border:0' value='".$row2['first_a_3']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                
                        </td>
                        <td align='center'>
                            <p><input type='text' min='60' max='100' step='0.5' name='secapp3ave' size='5' class='result1 ".$passfail."' style='border:0' value='".$row3['ave_a_3']."' readonly></p> 
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
                            <p><input readonly type='number' min='60' max='100' step='0.5' name='secapp4first' class='kd1 ave q ".$passfail."' style='border:0' value='".$row1['first_a_4']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                
                        </td>
                        <td>
                            <p><input type='number' min='60' max='100' step='0.5' name='secapp4sec' class='kd2 ave q ".$passfail."' style='border:0' value='".$row2['first_a_4']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                
                        </td>
                        <td align='center'>
                            <p><input type='text' min='60' max='100' step='0.5' name='secapp4ave' size='5' class='result1 ".$passfail."' style='border:0' value='".$row3['ave_a_4']."' readonly></p> 
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
                            <p><input type='text' min='60' max='100' step='0.5' size='5' class='ave1 ".$passfail."' name= 'secave1' style='border:0' value='".$row1['sec_first_ave']."' readonly></p> 
                        </td>
                        <td>
                            <p><input type='text' min='60' max='100' step='0.5' size='5' class='ave2 ".$passfail."' name= 'secave2' style='border:0' value='".$row2['sec_sec_ave']."' readonly></p>  
                        </td>
                        <td>
                            <p><input type='text' min='60' max='100' step='0.5' size='5' class='average ".$passfail."' name= 'secave' style='border:0' value='".$row3['ave_sec']."' readonly></p> 
                        </td>
                    </tr>
                    </table>
                <table id='name' align='center'>
                <tr>
                    <td valign='top' class='name'>
                    <p class='car'>".$row['student_last']." ".$row['student_first']." ".$row['student_middle']." ".$row['student_suffix']."</p>
                    <div id='button'>
                    <button type='submit' class='btn btn-danger' id='insert' name='save-sec' formnovalidate='formnovalidate'>Save</a>
                        <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal'>Signature</button>
                
                        <br>
                        <br>
                        <label for=''>Send to:</label>
                        <br>
                        <button type='submit' class='btn btn-primary' id='first' name='parent-sec'>Parent</button>
                        <button type='submit' class='btn btn-primary' id='first' name='student-sec'>Student</button>
                        <button type='submit' class='btn btn-primary' id='first' name='all-sec'>All</button>
                        <br>
                        <label for=''>Send as:</label>
                        <br>
                        <input type='radio' id= 'semester' class='btn btn-primary' id='first' name='radio' value='first' required>First Grading</input>
                        <input type='radio' id= 'all' class='btn btn-primary' id='first' name='radio' value='second' required>Second Grading</input>
                    </form>
                    </div>
                    </td>
                </tr>
                </table>";
                if ($row['ifsent']=="Sent") {
                    if (($row['ifsent']=="Sent") && ($row1['sent']==1)) {
                        echo"
                        <table align='center'>
                            <tr>
                                <td class='name'>
                                    <i class='bx bxs-badge-check foldah'></i>
                                </td>
                            </tr>
                        </table>";
                    }
                    else {
                        echo"
                        <table align='center'>
                            <tr>
                                <td class='name'>
                                    <i class='bx bxs-check-circle foldah'></i>
                                </td>
                            </tr>
                        </table>";
                    }
                    
                }
                else if ($row1['sent']==1) {
                    if (($row['ifsent']=="Sent") && ($row1['sent']==1)) {
                        echo"
                        <table align='center'>
                            <tr>
                                <td class='name'>
                                    <i class='bx bxs-badge-check foldah'></i>
                                </td>
                            </tr>
                        </table>";
                    }
                    else {
                        echo"
                        <table align='center'>
                            <tr>
                                <td class='name'>
                                    <i class='bx bxs-check-square foldah'></i>
                                </td>
                            </tr>
                        </table>";
                    }
                }
                
                echo"</div>
                    ";
                }
              }
              
              
          
        }
    }
    else if ($sem === 'one') {
            $sql="SELECT * from ".$section."_student";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: url.php?error=stmtfailed");
            exit();
        }
        $result= mysqli_query($conn, $sql);
        $queryResults = mysqli_num_rows($result);
        $email=$_SESSION['email'];
        $last=$_SESSION['userlast'];
          while ($row = mysqli_fetch_assoc($result)) {
            $sql1="SELECT * FROM ".$section."_grade_first_first WHERE student_first='".$row['student_first']."' AND student_last='".$row['student_last']."'";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql1)) {
                echo "strmt";
                exit();
            }
            $result1= mysqli_query($conn, $sql1);
            $queryResults1 = mysqli_num_rows($result1);
            $row1 = mysqli_fetch_assoc($result1);
            
            $sql2="SELECT * FROM ".$section."_grade_first_sec WHERE student_first='".$row['student_first']."' AND student_last='".$row['student_last']."'";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql2)) {
                header("location: url.php?error=stmtfaileda");
                exit();
            }
            $result2= mysqli_query($conn, $sql2);
            $queryResults2 = mysqli_num_rows($result2);
            $row2 = mysqli_fetch_assoc($result2);

            $sql3="SELECT * FROM ".$section."_ave WHERE student_first='".$row['student_first']."' AND student_last='".$row['student_last']."'";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql3)) {
                header("location: url.php?error=stmtfaileda");
                exit();
            }
            $result3= mysqli_query($conn, $sql3);
            $queryResults3 = mysqli_num_rows($result3);
            $row3 = mysqli_fetch_assoc($result3);
            $item= "item";
            
            if (($rowdis['first_first']=="yes") && ($rowdis['first']=="yes")) {
                if (($rowdis['first_first']=="yes") && ($rowdis['first_second']=="yes")) {
                    echo "<div class='".$item."' id='item'>
                        <form action='include/action.php?name=save&section=".$section."&sem=".$sem."' method='POST' class='myform'>
                        <label for='' class='text-dark'>To</label>
                        <div class='input-group'>
                            <input type='hidden' name='section' style='width: 50%;' class='form-control' value='".$section."'>
                            <input type='hidden' name='sem' style='width: 50%;' class='form-control' value='".$sem."'>
                            <input type='email' required id='some_id' autocomplete='new-password' class= 'to' name='emailparent' style='width: 50%;' class='form-control' value='".$row['parent_email']."'>
                            <input type='email' id='some_id' autocomplete='new-password' class= 'to' name='emailparent1' style='width: 50%;' class='form-control' value='".$row['parent_email1']."'>
                            <input type='email' id='some_id' autocomplete='new-password' class= 'to' name='emailparent2' style='width: 50%;' class='form-control' value='".$row['parent_email2']."'>
                            <input type='email' id='some_id' autocomplete='new-password' class= 'to' name='emailparent3' style='width: 50%;' class='form-control' value='".$row['parent_email3']."'>
                        </div>
                        <label for='' class='text-dark'>From</label>
                        <input type='text' disabled class='form-control' value='".$email."'>
                        <label for='' class='text-dark'>Message</label>
                        <input type='text' required name= 'mess' class='form-control' value='".$row['sent']."'>
                        
                        
                        <input type='hidden' name='emailp' placeholder='lrn' id='username' value='".$row['parent_email']."' />
                        <input type='hidden' name='s_first' placeholder='lrn' id='username' value='".$row['student_first']."' />
                        <input type='hidden' name='s_last' placeholder='lrn' id='username' value='".$row['student_last']."' />
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
                        <p><input type='number' min='60' max='100' step='0.5' name='core1first' class='kd1 ave q' style='border:0' value='".$row1['first_c_1']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                    </td>
                    <td>
                        <p><input type='number' min='60' max='100' step='0.5' name='core1sec' class='kd2 ave q' style='border:0' value='".$row2['first_c_1']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                    </td>
                    <td align='center'>
                        <p><input type='number' min='60' max='100' step='0.5' name='core1ave' class='result1' style='border:0' value='".$row3['ave_c_1']."' readonly> </p>     
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
                        <p><input type='number' min='60' max='100' step='0.5' name='core2first' class='kd1 ave q' style='border:0' value='".$row1['first_c_2']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                    </td>
                    <td>
                        <p><input type='number' min='60' max='100' step='0.5' name='core2sec' class='kd2 ave q' style='border:0' value='".$row2['first_c_2']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                    </td>
                    <td align='center'>
                        <p><input type='text' min='60' max='100' step='0.5' name='core2ave' size='5' class='result1' style='border:0' value='".$row3['ave_c_2']."' readonly></p> 
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
                        <p><input type='number' min='60' max='100' step='0.5' name='core3first' class='kd1 ave q' style='border:0' value='".$row1['first_c_3']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                    </td>
                    <td>
                        <p><input type='number' min='60' max='100' step='0.5' name='core3sec' class='kd2 ave q' style='border:0' value='".$row2['first_c_3']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                    </td>
                    <td align='center'>
                        <p><input type='text' min='60' max='100' step='0.5' name='core3ave' size='5' class='result1' style='border:0' value='".$row3['ave_c_3']."' readonly></p> 
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
                        <p><input type='number' min='60' max='100' step='0.5' name='app1first' class='kd1 ave q' style='border:0' value='".$row1['first_a_1']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                    </td>
                    <td>
                        <p><input type='number' min='60' max='100' step='0.5' name='app1sec' class='kd2 ave q' style='border:0' value='".$row2['first_a_1']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>

                    </td>
                    <td align='center'>
                        <p><input type='text' min='60' max='100' step='0.5' name='app1ave' size='5' class='result1' style='border:0' value='".$row3['ave_a_1']."' readonly></p> 
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
                        <p><input type='number' min='60' max='100' step='0.5' name='app2first' class='kd1 ave q' id= 'clear' style='border:0' value='".$row1['first_a_2']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>

                    </td>
                    <td>
                        <p><input type='number' min='60' max='100' step='0.5' name='app2sec' class='kd2 ave q' id= 'clear' style='border:0'  value='".$row2['first_a_2']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>

                    </td>
                    <td align='center'>
                        <p><input type='text' min='60' max='100' step='0.5' name='app2ave' size='5' class='result1' style='border:0' value='".$row3['ave_a_2']."' readonly></p> 
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
                        <p><input type='number' min='60' max='100' step='0.5' name='app3first' class='kd1 ave q' style='border:0' value='".$row1['first_a_3']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>

                    </td>
                    <td>
                        <p><input type='number' min='60' max='100' step='0.5' name='app3sec' class='kd2 ave q' style='border:0' value='".$row2['first_a_3']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>

                    </td>
                    <td align='center'>
                        <p><input type='text' min='60' max='100' step='0.5' name='app3ave' size='5' class='result1' style='border:0' value='".$row3['ave_a_3']."' readonly></p> 
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
                        <p><input type='number' min='60' max='100' step='0.5' name='app4first' class='kd1 ave q' style='border:0' value='".$row1['first_a_4']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>

                    </td>
                    <td>
                        <p><input type='number' min='60' max='100' step='0.5' name='app4sec' class='kd2 ave q' style='border:0' value='".$row2['first_a_4']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>

                    </td>
                    <td align='center'>
                        <p><input type='text' min='60' max='100' step='0.5' name='app4ave' size='5' class='result1' style='border:0' value='".$row3['ave_a_4']."' readonly></p> 
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
                        <p><input type='number' min='60' max='100' step='0.5' name='app5first' class='kd1 ave q' style='border:0' value='".$row1['first_a_5']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>

                    </td>
                    <td>
                        <p><input type='number' min='60' max='100' step='0.5' name='app5sec' class='kd2 ave q' style='border:0' value='".$row2['first_a_5']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>

                    </td>
                    <td align='center'>
                        <p><input type='text' min='60' max='100' step='0.5' name='app5ave' size='5' class='result1' style='border:0' value='".$row3['ave_a_5']."' readonly></p> 
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
                        <p><input type='text' min='60' max='100' step='0.5' size='5' class='ave1' name= 'ave1' style='border:0' value='".$row1['first_first_ave']."' readonly></p> 
                    </td>
                    <td>
                        <p><input type='text' min='60' max='100' step='0.5' size='5' class='ave2' name= 'ave2' style='border:0' value='".$row2['first_sec_ave']."' readonly></p>  
                    </td>
                    <td>
                        <p><input type='text' min='60' max='100' step='0.5' size='5' class='average' name= 'ave' style='border:0' value='".$row3['ave']."' readonly></p> 
                    </td>
                </tr>
                </table>
            <table id='name' align='center'>
            <tr>
                <td valign='top' class='name'>
                <p class='car'>".$row['student_last']." ".$row['student_first']." ".$row['student_middle']." ".$row['student_suffix']."</p>
                <div id='button'>

                    <button type='submit' class='btn btn-danger' id='insert' name='save' formnovalidate='formnovalidate'>Save</a>
                    <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal'>Signature</button>

                    <br>
                    <br>
                    <label for=''>Send to:</label>
                    <br>
                    <button type='submit' class='btn btn-primary' id='first' name='parent'>Parent</button>
                    <button type='submit' class='btn btn-primary' id='first' name='student'>Student</button>
                    <button type='submit' class='btn btn-primary' id='first' name='all'>All</button>
                    <br>
                    <label for=''>Send as:</label>
                    <br>
                    <input type='radio' id= 'semester' class='btn btn-primary' id='first' name='radio' value='first' required>First Grading</input>
                    <input type='radio' id= 'all' class='btn btn-primary' id='first' name='radio' value='second' required>Second Grading</input>
                </form>
                </div>
                </td>
            </tr>
            </table>";

            if ($row['ifsent']=="Sent") {
                if (($row['ifsent']=="Sent") && ($row1['sent']==1)) {
                    echo"
                    <table align='center'>
                        <tr>
                            <td class='name'>
                                <i class='bx bxs-badge-check foldah'></i>
                            </td>
                        </tr>
                    </table>";
                }
                else {
                    echo"
                    <table align='center'>
                        <tr>
                            <td class='name'>
                                <i class='bx bxs-check-circle foldah'></i>
                            </td>
                        </tr>
                    </table>";
                }
                
            }
            else if ($row1['sent']==1) {
                if (($row['ifsent']=="Sent") && ($row1['sent']==1)) {
                    echo"
                    <table align='center'>
                        <tr>
                            <td class='name'>
                                <i class='bx bxs-badge-check foldah'></i>
                            </td>
                        </tr>
                    </table>";
                }
                else {
                    echo"
                    <table align='center'>
                        <tr>
                            <td class='name'>
                                <i class='bx bxs-check-square foldah'></i>
                            </td>
                        </tr>
                    </table>";
                }
            }
            echo"</div>
            ";
                }
                else {
                    echo "<div class='".$item."' id='item'>
                    <form action='include/action.php?name=save&section=".$section."&sem=".$sem."' method='POST' class='myform'>
                    <label for='' class='text-dark'>To</label>
                    <div class='input-group'>
                        <input type='hidden' name='section' style='width: 50%;' class='form-control' value='".$section."'>
                        <input type='hidden' name='sem' style='width: 50%;' class='form-control' value='".$sem."'>
                        <input type='email' required id='some_id' autocomplete='new-password' class= 'to' name='emailparent' style='width: 50%;' class='form-control' value='".$row['parent_email']."'>
                        <input type='email' id='some_id' autocomplete='new-password' class= 'to' name='emailparent1' style='width: 50%;' class='form-control' value='".$row['parent_email1']."'>
                        <input type='email' id='some_id' autocomplete='new-password' class= 'to' name='emailparent2' style='width: 50%;' class='form-control' value='".$row['parent_email2']."'>
                        <input type='email' id='some_id' autocomplete='new-password' class= 'to' name='emailparent3' style='width: 50%;' class='form-control' value='".$row['parent_email3']."'>
                    </div>
                    <label for='' class='text-dark'>From</label>
                    <input type='text' disabled class='form-control' value='".$email."'>
                    <label for='' class='text-dark'>Message</label>
                    <input type='text' required name= 'mess' class='form-control' value='".$row['sent']."'>
                    
                    
                    <input type='hidden' name='emailp' placeholder='lrn' id='username' value='".$row['parent_email']."' />
                    <input type='hidden' name='s_first' placeholder='lrn' id='username' value='".$row['student_first']."' />
                    <input type='hidden' name='s_last' placeholder='lrn' id='username' value='".$row['student_last']."' />
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
                    <p><input type='number' min='60' max='100' step='0.5' name='core1first' class='kd1 ave q' style='border:0' value='".$row1['first_c_1']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                </td>
                <td>
                    <p><input readonly type='number' min='60' max='100' step='0.5' name='core1sec' class='kd2 ave q' style='border:0' value='".$row2['first_c_1']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                </td>
                <td align='center'>
                    <p><input type='number' min='60' max='100' step='0.5' name='core1ave' class='result1' style='border:0' value='".$row3['ave_c_1']."' readonly> </p>     
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
                    <p><input type='number' min='60' max='100' step='0.5' name='core2first' class='kd1 ave q' style='border:0' value='".$row1['first_c_2']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                </td>
                <td>
                    <p><input readonly type='number' min='60' max='100' step='0.5' name='core2sec' class='kd2 ave q' style='border:0' value='".$row2['first_c_2']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                </td>
                <td align='center'>
                    <p><input type='text' min='60' max='100' step='0.5' name='core2ave' size='5' class='result1' style='border:0' value='".$row3['ave_c_2']."' readonly></p> 
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
                    <p><input type='number' min='60' max='100' step='0.5' name='core3first' class='kd1 ave q' style='border:0' value='".$row1['first_c_3']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                </td>
                <td>
                    <p><input readonly type='number' min='60' max='100' step='0.5' name='core3sec' class='kd2 ave q' style='border:0' value='".$row2['first_c_3']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                </td>
                <td align='center'>
                    <p><input type='text' min='60' max='100' step='0.5' name='core3ave' size='5' class='result1' style='border:0' value='".$row3['ave_c_3']."' readonly></p> 
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
                    <p><input type='number' min='60' max='100' step='0.5' name='app1first' class='kd1 ave q' style='border:0' value='".$row1['first_a_1']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                </td>
                <td>
                    <p><input readonly type='number' min='60' max='100' step='0.5' name='app1sec' class='kd2 ave q' style='border:0' value='".$row2['first_a_1']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>

                </td>
                <td align='center'>
                    <p><input type='text' min='60' max='100' step='0.5' name='app1ave' size='5' class='result1' style='border:0' value='".$row3['ave_a_1']."' readonly></p> 
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
                    <p><input type='number' min='60' max='100' step='0.5' name='app2first' class='kd1 ave q' id= 'clear' style='border:0' value='".$row1['first_a_2']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>

                </td>
                <td>
                    <p><input readonly type='number' min='60' max='100' step='0.5' name='app2sec' class='kd2 ave q' id= 'clear' style='border:0'  value='".$row2['first_a_2']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>

                </td>
                <td align='center'>
                    <p><input type='text' min='60' max='100' step='0.5' name='app2ave' size='5' class='result1' style='border:0' value='".$row3['ave_a_2']."' readonly></p> 
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
                    <p><input type='number' min='60' max='100' step='0.5' name='app3first' class='kd1 ave q' style='border:0' value='".$row1['first_a_3']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>

                </td>
                <td>
                    <p><input readonly type='number' min='60' max='100' step='0.5' name='app3sec' class='kd2 ave q' style='border:0' value='".$row2['first_a_3']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>

                </td>
                <td align='center'>
                    <p><input type='text' min='60' max='100' step='0.5' name='app3ave' size='5' class='result1' style='border:0' value='".$row3['ave_a_3']."' readonly></p> 
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
                    <p><input type='number' min='60' max='100' step='0.5' name='app4first' class='kd1 ave q' style='border:0' value='".$row1['first_a_4']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>

                </td>
                <td>
                    <p><input readonly type='number' min='60' max='100' step='0.5' name='app4sec' class='kd2 ave q' style='border:0' value='".$row2['first_a_4']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>

                </td>
                <td align='center'>
                    <p><input type='text' min='60' max='100' step='0.5' name='app4ave' size='5' class='result1' style='border:0' value='".$row3['ave_a_4']."' readonly></p> 
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
                    <p><input type='number' min='60' max='100' step='0.5' name='app5first' class='kd1 ave q' style='border:0' value='".$row1['first_a_5']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>

                </td>
                <td>
                    <p><input readonly type='number' min='60' max='100' step='0.5' name='app5sec' class='kd2 ave q' style='border:0' value='".$row2['first_a_5']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>

                </td>
                <td align='center'>
                    <p><input type='text' min='60' max='100' step='0.5' name='app5ave' size='5' class='result1' style='border:0' value='".$row3['ave_a_5']."' readonly></p> 
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
                    <p><input type='text' min='60' max='100' step='0.5' size='5' class='ave1' name= 'ave1' style='border:0' value='".$row1['first_first_ave']."' readonly></p> 
                </td>
                <td>
                    <p><input type='text' min='60' max='100' step='0.5' size='5' class='ave2' name= 'ave2' style='border:0' value='".$row2['first_sec_ave']."' readonly></p>  
                </td>
                <td>
                    <p><input type='text' min='60' max='100' step='0.5' size='5' class='average' name= 'ave' style='border:0' value='".$row3['ave']."' readonly></p> 
                </td>
            </tr>
            </table>
        <table id='name' align='center'>
        <tr>
            <td valign='top' class='name'>
            <p class='car'>".$row['student_last']." ".$row['student_first']." ".$row['student_middle']." ".$row['student_suffix']."</p>
            <div id='button'>

                <button type='submit' class='btn btn-danger' id='insert' name='save'>Save</a>
                <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal'>Signature</button>

                <br>
                <br>
                <label for=''>Send to:</label>
                <br>
                <button type='submit' class='btn btn-primary' id='first' name='parent'>Parent</button>
                <button type='submit' class='btn btn-primary' id='first' name='student'>Student</button>
                <button type='submit' class='btn btn-primary' id='first' name='all'>All</button>
                <br>
                <label for=''>Send as:</label>
                <br>
                <input type='radio' id= 'semester' class='btn btn-primary' id='first' name='radio' value='first' required>First Grading</input>
                <input type='radio' id= 'all' class='btn btn-primary' id='first' name='radio' value='second' required>Second Grading</input>
            </form>
            </div>
            </td>
        </tr>
        </table>";
        if ($row['ifsent']=="Sent") {
            if (($row['ifsent']=="Sent") && ($row1['sent']==1)) {
                echo"
                <table align='center'>
                    <tr>
                        <td class='name'>
                            <i class='bx bxs-badge-check foldah'></i>
                        </td>
                    </tr>
                </table>";
            }
            else {
                echo"
                <table align='center'>
                    <tr>
                        <td class='name'>
                            <i class='bx bxs-check-circle foldah'></i>
                        </td>
                    </tr>
                </table>";
            }
            
        }
        else if ($row1['sent']==1) {
            if (($row['ifsent']=="Sent") && ($row1['sent']==1)) {
                echo"
                <table align='center'>
                    <tr>
                        <td class='name'>
                            <i class='bx bxs-badge-check foldah'></i>
                        </td>
                    </tr>
                </table>";
            }
            else {
                echo"
                <table align='center'>
                    <tr>
                        <td class='name'>
                            <i class='bx bxs-check-square foldah'></i>
                        </td>
                    </tr>
                </table>";
            }
        }
        
        echo"</div>
            ";
                }
                
            }

            else if (($rowdis['first_second']=="yes") && ($rowdis['first']=="yes")) {
                if (($rowdis['first_first']=="yes") && ($rowdis['first_second']=="yes")) {
                    echo "<div class='".$item."' id='item'>
                    <form action='include/action.php?name=save&section=".$section."&sem=".$sem."' method='POST' class='myform'>
                    <label for='' class='text-dark'>To</label>
                    <div class='input-group'>
                        <input type='hidden' name='section' style='width: 50%;' class='form-control' value='".$section."'>
                        <input type='hidden' name='sem' style='width: 50%;' class='form-control' value='".$sem."'>
                        <input type='email' required id='some_id' autocomplete='new-password' class= 'to' name='emailparent' style='width: 50%;' class='form-control' value='".$row['parent_email']."'>
                        <input type='email' id='some_id' autocomplete='new-password' class= 'to' name='emailparent1' style='width: 50%;' class='form-control' value='".$row['parent_email1']."'>
                        <input type='email' id='some_id' autocomplete='new-password' class= 'to' name='emailparent2' style='width: 50%;' class='form-control' value='".$row['parent_email2']."'>
                        <input type='email' id='some_id' autocomplete='new-password' class= 'to' name='emailparent3' style='width: 50%;' class='form-control' value='".$row['parent_email3']."'>
                    </div>
                    <label for='' class='text-dark'>From</label>
                    <input type='text' disabled class='form-control' value='".$email."'>
                    <label for='' class='text-dark'>Message</label>
                    <input type='text' required name= 'mess' class='form-control' value='".$row['sent']."'>
                    
                    
                    <input type='hidden' name='emailp' placeholder='lrn' id='username' value='".$row['parent_email']."' />
                    <input type='hidden' name='s_first' placeholder='lrn' id='username' value='".$row['student_first']."' />
                    <input type='hidden' name='s_last' placeholder='lrn' id='username' value='".$row['student_last']."' />
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
                    <p><input type='number' min='60' max='100' step='0.5' name='core1first' class='kd1 ave q' style='border:0' value='".$row1['first_c_1']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                </td>
                <td>
                    <p><input type='number' min='60' max='100' step='0.5' name='core1sec' class='kd2 ave q' style='border:0' value='".$row2['first_c_1']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                </td>
                <td align='center'>
                    <p><input type='number' min='60' max='100' step='0.5' name='core1ave' class='result1' style='border:0' value='".$row3['ave_c_1']."' readonly> </p>     
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
                    <p><input type='number' min='60' max='100' step='0.5' name='core2first' class='kd1 ave q' style='border:0' value='".$row1['first_c_2']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                </td>
                <td>
                    <p><input type='number' min='60' max='100' step='0.5' name='core2sec' class='kd2 ave q' style='border:0' value='".$row2['first_c_2']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                </td>
                <td align='center'>
                    <p><input type='text' min='60' max='100' step='0.5' name='core2ave' size='5' class='result1' style='border:0' value='".$row3['ave_c_2']."' readonly></p> 
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
                    <p><input type='number' min='60' max='100' step='0.5' name='core3first' class='kd1 ave q' style='border:0' value='".$row1['first_c_3']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                </td>
                <td>
                    <p><input type='number' min='60' max='100' step='0.5' name='core3sec' class='kd2 ave q' style='border:0' value='".$row2['first_c_3']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                </td>
                <td align='center'>
                    <p><input type='text' min='60' max='100' step='0.5' name='core3ave' size='5' class='result1' style='border:0' value='".$row3['ave_c_3']."' readonly></p> 
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
                    <p><input type='number' min='60' max='100' step='0.5' name='app1first' class='kd1 ave q' style='border:0' value='".$row1['first_a_1']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                </td>
                <td>
                    <p><input type='number' min='60' max='100' step='0.5' name='app1sec' class='kd2 ave q' style='border:0' value='".$row2['first_a_1']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>

                </td>
                <td align='center'>
                    <p><input type='text' min='60' max='100' step='0.5' name='app1ave' size='5' class='result1' style='border:0' value='".$row3['ave_a_1']."' readonly></p> 
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
                    <p><input type='number' min='60' max='100' step='0.5' name='app2first' class='kd1 ave q' id= 'clear' style='border:0' value='".$row1['first_a_2']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>

                </td>
                <td>
                    <p><input type='number' min='60' max='100' step='0.5' name='app2sec' class='kd2 ave q' id= 'clear' style='border:0'  value='".$row2['first_a_2']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>

                </td>
                <td align='center'>
                    <p><input type='text' min='60' max='100' step='0.5' name='app2ave' size='5' class='result1' style='border:0' value='".$row3['ave_a_2']."' readonly></p> 
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
                    <p><input type='number' min='60' max='100' step='0.5' name='app3first' class='kd1 ave q' style='border:0' value='".$row1['first_a_3']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>

                </td>
                <td>
                    <p><input type='number' min='60' max='100' step='0.5' name='app3sec' class='kd2 ave q' style='border:0' value='".$row2['first_a_3']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>

                </td>
                <td align='center'>
                    <p><input type='text' min='60' max='100' step='0.5' name='app3ave' size='5' class='result1' style='border:0' value='".$row3['ave_a_3']."' readonly></p> 
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
                    <p><input type='number' min='60' max='100' step='0.5' name='app4first' class='kd1 ave q' style='border:0' value='".$row1['first_a_4']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>

                </td>
                <td>
                    <p><input type='number' min='60' max='100' step='0.5' name='app4sec' class='kd2 ave q' style='border:0' value='".$row2['first_a_4']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>

                </td>
                <td align='center'>
                    <p><input type='text' min='60' max='100' step='0.5' name='app4ave' size='5' class='result1' style='border:0' value='".$row3['ave_a_4']."' readonly></p> 
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
                    <p><input type='number' min='60' max='100' step='0.5' name='app5first' class='kd1 ave q' style='border:0' value='".$row1['first_a_5']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>

                </td>
                <td>
                    <p><input type='number' min='60' max='100' step='0.5' name='app5sec' class='kd2 ave q' style='border:0' value='".$row2['first_a_5']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>

                </td>
                <td align='center'>
                    <p><input type='text' min='60' max='100' step='0.5' name='app5ave' size='5' class='result1' style='border:0' value='".$row3['ave_a_5']."' readonly></p> 
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
                    <p><input type='text' min='60' max='100' step='0.5' size='5' class='ave1' name= 'ave1' style='border:0' value='".$row1['first_first_ave']."' readonly></p> 
                </td>
                <td>
                    <p><input type='text' min='60' max='100' step='0.5' size='5' class='ave2' name= 'ave2' style='border:0' value='".$row2['first_sec_ave']."' readonly></p>  
                </td>
                <td>
                    <p><input type='text' min='60' max='100' step='0.5' size='5' class='average' name= 'ave' style='border:0' value='".$row3['ave']."' readonly></p> 
                </td>
            </tr>
            </table>
        <table id='name' align='center'>
        <tr>
            <td valign='top' class='name'>
            <p class='car'>".$row['student_last']." ".$row['student_first']." ".$row['student_middle']." ".$row['student_suffix']."</p>
            <div id='button'>

                <button type='submit' class='btn btn-danger' id='insert' name='save'>Save</a>
                <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal'>Signature</button>

                <br>
                <br>
                <label for=''>Send to:</label>
                <br>
                <button type='submit' class='btn btn-primary' id='first' name='parent'>Parent</button>
                <button type='submit' class='btn btn-primary' id='first' name='student'>Student</button>
                <button type='submit' class='btn btn-primary' id='first' name='all'>All</button>
                <br>
                <label for=''>Send as:</label>
                <br>
                <input required type='radio' id= 'semester' class='btn btn-primary' id='first' name='radio' value='this'>This semester</input>
                <input required type='radio' id= 'all' class='btn btn-primary' id='first' name='radio' value='all'>All semester</input>
            </form>
            </div>
            </td>
        </tr>
        </table>";

        if ($row['ifsent']=="Sent") {
            if (($row['ifsent']=="Sent") && ($row1['sent']==1)) {
                echo"
                <table align='center'>
                    <tr>
                        <td class='name'>
                            <i class='bx bxs-badge-check foldah'></i>
                        </td>
                    </tr>
                </table>";
            }
            else {
                echo"
                <table align='center'>
                    <tr>
                        <td class='name'>
                            <i class='bx bxs-check-circle foldah'></i>
                        </td>
                    </tr>
                </table>";
            }
            
        }
        else if ($row1['sent']==1) {
            if (($row['ifsent']=="Sent") && ($row1['sent']==1)) {
                echo"
                <table align='center'>
                    <tr>
                        <td class='name'>
                            <i class='bx bxs-badge-check foldah'></i>
                        </td>
                    </tr>
                </table>";
            }
            else {
                echo"
                <table align='center'>
                    <tr>
                        <td class='name'>
                            <i class='bx bxs-check-square foldah'></i>
                        </td>
                    </tr>
                </table>";
            }
        }
            echo "</div>
            ";
                }
                else {
                    echo "<div class='".$item."' id='item'>
                    <form action='include/action.php?name=save&section=".$section."&sem=".$sem."' method='POST' class='myform'>
                    <label for='' class='text-dark'>To</label>
                    <div class='input-group'>
                        <input type='hidden' name='section' style='width: 50%;' class='form-control' value='".$section."'>
                        <input type='hidden' name='sem' style='width: 50%;' class='form-control' value='".$sem."'>
                        <input type='email' required id='some_id' autocomplete='new-password' class= 'to' name='emailparent' style='width: 50%;' class='form-control' value='".$row['parent_email']."'>
                        <input type='email' id='some_id' autocomplete='new-password' class= 'to' name='emailparent1' style='width: 50%;' class='form-control' value='".$row['parent_email1']."'>
                        <input type='email' id='some_id' autocomplete='new-password' class= 'to' name='emailparent2' style='width: 50%;' class='form-control' value='".$row['parent_email2']."'>
                        <input type='email' id='some_id' autocomplete='new-password' class= 'to' name='emailparent3' style='width: 50%;' class='form-control' value='".$row['parent_email3']."'>
                    </div>
                    <label for='' class='text-dark'>From</label>
                    <input type='text' disabled class='form-control' value='".$email."'>
                    <label for='' class='text-dark'>Message</label>
                    <input type='text' required name= 'mess' class='form-control' value='".$row['sent']."'>
                    
                    
                    <input type='hidden' name='emailp' placeholder='lrn' id='username' value='".$row['parent_email']."' />
                    <input type='hidden' name='s_first' placeholder='lrn' id='username' value='".$row['student_first']."' />
                    <input type='hidden' name='s_last' placeholder='lrn' id='username' value='".$row['student_last']."' />
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
                    <p><input readonly type='number' min='60' max='100' step='0.5' name='core1first' class='kd1 ave q' style='border:0' value='".$row1['first_c_1']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                </td>
                <td>
                    <p><input type='number' min='60' max='100' step='0.5' name='core1sec' class='kd2 ave q' style='border:0' value='".$row2['first_c_1']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                </td>
                <td align='center'>
                    <p><input type='number' min='60' max='100' step='0.5' name='core1ave' class='result1' style='border:0' value='".$row3['ave_c_1']."' readonly> </p>     
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
                    <p><input readonly type='number' min='60' max='100' step='0.5' name='core2first' class='kd1 ave q' style='border:0' value='".$row1['first_c_2']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                </td>
                <td>
                    <p><input type='number' min='60' max='100' step='0.5' name='core2sec' class='kd2 ave q' style='border:0' value='".$row2['first_c_2']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                </td>
                <td align='center'>
                    <p><input type='text' min='60' max='100' step='0.5' name='core2ave' size='5' class='result1' style='border:0' value='".$row3['ave_c_2']."' readonly></p> 
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
                    <p><input readonly type='number' min='60' max='100' step='0.5' name='core3first' class='kd1 ave q' style='border:0' value='".$row1['first_c_3']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                </td>
                <td>
                    <p><input type='number' min='60' max='100' step='0.5' name='core3sec' class='kd2 ave q' style='border:0' value='".$row2['first_c_3']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                </td>
                <td align='center'>
                    <p><input type='text' min='60' max='100' step='0.5' name='core3ave' size='5' class='result1' style='border:0' value='".$row3['ave_c_3']."' readonly></p> 
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
                    <p><input readonly type='number' min='60' max='100' step='0.5' name='app1first' class='kd1 ave q' style='border:0' value='".$row1['first_a_1']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                </td>
                <td>
                    <p><input type='number' min='60' max='100' step='0.5' name='app1sec' class='kd2 ave q' style='border:0' value='".$row2['first_a_1']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>

                </td>
                <td align='center'>
                    <p><input type='text' min='60' max='100' step='0.5' name='app1ave' size='5' class='result1' style='border:0' value='".$row3['ave_a_1']."' readonly></p> 
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
                    <p><input readonly type='number' min='60' max='100' step='0.5' name='app2first' class='kd1 ave q' id= 'clear' style='border:0' value='".$row1['first_a_2']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>

                </td>
                <td>
                    <p><input type='number' min='60' max='100' step='0.5' name='app2sec' class='kd2 ave q' id= 'clear' style='border:0'  value='".$row2['first_a_2']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>

                </td>
                <td align='center'>
                    <p><input type='text' min='60' max='100' step='0.5' name='app2ave' size='5' class='result1' style='border:0' value='".$row3['ave_a_2']."' readonly></p> 
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
                    <p><input readonly type='number' min='60' max='100' step='0.5' name='app3first' class='kd1 ave q' style='border:0' value='".$row1['first_a_3']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>

                </td>
                <td>
                    <p><input type='number' min='60' max='100' step='0.5' name='app3sec' class='kd2 ave q' style='border:0' value='".$row2['first_a_3']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>

                </td>
                <td align='center'>
                    <p><input type='text' min='60' max='100' step='0.5' name='app3ave' size='5' class='result1' style='border:0' value='".$row3['ave_a_3']."' readonly></p> 
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
                    <p><input readonly type='number' min='60' max='100' step='0.5' name='app4first' class='kd1 ave q' style='border:0' value='".$row1['first_a_4']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>

                </td>
                <td>
                    <p><input type='number' min='60' max='100' step='0.5' name='app4sec' class='kd2 ave q' style='border:0' value='".$row2['first_a_4']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>

                </td>
                <td align='center'>
                    <p><input type='text' min='60' max='100' step='0.5' name='app4ave' size='5' class='result1' style='border:0' value='".$row3['ave_a_4']."' readonly></p> 
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
                    <p><input readonly type='number' min='60' max='100' step='0.5' name='app5first' class='kd1 ave q' style='border:0' value='".$row1['first_a_5']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>

                </td>
                <td>
                    <p><input type='number' min='60' max='100' step='0.5' name='app5sec' class='kd2 ave q' style='border:0' value='".$row2['first_a_5']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>

                </td>
                <td align='center'>
                    <p><input type='text' min='60' max='100' step='0.5' name='app5ave' size='5' class='result1' style='border:0' value='".$row3['ave_a_5']."' readonly></p> 
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
                    <p><input type='text' min='60' max='100' step='0.5' size='5' class='ave1' name= 'ave1' style='border:0' value='".$row1['first_first_ave']."' readonly></p> 
                </td>
                <td>
                    <p><input type='text' min='60' max='100' step='0.5' size='5' class='ave2' name= 'ave2' style='border:0' value='".$row2['first_sec_ave']."' readonly></p>  
                </td>
                <td>
                    <p><input type='text' min='60' max='100' step='0.5' size='5' class='average' name= 'ave' style='border:0' value='".$row3['ave']."' readonly></p> 
                </td>
            </tr>
            </table>
        <table id='name' align='center'>
        <tr>
            <td valign='top' class='name'>
            <p class='car'>".$row['student_last']." ".$row['student_first']." ".$row['student_middle']." ".$row['student_suffix']."</p>
            <div id='button'>

                <button type='submit' class='btn btn-danger' id='insert' name='save'>Save</a>
                <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal'>Signature</button>

                <br>
                <br>
                <label for=''>Send to:</label>
                <br>
                <button type='submit' class='btn btn-primary' id='first' name='parent'>Parent</button>
                <button type='submit' class='btn btn-primary' id='first' name='student'>Student</button>
                <button type='submit' class='btn btn-primary' id='first' name='all'>All</button>
                <br>
                <label for=''>Send as:</label>
                <br>
                <input type='radio' id= 'semester' class='btn btn-primary' id='first' name='radio' value='first' required>First Grading</input>
                <input type='radio' id= 'all' class='btn btn-primary' id='first' name='radio' value='second' required>Second Grading</input>
            </form>
            </div>
            </td>
        </tr>
        </table>";
        if ($row['ifsent']=="Sent") {
            if (($row['ifsent']=="Sent") && ($row1['sent']==1)) {
                echo"
                <table align='center'>
                    <tr>
                        <td class='name'>
                            <i class='bx bxs-badge-check foldah'></i>
                        </td>
                    </tr>
                </table>";
            }
            else {
                echo"
                <table align='center'>
                    <tr>
                        <td class='name'>
                            <i class='bx bxs-check-circle foldah'></i>
                        </td>
                    </tr>
                </table>";
            }
            
        }
        else if ($row1['sent']==1) {
            if (($row['ifsent']=="Sent") && ($row1['sent']==1)) {
                echo"
                <table align='center'>
                    <tr>
                        <td class='name'>
                            <i class='bx bxs-badge-check foldah'></i>
                        </td>
                    </tr>
                </table>";
            }
            else {
                echo"
                <table align='center'>
                    <tr>
                        <td class='name'>
                            <i class='bx bxs-check-square foldah'></i>
                        </td>
                    </tr>
                </table>";
            }
        }

        echo"
            </div>
            ";
                }
            }
            else{
                echo "error";
            }

          }
        }
        ?>
        <div class='item' id='item'>
          <img src='../../pics/icon.png' alt='Shark Icon' class='shark'>
            <h1 class='h1-front'>Irregular Students</h1>
            <br>
            <hr class='url-hr'>
            <p class='front'>The slides after this is the Irregular Students</p>
            <br><br>
            <p class='front'>Please double check the grades</p>
            <br><br>
            <p class='front'>Thank you!</p>
            <br>
        </div>

        <?php
            
            while ($row4 = mysqli_fetch_assoc($result4)) {
                
            
            echo "<div class='item' id='item'>
                    <form action='include/action.php?name=save&section=".$section."&sem=".$sem."' method='POST' class='myform'>
                    <label for='' class='text-dark'>To</label>
                    <div class='input-group'>
                        <input type='hidden' name='section' style='width: 50%;' class='form-control' value='".$section."'>
                        <input type='hidden' name='sem' style='width: 50%;' class='form-control' value='".$sem."'>
                        <input type='email' required id='some_id' autocomplete='new-password' class= 'to' name='emailparent' style='width: 50%;' class='form-control' value='".$row4['parent_email']."'>
                        <input type='email' id='some_id' autocomplete='new-password' class= 'to' name='emailparent1' style='width: 50%;' class='form-control' value='".$row4['parent_email1']."'>
                        <input type='email' id='some_id' autocomplete='new-password' class= 'to' name='emailparent2' style='width: 50%;' class='form-control' value='".$row4['parent_email2']."'>
                        <input type='email' id='some_id' autocomplete='new-password' class= 'to' name='emailparent3' style='width: 50%;' class='form-control' value='".$row4['parent_email3']."'>
                    </div>
                    <label for='' class='text-dark'>From</label>
                    <input type='text' disabled class='form-control' value='".$email."'>
                    <label for='' class='text-dark'>Message</label>
                    <input type='text' required name= 'mess' class='form-control' value='".$row4['sent']."'>
                    
                    
                    <input type='hidden' name='emailp' placeholder='lrn' id='username' value='".$row4['parent_email']."' />
                    <input type='hidden' name='s_first' placeholder='lrn' id='username' value='".$row4['student_first']."' />
                    <input type='hidden' name='s_last' placeholder='lrn' id='username' value='".$row4['student_last']."' />
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
                            <p><input type='number' min='60' max='100' step='0.5' name='core1first' class='kd1 ave q' style='border:0' value='' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                        </td>
                        <td>
                            <p><input type='number' min='60' max='100' step='0.5' name='core1sec' class='kd2 ave q' style='border:0' value='' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                        </td>
                        <td align='center'>
                            <p><input type='number' min='60' max='100' step='0.5' name='core1ave' class='result1' style='border:0' value='' readonly> </p>     
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
                            <p><input type='number' min='60' max='100' step='0.5' name='core2first' class='kd1 ave q' style='border:0' value='' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                        </td>
                        <td>
                            <p><input type='number' min='60' max='100' step='0.5' name='core2sec' class='kd2 ave q' style='border:0' value='' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                        </td>
                        <td align='center'>
                            <p><input type='text' min='60' max='100' step='0.5' name='core2ave' size='5' class='result1' style='border:0' value='' readonly></p> 
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
                            <p><input type='number' min='60' max='100' step='0.5' name='core3first' class='kd1 ave q' style='border:0' value='' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                        </td>
                        <td>
                            <p><input type='number' min='60' max='100' step='0.5' name='core3sec' class='kd2 ave q' style='border:0' value='' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                        </td>
                        <td align='center'>
                            <p><input type='text' min='60' max='100' step='0.5' name='core3ave' size='5' class='result1' style='border:0' value='' readonly></p> 
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
                            <p><input type='number' min='60' max='100' step='0.5' name='app1first' class='kd1 ave q' style='border:0' value='' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
                        </td>
                        <td>
                            <p><input type='number' min='60' max='100' step='0.5' name='app1sec' class='kd2 ave q' style='border:0' value='' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>

                        </td>
                        <td align='center'>
                            <p><input type='text' min='60' max='100' step='0.5' name='app1ave' size='5' class='result1' style='border:0' value='' readonly></p> 
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
                            <p><input type='number' min='60' max='100' step='0.5' name='app2first' class='kd1 ave q' id= 'clear' style='border:0' value='' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>

                        </td>
                        <td>
                            <p><input type='number' min='60' max='100' step='0.5' name='app2sec' class='kd2 ave q' id= 'clear' style='border:0'  value='' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>

                        </td>
                        <td align='center'>
                            <p><input type='text' min='60' max='100' step='0.5' name='app2ave' size='5' class='result1' style='border:0' value='' readonly></p> 
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
                            <p><input type='number' min='60' max='100' step='0.5' name='app3first' class='kd1 ave q' style='border:0' value='' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>

                        </td>
                        <td>
                            <p><input type='number' min='60' max='100' step='0.5' name='app3sec' class='kd2 ave q' style='border:0' value='' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>

                        </td>
                        <td align='center'>
                            <p><input type='text' min='60' max='100' step='0.5' name='app3ave' size='5' class='result1' style='border:0' value='' readonly></p> 
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
                            <p><input type='number' min='60' max='100' step='0.5' name='app4first' class='kd1 ave q' style='border:0' value='' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>

                        </td>
                        <td>
                            <p><input type='number' min='60' max='100' step='0.5' name='app4sec' class='kd2 ave q' style='border:0' value='' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>

                        </td>
                        <td align='center'>
                            <p><input type='text' min='60' max='100' step='0.5' name='app4ave' size='5' class='result1' style='border:0' value='' readonly></p> 
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
                            <p><input type='number' min='60' max='100' step='0.5' name='app5first' class='kd1 ave q' style='border:0' value='' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>

                        </td>
                        <td>
                            <p><input type='number' min='60' max='100' step='0.5' name='app5sec' class='kd2 ave q' style='border:0' value='' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>

                        </td>
                        <td align='center'>
                            <p><input type='text' min='60' max='100' step='0.5' name='app5ave' size='5' class='result1' style='border:0' value='' readonly></p> 
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
                            <p><input type='text' min='60' max='100' step='0.5' size='5' class='ave1' name= 'ave1' style='border:0' value='' readonly></p> 
                        </td>
                        <td>
                            <p><input type='text' min='60' max='100' step='0.5' size='5' class='ave2' name= 'ave2' style='border:0' value='' readonly></p>  
                        </td>
                        <td>
                            <p><input type='text' min='60' max='100' step='0.5' size='5' class='average' name= 'ave' style='border:0' value='' readonly></p> 
                        </td>
                    </tr>
                    </table>
                <table id='name' align='center'>
                <tr>
                    <td valign='top' class='name'>
                    <p class='car'>".$row4['student_last']." ".$row4['student_first']." ".$row4['student_middle']." ".$row4['student_suffix']."</p>
                    <div id='button'>

                        <button type='submit' class='btn btn-danger' id='insert' name='save'>Save</a>
                        <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal'>Signature</button>

                        <br>
                        <br>
                        <label for=''>Send to:</label>
                        <br>
                        <button type='submit' class='btn btn-primary' id='first' name='parent'>Parent</button>
                        <button type='submit' class='btn btn-primary' id='first' name='student'>Student</button>
                        <button type='submit' class='btn btn-primary' id='first' name='all'>All</button>
                        <br>
                        <label for=''>Send as:</label>
                        <br>
                        <input type='radio' id= 'semester' class='btn btn-primary' id='first' name='radio' value='first' required>First Grading</input>
                        <input type='radio' id= 'all' class='btn btn-primary' id='first' name='radio' value='second' required>Second Grading</input>
                    </form>
                    </div>
                    </td>
                </tr>
                </table>";

                if ($row['ifsent']=="Sent") {
                    if (($row['ifsent']=="Sent") && ($row1['sent']==1)) {
                        echo"
                        <table align='center'>
                            <tr>
                                <td class='name'>
                                    <i class='bx bxs-badge-check foldah'></i>
                                </td>
                            </tr>
                        </table>";
                    }
                    else {
                        echo"
                        <table align='center'>
                            <tr>
                                <td class='name'>
                                    <i class='bx bxs-check-circle foldah'></i>
                                </td>
                            </tr>
                        </table>";
                    }
                    
                }
                else if ($row1['sent']==1) {
                    if (($row['ifsent']=="Sent") && ($row1['sent']==1)) {
                        echo"
                        <table align='center'>
                            <tr>
                                <td class='name'>
                                    <i class='bx bxs-badge-check foldah'></i>
                                </td>
                            </tr>
                        </table>";
                    }
                    else {
                        echo"
                        <table align='center'>
                            <tr>
                                <td class='name'>
                                    <i class='bx bxs-check-square foldah'></i>
                                </td>
                            </tr>
                        </table>";
                    }
                }
            echo"</div>";
            }
            ?>
          <div class='item' id='item'>
          <img src='../../pics/icon.png' alt='Shark Icon' class='shark'>
            <h1 class='h1-front'>Congratulations!</h1>
            <br>
            <hr class='url-hr'>
            <p class='front'>You have reached the end</p>
            <br><br>
            <p class='front'>Review all the grades by clicking the next button</p>
            <br><br>
            <p class='front'>Thank you!</p>
            <br>
        </div>
    </div>



    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
<div>
</div>
<form action="../verti-header.php?name=input" method="POST">
    <button type='submit' class='btn btn-danger' aria-label='close'><span aria-hidden="true">&times;</span></button>
</form>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>
<script>
    $(document).ready(function() {
        $(document).on("input", ".kd1", function() {
            $('table').each(function() {
            // variables for holding total and count
            var total = 0,
                count = 0;
            var ave = 0,
                count = 0;

            // get all input fields and iterate over them
            $('.kd1', this).each(function() {
                // check the value is non-empty
                if (this.value.trim() != '') {
                // increment count for calculating average
                count++;
                // update total based on input value
                // treat input value as 0 if number parsing produces NaN
                total += (Number(this.value.trim()) || 0);
                    
                }
            });

            // calculate and update the average although treat as zero if NaN
            
            total = Math.ceil(total/count);
            $('.ave1', this).val(total);
            
            
            });
        });

});


$(document).ready(function() {
        $(document).on("input", ".kd2", function() {
            $('table').each(function() {
            // variables for holding total and count
            var total = 0,
                count = 0;
            var ave = 0,
                count = 0;

            // get all input fields and iterate over them
            $('.kd2', this).each(function() {
                // check the value is non-empty
                if (this.value.trim() != '') {
                // increment count for calculating average
                count++;
                // update total based on input value
                // treat input value as 0 if number parsing produces NaN
                total += (Number(this.value.trim()) || 0);
                    
                }
            });

            // calculate and update the average although treat as zero if NaN
            
            total = Math.ceil(total/count);
            $('.ave2', this).val(total);
            
            
            });
        });

});


$(document).ready(function() {
        $(document).on("input", ".ave", function() {
            $('table').each(function() {
            // variables for holding total and count
            var total = 0,
                count = 0;
            var ave = 0,
                count = 0;

            // get all input fields and iterate over them
            $('.ave', this).each(function() {
                // check the value is non-empty
                if (this.value.trim() != '') {
                // increment count for calculating average
                count++;
                // update total based on input value
                // treat input value as 0 if number parsing produces NaN
                total += (Number(this.value.trim()) || 0);
                    
                }
            });

            // calculate and update the average although treat as zero if NaN
            
            total = Math.ceil(total/count);
            $('.average', this).val(total);
            
            
            });
        });

});


$(document).ready(function() {
        $(document).on("input", ".q", function() {
            $('table tr').each(function() {
            // variables for holding total and count
            var total = 0,
                count = 0;
            var ave = 0,
                count = 0;

            // get all input fields and iterate over them
            $('.q', this).each(function() {
                // check the value is non-empty
                if (this.value.trim() != '') {
                // increment count for calculating average
                count++;
                // update total based on input value
                // treat input value as 0 if number parsing produces NaN
                total += (Number(this.value.trim()) || 0);
                    
                }
            });

            // calculate and update the average although treat as zero if NaN
            
            total = Math.ceil(total/count);
            $('.result1', this).val(total);
            
            
            });
        });

});


    
$(document).ready(() => {
        var canvasDiv = document.getElementById('canvasDiv');
        var canvas = document.createElement('canvas');
        canvas.setAttribute('id', 'canvas');
        canvasDiv.appendChild(canvas);
        $("#canvas").attr('height', $("#canvasDiv").outerHeight());
        $("#canvas").attr('width', $("#canvasDiv").width());
        if (typeof G_vmlCanvasManager != 'undefined') {
            canvas = G_vmlCanvasManager.initElement(canvas);
        }
        
        context = canvas.getContext("2d");
        $('#canvas').mousedown(function(e) {
            var offset = $(this).offset()
            var mouseX = e.pageX - this.offsetLeft;
            var mouseY = e.pageY - this.offsetTop;

            paint = true;
            addClick(e.pageX - offset.left, e.pageY - offset.top);
            redraw();
        });

        $('#canvas').mousemove(function(e) {
            if (paint) {
                var offset = $(this).offset()
                //addClick(e.pageX - this.offsetLeft, e.pageY - this.offsetTop, true);
                addClick(e.pageX - offset.left, e.pageY - offset.top, true);
                console.log(e.pageX, offset.left, e.pageY, offset.top);
                redraw();
            }
        });

        $('#canvas').mouseup(function(e) {
            paint = false;
        });

        $('#canvas').mouseleave(function(e) {
            paint = false;
        });

        var clickX = new Array();
        var clickY = new Array();
        var clickDrag = new Array();
        var paint;

        function addClick(x, y, dragging) {
            clickX.push(x);
            clickY.push(y);
            clickDrag.push(dragging);
        }

        $("#reset-btn").click(function() {
            context.clearRect(0, 0, window.innerWidth, window.innerWidth);
            clickX = [];
            clickY = [];
            clickDrag = [];
        });

        $(document).on('click', '#btn-save', function() {
            var mycanvas = document.getElementById('canvas');
            var img = mycanvas.toDataURL("image/png");
            anchor = $("#signature");
            anchor.val(img);
            $("#signatureform").submit();
        });

        var drawing = false;
        var mousePos = {
            x: 0,
            y: 0
        };
        var lastPos = mousePos;

        canvas.addEventListener("touchstart", function(e) {
            mousePos = getTouchPos(canvas, e);
            var touch = e.touches[0];
            var mouseEvent = new MouseEvent("mousedown", {
                clientX: touch.clientX,
                clientY: touch.clientY
            });
            canvas.dispatchEvent(mouseEvent);
        }, false);


        canvas.addEventListener("touchend", function(e) {
            var mouseEvent = new MouseEvent("mouseup", {});
            canvas.dispatchEvent(mouseEvent);
        }, false);


        canvas.addEventListener("touchmove", function(e) {

            var touch = e.touches[0];
            var offset = $('#canvas').offset();
            var mouseEvent = new MouseEvent("mousemove", {
                clientX: touch.clientX,
                clientY: touch.clientY
            });
            canvas.dispatchEvent(mouseEvent);
        }, false);



        // Get the position of a touch relative to the canvas
        function getTouchPos(canvasDiv, touchEvent) {
            var rect = canvasDiv.getBoundingClientRect();
            return {
                x: touchEvent.touches[0].clientX - rect.left,
                y: touchEvent.touches[0].clientY - rect.top
            };
        }


        var elem = document.getElementById("canvas");

        var defaultPrevent = function(e) {
            e.preventDefault();
        }
        elem.addEventListener("touchstart", defaultPrevent);
        elem.addEventListener("touchmove", defaultPrevent);


        function redraw() {
            //
            lastPos = mousePos;
            for (var i = 0; i < clickX.length; i++) {
                context.beginPath();
                if (clickDrag[i] && i) {
                    context.moveTo(clickX[i - 1], clickY[i - 1]);
                } else {
                    context.moveTo(clickX[i] - 1, clickY[i]);
                }
                context.lineTo(clickX[i], clickY[i]);
                context.closePath();
                context.stroke();
            }
        }
    })

    $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
});


$(function(){
    $('#myForm').on('submit', function(e){
      e.preventDefault();
      $.post('http://www.somewhere.com/path/to/post', 
         $('#myForm').serialize(), 
         function(data, status, xhr){
           // do something here with response;
         });
    });
});



$('#myform').submit(function(){
 return false;
});
 
$('#insert').click(function(){
 $.post( 
 $('#myform').attr('action'),
 $('#myform :input').serializeArray(),
 function(result){
 $('#result').html(result);
 }
 );
});


$('.glyphicon').on('click', function() {
    $('#carousel').carousel($(this).index());
});



$('#myCarousel').on('slid.bs.carousel', function () {
    var currentSlide = $('#myCarousel div.active').index();
    sessionStorage.setItem('lastSlide', currentSlide);
});

if(sessionStorage.lastSlide){
      $("#myCarousel").carousel(sessionStorage.lastSlide*1);
}

var i = 2; //index of the panel    
$('#link').on('click', function() {
    $('#carousel').carousel(i);
});

$(document).ready(function() {
    var some_id = $('#some_id');
    some_id.prop('type', 'text');
    some_id.removeAttr('autocomplete');
});

$( document ).ready(function() {
$('input').change(function() {
var n = $('input').val();
if (n < 100)
    $('input').val(101);
if (n > 60)
    $('input').val(60);
});
    });
</script>
<?php
if (isset($_GET["error"])) {
    if ($_GET["error"] =="none") {
        echo "<script>alert('Done!')</script>";
      }
    else if ($_GET["error"] =="stmtfailed") {
        echo "<script>alert('Something went wrong!')</script>";
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
    else if ($_GET["error"] =="studentparent") {
        echo "<script>alert('Parent email is equal to student email!')</script>";
    }
    else if ($_GET["error"] =="signature") {
        echo "<script>alert('Please input a signature first before proceeding!')</script>";
    }
}
?>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Signature
        <button type="button" style= 'float: right;' class="btn btn-danger" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </h5>
      </div>
      <div class="modal-body">
      <div class="container-modal" style= 'float: top;'>
        <div class="row-modal">
            <div class="col-md-8 col-md-offset-2">
                <br>
                <?php echo isset($msg)?$msg:''; ?>
                <h2 class='digitized'>Digitized Signature</h2>
                <?php
                $teacher = $_SESSION['userfirst'].$_SESSION['userlast'];
                $type = '.png?';
                $rand= mt_rand();
                $file = $teacher . $type . $rand;
                echo '
                <table id="modal-modal">
                    <tr class="modal-modal">
                        <td class="modal-td"><div id="canvasDiv"></div></td>
                        <td class="modal-td">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td class="modal-td"><div class= "prev"><img src="signatures/'.$file.'" alt="signature"></div></td>
                    </tr>
                    <tr class="modal-modal">
                        <td class="modal-td"><p>New</p></td>
                        <td class="modal-td">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td class="modal-td"><p>Old</p></td>
                    </tr>
                </table>';
                ?>
                <br>
            </div>
            <form id="signatureform" action="" style="display:none" method="post">
                <input type="hidden" id="signature" name="signature">
                <input type="hidden" name="signaturesubmit" value="1">
            </form>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h3 class='digitized'>Upload file</h3>
                <hr>
                <form action="upload.php" method='POST' enctype='multipart/form-data'>
                <input type="file" name='file'><button type='submit' name='submit'>Submit</button>
                </form>
                <br>
            </div>
            <form id="myForm" action="" style="display:none" method="post">
                <input type="hidden" id="signature" name="signature">
                <input type="hidden" name="signaturesubmit" value="1">
            </form>
        </div>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" id="reset-btn">Clear</button>
        <button type="button" class="btn btn-success" id="btn-save">Save</button>
      </div>
    </div>
  </div>
</div>


</html>

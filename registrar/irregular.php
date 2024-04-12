<?php
    include_once '../include/dbh.inc.php';
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
.ignore-bin{
    display: inline-block;
    width: 300px;
    margin: auto;
    text-align: center;
}
.ignore-binn{
    display: inline-block;
    margin: auto;
}
.ignore-binn:hover{
    background-color: #d4d4d4;
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

.foldah{
    font-size: 100px;
    text-decoration: none;
    background: -webkit-linear-gradient(gray, grey);
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
.label{
    color: #333333;
    text-align: center;
}
.label:hover{
    text-decoration: none;
}
.fade{
    width: 100%;
}


.folder:hover{
    background: -webkit-linear-gradient(#1c4966, #296d98);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}
.hover{
    display: inline-block;
    text-align: center;

}

.hover:hover{
    text-decoration: none;
}
.label{
  text-align: center;
}
.center{
  display: flex;
  justify-content: center;
  align-items: center;
}


.bxs-plus-circle{
    font-size: 100px;
    float: right;
    text-decoration: none;
    background: -webkit-linear-gradient(red, yellow);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-size: 200% 100%;
    background-position: 100%;
    transition: background-position 275ms ease;
}
.bxs-plus-circle:hover{
    background: -webkit-linear-gradient(#1c4966, #296d98);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.modal-lg {
    max-width: 80% !important;
}
</style>
<body>
   <?php
        $sql="SELECT * from ".$section."_student_irregular";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "stmt failed";
            echo $section;
            exit();
        }
        $result= mysqli_query($conn, $sql);
        $queryResults = mysqli_num_rows($result);
        if ($queryResults==0) {
            echo "There are no items in the bin";
        }
        else{
          $i=0;
            while ($row = mysqli_fetch_assoc($result)) {
              $i++;
              if ($row['first_c1']==0) {
                echo '<div class="ignore-binn">
                <a href="verti-header.php?name=ignore" class="nav__link ignore-bin" id="nav_all" data-toggle="modal" data-target="#myModal'.$i.'">
                    <div class="box">
                <i class="bx bxs-user foldah"></i>
                    <br>
                    <span class="nav__name label">'.$row['student_last'].' '.$row['student_first'].'</span>
                    <br>
                    </div>
                </a>
                <form action="include/irregular.inc.php?section='.$section.'&gender='.$row['student_gender'].'&first='.$row['student_first'].'&last='.$row['student_last'].'" method="POST">
                    <input type="hidden" name="id" value="'.$row['id'].'">
                    <div class="center">
                    <button name="retrieve-regular" class="btn btn-success my-2">Regular</button>
                    <button name="delete" class="btn btn-danger my-2">Delete</button>
                    </div>
                    </form>
                    </div>
                ';
              }
              else{
                echo '<div class="ignore-binn">
                <a href="verti-header.php?name=ignore" class="nav__link ignore-bin" id="nav_all" data-toggle="modal" data-target="#myModal'.$i.'">
                    <div class="box">
                <i class="bx bxs-user folder"></i>
                    <br>
                    <span class="nav__name label">'.$row['student_last'].' '.$row['student_first'].'</span>
                    <br>
                    </div>
                </a>
                <form action="include/irregular.inc.php?section='.$section.'&gender='.$row['student_gender'].'&first='.$row['student_first'].'&last='.$row['student_last'].'" method="POST">
                    <input type="hidden" name="id" value="'.$row['id'].'">
                    <div class="center">
                    <button name="retrieve-regular" class="btn btn-success my-2">Regular</button>
                    <button name="delete" class="btn btn-danger my-2">Delete</button>
                    </div>
                    </form>
                    </div>
                ';
              }
                


                ?>
                    <div class="modal fade" id="myyModal<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            Are you sure you want to delete this user? This will permanently delete the data of the user.
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary list" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary list">Delete</button>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="modal fade" id="myModal<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Subjects</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                          <form action='include/subject.inc.php' method="POST">
                            <table class='center'>
                                <td valign='top'>
                                <table class='subject'>
                                <tr>
                                <td><h2>First Semester</h2></td>
                                </tr>
                                <tr style='text-align: left'>
                                    <td colspan='5'>
                                        <b><p>Core Subjects</p></b>
                                    </td>
                                </tr>
                            
                                <tr>
                                    <td>
                                        <select name='first_c1' id=''>
                                            <option value='' disabled selected>Subject</option>
                                            <option>Oral Communication</option>
                                            <option>Read and Writing</option>
                                            <option>Komunikasyon at Pananaliksik sa Wika at Kulturang Pilipino</option>
                                            <option>Pagbasa at Pagsuri ng Iba't Ibang Teksto sa Pananaliksik</option>
                                            <option>21st Century Literature from the Philippines and the World</option>
                                            <option>Contemporary Philippine Arts from the Region</option>
                                            <option>Media and Information Literacy</option>
                                            <option>General Mathematics</option>
                                            <option>Statistics and Probability</option>
                                            <option>Earth and Life Science</option>
                                            <option>Physical Science</option>
                                            <option>Personality Development</option>
                                            <option>Understanding Culture, Society and Politics</option>
                                            <option>Introduction to the Philosophy of the Human Person</option>
                                            <option>Physical Education and Health 1</option>
                                            <option>Physical Education and Health 2</option>
                                            <option>Physical Education and Health 3</option>
                                            <option>Physical Education and Health 4</option>
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <select name='first_c2' id=''>
                                            <option value='' disabled selected>Subject</option>
                                            <option>Oral Communication</option>
                                            <option>Read and Writing</option>
                                            <option>Komunikasyon at Pananaliksik sa Wika at Kulturang Pilipino</option>
                                            <option>Pagbasa at Pagsuri ng Iba't Ibang Teksto sa Pananaliksik</option>
                                            <option>21st Century Literature from the Philippines and the World</option>
                                            <option>Contemporary Philippine Arts from the Region</option>
                                            <option>Media and Information Literacy</option>
                                            <option>General Mathematics</option>
                                            <option>Statistics and Probability</option>
                                            <option>Earth and Life Science</option>
                                            <option>Physical Science</option>
                                            <option>Personality Development</option>
                                            <option>Understanding Culture, Society and Politics</option>
                                            <option>Introduction to the Philosophy of the Human Person</option>
                                            <option>Physical Education and Health 1</option>
                                            <option>Physical Education and Health 2</option>
                                            <option>Physical Education and Health 3</option>
                                            <option>Physical Education and Health 4</option>
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <select name='first_c3' id=''>
                                            <option value='' disabled selected>Subject</option>
                                            <option>Oral Communication</option>
                                            <option>Read and Writing</option>
                                            <option>Komunikasyon at Pananaliksik sa Wika at Kulturang Pilipino</option>
                                            <option>Pagbasa at Pagsuri ng Iba't Ibang Teksto sa Pananaliksik</option>
                                            <option>21st Century Literature from the Philippines and the World</option>
                                            <option>Contemporary Philippine Arts from the Region</option>
                                            <option>Media and Information Literacy</option>
                                            <option>General Mathematics</option>
                                            <option>Statistics and Probability</option>
                                            <option>Earth and Life Science</option>
                                            <option>Physical Science</option>
                                            <option>Personality Development</option>
                                            <option>Understanding Culture, Society and Politics</option>
                                            <option>Introduction to the Philosophy of the Human Person</option>
                                            <option>Physical Education and Health 1</option>
                                            <option>Physical Education and Health 2</option>
                                            <option>Physical Education and Health 3</option>
                                            <option>Physical Education and Health 4</option>
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <select name='first_c4' id=''>
                                            <option value='' disabled selected>Subject</option>
                                            <option>None</option>
                                            <option>Oral Communication</option>
                                            <option>Read and Writing</option>
                                            <option>Komunikasyon at Pananaliksik sa Wika at Kulturang Pilipino</option>
                                            <option>Pagbasa at Pagsuri ng Iba't Ibang Teksto sa Pananaliksik</option>
                                            <option>21st Century Literature from the Philippines and the World</option>
                                            <option>Contemporary Philippine Arts from the Region</option>
                                            <option>Media and Information Literacy</option>
                                            <option>General Mathematics</option>
                                            <option>Statistics and Probability</option>
                                            <option>Earth and Life Science</option>
                                            <option>Physical Science</option>
                                            <option>Personality Development</option>
                                            <option>Understanding Culture, Society and Politics</option>
                                            <option>Introduction to the Philosophy of the Human Person</option>
                                            <option>Physical Education and Health 1</option>
                                            <option>Physical Education and Health 2</option>
                                            <option>Physical Education and Health 3</option>
                                            <option>Physical Education and Health 4</option>
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <select name='first_c5' id=''>
                                            <option value='' disabled selected>Subject</option>
                                            <option>None</option>
                                            <option>Oral Communication</option>
                                            <option>Read and Writing</option>
                                            <option>Komunikasyon at Pananaliksik sa Wika at Kulturang Pilipino</option>
                                            <option>Pagbasa at Pagsuri ng Iba't Ibang Teksto sa Pananaliksik</option>
                                            <option>21st Century Literature from the Philippines and the World</option>
                                            <option>Contemporary Philippine Arts from the Region</option>
                                            <option>Media and Information Literacy</option>
                                            <option>General Mathematics</option>
                                            <option>Statistics and Probability</option>
                                            <option>Earth and Life Science</option>
                                            <option>Physical Science</option>
                                            <option>Personality Development</option>
                                            <option>Understanding Culture, Society and Politics</option>
                                            <option>Introduction to the Philosophy of the Human Person</option>
                                            <option>Physical Education and Health 1</option>
                                            <option>Physical Education and Health 2</option>
                                            <option>Physical Education and Health 3</option>
                                            <option>Physical Education and Health 4</option>
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <select name='first_c6' id=''>
                                            <option value='' disabled selected>Subject</option>
                                            <option>None</option>
                                            <option>Oral Communication</option>
                                            <option>Read and Writing</option>
                                            <option>Komunikasyon at Pananaliksik sa Wika at Kulturang Pilipino</option>
                                            <option>Pagbasa at Pagsuri ng Iba't Ibang Teksto sa Pananaliksik</option>
                                            <option>21st Century Literature from the Philippines and the World</option>
                                            <option>Contemporary Philippine Arts from the Region</option>
                                            <option>Media and Information Literacy</option>
                                            <option>General Mathematics</option>
                                            <option>Statistics and Probability</option>
                                            <option>Earth and Life Science</option>
                                            <option>Physical Science</option>
                                            <option>Personality Development</option>
                                            <option>Understanding Culture, Society and Politics</option>
                                            <option>Introduction to the Philosophy of the Human Person</option>
                                            <option>Physical Education and Health 1</option>
                                            <option>Physical Education and Health 2</option>
                                            <option>Physical Education and Health 3</option>
                                            <option>Physical Education and Health 4</option>
                                        </select>
                                    </td>
                                </tr>
                                
                                </table>

                                </td>
                                <td valign='top'>
                                <table class='subject'>
                                <tr>
                                <td><h2>_</h2></td>
                                </tr>
                                <tr style='text-align: left'>
                                    <td colspan='5'>
                                        <b><p>Applied and Specialized Subjects</p></b>
                                    </td>
                                </tr>
                            
                                <tr>
                                    <td>
                                        <select name='first_a1' id=''>
                                            <option value='' disabled selected>Subject</option>
                                            <option>Empowerment Technologies for ICT</option>
                                            <option>Computer Programming 1A (JAVA)</option>
                                            <option>Computer Programming 1B (DSA)</option>
                                            <option>Robotics 111</option>
                                            <option>English for Academic and Professional Purposes</option>
                                            <option>Practical Research 1</option>
                                            <option>Object-Oriented Programming</option>
                                            <option>Relational Database Management System</option>
                                            <option>Robotics 112</option>
                                            <option>Practical Research 2</option>
                                            <option>Pagsulat sa Filipino sa Larangan ng TVL</option>
                                            <option>Entrepreneurship</option>
                                            <option>Computer Programming 2A (SAUD)</option>
                                            <option>Computer Programming 2B (EEDP.Net)</option>
                                            <option>Research Project</option>
                                            <option>Computer Programming 2A (WP)</option>
                                            <option>Computer Programming 2B (CSS)</option>
                                            <option>Work Immersion/Career Advocacy/Culminating Activity</option>
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <select name='first_a2' id=''>
                                            <option value='' disabled selected>Subject</option>
                                            <option>Empowerment Technologies for ICT</option>
                                            <option>Computer Programming 1A (JAVA)</option>
                                            <option>Computer Programming 1B (DSA)</option>
                                            <option>Robotics 111</option>
                                            <option>English for Academic and Professional Purposes</option>
                                            <option>Practical Research 1</option>
                                            <option>Object-Oriented Programming</option>
                                            <option>Relational Database Management System</option>
                                            <option>Robotics 112</option>
                                            <option>Practical Research 2</option>
                                            <option>Pagsulat sa Filipino sa Larangan ng TVL</option>
                                            <option>Entrepreneurship</option>
                                            <option>Computer Programming 2A (SAUD)</option>
                                            <option>Computer Programming 2B (EEDP.Net)</option>
                                            <option>Research Project</option>
                                            <option>Computer Programming 2A (WP)</option>
                                            <option>Computer Programming 2B (CSS)</option>
                                            <option>Work Immersion/Career Advocacy/Culminating Activity</option>
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <select name='first_a3' id=''>
                                            <option value='' disabled selected>Subject</option>
                                            <option>Empowerment Technologies for ICT</option>
                                            <option>Computer Programming 1A (JAVA)</option>
                                            <option>Computer Programming 1B (DSA)</option>
                                            <option>Robotics 111</option>
                                            <option>English for Academic and Professional Purposes</option>
                                            <option>Practical Research 1</option>
                                            <option>Object-Oriented Programming</option>
                                            <option>Relational Database Management System</option>
                                            <option>Robotics 112</option>
                                            <option>Practical Research 2</option>
                                            <option>Pagsulat sa Filipino sa Larangan ng TVL</option>
                                            <option>Entrepreneurship</option>
                                            <option>Computer Programming 2A (SAUD)</option>
                                            <option>Computer Programming 2B (EEDP.Net)</option>
                                            <option>Research Project</option>
                                            <option>Computer Programming 2A (WP)</option>
                                            <option>Computer Programming 2B (CSS)</option>
                                            <option>Work Immersion/Career Advocacy/Culminating Activity</option>
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <select name='first_a4' id=''>
                                            <option value='' disabled selected>Subject</option>
                                            <option>Empowerment Technologies for ICT</option>
                                            <option>Computer Programming 1A (JAVA)</option>
                                            <option>Computer Programming 1B (DSA)</option>
                                            <option>Robotics 111</option>
                                            <option>English for Academic and Professional Purposes</option>
                                            <option>Practical Research 1</option>
                                            <option>Object-Oriented Programming</option>
                                            <option>Relational Database Management System</option>
                                            <option>Robotics 112</option>
                                            <option>Practical Research 2</option>
                                            <option>Pagsulat sa Filipino sa Larangan ng TVL</option>
                                            <option>Entrepreneurship</option>
                                            <option>Computer Programming 2A (SAUD)</option>
                                            <option>Computer Programming 2B (EEDP.Net)</option>
                                            <option>Research Project</option>
                                            <option>Computer Programming 2A (WP)</option>
                                            <option>Computer Programming 2B (CSS)</option>
                                            <option>Work Immersion/Career Advocacy/Culminating Activity</option>
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <select name='first_a5' id=''>
                                            <option value='' disabled selected>Subject</option>
                                            <option>Empowerment Technologies for ICT</option>
                                            <option>Computer Programming 1A (JAVA)</option>
                                            <option>Computer Programming 1B (DSA)</option>
                                            <option>Robotics 111</option>
                                            <option>English for Academic and Professional Purposes</option>
                                            <option>Practical Research 1</option>
                                            <option>Object-Oriented Programming</option>
                                            <option>Relational Database Management System</option>
                                            <option>Robotics 112</option>
                                            <option>Practical Research 2</option>
                                            <option>Pagsulat sa Filipino sa Larangan ng TVL</option>
                                            <option>Entrepreneurship</option>
                                            <option>Computer Programming 2A (SAUD)</option>
                                            <option>Computer Programming 2B (EEDP.Net)</option>
                                            <option>Research Project</option>
                                            <option>Computer Programming 2A (WP)</option>
                                            <option>Computer Programming 2B (CSS)</option>
                                            <option>Work Immersion/Career Advocacy/Culminating Activity</option>
                                        </select>
                                    </td>
                                </tr>
                                
                                </table>
                                </td>
                            </table>

                            <table class='center'>
                                <td valign='top'>
                                <table class='subject'>
                                <tr>
                                <td><h2>Second Semester</h2></td>
                                </tr>
                                <tr style='text-align: left'>
                                    <td colspan='5'>
                                        <b><p>Core Subjects</p></b>
                                    </td>
                                </tr>
                            
                                <tr>
                                    <td>
                                        <select name='sec_c1' id=''>
                                            <option value='' disabled selected>Subject</option>
                                            <option>Oral Communication</option>
                                            <option>Read and Writing</option>
                                            <option>Komunikasyon at Pananaliksik sa Wika at Kulturang Pilipino</option>
                                            <option>Pagbasa at Pagsuri ng Iba't Ibang Teksto sa Pananaliksik</option>
                                            <option>21st Century Literature from the Philippines and the World</option>
                                            <option>Contemporary Philippine Arts from the Region</option>
                                            <option>Media and Information Literacy</option>
                                            <option>General Mathematics</option>
                                            <option>Statistics and Probability</option>
                                            <option>Earth and Life Science</option>
                                            <option>Physical Science</option>
                                            <option>Personality Development</option>
                                            <option>Understanding Culture, Society and Politics</option>
                                            <option>Introduction to the Philosophy of the Human Person</option>
                                            <option>Physical Education and Health 1</option>
                                            <option>Physical Education and Health 2</option>
                                            <option>Physical Education and Health 3</option>
                                            <option>Physical Education and Health 4</option>
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <select name='sec_c2' id=''>
                                            <option value='' disabled selected>Subject</option>
                                            <option>Oral Communication</option>
                                            <option>Read and Writing</option>
                                            <option>Komunikasyon at Pananaliksik sa Wika at Kulturang Pilipino</option>
                                            <option>Pagbasa at Pagsuri ng Iba't Ibang Teksto sa Pananaliksik</option>
                                            <option>21st Century Literature from the Philippines and the World</option>
                                            <option>Contemporary Philippine Arts from the Region</option>
                                            <option>Media and Information Literacy</option>
                                            <option>General Mathematics</option>
                                            <option>Statistics and Probability</option>
                                            <option>Earth and Life Science</option>
                                            <option>Physical Science</option>
                                            <option>Personality Development</option>
                                            <option>Understanding Culture, Society and Politics</option>
                                            <option>Introduction to the Philosophy of the Human Person</option>
                                            <option>Physical Education and Health 1</option>
                                            <option>Physical Education and Health 2</option>
                                            <option>Physical Education and Health 3</option>
                                            <option>Physical Education and Health 4</option>
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <select name='sec_c3' id=''>
                                            <option value='' disabled selected>Subject</option>
                                            <option>Oral Communication</option>
                                            <option>Read and Writing</option>
                                            <option>Komunikasyon at Pananaliksik sa Wika at Kulturang Pilipino</option>
                                            <option>Pagbasa at Pagsuri ng Iba't Ibang Teksto sa Pananaliksik</option>
                                            <option>21st Century Literature from the Philippines and the World</option>
                                            <option>Contemporary Philippine Arts from the Region</option>
                                            <option>Media and Information Literacy</option>
                                            <option>General Mathematics</option>
                                            <option>Statistics and Probability</option>
                                            <option>Earth and Life Science</option>
                                            <option>Physical Science</option>
                                            <option>Personality Development</option>
                                            <option>Understanding Culture, Society and Politics</option>
                                            <option>Introduction to the Philosophy of the Human Person</option>
                                            <option>Physical Education and Health 1</option>
                                            <option>Physical Education and Health 2</option>
                                            <option>Physical Education and Health 3</option>
                                            <option>Physical Education and Health 4</option>
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <select name='sec_c4' id=''>
                                            <option value='' disabled selected>Subject</option>
                                            <option>None</option>
                                            <option>Oral Communication</option>
                                            <option>Read and Writing</option>
                                            <option>Komunikasyon at Pananaliksik sa Wika at Kulturang Pilipino</option>
                                            <option>Pagbasa at Pagsuri ng Iba't Ibang Teksto sa Pananaliksik</option>
                                            <option>21st Century Literature from the Philippines and the World</option>
                                            <option>Contemporary Philippine Arts from the Region</option>
                                            <option>Media and Information Literacy</option>
                                            <option>General Mathematics</option>
                                            <option>Statistics and Probability</option>
                                            <option>Earth and Life Science</option>
                                            <option>Physical Science</option>
                                            <option>Personality Development</option>
                                            <option>Understanding Culture, Society and Politics</option>
                                            <option>Introduction to the Philosophy of the Human Person</option>
                                            <option>Physical Education and Health 1</option>
                                            <option>Physical Education and Health 2</option>
                                            <option>Physical Education and Health 3</option>
                                            <option>Physical Education and Health 4</option>
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <select name='sec_c5' id=''>
                                            <option value='' disabled selected>Subject</option>
                                            <option>None</option>
                                            <option>Oral Communication</option>
                                            <option>Read and Writing</option>
                                            <option>Komunikasyon at Pananaliksik sa Wika at Kulturang Pilipino</option>
                                            <option>Pagbasa at Pagsuri ng Iba't Ibang Teksto sa Pananaliksik</option>
                                            <option>21st Century Literature from the Philippines and the World</option>
                                            <option>Contemporary Philippine Arts from the Region</option>
                                            <option>Media and Information Literacy</option>
                                            <option>General Mathematics</option>
                                            <option>Statistics and Probability</option>
                                            <option>Earth and Life Science</option>
                                            <option>Physical Science</option>
                                            <option>Personality Development</option>
                                            <option>Understanding Culture, Society and Politics</option>
                                            <option>Introduction to the Philosophy of the Human Person</option>
                                            <option>Physical Education and Health 1</option>
                                            <option>Physical Education and Health 2</option>
                                            <option>Physical Education and Health 3</option>
                                            <option>Physical Education and Health 4</option>
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <select name='sec_c6' id=''>
                                            <option value='' disabled selected>Subject</option>
                                            <option>None</option>
                                            <option>Oral Communication</option>
                                            <option>Read and Writing</option>
                                            <option>Komunikasyon at Pananaliksik sa Wika at Kulturang Pilipino</option>
                                            <option>Pagbasa at Pagsuri ng Iba't Ibang Teksto sa Pananaliksik</option>
                                            <option>21st Century Literature from the Philippines and the World</option>
                                            <option>Contemporary Philippine Arts from the Region</option>
                                            <option>Media and Information Literacy</option>
                                            <option>General Mathematics</option>
                                            <option>Statistics and Probability</option>
                                            <option>Earth and Life Science</option>
                                            <option>Physical Science</option>
                                            <option>Personality Development</option>
                                            <option>Understanding Culture, Society and Politics</option>
                                            <option>Introduction to the Philosophy of the Human Person</option>
                                            <option>Physical Education and Health 1</option>
                                            <option>Physical Education and Health 2</option>
                                            <option>Physical Education and Health 3</option>
                                            <option>Physical Education and Health 4</option>
                                        </select>
                                    </td>
                                </tr>
                                
                                </table>

                                </td>
                                <td valign='top'>
                                <table class='subject'>
                                <tr>
                                <td><h2>_</h2></td>
                                </tr>
                                <tr style='text-align: left'>
                                    <td colspan='5'>
                                        <b><p>Applied and Specialized Subjects</p></b>
                                    </td>
                                </tr>
                            
                                <tr>
                                    <td>
                                        <select name='sec_a1' id=''>
                                            <option value='' disabled selected>Subject</option>
                                            <option>Empowerment Technologies for ICT</option>
                                            <option>Computer Programming 1A (JAVA)</option>
                                            <option>Computer Programming 1B (DSA)</option>
                                            <option>Robotics 111</option>
                                            <option>English for Academic and Professional Purposes</option>
                                            <option>Practical Research 1</option>
                                            <option>Object-Oriented Programming</option>
                                            <option>Relational Database Management System</option>
                                            <option>Robotics 112</option>
                                            <option>Practical Research 2</option>
                                            <option>Pagsulat sa Filipino sa Larangan ng TVL</option>
                                            <option>Entrepreneurship</option>
                                            <option>Computer Programming 2A (SAUD)</option>
                                            <option>Computer Programming 2B (EEDP.Net)</option>
                                            <option>Research Project</option>
                                            <option>Computer Programming 2A (WP)</option>
                                            <option>Computer Programming 2B (CSS)</option>
                                            <option>Work Immersion/Career Advocacy/Culminating Activity</option>
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <select name='sec_a2' id=''>
                                            <option value='' disabled selected>Subject</option>
                                            <option>Empowerment Technologies for ICT</option>
                                            <option>Computer Programming 1A (JAVA)</option>
                                            <option>Computer Programming 1B (DSA)</option>
                                            <option>Robotics 111</option>
                                            <option>English for Academic and Professional Purposes</option>
                                            <option>Practical Research 1</option>
                                            <option>Object-Oriented Programming</option>
                                            <option>Relational Database Management System</option>
                                            <option>Robotics 112</option>
                                            <option>Practical Research 2</option>
                                            <option>Pagsulat sa Filipino sa Larangan ng TVL</option>
                                            <option>Entrepreneurship</option>
                                            <option>Computer Programming 2A (SAUD)</option>
                                            <option>Computer Programming 2B (EEDP.Net)</option>
                                            <option>Research Project</option>
                                            <option>Computer Programming 2A (WP)</option>
                                            <option>Computer Programming 2B (CSS)</option>
                                            <option>Work Immersion/Career Advocacy/Culminating Activity</option>
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <select name='sec_a3' id=''>
                                            <option value='' disabled selected>Subject</option>
                                            <option>Empowerment Technologies for ICT</option>
                                            <option>Computer Programming 1A (JAVA)</option>
                                            <option>Computer Programming 1B (DSA)</option>
                                            <option>Robotics 111</option>
                                            <option>English for Academic and Professional Purposes</option>
                                            <option>Practical Research 1</option>
                                            <option>Object-Oriented Programming</option>
                                            <option>Relational Database Management System</option>
                                            <option>Robotics 112</option>
                                            <option>Practical Research 2</option>
                                            <option>Pagsulat sa Filipino sa Larangan ng TVL</option>
                                            <option>Entrepreneurship</option>
                                            <option>Computer Programming 2A (SAUD)</option>
                                            <option>Computer Programming 2B (EEDP.Net)</option>
                                            <option>Research Project</option>
                                            <option>Computer Programming 2A (WP)</option>
                                            <option>Computer Programming 2B (CSS)</option>
                                            <option>Work Immersion/Career Advocacy/Culminating Activity</option>
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <select name='sec_a4' id=''>
                                            <option value='' disabled selected>Subject</option>
                                            <option>Empowerment Technologies for ICT</option>
                                            <option>Computer Programming 1A (JAVA)</option>
                                            <option>Computer Programming 1B (DSA)</option>
                                            <option>Robotics 111</option>
                                            <option>English for Academic and Professional Purposes</option>
                                            <option>Practical Research 1</option>
                                            <option>Object-Oriented Programming</option>
                                            <option>Relational Database Management System</option>
                                            <option>Robotics 112</option>
                                            <option>Practical Research 2</option>
                                            <option>Pagsulat sa Filipino sa Larangan ng TVL</option>
                                            <option>Entrepreneurship</option>
                                            <option>Computer Programming 2A (SAUD)</option>
                                            <option>Computer Programming 2B (EEDP.Net)</option>
                                            <option>Research Project</option>
                                            <option>Computer Programming 2A (WP)</option>
                                            <option>Computer Programming 2B (CSS)</option>
                                            <option>Work Immersion/Career Advocacy/Culminating Activity</option>
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <select name='sec_a5' id=''>
                                            <option value='' disabled selected>Subject</option>
                                            <option>Empowerment Technologies for ICT</option>
                                            <option>Computer Programming 1A (JAVA)</option>
                                            <option>Computer Programming 1B (DSA)</option>
                                            <option>Robotics 111</option>
                                            <option>English for Academic and Professional Purposes</option>
                                            <option>Practical Research 1</option>
                                            <option>Object-Oriented Programming</option>
                                            <option>Relational Database Management System</option>
                                            <option>Robotics 112</option>
                                            <option>Practical Research 2</option>
                                            <option>Pagsulat sa Filipino sa Larangan ng TVL</option>
                                            <option>Entrepreneurship</option>
                                            <option>Computer Programming 2A (SAUD)</option>
                                            <option>Computer Programming 2B (EEDP.Net)</option>
                                            <option>Research Project</option>
                                            <option>Computer Programming 2A (WP)</option>
                                            <option>Computer Programming 2B (CSS)</option>
                                            <option>Work Immersion/Career Advocacy/Culminating Activity</option>
                                        </select>
                                    </td>
                                </tr>
                                
                                </table>
                                </td>
                            </table>
                            
                            
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="ssubmit" class="btn btn-primary">Save Subjects</button>
                          </div>
                          </form>
                        </div>
                      </div>
                    </div>


                <?php
            }

            echo "<br><br><br><br><br><br><br><br><br>";
        }
    ?>
    
    

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<?php 
                              echo '<form action="include/teacher-section.inc.php" method="POST">
                              <input type="hidden" value="'.$section.'" name="class">
                              <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                              <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Advisory</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                    
                    
                                <div class="modal-bodyy">
                                
                                <section class="jumbotronn text-center">
                                    <h4>Select Adviser</h4>
                                    <br>
                                    <br><br>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button type="submit" name="ssubmit" class="btn btn-primary">Save changes</button>
                                </div>
                              </div>
                            </div>
                        </div></form>'; 
                          ?>
</body>
</html>
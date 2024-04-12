<?php
  $sqll="SELECT * from section";
  $resultl = mysqli_query($conn, $sqll);
  $queryResultsl= mysqli_num_rows($resultl);
  if ($queryResultsl==0) {
    echo "wow";
  }
  else {
    $resulta = array();
    while ($rowl = mysqli_fetch_assoc($resultl)) {
      $sqlover="SELECT * from ".$rowl['class_name']."_student WHERE ifsent='sent'";
      $resultover = mysqli_query($conn, $sqlover);
      $queryResultsover= mysqli_num_rows($resultover);
      $resulta[] = $queryResultsover;

      $sqlback="SELECT * from ".$rowl['class_name']."_student";
      $resultback = mysqli_query($conn, $sqlback);
      $queryResultsback= mysqli_num_rows($resultback);
      $resultnew[] = $queryResultsback;
      
    }
    
  }
 
  $sent = array_sum($resulta);
  $not= array_sum($resultnew) - $sent;

  $sec1= 10;
  $sec2= 30;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="sample/plugins/fontawesome-free/css/all.min.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
    

    <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           
           function drawChart()  
           {  
              var data = google.visualization.arrayToDataTable([
                      ['Sent', 'Not Sent'],
                          ['Sent', parseInt('<?php echo $sent; ?>')],
                          ['Not Sent',       parseInt('<?php echo $not; ?>')]
                  ]); 

                var options = {    
                      //is3D:true,  
                    pieHole: 0.4,
                    fontName: 'Century Gothic', 
                    fontSize: 15,
                    is3D: true,
                    chartArea:{left:10,top:20,width:"250%",height:"200%"},
                    backgroundColor: {fill:'transparent'},
                    
                    textStyle: {
                        color: 'white'
                    },
                    titleTextStyle: {
                        color: 'white'
                    },

                    slices: {
                        0: { color: '#3B919B' },
                        1: { color: '#F1D302' },
                    
                    },
                    animation: {
                    duration: 1000,
                    easing: 'out',
                    startup: true
                    },
                    hAxis: { textPosition: 'none', titleTextStyle: {color: 'red'} },
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  

           }  


           
           </script>  





  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <script type="text/javascript">
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawStuff);

        function drawStuff() {
          var data = new google.visualization.arrayToDataTable([
            ['Section', 'Quantity', { role: 'style' }],
            ['Ithiel', parseInt('<?php echo $sec1; ?>'), '#b87333'],
            ['Imathia', parseInt('<?php echo $sec2; ?>'), 'blue'],
            ['Other', 3, 'yellow']
          ]);

          var options = {
            width: 500,
            height: 150,
            legend: { position: 'none' },
            bars: 'horizontal', // Required for Material Bar Charts.
            axes: {
              x: {
                0: { side: 'top', label: 'Percentage'} // Top x-axis.
              }
            },
            bar: { groupWidth: "90%" }
          };

          var chart = new google.charts.Bar(document.getElementById('top_x_div'));
          chart.draw(data, options);
        };
      </script>
</head>
<style>
    .col-6{
        display: inline-block;
        width: 200px;
    }
    .small-box-footer{
        text-decoration: none;
        color: white;
    }
    .small-box-footer:hover{
        text-decoration: none;
        color: white;
    }
    .remember{
      background-color: #234f79;
    }
    .log{
      background-color: #335779;
      color: white;
    }
    .line{
      display: inline-block;
    }
    .fade{
      width: 100%;
    }

    .switch {
      position: relative;
      display: inline-block;
      width: 100px;
      height: 54px;
    }

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 45px;
  width: 45px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(45px);
  -ms-transform: translateX(45px);
  transform: translateX(45px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
.click{
    display: inline-block;
}
.toggle{
  display: inline-block;
  margin-right: 30px;
  margin-left: 30px;
}

.moon{
  margin: auto;
  margin-left: 120px;
}
.dis{
  text-align: center;

}
.inner{
  background-color: #335779;
  color: white;
}
.inner2{
  background-color: #335779;
  color: white;
}

.inner3{
  background-color: #335779;
  color: white;
}

.inner4{
  background-color: #335779;
  color: white;
}

.loader-wrapper {
  width: 100%;
  height: 100%;
  position: absolute;
  top: 0;
  left: 0;
  background-color: #242f3f;
  display:flex;
  justify-content: center;
  align-items: center;
}
img{
    height: 200px;
    position: absolute;
}

.loader {
  border: 16px solid #235789;
  border-radius: 50%;
  border-top: 16px solid #F1D302;
  width: 205px;
  height: 205px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

.h3{
  font-size: 30px;
  color: #333333;
  font-family: 'Raleway', sans-serif;
  text-align: center;
}
.connectedSortable{
  position: relative;

}
</style>
<body>
    <div id="container-home">
    <h1 class="title">Registrar Dashboard</h1>
    <hr>
        <section id="content" class="content">
        <div class="col-lg-3 col-6 one">
            <!-- small box -->
            <div class="small-box bg-info" style="box-shadow: 10px 10px 5px grey;">
              <div class="inner">
                <h3><?php 
                    $sql="SELECT * FROM section";
                    $result = mysqli_query($conn, $sql);  
                    $queryResults= mysqli_num_rows($result);
                    $resulta = array();
                    $i=0;
                      while ($row = mysqli_fetch_assoc($result)) {
                        $i++;
                        $query = "SELECT * from ".$row['class_name']."_student WHERE ifsent='sent'";
                        $results = mysqli_query($conn, $query);  
                        $queryResultss= mysqli_num_rows($results);
                        $resulta[] = $queryResultss;
                      }

                      echo array_sum($resulta);
                    
                ?></h3>
                <p>Sent Grades</p>
              </div>
              <div class="remember">
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info" style="box-shadow: 10px 10px 5px grey;">
              <div class="inner2">
                <h3><?php 
                  $query = "SELECT * from requests";
                  $result = mysqli_query($conn, $query);  
                  $queryResults= mysqli_num_rows($result);
                  if ($queryResults>0) {
                    echo $queryResults;
                  }
                  else{
                    echo "0";
                  }
                ?></h3>

                <p>Pending Approval</p>
              </div>
              <div class="remember">
                <a href="verti-header.php?name=app" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info" style="box-shadow: 10px 10px 5px grey;">
              <div class="inner3">
              <h3><?php
                  $sqlsem="SELECT * FROM disable_semester";
                  $resultsem = mysqli_query($conn, $sqlsem);  
                  $queryResultssem= mysqli_num_rows($resultsem);
                  $rowsem = mysqli_fetch_assoc($resultsem);
                  if ($rowsem['first']=="yes") {
                    echo "1st";
                  }
                  else if ($rowsem['second']=="yes") {
                    echo "2nd";
                  }
                  else{
                    echo "error";
                  }

                ?></h3><p>Semester</p>
              </div>
              <div class="remember">
              <a href="#" class="small-box-footer" data-toggle="modal" data-target="#myModal">Change <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>

          <!--shore-->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info" style="box-shadow: 10px 10px 5px grey;">
              <div class="inner4">
              <h3><?php
                  $sqll="SELECT * FROM teacher WHERE status='1'";
                  $resultl = mysqli_query($conn, $sqll);  
                  $queryResultsl= mysqli_num_rows($resultl);
                  echo $queryResultsl;

                ?></h3><p>Advisers</p>
              </div>
              <div class="remember">
              <a href="#" class="small-box-footer" data-toggle="modal" data-target="#myModal">Change <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>
          <!--shore-->


          <!--shore-->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info" style="box-shadow: 10px 10px 5px grey;">
              <div class="inner4">
              <h3><?php
                  $sqll="SELECT * FROM section";
                  $resultl = mysqli_query($conn, $sqll);  
                  $queryResultsl= mysqli_num_rows($resultl);
                  echo $queryResultsl;

                ?></h3><p>Section</p>
              </div>
              <div class="remember">
              <a href="#" class="small-box-footer" data-toggle="modal" data-target="#myModal">Change <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>
                  <br><br>
          <!--shore-->


                  <table class="tabletable" style="text-align: center;">
                  <tr>
                      <td valign="top" colspan='2'>
                        <h3 class='h3'>Overall Sent Grades per Section</h3>
                      </td>
                  </tr>
                    <tr>
                      <td valign="top">
                        <section class="col-lg-7 connectedSortable">
                          <section class="line" >
                          <br>
                            <?php
                              echo "<div id='piechart' class='connectedSortable'></div>
                              ";
                            ?>
                            </section>
                        </section>
                      </td>
                      <td valign="top">
                        <div id="top_x_div"></div>
                      </td>
                    </tr>
                  
                  </table>
        
                
                <table>
                  <tr>
                    <td>
                    <section class="line">
                      <h3 class="h3">Log</h3>
                      <?php
                        $sql="SELECT * from requests_log LIMIT 5";
                        $result = mysqli_query($conn, $sql);
                        $queryResults= mysqli_num_rows($result);
                                if ($queryResults > 0) {
                        echo"<table border='1' id='myTable' style='font-size: 12px'>";

                                    echo"<tr align='center'>
                                        <th align='center' class='log'><h5>Date</h5></th>
                                        <th align='center' class='log'><h5>Message</h5></th>
                                    </tr>
                                    <div class='scrollit'>";
                                    while (($row = mysqli_fetch_assoc($result))) {
                                echo"
                                    <p id='student'>
                                    <h3 name='username' id='username'>
                                    <tr>
                                    
                                    <td align='center'>".$row['user_date']."</td>
                                    <td align='center'>".$row['user_message']."</td>
                                    
                                        </tr></h3></p>";
                                    }
                                    echo"</div></table>";
                                }
                    ?>
                    <form action='verti-header.php?name=log' method='POST'><button class='btn btn-primary' style='margin-left: 50px;'>See all</button></form>
                    </section>
                    </td>
                      <td>
                      
                      </td>
                  </tr>
                </table>

                <table class="new" style="width: 100%; margin-left: 50px; text-align: center; box-shadow: 10px 10px 1px gray; padding: 50px;">
                  <br><br>
                   <tr>
                    <td>
                    <div>
                        <?php
                        $sql="SELECT * from ithiel_student WHERE ifsent='SENT' LIMIT 5";
                        $result = mysqli_query($conn, $sql);
                        $queryResults= mysqli_num_rows($result);
                                if ($queryResults > 0) {
                        echo"<h2>Sent Grades</h2>
                        <table border='1' id='myTable'>";
                                  
                                    echo"<tr align='center'>
                                        <th align='center'><h5>Name</h5></th>
                                        <th align='center'><h5>Email</h5></th>
                                        <th align='center'><h5>Sent To</h5></th>
                                    </tr>";
                                    while ($row = mysqli_fetch_assoc($result)) {
                                echo"
                                    <p id='student'>
                                    <h3 name='username' id='username'>
                                    <tr>
                                    <td align='center'>".$row['student_first']." " .$row['student_last'] ."</td>
                                    <td align='center'>".$row['parent_email']."</td>
                                    <td align='center'>Parent</td>
                                  
                                        </tr></h3></p>";
                                    }
                                    echo"</table>
                                    <button type='submit' class='btn btn-primary'>See all</button>
                                    ";
                                }

                                ?>
                      </div>
                    </td>
                    <td>
                      <div>
                      <?php
                      $sql="SELECT * from ithiel_student WHERE ifsent IS NULL OR ifsent = '' LIMIT 5";
                      $result = mysqli_query($conn, $sql);
                      $queryResults= mysqli_num_rows($result);
                              if ($queryResults > 0) {
                      echo"<h2>Not Sent</h2>
                      <table border='1' id='myTable'>";
                                
                                  echo"<tr align='center'>
                                      <th align='center'><h5>Name</h5></th>
                                      <th align='center'><h5>Email</h5></th>
                                      <th align='center'><h5>Sent To</h5></th>
                                  </tr>";
                                  while ($row = mysqli_fetch_assoc($result)) {
                              echo"
                                  <p id='student'>
                                  <h3 name='username' id='username'>
                                  <tr>
                                  <td align='center'>".$row['student_first']." " .$row['student_last'] ."</td>
                                  <td align='center'>".$row['parent_email']."</td>
                                  <td align='center'>Parent</td>
                                
                                      </tr></h3></p>";
                                  }
                                  echo"</table>
                                    <button type='submit' class='btn btn-primary'>See all</button>
                                    ";
                              }

                              ?>
                    </div>
                    </td>
                   
                   </tr>
                  </table>
                
        
    </div>
<?php
$sqlsem='SELECT * from disable_semester';
$resultsem = mysqli_query($conn, $sqlsem);
$queryResultssem= mysqli_num_rows($resultsem);
$rowsem = mysqli_fetch_assoc($resultsem);

if ($rowsem['first']=='yes') {
  $status_first= 'checked';
  $status_sec= '';

  if ($rowsem['first_first']=='yes') {
    if (($rowsem['first_first']=='yes') && ($rowsem['first_second']=='yes')) {
      $status_first_grading= 'checked';
      $status_sec_grading= 'checked';
    }
    else{
      $status_first_grading= 'checked';
      $status_sec_grading= '';
    }
  }

  else if ($rowsem['first_second']=='yes') {
    if (($rowsem['first_first']=='yes') && ($rowsem['first_second']=='yes')) {
      $status_first_grading= 'checked';
      $status_sec_grading= 'checked';
    }
    else{
      $status_first_grading= '';
      $status_sec_grading= 'checked';
    }
  }

}

else if ($rowsem['second']=='yes') {
  $status_first= '';
  $status_sec= 'checked';

  if ($rowsem['second_first']=='yes') {
    if (($rowsem['second_first']=='yes') && ($rowsem['second_second']=='yes')) {
      $status_first_grading= 'checked';
      $status_sec_grading= 'checked';
    }
    else{
      $status_first_grading= 'checked';
      $status_sec_grading= '';
    }
  }

  else if ($rowsem['second_second']=='yes') {
    if (($rowsem['second_first']=='yes') && ($rowsem['second_second']=='yes')) {
      $status_first_grading= 'checked';
      $status_sec_grading= 'checked';
    }
    else{
      $status_first_grading= '';
      $status_sec_grading= 'checked';
    }
  }
}
else {
  echo "error";
}
    echo '<form action="include/disable.inc.php" method="POST">
                              <input type="hidden" value="" name="class">
                              <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                              <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Semester</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>

                    
                                <div class="modal-body">
                                <h5 class="dis">Semester</h5>
                                <br>
                                  <div class="moon">
                                  <div style="text-align: center; display: inline-block;">
                                    <label class="switch">
                                    <input type="checkbox" class="checkBox" '.$status_first.' onclick="ch($(this));" value="first" name="sem"> 
                                    <span class="slider round"></span>
                                    </label>
                                    <p>First Semester</p>
                                  </div>

                                  <div style="display: inline-block;">
                                    <div style="text-align: center;">
                                      <label class="switch">
                                      <input type="checkbox" class="checkBox" '.$status_sec.' onclick="ch($(this));" value="sec" name="sem">
                                      <span class="slider round"></span>
                                      </label>
                                      <p>Second Semester</p>
                                    </div>
                                    
                                  </div>
                                  </div>

                                  <hr>
                                  <h5 class="dis">Grading</h5>
                                  <br>
                                    <div class="moon">
                                    <div style="text-align: center; display: inline-block;">
                                      <label class="switch">
                                      <input type="checkbox" class="checkBox" '.$status_first_grading.' id="myCheck" value="first-grading" name="gradfirst"> 
                                      <span class="slider round"></span>
                                      </label>
                                      <p>First Grading</p>
                                    </div>

                                    <div style="display: inline-block;">
                                      <div style="text-align: center;">
                                        <label class="switch">
                                        <input type="checkbox" class="checkBox" '.$status_sec_grading.' id="myCheck" value="sec-grading" name="gradsec">
                                        <span class="slider round"></span>
                                        </label>
                                        <p>Second Grading</p>
                                      </div>
                                      
                                    </div>
                                    </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button type="submit" name="ssubmit" class="btn btn-primary" onclick="myFunction()">Save changes</button>
                                </div>
                              </div>
                            </div>
                        </div></form>'; 

                        ?>
  <div class="loader-wrapper">
      
      <div class="loader">
      </div>
      <img src="../pics/loa.png">
    </div>

    <script>
        $(window).on("load",function(){
          $(".loader-wrapper").fadeOut("slow");
        });
    </script>
</body>
</html>
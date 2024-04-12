<?php
  include_once '../include/dbh.inc.php';
  session_start();
  $first=$_SESSION['userfirst'];
  $last= $_SESSION['userlast'];

  $sqll="SELECT * from section WHERE teacher_first='$first' AND teacher_last='$last'";
  $resultl = mysqli_query($conn, $sqll);
  $queryResultsl= mysqli_num_rows($resultl);
  if ($queryResultsl==0) {
    echo "wow";
  }
  else {
    $resulta = array();
    $resultmale = array();
    $resultfemale = array();
    while ($rowl = mysqli_fetch_assoc($resultl)) {
      $sqlover="SELECT * from ".$rowl['class_name']."_student WHERE ifsent='sent'";
      $resultover = mysqli_query($conn, $sqlover);
      $queryResultsover= mysqli_num_rows($resultover);
      $resulta[] = $queryResultsover;

      $sqlback="SELECT * from ".$rowl['class_name']."_student";
      $resultback = mysqli_query($conn, $sqlback);
      $queryResultsback= mysqli_num_rows($resultback);
      $resultnew[] = $queryResultsback;


      $sqlpay="SELECT * from ".$rowl['class_name']."_student WHERE student_gender='Male' AND ifsent='sent'";
      $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt, $sqlpay)) {
          echo "stmtt";
          exit();
      }
      $resultpay = mysqli_query($conn, $sqlpay);
      $queryResultspay= mysqli_num_rows($resultpay);
      $resultmale[] = $queryResultspay;

      $sqlhoo="SELECT * from ".$rowl['class_name']."_student WHERE student_gender='Female' AND ifsent='sent'";
      $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt, $sqlhoo)) {
          echo "stmt";
          exit();
      }
      $resulthoo = mysqli_query($conn, $sqlhoo);
      $queryResultshoo= mysqli_num_rows($resulthoo);
      $resultfemale[] = $queryResultshoo; 
      
    }
    
  }
  $male = array_sum($resultmale);
  $female = array_sum($resultfemale);

  $sent = array_sum($resulta);
  $not= array_sum($resultnew) - $sent; 


          
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
                    title: 'Overall Sent Grades Graph',
                      //is3D:true,  
                    pieHole: 0.4,
                    fontName: 'Century Gothic', 
                    fontSize: 15,
                    is3D: true,
                    chartArea:{left:10,top:20,width:"250%",height:"200%"},
                    backgroundColor: '#E4E4E4',

                    slices: {
                        0: { color: '#235789' },
                        1: { color: '#F1D302' },
                    
                    },
                    animation: {
                    duration: 1000,
                    easing: 'out',
                    startup: true
                    },
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
            ['Gender', 'Quantity', { role: 'style' }],
            ['Male', parseInt('<?php echo $male; ?>'), '#b87333'],
            ['Female', parseInt('<?php echo $female; ?>'), 'blue'],
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
body{
  margin-bottom: 30px;
}
    .col-6{
        display: inline-block;
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
    .inner{
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
.opt{
  width: 1000px;
}

th{
  background-color: #335779;
  color: white;
}
.new{
  padding: 30px;
}
</style>
<body>
<table>
  <tr>
    <td class="opt">
    <section id="content">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php 
                 $sql="SELECT * FROM section WHERE teacher_first='$first' AND teacher_last='$last'";
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
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <div class="remember">
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!--cmall-->
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
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
              <!--item-->
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <div class="remember">
              <a href="#" class="small-box-footer">
              <?php
                  if ($rowsem['first_second']=="yes") {
                    if (($rowsem['first_first']=="yes") && ($rowsem['first_second']=="yes")) {
                      echo "1st and 2nd Grading";
                    }
                    else {
                      echo "2nd Grading";
                    }
                  }
                  else if ($rowsem['first_first']=="yes") {
                    if (($rowsem['first_first']=="yes") && ($rowsem['first_second']=="yes")) {
                      echo "1st and 2nd Grading";
                    }
                    else {
                      echo "2nd Grading";
                    }
                  }

                  else if ($rowsem['second_second']=="yes") {
                    if (($rowsem['second_first']=="yes") && ($rowsem['second_second']=="yes")) {
                      echo "1st and 2nd Grading";
                    }
                    else {
                      echo "2nd Grading";
                    }
                  }
                  else if ($rowsem['second_first']=="yes") {
                    if (($rowsem['second_first']=="yes") && ($rowsem['second_second']=="yes")) {
                      echo "1st and 2nd Grading";
                    }
                    else {
                      echo "2nd Grading";
                    }
                  }
                  else{
                    echo "error";
                  }
              ?>
              <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>
          <!--item-->

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php 
                 $sql="SELECT * FROM section WHERE teacher_first='$first' AND teacher_last='$last'";
                 $result = mysqli_query($conn, $sql);  
                 $queryResults= mysqli_num_rows($result);
                 $resulta = array();
                 $i=0;
                   while ($row = mysqli_fetch_assoc($result)) {
                     $i++;
                     $query = "SELECT * from ".$row['class_name']."_student";
                     $results = mysqli_query($conn, $query);  
                     $queryResultss= mysqli_num_rows($results);
                     $resulta[] = $queryResultss;
                   }

                   echo array_sum($resulta);
                ?></h3>
                <p>Total of students</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <div class="remember">
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!--cmall-->
          </div>
        </section>
    </td>
  </tr>
</table>
<br>
<table class="tabletable" style="text-align: center; width: 100%;">
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

<br><br><br><br>



    



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

<script type="text/javascript">

// Current Server Time script (SSI or PHP)- By JavaScriptKit.com (http://www.javascriptkit.com)
// For this and over 400+ free scripts, visit JavaScript Kit- http://www.javascriptkit.com/
// This notice must stay intact for use.

//Depending on whether your page supports SSI (.shtml) or PHP (.php), UNCOMMENT the line below your page supports and COMMENT the one it does not:
//Default is that SSI method is uncommented, and PHP is commented:

//var currenttime = '<!--#config timefmt="%B %d, %Y %H:%M:%S"--><!--#echo var="DATE_LOCAL" -->' //SSI method of getting server date
var currenttime = '<? print date("F d, Y H:i:s", time())?>' //PHP method of getting server date

///////////Stop editting here/////////////////////////////////

var montharray=new Array("January","February","March","April","May","June","July","August","September","October","November","December")
var serverdate=new Date(currenttime)

function padlength(what){
var output=(what.toString().length==1)? "0"+what : what
return output
}

function displaytime(){
serverdate.setSeconds(serverdate.getSeconds()+1)
var datestring=montharray[serverdate.getMonth()]+" "+padlength(serverdate.getDate())+", "+serverdate.getFullYear()
var timestring=padlength(serverdate.getHours())+":"+padlength(serverdate.getMinutes())+":"+padlength(serverdate.getSeconds())
document.getElementById("servertime").innerHTML=datestring+" "+timestring
}

window.onload=function(){
setInterval("displaytime()", 1000)
}

</script>

<p><b>Current Server Time:</b> <span id="servertime"></span></p>

<p style="font: normal 11px Arial">This free script provided by<br />
<a href="http://www.javascriptkit.com">JavaScript Kit</a></p>
</html>
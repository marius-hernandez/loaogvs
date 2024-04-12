<?php
      include_once "functions.php";
      include_once "../include/dbh.inc.php";
?>
<style>

  .container-approval{
    box-shadow: 10px 10px #333333;
    font-family: 'Raleway', sans-serif;
    margin-bottom: 50px;
  }
  .element{
    border-style: outset;
    padding-left: 50px;
  }
  .bxs-plus-circle{
    font-size: 30px;
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
.fade{
  width: 100%;
}
.modal-bodyy{
  float:right;
}
.modal-body{
  float:left;
}
.modal-dialog{
  width: 100%;
}
.jumbotron-heading{
  display: inline-block;
  width: 500px;
}
.app-table{
  width: 500%:
}
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <div class="container-approval">
            <?php
                $queryy = "select * from `requests`;";
                $result = mysqli_query($conn, $queryy);
                if(count(fetchAll($queryy))>0){
                  $i=0;
                  while ($row = mysqli_fetch_assoc($result)){
                    $i++;
                        $id = $row['id'];
                        $year = $row['user_year'];
                        $sid = $row['user_id'];
                        $gender = $row['user_gender'];
                        $first = $row['user_first'];
                        $last = $row['user_last'];
                        $middle = $row['user_middle'];
                        $suffix = $row['user_suffix'];
                        $email = $row['user_email'];
                        $password = $row['user_pwd'];
                        $type = $row['type'];

                        $query = "select * from `section` WHERE teacher_last='$last' AND teacher_first='$first';";
                        $stmt = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt, $query)) {
                            header("location: verti-header.php?name=app&error=stmtfailed");
                            exit();
                        }
                        $resulta= mysqli_query($conn, $query);
                        $queryResultsa = mysqli_num_rows($resulta);
                        $rowa = mysqli_fetch_assoc($resulta);
                        if(performQuery($query)){
                          if (count(fetchAll($query)) == 0) {
                            echo '<div class="element"> <a href="#" class="bx bxs-plus-circle nav__icon" data-toggle="modal" data-target="#myModal'.$i.'"></a>';
                            ?>
                            <table class="app-table">
                              <tr>
                                <td>
                                  <h2 class="jumbotron-heading"><?php echo $row['user_first'], " ", $row['user_last'] ?></h2>
                                  <br>
                                  <h2 class="jumbotron-heading"><?php echo $row['user_year'], "-",$row['user_id'] ?></h2>
                                  <p class="lead text-muted"><?php echo $row['user_message'] ?></p>
                                </td>
                                <td>
                                    <a href="" class="btn btn-secondary my-2">Accept</a>
                                  <a href="../ignore.php?id=<?php echo $row['id'] ?>" class="btn btn-warning my-2">Ignore</a>
                                  <a href="../reject.php?id=<?php echo $row['id'] ?>" class="btn btn-danger my-2">Reject</a>
                                </td>
                              </tr>
                            
                            </table>
                            <small><i><?php echo $row['user_date'] ?></i></small></div>
                              
                              
                            <!-- Modal -->
                            <?php 
                              echo '<form action="include/teacher-section.inc.php" method="POST">
                              <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal'.$i.'" class="modal fade">

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
                                    <h5>Please select an accurate advisory of this user. If nothing shows, please add a new section.</h5>
                                    
                                    <input type="hidden" name="first" value="'.$row['user_first'].'">
                                    <input type="hidden" name="last" value="'.$row['user_last'].'">
                                    <select required type="text" name="class" id="input" onchange="random_function()" class="form-select"> 
                                        <option value disabled selected>Advisory Class</option>
                                        ';
                                        
                                            $sqla="SELECT * from section ORDER BY class_name ASC";
                                            $stmt = mysqli_stmt_init($conn);
                                            if (!mysqli_stmt_prepare($stmt, $sqla)) {
                                                header("location: verti-header.php?name=archive&error=stmtfailed");
                                                exit();
                                            }
                                            $resulta= mysqli_query($conn, $sqla);
                                            $queryResultsa = mysqli_num_rows($resulta);
                                            if ($queryResultsa==0) {
                                               echo "There are sections yet";
                                               }
                                               else{
                                                while ($rowa = mysqli_fetch_assoc($resulta)) {
                                                  if ($rowa['teacher_last'] == NULL || $rowa['teacher_first'] == NULL) {
                                                    echo "<option>".$rowa['class_name']."</option>";
                                                  }
                                                  else{
                                                    
                                                  }
                                                    
                    
                                                }
                                               }
                                               
                                        echo'
                                        
                                    </select>
                                    <br><br>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
                                </div>
                              </div>
                            </div>
                        </div></form>'; 
                          }

                          else {
                            echo '<div class="element"> <a href="#" class="bx bxs-plus-circle nav__icon" data-toggle="modal" data-target="#myModal'.$i.'"></a>';
                            ?>
                            <table class="app-table">
                              <tr>
                                <td>
                                  <h2 class="jumbotron-heading"><?php echo $row['user_first'], " ", $row['user_last'] ?></h2>
                                  <br>
                                  <h2 class="jumbotron-heading"><?php echo $row['user_year'], "-",$row['user_id'] ?></h2>
                                  <p class="lead text-muted"><?php echo $row['user_message'] ?></p>
                                </td>
                                <td>
                                    <a href="" class="btn btn-success my-2">Accept</a>
                                  <a href="../ignore.php?id=<?php echo $row['id'] ?>" class="btn btn-warning my-2">Ignore</a>
                                  <a href="../reject.php?id=<?php echo $row['id'] ?>" class="btn btn-danger my-2">Reject</a>
                                </td>
                              </tr>
                            
                            </table>
                            <small><i><?php echo $row['user_date'] ?></i></small></div>
                            <?php
                              echo '<form action="include/teacher-section.inc.php" method="POST">
                              <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal'.$i.'" class="modal fade">

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
                                    <h4>Advisory info</h4>
                                    <br>
                                    <input type="hidden" name="first" value="'.$row['user_first'].'">
                                    <input type="hidden" name="last" value="'.$row['user_last'].'">
                                    <select required type="text" name="class" id="input" onchange="random_function()" class="form-select"> 
                                        <option value disabled selected>Advisory Class</option>
                                        ';
                                        
                                            $sqla="SELECT * from section ORDER BY class_name ASC";
                                            $stmt = mysqli_stmt_init($conn);
                                            if (!mysqli_stmt_prepare($stmt, $sqla)) {
                                                header("location: verti-header.php?name=archive&error=stmtfailed");
                                                exit();
                                            }
                                            $resulta= mysqli_query($conn, $sqla);
                                            $queryResultsa = mysqli_num_rows($resulta);
                                            if ($queryResultsa==0) {
                                               echo "There are sections yet";
                                               }
                                               else{
                                                while ($rowa = mysqli_fetch_assoc($resulta)) {
                                                  if ($rowa['teacher_last'] == NULL || $rowa['teacher_first'] == NULL) {
                                                    echo "<option>".$rowa['class_name']."</option>";
                                                  }
                                                  else{
                                                    
                                                  }
                                                    
                    
                                                }
                                               }
                                               
                                        echo'
                                        
                                    </select>
                                    <br><br>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
                                </div>
                              </div>
                            </div>
                        </div></form>'; 
                          }
                      }
                      else{
                        echo "AHAHAHA";
                      }
                    }
                }
                else{
                    echo "No Pending Requests.";
                }
            ?>
          
        </div>
      <script>
      $(document).ready(function () {
          $('body').on('click', '.feed-id',function(){
              var pid = $(this).attr('data-id');
          });
      });
      </script>
      <script>

function random_function0()
{
    var a=document.getElementById("input1").value;
    if(a==="Academic Track")
    {
        var arr=["STEM","HUMSS", "ABM", "GAS"];
    }
    else if(a==="Technical Vocational Livelihood Track")
    {
        var arr=["ICT","HE","IA"];
    }
 
    var string="";
 
    for(i=0;i<arr.length;i++)
    {
        string=string+"<option value="+arr[i]+">"+arr[i]+"</option>";
    }
    document.getElementById("output1").innerHTML=string;
}


function random_function()
{
    var a=document.getElementById("input").value;
    if(a==="11")
    {
        var arr=["Acts","Amos", "Chronicles", "Collosians", "Corinthians", "Daniel", "Ephesians", "Ezekiel", "Ezra", "Genesis", "Haggai", "Hebrew", "Hosea", "Isaiah", "James", "Jeremiah", "Job", "Joel", "John", "Jonah", "Jude", "Judges", "Kings", "Lamentations", "Luke", "Malachi", "Micah", "Nahum", "Nehemiah", "Numbers", "Obadiah", "Peter", "Solomon", "Thessalonians", "Timothy", "Titus"];
    }
    else if(a==="12")
    {
        var arr=["Amaziah","Antioch","Aphek", "Ashur", "Attalia", "Babylon", "Beersheba", "Beirut", "Berea", "Bethel", "Bethany", "Bethlehem", "Bethsaida", "Cana", "Igdalia", "Illyricum", "Imathia", "Iphedeiah", "Irijah", "Israel", "Ithiel", "Jayser", "Jerahmeel", "Jericho", "Jerusalem", "Jezreel", "Jordan", "Jubilee", "Judea", "Macedonia", "Magdala", "Salem", "Samaria", "Samos", "Sedon", "Shechem", "Shiloh", "Shunem", "Sinai", "Smyrna", 
        "Zaanan", "Zanoah"];
    }
 
    var string="";
 
    for(i=0;i<arr.length;i++)
    {
        string=string+"<option value="+arr[i]+">"+arr[i]+"</option>";
    }
    document.getElementById("output").innerHTML=string;
}
</script>
      
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<?php
    include_once '../include/dbh.inc.php';
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
</style>
<body>
   <?php
        $sql="SELECT * from student_bin";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "stmt failed";
            echo $section;
            exit();
        }
        $result= mysqli_query($conn, $sql);
        $queryResults = mysqli_num_rows($result);
        $i=0;
        while ($row = mysqli_fetch_assoc($result)) {
            $i++;
            $section=$row['section'];
            echo '<div class="ignore-binn">
                <a class="nav__link ignore-bin" id="nav_all" data-toggle="modal" data-target="#myModal'.$i.'">
                    <div class="box">
                <i class="bx bxs-user folder"></i>
                    <br>
                    <span class="nav__name label">'.$row['student_last'].' '.$row['student_first'].'</span>
                    <span class="nav__name label">'.$row['section'].'</span>
                    <br>
                    </div>
                </a>
                <form action="card/include/pdf/ict-prog.php?section='.$section.'&first='.$row['student_first'].'&last='.$row['student_last'].'" method="POST"> 
                    <input type="hidden" name="id" value="'.$row['id'].'">
                    <div class="center">
                    <button name="download-pdf" class="btn btn-success my-2">Download</button>
                    <button name="retrieve-pdf" class="btn btn-primary my-2">Retrieve</button>
                    </div>
                    </form>
                    </div>
                ';

                ?>
                    <div class="modal fade" id="myModal<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <?php 
                            echo $row['student_first'];

                            ?>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary list" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary list">Delete</button>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="modal fade" id="myModal<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Information</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                          <?php echo '<form action="include/irregular.inc.php?section='.$section.'&last='.$row['student_last'].'&first='.$row['student_first'].'&gender='.$row['student_gender'].'" method="POST">';
                              echo $row['student_first']; echo " "; echo $row['student_last']; echo " "; echo $row['student_gender']; 
                          ?>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" name="submit" class="btn btn-secondary">Move to Irregular Student</button>
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                          </div>
                          </form>
                        </div>
                      </div>
                    </div>


                <?php
        }
        ?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
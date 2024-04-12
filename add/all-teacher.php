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
    text-align: center;
    margin-right: 80px;
    max-width: 80%;
}
.ignore-binn{
    display: inline-block;
    text-align: center;
    
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
.box{
    margin-left: 60px;
}


.folder:hover{
    background: -webkit-linear-gradient(#1c4966, #296d98);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}
.hover{
    display: inline-block;
    text-align: center;
    margin-right: 100px;

}

.hover:hover{
    text-decoration: none;
}
</style>
<body>
   <?php
        $sql="SELECT * from teacher WHERE type='teacher' ORDER BY user_last ASC";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: verti-header.php?name=archive&error=stmtfailed");
            exit();
        }
        $result= mysqli_query($conn, $sql);
        $queryResults = mysqli_num_rows($result);
        if ($queryResults==0) {
            echo "There are no items in the bin";
        }
        else{
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="ignore-binn">
                <a href="verti-header.php?name=ignore" class="nav__link ignore-bin" id="nav_all" data-toggle="modal" data-target="#exampleModal1">
                    <div class="box">
                <i class="bx bxs-user folder"></i>
                    <br>
                    <span class="nav__name label">'.$row['user_first'].' '.$row['user_last'].'</span>
                    <br>
                    </div>
                </a>
                <form action="../retrieve-delete.php" method="POST">
                    <input type="hidden" name="id" value="'.$row['id'].'">
                    <button name="retrieve" class="btn btn-success my-2">Retrieve</button>
                    <button name="delete" class="btn btn-danger my-2">Delete</button>
                    </form>
                    </div>
                ';
            }
        }
    ?>
    
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Delete</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Information of the student
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</body>
</html>
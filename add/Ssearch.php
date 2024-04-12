<?php
    include '../include/dbh.inc.php';
?>
<!DOCTYPE html>
 
<html>
<head>
 <title>PHP MySQL Insert Tutorial</title>
        <script src='https://code.jquery.com/jquery-2.1.3.min.js'></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
</head>
<style>
*{
    text-align: center;
}
body{
    background-color: #f4fcff;
}
form{
    
}
.face{
    background-color: #f2f2f2;
    box-shadow: 10px 10px #333333;
    max-width: 100%;
    text-align: center; 
    height: 100%;
    position: absolute;
}
h3{
    font-size: 18px;
}
.modal{
    width: 100%;
}

.fade{
    width: 100%;
}

    
</style>
<body>
    <div class='face'>
<h1 class="search">Results</h1>


<?php
if (isset($_POST['ssearch'])) {
    $search = mysqli_real_escape_string($conn, $_POST['ssearch']);
    $sql="SELECT * FROM student WHERE user_lrn LIKE '%$search%' OR user_grade LIKE '%$search%' OR user_section LIKE '%$search%' OR user_first LIKE '%$search%' OR user_last LIKE '%$search%' OR user_middle LIKE '%$search%' OR user_suffix LIKE '%$search%' OR user_email LIKE '%$search%'";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "stmtfailed";
        exit();
    }
    $result= mysqli_query($conn, $sql);
    $queryResults = mysqli_num_rows($result);

        if ($queryResults > 0) { 
            echo "<div class='sresult' id='sresult'>There are ".$queryResults." result!";
            while ($row = mysqli_fetch_assoc($result)) { 
                echo "<form action='edit.php' method='POST'>
                <input type='hidden' name='lrn' value='".$row['user_lrn']."'>
                <p id='student'>
                    <h3 name='username' id='username'>
                        <h3>".$row['user_lrn']. "</h3>
                        <h3>".$row['user_first']. " " .$row['user_middle']." " .$row['user_last']. " ".$row['user_suffix']. "</h3>
                    </h3>
                    <button type='submit' name='edit-s' class='btn btn-primary'>Edit</button>
                    <button type='submit' name='delete-s' class='btn btn-secondary'>Delete</button>
                    <p id='sresult'></p>
                    </p></form>";
            }
            echo "</div>";
        }
        else{
            echo "There are no results";
        }
    }
?>
</div>
<script src="js/main.js"></script>

<script type="text/javascript">
  function form_submit() {
    document.getElementById("edit-form").submit();
   }    
  </script>
</body>


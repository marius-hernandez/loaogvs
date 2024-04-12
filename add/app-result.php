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
.face-t{
    background-color: #f2f2f2;
    width: 150%;
    text-align: center; 
    height: 100%;
    margin-left: 30px;
    
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
.container{
    text-align: center;
    width: 50%;
}

    
</style>
<body>
    <div class='face-t'>
<h1 class="search">Results</h1>


<?php
if (isset($_POST['search'])) {
    $search = mysqli_real_escape_string($conn, $_POST['search']);
    $sql="SELECT * FROM requests WHERE (user_year LIKE '%$search%' OR user_id LIKE '%$search%' OR user_first LIKE '%$search%' OR user_last LIKE '%$search%' OR user_middle LIKE '%$search%' OR user_suffix LIKE '%$search%' OR user_email LIKE '%$search%' OR user_date LIKE '%$search%')";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "stmtfailed";
        exit();
    }
    $result= mysqli_query($conn, $sql);
    $queryResults = mysqli_num_rows($result);

        if ($queryResults > 0) { 
            echo "<div class='result' id='result'>There are ".$queryResults." result!";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<form action='edit.php?year=".$row['user_year']."&id=".$row['user_id']."' method='POST'>
                <input type='hidden' name='year' value='".$row['user_year']."'>
                <input type='hidden' name='id' value='".$row['user_id']."'>
                <p id='student'>
                    <h3 name='username' id='username'>
                        <h1 class='jumbotron-heading'>".$row['user_first']." ".$row['user_last']."</h1>
                        <h1 class='jumbotron-heading'>".$row['user_year']."-".$row['user_id']."</h1>
                        <p class='lead text-muted'>".$row['user_message']."</p>
                        <p>
                            <a href='../accept.php?id=".$row['id']."' class='btn btn-success my-2'>Accept</a>
                            <a href='../reject.php?id=".$row['id']."' class='btn btn-danger my-2'>Reject</a>
                        </p>
                        <small><i>".$row['user_date']."</i></small>
                    </h3>
                    <p id='appresult'></p>
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


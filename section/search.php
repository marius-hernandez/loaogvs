<?php
    include 'include/dbh.inc.php';
    session_start();
    $section= $_SESSION['section'];
?>
<!DOCTYPE html>
 
<html>
<head>
 <title>PHP MySQL Insert Tutorial</title>
        <script src='https://code.jquery.com/jquery-2.1.3.min.js'></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src='https://code.jquery.com/jquery-2.1.3.min.js'></script>
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
    margin-left: 400px;
    text-align: center; 
    
}
h3{
    font-size: 18px;
}

    
</style>
 
<body>
    <div class='face'>
<h1 class="search">Search Page</h1>


<?php
if (isset($_POST['search'])) {
    $sqlsec="SELECT * FROM section WHERE class_name='$section' ";
    $resultsec= mysqli_query($conn, $sqlsec);
    $queryResultssec = mysqli_num_rows($resultsec);
    $row2 = mysqli_fetch_assoc($resultsec);
    $name = mysqli_real_escape_string($conn, $_GET['name']);
    error_reporting(0);
    $search = mysqli_real_escape_string($conn, $_POST['search']);

    

    $sql="SELECT * FROM student WHERE user_lrn LIKE '%$search%' OR user_grade LIKE '%$search%' OR user_section LIKE '%$search%' OR user_first LIKE '%$search%' OR user_last LIKE '%$search%' OR user_middle LIKE '%$search%' OR user_suffix LIKE '%$search%' OR user_email LIKE '%$search%'";
    
    $result= mysqli_query($conn, $sql);
    $queryResults = mysqli_num_rows($result);
    

        if ($queryResults > 0) {
            echo "<div class='result'>There are ".$queryResults." result!";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<form action='add.php?name=add&section=".$row2['class_name']."&grade=".$row2['class_grade']."&track=".$row2['class_track']."&strand=".$row2['class_strand']."&spec=".$row2['class_spec']."' method='post' id='myform'>
                <p id='student'>
                    <h3 name='username' id='username'>
                        <input type='hidden' name='lrn' placeholder='lrn' id='username' value='".$row['user_lrn']."' />
                        <h3>".$row['user_first']. " " .$row['user_middle']." " .$row['user_last']. " ".$row['user_suffix']. "</h3>
                        <h3>".$row['user_lrn']. "</h3>
                    </h3>
                <button id='insert' class='btn btn-primary'>Add</button>
                <p id='result'></p>
                </p>
                </form>";
            }
            echo "</div>";
        }
        else{
            echo "There are no results";
        }
}
    


?>
</div>
</body>
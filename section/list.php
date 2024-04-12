<?php
session_start();
    $section= mysqli_real_escape_string($conn, $_GET['section']);
    $_SESSION['section'] = $section;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Students</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src='https://code.jquery.com/jquery-2.1.3.min.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
</head>
<script>
    $('#myform').submit(function(){
    return false;
    });
    
    $('#insert').click(function(){
    $.post( 
    $('#myform').attr('action'),
    $('#myform :#student').serializeArray(),
    function(result){
    $('#result').html(result);
    }
    );
    });
</script>
<style>
body{
    background-color: #f4fcff;
}
table.fixed { 
    table-layout:fixed; 
    }
table.fixed td { 
    overflow: hidden; 
    }
table td{
    font-size: 20px;
    margin: 0px;
    
}
#myTable{
    box-shadow: 7px 7px gray;
    margin: 0px;
    width: 100%;
}
table th{
    background-color: #3a6289;
    color: white;
    margin: 0px;
}

input[type=text]{
    height: 10%;
    width: 100%;
    resize: vertical;
    font-size: 24px;
    margin: 0px;
}

select{
    height: 10%;
    width: 100%;
    resize: vertical;
    font-size: 2vw;
    margin: 0px;
    border: 0;
}

button #edit{
    height: 50px;
}


@media screen and (max-width: 600px) {
    table td{
    font-size: 12px;
    height: 1px;
    }
    input, select{
        font-size: 12px;
    }

}
</style>
<body>
<?php
$active_input= "nav__link";
$active_section= "nav__link";
$active_student= "nav__link active";
$active_add_student= "nav__link"; 
echo "<h1 class='title'>List of Students of ".$section."</h1>";
echo "<p align='center'>Please input the exact email of parents</p>";
echo "<p align='center'>If the student data is wrong, you can modify by clicking the cell and click Save</p>";
echo "<p align='center'>Be informed that anything you modify does only change the data linked in your account </p>";
$sqlsec="SELECT * FROM section WHERE class_name='$section' ";
    $resultsec= mysqli_query($conn, $sqlsec);
    $queryResultssec = mysqli_num_rows($resultsec);
    $row2 = mysqli_fetch_assoc($resultsec);
    $name = mysqli_real_escape_string($conn, $_GET['name']);
    error_reporting(0);
    $search = mysqli_real_escape_string($conn, $_POST['search']);
    
$sql="SELECT * from ".$section."_student";
$result = mysqli_query($conn, $sql);
     $queryResults= mysqli_num_rows($result);
        if ($queryResults > 0) {
            echo"<table border='1' id='myTable'>";
            echo"<tr align='center'>
                <th align='center'><h5>Student LRN</h5></th>
                <th align='center'><h5>Gender</h5></th>
                <th align='center'><h5>Last</h5></th>
                <th align='center'><h5>First</h5></th>
                <th align='center'><h5>Middle</h5></th>
                <th align='center'><h5>Suffix</h5></th>
                <th align='center'><h5>Irregular</h5></th>
                <th align='center'><h5>Parent Email</h5></th>
                <th align='center' colspan='2'><h5>Action</h5></th>
            </tr>";
            while ($row = mysqli_fetch_assoc($result)) {
        echo"
            <p id='student'>
            <h3 name='username' id='username'>
            <tr>
                    <form action='parent.php?section=".$section."' method=POST>
                    <input type='hidden' name='lrnlist' placeholder='lrn' id='lrn' value='".$row['student_lrn']."' />
                        <td align='center'><input type='number' name='lrn' placeholder='LRN' style='border:0' value='".$row['student_lrn']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '12' autocomplete='off'></td>
                        <td align='center'><input type='text' name='gender' placeholder='Gender' style='border:0' value='".$row['student_gender']."' autocomplete='off'></td>
                        <td align='center'><input type='text' name='last' placeholder='Last' style='border:0' value='".$row['student_last']."' autocomplete='new-password'></td>
                        <td align='center'><input type='text' name='first' placeholder='First' style='border:0' value='".$row['student_first']."' autocomplete='new-password'></td>
                        <td align='center'><input type='text' name='middle' placeholder='Middle' style='border:0' value='".$row['student_middle']."' autocomplete='new-password'></td>
                        <td align='center'><input type='text' name='suffix' placeholder='Suffix' style='border:0' value='".$row['student_suffix']."' autocomplete='new-password'></td>
                        <td align='center'>
                        <select name='irreg' id='' placeholder='hahah'>
                            <option value disabled>".$row['irregular']."</option>
                            <option>Regular</option>
                            <option>Irregular</option>
                        </select>
                        </td>
                        <td align='center'><input type='text' name='emailp' autocomplete='new-password' placeholder='leave empty if none' style='border:0' value='".$row['parent_email']."'></td>
                        <td align='center'><button class='btn btn-success' id='edit'>Save</button></td>
                    </form>
                <form action='add.php?name=delete&section=".$row2['class_name']."&grade=".$row2['class_grade']."&track=".$row2['class_track']."&strand=".$row2['class_strand']."&spec=".$row2['class_spec']."' method=POST>
                <input type='hidden' name='lrnlist' placeholder='lrn' id='lrn' value='".$row['student_lrn']."' />
                <td align='center'><button class='btn btn-danger' id='edit'>Delete</button></td>
                </form>
                </tr></h3></p>";
            }
            echo"</table>";
        }
        else {
            echo"There is no student listed";
        }

    ?>
    </form>
</body>
<script>
    (function() {
    var some_id = document.getElementById('some_id');
    some_id.type = 'text';
    some_id.removeAttribute('autocomplete');
})();
</script>
</html>
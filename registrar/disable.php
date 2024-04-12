<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src='https://code.jquery.com/jquery-2.1.3.min.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style>
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
</style>
</head>
<body>

<script>
    $(document).ready(function(){
        $(".click").click(function(){
            $.ajax({
                url: 'include/save.php',
                type: 'POST',
                data: {click: $(this).val()},
                success: function(sresult){
                    $("#sresult").html(sresult);
                }
            });
        });
        
    });

</script>

<?php
    $sql="SELECT * from disable_semester";
    $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: verti-header.php?name=archive&error=stmtfailed");
        exit();
        }
    $result= mysqli_query($conn, $sql);
    $queryResults = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    
    if ($row['first']=="yes") {
        $status_all= "";
        $status_first= "checked";
        $status_sec = "";
        $status_first_first = "";
        $status_first_sec = "";
        $status_sec_first = "";
        $status_sec_sec = "";
    }
    else if ($row['second']=="yes") {
        $status_all= "";
        $status_first= "";
        $status_sec = "checked";
        $status_first_first = "";
        $status_first_sec = "";
        $status_sec_first = "";
        $status_sec_sec = "";
    }
    else if ($row['first_first']=="yes") {
        $status_all= "";
        $status_first= "";
        $status_sec = "";
        $status_first_first = "checked";
        $status_first_sec = "";
        $status_sec_first = "";
        $status_sec_sec = "";
    }

    else if ($row['first_second']=="yes") {
        $status_all= "";
        $status_first= "";
        $status_sec = "";
        $status_first_first = "";
        $status_first_sec = "checked";
        $status_sec_first = "";
        $status_sec_sec = "";
    }

    else if ($row['second_first']=="yes") {
        $status_all= "";
        $status_first= "";
        $status_sec = "";
        $status_first_first = "";
        $status_first_sec = "";
        $status_sec_first = "checked";
        $status_sec_sec = "";
    }
    else if ($row['second_second']=="yes") {
        $status_all= "";
        $status_first= "";
        $status_sec = "";
        $status_first_first = "";
        $status_first_sec = "";
        $status_sec_first = "";
        $status_sec_sec = "checked";
    }
    else if ($row['all_all']=="yes") {
        $status_all= "checked";
        $status_first= "checked";
        $status_sec = "checked";
        $status_first_first = "checked";
        $status_first_sec = "checked";
        $status_sec_first = "checked";
        $status_sec_sec = "checked";
    }
    else{
        $status_all= "";
        $status_first= "";
        $status_sec = "";
        $status_first_first = "";
        $status_first_sec = "";
        $status_sec_first = "";
        $status_sec_sec = "";
    }

?>
<div class="align">
<h2>Toggle Switch</h2>

<label class="switch">
  <input type="checkbox" name="first" class="click" <?php echo $status_all; ?> value="first">
  <span class="slider round"></span>
</label>
<p>All semester/grading</p>
<label class="switch">
  <input type="checkbox" name="first" class="click" <?php echo $status_first; ?> value="first">
  <span class="slider round"></span>
</label>
<p>First Semester</p>
<label class="switch">
  <input type="checkbox" name="second" class="click" <?php echo $status_sec; ?> value="second">
  <span class="slider round"></span>
</label>
<p>Second Semester</p>
<label class="switch">
  <input type="checkbox" name="first_first" class="click" <?php echo $status_first_first; ?> value="first_first">
  <span class="slider round"></span>
</label>
<p>First Semester First Grading</p>
<label class="switch">
  <input type="checkbox" name="first_second" class="click" <?php echo $status_first_sec; ?> value="first_second">
  <span class="slider round"></span>
</label>
<p>First Semester Second Grading</p>
<label class="switch">
  <input type="checkbox" name="second_first" class="click" <?php echo $status_sec_first; ?> value="second_first">
  <span class="slider round"></span>
</label>
<p>Second Semester First Grading</p>
<label class="switch">
  <input type="checkbox" name="second_second" class="click" <?php echo $status_sec_sec; ?> value="second_second">
  <span class="slider round"></span>
</label>
<p>Second Semester Second Grading</p>
</div>
    <span id="sresult"></span>
</body>
</html> 

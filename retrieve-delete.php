<?php
    include('functions.php');
    include_once 'include/dbh.inc.php';
    $id = $_POST['id'];
    if (isset($_POST['retrieve'])) {
        $query = "select * from `requests_bin` where `id` = '$id'; ";
        if(count(fetchAll($query)) > 0){
            foreach(fetchAll($query) as $row){
                $year = $row['user_year'];
                $sid = $row['user_id'];
                $gender = $row['user_gender'];
                $first = $row['user_first'];
                $last = $row['user_last'];
                $middle = $row['user_middle'];
                $suffix = $row['user_suffix'];
                $email = $row['user_email'];
                $password = $row['user_pwd'];
                $message = $row['user_message'];
                $date = $row['user_date'];
                $type = $row['type'];
                $query = "INSERT INTO `requests` (`id`,`user_year`,`user_id`,`user_gender`,`user_first`, `user_last`, `user_middle`, `user_suffix`,`user_email`, `user_pwd` , `user_message`, `user_date`, `type`) VALUES (NULL, '$year','$sid', '$gender','$first', '$last','$middle','$suffix','$email', '$password', '$message', '$date', '$type');";
                if(performQuery($query)){
                    $query = "DELETE FROM `requests_bin` WHERE `requests_bin`.`id` = '$id';";
                    if(performQuery($query)){
                        $message=$first . " " . $last . " account has been retrieved from the ignore bin";
                        $query = "INSERT INTO `requests_log` (`id`, `user_date`, `user_message`, `user_year`, `user_id`,`user_gender`, `user_first`, `user_last`, `user_middle`, `user_suffix`,`user_email`, `user_pwd`) VALUES (NULL, CURRENT_TIMESTAMP, '$message', '$year','$sid', '$gender','$first', '$last','$middle','$suffix','$email', '$password');";
                        if(performQuery($query)){
                        header("location:registrar/verti-header.php?name=ignore&error=noneRetrieve");
                        }
                        else{
                            echo "Unknown error occured. Please try again.";
                        }
                    }else{
                        echo "Unknown error occured. Please try again.";
                        header("location:registrar/verti-header.php?name=app");
                    }
                }else{
                    echo "<script>alert('Unknown error, please try again')</script>";
                }
            }
            
    }else{
        echo "Error occured.";
    }
    
    }
    else if (isset($_POST['delete'])) {
        $query = "select * from `requests_bin` where `id` = '$id'; ";
        if(count(fetchAll($query)) > 0){
            foreach(fetchAll($query) as $row){
                $year = $row['user_year'];
                $sid = $row['user_id'];
                $gender = $row['user_gender'];
                $first = $row['user_first'];
                $last = $row['user_last'];
                $middle = $row['user_middle'];
                $suffix = $row['user_suffix'];
                $email = $row['user_email'];
                $password = $row['user_pwd'];
                $message = $row['user_message'];
                $date = $row['user_date'];
                $type = $row['type'];
                $message=$first . " " . $last . " account has been deleted from the ignore bin";
                        $query = "INSERT INTO `requests_log` (`id`, `user_date`, `user_message`, `user_year`, `user_id`,`user_gender`, `user_first`, `user_last`, `user_middle`, `user_suffix`,`user_email`, `user_pwd`) VALUES (NULL, CURRENT_TIMESTAMP, '$message', '$year','$sid', '$gender','$first', '$last','$middle','$suffix','$email', '$password');";
                        if(performQuery($query)){
                            $query = "DELETE FROM `requests_bin` WHERE `requests_bin`.`id` = '$id';";
                            if(performQuery($query)){
                                header("location:registrar/verti-header.php?name=ignore&error=noneDelete");
                                
                            }else{
                                echo "Unknown error occured. Please try again.";
                                header("location:registrar/verti-header.php?name=app");
                            }
                        }
                        else{
                            echo "Unknown error occured. Please try again.";
                        }
                    }
        }
    }

    elseif (isset($_POST['delete_student'])) {
        $id= $_POST['id'];
        $section= mysqli_real_escape_string($conn, $_GET['section']);

        $sql = "UPDATE ".$section."_student SET status='1' WHERE id='$id';";
          $stmt = mysqli_stmt_init($conn);
          if (!mysqli_stmt_prepare($stmt, $sql)) {
              echo "stmt failed";
              echo $section;
              exit();
          }
          $result= mysqli_query($conn, $sql);


        $sql11="SELECT * from ".$section."_student WHERE id='$id'";
          $stmt = mysqli_stmt_init($conn);
          if (!mysqli_stmt_prepare($stmt, $sql11)) {
              echo "stmt failed";
              echo $section;
              exit();
          }
          $result11= mysqli_query($conn, $sql11);
          $queryResults11 = mysqli_num_rows($result11);
          $rowt = mysqli_fetch_assoc($result11);
          $gender= $rowt['student_gender'];
          $first= $rowt['student_first'];
          $last= $rowt['student_last'];
          $middle= $rowt['student_middle'];
          $suffix= $rowt['student_suffix'];
          $parent_email= $rowt['parent_email'];
          $parent_email1= $rowt['parent_email1'];
          $parent_email2= $rowt['parent_email2'];
          $parent_email3= $rowt['parent_email3'];

          $sql1 = "INSERT INTO student_bin(student_gender, student_first, student_last, student_middle, student_suffix, parent_email, parent_email1, parent_email2, parent_email3, section) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
            $stmt=mysqli_stmt_init($conn);
    
            if (!mysqli_stmt_prepare($stmt, $sql1)) {
                echo "stmt";
                exit();
        
            }
            mysqli_stmt_bind_param($stmt, "ssssssssss", $gender, $first, $last, $middle, $suffix, $parent_email, $parent_email1, $parent_email2, $parent_email3, $section);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);

            header("location: registrar/verti-header.php?name=section_list&section=".$section."&error=none");
            exit();


    }
    else{
        echo "error";
    }
    

    

?>
<br/><br/>
<a href="home.php">Back</a>
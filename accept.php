<?php
    include('functions.php');
    $id = $_GET['id'];
    $query = "select * from `requests` where `id` = '$id'; ";
    
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
            $type = $row['type'];
            $query = "INSERT INTO `teacher` (`id`,`user_year`,`user_id`,`user_gender`,`user_first`, `user_last`, `user_middle`, `user_suffix`,`user_email`, `user_pwd` , `user_photo`, `type`) VALUES (NULL, '$year','$sid', '$gender','$first', '$last','$middle','$suffix','$email', '$password', NULL, '$type');";
            performQuery($query);
        }
        $query = "DELETE FROM `requests` WHERE `requests`.`id` = '$id';";
            if(performQuery($query)){
                echo "<script>alert('Account has been accepted')</script>";
                $mess=$first . " " . $last . " account has been approved";
                    $query = "INSERT INTO `requests_log` (`id`, `user_date`, `user_message`, `user_year`, `user_id`,`user_gender`, `user_first`, `user_last`, `user_middle`, `user_suffix`,`user_email`, `user_pwd`) VALUES (NULL, CURRENT_TIMESTAMP, '$mess', '$year','$sid', '$gender','$first', '$last','$middle','$suffix','$email', '$password');";
                    if(performQuery($query)){
                        echo "Account has been rejected.";
                        header("location:registrar/verti-header.php?name=app");
                    }else{
                        echo "Unknown error occured. Please try again.";
                        header("location:registrar/verti-header.php?name=app");
                    }
                    header("location:registrar/verti-header.php?name=app");
            }else{
                echo "<script>alert('Unknown error, please try again')</script>";
                header("location:registrar/verti-header.php?name=app");
            }
    }else{
        echo "Error occured.";
    }
    
?>
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
                header("location:approval.php");
            }else{
                echo "<script>alert('Unknown error, please try again')</script>";
                header("location:approval.php");
            }
    }else{
        echo "Error occured.";
    }
    
?>
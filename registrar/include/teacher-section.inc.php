<?php
    require '../../include/dbh.inc.php';
    require '../../include/functions.inc.php';

    

if (isset($_POST["submit"])) {
    $class= $_POST["class"];
    $first= $_POST["first"];
    $last= $_POST["last"];

    $sql = "UPDATE section SET teacher_first='$first', teacher_last='$last'  WHERE class_name='$class'";
    $stmt=mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "stmt";
            exit();
        }
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../verti-header.php?name=app&error=none");

    /*$sql = "UPDATE `section` SET `teacher_last`='$last' AND `teacher_first`='$first' WHERE `class_name`='$class'";

                $stmt=mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("location: ../verti-header.php?name=app&error=stmtfailed");
                    exit();
                }
                mysqli_stmt_execute($stmt);
                header("location: ../verti-header.php?name=app&error=none");
                */
}

else if (isset($_POST["ssubmit"])) {
    $class= $_POST["class"];
    $last= $_POST["teacher"];

    $sqla="SELECT * from requests WHERE user_last='$last'";
    $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sqla)) {
        echo "stmt";
        exit();
    }
    $resulta= mysqli_query($conn, $sqla);
    $queryResultsa = mysqli_num_rows($resulta);
    $rowa = mysqli_fetch_assoc($resulta);
    if ($queryResultsa==0) {
        $sqlt="SELECT * from teacher WHERE user_last='$last'";
        $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sqlt)) {
                echo "stmt";
            exit();
        }
        $resultt= mysqli_query($conn, $sqlt);
        $queryResultst = mysqli_num_rows($resultt);
        $rowt = mysqli_fetch_assoc($resultt);
        if ($queryResultst==0) {
        echo "error error";
        }
        else{

            $sql = "UPDATE section SET teacher_first='".$rowt[user_first]."', teacher_last='".$rowt['user_last']."' WHERE class_name='".$class."'";
            $stmt=mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo "stmtTeacher";
                    exit();
                }
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            header("location: ../verti-header.php?name=section_list&section=".$class."&error=none");
        }
    }
    else{
        $sql = "UPDATE section SET teacher_first='".$rowa[user_first]."', teacher_last='".$rowa['user_last']."' WHERE class_name='".$class."'";
            $stmt=mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo "stmtTeacher";
                    exit();
                }
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            header("location: ../verti-header.php?name=section_list&section=".$class."&error=none");
    }



    
}
else{
    header("location: ../verti-header.php?name=app");
    exit();
}

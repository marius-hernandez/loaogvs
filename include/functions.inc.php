
<?php

function emptyInputSignup($lrn, $grade, $section, $gender, $first, $last, $pwd, $conpwd){
    $result;
    if (empty($lrn) || empty($grade) || empty($section) ||empty($gender) ||empty($first) || empty($last)|| empty($pwd)|| empty($conpwd)) {
        $result= true;
    }
    else {
        $result=false;
    }
    return $result;
}

function emptyInputStudent($lrn, $gender, $first, $last){
    $result;
    if (empty($lrn) || empty($gender) ||empty($first) || empty($last)) {
        $result= true;
    }
    else {
        $result=false;
    }
    return $result;
}

function emptyInputSignupT($year, $id, $gender, $first, $last, $email, $pwd, $conpwd){
    $result;
    if (empty($year) ||empty($id) ||empty($gender) ||empty($first) || empty($last)||  empty($email)|| empty($pwd)|| empty($conpwd)) {
        $result= true;
    }
    else {
        $result=false;
    }
    return $result;
}

function emptyInputSignupA($gender, $first, $last, $email, $pwd, $conpwd){
    $result;
    if (empty($gender) ||empty($first) || empty($last)||  empty($email)|| empty($pwd)|| empty($conpwd)) {
        $result= true;
    }
    else {
        $result=false;
    }
    return $result;
}

function emptyInputSubject($s1, $s2, $s3, $s4, $s5){
    $result;
    if (empty($s1) || empty($s2) || empty($s3) || empty($s4) ||empty($s5)) {
        $result= true;
        
    }
    else {
        $result=false;
    }
    return $result;
}

function emptyInputClass($class, $grade, $track, $strand, $spec){
    $result;
    if (empty($class) || empty($grade) || empty($track) || empty($strand) || empty($spec)) {
        $result= true;
        
    }
    else {
        $result=false;
    }
    return $result;
}


function nameExists($conn, $first, $last, $middle){
    $sql="SELECT * FROM student WHERE user_first= ? AND user_last= ? AND user_middle = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "sss", $first, $last, $middle);
    mysqli_stmt_execute($stmt);

    $resultData=mysqli_stmt_get_result($stmt);

    if ($row= mysqli_fetch_assoc($resultData)) {
        return $row;
    }

    else {
        $result=false;
        return $result;
        
        
    }
    mysqli_stmt_close($stmt);
}

function lrnExists($conn, $lrn){
    $sql="SELECT * FROM student WHERE user_lrn= ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "i", $lrn);
    mysqli_stmt_execute($stmt);

    $resultData=mysqli_stmt_get_result($stmt);

    if ($row= mysqli_fetch_assoc($resultData)) {
        return $row;
    }

    else {
        $result=false;
        return $result;
        
        
    }
    mysqli_stmt_close($stmt);
}

function classlrnExists($conn, $lrn){
    $sql="SELECT * FROM ".$class."_student WHERE student_lrn= ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "i", $lrn);
    mysqli_stmt_execute($stmt);

    $resultData=mysqli_stmt_get_result($stmt);

    if ($row= mysqli_fetch_assoc($resultData)) {
        return $row;
    }

    else {
        $result=false;
        return $result;
        
        
    }
    mysqli_stmt_close($stmt);
}

function emailExists($conn, $email){
    $sql="SELECT * FROM student WHERE user_email= ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultData=mysqli_stmt_get_result($stmt);

    if ($row= mysqli_fetch_assoc($resultData)) {
        return $row;
    }

    else {
        $result=false;
        return $result;
        
        
    }
    mysqli_stmt_close($stmt);
}

function parentEmailExists($conn, $email){
    $sql="SELECT * FROM ".$section."_student WHERE parent_email= ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $emailp);
    mysqli_stmt_execute($stmt);

    $resultData=mysqli_stmt_get_result($stmt);

    if ($row= mysqli_fetch_assoc($resultData)) {
        return $row;
    }

    else {
        $result=false;
        return $result;
        
        
    }
    mysqli_stmt_close($stmt);
}



function minimum($core1first, $core2first, $core3first, $app1first, $app2first, $app3first, $app4first, $app5first, $core1sec, $core2sec, $core3sec, $app1sec, $app2sec, $app3sec, $app4sec, $app5sec){
    $h=100;
    $l=60;
    if ($core1first >101) {
        echo "Malaki";
    }
    else if ($core1first<60) {
        echo "Maliit";
    }
    else{
        echo "No";
    }
}



















function nameExistsT($conn, $first, $last, $middle){
    $sql="SELECT * FROM teacher WHERE user_first= ? AND user_last= ? AND user_middle = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "sss", $first, $last, $middle);
    mysqli_stmt_execute($stmt);

    $resultData=mysqli_stmt_get_result($stmt);

    if ($row= mysqli_fetch_assoc($resultData)) {
        return $row;
    }

    else {
        $result=false;
        return $result;
        
        
    }
    mysqli_stmt_close($stmt);
}

function studentExists($conn, $lrn){
    $section=$_SESSION['section'];
    $sqlout="SELECT * FROM ".$section."_student WHERE student_lrn= ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqlout)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $lrn);
    mysqli_stmt_execute($stmt);

    $resultData=mysqli_stmt_get_result($stmt);

    if ($row= mysqli_fetch_assoc($resultData)) {
        return $row;
    }

    else {
        $result=false;
        return $result;
        
        
    }


    $sql="SELECT * FROM ".$section."_student WHERE student_lrn= ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $lrn);
    mysqli_stmt_execute($stmt);

    $resultData=mysqli_stmt_get_result($stmt);

    if ($row= mysqli_fetch_assoc($resultData)) {
        return $row;
    }

    else {
        $result=false;
        return $result;
        
        
    }
    mysqli_stmt_close($stmt);
}



function idExistsT($conn, $teacherid){
    $sql="SELECT * FROM teacher WHERE user_year= ? AND user_id= ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $teacherid[0], $teacherid[1]);
    mysqli_stmt_execute($stmt);

    $resultData=mysqli_stmt_get_result($stmt);

    if ($row= mysqli_fetch_assoc($resultData)) {
        return $row;
    }

    else {
        $result=false;
        return $result;
        
        
    }
    mysqli_stmt_close($stmt);
}

function requestExists($conn, $teacherid){
    $sql="SELECT * FROM requests WHERE user_year= ? AND user_id= ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $teacherid[0], $teacherid[1]);
    mysqli_stmt_execute($stmt);

    $resultData=mysqli_stmt_get_result($stmt);

    if ($row= mysqli_fetch_assoc($resultData)) {
        return $row;
    }

    else {

        $sql="SELECT * FROM requests_bin WHERE user_year= ? AND user_id= ?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../signup.php?error=stmtfailed");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "ss", $teacherid[0], $teacherid[1]);
        mysqli_stmt_execute($stmt);

        $resultData=mysqli_stmt_get_result($stmt);

        if ($row= mysqli_fetch_assoc($resultData)) {
            return $row;
        }

        else {
            $result=false;
            return $result;
        }
    }
    mysqli_stmt_close($stmt);
}

function emailExistsT($conn, $email){
    $sql="SELECT * FROM teacher WHERE user_email= ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultData=mysqli_stmt_get_result($stmt);

    if ($row= mysqli_fetch_assoc($resultData)) {
        return $row;
    }

    else {
        $result=false;
        return $result;
        
        
    }
    mysqli_stmt_close($stmt);
}






function invalidEmail($email){
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result= true;
    }
    else {
        $result=false;
    }
    return $result;
}

function classinvalidEmail($emailp){
    $result;
    if (!filter_var($emailp, FILTER_VALIDATE_EMAIL)) {
        $result= true;
    }
    else {
        $result=false;
    }
    return $result;
}

function pwdMatch($pwd, $conpwd){
    $result;
    if ($pwd !== $conpwd) {
        $result= true;
    }
    else {
        $result=false;
    }
    return $result;
}

function specMatch($strand, $spec){
    $result;
    if ($strand == "ICT") {
        if ($spec == "ICT Animation") {
            $result=false;
        }
        else if ($spec == "ICT CSS") {
            $result=false;
        }
        else if ($spec == "ICT Programming") {
            $result=false;
        }
        else {
            $result=true;
        }
        
    }
    else if ($strand == "HE") {
        if ($spec == "HE Cookery") {
            $result=false;
        }
        else if ($spec == "HE Tourism") {
            $result=false;
        }
        else {
            $result=true;
        }
    }
    else if ($strand == "IA") {
        if ($spec == "IA Automotive") {
            $result=false;
        }
        else if ($spec == "IA SMAW") {
            $result=false;
        }
        else {
            $result=true;
        }
    }
    elseif ($spec == "None") {
        $result=false;
    }
    return $result;
}

function invalidpwd($pwd){
    $result;
    if ($pwd > '25') {
        $result= false;
    }
    else {
        $result=true;
    }
    return $result;
}


    

function createUser($conn, $lrn, $grade, $track, $strand, $spec, $section, $gender,$first, $last, $middle, $suffix, $email, $pwd){
    $type="student";
    $sql = "INSERT INTO student(user_lrn, user_grade, user_track, user_strand, user_spec, user_section, user_gender, user_first, user_last, user_middle, user_suffix, user_email, user_pwd, type) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $stmt=mysqli_stmt_init($conn);
 
     if (!mysqli_stmt_prepare($stmt, $sql)) {
         header("location: ../verti-header.php?error=stmtfaileda");
         exit();
     }
     
     $hashedPwd=password_hash($pwd, PASSWORD_DEFAULT);
 
     mysqli_stmt_bind_param($stmt, "ssssssssssssss", $lrn, $grade, $track, $strand, $spec, $section, $gender, $first, $last, $middle, $suffix, $email, $hashedPwd, $type);
     mysqli_stmt_execute($stmt);
     mysqli_stmt_close($stmt);
     header("location: ../verti-header.php?name=add-student&&error=none");
    exit();
 }

 function createUserT($conn, $admin, $teacherid, $gender, $first, $last, $middle, $suffix, $email, $pwd, $type){
    if ($admin==="admin"){
        $sql = "INSERT INTO teacher(user_year, user_id, user_gender, user_first, user_last, user_middle, user_suffix, user_email, user_pwd, type) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
        $stmt=mysqli_stmt_init($conn);
 
     if (!mysqli_stmt_prepare($stmt, $sql)) {
         header("location: ../signup.php?error=stmtfailed");
         exit();
    
     }
    
    $hashedPwd=password_hash($pwd, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ssssssssss", $year, $id, $gender, $first, $last, $middle, $suffix, $email, $hashedPwd, $type);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../verti-header.php?error=none&&name=admin");
    exit();
    }

    if ($admin==="registrar"){
        $sql = "INSERT INTO teacher(user_year, user_id, user_gender, user_first, user_last, user_middle, user_suffix, user_email, user_pwd, type) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
        $stmt=mysqli_stmt_init($conn);
 
     if (!mysqli_stmt_prepare($stmt, $sql)) {
         header("location: ../signup.php?error=stmtfailed");
         exit();
    
     }
    
    $hashedPwd=password_hash($pwd, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ssssssssss", $year, $id, $gender, $first, $last, $middle, $suffix, $email, $hashedPwd, $type);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../verti-header.php?error=none&&name=admin");
    exit();
    }

    elseif ($admin==="request") {
        $message="This user would like to request an account.";
        $sql = "INSERT INTO requests(user_year, user_id, user_gender, user_first, user_last, user_middle, user_suffix, user_email, user_pwd, user_message, user_date, type) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?,CURRENT_TIMESTAMP,?);";
        $stmt=mysqli_stmt_init($conn);
 
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../signup.php?error=stmtfailed");
            exit();
    
        }
        $hashedPwd=password_hash($pwd, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "sssssssssss", $teacherid[0], $teacherid[1], $gender, $first, $last, $middle, $suffix, $email, $hashedPwd, $message, $type);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../login.php?not=pending");
        exit();
    }
    elseif ($admin==="teacher"){
        $sql = "INSERT INTO teacher(user_year, user_id, user_gender, user_first, user_last, user_middle, user_suffix, user_email, user_pwd, type) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
        $stmt=mysqli_stmt_init($conn);
 
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../signup.php?error=stmtfailed");
            exit();
        
        }
        
        $hashedPwd=password_hash($pwd, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssssssssss", $year, $id, $gender, $first, $last, $middle, $suffix, $email, $hashedPwd, $type);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../verti-header.php?error=none&&name=teacher");
        exit();
    }
    
    
        
 }

 

 function emptyInputLogin($email, $pwd){
    $result;
    if (empty($email)|| empty($pwd)) {
        $result= true;
    }
    else {
        $result=false;
    }
    return $result;
}

 function loginUser($conn, $email, $pwd){
     $emailExists=emailExists($conn,$email);
     $emailExistsT= emailExistsT($conn,$email);

    if ($emailExists xor $emailExistsT === false) {
        header("location: ../login.php?error=wrongloginS");
        
    }

    else if ($emailExists) {
        $pwdHashed = $emailExists["user_pwd"];
        $checkPwd=password_verify($pwd, $pwdHashed);

        if ($checkPwd === false) {
            header("location: ../login.php?error=wronglogin");
        }
        elseif ($checkPwd === true) {
            session_start();
            $sid = session_id();
            $_SESSION["id"] =  $emailExists["id"];
            $_SESSION["userlrn"] =  $emailExists["user_lrn"];
            $_SESSION["usergrade"] =  $emailExists["user_grade"];
            $_SESSION["usersection"] =  $emailExists["user_section"];
            $_SESSION["usergender"] =  $emailExists["user_gender"];
            $_SESSION["userfirst"] =  $emailExists["user_first"];
            $_SESSION["userlast"] =  $emailExists["user_last"];
            $_SESSION["usermiddle"] =  $emailExists["user_middle"];
            $_SESSION["usersuffix"] =  $emailExists["user_suffix"];
            $_SESSION["useremail"] =  $emailExists["user_email"];
            $_SESSION["userpwd"] =  $emailExists["user_pwd"];
            $_SESSION["userimg"] =  $emailExists["user_img"];
            header("location: ../index.php");
            exit();
            }
        }

        else if ($emailExistsT) {
            $pwdHashed = $emailExistsT["user_pwd"];
            $checkPwd=password_verify($pwd, $pwdHashed);
    
            if ($checkPwd === false) {
                header("location: ../login.php?error=wronglogin");
            }
            elseif ($checkPwd === true) {
                session_start();
                $sid = session_id();
                $_SESSION["idt"] =  $emailExistsT["id"];
                $_SESSION["useryear"] =  $emailExistsT["user_year"];
                $_SESSION["userid"] =  $emailExistsT["user_id"];
                $_SESSION["usergender"] =  $emailExistsT["user_gender"];
                $_SESSION["userfirst"] =  $emailExistsT["user_first"];
                $_SESSION["userlast"] =  $emailExistsT["user_last"];
                $_SESSION["usermiddle"] =  $emailExistsT["user_middle"];
                $_SESSION["usersuffix"] =  $emailExistsT["user_suffix"];
                $_SESSION["useremail"] =  $emailExistsT["user_email"];
                $_SESSION["userpwd"] =  $emailExistsT["user_pwd"];
                $_SESSION["userimg"] =  $emailExistsT["user_img"];
                header("location: ../index.php");
                exit();
                    header("location: ../index.php");
                    exit();
                    }
                }
    else {
        header("location: ../login.php?error=bobo");
    }
 }

 function createSections($conn, $last, $first, $class, $grade, $track, $strand, $spec){
    $student="student";

    $sqlSection = "INSERT INTO section(teacher_first, teacher_last, class_name, class_grade, class_track, class_strand, class_spec) VALUES(?, ?, ?,?,?,?,?);";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqlSection)) {
        header("location: ../verti-header.php?name=add-section&&error=stmtfailed");
        exit();
    }
 
     mysqli_stmt_bind_param($stmt, "sssssss", $first, $last, $class, $grade, $track, $strand, $spec);
     mysqli_stmt_execute($stmt);

     mysqli_stmt_close($stmt);
     $sql = "CREATE TABLE ".$class."_student(
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        student_lrn varchar(255) NULL,
        student_gender varchar(255) NOT NULL,
        student_first varchar(255) NOT NULL,
        student_last varchar(255) NOT NULL,
        student_middle varchar(255) NOT NULL,
        student_suffix varchar(255) NOT NULL,
        parent_email varchar(255) NOT NULL,
        parent_email1 varchar(255) NOT NULL,
        parent_email2 varchar(255) NOT NULL,
        parent_email3 varchar(255) NOT NULL,
        sent varchar(255) NOT NULL,
        ifsent varchar(255) NOT NULL
    )";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../section/add-section.php?error=stmtfailedSQLSEC");
        exit();
    }
    mysqli_stmt_execute($stmt);


    $sql = "CREATE TABLE ".$class."_student_irregular(
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        student_lrn varchar(255) NULL,
        student_gender varchar(255) NOT NULL,
        student_first varchar(255) NOT NULL,
        student_last varchar(255) NOT NULL,
        student_middle varchar(255) NOT NULL,
        student_suffix varchar(255) NOT NULL,
        parent_email varchar(255) NOT NULL,
        parent_email1 varchar(255) NOT NULL,
        parent_email2 varchar(255) NOT NULL,
        parent_email3 varchar(255) NOT NULL,
        sent varchar(255) NOT NULL,
        ifsent varchar(255) NOT NULL
    )";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../section/add-section.php?error=stmtfailedSQLSEC");
        exit();
    }
    mysqli_stmt_execute($stmt);

    $sqlfirstfirst = "CREATE TABLE ".$class."_grade_first_first(
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        student_lrn varchar(255) NOT NULL,
        first_c_1 varchar(255) NOT NULL,
        first_c_2 varchar(255) NOT NULL,
        first_c_3 varchar(255) NOT NULL,
        first_c_4 varchar(255) NOT NULL,
        first_c_5 varchar(255) NOT NULL,
        first_c_6 varchar(255) NOT NULL,
        first_a_1 varchar(255) NOT NULL,
        first_a_2 varchar(255) NOT NULL,
        first_a_3 varchar(255) NOT NULL,
        first_a_4 varchar(255) NOT NULL,
        first_a_5 varchar(255) NOT NULL,
        first_first_ave varchar(255) NOT NULL,
        sent varchar(255) NOT NULL
        
    )";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqlfirstfirst)) {
        header("location: ../section/add-section.php?error=stmtfailedSQLSEC");
        exit();
    }
    mysqli_stmt_execute($stmt);

    $sqlfirstsec = "CREATE TABLE ".$class."_grade_first_sec(
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        student_lrn varchar(255) NOT NULL,
        first_c_1 varchar(255) NOT NULL,
        first_c_2 varchar(255) NOT NULL,
        first_c_3 varchar(255) NOT NULL,
        first_c_4 varchar(255) NOT NULL,
        first_c_5 varchar(255) NOT NULL,
        first_c_6 varchar(255) NOT NULL,
        first_a_1 varchar(255) NOT NULL,
        first_a_2 varchar(255) NOT NULL,
        first_a_3 varchar(255) NOT NULL,
        first_a_4 varchar(255) NOT NULL,
        first_a_5 varchar(255) NOT NULL,
        first_sec_ave varchar(255) NOT NULL,
        sent varchar(255) NOT NULL
        
    )";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqlfirstsec)) {
        header("location: ../section/add-section.php?error=stmtfailedSQLSEC");
        exit();
    }
    mysqli_stmt_execute($stmt);


    $sqlsecfirst = "CREATE TABLE ".$class."_grade_sec_first(
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        student_lrn varchar(255) NOT NULL,
        first_c_1 varchar(255) NOT NULL,
        first_c_2 varchar(255) NOT NULL,
        first_c_3 varchar(255) NOT NULL,
        first_c_4 varchar(255) NOT NULL,
        first_c_5 varchar(255) NOT NULL,
        first_c_6 varchar(255) NOT NULL,
        first_a_1 varchar(255) NOT NULL,
        first_a_2 varchar(255) NOT NULL,
        first_a_3 varchar(255) NOT NULL,
        first_a_4 varchar(255) NOT NULL,
        first_a_5 varchar(255) NOT NULL,
        sec_first_ave varchar(255) NOT NULL,
        sent varchar(255) NOT NULL
        
    )";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqlsecfirst)) {
        header("location: ../section/add-section.php?error=stmtfailedSQLSEC");
        exit();
    }
    mysqli_stmt_execute($stmt);

    $sqlsecsec = "CREATE TABLE ".$class."_grade_sec_sec(
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        student_lrn varchar(255) NOT NULL,
        first_c_1 varchar(255) NOT NULL,
        first_c_2 varchar(255) NOT NULL,
        first_c_3 varchar(255) NOT NULL,
        first_c_4 varchar(255) NOT NULL,
        first_c_5 varchar(255) NOT NULL,
        first_c_6 varchar(255) NOT NULL,
        first_a_1 varchar(255) NOT NULL,
        first_a_2 varchar(255) NOT NULL,
        first_a_3 varchar(255) NOT NULL,
        first_a_4 varchar(255) NOT NULL,
        first_a_5 varchar(255) NOT NULL,
        sec_sec_ave varchar(255) NOT NULL,
        sent varchar(255) NOT NULL
        
    )";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqlsecsec)) {
        header("location: ../section/add-section.php?error=stmtfailedSQLSEC");
        exit();
    }
    mysqli_stmt_execute($stmt);

    $sqlave = "CREATE TABLE ".$class."_ave(
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        student_lrn varchar(255) NOT NULL,
        ave_c_1 varchar(255) NOT NULL,
        ave_c_2 varchar(255) NOT NULL,
        ave_c_3 varchar(255) NOT NULL,
        ave_c_4 varchar(255) NOT NULL,
        ave_c_5 varchar(255) NOT NULL,
        ave_c_6 varchar(255) NOT NULL,
        ave_a_1 varchar(255) NOT NULL,
        ave_a_2 varchar(255) NOT NULL,
        ave_a_3 varchar(255) NOT NULL,
        ave_a_4 varchar(255) NOT NULL,
        ave_a_5 varchar(255) NOT NULL,
        ave varchar(255) NOT NULL,
        sent varchar(255) NOT NULL
        
    )";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqlave)) {
        header("location: ../section/add-section.php?error=stmtfailedSQLSEC");
        exit();
    }
    mysqli_stmt_execute($stmt);

    $sq2ave = "CREATE TABLE ".$class."_ave_sec(
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        student_lrn varchar(255) NOT NULL,
        ave_c_1 varchar(255) NOT NULL,
        ave_c_2 varchar(255) NOT NULL,
        ave_c_3 varchar(255) NOT NULL,
        ave_c_4 varchar(255) NOT NULL,
        ave_c_5 varchar(255) NOT NULL,
        ave_c_6 varchar(255) NOT NULL,
        ave_a_1 varchar(255) NOT NULL,
        ave_a_2 varchar(255) NOT NULL,
        ave_a_3 varchar(255) NOT NULL,
        ave_a_4 varchar(255) NOT NULL,
        ave_a_5 varchar(255) NOT NULL,
        ave_sec varchar(255) NOT NULL,
        sent varchar(255) NOT NULL
        
    )";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sq2ave)) {
        header("location: ../section/add-section.php?error=stmtfailedSQLSEC");
        exit();
    }
    mysqli_stmt_execute($stmt);

     header("location: ../verti-header.php?name=add-section&&error=none");
}
 


    

function createSection($conn, $class, $track, $strand, $spec){
    $student="student";

    $sqlSection = "INSERT INTO section(teacher_first, teacher_last, class_name, class_grade, class_track, class_strand, class_spec) VALUES(NULL, NULL, ?,?,?,?,?);";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqlSection)) {
        header("location: ../verti-header.php?name=add-section&&error=stmtfailed");
        exit();
    }
 
     mysqli_stmt_bind_param($stmt, "sssss", trim($class[1]), $class[0], $track, $strand, $spec);
     mysqli_stmt_execute($stmt);

     mysqli_stmt_close($stmt);

    
    $sql = "CREATE TABLE ".$class[1]."_student(
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        student_gender varchar(255) NOT NULL,
        student_first varchar(255) NOT NULL,
        student_last varchar(255) NOT NULL,
        student_middle varchar(255) NOT NULL,
        student_suffix varchar(255) NOT NULL,
        parent_email varchar(255) NOT NULL,
        parent_email1 varchar(255) NOT NULL,
        parent_email2 varchar(255) NOT NULL,
        parent_email3 varchar(255) NOT NULL,
        sent varchar(255) NOT NULL,
        ifsent varchar(255) NOT NULL,
        status int(11) NOT NULL
    )";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../section/add-section.php?error=stmtfailedSQLSEC");
        exit();
    }
    mysqli_stmt_execute($stmt);

    $sql = "CREATE TABLE ".$class[1]."_student_irregular(
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        student_gender varchar(255) NOT NULL,
        student_first varchar(255) NOT NULL,
        student_last varchar(255) NOT NULL,
        student_middle varchar(255) NOT NULL,
        student_suffix varchar(255) NOT NULL,
        parent_email varchar(255) NOT NULL,
        parent_email1 varchar(255) NOT NULL,
        parent_email2 varchar(255) NOT NULL,
        parent_email3 varchar(255) NOT NULL,
        sent varchar(255) NOT NULL,
        ifsent varchar(255) NOT NULL,
        status int(11) NOT NULL,
        first_c1 int(11) NOT NULL,
        first_c2 int(11) NOT NULL,
        first_c3 int(11) NOT NULL,
        first_c4 int(11) NOT NULL,
        first_c5 int(11) NOT NULL,
        first_a1 int(11) NOT NULL,
        first_a2 int(11) NOT NULL,
        first_a3 int(11) NOT NULL,
        first_a4 int(11) NOT NULL,
        first_a5 int(11) NOT NULL,
        sec_c1 int(11) NOT NULL,
        sec_c2 int(11) NOT NULL,
        sec_c3 int(11) NOT NULL,
        sec_c4 int(11) NOT NULL,
        sec_c5 int(11) NOT NULL,
        sec_a1 int(11) NOT NULL,
        sec_a2 int(11) NOT NULL,
        sec_a3 int(11) NOT NULL,
        sec_a4 int(11) NOT NULL,
        sec_a5 int(11) NOT NULL
    )";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../section/add-section.php?error=stmtfailedSQLSEC");
        exit();
    }
    mysqli_stmt_execute($stmt);

    $sqlfirstfirst = "CREATE TABLE ".$class[1]."_grade_first_first(
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        student_first varchar(255) NOT NULL,
        student_last varchar(255) NOT NULL,
        first_c_1 varchar(255) NOT NULL,
        first_c_2 varchar(255) NOT NULL,
        first_c_3 varchar(255) NOT NULL,
        first_c_4 varchar(255) NOT NULL,
        first_c_5 varchar(255) NOT NULL,
        first_c_6 varchar(255) NOT NULL,
        first_a_1 varchar(255) NOT NULL,
        first_a_2 varchar(255) NOT NULL,
        first_a_3 varchar(255) NOT NULL,
        first_a_4 varchar(255) NOT NULL,
        first_a_5 varchar(255) NOT NULL,
        first_first_ave varchar(255) NOT NULL,
        sent varchar(255) NOT NULL
        
    )";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqlfirstfirst)) {
        header("location: ../section/add-section.php?error=stmtfailedSQLSEC");
        exit();
    }
    mysqli_stmt_execute($stmt);

    $sqlfirstsec = "CREATE TABLE ".$class[1]."_grade_first_sec(
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        student_first varchar(255) NOT NULL,
        student_last varchar(255) NOT NULL,
        first_c_1 varchar(255) NOT NULL,
        first_c_2 varchar(255) NOT NULL,
        first_c_3 varchar(255) NOT NULL,
        first_c_4 varchar(255) NOT NULL,
        first_c_5 varchar(255) NOT NULL,
        first_c_6 varchar(255) NOT NULL,
        first_a_1 varchar(255) NOT NULL,
        first_a_2 varchar(255) NOT NULL,
        first_a_3 varchar(255) NOT NULL,
        first_a_4 varchar(255) NOT NULL,
        first_a_5 varchar(255) NOT NULL,
        first_sec_ave varchar(255) NOT NULL,
        sent varchar(255) NOT NULL
        
    )";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqlfirstsec)) {
        header("location: ../section/add-section.php?error=stmtfailedSQLSEC");
        exit();
    }
    mysqli_stmt_execute($stmt);


    $sqlsecfirst = "CREATE TABLE ".$class[1]."_grade_sec_first(
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        student_first varchar(255) NOT NULL,
        student_last varchar(255) NOT NULL,
        first_c_1 varchar(255) NOT NULL,
        first_c_2 varchar(255) NOT NULL,
        first_c_3 varchar(255) NOT NULL,
        first_c_4 varchar(255) NOT NULL,
        first_c_5 varchar(255) NOT NULL,
        first_c_6 varchar(255) NOT NULL,
        first_a_1 varchar(255) NOT NULL,
        first_a_2 varchar(255) NOT NULL,
        first_a_3 varchar(255) NOT NULL,
        first_a_4 varchar(255) NOT NULL,
        first_a_5 varchar(255) NOT NULL,
        sec_first_ave varchar(255) NOT NULL,
        sent varchar(255) NOT NULL
        
    )";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqlsecfirst)) {
        header("location: ../section/add-section.php?error=stmtfailedSQLSEC");
        exit();
    }
    mysqli_stmt_execute($stmt);

    $sqlsecsec = "CREATE TABLE ".$class[1]."_grade_sec_sec(
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        student_first varchar(255) NOT NULL,
        student_last varchar(255) NOT NULL,
        first_c_1 varchar(255) NOT NULL,
        first_c_2 varchar(255) NOT NULL,
        first_c_3 varchar(255) NOT NULL,
        first_c_4 varchar(255) NOT NULL,
        first_c_5 varchar(255) NOT NULL,
        first_c_6 varchar(255) NOT NULL,
        first_a_1 varchar(255) NOT NULL,
        first_a_2 varchar(255) NOT NULL,
        first_a_3 varchar(255) NOT NULL,
        first_a_4 varchar(255) NOT NULL,
        first_a_5 varchar(255) NOT NULL,
        sec_sec_ave varchar(255) NOT NULL,
        sent varchar(255) NOT NULL
        
    )";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqlsecsec)) {
        header("location: ../section/add-section.php?error=stmtfailedSQLSEC");
        exit();
    }
    mysqli_stmt_execute($stmt);

    $sqlave = "CREATE TABLE ".$class[1]."_ave(
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        student_first varchar(255) NOT NULL,
        student_last varchar(255) NOT NULL,
        ave_c_1 varchar(255) NOT NULL,
        ave_c_2 varchar(255) NOT NULL,
        ave_c_3 varchar(255) NOT NULL,
        ave_c_4 varchar(255) NOT NULL,
        ave_c_5 varchar(255) NOT NULL,
        ave_c_6 varchar(255) NOT NULL,
        ave_a_1 varchar(255) NOT NULL,
        ave_a_2 varchar(255) NOT NULL,
        ave_a_3 varchar(255) NOT NULL,
        ave_a_4 varchar(255) NOT NULL,
        ave_a_5 varchar(255) NOT NULL,
        ave varchar(255) NOT NULL,
        sent varchar(255) NOT NULL
        
    )";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqlave)) {
        header("location: ../section/add-section.php?error=stmtfailedSQLSEC");
        exit();
    }
    mysqli_stmt_execute($stmt);

    $sq2ave = "CREATE TABLE ".$class[1]."_ave_sec(
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        student_first varchar(255) NOT NULL,
        student_last varchar(255) NOT NULL,
        ave_c_1 varchar(255) NOT NULL,
        ave_c_2 varchar(255) NOT NULL,
        ave_c_3 varchar(255) NOT NULL,
        ave_c_4 varchar(255) NOT NULL,
        ave_c_5 varchar(255) NOT NULL,
        ave_c_6 varchar(255) NOT NULL,
        ave_a_1 varchar(255) NOT NULL,
        ave_a_2 varchar(255) NOT NULL,
        ave_a_3 varchar(255) NOT NULL,
        ave_a_4 varchar(255) NOT NULL,
        ave_a_5 varchar(255) NOT NULL,
        ave_sec varchar(255) NOT NULL,
        sent varchar(255) NOT NULL
        
    )";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sq2ave)) {
        header("location: ../section/add-section.php?error=stmtfailedSQLSEC");
        exit();
    }
    mysqli_stmt_execute($stmt);
    $result=true;
    return $result;
    exit();
    
 }

 

 function updateSection($conn, $last, $first, $class, $grade, $track, $strand){
    $sql = "UPDATE section SET teacher_last='$_POST[last]', teacher_first='$_POST[first]', class_name='$_POST[class]', class_grade='$_POST[grade]', class_track='$_POST[track]', class_strand= '$_POST[strand]' WHERE id='$_SESSION[id]';";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqlSection)) {
        header("location: ../section/add-section.php?error=stmtfailedSQLSEC");
        exit();
    }
    $_SESSION['class'] =  $_POST['class'];
    $_SESSION['class_grade'] =  $_POST['grade'];
    $_SESSION['class_track'] =  $_POST['track'];
    $_SESSION['class_strand'] =  $_POST['strand'];
 
     mysqli_stmt_bind_param($stmt, "ssssss", $last, $first, $class, $grade, $track, $strand);
     mysqli_stmt_execute($stmt);
     mysqli_stmt_close($stmt);

     header("location: ../all-section.php");
    exit();
 }

 function classExists($conn, $class){
    $sql="SELECT * FROM section WHERE class_name= ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $class[1]);
    mysqli_stmt_execute($stmt);

    $resultData=mysqli_stmt_get_result($stmt);

    if ($row= mysqli_fetch_assoc($resultData)) {
        return $row;
        exit();
    }

    else {
        $result=false;
        return $result;
        
        
    }
    mysqli_stmt_close($stmt);
}

function classesExists($conn, $class){
    $sql="SELECT * FROM section WHERE class_name= ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $class);
    mysqli_stmt_execute($stmt);

    $resultData=mysqli_stmt_get_result($stmt);

    if ($row= mysqli_fetch_assoc($resultData)) {
        return $row;
        exit();
    }

    else {
        $result=false;
        return $result;
        
        
    }
    mysqli_stmt_close($stmt);
}



function createClass($conn, $s1, $s2, $s3, $s4, $s5, $s6, $s7, $s8, $s9, $s10, $ss1, $ss2, $ss3, $ss4, $ss5, $ss6, $ss7, $ss8, $ss9, $ss10){
    $name= mysqli_real_escape_string($conn, $_GET['name']);
    $grade= mysqli_real_escape_string($conn, $_GET['grade']);
    $s1 = preg_replace('/\s+/', '_', $s1);
    $s2 = preg_replace('/\s+/', '_', $s2);
    $s3 = preg_replace('/\s+/', '_', $s3);
    $s4 = preg_replace('/\s+/', '_', $s4);
    $s5 = preg_replace('/\s+/', '_', $s5);
    $s6 = preg_replace('/\s+/', '_', $s6);
    $s7 = preg_replace('/\s+/', '_', $s7);
    $s8 = preg_replace('/\s+/', '_', $s8);
    $s9 = preg_replace('/\s+/', '_', $s9);
    $s10 = preg_replace('/\s+/', '_', $s10);
    $ss1 = preg_replace('/\s+/', '_', $ss1);
    $ss2 = preg_replace('/\s+/', '_', $ss2);
    $ss3 = preg_replace('/\s+/', '_', $ss3);
    $ss4 = preg_replace('/\s+/', '_', $ss4);
    $ss5 = preg_replace('/\s+/', '_', $ss5);
    $ss6 = preg_replace('/\s+/', '_', $ss6);
    $ss7 = preg_replace('/\s+/', '_', $ss7);
    $ss8 = preg_replace('/\s+/', '_', $ss8);
    $ss9 = preg_replace('/\s+/', '_', $ss9);
    $ss10 = preg_replace('/\s+/', '_', $ss10);

    $sql = "CREATE TABLE `".$name."1sem`(
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        student varchar(255) NOT NULL,
        `".$s1."` varchar(255) NOT NULL,
        `".$s2."` varchar(255) NOT NULL,
        `".$s3."` varchar(255) NOT NULL,
        `".$s4."` varchar(255) NOT NULL,
        `".$s5."` varchar(255) NOT NULL,
        `".$s6."` varchar(255) NOT NULL,
        `".$s7."` varchar(255) NOT NULL,
        `".$s8."` varchar(255) NOT NULL,
        `".$s9."` varchar(255) NOT NULL,
        `".$s10."` varchar(255) NOT NULL
        
        )";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../section/subject.php?error=stmtfailedSQLClass");
        exit();
    }
     mysqli_stmt_execute($stmt);
     mysqli_stmt_close($stmt);
     header("location: ../../index.php?error=none");
}


function rand_string( $length ) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    return substr(str_shuffle($chars),0,$length);
    $random=rand_string(8);
}


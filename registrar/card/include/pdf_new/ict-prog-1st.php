<?php
include_once '../../../../include/dbh.inc.php';
session_start();

$first= $_SESSION['userfirst'];
$last= $_SESSION['userlast'];
$sql = "SELECT * from teacher WHERE user_first='$first' AND user_last='$last'";
$stmt=mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "stmt";
    exit();
  }
$result= mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$middle= $row['user_middle'][0];
$suffix= $row['user_suffix'];
$teacher_name= $row['user_gender'] . " " . $row['user_first'] . " " . $middle . " " .$row['user_last'];
$teacher_email= $row['user_email'];


$first= mysqli_real_escape_string($conn, $_GET['first']);
$last= mysqli_real_escape_string($conn, $_GET['last']);
$surname = str_replace(',', ':', $last);
$student_name= $last . " " . $first . $suffix;
$section= mysqli_real_escape_string($conn, $_GET['section']);
$grading= mysqli_real_escape_string($conn, $_GET['grading']);

$sqlrow = "SELECT * from section WHERE class_name='$section'";
$stmt=mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sqlrow)) {
    echo "stmt";
    exit();
}
$resultrow= mysqli_query($conn, $sqlrow);
$rowrow = mysqli_fetch_assoc($resultrow);

if ($grading=="first") {
    $grading= "First Quarterly Grade";
    $gradingetc= "First Quarterly Academic Achievement/Progress Report";
    $sqlstudent = "SELECT * from ".$section."_grade_first_first WHERE student_first='$first' AND student_last='$last'";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqlstudent)) {
        echo "stmt";
        exit();
    }
    $resultstudent= mysqli_query($conn, $sqlstudent);
    $rows = mysqli_fetch_assoc($resultstudent);

    $sqlfinal = "SELECT * from ".$section."_student WHERE student_first='$first' AND student_last='$last'";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqlfinal)) {
        echo "stmt";
        exit();
    }
    $resultfinal= mysqli_query($conn, $sqlfinal);
    $rowgender = mysqli_fetch_assoc($resultfinal);

    if ($rowgender['student_gender'] == "Male") {
        $gender= "son";
    }
    elseif ($rowgender['student_gender']=="Female") {
        $gender= "daughter";
    }
    else {
        $gender = "error";
    }


    require('fpdf17/fpdf.php');

    $pdf = new FPDF('L','mm',array(235,285));

    $pdf->AddPage();


    //width, height, text, border, yung zero sa dulo, ibig sabihin hindi new line, pag ginawa mo itong 1, magla line break sya, tapos text align yung dulo
    /*
    $pdf->Cell(140, 5, 'Dear Parents', 0, 0, 'L');
    $pdf->Cell(10, 5, '', 0, 0, 'L');
    $pdf->Cell(140, 5, 'SF 9-SHS', 0, 1, 'L');
    $pdf->SetFont('Arial','B',10);
    $pdf->SetFont('');
    $pdf->Cell(140, 5, '            This   report  card   shows  the   ability   and   progress   your   child', 0, 0, 'L');
    $pdf->Cell(140, 5, 'Republic of the Philippines', 0, 1, 'C');
    */
    // Insert a logo in the top-left corner at 300 dpi

    $pdf->SetFont('Times','B',20);
    $pdf->Cell(140, 5, '', 0, 1, 'C');
    $pdf->Cell(140, 5, '', 0, 1, 'C');
    $pdf->Cell(275, 5, 'LYCEUM OF ALABANG INC.', 0, 1, 'C');
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(275, 5, 'KM 30 National Road, Tunasan, Muntinlupa City', 0, 1, 'C');
    $pdf->SetFont('Arial','U',10);
    $pdf->SetTextColor(6,69,173);
    $pdf->Cell(275, 5, 'www.lyceumalabang.edu.ph', 0, 1, 'C');
    $pdf->SetFont('Arial','B',14);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(140, 5, '', 0, 1, 'C');
    $pdf->Cell(140, 5, '', 0, 1, 'C');
    $pdf->Cell(275, 5, 'BASIC EDUCATION DEPARTMENT', 0, 1, 'C');
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(275, 5, 'Senior High School', 0, 1, 'C');
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(275, 5, 'School Year 2020-2021', 0, 1, 'C');
    $pdf->Cell(60, 5, '', 0, 0, 'C');
    $pdf->Cell(140, 5, ' _________________________________________________________________________________________________________________________________________________________', 0, 1, 'C');
    $pdf->Cell(140, 5, '', 0, 1, 'C');
    $pdf->Cell(8, 5, '', 0, 0, 'C');
    $pdf->SetFont('Arial','',11);
    $pdf->Cell(7, 5, 'TO:', 0, 0, 'L');
    $pdf->SetFont('Arial','B',11);
    $pdf->Cell(2, 5, 'The parent/guardians', 0, 1, 'L');
    $pdf->Cell(8, 5, '', 0, 0, 'C');
    $pdf->SetFont('Arial','',11);
    $pdf->Cell(13, 5, 'FROM:', 0, 0, 'L');
    $pdf->SetFont('Arial','B',11);
    #email add. ng Teacher
    $pdf->Cell(2, 5, $teacher_email, 0, 1, 'L');
    $pdf->Cell(8, 5, '', 0, 0, 'C');
    $pdf->SetFont('Arial','',11);
    $pdf->Cell(20, 5, 'SUBJECT:', 0, 0, 'L');
    $pdf->SetFont('Arial','B',11);
    #pangalan ng istudiyante
    $pdf->Cell(80, 5, $student_name, 0, 0, 'L');
    #kung anog quater na 
    $pdf->Cell(10, 5, $grading, 0, 1, 'L');
    $pdf->Cell(8, 10, '', 0,0, 'L');
    $pdf->SetFont('Arial','',11);   
    $pdf->Cell(25, 10, 'Dear Mr./Mrs. ', 0,0, 'L');
    #Apilyedo ng Student
    $pdf->Cell(8, 10, $surname, 0,0, 'L');
    $pdf->Cell(50, 10, '', 0, 1, 'L');
    $pdf->Cell(8, 10, '', 0, 0, 'L');
    $pdf->Cell(70, 5, 'Greetings of peace!', 0,0, 'L');
    $pdf->Cell(40, 10, '', 0, 1, 'L');
    $pdf->Cell(8, 10, '', 0, 0, 'L');
    $pdf->SetFont('Arial','',11);
    $pdf->Cell(85, 5, "We are happy to inform you of your son/daughter ", 0,0, 'L');
    $pdf->SetFont('Arial','B',11);
    #Dito naman kung anong Quater na
    $gradingetc = $gradingetc . ".";
    $pdf->Cell(106, 5, $gradingetc, 0,0, 'L');
    $pdf->SetFont('Arial','',11);
    $pdf->Cell(60, 5, 'This report shows the ability', 0,1, 'L');
    $pdf->Cell(7, 10, '', 0, 0, 'L');
    $pdf->Cell(70, 5, ' and progress of your student in different learning areas', 0,1, 'L');
    $pdf->Cell(8, 10, '', 0,1, 'L');
    $pdf->Cell(8, 10, '', 0,0, 'L');
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(22, 25, 'SUBJECT', 1,0, 'C');

    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $pdf->SetFont('Arial','B',8);
    $pdf->MultiCell(25, 6.2, '21st Century Literature from the Philippines and the World', 1,'C');
    $pdf->SetFont('Arial','B',10);
    $pdf->SetXY($x + 25, $y);
    $pdf->MultiCell(25, 8.3, 'Media and Information Literacy ', 1,'C');
    $pdf->SetXY($x + 50, $y);
    $pdf->MultiCell(25, 8.3, 'Physical Education and Health', 1,'C');
    $pdf->SetXY($x + 75, $y);
    $pdf->MultiCell(25, 12.5, 'Practical Research 2', 1,'C');
    $pdf->SetXY($x + 100, $y);
    $pdf->MultiCell(25, 6.2, 'Pagsulat sa Filipino sa Larangan ng TVL (ICT)', 1,'C');
    $pdf->SetXY($x + 125, $y);
    $pdf->MultiCell(25, 12.5, 'Entrepreneurship', 1,'C');
    $pdf->SetXY($x + 150, $y);
    $pdf->MultiCell(25, 8.3, 'System Analysis and Design', 1,'C');
    $pdf->SetXY($x + 175, $y);
    $pdf->MultiCell(25, 8.3, 'Event-Driven Database Programming', 1,'C');
    $pdf->SetXY($x + 200, $y);
    $pdf->MultiCell(25, 8.3, 'Average (Subject for Changes)', 1,'C');

    $pdf->Cell(8, 10, '', 0,0, 'L');
    $pdf->Cell(22, 5, 'Grade', 1,0, 'C');
    $pdf->Cell(25, 5, $rows['first_c_1'], 1,0, 'C');
    $pdf->Cell(25, 5, $rows['first_c_2'], 1,0, 'C');
    $pdf->Cell(25, 5, $rows['first_c_3'], 1,0, 'C');
    $pdf->Cell(25, 5, $rows['first_a_1'], 1,0, 'C');
    $pdf->Cell(25, 5, $rows['first_a_2'], 1,0, 'C');
    $pdf->Cell(25, 5, $rows['first_a_3'], 1,0, 'C');
    $pdf->Cell(25, 5, $rows['first_a_4'], 1,0, 'C');
    $pdf->Cell(25, 5, $rows['first_a_5'], 1,0, 'C');
    $pdf->Cell(25, 5, $rows['first_first_ave'], 1,1, 'C');

    $pdf->SetFont('Arial','',11);
    $pdf->Cell(8, 10, '', 0,1, 'L');
    $pdf->Cell(8, 10, '', 0,0, 'L');
    $pdf->Cell(8, 10, 'The school welcomes you if you desire ti know more about the progress of your child. Thank you and we hope that all is well with you and your family.', 0,0, 'L');
    $pdf->Cell(8, 10, '', 0,1, 'L');
    $pdf->Cell(8, 10, '', 0,1, 'L');
    $pdf->Cell(8, 10, '', 0,0, 'L');
    #Dito yung Pangalan ng Teacher
    $pdf->Cell(8, 5, $teacher_name, 0,1, 'L');
    $pdf->Cell(8, 10, '', 0,0, 'L');
    $pdf->Cell(8, 5, 'Classroom Adviser', 0,1, 'L');
    $pdf->Cell(8, 10, '', 0,0, 'L');
    $pdf->Cell(30, 5, 'Contact Number:', 0,0, 'L');
    #Contact Number ni Teacher
    $pdf->Cell(8, 5, '09XXXXXXXXX', 0,1, 'L');
    $pdf->Cell(8, 10, '', 0,0, 'L');
    $pdf->Cell(12, 5, 'Email:', 0,0, 'L');
    #email account ni teahcer
    $pdf->Cell(8, 5, $teacher_email, 0,1, 'L');
    $pdf->Cell(8, 10, '', 0,0, 'L');
    $pdf->Cell(23, 5, 'Office Hours:', 0,0, 'L');
    #office Hours ni teacher
    $pdf->Cell(8, 5, '9:00 AM to 12:00 NN', 0,1, 'L');

    $pdf->Image('../../../../pics/loa.png',35,15,35);
    $pdf->Image('../../../../pics/iso.png',225,20,35);
    $final_teacher = $_SESSION['userfirst'] . $_SESSION['userlast'];
    $file= "../../signatures/" . $final_teacher . ".png";
    $pdf->Image($file,35,175,30);

    $parent_email = $rowgender['parent_email'];
    $parent_email1 = $rowgender['parent_email1'];
    $parent_email2 = $rowgender['parent_email2'];
    $parent_email3 = $rowgender['parent_email3'];
    $body = $rowgender['sent'];
    $grade= $rowrow['class_grade'];
    $track= $rowrow['class_track'];
    $strand= $rowrow['class_strand'];
    $spec= $rowrow['class_spec'];

    switch ($file=$pdf->Output("attachment.pdf", "S")) {
        default:
        header("location: ../../url.php?grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=one&error=signature");
        exit();
    } 

    include('pdf.php');
        $file_name = 'attachment.pdf';
        file_put_contents($file);
        require 'class/class.phpmailer.php';
        $mail = new PHPMailer;
        $mail->IsSMTP();								//Sets Mailer to send message using SMTP
        $mail->Host = 'smtp.gmail.com';		//Sets the SMTP hosts of your Email hosting, this for Godaddy
        $mail->Port = '465';								//Sets the default SMTP server port
        $mail->SMTPAuth = true;							//Sets SMTP authentication. Utilizes the Username and Password variables
        $mail->Username = 'loaogv@gmail.com';					//Sets SMTP username
        $mail->Password = 'loaogv123';					//Sets SMTP password
        $mail->SMTPSecure = 'ssl';							//Sets connection prefix. Options are "", "ssl" or "tls"
        $mail->From = 'loaogv@gmail.com';			//Sets the From email address for the message
        $mail->FromName = $teacher_email;			//Sets the From name of the message
            $mail->AddBCC($parent_email, 'Parent');		//Adds a "To" address
            $mail->AddBCC($parent_email1, 'Parent');		//Adds a "To" address
            $mail->AddBCC($parent_email2, 'Parent');		//Adds a "To" address
            $mail->AddBCC($parent_email3, 'Parent');		//Adds a "To" address
        $mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
        $mail->IsHTML(true);							//Sets message type to HTML	
        $mail->AddStringAttachment($file, 'attachment.pdf');    				//Adds an attachment from a path on the filesystem
    

        $mail->Subject = 'Grade Sheet of Student';			//Sets the Subject of the message
        $mail->Body = $body;			//An HTML or plain text message body
        if($mail->Send())        //Send an Email. Return true on success or false on error
        {

        }
        else {

        }
        unlink($file_name);
}
elseif ($grading=="second") {
    $grading= "Second Quarterly Grade";
    $gradingetc= "Second Quarterly Academic Achievement/Progress Report";
    $sqlstudent = "SELECT * from ".$section."_grade_first_sec WHERE student_first='$first' AND student_last='$last'";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqlstudent)) {
        echo "stmt";
        exit();
    }
    $resultstudent= mysqli_query($conn, $sqlstudent);
    $rows = mysqli_fetch_assoc($resultstudent);

    $sqlfinal = "SELECT * from ".$section."_student WHERE student_first='$first' AND student_last='$last'";
    $stmt=mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sqlfinal)) {
        echo "stmt";
        exit();
    }
    $resultfinal= mysqli_query($conn, $sqlfinal);
    $rowgender = mysqli_fetch_assoc($resultfinal);


    require('fpdf17/fpdf.php');

    $pdf = new FPDF('L','mm',array(235,285));

    $pdf->AddPage();


    //width, height, text, border, yung zero sa dulo, ibig sabihin hindi new line, pag ginawa mo itong 1, magla line break sya, tapos text align yung dulo
    /*
    $pdf->Cell(140, 5, 'Dear Parents', 0, 0, 'L');
    $pdf->Cell(10, 5, '', 0, 0, 'L');
    $pdf->Cell(140, 5, 'SF 9-SHS', 0, 1, 'L');
    $pdf->SetFont('Arial','B',10);
    $pdf->SetFont('');
    $pdf->Cell(140, 5, '            This   report  card   shows  the   ability   and   progress   your   child', 0, 0, 'L');
    $pdf->Cell(140, 5, 'Republic of the Philippines', 0, 1, 'C');
    */
    // Insert a logo in the top-left corner at 300 dpi

    $pdf->SetFont('Times','B',20);
    $pdf->Cell(140, 5, '', 0, 1, 'C');
    $pdf->Cell(140, 5, '', 0, 1, 'C');
    $pdf->Cell(275, 5, 'LYCEUM OF ALABANG INC.', 0, 1, 'C');
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(275, 5, 'KM 30 National Road, Tunasan, Muntinlupa City', 0, 1, 'C');
    $pdf->SetFont('Arial','U',10);
    $pdf->SetTextColor(6,69,173);
    $pdf->Cell(275, 5, 'www.lyceumalabang.edu.ph', 0, 1, 'C');
    $pdf->SetFont('Arial','B',14);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(140, 5, '', 0, 1, 'C');
    $pdf->Cell(140, 5, '', 0, 1, 'C');
    $pdf->Cell(275, 5, 'BASIC EDUCATION DEPARTMENT', 0, 1, 'C');
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(275, 5, 'Senior High School', 0, 1, 'C');
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(275, 5, 'School Year 2020-2021', 0, 1, 'C');
    $pdf->Cell(60, 5, '', 0, 0, 'C');
    $pdf->Cell(140, 5, ' _________________________________________________________________________________________________________________________________________________________', 0, 1, 'C');
    $pdf->Cell(140, 5, '', 0, 1, 'C');
    $pdf->Cell(8, 5, '', 0, 0, 'C');
    $pdf->SetFont('Arial','',11);
    $pdf->Cell(7, 5, 'TO:', 0, 0, 'L');
    $pdf->SetFont('Arial','B',11);
    $pdf->Cell(2, 5, 'The parent/guardians', 0, 1, 'L');
    $pdf->Cell(8, 5, '', 0, 0, 'C');
    $pdf->SetFont('Arial','',11);
    $pdf->Cell(13, 5, 'FROM:', 0, 0, 'L');
    $pdf->SetFont('Arial','B',11);
    #email add. ng Teacher
    $pdf->Cell(2, 5, $teacher_email, 0, 1, 'L');
    $pdf->Cell(8, 5, '', 0, 0, 'C');
    $pdf->SetFont('Arial','',11);
    $pdf->Cell(20, 5, 'SUBJECT:', 0, 0, 'L');
    $pdf->SetFont('Arial','B',11);
    #pangalan ng istudiyante
    $pdf->Cell(80, 5, $student_name, 0, 0, 'L');
    #kung anog quater na 
    $pdf->Cell(10, 5, $grading, 0, 1, 'L');
    $pdf->Cell(8, 10, '', 0,0, 'L');
    $pdf->SetFont('Arial','',11);   
    $pdf->Cell(25, 10, 'Dear Mr./Mrs. ', 0,0, 'L');
    #Apilyedo ng Student
    $pdf->Cell(8, 10, $surname, 0,0, 'L');
    $pdf->Cell(50, 10, '', 0, 1, 'L');
    $pdf->Cell(8, 10, '', 0, 0, 'L');
    $pdf->Cell(70, 5, 'Greetings of peace!', 0,0, 'L');
    $pdf->Cell(40, 10, '', 0, 1, 'L');
    $pdf->Cell(8, 10, '', 0, 0, 'L');
    $pdf->SetFont('Arial','',11);
    $pdf->Cell(85, 5, "We are happy to inform you of your son/daughter ", 0,0, 'L');
    $pdf->SetFont('Arial','B',11);
    #Dito naman kung anong Quater na
    $gradingetc = $gradingetc . ".";
    $pdf->Cell(110, 5, $gradingetc, 0,0, 'L');
    $pdf->SetFont('Arial','',11);
    $pdf->Cell(75, 5, 'This report shows the ability', 0,1, 'L');
    $pdf->Cell(7, 10, '', 0, 0, 'L');
    $pdf->Cell(70, 5, ' and progress of your student in different learning areas', 0,1, 'L');
    $pdf->Cell(8, 10, '', 0,1, 'L');
    $pdf->Cell(8, 10, '', 0,0, 'L');
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(22, 25, 'SUBJECT', 1,0, 'C');

    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $pdf->SetFont('Arial','B',8);
    $pdf->MultiCell(25, 6.2, '21st Century Literature from the Philippines and the World', 1,'C');
    $pdf->SetFont('Arial','B',10);
    $pdf->SetXY($x + 25, $y);
    $pdf->MultiCell(25, 8.3, 'Media and Information Literacy ', 1,'C');
    $pdf->SetXY($x + 50, $y);
    $pdf->MultiCell(25, 8.3, 'Physical Education and Health', 1,'C');
    $pdf->SetXY($x + 75, $y);
    $pdf->MultiCell(25, 12.5, 'Practical Research 2', 1,'C');
    $pdf->SetXY($x + 100, $y);
    $pdf->MultiCell(25, 6.2, 'Pagsulat sa Filipino sa Larangan ng TVL (ICT)', 1,'C');
    $pdf->SetXY($x + 125, $y);
    $pdf->MultiCell(25, 12.5, 'Entrepreneurship', 1,'C');
    $pdf->SetXY($x + 150, $y);
    $pdf->MultiCell(25, 8.3, 'System Analysis and Design', 1,'C');
    $pdf->SetXY($x + 175, $y);
    $pdf->MultiCell(25, 8.3, 'Event-Driven Database Programming', 1,'C');
    $pdf->SetXY($x + 200, $y);
    $pdf->MultiCell(25, 8.3, 'Average (Subject for Changes)', 1,'C');

    $pdf->Cell(8, 10, '', 0,0, 'L');
    $pdf->Cell(22, 5, 'Grade', 1,0, 'C');
    $pdf->Cell(25, 5, $rows['first_c_1'], 1,0, 'C');
    $pdf->Cell(25, 5, $rows['first_c_2'], 1,0, 'C');
    $pdf->Cell(25, 5, $rows['first_c_3'], 1,0, 'C');
    $pdf->Cell(25, 5, $rows['first_a_1'], 1,0, 'C');
    $pdf->Cell(25, 5, $rows['first_a_2'], 1,0, 'C');
    $pdf->Cell(25, 5, $rows['first_a_3'], 1,0, 'C');
    $pdf->Cell(25, 5, $rows['first_a_4'], 1,0, 'C');
    $pdf->Cell(25, 5, $rows['first_a_5'], 1,0, 'C');
    $pdf->Cell(25, 5, $rows['first_sec_ave'], 1,1, 'C');

    $pdf->SetFont('Arial','',11);
    $pdf->Cell(8, 10, '', 0,1, 'L');
    $pdf->Cell(8, 10, '', 0,0, 'L');
    $pdf->Cell(8, 5, 'The school welcomes you if you desire to know more about the progress of your child. Thank you and we hope that all is well with you and your.', 0,1, 'L');
    $pdf->Cell(8, 5, '', 0,0, 'L');
    $pdf->Cell(8, 5, 'family', 0,1, 'L');
    $pdf->Cell(8, 10, '', 0,1, 'L');
    $pdf->Cell(8, 10, '', 0,0, 'L');
    #Dito yung Pangalan ng Teacher
    $pdf->Cell(8, 5, $teacher_name, 0,1, 'L');
    $pdf->Cell(8, 0, '', 0,1, 'L');
    $pdf->Cell(8, 10, '', 0,0, 'L');
    $pdf->Cell(8, 5, 'Classroom Adviser', 0,1, 'L');
    $pdf->Cell(8, 10, '', 0,0, 'L');
    $pdf->Cell(30, 5, 'Contact Number:', 0,0, 'L');
    #Contact Number ni Teacher
    $pdf->Cell(8, 5, '09XXXXXXXXX', 0,1, 'L');
    $pdf->Cell(8, 10, '', 0,0, 'L');
    $pdf->Cell(12, 5, 'Email:', 0,0, 'L');
    #email account ni teahcer
    $pdf->Cell(8, 5, $teacher_email, 0,1, 'L');
    $pdf->Cell(8, 10, '', 0,0, 'L');
    $pdf->Cell(23, 5, 'Office Hours:', 0,0, 'L');
    #office Hours ni teacher
    $pdf->Cell(8, 5, '9:00 AM to 12:00 NN', 0,1, 'L');

    $pdf->Image('../../../../pics/loa.png',35,15,35);
    $pdf->Image('../../../../pics/iso.png',225,20,35);
    $final_teacher = $_SESSION['userfirst'] . $_SESSION['userlast'];
    $file= "../../signatures/" . $final_teacher . ".png";
    $pdf->Image($file,35,170,30);

    

$parent_email = $rowgender['parent_email'];
$parent_email1 = $rowgender['parent_email1'];
$parent_email2 = $rowgender['parent_email2'];
$parent_email3 = $rowgender['parent_email3'];
$body = $rowgender['sent'];
$grade= $rowrow['class_grade'];
$track= $rowrow['class_track'];
$strand= $rowrow['class_strand'];
$spec= $rowrow['class_spec'];

switch ($file=$pdf->Output("attachment.pdf", "S")) {
    default:
    header("location: ../../url.php?grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=one&error=none");

} 

include('pdf.php');
    $file_name = 'attachment.pdf';
	file_put_contents($file);
	require 'class/class.phpmailer.php';
	$mail = new PHPMailer;
	$mail->IsSMTP();								//Sets Mailer to send message using SMTP
	$mail->Host = 'smtp.gmail.com';		//Sets the SMTP hosts of your Email hosting, this for Godaddy
	$mail->Port = '465';								//Sets the default SMTP server port
	$mail->SMTPAuth = true;							//Sets SMTP authentication. Utilizes the Username and Password variables
	$mail->Username = 'loaogv@gmail.com';					//Sets SMTP username
	$mail->Password = 'loaogv123';					//Sets SMTP password
	$mail->SMTPSecure = 'ssl';							//Sets connection prefix. Options are "", "ssl" or "tls"
	$mail->From = 'loaogv@gmail.com';			//Sets the From email address for the message
	$mail->FromName = $teacher_email;			//Sets the From name of the message
	    $mail->AddBCC($parent_email, 'Parent');		//Adds a "To" address
        $mail->AddBCC($parent_email1, 'Parent');		//Adds a "To" address
        $mail->AddBCC($parent_email2, 'Parent');		//Adds a "To" address
        $mail->AddBCC($parent_email3, 'Parent');		//Adds a "To" address
	$mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
	$mail->IsHTML(true);							//Sets message type to HTML	
    $mail->AddStringAttachment($file, 'attachment.pdf');    				//Adds an attachment from a path on the filesystem
   

	$mail->Subject = 'Grade Sheet of Student';			//Sets the Subject of the message
	$mail->Body = $body;			//An HTML or plain text message body
	if($mail->Send())        //Send an Email. Return true on success or false on error
    {

    }
    else {

    }
    unlink($file_name);

}




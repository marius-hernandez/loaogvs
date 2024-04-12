<?php
include_once '../../../include/dbh.inc.php';
require('fpdf17/fpdf.php');
session_start();
$sem= mysqli_real_escape_string($conn, $_GET['sem']);
$radio= mysqli_real_escape_string($conn, $_GET['radio']);
$message='';
$email = $_SESSION['email'];
$sqlT = "SELECT * FROM teacher WHERE user_email='$email' ";
$resultT= mysqli_query($conn, $sqlT);
$rowT = mysqli_fetch_assoc($resultT);

$gender = $rowT['user_gender'];
$firstT = $rowT['user_first'];
$lastT = $rowT['user_last'];
$suffixT = $rowT['user_suffix'];
$teacher = $firstT .  " " . $lastT . " " . $suffixT;

$signature = "../../signatures/" . $firstT . $lastT . ".png";
$section= mysqli_real_escape_string($conn, $_GET['section']);
$lrn= mysqli_real_escape_string($conn, $_GET['lrn']);

$sql = "SELECT * FROM ".$section."_student WHERE student_lrn='$lrn' ";
$result= mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$gender = $row['student_gender'];
$first = $row['student_first'];
$middle = $row['student_middle'];
$last = $row['student_last'];
$suffix = $row['student_suffix'];
$lrn = $row['student_lrn'];
$emailp = $row['parent_email'];
$emailp1 = $row['parent_email1'];
$emailp2 = $row['parent_email2'];
$emailp3 = $row['parent_email3'];

$body = $row['sent'];
$name= $first .  " " . $middle . " " . $last . " " . $suffix;

$sqlsec = "SELECT * FROM section WHERE class_name='$section' ";
$resultsec= mysqli_query($conn, $sqlsec);
$rowsec = mysqli_fetch_assoc($resultsec);
$grade = $rowsec['class_grade'];
$track = $rowsec['class_track'];
$strand = $rowsec['class_strand'];


    $sql1="SELECT * FROM ".$section."_grade_first_first WHERE student_lrn=".$lrn."";
$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql1)) {
    header("location: url.php?error=stmtfailed");
    exit();
}
$result1= mysqli_query($conn, $sql1);
$queryResults1 = mysqli_num_rows($result1);
$row1 = mysqli_fetch_assoc($result1);

$core1first = $row1['first_c_1'];
$core2first = $row1['first_c_2'];
$core3first = $row1['first_c_3'];
$app1first = $row1['first_a_1'];
$app2first = $row1['first_a_2'];
$app3first = $row1['first_a_3'];
$app4first = $row1['first_a_4'];
$app5first = $row1['first_a_5'];
$first_first_ave = $row1['first_first_ave'];
            
$sql2="SELECT * FROM ".$section."_grade_first_sec WHERE student_lrn=".$row['student_lrn']."";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql2)) {
    header("location: url.php?error=stmtfaileda");
    exit();
}
$result2= mysqli_query($conn, $sql2);
$queryResults2 = mysqli_num_rows($result2);
$row2 = mysqli_fetch_assoc($result2);
$core1sec = $row2['first_c_1'];
$core2sec = $row2['first_c_2'];
$core3sec = $row2['first_c_3'];
$app1sec = $row2['first_a_1'];
$app2sec = $row2['first_a_2'];
$app3sec = $row2['first_a_3'];
$app4sec = $row2['first_a_4'];
$app5sec = $row2['first_a_5'];
$first_sec_ave = $row2['first_sec_ave'];


$sql3="SELECT * FROM ".$section."_ave WHERE student_lrn=".$row['student_lrn']."";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql3)) {
    header("location: url.php?error=stmtfaileda");
    exit();
}
$result3= mysqli_query($conn, $sql3);
$queryResults3 = mysqli_num_rows($result3);
$row3 = mysqli_fetch_assoc($result3);

$core1ave = $row3['ave_c_1'];
$core2ave = $row3['ave_c_2'];
$core3ave = $row3['ave_c_3'];
$app1ave = $row3['ave_a_1'];
$app2ave = $row3['ave_a_2'];
$app3ave = $row3['ave_a_3'];
$app4ave = $row3['ave_a_4'];
$app5ave = $row3['ave_a_5'];
$ave = $row3['ave'];

    $sql4="SELECT * FROM ".$section."_grade_sec_first WHERE student_lrn=".$row['student_lrn']."";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql4)) {
                header("location: url.php?error=stmtfailed");
                exit();
            }
            $result4= mysqli_query($conn, $sql4);
            $queryResults4 = mysqli_num_rows($result4);
            $row4 = mysqli_fetch_assoc($result4);

            $seccore1first = $row4['first_c_1'];
            $seccore2first = $row4['first_c_2'];
            $seccore3first = $row4['first_c_3'];
            $seccore4first = $row4['first_c_4'];

            $secapp1first = $row4['first_a_1'];
            $secapp2first = $row4['first_a_2'];
            $secapp3first = $row4['first_a_3'];
            $secapp4first = $row4['first_a_4'];
            $sec_first_ave = $row4['sec_first_ave'];

            $sql5="SELECT * FROM ".$section."_grade_sec_sec WHERE student_lrn=".$row['student_lrn']."";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql5)) {
                header("location: url.php?error=stmtfaileda");
                exit();
            }
            $result5= mysqli_query($conn, $sql5);
            $queryResults5 = mysqli_num_rows($result5);
            $row5 = mysqli_fetch_assoc($result5);

            $seccore1sec = $row5['first_c_1'];
            $seccore2sec = $row5['first_c_2'];
            $seccore3sec = $row5['first_c_3'];
            $seccore4sec = $row5['first_c_4'];

            $secapp1sec = $row5['first_a_1'];
            $secapp2sec = $row5['first_a_2'];
            $secapp3sec = $row5['first_a_3'];
            $secapp4sec = $row5['first_a_4'];
            $sec_sec_ave = $row5['sec_sec_ave'];
            

            $sql6="SELECT * FROM ".$section."_ave_sec WHERE student_lrn=".$row['student_lrn']."";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql6)) {
                header("location: url.php?error=stmtfaileda");
                exit();
            }
            $result6= mysqli_query($conn, $sql6);
            $queryResults6 = mysqli_num_rows($result6);
            $row6 = mysqli_fetch_assoc($result6);

            $seccore1ave = $row6['ave_c_1'];
            $seccore2ave = $row6['ave_c_2'];
            $seccore3ave = $row6['ave_c_3'];
            $seccore4ave = $row6['ave_c_4'];

            $secapp1ave = $row6['ave_a_1'];
            $secapp2ave = $row6['ave_a_2'];
            $secapp3ave = $row6['ave_a_3'];
            $secapp4ave = $row6['ave_a_4'];
            $secave = $row6['ave_sec'];





if ($sem==1) {
    if ($radio=="all") {
        $pdf = new FPDF('L','mm',array(245,300));

$pdf->AddPage();

$pdf->SetFont('Arial','B',10);
//width, height, text, border, yung zero sa dulo, ibig sabihin hindi new line, pag ginawa mo itong 1, magla line break sya, tapos text align yung dulo

$pdf->Cell(140, 5, 'Dear Parents', 0, 0, 'L');
$pdf->Cell(10, 5, '', 0, 0, 'L');
$pdf->Cell(140, 5, 'SF 9-SHS', 0, 1, 'L');
$pdf->SetFont('Arial','B',10);
$pdf->SetFont('');
$pdf->Cell(140, 5, '            This   report  card   shows  the   ability   and   progress   your   child', 0, 0, 'L');
$pdf->Cell(140, 5, 'Republic of the Philippines', 0, 1, 'C');
// Insert a logo in the top-left corner at 300 dpi
$pdf->Image('../../../../pics/loa.png',165,15,-1200);
$pdf->Image('../../../../pics/deped.jpg',255,15,23);
$pdf->Image($signature,110,35,25);
$pdf->Cell(140, 5, 'has  made  in  different  learning   areas  as   well  as  his/her  progress   in ', 0, 0, 'L');
$pdf->SetFont('Times','B',12);
$pdf->Cell(140, 5, 'DEPARTMENT OF EDUCATION', 0, 1, 'C');
$pdf->SetFont('Arial','B',10);
$pdf->SetFont('');
$pdf->Cell(140, 5, 'character development.', 0, 0, 'L');
$pdf->SetFont('Arial','B',9);
$pdf->SetFont('');
$pdf->Cell(140, 5, 'NATIONAL CAPITAL REGION', 0, 1, 'C');

$pdf->SetFont('Arial','B',10);
$pdf->SetFont('');
$pdf->Cell(140, 5, '         The    school    welcomes    you    if   you    desire    to   know   more', 0, 0, 'L');
$pdf->SetFont('Arial','B',9);
$pdf->SetFont('');
$pdf->Cell(140, 5, 'Division of City Schools, Muntinlupa', 0, 1, 'C');
$pdf->SetFont('Arial','B',10);
$pdf->SetFont('');
$pdf->Cell(140, 5, 'about the progress of your child.', 0, 0, 'L');




$pdf->Cell(10, 5, '', 0, 1, 'L');
$pdf->SetFont('Arial','B',8);
$pdf->SetFont('');
$pdf->Cell(130, 5, $teacher, 0, 0, 'R');
$pdf->Cell(10, 5, '', 0, 0, 'R');
$pdf->SetFont('Times','B',20);
$pdf->Cell(140, 5, 'LYCEUM OF ALABANG INC.', 0, 1, 'C');
$pdf->SetFont('Arial','B',8);
$pdf->SetFont('');
$pdf->Cell(140, 5, "Adviser's Signature over Printed Name              ", 0, 0, 'R');
$pdf->SetFont('Arial','B',10);
$pdf->SetFont('');
$pdf->Cell(140, 5, "Km. 30, National Road, Tunasan, Muntinlupa City", 0, 1, 'C');
$pdf->Cell(140, 5, '', 0, 0, 'L');
$pdf->Cell(140, 5, '1773 Philippines', 0, 1, 'C');
$pdf->SetFont('Arial','B',14);
$pdf->Cell(140, 5, '', 0, 1, 'L');
$pdf->Cell(140, 5, "PARENT/GUARDIAN'S SIGNATURE", 0, 1, 'C');
$pdf->SetFont('Arial','B',10);
$pdf->SetFont('');
$pdf->Cell(10, 5, '', 0, 1, 'L');
$pdf->Cell(140, 5, "First Quarter:         _________________________________________________", 0, 0, 'L');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(140, 5, "Basic Education Department", 0, 1, 'C');
$pdf->SetFont('Arial','B',10);
$pdf->SetFont('');
$pdf->Cell(140, 5, "Second Quarter:    _________________________________________________", 0, 1, 'L');
$pdf->Cell(140, 5, "Third Quarter:        _________________________________________________", 0, 0, 'L');
$pdf->SetFont('Arial','B',20);
$pdf->Cell(140, 5, "SENIOR HIGH SCHOOL", 0, 1, 'C');
$pdf->SetFont('Arial','B',12);
$pdf->SetFont('Arial','B',10);
$pdf->SetFont('');
$pdf->Cell(140, 5, "Fourth Quarter:      _________________________________________________", 0, 1, 'L');
$pdf->SetFont('Arial','B',10);
$pdf->SetFont('');
$pdf->SetFont('Arial','B',14);
$pdf->Cell(140, 5, '', 0, 0, 'L');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(140, 5, "K-12", 0, 1, 'C');
$pdf->Cell(140, 5, "CERTIFICATE OF TRANSFER", 0, 1, 'C');
$pdf->SetFont('Arial','B',10);
$pdf->SetFont('');
$pdf->Cell(10, 5, '', 0, 1, 'L');
$pdf->Cell(140, 5, "Admitted to Grade: ________________________________________________", 0, 0, 'L');
$pdf->SetFont('Arial','B',16);
$pdf->SetFont('');
$pdf->Cell(140, 5, "PROGRESS REPORT CARD", 0, 1, 'C');
$pdf->SetFont('Arial','B',10);
$pdf->SetFont('');
$pdf->Cell(140, 5, "Eligibility for admission to:    _________________________________________", 0, 0, 'L');
$pdf->SetFont('Arial','B',9);
$pdf->SetFont('');
$pdf->Cell(0, 5, "SCHOOL YEAR: 2020-2021", 0, 0, 'C');

$pdf->SetFont('Arial','B',10);
$pdf->SetFont('');
$pdf->Cell(10, 5, '', 0, 1, 'L');
$pdf->Cell(70, 5, "Engr. Rodrigo P. Calapan", 0, 0, 'C');
$pdf->Cell(70, 5, "Ms. Charito F. Cano", 0, 1, 'C');
$pdf->Cell(70, 5, "Principal", 0, 0, 'C');
$pdf->Cell(70, 5, "Directress", 0, 0, 'C');
$pdf->Cell(140, 5, '', 0, 0, 'L');
$pdf->SetFont('Arial','B',12);
$pdf->SetFont('');
$pdf->Cell(140, 5, "Name: $name" , 0, 1, 'C');
$pdf->SetFont('Arial','B',14);
$pdf->Cell(10, 5, '', 0, 1, 'L');
$pdf->Cell(140, 5, "CANCELLATION OF ELIGIBILITY TO TRANSFER", 0, 0, 'C');
$pdf->SetFont('Arial','B',12);
$pdf->SetFont('');
$pdf->Cell(140, 5, "Name: $name", 0, 1, 'C');
$pdf->SetFont('Arial','B',1);
$pdf->SetFont('');
$pdf->Cell(10, 5, '', 0, 1, 'L');
$pdf->SetFont('Arial','B',10);
$pdf->SetFont('');
$pdf->Cell(140, 5, "Admitted in:       ____________________________________________________", 0, 0, 'L');
$pdf->SetFont('Arial','B',12);
$pdf->SetFont('');
$pdf->Cell(140, 5, "LRN: $lrn", 0, 1, 'C');
$pdf->SetFont('Arial','B',10);
$pdf->SetFont('');
$pdf->Cell(140, 5, "Date:                 _____________________________________________________", 0, 1, 'L');
$pdf->SetFont('Arial','B',10);
$pdf->SetFont('');
$pdf->Cell(70, 5, "Engr. Rodrigo P. Calapan", 0, 0, 'C');
$pdf->Cell(70, 5, "Ms. Charito F. Cano", 0, 0, 'C');
$pdf->SetFont('Arial','B',12);
$pdf->SetFont('');
$pdf->Cell(70, 5, "                      Age:    		        ", 0, 0, 'C');
$pdf->Cell(0, 5, "            Sex: $gender                         ", 0, 1, 'C');
$pdf->SetFont('Arial','B',10);
$pdf->SetFont('');
$pdf->Cell(70, 5, "Principal", 0, 0, 'C');
$pdf->Cell(70, 5, "Directress", 0, 1, 'C');
$pdf->Cell(140, 5, '', 0, 0, 'L');

$pdf->SetFont('Arial','B',12);
$pdf->SetFont('');
$pdf->Cell(70, 5, "                  Grade: $grade        ", 0, 0, 'C');
$pdf->Cell(70, 5, "        Section: $section                         ", 0, 1, 'C');
$pdf->Cell(262, 5, "", 0, 1, 'R');
$pdf->Cell(140, 5, "", 0, 0, 'C');
$pdf->Cell(140, 5, "Track: $track", 0, 1, 'C');
$pdf->Cell(262, 5, "", 0, 1, 'R');
$pdf->Cell(140, 5, "", 0, 0, 'C');
$pdf->Cell(140, 5, "Strand: $strand", 0, 1, 'C');


#$pdf->Ln();
$pdf->SetFont('Arial','B',10);
$pdf->Cell(10, 5, '', 0, 1, 'L');
$pdf->Cell(10, 5, '', 0, 1, 'L');
$pdf->Cell(10, 5, '', 0, 1, 'L');
$pdf->Cell(10, 5, '', 0, 1, 'L');
$pdf->Cell(10, 5, '', 0, 1, 'L');
$pdf->Cell(10, 5, '', 0, 1, 'L');
$pdf->Cell(10, 5, '', 0, 1, 'L');
#Cell(width, height, text, border, endline, 'align')

$pdf->Cell(140, 5, 'REPORT ON LEARNING PROGRESS & ACHIEVEMENT', 0, 0, 'C');
$pdf->Cell(150, 5, 'REPORT ON LEARNERS OBSERVED VALUES', 0, 1, 'C');
//overall width : 280, 140 magkabila
$pdf->SetFont('Arial','B',8);
//kunwari 1 fourth
//lalagayn ng 1 kapag walang border
//kapag gusto mo lagayn yung right side naman
//zero para hindi mag line break
//yung dun sa ano marius colspawn
// pano ialagay sa gitna yung table, rin ba yung kahit walang border ?
//oo pwede paanong gitna, gitna yung text?
// yung mga nakalagay dun sa card na mga text lang naka table kase yung wala lang border or line para madali lang i design.
//para sa colspan? di ko gets, 
// pano mo wait para saan yung eto ?
//structure ng bawat cell:
//Cell('width', 'height', 'text', 'kung may border or wala', 'kung line break o hindi', 'textx-align')
//need ko lang talaga yung rowspan pati colspan 
//sige gawin ko
//gagawin mong 10 yung height ng nasa taas nya


//experimento lang sa mga width at height
//yung pinasa mong link makikita ko lahat to dun ? para if malito ako pwede akong maka kuha ng idea dun?
//oo nandun na sa site yung lahat ng tutorial, may online compiler din ata sila dun
//tsaka pala, ang mahiraap dito is kailangan mong pagsabayin yung left at right side ng pdf kasi mahirap gawin yung column nila
//width ng lahat: 280
//bahala na kung anong mamangyayare dito. g1
//kailangan ko bukas ngayon na dapat deadline ng survey, byeeb

//kapag rowspan naman



$pdf->Cell(140, 5, 'First Semester', 0, 1, 'L');
$pdf->Cell(100, 10, 'Subject', 1, 0, 'L');
$pdf->Cell(20, 5, 'Quarter', 1, 0, 'C');
$pdf->Cell(20, 10, 'Final Grade', 1, 0, 'C');
$pdf->Cell(10, 5, '', 0, 0, 'L');
$pdf->Cell(25, 10, 'Core Values', 1, 0, 'L');
$pdf->Cell(0.1, 5, '', 0, 0, 'L');
$pdf->Cell(60, 5, 'Quarterly Assesment', 1, 0, 'C');
$pdf->Cell(44.2, 5, 'Quarter', 1, 1, 'C');
$pdf->Cell(0.1, 5, '', 0, 0, 'L');
$pdf->Cell(0.1, 5, '', 0, 0, 'L');
$pdf->Cell(100, 5, '', 0, 0, 'L');
$pdf->Cell(10, 5, '1', 1, 0, 'C');
$pdf->Cell(10, 5, '2', 1, 0, 'C');
$pdf->Cell(55, 5, '', 0, 0, 'L');
$pdf->Cell(60, 5, 'Behavioral Assesment', 1, 0, 'L');
$pdf->Cell(0.1, 5, '', 0, 0, 'L');
$pdf->Cell(11, 5, '1', 1, 0, 'L');
$pdf->Cell(11, 5, '2', 1, 0, 'L');
$pdf->Cell(11, 5, '3', 1, 0, 'L');
$pdf->Cell(11, 5, '4', 1, 0, 'L');


$pdf->Cell(20, 5, '', 0, 1, 'L');
$pdf->Cell(0.1, 5, '', 0, 0, 'L');
$pdf->Cell(140, 5, 'Core Subjects1', 1, 0, 'L');
$pdf->Cell(10, 5, '', 0, 0, 'L');
$pdf->Cell(25, 20, '1. Maka-diyos', 1, 0, 'L');
$pdf->Cell(0.1, 4, "Expresses one's spiritual beleifs while", 0, 0, 'L');
$pdf->Cell(59.9, 10, "repecting the spiritual belief of others.", 1, 0, 'L');
$pdf->Cell(0.1, 5, '', 0, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(20, 5, '', 0, 1, 'L');
$pdf->Cell(20, 5, 'CS 5', 1, 0, 'L');
$pdf->Cell(80, 5, '21st Century Literature from the Philippines and the World', 1, 0, 'L');
$pdf->Cell(10, 5, $core1first, 1, 0, 'C');
$pdf->Cell(10, 5, $core1sec, 1, 0, 'C');
$pdf->Cell(20, 5, $core1ave, 1, 0, 'C');
$pdf->Cell(0.1, 5, '', 0, 1, 'L');

$pdf->Cell(20, 5, 'CS 7', 1, 0, 'L');
$pdf->Cell(80, 5, 'Media and Information Literacy', 1, 0, 'L');
$pdf->Cell(10, 5, $core2first, 1, 0, 'C');
$pdf->Cell(10, 5, $core2sec, 1, 0, 'C');
$pdf->Cell(20, 5, $core2ave, 1, 0, 'C');
$pdf->Cell(35, 20, '', 0, 0, 'L');
$pdf->Cell(0.1, 6, 'Shows adherence, to ethical principles by', 0, 0, 'L');
$pdf->Cell(60, 12, 'holding truth.', 0, 0, 'L');
$pdf->Cell(0.1, 5, '', 0, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(70, 10, '', 0, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(50, 5, '', 0, 1, 'L');
$pdf->Cell(20, 5, 'CS 15-3', 1, 0, 'L');
$pdf->Cell(80, 5, 'Physical Education and Health 3', 1, 0, 'L');
$pdf->Cell(10, 5, $core3first, 1, 0, 'C');
$pdf->Cell(10, 5, $core3sec, 1, 0, 'C');
$pdf->Cell(20, 5, $core3ave, 1, 1, 'C');
$pdf->Cell(20, 5, '', 1, 0, 'L');
$pdf->Cell(80, 5, '', 1, 0, 'L');
$pdf->Cell(10, 5, '', 1, 0, 'L');
$pdf->Cell(10, 5, '', 1, 0, 'L');
$pdf->Cell(20, 5, '', 1, 0, 'L');
$pdf->Cell(10, 5, '', 0, 0, 'L');
$pdf->Cell(25, 20, '2. Maka-tao', 1, 0, 'L');
$pdf->Cell(0.1, 4, 'Is sensitive to individual, social, and', 0, 0, 'L');
$pdf->Cell(59.9, 10, 'cultural difference.', 1, 0, 'L');
$pdf->Cell(0.1, 5, '', 0, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(20, 5, '', 0, 1, 'L');
$pdf->Cell(140, 5, 'Applied and Specialized Subjects', 1, 0, 'L');
$pdf->Cell(20, 5, '', 0, 1, 'L');
$pdf->Cell(20, 5, 'AS 3', 1, 0, 'L');
$pdf->Cell(80, 5, 'Practical Research 2', 1, 0, 'L');
$pdf->Cell(10, 5, $app1first, 1, 0, 'C');
$pdf->Cell(10, 5, $app1sec, 1, 0, 'C');
$pdf->Cell(20, 5, $app1ave, 1, 0, 'C');
$pdf->Cell(10, 5, '', 0, 0, 'L');
$pdf->Cell(25, 20, '', 0, 0, 'L');
$pdf->Cell(0.1, 5, 'Demonstrates contributions toward', 0, 0, 'L');
$pdf->Cell(59.9, 11, 'solidarity.', 0, 0, 'L');
$pdf->Cell(0.1, 5, '', 0, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(20, 5, '', 0, 1, 'L');
$pdf->Cell(20, 5, 'AS 4', 1, 0, 'L');
$pdf->Cell(80, 5, 'Pagsulat sa Filipino sa Larangan ng TVL (ICT)', 1, 0, 'L');
$pdf->Cell(10, 5, $app2first, 1, 0, 'C');
$pdf->Cell(10, 5, $app2sec, 1, 0, 'C');
$pdf->Cell(20, 5, $app2ave, 1, 0, 'C');
$pdf->Cell(20, 5, '', 0, 1, 'L');
$pdf->Cell(20, 5, 'AS 6', 1, 0, 'L');
$pdf->Cell(80, 5, 'Entrepreneurship', 1, 0, 'L');
$pdf->Cell(10, 5, $app3first, 1, 0, 'C');
$pdf->Cell(10, 5, $app3sec, 1, 0, 'C');
$pdf->Cell(20, 5, $app3ave, 1, 0, 'C');
$pdf->Cell(10, 5, '', 0, 0, 'L');
$pdf->Cell(25, 10, '3. Makakalikasan', 1, 0, 'L');
$pdf->Cell(0.1, 5, 'Cares for the environment and utilizes', 0, 0, 'L');
$pdf->Cell(60, 10, 'resource wisely, judiciously, and ', 1, 0, 'L');
$pdf->Cell(0.1, 5, '', 0, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(20, 5, '', 0, 1, 'L');
$pdf->Cell(20, 5, 'TVS 5', 1, 0, 'L');
$pdf->Cell(80, 5, 'Computer Programming 2A (SAUD)', 1, 0, 'L');
$pdf->Cell(10, 5, $app4first, 1, 0, 'C');
$pdf->Cell(10, 5, $app4sec, 1, 0, 'C');
$pdf->Cell(20, 5, $app4ave, 1, 0, 'C');
$pdf->Cell(35, 5, '', 0, 0, 'L');
$pdf->Cell(0.1, 5, 'economically', 0, 0, 'L');
$pdf->Cell(10, 5, '', 0, 0, 'L');
$pdf->Cell(11, 5, '', 0, 1, 'L');
$pdf->Cell(20, 5, 'TVS 6', 1, 0, 'L');
$pdf->Cell(80, 5, 'Computer Programming 2B (EEDP.Net)', 1, 0, 'L');
$pdf->Cell(10, 5, $app5first, 1, 0, 'C');
$pdf->Cell(10, 5, $app5sec, 1, 0, 'C');
$pdf->Cell(20, 5, $app5ave, 1, 0, 'C');
$pdf->Cell(10, 5, '', 0, 0, 'L');
$pdf->Cell(25, 20, '4. Makabansa', 1, 0, 'L');
$pdf->Cell(0.1, 5, 'Demonstrates pride in being a Filipino; ', 0, 0, 'L');
$pdf->Cell(60, 10, 'exercises the rights and responsibilities of', 1, 0, 'L');
$pdf->Cell(0.1, 5, '', 0, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(11, 5, '', 0, 1, 'L');
$pdf->Cell(20, 5, '', 1, 0, 'L');
$pdf->Cell(80, 5, 'Average each Quarter', 1, 0, 'R');
$pdf->Cell(10, 5, $first_first_ave, 1, 0, 'C');
$pdf->Cell(10, 5, $first_sec_ave, 1, 0, 'C');
$pdf->Cell(20, 5, '', 1, 0, 'C');
$pdf->Cell(35, 5, '', 0, 0, 'L');
$pdf->Cell(0.1, 5, 'a Filipino citizen.', 0, 0, 'L');
$pdf->Cell(20, 5, '', 0, 1, 'L');
$pdf->Cell(120, 5, 'Average for the Semester', 1, 0, 'R');
$pdf->Cell(20, 5, $ave, 1, 0, 'C');
$pdf->Cell(10, 5, '', 0, 0, 'L');
$pdf->Cell(25, 20, '', 0, 0, 'L');
$pdf->Cell(0.1, 5, 'Demonstrates appropriate behavior in', 0, 0, 'L');
$pdf->Cell(60, 10, 'carrying out activities in the school', 1, 0, 'L');
$pdf->Cell(0.1, 5, '', 0, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(11, 5, '', 0, 1, 'L');





$pdf->Cell(140, 5, 'Second Semester', 0, 0, 'L');
$pdf->Cell(35, 5, '', 0, 0, 'L');
$pdf->Cell(0.1, 5, 'community, and country', 0, 1, 'L');
$pdf->Cell(100, 10, 'Subject', 1, 0, 'L');
$pdf->Cell(20, 5, 'Quarter', 1, 0, 'C');
$pdf->Cell(20, 10, 'Final Grade', 1, 0, 'C');
$pdf->Cell(10, 20, '', 0, 0, 'L');
$pdf->Cell(130, 10, 'Marking            Non-Numerical Rating', 0, 0, 'C');
$pdf->Cell(11, 5, '', 0, 1, 'L');
$pdf->Cell(100, 5, '', 0, 0, 'L');
$pdf->Cell(10, 5, '1', 1, 0, 'C');
$pdf->Cell(10, 5, '2', 1, 0, 'C');
$pdf->Cell(30, 5, '', 0, 0, 'L');
$pdf->Cell(130, 10, 'AO                 Always Observed', 0, 0, 'C');
$pdf->Cell(11, 5, '', 0, 1, 'L');
$pdf->Cell(140, 5, 'Core Subjects', 1, 0, 'L');
$pdf->Cell(13, 5, '', 0, 0, 'L');
$pdf->Cell(130, 10, 'SO                 Sometimes Observed', 0, 0, 'C');
$pdf->Cell(11, 5, '', 0, 1, 'L');

$pdf->Cell(20, 5, 'CS 6', 1, 0, 'L');
$pdf->Cell(80, 5, 'Contemporary Philippines Arts from the World', 1, 0, 'L');
$pdf->Cell(10, 5, $seccore1first, 1, 0, 'C');
$pdf->Cell(10, 5, $seccore1sec, 1, 0, 'C');
$pdf->Cell(20, 5, $seccore1ave, 1, 0, 'C');
$pdf->Cell(10, 5, '', 0, 0, 'L');
$pdf->Cell(130, 10, 'RO                 Rarely Observed', 0, 0, 'C');
$pdf->Cell(11, 5, '', 0, 1, 'L');
$pdf->Cell(20, 5, 'CS 11', 1, 0, 'L');
$pdf->Cell(80, 5, 'Physical Science', 1, 0, 'L');
$pdf->Cell(10, 5, $seccore2first, 1, 0, 'C');
$pdf->Cell(10, 5, $seccore2sec, 1, 0, 'C');
$pdf->Cell(20, 5, $seccore2ave, 1, 0, 'C');
$pdf->Cell(8, 5, '', 0, 0, 'L');
$pdf->Cell(130, 10, 'NO                 Not Observed', 0, 0, 'C');
$pdf->Cell(11, 5, '', 0, 1, 'L');
$pdf->Cell(20, 5, 'CS 13', 1, 0, 'L');
$pdf->Cell(80, 5, 'Understanding Culture, Society and Politics', 1, 0, 'L');
$pdf->Cell(10, 5, $seccore3first, 1, 0, 'C');
$pdf->Cell(10, 5, $seccore3sec, 1, 0, 'C');
$pdf->Cell(20, 5, $seccore3ave, 1, 1, 'C');
$pdf->Cell(20, 5, 'CS 15-4', 1, 0, 'L');
$pdf->Cell(80, 5, 'Physical Education and Health 4', 1, 0, 'L');
$pdf->Cell(10, 5, $seccore4first, 1, 0, 'C');
$pdf->Cell(10, 5, $seccore4sec, 1, 0, 'C');
$pdf->Cell(20, 5, $seccore4ave, 1, 0, 'C');
$pdf->Cell(10, 5, '', 0, 0, 'L');
$pdf->Cell(130, 5, 'REPORT ON ATTENDANCE', 0, 0, 'C');
$pdf->Cell(11, 5, '', 0, 1, 'L');

$pdf->Cell(20, 5, '', 1, 0, 'L');
$pdf->Cell(80, 5, '', 1, 0, 'L');
$pdf->Cell(10, 5, '', 1, 0, 'L');
$pdf->Cell(10, 5, '', 1, 0, 'L');
$pdf->Cell(20, 5, '', 1, 0, 'L');
$pdf->Cell(20, 5, '', 0, 0, 'L');
$pdf->Cell(30, 5, 'Month', 1, 0, 'C');
$pdf->Cell(7, 5, 'Jul', 1, 0, 'C');
$pdf->Cell(7, 5, 'Aug', 1, 0, 'C');
$pdf->Cell(7, 5, 'Sep', 1, 0, 'C');
$pdf->Cell(7, 5, 'Oct', 1, 0, 'C');
$pdf->Cell(7, 5, 'Nov', 1, 0, 'C');
$pdf->Cell(7, 5, 'Dec', 1, 0, 'C');
$pdf->Cell(7, 5, 'Jan', 1, 0, 'C');
$pdf->Cell(7, 5, 'Feb', 1, 0, 'C');
$pdf->Cell(7, 5, 'Mar', 1, 0, 'C');
$pdf->Cell(7, 5, 'Apr', 1, 0, 'C');
$pdf->Cell(7, 5, 'May', 1, 0, 'C');
$pdf->Cell(7, 5, 'Total', 1, 0, 'C');
$pdf->Cell(11, 5, '', 0, 1, 'L');
$pdf->Cell(140, 5, 'Applied and Specialized Subjects', 1, 0, 'L');
$pdf->Cell(20, 5, '', 0, 0, 'L');
$pdf->Cell(30, 5, 'No. of School Days', 1, 0, 'C');
$pdf->Cell(7, 5, '', 1, 0, 'C');
$pdf->Cell(7, 5, '', 1, 0, 'C');
$pdf->Cell(7, 5, '', 1, 0, 'C');
$pdf->Cell(7, 5, '', 1, 0, 'C');
$pdf->Cell(7, 5, '', 1, 0, 'C');
$pdf->Cell(7, 5, '', 1, 0, 'C');
$pdf->Cell(7, 5, '', 1, 0, 'C');
$pdf->Cell(7, 5, '', 1, 0, 'C');
$pdf->Cell(7, 5, '', 1, 0, 'C');
$pdf->Cell(7, 5, '', 1, 0, 'C');
$pdf->Cell(7, 5, '', 1, 0, 'C');
$pdf->Cell(7, 5, '', 1, 0, 'C');
$pdf->Cell(11, 5, '', 0, 1, 'L');
$pdf->Cell(20, 5, 'AS 7', 1, 0, 'L');
$pdf->Cell(80, 5, 'Research Project', 1, 0, 'L');
$pdf->Cell(10, 5, $secapp1first, 1, 0, 'C');
$pdf->Cell(10, 5, $secapp1sec, 1, 0, 'C');
$pdf->Cell(20, 5, $secapp1ave, 1, 0, 'C');
$pdf->Cell(20, 5, '', 0, 0, 'L');
$pdf->Cell(30, 5, 'No. of Present', 1, 0, 'C');
$pdf->Cell(7, 5, '', 1, 0, 'C');
$pdf->Cell(7, 5, '', 1, 0, 'C');
$pdf->Cell(7, 5, '', 1, 0, 'C');
$pdf->Cell(7, 5, '', 1, 0, 'C');
$pdf->Cell(7, 5, '', 1, 0, 'C');
$pdf->Cell(7, 5, '', 1, 0, 'C');
$pdf->Cell(7, 5, '', 1, 0, 'C');
$pdf->Cell(7, 5, '', 1, 0, 'C');
$pdf->Cell(7, 5, '', 1, 0, 'C');
$pdf->Cell(7, 5, '', 1, 0, 'C');
$pdf->Cell(7, 5, '', 1, 0, 'C');
$pdf->Cell(7, 5, '', 1, 0, 'C');
$pdf->Cell(11, 5, '', 0, 1, 'L');
$pdf->Cell(20, 5, 'TVS 7', 1, 0, 'L');
$pdf->Cell(80, 5, 'Computer Programming 2A (WP)', 1, 0, 'L');
$pdf->Cell(10, 5, $secapp2first, 1, 0, 'C');
$pdf->Cell(10, 5, $secapp2sec, 1, 0, 'C');
$pdf->Cell(20, 5, $secapp2ave, 1, 1, 'C');
$pdf->Cell(20, 5, 'TVS 8', 1, 0, 'L');
$pdf->Cell(80, 5, 'Computer Programming 2B (CSS)', 1, 0, 'L');
$pdf->Cell(10, 5, $secapp3first, 1, 0, 'C');
$pdf->Cell(10, 5, $secapp3sec, 1, 0, 'C');
$pdf->Cell(20, 5, $secapp3ave, 1, 0, 'C');
$pdf->Cell(10, 5, '', 0, 0, 'L');
$pdf->Cell(140, 5, 'VISION', 0, 1, 'C');
$pdf->Cell(20, 5, 'TVS 9', 1, 0, 'L');
$pdf->Cell(80, 5, 'Work Immersion/ Career Advocacy/ Culminating Activity', 1, 0, 'L');
$pdf->Cell(10, 5, $secapp4first, 1, 0, 'C');
$pdf->Cell(10, 5, $secapp4sec, 1, 0, 'C');
$pdf->Cell(20, 5, $secapp4ave, 1, 0, 'C');
$pdf->Cell(15, 5, '', 0, 0, 'L');
$pdf->Cell(0.1, 5, "Lyceum of Alabang envision in becoming one of the nation's leading educational institution", 0, 0, 'L');
$pdf->Cell(130, 13, 'in volved in the pursuit of the advancemnt of knowledge, skills, and values for personal,', 0, 0, 'L');
$pdf->Cell(10, 5, '', 0, 1, 'L');
$pdf->Cell(20, 5, '', 1, 0, 'L');
$pdf->Cell(80, 5, 'Average each Quarter', 1, 0, 'R');
$pdf->Cell(10, 5, $sec_first_ave, 1, 0, 'C');
$pdf->Cell(10, 5, $sec_sec_ave, 1, 0, 'C');
$pdf->Cell(20, 5, '', 1, 1, 'L');
$pdf->Cell(120, 5, 'Average for the Semester', 1, 0, 'R');
$pdf->Cell(20, 5, $secave, 1, 0, 'C');
$pdf->Cell(15, 5, '', 0, 0, 'R');
$pdf->Cell(0.1, 5, "community, and national development.", 0, 1, 'L');
$pdf->Cell(20, 5, '', 0, 1, 'L');
$pdf->Cell(20, 5, '', 0, 0, 'L');
$pdf->Cell(30, 5, 'Descriptors', 0, 0, 'L');
$pdf->Cell(30, 5, 'Grading Scale', 0, 0, 'L');
$pdf->Cell(30, 5, 'Remarks', 0, 0, 'L');
$pdf->Cell(40, 5, '', 0, 0, 'L');
$pdf->Cell(140, 5, 'MISSION', 0, 1, 'C');

$pdf->Cell(20, 5, '', 0, 0, 'L');
$pdf->Cell(30, 5, 'Outstanding', 0, 0, 'L');
$pdf->Cell(30, 5, '90-100', 0, 0, 'L');
$pdf->Cell(30, 5, 'Passed', 0, 0, 'L');
$pdf->Cell(45, 5, '', 0, 0, 'L');
$pdf->Cell(0.1, 5, 'Lyceum of Alabang shall provide world-class education and training through competent', 0, 0, 'L');
$pdf->Cell(130, 13, 'personne, high-end facilities and equipment, and accredited industy-based programs', 0, 0, 'L');
$pdf->Cell(10, 5, '', 0, 1, 'L');

$pdf->Cell(20, 5, '', 0, 0, 'L');
$pdf->Cell(30, 5, 'Very Satisfactory', 0, 0, 'L');
$pdf->Cell(30, 5, '85-89', 0, 0, 'L');
$pdf->Cell(30, 5, 'Passed', 0, 0, 'L');
$pdf->Cell(40, 5, '', 0, 1, 'L');

$pdf->Cell(20, 5, '', 0, 0, 'L');
$pdf->Cell(30, 5, 'Satisfactory', 0, 0, 'L');
$pdf->Cell(30, 5, '80-84', 0, 0, 'L');
$pdf->Cell(30, 5, 'Passed', 0, 0, 'L');
$pdf->Cell(40, 5, '', 0, 1, 'L');

$pdf->Cell(20, 5, '', 0, 0, 'L');
$pdf->Cell(30, 5, 'Fairly Satisfactory', 0, 0, 'L');
$pdf->Cell(30, 5, '75-79', 0, 0, 'L');
$pdf->Cell(30, 5, 'Passed', 0, 0, 'L');
$pdf->Cell(40, 5, '', 0, 0, 'L');
$pdf->Cell(140, 5, 'MISSION', 0, 1, 'C');


$pdf->Cell(20, 5, '', 0, 0, 'L');
$pdf->Cell(30, 5, 'Did Not Meet', 0, 0, 'L');
$pdf->Cell(30, 5, 'Below 75', 0, 0, 'L');
$pdf->Cell(30, 5, 'Failed', 0, 0, 'L');
$pdf->Cell(45, 5, '', 0, 0, 'L');
$pdf->Cell(0.1, 4, 'We, at the lyceum of Alabang commit ourselves to exceed the expectations of our stakeholders', 0, 0, 'L');
$pdf->Cell(130, 11, 'through continual improvement for effective and ifficient provision of quality education and ', 0, 0, 'L');
$pdf->Cell(10, 5, '', 0, 1, 'L');
$pdf->Cell(155, 5, '', 0, 0, 'L');
$pdf->Cell(0.1, 6, 'training. We will ensure that all our academic and non-academic process and activities are aligned', 0, 1, 'L');
$pdf->Cell(155, 5, '', 0, 0, 'L');
$pdf->Cell(0.1, 5, 'with  their voice.', 0, 0, 'L');

switch ($file=$pdf->Output("attachment.pdf", "S")) {
    default:
    header("location: ../../url.php?grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=two&error=none");

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
	$mail->FromName = $email;			//Sets the From name of the message
	$mail->AddBCC($emailp, 'Parent');		//Adds a "To" address
        $mail->AddBCC($emailp1, 'Parent');		//Adds a "To" address
        $mail->AddBCC($emailp2, 'Parent');		//Adds a "To" address
        $mail->AddBCC($emailp3, 'Parent');		//Adds a "To" address
	$mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
	$mail->IsHTML(true);							//Sets message type to HTML	
    $mail->AddStringAttachment($file, 'attachment.pdf');    				//Adds an attachment from a path on the filesystem
   

	$mail->Subject = 'Grade Sheet of Student';			//Sets the Subject of the message
	$mail->Body = $body;			//An HTML or plain text message body

	if($mail->Send())        //Send an Email. Return true on success or false on error
    {
        $mail->SMTPDebug = 0;
        header("location: rerd.php");
    }
    else {
        header("location: rerd.php");
    }
    unlink($file_name);
}

    elseif ($radio=="this") {
        $pdf = new FPDF('L','mm',array(245,300));

$pdf->AddPage();

$pdf->SetFont('Arial','B',10);
//width, height, text, border, yung zero sa dulo, ibig sabihin hindi new line, pag ginawa mo itong 1, magla line break sya, tapos text align yung dulo

$pdf->Cell(140, 5, 'Dear Parents', 0, 0, 'L');
$pdf->Cell(10, 5, '', 0, 0, 'L');
$pdf->Cell(140, 5, 'SF 9-SHS', 0, 1, 'L');
$pdf->SetFont('Arial','B',10);
$pdf->SetFont('');
$pdf->Cell(140, 5, '            This   report  card   shows  the   ability   and   progress   your   child', 0, 0, 'L');
$pdf->Cell(140, 5, 'Republic of the Philippines', 0, 1, 'C');
// Insert a logo in the top-left corner at 300 dpi
$pdf->Image('../../../../pics/loa.png',165,15,-1200);
$pdf->Image('../../../../pics/deped.jpg',255,15,23);
$pdf->Image($signature,110,35,25);
$pdf->Cell(140, 5, 'has  made  in  different  learning   areas  as   well  as  his/her  progress   in ', 0, 0, 'L');
$pdf->SetFont('Times','B',12);
$pdf->Cell(140, 5, 'DEPARTMENT OF EDUCATION', 0, 1, 'C');
$pdf->SetFont('Arial','B',10);
$pdf->SetFont('');
$pdf->Cell(140, 5, 'character development.', 0, 0, 'L');
$pdf->SetFont('Arial','B',9);
$pdf->SetFont('');
$pdf->Cell(140, 5, 'NATIONAL CAPITAL REGION', 0, 1, 'C');

$pdf->SetFont('Arial','B',10);
$pdf->SetFont('');
$pdf->Cell(140, 5, '         The    school    welcomes    you    if   you    desire    to   know   more', 0, 0, 'L');
$pdf->SetFont('Arial','B',9);
$pdf->SetFont('');
$pdf->Cell(140, 5, 'Division of City Schools, Muntinlupa', 0, 1, 'C');
$pdf->SetFont('Arial','B',10);
$pdf->SetFont('');
$pdf->Cell(140, 5, 'about the progress of your child.', 0, 0, 'L');




$pdf->Cell(10, 5, '', 0, 1, 'L');
$pdf->SetFont('Arial','B',8);
$pdf->SetFont('');
$pdf->Cell(130, 5, $teacher, 0, 0, 'R');
$pdf->Cell(10, 5, '', 0, 0, 'R');
$pdf->SetFont('Times','B',20);
$pdf->Cell(140, 5, 'LYCEUM OF ALABANG INC.', 0, 1, 'C');
$pdf->SetFont('Arial','B',8);
$pdf->SetFont('');
$pdf->Cell(140, 5, "Adviser's Signature over Printed Name              ", 0, 0, 'R');
$pdf->SetFont('Arial','B',10);
$pdf->SetFont('');
$pdf->Cell(140, 5, "Km. 30, National Road, Tunasan, Muntinlupa City", 0, 1, 'C');
$pdf->Cell(140, 5, '', 0, 0, 'L');
$pdf->Cell(140, 5, '1773 Philippines', 0, 1, 'C');
$pdf->SetFont('Arial','B',14);
$pdf->Cell(140, 5, '', 0, 1, 'L');
$pdf->Cell(140, 5, "PARENT/GUARDIAN'S SIGNATURE", 0, 1, 'C');
$pdf->SetFont('Arial','B',10);
$pdf->SetFont('');
$pdf->Cell(10, 5, '', 0, 1, 'L');
$pdf->Cell(140, 5, "First Quarter:         _________________________________________________", 0, 0, 'L');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(140, 5, "Basic Education Department", 0, 1, 'C');
$pdf->SetFont('Arial','B',10);
$pdf->SetFont('');
$pdf->Cell(140, 5, "Second Quarter:    _________________________________________________", 0, 1, 'L');
$pdf->Cell(140, 5, "Third Quarter:        _________________________________________________", 0, 0, 'L');
$pdf->SetFont('Arial','B',20);
$pdf->Cell(140, 5, "SENIOR HIGH SCHOOL", 0, 1, 'C');
$pdf->SetFont('Arial','B',12);
$pdf->SetFont('Arial','B',10);
$pdf->SetFont('');
$pdf->Cell(140, 5, "Fourth Quarter:      _________________________________________________", 0, 1, 'L');
$pdf->SetFont('Arial','B',10);
$pdf->SetFont('');
$pdf->SetFont('Arial','B',14);
$pdf->Cell(140, 5, '', 0, 0, 'L');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(140, 5, "K-12", 0, 1, 'C');
$pdf->Cell(140, 5, "CERTIFICATE OF TRANSFER", 0, 1, 'C');
$pdf->SetFont('Arial','B',10);
$pdf->SetFont('');
$pdf->Cell(10, 5, '', 0, 1, 'L');
$pdf->Cell(140, 5, "Admitted to Grade: ________________________________________________", 0, 0, 'L');
$pdf->SetFont('Arial','B',16);
$pdf->SetFont('');
$pdf->Cell(140, 5, "PROGRESS REPORT CARD", 0, 1, 'C');
$pdf->SetFont('Arial','B',10);
$pdf->SetFont('');
$pdf->Cell(140, 5, "Eligibility for admission to:    _________________________________________", 0, 0, 'L');
$pdf->SetFont('Arial','B',9);
$pdf->SetFont('');
$pdf->Cell(0, 5, "SCHOOL YEAR: 2020-2021", 0, 0, 'C');

$pdf->SetFont('Arial','B',10);
$pdf->SetFont('');
$pdf->Cell(10, 5, '', 0, 1, 'L');
$pdf->Cell(70, 5, "Engr. Rodrigo P. Calapan", 0, 0, 'C');
$pdf->Cell(70, 5, "Ms. Charito F. Cano", 0, 1, 'C');
$pdf->Cell(70, 5, "Principal", 0, 0, 'C');
$pdf->Cell(70, 5, "Directress", 0, 0, 'C');
$pdf->Cell(140, 5, '', 0, 0, 'L');
$pdf->SetFont('Arial','B',12);
$pdf->SetFont('');
$pdf->Cell(140, 5, "Name: $name" , 0, 1, 'C');
$pdf->SetFont('Arial','B',14);
$pdf->Cell(10, 5, '', 0, 1, 'L');
$pdf->Cell(140, 5, "CANCELLATION OF ELIGIBILITY TO TRANSFER", 0, 0, 'C');
$pdf->SetFont('Arial','B',12);
$pdf->SetFont('');
$pdf->Cell(140, 5, "Name: $name", 0, 1, 'C');
$pdf->SetFont('Arial','B',1);
$pdf->SetFont('');
$pdf->Cell(10, 5, '', 0, 1, 'L');
$pdf->SetFont('Arial','B',10);
$pdf->SetFont('');
$pdf->Cell(140, 5, "Admitted in:       ____________________________________________________", 0, 0, 'L');
$pdf->SetFont('Arial','B',12);
$pdf->SetFont('');
$pdf->Cell(140, 5, "LRN: $lrn", 0, 1, 'C');
$pdf->SetFont('Arial','B',10);
$pdf->SetFont('');
$pdf->Cell(140, 5, "Date:                 _____________________________________________________", 0, 1, 'L');
$pdf->SetFont('Arial','B',10);
$pdf->SetFont('');
$pdf->Cell(70, 5, "Engr. Rodrigo P. Calapan", 0, 0, 'C');
$pdf->Cell(70, 5, "Ms. Charito F. Cano", 0, 0, 'C');
$pdf->SetFont('Arial','B',12);
$pdf->SetFont('');
$pdf->Cell(70, 5, "                      Age:    		        ", 0, 0, 'C');
$pdf->Cell(0, 5, "            Sex: $gender                         ", 0, 1, 'C');
$pdf->SetFont('Arial','B',10);
$pdf->SetFont('');
$pdf->Cell(70, 5, "Principal", 0, 0, 'C');
$pdf->Cell(70, 5, "Directress", 0, 1, 'C');
$pdf->Cell(140, 5, '', 0, 0, 'L');

$pdf->SetFont('Arial','B',12);
$pdf->SetFont('');
$pdf->Cell(70, 5, "                  Grade: $grade        ", 0, 0, 'C');
$pdf->Cell(70, 5, "        Section: $section                         ", 0, 1, 'C');
$pdf->Cell(262, 5, "", 0, 1, 'R');
$pdf->Cell(140, 5, "", 0, 0, 'C');
$pdf->Cell(140, 5, "Track: $track", 0, 1, 'C');
$pdf->Cell(262, 5, "", 0, 1, 'R');
$pdf->Cell(140, 5, "", 0, 0, 'C');
$pdf->Cell(140, 5, "Strand: $strand", 0, 1, 'C');


#$pdf->Ln();
$pdf->SetFont('Arial','B',10);
$pdf->Cell(10, 5, '', 0, 1, 'L');
$pdf->Cell(10, 5, '', 0, 1, 'L');
$pdf->Cell(10, 5, '', 0, 1, 'L');
$pdf->Cell(10, 5, '', 0, 1, 'L');
$pdf->Cell(10, 5, '', 0, 1, 'L');
$pdf->Cell(10, 5, '', 0, 1, 'L');
$pdf->Cell(10, 5, '', 0, 1, 'L');
#Cell(width, height, text, border, endline, 'align')

$pdf->Cell(140, 5, 'REPORT ON LEARNING PROGRESS & ACHIEVEMENT', 0, 0, 'C');
$pdf->Cell(150, 5, 'REPORT ON LEARNERS OBSERVED VALUES', 0, 1, 'C');
//overall width : 280, 140 magkabila
$pdf->SetFont('Arial','B',8);
//kunwari 1 fourth
//lalagayn ng 1 kapag walang border
//kapag gusto mo lagayn yung right side naman
//zero para hindi mag line break
//yung dun sa ano marius colspawn
// pano ialagay sa gitna yung table, rin ba yung kahit walang border ?
//oo pwede paanong gitna, gitna yung text?
// yung mga nakalagay dun sa card na mga text lang naka table kase yung wala lang border or line para madali lang i design.
//para sa colspan? di ko gets, 
// pano mo wait para saan yung eto ?
//structure ng bawat cell:
//Cell('width', 'height', 'text', 'kung may border or wala', 'kung line break o hindi', 'textx-align')
//need ko lang talaga yung rowspan pati colspan 
//sige gawin ko
//gagawin mong 10 yung height ng nasa taas nya


//experimento lang sa mga width at height
//yung pinasa mong link makikita ko lahat to dun ? para if malito ako pwede akong maka kuha ng idea dun?
//oo nandun na sa site yung lahat ng tutorial, may online compiler din ata sila dun
//tsaka pala, ang mahiraap dito is kailangan mong pagsabayin yung left at right side ng pdf kasi mahirap gawin yung column nila
//width ng lahat: 280
//bahala na kung anong mamangyayare dito. g1
//kailangan ko bukas ngayon na dapat deadline ng survey, byeeb

//kapag rowspan naman



$pdf->Cell(140, 5, 'First Semester', 0, 1, 'L');
$pdf->Cell(100, 10, 'Subject', 1, 0, 'L');
$pdf->Cell(20, 5, 'Quarter', 1, 0, 'C');
$pdf->Cell(20, 10, 'Final Grade', 1, 0, 'C');
$pdf->Cell(10, 5, '', 0, 0, 'L');
$pdf->Cell(25, 10, 'Core Values', 1, 0, 'L');
$pdf->Cell(0.1, 5, '', 0, 0, 'L');
$pdf->Cell(60, 5, 'Quarterly Assesment', 1, 0, 'C');
$pdf->Cell(44.2, 5, 'Quarter', 1, 1, 'C');
$pdf->Cell(0.1, 5, '', 0, 0, 'L');
$pdf->Cell(0.1, 5, '', 0, 0, 'L');
$pdf->Cell(100, 5, '', 0, 0, 'L');
$pdf->Cell(10, 5, '1', 1, 0, 'C');
$pdf->Cell(10, 5, '2', 1, 0, 'C');
$pdf->Cell(55, 5, '', 0, 0, 'L');
$pdf->Cell(60, 5, 'Behavioral Assesment', 1, 0, 'L');
$pdf->Cell(0.1, 5, '', 0, 0, 'L');
$pdf->Cell(11, 5, '1', 1, 0, 'L');
$pdf->Cell(11, 5, '2', 1, 0, 'L');
$pdf->Cell(11, 5, '3', 1, 0, 'L');
$pdf->Cell(11, 5, '4', 1, 0, 'L');


$pdf->Cell(20, 5, '', 0, 1, 'L');
$pdf->Cell(0.1, 5, '', 0, 0, 'L');
$pdf->Cell(140, 5, 'Core Subjects1', 1, 0, 'L');
$pdf->Cell(10, 5, '', 0, 0, 'L');
$pdf->Cell(25, 20, '1. Maka-diyos', 1, 0, 'L');
$pdf->Cell(0.1, 4, "Expresses one's spiritual beleifs while", 0, 0, 'L');
$pdf->Cell(59.9, 10, "repecting the spiritual belief of others.", 1, 0, 'L');
$pdf->Cell(0.1, 5, '', 0, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(20, 5, '', 0, 1, 'L');
$pdf->Cell(20, 5, 'CS 5', 1, 0, 'L');
$pdf->Cell(80, 5, '21st Century Literature from the Philippines and the World', 1, 0, 'L');
$pdf->Cell(10, 5, $core1first, 1, 0, 'C');
$pdf->Cell(10, 5, $core1sec, 1, 0, 'C');
$pdf->Cell(20, 5, $core1ave, 1, 0, 'C');
$pdf->Cell(0.1, 5, '', 0, 1, 'L');

$pdf->Cell(20, 5, 'CS 7', 1, 0, 'L');
$pdf->Cell(80, 5, 'Media and Information Literacy', 1, 0, 'L');
$pdf->Cell(10, 5, $core2first, 1, 0, 'C');
$pdf->Cell(10, 5, $core2sec, 1, 0, 'C');
$pdf->Cell(20, 5, $core2ave, 1, 0, 'C');
$pdf->Cell(35, 20, '', 0, 0, 'L');
$pdf->Cell(0.1, 6, 'Shows adherence, to ethical principles by', 0, 0, 'L');
$pdf->Cell(60, 12, 'holding truth.', 0, 0, 'L');
$pdf->Cell(0.1, 5, '', 0, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(70, 10, '', 0, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(50, 5, '', 0, 1, 'L');
$pdf->Cell(20, 5, 'CS 15-3', 1, 0, 'L');
$pdf->Cell(80, 5, 'Physical Education and Health 3', 1, 0, 'L');
$pdf->Cell(10, 5, $core3first, 1, 0, 'C');
$pdf->Cell(10, 5, $core3sec, 1, 0, 'C');
$pdf->Cell(20, 5, $core3ave, 1, 1, 'C');
$pdf->Cell(20, 5, '', 1, 0, 'L');
$pdf->Cell(80, 5, '', 1, 0, 'L');
$pdf->Cell(10, 5, '', 1, 0, 'L');
$pdf->Cell(10, 5, '', 1, 0, 'L');
$pdf->Cell(20, 5, '', 1, 0, 'L');
$pdf->Cell(10, 5, '', 0, 0, 'L');
$pdf->Cell(25, 20, '2. Maka-tao', 1, 0, 'L');
$pdf->Cell(0.1, 4, 'Is sensitive to individual, social, and', 0, 0, 'L');
$pdf->Cell(59.9, 10, 'cultural difference.', 1, 0, 'L');
$pdf->Cell(0.1, 5, '', 0, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(20, 5, '', 0, 1, 'L');
$pdf->Cell(140, 5, 'Applied and Specialized Subjects', 1, 0, 'L');
$pdf->Cell(20, 5, '', 0, 1, 'L');
$pdf->Cell(20, 5, 'AS 3', 1, 0, 'L');
$pdf->Cell(80, 5, 'Practical Research 2', 1, 0, 'L');
$pdf->Cell(10, 5, $app1first, 1, 0, 'C');
$pdf->Cell(10, 5, $app1sec, 1, 0, 'C');
$pdf->Cell(20, 5, $app1ave, 1, 0, 'C');
$pdf->Cell(10, 5, '', 0, 0, 'L');
$pdf->Cell(25, 20, '', 0, 0, 'L');
$pdf->Cell(0.1, 5, 'Demonstrates contributions toward', 0, 0, 'L');
$pdf->Cell(59.9, 11, 'solidarity.', 0, 0, 'L');
$pdf->Cell(0.1, 5, '', 0, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(20, 5, '', 0, 1, 'L');
$pdf->Cell(20, 5, 'AS 4', 1, 0, 'L');
$pdf->Cell(80, 5, 'Pagsulat sa Filipino sa Larangan ng TVL (ICT)', 1, 0, 'L');
$pdf->Cell(10, 5, $app2first, 1, 0, 'C');
$pdf->Cell(10, 5, $app2sec, 1, 0, 'C');
$pdf->Cell(20, 5, $app2ave, 1, 0, 'C');
$pdf->Cell(20, 5, '', 0, 1, 'L');
$pdf->Cell(20, 5, 'AS 6', 1, 0, 'L');
$pdf->Cell(80, 5, 'Entrepreneurship', 1, 0, 'L');
$pdf->Cell(10, 5, $app3first, 1, 0, 'C');
$pdf->Cell(10, 5, $app3sec, 1, 0, 'C');
$pdf->Cell(20, 5, $app3ave, 1, 0, 'C');
$pdf->Cell(10, 5, '', 0, 0, 'L');
$pdf->Cell(25, 10, '3. Makakalikasan', 1, 0, 'L');
$pdf->Cell(0.1, 5, 'Cares for the environment and utilizes', 0, 0, 'L');
$pdf->Cell(60, 10, 'resource wisely, judiciously, and ', 1, 0, 'L');
$pdf->Cell(0.1, 5, '', 0, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(20, 5, '', 0, 1, 'L');
$pdf->Cell(20, 5, 'TVS 5', 1, 0, 'L');
$pdf->Cell(80, 5, 'Computer Programming 2A (SAUD)', 1, 0, 'L');
$pdf->Cell(10, 5, $app4first, 1, 0, 'C');
$pdf->Cell(10, 5, $app4sec, 1, 0, 'C');
$pdf->Cell(20, 5, $app4ave, 1, 0, 'C');
$pdf->Cell(35, 5, '', 0, 0, 'L');
$pdf->Cell(0.1, 5, 'economically', 0, 0, 'L');
$pdf->Cell(10, 5, '', 0, 0, 'L');
$pdf->Cell(11, 5, '', 0, 1, 'L');
$pdf->Cell(20, 5, 'TVS 6', 1, 0, 'L');
$pdf->Cell(80, 5, 'Computer Programming 2B (EEDP.Net)', 1, 0, 'L');
$pdf->Cell(10, 5, $app5first, 1, 0, 'C');
$pdf->Cell(10, 5, $app5sec, 1, 0, 'C');
$pdf->Cell(20, 5, $app5ave, 1, 0, 'C');
$pdf->Cell(10, 5, '', 0, 0, 'L');
$pdf->Cell(25, 20, '4. Makabansa', 1, 0, 'L');
$pdf->Cell(0.1, 5, 'Demonstrates pride in being a Filipino; ', 0, 0, 'L');
$pdf->Cell(60, 10, 'exercises the rights and responsibilities of', 1, 0, 'L');
$pdf->Cell(0.1, 5, '', 0, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(11, 5, '', 0, 1, 'L');
$pdf->Cell(20, 5, '', 1, 0, 'L');
$pdf->Cell(80, 5, 'Average each Quarter', 1, 0, 'R');
$pdf->Cell(10, 5, $first_first_ave, 1, 0, 'C');
$pdf->Cell(10, 5, $first_sec_ave, 1, 0, 'C');
$pdf->Cell(20, 5, '', 1, 0, 'C');
$pdf->Cell(35, 5, '', 0, 0, 'L');
$pdf->Cell(0.1, 5, 'a Filipino citizen.', 0, 0, 'L');
$pdf->Cell(20, 5, '', 0, 1, 'L');
$pdf->Cell(120, 5, 'Average for the Semester', 1, 0, 'R');
$pdf->Cell(20, 5, $ave, 1, 0, 'C');
$pdf->Cell(10, 5, '', 0, 0, 'L');
$pdf->Cell(25, 20, '', 0, 0, 'L');
$pdf->Cell(0.1, 5, 'Demonstrates appropriate behavior in', 0, 0, 'L');
$pdf->Cell(60, 10, 'carrying out activities in the school', 1, 0, 'L');
$pdf->Cell(0.1, 5, '', 0, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(11, 5, '', 0, 1, 'L');





$pdf->Cell(140, 5, 'Second Semester', 0, 0, 'L');
$pdf->Cell(35, 5, '', 0, 0, 'L');
$pdf->Cell(0.1, 5, 'community, and country', 0, 1, 'L');
$pdf->Cell(100, 10, 'Subject', 1, 0, 'L');
$pdf->Cell(20, 5, 'Quarter', 1, 0, 'C');
$pdf->Cell(20, 10, 'Final Grade', 1, 0, 'C');
$pdf->Cell(10, 20, '', 0, 0, 'L');
$pdf->Cell(130, 10, 'Marking            Non-Numerical Rating', 0, 0, 'C');
$pdf->Cell(11, 5, '', 0, 1, 'L');
$pdf->Cell(100, 5, '', 0, 0, 'L');
$pdf->Cell(10, 5, '1', 1, 0, 'C');
$pdf->Cell(10, 5, '2', 1, 0, 'C');
$pdf->Cell(30, 5, '', 0, 0, 'L');
$pdf->Cell(130, 10, 'AO                 Always Observed', 0, 0, 'C');
$pdf->Cell(11, 5, '', 0, 1, 'L');
$pdf->Cell(140, 5, 'Core Subjects', 1, 0, 'L');
$pdf->Cell(13, 5, '', 0, 0, 'L');
$pdf->Cell(130, 10, 'SO                 Sometimes Observed', 0, 0, 'C');
$pdf->Cell(11, 5, '', 0, 1, 'L');

$pdf->Cell(20, 5, 'CS 6', 1, 0, 'L');
$pdf->Cell(80, 5, 'Contemporary Philippines Arts from the World', 1, 0, 'L');
$pdf->Cell(10, 5, '', 1, 0, 'C');
$pdf->Cell(10, 5, '', 1, 0, 'C');
$pdf->Cell(20, 5, '', 1, 0, 'C');
$pdf->Cell(10, 5, '', 0, 0, 'L');
$pdf->Cell(130, 10, 'RO                 Rarely Observed', 0, 0, 'C');
$pdf->Cell(11, 5, '', 0, 1, 'L');
$pdf->Cell(20, 5, 'CS 11', 1, 0, 'L');
$pdf->Cell(80, 5, 'Physical Science', 1, 0, 'L');
$pdf->Cell(10, 5, '', 1, 0, 'C');
$pdf->Cell(10, 5, '', 1, 0, 'C');
$pdf->Cell(20, 5, '', 1, 0, 'C');
$pdf->Cell(8, 5, '', 0, 0, 'L');
$pdf->Cell(130, 10, 'NO                 Not Observed', 0, 0, 'C');
$pdf->Cell(11, 5, '', 0, 1, 'L');
$pdf->Cell(20, 5, 'CS 13', 1, 0, 'L');
$pdf->Cell(80, 5, 'Understanding Culture, Society and Politics', 1, 0, 'L');
$pdf->Cell(10, 5, '', 1, 0, 'C');
$pdf->Cell(10, 5, '', 1, 0, 'C');
$pdf->Cell(20, 5, '', 1, 1, 'C');
$pdf->Cell(20, 5, 'CS 15-4', 1, 0, 'L');
$pdf->Cell(80, 5, 'Physical Education and Health 4', 1, 0, 'L');
$pdf->Cell(10, 5, '', 1, 0, 'C');
$pdf->Cell(10, 5, '', 1, 0, 'C');
$pdf->Cell(20, 5, '', 1, 0, 'C');
$pdf->Cell(10, 5, '', 0, 0, 'L');
$pdf->Cell(130, 5, 'REPORT ON ATTENDANCE', 0, 0, 'C');
$pdf->Cell(11, 5, '', 0, 1, 'L');

$pdf->Cell(20, 5, '', 1, 0, 'L');
$pdf->Cell(80, 5, '', 1, 0, 'L');
$pdf->Cell(10, 5, '', 1, 0, 'L');
$pdf->Cell(10, 5, '', 1, 0, 'L');
$pdf->Cell(20, 5, '', 1, 0, 'L');
$pdf->Cell(20, 5, '', 0, 0, 'L');
$pdf->Cell(30, 5, 'Month', 1, 0, 'C');
$pdf->Cell(7, 5, 'Jul', 1, 0, 'C');
$pdf->Cell(7, 5, 'Aug', 1, 0, 'C');
$pdf->Cell(7, 5, 'Sep', 1, 0, 'C');
$pdf->Cell(7, 5, 'Oct', 1, 0, 'C');
$pdf->Cell(7, 5, 'Nov', 1, 0, 'C');
$pdf->Cell(7, 5, 'Dec', 1, 0, 'C');
$pdf->Cell(7, 5, 'Jan', 1, 0, 'C');
$pdf->Cell(7, 5, 'Feb', 1, 0, 'C');
$pdf->Cell(7, 5, 'Mar', 1, 0, 'C');
$pdf->Cell(7, 5, 'Apr', 1, 0, 'C');
$pdf->Cell(7, 5, 'May', 1, 0, 'C');
$pdf->Cell(7, 5, 'Total', 1, 0, 'C');
$pdf->Cell(11, 5, '', 0, 1, 'L');
$pdf->Cell(140, 5, 'Applied and Specialized Subjects', 1, 0, 'L');
$pdf->Cell(20, 5, '', 0, 0, 'L');
$pdf->Cell(30, 5, 'No. of School Days', 1, 0, 'C');
$pdf->Cell(7, 5, '', 1, 0, 'C');
$pdf->Cell(7, 5, '', 1, 0, 'C');
$pdf->Cell(7, 5, '', 1, 0, 'C');
$pdf->Cell(7, 5, '', 1, 0, 'C');
$pdf->Cell(7, 5, '', 1, 0, 'C');
$pdf->Cell(7, 5, '', 1, 0, 'C');
$pdf->Cell(7, 5, '', 1, 0, 'C');
$pdf->Cell(7, 5, '', 1, 0, 'C');
$pdf->Cell(7, 5, '', 1, 0, 'C');
$pdf->Cell(7, 5, '', 1, 0, 'C');
$pdf->Cell(7, 5, '', 1, 0, 'C');
$pdf->Cell(7, 5, '', 1, 0, 'C');
$pdf->Cell(11, 5, '', 0, 1, 'L');
$pdf->Cell(20, 5, 'AS 7', 1, 0, 'L');
$pdf->Cell(80, 5, 'Research Project', 1, 0, 'L');
$pdf->Cell(10, 5, '', 1, 0, 'C');
$pdf->Cell(10, 5, '', 1, 0, 'C');
$pdf->Cell(20, 5, '', 1, 0, 'C');
$pdf->Cell(20, 5, '', 0, 0, 'L');
$pdf->Cell(30, 5, 'No. of Present', 1, 0, 'C');
$pdf->Cell(7, 5, '', 1, 0, 'C');
$pdf->Cell(7, 5, '', 1, 0, 'C');
$pdf->Cell(7, 5, '', 1, 0, 'C');
$pdf->Cell(7, 5, '', 1, 0, 'C');
$pdf->Cell(7, 5, '', 1, 0, 'C');
$pdf->Cell(7, 5, '', 1, 0, 'C');
$pdf->Cell(7, 5, '', 1, 0, 'C');
$pdf->Cell(7, 5, '', 1, 0, 'C');
$pdf->Cell(7, 5, '', 1, 0, 'C');
$pdf->Cell(7, 5, '', 1, 0, 'C');
$pdf->Cell(7, 5, '', 1, 0, 'C');
$pdf->Cell(7, 5, '', 1, 0, 'C');
$pdf->Cell(11, 5, '', 0, 1, 'L');
$pdf->Cell(20, 5, 'TVS 7', 1, 0, 'L');
$pdf->Cell(80, 5, 'Computer Programming 2A (WP)', 1, 0, 'L');
$pdf->Cell(10, 5, '', 1, 0, 'C');
$pdf->Cell(10, 5, '', 1, 0, 'C');
$pdf->Cell(20, 5, '', 1, 1, 'C');
$pdf->Cell(20, 5, 'TVS 8', 1, 0, 'L');
$pdf->Cell(80, 5, 'Computer Programming 2B (CSS)', 1, 0, 'L');
$pdf->Cell(10, 5, '', 1, 0, 'C');
$pdf->Cell(10, 5, '', 1, 0, 'C');
$pdf->Cell(20, 5, '', 1, 0, 'C');
$pdf->Cell(10, 5, '', 0, 0, 'L');
$pdf->Cell(140, 5, 'VISION', 0, 1, 'C');
$pdf->Cell(20, 5, 'TVS 9', 1, 0, 'L');
$pdf->Cell(80, 5, 'Work Immersion/ Career Advocacy/ Culminating Activity', 1, 0, 'L');
$pdf->Cell(10, 5, '', 1, 0, 'C');
$pdf->Cell(10, 5, '', 1, 0, 'C');
$pdf->Cell(20, 5, '', 1, 0, 'C');
$pdf->Cell(15, 5, '', 0, 0, 'L');
$pdf->Cell(0.1, 5, "Lyceum of Alabang envision in becoming one of the nation's leading educational institution", 0, 0, 'L');
$pdf->Cell(130, 13, 'in volved in the pursuit of the advancemnt of knowledge, skills, and values for personal,', 0, 0, 'L');
$pdf->Cell(10, 5, '', 0, 1, 'L');
$pdf->Cell(20, 5, '', 1, 0, 'L');
$pdf->Cell(80, 5, 'Average each Quarter', 1, 0, 'R');
$pdf->Cell(10, 5, '', 1, 0, 'C');
$pdf->Cell(10, 5, '', 1, 0, 'C');
$pdf->Cell(20, 5, '', 1, 1, 'L');
$pdf->Cell(120, 5, 'Average for the Semester', 1, 0, 'R');
$pdf->Cell(20, 5, '', 1, 0, 'C');
$pdf->Cell(15, 5, '', 0, 0, 'R');
$pdf->Cell(0.1, 5, "community, and national development.", 0, 1, 'L');
$pdf->Cell(20, 5, '', 0, 1, 'L');
$pdf->Cell(20, 5, '', 0, 0, 'L');
$pdf->Cell(30, 5, 'Descriptors', 0, 0, 'L');
$pdf->Cell(30, 5, 'Grading Scale', 0, 0, 'L');
$pdf->Cell(30, 5, 'Remarks', 0, 0, 'L');
$pdf->Cell(40, 5, '', 0, 0, 'L');
$pdf->Cell(140, 5, 'MISSION', 0, 1, 'C');

$pdf->Cell(20, 5, '', 0, 0, 'L');
$pdf->Cell(30, 5, 'Outstanding', 0, 0, 'L');
$pdf->Cell(30, 5, '90-100', 0, 0, 'L');
$pdf->Cell(30, 5, 'Passed', 0, 0, 'L');
$pdf->Cell(45, 5, '', 0, 0, 'L');
$pdf->Cell(0.1, 5, 'Lyceum of Alabang shall provide world-class education and training through competent', 0, 0, 'L');
$pdf->Cell(130, 13, 'personne, high-end facilities and equipment, and accredited industy-based programs', 0, 0, 'L');
$pdf->Cell(10, 5, '', 0, 1, 'L');

$pdf->Cell(20, 5, '', 0, 0, 'L');
$pdf->Cell(30, 5, 'Very Satisfactory', 0, 0, 'L');
$pdf->Cell(30, 5, '85-89', 0, 0, 'L');
$pdf->Cell(30, 5, 'Passed', 0, 0, 'L');
$pdf->Cell(40, 5, '', 0, 1, 'L');

$pdf->Cell(20, 5, '', 0, 0, 'L');
$pdf->Cell(30, 5, 'Satisfactory', 0, 0, 'L');
$pdf->Cell(30, 5, '80-84', 0, 0, 'L');
$pdf->Cell(30, 5, 'Passed', 0, 0, 'L');
$pdf->Cell(40, 5, '', 0, 1, 'L');

$pdf->Cell(20, 5, '', 0, 0, 'L');
$pdf->Cell(30, 5, 'Fairly Satisfactory', 0, 0, 'L');
$pdf->Cell(30, 5, '75-79', 0, 0, 'L');
$pdf->Cell(30, 5, 'Passed', 0, 0, 'L');
$pdf->Cell(40, 5, '', 0, 0, 'L');
$pdf->Cell(140, 5, 'MISSION', 0, 1, 'C');


$pdf->Cell(20, 5, '', 0, 0, 'L');
$pdf->Cell(30, 5, 'Did Not Meet', 0, 0, 'L');
$pdf->Cell(30, 5, 'Below 75', 0, 0, 'L');
$pdf->Cell(30, 5, 'Failed', 0, 0, 'L');
$pdf->Cell(45, 5, '', 0, 0, 'L');
$pdf->Cell(0.1, 4, 'We, at the lyceum of Alabang commit ourselves to exceed the expectations of our stakeholders', 0, 0, 'L');
$pdf->Cell(130, 11, 'through continual improvement for effective and ifficient provision of quality education and ', 0, 0, 'L');
$pdf->Cell(10, 5, '', 0, 1, 'L');
$pdf->Cell(155, 5, '', 0, 0, 'L');
$pdf->Cell(0.1, 6, 'training. We will ensure that all our academic and non-academic process and activities are aligned', 0, 1, 'L');
$pdf->Cell(155, 5, '', 0, 0, 'L');
$pdf->Cell(0.1, 5, 'with  their voice.', 0, 0, 'L');

switch ($file=$pdf->Output("attachment.pdf", "S")) {
    default:
    header("location: ../../url.php?grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=two&error=none");

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
	$mail->FromName = $email;			//Sets the From name of the message
	$mail->AddBCC($emailp, 'Parent');		//Adds a "To" address
    $mail->AddBCC($emailp1, 'Parent');		//Adds a "To" address
    $mail->AddBCC($emailp2, 'Parent');		//Adds a "To" address
    $mail->AddBCC($emailp3, 'Parent');		//Adds a "To" address
	$mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
	$mail->IsHTML(true);							//Sets message type to HTML	
    $mail->AddStringAttachment($file, 'attachment.pdf');    				//Adds an attachment from a path on the filesystem
   

	$mail->Subject = 'Grade Sheet of Student';			//Sets the Subject of the message
	$mail->Body = $body;			//An HTML or plain text message body

	if($mail->Send())        //Send an Email. Return true on success or false on error
    {
        $_SESSION['status']='sent';
    }
    else {
        $_SESSION['status']='failed';
    }
    unlink($file_name);
    }
    
}
elseif ($sem==2) {
    if ($radio=="all") {
        $pdf = new FPDF('L','mm',array(245,300));

$pdf->AddPage();

$pdf->SetFont('Arial','B',10);
//width, height, text, border, yung zero sa dulo, ibig sabihin hindi new line, pag ginawa mo itong 1, magla line break sya, tapos text align yung dulo

$pdf->Cell(140, 5, 'Dear Parents', 0, 0, 'L');
$pdf->Cell(10, 5, '', 0, 0, 'L');
$pdf->Cell(140, 5, 'SF 9-SHS', 0, 1, 'L');
$pdf->SetFont('Arial','B',10);
$pdf->SetFont('');
$pdf->Cell(140, 5, '            This   report  card   shows  the   ability   and   progress   your   child', 0, 0, 'L');
$pdf->Cell(140, 5, 'Republic of the Philippines', 0, 1, 'C');
// Insert a logo in the top-left corner at 300 dpi
$pdf->Image('../../../../pics/loa.png',165,15,-1200);
$pdf->Image('../../../../pics/deped.jpg',255,15,23);
$pdf->Image($signature,110,35,25);
$pdf->Cell(140, 5, 'has  made  in  different  learning   areas  as   well  as  his/her  progress   in ', 0, 0, 'L');
$pdf->SetFont('Times','B',12);
$pdf->Cell(140, 5, 'DEPARTMENT OF EDUCATION', 0, 1, 'C');
$pdf->SetFont('Arial','B',10);
$pdf->SetFont('');
$pdf->Cell(140, 5, 'character development.', 0, 0, 'L');
$pdf->SetFont('Arial','B',9);
$pdf->SetFont('');
$pdf->Cell(140, 5, 'NATIONAL CAPITAL REGION', 0, 1, 'C');

$pdf->SetFont('Arial','B',10);
$pdf->SetFont('');
$pdf->Cell(140, 5, '         The    school    welcomes    you    if   you    desire    to   know   more', 0, 0, 'L');
$pdf->SetFont('Arial','B',9);
$pdf->SetFont('');
$pdf->Cell(140, 5, 'Division of City Schools, Muntinlupa', 0, 1, 'C');
$pdf->SetFont('Arial','B',10);
$pdf->SetFont('');
$pdf->Cell(140, 5, 'about the progress of your child.', 0, 0, 'L');




$pdf->Cell(10, 5, '', 0, 1, 'L');
$pdf->SetFont('Arial','B',8);
$pdf->SetFont('');
$pdf->Cell(130, 5, $teacher, 0, 0, 'R');
$pdf->Cell(10, 5, '', 0, 0, 'R');
$pdf->SetFont('Times','B',20);
$pdf->Cell(140, 5, 'LYCEUM OF ALABANG INC.', 0, 1, 'C');
$pdf->SetFont('Arial','B',8);
$pdf->SetFont('');
$pdf->Cell(140, 5, "Adviser's Signature over Printed Name              ", 0, 0, 'R');
$pdf->SetFont('Arial','B',10);
$pdf->SetFont('');
$pdf->Cell(140, 5, "Km. 30, National Road, Tunasan, Muntinlupa City", 0, 1, 'C');
$pdf->Cell(140, 5, '', 0, 0, 'L');
$pdf->Cell(140, 5, '1773 Philippines', 0, 1, 'C');
$pdf->SetFont('Arial','B',14);
$pdf->Cell(140, 5, '', 0, 1, 'L');
$pdf->Cell(140, 5, "PARENT/GUARDIAN'S SIGNATURE", 0, 1, 'C');
$pdf->SetFont('Arial','B',10);
$pdf->SetFont('');
$pdf->Cell(10, 5, '', 0, 1, 'L');
$pdf->Cell(140, 5, "First Quarter:         _________________________________________________", 0, 0, 'L');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(140, 5, "Basic Education Department", 0, 1, 'C');
$pdf->SetFont('Arial','B',10);
$pdf->SetFont('');
$pdf->Cell(140, 5, "Second Quarter:    _________________________________________________", 0, 1, 'L');
$pdf->Cell(140, 5, "Third Quarter:        _________________________________________________", 0, 0, 'L');
$pdf->SetFont('Arial','B',20);
$pdf->Cell(140, 5, "SENIOR HIGH SCHOOL", 0, 1, 'C');
$pdf->SetFont('Arial','B',12);
$pdf->SetFont('Arial','B',10);
$pdf->SetFont('');
$pdf->Cell(140, 5, "Fourth Quarter:      _________________________________________________", 0, 1, 'L');
$pdf->SetFont('Arial','B',10);
$pdf->SetFont('');
$pdf->SetFont('Arial','B',14);
$pdf->Cell(140, 5, '', 0, 0, 'L');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(140, 5, "K-12", 0, 1, 'C');
$pdf->Cell(140, 5, "CERTIFICATE OF TRANSFER", 0, 1, 'C');
$pdf->SetFont('Arial','B',10);
$pdf->SetFont('');
$pdf->Cell(10, 5, '', 0, 1, 'L');
$pdf->Cell(140, 5, "Admitted to Grade: ________________________________________________", 0, 0, 'L');
$pdf->SetFont('Arial','B',16);
$pdf->SetFont('');
$pdf->Cell(140, 5, "PROGRESS REPORT CARD", 0, 1, 'C');
$pdf->SetFont('Arial','B',10);
$pdf->SetFont('');
$pdf->Cell(140, 5, "Eligibility for admission to:    _________________________________________", 0, 0, 'L');
$pdf->SetFont('Arial','B',9);
$pdf->SetFont('');
$pdf->Cell(0, 5, "SCHOOL YEAR: 2020-2021", 0, 0, 'C');

$pdf->SetFont('Arial','B',10);
$pdf->SetFont('');
$pdf->Cell(10, 5, '', 0, 1, 'L');
$pdf->Cell(70, 5, "Engr. Rodrigo P. Calapan", 0, 0, 'C');
$pdf->Cell(70, 5, "Ms. Charito F. Cano", 0, 1, 'C');
$pdf->Cell(70, 5, "Principal", 0, 0, 'C');
$pdf->Cell(70, 5, "Directress", 0, 0, 'C');
$pdf->Cell(140, 5, '', 0, 0, 'L');
$pdf->SetFont('Arial','B',12);
$pdf->SetFont('');
$pdf->Cell(140, 5, "Name: $name" , 0, 1, 'C');
$pdf->SetFont('Arial','B',14);
$pdf->Cell(10, 5, '', 0, 1, 'L');
$pdf->Cell(140, 5, "CANCELLATION OF ELIGIBILITY TO TRANSFER", 0, 0, 'C');
$pdf->SetFont('Arial','B',12);
$pdf->SetFont('');
$pdf->Cell(140, 5, "Name: $name", 0, 1, 'C');
$pdf->SetFont('Arial','B',1);
$pdf->SetFont('');
$pdf->Cell(10, 5, '', 0, 1, 'L');
$pdf->SetFont('Arial','B',10);
$pdf->SetFont('');
$pdf->Cell(140, 5, "Admitted in:       ____________________________________________________", 0, 0, 'L');
$pdf->SetFont('Arial','B',12);
$pdf->SetFont('');
$pdf->Cell(140, 5, "LRN: $lrn", 0, 1, 'C');
$pdf->SetFont('Arial','B',10);
$pdf->SetFont('');
$pdf->Cell(140, 5, "Date:                 _____________________________________________________", 0, 1, 'L');
$pdf->SetFont('Arial','B',10);
$pdf->SetFont('');
$pdf->Cell(70, 5, "Engr. Rodrigo P. Calapan", 0, 0, 'C');
$pdf->Cell(70, 5, "Ms. Charito F. Cano", 0, 0, 'C');
$pdf->SetFont('Arial','B',12);
$pdf->SetFont('');
$pdf->Cell(70, 5, "                      Age:    		        ", 0, 0, 'C');
$pdf->Cell(0, 5, "            Sex: $gender                         ", 0, 1, 'C');
$pdf->SetFont('Arial','B',10);
$pdf->SetFont('');
$pdf->Cell(70, 5, "Principal", 0, 0, 'C');
$pdf->Cell(70, 5, "Directress", 0, 1, 'C');
$pdf->Cell(140, 5, '', 0, 0, 'L');

$pdf->SetFont('Arial','B',12);
$pdf->SetFont('');
$pdf->Cell(70, 5, "                  Grade: $grade        ", 0, 0, 'C');
$pdf->Cell(70, 5, "        Section: $section                         ", 0, 1, 'C');
$pdf->Cell(262, 5, "", 0, 1, 'R');
$pdf->Cell(140, 5, "", 0, 0, 'C');
$pdf->Cell(140, 5, "Track: $track", 0, 1, 'C');
$pdf->Cell(262, 5, "", 0, 1, 'R');
$pdf->Cell(140, 5, "", 0, 0, 'C');
$pdf->Cell(140, 5, "Strand: $strand", 0, 1, 'C');


#$pdf->Ln();
$pdf->SetFont('Arial','B',10);
$pdf->Cell(10, 5, '', 0, 1, 'L');
$pdf->Cell(10, 5, '', 0, 1, 'L');
$pdf->Cell(10, 5, '', 0, 1, 'L');
$pdf->Cell(10, 5, '', 0, 1, 'L');
$pdf->Cell(10, 5, '', 0, 1, 'L');
$pdf->Cell(10, 5, '', 0, 1, 'L');
$pdf->Cell(10, 5, '', 0, 1, 'L');
#Cell(width, height, text, border, endline, 'align')

$pdf->Cell(140, 5, 'REPORT ON LEARNING PROGRESS & ACHIEVEMENT', 0, 0, 'C');
$pdf->Cell(150, 5, 'REPORT ON LEARNERS OBSERVED VALUES', 0, 1, 'C');
//overall width : 280, 140 magkabila
$pdf->SetFont('Arial','B',8);
//kunwari 1 fourth
//lalagayn ng 1 kapag walang border
//kapag gusto mo lagayn yung right side naman
//zero para hindi mag line break
//yung dun sa ano marius colspawn
// pano ialagay sa gitna yung table, rin ba yung kahit walang border ?
//oo pwede paanong gitna, gitna yung text?
// yung mga nakalagay dun sa card na mga text lang naka table kase yung wala lang border or line para madali lang i design.
//para sa colspan? di ko gets, 
// pano mo wait para saan yung eto ?
//structure ng bawat cell:
//Cell('width', 'height', 'text', 'kung may border or wala', 'kung line break o hindi', 'textx-align')
//need ko lang talaga yung rowspan pati colspan 
//sige gawin ko
//gagawin mong 10 yung height ng nasa taas nya


//experimento lang sa mga width at height
//yung pinasa mong link makikita ko lahat to dun ? para if malito ako pwede akong maka kuha ng idea dun?
//oo nandun na sa site yung lahat ng tutorial, may online compiler din ata sila dun
//tsaka pala, ang mahiraap dito is kailangan mong pagsabayin yung left at right side ng pdf kasi mahirap gawin yung column nila
//width ng lahat: 280
//bahala na kung anong mamangyayare dito. g1
//kailangan ko bukas ngayon na dapat deadline ng survey, byeeb

//kapag rowspan naman



$pdf->Cell(140, 5, 'First Semester', 0, 1, 'L');
$pdf->Cell(100, 10, 'Subject', 1, 0, 'L');
$pdf->Cell(20, 5, 'Quarter', 1, 0, 'C');
$pdf->Cell(20, 10, 'Final Grade', 1, 0, 'C');
$pdf->Cell(10, 5, '', 0, 0, 'L');
$pdf->Cell(25, 10, 'Core Values', 1, 0, 'L');
$pdf->Cell(0.1, 5, '', 0, 0, 'L');
$pdf->Cell(60, 5, 'Quarterly Assesment', 1, 0, 'C');
$pdf->Cell(44.2, 5, 'Quarter', 1, 1, 'C');
$pdf->Cell(0.1, 5, '', 0, 0, 'L');
$pdf->Cell(0.1, 5, '', 0, 0, 'L');
$pdf->Cell(100, 5, '', 0, 0, 'L');
$pdf->Cell(10, 5, '1', 1, 0, 'C');
$pdf->Cell(10, 5, '2', 1, 0, 'C');
$pdf->Cell(55, 5, '', 0, 0, 'L');
$pdf->Cell(60, 5, 'Behavioral Assesment', 1, 0, 'L');
$pdf->Cell(0.1, 5, '', 0, 0, 'L');
$pdf->Cell(11, 5, '1', 1, 0, 'L');
$pdf->Cell(11, 5, '2', 1, 0, 'L');
$pdf->Cell(11, 5, '3', 1, 0, 'L');
$pdf->Cell(11, 5, '4', 1, 0, 'L');


$pdf->Cell(20, 5, '', 0, 1, 'L');
$pdf->Cell(0.1, 5, '', 0, 0, 'L');
$pdf->Cell(140, 5, 'Core Subjects1', 1, 0, 'L');
$pdf->Cell(10, 5, '', 0, 0, 'L');
$pdf->Cell(25, 20, '1. Maka-diyos', 1, 0, 'L');
$pdf->Cell(0.1, 4, "Expresses one's spiritual beleifs while", 0, 0, 'L');
$pdf->Cell(59.9, 10, "repecting the spiritual belief of others.", 1, 0, 'L');
$pdf->Cell(0.1, 5, '', 0, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(20, 5, '', 0, 1, 'L');
$pdf->Cell(20, 5, 'CS 5', 1, 0, 'L');
$pdf->Cell(80, 5, '21st Century Literature from the Philippines and the World', 1, 0, 'L');
$pdf->Cell(10, 5, $core1first, 1, 0, 'C');
$pdf->Cell(10, 5, $core1sec, 1, 0, 'C');
$pdf->Cell(20, 5, $core1ave, 1, 0, 'C');
$pdf->Cell(0.1, 5, '', 0, 1, 'L');

$pdf->Cell(20, 5, 'CS 7', 1, 0, 'L');
$pdf->Cell(80, 5, 'Media and Information Literacy', 1, 0, 'L');
$pdf->Cell(10, 5, $core2first, 1, 0, 'C');
$pdf->Cell(10, 5, $core2sec, 1, 0, 'C');
$pdf->Cell(20, 5, $core2ave, 1, 0, 'C');
$pdf->Cell(35, 20, '', 0, 0, 'L');
$pdf->Cell(0.1, 6, 'Shows adherence, to ethical principles by', 0, 0, 'L');
$pdf->Cell(60, 12, 'holding truth.', 0, 0, 'L');
$pdf->Cell(0.1, 5, '', 0, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(70, 10, '', 0, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(50, 5, '', 0, 1, 'L');
$pdf->Cell(20, 5, 'CS 15-3', 1, 0, 'L');
$pdf->Cell(80, 5, 'Physical Education and Health 3', 1, 0, 'L');
$pdf->Cell(10, 5, $core3first, 1, 0, 'C');
$pdf->Cell(10, 5, $core3sec, 1, 0, 'C');
$pdf->Cell(20, 5, $core3ave, 1, 1, 'C');
$pdf->Cell(20, 5, '', 1, 0, 'L');
$pdf->Cell(80, 5, '', 1, 0, 'L');
$pdf->Cell(10, 5, '', 1, 0, 'L');
$pdf->Cell(10, 5, '', 1, 0, 'L');
$pdf->Cell(20, 5, '', 1, 0, 'L');
$pdf->Cell(10, 5, '', 0, 0, 'L');
$pdf->Cell(25, 20, '2. Maka-tao', 1, 0, 'L');
$pdf->Cell(0.1, 4, 'Is sensitive to individual, social, and', 0, 0, 'L');
$pdf->Cell(59.9, 10, 'cultural difference.', 1, 0, 'L');
$pdf->Cell(0.1, 5, '', 0, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(20, 5, '', 0, 1, 'L');
$pdf->Cell(140, 5, 'Applied and Specialized Subjects', 1, 0, 'L');
$pdf->Cell(20, 5, '', 0, 1, 'L');
$pdf->Cell(20, 5, 'AS 3', 1, 0, 'L');
$pdf->Cell(80, 5, 'Practical Research 2', 1, 0, 'L');
$pdf->Cell(10, 5, $app1first, 1, 0, 'C');
$pdf->Cell(10, 5, $app1sec, 1, 0, 'C');
$pdf->Cell(20, 5, $app1ave, 1, 0, 'C');
$pdf->Cell(10, 5, '', 0, 0, 'L');
$pdf->Cell(25, 20, '', 0, 0, 'L');
$pdf->Cell(0.1, 5, 'Demonstrates contributions toward', 0, 0, 'L');
$pdf->Cell(59.9, 11, 'solidarity.', 0, 0, 'L');
$pdf->Cell(0.1, 5, '', 0, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(20, 5, '', 0, 1, 'L');
$pdf->Cell(20, 5, 'AS 4', 1, 0, 'L');
$pdf->Cell(80, 5, 'Pagsulat sa Filipino sa Larangan ng TVL (ICT)', 1, 0, 'L');
$pdf->Cell(10, 5, $app2first, 1, 0, 'C');
$pdf->Cell(10, 5, $app2sec, 1, 0, 'C');
$pdf->Cell(20, 5, $app2ave, 1, 0, 'C');
$pdf->Cell(20, 5, '', 0, 1, 'L');
$pdf->Cell(20, 5, 'AS 6', 1, 0, 'L');
$pdf->Cell(80, 5, 'Entrepreneurship', 1, 0, 'L');
$pdf->Cell(10, 5, $app3first, 1, 0, 'C');
$pdf->Cell(10, 5, $app3sec, 1, 0, 'C');
$pdf->Cell(20, 5, $app3ave, 1, 0, 'C');
$pdf->Cell(10, 5, '', 0, 0, 'L');
$pdf->Cell(25, 10, '3. Makakalikasan', 1, 0, 'L');
$pdf->Cell(0.1, 5, 'Cares for the environment and utilizes', 0, 0, 'L');
$pdf->Cell(60, 10, 'resource wisely, judiciously, and ', 1, 0, 'L');
$pdf->Cell(0.1, 5, '', 0, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(20, 5, '', 0, 1, 'L');
$pdf->Cell(20, 5, 'TVS 5', 1, 0, 'L');
$pdf->Cell(80, 5, 'Computer Programming 2A (SAUD)', 1, 0, 'L');
$pdf->Cell(10, 5, $app4first, 1, 0, 'C');
$pdf->Cell(10, 5, $app4sec, 1, 0, 'C');
$pdf->Cell(20, 5, $app4ave, 1, 0, 'C');
$pdf->Cell(35, 5, '', 0, 0, 'L');
$pdf->Cell(0.1, 5, 'economically', 0, 0, 'L');
$pdf->Cell(10, 5, '', 0, 0, 'L');
$pdf->Cell(11, 5, '', 0, 1, 'L');
$pdf->Cell(20, 5, 'TVS 6', 1, 0, 'L');
$pdf->Cell(80, 5, 'Computer Programming 2B (EEDP.Net)', 1, 0, 'L');
$pdf->Cell(10, 5, $app5first, 1, 0, 'C');
$pdf->Cell(10, 5, $app5sec, 1, 0, 'C');
$pdf->Cell(20, 5, $app5ave, 1, 0, 'C');
$pdf->Cell(10, 5, '', 0, 0, 'L');
$pdf->Cell(25, 20, '4. Makabansa', 1, 0, 'L');
$pdf->Cell(0.1, 5, 'Demonstrates pride in being a Filipino; ', 0, 0, 'L');
$pdf->Cell(60, 10, 'exercises the rights and responsibilities of', 1, 0, 'L');
$pdf->Cell(0.1, 5, '', 0, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(11, 5, '', 0, 1, 'L');
$pdf->Cell(20, 5, '', 1, 0, 'L');
$pdf->Cell(80, 5, 'Average each Quarter', 1, 0, 'R');
$pdf->Cell(10, 5, $first_first_ave, 1, 0, 'C');
$pdf->Cell(10, 5, $first_sec_ave, 1, 0, 'C');
$pdf->Cell(20, 5, '', 1, 0, 'C');
$pdf->Cell(35, 5, '', 0, 0, 'L');
$pdf->Cell(0.1, 5, 'a Filipino citizen.', 0, 0, 'L');
$pdf->Cell(20, 5, '', 0, 1, 'L');
$pdf->Cell(120, 5, 'Average for the Semester', 1, 0, 'R');
$pdf->Cell(20, 5, $ave, 1, 0, 'C');
$pdf->Cell(10, 5, '', 0, 0, 'L');
$pdf->Cell(25, 20, '', 0, 0, 'L');
$pdf->Cell(0.1, 5, 'Demonstrates appropriate behavior in', 0, 0, 'L');
$pdf->Cell(60, 10, 'carrying out activities in the school', 1, 0, 'L');
$pdf->Cell(0.1, 5, '', 0, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(11, 10, '', 1, 0, 'L');
$pdf->Cell(11, 5, '', 0, 1, 'L');





$pdf->Cell(140, 5, 'Second Semester', 0, 0, 'L');
$pdf->Cell(35, 5, '', 0, 0, 'L');
$pdf->Cell(0.1, 5, 'community, and country', 0, 1, 'L');
$pdf->Cell(100, 10, 'Subject', 1, 0, 'L');
$pdf->Cell(20, 5, 'Quarter', 1, 0, 'C');
$pdf->Cell(20, 10, 'Final Grade', 1, 0, 'C');
$pdf->Cell(10, 20, '', 0, 0, 'L');
$pdf->Cell(130, 10, 'Marking            Non-Numerical Rating', 0, 0, 'C');
$pdf->Cell(11, 5, '', 0, 1, 'L');
$pdf->Cell(100, 5, '', 0, 0, 'L');
$pdf->Cell(10, 5, '1', 1, 0, 'C');
$pdf->Cell(10, 5, '2', 1, 0, 'C');
$pdf->Cell(30, 5, '', 0, 0, 'L');
$pdf->Cell(130, 10, 'AO                 Always Observed', 0, 0, 'C');
$pdf->Cell(11, 5, '', 0, 1, 'L');
$pdf->Cell(140, 5, 'Core Subjects', 1, 0, 'L');
$pdf->Cell(13, 5, '', 0, 0, 'L');
$pdf->Cell(130, 10, 'SO                 Sometimes Observed', 0, 0, 'C');
$pdf->Cell(11, 5, '', 0, 1, 'L');

$pdf->Cell(20, 5, 'CS 6', 1, 0, 'L');
$pdf->Cell(80, 5, 'Contemporary Philippines Arts from the World', 1, 0, 'L');
$pdf->Cell(10, 5, $seccore1first, 1, 0, 'C');
$pdf->Cell(10, 5, $seccore1sec, 1, 0, 'C');
$pdf->Cell(20, 5, $seccore1ave, 1, 0, 'C');
$pdf->Cell(10, 5, '', 0, 0, 'L');
$pdf->Cell(130, 10, 'RO                 Rarely Observed', 0, 0, 'C');
$pdf->Cell(11, 5, '', 0, 1, 'L');
$pdf->Cell(20, 5, 'CS 11', 1, 0, 'L');
$pdf->Cell(80, 5, 'Physical Science', 1, 0, 'L');
$pdf->Cell(10, 5, $seccore2first, 1, 0, 'C');
$pdf->Cell(10, 5, $seccore2sec, 1, 0, 'C');
$pdf->Cell(20, 5, $seccore2ave, 1, 0, 'C');
$pdf->Cell(8, 5, '', 0, 0, 'L');
$pdf->Cell(130, 10, 'NO                 Not Observed', 0, 0, 'C');
$pdf->Cell(11, 5, '', 0, 1, 'L');
$pdf->Cell(20, 5, 'CS 13', 1, 0, 'L');
$pdf->Cell(80, 5, 'Understanding Culture, Society and Politics', 1, 0, 'L');
$pdf->Cell(10, 5, $seccore3first, 1, 0, 'C');
$pdf->Cell(10, 5, $seccore3sec, 1, 0, 'C');
$pdf->Cell(20, 5, $seccore3ave, 1, 1, 'C');
$pdf->Cell(20, 5, 'CS 15-4', 1, 0, 'L');
$pdf->Cell(80, 5, 'Physical Education and Health 4', 1, 0, 'L');
$pdf->Cell(10, 5, $seccore4first, 1, 0, 'C');
$pdf->Cell(10, 5, $seccore4sec, 1, 0, 'C');
$pdf->Cell(20, 5, $seccore4ave, 1, 0, 'C');
$pdf->Cell(10, 5, '', 0, 0, 'L');
$pdf->Cell(130, 5, 'REPORT ON ATTENDANCE', 0, 0, 'C');
$pdf->Cell(11, 5, '', 0, 1, 'L');

$pdf->Cell(20, 5, '', 1, 0, 'L');
$pdf->Cell(80, 5, '', 1, 0, 'L');
$pdf->Cell(10, 5, '', 1, 0, 'L');
$pdf->Cell(10, 5, '', 1, 0, 'L');
$pdf->Cell(20, 5, '', 1, 0, 'L');
$pdf->Cell(20, 5, '', 0, 0, 'L');
$pdf->Cell(30, 5, 'Month', 1, 0, 'C');
$pdf->Cell(7, 5, 'Jul', 1, 0, 'C');
$pdf->Cell(7, 5, 'Aug', 1, 0, 'C');
$pdf->Cell(7, 5, 'Sep', 1, 0, 'C');
$pdf->Cell(7, 5, 'Oct', 1, 0, 'C');
$pdf->Cell(7, 5, 'Nov', 1, 0, 'C');
$pdf->Cell(7, 5, 'Dec', 1, 0, 'C');
$pdf->Cell(7, 5, 'Jan', 1, 0, 'C');
$pdf->Cell(7, 5, 'Feb', 1, 0, 'C');
$pdf->Cell(7, 5, 'Mar', 1, 0, 'C');
$pdf->Cell(7, 5, 'Apr', 1, 0, 'C');
$pdf->Cell(7, 5, 'May', 1, 0, 'C');
$pdf->Cell(7, 5, 'Total', 1, 0, 'C');
$pdf->Cell(11, 5, '', 0, 1, 'L');
$pdf->Cell(140, 5, 'Applied and Specialized Subjects', 1, 0, 'L');
$pdf->Cell(20, 5, '', 0, 0, 'L');
$pdf->Cell(30, 5, 'No. of School Days', 1, 0, 'C');
$pdf->Cell(7, 5, '', 1, 0, 'C');
$pdf->Cell(7, 5, '', 1, 0, 'C');
$pdf->Cell(7, 5, '', 1, 0, 'C');
$pdf->Cell(7, 5, '', 1, 0, 'C');
$pdf->Cell(7, 5, '', 1, 0, 'C');
$pdf->Cell(7, 5, '', 1, 0, 'C');
$pdf->Cell(7, 5, '', 1, 0, 'C');
$pdf->Cell(7, 5, '', 1, 0, 'C');
$pdf->Cell(7, 5, '', 1, 0, 'C');
$pdf->Cell(7, 5, '', 1, 0, 'C');
$pdf->Cell(7, 5, '', 1, 0, 'C');
$pdf->Cell(7, 5, '', 1, 0, 'C');
$pdf->Cell(11, 5, '', 0, 1, 'L');
$pdf->Cell(20, 5, 'AS 7', 1, 0, 'L');
$pdf->Cell(80, 5, 'Research Project', 1, 0, 'L');
$pdf->Cell(10, 5, $secapp1first, 1, 0, 'C');
$pdf->Cell(10, 5, $secapp1sec, 1, 0, 'C');
$pdf->Cell(20, 5, $secapp1ave, 1, 0, 'C');
$pdf->Cell(20, 5, '', 0, 0, 'L');
$pdf->Cell(30, 5, 'No. of Present', 1, 0, 'C');
$pdf->Cell(7, 5, '', 1, 0, 'C');
$pdf->Cell(7, 5, '', 1, 0, 'C');
$pdf->Cell(7, 5, '', 1, 0, 'C');
$pdf->Cell(7, 5, '', 1, 0, 'C');
$pdf->Cell(7, 5, '', 1, 0, 'C');
$pdf->Cell(7, 5, '', 1, 0, 'C');
$pdf->Cell(7, 5, '', 1, 0, 'C');
$pdf->Cell(7, 5, '', 1, 0, 'C');
$pdf->Cell(7, 5, '', 1, 0, 'C');
$pdf->Cell(7, 5, '', 1, 0, 'C');
$pdf->Cell(7, 5, '', 1, 0, 'C');
$pdf->Cell(7, 5, '', 1, 0, 'C');
$pdf->Cell(11, 5, '', 0, 1, 'L');
$pdf->Cell(20, 5, 'TVS 7', 1, 0, 'L');
$pdf->Cell(80, 5, 'Computer Programming 2A (WP)', 1, 0, 'L');
$pdf->Cell(10, 5, $secapp2first, 1, 0, 'C');
$pdf->Cell(10, 5, $secapp2sec, 1, 0, 'C');
$pdf->Cell(20, 5, $secapp2ave, 1, 1, 'C');
$pdf->Cell(20, 5, 'TVS 8', 1, 0, 'L');
$pdf->Cell(80, 5, 'Computer Programming 2B (CSS)', 1, 0, 'L');
$pdf->Cell(10, 5, $secapp3first, 1, 0, 'C');
$pdf->Cell(10, 5, $secapp3sec, 1, 0, 'C');
$pdf->Cell(20, 5, $secapp3ave, 1, 0, 'C');
$pdf->Cell(10, 5, '', 0, 0, 'L');
$pdf->Cell(140, 5, 'VISION', 0, 1, 'C');
$pdf->Cell(20, 5, 'TVS 9', 1, 0, 'L');
$pdf->Cell(80, 5, 'Work Immersion/ Career Advocacy/ Culminating Activity', 1, 0, 'L');
$pdf->Cell(10, 5, $secapp4first, 1, 0, 'C');
$pdf->Cell(10, 5, $secapp4sec, 1, 0, 'C');
$pdf->Cell(20, 5, $secapp4ave, 1, 0, 'C');
$pdf->Cell(15, 5, '', 0, 0, 'L');
$pdf->Cell(0.1, 5, "Lyceum of Alabang envision in becoming one of the nation's leading educational institution", 0, 0, 'L');
$pdf->Cell(130, 13, 'in volved in the pursuit of the advancemnt of knowledge, skills, and values for personal,', 0, 0, 'L');
$pdf->Cell(10, 5, '', 0, 1, 'L');
$pdf->Cell(20, 5, '', 1, 0, 'L');
$pdf->Cell(80, 5, 'Average each Quarter', 1, 0, 'R');
$pdf->Cell(10, 5, $sec_first_ave, 1, 0, 'C');
$pdf->Cell(10, 5, $sec_sec_ave, 1, 0, 'C');
$pdf->Cell(20, 5, '', 1, 1, 'L');
$pdf->Cell(120, 5, 'Average for the Semester', 1, 0, 'R');
$pdf->Cell(20, 5, $secave, 1, 0, 'C');
$pdf->Cell(15, 5, '', 0, 0, 'R');
$pdf->Cell(0.1, 5, "community, and national development.", 0, 1, 'L');
$pdf->Cell(20, 5, '', 0, 1, 'L');
$pdf->Cell(20, 5, '', 0, 0, 'L');
$pdf->Cell(30, 5, 'Descriptors', 0, 0, 'L');
$pdf->Cell(30, 5, 'Grading Scale', 0, 0, 'L');
$pdf->Cell(30, 5, 'Remarks', 0, 0, 'L');
$pdf->Cell(40, 5, '', 0, 0, 'L');
$pdf->Cell(140, 5, 'MISSION', 0, 1, 'C');

$pdf->Cell(20, 5, '', 0, 0, 'L');
$pdf->Cell(30, 5, 'Outstanding', 0, 0, 'L');
$pdf->Cell(30, 5, '90-100', 0, 0, 'L');
$pdf->Cell(30, 5, 'Passed', 0, 0, 'L');
$pdf->Cell(45, 5, '', 0, 0, 'L');
$pdf->Cell(0.1, 5, 'Lyceum of Alabang shall provide world-class education and training through competent', 0, 0, 'L');
$pdf->Cell(130, 13, 'personne, high-end facilities and equipment, and accredited industy-based programs', 0, 0, 'L');
$pdf->Cell(10, 5, '', 0, 1, 'L');

$pdf->Cell(20, 5, '', 0, 0, 'L');
$pdf->Cell(30, 5, 'Very Satisfactory', 0, 0, 'L');
$pdf->Cell(30, 5, '85-89', 0, 0, 'L');
$pdf->Cell(30, 5, 'Passed', 0, 0, 'L');
$pdf->Cell(40, 5, '', 0, 1, 'L');

$pdf->Cell(20, 5, '', 0, 0, 'L');
$pdf->Cell(30, 5, 'Satisfactory', 0, 0, 'L');
$pdf->Cell(30, 5, '80-84', 0, 0, 'L');
$pdf->Cell(30, 5, 'Passed', 0, 0, 'L');
$pdf->Cell(40, 5, '', 0, 1, 'L');

$pdf->Cell(20, 5, '', 0, 0, 'L');
$pdf->Cell(30, 5, 'Fairly Satisfactory', 0, 0, 'L');
$pdf->Cell(30, 5, '75-79', 0, 0, 'L');
$pdf->Cell(30, 5, 'Passed', 0, 0, 'L');
$pdf->Cell(40, 5, '', 0, 0, 'L');
$pdf->Cell(140, 5, 'MISSION', 0, 1, 'C');


$pdf->Cell(20, 5, '', 0, 0, 'L');
$pdf->Cell(30, 5, 'Did Not Meet', 0, 0, 'L');
$pdf->Cell(30, 5, 'Below 75', 0, 0, 'L');
$pdf->Cell(30, 5, 'Failed', 0, 0, 'L');
$pdf->Cell(45, 5, '', 0, 0, 'L');
$pdf->Cell(0.1, 4, 'We, at the lyceum of Alabang commit ourselves to exceed the expectations of our stakeholders', 0, 0, 'L');
$pdf->Cell(130, 11, 'through continual improvement for effective and ifficient provision of quality education and ', 0, 0, 'L');
$pdf->Cell(10, 5, '', 0, 1, 'L');
$pdf->Cell(155, 5, '', 0, 0, 'L');
$pdf->Cell(0.1, 6, 'training. We will ensure that all our academic and non-academic process and activities are aligned', 0, 1, 'L');
$pdf->Cell(155, 5, '', 0, 0, 'L');
$pdf->Cell(0.1, 5, 'with  their voice.', 0, 0, 'L');

switch ($file=$pdf->Output("attachment.pdf", "S")) {
    default:
        header("location: ../../url.php?grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=two&error=none");

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
	$mail->FromName = $email;			//Sets the From name of the message
	$mail->AddBCC($emailp, 'Parent');		//Adds a "To" address
    $mail->AddBCC($emailp1, 'Parent');		//Adds a "To" address
    $mail->AddBCC($emailp2, 'Parent');		//Adds a "To" address
    $mail->AddBCC($emailp3, 'Parent');		//Adds a "To" address
	$mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
	$mail->IsHTML(true);							//Sets message type to HTML	
    $mail->AddStringAttachment($file, 'attachment.pdf');    				//Adds an attachment from a path on the filesystem
   

	$mail->Subject = 'Grade Sheet of Student';			//Sets the Subject of the message
	$mail->Body = $body;			//An HTML or plain text message body

	if($mail->Send())        //Send an Email. Return true on success or false on error
    {
        $_SESSION['status']='sent';
    }
    else {
        $_SESSION['status']='failed';
    }
    unlink($file_name);
}

elseif ($radio=="this") {
    $pdf = new FPDF('L','mm',array(245,300));

    $pdf->AddPage();
    
    $pdf->SetFont('Arial','B',10);
    //width, height, text, border, yung zero sa dulo, ibig sabihin hindi new line, pag ginawa mo itong 1, magla line break sya, tapos text align yung dulo
    
    $pdf->Cell(140, 5, 'Dear Parents', 0, 0, 'L');
    $pdf->Cell(10, 5, '', 0, 0, 'L');
    $pdf->Cell(140, 5, 'SF 9-SHS', 0, 1, 'L');
    $pdf->SetFont('Arial','B',10);
    $pdf->SetFont('');
    $pdf->Cell(140, 5, '            This   report  card   shows  the   ability   and   progress   your   child', 0, 0, 'L');
    $pdf->Cell(140, 5, 'Republic of the Philippines', 0, 1, 'C');
    // Insert a logo in the top-left corner at 300 dpi
    $pdf->Image('../../../../pics/loa.png',165,15,-1200);
    $pdf->Image('../../../../pics/deped.jpg',255,15,23);
    $pdf->Image($signature,110,35,25);
    $pdf->Cell(140, 5, 'has  made  in  different  learning   areas  as   well  as  his/her  progress   in ', 0, 0, 'L');
    $pdf->SetFont('Times','B',12);
    $pdf->Cell(140, 5, 'DEPARTMENT OF EDUCATION', 0, 1, 'C');
    $pdf->SetFont('Arial','B',10);
    $pdf->SetFont('');
    $pdf->Cell(140, 5, 'character development.', 0, 0, 'L');
    $pdf->SetFont('Arial','B',9);
    $pdf->SetFont('');
    $pdf->Cell(140, 5, 'NATIONAL CAPITAL REGION', 0, 1, 'C');
    
    $pdf->SetFont('Arial','B',10);
    $pdf->SetFont('');
    $pdf->Cell(140, 5, '         The    school    welcomes    you    if   you    desire    to   know   more', 0, 0, 'L');
    $pdf->SetFont('Arial','B',9);
    $pdf->SetFont('');
    $pdf->Cell(140, 5, 'Division of City Schools, Muntinlupa', 0, 1, 'C');
    $pdf->SetFont('Arial','B',10);
    $pdf->SetFont('');
    $pdf->Cell(140, 5, 'about the progress of your child.', 0, 0, 'L');
    
    
    
    
    $pdf->Cell(10, 5, '', 0, 1, 'L');
    $pdf->SetFont('Arial','B',8);
    $pdf->SetFont('');
    $pdf->Cell(130, 5, $teacher, 0, 0, 'R');
    $pdf->Cell(10, 5, '', 0, 0, 'R');
    $pdf->SetFont('Times','B',20);
    $pdf->Cell(140, 5, 'LYCEUM OF ALABANG INC.', 0, 1, 'C');
    $pdf->SetFont('Arial','B',8);
    $pdf->SetFont('');
    $pdf->Cell(140, 5, "Adviser's Signature over Printed Name              ", 0, 0, 'R');
    $pdf->SetFont('Arial','B',10);
    $pdf->SetFont('');
    $pdf->Cell(140, 5, "Km. 30, National Road, Tunasan, Muntinlupa City", 0, 1, 'C');
    $pdf->Cell(140, 5, '', 0, 0, 'L');
    $pdf->Cell(140, 5, '1773 Philippines', 0, 1, 'C');
    $pdf->SetFont('Arial','B',14);
    $pdf->Cell(140, 5, '', 0, 1, 'L');
    $pdf->Cell(140, 5, "PARENT/GUARDIAN'S SIGNATURE", 0, 1, 'C');
    $pdf->SetFont('Arial','B',10);
    $pdf->SetFont('');
    $pdf->Cell(10, 5, '', 0, 1, 'L');
    $pdf->Cell(140, 5, "First Quarter:         _________________________________________________", 0, 0, 'L');
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(140, 5, "Basic Education Department", 0, 1, 'C');
    $pdf->SetFont('Arial','B',10);
    $pdf->SetFont('');
    $pdf->Cell(140, 5, "Second Quarter:    _________________________________________________", 0, 1, 'L');
    $pdf->Cell(140, 5, "Third Quarter:        _________________________________________________", 0, 0, 'L');
    $pdf->SetFont('Arial','B',20);
    $pdf->Cell(140, 5, "SENIOR HIGH SCHOOL", 0, 1, 'C');
    $pdf->SetFont('Arial','B',12);
    $pdf->SetFont('Arial','B',10);
    $pdf->SetFont('');
    $pdf->Cell(140, 5, "Fourth Quarter:      _________________________________________________", 0, 1, 'L');
    $pdf->SetFont('Arial','B',10);
    $pdf->SetFont('');
    $pdf->SetFont('Arial','B',14);
    $pdf->Cell(140, 5, '', 0, 0, 'L');
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(140, 5, "K-12", 0, 1, 'C');
    $pdf->Cell(140, 5, "CERTIFICATE OF TRANSFER", 0, 1, 'C');
    $pdf->SetFont('Arial','B',10);
    $pdf->SetFont('');
    $pdf->Cell(10, 5, '', 0, 1, 'L');
    $pdf->Cell(140, 5, "Admitted to Grade: ________________________________________________", 0, 0, 'L');
    $pdf->SetFont('Arial','B',16);
    $pdf->SetFont('');
    $pdf->Cell(140, 5, "PROGRESS REPORT CARD", 0, 1, 'C');
    $pdf->SetFont('Arial','B',10);
    $pdf->SetFont('');
    $pdf->Cell(140, 5, "Eligibility for admission to:    _________________________________________", 0, 0, 'L');
    $pdf->SetFont('Arial','B',9);
    $pdf->SetFont('');
    $pdf->Cell(0, 5, "SCHOOL YEAR: 2020-2021", 0, 0, 'C');
    
    $pdf->SetFont('Arial','B',10);
    $pdf->SetFont('');
    $pdf->Cell(10, 5, '', 0, 1, 'L');
    $pdf->Cell(70, 5, "Engr. Rodrigo P. Calapan", 0, 0, 'C');
    $pdf->Cell(70, 5, "Ms. Charito F. Cano", 0, 1, 'C');
    $pdf->Cell(70, 5, "Principal", 0, 0, 'C');
    $pdf->Cell(70, 5, "Directress", 0, 0, 'C');
    $pdf->Cell(140, 5, '', 0, 0, 'L');
    $pdf->SetFont('Arial','B',12);
    $pdf->SetFont('');
    $pdf->Cell(140, 5, "Name: $name" , 0, 1, 'C');
    $pdf->SetFont('Arial','B',14);
    $pdf->Cell(10, 5, '', 0, 1, 'L');
    $pdf->Cell(140, 5, "CANCELLATION OF ELIGIBILITY TO TRANSFER", 0, 0, 'C');
    $pdf->SetFont('Arial','B',12);
    $pdf->SetFont('');
    $pdf->Cell(140, 5, "Name: $name", 0, 1, 'C');
    $pdf->SetFont('Arial','B',1);
    $pdf->SetFont('');
    $pdf->Cell(10, 5, '', 0, 1, 'L');
    $pdf->SetFont('Arial','B',10);
    $pdf->SetFont('');
    $pdf->Cell(140, 5, "Admitted in:       ____________________________________________________", 0, 0, 'L');
    $pdf->SetFont('Arial','B',12);
    $pdf->SetFont('');
    $pdf->Cell(140, 5, "LRN: $lrn", 0, 1, 'C');
    $pdf->SetFont('Arial','B',10);
    $pdf->SetFont('');
    $pdf->Cell(140, 5, "Date:                 _____________________________________________________", 0, 1, 'L');
    $pdf->SetFont('Arial','B',10);
    $pdf->SetFont('');
    $pdf->Cell(70, 5, "Engr. Rodrigo P. Calapan", 0, 0, 'C');
    $pdf->Cell(70, 5, "Ms. Charito F. Cano", 0, 0, 'C');
    $pdf->SetFont('Arial','B',12);
    $pdf->SetFont('');
    $pdf->Cell(70, 5, "                      Age:    		        ", 0, 0, 'C');
    $pdf->Cell(0, 5, "            Sex: $gender                         ", 0, 1, 'C');
    $pdf->SetFont('Arial','B',10);
    $pdf->SetFont('');
    $pdf->Cell(70, 5, "Principal", 0, 0, 'C');
    $pdf->Cell(70, 5, "Directress", 0, 1, 'C');
    $pdf->Cell(140, 5, '', 0, 0, 'L');
    
    $pdf->SetFont('Arial','B',12);
    $pdf->SetFont('');
    $pdf->Cell(70, 5, "                  Grade: $grade        ", 0, 0, 'C');
    $pdf->Cell(70, 5, "        Section: $section                         ", 0, 1, 'C');
    $pdf->Cell(262, 5, "", 0, 1, 'R');
    $pdf->Cell(140, 5, "", 0, 0, 'C');
    $pdf->Cell(140, 5, "Track: $track", 0, 1, 'C');
    $pdf->Cell(262, 5, "", 0, 1, 'R');
    $pdf->Cell(140, 5, "", 0, 0, 'C');
    $pdf->Cell(140, 5, "Strand: $strand", 0, 1, 'C');
    
    
    #$pdf->Ln();
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(10, 5, '', 0, 1, 'L');
    $pdf->Cell(10, 5, '', 0, 1, 'L');
    $pdf->Cell(10, 5, '', 0, 1, 'L');
    $pdf->Cell(10, 5, '', 0, 1, 'L');
    $pdf->Cell(10, 5, '', 0, 1, 'L');
    $pdf->Cell(10, 5, '', 0, 1, 'L');
    $pdf->Cell(10, 5, '', 0, 1, 'L');
    #Cell(width, height, text, border, endline, 'align')
    
    $pdf->Cell(140, 5, 'REPORT ON LEARNING PROGRESS & ACHIEVEMENT', 0, 0, 'C');
    $pdf->Cell(150, 5, 'REPORT ON LEARNERS OBSERVED VALUES', 0, 1, 'C');
    //overall width : 280, 140 magkabila
    $pdf->SetFont('Arial','B',8);
    //kunwari 1 fourth
    //lalagayn ng 1 kapag walang border
    //kapag gusto mo lagayn yung right side naman
    //zero para hindi mag line break
    //yung dun sa ano marius colspawn
    // pano ialagay sa gitna yung table, rin ba yung kahit walang border ?
    //oo pwede paanong gitna, gitna yung text?
    // yung mga nakalagay dun sa card na mga text lang naka table kase yung wala lang border or line para madali lang i design.
    //para sa colspan? di ko gets, 
    // pano mo wait para saan yung eto ?
    //structure ng bawat cell:
    //Cell('width', 'height', 'text', 'kung may border or wala', 'kung line break o hindi', 'textx-align')
    //need ko lang talaga yung rowspan pati colspan 
    //sige gawin ko
    //gagawin mong 10 yung height ng nasa taas nya
    
    
    //experimento lang sa mga width at height
    //yung pinasa mong link makikita ko lahat to dun ? para if malito ako pwede akong maka kuha ng idea dun?
    //oo nandun na sa site yung lahat ng tutorial, may online compiler din ata sila dun
    //tsaka pala, ang mahiraap dito is kailangan mong pagsabayin yung left at right side ng pdf kasi mahirap gawin yung column nila
    //width ng lahat: 280
    //bahala na kung anong mamangyayare dito. g1
    //kailangan ko bukas ngayon na dapat deadline ng survey, byeeb
    
    //kapag rowspan naman
    
    
    
    $pdf->Cell(140, 5, 'First Semester', 0, 1, 'L');
    $pdf->Cell(100, 10, 'Subject', 1, 0, 'L');
    $pdf->Cell(20, 5, 'Quarter', 1, 0, 'C');
    $pdf->Cell(20, 10, 'Final Grade', 1, 0, 'C');
    $pdf->Cell(10, 5, '', 0, 0, 'L');
    $pdf->Cell(25, 10, 'Core Values', 1, 0, 'L');
    $pdf->Cell(0.1, 5, '', 0, 0, 'L');
    $pdf->Cell(60, 5, 'Quarterly Assesment', 1, 0, 'C');
    $pdf->Cell(44.2, 5, 'Quarter', 1, 1, 'C');
    $pdf->Cell(0.1, 5, '', 0, 0, 'L');
    $pdf->Cell(0.1, 5, '', 0, 0, 'L');
    $pdf->Cell(100, 5, '', 0, 0, 'L');
    $pdf->Cell(10, 5, '1', 1, 0, 'C');
    $pdf->Cell(10, 5, '2', 1, 0, 'C');
    $pdf->Cell(55, 5, '', 0, 0, 'L');
    $pdf->Cell(60, 5, 'Behavioral Assesment', 1, 0, 'L');
    $pdf->Cell(0.1, 5, '', 0, 0, 'L');
    $pdf->Cell(11, 5, '1', 1, 0, 'L');
    $pdf->Cell(11, 5, '2', 1, 0, 'L');
    $pdf->Cell(11, 5, '3', 1, 0, 'L');
    $pdf->Cell(11, 5, '4', 1, 0, 'L');
    
    
    $pdf->Cell(20, 5, '', 0, 1, 'L');
    $pdf->Cell(0.1, 5, '', 0, 0, 'L');
    $pdf->Cell(140, 5, 'Core Subjects1', 1, 0, 'L');
    $pdf->Cell(10, 5, '', 0, 0, 'L');
    $pdf->Cell(25, 20, '1. Maka-diyos', 1, 0, 'L');
    $pdf->Cell(0.1, 4, "Expresses one's spiritual beleifs while", 0, 0, 'L');
    $pdf->Cell(59.9, 10, "repecting the spiritual belief of others.", 1, 0, 'L');
    $pdf->Cell(0.1, 5, '', 0, 0, 'L');
    $pdf->Cell(11, 10, '', 1, 0, 'L');
    $pdf->Cell(11, 10, '', 1, 0, 'L');
    $pdf->Cell(11, 10, '', 1, 0, 'L');
    $pdf->Cell(11, 10, '', 1, 0, 'L');
    $pdf->Cell(20, 5, '', 0, 1, 'L');
    $pdf->Cell(20, 5, 'CS 5', 1, 0, 'L');
    $pdf->Cell(80, 5, '21st Century Literature from the Philippines and the World', 1, 0, 'L');
    $pdf->Cell(10, 5, '', 1, 0, 'C');
    $pdf->Cell(10, 5, '', 1, 0, 'C');
    $pdf->Cell(20, 5, '', 1, 0, 'C');
    $pdf->Cell(0.1, 5, '', 0, 1, 'L');
    
    $pdf->Cell(20, 5, 'CS 7', 1, 0, 'L');
    $pdf->Cell(80, 5, 'Media and Information Literacy', 1, 0, 'L');
    $pdf->Cell(10, 5, '', 1, 0, 'C');
    $pdf->Cell(10, 5, '', 1, 0, 'C');
    $pdf->Cell(20, 5, '', 1, 0, 'C');
    $pdf->Cell(35, 20, '', 0, 0, 'L');
    $pdf->Cell(0.1, 6, 'Shows adherence, to ethical principles by', 0, 0, 'L');
    $pdf->Cell(60, 12, 'holding truth.', 0, 0, 'L');
    $pdf->Cell(0.1, 5, '', 0, 0, 'L');
    $pdf->Cell(11, 10, '', 1, 0, 'L');
    $pdf->Cell(11, 10, '', 1, 0, 'L');
    $pdf->Cell(11, 10, '', 1, 0, 'L');
    $pdf->Cell(11, 10, '', 1, 0, 'L');
    $pdf->Cell(70, 10, '', 0, 0, 'L');
    $pdf->Cell(11, 10, '', 1, 0, 'L');
    $pdf->Cell(11, 10, '', 1, 0, 'L');
    $pdf->Cell(11, 10, '', 1, 0, 'L');
    $pdf->Cell(11, 10, '', 1, 0, 'L');
    $pdf->Cell(50, 5, '', 0, 1, 'L');
    $pdf->Cell(20, 5, 'CS 15-3', 1, 0, 'L');
    $pdf->Cell(80, 5, 'Physical Education and Health 3', 1, 0, 'L');
    $pdf->Cell(10, 5, '', 1, 0, 'C');
    $pdf->Cell(10, 5, '', 1, 0, 'C');
    $pdf->Cell(20, 5, '', 1, 1, 'C');
    $pdf->Cell(20, 5, '', 1, 0, 'L');
    $pdf->Cell(80, 5, '', 1, 0, 'L');
    $pdf->Cell(10, 5, '', 1, 0, 'L');
    $pdf->Cell(10, 5, '', 1, 0, 'L');
    $pdf->Cell(20, 5, '', 1, 0, 'L');
    $pdf->Cell(10, 5, '', 0, 0, 'L');
    $pdf->Cell(25, 20, '2. Maka-tao', 1, 0, 'L');
    $pdf->Cell(0.1, 4, 'Is sensitive to individual, social, and', 0, 0, 'L');
    $pdf->Cell(59.9, 10, 'cultural difference.', 1, 0, 'L');
    $pdf->Cell(0.1, 5, '', 0, 0, 'L');
    $pdf->Cell(11, 10, '', 1, 0, 'L');
    $pdf->Cell(11, 10, '', 1, 0, 'L');
    $pdf->Cell(11, 10, '', 1, 0, 'L');
    $pdf->Cell(11, 10, '', 1, 0, 'L');
    $pdf->Cell(20, 5, '', 0, 1, 'L');
    $pdf->Cell(140, 5, 'Applied and Specialized Subjects', 1, 0, 'L');
    $pdf->Cell(20, 5, '', 0, 1, 'L');
    $pdf->Cell(20, 5, 'AS 3', 1, 0, 'L');
    $pdf->Cell(80, 5, 'Practical Research 2', 1, 0, 'L');
    $pdf->Cell(10, 5, '', 1, 0, 'C');
    $pdf->Cell(10, 5, '', 1, 0, 'C');
    $pdf->Cell(20, 5, '', 1, 0, 'C');
    $pdf->Cell(10, 5, '', 0, 0, 'L');
    $pdf->Cell(25, 20, '', 0, 0, 'L');
    $pdf->Cell(0.1, 5, 'Demonstrates contributions toward', 0, 0, 'L');
    $pdf->Cell(59.9, 11, 'solidarity.', 0, 0, 'L');
    $pdf->Cell(0.1, 5, '', 0, 0, 'L');
    $pdf->Cell(11, 10, '', 1, 0, 'L');
    $pdf->Cell(11, 10, '', 1, 0, 'L');
    $pdf->Cell(11, 10, '', 1, 0, 'L');
    $pdf->Cell(11, 10, '', 1, 0, 'L');
    $pdf->Cell(20, 5, '', 0, 1, 'L');
    $pdf->Cell(20, 5, 'AS 4', 1, 0, 'L');
    $pdf->Cell(80, 5, 'Pagsulat sa Filipino sa Larangan ng TVL (ICT)', 1, 0, 'L');
    $pdf->Cell(10, 5, '', 1, 0, 'C');
    $pdf->Cell(10, 5, '', 1, 0, 'C');
    $pdf->Cell(20, 5, '', 1, 0, 'C');
    $pdf->Cell(20, 5, '', 0, 1, 'L');
    $pdf->Cell(20, 5, 'AS 6', 1, 0, 'L');
    $pdf->Cell(80, 5, 'Entrepreneurship', 1, 0, 'L');
    $pdf->Cell(10, 5, '', 1, 0, 'C');
    $pdf->Cell(10, 5, '', 1, 0, 'C');
    $pdf->Cell(20, 5, '', 1, 0, 'C');
    $pdf->Cell(10, 5, '', 0, 0, 'L');
    $pdf->Cell(25, 10, '3. Makakalikasan', 1, 0, 'L');
    $pdf->Cell(0.1, 5, 'Cares for the environment and utilizes', 0, 0, 'L');
    $pdf->Cell(60, 10, 'resource wisely, judiciously, and ', 1, 0, 'L');
    $pdf->Cell(0.1, 5, '', 0, 0, 'L');
    $pdf->Cell(11, 10, '', 1, 0, 'L');
    $pdf->Cell(11, 10, '', 1, 0, 'L');
    $pdf->Cell(11, 10, '', 1, 0, 'L');
    $pdf->Cell(11, 10, '', 1, 0, 'L');
    $pdf->Cell(20, 5, '', 0, 1, 'L');
    $pdf->Cell(20, 5, 'TVS 5', 1, 0, 'L');
    $pdf->Cell(80, 5, 'Computer Programming 2A (SAUD)', 1, 0, 'L');
    $pdf->Cell(10, 5, '', 1, 0, 'C');
    $pdf->Cell(10, 5, '', 1, 0, 'C');
    $pdf->Cell(20, 5, '', 1, 0, 'C');
    $pdf->Cell(35, 5, '', 0, 0, 'L');
    $pdf->Cell(0.1, 5, 'economically', 0, 0, 'L');
    $pdf->Cell(10, 5, '', 0, 0, 'L');
    $pdf->Cell(11, 5, '', 0, 1, 'L');
    $pdf->Cell(20, 5, 'TVS 6', 1, 0, 'L');
    $pdf->Cell(80, 5, 'Computer Programming 2B (EEDP.Net)', 1, 0, 'L');
    $pdf->Cell(10, 5, '', 1, 0, 'C');
    $pdf->Cell(10, 5, '', 1, 0, 'C');
    $pdf->Cell(20, 5, '', 1, 0, 'C');
    $pdf->Cell(10, 5, '', 0, 0, 'L');
    $pdf->Cell(25, 20, '4. Makabansa', 1, 0, 'L');
    $pdf->Cell(0.1, 5, 'Demonstrates pride in being a Filipino; ', 0, 0, 'L');
    $pdf->Cell(60, 10, 'exercises the rights and responsibilities of', 1, 0, 'L');
    $pdf->Cell(0.1, 5, '', 0, 0, 'L');
    $pdf->Cell(11, 10, '', 1, 0, 'L');
    $pdf->Cell(11, 10, '', 1, 0, 'L');
    $pdf->Cell(11, 10, '', 1, 0, 'L');
    $pdf->Cell(11, 10, '', 1, 0, 'L');
    $pdf->Cell(11, 5, '', 0, 1, 'L');
    $pdf->Cell(20, 5, '', 1, 0, 'L');
    $pdf->Cell(80, 5, 'Average each Quarter', 1, 0, 'R');
    $pdf->Cell(10, 5, '', 1, 0, 'C');
    $pdf->Cell(10, 5, '', 1, 0, 'C');
    $pdf->Cell(20, 5, '', 1, 0, 'C');
    $pdf->Cell(35, 5, '', 0, 0, 'L');
    $pdf->Cell(0.1, 5, 'a Filipino citizen.', 0, 0, 'L');
    $pdf->Cell(20, 5, '', 0, 1, 'L');
    $pdf->Cell(120, 5, 'Average for the Semester', 1, 0, 'R');
    $pdf->Cell(20, 5, '', 1, 0, 'C');
    $pdf->Cell(10, 5, '', 0, 0, 'L');
    $pdf->Cell(25, 20, '', 0, 0, 'L');
    $pdf->Cell(0.1, 5, 'Demonstrates appropriate behavior in', 0, 0, 'L');
    $pdf->Cell(60, 10, 'carrying out activities in the school', 1, 0, 'L');
    $pdf->Cell(0.1, 5, '', 0, 0, 'L');
    $pdf->Cell(11, 10, '', 1, 0, 'L');
    $pdf->Cell(11, 10, '', 1, 0, 'L');
    $pdf->Cell(11, 10, '', 1, 0, 'L');
    $pdf->Cell(11, 10, '', 1, 0, 'L');
    $pdf->Cell(11, 5, '', 0, 1, 'L');
    
    
    
    
    
    $pdf->Cell(140, 5, 'Second Semester', 0, 0, 'L');
    $pdf->Cell(35, 5, '', 0, 0, 'L');
    $pdf->Cell(0.1, 5, 'community, and country', 0, 1, 'L');
    $pdf->Cell(100, 10, 'Subject', 1, 0, 'L');
    $pdf->Cell(20, 5, 'Quarter', 1, 0, 'C');
    $pdf->Cell(20, 10, 'Final Grade', 1, 0, 'C');
    $pdf->Cell(10, 20, '', 0, 0, 'L');
    $pdf->Cell(130, 10, 'Marking            Non-Numerical Rating', 0, 0, 'C');
    $pdf->Cell(11, 5, '', 0, 1, 'L');
    $pdf->Cell(100, 5, '', 0, 0, 'L');
    $pdf->Cell(10, 5, '1', 1, 0, 'C');
    $pdf->Cell(10, 5, '2', 1, 0, 'C');
    $pdf->Cell(30, 5, '', 0, 0, 'L');
    $pdf->Cell(130, 10, 'AO                 Always Observed', 0, 0, 'C');
    $pdf->Cell(11, 5, '', 0, 1, 'L');
    $pdf->Cell(140, 5, 'Core Subjects', 1, 0, 'L');
    $pdf->Cell(13, 5, '', 0, 0, 'L');
    $pdf->Cell(130, 10, 'SO                 Sometimes Observed', 0, 0, 'C');
    $pdf->Cell(11, 5, '', 0, 1, 'L');
    
    $pdf->Cell(20, 5, 'CS 6', 1, 0, 'L');
    $pdf->Cell(80, 5, 'Contemporary Philippines Arts from the World', 1, 0, 'L');
    $pdf->Cell(10, 5, $seccore1first, 1, 0, 'C');
    $pdf->Cell(10, 5, $seccore1sec, 1, 0, 'C');
    $pdf->Cell(20, 5, $seccore1ave, 1, 0, 'C');
    $pdf->Cell(10, 5, '', 0, 0, 'L');
    $pdf->Cell(130, 10, 'RO                 Rarely Observed', 0, 0, 'C');
    $pdf->Cell(11, 5, '', 0, 1, 'L');
    $pdf->Cell(20, 5, 'CS 11', 1, 0, 'L');
    $pdf->Cell(80, 5, 'Physical Science', 1, 0, 'L');
    $pdf->Cell(10, 5, $seccore2first, 1, 0, 'C');
    $pdf->Cell(10, 5, $seccore2sec, 1, 0, 'C');
    $pdf->Cell(20, 5, $seccore2ave, 1, 0, 'C');
    $pdf->Cell(8, 5, '', 0, 0, 'L');
    $pdf->Cell(130, 10, 'NO                 Not Observed', 0, 0, 'C');
    $pdf->Cell(11, 5, '', 0, 1, 'L');
    $pdf->Cell(20, 5, 'CS 13', 1, 0, 'L');
    $pdf->Cell(80, 5, 'Understanding Culture, Society and Politics', 1, 0, 'L');
    $pdf->Cell(10, 5, $seccore3first, 1, 0, 'C');
    $pdf->Cell(10, 5, $seccore3sec, 1, 0, 'C');
    $pdf->Cell(20, 5, $seccore3ave, 1, 1, 'C');
    $pdf->Cell(20, 5, 'CS 15-4', 1, 0, 'L');
    $pdf->Cell(80, 5, 'Physical Education and Health 4', 1, 0, 'L');
    $pdf->Cell(10, 5, $seccore4first, 1, 0, 'C');
    $pdf->Cell(10, 5, $seccore4sec, 1, 0, 'C');
    $pdf->Cell(20, 5, $seccore4ave, 1, 0, 'C');
    $pdf->Cell(10, 5, '', 0, 0, 'L');
    $pdf->Cell(130, 5, 'REPORT ON ATTENDANCE', 0, 0, 'C');
    $pdf->Cell(11, 5, '', 0, 1, 'L');
    
    $pdf->Cell(20, 5, '', 1, 0, 'L');
    $pdf->Cell(80, 5, '', 1, 0, 'L');
    $pdf->Cell(10, 5, '', 1, 0, 'L');
    $pdf->Cell(10, 5, '', 1, 0, 'L');
    $pdf->Cell(20, 5, '', 1, 0, 'L');
    $pdf->Cell(20, 5, '', 0, 0, 'L');
    $pdf->Cell(30, 5, 'Month', 1, 0, 'C');
    $pdf->Cell(7, 5, 'Jul', 1, 0, 'C');
    $pdf->Cell(7, 5, 'Aug', 1, 0, 'C');
    $pdf->Cell(7, 5, 'Sep', 1, 0, 'C');
    $pdf->Cell(7, 5, 'Oct', 1, 0, 'C');
    $pdf->Cell(7, 5, 'Nov', 1, 0, 'C');
    $pdf->Cell(7, 5, 'Dec', 1, 0, 'C');
    $pdf->Cell(7, 5, 'Jan', 1, 0, 'C');
    $pdf->Cell(7, 5, 'Feb', 1, 0, 'C');
    $pdf->Cell(7, 5, 'Mar', 1, 0, 'C');
    $pdf->Cell(7, 5, 'Apr', 1, 0, 'C');
    $pdf->Cell(7, 5, 'May', 1, 0, 'C');
    $pdf->Cell(7, 5, 'Total', 1, 0, 'C');
    $pdf->Cell(11, 5, '', 0, 1, 'L');
    $pdf->Cell(140, 5, 'Applied and Specialized Subjects', 1, 0, 'L');
    $pdf->Cell(20, 5, '', 0, 0, 'L');
    $pdf->Cell(30, 5, 'No. of School Days', 1, 0, 'C');
    $pdf->Cell(7, 5, '', 1, 0, 'C');
    $pdf->Cell(7, 5, '', 1, 0, 'C');
    $pdf->Cell(7, 5, '', 1, 0, 'C');
    $pdf->Cell(7, 5, '', 1, 0, 'C');
    $pdf->Cell(7, 5, '', 1, 0, 'C');
    $pdf->Cell(7, 5, '', 1, 0, 'C');
    $pdf->Cell(7, 5, '', 1, 0, 'C');
    $pdf->Cell(7, 5, '', 1, 0, 'C');
    $pdf->Cell(7, 5, '', 1, 0, 'C');
    $pdf->Cell(7, 5, '', 1, 0, 'C');
    $pdf->Cell(7, 5, '', 1, 0, 'C');
    $pdf->Cell(7, 5, '', 1, 0, 'C');
    $pdf->Cell(11, 5, '', 0, 1, 'L');
    $pdf->Cell(20, 5, 'AS 7', 1, 0, 'L');
    $pdf->Cell(80, 5, 'Research Project', 1, 0, 'L');
    $pdf->Cell(10, 5, $secapp1first, 1, 0, 'C');
    $pdf->Cell(10, 5, $secapp1sec, 1, 0, 'C');
    $pdf->Cell(20, 5, $secapp1ave, 1, 0, 'C');
    $pdf->Cell(20, 5, '', 0, 0, 'L');
    $pdf->Cell(30, 5, 'No. of Present', 1, 0, 'C');
    $pdf->Cell(7, 5, '', 1, 0, 'C');
    $pdf->Cell(7, 5, '', 1, 0, 'C');
    $pdf->Cell(7, 5, '', 1, 0, 'C');
    $pdf->Cell(7, 5, '', 1, 0, 'C');
    $pdf->Cell(7, 5, '', 1, 0, 'C');
    $pdf->Cell(7, 5, '', 1, 0, 'C');
    $pdf->Cell(7, 5, '', 1, 0, 'C');
    $pdf->Cell(7, 5, '', 1, 0, 'C');
    $pdf->Cell(7, 5, '', 1, 0, 'C');
    $pdf->Cell(7, 5, '', 1, 0, 'C');
    $pdf->Cell(7, 5, '', 1, 0, 'C');
    $pdf->Cell(7, 5, '', 1, 0, 'C');
    $pdf->Cell(11, 5, '', 0, 1, 'L');
    $pdf->Cell(20, 5, 'TVS 7', 1, 0, 'L');
    $pdf->Cell(80, 5, 'Computer Programming 2A (WP)', 1, 0, 'L');
    $pdf->Cell(10, 5, $secapp2first, 1, 0, 'C');
    $pdf->Cell(10, 5, $secapp2sec, 1, 0, 'C');
    $pdf->Cell(20, 5, $secapp2ave, 1, 1, 'C');
    $pdf->Cell(20, 5, 'TVS 8', 1, 0, 'L');
    $pdf->Cell(80, 5, 'Computer Programming 2B (CSS)', 1, 0, 'L');
    $pdf->Cell(10, 5, $secapp3first, 1, 0, 'C');
    $pdf->Cell(10, 5, $secapp3sec, 1, 0, 'C');
    $pdf->Cell(20, 5, $secapp3ave, 1, 0, 'C');
    $pdf->Cell(10, 5, '', 0, 0, 'L');
    $pdf->Cell(140, 5, 'VISION', 0, 1, 'C');
    $pdf->Cell(20, 5, 'TVS 9', 1, 0, 'L');
    $pdf->Cell(80, 5, 'Work Immersion/ Career Advocacy/ Culminating Activity', 1, 0, 'L');
    $pdf->Cell(10, 5, $secapp4first, 1, 0, 'C');
    $pdf->Cell(10, 5, $secapp4sec, 1, 0, 'C');
    $pdf->Cell(20, 5, $secapp4ave, 1, 0, 'C');
    $pdf->Cell(15, 5, '', 0, 0, 'L');
    $pdf->Cell(0.1, 5, "Lyceum of Alabang envision in becoming one of the nation's leading educational institution", 0, 0, 'L');
    $pdf->Cell(130, 13, 'in volved in the pursuit of the advancemnt of knowledge, skills, and values for personal,', 0, 0, 'L');
    $pdf->Cell(10, 5, '', 0, 1, 'L');
    $pdf->Cell(20, 5, '', 1, 0, 'L');
    $pdf->Cell(80, 5, 'Average each Quarter', 1, 0, 'R');
    $pdf->Cell(10, 5, $sec_first_ave, 1, 0, 'C');
    $pdf->Cell(10, 5, $sec_sec_ave, 1, 0, 'C');
    $pdf->Cell(20, 5, '', 1, 1, 'L');
    $pdf->Cell(120, 5, 'Average for the Semester', 1, 0, 'R');
    $pdf->Cell(20, 5, $secave, 1, 0, 'C');
    $pdf->Cell(15, 5, '', 0, 0, 'R');
    $pdf->Cell(0.1, 5, "community, and national development.", 0, 1, 'L');
    $pdf->Cell(20, 5, '', 0, 1, 'L');
    $pdf->Cell(20, 5, '', 0, 0, 'L');
    $pdf->Cell(30, 5, 'Descriptors', 0, 0, 'L');
    $pdf->Cell(30, 5, 'Grading Scale', 0, 0, 'L');
    $pdf->Cell(30, 5, 'Remarks', 0, 0, 'L');
    $pdf->Cell(40, 5, '', 0, 0, 'L');
    $pdf->Cell(140, 5, 'MISSION', 0, 1, 'C');
    
    $pdf->Cell(20, 5, '', 0, 0, 'L');
    $pdf->Cell(30, 5, 'Outstanding', 0, 0, 'L');
    $pdf->Cell(30, 5, '90-100', 0, 0, 'L');
    $pdf->Cell(30, 5, 'Passed', 0, 0, 'L');
    $pdf->Cell(45, 5, '', 0, 0, 'L');
    $pdf->Cell(0.1, 5, 'Lyceum of Alabang shall provide world-class education and training through competent', 0, 0, 'L');
    $pdf->Cell(130, 13, 'personne, high-end facilities and equipment, and accredited industy-based programs', 0, 0, 'L');
    $pdf->Cell(10, 5, '', 0, 1, 'L');
    
    $pdf->Cell(20, 5, '', 0, 0, 'L');
    $pdf->Cell(30, 5, 'Very Satisfactory', 0, 0, 'L');
    $pdf->Cell(30, 5, '85-89', 0, 0, 'L');
    $pdf->Cell(30, 5, 'Passed', 0, 0, 'L');
    $pdf->Cell(40, 5, '', 0, 1, 'L');
    
    $pdf->Cell(20, 5, '', 0, 0, 'L');
    $pdf->Cell(30, 5, 'Satisfactory', 0, 0, 'L');
    $pdf->Cell(30, 5, '80-84', 0, 0, 'L');
    $pdf->Cell(30, 5, 'Passed', 0, 0, 'L');
    $pdf->Cell(40, 5, '', 0, 1, 'L');
    
    $pdf->Cell(20, 5, '', 0, 0, 'L');
    $pdf->Cell(30, 5, 'Fairly Satisfactory', 0, 0, 'L');
    $pdf->Cell(30, 5, '75-79', 0, 0, 'L');
    $pdf->Cell(30, 5, 'Passed', 0, 0, 'L');
    $pdf->Cell(40, 5, '', 0, 0, 'L');
    $pdf->Cell(140, 5, 'MISSION', 0, 1, 'C');
    
    
    $pdf->Cell(20, 5, '', 0, 0, 'L');
    $pdf->Cell(30, 5, 'Did Not Meet', 0, 0, 'L');
    $pdf->Cell(30, 5, 'Below 75', 0, 0, 'L');
    $pdf->Cell(30, 5, 'Failed', 0, 0, 'L');
    $pdf->Cell(45, 5, '', 0, 0, 'L');
    $pdf->Cell(0.1, 4, 'We, at the lyceum of Alabang commit ourselves to exceed the expectations of our stakeholders', 0, 0, 'L');
    $pdf->Cell(130, 11, 'through continual improvement for effective and ifficient provision of quality education and ', 0, 0, 'L');
    $pdf->Cell(10, 5, '', 0, 1, 'L');
    $pdf->Cell(155, 5, '', 0, 0, 'L');
    $pdf->Cell(0.1, 6, 'training. We will ensure that all our academic and non-academic process and activities are aligned', 0, 1, 'L');
    $pdf->Cell(155, 5, '', 0, 0, 'L');
    $pdf->Cell(0.1, 5, 'with  their voice.', 0, 0, 'L');
    
    switch ($file=$pdf->Output("attachment.pdf", "S")) {
        default:
            header("location: ../../url.php?grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=two&error=none");

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
        $mail->FromName = $email;			//Sets the From name of the message
        $mail->AddBCC($emailp, 'Parent');		//Adds a "To" address
        $mail->AddBCC($emailp1, 'Parent');		//Adds a "To" address
        $mail->AddBCC($emailp2, 'Parent');		//Adds a "To" address
        $mail->AddBCC($emailp3, 'Parent');		//Adds a "To" address
        $mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
        $mail->IsHTML(true);							//Sets message type to HTML	
        $mail->AddStringAttachment($file, 'attachment.pdf');    				//Adds an attachment from a path on the filesystem
       
    
        $mail->Subject = 'Grade Sheet of Student';			//Sets the Subject of the message
        $mail->Body = $body;			//An HTML or plain text message body
    
        if($mail->Send())        //Send an Email. Return true on success or false on error
        {
            $_SESSION['status']='sent';
        }
        else {
            $_SESSION['status']='failed';
        }
        unlink($file_name);
    }
}
else {
    header("location: ../url.php?grade=".$grade."&track=".$track."&strand=".$strand."&spec=".$spec."&section=".$section."&sem=two&error=forbidden");
}



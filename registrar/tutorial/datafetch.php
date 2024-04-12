<?php
require_once '../../include/dbh.inc.php';
require_once '../../include/functions.inc.php';
require_once 'Classes/PHPExcel.php';

//we can combine this with file upload
if( empty($_FILES) ){
	echo "
		<form method='post' enctype='multipart/form-data' action='datafetch.php'>
            <input type='file' name='excel'><button type='submit' class='btn btn-primary' name='submit'>Submit</button>
		</form>
	";
}else{

	//load excel file using PHPExcel's IOFactory
	//change filename to tmp_name of uploaded file
	$excel = PHPExcel_IOFactory::load($_FILES['excel']['tmp_name']);

	//set active sheet to first sheet
	$excel->setActiveSheetIndex(0);
    $class = $excel->getActiveSheet()->getCell('K7')->getValue();
    $track = $excel->getActiveSheet()->getCell('AE8')->getValue();
    $strand = $excel->getActiveSheet()->getCell('AM7')->getValue();
    $spec = $excel->getActiveSheet()->getCell('AM8')->getValue();
    $teacher = $excel->getActiveSheet()->getCell('S7')->getValue();
    if ($class== NULL || $track== NULL || $strand== NULL) {
        header("location:../verti-header.php?name=add-section&error=emptyInputfields");
    }
    else {
        $class = (explode("-",$class));
        $sectionn = $class[1];
        $i = 13;

	//loop until the end of data series(cell contains empty string)
    
    if (classExists($conn, $class) !== false) {
        header("location: ../verti-header.php?name=section&&error=classExists");
        exit();
    }
    
    else{
        
        createSection($conn, $class, $track, $strand, $spec);
    }

	while($excel->getActiveSheet()->getCell('B'.$i)->getValue() != ""){
        $gender= "Male";
        $name= $excel->getActiveSheet()->getCell('B'.$i)->getValue();
        if ($name == NULL) {
            header("location: ../verti-header.php?name=add-section&error=null");
        }
        $name = (explode(" ",$name));
        $first= $name[1] . " " . $name[2];
		//get cells value
		//echo
		$query = "INSERT INTO ".$sectionn."_student(student_gender, student_first, student_last) VALUES ('".$gender."','".$first."','".$name[0]."')";
        $stmt=mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $query)) {
           echo "stmt";
            exit();
        }
        mysqli_query($conn, $query); 
		//and DON'T FORGET to increment the row pointer ($i)
        /*$query = "INSERT INTO ".$class[1]."_student(student_first) VALUES ('".$name."')";
        mysqli_query($connect, $query);
        */
        

		$i++;
	}
    $i=39;
        while( $excel->getActiveSheet()->getCell('B'.$i)->getValue() != ""){
            
            if ($name == NULL) {
                header("location: ../verti-header.php?name=add-section");
            }
            $gender= "Female";
            //get cells value
            $name =		$excel->getActiveSheet()->getCell('B'.$i)->getValue();
            $name= $excel->getActiveSheet()->getCell('B'.$i)->getValue();
            $name = (explode(" ",$name));
            $first= $name[1] . " " . $name[2];
    
    
            $query = "INSERT INTO ".$sectionn."_student(student_gender, student_first, student_last) VALUES ('".$gender."','".$first."','".$name[0]."')";
            $stmt=mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $query)) {
               echo "stmt";
                exit();
            }
            mysqli_query($conn, $query); 
            //echo
            /*$query = "INSERT INTO student(user_first) VALUES ('".$name."')";
            mysqli_query($conn, $query); */
            
            //and DON'T FORGET to increment the row pointer ($i)
            $i++;
        }

	//loop until the end of data series(cell contains empty string)
	
    header("location: ../verti-header.php?name=add-section&error=none");
    }
	//first row of data series
	
	
}
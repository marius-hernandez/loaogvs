<?php
$first= "first";
$last= "last";
$name = $first . $last;
if (isset($_POST['submit'])) {
    $file=$_FILES['file'];
    $section= "Ithiel";
    
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $filetype = $_FILES['file']['type'];

    $fileExt= explode('.', $fileName);
    $fileActualExt= strtolower(end($fileExt));

    $allowed = array('xls', 'xlsx');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 500000) {
                $fileNameNew = $section . "." . $fileActualExt;
                $fileDestination=  '../excel/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                
                require_once "../Classes/PHPExcel.php";
                $path="../excel/Ithiel.xlsx";
                $reader= PHPExcel_IOFactory::createReaderForFile($path);
                $excel_Obj = $reader->load($path);
                
                //Get the last sheet in excel
                //$worksheet=$excel_Obj->getActiveSheet();
                
                //Get the first sheet in excel
                $worksheet=$excel_Obj->getSheet('0');
                $name = $worksheet->getCell('B18')->getValue();
                if ($name == NULL) {
                    echo "Fill up all the important fields in the Excel.";
                }
                else {
                    echo $name;
                }


            }
            else{
                echo "Your file is too big!";
            }
        }
        else{
            echo "There was an error uploading your file!";
        }
    }
    else{
        echo "You cannot upload this type of file!";
    }

}
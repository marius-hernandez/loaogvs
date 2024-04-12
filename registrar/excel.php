<?php
    include_once '../include/dbh.inc.php';
require_once 'Classes/PHPExcel.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .dark{
        margin: 30px;
    }
</style>
<body>
<div class='dark'>
    <h1>Upload an Excel file</h1>
    <h3>Please refer to this format</h3>
    <br>
        <a href="download.php?path=sample2.xlsx" class="btn btn-success">Download</a>
    <br><br>
<?php
    if( empty($_FILES) ){
        echo "
            <form method='post' enctype='multipart/form-data' action='tutorial/datafetch.php'>
                <input type='file' name='excel' accept='.xls,.xlsx'><button type='submit' class='btn btn-primary' name='submit'>Submit</button>
            </form>
        ";
    }

?>
        


    </div>
</body>
</html>
<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</head>
<style>
th{
    background-color: #335779;
    color: white;
    margin: 10px;
    font-size: 30px;
}
td{
    text-align: center;
    font-size: 20px;
    
}
table{
    margin: auto;
    width: 80%;
}

</style>
<?php
include_once '../include/dbh.inc.php';
$sql="SELECT * from section";
$result = mysqli_query($conn, $sql);
$queryResults= mysqli_num_rows($result);
        if ($queryResults > 0) {
echo"<table border='1' id='myTable'>";

            echo"<tr align='center'>
                <th align='center'><h5>Section</h5></th>
                <th align='center'><h5>Advisory</h5></th>
                <th align='center'><h5>Grades</h5></th>
            </tr>";
            while ($row = mysqli_fetch_assoc($result)) {
        echo"<form action='export.php?section=".$row['class_name']."&first=".$row['teacher_first']."&last=".$row['teacher_last']."' method='POST'>
            <p id='student'>
            <h3 name='username' id='username'>
            <tr>
            <td align='center' class='master'>".$row['class_name']."</td>
            <td align='center'>".$row['teacher_first']. " ".$row['teacher_last']."</td>
            <td align='center'><button type='submit' class='btn btn-success'>Download</td>
          
                </tr></h3></p></form>";
            }
            echo"</table>";
        }
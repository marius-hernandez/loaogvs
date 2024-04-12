<style>
table th{
    background-color: #3a6289;
    color: white;
    margin: 10px;

}
td{
    text-align: left;
}
table{
    margin: auto;
}
</style>
<?php
include_once '../include/dbh.inc.php';
$sql="SELECT * from requests_log ORDER by user_date";
$result = mysqli_query($conn, $sql);
$queryResults= mysqli_num_rows($result);
        if ($queryResults > 0) {
echo"<table border='1' id='myTable'>";

            echo"<tr align='center'>
                <th align='center'><h5>Date</h5></th>
                <th align='center'><h5>Message</h5></th>
            </tr>";
            while ($row = mysqli_fetch_assoc($result)) {
        echo"
            <p id='student'>
            <h3 name='username' id='username'>
            <tr>
            <td align='center'>".$row['user_date']."</td>
            <td align='center'>".$row['user_message']."</td>
          
                </tr></h3></p>";
            }
            echo"</table>";
        }
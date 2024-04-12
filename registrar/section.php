<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
.folder{
    font-size: 100px;
    text-decoration: none;
    background: -webkit-linear-gradient(red, yellow);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-size: 200% 100%;
    background-position: 100%;
    transition: background-position 275ms ease;
}
.folder:hover{
    background: -webkit-linear-gradient(#1c4966, #296d98);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}
.hover{
    display: inline-block;
    text-align: center;
    margin-right: 100px;

}

.hover:hover{
    text-decoration: none;
}
.label{
    color: #333333;
    text-align: center;
}
</style>
<body>
    <table>
        <tr>
            <td>
            <?php
                 $sql="SELECT * from section ORDER BY class_name ASC";
                 $stmt = mysqli_stmt_init($conn);
                 if (!mysqli_stmt_prepare($stmt, $sql)) {
                     header("location: verti-header.php?name=archive&error=stmtfailed");
                     exit();
                 }
                 $result= mysqli_query($conn, $sql);
                 $queryResults = mysqli_num_rows($result);
                 echo '<a href="verti-header.php?name=add-section" class="nav__link hover" id="nav_all">
                 <i class="bx bx-plus-circle folder"></i>
                 <br>
                 <span class="nav__name label">Add Section</span>
                 </a>';
                 if ($queryResults==0) {
                    echo "<br>There are no items in the bin";
                    }
                    else{
                        while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <a href="verti-header.php?name=section_list&section=<?php echo $row['class_name'] ?>" class="nav__link hover" id="nav_all">
                    <i class='bx bx-folder-open folder'></i>
                    <br>
                    <span class="nav__name label"><?php echo $row['class_name']  ?></span>
                </a>
                <?php } } ?>
            </td>
    </table>
</body>
</html>
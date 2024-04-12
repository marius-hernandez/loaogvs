<?php
    require_once 'include/dbh.inc.php';
    include_once 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="">
        <h1>Settings</h1>
        
        <?php
            if (isset($_SESSION["id"])) {
                echo "<h2>Gender: " .$_SESSION["usergender"]. "<a href='setting/change-name' style='font-size:small'>Change</a></h2>";
                echo "<h2>Name:".$_SESSION["userfirst"]. " " .$_SESSION["usermiddle"]. " " .$_SESSION["userlast"]. " " .$_SESSION["usersuffix"]."<a href='setting/change-name.php' style='font-size:small'>Change</a></h2>";
                echo "<h2>Email: " .$_SESSION["useremail"]. "<a href='setting/change-email.php' style='font-size:small'>Change</a></h2>";
                echo "<h2>Password: ************* <a href='setting/change-pwd.php' style='font-size:small'>Change</a></h2>";
                echo "<h2>LRN: " .$_SESSION["userlrn"]. "<a href='setting/change-name.php' style='font-size:small'>Change</a></h2>";
                echo "<h2>Grade: " .$_SESSION["usergrade"]. "<a href='setting/change-name' style='font-size:small'>Change</a></h2>";
                echo "<h2>Section: " .$_SESSION["usersection"]. "<a href='setting/change-name' style='font-size:small'>Change</a></h2>";
            }

            else if (isset($_SESSION["idt"])) {
                echo "<h2>Gender: " .$_SESSION["usergender"]. "<a href='setting/change-name' style='font-size:small'>Change</a></h2>";
                echo "<h2>Name:".$_SESSION["userfirst"]. " " .$_SESSION["usermiddle"]. " " .$_SESSION["userlast"]. " " .$_SESSION["usersuffix"]."<a href='setting/change-name.php' style='font-size:small'>Change</a></h2>";
                echo "<h2>Email: " .$_SESSION["useremail"]. "<a href='setting/change-email.php' style='font-size:small'>Change</a></h2>";
                echo "<h2>Password: ************* <a href='setting/change-pwd.php' style='font-size:small'>Change</a></h2>";
                echo "<h2>Teacher ID: " .$_SESSION["useryear"]."-".$_SESSION["userid"]. "<a href='setting/change-name.php' style='font-size:small'>Change</a></h2>";
            }
            else{
                echo"bubu";
            }
            ?>
    </form>
</body>
</html>
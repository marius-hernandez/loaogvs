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
                <a href="verti-header.php?name=log" class="nav__link hover" id="nav_all">
                    <i class='bx bxs-folder-open folder'></i>
                    <br>
                    <span class="nav__name label">Log</span>
                </a>

                <a href="verti-header.php?name=ignore" class="nav__link hover" id="nav_all">
                    <i class='bx bxs-folder-open folder'></i>
                    <br>
                    <span class="nav__name label">Ignore bin</span>
                </a>
                <a href="verti-header.php?name=teacher-bin" class="nav__link hover" id="nav_all">
                    <i class='bx bxs-folder-open folder'></i>
                    <br>
                    <span class="nav__name label">Teacher bin</span>
                </a>
                <a href="verti-header.php?name=student-bin" class="nav__link hover" id="nav_all">
                    <i class='bx bxs-folder-open folder'></i>
                    <br>
                    <span class="nav__name label">Student bin</span>
                </a>
            </td>
    </table>
</body>
</html>
<?php
    include_once 'header.php';
?>
<section class="signup-form">
    <h2>Login</h2>
    <div class="login-form-form">
        <form action="include/login.inc.php" method="POST">
            <input type="text" name="email" placeholder="Email">
            <br>
            <input type="password" name="pwd" placeholder="Password">
            <br>
            <button type="submit">Login</button>
            <a href="signup.php">New here? Sign up</a>
        </form>
    </div>
<?php
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "emptyinput") {
            echo "<p>Incomplete input</p>";
        }
        elseif ($_GET["error"] == "wronglogin") {
            echo "<p>incorrect login information!</p>";
        }
    }
?>

</section>

<?php
    include_once 'footer.php';
?>
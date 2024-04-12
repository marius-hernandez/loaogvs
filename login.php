<?php
    include("include/functions.inc.php");
    include("include/dbh.inc.php");
    error_reporting(0);
    $not= mysqli_real_escape_string($conn, $_GET['not']);
    $error= mysqli_real_escape_string($conn, $_GET['error']);
    if ($not=='pending') {
      echo "<script>alert('Your account is pending, please contact the registrar')</script>";
    }
    elseif ($error=='wrong') {
      echo "<script>alert('Wrong login details!')</script>";
    }
?>

<!DOCTYPE html> 
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="pics/loa.png">
    <title>Login</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500&display=swap" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<style>
body, html {
  height: 100%;
  margin: 0;
  font-family: Raleway, sans-serif;
}

* {
  box-sizing: border-box;
}

input, select, textarea {
  max-width: 70%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}



.bg-image {
  /* The image used */
  background-image: url("pics/33.jpg");
  
  /* Add the blur effect */
  filter: blur(8px);
  -webkit-filter: blur(8px);
  
  /* Full height */
  height: 100%; 
  
  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

/* Position text in the middle of the page/image */
.container {
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
  background-attachment: fixed;
  color: white;
  font-weight: bold;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 2;
  width: clamp(10px, 60%, 90%);
  padding: 20px;
  text-align: center;
  border-radius: 5px;
  box-shadow: 10px 10px #333333;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
.input-box{
  margin-bottom: 30px;
}
.hyper{
  color: white;
}
.hyper:hover{
  color: gray;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
    .container{
        margin-bottom: 50px;
        text-align:center;
        height: 60%;
        padding-right: 0;
        padding: 20px;
        box-shadow: 10px 10px #333333;
        margin-top: 0px;
    }
    .input-box{
      margin-bottom: 10px;
    }
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
a{
    text-decoration: none;
    color: white;
}
a:hover{
    text-decoration: none;
    color: white;
}
h2{
    font-size: 50px;
}
hr {
  background: linear-gradient(to right, blue, yellow);
  height: 5px;
  width: 25%;
}
</style>
<body>
<div class="bg-image"></div>
<form method="POST" action="include/login.inc.php?not=pending">
<div class="container" id='container'>
                      <form action="#">
                      <div class="user-details">
                                <h1 class="title">Log in</h1>
                                <hr>
                                  
                                <!--<label for="inputEmail" class="sr-only">Email address</label>
                                <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                                <label for="inputPassword" class="sr-only">Password</label>
                                <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>-->
                              
                               <!-- <span for="inputEmail" class="details">Email address</span>
                                <input name="email" type="email" id="inputEmail" class="details" placeholder="Email address" required>
                                <br>
                                <span for="inputPassword" class="details">Password</span>
                                <input name="password" type="password" id="inputPassword" class="details" placeholder="Password" required>-->

                               
                                <!--<button name="signin" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                                <a href="signup.php" class="mt-5 mb-3 text-muted">Create an account</a>-->
                                
                                <div class="input-box">
                                  <span class="details">Email address</span>
                                  <br>
                                  <input name="email" type="email" id="inputEmail" placeholder="Email address" required>
                                </div>
                                <div class="input-box">
                                  <span class="details">Password</span>
                                  <br>
                                  <input name="pwd" type="password" id="inputPassword" placeholder="Password" required>
                                </div>
                                <button name="submit" class="btn btn-primary" type="submit">Sign in</button>
                                
                        </div>
                        </form>
            <br>
            <a href="signup.php" class="hyper">New here? Create an account</a>
</div>
</form>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</body>
</html>

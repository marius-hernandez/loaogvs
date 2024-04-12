<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500&display=swap" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="pics/loa.png">
<title>Sign Up</title>
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
  width: 100%;
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
  background-attachment: fixed;
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
  width: 70%;
  padding: 10px;
  padding-right: 80px;
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

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
    .container{
        text-align:center;
        height: 190%;
        padding-right: 0;
        padding: 20px;
        margin-top: 340px;
        box-shadow: 10px 10px #333333;
    }
    .bg-image{
        background-color: #333333;
        height: 230%;
        transform: scale(1.1); 
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
.hyphen{
    font-size: 50px;
    margin: 0px;
}



.loader-wrapper {
  width: 100%;
  height: 100%;
  position: absolute;
  top: 0;
  left: 0;
  background-color: #242f3f;
  display:flex;
  justify-content: center;
  align-items: center;
}
img{
    height: 200px;
    position: absolute;
}

.loader {
  border: 16px solid #235789;
  border-radius: 50%;
  border-top: 16px solid #F1D302;
  width: 205px;
  height: 205px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
</head>
<body>

<div class="bg-image"></div>

<div class="container content">
<h2 class="title">Sign up</h2>
<hr>
        <form action="include/signup.inc.php" method="post" class="form-signin" class="form-signin">
            <form action="#">
            
                            <div class="user-details">
                                <div id="teacher" name="teacher" class="user-details">
                                                    <div class="input-box">

                                                        <div class="row">
                                                            <div class="col-25">
                                                                <label for="year">Teacher ID</label>
                                                            </div>
                                                            <div class="col-75">
                                                            <input type="text" name ="teacherid" placeholder="2000-1035" id="tbNum" onkeyup="addHyphen(this)" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"maxlength = "9" required>
                                                            </div>

                                                            <div class="col-25">
                                                            <label for="gender">Title</label>
                                                        </div>
                                                        <div class="col-75">
                                                            <select type="text" id="gender" name="gender" class="select">
                                                                <option value disabled selected>Title</option>
                                                                <option>Mr.</option>
                                                                <option>Ms.</option>
                                                                <option>Mrs.</option>
                                                            </select>   
                                                        </div>
                                                        </div>
                                                        

                                                    </div>
                                                </div>
                                                
                                            <div class="user-details">
                                                <div class="input-box">

                                                    

                                            </div>
                            </div>
 
                                            

                                                <div class="input-box">
                                                    <div class="row">
                                                        <div class="col-25">
                                                            <label for="year">First name</label>
                                                        </div>
                                                        <div class="col-75">
                                                            <input type="text" name="first" placeholder= 'Juan' required>
                                                            <br>
                                                        </div>
                                                        <div class="col-25">
                                                            <label for="fname">Middle Name</label>
                                                        </div>
                                                        <div class="col-75">
                                                            <input type="text" name="middle" placeholder= 'Reyes' placeholder="(leave blank if none)">
                                                            <br>
                                                        </div>
                                                    </div>
                                                </div>
                                                                                            
                                                <div class="input-box">
                                                    <div class="row">
                                                        <div class="col-25">
                                                            <label for="fname">Last Name</label>
                                                        </div>
                                                        <div class="col-75">
                                                            <input type="text" name="last" placeholder= 'Dela Cruz' required>
                                                            <br>
                                                        </div>

                                                        <div class="col-25">
                                                            <label for="fname">Suffix</label>
                                                        </div>
                                                        <div class="col-75">
                                                        <select type="text" id="gender" name="suffix" class="select">
                                                                <option value disabled selected>Do you have suffix?</option>
                                                                <option>None</option>
                                                                <option>Jr.</option>
                                                                <option>Sr.</option>
                                                                <option>I</option>
                                                                <option>II</option>
                                                                <option>III</option>
                                                                <option>IV</option>
                                                                <option>V</option>
                                                                <option>VI</option>
                                                        </select>           
                                                        </div>
                                                    </div>
                                                </div>

                                                

                                                <div class="input-box">
                                                    <div class="row">
                                                        <div class="col-25">
                                                            <label for="fname">Password</label>
                                                        </div>
                                                        <div class="col-75">
                                                            <input type="password" name="pwd" placeholder="Password_00" required>
                                                            <br>
                                                        </div>

                                                        <div class="col-25">
                                                            <label for="fname">Confirm Password</label>
                                                        </div>
                                                        <div class="col-75">
                                                            <input type="password" name="conpwd" placeholder="Password_00" required>
                                                            <br>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="input-box">
                                                    <div class="row">
                                                        <div class="col-25">
                                                            <label for="fname">Email</label>
                                                        </div>
                                                        <div class="col-75">
                                                            <input type="text" name="email" placeholder="juandelacruz@gmail.com" required>
                                                            <br>
                                                        </div>
                                                    </div>
                                                </div>
                                                                <!--<td>
                                                                        <div id="teacher" name="teacher" class="user-details">
                                                                            <div class="input-box">
                                                                                <input class="input-box" type="number" name = "year" placeholder="Year" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"maxlength = "4">
                                                                            </div>
                                                                            <div class="input-box">
                                                                                <input class="input-box" type="number" name = "id" placeholder="ID" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"maxlength = "4">
                                                                            </div> 
                                                                        </div>
                                                                </td>
                                                                    <td>
                                                                        <div id="displayt">
                                                                            <p>Please input your <b>exact</b> teacher ID without extra/incomplete number or invalid characters, for the admin to easily accept you!</p>
                                                                            <p>Don't forget to double check!</p>
                                                                       </div>
                                                                    </td>-->  
                            </div>
                    <div class=lower>
                        <button type="submit" name="submit" class="btn btn-primary">Sign up</button>
                        <br>
                        <a class="call" href="login.php">Already signed in? Log in</a>
                    </div> 
            </form>    
        </form>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>

    function addHyphen (element) {
    	let ele = document.getElementById(element.id);
        ele = ele.value.split('-').join('');    // Remove dash (-) if mistakenly entered.

        let finalVal = ele.match(/.{1,4}/g).join('-');
        document.getElementById(element.id).value = finalVal;
    }

    </script>

<div class="loader-wrapper">
      
      <div class="loader">
      </div>
      <img src="pics/loa.png">
    </div>

    <script>
        $(window).on("load",function(){
          $(".loader-wrapper").fadeOut("slow");
        });
    </script>
</body>
<?php
#for errors
  
  if (isset($_GET["error"])) {
    if ($_GET["error"] =="emptyinput") {
      echo "<script>alert('Input all fields!')</script>";
    }
    else if ($_GET["error"] =="idExists") {
      echo "<script>alert('ID already exists!')</script>";
      }


    elseif ($_GET["error"] =="nameExists") {
      echo "<script>alert('Name already exists!')</script>";
    }

    elseif ($_GET["error"] =="emailExists") {
      echo "<script>alert('Email exists!')</script>";
  }

    elseif ($_GET["error"] =="invalidemail") {
      echo "<script>alert('Invalid email!')</script>";
    }

    elseif ($_GET["error"] =="pwdnotmatch") {
      echo "<script>alert('Password do not match!')</script>";
    }

    elseif ($_GET["error"] =="stmtfailed") {
        echo "<script>alert('Something went wrong!')</script>";
    }
    elseif ($_GET["error"] =="none") {
      echo "<script>alert('Done!')</script>";
    }
}
?>
</html>

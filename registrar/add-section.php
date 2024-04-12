<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<style>
body{
    text-align: center;
}
* {
  box-sizing: border-box;
}

input, select, textarea {
  width: 100%;
  padding: 12px;
  border: none;
  resize: vertical;
  box-shadow: 10px 10px 5px grey;
  margin-bottom: 20px;
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
    .container-add{
        margin-left: 50px;
        padding: 0;
        width: 70%;
    }
    .section{
      font-size: 40px;
    }
    h5{
    font-size: 10px;
    text-decoration: none;
    margin: 0px;
    }
    select{
      width: 150px;
      margin: 5px;
    }
    h3{
    font-size: 5px;
    margin: 0px;
    
    }
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}

h5{
    font-size: 40px;
    text-decoration: none;
    margin: 0px;

}
h3{
    font-size: 20px;
    margin: 0px;
}
.jumbotron{
    box-shadow: 10px 10px #333333;
    font-family: 'Raleway', sans-serif;
  }
  .container-add{
    max-width: 100%;
    margin: 30px;
  }

</style>
<script>

            function random_function0()
            {
                var a=document.getElementById("input1").value;
                if(a==="Academic Track")
                {
                    var arr=["STEM","HUMSS", "ABM", "GAS"];
                }
                else if(a==="Technical Vocational Livelihood Track")
                {
                    var arr=["ICT","HE","IA"];
                }
             
                var string="";
             
                for(i=0;i<arr.length;i++)
                {
                    string=string+"<option value="+arr[i]+">"+arr[i]+"</option>";
                }
                document.getElementById("output1").innerHTML=string;
            }


            function random_function()
            {
                var a=document.getElementById("input").value;
                if(a==="11")
                {
                    var arr=["Acts","Amos", "Chronicles", "Collosians", "Corinthians", "Daniel", "Ephesians", "Ezekiel", "Ezra", "Genesis", "Haggai", "Hebrew", "Hosea", "Isaiah", "James", "Jeremiah", "Job", "Joel", "John", "Jonah", "Jude", "Judges", "Kings", "Lamentations", "Luke", "Malachi", "Micah", "Nahum", "Nehemiah", "Numbers", "Obadiah", "Peter", "Solomon", "Thessalonians", "Timothy", "Titus"];
                }
                else if(a==="12")
                {
                    var arr=["Amaziah","Antioch","Aphek", "Ashur", "Attalia", "Babylon", "Beersheba", "Beirut", "Berea", "Bethel", "Bethany", "Bethlehem", "Bethsaida", "Cana", "Igdalia", "Illyricum", "Imathia", "Iphedeiah", "Irijah", "Israel", "Ithiel", "Jayser", "Jerahmeel", "Jericho", "Jerusalem", "Jezreel", "Jordan", "Jubilee", "Judea", "Macedonia", "Magdala", "Salem", "Samaria", "Samos", "Sedon", "Shechem", "Shiloh", "Shunem", "Sinai", "Smyrna", 
                    "Zaanan", "Zanoah"];
                }
             
                var string="";
             
                for(i=0;i<arr.length;i++)
                {
                    string=string+"<option value="+arr[i]+">"+arr[i]+"</option>";
                }
                document.getElementById("output").innerHTML=string;
            }
        </script>
<div class='container-add'>

                <form action="include/add-section.inc.php" method="POST">
                <section class="jumbotron text-center">
                    <h1 class='jumbotron-heading'>Section info</h1>
                    <select required type="text" name="grade" id="input" onchange="random_function()" class="form-select"> 
                        <option value disabled selected>Grade Level</option>
                        <option>11</option>
                        <option>12</option>
                    </select>
                    <select required id="output" onchange="random_function1()" name="class" class="form-select">  
                    <option value disabled selected>Section</option>
                    </select>
                    <br>
                    <select required type="text" name="track"  id="input1" onchange="random_function0()" class="form-select">
                        <option value disabled selected>Track</option>
                        <option>Academic Track</option>
                        <option>Technical Vocational Livelihood Track</option>
                    </select>
                    <select required id="output1" onchange="random_function1()" name="strand" class="form-select">
                    <option value disabled selected>Strand</option>
                    </select>
                    <br>
                    <select required id="output" onchange="random_function1()" name="spec" placeholder= "Specialization" class="form-select">
                    <option value disabled selected>Specialization</option>
                    <option>None</option>
                    <option>ICT Animation</option>
                    <option>ICT CSS</option>
                    <option>ICT Programming</option>
                    <option>HE Cookery</option>
                    <option>HE Tourism</option>
                    <option>IA Automotive</option>
                    <option>IA SMAW</option>
                    </select>
                    <br>
                    <button type="submit" name="submit" class='btn btn-primary'>Add Section</button>
                    </section>
                    </form>
</div>
</body>
</html>

<?php
if (isset($_GET["error"])) {
    if ($_GET["error"] =="emptyinput") {
      echo "<script>alert('Input all fields!')</script>";
    }
    else if ($_GET["error"] =="classExists") {
      echo "<script>alert('Section Name already occupied!')</script>";
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
    elseif ($_GET["error"] =="specMatch") {
      echo "<script>alert('Specialization does not match the chosen Strand!')</script>";
    }
    elseif ($_GET["error"] =="none") {
      echo "<script>alert('Done!')</script>";
    }
}
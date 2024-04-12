
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add Students</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  </head>
  <script>
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
    function copyTextValue(bf) {
        var text1 = bf.checked ? document.getElementById("Name1").value : '';
        document.getElementById("Name2").value = text1;
        document.getElementById("Name3").insertAdjacentHTML('beforebegin', text1);
    }

</script>
<style>
*{
    box-sizing: border-box;
    -webkit-box-sizing:box-sizing: border-box;
    -moz-box-sizing: border-box;
}
body{
  background-color: #f4fcff;
}
form{
    margin-top: 15px;
}
input[type=text]{
    margin-bottom: 20px;
    margin-top: 10px;
    width: 100%;
    padding: 15px;
    border-radius: 5px;
    font-size: 30px;
    height: 100px;
}

table{
    margin-left: 100px;
}
#lrn{
    width:100%;
    height: 40px;
    font-size: 40px;
    font-family: 'Century Gothic';
    text-align: center;
}
select{
  width: 40%;
  margin-top: 10px;
  margin-bottom: 10px;
  border: none;
}

.add-student{
    box-shadow: 10px 10px #333333;
    font-family: 'Raleway', sans-serif;
    text-align: center;
    background-color: #fbd75c;
    width: 70%;
    margin-left: 150px;
    padding: 30px;
  }
  .jesus{
   color: #333333;
   }
   .jesus:hover{
      color: #2c3a2a;
      text-decoration: none;
   }
   .jumbotron{
    box-shadow: 10px 10px #333333;
    font-family: 'Raleway', sans-serif;
    margin: 0px;
    max-width: 50%;
  }


   
hr{
  background: linear-gradient(to right, #235789, #F1D302);
  height: 5px;
  width: 25%;
}
</style>


  <body class="text-center">
  <?php
    include_once 'verti-header.php';
  ?>

  
      <div class="jumbotron">
        <h1>Add Student</h1>
          <form action="include/add-student.inc.php" method="POST" class="form-signin">
                        <input id="lrn" required type="number" name="lrn" placeholder="LRN" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"maxlength = "12" size="50">
                        <br>
                        <select required type="text" name="grade" id="input" onchange="random_function()">
                            <option value disabled selected>Grade Level</option>
                            <option>11</option>
                            <option>12</option>
                        </select>
                        <select required id="output" name="section" onchange="random_function1()">
                        <option value disabled selected>Section</option>
                        </select>
                        <br>
                        <select required type="text" name="track"  id="input1" onchange="random_function0()">
                        <option value disabled selected>Track</option>
                        <option>Academic Track</option>
                        <option>Technical Vocational Livelihood Track</option>
                        </select>
                        <select required id="output1" onchange="random_function1()" name="strand">
                        <option value disabled selected>Strand</option>
                        </select>
                        <select required id="output" onchange="random_function1()" name="spec" placeholder= "Specialization">
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
                        <select required name="gender" placeholder="Gender" id="gender">
                            <option value disabled>Gender</option>
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                        <br>
                            <input required name="first" placeholder="First" class="form-control name_list">
                            <br>
                            <input name="middle" placeholder="Middle (leave empty if none)" class="form-control name_list">
                            <br>
                            <input required name="last" placeholder="Last" class="form-control name_list">
                            <br>
                            <input name="suffix" placeholder="Suffix (leave empty if none)" class="form-control name_list">
                            <br>
                            <input required name="email" placeholder="Email">
                            <h4>Generated Password</h4>
                            <h1 id="Name3"></h1>
                            <input required name="pwd" id="Name1" type="password" placeholder="Password" class="form-control name_list" value=<?php echo rand_string(8);?>>
                            <input type="checkbox" name="check1" onchange="copyTextValue(this);" />
                            <input required name="conpwd" type="password" id="Name2" placeholder="Confirm Password" class="form-control name_list">
                            <br>
                            <button type="submit" name="submit" class='btn btn-success'>Submit</button>   
                     </form>
    </div>
  <?php

  #for errors
  
    if (isset($_GET["error"])) {
      if ($_GET["error"] =="emptyinput") {
        echo "<script>alert('Input all fields!')</script>";
      }
      else if ($_GET["error"] =="lrnExists") {
        echo "<script>alert('LRN already exists!')</script>";
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
<script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</script>
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
</html>

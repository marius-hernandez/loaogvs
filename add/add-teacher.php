
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add Students</title>
    
  </head>
  <style>
  .container-add{
    box-shadow: 10px 10px #333333;
    font-family: 'Raleway', sans-serif;
    text-align: center;
    background-color: #fbd75c;
    width: 50%;
    padding: 20px;
    margin-left: 200px;
  }
  
  </style>
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

.container-add{
    max-width:500px;
    margin: auto;
    padding: 10px;
}
form{
    margin-top: 15px;
}
input[type=number]{
    margin: 0%;
    width: 50%;
    padding: 15px;
    border-radius: 5px;
    font-size: 30px;
    height: 50px;
}

#lrn{
    width:500px;
    height: 50px;
    font-size: 50px;
    text-align: center;
}
select{
    width: 200px;
}
</style>


  <body class="text-center">
  <?php
    include_once 'verti-header.php';
  ?>

  
  <div class="container-add">
  <h1>Add Teacher</h1>
        <form action="include/add-teacher.inc.php" method="post" class="form-signin">
                    <input type="number" name = "year" placeholder="Year" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"maxlength = "4">
                    <input type="number" name = "id" placeholder="ID" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"maxlength = "4">
                    <br>
                    <select type="text" id="gender" name="gender">
                        <option value disabled selected>-What is your gender?-</option>
                        <option>Mr./Sir </option>
                        <option>Ms./Mrs.</option>
                        <option>Others</option>
                    </select>
                  <br>
                    <input name="first" placeholder="First Name">
                    
                    <input name="last" placeholder="Last Name">
                    <input name="middle" placeholder="Middle Name (leave blank if none)">
                    <input name="suffix" placeholder="Suffix (optional)">
                    
                    <input name="email" placeholder="Email">
                    <h4>Generated Password</h4>
                    <h1 id="Name3"></h1>
                    <input name="pwd" id="Name1" type="password" placeholder="Password" class="form-control name_list" value=<?php echo rand_string(8);?>>
                    <input type="checkbox" name="check1" onchange="copyTextValue(this);" />
                    <input name="conpwd" type="password" id="Name2" placeholder="Confirm Password" class="form-control name_list">
                    
                    <button type="submit" name="submit">Sign up</button>
            </form>
          </div>

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
<script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</script>
</html>

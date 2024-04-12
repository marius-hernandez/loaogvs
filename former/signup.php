<?php

    include_once 'header.php';
?>


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

</script>
<style>
</style>
<body>
    
<section class="signup-form">
    <h2>Sign up</h2>
    
        <form action="include/signup.inc.php" method="POST">
        <table>
            <tr>
                <td>
                <select type="text" id="test" name="role" onchange="showDiv(this)">
                    <option value disabled selected>-Who are you?-</option>
                    <option>Student</option>
                    <option>Teacher</option>
                    </select>

                    <select type="text" id="gender" name="gender">
                        <option value disabled selected>-What is your gender?-</option>
                        <option>Mr./Sir </option>
                        <option>Ms./Mrs.</option>
                        <option>Others</option>
                    </select>
                    <br>
                    <input type="text" name="first" placeholder="First Name">
                    <br>
                    <input type="text" name="last" placeholder="Last Name">
                    <br>
                    <input type="text" name="middle" placeholder="Middle Name (leave blank if none)">
                    <br>
                    <input type="text" name="suffix" placeholder="Suffix (optional)">
                    <br>
                    <input type="text" name="email" placeholder="Email">
                    <br>
                    <input type="password" name="pwd" placeholder="Password">
                    <br>
                    <input type="password" name="conpwd" placeholder="Confirm Password">
                    <br>
                    <button type="submit" name="submit">Sign up</button>
                    <a href="login.php">Already signed in? Log in</a>
                </td>


                <td>

                    <div id="student">
                    <input type="number" name="lrn" placeholder="LRN" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"maxlength = "12">
                    <br>
                    <select type="text" name="grade" id="input" onchange="random_function()">
                        <option value disabled selected>-What is your grade?-</option>
                        <option>11</option>
                        <option>12</option>
                    </select>
                    <select id="output" onchange="random_function1()" name="section">
                    <option value disabled selected>-Section-</option>
                    </select>
                    </div>
                    <div id="teacher" name="teacher">
                    <input type="number" name = "year" placeholder="Year" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"maxlength = "4">
                    <input type="number" name = "id" placeholder="ID" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"maxlength = "4">
                    </div>
                </td>
                <td>
                    <div id="display">
                        <p>Please input your <b>exact</b> lrn without extra/incomplete number or invalid characters, for your teacher to easily find you!</p>
                        <p>Don't forget to double check!</p>
                    </div>
                    
                    <div id="displayt">
                        <p>Please input your <b>exact</b> teacher ID without extra/incomplete number or invalid characters, for the admin to easily accept you!</p>
                        <p>Don't forget to double check!</p>
                    </div>
                
                </td>
            </tr>
        </table>
        
            </form>
        
    </div>
    <?php
if (isset($_GET["error"])) {
    if ($_GET["error"] =="emptyinput") {
        echo"<p>Input all fields!</p>";
    }

    elseif ($_GET["error"] =="nameExists") {
        echo"<p>Invalid username!</p>";
    }

    elseif ($_GET["error"] =="lrnExists") {
        echo"<p>Your lrn is already in use!</p>";
        echo"<p>Are you a parent? It means your son/daughter has account in this website already</p>";
        echo"<p><a link href='learn.php'>Learn More</a></p>";
    }

    elseif ($_GET["error"] =="invaliduid") {
        echo"<p>Invalid username!</p>";
    }

    elseif ($_GET["error"] =="invalidemail") {
        echo"<p>Invalid email!</p>";
    }

    elseif ($_GET["error"] =="pwdnotmatch") {
        echo"<p>Password don't match!</p>";
    }

    elseif ($_GET["error"] =="stmtfailed") {
        echo"<p>Something went wrong!</p>";
    }
    elseif ($_GET["error"] =="usernametaken") {
        echo"<p>Username is taken!</p>";
    }
    elseif ($_GET["error"] =="none") {
        echo"<p>Done!</p>";
    }
}
?>
</section>
</body>

<?php


    include_once 'footer.php';
?>
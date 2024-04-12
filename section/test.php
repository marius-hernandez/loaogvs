<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src='https://code.jquery.com/jquery-2.1.3.min.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
</head>
<style>
    body{
        margin: 50px;
    }
    table{
        margin: 100px;
        border-collapse: collapse;
        border: 1px solid black;
        box-shadow: 10px 10px 5px grey;
    }
    tr{
        margin: 0%;
        border: 1px solid black;
    }
    td{
        margin: 0%;
        border: 1px solid black;
    }
    p{
        margin: 0%;
    }
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
    }
    input{
        width: 30px;
        -moz-appearance: textfield;
    }
    h3{
        font-size: 50px;
    }
</style>
<body>
<b><h3>First Semester</h3></b>
<table border='1' style='text-align: center; width: 100%; border-collapse: collapse' >
    <table class='subject'>
    <tr>
        <td rowspan='2' colspan='2'>
            <b><p>Subjects</p></b>
        </td>
        <td colspan='2'>
            <b><p>Quarter</p></b>
        </td>
        <td rowspan='2' align="center">
            <b><p>Final<br>Grade</p></b>
        </td>
    </tr>
    <tr align='center'>
        <td>
            <b><p>1</p></b>
        </td>
        
        <td>
            <b><p>2</p></b>
        </td>
        
    
    </tr>
    <tr style='text-align: left'>
        <td colspan='5'>
            <b><p>Core Subjects</p></b>
        </td>
    </tr>

    <tr>
        <td>
            <p>CS 6</p>
        </td>
        <td>
            <p>Contemporary Philippine Arts from the Region</p>
        </td>
        <td>
            <p><input type='number' name='lrn' class='kd1' style='border:0' value='".$row['student_lrn']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
        </td>
        <td>
            <p><input type='number' name='lrn' class='kd1' style='border:0' value='".$row['student_lrn']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
        </td>
        <td align='center'>
            <input type='text' size='5' class='result1' style='border:0' disabled>       
        </td>
    </tr>
    <tr>
        <td>
            <p>CS 7</p>
        </td>
        <td>
            <p>Media and Information Literacy</p>
        </td>
        <td>
            <p><input type='number' name='lrn' class='kd1' style='border:0' value='".$row['student_lrn']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
        </td>
        <td>
            <p><input type='number' name='lrn' class='kd1' style='border:0' value='".$row['student_lrn']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
        </td>
        <td align='center'>
            <p><input type='text' size='5' class='result1' style='border:0' disabled></p> 
        </td>
    </tr>

    <tr>
        <td>
            <p>CS 15-3</p>
        </td>
        <td>
            <p>Physical Education and Health 3</p>
        </td>
        <td>
            <p><input type='number' name='lrn' class='kd1' style='border:0' value='".$row['student_lrn']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
        </td>
        <td>
            <p><input type='number' name='lrn' class='kd1' style='border:0' value='".$row['student_lrn']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
        </td>
        <td align='center'>
            <p><input type='text' size='5' class='result1' style='border:0' disabled></p> 
        </td>
    </tr>
    
    <tr style='text-align: left'>
        <td colspan='5'>
            <b><p>Applied and Specialized Subjects</p></b>
        </td>
    </tr>
    <tr>
        <td>
            <p>AS 3</p>
        </td>
        <td>
            <p>Practical Research 2</p>
        </td>
        <td>
            <p><input type='number' name='lrn' class='kd1' style='border:0' value='".$row['student_lrn']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>
        </td>
        <td>
            <p><input type='number' name='lrn' class='kd1' style='border:0' value='".$row['student_lrn']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>

        </td>
        <td align='center'>
            <p><input type='text' size='5' class='result1' style='border:0' disabled></p> 
        </td>
    </tr>
    <tr>
        <td>
            <p>AS 4</p>
        </td>
        <td>
            <p>Pagsulat sa Filipino sa Larangan ng Akademik</p>
        </td>
        <td>
            <p><input type='number' name='lrn' class='kd1' style='border:0' value='".$row['student_lrn']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>

        </td>
        <td>
            <p><input type='number' name='lrn' class='kd1' style='border:0' value='".$row['student_lrn']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>

        </td>
        <td align='center'>
            <p><input type='text' size='5' class='result1' style='border:0' disabled></p> 
        </td>
    </tr>
    <tr>
        <td>
            <p>AS 6</p>
        </td>
        <td>
            <p>Entrepreneurship</p>
        </td>
        <td>
            <p><input type='number' name='lrn' class='kd1' style='border:0' value='".$row['student_lrn']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>

        </td>
        <td>
            <p><input type='number' name='lrn' class='kd1' style='border:0' value='".$row['student_lrn']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>

        </td>
        <td align='center'>
            <p><input type='text' size='5' class='result1' style='border:0' disabled></p> 
        </td>
    </tr>

    <tr>
        <td>
            <p>ABMS 5</p>
        </td>
        <td>
            <p>Fundamentals of Accountancy, Business and Management 2</p>
        </td>
        <td>
            <p><input type='number' name='lrn' class='kd1' style='border:0' value='".$row['student_lrn']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>

        </td>
        <td>
            <p><input type='number' name='lrn' class='kd1' style='border:0' value='".$row['student_lrn']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>

        </td>
        <td align='center'>
            <p><input type='text' size='5' class='result1' style='border:0' disabled></p> 
        </td>
    </tr>

    <tr>
        <td>
            <p>ABMS 6</p>
        </td>
        <td>
            <p>Business Finance</p>
        </td>
        <td>
            <p><input type='number' name='lrn' class='kd1' style='border:0' value='".$row['student_lrn']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>

        </td>
        <td>
            <p><input type='number' name='lrn' class='kd1' style='border:0' value='".$row['student_lrn']."' oninput='javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'maxlength = '3' autocomplete='off'></p>

        </td>
        <td align='center'>
            <p><input type='text' size='5' class='result1' style='border:0' disabled></p> 
        </td>
        
    </tr>

    <tr>
        <td>
            <p></p>
        </td>
        <td>
            <p align='right'>Average for the semester</p>
        </td>
        <td>
            <p><input type='text' size='5' class='ave1' style='border:0' disabled></p> 
        </td>
        <td>
            <p><input type='text' size='5' class='ave1' style='border:0' disabled></p> 
        </td>
        <td>
        <p><input type='text' size='5' class='ave' style='border:0' disabled></p> 
        </td>
    </tr>
    </table>
    
</table>


<!-----Sample--->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
  $(document).on("input", ".kd1", function() {
    $('table tr').each(function() {
      // variables for holding total and count
      var total = 0,
        count = 0;

      // get all input fields and iterate over them
      $('.kd1', this).each(function() {
        // check the value is non-empty
        if (this.value.trim() != '') {
          // increment count for calculating average
          count++;
          // update total based on input value
          // treat input value as 0 if number parsing produces NaN
          total += (Number(this.value.trim()) || 0);
            
        }
      });
      // calculate and update the average although treat as zero if NaN
      total.toFixed(); 
      $('.result1', this).val(total / count || 0);
      
    });
  });

});


$(document).ready(function() {
  $(document).on("input", ".result1", function() {
    $('table tr').each(function() {
      // variables for holding total and count
      var total = 0,
        count = 0;

      // get all input fields and iterate over them
      $('.result1', this).each(function() {
        // check the value is non-empty
        if (this.value.trim() != '') {
          // increment count for calculating average
          count++;
          // update total based on input value
          // treat input value as 0 if number parsing produces NaN
          total += (Number(this.value.trim()) || 0);
            
        }
      });
      // calculate and update the average although treat as zero if NaN
      total.toFixed(); 
      $('.ave', this).val(total / count || 0);
      
    });
  });

});
</script>

</html>
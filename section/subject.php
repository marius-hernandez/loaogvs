<body style="text-align: center;">
<?php
session_start();
include_once "../include/dbh.inc.php";
$name= mysqli_real_escape_string($conn, $_GET['name']);
$grade= mysqli_real_escape_string($conn, $_GET['grade']);
$track= mysqli_real_escape_string($conn, $_GET['track']);
$strand= mysqli_real_escape_string($conn, $_GET['strand']);
 ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>



<table style="margin: 50px">
    <tr>
                <h1>Add Subject</h1>
                <h3>Please input the exact name in the grade sheet of Section <?php echo $name; ?></h3>
       
        <td colspan='2'><h1 style="text-align: center">1st Semester</h1></td>
        <td colspan='2'><h1 style="text-align: center">2nd Semester</h1></td>
        </tr>
   
        <td>
        <form name="add_name" id="add_name">
            <h5>Core Subjects</h5>
            <div class="form-group">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dynamic_field">
                        <tr>
            <td>
                <select name="code[]" placeholder="Code" id="core1">
                <option>21st Century Literature from the Philippines and the World</option>
                <option>Media and Information Literacy</option>
                <option>CS3</option>
                <option>CS4</option>
                <option>CS5</option>
                </select>
                <input type value disabled name="a1name[]" placeholder="Code" class="form-control name_list"/>
            
            </td>                            
            <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                        </tr>
                    </table>
                </div>
            
        </div>
        </td>

        <td>
        <h5>Applied and Specialized Subject</h5>
                <div class="form-group">
				
					<div class="table-responsive">
						<table class="table table-bordered" id="dynamic_field1">
							<tr>
								<td><input type="text" name="code[]" placeholder="Code" id="app1"><input type="text" name="a1name[]" placeholder="Subject" class="form-control name_list" /></td>
								<td><button type="button" name="add" id="add1" class="btn btn-success">Add More</button></td>
							</tr>
						</table>
					</div>
			</div>
        </td>
        <td>
            <h5>Core Subjects</h5>
            <div class="form-group">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dynamic_field2">
                        <tr>
                            <td><input type="text" name="code[]" placeholder="Code" id="core2"><input type="text" name="c2name[]" placeholder="Subject" class="form-control name_list" /></td>
                            <td><button type="button" name="add" id="add2" class="btn btn-success">Add More</button></td>
                        </tr>
                    </table>
                </div>
        </div>
        </td>

        <td>
        <h5>Applied and Specialized Subject</h5>
                <div class="form-group">
					<div class="table-responsive">
						<table class="table table-bordered" id="dynamic_field3">
							<tr>
								<td><input type="text" name="code[]" placeholder="Code" id="app2"><input type="text" name="a2name[]" placeholder="Subject" class="form-control name_list" /></td>
								<td><button type="button" name="add" id="add3" class="btn btn-success">Add More</button></td>
							</tr>
						</table>
					</div>
				
			</div>
        </td>
    </tr>
    <tr>
        <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />
        </form>
    </tr>


</table>

</body>


<script>
$(document).ready(function(){
	var i=1;
	$('#add').click(function(){
		i++;
		$('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="code[] id="core1" placeholder="Code"><input type="text" name="name[]" placeholder="Subject" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
    });
    $('#add1').click(function(){
		i++;
        $('#dynamic_field1').append('<tr id="row'+i+'"><td><input type="text" name="code[] id="app1"" placeholder="Code"><input type="text" name="a1name[]" placeholder="Subject" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
    });
    $('#add2').click(function(){
		i++;
        $('#dynamic_field2').append('<tr id="row'+i+'"><td><input type="text" name="code[] id="core2"" placeholder="Code"><input type="text" name="c2name[]" placeholder="Subject" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
    });
    $('#add3').click(function(){
		i++;
        $('#dynamic_field3').append('<tr id="row'+i+'"><td><input type="text" name="code[] id="app2"" placeholder="Code"><input type="text" name="a2name[]" placeholder="Subject" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
    });
	
	$(document).on('click', '.btn_remove', function(){
		var button_id = $(this).attr("id"); 
		$('#row'+button_id+'').remove();
	});
    
	
	$('#submit').click(function(){		
            $.ajax({
			url:"include/subject.inc.php",
			method:"POST",
			data:$('#add_name').serialize(),
			success:function(data)
			{
				alert(data);
				$('#add_name')[0].reset();
			}
		});
        
	});
	
});
</script>
</html>
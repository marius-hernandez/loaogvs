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
    
</head>

<script>
    $(document).ready(function(){
        $("#ssearch").keyup(function(){
            $.ajax({
                url: 'verti-header.php?name=s-search',
                type: 'POST',
                data: {ssearch: $(this).val()},
                success: function(sresult){
                    $("#sresult").html(sresult);
                }
            });
        });
        
    });

</script>

<style>
body{
    background-color: #f4fcff;
}
.container{
    text-align: center;
    width: 50%;
}
.result{
    property: none;
}
input{
    max-width: 250px;
}
a:hover{
    text-decoration: none;

}

@media screen and (max-width: 600px) {
    input{
        width: 100px;
    }
}
</style>
<body>
    <div class="container">
    <input type="text" name="ssearch" placeholder="Search" id="ssearch" autocomplete="off">
    <button type="submit" name="submit-search" class='btn btn-warning'>Search</button>
    <span id="sresult"></span>
    <br>
   
    </div>

    

</body>
<script src="js/main.js"></script>
</html>
<?php
require_once('dbconfig.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shawn Mbuvi - MongoDB Crud Ops</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />    
    <link rel="stylesheet" type="text/css" href="css/custom_style.css" />
</head>
<body>

<div class="container form-center">
<?php
     require("header.php");  
    ?>  
    <br/><br/> <br/> 

    <h2>Register User before login</h2>   

    <div class="form-center">
        <br/>        
            <div class="row" id="register_feedback" style="text-align: center;" ></div>  
        <br/> 

        <form  action ="#" id="form_register"  >
            <input type="hidden"  name="_register_user"  id="_register_user" value="1" />            
            <div class="form-group">
                <label>First Name</label>  
                <input type="text" name="fname" id="fname" class="form-control" /> 
            </div>
            <br /> 
                
            <div class="form-group">
                <label>Last Name</label>  
                <input type="text" name="lname" id="lname" class="form-control" />  
            </div>
            <br /> 

            <div class="form-group">
                <label>Email</label>  
                <input type="email" name="email" id="email" class="form-control" />  
            </div>
            <br /> 

            <div class="form-group">
                <label>Password</label>  
                <input type="password" name="password1" id="password1" class="form-control" /> 
            </div> 
            <br /> 

            <div class="form-group">
                <label>Confirm Password</label>  
                <input type="password" name="cpassword" id="cpassword" class="form-control" /> 
            </div> 
            <br /> 

            <div class="form-group"> 
                <input type="button" name="submit_user" id="submit_user" class="btn btn-info" value="Register" />  
            </div>
        </form>

      
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="js/functions.js"></script>
</body>
</html>
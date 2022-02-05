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

    <h2>Login</h2>   

    <div class="form-center">
        <br/>        
            <div class="row" id="login_feedback" style="text-align: center;" ></div>  
        <br/> 

        <!-- <form name="form1" method="post"action="<?=$_SERVER["PHP_SELF"]; ?>"> -->

        <form  action ="login_action.php" id="form_login" method="post"  >
            <input type="hidden"  name="_login_user"  id="_login_user" value="1" /> 

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
                <input type="submit" name="login_user" id="login_user" class="btn btn-info" value="Login" />  
            </div>
        </form>

      
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="js/functions.js"></script>
</body>
</html>
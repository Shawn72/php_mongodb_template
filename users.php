<?php
require_once('dbconfig.php');

$flag    = isset($_GET['flag'])?intval($_GET['flag']):0;
$message ='';
if($flag){
  $message = $messages[$flag];
}

$filter = [];
$options = [
    'sort' => ['_id' => 1], //1: asc order, -1: desc order
];

$query = new MongoDB\Driver\Query($filter, $options);
$dbcon = $connectmanager->executeQuery('ecommercestore.users', $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shawn Mbuvi - MongoDB Crud Ops</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/custom_style.css" />
</head>
<body>

    <div class="container"> 
    <?php
        require("header.php");  
    ?>  
    <br/><br/> <br/>        
        <div class="row">
            <div class="span12">
                <div class="mini-layout">                  

                    <h3>Users List</h3>
                    <p>
                      <?php if($flag == 2 || $flag == 5){ ?>
                        <div class="alert alert-danger"><?php echo $message; ?></div>
                      <?php  } elseif($flag && $flag != 2 ){ ?>
                        <div class="alert alert-success"><?php echo $message; ?></div>
                      <?php  } ?>
                    </p>
                    <table class='table table-bordered'>
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Firstname</th>
                          <th>Lastname</th>
                          <th>Email</th>
                          <th>Action</th>
                        </tr>
                     </thead>
                    <?php 
                    $i =1; 
                    foreach ($dbcon as $document) { ?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $document->firstname;  ?></td>
                        <td><?php echo $document->lastname;  ?></td>
                        <td><?php echo $document->email;  ?></td>
                        <td><a onClick ='return confirm("Delete this user?");' href='delete_user.php?id=<?php echo $document->_id; ?>'>Delete</td>
                      </tr>
                   <?php $i++;  
                    } 
                  ?>
                    </table>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="js/functions.js"></script>
</body>
</html>
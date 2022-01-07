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
$dbcon = $connectmanager->executeQuery('ecommercestore.products', $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shawn Mbuvi - MongoDB Crud Ops</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="logo">
                <h3>
                  PHP MongoDB CRUD Ops Template
                </h3>
            </div>
        </div>
        <div class="row">
            <div class="span12">
                <div class="mini-layout">
                   <form id="form1" name='form1' action="insert_record.php" method="post">
                   <input type='hidden' name='id' id='id' value="" />
                    <table>
                      <tr>
                        <td><input type='text' name='product_name' id='product_name' placeholder="Product Name" /></td>                       
                        <td><input type='text' name='description' id='description' placeholder="Description" /></td>
                        <td><input type='text' name='price' id='price' placeholder="Price" /></td>
                        <td>
                            <select name='category' id='category' class='form-control'  >
                                <option value="">---select category--- </option>
                                <option value="Shampoo">Shampoo</option>
                                <option value="Conditioner">Conditioner </option>
                                <option value="Scrub">Scrub</option>
                            </select>
                            <!-- <input type='text' name='category' id='category' placeholder="Category" /> -->
                       </td>                        
                      </tr>
                      <tr><td><input class='btn' type='submit' name='btn' id='btn' value="Add Record" /></td></tr>
                    </table>
                   </form>
                    <h3>Products List</h3>
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
                          <th>Product</th>
                          <th>Description</th>
                          <th>Price</th>
                          <th>Category</th>
                          <th>Action</th>
                        </tr>
                     </thead>
                    <?php 
                    $i =1; 
                    foreach ($dbcon as $document) { ?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $document->product_name;  ?></td>
                        <td><?php echo $document->description;  ?></td>
                        <td><?php echo $document->price;  ?></td>
                        <td><?php echo $document->category;  ?></td>
                        <td><a class='editlink' data-id=<?php echo $document->_id; ?> href='javascript:void(0)'>Edit</a> |
                          <a onClick ='return confirm("Delete this record?");' href='delete_record.php?id=<?php echo $document->_id; ?>'>Delete</td>
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
<script src="js/functions.js"></script>
</body>
</html>
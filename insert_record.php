<?php
  require_once('dbconfig.php');
  //initialize variables
  $product_name = '';
  $description = '';
  $price        = 0;
  $category     = '';
  $flag         = 0; //flag to get correct display messages

  if(isset($_POST['btn'])){
      $product_name = $_POST['product_name'];
      $description  = $_POST['description'];
      $price        = $_POST['price'];
      $category     = $_POST['category'];

      if(!$product_name || !$price || !$category || !$description){
        $flag = 5; //null values error
      }else{
          $insRec       = new MongoDB\Driver\BulkWrite;
          //insert record to MongoDB
          $insRec->insert(
              [
                'product_name' =>$product_name, 
                'description' =>$description,
                'price'=>$price, 
                'category'=>$category
            ]);
          $writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 1000);

          //get write feedback, success or error
          $answer       = $connectmanager->executeBulkWrite('ecommercestore.products', $insRec, $writeConcern);
         
          //process correct feedback based on insert results
          if($answer->getInsertedCount()){
            $flag = 3;
          }else{
            $flag = 2;
          }
      }
  }
  header("Location: index.php?flag=$flag");
  exit;

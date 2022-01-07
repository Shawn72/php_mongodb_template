<?php
  require_once('dbconfig.php');
  $product_name = '';
  $description = '';
  $price        = 0;
  $category     = '';
  $flag         = 0;
  if(isset($_POST['btn'])){
      $product_name = $_POST['product_name'];
      $description  = $_POST['description'];
      $price        = $_POST['price'];     
      $category     = $_POST['category'];
      $id           = $_POST['id'];

      if(!$product_name || !$price || !$category || !$id ||!$description){
        $flag = 5; //null value detected
      }else{
          $insRec       = new MongoDB\Driver\BulkWrite;
          $insRec->update(['_id'=>new MongoDB\BSON\ObjectID($id)],
          ['$set' =>[
              'product_name' =>$product_name, 
              'description'  =>$description, 
              'price'=>$price,
              'category'=>$category
          ]], 
          ['multi' => false, 'upsert' => false]);

          $writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 1000);
          $result       = $connectmanager->executeBulkWrite('ecommercestore.products', $insRec, $writeConcern);
          
          if($result->getModifiedCount()){
            $flag = 3;
          }else{
            $flag = 2;
          }
      }
  }
  header("Location: index.php?flag=$flag");
  exit;

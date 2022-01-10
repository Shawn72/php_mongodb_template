<?php
  require_once('dbconfig.php');
  $id   = $_GET['id'];
  $flag = 0;
  if($id){
    $delRec = new MongoDB\Driver\BulkWrite;
    $delRec->delete(['_id' =>new MongoDB\BSON\ObjectID($id)], ['limit' => 1]);
    $writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 1000);
    $result       = $connectmanager->executeBulkWrite('ecommercestore.users', $delRec, $writeConcern);
    if($result->getDeletedCount()){
      $flag = 1;
    }else{
      $flag = 2;
    }
    header("Location: users.php?flag=$flag");
    exit;

  }
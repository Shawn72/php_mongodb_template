<?php
//create fetch data API
require_once('dbconfig.php');
$id    = $_GET['id'];
$result = array();
if($id){
  $filter = ['_id' => new MongoDB\BSON\ObjectID($id)];
  $options = [   'projection' => ['_id' => 0], ];
  $query = new MongoDB\Driver\Query($filter,$options);
  $datarow = $connectmanager->executeQuery('ecommercestore.products', $query);
  foreach($datarow as $row){
    $result ['product_name'] = $row->product_name;
    $result ['description'] = $row->description;
    $result ['price']        = $row->price;
    $result ['category']     = $row->category;
    $result ['id']           = $id;
  }
  //api returns json
  echo json_encode($result);
}

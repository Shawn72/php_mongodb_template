<?php
require_once('dbconfig.php');

 $email = "shawnmbuvi@gmail.com";
 $filter = [ 'email' => $email ];
 $result = array();
 $options = [   'projection' => ['_id' => 0]  ];
 $querycheckuser = new \MongoDB\Driver\Query($filter, $options);    
 $cursor = $connectmanager->executeQuery('ecommercestore.users', $querycheckuser);

$cursorArray =  $cursor->toArray();
if(isset($cursorArray[0])) {
//  var_dump($cursorArray[0]);

  echo "Email: ".$cursorArray[0]->email." ";
  echo "Firstname: ".$cursorArray[0]->firstname." ";
  echo "Lastname: ".$cursorArray[0]->lastname." "; 
}
else
{
   echo "email not found!, add record"; 
}

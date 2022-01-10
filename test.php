<?php
require_once('dbconfig.php');

 $email = "shawnmbuvi@gmail.com";
 $filter = [ 'email' => $email ];
 $options = [   'projection' => ['_id' => 0]  ];
 $querycheckuser = new \MongoDB\Driver\Query($filter, $options);    
 $cursor = $connectmanager->executeQuery('ecommercestore.users', $querycheckuser);

 $cursorArray = $cursor->toArray();
 if(!empty($cursor)) {
     echo "email found!";
 }
 else{
    echo "email not found!";
 }
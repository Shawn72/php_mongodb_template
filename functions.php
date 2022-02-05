<?php
session_start();
//error_reporting(E_ALL ^ E_WARNING);
//Tell PHP to log errors
ini_set('log_errors', 'On');
//Tell PHP to not display errors
ini_set('display_errors', 'Off');
//Set error_reporting to E_ALL
ini_set('error_reporting', E_ALL );

require_once('dbconfig.php');

#start: add new user
if(isset($_POST["_register_user"])==1){
    $firstname = stripslashes($_POST['fname']);
    $lastname = stripslashes($_POST['lname']);
    $email = stripslashes($_POST['email']);  
    $password = md5( trim( $_POST['cpassword'] ) );

    //check if user exist  
    $filter = [ 'email' => $email ];
    $options = [   'projection' => ['_id' => 0],  ];
    $querycheckuser = new \MongoDB\Driver\Query($filter, $options);    
    $cursor = $connectmanager->executeQuery('ecommercestore.users', $querycheckuser);

    $cursorArray = $cursor->toArray();
    if(isset($cursorArray[0])) {
    //  var_dump($cursorArray[0]);
    //  echo "email found, pick another one ";
     echo 'user_exist';
    }
    else
    {
       echo "email not found!, add record";  
       #now insert, user not there
       $insRec       = new MongoDB\Driver\BulkWrite;
       //insert record to MongoDB    
       $insRec->insert(
           [
             'firstname' =>$firstname, 
             'lastname' =>$lastname,
             'email'=>$email, 
             'password'=>$password
         ]);
   
       $writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 1000);
   
       //get write feedback, success or error
       $answer  = $connectmanager->executeBulkWrite('ecommercestore.users', $insRec, $writeConcern);
   
       //process correct feedback based on insert results
       if($answer->getInsertedCount()){
          echo "insert_success"; 
       }else{
           echo "insert_failure";
        }
    }
}



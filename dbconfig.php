<?php
//error set ups
ini_set('display_errors','true');
error_reporting(E_ALL);

//message arrays
$messages = array(
	1=>'Record deleted successfully!',
	2=>'Error occured. Please try again.', 
	3=>'Record saved successfully.',
    4=>'Record updated successfully.', 
    5=>'Provide all the required fields.' 
);

//database name
$mongoDbname  =  'ecommercestore'; 

//database table
$mongoTblName =  'products'; //collection name

//connection to mongo database server
$connectmanager     =   new MongoDB\Driver\Manager("mongodb://localhost:27017");

?>
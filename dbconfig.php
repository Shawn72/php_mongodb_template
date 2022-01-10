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
    5=>'Provide all the required fields.' ,
    6=>'User registered successfully!' ,
    7=>'Password mismatch!' 
);

//database name
$mongoDbname  =  'ecommercestore'; 

//database table
$mongoTblName =  'products'; //collection name

#connection to mongo database server
#Atlas cloud connection
# mongosh "mongodb+srv://cluster0.k12xz.mongodb.net/ecommercestore" --username shawn72
 //$connectmanager  =  new MongoDB\Driver\Manager("mongodb+srv://shawn72:2950Cherry*30@cluster0.k12xz.mongodb.net/ecommercestore?retryWrites=true&w=majority");

 #localhost connection
$connectmanager =  new MongoDB\Driver\Manager("mongodb://localhost:27017");

?>
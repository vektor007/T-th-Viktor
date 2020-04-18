<?php 

$db['db_host'] = "localhost:3306";
$db['db_user'] = "vt.dev.ederit.com";
$db['db_pass'] = "63fuliOyYXDJQBoj";
$db['db_name'] = "vt.dev.ederit.com";

foreach($db as $key => $value){
	
	define (strtoupper($key), $value);
	
	}


$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

//if($connection){
//        echo "We are connected";
//	 }
//else{
//	echo "You are not connected";
//}

?>
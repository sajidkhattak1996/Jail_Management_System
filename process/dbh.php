<?php

$servername = "localhost";
$dBUsername = "root";
$dbPassword = "";
$dBName = "370project";

$conn = mysqli_connect($servername, $dBUsername, $dbPassword, $dBName);

if(!$conn){
	echo "Databese Connection Failed";
}

// if ($conn -> connect_errno) {
// 	echo "Failed to connect to MySQL Server: " . $mysqli -> connect_error;
// 	exit();
//   }


?>
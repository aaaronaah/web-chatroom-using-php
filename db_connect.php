<?php 

$servername = "localhost";
$username = "root";
$password = "";
$database = "mychatroom";

//database connection
$conn = mysqli_connect($servername, $username, $password, $database);

//check connection
if (!$conn) {
	die("Failed to connect!".mysqli_connect_error());
}

?>
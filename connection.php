<?php
$servername = "localhost";
$username = "root";
$password = "";
$DB="qa_application";	

// Create connection
$conn = new mysqli($servername, $username, $password,$DB);

// Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

if(!isset($_SESSION)){
    session_start();
}
	
?>	

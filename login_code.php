<?php
include_once("connection.php");
if (isset($_POST['login'])){
	$email = $_POST['email'];
	$password = $_POST['password'];
	$password = hash("sha256",$password);

	if (empty($email) || empty($password)) {
		header("location:login.php?login=Please Fill The Blanks");
	}else{
		$login = "SELECT * FROM users WHERE email='$email' AND password='$password' limit 0,1"; 
		$sql = mysqli_query($conn , $login);
		$count = mysqli_num_rows($sql);
		$data = mysqli_fetch_array($sql);
		if ($count > 0) {
			$status = "Active now";
			$sql2 = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$data['unique_id']}");
			session_start();
			$_SESSION['unique_id'] = $data['unique_id'];
			$_SESSION['name'] = $email;
			$_SESSION['record'] = $data['record_id'];
			header("location:dashboard.php");
		}
		else{
			header("location:login.php?login=fail");
			
		}
	}
}
?>
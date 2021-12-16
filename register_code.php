 <?php
	include_once("connection.php");
	$name=  $_POST['name'];
	$phone= $_POST['phone'];
	$Email= $_POST['email'];

 	$role = 2;

	if(isset($_POST['type'])){
		$role = $_POST['type'];
	}

	$password= $_POST['password'];	

	if (empty($name) || empty($phone) || empty($Email) || empty($password)) {
		header("location:register.php?faild=Please Fill The Blanks");
	}else{

		$password = hash('sha256', $password);
		$sql = "INSERT INTO client_info(fall_name,phone) VALUES ('$name','$phone');";
		$run = mysqli_query($conn,$sql);

		if($run){
			$select = mysqli_query($conn, "SELECT cl_id FROM client_info WHERE phone = '$phone' limit 0,1");
			$row = mysqli_fetch_row($select);
			$id = $row[0];

			$ran_id = rand(time(), 100000000);
			$status = "Active now";

			$sql2 = "INSERT INTO users(unique_id,email,password,role, record_id,status) VALUES ('$ran_id','$Email','$password','$role','$id','$status');";
			$run2 = mysqli_query($conn,$sql2);

			if($run && run2){
				echo "inserted";
				header("location: login.php");
			}
			else{
				echo mysqli_error($conn);
			}
		}
	}
?> 
<?php
    require("connection.php");
    if (isset($_POST['profile_btn'])){
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $client_id = $_POST['client_id'];
		$file_name = '';
		
		if($_FILES['photo'] != ''){
            $type = $_FILES['photo']['type'];
			$tmp = $_FILES['photo']['tmp_name'];
        	$file_name = time() . $_FILES['photo']['name'];
        	move_uploaded_file($tmp, "images/$file_name");
		}else{
            $file_name = 'user_default.jpg';
        }
        
        $update = "UPDATE client_info SET fall_name='$name',phone='$phone',photo = '$file_name' WHERE cl_id='$client_id'";
        $sql_up = mysqli_query($conn, $update);

        if($sql_up === TRUE){
            header("location: dashboard.php");
        }
        else{
            echo mysqli_error($conn);
        }
    }

	if (isset($_POST['email-btn'])){
        $email = $_POST['email'];
        $user_id = $_POST['id'];
        $email_update = "UPDATE users SET email = '$email' WHERE id='$user_id'";
        $sql_up = mysqli_query($conn, $email_update);

        if($sql_up === TRUE){
            session_start();
            session_destroy();
            header("location:dashboard.php");
        }
        else{
            echo mysqli_error($conn);
        }
    }

	if (isset($_POST['change_pass'])){
        $old_pass = $_POST['old_pass'];
        $new_pass = $_POST['new_pass'];
        $conf_pass = $_POST['conf_pass'];  
		$user_id = $_POST['user_id'];
		
		if($new_pass == $conf_pass){
			$query = "SELECT * FROM users WHERE id = '$user_id' LIMIT 0,1";
			$run = mysqli_query($conn, $query);
			$data = mysqli_fetch_array($run);
			$db_pass = $data['password'];
			$old_pass = hash("sha256",$old_pass);
			if($db_pass == $old_pass){
				$new_pass = hash("sha256", $new_pass);
				$pass_update = "UPDATE users SET password = '$new_pass' WHERE id='$user_id'";
        		$sql_up = mysqli_query($conn, $pass_update);
				if($sql_up === TRUE){
					header("location:dashboard.php");
				}
				else{
					echo mysqli_error($conn);
				}
			}else{
				header('location: dashboard.php');
			}
		}else{
			
		}
    }


?>
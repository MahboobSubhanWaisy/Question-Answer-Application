<?php
    require('connection.php');
	if (isset($_POST['update-company'])){
        $id = $_GET['id'];
		$name = $_POST['company-name'];
        $founded = $_POST['founded-in'];
        $description = $_POST['description'];
        $status = $_POST['status'];
        $website = $_POST['website'];
        $bio = $_POST['bio'];
        $location = $_POST['location'];
	

        $select = mysqli_query($conn, 'SELECT path FROM companies WHERE id = "'.$id.'"');
        $data = mysqli_fetch_array($select);

        if($_FILES["photo"]["name"] != ""){
            $path = time() . $_FILES["photo"]["name"];
            $old = $data['path'];
            unlink('images/' . $old);
            move_uploaded_file($_FILES["photo"]["tmp_name"], "images/$path");
        }
        else{
            $path = $data['path'];
        }

		$sql = "UPDATE companies SET name = '$name', bio = '$bio', website ='$website', founded_in='$founded',description='$description',location='$location',status='$status', path = '$path' WHERE id = '$id' ";
		$run = mysqli_query($conn,$sql);

		if($run){
			echo "inserted";
			header("location:companies.php");
		}
		else{
			echo mysqli_error($conn);
		}	
	}
?>
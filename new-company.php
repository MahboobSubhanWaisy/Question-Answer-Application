<?php
  	require('connection.php');
	if(isset($_SESSION['name'])){
	ob_start();
?>

<?php
    ob_start();
?>
<?php
 ob_start();
?>

<link rel="stylesheet" href="css/jquery-te-1.4.0.css">
<link rel="stylesheet" href="css/selectize.css">
<link rel="stylesheet" href="custom.css">

<?php
	$styles = ob_get_contents();
	ob_end_clean();
?>

<?php
	if (isset($_POST['add-company'])){

        $user_email = $_SESSION['name'];
		$name = $_POST['company-name'];
        $founded = $_POST['founded-in'];
        $description = $_POST['description'];
        $status = $_POST['status'];
        $website = $_POST['website'];
        $bio = $_POST['bio'];
        $location = $_POST['location'];
	
		$tmp = $_FILES['photo']['tmp_name'];
        $file_name = time().$_FILES['photo']['name'];
        move_uploaded_file($tmp, "images/$file_name");

		$sql = "INSERT INTO companies(name, bio, website,founded_in, description, location, status, path, user_email) VALUES ('$name', '$bio', '$website', '$founded', '$description', '$location', '$status', '$file_name', '$user_email');";
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

<div class="d-flex justify-content-center">
    <div class="col-md-8 custom-container" style="border: 3px solid #007bff; padding: 2rem; margin: 4rem 0px;">
        <h5 class="text-primary font-weight-bold">New Company</h5>
        <hr>
        <form method="post" action="new-company.php" enctype="multipart/form-data" class="card-body">
            <div class="col-md-12 row">

                <div class="col-md-6 input-box">
                    <label class="fs-14 text-black fw-medium mb-0">Company Name</label>
                    <div class="form-group">
                        <input class="form-control form--control" type="text" id="company-name" name="company-name" placeholder="Company Name">
                        <h6 id="company-name-error" class="error_message">
                            Enter Company Name.
                        </h6>
                    </div>
                </div>

                <div class="col-md-6 input-box">
                    <label class="fs-14 text-black fw-medium mb-0">Founded In</label>
                    <div class="form-group">
                        <input class="form-control form--control" type="number" id="founded" name="founded-in" placeholder="Founded In" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxLength="4">
                        <h6 id="founded-error" class="error_message">
                            Enter Founded Year.
                        </h6>
                    </div>
                </div>

                <div class="col-md-6 input-box">
                    <label class="fs-14 text-black fw-medium mb-0">Description</label>
                    <div class="form-group">
                        <input class="form-control form--control" type="text" id="des" name="description" placeholder="Description">
                        <h6 id="des-error" class="error_message">
                            Enter Description.
                        </h6>
                    </div>
                </div>

                <div class="col-md-6 input-box">
                    <label class="fs-14 text-black fw-medium mb-0">Select Status</label>
                    <div class="form-group">
                        <select class="select-container select--container" id="status" name="status" data-placeholder="Select a Status">
                            <option value="">Select Status</option>
                            <option value="1">Government</option>
                            <option value="2">Private</option>
                        </select>
                        <h6 id="status-error" class="error_message">
                            Select Status.
                        </h6>
                    </div>
                </div>

                <div class="col-md-6 input-box">
                    <label class="fs-14 text-black fw-medium mb-0">Website Link</label>
                    <div class="form-group">
                        <input class="form-control form--control" type="text" id="website" name="website" placeholder="Website Link">
                        <h6 id="website-error" class="error_message">
                            Enter Website Link.
                        </h6>
                    </div>
                </div>

                <div class="col-md-6 input-box">
                    <label class="fs-14 text-black fw-medium mb-0">Location</label>
                    <div class="form-group">
                        <input class="form-control form--control" type="text" id="location" name="location" placeholder="Location">
                        <h6 id="location-error" class="error_message">
                            Enter Location.
                        </h6>
                    </div>
                </div>

                <div class="col-md-12 input-box">
                    <label class="fs-14 text-black fw-medium">Company Logo</label>
                    <div class="form-group">
                        <div class="file-upload-wrap file-upload-layout-2">
                            <input type="file" name="photo" class="file-upload-input">
                            <span class="file-upload-text d-flex align-items-center justify-content-center"><i class="la la-cloud-upload mr-2 fs-24"></i>Drop files Company Photo Here.</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="input-box">
                        <label class="fs-14 text-black fw-medium mb-0">Company Bio</label>
                        <div class="form-group">
                            <textarea class="form-control form--control user-text-editor" name="bio" rows="10" cols="40"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="btn-box">
                <input type="submit" value="Add Company" name="add-company" id="add-company" class="btn btn-primary ml-3 mt-2">
            </div>
        </form>
    </div>
</div>

<?php
 ob_start();
?>

<script src="js/jquery-te-1.4.0.min.js"></script>
<script src="js/selectize.min.js"></script>
<script src="js/jquery.multi-file.min.js"></script>
<script src="validation/company.js"></script>

<?php
	$scripts = ob_get_contents();
	ob_end_clean();
?>


<?php
	$dashboard = ob_get_contents();
	ob_end_clean();
	require("index.php"); 
?>

<?php }else{ header('location: login.php'); } ?>
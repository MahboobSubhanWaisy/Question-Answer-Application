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

<?php
	$styles = ob_get_contents();
	ob_end_clean();
?>

<?php 
    $com_id = $_GET['com_id'];
    $result = mysqli_query($conn,"SELECT * FROM companies WHERE id = '$com_id'");
    $row = mysqli_fetch_array($result);
?>

<div class="d-flex justify-content-center">
    <div class="col-md-8 custom-container" style="border: 3px solid #007bff; padding: 2rem; margin: 4rem 0px;">
        <h5 class="text-primary font-weight-bold">Edit Company</h5>
        <hr>
        <form method="post" action="update_company.php?id=<?php echo $_GET['com_id']; ?>" enctype="multipart/form-data" class="card-body">
            <div class="col-md-12 row">

                <div class="col-md-6 input-box">
                    <label class="fs-14 text-black fw-medium mb-0">Company Name</label>
                    <div class="form-group">
                        <input class="form-control form--control" type="text" name="company-name" value="<?php echo $row['name'];?>"placeholder="Company Name">
                    </div>
                </div>

                <div class="col-md-6 input-box">
                    <label class="fs-14 text-black fw-medium mb-0">Founded In</label>
                    <div class="form-group">
                        <input class="form-control form--control" type="number" name="founded-in" value="<?php echo $row['founded_in'];?>"placeholder="Founded In">
                    </div>
                </div>

                <div class="col-md-6 input-box">
                    <label class="fs-14 text-black fw-medium mb-0">Description</label>
                    <div class="form-group">
                        <input class="form-control form--control" type="text" name="description" value="<?php echo $row['description'];?>"placeholder="Description">
                    </div>
                </div>

                <div class="col-md-6 input-box">
                    <label class="fs-14 text-black fw-medium mb-0">Select Status</label>
                    <div class="form-group">
                        <select class="select-container select--container" name="status">
                            <option value="1" <?php if($row['status'] == 1){?> selected <?php }?>>Government</option>
                            <option value="2" <?php if($row['status'] == 2){?> selected <?php }?>>Private</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-6 input-box">
                    <label class="fs-14 text-black fw-medium mb-0">Website Link</label>
                    <div class="form-group">
                        <input class="form-control form--control" type="text" name="website" value="<?php echo $row['website'];?>"placeholder="Website Link">
                    </div>
                </div>

                <div class="col-md-6 input-box">
                    <label class="fs-14 text-black fw-medium mb-0">Location</label>
                    <div class="form-group">
                        <input class="form-control form--control" type="text" name="location" value="<?php echo $row['location'];?>"placeholder="Location">
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
                            <textarea class="form-control form--control user-text-editor" name="bio" rows="10" cols="40"><?php echo $row['bio']?></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="btn-box">
                <input type="submit" value="Edit Company" name="update-company" class="btn btn-primary ml-3 mt-2">
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
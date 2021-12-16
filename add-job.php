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
	if (isset($_POST['add-job'])){
        $comapny = $_GET['id'];
		$name = $_POST['job-name'];
        $Vacancy = $_POST['vacancy'];
        $salary = $_POST['salary'];
        $job_type = $_POST['job-type'];
        $time = $_POST['time'];
        $location = $_POST['location'];
        $gender = $_POST['gender'];
        $close_date = $_POST['close-date'];
        $duration = $_POST['duration'];
        $year = $_POST['years'];
        $contract_type = $_POST['contract-type'];
        $probation = $_POST['probation-period'];
        $nationality = $_POST['nationality'];
        $description = $_POST['description'];
        $submission = $_POST['submission'];

		$sql = "INSERT INTO job(job_name, number_vacancy, salary, job_type, Time, job_location, gender, company_id, closing_Date, contract_Duration, years_of_experience, contract_Type, probation_Period, nationality, job_description, submission) 
        VALUES ('$name','$Vacancy','$salary','$job_type','$time','$location','$gender','$comapny','$close_date','$duration','$year','$contract_type','$probation','$nationality', '$description', '$submission');";
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
    <div class="col-md-11" style="border: 3px solid #007bff; padding: 2rem; margin: 4rem 0px;">
        <h5 class="text-primary font-weight-bold">Announce New Job</h5>
        <hr>
        <form method="post" action="add-job.php?id=<?php echo $_GET['com_id']; ?>" class="card-body">
            <div class="col-md-12 row">
                <div class="col-md-4 input-box">
                    <label class="fs-14 text-black fw-medium mb-0">Job Name</label>
                    <div class="form-group">
                        <input class="form-control form--control" type="text" name="job-name" placeholder="Job Name">
                    </div>
                </div>

                <div class="col-md-4 input-box">
                    <label class="fs-14 text-black fw-medium mb-0">Select Vacancy Number</label>
                    <div class="form-group">
                        <select class="select-container select--container" name="vacancy">
                            <option value="" hidden selected>Select Vacancy Number</option>
                            <?php for($i = 1; $i <= 20; $i++){ ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?> Vacancy</option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="col-md-4 input-box">
                    <label class="fs-14 text-black fw-medium mb-0">Salary</label>
                    <div class="form-group">
                        <input class="form-control form--control" type="number" name="salary" placeholder="Salary">
                    </div>
                </div>

                <div class="col-md-4 input-box">
                    <label class="fs-14 text-black fw-medium mb-0">Select Job Type</label>
                    <div class="form-group">
                        <select class="select-container select--container" name="job-type">
                            <option value="" hidden selected>Select Job Type</option>
                            <option value="1">Government</option>
                            <option value="2">Private</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-4 input-box">
                    <label class="fs-14 text-black fw-medium mb-0">Select Time</label>
                    <div class="form-group">
                        <select class="select-container select--container" name="time">
                            <option value="" hidden selected>Select Time</option>
                            <option value="1">Full Time</option>
                            <option value="2">Part Time</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-4 input-box">
                    <label class="fs-14 text-black fw-medium mb-0">Job Location</label>
                    <div class="form-group">
                        <input class="form-control form--control" type="text" name="location" placeholder="Job Location">
                    </div>
                </div>

                <div class="col-md-4 input-box">
                    <label class="fs-14 text-black fw-medium mb-0">Select Gender</label>
                    <div class="form-group">
                        <select class="select-container select--container" name="gender">
                            <option value="" hidden selected>Select Gender</option>
                            <option value="1">Male</option>
                            <option value="2">Female</option>
                            <option value="3">Any</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-4 input-box">
                    <label class="fs-14 text-black fw-medium mb-0">Job Close Date</label>
                    <div class="form-group">
                        <input class="form-control form--control" type="date" name="close-date" placeholder="Job Close Date">
                    </div>
                </div>

                <div class="col-md-4 input-box">
                    <label class="fs-14 text-black fw-medium mb-0">Select Contract Duration</label>
                    <div class="form-group">
                        <select class="select-container select--container" name="duration">
                            <option value="" hidden selected>Select Contract Duration</option>
                            <?php for($i = 1; $i <= 12; $i++){ ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?> Months</option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="col-md-4 input-box">
                    <label class="fs-14 text-black fw-medium mb-0">Select Years of Experience</label>
                    <div class="form-group">
                        <select class="select-container select--container" name="years">
                            <option value="" hidden selected>Select Years of Experience</option>
                            <?php for($i = 1; $i <= 7; $i++){ ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?> Years</option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="col-md-4 input-box">
                    <label class="fs-14 text-black fw-medium mb-0">Select Contract Type</label>
                    <div class="form-group">
                        <select class="select-container select--container" name="contract-type">
                            <option value="" hidden selected>Select Contract Type</option>
                            <option value="1">Short Term</option>
                            <option value="2">Long Term</option>
                            <option value="3">Permanent</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-4 input-box">
                    <label class="fs-14 text-black fw-medium mb-0">Select Probation Period</label>
                    <div class="form-group">
                        <select class="select-container select--container" name="probation-period">
                            <option value="" hidden selected>Select Probation Period</option>
                            <?php for($i = 1; $i <= 5; $i++){ ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?> Months</option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="col-md-4 input-box">
                    <label class="fs-14 text-black fw-medium mb-0">Select Nationality</label>
                    <div class="form-group">
                        <select class="select-container select--container" name="nationality">
                            <option value="" hidden selected>Select Nationality</option>
                            <option value="1">Afghan</option>
                            <option value="2">Foreign</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6"></div>
                <div class="col-md-6">
                    <div class="input-box">
                        <label class="fs-14 text-black fw-medium mb-0">Job Description</label>
                        <div class="form-group">
                            <textarea class="form-control form--control user-text-editor" name="description" rows="10" cols="40"></textarea>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="input-box">
                        <label class="fs-14 text-black fw-medium mb-0">Submission Gideline</label>
                        <div class="form-group">
                            <textarea class="form-control form--control user-text-editor" name="submission" rows="10" cols="40"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="btn-box">
                <input type="submit" value="Add Job" name="add-job" class="btn btn-primary ml-3 mt-2">
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
<?php
  	require('connection.php');
	if(isset($_SESSION['name'])){
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
	
	if (isset($_POST['submit'])){
		$Qu_title = $_POST['QuestionTitle'];
		$question = $_POST['Details'];
		$question_type = $_POST['Categorys'];
		
		$client_id = $_SESSION['record'];

		$tmp = $_FILES['photo']['tmp_name'];
        $file_name = time().$_FILES['photo']['name'];
        move_uploaded_file($tmp, "images/$file_name");

		$sql = "INSERT INTO questions(Qu_title,question,question_type,client_id,path) VALUES ('$Qu_title', '$question', '$question_type', '$client_id','$file_name');";
		$run = mysqli_query($conn,$sql);
		if($run){
			echo "inserted";
			header("location:questions.php");
		}
		else{
			echo mysqli_error($conn);
		}	
	}
?>

<!--======================================
        START HERO AREA
======================================-->
<section class="hero-area bg-white shadow-sm overflow-hidden">
	<span class="stroke-shape stroke-shape-1"></span>
	<span class="stroke-shape stroke-shape-2"></span>
	<span class="stroke-shape stroke-shape-3"></span>
	<span class="stroke-shape stroke-shape-4"></span>
	<span class="stroke-shape stroke-shape-5"></span>
	<span class="stroke-shape stroke-shape-6"></span>
	<div class="container">
		<div class="hero-content pt-80px pb-80px">
			<h2 class="section-title">Ask a public question</h2>
			<svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 550 125">
				<defs>
					<style>
						.cls-3,
						.cls-6,
						.cls-7 {
							fill: none;
							stroke-miterlimit: 10
						}

						.cls-3 {
							stroke: #3cb1c6
						}

						.cls-4 {
							fill: #fff
						}

						.cls-5 {
							fill: #f9b851
						}

						.cls-6 {
							stroke: #f48024
						}

						.cls-7 {
							stroke: #bbc0c4;
							stroke-dasharray: 5
						}

					</style>
				</defs>
				<g opacity=".5">
					<path fill="#cceaff" d="M232.73 73L217.5 92.89V73h-16V26h64v47H232.73z" />
					<path class="cls-3" d="M205 47V20.5h14.5M255.5 66.5h-18.51L221 86.06V66.5h-16V58M231.5 20.5H270v46h-6.5" />
					<path class="cls-4" d="M222.5 40.79v7.3l8.16 7.29 15.84-14.21V33.3l-15.84 14.31-8.16-6.82z" />
					<path class="cls-5" d="M374.36 76l-9.29 11.42-.26-11.42h-5.31V49h45v27h-30.14z" />
					<path class="cls-6" d="M379.5 46.5H402V55M402 62v11.5H372.02L363 84.92V73.5h-6v-27h11.5" />
					<path class="cls-4" d="M377.5 59h5v5h-5zM367.5 59h5v5h-5zM387.5 59h5v5h-5z" />
					<path class="cls-5" d="M180.25 67l5.16 6.77.14-6.77h2.95V51h-25v16h16.75z" />
					<path class="cls-6" d="M170.5 65.5h10.73l5.77 6.72V65.5h4V59M170.5 49.5H165V65M191 53v-3.5h-15.5" />
					<path class="cls-4" transform="rotate(-180 177 58.5)" d="M175.5 57h3v3h-3z" />
					<path class="cls-4" transform="rotate(-180 183 58.5)" d="M181.5 57h3v3h-3z" />
					<path class="cls-4" transform="rotate(-180 171 58.5)" d="M169.5 57h3v3h-3z" />
					<path class="cls-5" d="M486.95 77l15.55 19.89V77h16V30h-65v47H486.95z" />
					<path class="cls-6" d="M515 51V24.5h-14.5M464.5 70.5h18.51L499 90.06V70.5h16V62M488.5 24.5H450v46h6.5" />
					<path class="cls-4" d="M470.5 44.71V52l8.16 7.3 15.84-14.21v-7.87l-15.84 14.3-8.16-6.81z" />
					<path class="cls-3" d="M533.5 34.5h-2.14L527 40.34V34.5h-3v-12h4.5M545 30v5.5h-7.5M533.5 22.5H545V26M534 28.5h2v2h-2z" />
					<path class="cls-3" d="M529 28.5h2v2h-2zM539 28.5h2v2h-2zM280 30V16.5h7.5M305.5 39.5H296l-8 10v-10h-8V35M293.5 15.5H313v24h-3.5" />
					<path class="cls-3" d="M289 26.52v3.65l4.08 3.65 7.92-7.11v-3.93l-7.92 7.15-4.08-3.41z" />
					<path class="cls-6" d="M124.5 27.5h1.41l3.09 4.23V27.5h2v-10h-2.5M115 23v4.5h6.5M124.5 17.5H115V21" />
					<path class="cls-6" transform="rotate(-180 123 22.5)" d="M122 21.5h2v2h-2z" />
					<path class="cls-6" transform="rotate(-180 127 22.5)" d="M126 21.5h2v2h-2z" />
					<path class="cls-6" transform="rotate(-180 119 22.5)" d="M118 21.5h2v2h-2z" />
					<path class="cls-7" d="M188.5 78.19s4.69 18.91 27.5 16.28M131 32.67s21.64-2 33 15M271.12 69.19c23.92 31.24 55.21 35.18 90.64 19.3M402 43.5c.68-6.28 19.53-30.13 45.26-21M503.45 98.26c5.25.1 37.8-10.84 23.09-54.76M272.34 66.5s10.51 0 15.16-13.88" />
					<path class="cls-7" d="M97.22 79.67c14.33-2.39 42.51-3.18 55.87 12.65s58.91 20.93 64.49 3" />
				</g>
				<path class="cls-3" d="M59.15 84.6v-1.04M71.6 84.81v3.73M53.39 82.51l-3.96-.54 2.96-21.6 27.37 3.75-2.96 21.6-20.05-2.75" />
				<path class="cls-3" d="M50.22 76.21l-2.31-.32a2 2 0 01-1.73-2.28l.63-4.61a2 2 0 012.3-1.74l2.3.31zM79.88 80.27L77.59 80l1.18-8.64 2.32.32a2 2 0 011.73 2.27l-.64 4.62a2 2 0 01-2.3 1.7zM66.6 79.11l-.2 1.44M69.48 79.5l-.2 1.44M63.72 78.71l-.2 1.44M60.84 78.32l-.2 1.44M57.96 77.93l-.2 1.44" />
				<ellipse class="cls-3" cx="66.45" cy="70.5" rx="2.87" ry="2.94" transform="rotate(-82.2 66.45 70.504)" />
				<ellipse class="cls-3" cx="56.76" cy="69.18" rx="2.87" ry="2.94" transform="rotate(-82.2 56.758 69.175)" />
				<path class="cls-3" d="M55.42 105.96v7.46M72.84 105.96v7.46M76.57 96.01v1.24M66.62 96.01v1.24M54.18 95.38h7.47v4.98h-7.47z" />
				<path class="cls-3" d="M81.55 100.98v4.36H46.71V87.92h5.28M57.43 79.39l-1.98 3" />
				<path class="cls-3" d="M54.31 90.61c-2.34-1.55-3.17-4.43-1.85-6.43l1.8-2.73 8.49 5.61L61 89.78c-1.37 2.01-4.34 2.38-6.69.83zM62.27 87.92h19.28v9.33" />
				<path class="cls-3" d="M88.32 96.44l1.28-4.17a4.4 4.4 0 00-4.45-4.35h-5.47M79.29 104.84l2.68-3.44M82.72 107.53l2.69-3.44M88.32 96.83c2.22 1.73 2.81 4.67 1.33 6.56l-2 2.57-8-6.27 2-2.57c1.47-1.89 4.46-2.02 6.67-.29zM55.3 91.15a6.72 6.72 0 01-1.74.35H46.5" />
				<path class="cls-5" d="M40.82 46.24l7.96 10 .23-10h4.55V22.6H14.98v23.64h25.84z" />
				<path class="cls-6" d="M28.67 43.13h14.69l8.33 10.53V43.13h6.22V33.8M26.18 19.49H18.1v24.26M56.67 25.09v-5.6H33.65" />
				<path class="cls-4" d="M34.17 33.8a5.9 5.9 0 01.34-2.23 4.5 4.5 0 011.24-1.64A6.41 6.41 0 0037 28.62a2.06 2.06 0 00.3-1.07c0-1.12-.52-1.69-1.56-1.69a1.56 1.56 0 00-1.18.46 1.74 1.74 0 00-.46 1.25h-2.9a3.84 3.84 0 011.23-3 4.82 4.82 0 013.31-1.08 4.84 4.84 0 013.29 1 3.64 3.64 0 011.17 2.89 3.57 3.57 0 01-.43 1.62 6.57 6.57 0 01-1.33 1.68l-.81.77a2.78 2.78 0 00-.87 1.71v.61zM34 36.85a1.34 1.34 0 01.43-1 1.64 1.64 0 012.17 0 1.34 1.34 0 01.43 1 1.32 1.32 0 01-.42 1 1.7 1.7 0 01-2.19 0 1.32 1.32 0 01-.42-1z" />
				<path class="cls-3" d="M79.06 124H66.62v-4.21a6.45 6.45 0 015-6.42 6.29 6.29 0 017.47 6.33zM75.33 122.13v1.25M70.35 122.13v1.25M61.64 124H49.2v-4.21a6.47 6.47 0 015-6.42 6.29 6.29 0 017.47 6.33zM57.91 122.13v1.25M52.93 122.13v1.25" />
			</svg>
		</div><!-- end hero-content -->
	</div><!-- end container -->
</section>
<!--======================================
        END HERO AREA
======================================-->

<!-- ================================
         START QUESTION AREA
================================= -->
<section class="question-area pt-80px pb-40px">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<div class="card card-item">
					<form method="post" action="add_question.php" enctype="multipart/form-data" class="card-body">
						<div class="input-box" >
							<label class="fs-14 text-black fw-medium mb-0">Question Title</label>
							<p class="fs-13 pb-3 lh-20">Be specific and imagine you’re asking a question to another person</p>
							<div class="form-group">
								<input class="form-control form--control" type="text" name="QuestionTitle" placeholder="e.g. Is there an R function for finding the index of an element in a vector?">
							</div>
						</div><!-- end input-box -->

						<div class="input-box">
							<label class="fs-14 text-black fw-medium mb-0">Categorys</label>
							<div class="form-group">
								<?php
									require("connection.php");
									$Q = "SELECT * FROM question_type";
									$query=mysqli_query($conn,$Q);
									$account=mysqli_num_rows($query);
									?>
								<select class="select-container select--container" name="Categorys" data-placeholder="Select a Category">
									<option selected value="">Select a category</option>
									<?php
										for($i = 1; $i <= $account; $i++){
											$row=mysqli_fetch_array($query);
										?>
									<option value=" <?php echo $row["id"]; ?>"><?php echo $row["name"];?></option>
									<?php } ?>
								</select>
							</div>
						</div><!-- end input-box -->
						<div class="input-box">
							<label class="fs-14 text-black fw-medium mb-0">Details</label>
							<p class="fs-13 pb-3 lh-20">Include all the information someone would need to answer your question</p>
							<div class="form-group">
								<textarea class="form-control form--control user-text-editor" name="Details" rows="10" cols="40"></textarea>
								<div class="d-flex align-items-center pt-2">
									<div class="mr-3">
										``` <code class="badge bg-gray border border-gray text-gray">code</code> ```
									</div>
									<div class="mr-3 fw-bold">**bold**</div>
									<div class="mr-3 font-italic">*italic*</div>
									<div>&gt;quote</div>
								</div>
							</div>
						</div><!-- end input-box -->
						<div class="input-box">
							<label class="fs-14 text-black fw-medium">Image</label>
							<div class="form-group">
								<div class="file-upload-wrap file-upload-layout-2">
									<input type="file" name="photo" class="file-upload-input">
									<span class="file-upload-text d-flex align-items-center justify-content-center"><i class="la la-cloud-upload mr-2 fs-24"></i>Drop files here or click to upload.</span>
								</div>
							</div>
						</div><!-- end input-box -->
						<div class="input-box pt-2">
							<!-- <div class="form-group">
								<div class="custom-control custom-checkbox fs-13 mb-1">
									<input type="checkbox" class="custom-control-input" id="notifiedMe">
									<label class="custom-control-label custom--control-label" for="notifiedMe">Get notified by email when someone answers this question.</label>
								</div>
								<div class="custom-control custom-checkbox fs-13">
									<input type="checkbox" class="custom-control-input" id="youAgreeCheckBox">
									<label class="custom-control-label custom--control-label" for="youAgreeCheckBox">By asking your question, you agree to the <a href="privacy-policy.html" class="text-color hover-underline">Privacy Policy.</a></label>
								</div>
							</div> -->
							<div class="btn-box">
								<button type="submit" name="submit" class="btn theme-btn">Publish your question</button>
							</div>
						</div>
					</form>
				</div><!-- end card -->
			</div><!-- end col-lg-8 -->
			<div class="col-lg-4">
				<div class="sidebar">
					<div class="card card-item p-4">
						<h3 class="fs-17 pb-3">Step 1: Draft your question</h3>
						<div class="divider"><span></span></div>
						<p class="fs-14 lh-22 pb-2 pt-3">The community is here to help you with specific coding, algorithm, or language problems.</p>
						<p class="fs-14 lh-22">Avoid asking opinion-based questions.</p>
						<div id="accordion" class="generic-accordion pt-4">
							<div class="card">
								<div class="card-header" id="headingOne">
									
									<button class="btn btn-link fs-15" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
										<span><span class="text-color pr-2 fs-16">1.</span> Summarize the problem</span>
										<i class="la la-angle-down collapse-icon"></i>
									</button>
								</div>
								<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
									<div class="card-body">
										<ul class="generic-list-item generic-list-item-bullet generic-list-item--bullet-2 fs-14">
											<li class="lh-18 text-black-50">Include details about your goal</li>
											<li class="lh-18 text-black-50">Describe expected and actual results</li>
											<li class="lh-18 text-black-50 mb-0">Include any error messages</li>
										</ul>
									</div>
								</div>
							</div><!-- end card -->
							<div class="card">
								<div class="card-header" id="headingTwo">
									<button class="btn btn-link collapsed fs-15" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
										<span><span class="text-color pr-2 fs-16">2.</span> Describe what you’ve tried</span>
										<i class="la la-angle-down collapse-icon"></i>
									</button>
								</div>
								<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
									<div class="card-body">
										<p class="fs-14 lh-22 text-black-50">
											Show what you’ve tried and tell us what you found (on this site or elsewhere) and why it didn’t meet your needs. You can get better answers when you provide research.
										</p>
									</div>
								</div>
							</div><!-- end card -->
							<div class="card">
								<div class="card-header" id="headingThree">
									<button class="btn btn-link collapsed fs-15" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
										<span><span class="text-color pr-2 fs-16">3.</span> Show some code</span>
										<i class="la la-angle-down collapse-icon"></i>
									</button>
								</div>
								<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
									<div class="card-body">
										<p class="fs-14 lh-22 text-black-50">
											When appropriate, share the minimum amount of code others need to reproduce your problem (also called a
											<a href="#" class="text-color hover-underline">minimum</a>, <a href="#" class="text-color hover-underline">reproducible example</a>)
										</p>
									</div>
								</div>
							</div><!-- end card -->
						</div><!-- end accordion -->
					</div><!-- end card -->
					<div id="accordion-two" class="generic-accordion">
						<div class="card mb-3">
							<div class="card-header" id="headingFour">
								<button class="btn btn-link collapsed fs-15" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
									<span>Have a non-programming question?</span>
									<i class="la la-angle-down collapse-icon"></i>
								</button>
							</div>
							<div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion-two">
								<div class="card-body">
									<p class="fs-14 lh-22 text-black-50 pb-2">
										<a class="text-color hover-underline d-block" href="#" target="_blank">Super user</a>
										Troubleshooting hardware and software issues
									</p>
									<p class="fs-14 lh-22 text-black-50 pb-2">
										<a class="text-color hover-underline d-block" href="#" target="_blank">Software engineering</a>
										For software development methods and process questions
									</p>
									<p class="fs-14 lh-22 text-black-50 pb-2">
										<a class="text-color hover-underline d-block" href="#" target="_blank">Hardware recommendations</a>
									</p>
									<p class="fs-14 lh-22 text-black-50 pb-2">
										<a class="text-color hover-underline d-block" href="#" target="_blank">Software recommendations</a>
									</p>
									<p class="fs-14 lh-22 text-black-50">Ask questions about the site on <a class="text-color hover-underline" href="#" target="_blank">meta</a></p>
								</div>
							</div>
						</div><!-- end card -->
						<div class="card">
							<div class="card-header" id="headingFive">
								<button class="btn btn-link collapsed fs-15" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
									<span>More helpful links</span>
									<i class="la la-angle-down collapse-icon"></i>
								</button>
							</div>
							<div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion-two">
								<div class="card-body">
									<p class="fs-14 lh-22 text-black-50 pb-2">
										Find more information about <a class="text-color hover-underline" href="#" target="_blank">how to ask a good question here</a>
									</p>
									<p class="fs-14 lh-22 text-black-50">
										Visit the <a class="text-color hover-underline" href="#" target="_blank">help center</a>
									</p>
								</div>
							</div>
						</div><!-- end card -->

					</div><!-- end accordion -->
				</div><!-- end sidebar -->
			</div><!-- end col-lg-4 -->
		</div><!-- end row -->
	</div><!-- end container -->
</section><!-- end question-area -->
<!-- ================================
         END QUESTION AREA
================================= -->

<!-- ================================
         START CTA AREA
================================= -->
<section class="get-started-area pt-80px pb-50px pattern-bg bg-gray">
	<div class="container">
		<div class="text-center">
			<h2 class="section-title">Q&A communities are different. <br> Here's how</h2>
		</div>
		<div class="row pt-50px">
			<div class="col-lg-4 responsive-column-half">
				<div class="card card-item hover-y text-center">
					<div class="card-body">
						<img src="images/bubble.png" alt="bubble">
						<h5 class="card-title pt-4 pb-2">Expert communities.</h5>
						<p class="card-text">This is just a simple text made for this unique and awesome template, you can easily edit it as you want.</p>
					</div><!-- end card-body -->
				</div><!-- end card -->
			</div><!-- end col-lg-4 -->
			<div class="col-lg-4 responsive-column-half">
				<div class="card card-item hover-y text-center">
					<div class="card-body">
						<img src="images/vote.png" alt="vote">
						<h5 class="card-title pt-4 pb-2">The right answer. Right on top.</h5>
						<p class="card-text">This is just a simple text made for this unique and awesome template, you can easily edit it as you want.</p>
					</div><!-- end card-body -->
				</div><!-- end card -->
			</div><!-- end col-lg-4 -->
			<div class="col-lg-4 responsive-column-half">
				<div class="card card-item hover-y text-center">
					<div class="card-body">
						<img src="images/check.png" alt="check">
						<h5 class="card-title pt-4 pb-2">Share knowledge. Earn trust.</h5>
						<p class="card-text">This is just a simple text made for this unique and awesome template, you can easily edit it as you want.</p>
					</div><!-- end card-body -->
				</div><!-- end card -->
			</div><!-- end col-lg-4 -->
		</div><!-- end row -->
	</div><!-- end container -->
</section>
<!-- ================================
         END CTA AREA
================================= -->
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
<?php
    ob_start();
?>

<?php
    require('connection.php');
    $job = $_GET['job'];
    $result = mysqli_query($conn,"SELECT * FROM job WHERE job_id = '$job'");
    $row = mysqli_fetch_array($result);

    $company = $row['company_id'];
    $query2 = mysqli_query($conn, "SELECT user_email FROM companies WHERE id = '$company' LIMIT 0,1"); 
    $data2 = mysqli_fetch_array($query2);

    $user_email = '';
    if(isset($_SESSION['name'])){
        $user_email = $_SESSION['name'];
    }
    $query3 = mysqli_query($conn, "SELECT user_email FROM job_applications WHERE job_id = '$job' AND user_email = '$user_email'");
    $data3 = mysqli_fetch_array($query3);

    $query4 = mysqli_query($conn, "SELECT * FROM job_applications WHERE job_id = '$job'");    
?>

<style>
    .applications-table, .back-btn{
        display: none;
    }
</style>


<!--======================================
        START HERO AREA
======================================-->
<section class="hero-area bg-white shadow-sm overflow-hidden pt-20px pb-50px">
    <span class="stroke-shape stroke-shape-1"></span>
    <span class="stroke-shape stroke-shape-2"></span>
    <span class="stroke-shape stroke-shape-3"></span>
    <span class="stroke-shape stroke-shape-4"></span>
    <span class="stroke-shape stroke-shape-5"></span>
    <span class="stroke-shape stroke-shape-6"></span>
    <div class="container">
        <div class="hero-content d-flex flex-wrap align-items-center justify-content-between">
            <div class="pt-5 pb-3">
                <h2 class="section-title pb-2"><?php echo $row['job_name']; ?></h2>
                <p class="section-desc"><?php echo $row['job_location']; ?>, <span class="text-primary"><?php echo $row['Time'] == 1 ? 'Full Time' : 'Part Time' ?></span></p>
            </div>
            <div class="hero-btn-box">
                <?php
                    if(isset($_SESSION['name'])){
                    if($data2['user_email'] == $_SESSION['name']){
                ?>
                <button type="button" class="btn theme-btn theme-btn-sm applications-btn">Applications</button>
                <button type="button" class="btn btn-dark theme-btn-sm back-btn la la-arrow-circle-left"> Back</button>
                <?php }} ?>
            </div>
        </div><!-- end hero-content -->
    </div><!-- end container -->
</section><!-- end hero-area -->
<!--======================================
        END HERO AREA
======================================-->


<section class="applications-table pt-70px pb-40px">
    <div class="container">
        <div class="col-lg-9">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Interest</th>
                        <th scope="col">Resume</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        while($data4 = mysqli_fetch_assoc($query4)){
                    ?>
                        <tr>
                            <th scope="row">1</th>
                            <td><?php echo $data4['full_name']; ?></td>
                            <td><?php echo $data4['interest']; ?></td>
                            <td><a href="downloadFile.php?file=<?php echo $data4['file_path']; ?>" class="btn btn-info btn-sm ml-3 la la-download"></a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>


<!-- ================================
         START JOBS AREA
================================= -->
<section class="jobs-area pt-70px pb-40px">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="job-details-panel-main-bar">
                    <div class="job-details-panel mb-30px">
                        <h3 class="fs-20 pb-3 fw-bold">Company Description</h3>
                        <p class="pb-3">At Canva Labs we work to make a significant positive impact on society. Our mission is to democratise design and empower creation.</p>
                        <p class="pb-3">Nemo ucxqui officia voluptatem accu santium doloremque laudantium, totam rem ape dicta sunt dose explicabo. Nemo enim ipsam voluptatem quia voluptas. Excepteur sint occaecat cupidatat non proident, sunt in culpa kequi officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusan tium dolorem que laudantium</p>
                        <p class="pb-3">Porpoise uncritical gosh and much and this haughtily broadcast goodness ponderous squid darn in sheepish yet the slapped mildly and adventurously sincere less dalmatian assentingly wherever left ethereal the underneath oh lustily arduously that a groggily some vexedly broadcast sheepish yet the slapped.</p>
                    </div><!-- end job-details-panel -->

                    <h3 class="fs-20 pb-3 fw-bold">Job Details</h3>
                    <ul class="list-group mb-30px">
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between">
                                <span class="font-weight-bold">Date Posted:</span>
                                <span><?php echo $row['date_posted']; ?></span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between">
                                <span class="font-weight-bold">Closing Date:</span>
                                <span><?php echo $row['closing_Date']; ?></span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between">
                                <span class="font-weight-bold">Number Of Vacancy:</span> 
                                <span><?php echo $row['number_vacancy']; ?></span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between">
                                <span class="font-weight-bold">Time:</span> 
                                <span><?php echo $row['Time'] == 1 ? 'Full Time' : 'Part Time' ?></span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between">
                                <span class="font-weight-bold">Location:</span> 
                                <span><?php echo $row['job_location']?></span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between">
                                <span class="font-weight-bold">Gender:</span> 
                                <span><?php if($row['gender'] == 1){ echo 'Male'; }elseif($row['gender'] == 2){echo 'Female';}else{echo 'Any';} ?></span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between">
                                <span class="font-weight-bold">Contract Duration:</span> 
                                <span><?php echo $row['contract_Duration']; ?> Months</span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between">
                                <span class="font-weight-bold">Years Of Experience:</span> 
                                <span><?php echo $row['years_of_experience']; ?> Years</span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between">
                                <span class="font-weight-bold">Contract Type:</span> 
                                <span><?php if($row['contract_Type'] == 1){ echo 'Short Term'; }elseif($row['contract_Type'] == 2){echo 'Long Term';}else{echo 'Permanent';} ?></span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between">
                                <span class="font-weight-bold">Probation Period:</span> 
                                <span><?php echo $row['probation_Period']; ?> Months</span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between">
                                <span class="font-weight-bold">Salary Range:</span> 
                                <span><?php echo $row['salary']; ?> - AFG</span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between">
                                <span class="font-weight-bold">Job Type:</span> 
                                <span><?php echo $row['job_type'] == 1 ? 'Government' : 'Private' ?></span>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between">
                                <span class="font-weight-bold">Nationality:</span> 
                                <span><?php echo $row['nationality'] == 1 ? 'Afghan' : 'Foreign' ?></span>
                            </div>
                        </li>
                    </ul>


                    <div class="job-details-panel mb-30px">
                        <h3 class="fs-20 pb-3 fw-bold">Job Description</h3>
                        <p><?php echo $row['job_description']; ?></p>
                    </div><!-- end job-details-panel -->
                    <div class="job-details-panel mb-30px">
                        <h3 class="fs-20 pb-3 fw-bold">Responsibilities</h3>
                        <ul class="generic-list-item generic-list-item-bullet">
                        <?php
                            $query = mysqli_query($conn,"SELECT * FROM duties WHERE job_id = '$job'");
                            while($duties = mysqli_fetch_array($query)){
                        ?>
                            <li><?php echo $duties['dutie']; ?></li>
                        <?php } ?>
                        </ul>
                    </div><!-- end job-details-panel -->
                    <div class="job-details-panel mb-30px">
                        <h3 class="fs-20 pb-3 fw-bold">Requirements</h3>
                        <ul class="generic-list-item generic-list-item-bullet">
                        <?php
                            $query = mysqli_query($conn,"SELECT * FROM qualifications WHERE job_id = '$job'");
                            while($duties = mysqli_fetch_array($query)){
                        ?>
                            <li><?php echo $duties['qualification']; ?></li>
                        <?php } ?>
                        </ul>
                    </div><!-- end job-details-panel -->
                    <div class="job-details-panel mb-30px">
                        <h3 class="fs-20 pb-3 fw-bold">Submission Gideline</h3>
                        <p>
                            <?php echo $row['submission']; ?>
                        </p>
                    </div>

                    <hr class="border-top-gray">
                    <?php 
                        if(($data2['user_email'] != $_SESSION['name']) && ($data3 == '')){
                    ?>
                    <div class="job-details-panel mt-30px mb-30px" id="job-apply">
                        <h3 class="fs-20 pb-4 fw-bold">Apply to this role</h3>
                        <form action="add_application.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="job-id" value="<?php echo $row['job_id']; ?>">
                            <div class="mb-40px">
                                <div class="form-group">
                                    <label class="fs-14 text-black fw-medium">Full Name</label>
                                    <input type="text" class="form-control form--control fs-14" name="full-name" placeholder="Your name">
                                </div>
                                <div class="form-group">
                                    <label class="fs-14 text-black fw-medium">Resume</label>
                                    <div class="file-upload-wrap file-upload-layout-2">
                                        <input type="file" name="files" class="cv-input file-upload-input" multiple>
                                        <span class="file-upload-text d-flex align-items-center justify-content-center"><i class="la la-cloud-upload mr-2 fs-24"></i>Drop files here or click to upload.</span>
                                    </div>
                                    <p class="fs-14">.pdf, .doc, .docx files accepted</p>
                                </div>
                            
                                <div class="form-group">
                                    <label class="fs-14 text-black fw-medium">Let the company know about your interest working there</label>
                                    <textarea class="form-control form--control fs-14" rows="5" name="textArea"></textarea>
                                </div>
                                <button class="btn theme-btn mt-2 application-btn" type="submit" <?php if(!isset($_SESSION['name'])){?> disabled <?php } ?>>Submit Application</button>
                            </div>
                        </form>
                    </div>
                    <?php } ?>

                </div><!-- end job-details-panel-main-bar -->
            </div><!-- end col-lg-8 -->
            <div class="col-lg-3">
                <div class="sidebar">
                    <a href="referrals.html" class="btn theme-btn w-100 mb-3 d-none">Refer a friend <i class="la la-arrow-right icon ml-1"></i></a>
                    <div class="card card-item p-4">
                        <h3 class="fs-17 pb-3">Share this job</h3>
                        <div class="divider"><span></span></div>
                        <div class="social-icon-box pt-3">
                            <a class="mr-1 icon-element icon-element-sm shadow-sm text-gray hover-y d-inline-block" href="#" target="_blank" title="Share on Facebook">
                                <svg focusable="false" class="svg-inline--fa fa-facebook-f fa-w-10" width="16px" height="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="currentColor" d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"></path></svg>
                            </a>
                            <a class="mr-1 icon-element icon-element-sm shadow-sm text-gray hover-y d-inline-block" href="#" target="_blank" title="Share on Twitter">
                                <svg focusable="false" class="svg-inline--fa fa-twitter fa-w-16" width="16px" height="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"></path></svg>
                            </a>
                            <a class="mr-1 icon-element icon-element-sm shadow-sm text-gray hover-y d-inline-block" href="#" target="_blank" title="Share on Linkedin">
                                <svg focusable="false" class="svg-inline--fa fa-linkedin fa-w-14" width="16px" height="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z"></path></svg>
                            </a>
                            <a class="mr-1 icon-element icon-element-sm shadow-sm text-gray hover-y d-inline-block" href="#" target="_blank" title="Share vai Email">
                                <svg focusable="false" class="svg-inline--fa fa-envelope fa-w-16" width="16px" height="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z"></path></svg>
                            </a>
                        </div>
                    </div><!-- end card -->
                    <div class="card card-item p-4">
                        <h3 class="fs-17 pb-3">Other Related jobs</h3>
                        <div class="divider"><span></span></div>
                        <div class="sidebar-items-list pt-3">
                            <div class="media media-card media--card media--card-2">
                                <div class="media-body">
                                    <h5><a href="career-details.html">Junior Product Researcher</a></h5>
                                    <small class="meta d-block lh-20">
                                        <span class="pr-1">Remote</span>
                                        <span class="pr-1">.</span>
                                        <span>2 days ago</span>
                                    </small>
                                    <a href="career-details.html" class="btn-text hover-underline fs-12">Apply Now</a>
                                </div>
                            </div><!-- end media -->
                            <div class="media media-card media--card media--card-2">
                                <div class="media-body">
                                    <h5><a href="career-details.html">Salesforce Developer</a></h5>
                                    <small class="meta d-block lh-20">
                                        <span class="pr-1">Remote</span>
                                        <span class="pr-1">.</span>
                                        <span>22 days ago</span>
                                    </small>
                                    <a href="career-details.html" class="btn-text hover-underline fs-12">Apply Now</a>
                                </div>
                            </div><!-- end media -->
                            <div class="media media-card media--card media--card-2">
                                <div class="media-body">
                                    <h5><a href="career-details.html">Senior Software Engineer</a></h5>
                                    <small class="meta d-block lh-20">
                                        <span class="pr-1">Remote</span>
                                        <span class="pr-1">.</span>
                                        <span>12 days ago</span>
                                    </small>
                                    <a href="career-details.html" class="btn-text hover-underline fs-12">Apply Now</a>
                                </div>
                            </div><!-- end media -->
                            <div class="media media-card media--card media--card-2">
                                <div class="media-body">
                                    <h5><a href="career-details.html">Sr. Full Stack Engineer</a></h5>
                                    <small class="meta d-block lh-20">
                                        <span class="pr-1">Remote</span>
                                        <span class="pr-1">.</span>
                                        <span>18 days ago</span>
                                    </small>
                                    <a href="career-details.html" class="btn-text hover-underline fs-12">Apply Now</a>
                                </div>
                            </div><!-- end media -->
                            <a href="#" class="btn-text hover-underline">Show all jobs <i class="la la-arrow-right icon ml-1"></i></a>
                        </div><!-- end sidebar-items-list -->
                    </div><!-- end card -->
                </div><!-- end sidebar -->
            </div><!-- end col-lg-4 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end jobs-area -->
<!-- ================================
         END JOBS AREA
================================= -->


<?php
 ob_start();
?>

<script>
    $('.applications-btn').click(function(){
        $('.jobs-area').hide();
        $('.applications-table').show();
        $('.back-btn').show();
        $('.applications-btn').hide();
    });

    $('.back-btn').click(function(){
        $('.applications-table').hide();
        $('.back-btn').hide();
        $('.applications-btn').show();
        $('.jobs-area').show();
    });
</script>

<?php
	$scripts = ob_get_contents();
	ob_end_clean();
?>

<?php
	$dashboard = ob_get_contents();
	ob_end_clean();
	require("index.php"); 
?>
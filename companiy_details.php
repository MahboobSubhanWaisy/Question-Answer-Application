<?php
ob_start();
?>

<?php
    include_once("connection.php");
    $id = $_GET['id'];
    $sql = "SELECT * FROM companies WHERE id = '$id' LIMIT 0,1";
    $query = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($query); 
?>


<!--======================================
        START HERO AREA
======================================-->
<section class="hero-area bg-white pt-50px pb-10px">
    <span class="stroke-shape stroke-shape-1"></span>
    <span class="stroke-shape stroke-shape-2"></span>
    <span class="stroke-shape stroke-shape-3"></span>
    <span class="stroke-shape stroke-shape-4"></span>
    <span class="stroke-shape stroke-shape-5"></span>
    <span class="stroke-shape stroke-shape-6"></span>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="hero-content">
                    <div class="media media-card align-items-center shadow-none p-0 mb-0 rounded-0">
                        <div class="media-img media--img">
                        <?php
                            if($data['path'] != ''){
                        ?>
                            <img src="images/<?php echo $data['path']; ?>" alt="company logo">
                        <?php }else{ ?>
                            <img src="images/company-logo2.png" alt="avatar">
                        <?php } ?>
                        </div>
                        <div class="media-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h5 class="fs-24"> <?php echo $data['name']?></h5>
                                    <p class="pt-2 lh-20"><?php echo $data['bio']; ?></p>
                                </div>
                                <div>
                                    <?php if(isset($_SESSION['name'])){ if($data['user_email'] == $_SESSION['name']){ ?>
                                        <a href="edit-company.php?com_id=<?php echo $_GET['id']; ?>" class="btn btn-info">Edit Company</a>
                                    <?php }} ?>
                                </div>
                            </div>
                        </div>
                    </div><!-- end media -->
                </div><!-- end hero-content -->
            </div><!-- end col-lg-8 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>
<!--======================================
        END HERO AREA
======================================-->

<!-- ================================
         START COMPANY AREA
================================= -->
<section class="company-area pb-90px">
    <div class="bg-white shadow-sm pt-30px pb-30px sticky-navs-wrap">
        <div class="container">
            <ul class="js-scroll-nav">
                <li class="active"><a href="#about-company" class="page-scroll">About</a></li>
                <li><a href="#jobs" class="page-scroll">Jobs</a></li>
            </ul>
        </div>
    </div><!-- end sticky-navs-wrap -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="company-details-panel-main-bar pt-30px">
                    <div class="company-details-panel mb-30px" id="about-company">
                        <?php echo $data['description']?>
                    </div><!-- end company-details-panel -->
                 
                   
                    <div class="company-details-panel mb-30px" style="margin-top: 12rem;" id="jobs">
                        <div class="d-flex justify-content-between">
                            <h3 class="fs-20 pb-3">Job Openings</h3>
                            <?php if($data['user_email'] == $_SESSION['name']){ ?>
                                <a href="add-job.php?com_id=<?php echo $_GET['id']; ?>" class="btn btn-info">Announce Job</a>
                            <?php } ?>
                        </div>
                        <div class="jobs-snippet">
                            <?php 
                                    $com_id = $data['id'];
                                    $result = mysqli_query($conn,"SELECT * FROM job WHERE company_id = '$com_id'");
                                    while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                <div class="media media-card media--card align-items-center">
                                    <div class="media-body border-left-0">
                                        <h5 class="pb-1"><a href="job-details.php?job=<?php echo $row['job_id']; ?>"><?php echo $row['job_name'];?></a></h5>
                                        <small class="meta d-block lh-20 pb-1">
                                            <span class="author pr-1 text-info"> <?php echo $data['name']; ?></span>
                                            <span class="pr-1 text-gray"><?php echo $row['job_location'];?></span>
                                            <span class="text-success fw-medium"><?php echo $row['date_posted'];?></span>
                                            <span class="text-gray fw-medium">- Close Date -</span>
                                            <span class="text-danger fw-medium"><?php echo $row['closing_Date'];?></span>
                                        </small>
                                        <small class="meta d-block lh-20">
                                            <span class="pr-1 fw-medium"><?php echo $row['job_description'];?></span>
                                        </small>
                                        <div class="tags pt-2">
                                            <a href="#" class="tag-link text-primary"><?php echo $row['years_of_experience'];?> Year Experience</a>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div><!-- end jobs-snippet -->
                    </div><!-- end company-details-panel -->
                </div><!-- end company-details-panel-main-bar -->
            </div><!-- end col-lg-8 -->
            <div class="col-lg-4">
                <div class="sidebar pt-40px pl-30px">
                    
                    <div class="card card-item">
                        <div class="card-body">
                            <h3 class="fs-19 pb-3 fw-semi-bold">About</h3>
                            <div class="divider"><span></span></div>
                            <div class="icon-box pt-3">
                                <span class="fw-semi-bold d-block text-uppercase fs-13 lh-22">Website</span>
                                <p class="fs-14 lh-20"><a href="#" class="text-color hover-underline"><?php echo $data['website']?></a></p>
                            </div><!-- end icon-box -->
                            <div class="icon-box pt-3">
                                <span class="fw-semi-bold d-block text-uppercase fs-13 lh-22">Founded</span>
                                <p class="fs-14 lh-20"> <?php echo $data['founded_in']?></p>
                            </div><!-- end icon-box -->
                            <div class="icon-box pt-3">
                                <span class="fw-semi-bold d-block text-uppercase fs-13 lh-22">status</span>
                                <p class="fs-14 lh-20">Private</p>
                            </div><!-- end icon-box -->
                        </div>
                    </div><!-- end card-item -->
                    <div class="card card-item">
                        <div class="card-body">
                            <h3 class="fs-19 pb-3 fw-semi-bold">Office Locations</h3>
                            <div class="divider"><span></span></div>
                            <ul class="generic-list-item pt-3 pb-2 fs-15">
                                <li><a href="#"><svg class="mr-1" xmlns="http://www.w3.org/2000/svg" height="19px" viewBox="0 0 24 24" width="19px" fill="#6c727c"><path d="M0 0h24v24H0z" fill="none"/><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg> <?php echo $data['location']?></a></li>
                            </ul>
                            <div id="map" class="h-200px"></div>
                        </div>
                    </div><!-- end card-item -->
                    
                </div><!-- end sidebar -->
            </div><!-- end col-lg-4 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end company-area -->
<!-- ================================
         END COMPANY AREA
================================= -->

<?php
	$dashboard = ob_get_contents();
	ob_end_clean();
	require("index.php"); 
?>

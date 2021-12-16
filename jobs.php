<?php
ob_start();
?>
<!--======================================
        START HERO AREA
======================================-->
<section class="hero-area pt-40px pb-30px bg-white shadow-sm overflow-hidden">
    <span class="stroke-shape stroke-shape-1"></span>
    <span class="stroke-shape stroke-shape-2"></span>
    <span class="stroke-shape stroke-shape-3"></span>
    <span class="stroke-shape stroke-shape-4"></span>
    <span class="stroke-shape stroke-shape-5"></span>
    <span class="stroke-shape stroke-shape-6"></span>
    <div class="container">
        <div class="hero-content">
            <h2 class="section-title fs-24 pb-4">Jobs</h2>
            <!-- <form method="post" class="search-form p-0 rounded-0 bg-transparent shadow-none position-relative z-index-1">
                <div class="d-flex flex-wrap align-items-center">
                    <div class="d-flex flex-wrap align-items-center flex-grow-1">
                        <div class="form-group mr-3 flex-grow-1">
                            <input class="form-control form--control pl-40px" type="text" name="text" placeholder="Search all jobs">
                            <span class="la la-search input-icon"></span>
                        </div>
                        <div class="form-group mr-3 flex-grow-1">
                            <input class="form-control form--control pl-40px" type="text" name="text" placeholder="Located anywhere">
                            <span class="la la-map-marker input-icon"></span>
                            <div class="km-select-wrap">
                                <select class="custom-select custom--select">
                                    <option value="5">within 5 km</option>
                                    <option value="10">within 10 km</option>
                                    <option value="20" selected="">within 20 km</option>
                                    <option value="50">within 50 km</option>
                                    <option value="100">within 100 km</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="search-btn-box mb-3">
                        <button class="btn theme-btn">Search <i class="la la-search ml-1"></i></button>
                    </div>
                </div>
            </form> -->
        </div>
    </div>
</section>
<!--======================================
        END HERO AREA
======================================-->

<!-- ================================
         START QUESTION AREA
================================= -->
<section class="question-area pt-40px pb-40px">
    <div class="container">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="jobs" role="tabpanel" aria-labelledby="jobs-tab">
                
                <div class="row mt-4">
                    <div class="col-lg-9">
                        <?php
                            include('connection.php');
                            $limit = 2;  
                            if (isset($_GET["page"])) {
                                $page  = $_GET["page"]; 
                            }else{ 
                                $page=1;
                            }
                            $start_from = ($page-1) * $limit; 
                            $result = mysqli_query($conn,"SELECT job.*, companies.* FROM `job` JOIN companies ON company_id = id");
                            while($row = mysqli_fetch_array($result)){
                        ?>
                        <div class="jobs-snippet">
                            <div class="media media-card media--card align-items-center">
                                <div class="media-body border-left-0">
                                    <h5 class="pb-1"><a href="job-details.php?job=<?php echo $row['job_id']; ?>"><?php echo $row['job_name'];?></a></h5>
                                    <small class="meta d-block lh-20 pb-1">
                                        <span class="author pr-1 text-info"> <?php echo $row['name']; ?></span>
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
                        </div>
                        <?php } ?>

                        <?php
                            $result_db = mysqli_query($conn,"SELECT COUNT(job_id) FROM job"); 
                            $row_db = mysqli_fetch_row($result_db);  
                            $total_records = $row_db[0];
                            $total_pages = ceil($total_records / $limit); 
                            /* echo  $total_pages; */
                            $pagLink = "<ul class='pagination pr-1'>";  
                            for ($i=1; $i<=$total_pages; $i++) {
                                        $pagLink .= "<li class='page-item'><a class='page-link' href='jobs.php?page=".$i."'>".$i."</a></li>";	
                            }
                            echo $pagLink . "</ul>";  
                        ?>

                    </div><!-- end col-lg-9 -->
                </div><!-- end row -->
            </div><!-- end tab-pane -->
        </div><!-- end tab-content -->
    </div><!-- end container -->
</section><!-- end question-area -->
<!-- ================================
         END QUESTION AREA
================================= -->


<?php
$dashboard = ob_get_contents();
ob_end_clean();
require("index.php"); 
?>

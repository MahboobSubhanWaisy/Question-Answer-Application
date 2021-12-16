
<?php
	ob_start();
?>

<style>
    .media-card .media-custom {
        width: 9rem !important;
        height: 6rem !important;
    }
</style>

<!--======================================
        END HEADER AREA
======================================-->

<!--======================================
        START HERO AREA
======================================-->
<section class="hero-area bg-white shadow-sm pt-60px pb-60px">
    <span class="stroke-shape stroke-shape-1"></span>
    <span class="stroke-shape stroke-shape-2"></span>
    <span class="stroke-shape stroke-shape-3"></span>
    <span class="stroke-shape stroke-shape-4"></span>
    <span class="stroke-shape stroke-shape-5"></span>
    <span class="stroke-shape stroke-shape-6"></span>
    <div class="container">
        <div class="hero-content d-flex justify-content-between">
            <h2 class="section-title fs-24 pb-4">Companies</h2>
            <!-- <form method="post" class="search-form p-0 rounded-0 bg-transparent shadow-none position-relative z-index-1"> -->
                <!-- <div class="d-flex flex-wrap align-items-center">
                    <div class="d-flex flex-wrap align-items-center flex-grow-1">
                        <div class="form-group mr-3 flex-grow-1">
                            <input class="form-control form--control pl-40px" type="text" name="text" placeholder="Search all companies">
                            <span class="la la-search input-icon"></span>
                        </div>
                        <div class="form-group mr-3 flex-grow-1">
                            <input class="form-control form--control pl-40px" type="text" name="text" placeholder="Located anywhere">
                            <span class="la la-map-marker input-icon"></span>
                        </div>
                    </div>
                    <div class="search-btn-box mb-3">
                        <button class="btn theme-btn">Search <i class="la la-search ml-1"></i></button>
                    </div>
                </div> -->
                <div class="filter-btn-group d-flex flex-wrap align-items-center">
                    <a href="new-company.php" class="btn theme-btn">New Company</a>
                </div>
            <!-- </form> -->
        </div><!-- end hero-content -->
    </div><!-- end container -->
</section>
<!--======================================
        END HERO AREA
======================================-->

<!-- ================================
         START JOB AREA
================================= -->
<section class="job-area pt-50px">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="jobs-main-bar mb-50px">
                    <div class="jobs-snippet">	
					 <?php
                        require("connection.php");
                        $limit = 2;  
                        if (isset($_GET["page"])) {
                            $page  = $_GET["page"]; 
                        }else{ 
                            $page=1;
                        }
                        $start_from = ($page-1) * $limit;  
                        $result = mysqli_query($conn,"SELECT * from companies LIMIT $start_from, $limit");
                        while ($row = mysqli_fetch_array($result)) {  
                    ?>
						
                        <div class="media media-card">
                            <a href="#" class="media-img media-custom d-block">
                            <?php
                                if($row['path'] != ''){
                            ?>
                                <img src="images/<?php echo $row['path']; ?>" alt="company logo">
                            <?php }else{ ?>
                                <img src="images/company-logo2.png" alt="avatar">
                            <?php } ?>
                            </a>
                            <div class="media-body border-left-0">
                            <h5 class="pb-1 fs-16 fw-medium"><a href="companiy_details.php?id=<?php echo $row['id']; ?>">
					        <?php echo $row['name']?></a></h5>
                             <small class="meta d-block lh-20 pb-1">
                            <span class="pr-1"><i class="la la-map-marker mr-1"></i> <?php echo $row['location']?></span>
                            <span><i class="la la-building mr-1"></i><?php echo $row['bio']?> </span>
                                </small>
                                <p class="lh-20 fs-13 text-black-50 truncate"><?php echo $row['description']?></p>
                            </div>
                        </div><!-- end media -->
                        <?php } ?>
                    </div><!-- end jobs-snippet -->
                    
                    <?php
                        $result_db = mysqli_query($conn,"SELECT COUNT(id) FROM companies"); 
                        $row_db = mysqli_fetch_row($result_db);  
                        $total_records = $row_db[0];  
                        $total_pages = ceil($total_records / $limit); 
                        /* echo  $total_pages; */
                        $pagLink = "<ul class='pagination pr-1'>";  
                        for ($i=1; $i<=$total_pages; $i++) {
                                    $pagLink .= "<li class='page-item'><a class='page-link' href='companies.php?page=".$i."'>".$i."</a></li>";	
                        }
                        echo $pagLink . "</ul>";  
                    ?>

                </div><!-- end jobs-main-bar -->
				
            </div><!-- end col-lg-9 -->
           
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end job-area -->
<!-- ================================
         END JOB AREA
================================= -->



<!-- ================================
         END FOOTER AREA
================================= -->

<?php
	$dashboard = ob_get_contents();
	ob_end_clean();
	require("index.php"); 
?>

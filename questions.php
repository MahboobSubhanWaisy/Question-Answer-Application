
	<?php
	ob_start();
	?>
<!-- ================================
         START QUESTION AREA
================================= -->
<section class="question-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 pr-0">
                <div class="sidebar position-sticky top-0 pt-40px">
                    <ul class="generic-list-item generic-list-item-highlight fs-15">
                        <li class="lh-26"><a href="dashboard.php"><i class="la la-home mr-1 text-black"></i> Home</a></li>
                        <li class="lh-26 active"><a href="questions.php"><i class="la la-globe mr-1 text-black"></i> Questions</a></li>
                        <li class="lh-26"><a href="users.php"><i class="la la-user mr-1 text-black"></i> Users</a></li>
                        <li class="lh-26"><a href="jobs.php"><i class="la la-mouse mr-1 text-black"></i> Jobs</a></li>
                        <li class="lh-26"><a href="companies.php"><i class="la la-briefcase mr-1 text-black"></i> Companies</a></li>
                    </ul>
                </div><!-- end sidebar -->
            </div><!-- end col-lg-2 -->
            <div class="col-lg-7 px-0">
                <div class="question-main-bar border-left border-left-gray pt-40px pb-40px">
                    <div class="filters pb-4 pl-3">
                        <div class="d-flex flex-wrap align-items-center justify-content-between pb-3">
                            <h3 class="fs-22 fw-medium">All Questions</h3>
                            <a href="add_question.php" class="btn theme-btn theme-btn-sm">Ask Question</a>
                        </div>
                    </div><!-- end filters -->
                    <?php
                        include('connection.php');
                        $limit = 2;  
                        if (isset($_GET["page"])) {
                            $page  = $_GET["page"]; 
                        }else{ 
                            $page=1;
                        }
                        $start_from = ($page-1) * $limit;  
                        $result = mysqli_query($conn,"SELECT questions.*, question_type.*, client_info.* FROM questions JOIN question_type ON questions.question_type = question_type.id JOIN client_info ON questions.client_id = client_info.cl_id ORDER BY question_id DESC LIMIT $start_from, $limit");
                        while ($row = mysqli_fetch_array($result)) {  
                        
                        $question_id = $row['question_id'];

                        $result2 = mysqli_query($conn,"SELECT answer_id FROM answer WHERE question_id = '$question_id'");
                        $answers = mysqli_num_rows($result2);
                    ?>
                        <div class="questions-snippet border-top border-top-gray">
                        <div class="media media-card rounded-0 shadow-none mb-0 bg-transparent p-3 border-bottom border-bottom-gray">
                            <div class="votes text-center votes-2">
                                <div class="answer-block answered my-2">
                                    <span class="answer-counts d-block lh-20 fw-medium"><?php echo $answers; ?></span>
                                    <span class="answer-text d-block fs-13 lh-18">answers</span>
                                </div>
                                <div class="view-block">
                                    <span class="view-counts d-block lh-20 fw-medium"><?php echo $row['views']; ?></span>
                                    <span class="view-text d-block fs-13 lh-18">views</span>
                                </div>
                            </div>
                            <div class="media-body">
                                <h5 class="mb-2 fw-medium"><a href="question_details.php?id=<?php echo $row['question_id']; ?>"><?php echo $row['Qu_title']?></a></h5>
                                <p class="mb-2 truncate lh-20 fs-15"><?php echo $row['question']?></p>
                                <div class="tags">
                                    <a href="#" class="tag-link"><?php echo $row['name']; ?></a>
                                </div>
                                <div class="media media-card user-media align-items-center px-0 border-bottom-0 pb-0">
                                    <a href="user-profile.html" class="media-img d-block">
                                        <?php
                                            if($row['photo'] != ''){
                                        ?>
                                            <img src="images/<?php echo $row['photo']; ?>" alt="company logo">
                                        <?php }else{ ?>
                                            <img src="images/user_default.jpg" alt="company logo">
                                        <?php } ?>
                                    </a>
                                    <div class="media-body d-flex flex-wrap align-items-center justify-content-between">
                                        <div>
                                            <h5 class="pb-1"><a href="#"><?php echo $row['fall_name']; ?></a></h5>
                                            
                                        </div>
                                        <small class="meta d-block text-right">
                                            <span class="text-black d-block lh-18">Asked</span>
                                            <span class="d-block lh-18 fs-12"><?php echo $row['date']; ?></span>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end media -->
                    </div>
                    <?php } ?>

                    <?php
                        $result_db = mysqli_query($conn,"SELECT COUNT(question_id) FROM questions"); 
                        $row_db = mysqli_fetch_row($result_db);  
                        $total_records = $row_db[0];  
                        $total_pages = ceil($total_records / $limit); 
                        /* echo  $total_pages; */
                        $pagLink = "<ul class='pagination pr-1'>";  
                        for ($i=1; $i<=$total_pages; $i++) {
                                    $pagLink .= "<li class='page-item'><a class='page-link' href='questions.php?page=".$i."'>".$i."</a></li>";	
                        }
                        echo $pagLink . "</ul>";  
                    ?>

                </div><!-- end question-main-bar -->
            </div><!-- end col-lg-7 -->
            
        </div><!-- end row -->
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


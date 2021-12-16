<?php
    require('connection.php');
    if(isset($_SESSION['name'])){
    ob_start();
?>



<!-- ================================
         START QUESTION AREA
================================= -->
<section class="question-area pt-40px pb-40px">
    <div class="container">
        <div class="filters pb-3">
            <div class="d-flex flex-wrap align-items-center justify-content-between pb-3">
                <h3 class="fs-22 fw-medium">Users</h3>
                <a href="add_question.php" class="btn theme-btn theme-btn-sm">Ask Question</a>
            </div>
        </div><!-- end filters -->
        <div class="row">
            <?php
                require("connection.php");
                $limit = 2;  
                if (isset($_GET["page"])) {
                    $page  = $_GET["page"]; 
                }else{ 
                    $page=1;
                }
                $start_from = ($page-1) * $limit;  
                $result = mysqli_query($conn,"SELECT * from users JOIN client_info ON users.record_id = client_info.cl_id LIMIT $start_from, $limit");
                while ($row = mysqli_fetch_array($result)) {  
            ?>
            <div class="col-lg-3 responsive-column-half">
                <div class="media media-card p-3">
                    <a href="user-profile.html" class="media-img d-inline-block flex-shrink-0">
                        <?php
                            if($row['photo'] != ''){
                        ?>
                            <img src="images/<?php echo $row['photo']; ?>" alt="company logo">
                        <?php }else{ ?>
                            <img src="images/user_default.jpg" alt="company logo">
                        <?php } ?>
                    </a>
                    <div class="media-body">
                        <h5 class="fs-16 fw-medium"><a href="user-profile.html"><?php echo $row['fall_name']; ?></a></h5>
                        <small class="meta d-block lh-24 pb-1"><span>New York, United States</span></small>
                        <p class="fw-medium fs-15 text-black-50 lh-18">1,200</p>
                    </div><!-- end media-body -->
                </div><!-- end media -->
            </div><!-- end col-lg-3 -->
            <?php } ?>
        </div><!-- end row -->
        
        <?php
            $result_db = mysqli_query($conn,"SELECT COUNT(id) FROM users"); 
            $row_db = mysqli_fetch_row($result_db);  
            $total_records = $row_db[0];  
            $total_pages = ceil($total_records / $limit); 
            /* echo  $total_pages; */
            $pagLink = "<ul class='pagination pr-1'>";  
            for ($i=1; $i<=$total_pages; $i++) {
                        $pagLink .= "<li class='page-item'><a class='page-link' href='users.php?page=".$i."'>".$i."</a></li>";	
            }
            echo $pagLink . "</ul>";  
        ?>

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

<?php }else{ header('location: login.php'); } ?>




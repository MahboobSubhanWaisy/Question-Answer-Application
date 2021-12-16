<?php
	require('connection.php');
	if(isset($_SESSION['name'])){
    ob_start();
?>
<?php
    $id = $_GET['id'];
    $sql = "SELECT questions.*, client_info.* FROM questions Join client_info ON questions.client_id = client_info.cl_id WHERE question_id = '$id' LIMIT 0,1";
    $query = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($query);
?>
<?php
    if (isset($_POST['post_btn'])){
        $title = $_POST['AnswerTitle'];
        $body = $_POST['body'];
		$id = $_POST['question_id'];
        $user_id = $_SESSION['record'];
		
        if($_FILES['image'] != ''){
            $tmp = $_FILES['image']['tmp_name'];
            $file_name = time().$_FILES['image']['name'];
            move_uploaded_file($tmp, "images/$file_name");
        }

		$sql = "INSERT INTO answer(answer_title,answer,question_id,path,client_id) VALUES ('$title', '$body','$id','$file_name','$user_id');";
		$run = mysqli_query($conn,$sql);
		if($run){
			header("location:question_details.php?id=".$id);
		}
		else{
			echo mysqli_error($conn);
		}
	}
?>
<?php
 ob_start();
?>
    <link rel="stylesheet" href="css/jquery-te-1.4.0.css">
    <link rel="stylesheet" href="css/upvotejs.min.css">
    <link rel="stylesheet" href="css/selectize.css">
    <link rel="stylesheet" href="css/style.css">

    <style>
        .ratin-wrapper{
            direction: rtl;
            margin-bottom: 2rem;
        }
        .ratin-wrapper input{
            display: none;
        }
        .ratin-wrapper label{
            display: inline-block;
            width: 25px;
            position: relative;
            cursor: pointer;
        }
        .ratin-wrapper label:before{
            content: "\2605";
            position: absolute;
            font-size: 30px;
            display: inline-block;
            top: 0;
            left: 0;
        }
        .ratin-wrapper label:after{
            content: "\2605";
            position: absolute;
            font-size: 30px;
            display: inline-block;
            top: 0;
            left: 0;
            color: #FFD700;
            opacity: 0;
        }
        .ratin-wrapper label:hover:after{
            opacity: 1;
        }
        .ratin-wrapper label:hover:after,
        .ratin-wrapper label:hover ~ label:after,
        .ratin-wrapper input:checked ~ label:after{
            opacity: 1;
        }
        .star-fill{
            color: #FFD700;
        }
    </style>

<?php
	$styles = ob_get_contents();
	ob_end_clean();
?>

<!--======================================
        START HERO AREA
======================================-->
<section class="hero-area bg-white shadow-sm overflow-hidden pt-40px pb-40px">
    <span class="stroke-shape stroke-shape-1"></span>
    <span class="stroke-shape stroke-shape-2"></span>
    <span class="stroke-shape stroke-shape-3"></span>
    <span class="stroke-shape stroke-shape-4"></span>
    <span class="stroke-shape stroke-shape-5"></span>
    <span class="stroke-shape stroke-shape-6"></span>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-9">
                <div class="hero-content">
                    <h2 class="section-title pb-2 fs-24 lh-34"> <?php echo $data['Qu_title'] ?>  </h2>
                </div><!-- end hero-content -->
            </div><!-- end col-lg-9 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>
<!--======================================
        END HERO AREA
======================================-->

<!-- ================================
         START QUESTION AREA
================================= -->
<section class="question-area pt-40px pb-40px">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="question-main-bar mb-50px">
                    <div class="question d-flex">
                        <div class="votes votes-styled w-auto">
                            <div id="vote" class="upvotejs">
                                <a class="upvote upvote-on" data-toggle="tooltip" data-placement="right" title="This question is useful"></a>
                                <span class="count">1</span>
                                <a class="downvote" data-toggle="tooltip" data-placement="right" title="This question is not useful"></a>
                                <!-- <a class="star" data-toggle="tooltip" data-placement="right" title="Bookmark this question."></a> -->
                            </div>
                        </div><!-- end votes -->
                        <div class="question-post-body-wrap flex-grow-1">
                            <div class="question-post-body">
                                <p>Then I attempt to get it like so:</p>
								<pre class="code-block custom-scrollbar-styled">
									<code class="col-md-12"><div><?php echo $data['question']; ?></div></code>
                                    <?php 
                                        if($data['path'] != ''){
                                    ?>
                                        <div class="float-right">
                                            <img src="images/<?php echo $data['path']; ?>" alt="">
                                        </div>
                                    <?php
                                        }
                                    ?>
								</pre>
                            </div><!-- end question-post-body -->
                        </div><!-- end question-post-body-wrap -->
                    </div><!-- end question -->

                    <?php
                        
					    $sql2 = "SELECT questions.*, answer.* FROM answer INNER JOIN questions ON questions.question_id = answer.question_id WHERE answer.question_id = '$id'";
					    $run2 = mysqli_query($conn, $sql2);

                        $account=mysqli_num_rows($run2);
                        for($i = 1; $i <= $account; $i++){
                        $row = mysqli_fetch_array($run2);

                        $answer_id = $row['answer_id'];
                        $sql3 = mysqli_query($conn, "SELECT rate,client_id FROM answer_details WHERE answer_id ='$answer_id'");
                        
                        $count = 0;
                        $ratingNumber = 0;

                        while($rate = mysqli_fetch_assoc($sql3)) {
                            $ratingNumber+= $rate['rate'];
                            $count += 1;
                        }

                        $average = 0;
                        if($ratingNumber && $count) {
                            $average = $ratingNumber/$count;
                        }

                    ?>

                    <div class="subheader">
                        <div class="subheader-title">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex justify-content-between">
                                    <div class="mr-3">
                                        <h3 class="fs-16">Answer No. <?php echo $i . ' ' . $row['client_id']?></h3>
                                    </div>
                                    <div style="margin-top: -0.2rem;font-size: 1.2rem;">
                                        <?php
                                        $averageRating = round($average, 0);
                                        for ($j = 1; $j <= 5; $j++) {
                                            $ratingClass = "la la-star";
                                            if($j <= $averageRating) {
                                                $ratingClass = "la la-star star-fill";
                                            }
                                        ?>
                                        <span class="<?php echo $ratingClass; ?>"></span> 
                                        <?php } ?>
                                        <span style="font-size: .8rem;"><?php echo round($average, 2) . ' of '. $count . ' reviews'?></span>
                                    </div>
                                </div>
                                <?php 
                                    $client = $_SESSION['record'];
                                    $sql4 = mysqli_query($conn, "SELECT client_id FROM answer_details WHERE answer_id ='$answer_id' AND client_id = '$client' LIMIT 0,1");
                                    $check = mysqli_fetch_assoc($sql4);

                                    if(($check != '') || ($row['client_id'] == $client)){
                                        // echo $check['client_id'];
                                    }else{
                                ?>
                                    <button type="button" class="btn la la-star rate-btn" answer="<?php echo $row['answer_id'];?>"></button>
                                <?php } ?>
                            </div>
                        </div><!-- end subheader-title -->
                    </div><!-- end subheader -->

                    <div class="answer-wrap d-flex">
                        <div class="votes votes-styled w-auto">
                            <div id="vote2" class="upvotejs">
                                <a class="upvote upvote-on" data-toggle="tooltip" data-placement="right" title="This question is useful"></a>
                                <span class="count"><?php echo $i; ?> </span>
                                <a class="downvote" data-toggle="tooltip" data-placement="right" title="This question is not useful"></a>
                                <?php if(($_SESSION['record'] == $data['client_id']) && ($row['accept'] == 0)){ ?>
                                    <a class="star check correct-answer" data-id="<?php echo $row['answer_id']; ?>" data-toggle="tooltip" data-placement="right" title="The Answer Worked.?"></a>
                                <?php }else if($row['accept'] == 1){ ?>
                                    <a class="star check star-on" data-toggle="tooltip" data-placement="right" title="The question owner accepted this answer"></a>
                                <?php } ?>
                            </div>
                        </div><!-- end votes -->
                        <div class="answer-body-wrap flex-grow-1">
                            <div class="answer-body">
                                <p><?php echo $row['answer_title'] ?></p>
                                <pre class="code-block custom-scrollbar-styled">
									<code><div><?php echo $row['answer'] ?></div></code>
                                    <?php 
                                        if($row['path'] != ''){
                                    ?>
                                        <div class="float-right" style="margin-top: -4rem;">
                                            <img src="images/<?php echo $row['path']; ?>" alt="">
                                        </div>
                                    <?php
                                        }
                                    ?>
								</pre>
                            </div><!-- end answer-body -->
                        </div><!-- end answer-body-wrap -->
                    </div><!-- end answer-wrap -->
                    <?php }?>
                    <div class="subheader">
                        <div class="subheader-title">
                            <h3 class="fs-16">Your Answer</h3>
                        </div><!-- end subheader-title -->
                    </div><!-- end subheader -->

                    <div class="post-form">
                        <form method="post" action="question_details.php" enctype="multipart/form-data" class="pt-3">
							<div class="input-box">
								<label class="fs-14 text-black fw-medium mb-0">Answer Title</label>
								<div class="form-group">
									<input class="form-control form--control" type="text" name="AnswerTitle" placeholder="Answer Title Here">
								</div>
							</div>
							<input type="hidden" name="question_id" value=" <?php echo $_GET['id'];  ?>">

							<div class="input-box">
								<label class="fs-14 text-black lh-20 fw-medium">Body</label>
								<div class="form-group">
									<textarea class="form-control form--control form-control-sm fs-13 user-text-editor" name="body" rows="6" placeholder="Your answer here..."></textarea>
								</div>
							</div>
							<div class="input-box">
								<label class="fs-14 text-black fw-medium">Image</label>
								<div class="form-group">
									<div class="file-upload-wrap file-upload-layout-2">
										<input type="file" name="image" class="file-upload-input">
										<span class="file-upload-text d-flex align-items-center justify-content-center"><i class="la la-cloud-upload mr-2 fs-24"></i>Drop files here or click to upload.</span>
									</div>
								</div>
							</div>
                            <?php if(isset($_SESSION['name'])){?>
							    <button class="btn theme-btn theme-btn-sm" name="post_btn" type="submit">Post Your Answer</button>
                            <?php } ?>
						</form>
                    </div>
                </div><!-- end question-main-bar -->
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end question-area -->
<!-- ================================
         END QUESTION AREA
================================= -->

<input type="hidden" value="<?php echo $data['question_id']; ?>" id="qu-id">

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Rate Answer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="d-flex justify-content-center ratin-wrapper">
            <input type="radio" class="star" rate="5" id="star-5"><label for="star-5"></label>
            <input type="radio" class="star" rate="4" id="star-4"><label for="star-4"></label>
            <input type="radio" class="star" rate="3" id="star-3"><label for="star-3"></label>
            <input type="radio" class="star" rate="2" id="star-2"><label for="star-2"></label>
            <input type="radio" class="star" rate="1" id="star-1"><label for="star-1"></label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary rating-post">Post</button>
      </div>
    </div>
  </div>
</div>

<form id="rating-form" hidden>
    <input type="text" name="rate" id="rate">
    <input type="text" name="answer" id="answer">
    <input type="text" name="client" value="<?php echo $_SESSION['record']; ?>">
</form>


<?php
 ob_start();
?>

<script src="js/jquery-te-1.4.0.min.js"></script>
<script src="js/upvote.vanilla.js"></script>
<script src="js/upvote-script.js"></script>
<script src="js/selectize.min.js"></script>
<script src="js/jquery.multi-file.min.js"></script>

<script>
    $(document).ready(function(){
        let qu_id = $('#qu-id').val();
        $.get('add_view.php?id=' + qu_id, function(){

        });
    });

    $('.correct-answer').click(function() {
        let id = $(this).attr('data-id');
        $.get('checkAnswer.php?id=' + id, function(data){
            location.reload();
        });
    });
    
    $('.rate-btn').click(function(){
        $('#answer').val($(this).attr('answer'));
        $('#exampleModal').modal('show');
    });

    $('.star').click(function(){
        $('#rate').val($(this).attr('rate'));
    });

    $('.rating-post').click(function(){
        $.post('add_rating.php', $('#rating-form').serialize(), function(data){
            if(data == 'inserted'){
                console.log('insertaksljdhfalkdjf');
            }else{
                location.reload();
            }
        });
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

<?php }else{ header('location: login.php'); } ?>
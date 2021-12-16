<?php
    require('connection.php');
    if(!isset($_SESSION['name'])){
    ob_start();
?>

<?php
    ob_start();
?>
    <link rel="stylesheet" href="custom.css">
<?php
	$styles = ob_get_contents();
	ob_end_clean();
?>

<section class="sign-up-area pt-80px pb-80px position-relative">
    <div class="container">
        <form action="register_code.php" method="post" class="card card-item">
            <div class="card-body row p-0">
                <div class="col-lg-6">
                    <div class="form-content py-4 pr-60px pl-60px border-right border-right-gray h-100 d-flex align-items-center justify-content-center">
                        <img src="images/undraw-remotely.svg" alt="Image" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-5 mx-auto">
                    <div class="form-action-wrapper py-5">
                        <div class="form-group">
                            <h3 class="fs-22 pb-3 fw-bold">Join the Disilab Community</h3>
                            <div class="divider"><span></span></div>
                            <p class="pt-3">Give us some of your information to get free access to Disilab.</p>
                        </div>
                        
                        <div class="form-group">
                            <label class="fs-14 text-black fw-medium lh-18">Your name</label>
                            <input type="name" name="name" class="form-control form--control" id="your-name-inp" autocomplete="off" placeholder="Enter name">
                            <h6 id="your-name" class="error_message">
                                Enter Your Name.
                            </h6>
                        </div>
						
						 <div class="form-group">
                            <label class="fs-14 text-black fw-medium lh-18">Phone No</label>
                            <input type="number" name="phone" class="form-control form--control" id="phone" autocomplete="off" placeholder="Enter phone">
                            <h6 id="phone-error" class="error_message">
                                Enter Phone No.
                            </h6>
                        </div>

                        <div class="form-group">
                            <label class="fs-14 text-black fw-medium lh-18">Email</label>
                            <input type="name" name="email" autocomplete="off" id="email" class="form-control form--control" placeholder="Email address">
                            <h6 id="emailcheck" class="error_message">
                                Enter Your Email.
                            </h6>
                        </div>

                        <?php
                            require('connection.php');
                            $sql = "SELECT * FROM users";
                            $run = mysqli_query($conn, $sql);
							$count = mysqli_num_rows($run);

                            if($count == 0){
                        ?>
						    <input type="hidden" name="type" value="1">
                        <?php } ?>
                        <div class="form-group">
                            <label class="fs-14 text-black fw-medium lh-18">Password</label>
                            <div class="input-group mb-1">
                                <input class="form-control form--control password-field" autocomplete="off" type="password" name="password" id="password" placeholder="Password">
                                <div class="input-group-append">
                                    <button class="btn theme-btn-outline theme-btn-outline-gray toggle-password" type="button">
                                        <svg class="eye-on" xmlns="http://www.w3.org/2000/svg" height="22px" viewBox="0 0 24 24" width="22px" fill="#7f8897"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 6c3.79 0 7.17 2.13 8.82 5.5C19.17 14.87 15.79 17 12 17s-7.17-2.13-8.82-5.5C4.83 8.13 8.21 6 12 6m0-2C7 4 2.73 7.11 1 11.5 2.73 15.89 7 19 12 19s9.27-3.11 11-7.5C21.27 7.11 17 4 12 4zm0 5c1.38 0 2.5 1.12 2.5 2.5S13.38 14 12 14s-2.5-1.12-2.5-2.5S10.62 9 12 9m0-2c-2.48 0-4.5 2.02-4.5 4.5S9.52 16 12 16s4.5-2.02 4.5-4.5S14.48 7 12 7z"/></svg>
                                        <svg class="eye-off" xmlns="http://www.w3.org/2000/svg" height="22px" viewBox="0 0 24 24" width="22px" fill="#7f8897"><path d="M0 0h24v24H0V0zm0 0h24v24H0V0zm0 0h24v24H0V0zm0 0h24v24H0V0z" fill="none"/><path d="M12 6c3.79 0 7.17 2.13 8.82 5.5-.59 1.22-1.42 2.27-2.41 3.12l1.41 1.41c1.39-1.23 2.49-2.77 3.18-4.53C21.27 7.11 17 4 12 4c-1.27 0-2.49.2-3.64.57l1.65 1.65C10.66 6.09 11.32 6 12 6zm-1.07 1.14L13 9.21c.57.25 1.03.71 1.28 1.28l2.07 2.07c.08-.34.14-.7.14-1.07C16.5 9.01 14.48 7 12 7c-.37 0-.72.05-1.07.14zM2.01 3.87l2.68 2.68C3.06 7.83 1.77 9.53 1 11.5 2.73 15.89 7 19 12 19c1.52 0 2.98-.29 4.32-.82l3.42 3.42 1.41-1.41L3.42 2.45 2.01 3.87zm7.5 7.5l2.61 2.61c-.04.01-.08.02-.12.02-1.38 0-2.5-1.12-2.5-2.5 0-.05.01-.08.01-.13zm-3.4-3.4l1.75 1.75c-.23.55-.36 1.15-.36 1.78 0 2.48 2.02 4.5 4.5 4.5.63 0 1.23-.13 1.77-.36l.98.98c-.88.24-1.8.38-2.75.38-3.79 0-7.17-2.13-8.82-5.5.7-1.43 1.72-2.61 2.93-3.53z"/></svg>
                                    </button>
                                </div>
                            </div>
                            <h6 id="passCheck" class="error_message">
                                Enter Your Password.
                            </h6>
                        </div>

                        <?php
                            if (@$_GET['faild'] == true) {
                        ?>
                            <div class="alert-danger text-danger text-center py-1 mb-4"><?php echo $_GET['faild'] ?></div>   
                        <?php } ?>

                        <div class="form-group">
                            <button class="btn theme-btn w-100" type="submit" id="re-submit">Sign up <i class="la la-arrow-right icon ml-1"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <p class="text-black text-center fs-15">Already have an account? <a href="login.php" class="text-color hover-underline">Log in</a></p>
    </div>
    <div class="position-absolute top-0 left-0 w-100 h-100 z-index-n1">
        <svg class="w-100 h-100" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M1200 120L0 16.48 0 0 1200 0 1200 120z" fill="#2d86eb" opacity="0.06"></path>
        </svg>
    </div>
</section>

<?php
    ob_start();
?>
    <script src="validation/register.js"></script>
<?php
	$scripts = ob_get_contents();
	ob_end_clean();
?>

<?php
    $dashboard = ob_get_contents();
    ob_end_clean();
    include('index.php');
?>

<?php }else{ header('location: dashboard.php'); } ?>
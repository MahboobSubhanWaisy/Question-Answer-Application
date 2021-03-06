<?php
    require('connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="TechyDevs">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Q & A</title>

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&amp;display=swap" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" sizes="16x16" href="images/favicon.png">

    <!-- inject:css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/line-awesome.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
	
	<?php
        if(isset($styles)){
            echo $styles;
        }
	?>
    <link rel="stylesheet" href="custom.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- end inject -->
</head>
<body>

<!-- start cssload-loader -->
<div id="preloader">
    <div class="loader">
        <svg class="spinner" viewBox="0 0 50 50">
            <circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="5"></circle>
        </svg>
    </div>
</div>
<!-- end cssload-loader -->

<!--======================================
        START HEADER AREA
    ======================================-->
<header class="header-area bg-dark">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-2">
                <div class="logo-box">
                    <a href="dashboard.php" class="logo">
                        <!-- <img src="images/logo-white.png" alt="logo"> -->
                        <span class="brand-text">Q</span><span class="brand-and">&</span><span class="brand-text">A</span>
                    </a>
                    <div class="user-action">
                        <div class="search-menu-toggle icon-element icon-element-xs shadow-sm mr-1" data-toggle="tooltip" data-placement="top" title="Search">
                            <i class="la la-search"></i>
                        </div>
                        <div class="off-canvas-menu-toggle icon-element icon-element-xs shadow-sm" data-toggle="tooltip" data-placement="top" title="Main menu">
                            <i class="la la-bars"></i>
                        </div>
                    </div>
                </div>
            </div><!-- end col-lg-2 -->
            <div class="col-lg-10">
                <div class="menu-wrapper">
                    <nav class="menu-bar mr-auto menu-bar-white">
                        <ul>
                            <li>
                                <a href="dashboard.php">Home</a>
                            </li>
                            <li class="is-mega-menu">
                                <a href="questions.php">Question</a>
                            </li>
                            <li>
                                <a href="companies.php">Companies</a>
                            </li>
							
							<li>
                                <a href="jobs.php">Jobs</a>
                            </li>
							
                        </ul><!-- end ul -->
                    </nav><!-- end main-menu -->
                    <form method="post" class="mr-4">
                        <div class="form-group mb-0">
                            <input class="form-control form--control form--control-bg-gray text-white" type="text" name="search" placeholder="Type your search words...">
                            <button class="form-btn text-white-50" type="button"><i class="la la-search"></i></button>
                        </div>
                    </form>
                    <div class="nav-right-button">
                        <?php
                            if(isset($_SESSION['name'])){
                                $email = $_SESSION['name'];
                                $sql = "SELECT users.id, client_info.fall_name, client_info.photo FROM `users` INNER JOIN client_info ON client_info.cl_id = users.record_id WHERE users.email = '$email' limit 0,1";
                                $query = mysqli_query($conn, $sql);
                                $data = mysqli_fetch_array($query);
                        ?>
                        <div class="dropdown user-dropdown">
                            <a class="nav-link dropdown-toggle dropdown--toggle pl-2" href="#" id="userMenuDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="media media-card media--card shadow-none mb-0 rounded-0 align-items-center bg-transparent">
                                    <div class="media-img media-img-xs flex-shrink-0 rounded-full mr-2">
                                        <?php if($data['photo'] == ''){ ?>
                                            <img src="images/user_default.jpg" alt="avatar" class="rounded-full">
                                        <?php }else{ ?>
                                            <img src="images/<?php echo $data['photo']; ?>" alt="avatar" class="rounded-full">
                                        <?php } ?>
                                    </div>
                                    <div class="media-body p-0 border-left-0">
                                        <h5 class="fs-14 text-white"><?php echo $data['fall_name']; ?></h5>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown--menu dropdown-menu-right mt-3 keep-open" aria-labelledby="userMenuDropdown">
                                <h6 class="dropdown-header">Hi, <?php echo $data['fall_name']; ?></h6>
                                <div class="dropdown-divider border-top-gray mb-0"></div>
                                <div class="dropdown-item-list">
                                    <a class="dropdown-item" href="profile.php?id=<?php echo $data['id']; ?>"><i class="la la-user mr-2"></i>Profile</a>
                                    <!-- <a class="dropdown-item" href="notifications.html"><i class="la la-bell mr-2"></i>Notifications</a> -->
                                    <a class="dropdown-item" href="chatUsers.php"><i class="la la-comments mr-2"></i>Chat</a>
                                    <a class="dropdown-item" href="logout.php"><i class="la la-power-off mr-2"></i>Log out</a>
                                </div>
                            </div>
                        </div>
                        <?php 
                            }else {
                        ?>
                            <a href="login.php" class="btn theme-btn theme-btn-outline theme-btn-outline-white mr-2"><i class="la la-sign-in mr-1"></i> Login</a>
                            <a href="register.php" class="btn theme-btn theme-btn-white" ><i class="la la-user mr-1"></i> Sign up</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="off-canvas-menu custom-scrollbar-styled">
        <div class="off-canvas-menu-close icon-element icon-element-sm shadow-sm" data-toggle="tooltip" data-placement="left" title="Close menu">
            <i class="la la-times"></i>
        </div>
        <ul class="generic-list-item off-canvas-menu-list pt-90px">
            <li>
                <a href="dashboard.php">Home</a>
            </li>
            <li class="is-mega-menu">
                <a href="questions.php">Question</a>
            </li>
            <li>
                <a href="companies.php">Companies</a>
            </li>
            <li>
                <a href="jobs.php">Jobs</a>
            </li>
        </ul>
        <div class="off-canvas-btn-box px-4 pt-5 text-center">
            <a href="login.php" class="btn theme-btn theme-btn-sm theme-btn-outline"><i class="la la-sign-in mr-1"></i> Login</a>
            <span class="fs-15 fw-medium d-inline-block mx-2">Or</span>
            <a href="register.php" class="btn theme-btn theme-btn-sm"><i class="la la-plus mr-1"></i> Sign up</a>
        </div>
    </div><!-- end off-canvas-menu -->
    <div class="mobile-search-form">
        <div class="d-flex align-items-center">
            <form method="post" class="flex-grow-1 mr-3">
                <div class="form-group mb-0">
                    <input class="form-control form--control pl-40px" type="text" name="search" placeholder="Type your search words...">
                    <span class="la la-search input-icon"></span>
                </div>
            </form>
            <div class="search-bar-close icon-element icon-element-sm shadow-sm">
                <i class="la la-times"></i>
            </div><!-- end off-canvas-menu-close -->
        </div>
    </div><!-- end mobile-search-form -->
    <div class="body-overlay"></div>
</header><!-- end header-area -->
<!--======================================
        END HEADER AREA
======================================-->	
	
	
	<?php
	echo $dashboard;
	?>
	

<!-- ================================
         END FOOTER AREA
================================= -->
<section class="footer-area pt-80px bg-dark position-relative">
    <span class="vertical-bar-shape vertical-bar-shape-1"></span>
    <span class="vertical-bar-shape vertical-bar-shape-2"></span>
    <span class="vertical-bar-shape vertical-bar-shape-3"></span>
    <span class="vertical-bar-shape vertical-bar-shape-4"></span>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 responsive-column-half">
                <div class="footer-item">
                    <h3 class="fs-18 fw-bold pb-2 text-white">Company</h3>
                    <ul class="generic-list-item generic-list-item-hover-underline pt-3 generic-list-item-white">
                        <li><a href="about.html">About</a></li>
                        <li><a href="contact.html">Contact</a></li>
                        <li><a href="careers.html">Careers</a></li>
                        <li><a href="advertising.html">Advertising</a></li>
                    </ul>
                </div><!-- end footer-item -->
            </div><!-- end col-lg-4 -->
            
            <div class="col-lg-4 responsive-column-half">
                <div class="footer-item">
                    <h3 class="fs-18 fw-bold pb-2 text-white">Help</h3>
                    <ul class="generic-list-item generic-list-item-hover-underline pt-3 generic-list-item-white">
                        <li><a href="faq.html">Knowledge Base</a></li>
                        <li><a href="contact.html">Support</a></li>
                    </ul>
                </div><!-- end footer-item -->
            </div><!-- end col-lg-4 -->
            <div class="col-lg-4 responsive-column-half">
                <div class="footer-item">
                    <h3 class="fs-18 fw-bold pb-2 text-white">Connect with us</h3>
                    <ul class="generic-list-item generic-list-item-hover-underline pt-3 generic-list-item-white">
                        <li><a href="#"><i class="la la-facebook mr-1"></i> Facebook</a></li>
                        <li><a href="#"><i class="la la-twitter mr-1"></i> Twitter</a></li>
                        <li><a href="#"><i class="la la-linkedin mr-1"></i> LinkedIn</a></li>
                        <li><a href="#"><i class="la la-instagram mr-1"></i> Instagram</a></li>
                    </ul>
                </div><!-- end footer-item -->
            </div><!-- end col-lg-4 -->
        </div><!-- end row -->
    </div><!-- end container -->
    <hr class="border-top-gray my-5">
    <div class="container">
        <div class="row align-items-center pb-4 copyright-wrap">
            <div class="col-lg-6">
                <a href="index.html" class="d-inline-block">
                    <!-- <img src="images/logo-white.png" alt="footer logo" class="footer-logo"> -->

<span class="brand-text">Q</span><span class="brand-and">&</span><span class="brand-text">A</span>
                </a>
            </div><!-- end col-lg-6 -->
            <div class="col-lg-6">
                <p class="copyright-desc text-right fs-14">Copyright &copy; 2021</p>
            </div><!-- end col-lg-6 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end footer-area -->
<!-- ================================
          END FOOTER AREA
================================= -->

<!-- start back to top -->
<div id="back-to-top" data-toggle="tooltip" data-placement="top" title="Return to top">
    <i class="la la-arrow-up"></i>
</div>
<!-- end back to top -->

<!-- Modal -->
<div class="modal fade modal-container login-form" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header align-items-center">
                <h5 class="modal-title" id="loginModalTitle">Good to see you again!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="la la-times"></span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post">
                    <div class="form-group">
                        <label class="fs-14 text-black fw-medium lh-18">Email</label>
                        <input class="form-control form--control" type="email" name="email" placeholder="Email address">
                    </div>
                    <div class="form-group">
                        <label class="fs-14 text-black fw-medium lh-18">Password</label>
                        <div class="input-group mb-1">
                            <input class="form-control form--control password-field" type="password" name="password" placeholder="Enter password">
                            <div class="input-group-append">
                                <button class="btn theme-btn-outline theme-btn-outline-gray toggle-password" type="button">
                                    <svg class="eye-on" xmlns="http://www.w3.org/2000/svg" height="22px" viewBox="0 0 24 24" width="22px" fill="#7f8897"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 6c3.79 0 7.17 2.13 8.82 5.5C19.17 14.87 15.79 17 12 17s-7.17-2.13-8.82-5.5C4.83 8.13 8.21 6 12 6m0-2C7 4 2.73 7.11 1 11.5 2.73 15.89 7 19 12 19s9.27-3.11 11-7.5C21.27 7.11 17 4 12 4zm0 5c1.38 0 2.5 1.12 2.5 2.5S13.38 14 12 14s-2.5-1.12-2.5-2.5S10.62 9 12 9m0-2c-2.48 0-4.5 2.02-4.5 4.5S9.52 16 12 16s4.5-2.02 4.5-4.5S14.48 7 12 7z"/></svg>
                                    <svg class="eye-off" xmlns="http://www.w3.org/2000/svg" height="22px" viewBox="0 0 24 24" width="22px" fill="#7f8897"><path d="M0 0h24v24H0V0zm0 0h24v24H0V0zm0 0h24v24H0V0zm0 0h24v24H0V0z" fill="none"/><path d="M12 6c3.79 0 7.17 2.13 8.82 5.5-.59 1.22-1.42 2.27-2.41 3.12l1.41 1.41c1.39-1.23 2.49-2.77 3.18-4.53C21.27 7.11 17 4 12 4c-1.27 0-2.49.2-3.64.57l1.65 1.65C10.66 6.09 11.32 6 12 6zm-1.07 1.14L13 9.21c.57.25 1.03.71 1.28 1.28l2.07 2.07c.08-.34.14-.7.14-1.07C16.5 9.01 14.48 7 12 7c-.37 0-.72.05-1.07.14zM2.01 3.87l2.68 2.68C3.06 7.83 1.77 9.53 1 11.5 2.73 15.89 7 19 12 19c1.52 0 2.98-.29 4.32-.82l3.42 3.42 1.41-1.41L3.42 2.45 2.01 3.87zm7.5 7.5l2.61 2.61c-.04.01-.08.02-.12.02-1.38 0-2.5-1.12-2.5-2.5 0-.05.01-.08.01-.13zm-3.4-3.4l1.75 1.75c-.23.55-.36 1.15-.36 1.78 0 2.48 2.02 4.5 4.5 4.5.63 0 1.23-.13 1.77-.36l.98.98c-.88.24-1.8.38-2.75.38-3.79 0-7.17-2.13-8.82-5.5.7-1.43 1.72-2.61 2.93-3.53z"/></svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group d-flex align-items-center justify-content-between">
                        <div class="custom-control custom-checkbox fs-14">
                            <input type="checkbox" class="custom-control-input" id="rememberMe">
                            <label class="custom-control-label custom--control-label" for="rememberMe">Remember me!</label>
                        </div>
                        <a href="javascript:void(0)" class="lost-pass-btn fs-14 hover-underline">Forgot Password?</a>
                    </div>
                    <div class="btn-box">
                        <button type="submit" class="btn theme-btn w-100">
                            Login to Account <i class="la la-arrow-right icon ml-1"></i>
                        </button>
                    </div>
                    <p class="create-account-text text-right fs-14 pt-1">
                        New to disilab? <a class="signup-btn text-color hover-underline" href="javascript:void(0)">Create account</a>
                    </p>
                    <div class="icon-element my-4 mx-auto shadow-sm fs-25">Or</div>
                    <div class="text-center">
                        <p class="fs-15 pb-3">Login with your social network</p>
                        <button class="btn theme-btn bg-8 mb-2 mr-2"><i class="la la-facebook mr-1"></i> Facebook</button>
                        <button class="btn theme-btn bg-9 mb-2 mr-2"><i class="la la-twitter mr-1"></i> Twitter</button>
                        <button class="btn theme-btn bg-10 mb-2 mr-2"><i class="la la-google mr-1"></i> Google</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade modal-container signup-form" id="signUpModal" tabindex="-1" role="dialog" aria-labelledby="signUpModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header align-items-center">
                <h5 class="modal-title" id="signUpModalTitle">Welcome! create your account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="la la-times"></span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post">
                    <div class="form-group">
                        <label class="fs-14 text-black fw-medium lh-18">Name</label>
                        <input class="form-control form--control" type="text" name="text" placeholder="Your name">
                    </div>
                    <div class="form-group">
                        <label class="fs-14 text-black fw-medium lh-18">Email</label>
                        <input class="form-control form--control" type="email" name="email" placeholder="Email address">
                    </div>
                    <div class="form-group">
                        <label class="fs-14 text-black fw-medium lh-18">Password</label>
                        <div class="input-group mb-1">
                            <input class="form-control form--control password-field" type="password" name="password" placeholder="Enter password">
                            <div class="input-group-append">
                                <button class="btn theme-btn-outline theme-btn-outline-gray toggle-password" type="button">
                                    <svg class="eye-on" xmlns="http://www.w3.org/2000/svg" height="22px" viewBox="0 0 24 24" width="22px" fill="#7f8897"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 6c3.79 0 7.17 2.13 8.82 5.5C19.17 14.87 15.79 17 12 17s-7.17-2.13-8.82-5.5C4.83 8.13 8.21 6 12 6m0-2C7 4 2.73 7.11 1 11.5 2.73 15.89 7 19 12 19s9.27-3.11 11-7.5C21.27 7.11 17 4 12 4zm0 5c1.38 0 2.5 1.12 2.5 2.5S13.38 14 12 14s-2.5-1.12-2.5-2.5S10.62 9 12 9m0-2c-2.48 0-4.5 2.02-4.5 4.5S9.52 16 12 16s4.5-2.02 4.5-4.5S14.48 7 12 7z"/></svg>
                                    <svg class="eye-off" xmlns="http://www.w3.org/2000/svg" height="22px" viewBox="0 0 24 24" width="22px" fill="#7f8897"><path d="M0 0h24v24H0V0zm0 0h24v24H0V0zm0 0h24v24H0V0zm0 0h24v24H0V0z" fill="none"/><path d="M12 6c3.79 0 7.17 2.13 8.82 5.5-.59 1.22-1.42 2.27-2.41 3.12l1.41 1.41c1.39-1.23 2.49-2.77 3.18-4.53C21.27 7.11 17 4 12 4c-1.27 0-2.49.2-3.64.57l1.65 1.65C10.66 6.09 11.32 6 12 6zm-1.07 1.14L13 9.21c.57.25 1.03.71 1.28 1.28l2.07 2.07c.08-.34.14-.7.14-1.07C16.5 9.01 14.48 7 12 7c-.37 0-.72.05-1.07.14zM2.01 3.87l2.68 2.68C3.06 7.83 1.77 9.53 1 11.5 2.73 15.89 7 19 12 19c1.52 0 2.98-.29 4.32-.82l3.42 3.42 1.41-1.41L3.42 2.45 2.01 3.87zm7.5 7.5l2.61 2.61c-.04.01-.08.02-.12.02-1.38 0-2.5-1.12-2.5-2.5 0-.05.01-.08.01-.13zm-3.4-3.4l1.75 1.75c-.23.55-.36 1.15-.36 1.78 0 2.48 2.02 4.5 4.5 4.5.63 0 1.23-.13 1.77-.36l.98.98c-.88.24-1.8.38-2.75.38-3.79 0-7.17-2.13-8.82-5.5.7-1.43 1.72-2.61 2.93-3.53z"/></svg>
                                </button>
                            </div>
                        </div>
                        <p class="fs-14 lh-20">Your password must be at least 6 characters long and must contain letters, numbers and special characters. Cannot contain whitespace.</p>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox fs-14">
                            <input type="checkbox" class="custom-control-input" id="agreeCheckBox">
                            <label class="custom-control-label custom--control-label" for="agreeCheckBox">By signing up, you agree to our <a href="privacy-policy.html" class="text-color hover-underline">Privacy Policy.</a></label>
                        </div>
                    </div>
                    <div class="btn-box">
                        <button type="submit" class="btn theme-btn w-100">
                            Register Account <i class="la la-arrow-right icon ml-1"></i>
                        </button>
                    </div>
                    <p class="create-account-text text-right fs-14">
                        Already on disilab? <a class="login-btn text-color hover-underline" href="javascript:void(0)">Log in</a>
                    </p>
                    <div class="icon-element my-4 mx-auto shadow-sm fs-25">Or</div>
                    <div class="text-center">
                        <p class="fs-15 pb-3">Create account with your social network</p>
                        <button class="btn theme-btn bg-8 mb-2 mr-2"><i class="la la-facebook mr-1"></i> Facebook</button>
                        <button class="btn theme-btn bg-9 mb-2 mr-2"><i class="la la-twitter mr-1"></i> Twitter</button>
                        <button class="btn theme-btn bg-10 mb-2 mr-2"><i class="la la-google mr-1"></i> Google</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade modal-container recover-form" id="recoverModal" tabindex="-1" role="dialog" aria-labelledby="recoverModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header align-items-center">
                <h5 class="modal-title" id="recoverModalTitle">Reset password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="la la-times"></span>
                </button>
            </div>
            <div class="modal-body">
                <p class="fs-15 lh-20 pb-3">
                    Enter your username or email to reset your password.
                    You will receive an email with instructions on how to reset your password. If you are experiencing problems
                    resetting your password <a href="contact.html" class="text-color hover-underline">contact us</a> or <a href="#" class="text-color hover-underline">send us an email</a>
                </p>
                <form method="post">
                    <div class="form-group">
                        <label class="fs-14 text-black fw-medium lh-18">Email</label>
                        <input class="form-control form--control" type="text" name="text" placeholder="Email address">
                    </div>
                    <div class="btn-box">
                        <button type="submit" class="btn theme-btn w-100">
                            Get New Password <i class="la la-arrow-right icon ml-1"></i>
                        </button>
                        <p class="create-account-text text-right fs-14">
                            Not a member? <a class="text-color signup-btn hover-underline" href="javascript:void(0)">Create account</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- template js files -->
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.lazy.min.js"></script>
<script src="js/main.js"></script>
	
	<?php

        if(isset($scripts)){
            echo $scripts;
        }
	
	?>
	
</body>

</html>	
	
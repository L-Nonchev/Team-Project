<?php
// !-- =-=-=-=-=-=-=Login validation=-=-=-=-=-=-= --
session_start();
if (!isset($_SESSION['user_id'])){
	header('Location: ./index.php');
	die();
	// !-- =-=-=-=-=-=-=END of Login validation=-=-=-=-=-=-= --

}else {
	// !-- =-=-=-=-=-=-=Login information retrive=-=-=-=-=-=-= --
	require './db_connection.php';
	require_once './php/updateuserimage.php';
	$user_id = $_SESSION['user_id'];
	
	$userName = db_user_name($user_id);
	

	// !-- =-=-=-=-=-=-=Login information retrive  END=-=-=-=-=-=-= --
	
	// !-- =-=-=-=-=-=-= Change user =-=-=-=-=-=-= --
		// image
	$error= "";
	$passwordMesage = "";

	if (isset($_POST['submit'])){
		if (isset($_FILES['picture'])){
		
			// user pic
			$fileOnServer = $_FILES['picture']['tmp_name'];
			$fileRealName = $_FILES['picture']['name'];
			
			if (!empty($fileOnServer)){
				$error = updateProfilImage($user_id, $fileOnServer, $fileRealName);		
			}
		}
		
		if (isset($_POST['password']) && isset($_POST['re-password'])){
			if (strlen($_POST['password']) > 7 && strlen($_POST['re-password']) > 7){
			
				$password1 = htmlentities($_POST['password']);
				$password2 = htmlentities($_POST['re-password']);
				
				if ($password1 === $password2){
					
					$passwordMesage = updatePassword ($user_id, $password1);
					
				}else{
					$passwordMesage = "Passwords are not the same.";
				}
			}else{
				$passwordMesage = "The password must be more than 7 characters.";
			}
		}
	}

	$profilePicture = db_user_picture_address($user_id);
	
	
	
	
	
	//<!-- =-=-=-=-=-=-=  NEWS =-=-=-=-=-=-= -->\\
	include 'php/lastNews.php';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<!--[if IE]>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<![endif]-->

<meta name="description" content="">
<meta name="author" content="ScriptsBundle">
<title>Smart Money </title>
<!-- =-=-=-=-=-=-= Favicons Icon =-=-=-=-=-=-= -->
<link rel="icon" href="images/icon.png" type="image/x-icon" />
<!-- =-=-=-=-=-=-= Mobile Specific =-=-=-=-=-=-= -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<!-- =-=-=-=-=-=-= Bootstrap CSS Style =-=-=-=-=-=-= -->
<link rel="stylesheet" href="css/bootstrap.css">
<!-- =-=-=-=-=-=-= Template CSS Style =-=-=-=-=-=-= -->
<link rel="stylesheet" href="css/style.css">
<!-- =-=-=-=-=-=-= Font Awesome =-=-=-=-=-=-= -->
<link rel="stylesheet" href="css/font-awesome.css" type="text/css">
<!-- =-=-=-=-=-=-= Et Line Fonts =-=-=-=-=-=-= -->
<link rel="stylesheet" href="css/et-line-fonts.css" type="text/css">
<!-- =-=-=-=-=-=-= Magnific PopUP CSS =-=-=-=-=-=-= -->
<link href="js/magnific-popup/magnific-popup.css" rel="stylesheet">
<!-- =-=-=-=-=-=-= Owl carousel =-=-=-=-=-=-= -->
<link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="css/owl.style.css">
<!-- =-=-=-=-=-=-= Google Fonts =-=-=-=-=-=-= -->
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400italic,600,600italic,700,700italic,900italic,900,300,300italic%7CMerriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css">
<!-- =-=-=-=-=-=-= Flat Icon =-=-=-=-=-=-= -->
<link href="css/flaticon.css" rel="stylesheet">
<!-- Theme Color -->
<link rel="stylesheet" id="color" href="css/colors/defualt.css">
<!-- Animation Css -->
<link href="css/animate.min.css" rel="stylesheet">
<!-- Menu Hover -->
<link href="css/bootstrap-dropdownhover.min.css" rel="stylesheet">
<!-- =-=-=-=-=-=-= Select Options =-=-=-=-=-=-= -->
<link href="css/select2.min.css" rel="stylesheet" />
<!-- JavaScripts -->
<script src="js/modernizr.js"></script>
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
   <body>
    <!-- =-=-=-=-=-=-= PRELOADER =-=-=-=-=-=-= -->
       <!-- <div class="preloader"><span class="preloader-gif"></span></div> -->

      <!-- =-=-=-=-=-=-= HEADER =-=-=-=-=-=-= -->
      <div id="header-info-bar">
         <div class="container">
         	<div class="col-md-6 col-sm-6 col-xs-12">
            <ul class="header-social pull-left">
               <li><a href="https://twitter.com/S_M_Managment" class="social-twitter"  target="blank">
               <i class="fa fa-twitter"></i></a></li>
               <li><a href="https://www.facebook.com/SMManagmetn/" class="social-facebook"  target="blank">
               <i class="fa fa-facebook" ></i></a></li>
               <li><a href="https://www.youtube.com/channel/UCebM3sL3ASfzAQ0YYD7m6Og" class="social-youtube"  target="blank">
               <i class="fa fa-youtube"></i></a></li>
            </ul>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
             <a href="./php/logOut.php" class="info-bar-meta-link"><i class="fa fa-caret-right fa-fw"></i>Log Out</a>
             <a href="./settings.php" class="info-bar-meta-link"><i class="fa fa-caret-right fa-fw"></i>Settings</a>
            </div>
         </div>
      </div>
      <header class="header-area">
          <!-- Logo Bar -->
         <div class="logo-bar">
            <div class="container clearfix">
               <!-- Logo -->
               <div class="logo">
                  <a href="index.php"><img src="images/logo.png" alt="logo of the company"></a>
               </div>
               <!--Info Outer-->
               	
				<div class="information-content">
                  <!--Client Info Box-->
                  <div class="info-box  hidden-sm">
                     <div class="icon"><img src="<?=$profilePicture ?>" alt="prifile" /></div>
                     <div class="text"><?= $userName ?></div>                    
                  </div>
               </div>
            </div>
         </div>
         <!-- Header Top End -->
         <!-- Menu Section -->
         <div class="navigation-2">
            <!-- navigation-start -->
            <nav class="navbar navbar-default ">
               <div class="container">
                  <!-- Brand and toggle get grouped for better mobile display -->
                  <div class="navbar-header">
                     <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-navigation" aria-expanded="false">
                     <span class="sr-only">Toggle navigation</span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     </button>
                  </div>
                  <!-- Collect the nav links, forms, and other content for toggling -->
                  <div class="collapse navbar-collapse" id="main-navigation">
                     <ul class="nav navbar-nav">
                        <li class="dropdown">
                           <a  href="index.php" >Home </a>
                        </li>
                        
                        <li class="dropdown">
                        	<a href="about.php">About </a>
                        </li>
            
                        <li class="dropdown ">
						<a href="blog.php">Blog</a>
                        </li>
                        <li><a href="contact.php">Contact Us</a></li>
                     </ul>
                  </div>
                  <!-- /.navbar-collapse -->
               </div>
               <!-- /.container-end -->
            </nav>
         </div>
         <!-- /.navigation-end -->
         <!-- Menu  End -->
      </header>
      <!-- =-=-=-=-=-=-= HEADER END =-=-=-=-=-=-= -->
      <!-- =-=-=-=-=-=-= PAGE BREADCRUMB =-=-=-=-=-=-= -->
      <section class="breadcrumbs-area parallex">
         <div class="container">
            <div class="row">
               <div class="page-title">
                  <div class="col-sm-12 col-md-6 page-heading text-left">
                     <h2>Settings</h2>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- =-=-=-=-=-=-= PAGE BREADCRUMB END =-=-=-=-=-=-= -->

      <!-- =-=-=-=-=-=-= Contact Us =-=-=-=-=-=-= -->
      <section id="contact-us" class="section-padding-70">
         <div class="container">
            <!-- Row -->
            <div class="row">
               <div class="col-md-8 col-xs-12 col-sm-12  ">
                  <form enctype='multipart/form-data' id="setings"  method="post"  action="./settings.php">
                  <div class="row">
                  <p>Change your password:<span class="required"></span></p>
                     <div class="col-sm-6">
                        <!-- passwprd -->
                        <div class="form-group">
                           <label>Password</label>
                           <input type="password" placeholder="Name" id="name" name="password" class="form-control" >
                        </div>
                     </div>
                     <!-- End col-sm-6 -->
                     <div class="col-sm-6">
                        <!-- re-passwprd -->
                        <div class="form-group">
                           <label>Re-Password</label>
                           <input type="password" placeholder="Name" id="name" name="re-password" class="form-control" >
                        </div>
                     </div>
                     <label for=""><?= $passwordMesage ?></label>
                   </div>
                     <!-- End col-sm-6 -->
                      <div class="row">
                      <p>Change your profil picture: <span class="required"></span></p>
                     <div class="col-sm-12">
                        <!-- IMAGE -->
                        <div class="form-group">
                           <input type="hidden" name="MAX_FILE_SIZE" value="8000000" />
							<label>File</label>
							<input type="file" name="picture" accept="image/*" class="loader"/>
							<label for=""><?= $error ?></label>
                        </div>
                     </div>
                     </div>
                     <!-- End col-sm-12 -->

                      <div class="row">
                    	 <div class="col-sm-12">
                       		 <button name="submit" type="submit" id="yes" class="btn btn-primary">Save</button>
                    	 </div>
                     </div>
                     <!-- End col-sm-6 -->
                  </form>
               </div>
            </div>
            <!-- Row End -->
         </div>
         <!-- end container -->
      </section>
      <!-- =-=-=-=-=-=-= Contact Us End =-=-=-=-=-=-= -->

      <!-- =-=-=-=-=-=-= FOOTER =-=-=-=-=-=-= -->
      <footer class="footer-area">
         <!--Footer Upper-->
         <div class="footer-content">
            <div class="container">
               <div class="row clearfix">
                  <!--Two 4th column-->
                  <div class="col-md-6 col-sm-12 col-xs-12">
                     <div class="row clearfix">
                        <div class="col-lg-7 col-sm-6 col-xs-12 column">
                           <div class="footer-widget about-widget">
                              <div class="logo"><a href="index.php"><img alt="" src="images/small_logo.png" class="img-responsive" ></a></div>
                              <ul class="contact-info">
                                 <li><span class="icon fa fa-phone"></span> +359 - 888-333-124</li>
                                 <li><span class="icon fa fa-envelope-o"></span> smart.money.managment@gmai.com</li>
                              </ul>
                              <div class="social-links-two clearfix">
                              <a href="https://www.facebook.com/SMManagmetn/" class="facebook img-circle" target="blank">
                              <span class="fa fa-facebook-f" ></span></a>
                              <a href="https://twitter.com/S_M_Managment" class="twitter img-circle" target="blank"><span class="fa fa-twitter">
                              </span></a>
                              <a href="https://www.youtube.com/channel/UCebM3sL3ASfzAQ0YYD7m6Og" class="google-plus img-circle" target="blank">
                              <span class="fa fa-google-plus"></span></a>
                              </div>
                           </div>
                        </div>
                        <!--Footer Column-->
                        <div class="col-lg-5 col-sm-6 col-xs-12 column">
                          <div class="footer-widget news-widget">
                              <h2>Latest News</h2>
                              <!--News Post-->
                              <div class="news-post">
                                 <div class="icon"></div>
                                 <div class="news-content">
                                    <figure class="image-thumb"><img src="<?= $imgLN[0]?>" alt=""></figure>
                                    <a target="blank" href="<?= $urlLN[0] ?>"><?= $titleLN[0] ?></a>
                                 </div>
                                 <div class="time"><?= $dateLN[0] ?></div>
                              </div>
                              <!--News Post-->
                              <div class="news-post">
                                 <div class="icon"></div>
                                 <div class="news-content">
                                    <figure class="image-thumb"><img src="<?= $imgLN[1]?>" alt=""></figure>
                                    <a target="blank"  href="<?= $urlLN[1] ?>"><?= $titleLN[1] ?></a>
                                 </div>
                                 <div class="time"><?= $dateLN[1] ?></div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!--Two 4th column End-->
                  <!--Two 4th column-->
                  <div class="col-md-6 col-sm-12 col-xs-12">
                     <div class="row clearfix">
                        <!--Footer Column-->
                        <div class="col-lg-7 col-sm-6 col-xs-12 column">
                           <div class="footer-widget news-widget">
                              <h2> <?=  "&nbsp" ?> </h2>
                              <!--News Post-->
                              <div class="news-post">
                                 <div class="icon"></div>
                                 <div class="news-content">
                                    <figure class="image-thumb"><img src="<?= $imgLN[2]?>" alt=""></figure>
                                    <a target="blank" href="<?= $urlLN[2] ?>"><?= $titleLN[2] ?></a>
                                 </div>
                                 <div class="time"><?= $dateLN[2] ?></div>
                              </div>
                              <!--News Post-->
                              <div class="news-post">
                                 <div class="icon"></div>
                                 <div class="news-content">
                                    <figure class="image-thumb"><img src="<?= $imgLN[3]?>" alt=""></figure>
                                    <a target="blank"  href="<?= $urlLN[3] ?>"><?= $titleLN[3] ?> </a>
                                 </div>
                                 <div class="time"><?= $dateLN[3] ?></div>
                              </div>
                           </div>
                        </div>
                        <!--Footer Column-->
                        <div class="col-lg-5 col-sm-6 col-xs-12 column">
                           <div class="footer-widget links-widget">
                              <h2>Site Links</h2>
                              <ul>
                                 <li><a href="index.php">Home</a></li>
                                 <li><a href="about.php">About Us</a></li>
                                 <li><a href="blog.php">blog</a></li>
                                 <li><a href="contact.php">Contact Us</a></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!--Two 4th column End-->
               </div>
            </div>
         </div>
         <!--Footer Bottom-->
         <div class="footer-copyright">
            <div class="auto-container clearfix">
               <!--Copyright-->
               <div class="copyright text-center">Copyright 2017 &copy; Smart Money Managment</div>
            </div>
         </div>
      </footer>

      <!-- =-=-=-=-=-=-= JQUERY =-=-=-=-=-=-= -->
      <script src="js/jquery.min.js"></script>
      <!-- Bootstrap Core Css  -->
      <script src="js/bootstrap.min.js"></script>
      <!-- Dropdown Hover  -->
      <script src="js/bootstrap-dropdownhover.min.js"></script>
      <!-- Jquery Easing -->
      <script type="text/javascript" src="js/easing.js"></script>
      <!-- Jquery Counter -->
      <script src="js/jquery.countTo.js"></script>
      <!-- Jquery Waypoints -->
      <script src="js/jquery.waypoints.js"></script>
      <!-- Jquery Appear Plugin -->
      <script src="js/jquery.appear.min.js"></script>
      <!-- Jquery Shuffle Portfolio -->
      <script src="js/jquery.shuffle.min.js"></script>
      <!-- Carousel Slider  -->
      <script src="js/carousel.min.js"></script>
      <!-- Jquery Migrate -->
      <script src="js/jquery-migrate.min.js"></script>
      <!--Style Switcher -->
      <script src="js/color-switcher.js"></script>
      <!-- Gallery Magnify  -->
      <script src="js/magnific-popup/jquery.magnific-popup.min.js"></script>
      <!-- Sticky Bar  -->
      <script src="js/theia-sticky-sidebar.js"></script>
      <!-- Jquery Select Options  -->
      <script src="js/select2.min.js"></script>
      <!-- Template Core JS -->
      <script src="js/custom.js"></script>

   </body>
</html>

<?php
// !-- =-=-=-=-=-=-=Login validation=-=-=-=-=-=-= --
session_start();
if (!isset($_SESSION['user_id'])){
	header('Location: ./index.php');
	die();
	// !-- =-=-=-=-=-=-=END of Login validation=-=-=-=-=-=-= --

}else {
	// !-- =-=-=-=-=-=-=Login information retrive=-=-=-=-=-=-= --
	require'./db_connection.php';
	$userName = db_user_name($_SESSION['user_id']);
	

	// !-- =-=-=-=-=-=-=Login information retrive  END=-=-=-=-=-=-= --
	
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
             <a href="#" class="info-bar-meta-link"><i class="fa fa-caret-right fa-fw"></i>Setings</a>
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
                     <h3>any question</h3>
                     <h2>Contact  Us</h2>
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
                  <div class="notice success" id="success">
                     <p>Thanks so much for your message. We check e-mail frequently and will try our best to respond to your inquiry.</p>
                  </div>
                  <form id="contactForm"  method="post"  action="#">
                  <div class="row">
                     <div class="col-sm-6">
                        <!-- Name -->
                        <div class="form-group">
                           <label>Name<span class="required">*</span></label>
                           <input type="text" placeholder="Name" id="name" name="name" class="form-control" required>
                        </div>
                     </div>
                     <!-- End col-sm-6 -->
                     <div class="col-sm-6">
                        <!-- Email -->
                        <div class="form-group">
                           <label for="email">Email<span class="required">*</span></label>
                           <input type="email" placeholder="Email" id="email" name="email" class="form-control" required>
                        </div>
                     </div>
                   </div>
                     <!-- End col-sm-6 -->
                      <div class="row">
                     <div class="col-sm-12">
                        <!-- Email -->
                        <div class="form-group">
                           <label>Subject<span class="required">*</span></label>
                           <input type="text" placeholder="Subject" id="subject" name="subject" class="form-control" required>
                        </div>
                     </div>
                     </div>
                     <!-- End col-sm-12 -->
           
                       <!-- End col-sm-6 -->
                        <div class="row">
                     <div class="col-sm-12">
                        <!-- Email -->
                        <div class="form-group">
                           <label>Topic To Discuss <span class="required">*</span></label>
                            <select class="form-control required">
                                 <option>Share Market Trading</option>
                                 <option>Market Hosting</option>
                                 <option>Presidency Share</option>
                                 <option>Other Topic</option>
                              </select>
                        </div>
                     </div>
                     </div>
                     <!-- End col-sm-12 -->
                      <div class="row">
                     <div class="col-sm-12">
                        <!-- Comment -->
                        <div class="form-group">
                           <label>Message<span class="required">*</span></label>
                           <textarea placeholder="Message..." id="message" name="message"  class="form-control" rows="3" required></textarea>
                        </div>
                     </div>
                     </div>
                     <!-- End col-sm-12 -->
                      <div class="row">
                     <div class="col-sm-12">
                        <button type="submit" id="yes" class="btn btn-primary">Send Message</button>
                        <img id="loader" alt="" src="images/loader.gif" class="loader">
                     </div>
                     </div>
                     <!-- End col-sm-6 -->
                  </form>
               </div>
               <div class="col-md-4 col-xs-12 col-sm-12 margin-top-30">

                <div class="location-box"> <a class="media-left pull-left" > <i class=" icon-envelope"></i></a>
                  <div class="media-body"> <strong>OUR CONTACT E-MAIL</strong>
                    <p>smart.money.managment@gmail.com</p>
                  </div>
                </div>
                <div class="location-box"> <a class="media-left pull-left" > <i class="icon-phone"></i></a>
                  <div class="media-body"> <strong>Call us 24/7</strong>
                    <p> +359 - 888-333-124 | +359 - 888-333-125  </p>
                  </div>
                </div>

               </div>
        
               <div class="clearfix"></div>
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

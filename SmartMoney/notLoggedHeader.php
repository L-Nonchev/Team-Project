<?php
// !-- =-=-=-=-=-=-=Login validation=-=-=-=-=-=-= --

if (!isset($_COOKIE['logged-in'])){
	$logged = false;
	// !-- =-=-=-=-=-=-=END of Login validation=-=-=-=-=-=-= --

}else {
	$logged = true;
	// !-- =-=-=-=-=-=-=Login information retrive=-=-=-=-=-=-= --
	$user = $_COOKIE['logged-in'];

	$profilePicture = "./users/".$user."/assets/profilPic/avatar.png";

	$userData = file('./users/' . $user . '/usersData.txt');

	$userName = explode("-", $userData[0]);
	$userName = implode(" ", $userName);

	// !-- =-=-=-=-=-=-=Login information retrive  END=-=-=-=-=-=-= --
}
//<!-- =-=-=-=-=-=-=  NEWS =-=-=-=-=-=-= -->
include 'php/news.php';
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
      <!--  [if IE]>
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <![endif] -->

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
      <!-- =-=-=-=-=-=-= Select Options =-=-=-=-=-=-= -->
      <link href="css/select2.min.css" rel="stylesheet" />
      <!-- Menu Hover -->
      <link href="css/bootstrap-dropdownhover.min.css" rel="stylesheet">
      <!-- Revolution Slider 5.x CSS settings -->
      <!-- For This Page Only -->
      <link  href="js/revolution-slider/css/settings.css" rel="stylesheet" type="text/css"/>
      <link  href="js/revolution-slider/css/navigation.css" rel="stylesheet" type="text/css"/>
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
    
  <!--     <div class="preloader"><span class="preloader-gif"></span></div>     --> 
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
            <?php if ($logged){?>
            <div class="col-md-6 col-sm-6 col-xs-12">
             <a href="./php/logOut.php" class="info-bar-meta-link"><i class="fa fa-caret-right fa-fw"></i>Log Out</a>
            <a href="#" class="info-bar-meta-link"><i class="fa fa-caret-right fa-fw"></i>Recent Events</a>
            <a href="#" class="info-bar-meta-link"><i class="fa fa-caret-right fa-fw"></i>Latest News</a>
            <a href="#" class="info-bar-meta-link hidden-sm"><i class="fa fa-caret-right fa-fw"></i>Relog</a>
            </div>
            <?php }?>
         </div>
      </div>
      <header class="header-area">
         <!-- Logo Bar -->
         <div class="logo-bar">
            <div class="container clearfix">
               <!-- Logo -->
               <div class="logo">
                  <a href="index.html"><img src="images/logo.png" alt="logo of the company"></a>
               </div>
               <?php if ($logged){?>
               <!--Info Outer-->
               	
				<div class="information-content">
                  <!--Client Info Box-->
                  <div class="info-box  hidden-sm">
                     <div class="icon"><img src="<?= $profilePicture ?>" alt="prifile" /></div>
                     <div class="text"> <?= $userName ?></div>                    
                  </div>
               </div>
				<?php }else {?>	
				<div class="information-content">    
                  <!--Log in button-->
					<div class="info-box" data-target="#request-quote" data-toggle="modal" class="quote-button hidden-xs">
						<form action="index.php" method="get">
							<input id="log-button" type="button" name="LogIn"	value="Login" />
						</form>
					</div>
				<!--Sing Up button-->
					<div class="info-box" >
						<form action="index.php" method="get">
						<button id="log-button" type="button" name="SignUp"	value="SignUp" >
						<a href="singup.php">Sing up!</a></button>
						</form>
					</div>
				</div>
				
				<?php }?>
            </div>
         </div>
         <!-- Header Top End -->
        <!-- Menu Section -->
        <?php if ($logged) { ?>
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
                           <a class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown" data-animations="fadeInUp">Our Service <span class="fa fa-angle-down"></span></a>
                           <ul class="dropdown-menu">
                              <li><a href="services.html">Services</a> </li>
                              <li><a href="services-2.html">Services 2</a> </li>
                              <li><a href="services-3.html">Services 3</a> </li>
                              <li><a href="services-4.html">Services 4 (Sticky Bar)</a> </li>
                              <li><a href="services-details.html">Services Detail</a> </li>
                           </ul>
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
         <?php } ?>
         <!-- Menu  End -->
      </header>
      <!-- =-=-=-=-=-=-= HEADER END =-=-=-=-=-=-= -->
<?php
//<!-- =-=-=-=-=-=-=  NEWS =-=-=-=-=-=-= -->
include 'php/topNews.php';
include 'php/lastNews.php';
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
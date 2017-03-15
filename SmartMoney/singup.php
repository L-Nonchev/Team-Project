<?php 
if (isset($_POST['sing-up-button'])){
	$firstName = htmlentities($_POST['first-name']);
	$lastName = htmlentities($_POST['last-name']);
	$email = htmlentities($_POST['email']);
	$password1 = htmlentities($_POST['pasword']);
	$password2 = htmlentities($_POST['repeat-pasword']);
	
	if (strlen($firstName) > 0 && strlen($lastName) > 0 && strlen($email) > 0 && strlen($password1) > 0 && strlen($password2) > 0){
			
			//-=-=-=-=-=-=---==-=-=-= Hash data=-=-=-==-=-==-=-==--\\
			//hash email 
			$mailSha1 = sha1($email);
			// hash passwords
			$passMd5 = md5($password1);
			$paddSha1 = sha1($passMd5);
		
		//-=-=-=-=-=-=---==-=-=-= Check incomig data =-=-=-==-=-==-=-==--\\
		// check to exist incoming input data
		$allData = "";
		$handle = fopen('logIn-data/loginData.txt', 'r');
		while (!feof($handle)){
			$line = fgets($handle);
			$allData = $allData . $line;
		}
		//check to existing e-mail
		if (substr_count($allData, $mailSha1) > 0){
			$email= "";
			$error = "ERROR! <br /> Email alredy exist!";
		} else {
			// check for corec pass
			if ($password1 !== $password2){
				$password1 = '';
				$password2 = '';
				$error = "ERROR! <br /> The password you entered does NOT match! TRY AGAIN.";
			} else {
				
				//-=-=-=-=-=-=---==-=-=-= Creat folder for client =-=-=-==-=-==-=-==--\\
				mkdir('./users/'. $mailSha1 );
				mkdir('./users/'.$mailSha1.'/assets');
				mkdir('./users/'.$mailSha1.'/assets/profilPic');
				$data = $firstName . "-" . $lastName . "-" . PHP_EOL . 
						"income-0-" . PHP_EOL .
						"spend-0-" . PHP_EOL .
						"saved-0-". PHP_EOL;		
				file_put_contents('./users/'.$mailSha1.'/usersData.txt', $data);
				
				
				//-=-=-=-=-=-=---==-=-=-= Cookies =-=-=-==-=-==-=-==--\\
				// creat cookie for client acces
				$cookie_name = "logged-in";
				$cookie_value  = $mailSha1;
				$cookie_exp = time() + 3600; // login time 1hour
				// create cookie
				setcookie($cookie_name, $cookie_value , $cookie_exp , "/");
				
				//-=-=-=-=-=-=---==-=-=-= Creat acount =-=-=-==-=-==-=-==--\\
				// create a data for new User and Password
				$newACC = $mailSha1.$paddSha1;
				file_put_contents('logIn-data/loginData.txt', $newACC . PHP_EOL, FILE_APPEND);
				fclose($handle);
				//-=-=-=-=-=-=---==-=-=-= Redirect =-=-=-==-=-==-=-==--\\
				header('Location: index.php', true, 303);
				die();
				// End creat account
			}
				
		}
		fclose($handle);
		
	} else {
	}
}else {
	$firstName = '';
	$lastName = '';
	$email = '';
	$password1 = '';
	$password2 = '';
	$error = "";
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
         </div>
      </div>
      <header class="header-area">
         <!-- Logo Bar -->
         <div class="logo-bar">
            <div class="container clearfix">
               <!-- Logo -->
               <div class="logo">
                  <a href="index.html"><img src="images/logo.png" alt=""></a>
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
         <!-- Menu  End -->
      </header>
      <!-- =-=-=-=-=-=-= HEADER END =-=-=-=-=-=-= -->
      <!-- =-=-=-=-=-=-= PAGE BREADCRUMB =-=-=-=-=-=-= -->
      <section class="breadcrumbs-area parallex">
         <div class="container">
            <div class="row">
               <div class="page-title">
                  <div class="col-sm-12 col-md-6 page-heading text-left">
                     <h3>Welcome.</h3>
                     <h2>CREATE YOUR ACCOUNT :</h2>
                     <h3><?=  $error ?></h3>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- =-=-=-=-=-=-= PAGE BREADCRUMB END =-=-=-=-=-=-= --> 

      <!-- =-=-=-=-=-=-= Sing Up =-=-=-=-=-=-= -->
      <section id="contact-us" class="section-padding-70">
         <div class="container">
            <!-- Row -->
            <div class="row">
               <div class="col-md-8 col-xs-12 col-sm-12  ">
                  <form id="contactForm"  method="post"  action="singup.php">
                  <div class="row">
                     <div class="col-sm-6">
                        <!-- First Name -->
                        <div class="form-group">
                           <label> First Name<span class="required">*</span></label>
							<input class="form-control" type="text" placeholder="First Name" value="<?= $firstName ?>" name="first-name" required="required">
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <!-- Last Name -->
                        <div class="form-group">
                           <label for="email">Last Name<span class="required">*</span></label>
                           <input class="form-control" type="text" placeholder="Last Name" value="<?= $lastName ?>" name="last-name" required="required">
                        </div>
                     </div>
                   </div> 
                    
                    <div class="row">
                     	<div class="col-sm-12">
                       		 <!-- Email -->
                       		 <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        		 <label>E-mail<span class="required">*</span></label>
                           		<input class="form-control" type="email" placeholder="Email Address" value="<?= $email ?>" name="email" 
                           		id = "e-mail"required="required">
                           </div>
                     	</div>
                     </div>
                     
                       <div class="row">
                     <div class="col-sm-6">
                        <!-- Password -->
                        <div class="form-group" >
                           <label>Password<span class="required">*</span></label>
							<input class="form-control" type="password" placeholder="Pasword" value="<?= $password1 ?>" name="pasword" 
							id="inputPassword1" required="required">
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <!-- Re-Enter Password -->
                        <div class="form-group" >
                           <label>Re-Enter Password<span class="required">*</span></label>
                           <input class="form-control" type="password" placeholder="Repeat pasword" value="<?= $password2 ?>" name="repeat-pasword" 
                           id="inputPassword2" required="required">
                        </div>
                        
                     </div>
                   </div>  
                   <div id="divPassword2"></div>
                     <div class="row">
                     <div id="divPassword2"></div>
                    	 <div class="col-sm-12">
                        	<button type="submit" id="yes" class="btn btn-primary" name="sing-up-button">Sing up!</button>
                        	
                       	 <img id="loader" alt="" src="images/loader.gif" class="loader">
                    	 </div>
                     </div>
                  </form>
               </div>
               <div class="col-md-4 col-xs-12 col-sm-12 margin-top-30">
			   
                <div class="location-box"> <a class="media-left pull-left" href="#"> <i class=" icon-envelope"></i></a>
                  <div class="media-body"> <strong>OUR CONTACT E-MAIL</strong>
                    <p>smart.money.managment@gmail.com</p>
                  </div>
                </div>
                <div class="location-box"> <a class="media-left pull-left" href="#"> <i class="icon-phone"></i></a>
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
      <!-- =-=-=-=-=-=-= Sing Up End =-=-=-=-=-=-= -->
      
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
                              <div class="logo"><a href="index-3.html"><img alt="" src="images/small_logo.png" class="img-responsive" ></a></div>
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
                           <h2>Our Service</h2>
                           <div class="footer-widget links-widget">
                              <ul>
                                 <li><a href="#">Financial Planning</a></li>
                                 <li><a href="#">Saving Solutions</a></li>
                                 <li><a href="#">Private Banking</a></li>
                                 <li><a href="#">Busniess Loan</a></li>
                                 <li><a href="#">Tax Planning</a></li>
                              </ul>
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
                              <h2>Latest News</h2>
                              <!--News Post-->
                              <div class="news-post">
                                 <div class="icon"></div>
                                 <div class="news-content">
                                    <figure class="image-thumb"><img src="images/blog/popular-2.jpg" alt=""></figure>
                                    <a href="#">top benefits of hiring our professional logistics service</a>
                                 </div>
                                 <div class="time">June 21, 2016</div>
                              </div>
                              <!--News Post-->
                              <div class="news-post">
                                 <div class="icon"></div>
                                 <div class="news-content">
                                    <figure class="image-thumb"><img src="images/blog/popular-1.jpg" alt=""></figure>
                                    <a href="#">top benefits of hiring our professional logistics service</a>
                                 </div>
                                 <div class="time">June 21, 2016</div>
                              </div>
                           </div>
                        </div>
                        <!--Footer Column-->
                        <div class="col-lg-5 col-sm-6 col-xs-12 column">
                           <div class="footer-widget links-widget">
                              <h2>Site Links</h2>
                              <ul>
                                 <li><a href="index-3.html">Home</a></li>
                                 <li><a href="about.html">About Us</a></li>
                                 <li><a href="services.html">Our Services</a></li>
                                 <li><a href="contact.html">Contact Us</a></li>
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
      
 	  <!-- =-=-=-=-=-=-= Sing UP validation =-=-=-=-=-=-= --> 
 	  <script src="./js/singup-validation.js" type="text/javascript"></script>
 	  
      <!-- =-=-=-=-=-=-= JQUERY =-=-=-=-=-=-= --> 
      <script src="js/jquery.min.js"></script> 
      <!-- Bootstrap Core Css  --> 
      <script src="js/bootstrap.min.js"></script>
      <!-- Dropdown Hover  -->
      <script src="js/bootstrap-dropdownhover.min.js"></script><!-- Jquery Easing --> 
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
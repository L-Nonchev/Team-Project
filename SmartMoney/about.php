<?php  
			// !-- =-=-=-=-=-=-=Loggedin validation=-=-=-=-=-=-= --
session_start();
if (!isset($_SESSION['user_id'])){
				
	header('Location: ./index.php');
	die();
	
			// !-- =-=-=-=-=-=-=END of Loggedin validation=-=-=-=-=-=-= --
	
}else {
	
			// !-- =-=-=-=-=-=-=Login information retrive=-=-=-=-=-=-= --
	include './db_connection.php';
	include './php_functions.php';
	$user_id = $_SESSION['user_id'];

	$profilePicture = db_user_picture_address($user_id);
	
	$userName = db_user_name($_SESSION['user_id']);
	
	$info = db_request_info($user_id);	
	
	$expenseNames = get_defalt_epense_names();
	
	$incomNames = get_defalt_income_names();
	
	$customEntry = $info;
	
	$allIncome =  $info['IN'];
	$allExpenses =  $info['OUT'];
	
	$sumIN = 0;
	for ($in = 0; $in < count($allIncome); $in++){
		$sumIN += $allIncome[$in]['sum'];
	};
	
	$sumOUT = 0;
	for ($in = 0; $in < count($allExpenses); $in++){
		$sumOUT += $allExpenses[$in]['sum'];
	};
		
	$userIncome =  $sumIN;
	$userЕxpenses = $sumOUT;
	$userSavings = $userIncome - $userЕxpenses;
	
	
	
	
		// !-- =-=-=-=-=-=-=Login information retrive  END=-=-=-=-=-=-= --
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
     <!--  <div class="preloader"><span class="preloader-gif"></span></div> -->
         
      <!-- =-=-=-=-=-=-= HEADER =-=-=-=-=-=-= -->
      <div id="header-info-bar">
         <div class="container">
         	<div class="col-md-6 col-sm-6 col-xs-12">
            <ul class="header-social pull-left">             
               <li><a href="#" class="social-twitter"><i class="fa fa-twitter"></i></a></li>
               <li><a href="#" class="social-facebook"><i class="fa fa-facebook"></i></a></li>
               <li><a href="#" class="social-youtube"><i class="fa fa-youtube"></i></a></li>            
            </ul>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
            <a href="./php/logOut.php" class="info-bar-meta-link"><i class="fa fa-caret-right fa-fw"></i>Log Out</a> 
            </div>
         </div>
      </div>
      <header class="header-area">
         <!-- Logo Bar -->
         <div class="logo-bar">
            <div class="container clearfix">
               <!-- Logo -->
               <div class="logo">
                  <a href="index.html"><img src="images/logo.png" alt="company logo"></a>
               </div>
               <!--Info Outer-->
               <div class="information-content">
                  <!--Info Box-->
                  <div class="info-box  hidden-sm">
                     <div class="icon"><img src="<?php echo $profilePicture?>" alt="Prifile Picture" /></div>
                     <div class="text"><?php echo $userName?></div>                    
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
                        	<a href="blog.php">Blog </a> 
                        </li>       
                        <li><a href="contact.php">Contact Us</a></li>
                     </ul>
                     <a  href="online-booking.html"  class="btn btn-primary pull-right"><span class="hidden-sm">Get An </span>Appointment</a> 
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
      
      <!-- =-=-=-=-=-=-= SEPARATOR Montly stats =-=-=-=-=-=-= -->
      <div class="parallex section-padding fun-facts-bg text-center" >
         <div class="container">
            <div class="row">
               <!-- countTo -->
               <div class="col-xs-6 col-sm-3 col-md-3">
                  <div class="statistic-percent" data-perc="<?php echo $userIncome;?>">
                     <div class="facts-icons"> <span class="flaticon-notes-1"></span> </div>
                     <div class="fact">
                        <span class="percentfactor">0</span>
                        <p>Montly Income</p>
                     </div>
                     <!-- end fact -->
                  </div>
                  <!-- end statistic-percent -->
               </div>
               <!-- end col-xs-6 col-sm-3 col-md-3 -->
               <!-- countTo -->
               <div class="col-xs-6 col-sm-3 col-md-3">
                  <div class="statistic-percent" data-perc="<?php echo $userЕxpenses;?>">
                     <div class="facts-icons"> <span class="flaticon-receipt"></span> </div>
                     <div class="fact">
                        <span class="percentfactor">0</span>
                        <p>Montly Spandings</p>
                     </div>
                     <!-- end fact -->
                  </div>
                  <!-- end statistic-percent -->
               </div>
               <!-- end col-xs-6 col-sm-3 col-md-3 -->
               <!-- countTo -->
               <div class="col-xs-6 col-sm-3 col-md-3">
                  <div class="statistic-percent" data-perc="<?php echo $userЕxpenses;?>">
                     <div class="facts-icons"> <span class="flaticon-piggy-bank-1"></span> </div>
                     <div class="fact">
                        <span class="percentfactor">0</span>
                        <p>Montly Savings</p>
                     </div>
                     <!-- end fact -->
                  </div>
                  <!-- end statistic-percent -->
               </div>
               <!-- end col-xs-6 col-sm-3 col-md-3 -->
               <!-- countTo -->
               <div class="col-xs-6 col-sm-3 col-md-3">
                  <div class="statistic-percent" data-perc="<?php echo $userЕxpenses;?>">
                     <div class="facts-icons"> <span class="flaticon-wallet-1"></span> </div>
                     <div class="fact">
                        <span class="percentfactor">0</span>
                        <p>Balance</p>
                     </div>
                     <!-- end fact -->
                  </div>
                  <!-- end statistic-percent -->
               </div>
               <!-- end col-xs-6 col-sm-3 col-md-3 -->
            </div>
            <!-- End row -->
         </div>
         <!-- end container -->
      </div>
      <!-- =-=-=-=-=-=-= SEPARATOR END =-=-=-=-=-=-= -->
      
      <!-- =-=-=-=-=-=-= BUDGET CORECTOR =-=-=-=-=-=-= -->
      <section class="custom-padding services">
         <div class="container">
            <!-- title-section -->
            <div class="main-heading text-center">
               <h2>Budget corrections</h2>
              
            </div>
            <!-- End title-section -->
            <!-- Row -->
            <div class="row">
               <div id="services">
                  <!-- Service Item List -->
                  <div class="item">
                     <!-- services grid -->
                     <div class="services-grid" data-target="#request-quote-1" data-toggle="modal">
                        <div class="icons" > <i class="flaticon-money"></i></div>
                        <h4>Add income</h4>
                        <p></p>
                     </div>
                  </div>                   
                  <!-- services grid -->
                  <div class="item">
                     <div class="services-grid" data-target="#request-quote-2" data-toggle="modal">
                        <div class="icons"> <i class="flaticon-point-of-service"></i></div>
                        <h4>Add expense</h4>
                        <p></p>
                     </div>
                  </div>
                  <!-- services grid -->
                  <div class="item">
                     <div class="services-grid" data-target="#request-quote-3" data-toggle="modal">
                        <div class="icons"> <i class="flaticon-safebox-3"></i></div>
                        <h4>Add savings</h4>
                        <p></p>
                     </div>
                  </div>
                 
                  <!-- Service Item List End -->
               </div>
            </div>
            <!-- Row End -->
         </div>
         <!-- end container -->
      </section>
      <!-- =-=-=-=-=-=-= Our Services-end =-=-=-=-=-=-= -->
      <!-- =-=-=-=-=-=-= Precentige Representator =-=-=-=-=-=-= -->
      
      <section class="section-padding-70" id="about">
         <div class="container">            
            <div class="row margin-top-30">
               <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                  <div class="our-experince income">
                     <h2>My incomes</h2>
                      <?php export_income_data($allIncome);?>
                  </div>
               
                  <h2>My expenses</h2>
                  <div class="our-skill expenses">
                     <?php export_expense_data($allExpenses);?>                     
                  </div>
               </div>
            </div>
         </div>
      </section>
     
     <!-- =-=-=-=-=-=-= Precentige Representator  END=-=-=-=-=-=-= -->
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
                              <div class="logo">
                                 <a href="index.html"><img src="images/logo.png" class="img-responsive" alt=""></a>
                              </div>
                              <ul class="contact-info">
                                 <li><span class="icon fa fa-map-marker"></span> 60 Link Road Lhr. Pakistan 54770</li>
                                 <li><span class="icon fa fa-phone"></span> (042) 1234567890</li>
                                 <li><span class="icon fa fa-envelope-o"></span> contant@glixentech.com</li>
                                 <li><span class="icon fa fa-fax"></span>  (042) 1234 7777</li>
                              </ul>
                              <div class="social-links-two clearfix"> <a href="#" class="facebook img-circle"><span class="fa fa-facebook-f"></span></a> <a href="#" class="twitter img-circle"><span class="fa fa-twitter"></span></a><a href="#" class="linkedin img-circle"><span class="fa fa-linkedin"></span></a> </div>
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
                                 <li><a href="about.html">About Us</a></li>
                                 <li><a href="team.html">Our Team</a></li>
                                 <li><a href="services.html">Our Services</a></li>
                                 <li><a href="index-7.html">Blog</a></li>
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
               <div class="copyright text-center">Copyright 2017 &copy; Theme Created By <a target="_blank" href="http://themeforest.net/user/glixentechnologies/portfolio">Glixen Technologies</a> All Rights Reserved</div>
            </div>
         </div>
      </footer>
      <!-- =-=-=-=-=-=-= Quote Modal =-=-=-=-=-=-= -->
      <div data-target="#request-quote" data-toggle="modal" class="quote-button hidden-xs">
         <a class="btn btn-primary" href="javascript:void(0)"><i class="fa fa-envelope"></i></a>
      </div>
     
      <!-- =-=-=-=-=-=-= Quote Modal End =-=-=-=-=-=-= -->
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
      <!-- =-=-=-=-=-=-= Quote Modal =-=-=-=-=-=-= --> 
      <div class="modal fade " id="request-quote" role="dialog"  aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="">
                  <div class="quotation-box-1">
                     <h2>Request a Call Back</h2>
                     <div class="desc-text">
                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr.</p>
                     </div>
                     <form action="contact.html" method="post">
                        <div class="row clearfix">
                           <!--Form Group-->
                           <div class="form-group col-md-6 col-sm-6 col-xs-12">
                              <input class="form-control" type="text" placeholder="Your Name" value="" name="your-name">
                           </div>
                           <!--Form Group-->
                           <div class="form-group col-md-6 col-sm-6 col-xs-12">
                              <input class="form-control" type="text" placeholder="Subject" value="" name="your-subject">
                           </div>
                           <!--Form Group-->
                           <div class="form-group col-md-12 col-sm-12 col-xs-12">
                              <input class="form-control" type="email" placeholder="Email Address" value="" name="your-email">
                           </div>
                           <!--Form Group-->
                           <div class="form-group col-md-12 col-sm-12 col-xs-12">
                              <select class="form-control">
                                 <option>Share Market Trading</option>
                                 <option>Market Hosting</option>
                                 <option>Presidency Share</option>
                                 <option>Other Topic</option>
                              </select>
                           </div>
                           <!--Form Group-->
                           <div class="form-group col-md-12 col-sm-12 col-xs-12">
                              <textarea class="form-control" rows="7" cols="20" placeholder="Your Message" name="your-message"></textarea>
                           </div>
                           <!--Form Group-->
                           <div class="form-group col-md-12 col-sm-12 col-xs-12 text-right"> <a class="custom-button light">Submit Request</a> </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
            <!-- /.modal-content -->
         </div>
         <!-- /.modal-dialog -->
      </div>
      <!-- =-=-=-=-=-=-= Quote Modal End =-=-=-=-=-=-= -->
       <!-- =-=-=-=-=-=-= Budget Query =-=-=-=-=-=-= --> 
      <div class="modal fade" id="request-quote-1" role="dialog"  aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-body">
                  <div class="quotation-box-2">
                     <h2>Add money to your budget</h2>
                     <br />                    
                     <form action="porch.php" method="post">
                        <div class="row clearfix">
                           <!--Form Group-->                          
                           <div class="form-group col-md-12 col-sm-12 col-xs-12">
                              <input class="form-control" type="number" placeholder="Sum amount"  name="Sum-to-buget">
                              <br />
                           </div>
                           <!--Form Group-->
                           <div class="form-group col-md-12 col-sm-12 col-xs-12">
                              <select class="form-control" name="income-type" id="select_sum_type" onchange="check_for_new()">
                                <?php 
                               		 popup_menu_income($incomNames, $customEntry);
                                 ?>                            
                              </select>
                              
                           </div>  
                            <div class="form-group col-md-12 col-sm-12 col-xs-12" id="Sum_type_new" style="visibility:hidden" >
                              <input  class="form-control" type="text" placeholder="Enter the name of the expense"  name="Sum_type_new">
                              <br />
                           </div>                         
                           <!--Form Group-->
                           <div><input type="submit" name="sub"/></div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
            <!-- /.modal-content -->
         </div>
         <!-- /.modal-dialog -->
      </div>
      
      <div class="modal fade" id="request-quote-2" role="dialog"  aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-body">
                  <div class="quotation-box-2">
                     <h2>Add money to your budget</h2>
                     <br />                    
                     <form action="porch.php" method="post">
                        <div class="row clearfix">
                           <!--Form Group-->                          
                           <div class="form-group col-md-12 col-sm-12 col-xs-12">
                              <input class="form-control" type="number" placeholder="Sum amount"  name="Sum-to-buget">
                              <br />
                           </div>
                           <!--Form Group-->
                           <div class="form-group col-md-12 col-sm-12 col-xs-12">
                              <select class="form-control" name="expense-type" id="select_sum_type" onchange="check_for_new()">
                                <?php 
	                                popup_menu_expenses($expenseNames, $customEntry);
                                 ?>                            
                              </select>
                              
                           </div>  
                            <div class="form-group col-md-12 col-sm-12 col-xs-12" id="Sum_type_new" style="visibility:hidden" >
                              <input  class="form-control" type="text" placeholder="Enter the name of the expense"  name="Sum_type_new">
                              <br />
                           </div>                         
                           <!--Form Group-->
                           <div><input type="submit" name="sub-expense"/></div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
            <!-- /.modal-content -->
         </div>
         <!-- /.modal-dialog -->
      </div>
      <!-- =-=-=-=-=-=-= Quote Modal End =-=-=-=-=-=-= -->
      <script type="text/javascript" src="./js/select_sum.js"></script>
   </body>
</html>


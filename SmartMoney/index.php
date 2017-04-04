<?php
// !-- =-=-=-=-=-=-=Login validation=-=-=-=-=-=-= --
	session_start();
if (!isset($_SESSION['user_id'])){
	$logged = false;

	// !-- =-=-=-=-=-=-=END of Login validation=-=-=-=-=-=-= --

}else {
	$logged = true;
	// !-- =-=-=-=-=-=-=Login information retrive=-=-=-=-=-=-= --
	require './db_connection.php';
	$user_id = $_SESSION['user_id'];
	
	$userName = db_user_name($user_id);
	
	$profilePicture = db_user_picture_address($user_id);
	// !-- =-=-=-=-=-=-=Login information retrive  END=-=-=-=-=-=-= --

}
//<!-- =-=-=-=-=-=-=  NEWS =-=-=-=-=-=-= -->
include 'php/lastNews.php';
include 'php/topNews.php';

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
             <a href="./settings.php" class="info-bar-meta-link"><i class="fa fa-caret-right fa-fw"></i>Settings</a>
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
                  <a href="index.php"><img src="images/logo.png" alt="logo of the company"></a>
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
                        	<a href="about.php">User Account </a> 
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
         <?php } ?>
         <!-- Menu  End -->
      </header>
      <!-- =-=-=-=-=-=-= HEADER END =-=-=-=-=-=-= -->
      <!-- =-=-=-=-=-=-= HOME SLIDER =-=-=-=-=-=-= -->
      <section class="rev_slider_wrapper">
		<div id="slider1" class="rev_slider"  data-version="5.0">
			<ul>
				<li data-transition="parallaxvertical">
					<img src="http://queenofpeacecu.com/images/lem3.jpg"  alt="" data-bgposition="top center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="3" >
					<div class="tp-caption sfl tp-resizeme main-caption" 
				        data-x="left" data-hoffset="0" 
				        data-y="top" data-voffset="190" 
				        data-whitespace="nowrap"
				        data-transform_idle="o:1;" 
				        data-transform_in="o:0" 
				        data-transform_out="o:0" 
				        data-start="500">
						welcome to smart money
				    </div>
					<div class="tp-caption sfr tp-resizeme main-caption bg-white font-light" 
				        data-x="left" data-hoffset="0" 
				        data-y="top" data-voffset="251" 
				        data-whitespace="nowrap"
				        data-transform_idle="o:1;" 
				        data-transform_in="o:0" 
				        data-transform_out="o:0" 
				        data-start="1000">
						<span class="bold">create your own budget manager</span>
				    </div>
				</li>
				<li data-transition="parallaxvertical">
					<img src="https://www8.gsb.columbia.edu/articles/sites/articles/files/article_detailedimage/img-iai-doorley-1609.jpg"  alt=""  data-bgposition="top center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="1" >
					<div class="tp-caption sfl tp-resizeme main-caption" 
				        data-x="left" data-hoffset="0" 
				        data-y="top" data-voffset="190" 
				        data-whitespace="nowrap"
				        data-transform_idle="o:1;" 
				        data-transform_in="o:0" 
				        data-transform_out="o:0" 
				        data-start="500">
						Are you tired of wasting? 
				    </div>
					<div class="tp-caption sfr tp-resizeme main-caption bg-white font-light" 
				        data-x="left" data-hoffset="0" 
				        data-y="top" data-voffset="251" 
				        data-whitespace="nowrap"
				        data-transform_idle="o:1;" 
				        data-transform_in="o:0" 
				        data-transform_out="o:0" 
				        data-start="1000">
						<span class="bold">Start saving now!</span>
				    </div>
					<div class="tp-caption sfb tp-resizeme main-caption-p" 
				        data-x="left" data-hoffset="0" 
				        data-y="top" data-voffset="340" 
				        data-whitespace="nowrap"
				        data-transform_idle="o:1;" 
				        data-transform_in="o:0" 
				        data-transform_out="o:0" 
				        data-start="1500">
						Do you keep wondering where your money has gone?
						<br />
						 Or, maybe, your salary is often spent long before the end of the month? 
						<br />	
						Perhaps it is time to start keeping track of your financial health and optimize your budget!

				    </div>
				</li>
				<li data-transition="parallaxvertical">
					<img src="https://cdn.uwec.edu/athena/images/2365/20140820-Kantor-00165--default-large.jpg"  alt=""  data-bgposition="top center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="2" >
					<div class="tp-caption sft tp-resizeme main-caption" 
				        data-x="left" data-hoffset="0" 
				        data-y="top" data-voffset="190" 
				        data-whitespace="nowrap"
				        data-transform_idle="o:1;" 
				        data-transform_in="o:0" 
				        data-transform_out="o:0" 
				        data-start="500">
						Keep track of your finance.
				    </div>
					<div class="tp-caption sft tp-resizeme main-caption bg-white font-light" 
				        data-x="left" data-hoffset="0" 
				        data-y="top" data-voffset="251" 
				        data-whitespace="nowrap"
				        data-transform_idle="o:1;" 
				        data-transform_in="o:0" 
				        data-transform_out="o:0" 
				        data-start="1000">
						<span class="bold">Be the master of your life! </span>
				    </div>
				</li>
				
			</ul>
		</div>
	</section>

         <!--======= HOME SLIDER END =========-->
      <!-- =-=-=-=-=-=-= Quote Seection =-=-=-=-=-=-= -->
      <section class="padding-top-70" id="about">
         <div class="container">
            <div class="row clearfix">
               <!--Column-->
               <div class="col-md-8 col-sm-12 col-xs-12 ">
                  <div class="about-title">
                     <h3>What is Smart Money</h3>
                     <h2>How to use the platform to save money?</h2>
                     <p>The platform lets you see all of your money, where it's moving, and what your account balances were at any time,  also lets you draw up a household budget and check at all times if you're not sticking to it, see how much you're spending on what types of purchases or utilities, set up savings goals, and actually stick to them. You may be surprised to find out how the frequent small amounts you spend actually add up to big money.</p>
                     <p>By tracking your spenditure you can easily notice any unnecessary spending you have done and try to master your funds better so that you actually end up saving instead of wasting.</p>
                  </div>
               </div>
               <!-- Quote Form -->
               <div class="col-md-4 col-sm-12 col-xs-12 our-gallery">
                  <img class="img-responsive " alt="Image" src="images/happyLife.jpg">
               </div>
            </div>
         </div>
      </section>
      <!-- =-=-=-=-=-=-= Our Services =-=-=-=-=-=-= -->
      <section class="custom-padding services-2">
         <div class="container">
            <!-- title-section -->
            <div class="main-heading text-center">
               <h2>service we offer</h2>
            </div>
            <!-- End title-section -->
            <!-- Row -->
            <div class="row">
               <div class="col-sm-12 col-xs-12 col-md-12 ">
                  <!-- services box grid -->
                  <div class="col-sm-6 col-md-4 col-xs-12">
                     <div class="services-box-2 text-center">
                        <i class="flaticon-graph-2"></i>
                        <h4>Financial Planning</h4>
                         <div class="text-justify">
	                        <p>All individual financial activities fall under the purview of personal finance; personal financial planning involves analyzing your current financial position, predicting short-term and long-term needs and executing a plan to fulfill those needs. </p>
                 	    </div>
                     </div>
                  </div>
                  <!-- end services-box-2 -->
                  <!-- services box grid -->
                  <div class="col-sm-6 col-md-4 col-xs-12">
                     <div class="services-box-2 text-center">
                        <i class="flaticon-insert-coin"></i>
                      	 <h4>Saving Solutions</h4>
                        <div class="text-justify">
	                        <p>Set goals for saving. 
								Track and master your budget.  
								Slash excess spending regularly.  
								Cut monthly bills significantly.   
								Switch up your grocery routine.   
								Transfer debt to a lower interest credit card.
								Be picky about your savings account.
	                        </p>
                        </div>
                     </div>
                  </div>
                  <!-- end services-box-2 -->
                  <!-- services box grid -->
                  <div class="col-sm-6 col-md-4 col-xs-12">
                     <div class="services-box-2 text-center">
                        <i class="flaticon-pie-chart-5"></i>
                        <h4>Wealth Management</h4>
                         <div class="text-justify">
	                        <p>Private wealth management is an investment advisory practice that incorporates financial planning, portfolio management and other aggregated financial services for private individuals, not for corporations, trusts or other types of clients. </p>
	                    </div>
                     </div>
                  </div>
                  <!-- end services-box-2 -->
                  <div class="clearfix"></div>
               </div>
            </div>
            <!-- Row End -->
         </div>
         <!-- end container -->
      </section>

        
      <!-- =-=-=-=-=-=-= Blog & News =-=-=-=-=-=-= -->
      <section id="blog" class="custom-padding">
         <div class="container">
            <!-- title-section -->
            <div class="main-heading text-center">
               <h2>TOP NEWS Business Insider</h2>
               <p></p>
            </div>
            <!-- End title-section -->
            <!-- Row -->
            <div class="row">
               <div class="col-sm-12 col-xs-12 col-md-12">
                  <!-- blog-grid -->
                  <div class="col-md-4 col-sm-6 col-xs-12">
                     <div class="news-box">
                        <div class="news-thumb">
                           <a target="blank" href="<?= $url[0] ?>"><img alt="" class="img-responsive" src="<?= $img[0] ?>"></a>
                           <div class="date"> <strong><?= $date[0] ?></strong>
                              <span>Apr</span> 
                           </div>
                        </div>
                        <div class="news-detail">
                           <h2><a target="blank" href="<?= $url[0] ?>"><?= $title[0] ?></a></h2>
                           <p><?= $description[0] ?></p>
                           <div class="entry-footer">
                              <div class="post-meta">
                                 <div class="post-admin"> <i class="icon-profile-male"></i>Author <a ><?= $author[0] ?></a> </div>
                                 
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- blog-grid end -->
                  <!-- blog-grid -->
                  <div class="col-md-4 col-sm-6 col-xs-12">
                     <div class="news-box">
                        <div class="news-thumb">
                           <a target="blank" href="<?= $url[1] ?>"><img alt="" class="img-responsive" src="<?= $img[1] ?>"></a>
                           <div class="date"> <strong><?= $date[1] ?></strong>
                              <span>Apr</span> 
                           </div>
                        </div>
                        <div class="news-detail">
                           <h2><a target="blank" href="<?= $url[1] ?>"><?= $title[1] ?></a></h2>
                           <p><?= $description[1] ?></p>
                           <div class="entry-footer">
                              <div class="post-meta">
                                 <div class="post-admin"> <i class="icon-profile-male"></i>Author <a ><?= $author[1] ?></a> </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- blog-grid end -->
                  <!-- blog-grid -->
                  <div class="col-md-4 col-sm-6 col-xs-12">
                     <div class="news-box">
                        <div class="news-thumb">
                           <a target="blank" href="<?= $url[2] ?>"><img class="img-responsive" alt="" src="<?= $img[2] ?>"></a>
                           <div class="date"> <strong><?= $date[2] ?></strong>
                              <span>Apr</span> 
                           </div>
                        </div>
                        <div class="news-detail">
                           <h2><a target="blank" href="<?= $url[2] ?>"><?= $title[2] ?></a></h2>
                           <p><?= $description[2] ?></p>
                           <div class="entry-footer">
                              <div class="post-meta">
                                 <div class="post-admin"> <i class="icon-profile-male"></i>Author <a ><?= $author[2] ?></a> </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- blog-grid end -->
                  <div class="clearfix"></div>
               </div>
            </div>
            <!-- Row End -->
            <div class="main-heading text-center">
               <h2>TOP NEWS Bloomberg</h2>
               <p></p>
            </div>
            <!-- Row -->
            <div class="row">
               <div class="col-sm-12 col-xs-12 col-md-12">
                  <!-- blog-grid -->
                  <div class="col-md-4 col-sm-6 col-xs-12">
                     <div class="news-box">
                        <div class="news-thumb">
                           <a target="blank" href="<?= $url[3] ?>"><img alt="" class="img-responsive" src="<?= $img[3] ?>"></a>
                           <div class="date"> <strong><?= $date[3] ?></strong>
                              <span>Apr</span> 
                           </div>
                        </div>
                        <div class="news-detail">
                           <h2><a target="blank" href="<?= $url[3] ?>"><?= $title[3] ?></a></h2>
                           <p><?= $description[3]?></p>
                           <div class="entry-footer">
                              <div class="post-meta">
                                 <div class="post-admin"> <i class="icon-profile-male"></i>Author <a ><?= $author[3] ?></a> </div>
                                 
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- blog-grid end -->
                  <!-- blog-grid -->
                  <div class="col-md-4 col-sm-6 col-xs-12">
                     <div class="news-box">
                        <div class="news-thumb">
                           <a target="blank" href="<?= $url[4] ?>"><img alt="" class="img-responsive" src="<?= $img[4] ?>"></a>
                           <div class="date"> <strong><?= $date[4] ?></strong>
                              <span>Apr</span> 
                           </div>
                        </div>
                        <div class="news-detail">
                           <h2><a target="blank" href="<?= $url[4] ?>"><?= $title[4] ?></a></h2>
                           <p><?= $description[4] ?></p>
                           <div class="entry-footer">
                              <div class="post-meta">
                                 <div class="post-admin"> <i class="icon-profile-male"></i>Author <a ><?= $author[4] ?></a> </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- blog-grid end -->
                  <!-- blog-grid -->
                  <div class="col-md-4 col-sm-6 col-xs-12">
                     <div class="news-box">
                        <div class="news-thumb">
                           <a target="blank" href="<?= $url[5] ?>"><img class="img-responsive" alt="" src="<?= $img[5] ?>"></a>
                           <div class="date"> <strong><?= $date[5] ?></strong>
                              <span>Apr</span> 
                           </div>
                        </div>
                        <div class="news-detail">
                           <h2><a target="blank" href="<?= $url[5] ?>"><?= $title[5] ?></a></h2>
                           <p><?= $description[5] ?></p>
                           <div class="entry-footer">
                              <div class="post-meta">
                                 <div class="post-admin"> <i class="icon-profile-male"></i>Author <a ><?= $author[5] ?></a> </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- blog-grid end -->
                  <div class="clearfix"></div>
               </div>
            </div>
            <!-- Row End -->
         </div>
         <!-- end container -->
      </section>
      <!-- =-=-=-=-=-=-= Blog & News end =-=-=-=-=-=-= -->
      <!-- =-=-=-=-=-=-= Our Clients =-=-=-=-=-=-= -->
      <section class="section-padding-70 clients">
         <div class="container">
            <!-- title-section -->
            <div class="main-heading text-center">
               <h2>our partners</h2>
            </div>
            <!-- End title-section -->
            <!-- Row -->
            <div class="row">
               <div class="col-md-3 col-sm-3 col-xs-12">
              	  <a class="partners-link" href="http://www.altynbank.kz/en/retail/cards/credit_cards" target="blank"></a>
                  <div class="clients-grid"> <img src="images/clients/AltynBank.jpg" alt="AltynBank" class="img-responsive"> </div>
               </div>
               <div class="col-md-3 col-sm-3 col-xs-12">
               	  <a class="partners-link" href="http://www.finanzfuchsgruppe.at/" target="blank"></a>
                  <div class="clients-grid"> <img src="images/clients/FuchsFinanzen.jpg" alt="FuchsFinanzen" class="img-responsive"> </div>
               </div>
               <div class="col-md-3 col-sm-3 col-xs-12">
                  <a class="partners-link" href="http://www.altynbank.kz/en/retail/cards/credit_cards" target="blank"></a>
                  <div class="clients-grid"> <img src="images/clients/greenmind.jpg" alt="GreenMind" class="img-responsive"> </div>
               </div>
               <div class="col-md-3 col-sm-3 col-xs-12">
                  <a class="partners-link" href="https://www.vivahealthgroup.com.au/" target="blank"></a>
                  <div class="clients-grid"> <img src="images/clients/Viva.jpg" alt="Viva-Healt-At-work" class="img-responsive"> </div>
               </div>
            </div>
            <!-- Row End -->
            <!-- end container -->
         </div>
      </section>
      <!-- =-=-=-=-=-=-= Our Clients -end =-=-=-=-=-=-= -->
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
										<a href="index.php"><img src="images/small_logo.png"
											class="img-responsive" alt=""></a>
									</div>
									<ul class="contact-info">
										<li><span class="icon fa fa-phone"></span> (042)
											1234567890</li>
										<li><span class="icon fa fa-envelope-o"></span>
											smart.money.managment@gmail.com</li>										
									</ul>
									<div class="social-links-two clearfix">
										<a href="https://www.facebook.com/SMManagmetn/" class="facebook img-circle" target="blank"><span class="fa fa-facebook-f"></span></a>
										<a href="https://twitter.com/S_M_Managment" class="twitter img-circle" target="blank"><span class="fa fa-twitter" ></span></a>
										<a href="https://www.youtube.com/channel/UCebM3sL3ASfzAQ0YYD7m6Og" class="social-youtube" target="blank"><span class="fa fa-youtube"></span></a>
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
                                    <a target="blank"  href="<?= $urlLN[3]?>"><?= $titleLN[3] ?> </a>
                                 </div>
                                 <div class="time"><?= $dateLN[3] ?></div>
                              </div>
                           </div>
                        </div>
                        <!--Footer Column-->
                        <!--Footer Column-->
                        <div class="col-lg-5 col-sm-6 col-xs-12 column">
                           <div class="footer-widget links-widget">
                              <h2>Site Links</h2>
                              <ul>
                                 <li><a href="index.php">Home</a></li>
                                 <li><a href="about.php">User Account</a></li>
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
      <!-- Jquery For Home Page Only  -->
      <!-- Revolution Slider 5.x SCRIPTS -->
      <script src="js/revolution-slider/js/jquery.themepunch.tools.min.js"></script>
      <script src="js/revolution-slider/js/jquery.themepunch.revolution.min.js"></script>
      <script type="text/javascript">
	  	  (function($) {
    		"use strict";
				if ($('.rev_slider_wrapper #slider1').length) {
						$("#slider1").revolution({
							sliderType:"standard",
							sliderLayout:"auto",
							delay:5000,
							navigation: {
								arrows:{
									enable:true
									} 
							}, 
							
							gridwidth:1170,
							gridheight:705 
						});
					};
			})(jQuery);
      </script>
      <!-- SLIDER REVOLUTION 5.0 EXTENSIONS  
         (Load Extensions only on Local File Systems ! 
          The following part can be removed on Server for On Demand Loading) -->
      <script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.actions.min.js"></script>
      <script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.carousel.min.js"></script>
      <script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.kenburn.min.js"></script>
      <script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.layeranimation.min.js"></script>
      <script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.migration.min.js"></script>
      <script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.navigation.min.js"></script>
      <script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.parallax.min.js"></script>
      <script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.slideanims.min.js"></script>
      <script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.video.min.js"></script>
     
      	<!-- =-=-=-=-=-=-= Log In Model =-=-=-=-=-=-= --> 
      <div class="modal fade " id="request-quote" role="dialog"  aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-body">
                  <div class="quotation-box-1">
                     <h2> Log In</h2>
                     <div class="desc-text">
                        <p>Enter yor E-mail and Password</p>
                     </div>
                     <form action="./logIn.php" method="post" id="login-form">
                        <div class="row clearfix">
                           
	                           <!-- Email Address-->
	                           <div class="form-group col-md-12 col-sm-12 col-xs-12">
	                          	  <label id="email-label">E-mail<span class="required">*</span></label>
	                              <input class="form-control" type="email" placeholder="Email Address" value="" id="email" 
	                              name="email"	required="required">
	                           </div>
	                           <!-- password-->
	                           <div class="form-group col-md-6 col-sm-6 col-xs-12">
	                          	  <label id="pass-label">Password<span class="required">*</span></label>
	                              <input class="form-control" type="password" placeholder="Password" value="" id="password" 
	                              name="password" required="required">
	                           </div>
	                           <!-- button-->
	                            <div class="row">
		                     <div class="col-sm-12">
		                        <button type="submit" id="yes" class="btn btn-primary" name="log-in-button">Log In!</button>
		                        <img id="loader" alt="" src="images/loader.gif" class="loader">
		                     </div>
		                     </div>
                           
                        </div>
                     </form>
                  </div>
               </div>
            </div>
            <!-- /.modal-content -->
         </div>
         <!-- /.modal-dialog -->
      </div>
      <!-- =-=-=-=-=-=-= Log In Model End  =-=-=-=-=-=-= -->
	<script type="text/javascript" src="js/login-validation.js"></script>
   </body>
</html>
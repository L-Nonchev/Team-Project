<?php 
include 'notLoggedHeader.php';
?>

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
		<li><span class="icon fa fa-map-marker"></span> 60 Link
		Road Lhr. Pakistan 54770</li>
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
                     <form action="./php/logIn.php" method="post" id="login-form">
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
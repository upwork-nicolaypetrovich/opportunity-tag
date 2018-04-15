    <!--Main Footer-->
    <footer class="main-footer">
    	<div class="auto-container">
        	<!--Widgets Section-->
            <div class="widgets-section">
            	<div class="row clearfix">
					<!--Footer Column-->
                    <div class="footer-column col-md-5 col-sm-12 col-xs-12">
                    	<div class="footer-widget logo-widget">
                            <div class="footer-logo">
                            	<div class="logo"><img height="100" src="<?php echo get_theme_mod('footer_logo'); ?>" alt="" title=""></a></div>
                            </div>
                            <div class="widget-content">
                                <div class="text"><?php echo get_theme_mod('footer_text'); ?> <a href="<?php echo get_page_link( 2 ); ?>">Read More</a></div>
                                <h3>Contact:</h3>
                                <div class="row clearfix">
                                	<div class="inner-column col-md-6 col-sm-6 col-xs-12">
                                    	<div class="info-text"><?php echo get_theme_mod('footer_address'); ?></div>
                                    </div>
                                    <div class="inner-column col-md-6 col-sm-6 col-xs-12">
                                    	<ul>
                                        	<li><span>Tel:</span> <?php echo get_theme_mod('footer_phone'); ?></li>
                                            <li><span>Email:</span> <?php echo get_theme_mod('footer_e-mail'); ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Footer Column-->
                    <div class="footer-column col-md-7 col-sm-12 col-xs-12">
                    	<div class="row clearfix">
                        
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            	<div class="news-widget">
                                	<h2><?php echo get_theme_mod('footer_blog_header'); ?></h2>
                                    <div class="widget-content">
                                        
                                        <?php $footer_posts = new WP_Query( array( 'post_type' => 'post', 'posts_per_page'=> 2 ) );?>
                                        <?php if ( $footer_posts->have_posts() ) { ?>
                                        <?php while ( $footer_posts->have_posts() ) { $footer_posts->the_post(); ?>
                                        <article class="post">
                                            <figure class="post-thumb">
                                            	<a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url( 'footer-blog' ); ?>" alt="<?php echo get_the_title(); ?>"></a>
                                                <a class="overlay"><span class="fa fa-link"></span></a>
                                            </figure>
                                            <div class="content">
                                                <div class="text"><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></div>
                                                <div class="post-info"><?php echo the_date(); ?></div>
                                            </div>
                                        </article>
                                        <?php } ?>
                                        <?php wp_reset_postdata(); } ?>
                                        
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            	<div class="links-widget">
                                	<h2><?php echo get_theme_mod('footer_social_header'); ?></h2>
                                    <div class="widget-content">
                                        <?php wp_nav_menu( array( 'menu_class' => 'links', 'theme_location' => 'bottom_vertical' ) ); ?>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <!--Footer Bottom-->
        <div class="footer-bottom">
        	<div class="auto-container">
            	<div class="row clearfix">
                	<div class="copyright-column col-md-5 col-sm-12 col-xs-12">
                    	<div class="copyright"><?php echo get_theme_mod('footer_copyrights'); ?></div>
                    </div>
                    <div class="nav-column col-md-7 col-sm-12 col-xs-12">
                        <?php wp_nav_menu( array( 'menu_class' => 'footer-nav', 'theme_location' => 'bottom' ) ); ?>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--End Main Footer-->
    
</div>
<!--End pagewrapper-->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="icon fa fa-arrow-up"></span></div>

<?php if (is_home()) { ?>
    <script defer src="<?php echo get_template_directory_uri();?>/js/jquery.js"></script>
    <!--Revolution Slider-->
    <script defer src="<?php echo get_template_directory_uri();?>/plugins/revolution/js/jquery.themepunch.revolution.min.js"></script>
    <script defer src="<?php echo get_template_directory_uri();?>/plugins/revolution/js/jquery.themepunch.tools.min.js"></script>
    <script defer src="<?php echo get_template_directory_uri();?>/plugins/revolution/js/extensions/revolution.extension.actions.min.js"></script>
    <script defer src="<?php echo get_template_directory_uri();?>/plugins/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
    <script defer src="<?php echo get_template_directory_uri();?>/plugins/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
    <script defer src="<?php echo get_template_directory_uri();?>/plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script defer src="<?php echo get_template_directory_uri();?>/plugins/revolution/js/extensions/revolution.extension.migration.min.js"></script>
    <script defer src="<?php echo get_template_directory_uri();?>/plugins/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
    <script defer src="<?php echo get_template_directory_uri();?>/plugins/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
    <script defer src="<?php echo get_template_directory_uri();?>/plugins/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
    <script defer src="<?php echo get_template_directory_uri();?>/plugins/revolution/js/extensions/revolution.extension.video.min.js"></script>
    <script defer src="<?php echo get_template_directory_uri();?>/js/main-slider-script.js"></script>
    <script defer src="<?php echo get_template_directory_uri();?>/js/bootstrap.min.js"></script>
    <script defer src="<?php echo get_template_directory_uri();?>/js/jquery.fancybox.js"></script>
    <script defer src="<?php echo get_template_directory_uri();?>/js/jquery-ui.js"></script>
    <script defer src="<?php echo get_template_directory_uri();?>/js/owl.js"></script>
    <script defer src="<?php echo get_template_directory_uri();?>/js/appear.js"></script>
    <script defer src="<?php echo get_template_directory_uri();?>/js/wow.js"></script>
    <script defer src="<?php echo get_template_directory_uri();?>/js/script.js"></script>
<?php }else{ ?>
    <script defer src="<?php echo get_template_directory_uri();?>/js/jquery.js"></script>
    <script defer src="<?php echo get_template_directory_uri();?>/js/bootstrap.min.js"></script>
    <script defer src="<?php echo get_template_directory_uri();?>/js/jquery.fancybox.js"></script>
    <script defer src="<?php echo get_template_directory_uri();?>/js/owl.js"></script>
    <script defer src="<?php echo get_template_directory_uri();?>/js/slick.js"></script>
    <script defer src="<?php echo get_template_directory_uri();?>/js/jquery-ui.js"></script>
    <script defer src="<?php echo get_template_directory_uri();?>/js/appear.js"></script>
    <script defer src="<?php echo get_template_directory_uri();?>/js/wow.js"></script>
    <?php if(get_the_ID()==7){ ?>
        <script defer src="<?php echo get_template_directory_uri();?>/js/mixitup.js"></script>
    <?php } ?>
    <?php if(get_the_ID()==9){ ?>
        <script defer src="<?php echo get_template_directory_uri();?>/js/validate.js"></script>
    <?php } ?>
    <script defer src="<?php echo get_template_directory_uri();?>/js/script.js"></script>
    <?php if(get_the_ID()==9){ ?>
        <script defer src="http://maps.google.com/maps/api/js?key=AIzaSyBKS14AnP3HCIVlUpPKtGp7CbYuMtcXE2o"></script>
        <script defer src="<?php echo get_template_directory_uri();?>/js/gmaps.js"></script>
        <script defer src="<?php echo get_template_directory_uri();?>/js/map-script.js"></script>
    <?php } ?>
<?php } ?>

<?php // mailchimp ?>
<script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/d7660ba1fd934f0267b37e3b9/2ab3a9eb3ba3b2de899d84ffb.js");</script>


<?php if( isset($_SESSION['popup']) && $_SESSION['popup'] ){ ?>
    <script>
        setTimeout(function(){
            alert('Sent. Thank you!');
        }, 2000);
    </script>
<?php $_SESSION['popup'] = false; } ?>


</body>
</html>
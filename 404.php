<?php get_header(); ?>
<?php the_post(); ?>
    
    <!--Page Title-->
    <section class="page-title" style="background-image:url(<?php echo get_theme_mod('blog_header_image'); ?>);">
        <div class="auto-container">
            
        </div>
        <!--Page Info-->
        <div class="page-info">
            <div class="auto-container">
            	<div class="inner-container">
                    <ul class="bread-crumb">
                        <li><a href="/">Home</a></li>
                        <li>404</li>
                    </ul>
                </div>
            </div>
        </div>
        <!--End Page Info-->
    </section>
    <!--End Page Title-->
    
    <!--Sidebar Page Container-->
    <div class="sidebar-page-container">
    	<div class="auto-container">
        	<div class="row clearfix">
            	
                <!--Content Side-->
                <div class="content-side col-lg-12 col-md-12 col-sm-12 col-xs-12">
                	<!--Our Blog-->
                	<div class="blog-single">
                    	
                        <!--News Block-->
                        <div class="news-block style-two">
                            <div class="inner-box">
                                <div class="middle-box">
                                    <div class="text blog-content">
                                    	<h1>Page Not Found. Sorry.</h1>
                                   	</div>
                                    
                                </div>
                            </div>
                        </div>
                    
                        
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    
<?php get_footer(); ?>
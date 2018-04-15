<?php get_header(); ?>
    
    <!--Page Title-->
    <section class="page-title" style="background-image:url(<?php echo get_theme_mod('blog_header_image'); ?>);">
        <div class="auto-container">
            <h1><?php echo get_theme_mod('blog_header_text_1'); ?></h1>
            <div class="title"><?php echo get_theme_mod('blog_header_text_2'); ?></div>
        </div>
    </section>
    <!--End Page Title-->
    
    <?php if(!isset($_COOKIE['subscribe'])) { ?>
    <!--Free Book Section Begin-->
    <section class="free-book-container subscribe-container" style="background: <?php echo get_theme_mod('subscribe_background'); ?>;">
        <div class="row auto-container">
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div>
                    <h2><i class="fa fa-bell"></i> <?php echo get_theme_mod('subscribe_title'); ?></h2>
                    <p><?php echo get_theme_mod('subscribe_text'); ?></p>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
                <!-- Appointment Form -->
                    <div class="apointment-form">
                        <!--Call Back Form-->
                        <form method="post" action="https://opportunitytag.us18.list-manage.com/subscribe/post?u=d7660ba1fd934f0267b37e3b9&amp;id=a3b453909b" onsubmit="event.preventDefault(); setCookie('subscribe', true, 99999); this.submit();">
                            <div class="row clearfix">
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="FNAME" placeholder="Your Name" required style="background: <?php echo get_theme_mod('subscribe_inputs'); ?>;">
                                </div>
            
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <input type="email" name="EMAIL" placeholder="Email Address" required style="background: <?php echo get_theme_mod('subscribe_inputs'); ?>;">
                                </div>
                                
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <button class="theme-btn btn-style-one" type="submit" name="subscribe">Submit Here</button>
                                </div>
                                
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </section>
    <!--Free Book End-->
    <?php } ?>
    
    <!--Page Title-->
    <section>
        <!--Page Info-->
        <div class="page-info">
            <div class="auto-container">
                <div class="inner-container">
                    <ul class="bread-crumb">
                        <li><a href="/">Home</a></li>
                        <li>Blog</li>
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
                	<!--Our Classic-->
                	<div class="blog-classic">

                    	<?php if ( have_posts() ) : ?>
                        <?php while ( have_posts() ) : the_post(); ?>
                        <!--News Block-->
                        <div class="news-block style-two">
                            <div class="inner-box">
                                <div class="middle-box">
                                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <div class="text"><?php the_excerpt(); ?></div>
                                </div>
                                <div class="lower-box">
                                    <div class="image">
                                        <img src="<?php the_post_thumbnail_url( 'archive-main' ); ?>" alt="<?php the_title(); ?>" />
                                        <div class="overlay-box">
                                            <div class="overlay-inner">
                                                <a class="read-more" href="<?php the_permalink(); ?>"><span class="icon flaticon-arrow-pointing-to-right"></span> Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; ?>
                        <?php endif; ?>
                        
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    
<?php get_footer(); ?>
<?php get_header(); ?>
<?php the_post(); ?>
    
    <!--Page Title-->
    <section class="page-title" style="background-image:url(<?php the_post_thumbnail_url( 'header-image' ); ?>);">
        <div class="auto-container">
            <h1><?php the_title(); ?></h1>
            <div class="title"><?php echo get_post_meta( get_the_ID(), 'second_title', true ); ?></div>
        </div>
        <!--Page Info-->
        <div class="page-info">
            <div class="auto-container">
            	<div class="inner-container">
                    <ul class="bread-crumb">
                        <li><a href="/">Home</a></li>
                        <li><?php the_title(); ?></li>
                    </ul>
                </div>
            </div>
        </div>
        <!--End Page Info-->
    </section>
    <!--End Page Title-->
    
    <!--About Section-->
    <div class="about-section style-two">
    	<div class="auto-container">
        	
            <div class="row clearfix">
                <!--Carousel Column-->
                <div class="carousel-column col-md-6 col-sm-12 col-xs-12">
                    <div class="single-item-carousel owl-carousel owl-theme">
                        <?php $slider = get_post_meta(get_the_ID(), 'slider', true); ?>
                        <?php for ($i=0; $i<$slider; $i++) { ?>
                        <div class="slide">
                            <div class="image">
                                <img src="<?php echo wp_get_attachment_image_src( get_post_meta( get_the_ID(), 'slider_'.$i.'_image', true ), 'about-slider')[0]; ?>" alt="" />
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <!--Content Column-->
                <div class="content-column col-md-6 col-sm-12 col-xs-12">
                    <div class="inner-column">
                    	<h3><?php echo get_post_meta( get_the_ID(), 'heading', true ); ?></h3>
                        <div class="text"><?php echo get_post_meta( get_the_ID(), 'text', true ); ?></div>
                        <div class="blockquote-box">
                        	<div class="inner">
                            	<div class="quote-icon">
                                	<span class="icon flaticon-left-quote"></span>
                                </div>
                                <div class="quote-text"><?php echo get_post_meta( get_the_ID(), 'quote', true ); ?></div>
                                <div class="author"><?php echo get_post_meta( get_the_ID(), 'author', true ); ?></div>
                            </div>
                        </div>
                        <a href="<?php echo get_post_meta( get_the_ID(), 'button', true ); ?>" class="theme-btn btn-style-three" style="color:#fff;" onmouseover="this.style.color='#3841b2';" 
    onmouseout="this.style.color='#fff';">More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End About Section-->
    
    <?php $team = new WP_Query( array( 'post_type' => 'team', 'posts_per_page'=> 1000 ) );?>
    <?php if ( $team->have_posts() ) { ?>
    <!--Team Section Two-->
    <section class="team-section-two" style="background-image:url(<?php echo get_template_directory_uri();?>/images/background/1.jpg)">
        <div class="auto-container">
            <div class="four-item-carousel owl-theme owl-carousel">
                
                <?php while ( $team->have_posts() ) { $team->the_post(); ?>
                <!--Team Block-->
                <div class="team-block style-two">
                    <div class="inner-box">
                        <div class="image">
                            <img src="<?php the_post_thumbnail_url( 'team-main' ); ?>" alt="" />
                        </div>
                        <div class="lower-content-box">
                            <h3><?php the_title(); ?></h3>
                            <div class="designation"><?php echo get_post_meta( get_the_ID(), 'position', true ); ?></div>
                            <div class="lower-box">
                                <div class="email"><?php echo get_post_meta( get_the_ID(), 'e-mail', true ); ?></div>
                            </div>
                        </div>
                        <div class="overlay-box">
                            <div class="inner-content">
                                <div class="upper-content">
                                    <h3><a href="team.html"><?php the_title(); ?></a></h3>
                                    <div class="designation"><?php echo get_post_meta( get_the_ID(), 'position', true ); ?></div>
                                    <div class="text"><?php echo get_post_meta( get_the_ID(), 'description', true ); ?></div>
                                </div>
                                <div class="lower-content">
                                    <div class="emailed"><?php echo get_post_meta( get_the_ID(), 'e-mail', true ); ?></div>
                                    <?php $links = get_post_meta(get_the_ID(), 'social-links', true); ?>
                                    <?php if ( $links ) { ?>
                                    <ul class="social-icon-one">
                                        <?php for ($i=0; $i<$links; $i++) { ?>
                                        <li><a href="<?php echo get_post_meta( get_the_ID(), 'social-links_'.$i.'_link', true ); ?>"><span class="fa <?php echo get_post_meta( get_the_ID(), 'social-links_'.$i.'_icon', true ); ?>"></span></a></li>
                                        <?php } ?>
                                    </ul>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
                
            </div>
        </div>
    </section>
    <!--End Team Section Two-->
    <?php wp_reset_postdata(); } ?>
    
    <?php $history = new WP_Query( array( 'post_type' => 'history', 'posts_per_page'=> 1000 ) );?>
    <?php if ( $history->have_posts() ) { ?>
    <!--History Section-->
    <section class="history-section grey-bg">
    	<div class="auto-container">
        	<div class="sec-title centered">
            	<h2><?php echo get_post_meta( get_the_ID(), 'history_title', true ); ?></h2>
                <div class="title"><?php echo get_post_meta( get_the_ID(), 'history_second_title', true ); ?></div>
                <div class="separator"></div>
            </div>
            <div class="outer-container">
            	<div class="left-line"></div>
                <div class="single-verticle-carousel">

                            <?php  $count = 1; while ( $history->have_posts() ) { $history->the_post();?>
                                    <?php if ($count % 2 == 1){ ?>

                                        <div class="slide">
                                            <div class="row clearfix">
                                                <!--History Block-->
                                                <div class="history-block col-md-6 col-sm-12 col-xs-12">
                                                    <div class="inner-box">
                                                        <div class="image">
                                                            <a href="#"><img src="<?php the_post_thumbnail_url( 'history-main' ); ?>" alt="" /></a>
                                                            <div class="year"><?php echo date('M Y', get_post_meta( get_the_ID(), 'date', true )); ?><span class="dott"></span></div>
                                                        </div>
                                                        <div class="lower-content">
                                                            <h3><a href="#"><?php the_title(); ?></a></h3>
                                                            <div class="text"><?php echo get_post_meta( get_the_ID(), 'text', true ); ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--History Block-->

                                    <?php }else{ ?>
                                    
                                                <!--History Block Reverse-->
                                                <div class="history-block-two col-md-6 col-sm-12 col-xs-12">
                                                    <div class="inner-box">
                                                        <div class="lower-content">
                                                            <h3><a href="#"><?php the_title(); ?></a></h3>
                                                            <div class="text"><?php echo get_post_meta( get_the_ID(), 'text', true ); ?></div>
                                                        </div>
                                                        <div class="image">
                                                            <div class="year"><?php echo date('M Y', get_post_meta( get_the_ID(), 'date', true )); ?><span class="dott"></span></div>
                                                            <a href="#"><img src="<?php the_post_thumbnail_url( 'history-main' ); ?>" alt="" /></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--History Block Reverse-->
                                            </div>
                                        </div>

                                    <?php } ?>
                            <?php $count++; } ?>


                </div>
                <div class="right-line"></div>
            </div>
        </div>
    </section>
    <!--End History Section-->
    <?php wp_reset_postdata(); } ?>
    
    <!--Clients Section-->
    <section class="clients-section style-two">
    	<div class="auto-container">
        	<h2><?php echo get_post_meta( get_the_ID(), 'main_text_title', true ); ?></h2>
            <div class="text"><?php echo preg_replace("/\r\n|\r|\n/",'<br/>', the_content()); ?></div>
            
        </div>
    </section>
    <!--End Clients Section-->
    
    <!--Analysic Section-->
    <div class="analysic-section style-two">
        <div class="upper-section" style="background-image:url(<?php echo get_template_directory_uri();?>/images/background/5.jpg)">
            <div class="auto-container">
                <h2><?php echo get_post_meta( get_the_ID(), 'f_heading', true ); ?></h2>
                <div class="separator"></div>
                <div class="row clearfix">
                    <div class="column col-md-6 col-sm-6 col-xs-12">
                        <div class="text"><?php echo get_field('columns')['left_text']; ?></div>
                    </div>
                    <div class="column col-md-6 col-sm-6 col-xs-12">
                        <div class="text"><?php echo get_field('columns')['right_text']; ?></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="lower-section">
            <div class="auto-container">
                <div class="lower-inner-section">
                    <div class="clearfix">
                        <div class="pull-left">
                            <h2><?php echo get_post_meta( get_the_ID(), 'image_heading', true ); ?></h2>
                        </div>
                        <div class="pull-right">
                        </div>
                    </div>
                    <div class="graph-image">
                        <img src="<?php echo wp_get_attachment_image_src( get_post_meta( get_the_ID(), 'main_image', true ), 'about-final')[0]; ?>" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<?php get_footer(); ?>
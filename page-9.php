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
    
    <!--Contact Section-->
    <section class="contact-section">
    	<div class="auto-container">
            <div class="contact-banner" style="background-image:url(<?php echo  wp_get_attachment_image_src( get_post_meta( get_the_ID(), 'image', true ), 'contact-main' )[0] ; ?>)">
            	<div class="banner-inner">
                	<h2><?php echo get_post_meta( get_the_ID(), 'text', true ); ?></h2>
                    <div class="emailed"><?php echo get_post_meta( get_the_ID(), 'hmail', true ); ?></div>
                </div>
            </div>
            <div class="form-lower-section clearfix">
                <!--Info Column-->
                <div class="info-column col-md-4 col-sm-12 col-xs-12">
                    <div class="inner-column">
                        
                        <div class="single-item-carousel owl-carousel owl-theme">
                            <?php $offices = new WP_Query( array( 'post_type' => 'office', 'posts_per_page'=> 1000 ) );?>
                            <?php if ( $offices->have_posts() ) { ?>
                            <?php while ( $offices->have_posts() ) { $offices->the_post(); ?>
                        	<div class="slide">
                            	<h3><?php the_title(); ?></h3>
                                <ul class="info-list">
                                    <li><span class="icon flaticon-placeholder-filled-point"></span><strong>Address:</strong><br><?php echo get_post_meta( get_the_ID(), 'address', true ); ?></li>
                                    <li><span class="icon flaticon-telephone-handle-silhouette"></span><strong>Call Us:</strong><?php echo get_post_meta( get_the_ID(), 'phone', true ); ?></li>
                                    <li><span class="icon fa fa-envelope"></span><strong>Mail Us:</strong><?php echo get_post_meta( get_the_ID(), 'e-mail', true ); ?></li>
                                    <li><span class="icon flaticon-clock-3"></span><strong>Office Hrs:</strong><?php echo get_post_meta( get_the_ID(), 'work_hours', true ); ?></li>
                                </ul>
                                <?php $links = get_post_meta(get_the_ID(), 'social-links', true); ?>
                                <?php if ( $links ) { ?>
                                <ul class="social-icon-three">
                                    <?php for ($i=0; $i<$links; $i++) { ?>
                                    <li><a href="<?php echo get_post_meta( get_the_ID(), 'social-links_'.$i.'_link', true ); ?>" target="_blank"><span class="fa <?php echo get_post_meta( get_the_ID(), 'social-links_'.$i.'_icon', true ); ?>"></span></a></li>
                                    <?php } ?>
                                </ul>
                                <?php } ?>
                            </div>
                            <?php } ?>
                            <?php wp_reset_postdata(); } ?>
                        </div>
                    </div>
                </div>
                <!--Form Column-->
                <div class="form-column col-md-8 col-sm-12 col-xs-12">
                    <div class="inner-column">
                    	<div class="row clearfix">
                        	<div class="label-column col-md-4 col-sm-12 col-xs-12">
                            	<ul class="labels-name">
                                	<li>Name & Email Address:</li>
                                    <li>Phone & Subject:</li>
                                    <li>Enter Your Message:</li>
                                </ul>
                            </div>
                            <div class="form-inner-column col-md-8 col-sm-12 col-xs-12">
                            	
                                <!-- Contact Form -->
                                <div class="contact-form">
                                    <!--Comment Form-->
                                    <form action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post" id="contact-form">
                                        <input type="hidden" name="action" value="contact_form">
                                        <input type="hidden" name="test" value="">
                                        <div class="row clearfix">
                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                <input type="text" name="name" placeholder="Your Name*" required>
                                            </div>
            
                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                <input type="email" name="email" placeholder="Email Address*" required>
                                            </div>
                                            
                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                <input type="text" name="phone" placeholder="Phone*" required>
                                            </div>
                                            
                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                <input type="text" name="subject" placeholder="Subject*" required>
                                            </div>
                                            
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                                                <textarea name="message" placeholder="Message*" required></textarea>
                                            </div>
            
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                                                <button class="theme-btn btn-style-one" type="submit" name="submit-form">Send message</button>
                                            </div>
            
                                        </div>
                                    </form>
            
                                </div>
                                <!--End Contact Form -->
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Contact Section-->
    
    <!--Map Section-->
    <?php 

    // map marks building
    $markers = '{ ';
    $offices = new WP_Query( array( 'post_type' => 'office', 'posts_per_page'=> 1000 ) );
    if ( $offices->have_posts() ) { $counter = 2;
        while ( $offices->have_posts() ) { $offices->the_post();
            $markers .= '"marker-'.$counter.'": ['.get_post_meta( get_the_ID(), 'map', true )['lat'].', '.get_post_meta( get_the_ID(), 'map', true )['lng'].', "<h4>'.get_the_title().'</h4><p>'.get_post_meta( get_the_ID(), 'address', true ).'</p>"], ';
        $counter = $counter + 2; }
        $markers = substr($markers, 0, -2);
    wp_reset_postdata(); }
    $markers .= ' }';

    ?>
    <section class="map-section">
    	<!--Map Outer-->
        <div class="map-outer">
            <div class="google-map"
                id="contact-google-map" 
                data-map-lat="44.231172" 
                data-map-lng="15" 
                data-icon-path="<?php echo get_theme_mod('map_tag_image'); ?>" 
                data-map-title="Toronto, Canada" 
                data-map-zoom="3" 
                data-markers='<?php echo $markers ?>'
            >
    		</div>
        </div>
    </section>
	<!--End Map Section-->
    
<?php get_footer(); ?>
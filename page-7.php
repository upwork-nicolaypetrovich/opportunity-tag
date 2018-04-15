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
    
    <!--Gallery Section-->
    <section class="gallery-section">
    	<div class="auto-container">
        	
            <!--MixitUp Galery-->
            <div class="mixitup-gallery">

                <?php $videos = new WP_Query( array( 'post_type' => 'video', 'posts_per_page'=> 1000 ) );?>
                <?php if ( $videos->have_posts() ) { ?>
                
                <!--Filter-->
                <div class="filters text-center clearfix">
                	

                    <?php $terms = get_terms( array( 'taxonomy' => 'video_filter', 'hide_empty' => true ) ); ?>
                	<ul class="filter-tabs filter-btns clearfix">
                        <li class="active filter" data-role="button" data-filter="all">View All</li>
                        <?php foreach ($terms as $term) { ?>
                            <li class="filter" data-role="button" data-filter=".<?php echo $term->slug; ?>"><?php echo $term->name; ?></li>
                        <?php } ?>
					</ul>
                    
                </div>
                
                <div class="filter-list row clearfix">

                    <?php while ( $videos->have_posts() ) { $videos->the_post(); ?>
                    <?php
                        $terms = get_the_terms( get_the_ID(), 'video_filter' );

                        // building classes for filter
                        $class_string = '';
                        foreach ($terms as $term) $class_string = $class_string.$term->slug.' ';

                        // building subheader
                        $subheader_string = '';
                        foreach ($terms as $term) $subheader_string = $subheader_string.$term->name.' & ';
                        $subheader_string = substr($subheader_string, 0, -2);

                        // youtube src for iframe
                        $src = (string) reset(simplexml_import_dom(DOMDocument::loadHTML(get_post_meta( get_the_ID(), 'player', true )))->xpath("//iframe/@src"));
                        if (strpos($src, '?') == false) $src = $src.'?rel=0';
                    ?>
					<!--Gallery Block Two-->
                    <div class="gallery-block-two mix all <?php echo $class_string; ?> col-lg-4 col-md-4 col-sm-6 col-xs-12" onclick="popupVideo('<?php echo $src; ?>');">
                        <div class="inner-box">
                            <div class="image">
                                <img src="<?php the_post_thumbnail_url( 'video-main' ); ?>" alt="" />
                                <div class="overlay-box">
                                    <div class="lower-box">
                                        <div class="designation"><?php echo $subheader_string; ?></div>
                                        <h3><a href="#"><?php the_title(); ?></a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    
                    
                </div>

                <?php wp_reset_postdata(); } ?>
            </div>
            
        </div>
    </section>

    <div id="vodeoPopup" onclick="popupVideoStop();"></div>
    
<?php get_footer(); ?>
<?php get_header(); ?>
<?php $home = new WP_Query( array( 'pagename' => 'home', 'posts_per_page'=> 1 ) );?>
<?php $home->the_post(); ?>
<?php $blog_first_line = get_post_meta( get_the_ID(), 'blog_first_line', true );?>
<?php $blog_second_line = get_post_meta( get_the_ID(), 'blog_second_line', true );?>
<?php $programs_first_line = get_post_meta( get_the_ID(), 'programs_first_line', true );?>
<?php $programs_second_line = get_post_meta( get_the_ID(), 'programs_second_line', true );?>
    
    <!--Main Slider-->
    <section class="main-slider">
        
        <div class="rev_slider_wrapper fullwidthbanner-container"  id="rev_slider_one_wrapper" data-source="gallery">
            <div class="rev_slider fullwidthabanner" id="rev_slider_one" data-version="5.4.1">
                <ul>
                    
                    
                    <li id="main-video-slide" data-description="Slide Description" data-easein="default" data-easeout="default" data-fsmasterspeed="1500" data-fsslotamount="7" data-fstransition="fade" data-hideafterloop="0" data-hideslideonmobile="off" data-index="rs-1689" data-masterspeed="default" data-param1="" data-param10="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-rotate="0" data-saveperformance="off" data-slotamount="default" data-thumb="images/main-slider/image-3.jpg" data-title="Slide Title" data-transition="parallaxvertical">

                    <?php 
                        $src = (string) reset(simplexml_import_dom(DOMDocument::loadHTML(get_post_meta( get_the_ID(), 'player', true )))->xpath("//iframe/@src"));
                        if (strpos($src, '?') == false) $src = $src.'?rel=0';
                      	$playlist = end( explode('/', explode('?', $src)[0] ) );
                    ?>

                    <iframe id="main-video" width="560" height="315" src="<?php echo $src; ?>&amp;controls=0&amp;showinfo=0&amp;autoplay=1&amp;modestbranding=1&amp;mute=1&amp;loop=1&amp;playlist=<?php echo $playlist; ?>&amp;iv_load_policy=3&amp;vq=hd720" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    
                    <div class="tp-caption" 
                    data-paddingbottom="[0,0,0,0]"
                    data-paddingleft="[0,0,0,0]"
                    data-paddingright="[0,0,0,0]"
                    data-paddingtop="[0,0,0,0]"
                    data-responsive_offset="on"
                    data-type="text"
                    data-height="none"
                    data-width="['750','720','650','420']"
                    data-whitespace="normal"
                    data-hoffset="['15','15','15','15']"
                    data-voffset="['-60','-100','-100','-85']"
                    data-x="['center','center','center','center']"
                    data-y="['middle','middle','middle','middle']"
                    data-textalign="['top','top','top','top']"
                    data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
                    style="z-index: 7; white-space: nowrap;text-transform:left;">
                        <h2 class="text-center"><?php echo get_post_meta( get_the_ID(), 'first_line', true ); ?></h2>
                    </div>
                    
                    <div class="tp-caption" 
                    data-paddingbottom="[0,0,0,0]"
                    data-paddingleft="[0,0,0,0]"
                    data-paddingright="[0,0,0,0]"
                    data-paddingtop="[0,0,0,0]"
                    data-responsive_offset="on"
                    data-type="text"
                    data-height="none"
                    data-width="['550','720','550','420']"
                    data-whitespace="normal"
                    data-hoffset="['15','15','15','15']"
                    data-voffset="['80','35','25','10']"
                    data-x="['center','center','center','center']"
                    data-y="['middle','middle','middle','middle']"
                    data-textalign="['top','top','top','top']"
                    data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
                    style="z-index: 7; white-space: nowrap;text-transform:left;">
                        <div class="text text-center"><?php echo get_post_meta( get_the_ID(), 'second_line', true ); ?></div>
                    </div>
                    
                    </li>
                    
                </ul>
            </div>
        </div>

    </section>
    <!--End Main Slider-->
    
    <!--Free Book Section Begin-->
    <section class="free-book-container" style="background: <?php echo get_theme_mod('free_book_background'); ?>;">
        <div class="row auto-container">
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div>
                    <?php $free_book_image_src = free_book_image(get_theme_mod('free_book_image')); ?>
                    <img src="<?php echo $free_book_image_src; ?>" alt="">
                </div>
                <div>
                    <h2><?php echo get_theme_mod('free_book_title'); ?></h2>
                    <p><?php echo get_theme_mod('free_book_text'); ?></p>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
                <!-- Appointment Form -->
                    <div class="apointment-form">
                        <!--Call Back Form-->
                        <form method="post" action="https://opportunitytag.us18.list-manage.com/subscribe/post?u=d7660ba1fd934f0267b37e3b9&amp;id=e416151831">
                            <div class="row clearfix">
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="FNAME" placeholder="Your Name" required style="background: <?php echo get_theme_mod('free_book_inputs'); ?>;">
                                </div>
            
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <input type="email" name="EMAIL" placeholder="Email Address" required style="background: <?php echo get_theme_mod('free_book_inputs'); ?>;">
                                </div>
                                
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <button class="theme-btn btn-style-one" type="submit" name="submit-form">Submit</button>
                                </div>
                                
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </section>
    <!--Free Book End-->
    
    <!--About Section-->
    <div class="about-section">
        <div class="auto-container">
            <!--Sec Title-->
            <div class="sec-title centered">
                <h2><?php echo get_post_meta( get_the_ID(), 'first_header', true ); ?></h2>
                <div class="title"><?php echo get_post_meta( get_the_ID(), 'second_header', true ); ?></div>
                <div class="separator"></div>
            </div>
            <div class="inner-container clearfix">
                <!--Carousel Column-->
                <div class="carousel-column col-md-6 col-sm-12 col-xs-12">
                    <div class="single-item-carousel owl-carousel owl-theme">
                        <?php $slider = get_post_meta(get_the_ID(), 'slider', true); ?>
                        <?php for ($i=0; $i<$slider; $i++) { ?>
                        <div class="slide">
                            <div class="image">
                                <img src="<?php echo wp_get_attachment_image_src( get_post_meta( get_the_ID(), 'slider_'.$i.'_image', true ), 'main-slider')[0]; ?>" alt="" />
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
                        <a href="<?php echo get_post_meta( get_the_ID(), 'button', true ); ?>" class="theme-btn btn-style-three">More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End About Section-->
    
    <?php $testimonials = new WP_Query( array( 'post_type' => 'testimonials', 'posts_per_page'=> 1000 ) );?>
    <?php if ( $testimonials->have_posts() ) { ?>
    <!--Testimonial Section-->
    <section class="testimonial-section">
        <div class="auto-container">
            <div class="sec-title light centered">
                <h2><?php echo get_post_meta( get_the_ID(), 'testimonials_first_line', true ); ?></h2>
                <div class="title"><?php echo get_post_meta( get_the_ID(), 'testimonials_second_line', true ); ?></div>
                <div class="separator"></div>
            </div>
            <div class="outer-container two-item-carousel owl-carousel owl-theme">
                
                <?php while ( $testimonials->have_posts() ) { $testimonials->the_post();?>
                <!--Testimonial Block-->
                <div class="testimonial-block">
                    <div class="inner-box">
                        <div class="author-image">
                            <img src="<?php the_post_thumbnail_url( 'testimonial-main' ); ?>" alt="" />
                        </div>
                        <h3><?php the_title(); ?></h3>
                        <div class="designation"><?php echo get_post_meta( get_the_ID(), 'position', true ); ?></div>
                        <div class="text"><?php echo get_post_meta( get_the_ID(), 'testimonial', true ); ?></div>
                        <div class="client-icon">
                            <img src="<?php echo wp_get_attachment_image_src( get_post_meta( get_the_ID(), 'logo', true ), 'testimonial-logo' )[0]; ?>" alt="" />
                        </div>
                    </div>
                </div>
                <?php } ?>
                
            </div>
        </div>
    </section>
    <?php wp_reset_postdata(); } ?>
    <!--End Testimonial Section-->
    
    <!--News Section-->
    <?php $main_posts = new WP_Query( array( 'post_type' => 'post', 'posts_per_page'=> 3 ) );?>
    <?php if ( $main_posts->have_posts() ) { ?>
    <section class="news-section">
        <div class="auto-container">
            <div class="sec-title">
                <div class="clearfix">
                    <div class="pull-left">
                        <h2><?php echo $blog_first_line; ?></h2>
                        <div class="title"><?php echo $blog_second_line; ?></div>
                        <div class="separator"></div>
                    </div>
                    <div class="pull-right">
                        <a href="<?php echo get_category_link(1); ?>" class="theme-btn btn-style-four">More Posts</a>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                
                <!--News Block-->
                <?php while ( $main_posts->have_posts() ) { $main_posts->the_post(); ?>
                <div class="news-block col-md-4 col-sm-6 col-xs-12">
                    <div class="inner-box">
                        <div class="middle-box">
                            <h3><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
                            <div class="text"><?php the_excerpt(); ?></div>
                        </div>
                        <div class="lower-box">
                            <div class="image">
                                <img src="<?php the_post_thumbnail_url( 'main-blog' ); ?>" alt="<?php echo get_the_title(); ?>" />
                                <div class="overlay-box">
                                    <div class="overlay-inner">
                                        <a class="read-more" href="<?php the_permalink(); ?>"><span class="icon flaticon-arrow-pointing-to-right"></span> Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
                
            </div>
        </div>
    </section>
    <?php wp_reset_postdata(); } ?>
    <!--End News Section-->
    
    <?php $programs = new WP_Query( array( 'post_type' => 'programs', 'posts_per_page'=> 1000 ) );?>
    <?php if ( $programs->have_posts() ) { ?>
    <!--Project Section-->
    <section class="project-section">
        
        <!--Porfolio Tabs-->
        <div class="project-tab">
            <div class="auto-container">
                <!--Sec Title-->
                <div class="sec-title clearfix">
                    <div class="pull-left">
                        <h2><?php echo $programs_first_line; ?></h2>
                        <div class="title"><?php echo $programs_second_line; ?></div>
                        <div class="separator"></div>
                    </div>
                    <div class="tab-btns-box pull-right">
                        <!--Tabs Header-->
                        <div class="tabs-header">
                            <?php $all_terms = get_terms( array( 'taxonomy' => 'group_filter', 'hide_empty' => true ) ); ?>
                            <ul class="product-tab-btns clearfix">
                                <li class="p-tab-btn active-btn" data-tab="#p-tab-1">View All</li>
                                <?php $tab = 2; foreach ($all_terms as $term) { ?>
                                    <li class="p-tab-btn" data-tab="#p-tab-<?php echo $tab; ?>"><?php echo $term->name; ?></li>
                                <?php $tab++; } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!--Tabs Content-->  
            <div class="p-tabs-content">
                <!--Portfolio Tab / Active Tab-->
                <div class="p-tab active-tab" id="p-tab-1">
                    <div class="project-carousel owl-theme owl-carousel">
                        
                        <?php while ( $programs->have_posts() ) { $programs->the_post(); ?>
                        <?php
                            // building subheader
                            $terms = get_the_terms( get_the_ID(), 'group_filter' );
                            $subheader_string = '';
                            foreach ($terms as $term) $subheader_string = $subheader_string.$term->name.' & ';
                            $subheader_string = substr($subheader_string, 0, -2);
                        ?>
                        <div class="gallery-block">
                            <div class="inner-box">
                                <div class="image">
                                    <img src="<?php the_post_thumbnail_url( 'programs-main' ); ?>" alt="<?php the_title(); ?>" />
                                    <div class="overlay-box">
                                        <a href="<?php echo get_post_meta( get_the_ID(), 'link', true ); ?>" class="link-box" target="_blank"><span class="fa fa-external-link"></span></a>
                                    </div>
                                    <div class="lower-box">
                                        <div class="designation"><?php echo $subheader_string; ?></div>
                                        <h3><a href="<?php echo get_post_meta( get_the_ID(), 'link', true ); ?>" target="_blank"><?php the_title(); ?></a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php wp_reset_postdata(); } ?>


                    </div>
                </div>
                

                <?php $tab = 2; foreach ($all_terms as $all_term) { ?>
                <!--Portfolio Tab-->
                <div class="p-tab" id="p-tab-<?php echo $tab; ?>">
                    <div class="project-carousel owl-theme owl-carousel">
                        
                        <?php while ( $programs->have_posts() ) { $programs->the_post(); ?>
                        <?php
                            $teb_term = false; // cheking for current tub terms

                            // building subheader
                            $terms = get_the_terms( get_the_ID(), 'group_filter' );
                            $subheader_string = '';
                            foreach ($terms as $term){
                                $subheader_string = $subheader_string.$term->name.' & ';
                                if ($term->slug == $all_term->slug) $teb_term = true;// cheking term slug
                            }
                            $subheader_string = substr($subheader_string, 0, -2);

                            
                           if ($teb_term){
                        ?>
                        <div class="gallery-block">
                            <div class="inner-box">
                                <div class="image">
                                    <img src="<?php the_post_thumbnail_url( 'programs-main' ); ?>" alt="<?php the_title(); ?>" />
                                    <div class="overlay-box">
                                        <a href="<?php echo get_post_meta( get_the_ID(), 'link', true ); ?>" class="link-box" target="_blank"><span class="fa fa-external-link"></span></a>
                                    </div>
                                    <div class="lower-box">
                                        <div class="designation"><?php echo $subheader_string; ?></div>
                                        <h3><a href="<?php echo get_post_meta( get_the_ID(), 'link', true ); ?>" target="_blank"><?php the_title(); ?></a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } wp_reset_postdata(); } ?>
                        
                    </div>
                </div>
                <?php $tab++; } ?>
                
            </div>
            
        </div>
        
    </section>
    <!--End Project Section-->
    <?php } ?>
    
    <!--Free Book Section Begin-->
    <section class="free-book-container" style="background: <?php echo get_theme_mod('free_book_background'); ?>;">
        <div class="row auto-container">
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div>
                    <img src="<?php echo $free_book_image_src; ?>" alt="">
                </div>
                <div>
                    <h2><?php echo get_theme_mod('free_book_title'); ?></h2>
                    <p><?php echo get_theme_mod('free_book_text'); ?></p>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
                <!-- Appointment Form -->
                    <div class="apointment-form">
                        <!--Call Back Form-->
                        <form method="post" action="https://opportunitytag.us18.list-manage.com/subscribe/post?u=d7660ba1fd934f0267b37e3b9&amp;id=e416151831">
                            <div class="row clearfix">
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="FNAME" placeholder="Your Name" required style="background: <?php echo get_theme_mod('free_book_inputs'); ?>;">
                                </div>
            
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <input type="email" name="EMAIL" placeholder="Email Address" required style="background: <?php echo get_theme_mod('free_book_inputs'); ?>;">
                                </div>
                                
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <button class="theme-btn btn-style-one" type="submit" name="submit-form">Submit</button>
                                </div>
                                
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </section>
    <!--Free Book End-->
    

    <?php if(get_theme_mod('onoff')){ ?>
    <!--Pop up Begin-->
    <div id="mainPopup" onclick="mainPopupClose();" data-time="<?php echo get_theme_mod('time'); ?>000">
        <div style="width: <?php echo get_theme_mod('width'); ?>; height: <?php echo get_theme_mod('height'); ?>; margin: <?php echo get_theme_mod('top'); ?> <?php echo get_theme_mod('left'); ?>; overflow: hidden;" onclick="event.stopPropagation();">
            <?php echo get_theme_mod('code'); ?>
            <i class="fa fa-close"></i>
        </div>
    </div>
    <?php } ?>
    <!--Pop up End-->
<?php get_footer(); ?>
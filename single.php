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
                        <li><a href="<?php echo get_category_link(1); ?>">Blog</a></li>
                        <li><?php the_title(); ?></li>
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
                                    	<?php echo preg_replace("/\r\n|\r|\n/",'<br/>', the_content()); ?>
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
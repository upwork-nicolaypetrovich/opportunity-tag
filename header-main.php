<!DOCTYPE html>
<html <?php language_attributes(); ?> style="margin: 0 !important;">
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo( 'charset' ); ?>">
<title><?php echo get_bloginfo('name'); ?></title>
<!-- Stylesheets -->
<link href="<?php echo get_template_directory_uri();?>/css/bootstrap.css" rel="stylesheet">
<link href="<?php echo get_template_directory_uri();?>/plugins/revolution/css/settings.css" rel="stylesheet" type="text/css"><!-- REVOLUTION SETTINGS STYLES -->
<link href="<?php echo get_template_directory_uri();?>/plugins/revolution/css/layers.css" rel="stylesheet" type="text/css"><!-- REVOLUTION LAYERS STYLES -->
<link href="<?php echo get_template_directory_uri();?>/plugins/revolution/css/navigation.css" rel="stylesheet" type="text/css"><!-- REVOLUTION NAVIGATION STYLES -->
<link href="<?php echo get_template_directory_uri();?>/css/style.css" rel="stylesheet">
<link href="<?php echo get_template_directory_uri();?>/css/responsive.css" rel="stylesheet">

<!--Favicon-->
<link rel="shortcut icon" href="<?php echo get_site_icon_url(64); ?>" type="image/x-icon">
<link rel="icon" href="<?php echo get_site_icon_url(64); ?>" type="image/x-icon">
<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="<?php echo get_template_directory_uri();?>/js/respond.js"></script><![endif]-->
<?php wp_head(); ?>
</head>

<body>
<div class="page-wrapper">
 	
    <!-- Preloader -->
    <div class="preloader"></div>
 	
    <!-- Main Header-->
    <header class="main-header">
    
        <!--Header-Upper-->
        <div class="header-upper">
        	<div class="auto-container clearfix">
                	
                <div class="pull-left logo-outer">
                    <div class="logo"><a href="index.html"><?php the_custom_logo(); ?></a></div>
                </div>
                
                <div class="pull-right upper-right clearfix">
                    
                    <div class="nav-outer clearfix">
                		<!-- Main Menu -->
                        <nav class="main-menu">
                            <div class="navbar-header">
                                <!-- Toggle Button -->    	
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                </button>
                            </div>
                            
                            <div class="navbar-collapse collapse clearfix">
                                <?php wp_nav_menu( array( 'menu_class' => 'navigation clearfix', 'theme_location' => 'top' ) ); ?>
                            </div>
                        </nav>
                        
                        <!-- Main Menu End-->
                        <div class="outer-box">
                            <!--Search Box-->
                            <div class="search-box-outer">
                                <div class="dropdown">
                                    <button class="search-box-btn dropdown-toggle" type="button" onclick="window.location.href = '<?php echo get_theme_mod('play_link'); ?>';"><span class="fa fa-play"></span></button>
                                </div>
                            </div>
                            
                        </div>
            		</div>
                    
                </div>
                    
            </div>
        </div>
        <!--End Header Upper-->
        
        <!--Sticky Header-->
        <div class="sticky-header">
        	<div class="auto-container clearfix">
            	<!--Logo-->
            	<div class="logo pull-left">
                	<a href="index.html" class="img-responsive"><?php the_custom_logo(); ?></a>
                </div>
                
                <!--Right Col-->
                <div class="right-col pull-right">
                	<!-- Main Menu -->
                    <nav class="main-menu">
                        <div class="navbar-header">
                            <!-- Toggle Button -->    	
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        
                        <div class="navbar-collapse collapse clearfix">
                            <?php wp_nav_menu( array( 'menu_class' => 'navigation clearfix', 'theme_location' => 'top' ) ); ?>
                        </div>
                    </nav><!-- Main Menu End-->
                </div>
                
            </div>
        </div>
        <!--End Sticky Header-->
    
    </header>
    <!--End Main Header -->
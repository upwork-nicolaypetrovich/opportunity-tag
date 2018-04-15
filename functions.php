<?php

// start of the session
session_start();


// remove comments from admin menu
add_action( 'admin_menu', 'my_remove_admin_menus' );
function my_remove_admin_menus() {
	remove_menu_page( 'edit-comments.php' );
}
add_action( 'init', 'remove_comment_support', 100 );
function remove_comment_support() {
	remove_post_type_support( 'post', 'comments' );
	remove_post_type_support( 'page', 'comments' );
}
function mytheme_admin_bar_render() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu( 'comments' );
}
add_action( 'wp_before_admin_bar_render', 'mytheme_admin_bar_render' );


// remove the additional customizer section
add_action( 'customize_register', 'prefix_remove_css_section', 15 );
function prefix_remove_css_section( $wp_customize ) {
	$wp_customize->remove_section( 'custom_css' );
	$wp_customize->remove_section( 'static_front_page' );
}


// remove additional items from admin menu
add_action( 'admin_menu', 'my_remove_menu_pages' ); // comment this line to tern off
function my_remove_menu_pages() {
    remove_menu_page('edit.php?post_type=acf-field-group');
    remove_menu_page('fac');
    remove_menu_page('cptui_main_menu');
    remove_menu_page('tools.php');
    //remove_menu_page('plugins.php');
}
//add_action( 'admin_init', 'wpse_136058_debug_admin_menu' );  // debug script
function wpse_136058_debug_admin_menu() {
    echo '<pre>' . print_r( $GLOBALS[ 'menu' ], TRUE) . '</pre>';
}


//get rid of tags on posts
function ryanbenhase_unregister_tags() {
    unregister_taxonomy_for_object_type( 'post_tag', 'post' );
}
add_action( 'init', 'ryanbenhase_unregister_tags' );


// registering logo
add_theme_support( 'custom-logo');


// registering navigation
register_nav_menus( array(
	'top'              => 'Header Menu',
	'bottom_vertical'  => 'Footer Vertical Menu',
	'bottom'           => 'Footer Menu'
) );


// registering image dimensions
add_theme_support( 'post-thumbnails' );
add_image_size( 'main-blog', 368, 218, true );
add_image_size( 'main-slider', 585, 450, true );
add_image_size( 'about-slider', 570, 450, true );
add_image_size( 'about-final', 970, 370, true );
add_image_size( 'testimonial-main', 86, 86, true );
add_image_size( 'testimonial-logo', 200, 65, true );
add_image_size( 'programs-main', 298, 416, true );
add_image_size( 'team-main', 270, 250, true );
add_image_size( 'history-main', 910, 455, true );
add_image_size( 'video-main', 370, 220, true );
add_image_size( 'archive-main', 1168, 560, true );
add_image_size( 'contact-main', 1170, 390, true );
add_image_size( 'header-image', 2000, 800, true );
add_image_size( 'footer-blog', 70, 70, true );
add_image_size( 'free-book', 70, 100, true );


// ACF google map api key
function my_acf_init() {
	acf_update_setting('google_api_key', 'AIzaSyBKS14AnP3HCIVlUpPKtGp7CbYuMtcXE2o');
}
add_action('acf/init', 'my_acf_init');


// custom CSS for admin panel
add_action('admin_head', 'my_custom_fonts');
function my_custom_fonts() {
  echo '<style>
    .heateor_sss_right_column, .ui-corner-all>div {
      display: none;
    }
    .heateor_sss_left_column{
    	width: 95% !important;
    }
    .menu-item-handle .item-edit{
    	overflow: hidden;
		height: 38px;
    }
  </style>';
}


// image cropper for free book
function free_book_image($name) {

	// defining image dimensions
	$rest = substr($name, -3);
	if ($rest == 'png' || $rest == 'PNG')
		$source_image = imagecreatefrompng($name);
	else
		$source_image = imagecreatefromjpeg($name);
	$width  = imagesx($source_image);
	$height = imagesy($source_image);

	// defining new image sizes
	$zoom_1 = 100 / $height;
	$zoom_2 = 70 / $width;
	if ($zoom_1 > $zoom_2)
		$zoom = $zoom_1;
	else
		$zoom = $zoom_2;
	$v_width  = floor($width * $zoom);
	$v_height = floor($height * $zoom);

	// creating virtual crop
	$virtual_image = imagecreatetruecolor(70, 100);
	imagecolortransparent($virtual_image, imagecolorallocate($virtual_image, 0, 0, 0));
	imagealphablending($virtual_image, false);
	imagesavealpha($virtual_image, true);
	imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $v_width, $v_height, $width, $height);

	// saving new image
	$free_book = 'wp-content/uploads/cropper/free_book.png';
	if (imagepng($virtual_image, $free_book)) return $free_book;
	else return false;
	
}


// form information sending
function send_email_to_admin() {
	if ( isset( $_POST['test'] ) && $_POST['test'] == '' ) {
		//print_r($_POST); die; // debug
		$message = '';
		$subject = 'Contact message from website Opportunity Tag';
		$name = 'Unknown Sender';
		$email = 'noreplay@mail.com';
		if ( isset( $_POST['name'] ) ) {
			$message .= 'Name: ' . $_POST['name'] . "\n\r";
			$name = $_POST['name'];
		}
		if ( isset( $_POST['email'] ) ) {
			$email = $_POST['email'];
		}
		if ( isset( $_POST['email'] ) ) {
			$message .= 'Phone: ' . $_POST['phone'] . "\n\r";
		}
		if ( isset( $_POST['message'] ) ) {
			$message .= $_POST['message'] . "\n\r";
		}
		if ( isset( $_POST['subject'] ) ) {
			$subject = $_POST['subject'];
		}
		$headers = 'From: '.$name.' <'.$email.'>' . "\r\n" . 'X-Mailer: PHP/' . phpversion();
		wp_mail( get_option( 'admin_email' ), $subject, $message, $headers );
		$_SESSION['popup'] = true;
	}
	wp_redirect( get_page_link( 9 ) );
	exit();
}
add_action( 'admin_post_nopriv_contact_form', 'send_email_to_admin' );
add_action( 'admin_post_contact_form', 'send_email_to_admin' );


// adding theme customization
add_action( 'customize_register', function ( $wp_customize ) {


	// header section settings
    $wp_customize->add_setting(
		'play_link',
		array( 'default' => 'https://www.youtube.com/watch?v=PGhJCihROck' )
	);
	$wp_customize->add_control(
		'play_link',
		array(
			'label'   => 'Orange fixed link',
			'section' => 'title_tagline',
			'type'    => 'text',
		)
	);

    $wp_customize->add_setting('map_tag_image', array(
        'transport'         => 'refresh',
        'height'         => 325,
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'map_tag_image_control', array(
        'label'             => 'Map Icon Image',
        'section'           => 'title_tagline',
        'settings'          => 'map_tag_image',
    )));


	// blog section settings
	$wp_customize->add_section(
		'blog',
		array(
			'title'       => 'Blog Settings',
			'description' => 'Blog background image and headers settings',
			'priority'    => 160,
		)
	);

    $wp_customize->add_setting('blog_header_image', array(
        'transport'         => 'refresh',
        'height'         => 325,
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'blog_header_image_control', array(
        'label'             => 'Header Image',
        'section'           => 'blog',
        'settings'          => 'blog_header_image',
    )));

    $wp_customize->add_setting(
		'blog_header_text_1',
		array( 'default' => 'My Blog' )
	);
	$wp_customize->add_control(
		'blog_header_text_1',
		array(
			'label'   => 'Title',
			'section' => 'blog',
			'type'    => 'text',
		)
	);

    $wp_customize->add_setting(
		'blog_header_text_2',
		array( 'default' => 'read it now' )
	);
	$wp_customize->add_control(
		'blog_header_text_2',
		array(
			'label'   => 'Second Title',
			'section' => 'blog',
			'type'    => 'text',
		)
	);


	// footer section settings
	$wp_customize->add_section(
		'footer',
		array(
			'title'       => 'Footer Settings',
			'description' => 'Footer titles, texts and links settings',
			'priority'    => 200,
		)
	);

    $wp_customize->add_setting('footer_logo', array(
        'transport'         => 'refresh',
        'height'         => 325,
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footer_logo_control', array(
        'label'             => 'Footer Logo',
        'section'           => 'footer',
        'settings'          => 'footer_logo',
    )));

    $wp_customize->add_setting(
		'footer_text',
		array( 'default' => 'Over 24 years experience & knowledge international standards, technologicaly changes & industrial systems, we are dedicated to provides seds the best & solutions...' )
	);
	$wp_customize->add_control(
		'footer_text',
		array(
			'label'   => 'Text',
			'section' => 'footer',
			'type'    => 'textarea'
		)
	);

    $wp_customize->add_setting(
		'footer_address',
		array( 'default' => '13, Big Smart Str' )
	);
	$wp_customize->add_control(
		'footer_address',
		array(
			'label'   => 'Address',
			'section' => 'footer',
			'type'    => 'text',
		)
	);

    $wp_customize->add_setting(
		'footer_phone',
		array( 'default' => '+123-456-7890' )
	);
	$wp_customize->add_control(
		'footer_phone',
		array(
			'label'   => 'Phone',
			'section' => 'footer',
			'type'    => 'text',
		)
	);

    $wp_customize->add_setting(
		'footer_e-mail',
		array( 'default' => 'Mailus@Stockton.com' )
	);
	$wp_customize->add_control(
		'footer_e-mail',
		array(
			'label'   => 'E-mail',
			'section' => 'footer',
			'type'    => 'text',
		)
	);

    $wp_customize->add_setting(
		'footer_blog_header',
		array( 'default' => 'Latest Posts' )
	);
	$wp_customize->add_control(
		'footer_blog_header',
		array(
			'label'   => 'Blog Title',
			'section' => 'footer',
			'type'    => 'text',
		)
	);

    $wp_customize->add_setting(
		'footer_social_header',
		array( 'default' => 'Social Links' )
	);
	$wp_customize->add_control(
		'footer_social_header',
		array(
			'label'   => 'Social Links Title',
			'section' => 'footer',
			'type'    => 'text',
		)
	);

    $wp_customize->add_setting(
		'footer_copyrights',
		array( 'default' => 'Copyrights © 2017 All Rights Reserved by Stockton.' )
	);
	$wp_customize->add_control(
		'footer_copyrights',
		array(
			'label'   => 'Copyrights',
			'section' => 'footer',
			'type'    => 'text',
		)
	);


	// free book section settings
	$wp_customize->add_section(
		'free_book',
		array(
			'title'       => 'Free Book Settings',
			'description' => 'Settings for free book suggestion bar',
			'priority'    => 200,
		)
	);

    $wp_customize->add_setting('free_book_image', array(
        'transport'         => 'refresh',
        'height'         => 325,
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'free_book_image_control', array(
        'label'             => 'Book Image',
        'section'           => 'free_book',
        'settings'          => 'free_book_image',
    )));

    $wp_customize->add_setting(
		'free_book_title',
		array( 'default' => 'Get free book' )
	);
	$wp_customize->add_control(
		'free_book_title',
		array(
			'label'   => 'Title',
			'section' => 'free_book',
			'type'    => 'text',
		)
	);

    $wp_customize->add_setting(
		'free_book_text',
		array( 'default' => 'Text' )
	);
	$wp_customize->add_control(
		'free_book_text',
		array(
			'label'   => 'Text',
			'section' => 'free_book',
			'type'    => 'text',
		)
	);

    $wp_customize->add_setting(
		'free_book_background',
		array( 'default' => '#202020' )
	);
	$wp_customize->add_control(
		'free_book_background',
		array(
			'label'   => 'Background Color',
			'section' => 'free_book',
			'type'    => 'color',
		)
	);

    $wp_customize->add_setting(
		'free_book_inputs',
		array( 'default' => '#202020' )
	);
	$wp_customize->add_control(
		'free_book_inputs',
		array(
			'label'   => 'Inputs Color',
			'section' => 'free_book',
			'type'    => 'color',
		)
	);


	// subscribe section settings
	$wp_customize->add_section(
		'subscribe',
		array(
			'title'       => 'Subscribe Settings',
			'description' => 'Settings for subscribe suggestion bar',
			'priority'    => 201,
		)
	);

    $wp_customize->add_setting(
		'subscribe_title',
		array( 'default' => 'Subscribe' )
	);
	$wp_customize->add_control(
		'subscribe_title',
		array(
			'label'   => 'Title',
			'section' => 'subscribe',
			'type'    => 'text',
		)
	);

    $wp_customize->add_setting(
		'subscribe_text',
		array( 'default' => 'Text' )
	);
	$wp_customize->add_control(
		'subscribe_text',
		array(
			'label'   => 'Text',
			'section' => 'subscribe',
			'type'    => 'text',
		)
	);

    $wp_customize->add_setting(
		'subscribe_background',
		array( 'default' => '#202020' )
	);
	$wp_customize->add_control(
		'subscribe_background',
		array(
			'label'   => 'Background Color',
			'section' => 'subscribe',
			'type'    => 'color',
		)
	);

    $wp_customize->add_setting(
		'subscribe_inputs',
		array( 'default' => '#202020' )
	);
	$wp_customize->add_control(
		'subscribe_inputs',
		array(
			'label'   => 'Inputs Color',
			'section' => 'subscribe',
			'type'    => 'color',
		)
	);


	// pop-up section settings
	$wp_customize->add_section(
		'popup',
		array(
			'title'       => 'Pop-Up Settings',
			'description' => 'Settings for pop-up on main',
			'priority'    => 202,
		)
	);

    $wp_customize->add_setting(
		'onoff',
		array( 'default' => 1 )
	);
	$wp_customize->add_control(
		'onoff',
		array(
			'label'   => 'Turn On',
			'section' => 'popup',
			'type'    => 'checkbox',
		)
	);

    $wp_customize->add_setting(
		'code',
		array( 'default' => 'code' )
	);
	$wp_customize->add_control(
		'code',
		array(
			'label'   => 'MailChimp Code',
			'section' => 'popup',
			'type'    => 'textarea',
		)
	);

    $wp_customize->add_setting(
		'time',
		array( 'default' => '5' )
	);
	$wp_customize->add_control(
		'time',
		array(
			'label'   => 'Time in seconds',
			'section' => 'popup',
			'type'    => 'number',
		)
	);

    $wp_customize->add_setting(
		'width',
		array( 'default' => '50%' )
	);
	$wp_customize->add_control(
		'width',
		array(
			'label'   => 'Container Width',
			'section' => 'popup',
			'type'    => 'text',
		)
	);

    $wp_customize->add_setting(
		'height',
		array( 'default' => '40%' )
	);
	$wp_customize->add_control(
		'height',
		array(
			'label'   => 'Container Height',
			'section' => 'popup',
			'type'    => 'text',
		)
	);

    $wp_customize->add_setting(
		'top',
		array( 'default' => '25%' )
	);
	$wp_customize->add_control(
		'top',
		array(
			'label'   => 'Top Space',
			'section' => 'popup',
			'type'    => 'text',
		)
	);

    $wp_customize->add_setting(
		'left',
		array( 'default' => '25%' )
	);
	$wp_customize->add_control(
		'left',
		array(
			'label'   => 'Left Space',
			'section' => 'popup',
			'type'    => 'text',
		)
	);


} );
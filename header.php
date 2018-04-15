<?php 

if (is_home()) {
	get_template_part( 'header', 'main' );
}else{
	get_template_part( 'header', 'pages' );
}

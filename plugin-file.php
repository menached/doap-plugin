<?php
/**
 * @package DevOps_and_Platforms
 * @version 1.0
 */
/*
Plugin Name: Generic Plugin by Doap
Plugin URI: http://wordpress.org/extend/plugins/devops_and_platforms/
Description: This is a generic plugin framework for adding stuff to a Wordpress website.  DevOps and Platforms is a modern web hosting platform that allows you to easily launch websites into the cloud.  Your pages will automatically be served from <cite>2</cite> datacenters.  For more information about doap.com or help with setting up your free site, drop a line to <a href="mailto:info@doap.com">info@doap.com</a>

Author: David Menache, Shawn Crowe
Version: 1.0
Author URI: http://doap.com/
*/

// This just echoes the chosen line, we'll position it later
function doap_function() {

//echo do_shortcode('<div id=youtubelive-homepage-widget>[doap_animate type="fadeIn"][doap_heading style="modern-1-blue" size="20" align="left" margin="0" class="fp-title-bar"]<a href="http://www.laprensa.com.ni/lptv"><div class="title-left" style="font-color:red">YOUTUBE EN VIVO</div><div class="line"><div class="line-container"></div></div></a>[/doap_heading][/doap_animate] <iframe style="min-height:350px;max-height:360px;" width="640" height="360" src="//www.youtube.com/embed/videoseries?list=PLLSDIHSJqOp3m2_cg5-EHQ-SZHoiWtbWA?rel=0&autoplay=1" frameborder="0" allowfullscreen></iframe> </div>');
//echo "thats doap";
//echo '<style> @media only screen and (min-width:300px) and (max-width: 640px) { .col-300, .col-380, .col-460, .col-540, .col-620 {width:100%;overflow:hidden; } } </style>';
if ($_GET['archive_page'] == 1) { 
echo ('<div id="doapified" style=width:250px;position:relative;left:24px;>');
the_widget( 'WP_Widget_Calendar' ); 
echo ('</div>');
}
//echo do_shortcode('<div id=livestream-homepage-widget>[doap_animate type="fadeIn"][doap_heading style="modern-1-blue" size="20" align="left" margin="0" class="fp-title-bar"]<a href="http://noticias.laprensa.com.ni/lptv"><div class="title-left" style="color:red">EN VIVO</div><div class="line"><div class="line-container"></div></div></a>[/doap_heading][/doap_animate] <div style="width:100%;"><iframe src="http://new.livestream.com/accounts/6229170/events/2776899/player?height=360&width=530px&autoPlay=true&mute=false" width="100%" height="360" frameborder="0" scrolling="no"> </iframe></div></div>'); 
}

// Now we set that function up to execute when the admin_notices action is called
//add_action( 'admin_notices', 'youtube_live' );

// We need some CSS to position the paragraph
function doap_function_css() {
        // This makes sure that the positioning is also good for right-to-left languages
        $x = is_rtl() ? 'left' : 'right';

        echo "
        <style type='text/css'>
        #doapified {
                float: $x;
        }
        </style>
        ";
}

add_shortcode('doap-shortcode', 'doap_function'); 
// and to make sure Wordpress calls shortcode in sidebars
add_filter('widget_text', 'do_shortcode');

add_action( 'widget_text', 'doap_function_css' );

?>

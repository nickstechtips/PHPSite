<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package accesspress_parallax
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>


<style>
    #masthead{
        background-color:black !important;
    }
</style>





<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js"></script>
<![endif]-->

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<header id="masthead" class="<?php echo of_get_option('header_layout'); ?>">
		 <a href="#">Home</a>
		    <a href="#">About</a>
            <a href="#">Blog</a>
            <a href="#">Contact</a>

		<nav id="site-navigation" class="main-navigation">
		   
		</nav><!-- #site-navigation -->
	


		<?php 
		if(of_get_option('show_social') == 1):
			do_action('accesspress_social');
		endif; ?>
	</header><!-- #masthead -->
    </div>
	<?php 
	$accesspress_show_slider = of_get_option('show_slider') ;
	$content_class = "";
	if(empty($accesspress_show_slider) || $accesspress_show_slider == "no"):
		$content_class = "no-slider";
	endif;
	?>
	<div id="content" class="site-content <?php echo $content_class; ?>">
	<?php 
	if(is_home() || is_front_page()) :
		do_action('accesspress_bxslider'); 
	endif;
	?>



<?php
/**
 * The header for Astra Theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?><!DOCTYPE html>
<?php astra_html_before(); ?>
<html <?php language_attributes(); ?>>
<head>
<?php astra_head_top(); ?>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="https://gmpg.org/xfn/11">
<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>-child/css/style.css">

<!-- <link href="//db.onlinewebfonts.com/c/90fe831fa65b9632a4790c1a1732e9ab?family=Freight+Neo+Pro" rel="stylesheet" type="text/css"/> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri();?>-child/js/owl.carousel.min.js"></script>
<?php wp_head(); ?>
<?php astra_head_bottom(); ?>
</head>

<body <?php astra_schema_body(); ?> <?php body_class(); ?>>
<?php astra_body_top(); ?>
<?php wp_body_open(); ?>

<header class="header-section">
			<div class="container">
				<div class="header-content"> 
					<div class="logo-img">
						<div class="logo">
							<?php if ( function_exists( 'the_custom_logo' ) ) {
                                the_custom_logo();
                            } ?>
						 </div>
					</div>	
					<div class="sub-menu">						
						<nav class="nav-bar">
									<a id="menu-toggle" class="navbar-toggle collapsed">
										<span class="icon-bar icon-bar-1"></span>
										<span class="icon-bar icon-bar-2"></span>
										<span class="icon-bar icon-bar-3"></span>
										<div class="Mobile__icon">
											<div class="mobile_close_icon">
												<svg fill="none" height="28" viewBox="0 0 28 28" width="28" xmlns="http://www.w3.org/2000/svg"><path d="M2.32129 2.32363C2.72582 1.9191 3.38168 1.9191 3.78621 2.32363L25.6966 24.234C26.1011 24.6385 26.1011 25.2944 25.6966 25.6989C25.2921 26.1035 24.6362 26.1035 24.2317 25.6989L2.32129 3.78854C1.91676 3.38402 1.91676 2.72815 2.32129 2.32363Z" fill="black"></path><path d="M25.6787 2.30339C25.2742 1.89887 24.6183 1.89887 24.2138 2.30339L2.30339 24.2138C1.89887 24.6183 1.89887 25.2742 2.30339 25.6787C2.70792 26.0832 3.36379 26.0832 3.76831 25.6787L25.6787 3.76831C26.0832 3.36379 26.0832 2.70792 25.6787 2.30339Z" fill="black"></path></svg>
											</div>
										</div>
								    </a>
								<ul class="left">
										<?php wp_nav_menu( array( 'theme_location' => 'my-custom-menu', ) ); ?>

										
										
				
										<div class="Register as Salon">
											<a href="https://www.mi-salon.es/register">Register as Salon</a>
										</div>
										<div class="button-login">
											<a href="https://www.mi-salon.es/login">Login</a>
										</div>

										<li>
											<?php echo do_shortcode('[gtranslate]'); ?>
										</li>
										
								</ul>
						</nav>
						
				   </div>	
				</div>
			</div>  
	</header>
    <script>
$(document).ready(function(){
    $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    dots:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:3
        }
    }
})
});
    </script>
	<div id="content" class="site-content">
		<div class="ast-containers">
		<?php astra_content_top(); ?>

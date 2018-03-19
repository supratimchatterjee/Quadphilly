<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package quad_philly
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="<?php echo get_stylesheet_directory_uri(); ?>/style.css" rel="stylesheet">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<header id="top" class="site-header" style="background-image: url(<?php the_field('image_hph','option'); ?>);">
		<div class="uk-container uk-container-center">
			<div class="uk-grid uk-hidden-small">
				<div class="uk-width-medium-4-10">
					<nav class="uk-navbar uk-navbar-flip">
						<?php wp_nav_menu( array( 'theme_location' => 'main-navigation-left','menu_class' => 'uk-navbar-nav','container' => false ) ); ?>
					</nav>
				</div>
				<div class="uk-width-medium-2-10">
					<div class="uk-flex uk-height-1-1 uk-flex-middle uk-flex-center">
						<a href="<?php bloginfo('url') ?>">
							<img src="<?php echo get_template_directory_uri();?>/assets/images/site-logo.png">
						</a>
					</div>
				</div>
				<div class="uk-width-medium-4-10">
					<nav class="uk-navbar">
						<?php wp_nav_menu( array( 'theme_location' => 'main-navigation-right','menu_class' => 'uk-navbar-nav','container' => false ) ); ?>
					</nav>
				</div>
			</div>
			<div class="uk-visible-small uk-margin-top uk-margin-bottom">
				<a class="tm-mobile-logo" href="<?php bloginfo('url') ?>">
					<img class="site-logo" src="<?php echo get_template_directory_uri();?>/assets/images/site-logo.png">
				</a>
				<div class="uk-navbar-flip uk-position-relative">
					<a class="tm-mob tm-visible-mob" href="#offcanvas" data-uk-offcanvas=""><i class="uk-icon-navicon uk-icon-large"></i></a>
				</div>
			</div>
			<?php if(is_front_page()) : ?>
				<div class="site-banner home-banner">
					<div class="uk-text-center">
						<h1><?php the_field('title_hph','option'); ?></h1>
						<a class="uk-button uk-button-primary" href="<?php the_field('button_link_hph','option'); ?>"><?php the_field('button_label_hph','option'); ?></a>
					</div>
				</div>
			<?php endif; ?>
		</div>

		<?php if(is_front_page()) : ?>			<img class="banner-curve" src="<?php echo get_template_directory_uri();?>/assets/images/home-banner-curve.png">
			<a href="#home-apartment" data-uk-smooth-scroll><i class="uk-icon-angle-down"></i></a>
		<?php endif; ?>
		<div id="offcanvas" class="uk-offcanvas">
			<div class="uk-offcanvas-bar uk-offcanvas-bar-flip">
				<?php wp_nav_menu( array( 'theme_location' => 'main-navigation-left','menu_class' => 'uk-nav uk-nav-offcanvas','container' => false ) ); ?>
				<?php wp_nav_menu( array( 'theme_location' => 'main-navigation-right','menu_class' => 'uk-nav uk-nav-offcanvas','container' => false ) ); ?>
			</div>
		</div>
	</header>

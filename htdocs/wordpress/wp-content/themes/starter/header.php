<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package starter
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/trueno" type="text/css"/> 
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'starter' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="center-banner">
			<div class="site-branding">
				<?php if ( is_front_page() && is_home() ) : ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img class="logo" src="<?php echo get_stylesheet_directory_uri(); ?>/medium.png"  alt="logo" /></a></h1>
				<?php else : ?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img class="logo" src="<?php echo get_stylesheet_directory_uri(); ?>/medium.png"  alt="logo" /></a></p>
				<?php endif; ?>
				<p class="site-description"><?php bloginfo( 'description' ); ?></p>
			</div><!-- .site-branding -->
		</div>
		<div class="spread">
			<div class="center-banner">
				<nav id="site-navigation" class="main-navigation" role="navigation">
					<!--Old button code-->
					<!--<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">//<?php esc_html_e( 'Primary Menu', 'starter' ); ?></button>-->
					
					<!--This seems like a job for Luke-->
					<div class="hamburger"><img src="<?php echo get_stylesheet_directory_uri(); ?>/hamburger.png" class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"<?php esc_html_e( 'Primary Menu', 'starter' ); ?> /></div>
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
				</nav><!-- #site-navigation -->
				<div id="secondary" class="widget-area" role="complementary">
					<?php dynamic_sidebar( 'sidebar-1' ); ?>
				</div><!-- #secondary -->
			</div><!--center banner-->
		</div><!--spread banner-->
	</header><!-- #masthead -->

	<div id="content" class="site-content">

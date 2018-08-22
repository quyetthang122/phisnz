<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Musik
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> itemscope="itemscope" itemtype="http://schema.org/WebPage">
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#container"><?php esc_html_e( 'Skip to content', 'musik' ); ?></a>	

	<header id="masthead" class="site-header" role="banner" itemscope="itemscope" itemtype="http://schema.org/WPHeader">
		<?php
		the_custom_logo();

		if ( display_header_text() ) {
		?>
			<div class="site-branding">
			<?php
			if ( is_home() || is_front_page() ) {
			?>
				<h1 class="site-title" itemprop="headline"><?php bloginfo( 'name' ); ?></h1>
				<span class="site-description" itemprop="description"><?php bloginfo( 'description' ); ?></span>
			<?php
			} else {
			?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<span class="site-description" itemprop="description"><?php bloginfo( 'description' ); ?></span>
			<?php
			}
			?>
			</div><!-- .site-branding -->
		<?php
		}

		if ( has_nav_menu( 'header' ) ) {
		?>
			<nav id="site-navigation" class="main-navigation" role="navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
					<span><?php esc_html_e( 'Menu', 'musik' ); ?></span>
				</button>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'header',
						'menu_id' => 'primary-menu',
						'container' => false,
					)
				);
				?>
			</nav><!-- #site-navigation -->
		<?php
		}
		?>
	</header>

<div id="container" role="main">

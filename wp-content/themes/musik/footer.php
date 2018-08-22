<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Musik
 */

?>

<footer id="footer" role="contentinfo" itemscope="itemscope" itemtype="http://schema.org/WPFooter">
	<h1 class="screen-reader-text"><?php esc_html_e( 'Footer', 'musik' ); ?></h1>
	<?php
	if ( ! is_page_template( 'templates/no-widgets-or-comments.php' ) ) { // This template should not show the widgets in the footer.
		if ( is_active_sidebar( 'sidebar-2' ) ) {
			dynamic_sidebar( 'sidebar-2' );
		}
	}

	musik_footer_title();
?>
</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>

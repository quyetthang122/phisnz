<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Musik
 */

get_header();
?>
	<div class="archive-header">
		<h2 class="post-title" itemprop="headline"><?php esc_html_e( 'Page not found', 'musik' ); ?></h2>
		<?php get_search_form(); ?>
	</div>

</div>
<?php
get_sidebar();
get_footer();

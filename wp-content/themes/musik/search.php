<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Musik
 */

get_header();
?>
	<div class="search-header">
		<h2 class="post-title"><?php printf( esc_html__( 'Search Results for: %s', 'musik' ), get_search_query() ); ?></h2>		
		<?php get_search_form(); ?>
	</div>

	<?php
	while ( have_posts() ) : the_post();
		get_template_part( 'content', get_post_format() );
	endwhile;

	the_posts_navigation(
		array(
			'prev_text' => __( '&larr; Previous page','musik' ),
			'next_text' => __( 'Next page &rarr;', 'musik' ),
		)
	);
	?>
</div>
<?php
get_sidebar();
get_footer();

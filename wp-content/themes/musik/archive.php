<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Musik
 */

get_header();
?>
	<div class="archive-header">
		<?php
		the_archive_title( '<h2 class="post-title">', '</h2>' );
		the_archive_description( '<div class="taxonomy-description">', '</div>' );
		?>
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

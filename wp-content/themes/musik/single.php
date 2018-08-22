<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Musik
 */

get_header(); ?>

	<?php
	while ( have_posts() ) : the_post(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<h1 class="post-title" itemprop="headline"><?php the_title(); ?></h1>
				<?php
				the_content();

				wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages: ', 'musik' ), 'after' => '</div>' ) );

				musik_meta();

				?>	
			</div>
	<?php
	endwhile;

	the_post_navigation( array( 'prev_text' => __( '&larr; %title','musik' ), 'next_text' => __( '%title &rarr;', 'musik' ) ) );

	comments_template( '', true );
?>
</div>
<?php
get_sidebar();
get_footer();

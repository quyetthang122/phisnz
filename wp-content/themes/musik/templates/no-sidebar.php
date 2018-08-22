<?php
/**
 * Template Name: No sidebar.
 * SWE: Sida utan sidopanel.
 *
 * @package Musik
 */

get_header();

while ( have_posts() ) : the_post(); ?>
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<h1 class="post-title" itemprop="headline"><?php the_title(); ?></h1>
		<?php
			the_content();
			wp_link_pages(
				array(
					'before' => '<div class="page-link">' . __( 'Pages: ', 'musik' ),
					'after' => '</div>',
				)
			);
		?>
	</div>
<?php
endwhile;

comments_template( '', true );
?>
</div>
<?php
get_footer();

<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Musik
 */

get_header();

	while ( have_posts() ) : the_post();
		?>
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
get_sidebar();
get_footer();

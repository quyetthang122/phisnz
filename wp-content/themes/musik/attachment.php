<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Musik
 */

get_header();

	while ( have_posts() ) : the_post();
	?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<h1 class="post-title" itemprop="headline"><?php the_title(); ?></h1>
			<a href="<?php echo esc_url( wp_get_attachment_url() ); ?>"><?php echo wp_get_attachment_image( get_the_ID(), 'large' ); ?></a>
			<?php
			the_content();
			wp_link_pages(
				array(
					'before' => '<div class="page-link">' . __( 'Pages: ', 'musik' ),
					'after' => '</div>',
				)
			);

			// Retrieve attachment metadata.
			$metadata = wp_get_attachment_metadata();
			if ( $metadata ) {
				printf( '%1$s <a href="%2$s">%3$s &times; %4$s</a>',
					esc_html_x( 'View full size:', 'Used before full size attachment link.', 'musik' ),
					esc_url( wp_get_attachment_url() ),
					absint( $metadata['width'] ),
					absint( $metadata['height'] )
				);
			}
			musik_meta();
			?>
		</div>
	<?php
	endwhile;
	?>
		<nav class="navigation">
			<div class="nav-links">
				<div class="nav-previous"><?php previous_image_link( false, __( '&larr; Previous Image', 'musik' ) ); ?></div>
				<div class="nav-next"><?php next_image_link( false, __( 'Next Image  &rarr;', 'musik' ) ); ?></div>
			</div><!-- .nav-links -->
		</nav><!-- .image-navigation -->
<?php
	comments_template( '', true );
?>
</div>
<?php
get_sidebar();
get_footer();

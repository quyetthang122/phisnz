<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Musik
 */

get_header();

if ( is_home() || is_front_page() ) {
	$header_image = get_header_image();
	if ( $header_image ) {
	?>
		<div class="header-image">
			<?php
			if ( get_theme_mod( 'musik_header_image_link' ) ) {
				echo '<a href="' . esc_url( get_theme_mod( 'musik_header_image_link' ) ) . '">';
			}
			?>
			<img src="<?php header_image(); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>px" width="<?php echo esc_attr( get_custom_header()->width ); ?>px" alt="" />
			<?php
			if ( get_theme_mod( 'musik_header_image_link' ) ) {
				echo '</a>';
			}
			?>
		</div>
	<?php
	}
}

/*The front page sections should not display on the blog listing page*/
if ( is_front_page() && is_home() && ! is_paged() ) {
	if ( get_theme_mod( 'musik_top_section1' ) or get_theme_mod( 'musik_top_section2' ) or get_theme_mod( 'musik_top_section3' ) or get_theme_mod('musk_top_section4') ) {
		$args = array(
			'post_type' => 'page',
			'orderby' => 'post__in',
			'post__in' => array(
				get_theme_mod( 'musik_top_section1' ),
				get_theme_mod( 'musik_top_section2' ),
				get_theme_mod( 'musik_top_section3' ),
                get_theme_mod( 'musik_top_section4' ),
			),
		);

	    $section_query = new WP_Query( $args );

		while ( $section_query -> have_posts() ) : $section_query -> the_post();
			get_template_part( 'content', 'page' );
		endwhile;

		wp_reset_postdata();
	}
}

while ( have_posts() ) : the_post();
	get_template_part( 'content', get_post_format() );
endwhile;

the_posts_navigation( array( 'prev_text' => __( '&larr; Previous page','musik' ), 'next_text' => __( 'Next page &rarr;', 'musik' ) ) );
?>
</div>

<?php
if ( ! get_theme_mod( 'musik_hide_sidebar' ) ) {
	get_sidebar();
} else {
	if ( ! is_home() ) {
		get_sidebar();
	}
}

get_footer();

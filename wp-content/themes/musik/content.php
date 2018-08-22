<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Musik
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	the_title( '<h2 class="post-title" itemprop="headline"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

	if ( has_post_thumbnail() ) {
		the_post_thumbnail();
	}
	if ( get_theme_mod( 'musik_excerpt' ) && ! has_post_format( array( 'gallery', 'image', 'link', 'quote', 'image' ) ) ) {
		the_excerpt();
		if ( ! get_the_title() ) {
			echo '<a href="' . esc_url( get_permalink() ) . '">' . esc_html__( 'Read more.', 'musik' ) . '</a>';
		}
	} else {
		the_content( sprintf(
			/* translators: %s: Name of current post. */
			wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'musik' ), array( 'span' => array( 'class' => array() ) ) ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		) );
	}

	wp_link_pages(
		array(
			'before' => '<div class="page-link">' . __( 'Pages: ', 'musik' ),
			'after' => '</div>',
		)
	);

	musik_meta();
	?>
</article>

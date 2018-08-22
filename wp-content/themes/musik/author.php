<?php
/**
 * The template for displaying áuthor archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Musik
 */

get_header();

$musik_curauth = (get_query_var( 'author_name' ) ) ? get_user_by( 'slug', get_query_var( 'author_name' ) ) : get_userdata( get_query_var( 'author' ) );
?>
	<div class="archive-header">
		<h1 class="post-title" itemprop="headline"><?php printf( esc_html__( 'About %s','musik' ), $musik_curauth->display_name ); ?></h1>
		<div class="author-info">
			<div class="author-avatar">
				<?php echo get_avatar( $musik_curauth->user_email, 60 ); ?></div>
				<div class="author-description">
					<?php echo $musik_curauth->description;	?>
				</div>
			</div>		
		<h2 class="post-title"><?php printf( __( 'View all posts by %s', 'musik' ), $musik_curauth->display_name ); ?></h2>
	</div>
		<?php
		while ( have_posts() ) : the_post();
		?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<?php
					if ( has_post_thumbnail() ) {
						the_post_thumbnail();
					}

					the_content();
					wp_link_pages(
						array(
							'before' => '<div class="page-link">' . __( 'Pages: ', 'musik' ),
							'after' => '</div>',
						)
					);
					musik_meta();
					?>
			</div>
		<?php
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

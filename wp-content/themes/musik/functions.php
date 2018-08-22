<?php
/**
 * Components functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Musik
 */

if ( ! function_exists( 'musik_setup' ) ) {
	/**
	 * Setup our theme support.
	 */
	function musik_setup() {
		$musik_ch = array(
			'default-image'          => get_template_directory_uri() . '/images/headers/musik2.png',
			'random-default'         => false,
			'width'                  => 2000,
			'height'                 => 300,
			'flex-height'            => true,
			'flex-width'             => true,
			'uploads'                => true,
			'header-text'            => true,
			'default-text-color'     => '222222',
			'wp-head-callback'       => 'musik_header_textcolor',
		);
		add_theme_support( 'custom-header', $musik_ch );

		/**
		 * Add the callback for the site title and tagline colors.
		 */
		function musik_header_textcolor() {
			echo '<style type="text/css">
				.site-title,
				.site-title a,
				.site-description {
					color: #' . esc_attr( get_header_textcolor() ) . '!important;
				}
			</style>';
		}

		/**
		 * List our header images and previews. The images are found in the images/headers folder.
		 */
		register_default_headers( array(
			'musik' => array(
				'url' => '%s/images/headers/musik.png',
				'thumbnail_url' => '%s/images/headers/musik-thumb.png',
				/* translators: header image description */
				'description' => __( 'Header', 'musik' ),
			),
			'musik2' => array(
				'url' => '%s/images/headers/musik2.png',
				'thumbnail_url' => '%s/images/headers/musik2-thumb.png',
				/* translators: header image description */
				'description' => __( 'Header', 'musik' ),
			),
			'musik3' => array(
				'url' => '%s/images/headers/musik3.png',
				'thumbnail_url' => '%s/images/headers/musik3-thumb.png',
				/* translators: header image description */
				'description' => __( 'Header', 'musik' ),
			),
			'musik4' => array(
				'url' => '%s/images/headers/musik4.png',
				'thumbnail_url' => '%s/images/headers/musik4-thumb.png',
				/* translators: header image description */
				'description' => __( 'Header', 'musik' ),
			),
			'musik5' => array(
				'url' => '%s/images/headers/musik5.png',
				'thumbnail_url' => '%s/images/headers/musik5-thumb.png',
				/* translators: header image description */
				'description' => __( 'Header', 'musik' ),
			),
		) );

		$musik_cb = array(
			'default-color'   => '0066ff',
			'default-image'   => get_template_directory_uri() . '/images/mic.png',
			'default-preset' => 'fill',
			'default-size' => 'cover',
			'default-repeat' => 'no-repeat',
			'default-attachment' => 'fixed',
			'default-position-x' => 'center',
			'default-position-y' => 'center',
		);

		add_theme_support( 'custom-background', $musik_cb );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-formats', array( 'aside', 'link', 'status', 'gallery', 'image' ) );
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
		add_editor_style();
		add_theme_support( 'title-tag' );
		add_theme_support( 'custom-logo' );

		add_theme_support( 'customize-selective-refresh-widgets' );
		add_theme_support( 'jetpack-responsive-videos' );
		add_theme_support( 'woocommerce' );

		add_theme_support( 'starter-content', array(
			'nav_menus' => array(
				'header' => array(
					'name' => __( 'Header Navigation', 'musik' ),
					'items' => array(
						'page_about',
						'page_contact',
					),
				),
			),
			'posts' => array(
				'about',
				'contact',
				'blog',
				'news',
			),

		) );

		load_theme_textdomain( 'musik' );
		register_nav_menus( array( 'header' => __( 'Header Navigation', 'musik' ) ) );
		$GLOBALS['content_width'] = 640;
	}
}
add_action( 'after_setup_theme', 'musik_setup' );

/**
 * Enqueue fonts.
 */
function musik_fonts_styles() {
	wp_enqueue_style( 'musik_font','//fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic' );
	wp_enqueue_style( 'musik_font2','//fonts.googleapis.com/css?family=Oswald&subset=latin,latin-ext' );
	wp_enqueue_style( 'musik_style', get_stylesheet_uri() );

	/* Enqueue comment reply / threaded comments. */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'musik-navigation', get_template_directory_uri() . '/js/navigation.js', array( 'jquery' ), '20120206', true );
}
add_action( 'wp_enqueue_scripts', 'musik_fonts_styles' );

/* Add title to read more links */
add_filter( 'get_the_excerpt', 'musik_custom_excerpt_more',100 );
add_filter( 'excerpt_more', 'musik_excerpt_more',100 );
add_filter( 'the_content_more_link', 'musik_content_more', 100 );

function musik_continue_reading( $id ) {
	return '<a href="' . esc_url( get_permalink( $id ) ) . '">' . __( 'Read more: ', 'musik' ) . get_the_title( $id ) . '</a>';
}

function musik_content_more( $more ) {
	global $id;
	return musik_continue_reading( $id );
}

function musik_excerpt_more( $more ) {
	global $id;
	return '&hellip; ' . musik_continue_reading( $id );
}

function musik_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		global $id;
		$output .= ' ' . musik_continue_reading( $id );
	}
	return $output;
}

/**
 * Register widget areas (Sidebars).
 */
function musik_widgets_init() {
	register_sidebar(
		array(
			'name' => __( 'Sidebar', 'musik' ),
			'description' => __( 'Widgets in this area will be shown on the right-hand side.', 'musik' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
			'id' => 'sidebar-1',
		)
	);

	register_sidebar(
		array(
			'name' => __( 'Footer widget area', 'musik' ),
			'description' => __( 'Widgets in this area will be shown in the footer.', 'musik' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
			'id' => 'sidebar-2',
		)
	);
}
add_action( 'widgets_init', 'musik_widgets_init' );

/**
 * Sidebar position added to body.
 */
function musik_body_class( $classes ) {
	if ( ! is_active_sidebar( 1 ) ) {
		$classes[] = 'no-sidebar';
	}
	if ( get_theme_mod( 'musik_sidebar_left' ) ) {
		$classes[] = 'left-sidebar';
	}

	if ( get_theme_mod( 'musik_hide_sidebar' ) ) {
		if ( is_home() ) {
			$classes[] = 'no-sidebar';
		}
	}

	return $classes;
}
add_filter( 'body_class','musik_body_class' );


function musik_author() {
	if ( ! get_theme_mod( 'musik_hide_authorinfo' ) ) {
	?>
		<div class="author-info">
			<div class="author-avatar">
				<?php echo get_avatar( get_the_author_meta( 'user_email' ), 60); ?></div>
				<div class="author-description">
					<h2><?php printf( esc_html__( 'About %s','musik' ), get_the_author() ); ?></h2>
					<?php
					if ( get_the_author_meta( 'description' ) ) {
						the_author_meta( 'description' );
					}
					?>
					<div class="author-link"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
					<?php printf( esc_html__( 'View all posts by %s', 'musik' ), get_the_author() ); ?></a>
				</div>
			</div>
		</div>
	<?php
	}
}

function musik_meta() {
	if ( ! get_theme_mod( 'musik_hide_meta' ) ) {
	?>
		<div class="meta">
			<?php
			$time_string = '<time class="entry-date published" datetime="%1$s" itemprop="datePublished">%2$s</time>';

			$time_string = sprintf( $time_string,
				esc_attr( get_the_date( 'c' ) ),
				esc_html( get_the_date() )
			);

			$posted_on = sprintf( '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '.</a>' );

			$byline = sprintf( '<span class="author vcard" itemprop="name"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
			);

			echo '<span class="byline" itemscope="itemscope" itemtype="http://schema.org/Person" itemprop="author">' . $byline . '</span> <span class="posted-on">' . $posted_on . '</span> '; // WPCS: XSS OK.

			if ( comments_open() ) :
				comments_popup_link();
				echo '. ';
			endif;

			if ( count( get_the_category() ) ) {
				printf( esc_html__( 'Categories: %1s', 'musik' ), get_the_category_list( ', ' ) );
				echo '. ';
			}

			if ( get_the_tag_list() ) {

				$musik_tags_list = get_the_tag_list( '', ', ' );
				printf( esc_html__( 'Tags: %1$s. ', 'musik' ), $musik_tags_list );
			}
			echo ' ';
			edit_post_link( esc_html__( 'Edit', 'musik' ) );

			if ( is_single() ) {
				musik_author();
			}
			?>
		</div>
	<?php
	}
}

/* Support for WooCommerce */
if ( class_exists( 'WooCommerce' ) ) {
	remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
	remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

	add_action( 'woocommerce_before_main_content', 'musik_wrapper_start', 10 );
	add_action( 'woocommerce_after_main_content', 'musik_wrapper_end', 10 );

	function musik_wrapper_start() {
		echo '<div class="post">';
	}
	function musik_wrapper_end() {
		echo '</div></div>';
	}
}

/**
 * Add the custom css required for the site width and grid options.
 */
function musik_customize_css() {
	echo '<style type="text/css">';

	if ( get_theme_mod( 'musik_width' ) ) {
		echo '@media screen and (min-width:800px) {';
		echo '.site { width:' . esc_attr( get_theme_mod( 'musik_width' ) ) . "%; margin-left:auto; margin-right:auto;}\n";
		echo '}';
	}

	if ( get_theme_mod( 'musik_grid' ) ) {
		?>
		.home.no-sidebar .site #container .post,
		.home .post { width:33.333%; }
		@media screen and (max-width:1200px) {
			.home.no-sidebar .site #container .post,
			.home .post { width:100%; }
		}
	<?php
	}

	if ( get_theme_mod( 'musik_excerpt' ) && is_home() ) {
		echo '.wp-caption-text{display:none;}';
	}

	echo '</style>';
}
add_action( 'wp_head', 'musik_customize_css' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function musik_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'musik_pingback_header' );

/**
 * Display the site title and description in the footer.
 * Callback function for the customizer selective refresh.
 */
function musik_footer_title() {
	if ( get_theme_mod( 'musik_footer_title' ) ) {
	?>
		<div class="footer-title">
			<span class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span><br>
			<span class="site-description"><?php bloginfo( 'description' ); ?></span>
		</div>
	<?php
	}
}

require get_template_directory() . '/inc/customizer.php';

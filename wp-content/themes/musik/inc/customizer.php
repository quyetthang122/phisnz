<?php
/**
 * Musik Theme Customizer.
 *
 * @package Musik
 */

/**
 * Add settings and controls for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function musik_customizer( $wp_customize ) {
	$wp_customize->get_control( 'custom_logo' )->description = __( 'To display your logo you must also select a logo position.', 'musik' );

	$wp_customize->add_section('musik_section_two',
		array(
			'title' => __( 'Post settings', 'musik' ),
			'priority' => 110,
		)
	);

	$wp_customize->add_section('musik_section_three',
		array(
			'title' => __( 'Sidebar position', 'musik' ),
			'priority' => 120,
		)
	);

	$wp_customize->add_section('musik_layout',
		array(
			'title' => __( 'Site width', 'musik' ),
			'priority' => 130,
		)
	);

	$wp_customize->add_section('musik_section_page',
		array(
			'title' => __( 'Page sections', 'musik' ),
			'description' => __( 'Select up to 3 pages that will be displayed on the front page, above your blog content.', 'musik' ),
			'priority' => 140,
		)
	);

	for ( $i = 1; $i < 4; $i++ ) {
		$wp_customize->add_setting( 'musik_top_section' . $i,
			array(
				'sanitize_callback' => 'musik_sanitize_page',
			)
		);

		$wp_customize->add_control( 'musik_top_section' . $i,
			array(
				'default' => 0,
				'type' => 'dropdown-pages',
				'label' => __( 'Select a page:','musik' ),
				'allow_addition' => true,
				'section' => 'musik_section_page',
			)
		);
	}

	$wp_customize->add_setting( 'musik_width',
		array(
			'sanitize_callback' => 'musik_sanitize_page',
			'default' => 80,
		)
	);

	$wp_customize->add_control('musik_width',
		array(
			'type' => 'range',
			'label' => __( 'Change the width of the site.', 'musik' ),
			'section' => 'musik_layout',
			'input_attrs' => array(
				'min'   => 30,
				'max'   => 100,
				'step'  => 4,
			),
		)
	);

	$wp_customize->add_setting( 'musik_grid',
		array(
			'sanitize_callback' => 'musik_sanitize_checkbox',
		)
	);

	$wp_customize->add_control( 'musik_grid',
		array(
			'type' => 'checkbox',
			'label' => __( 'Display the posts on the front page as a 3 column grid.', 'musik' ),
			'section' => 'musik_section_two',
		)
	);

	$wp_customize->add_setting( 'musik_excerpt',
		array(
			'sanitize_callback' => 'musik_sanitize_checkbox',
		)
	);

	$wp_customize->add_control( 'musik_excerpt',
		array(
			'type' => 'checkbox',
			'label' => __( 'Display excerpts on the blog listing, search and archives.', 'musik' ),
			'section' => 'musik_section_two',
		)
	);

	/** Display title and description in the footer
	/* This option is shown under the titel and slogan (tagline) section in the customizer. */
	$wp_customize->add_setting( 'musik_footer_title',
		array(
			'sanitize_callback' => 'musik_sanitize_checkbox',
		)
	);

	$wp_customize->add_control('musik_footer_title',
		array(
			'type' => 'checkbox',
			'label' => __( 'Display the Site Title and Tagline in the footer.', 'musik' ),
			'section' => 'title_tagline',
			'priority' => 40,
		)
	);

	$wp_customize->selective_refresh->add_partial( 'musik_footer_title',
		array(
			'selector' => '.footer-title',
			'container_inclusive' => true,
			'render_callback' => 'music_footer_title',
		)
	);

	// Hide meta and extended author information.
	$wp_customize->add_setting( 'musik_hide_authorinfo',
		array(
			'sanitize_callback' => 'musik_sanitize_checkbox',
		)
	);

	$wp_customize->add_control('musik_hide_authorinfo',
		array(
			'type' => 'checkbox',
			'label' => __( 'Hide the author information and avatar that are displayed in single post view.', 'musik' ),
			'settings'   => 'musik_hide_authorinfo',
			'section' => 'musik_section_two',
		)
	);

	$wp_customize->selective_refresh->add_partial( 'musik_hide_authorinfo',
		array(
			'selector' => '.author-info',
			'container_inclusive' => true,
			'render_callback' => 'musik_author',
		)
	);

	$wp_customize->add_setting( 'musik_hide_meta',
		array(
			'sanitize_callback' => 'musik_sanitize_checkbox',
		)
	);

	$wp_customize->add_control('musik_hide_meta',
		array(
			'type' => 'checkbox',
			'label' => __( 'Hide all the meta information.', 'musik' ),
			'section' => 'musik_section_two',
		)
	);

	$wp_customize->selective_refresh->add_partial( 'musik_hide_meta',
		array(
			'selector' => '.meta',
			'container_inclusive' => true,
			'render_callback' => 'musik_meta',
		)
	);

	// Header image.
	$wp_customize->add_setting( 'musik_header_image_link',
		array(
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control('musik_header_image_link',
		array(
			'type' => 'text',
			'label' => __( 'Add this link to the header image:', 'musik' ),
			'section' => 'header_image',
		)
	);

	// Sidebar position.
	$wp_customize->add_setting( 'musik_sidebar_left',
		array(
			'sanitize_callback' => 'musik_sanitize_checkbox',
		)
	);

	$wp_customize->add_control('musik_sidebar_left',
		array(
			'type' => 'checkbox',
			'label' => __( 'Move the sidebar to the left hand side (Default is the right hand side. This requires an active sidebar).', 'musik' ),
			'section' => 'musik_section_three',
		)
	);

	/*Hide sidebar on frontapge*/
	$wp_customize->add_setting( 'musik_hide_sidebar',
		array(
			'sanitize_callback' => 'musik_sanitize_checkbox',
		)
	);

	$wp_customize->add_control('musik_hide_sidebar',
		array(
			'type' => 'checkbox',
			'label' => __( 'Hide the sidebar on the frontpage (This setting is overwritten depending on template).', 'musik' ),
			'section' => 'musik_section_three',
		)
	);
}
add_action( 'customize_register', 'musik_customizer' );


function musik_sanitize_checkbox( $input ) {
	if ( 1 == $input ) {
		return 1;
	} else {
		return '';
	}
}

/**
 * Sanitize the width.
 */
function musik_sanitize_page( $input ) {
	if ( is_numeric( $input ) ) {
		return intval( $input );
	}
}

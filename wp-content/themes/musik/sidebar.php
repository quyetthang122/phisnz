<?php
/**
 * The sidebar containing the main widget areas.
 *
 * @package Musik
 */

if ( is_active_sidebar( 'sidebar-1' ) ) {
?>
	<div id="sidebar" role="complementary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
		<h1 class="screen-reader-text"><?php esc_html_e( 'Sidebar', 'musik' ); ?></h1>
		<?php
		dynamic_sidebar( 'sidebar-1' );
		?>
	</div>
<?php
}

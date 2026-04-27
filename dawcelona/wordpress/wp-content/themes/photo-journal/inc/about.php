<?php
/**
 * Photo Journal About Theme page
 *
 * @package Photo_Journal
 */

function photo_journal_about_admin_style( $hook ) {
	if ( 'appearance_page_photo-journal-about' === $hook ) {
		wp_enqueue_style( 'photo-journal-about-admin', get_theme_file_uri( 'assets/css/about-admin.css' ), null, '1.0' );
	}
}
add_action( 'admin_enqueue_scripts', 'photo_journal_about_admin_style' );

/**
 * Add theme page
 */
function photo_journal_menu() {
	add_theme_page( esc_html__( 'About Theme', 'photo-journal' ), esc_html__( 'About Theme', 'photo-journal' ), 'edit_theme_options', 'photo-journal-about', 'photo_journal_about_display' );
}
add_action( 'admin_menu', 'photo_journal_menu' );

/**
 * Display About page
 */
function photo_journal_about_display() {
	$theme = wp_get_theme();
	?>
	<div class="wrap about-wrap full-width-layout">
		<h1><?php echo esc_html( $theme ); ?></h1>
		<div class="about-theme">
			<div class="theme-description">
				<p class="about-text">
					<?php
					// Remove last sentence of description.
					$description = explode( '. ', $theme->get( 'Description' ) );

					array_pop( $description );

					$description = implode( '. ', $description );

					echo esc_html( $description . '.' );
				?></p>
				<p class="actions">
					<a href="https://catchthemes.com/themes/photo-journal" class="button button-secondary" target="_blank"><?php esc_html_e( 'Theme Info', 'photo-journal' ); ?></a>

					<a href="https://catchthemes.com/demo/photo-journal" class="button button-secondary" target="_blank"><?php esc_html_e( 'View Demo', 'photo-journal' ); ?></a>

					<a href="https://catchthemes.com/themes/photo-journal/#theme-instructions" class="button button-primary" target="_blank"><?php esc_html_e( 'Theme Instructions', 'photo-journal' ); ?></a>

					<a href="https://catchthemes.com/themes/photo-journal-pro" class="green button button-secondary" target="_blank"><?php esc_html_e( 'Upgrade to pro', 'photo-journal' ); ?></a>
				</p>
			</div>

			<div class="theme-screenshot">
				<img src="<?php echo esc_url( $theme->get_screenshot() ); ?>" />
			</div>

		</div>

		<nav class="nav-tab-wrapper wp-clearfix" aria-label="<?php esc_attr_e( 'Secondary menu', 'photo-journal' ); ?>">
			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'photo-journal-about' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['page'] ) && 'photo-journal-about' === $_GET['page'] && ! isset( $_GET['tab'] ) ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'About', 'photo-journal' ); ?></a>

			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'photo-journal-about', 'tab' => 'free_vs_pro' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['tab'] ) && 'free_vs_pro' === $_GET['tab'] ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'Free Vs Pro', 'photo-journal' ); ?></a>

			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'photo-journal-about', 'tab' => 'changelog' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['tab'] ) && 'changelog' === $_GET['tab'] ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'Changelog', 'photo-journal' ); ?></a>
		</nav>

		<?php
			photo_journal_main_screen();

			photo_journal_free_vs_pro_screen();

			photo_journal_changelog_screen();
		?>

		<div class="return-to-dashboard">
			<?php if ( current_user_can( 'update_core' ) && isset( $_GET['updated'] ) ) : ?>
				<a href="<?php echo esc_url( self_admin_url( 'update-core.php' ) ); ?>">
					<?php is_multisite() ? esc_html_e( 'Return to Updates', 'photo-journal' ) : esc_html_e( 'Return to Dashboard &rarr; Updates', 'photo-journal' ); ?>
				</a> |
			<?php endif; ?>
			<a href="<?php echo esc_url( self_admin_url() ); ?>"><?php is_blog_admin() ? esc_html_e( 'Go to Dashboard &rarr; Home', 'photo-journal' ) : esc_html_e( 'Go to Dashboard', 'photo-journal' ); ?></a>
		</div>
	</div>
	<?php
}

/**
 * Output the main about screen.
 */
function photo_journal_main_screen() {
	if ( isset( $_GET['page'] ) && 'photo-journal-about' === $_GET['page'] && ! isset( $_GET['tab'] ) ) {
	?>
		<div class="feature-section two-col">
			<div class="col card">
				<h2 class="title"><?php esc_html_e( 'Theme Customizer', 'photo-journal' ); ?></h2>
				<p><?php esc_html_e( 'All Theme Options are available via Customize screen.', 'photo-journal' ) ?></p>
				<p><a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Customize', 'photo-journal' ); ?></a></p>
			</div>

			<div class="col card">
				<h2 class="title"><?php esc_html_e( 'Got theme support question?', 'photo-journal' ); ?></h2>
				<p><?php esc_html_e( 'Get genuine support from genuine people. Whether it\'s customization or compatibility, our seasoned developers deliver tailored solutions to your queries.', 'photo-journal' ) ?></p>
				<p><a href="https://catchthemes.com/support-forum" class="button button-primary"><?php esc_html_e( 'Support Forum', 'photo-journal' ); ?></a></p>
			</div>
		</div>
	<?php
	}
}

/**
 * Output the changelog screen.
 */
function photo_journal_free_vs_pro_screen() {
	if ( isset( $_GET['tab'] ) && 'free_vs_pro' === $_GET['tab'] ) {
	?>
		<div class="wrap about-wrap vs-theme-table">
			<div id="compare" aria-labelledby="ui-id-2" class="ui-tabs-panel ui-widget-content ui-corner-bottom" role="tabpanel" style="display: block;" aria-hidden="false">
			   <div class="tab-containter">
				  <div class="wrapper">
					 <div class="tab-header">
						<h2 class="entry-title">Free Vs Pro (Premium)</h2>
					 </div>
					 <div class="compare-table">
						<div class="hentry">
							<table>
								<thead>
									<tr>
										<th>Free</th>
										<th>Features</th>
										<th>Pro (Premium)</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><i class="dashicons dashicons-yes"></i></td>
										<td>Responsive Design</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-yes"></i></td>
										<td>Super Easy Setup</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Color Options for various sections</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Base Color Scheme: Light, Gray, Red and Yellow</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-yes"></i></td>
										<td>Header Media</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-yes"></i></td>
										<td>Primary Menu</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-yes"></i></td>
										<td>Social Header Menu</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Footer Menu</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Social Footer Menu</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Comment Options</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Countdown</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-yes"></i></td>
										<td>Excerpt Options</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Events:Post</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Events:Page</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Events:Category</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Events:Custom</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Featured content: Post</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Featured content: Page</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Featured content: Category</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Featured content: Custom</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-yes"></i></td>
										<td>Featured content: Custom Post Types</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Featured Slider: Post</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-yes"></i></td>
										<td>Featured Slider: Page</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Featured Slider: Category</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Featured Slider: Custom</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Featured Video</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Font Family Options</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Footer Editor Options</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Gallery</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Hero Content:Post</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-yes"></i></td>
										<td>Hero Content: Page</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Hero Content:Category</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Hero Content:Custom</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Site Layout: Boxed/Fluid</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-yes"></i></td>
										<td>Default Layout: Right Sidebar ( Content, Primary Sidebar ) </td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td> Default Layout: Left Sidebar ( Primary Sidebar, Content ) </td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-yes"></i></td>
										<td> Default Layout: No Sidebar </td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-yes"></i></td>
										<td> Default Layout: No Sidebar: Full Width </td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-yes"></i></td>
										<td>Homepage/Archive Layout: Right Sidebar</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Homepage/Archive Layout: Left Sidebar</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-yes"></i></td>
										<td>Homepage/Archive Layout:No Sidebar</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Homepage/Archive Layout:Full Width</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-yes"></i></td>
										<td>Single Page/Post Image: Post Thumbnai</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Single Page/Post Image: Slider Image Size(1920*822)</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Single Page/Post Image: Original Image Size</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>WooCommerce Layout</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Logo Slider: Page</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Logo Slider: Post</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Logo Slider: Category</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Logo Slider: Custom</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Menu Options: enable/disable Primary Menu</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Menu Options: enable/disable search</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Menu Options: edit Primary Mobile Menu Label</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-yes"></i></td>
										<td>Pagination Options</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Portfolio: Page</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Portfolio: Post</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Portfolio: Category</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Portfolio: Custom</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-yes"></i></td>
										<td>Portfolio: Custom Post Type</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Promotion Headline: Page</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Promotion Headline: Post</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Promotion Headline: Category</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Promotion Headline: Custom</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Service: Page</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Service: Post</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Service: Custom </td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-yes"></i></td>
										<td>Service: Custom Post Type</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-yes"></i></td>
										<td>Scroll Up Options</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Section Sorter</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Testimonials: Page</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Testimonials: Post</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Testimonials: Category</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Testimonials: Custom</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-yes"></i></td>
										<td>Testimonials: Custom Post Type</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Timeline: Page</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Timeline: Post</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Timeline: Category</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Timeline: Custom</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>Update Notifier</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>WPML Ready</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
									<tr>
										<td><i class="dashicons dashicons-no"></i></td>
										<td>WooCommerce Ready</td>
										<td><i class="dashicons dashicons-yes"></i></td>
									</tr>
								</tbody>
							</table>
						</div>
					 </div>
				  </div>
			   </div>
			</div>
		</div>
	<?php
	}
}

/**
 * Output the changelog screen.
 */
function photo_journal_changelog_screen() {
	if ( isset( $_GET['tab'] ) && 'changelog' === $_GET['tab'] ) {
		global $wp_filesystem;
	?>
		<div class="wrap about-wrap">
			<?php
				$changelog_file = apply_filters( 'photo_journal_changelog_file', get_template_directory() . '/readme.txt' );

				// Check if the changelog file exists and is readable.
				if ( $changelog_file && is_readable( $changelog_file ) ) {
					WP_Filesystem();
					$changelog = $wp_filesystem->get_contents( $changelog_file );
					$changelog_list = photo_journal_parse_changelog( $changelog );

					echo wp_kses_post( $changelog_list );
				}
			?>
		</div>
	<?php
	}
}

/**
 * Parse changelog from readme file.
 * @param  string $content
 * @return string
 */
function photo_journal_parse_changelog( $content ) {
	// Explode content with ==  to juse separate main content to array of headings.
	$content = explode ( '== ', $content );

	$changelog_isolated = '';

	// Get element with 'Changelog ==' as starting string, i.e isolate changelog.
	foreach ( $content as $key => $value ) {
		if (strpos( $value, 'Changelog ==') === 0) {
	    	$changelog_isolated = str_replace( 'Changelog ==', '', $value );
	    }
	}

	// Now Explode $changelog_isolated to manupulate it to add html elements.
	$changelog_array = explode( '= ', $changelog_isolated );

	// Unset first element as it is empty.
	unset( $changelog_array[0] );

	$changelog = '<pre class="changelog">';

	foreach ( $changelog_array as $value) {
		// Replace all enter (\n) elements with </span><span> , opening and closing span will be added in next process.
		$value = preg_replace( '/\n+/', '</span><span>', $value );

		// Add openinf and closing div and span, only first span element will have heading class.
		$value = '<div class="block"><span class="heading">= ' . $value . '</span></div>';

		// Remove empty <span></span> element which newr formed at the end.
		$changelog .= str_replace( '<span></span>', '', $value );
	}

	$changelog .= '</pre>';

	return wp_kses_post( $changelog );
}

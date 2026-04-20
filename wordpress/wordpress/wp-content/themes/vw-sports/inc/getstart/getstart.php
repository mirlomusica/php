<?php
//about theme info
add_action( 'admin_menu', 'vw_sports_gettingstarted' );
function vw_sports_gettingstarted() {
	add_theme_page( esc_html__('About VW Sports', 'vw-sports'), esc_html__('Theme Demo Import', 'vw-sports'), 'edit_theme_options', 'vw_sports_guide', 'vw_sports_mostrar_guide');
}

// Add a Custom CSS file to WP Admin Area
function vw_sports_admin_theme_style() {
   wp_enqueue_style('vw-sports-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/getstart/getstart.css');
   wp_enqueue_script('vw-sports-tabs', esc_url(get_template_directory_uri()) . '/inc/getstart/js/tab.js');

   // Admin notice code START
	wp_register_script('vw-sports-notice', esc_url(get_template_directory_uri()) . '/inc/getstart/js/notice.js', array('jquery'), time(), true);
	wp_enqueue_script('vw-sports-notice');
	// Admin notice code END
}
add_action('admin_enqueue_scripts', 'vw_sports_admin_theme_style');

//guidline for about theme
function vw_sports_mostrar_guide() { 
	//custom function about theme customizer
	$vw_sports_return = add_query_arg( array()) ;
	$vw_sports_theme = wp_get_theme( 'vw-sports' );
?>

<div class="wrap getting-started">
	<div class="getting-started__header">
	    <div>
            <h2 class="tgmpa-notice-warning"></h2>
        </div>
	</div>
	<div class="tab-sec">
		<div class="tab">
			<button role="tab" class="tablinks home" onclick="vw_sports_openCity(event, 'bwp_getstart')"><?php esc_html_e( 'Getting Started', 'vw-sports' ); ?></button>
			<button role="tab" class="tablinks" onclick="vw_sports_openCity(event, 'bwp_setup')"><?php esc_html_e( 'Free Theme Information', 'vw-sports' ); ?></button>
			<button role="tab" class="tablinks" onclick="vw_sports_openCity(event, 'bwp_premium_info')"><?php esc_html_e( 'Premium Theme Information', 'vw-sports' ); ?></button>
			<a class="tablinks tablinks-demo" role="tab" href="<?php echo esc_url( VW_SPORTS_LIVE_DEMO ); ?>" target="_blank">
				<?php esc_html_e( 'Live Demo', 'vw-sports' ); ?>
			</a>
			<a class="tablinks tablinks-pro" role="tab" href="<?php echo esc_url( VW_SPORTS_BUY_NOW ); ?>" target="_blank">
				<?php esc_html_e( 'Buy Pro', 'vw-sports' ); ?>
			</a>
		</div>
		<div  id="bwp_getstart" class="tabcontent">
			<div class="row">
				<div class="col-md-5 intro">
					<div class="pad-box">
						<h2><?php esc_html_e( 'Welcome to VW Sports ', 'vw-sports' ); ?>
						<span><?php esc_html_e( 'Version: ', 'vw-sports' ); ?><?php echo esc_html($vw_sports_theme['Version']);?></span>
						</h2>
						<span class="intro__version"><?php esc_html_e( 'Congratulations! You are about to use the most easy to use and flexible WordPress theme.', 'vw-sports' ); ?>
						</span>
						<div class="powered-by">
							
							<div class="demo-content">
								<?php
									/* Demo Import */
									require get_parent_theme_file_path( '/inc/getstart/demo-content.php' );
								?>
							</div>
							<div id="demo-import-loader">
								<img src="<?php echo esc_url(get_template_directory_uri() . '/inc/getstart/images/spinner.gif'); ?>" alt="<?php echo esc_attr( 'Loading...', 'vw-sports'); ?>" />
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-7">
					<div class="install-plugins">
						<img src="<?php echo esc_url(get_template_directory_uri() . '/inc/getstart/images/responsive-free.png'); ?>" alt="<?php echo esc_attr( 'responsive-image', 'vw-sports'); ?>" />
					</div>
				</div>
			</div>
			<div class="dashboard__blocks">
				<div class="row">
					<div class="col-md-3">
						<h3><?php esc_html_e( 'Get Support','vw-sports'); ?></h3>
						<ol>
							<li><a target="_blank" href="<?php echo esc_url( VW_SPORTS_SUPPORT ); ?>"><?php esc_html_e( 'Free Theme Support','vw-sports'); ?></a></li>
							<li><a target="_blank" href="<?php echo esc_url( VW_SPORTS_PRO_SUPPORT ); ?>"><?php esc_html_e( 'Premium Theme Support','vw-sports'); ?></a></li>
						</ol>
					</div>
					<div class="col-md-3">
						<h3><?php esc_html_e( 'Getting Started','vw-sports'); ?></h3>
						<ol>
							<li><?php esc_html_e( 'Start','vw-sports'); ?> <a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e( 'Customizing','vw-sports'); ?></a> <?php esc_html_e( 'your website.','vw-sports'); ?> </li>
						</ol>
					</div>
					<div class="col-md-3">
						<h3><?php esc_html_e( 'Help Docs','vw-sports'); ?></h3>
						<ol>
							<li><a target="_blank" href="<?php echo esc_url( VW_SPORTS_FREE_THEME_DOC ); ?>"><?php esc_html_e( 'Free Theme Documentation','vw-sports'); ?></a></li>
							<li><a target="_blank" href="<?php echo esc_url( VW_SPORTS_PRO_DOC ); ?>"><?php esc_html_e( 'Premium Theme Documentation','vw-sports'); ?></a></li>
						</ol>
					</div>
					<div class="col-md-3">
						<h3><?php esc_html_e( 'Buy Premium','vw-sports'); ?></h3>
						<ol>
							<a href="<?php echo esc_url( VW_SPORTS_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Pro', 'vw-sports'); ?></a>
						</ol>
					</div>
				</div>
			</div>
		</div>
		<div  id="bwp_setup" class="tabcontent">
			<h2 class="tg-docs-section intruction-title" id="section-4"><?php esc_html_e( '1) Setup VW Sports Theme', 'vw-sports' ); ?></h2>
			<div class="row">
				<div class="theme-instruction-block col-md-7">
					<div class="pad-box">
						<p><?php esc_html_e( 'VW Sports will give a flying start to your sports or sports club website as it is geared towards any kind of sports-related site. You get an absolutely sophisticated online appearance with this theme’s responsive as well as mobile-friendly and expertly crafted design that hardly needs to be modified. This theme is apt for sports fan for sports like football, cricket, basketall,Sports, Fitness, Gym, Athletics, Events, soccer, water sports, arcade games, basketball etc. It is clean, elegant, and simple to use for beginners as well as experts. Sports coaches will also find the theme useful to display their portfolio. All information regarding your team or your sports club’s facilities can be shown in a professional way. Offering a perfect layout for modern sports, sport clothes, sport shop, water sports, sport style, sportswear, games clubs, this theme incorporates secure and clean codes along with translation files that make your website translation-ready. Its stunning animation effects and interactive Call To Action Buttons (CTA) will not only make your site look beautiful but also results in a highly engaging web page. If you think that the default design needs some modifications, there are a lot of customization options included that can be used with a single click and there is no need to write codes for the same. A lot of social media options, plenty of shortcodes, and widgets are there in this Bootstrap-based theme.', 'vw-sports' ); ?><p><br>
						<ol>
							<li><?php esc_html_e( 'Start','vw-sports'); ?> <a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e( 'Customizing','vw-sports'); ?></a> <?php esc_html_e( 'your website.','vw-sports'); ?> </l>
							<li><?php esc_html_e( 'VW Sports','vw-sports'); ?> <a target="_blank" href="<?php echo esc_url( VW_SPORTS_FREE_THEME_DOC ); ?>"><?php esc_html_e( 'Documentation','vw-sports'); ?></a> </li>
						</ol>
					</div>
				</div>
				<div class="col-md-5">
					<div class="pad-box">
							<img class="logo" src="<?php echo esc_url(get_template_directory_uri() . '/inc/getstart/images/screenshot.png'); ?>"/>
					</div>
				</div>	
			</div>
		</div>
		<div class="col-md-12 text-block tabcontent"  id="bwp_premium_info">
			<h2 class="dashboard-install-title"><?php esc_html_e( '2) Premium Theme Information.','vw-sports'); ?></h2>
			<div class="row">
				<div class="col-md-7">
					<img src="<?php echo esc_url(get_template_directory_uri() . '/inc/getstart/images/responsive-pro.png'); ?>" alt="<?php echo esc_attr( 'responsive-image', 'vw-sports'); ?>">
					<div class="pad-box">
						<h3><?php esc_html_e( 'Pro Theme Description','vw-sports'); ?></h3>
						<p class="pad-box-p"><?php esc_html_e( 'As sports is attached to sentiments, your sports website should be able to create the thrill and excitement when someone views it. This Sports WordPress Theme is designed to generate such exciting sports websites. Whether you are a sports enthusiast who wants to show your passion for your favorite sports team or a sports journalist who wants to start a sports-related blog; this theme offers you endless possibilities to set up any kind of website dedicated to sports. WP Sports WordPress Theme has exciting colors and imagery that will match perfectly to the purpose. Its retina-ready full-width slider clearly shows the passion for sports through the display of stunning images presented in the form of the slide show. Well-placed Call To Action (CTA) buttons play a key role in improving conversions along with adding interactive parts to your site. Sports clubs can also utilize its design to make their online appearance in style.', 'vw-sports' ); ?><p>
					</div>
				</div>
				<div class="col-md-5 install-plugin-right">
					<div class="pad-box">
						<h3><?php esc_html_e( 'Pro Theme Features','vw-sports'); ?></h3>
						<div class="dashboard-install-benefit">
							<ul>
								<li><?php esc_html_e( 'One click demo importer','vw-sports'); ?></li>
								<li><?php esc_html_e( 'Global color option','vw-sports'); ?></li>
								<li><?php esc_html_e( 'Responsive design','vw-sports'); ?></li>
								<li><?php esc_html_e( 'Favicon, logo, title, and tagline customization','vw-sports'); ?></li>
								<li><?php esc_html_e( 'Advanced color options and color pallets','vw-sports'); ?></li>
								<li><?php esc_html_e( '100+ font family options','vw-sports'); ?></li>
								<li><?php esc_html_e( 'Simple menu option','vw-sports'); ?></li>
								<li><?php esc_html_e( 'SEO friendly','vw-sports'); ?></li>
								<li><?php esc_html_e( 'Pagination option','vw-sports'); ?></li>
								<li><?php esc_html_e( 'Compatible with different WordPress famous plugins like contact form 7','vw-sports'); ?></li>
								<li><?php esc_html_e( 'Responsive Layout','vw-sports'); ?></li>
								<li><?php esc_html_e( 'SEO Optimized','vw-sports'); ?></li>
								<li><?php esc_html_e( 'Custom Page Template','vw-sports'); ?></li>
								<li><?php esc_html_e( 'Pagination Option','vw-sports'); ?></li>
								<li><?php esc_html_e( 'Custom Page Templates','vw-sports'); ?></li>
								<li><?php esc_html_e( 'Global Color Option, Tagline, Logo','vw-sports'); ?></li>
								<li><?php esc_html_e( 'One-click demo importer','vw-sports'); ?></li>
								<li><?php esc_html_e( 'Permits to show logo, title, and Tagline for the website.','vw-sports'); ?></li>
								<li><?php esc_html_e( 'Section reordering','vw-sports'); ?></li>
								<li><?php esc_html_e( 'Customizable home page','vw-sports'); ?></li>
								<li><?php esc_html_e( 'Footer widgets & editor style','vw-sports'); ?></li>
								<li><?php esc_html_e( 'Social media feature','vw-sports'); ?></li>
								<li><?php esc_html_e( 'Slider with unlimited number of slides','vw-sports'); ?></li>
								<li><?php esc_html_e( 'Pool Maintenance Services Section','vw-sports'); ?></li>
								<li><?php esc_html_e( 'Testimonial Section','vw-sports'); ?></li>
								<li><?php esc_html_e( 'Our Team Section','vw-sports'); ?></li>
								<li><?php esc_html_e( 'Featured Project Section','vw-sports'); ?></li>
								<li><?php esc_html_e( 'How We Work Section','vw-sports'); ?></li>
								<li><?php esc_html_e( 'Brand Section','vw-sports'); ?></li>
								<li><?php esc_html_e( 'Product Section','vw-sports'); ?></li>
								<li><?php esc_html_e( 'Instagram Feed','vw-sports'); ?></li>
								<li><?php esc_html_e( 'Newsletter Section','vw-sports'); ?></li>
								<li><?php esc_html_e( 'Blog post section','vw-sports'); ?></li>								
								<li><?php esc_html_e( 'Contact page template','vw-sports'); ?></li>	
								<li><?php esc_html_e( 'Shortcodes for the Custom Posttype','vw-sports'); ?></li>	
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>
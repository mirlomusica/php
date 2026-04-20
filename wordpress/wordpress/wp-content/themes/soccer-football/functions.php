<?php
/**
 * Soccer Football functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Soccer Football
 */
function soccer_football_file_setup() {
    if ( ! defined( 'FOOTBALL_SPORTS_CLUB_URL' ) ) {
        define( 'FOOTBALL_SPORTS_CLUB_URL', esc_url( 'https://www.themagnifico.net/products/football-wordpress-theme', 'soccer-football') );
    }
    if ( ! defined( 'FOOTBALL_SPORTS_CLUB_TEXT' ) ) {
        define( 'FOOTBALL_SPORTS_CLUB_TEXT', __( 'Soccer Football Pro','soccer-football' ));
    }
    if ( ! defined( 'FOOTBALL_SPORTS_CLUB_BUY_TEXT' ) ) {
        define( 'FOOTBALL_SPORTS_CLUB_BUY_TEXT', __( 'Buy Soccer Football Pro','soccer-football' ));
    }
    if ( ! defined( 'FOOTBALL_SPORTS_CLUB_CONTACT_SUPPORT' ) ) {
        define('FOOTBALL_SPORTS_CLUB_CONTACT_SUPPORT',__('https://wordpress.org/support/theme/soccer-football','soccer-football'));
    }
    if ( ! defined( 'FOOTBALL_SPORTS_CLUB_REVIEW' ) ) {
        define('FOOTBALL_SPORTS_CLUB_REVIEW',__('https://wordpress.org/support/theme/soccer-football/reviews/#new-post','soccer-football'));
    }
    if ( ! defined( 'FOOTBALL_SPORTS_CLUB_LIVE_DEMO' ) ) {
        define('FOOTBALL_SPORTS_CLUB_LIVE_DEMO',__('https://demo.themagnifico.net/soccer-football/','soccer-football'));
    }
    if ( ! defined( 'FOOTBALL_SPORTS_CLUB_GET_PREMIUM_PRO' ) ) {
        define('FOOTBALL_SPORTS_CLUB_GET_PREMIUM_PRO',__('https://www.themagnifico.net/products/football-wordpress-theme','soccer-football'));
    }
    if ( ! defined( 'FOOTBALL_SPORTS_CLUB_PRO_DOC' ) ) {
        define('FOOTBALL_SPORTS_CLUB_PRO_DOC',__('https://demo.themagnifico.net/eard/wathiqa/soccer-football-pro-doc/','soccer-football'));
    }
    if ( ! defined( 'FOOTBALL_SPORTS_CLUB_FREE_DOC' ) ) {
        define('FOOTBALL_SPORTS_CLUB_FREE_DOC',__('https://demo.themagnifico.net/eard/wathiqa/soccer-football-free-doc/','soccer-football'));
    }
    if ( ! defined( 'FOOTBALL_SPORTS_CLUB_BUNDLE_LINK' ) ) {
        define('FOOTBALL_SPORTS_CLUB_BUNDLE_LINK',__('https://www.themagnifico.net/products/wordpress-theme-bundle','soccer-football'));
    }
}
add_action( 'after_setup_theme', 'soccer_football_file_setup' );

function soccer_football_enqueue_styles() {
    wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.css');
    $soccer_football_parentcss = 'football-sports-club-style';
    $soccer_football_theme = wp_get_theme(); wp_enqueue_style( $soccer_football_parentcss, get_template_directory_uri() . '/style.css', array(), $soccer_football_theme->parent()->get('Version'));
    wp_enqueue_style( 'soccer-football-style', get_stylesheet_uri(), array( $soccer_football_parentcss ), $soccer_football_theme->get('Version'));

    require get_theme_file_path( '/custom-option.php' );
    wp_add_inline_style( 'soccer-football-style',$football_sports_club_theme_css );
    require get_parent_theme_file_path( '/custom-option.php' );
    wp_add_inline_style( 'football-sports-club-style',$football_sports_club_theme_css );

    wp_enqueue_script( 'comment-reply', '/wp-includes/js/comment-reply.min.js', array(), false, true );
}

add_action( 'wp_enqueue_scripts', 'soccer_football_enqueue_styles' );

function soccer_football_admin_scripts() {
    // demo CSS
    wp_enqueue_style( 'soccer-football-demo-css', get_theme_file_uri( 'assets/css/demo.css' ) );
}
add_action( 'admin_enqueue_scripts', 'soccer_football_admin_scripts' );

if ( ! function_exists( 'soccer_football_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function soccer_football_setup() {

        add_theme_support( 'responsive-embeds' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support( 'post-thumbnails' );

        add_image_size('soccer-football-featured-header-image', 2000, 660, true);

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );

        // Set up the WordPress core custom background feature.
        add_theme_support( 'custom-background', apply_filters( 'football_sports_club_custom_background_args', array(
            'default-color' => '',
            'default-image' => '',
        ) ) );

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support( 'custom-logo', array(
            'height'      => 50,
            'width'       => 50,
            'flex-width'  => true,
        ) );

        add_editor_style( array( '/editor-style.css' ) );

        add_theme_support( 'align-wide' );

        add_theme_support( 'wp-block-styles' );
    }
endif;
add_action( 'after_setup_theme', 'soccer_football_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function soccer_football_widgets_init() {
        register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'soccer-football' ),
        'id'            => 'sidebar',
        'description'   => esc_html__( 'Add widgets here.', 'soccer-football' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h5 class="widget-title">',
        'after_title'   => '</h5>',
    ) );
}
add_action( 'widgets_init', 'soccer_football_widgets_init' );

function soccer_football_remove_my_action() {
    remove_action( 'remove_menu_page','football-sports-club-info' );
    remove_action( 'admin_menu','demo_importer_admin_page' );
    remove_action( 'admin_enqueue_scripts', 'football_sports_club_getpage_css' );
    remove_action( 'admin_notices', 'football_sports_club_deprecated_hook_admin_notice' );
    remove_action( 'remove_menu_page','football-sports-club-info' );
    remove_action( 'admin_menu','football_sports_club_demo_importer_admin_page' );
    remove_action( 'admin_notices','football_sports_club_deprecated_hook_admin_notice' );
}
add_action( 'after_setup_theme', 'soccer_football_remove_my_action');

function soccer_football_remove_parent_theme_hooks() {
    remove_action('init', 'soccer_football_remove_my_action');
}
add_action('after_setup_theme', 'soccer_football_remove_parent_theme_hooks', 20);

add_action('admin_menu', 'remove_my_theme_page', 999);
function remove_my_theme_page() {
    remove_submenu_page('themes.php','football-sports-club-info');
}

/**
 * Get CSS
 */

function soccer_football_getpage_css($hook) {
    wp_register_script( 'admin-notice-script', get_stylesheet_directory_uri() . '/inc/admin/js/admin-notice-script.js', array( 'jquery' ) );
    wp_localize_script('admin-notice-script','soccer_football',
        array('admin_ajax'  =>  admin_url('admin-ajax.php'),'wpnonce'  =>   wp_create_nonce('soccer_football_dismissed_notice_nonce')
        )
    );
    wp_enqueue_script('admin-notice-script');

    wp_localize_script( 'admin-notice-script', 'soccer_football_ajax_object',
        array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
    );
    if ( 'appearance_page_soccer-football-info' != $hook ) {
        return;
    }
}
add_action( 'admin_enqueue_scripts', 'soccer_football_getpage_css' );

//Admin Notice For Getstart
function soccer_football_ajax_notice_handler() {
    check_ajax_referer( 'soccer_football_dismissed_notice_nonce', 'wpnonce' );
    if ( isset( $_POST['type'] ) ) {
        $type = sanitize_text_field( wp_unslash( $_POST['type'] ) );
        update_option( 'dismissed-' . $type, TRUE );
    }
    wp_die();
}

function soccer_football_deprecated_hook_admin_notice() {

     // Check if the notice has been dismissed by the user
    $dismissed = get_user_meta(get_current_user_id(), 'soccer_football_dismissable_notice', true);

    // Exclude the notice from being shown on the "Theme Importer" page
    $current_screen = get_current_screen();
    if ($current_screen && $current_screen->id === 'appearance_page_theme-importer') {
        return; // Don't show the notice on this page
    }

    if (!$dismissed) {  
        ?>
        <div class="updated notice notice-success is-dismissible notice-get-started-class" data-notice="get_started" style="background: #f7f9f9; padding: 20px 10px; display: flex;">
            <div class="tm-admin-image">
                <img style="width: 100%;max-width: 320px;line-height: 40px;display: inline-block;vertical-align: top;border: 2px solid #ddd;border-radius: 4px;" src="<?php echo esc_url(get_stylesheet_directory_uri()) .'/screenshot.png'; ?>" />
            </div>
            <div class="tm-admin-content" style="padding-left: 30px; align-self: center">
                <h2 style="font-weight: 600;line-height: 1.3; margin: 0px;"><?php esc_html_e('Thank You For Choosing ', 'soccer-football'); ?><?php echo esc_html( wp_get_theme() ); ?></h2>
                <p style="color: #3c434a; font-weight: 400; margin-bottom: 30px;"><?php esc_html_e('Get Started With Theme By Clicking On Getting Started.', 'soccer-football'); ?></p>
                <a class="admin-notice-btn button button-primary button-hero" href="<?php echo esc_url( admin_url( 'themes.php?page=soccer-football-info' )); ?>"><?php esc_html_e( 'Get started', 'soccer-football' ) ?></a>
                <a class="admin-notice-btn button button-primary button-hero notice-pro-btn" target="_blank" href="<?php echo esc_url( FOOTBALL_SPORTS_CLUB_GET_PREMIUM_PRO ); ?>"><?php esc_html_e( 'Get Premium ', 'soccer-football' ) ?></a>
                <a class="admin-notice-btn button button-primary button-hero notice-bundle-btn" target="_blank" href="<?php echo esc_url( FOOTBALL_SPORTS_CLUB_BUNDLE_LINK ); ?>"><?php esc_html_e( 'Buy All Themes - 120+ Templates', 'soccer-football' ) ?></a>
                <span style="padding-top: 15px; display: inline-block; padding-left: 8px;">
                <span class="dashicons dashicons-admin-links"></span>
                <a class="admin-notice-btn"  target="_blank" href="<?php echo esc_url( FOOTBALL_SPORTS_CLUB_LIVE_DEMO ); ?>"><?php esc_html_e( 'View Demo', 'soccer-football' ) ?></a>
                </span>
            </div>
        </div>
    <?php }
}

add_action( 'admin_notices', 'soccer_football_deprecated_hook_admin_notice' );

function soccer_football_switch_theme() {
    delete_user_meta(get_current_user_id(), 'soccer_football_dismissable_notice');
}
add_action('after_switch_theme', 'soccer_football_switch_theme');
function soccer_football_dismissable_notice() {
    check_ajax_referer( 'soccer_football_dismissed_notice_nonce', 'wpnonce' );
    update_user_meta(get_current_user_id(), 'soccer_football_dismissable_notice', true);
    wp_die();
}

// Demo Content Code

// Ensure WordPress is loaded
if (!defined('ABSPATH')) {
    exit;
}

// Add the AJAX action to trigger theme mods import
add_action('wp_ajax_import_theme_mods', 'soccer_football_demo_importer_ajax_handler');

// Handle the AJAX request
function soccer_football_demo_importer_ajax_handler() {
    // Sample data to import
    $theme_mods_data = array(
        'header_textcolor' => '000000',  // Example: change header text color
        'background_color' => 'ffffff',  // Example: change background color
        'custom_logo'      => 123,       // Example: set a custom logo by attachment ID
        'footer_text'      => 'Custom Footer Text', // Example: custom footer text
    );

    // Call the function to import theme mods
    if (soccer_football_demo_theme_importer($theme_mods_data)) {
        // After importing theme mods, create the menu
        soccer_football_create_demo_menu();
        wp_send_json_success(array(
            'msg' => 'Theme mods imported successfully.',
            'redirect' => home_url()
        ));
    } else {
        wp_send_json_error('Failed to import theme mods.');
    }

    wp_die();
}

// Function to set theme mods
function soccer_football_demo_theme_importer($import_data) {
    if (is_array($import_data)) {
        foreach ($import_data as $mod_name => $mod_value) {
            set_theme_mod($mod_name, $mod_value);
        }
        return true;
    } else {
        return false;
    }
}

// Function to create demo menu
function soccer_football_create_demo_menu() {

    $menu_structure = [

        [
            'title' => 'Home',
            'slug'  => 'home',
            'template' => 'page-template/home-template.php',
        ],
        [
            'title' => 'About Us',
            'slug'  => 'about',
            'content' => "<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>
            "
        ],
        [
            'title' => 'Match',
            'slug'  => 'match',
            'content' => "<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>
            "
        ],
        [
            'title' => 'Blog',
            'slug'  => 'blog',
        ],
        [
            'title' => 'Pages',
            'slug'  => 'pages',
            'content' => "<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>
            "
        ],
        [
            'title' => 'Contact Us',
            'slug'  => 'contact',
            'content' => "<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>
            "
        ],
    ];

    // ----------------------------------------------------
    // Do not modify below this line unless needed
    // ----------------------------------------------------

    $created_pages = [];

    $menu_name = 'Primary Menu';
    $location  = 'primary';
    $menu = wp_get_nav_menu_object($menu_name);

    $menu_id = (!$menu) ? wp_create_nav_menu($menu_name) : $menu->term_id;

    $create_page_and_menu = function($item, $parent_menu_id = 0, $parent_page_id = 0) 
        use (&$create_page_and_menu, &$created_pages, $menu_id) {

        $existing_pages = get_posts( array(
            'post_type'      => 'page',
            'posts_per_page' => 1,
            'post_status'    => 'publish',
            'title'          => $item['title'],
        ) );
        $page = ! empty( $existing_pages ) ? $existing_pages[0] : null;

        if (!$page) {
            $page_id = wp_insert_post([
                'post_title'   => $item['title'],
                'post_type'    => 'page',
                'post_status'  => 'publish',
                'post_name'    => $item['slug'],
                'post_parent'  => $parent_page_id,
                'post_content' => !empty($item['content']) ? $item['content'] : '',
            ]);

            if (!empty($item['template'])) {
                update_post_meta($page_id, '_wp_page_template', $item['template']);
            }

        } else {
            $page_id = $page->ID;
        }

        $created_pages[$item['title']] = $page_id;

        $menu_item_id = wp_update_nav_menu_item($menu_id, 0, [
            'menu-item-title'     => $item['title'],
            'menu-item-object'    => 'page',
            'menu-item-object-id' => $page_id,
            'menu-item-type'      => 'post_type',
            'menu-item-parent-id' => $parent_menu_id,
            'menu-item-status'    => 'publish'
        ]);

        if (!empty($item['children'])) {
            foreach ($item['children'] as $child) {
                $create_page_and_menu($child, $menu_item_id, $page_id);
            }
        }
    };

    foreach ($menu_structure as $item) {
        $create_page_and_menu($item);
    }

    if (!empty($created_pages['Home'])) {
        update_option('page_on_front', $created_pages['Home']);
        update_option('show_on_front', 'page');
    }

    if (!empty($created_pages['Blog'])) {
        update_option('page_for_posts', $created_pages['Blog']);
    }

    $locations = get_theme_mod('nav_menu_locations');
    $locations[$location] = $menu_id;
    set_theme_mod('nav_menu_locations', $locations);

    //Top Bar
    set_theme_mod( 'football_sports_club_upcoming_match', 'Real Soccer vs Valencia,Califotnia' );
    set_theme_mod( 'football_sports_club_phone', '012345678' );
    set_theme_mod( 'football_sports_club_address', 'Lorem Ipsum is simply dummy text of the printing' );

    set_theme_mod( 'football_sports_club_facebook_url', 'www.facebook.com' );
    set_theme_mod( 'football_sports_club_twitter_url', 'www.twitter.com' );
    set_theme_mod( 'football_sports_club_intagram_url', 'www.instagram.com' );
    set_theme_mod( 'football_sports_club_linkedin_url', 'www.linkedin.com' );
    set_theme_mod( 'football_sports_club_youtube_url', 'www.youtube.com' );


    //Slider
    set_theme_mod( 'football_sports_club_top_slider_setting', true );
    set_theme_mod( 'football_sports_club_slider_button_text', 'Register Now' );

    for($i=1;$i<=3;$i++){
        $title = 'Power Kick to Get Your Goals...';
        $content = 'Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ipsum suspendisse.';
            // Create post object
        $my_post = array(
            'post_title'    => wp_strip_all_tags( $title ),
            'post_content'  => $content,
            'post_status'   => 'publish',
            'post_type'     => 'page',
        );

         // Insert the post into the database
         $post_id = wp_insert_post( $my_post );

         if ($post_id) {
            // Set the theme mod for the slider page
            set_theme_mod('football_sports_club_top_slider_page' . $i, $post_id);

             $image_url = get_template_directory_uri().'/assets/images/slider.png';

            $image_id = media_sideload_image($image_url, $post_id, null, 'id');

                if (!is_wp_error($image_id)) {
                    // Set the downloaded image as the post's featured image
                    set_post_thumbnail($post_id, $image_id);
                }
        }
    }

    //Featured Product
    set_theme_mod( 'football_sports_club_activity_setting', 'true' );
    set_theme_mod( 'football_sports_club_sports_activities_title', 'We Provide You Best Services' );
   
    set_theme_mod('football_sports_club_sports_activities_category', 'servicecat1');

    // Define post category names and post titles
    $football_sports_club_category_names = array('servicecat1', 'servicecat2');
    $football_sports_club_title_array = array(
        array("Tournament Teams", "Strong Defend", "Goal keeper"),
        array("Tournament Teams", "Strong Defend", "Goal keeper")
    );

    foreach ($football_sports_club_category_names as $football_sports_club_index => $football_sports_club_category_name) {
        // Create or retrieve the post category term ID
        $football_sports_club_term = term_exists($football_sports_club_category_name, 'category');
        if ($football_sports_club_term === 0 || $football_sports_club_term === null) {
            // If the term does not exist, create it
            $football_sports_club_term = wp_insert_term($football_sports_club_category_name, 'category');
        }
        if (is_wp_error($football_sports_club_term)) {
            error_log('Error creating category: ' . $football_sports_club_term->get_error_message());
            continue; // Skip to the next iteration if category creation fails
        }

        for ($football_sports_club_i = 0; $football_sports_club_i < 3; $football_sports_club_i++) {
            // Create post content
            $football_sports_club_title = $football_sports_club_title_array[$football_sports_club_index][$football_sports_club_i];
            $football_sports_club_content = 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.';

            // Create post post object
            $football_sports_club_my_post = array(
                'post_title'    => wp_strip_all_tags($football_sports_club_title),
                'post_content'  => $football_sports_club_content,
                'post_status'   => 'publish',
                'post_type'     => 'post', // Post type set to 'post'
            );

            // Insert the post into the database
            $football_sports_club_post_id = wp_insert_post($football_sports_club_my_post);


            if (is_wp_error($football_sports_club_post_id)) {
                error_log('Error creating post: ' . $football_sports_club_post_id->get_error_message());
                continue; // Skip to the next post if creation fails
            }

            // Assign the category to the post
            wp_set_post_categories($football_sports_club_post_id, array((int)$football_sports_club_term['term_id']));

            // Handle the featured image using media_sideload_image
            $football_sports_club_image_url = get_stylesheet_directory_uri() . '/assets/images/post-img' . ($football_sports_club_i + 1) . '.png';
            $football_sports_club_image_id = media_sideload_image($football_sports_club_image_url, $football_sports_club_post_id, null, 'id');

            if (is_wp_error($football_sports_club_image_id)) {
                error_log('Error downloading image: ' . $football_sports_club_image_id->get_error_message());
                continue; // Skip to the next post if image download fails
            }
            // Assign featured image to post
            set_post_thumbnail($football_sports_club_post_id, $football_sports_club_image_id);
        }
    } 
        
    $football_sports_club_icon_array = array(
        'fas fa-bicycle',
        'fas fa-golf-ball',
        'fas fa-swimmer',
    );

    for ( $i = 1; $i <= 3; $i++ ) {

        // Set icon
        if ( isset( $football_sports_club_icon_array[ $i - 1 ] ) ) {
            set_theme_mod(
                'football_sports_club_sports_activities_icon' . $i,
                $football_sports_club_icon_array[ $i - 1 ]
            );
        }
    }   
    
}

add_action( 'customize_register', 'soccer_football_override_child_theme_global_color_defaults', 20 );
function soccer_football_override_child_theme_global_color_defaults( $wp_customize ) {

    if ( $wp_customize->get_setting( 'football_sports_club_global_color' ) ) {
        $wp_customize->get_setting( 'football_sports_club_global_color' )->default = '#ffa800';
    }
}
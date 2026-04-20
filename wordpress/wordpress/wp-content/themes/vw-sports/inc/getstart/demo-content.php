<div class="theme-offer">
	<?php 
        // Check if the demo import has been completed
        $vw_sports_demo_import_completed = get_option('vw_sports_demo_import_completed', false);

        // If the demo import is completed, display the "View Site" button
        if ($vw_sports_demo_import_completed) {
        echo '<p class="notice-text">' . esc_html__('Your demo import has been completed successfully.', 'vw-sports') . '</p>';
        echo '<span><a href="' . esc_url(home_url()) . '" class="button button-primary site-btn" target="_blank">' . esc_html__('View Site', 'vw-sports') . '</a></span>';
        }

		// POST and update the customizer and other related data of THE COURIER SERVICESPRO
        if (isset($_POST['submit'])) {

        // Check if Contact Form 7 is installed and activated
            if (!is_plugin_active('contact-form-7/wp-contact-form-7.php')) {
              // Install the plugin if it doesn't exist
              $plugin_slug = 'contact-form-7';
              $plugin_file = 'contact-form-7/wp-contact-form-7.php';

              // Check if plugin is installed
              $installed_plugins = get_plugins();
              if (!isset($installed_plugins[$plugin_file])) {
                  include_once(ABSPATH . 'wp-admin/includes/plugin-install.php');
                  include_once(ABSPATH . 'wp-admin/includes/file.php');
                  include_once(ABSPATH . 'wp-admin/includes/misc.php');
                  include_once(ABSPATH . 'wp-admin/includes/class-wp-upgrader.php');

                  // Install the plugin
                  $upgrader = new Plugin_Upgrader();
                  $upgrader->install('https://downloads.wordpress.org/plugin/contact-form-7.latest-stable.zip');
              }
              // Activate the plugin
              activate_plugin($plugin_file);
            }    

            // Check if ibtana visual editor is installed and activated
            if (!is_plugin_active('ibtana-visual-editor/plugin.php')) {
              // Install the plugin if it doesn't exist
              $vw_sports_plugin_slug = 'ibtana-visual-editor';
              $vw_sports_plugin_file = 'ibtana-visual-editor/plugin.php';

              // Check if plugin is installed
              $vw_sports_installed_plugins = get_plugins();
              if (!isset($vw_sports_installed_plugins[$vw_sports_plugin_file])) {
                  include_once(ABSPATH . 'wp-admin/includes/plugin-install.php');
                  include_once(ABSPATH . 'wp-admin/includes/file.php');
                  include_once(ABSPATH . 'wp-admin/includes/misc.php');
                  include_once(ABSPATH . 'wp-admin/includes/class-wp-upgrader.php');

                  // Install the plugin
                  $vw_sports_upgrader = new Plugin_Upgrader();
                  $vw_sports_upgrader->install('https://downloads.wordpress.org/plugin/ibtana-visual-editor.latest-stable.zip');
              }
              // Activate the plugin
              activate_plugin($vw_sports_plugin_file);
            }
            

        
            // ------- Create Nav Menu --------
            $vw_sports_menuname = 'Main Menus';
            $vw_sports_bpmenulocation = 'primary';
            $vw_sports_menu_exists = wp_get_nav_menu_object($vw_sports_menuname);

            if (!$vw_sports_menu_exists) {
                $vw_sports_menu_id = wp_create_nav_menu($vw_sports_menuname);

                // Create Home Page
                $vw_sports_home_title = 'Home';
                $vw_sports_home = array(
                    'post_type' => 'page',
                    'post_title' => $vw_sports_home_title,
                    'post_content' => '',
                    'post_status' => 'publish',
                    'post_author' => 1,
                    'post_slug' => 'home'
                );
                $vw_sports_home_id = wp_insert_post($vw_sports_home);
                // Assign Home Page Template
                add_post_meta($vw_sports_home_id, '_wp_page_template', 'page-template/custom-home-page.php');
                // Update options to set Home Page as the front page
                update_option('page_on_front', $vw_sports_home_id);
                update_option('show_on_front', 'page');
                // Add Home Page to Menu
                wp_update_nav_menu_item($vw_sports_menu_id, 0, array(
                    'menu-item-title' => __('Home', 'vw-sports'),
                    'menu-item-classes' => 'home',
                    'menu-item-url' => home_url('/'),
                    'menu-item-status' => 'publish',
                    'menu-item-object-id' => $vw_sports_home_id,
                    'menu-item-object' => 'page',
                    'menu-item-type' => 'post_type'
                ));

                // Create Pages Page with Dummy Content
                $vw_sports_pages_title = 'Pages';
                $vw_sports_pages_content = '
                <p>Explore all the pages we have on our website. Find information about our services, company, and more.</p>

                 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960 with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br> 

                  All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.';
                $vw_sports_pages = array(
                    'post_type' => 'page',
                    'post_title' => $vw_sports_pages_title,
                    'post_content' => $vw_sports_pages_content,
                    'post_status' => 'publish',
                    'post_author' => 1,
                    'post_slug' => 'pages'
                );
                $vw_sports_pages_id = wp_insert_post($vw_sports_pages);
                // Add Pages Page to Menu
                wp_update_nav_menu_item($vw_sports_menu_id, 0, array(
                    'menu-item-title' => __('Pages', 'vw-sports'),
                    'menu-item-classes' => 'pages',
                    'menu-item-url' => home_url('/pages/'),
                    'menu-item-status' => 'publish',
                    'menu-item-object-id' => $vw_sports_pages_id,
                    'menu-item-object' => 'page',
                    'menu-item-type' => 'post_type'
                ));

                // Create About Us Page with Dummy Content
                $vw_sports_about_title = 'About Us';
                $vw_sports_about_content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...<br>

                         Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960 with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br> 

                            There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text.<br> 

                            All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.';
                $vw_sports_about = array(
                    'post_type' => 'page',
                    'post_title' => $vw_sports_about_title,
                    'post_content' => $vw_sports_about_content,
                    'post_status' => 'publish',
                    'post_author' => 1,
                    'post_slug' => 'about-us'
                );
                $vw_sports_about_id = wp_insert_post($vw_sports_about);
                // Add About Us Page to Menu
                wp_update_nav_menu_item($vw_sports_menu_id, 0, array(
                    'menu-item-title' => __('About Us', 'vw-sports'),
                    'menu-item-classes' => 'about-us',
                    'menu-item-url' => home_url('/about-us/'),
                    'menu-item-status' => 'publish',
                    'menu-item-object-id' => $vw_sports_about_id,
                    'menu-item-object' => 'page',
                    'menu-item-type' => 'post_type'
                ));

                // Create Players Page
                $vw_sports_players_title = 'Players';
                $vw_sports_players_content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Players profiles, stats, achievements, and team details are showcased here.';

                $vw_sports_players = array(
                    'post_type'   => 'page',
                    'post_title'  => $vw_sports_players_title,
                    'post_content'=> $vw_sports_players_content,
                    'post_status' => 'publish',
                    'post_author' => 1,
                    'post_slug'   => 'players'
                );

                $vw_sports_players_id = wp_insert_post($vw_sports_players);

                wp_update_nav_menu_item($vw_sports_menu_id, 0, array(
                    'menu-item-title'      => __('Players', 'vw-sports'),
                    'menu-item-classes'   => 'players',
                    'menu-item-url'       => home_url('/players/'),
                    'menu-item-status'    => 'publish',
                    'menu-item-object-id' => $vw_sports_players_id,
                    'menu-item-object'    => 'page',
                    'menu-item-type'      => 'post_type'
                ));

                // Create Results Page
                $vw_sports_results_title = 'Results';
                $vw_sports_results_content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. View match results, scores, rankings, and performance summaries.';

                $vw_sports_results = array(
                    'post_type'   => 'page',
                    'post_title'  => $vw_sports_results_title,
                    'post_content'=> $vw_sports_results_content,
                    'post_status' => 'publish',
                    'post_author' => 1,
                    'post_slug'   => 'results'
                );

                $vw_sports_results_id = wp_insert_post($vw_sports_results);

                wp_update_nav_menu_item($vw_sports_menu_id, 0, array(
                    'menu-item-title'      => __('Results', 'vw-sports'),
                    'menu-item-classes'   => 'results',
                    'menu-item-url'       => home_url('/results/'),
                    'menu-item-status'    => 'publish',
                    'menu-item-object-id' => $vw_sports_results_id,
                    'menu-item-object'    => 'page',
                    'menu-item-type'      => 'post_type'
                ));

                // Create Matches Page
                $vw_sports_matches_title = 'Matches';
                $vw_sports_matches_content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Upcoming and past matches schedules, venues, and match details.';

                $vw_sports_matches = array(
                    'post_type'   => 'page',
                    'post_title'  => $vw_sports_matches_title,
                    'post_content'=> $vw_sports_matches_content,
                    'post_status' => 'publish',
                    'post_author' => 1,
                    'post_slug'   => 'matches'
                );

                $vw_sports_matches_id = wp_insert_post($vw_sports_matches);

                wp_update_nav_menu_item($vw_sports_menu_id, 0, array(
                    'menu-item-title'      => __('Matches', 'vw-sports'),
                    'menu-item-classes'   => 'matches',
                    'menu-item-url'       => home_url('/matches/'),
                    'menu-item-status'    => 'publish',
                    'menu-item-object-id' => $vw_sports_matches_id,
                    'menu-item-object'    => 'page',
                    'menu-item-type'      => 'post_type'
                ));

                // Create Shop Page
                $vw_sports_shop_title = 'Shop';
                $vw_sports_shop_content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Buy official merchandise, kits, accessories, and sports gear.';

                $vw_sports_shop = array(
                    'post_type'   => 'page',
                    'post_title'  => $vw_sports_shop_title,
                    'post_content'=> $vw_sports_shop_content,
                    'post_status' => 'publish',
                    'post_author' => 1,
                    'post_slug'   => 'shop'
                );

                $vw_sports_shop_id = wp_insert_post($vw_sports_shop);

                wp_update_nav_menu_item($vw_sports_menu_id, 0, array(
                    'menu-item-title'      => __('Shop', 'vw-sports'),
                    'menu-item-classes'   => 'shop',
                    'menu-item-url'       => home_url('/shop/'),
                    'menu-item-status'    => 'publish',
                    'menu-item-object-id' => $vw_sports_shop_id,
                    'menu-item-object'    => 'page',
                    'menu-item-type'      => 'post_type'
                ));

                // Create News Page
                $vw_sports_news_title = 'News';
                $vw_sports_news_content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Latest sports news, announcements, and updates.';

                $vw_sports_news = array(
                    'post_type'   => 'page',
                    'post_title'  => $vw_sports_news_title,
                    'post_content'=> $vw_sports_news_content,
                    'post_status' => 'publish',
                    'post_author' => 1,
                    'post_slug'   => 'news'
                );

                $vw_sports_news_id = wp_insert_post($vw_sports_news);

                wp_update_nav_menu_item($vw_sports_menu_id, 0, array(
                    'menu-item-title'      => __('News', 'vw-sports'),
                    'menu-item-classes'   => 'news',
                    'menu-item-url'       => home_url('/news/'),
                    'menu-item-status'    => 'publish',
                    'menu-item-object-id' => $vw_sports_news_id,
                    'menu-item-object'    => 'page',
                    'menu-item-type'      => 'post_type'
                ));

                // Set the menu location if it's not already set
                if (!has_nav_menu($vw_sports_bpmenulocation)) {
                    $locations = get_theme_mod('nav_menu_locations'); // Use 'nav_menu_locations' to get locations array
                    if (empty($locations)) {
                        $locations = array();
                    }
                    $locations[$vw_sports_bpmenulocation] = $vw_sports_menu_id;
                    set_theme_mod('nav_menu_locations', $locations);
                }  
        }        
        
            // Set the demo import completion flag
    		update_option('vw_sports_demo_import_completed', true);
    		// Display success message and "View Site" button
    		echo '<p class="notice-text">' . esc_html__('Your demo import has been completed successfully.', 'vw-sports') . '</p>';
    		echo '<span><a href="' . esc_url(home_url()) . '" class="button button-primary site-btn" target="_blank">' . esc_html__('View Site', 'vw-sports') . '</a></span>';
            //end 
   


            // slider section start //  
            set_theme_mod( 'vw_sports_slider_button_text', 'Read More' );
            set_theme_mod( 'vw_sports_slider_button_link', '#' );

            for($vw_sports_i=1;$vw_sports_i<=3;$vw_sports_i++){
               $vw_sports_slider_title = 'PLAY LIKE A CHAMPION TODAY';
               $vw_sports_slider_content = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s';
                  // Create post object
               $my_post = array(
               'post_title'    => wp_strip_all_tags( $vw_sports_slider_title ),
               'post_content'  => $vw_sports_slider_content,
               'post_status'   => 'publish',
               'post_type'     => 'page',
               );

               // Insert the post into the database
               $vw_sports_post_id = wp_insert_post( $my_post );

               if ($vw_sports_post_id) {
                 // Set the theme mod for the slider page
                 set_theme_mod('vw_sports_slider_page' . $vw_sports_i, $vw_sports_post_id);

                  $vw_sports_image_url = get_template_directory_uri().'/assets/images/slider'.$vw_sports_i.'.png';

                $vw_sports_image_id = media_sideload_image($vw_sports_image_url, $vw_sports_post_id, null, 'id');

                    if (!is_wp_error($vw_sports_image_id)) {
                        // Set the downloaded image as the post's featured image
                        set_post_thumbnail($vw_sports_post_id, $vw_sports_image_id);
                    }
                }
            } 


            // Game Section //
            set_theme_mod('vw_sports_services_title', 'Game Highlights');
            set_theme_mod('vw_sports_services_number', '7');

            $vw_sports_tab_text_array = array("All", "FOOTBALL", "HOCKEY", "BASKETBALL", "VALLEYBALL", "BASEBALL", "REGBEE");
            $vw_sports_category_names = array("postcategory1", "postcategory2", "postcategory3", "postcategory4", "postcategory5", "postcategory6", "postcategory7");
            $vw_sports_title_array = array(
                array("Lorem Ipsum is simply dummy text ", "Lorem Ipsum is simply dummy text ", "Lorem Ipsum is simply dummy text"),
                array("Lorem Ipsum is simply dummy text ", "Lorem Ipsum is simply dummy text ", "Lorem Ipsum is simply dummy text"),
                array("Lorem Ipsum is simply dummy text ", "Lorem Ipsum is simply dummy text ", "Lorem Ipsum is simply dummy text"),
                array("Lorem Ipsum is simply dummy text ", "Lorem Ipsum is simply dummy text ", "Lorem Ipsum is simply dummy text"),
                array("Lorem Ipsum is simply dummy text ", "Lorem Ipsum is simply dummy text ", "Lorem Ipsum is simply dummy text"),
                array("Lorem Ipsum is simply dummy text ", "Lorem Ipsum is simply dummy text ", "Lorem Ipsum is simply dummy text"),
                array("Lorem Ipsum is simply dummy text ", "Lorem Ipsum is simply dummy text ", "Lorem Ipsum is simply dummy text")
            );

            for ($vw_sports_tab_index = 1; $vw_sports_tab_index <= 7; $vw_sports_tab_index++) {
                $theme_mod_key = 'vw_sports_services_text' . $vw_sports_tab_index;
                $theme_mod_value = $vw_sports_tab_text_array[$vw_sports_tab_index - 1];
                set_theme_mod($theme_mod_key, $theme_mod_value);

                // Set the category for this tab
                $current_category = $vw_sports_category_names[$vw_sports_tab_index - 1];
                set_theme_mod('vw_sports_services_category' . $vw_sports_tab_index, $current_category);

                // Create or retrieve the post category term ID
                $vw_sports_term = term_exists($current_category, 'category');
                if ($vw_sports_term === 0 || $vw_sports_term === null) {
                    // If the term does not exist, create it
                    $vw_sports_term = wp_insert_term($current_category, 'category');
                }
                if (is_wp_error($vw_sports_term)) {
                    error_log('Error creating category: ' . $vw_sports_term->get_error_message());
                    continue; // Skip to the next iteration if category creation fails
                }

                for ($vw_sports_i = 0; $vw_sports_i < 3; $vw_sports_i++) {
                    // Create post content
                    $vw_sports_title = $vw_sports_title_array[$vw_sports_tab_index - 1][$vw_sports_i];
                    $vw_sports_content = 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.';

                    // Create post object
                    $vw_sports_my_post = array(
                        'post_title'    => wp_strip_all_tags($vw_sports_title),
                        'post_content'  => $vw_sports_content,
                        'post_status'   => 'publish',
                        'post_type'     => 'post', // Post type set to 'post'
                    );

                    // Insert the post into the database
                    $vw_sports_post_id = wp_insert_post($vw_sports_my_post);

                    if (is_wp_error($vw_sports_post_id)) {
                        error_log('Error creating post: ' . $vw_sports_post_id->get_error_message());
                        continue; // Skip to the next post if creation fails
                    }

                    // Assign the category to the post
                    wp_set_post_categories($vw_sports_post_id, array((int)$vw_sports_term['term_id']));

                    // Handle the featured image using media_sideload_image
                    $vw_sports_image_url = get_template_directory_uri() . '/assets/images/game' . ($vw_sports_i + 1) . '.png';
                    $vw_sports_image_id = media_sideload_image($vw_sports_image_url, $vw_sports_post_id, null, 'id');

                    if (is_wp_error($vw_sports_image_id)) {
                        error_log('Error downloading image: ' . $vw_sports_image_id->get_error_message());
                        continue; // Skip to the next post if image download fails
                    }

                    // Assign featured image to post
                    set_post_thumbnail($vw_sports_post_id, $vw_sports_image_id);
                }
            }    

            // Offer Section//
            set_theme_mod( 'vw_sports_offer_small_text', 'Offers' ); 
            set_theme_mod( 'vw_sports_offer_heading', 'Exclusive Deals on Home Automation Systems' ); 
            set_theme_mod( 'vw_sports_offer_title', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.' );
            set_theme_mod( 'vw_sports_product_clock_timer_end', 'November 3 2024 11:00:00' );
            set_theme_mod( 'vw_sports_shop_button_text', 'Shop Now' );
            set_theme_mod( 'vw_sports_shop_btn_link', '#' );
            set_theme_mod( 'vw_sports_shop_count', '100' );
            set_theme_mod( 'vw_sports_per_count', '%' );
            set_theme_mod( 'vw_sports_off_count', 'Off' );
            set_theme_mod( 'vw_sports_offer_image', get_template_directory_uri().'/assets/images/seller-img.png' ); 
            set_theme_mod( 'vw_sports_offer_small_text1', 'Offers' );
            set_theme_mod( 'vw_sports_offer_heading1', 'Exclusive Deals on Home Automation Systems' );
            set_theme_mod( 'vw_sports_offer_title1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.' );
            set_theme_mod( 'vw_sports_shop_button_text1', 'Shop Now' );
            set_theme_mod( 'vw_sports_shop_btn_link1', '#' );
            set_theme_mod( 'vw_sports_offer_image1', get_template_directory_uri().'/assets/images/camera.png' ); 

            //Copyright Text
            set_theme_mod( 'vw_sports_footer_text', 'By VWThemes' );  
     
        }
    ?>
  
	
    <form action="<?php echo esc_url(home_url()); ?>/wp-admin/themes.php?page=vw_sports_guide" method="POST" onsubmit="return validate(this);">
        <?php if (!get_option('vw_sports_demo_import_completed')) : ?>
            <form method="post">
                <p class="run-import-text"><?php esc_html_e('Click On The Below Run Importer Button To Import Demo Content Of VW Sports','vw-sports'); ?></p>
                <p><?php esc_html_e('Please back up your website if it’s already live with data. This importer will overwrite your existing settings with the new customizer values for VW Sports .','vw-sports'); ?></p>
                <input class= "run-import" type="submit" name="submit" value="<?php esc_attr_e('Run Importer','vw-sports'); ?>" class="button button-primary button-large">
            </form>
        <?php endif; ?>
    </form>
	<script type="text/javascript">
		function validate(valid) {
			 if(confirm("Do you really want to import the theme demo content?")){
                // Show loader
                document.getElementById('demo-import-loader').style.display = 'block';
                // Submit form
			    document.forms[0].submit();
			}
		    else {
			    return false;
		    }
		}
	</script>
</div>


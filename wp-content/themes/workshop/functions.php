<?php
/**
*   Works in WordPress 4.1 or later.
*/
if ( version_compare( $GLOBALS['wp_version'], '4.1-alpha', '<' ) ) {
    require get_template_directory() . '/inc/back-compat.php';
}

/**
 * Enqueue scripts and styles the correct way
 */

function workshop_scripts() {
	wp_enqueue_style( 'workshop-style', get_stylesheet_uri() );
    
    if (!is_admin() && $GLOBALS['pagenow'] != 'wp-login.php') {
        // comment out the next two lines to load the local copy of jQuery
        wp_deregister_script('jquery');
        wp_register_script('jquery', '//ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.4.min.js', false, '2.1.4');
        wp_enqueue_script('jquery');
    }

    wp_register_script('jquery-ui', '//ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js', false, '1.11.1');
    wp_enqueue_script('jquery-ui');

	//wp_enqueue_script( 'workshop-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	//wp_enqueue_script( 'workshop-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

}
add_action( 'wp_enqueue_scripts', 'workshop_scripts' );

// Remove Crap in head
remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
remove_action( 'wp_head', 'feed_links_extra', 3 ); // Display the links to the extra feeds such as category feeds
remove_action( 'wp_head', 'feed_links', 2 ); // Display the links to the general feeds: Post and Comment Feed
remove_action( 'wp_head', 'rsd_link' ); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action( 'wp_head', 'wlwmanifest_link' ); // Display the link to the Windows Live Writer manifest file.
remove_action( 'wp_head', 'index_rel_link' ); // index link
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); // prev link
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); // start link
remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 ); // Display relational links for the posts adjacent to the current post.
remove_action( 'wp_head', 'wp_generator' ); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 ); // Get rid of adjacent posts
remove_action( 'wp_head', 'rel_canonical'); // Remove Canonical
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action('rest_api_init', 'wp_oembed_register_route'); // Remove the REST API endpoint.
remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10); // Turn off oEmbed auto discovery. // Don't filter oEmbed results.
remove_action('wp_head', 'wp_oembed_add_discovery_links'); // Remove oEmbed discovery links.
remove_action('wp_head', 'wp_oembed_add_host_js'); // Remove oEmbed-specific JavaScript from the front-end and back-end.

// Clean up admin
function my_admin_cleanup() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
    $wp_admin_bar->remove_menu('new-post');
}
add_action( 'wp_before_admin_cleanup', 'my_admin_cleanup' );

function menu_removal () { 
   remove_menu_page('edit.php');
   remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'menu_removal');

add_action( 'init', 'tryles_sliders' );

function tryles_sliders() {
    register_post_type( 'workshop_sliders',
        array(
            'labels' => array(
                'name' => 'Sliders',
                'singular_name' => 'Slider',
                'add_new' => 'Add New Slider',
                'add_new_item' => 'Add New Slider',
                'edit' => 'Edit',
                'edit_item' => 'Edit Slider',
                'new_item' => 'New Slider',
                'view' => 'View',
                'view_item' => 'View Slider',
                'search_items' => 'Search Sliders',
                'not_found' => 'No Sliders found',
                'not_found_in_trash' => 'No Sliders found in Trash',
                'parent' => 'Parent Slider'
            ),
 
            'public' => true,
            'menu_position' => 5,
            'rewrite' => array( 'slug' => 'sliders' ),
            'supports' => array( 'title'),
            // 'taxonomies' => array( '' ),
            'menu_icon' => 'dashicons-images-alt2',
            'has_archive' => true
        )
    );
}

// SLIDER SHORTCODE
function slider_func( $atts, $content = null ){
    $a = shortcode_atts( array(
        'slider_name' => 'My Title',
    ), $atts );
    
    $search = esc_attr($a['slider_name']);
    
    $slider = "";
    $args = array( 'post_type' => 'workshop_sliders', 'name' => $search );
    $the_query = new WP_Query( $args ); 
    
        if ( $the_query->have_posts() ) {
            while ( $the_query->have_posts() ) {
            $the_query->the_post();
            
            $slider_content = get_field('slider_content');
            
            $slider .= '<div class="workshop-slider gallery js-flickity" data-flickity-options=\'{ "pageDots": false, "wrapAround": true, "freeScroll": true, "autoPlay": true, "imagesLoaded": true }\'>';
                foreach($slider_content as $slide) {
                    
                    $slider .=  '<img src="' . $slide['image'] . '" alt=""/>';
                    
                }
            $slider .= '</div>';
            
            wp_reset_postdata();
            }
        } else {
            echo 'Sorry, there was an error, please check if you are using the correct slider title.';
        }

    return $slider;
}
add_shortcode( 'slider', 'slider_func' );
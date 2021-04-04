
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'start_post_rel_link', 10, 0); 
remove_action('wp_head', 'parent_post_rel_link', 10, 0); 
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); 
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
remove_action( 'wp_head', 'wp_resource_hints', 2 );
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
remove_action ('template_redirect', 'wp_shortlink_header', 11, 0);
remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
remove_action('wp_head', 'noindex', 1);
remove_action('welcome_panel', 'wp_welcome_panel');
remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);
  remove_filter('pre_oembed_result', 'wp_filter_pre_oembed_result', 10);
 add_filter('embed_oembed_discover', '__return_false');
remove_action( 'wp_head', 'wp_oembed_add_host_js');


add_action( 'wp_dashboard_setup', function()
{
    remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_primary', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
    remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
    remove_meta_box( 'dashboard_browser_nag', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
    remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
} );
function cry_clean_header_hook(){
	wp_deregister_script( 'comment-reply' );
         }
add_action('init','cry_clean_header_hook');
function speed_stop_loading_wp_embed() {
    if (!is_admin()) {
        wp_deregister_script('wp-embed');
    }
}
add_action('init', 'speed_stop_loading_wp_embed');
// Disable Self Pingback
function disable_pingback( &$links ) {
  foreach ( $links as $l => $link )
        if ( 0 === strpos( $link, get_option( 'home' ) ) )
            unset($links[$l]);
}

add_action( 'pre_ping', 'disable_pingback' );
function disable_emojis() {
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    
}
add_action( 'init', 'disable_emojis' );
add_action( 'init', 'stop_heartbeat', 1 );
    function stop_heartbeat() {
    wp_deregister_script('heartbeat');
}

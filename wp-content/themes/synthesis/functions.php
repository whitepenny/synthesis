<?php

update_option( 'siteurl', 'https://truesynthesis.wpengine.com' );
update_option( 'home', 'https://truesynthesis.wpengine.com' );

function sr_scripts_and_styles() {

  global $wp_styles; // call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way

  if (!is_admin()) {


    wp_register_style( 'sr-stylesheet', get_stylesheet_directory_uri() . '/dist/style.css', array(), '', 'all' );
    wp_register_script( 'sr-modernizr', get_stylesheet_directory_uri() . '/dist/modernizr.custom.js', 'screen' );
    // wp_register_script( 'sr-js', get_stylesheet_directory_uri() . '/dist/main.min.js', array( 'jquery' ), '', true );
    wp_enqueue_script( 'sr-modernizr' );
    wp_enqueue_script( 'jquery' );
    // wp_enqueue_script( 'sr-js' );
    wp_enqueue_style( 'sr-stylesheet' );

  }
}

function sr_head_cleanup() {

  remove_action( 'wp_head', 'rsd_link' );
  // windows live writer
  remove_action( 'wp_head', 'wlwmanifest_link' );
  // index link
  remove_action( 'wp_head', 'index_rel_link' );
  // previous link
  remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
  // start link
  remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
  // links for adjacent posts
  remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
  // WP version
  remove_action( 'wp_head', 'wp_generator' );
  // remove WP version from css

} 


function sr_ahoy() {

  add_editor_style();

  add_action( 'init', 'sr_head_cleanup' );

  add_theme_support('post-thumbnails');

  add_action( 'widgets_init', 'sr_register_sidebars' );

  add_action( 'wp_enqueue_scripts', 'sr_scripts_and_styles');

  register_nav_menus(
    array(
      'footer-links' => __( 'Footer Links', 'sr' ), 
      'main-nav' => __( 'Main Nav', 'sr' ),
      'sidebar-nav' => __( 'Sidebar Nav', 'sr' ),
      'footer-quick' => __( 'Footer Quick', 'sr' ),
      'mobile-nav' => __( 'Mobile Nav', 'sr' ),
      'support-nav' => __( 'Support Nav', 'sr' ),
    )
  );


} 

// let's get this party started
add_action( 'after_setup_theme', 'sr_ahoy' );


/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'sr-thumb-600', 600, 620, true );
add_image_size( 'sr-thumb-300', 300, 100, true );
add_image_size( 'sr-thumb-project', 600, 620, true);
add_image_size('sr-overview', 340, 175, true);
add_image_size( 'sr-member-overview', 400, 500, true );
add_image_size('sr-member', 400, 400, true);
add_image_size('sr-news-thumb', 150, 75, true);
add_image_size( 'sr-single-news', 950, 650, true );



add_filter( 'image_size_names_choose', 'sr_custom_image_sizes' );

function sr_custom_image_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'sr-thumb-600' => __('600px by 150px'),
        'sr-thumb-300' => __('300px by 100px'),
        'sr-thumb-project' => __('600px by 620px'),
        'sr-overview' => __('340px by 175'),
        'sr-member-overview' => __('400px by 500px'),
        'sr-member' => __('400px by 400px'),
        'sr-news-thumb' => ('150px by 75px'),
        'sr-single-news' => ('950px by 650px')
    ) );
}


function sr_register_sidebars() {
    register_sidebar(array(
        'id' => 'sidebar1',
        'name' => __( 'Sidebar 1', 'sr' ),
        'description' => __( 'The first (primary) sidebar.', 'sr' ),
    'before_widget' => '',
    'after_widget' => '',
    ));

  register_sidebar(array(
    'id' => 'sidebar2',
    'name' => __( 'Program Sidebar', 'sr' ),
    'description' => __( 'Sidebar for Single Program Pages.', 'sr' ),
    'before_widget' => '',
    'after_widget' => '',
  ));

    register_sidebar(array(
      'id' => 'sidebar3',
      'name' => __( 'Post Sidebar', 'sr' ),
      'description' => __( 'Sidebar for Single Post Pages.', 'sr' ),
      'before_widget' => '',
      'after_widget' => '',
    ));


}

// add_filter('the_content', 'filter_ptags_on_images');

// function filter_ptags_on_images($content){
//    return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
// }

add_filter( 'wp_title', 'sr_wp_title_for_home' );
function sr_wp_title_for_home( $title )
{
  if( empty( $title ) && ( is_home() || is_front_page() ) ) {
    return get_bloginfo('title') . ' | ' . get_bloginfo( 'description' );
  }
  return $title . ' | ' . get_bloginfo('title') . ' | ' . get_bloginfo( 'description' );
}


function sr_one_half($atts, $content = null) {
  return '<div class="one-half">' . do_shortcode( $content ) . '</div>';
}
add_shortcode( 'one_half', 'sr_one_half' );


function custom_excerpt_length( $length ) {
  return 30;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );



define('WPLS_DISABLE_STYLE', true);


function my_acf_init() {
  
  acf_update_setting('google_api_key', 'AIzaSyC897voH1gAtj9ll0aF6HiDCQ0nH1W1MJI');
}

add_action('acf/init', 'my_acf_init');

function hex2rgb($hex) {
$hex = str_replace("#", "", $hex);

if(strlen($hex) == 3) {
$r = hexdec(substr($hex,0,1).substr($hex,0,1));
$g = hexdec(substr($hex,1,1).substr($hex,1,1));
$b = hexdec(substr($hex,2,1).substr($hex,2,1));
} else {
$r = hexdec(substr($hex,0,2));
$g = hexdec(substr($hex,2,2));
$b = hexdec(substr($hex,4,2));
}
$rgb = array($r, $g, $b);

return $rgb; // returns an array with the rgb values
}

function sort_posts( $posts, $orderby, $order = 'ASC', $unique = true ) {
  if ( ! is_array( $posts ) ) {
    return false;
  }
  
  usort( $posts, array( new Sort_Posts( $orderby, $order ), 'sort' ) );
  
  // use post ids as the array keys
  if ( $unique && count( $posts ) ) {
    $posts = array_combine( wp_list_pluck( $posts, 'ID' ), $posts );
  }
  
  return $posts;
}
class Sort_Posts {
  var $order, $orderby;
  
  function __construct( $orderby, $order ) {
    $this->orderby = $orderby;
    $this->order = ( 'desc' == strtolower( $order ) ) ? 'DESC' : 'ASC';
  }
  
  function sort( $a, $b ) {
    if ( $a->{$this->orderby} == $b->{$this->orderby} ) {
      return 0;
    }
    
    if ( $a->{$this->orderby} < $b->{$this->orderby} ) {
      return ( 'ASC' == $this->order ) ? -1 : 1;
    } else {
      return ( 'ASC' == $this->order ) ? 1 : -1;
    }
  }
}

add_action('pre_get_posts', 'program_order');

function program_order($query) {
  if (is_tax('program_location')) {
     
        $query->set('orderby', 'post_title');
        $query->set('order', 'ASC');
  }
}

function get_id_by_slug($page_slug) {
  $page = get_page_by_path($page_slug);
  if ($page) {
    return $page->ID;
  } else {
    return null;
  }
}

function sr_trim_excerpt( $text='' )
{
    $text = strip_shortcodes( $text );
    $text = apply_filters('the_content', $text);
    $text = str_replace(']]>', ']]&gt;', $text);
    $excerpt_length = apply_filters('excerpt_length', 20);
    $excerpt_more = apply_filters('excerpt_more', ' ' . '...');
    return wp_trim_words( $text, $excerpt_length, $excerpt_more );
}
add_filter('wp_trim_excerpt', 'sr_trim_excerpt');

function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');


<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package resources
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function resources_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'resources_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function resources_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'resources_pingback_header' );

// Allow SVG
add_filter('wp_check_filetype_and_ext', function ($data, $file, $filename, $mimes) {

	global $wp_version;
	if ($wp_version !== '4.7.1') {
		return $data;
	}

	$filetype = wp_check_filetype($filename, $mimes);

	return [
		'ext'             => $filetype['ext'],
		'type'            => $filetype['type'],
		'proper_filename' => $data['proper_filename']
	];
}, 10, 4);

function cc_mime_types($mimes)
{
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

function fix_svg()
{
	echo '<style type="text/css">
        .attachment-266x266, .thumbnail img {
             width: 100% !important;
             height: auto !important;
        }
        </style>';
}
add_action('admin_head', 'fix_svg');

/* ACF Options */
if (function_exists('acf_add_options_page')) {

	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}


//Adding Custom Post Types
add_action('init', 'codex_posts_init');

function codex_posts_init()

{

  //Adding custom post type Helpdesk Blog Post

  $labels = array(

    'name'               => _x('Help Post', 'post type general name'),

    'singular_name'      => _x('Help Post', 'post type singular name'),

    'menu_name'          => _x('Help Post', 'admin menu'),

    'name_admin_bar'     => _x('Help Post', 'add new on admin bar'),

    'add_new'            => _x('Add New', 'Help Post'),

    'add_new_item'       => __('Add New Help Post'),

    'new_item'           => __('New Help Post'),

    'edit_item'          => __('Edit Help Post'),

    'view_item'          => __('View Help Post'),

    'all_items'          => __('All Help Post'),

    'search_items'       => __('Search Help Post'),

    'parent_item_colon'  => __('Parent Help Post:'),

    'not_found'          => __('No Help Post found.'),

    'not_found_in_trash' => __('No Help Post found in Trash.')

  );

  $args = array(

    'labels'             => $labels,

    'description'        => __('Description.'),

    'menu_icon'          => 'dashicons-admin-users',

    'public'             => true,

    'publicly_queryable' => true,

    'show_ui'            => true,

    'show_in_menu'       => true,

    'show_in_nav_menus'  => false,

    'query_var'          => true,

    'capability_type'    => 'post',

    'has_archive'        => true,

    'hierarchical'       => false,

    'menu_position'      => null,

    'supports'           => array('title', 'editor','thumbnail')

  );

  register_post_type('help', $args);

}

// Register Taxonomy Department and Location

add_action('init', 'register_custom_taxonomy', 0);

function register_custom_taxonomy()

{

  $args = [

    'hierarchical' => true,

    'labels' => [

      'name' => _x('HD Category', 'taxonomy general name', 'resources'),

      'singular_name' => _x('HD Category', 'taxonomy singular name', 'resources'),

      'search_items' => __('Search HD Category', 'resources'),

      'all_items' => __('All HD Category', 'resources'),

      'parent_item' => __('Parent HD Category', 'resources'),

      'parent_item_colon' => __('Parent Category:', 'resources'),

      'edit_item' => __('Edit Category', 'resources'),

      'update_item' => __('Update HD Category', 'resources'),

      'add_new_item' => __('Add New HD Category', 'resources'),

      'new_item_name' => __('New HD Category Name', 'resources'),

      'menu_name' => __('HD Category', 'resources'),

    ],

    'show_ui' => true,

    'show_admin_column' => true,

    'query_var' => true,

    'publicly_queryable' => true,

    'rewrite' => array('slug' => 'hd_category'),

    'show_in_rest' => true,

  ];

  register_taxonomy('hd-category', array('help'), $args);



  $args = [

    'hierarchical' => true,

    'labels' => [

      'name' => _x('HD Tags', 'taxonomy general name', 'resources'),

      'singular_name' => _x('Tags', 'taxonomy singular name', 'resources'),

      'search_items' => __('Search Tags', 'resources'),

      'all_items' => __('All Tags', 'resources'),

      'parent_item' => __('Parent Tags', 'resources'),

      'parent_item_colon' => __('Parent Tags:', 'resources'),

      'edit_item' => __('Edit Tags', 'resources'),

      'update_item' => __('Update Tags', 'resources'),

      'add_new_item' => __('Add New Tags', 'resources'),

      'new_item_name' => __('New Tags Name', 'resources'),

      'menu_name' => __('HD Tags', 'resources'),

    ],

    'show_ui' => true,

    'show_admin_column' => true,

    'query_var' => true,

    'publicly_queryable' => false,

    'rewrite' => array('slug' => 'hd_tags'),

    'show_in_rest' => true,

  ];

  register_taxonomy('hd_tags', array('help'), $args);

}

//Creating a Custom Post Type Active VS Independent Agency
function custom_post_type() {  
  //Inserting Custom Post Type Agencies for Comparison
  $agency_labels = array(
    'name'               => _x('Agency', 'post type general name'),
    'singular_name'      => _x('Agency', 'post type singular name'),
    'menu_name'          => _x('Agency', 'admin menu'),
    'name_admin_bar'     => _x('Agency', 'add new on admin bar'),
    'add_new'            => _x('Add New', 'Agency'),
    'add_new_item'       => __('Add New Agency'),
    'new_item'           => __('New Agency'),
    'edit_item'          => __('Edit Agency'),
    'view_item'          => __('View Agency'),
    'all_items'          => __('All Agency'),
    'search_items'       => __('Search Agency'),
    'parent_item_colon'  => __('Parent Agency:'),
    'not_found'          => __('No Agency found.'),
    'not_found_in_trash' => __('No Agency found in Trash.')
  );

  $agency_args = array(
    'labels'             => $agency_labels,
    'description'        => __('Description.'),
    'menu_icon'          => 'dashicons-building',
    'rewrite'            => true,
    'public'             => true,
    'publicly_queryable' => false,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'show_in_nav_menus'  => false,
    'query_var'          => true,
    'capability_type'    => 'post',
    'has_archive'        => false,
    'hierarchical'       => true,    
    'menu_position'      => 5,
    'supports'           => array('title'),
  );
  register_post_type('agency', $agency_args); 

  //Inserting Custom Post Type for Captive Vs Independent Comparison
  $cap_ind_labels = array(
    'name'               => _x('Captive vs Independent Agency', 'post type general name'),
    'singular_name'      => _x('Captive vs Independent Agency', 'post type singular name'),
    'menu_name'          => _x('Captive vs Independent Agency', 'admin menu'),
    'name_admin_bar'     => _x('Captive vs Independent Agency', 'add new on admin bar'),
    'add_new'            => _x('Add New', 'Captive vs Independent Agency'),
    'add_new_item'       => __('Add New Captive vs Independent Agency'),
    'new_item'           => __('New Captive vs Independent Agency'),
    'edit_item'          => __('Edit Captive vs Independent Agency'),
    'view_item'          => __('View Captive vs Independent Agency'),
    'all_items'          => __('All Captive vs Independent Agency'),
    'search_items'       => __('Search Captive vs Independent Agency'),
    'parent_item_colon'  => __('Parent Captive vs Independent Agency:'),
    'not_found'          => __('No Captive vs Independent Agency found.'),
    'not_found_in_trash' => __('No Captive vs Independent Agency found in Trash.')
  );

  $cap_ind_args = array(
    'labels'             => $cap_ind_labels,
    'description'        => __('Description.'),
    'menu_icon'          => 'dashicons-admin-multisite',
    'rewrite'            => true,
    'public'             => true,
    'publicly_queryable' => false,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'show_in_nav_menus'  => false,
    'query_var'          => true,
    'capability_type'    => 'post',
    'has_archive'        => false,
    'hierarchical'       => true,    
    'menu_position'      => 4,
    'supports'           => array('title'),
  );
  register_post_type('capvin-agency', $cap_ind_args); 

  //Registering Taxonomy for Agencies
  $args = [
    'hierarchical' => true,
    'labels' => [
      'name' => _x('Agency Category', 'taxonomy general name', 'resources'),
      'singular_name' => _x('Agency Category', 'taxonomy singular name', 'resources'),
      'search_items' => __('Search Agency Category', 'resources'),
      'all_items' => __('All Agency Category', 'resources'),
      'parent_item' => __('Parent  Agency Category', 'resources'),
      'parent_item_colon' => __('Parent  Agency Category:', 'resources'),
      'edit_item' => __('Edit Agency Category', 'resources'),
      'update_item' => __('Update Agency Category', 'resources'),
      'add_new_item' => __('Add New Agency Category', 'resources'),
      'new_item_name' => __('New Agency Category Name', 'resources'),
      'menu_name' => __('Agency Category', 'resources'),
    ],

    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'publicly_queryable' => false,
    'rewrite' => array('slug' => 'agency_categories'),
    'show_in_rest' => true,
  ];

  register_taxonomy('agency_categories', array('agency','capvin-agency'), $args);

}  
add_action( 'init', 'custom_post_type', 0 );
<?php
/**
 * resources functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package resources
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function resources_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on resources, use a find and replace
		* to change 'resources' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'resources', get_template_directory() . '/languages' );

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

	// This theme uses wp_nav_menu() in one location.	
	register_nav_menus(

		array(

			//'header_menu' => __('Header Menu', 'resources'),

			'footer_1'  => __('Footer Menu 1', 'resources'),

			'footer_2'  => __('Footer Menu 2', 'resources'),

			'footer_3'  => __('Footer Menu 3', 'resources'),

			'footer_4'  => __('Footer Menu 4', 'resources'),

			'footer_5'  => __('Footer Menu 5', 'resources'),

		)

	);


	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			//'comment-form',
			//'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'resources_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'resources_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function resources_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'resources_content_width', 640 );
}
add_action( 'after_setup_theme', 'resources_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function resources_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'resources' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'resources' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'resources_widgets_init' );

// Replacing Default jquery.min.js
add_action('init', 'modify_jquery');
function modify_jquery() {
    if (!is_admin()) {
        wp_deregister_script('jquery');
        wp_register_script('jquery', get_template_directory_uri().'/js/vendor/jquery-3.6.0.js', array(), _S_VERSION, false);
        wp_enqueue_script('jquery');
    }
}
/**
 * Enqueue scripts and styles.
 */
function resources_scripts() {

	// CSS enqueue
	wp_enqueue_style( 'resources-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'resources-style', 'rtl', 'replace' );

	wp_register_style('ah-custom-style', get_template_directory_uri() . '/css/style.css', array(), _S_VERSION );
	wp_enqueue_style('ah-custom-style');

	wp_register_style('vendor-bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css', array(), _S_VERSION);
	wp_enqueue_style('vendor-bootstrap-css');



	// JS enqueue
	wp_register_script('bootstrap-js', get_template_directory_uri() . '/js/vendor/bootstrap.min.js', array('jquery'), _S_VERSION, true);
    wp_enqueue_script('bootstrap-js');    

	wp_register_script('helpdesk-main-js', get_template_directory_uri() . '/js/helpdesk-main.js', array('jquery','bootstrap-js'), _S_VERSION, true);
    wp_enqueue_script('helpdesk-main-js');

	wp_enqueue_script( 'resources-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	
	wp_enqueue_script( 'ajax-call-script', get_template_directory_uri() . '/js/helpdesk-search.js', array(), _S_VERSION, true );
    wp_localize_script( 'ajax-call-script', 'myAjax',  array( 'ajaxUrl' => admin_url( 'admin-ajax.php' ) ) );


    wp_localize_script( 'helpdesk-main-js', 'ajax_object',  array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );


    /*Compare JS*/
    $url = admin_url('admin-ajax.php');
	wp_enqueue_script('compare-keyup-search', get_template_directory_uri() . '/js/compare-keyup-search.js', true, '1.9.1');
	wp_localize_script('compare-keyup-search', 'urls', array($url));
    wp_enqueue_script('match-js', get_template_directory_uri() . '/js/vendor/match-height.js', array('jquery'), _S_VERSION, true);
    wp_enqueue_script('compare-main-js', get_template_directory_uri() . '/js/compare-main.js', array('jquery'), _S_VERSION, true);


    


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'resources_scripts' );


// Disable Gutenberg Editor on the back end.
add_filter( 'use_block_editor_for_post', '__return_false' );

// Disable Gutenberg Editor for widgets.
add_filter( 'use_widgets_block_editor', '__return_false' );

add_action( 'wp_enqueue_scripts', function() {
    // Remove CSS on the front end.
    wp_dequeue_style( 'wp-block-library' );

    // Remove Gutenberg theme.
    wp_dequeue_style( 'wp-block-library-theme' );

    // Remove inline global CSS on the front end.
    wp_dequeue_style( 'global-styles' );
}, 20 );



/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Compare AJAX Functions.
 */
require get_template_directory() . '/inc/compare-ajax-functions.php';

if (!is_admin()) {
	function search_filter_posts($query) {
	    if ($query->is_search) {
	  $query->set('post_type', 'help');
	}
	  return $query;
	}
  add_filter('pre_get_posts','search_filter_posts');
}


add_action('wp_ajax_ajax_search', 'ajax_search');
add_action('wp_ajax_nopriv_ajax_search', 'ajax_search');

function ajax_search() {
	//echo $_POST['searchParam'];	
	$args = array(
	  's'         => trim($_POST['searchParam']),
	  'post_type' => 'help',
	  'posts_per_page' => -1
	);

	// array to keep results
    $results = array();
    $description = "";

    // make a query 
    $query = new WP_Query( $args );
    //echo "Last SQL-Query: {$query->request}";

    
    // save results
    // formatted with the title as 'label' for the autocomplete script 
    if ( $query->have_posts() ) { ?>
    	<ul><?php
	        while ( $query->have_posts() ) {
	          $query->the_post();

	          $excerpt = get_the_excerpt();	          
	          /*$results[] = array(
	              'label'       => esc_html( get_the_title() ),    // title
	              'description' => esc_html( $description ),
	              'link'        => get_permalink(),                // link
	              'id'          => get_the_ID(),                   // id
	  
	          );*/
	        ?>
	        	 <li><a href="<?php echo get_permalink();?>"><span><?php echo esc_html( get_the_title() );?></span><br><span><?php echo esc_html( $excerpt );?></span></a></li>
	        <?php
	        }?>
	       

	    </ul><?php
    }
    //echo json_encode($results);

 
    wp_die();
}



add_action( 'wp_ajax_nopriv_load-filter', 'showPostOnAjaxCall' );
add_action( 'wp_ajax_load-filter', 'showPostOnAjaxCall' );
//Category on click show post.
function showPostOnAjaxCall(){
	$args = array( 
	        	'posts_per_page'   => 3, 
	        	'post_type' => 'help',
	        	'post_status'  => 'publish',
	        	'tax_query' => array(
			          array(
			              'taxonomy' => 'hd-category',
			              'field' => 'term_id',
			              'terms' => $_POST[ 'catID' ],
			          )
	    		)
	    	);

	//$args = array( 'posts_per_page'   => 3, 'post_type' => 'post', 'category' => $_POST[ 'catID' ], 'post_status'  => 'publish');
	$postsList = get_posts( $args ); 
    if ( $postsList ) { 
    	foreach ($postsList as $posts) { 
    		$excerpt = get_the_excerpt($posts->ID);	
    		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $posts->ID ), 'post-thumbnails' );
    	?>
	    	<div class="col-md-4">
	            <div class="item-wrapper">
	               <?php if($image[0] != '') { ?>
						<img class="svg" src="<?php echo $image[0]; ?>" alt="<?php echo $posts->post_title;?>">
					<?php } else { ?>
						<img class="svg" src="<?php echo get_template_directory_uri(); ?>/images/placeholder-image.jpg" alt="AH default image">
						
					<?php } ?>
	                <div class="text-wrap">
	                    <h3><?php echo $posts->post_title;?></h3>
	                    <p><?php echo esc_html( $excerpt );?></p>
	                    <a href="<?php echo get_the_permalink($posts->ID); ?>">Read more<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/red-arrow.svg" alt=""></a>
	                </div>
	            </div><!-- item-wrapper -->
	        </div><!-- col-md-4 -->
    	<?php
		} wp_reset_postdata();
    } else { ?>
    	<div class="col-md-12"> No Post Found.</div>
    <?php }
    wp_die();
}

//Move the count column before the Tags Coulmn in Post List in Admin
add_filter('manage_help_posts_columns', 'hdpost_columns_order');
function hdpost_columns_order($columns) {
	$n_columns = array();
	$move = 'click_counter'; // what to move
	$move_sec = 'dislike_click_counter';
	$before = 'hd_tags'; // move before this
	foreach($columns as $key => $value) {
		if ($key==$before){
			$n_columns[$move] = $move;
			$n_columns[$move_sec] = $move_sec;
		}
		$n_columns[$key] = $value;
	}
	return $n_columns;
}

// load and localize custom scripts for post count like and dislike
add_action( 'wp_enqueue_scripts', 'ajax_counter_link_enqueue_scripts' );
function ajax_counter_link_enqueue_scripts() {
 
    //wp_enqueue_script( 'counter-link', get_theme_file_uri( '/js/link-counter.js' ), array('jquery'), '1.0', true );

    wp_enqueue_script( 'like-count-script', get_template_directory_uri() . '/js/helpdesk-count.js', array(), _S_VERSION, true );
   // wp_localize_script( 'like-count-script', 'ajaxCount',  array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
     
    wp_localize_script( 'like-count-script', 'ajaxCount', array(
        'ajax_url' => admin_url( 'admin-ajax.php' ),
        'ajax_nonce' => wp_create_nonce( 'link_click_counter_' . admin_url( 'admin-ajax.php' ) ),
    ));
 
}

add_action('wp_ajax_increment-counter', 'like_increment_counter');   
add_action('wp_ajax_nopriv_increment-counter', 'like_increment_counter');

function like_increment_counter() {
 
    // get current value of counter custom field
    $current_count = get_post_meta( $_POST['postID'], '_clickCount', true );
 
    // increment the counter value by 1
    $current_count++;
 
    if ( defined( 'DOING_AJAX' ) && DOING_AJAX && wp_verify_nonce( $_POST['nonce'], 'link_click_counter_' . admin_url( 'admin-ajax.php' ) ) ) {
 
        update_post_meta( $_POST['postID'], '_clickCount', $current_count );
      
        $cookie_name = "likeClass"."&".$_POST['postID'];
	    $cookie_value = $_POST['postID']."&"."clicked-like";
	    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
    
	    if (isset($_COOKIE['dislikeClass'."&".$_POST['postID']])) {
			unset($_COOKIE['dislikeClass'."&".$_POST['postID']]);
			setcookie('dislikeClass'."&".$_POST['postID'], '', time() - 3600, '/'); 		    
		}
        echo "like";

        die();
 
    } else {
 
        die( 'Security check failed' );
 
    }
}

add_action('wp_ajax_decrement-counter', 'dislike_decrement_counter');   
add_action('wp_ajax_nopriv_decrement-counter', 'dislike_decrement_counter');

function dislike_decrement_counter() {
 
    // get current value of counter custom field
    $current_count = get_post_meta( $_POST['postID'], '_dislikeClickCount', true );
 
    // decrement the counter value by 1
    $current_count++;
 
    if ( defined( 'DOING_AJAX' ) && DOING_AJAX && wp_verify_nonce( $_POST['nonce'], 'link_click_counter_' . admin_url( 'admin-ajax.php' ) ) ) {
 
        update_post_meta( $_POST['postID'], '_dislikeClickCount', $current_count );
        $cookie_name = 'dislikeClass'."&".$_POST['postID']; 
        $cookie_value = $_POST['postID']."&"."clicked-unlike";
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
        
        if (isset($_COOKIE['likeClass'."&".$_POST['postID']])) {
			unset($_COOKIE['likeClass'."&".$_POST['postID']]);
			setcookie('likeClass'."&".$_POST['postID'], '', time() - 3600, '/'); // empty value and old timestamp		
 		}
 		
        echo "dislike";
 
        die();
 
    } else {
 
        die( 'Security check failed' );
 
    }
}


//Display Count in the admin
add_filter('manage_help_posts_columns', function($columns) {
	return array_merge($columns, ['click_counter' => __('Like', 'textdomain')]);
});
 
add_action('manage_help_posts_custom_column', function($column_key, $post_id) {
	if ($column_key == 'click_counter') {
		$like = get_post_meta($post_id, '_clickCount', true);
		if($like > 0){
			echo $like;
		} else {
			echo "0";
		}
	}
}, 10, 2);

add_filter('manage_help_posts_columns', function($columns) {
	return array_merge($columns, ['dislike_click_counter' => __('Dislike', 'textdomain')]);
});
 
add_action('manage_help_posts_custom_column', function($column_key, $post_id) {
	if ($column_key == 'dislike_click_counter') {
		$counter = get_post_meta($post_id, '_dislikeClickCount', true);
		if($counter > 0){
			echo $counter;
		} else {
			echo "0";
		}
		
	}
}, 10, 2);

// Overwrite the search form in wp
function custom_search_form( $form ) {
      
  $form ='<div class="search-box"><form method="GET" action="'.site_url().'" name="search-form" >
                <input type="text" name="s" class="" id="search-inputs" placeholder="'. get_field('search_form_placeholder', 'options') .'" value="' . get_search_query() . '" >
                <button type="submit" class="search-button">'.get_field('search_form_submit_button_text', 'options').'</button>
            </form>
            <div class="searchResultss"></div></div>';

  return $form;
}
add_filter( 'get_search_form', 'custom_search_form', 40 );


//Diable Search Widget for Overall Site 
function disable_search( $query, $error = true ) {
  if ( is_search() ) {
    $query->is_search = false;
    $query->query_vars['s'] = false;
    $query->query['s'] = false;
    if ( $error == true )
      $query->is_404 = true;
      header("Location: https://www.agencyheight.com/");
  }
}
add_action( 'parse_query', 'disable_search' );

function search_return_null($a){
	return null;
}
add_filter( 'get_search_form', 'search_return_null' );
 
function remove_search_widget() {
	unregister_widget('WP_Widget_Search');
}
add_action( 'widgets_init', 'remove_search_widget' );


//SESSION Variable For Mobile Filter Display
add_action('init', 'start_session', 1);
function start_session()
{
	if (!session_id()) {
		session_start();
	}
	if (!isset($_SESSION['idA'])) {
		$_SESSION['idA'] = null;
	}
	if (!isset($_SESSION['idB'])) {
		$_SESSION['idB'] = null;
	}
}

// Unset SESSION if PAGE get's reloaded
add_action('wp', 'unset_filter_session');
function unset_filter_session()
{
	if (!wp_doing_ajax()) {
		//Reset sessions on refresh page
		unset($_SESSION['idA']);
		unset($_SESSION['idB']);
	}
}

//Removing Unnecessary Items from adminbar
add_action( 'wp_before_admin_bar_render', 'remove_wp_nodes' );
function remove_wp_nodes(){
  global $wp_admin_bar;
  $wp_admin_bar->remove_node( 'new-post' );
}
//Removing Unnecessary Items from Toolbar
add_action('admin_menu', 'remove_options');
function remove_options() {
  remove_menu_page( 'edit.php' );
  remove_menu_page( 'edit-comments.php' );
}
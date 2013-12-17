<?php 
/**
 * Enqueues scripts and styles for front end.
 *
 * @since Wp Bootstrap 1.0
 *
 * @return void
 */

define( 'TEMPPATH', get_bloginfo('stylesheet_directory'));
define( 'IMAGES', TEMPPATH. "/images");
	define('THEME_SHORT_NAME','grc'); 
	define('THEME_FULL_NAME','Grand College');
	define('GOODLAYERS_PATH', get_template_directory_uri());
	define('FONT_SAMPLE_TEXT', 'Sample Font'); // sample font text of the goodlayers backoffice panel

function cwd_wp_bootstrap_scripts_styles() {
  // Loads Bootstrap minified JavaScript file.
  wp_enqueue_script('bootstrapjs', '//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js', array('jquery'),'3.0.0', true );
  // Loads Bootstrap minified CSS file.
  wp_enqueue_style('bootstrapwp', '//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css', false ,'3.0.0');
	wp_enqueue_script('sfjs', get_template_directory_uri() . '/js/superfish.js', array('jquery'),'3.0.0', true );
	wp_enqueue_style('sfwp', get_template_directory_uri() . '/css/superfish.css', false ,'3.0.0');
	
  // Loads our main stylesheet.
  wp_enqueue_style('style', get_stylesheet_directory_uri() . '/style.css', array('bootstrapwp') ,'1.0');
}
add_action('wp_enqueue_scripts', 'cwd_wp_bootstrap_scripts_styles');

if ( ! function_exists( 'cwd_wp_bootstrapwp_theme_setup' ) ):
  function cwd_wp_bootstrapwp_theme_setup() {
    // Adds the main menu
    register_nav_menus( array(
      'main-menu' => __( 'Main Menu', 'cwd_wp_bootstrapwp' ),
    ) );
  }
endif;
add_action( 'after_setup_theme', 'cwd_wp_bootstrapwp_theme_setup' );

// Menu personalization
add_filter("wp_nav_menu_objects",'my_wp_nav_menu_objects_start_in',10,3);
$parentId = 1;

function get_menu_item($sorted_menu_items, $id) {
	foreach( $sorted_menu_items as $key => $item ) {
		// init menu_item_parents
		if( $item->object_id ==  $id) {
		  return $item;
		}

	}

}

function get_menu_item_id($sorted_menu_items, $id) {
	foreach( $sorted_menu_items as $key => $item ) {
		// init menu_item_parents
		if( $item->ID ==  $id) {
		  return $item;
		}

	}

}


function prepare_menu($sorted_menu_items,$node, $subitem) {
	$menu_item_parents = array();

	$parent = $node->menu_item_parent;
	$menu_item_parents = $node->ID;

	foreach( $sorted_menu_items as $key => $item ) {
		// init menu_item_parents
		if( $item->ID == $node->ID) {
				unset($sorted_menu_items[$key]);
		}
		else if (isset($subitem) && $item->object_id == $subitem) {
			unset($sorted_menu_items[$key]);
		}
		else if( $item->menu_item_parent == $menu_item_parents) {
			$item->classes[] = ["children"];
		} else {
			unset($sorted_menu_items[$key]);
		}

	}

	return $sorted_menu_items;
}

function is_menu_item_leaf($sorted_menu_items, $item_id) {
	foreach( $sorted_menu_items as $key => $item ) {
		if ($item->menu_item_parent == $item_id) {
		   return false;
		}
   }

   return true;
} 

# filter_hook function to react on start_in argument
function my_wp_nav_menu_objects_start_in( $sorted_menu_items, $args ) {
    $original_menu_items = $sorted_menu_items;
    $init = (int)$args->start_in;

    if(isset($args->start_in)) {
      $node = get_menu_item($original_menu_items, $init);
      $sorted_menu_items = prepare_menu($sorted_menu_items, $node);

      // Check if it is a leaf node
#      if (is_menu_item_leaf($sorted_menu_items, $node->ID)) {
#	      $sorted_menu_items = $original_menu_items;
#	      $parent = get_menu_item_id($original_menu_items, $node->menu_item_parent);
#	      $sorted_menu_items = prepare_menu($sorted_menu_items, $parent, $node->ID);
#      }
    }

    return $sorted_menu_items;
}

// Widget area
/**
 * Register our sidebars and widgetized areas.
 *
 */
function arphabet_widgets_init() {
	register_sidebar( array(
		'name' => 'Menu Widget 0',
		'id' => 'top_menu',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="rounded">',
		'after_title' => '</h2>',
	) );
}
add_action( 'widgets_init', 'arphabet_widgets_init' );

// ADD MENU WIDGET
if ( function_exists('register_sidebars') )
               register_sidebar(array('name'=>'Menu Widget',));

require_once 'inc/nav.php';

include_once('search-custom.php');

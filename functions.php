<?php
/**
 * _s functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package _s
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( '_s_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function _s_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on _s, use a find and replace
		 * to change '_s' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( '_s', get_template_directory() . '/languages' );

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
				'menu-1' => esc_html__( 'Primary', '_s' ),
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
				'comment-form',
				'comment-list',
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
				'_s_custom_background_args',
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
endif;
add_action( 'after_setup_theme', '_s_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function _s_content_width() {
	$GLOBALS['content_width'] = apply_filters( '_s_content_width', 640 );
}
add_action( 'after_setup_theme', '_s_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function _s_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', '_s' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', '_s' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', '_s_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function _s_scripts() {
	wp_enqueue_style( '_s-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( '_s-style', 'rtl', 'replace' );

	wp_enqueue_script( '_s-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', '_s_scripts' );

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
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}


function add_theme_scripts() {
	wp_enqueue_style( 'reset', get_template_directory_uri() . '/css/reset.css');
	wp_enqueue_style( 'bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css');
	wp_enqueue_style( 'index', get_template_directory_uri() . '/css/index.css');
}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );



// Register Custom Post Type
function custom_post_types() {
	add_image_size( 'festival-act-thumbnail', 132, 132, TRUE );
	add_image_size( 'festival-act-thumbnail-nocrop', 132, 132, FALSE );
	add_image_size( 'festival-craft-nocrop', 162, 162, FALSE );
	add_image_size( 'festival-artist-main', 610, 0, FALSE );
	add_image_size( 'aff-thanks-logo', 114, 114, FALSE );

	$labels = array(
		'name'                  => _x( 'Festival Acts', 'Post Type General Name', 'festival_act' ),
		'singular_name'         => _x( 'Festival Act', 'Post Type Singular Name', 'festival_act' ),
		'menu_name'             => __( 'Festival Acts', 'festival_act' ),
		'name_admin_bar'        => __( 'Add New', 'festival_act' ),
		'archives'              => __( 'Item Archives', 'festival_act' ),
		'parent_item_colon'     => __( 'Parent Item', 'festival_act' ),
		'all_items'             => __( 'All Items', 'festival_act' ),
		'add_new_item'          => __( 'Add New Item', 'festival_act' ),
		'add_new'               => __( 'Add New', 'festival_act' ),
		'new_item'              => __( 'Not Found', 'festival_act' ),
		'edit_item'             => __( 'Edit Item', 'festival_act' ),
		'update_item'           => __( 'Update Item', 'festival_act' ),
		'view_item'             => __( 'View Item', 'festival_act' ),
		'search_items'          => __( 'Search Item', 'festival_act' ),
		'not_found'             => __( 'Not Found', 'festival_act' ),
		'not_found_in_trash'    => __( 'Not Found In Trash', 'festival_act' ),
		'featured_image'        => __( 'Featured Image', 'festival_act' ),
		'set_featured_image'    => __( 'Set Featured Image', 'festival_act' ),
		'remove_featured_image' => __( 'Remove Featured Image', 'festival_act' ),
		'use_featured_image'    => __( 'Use As Featured Image', 'festival_act' ),
		'insert_into_item'      => __( 'Post Types', 'festival_act' ),
		'uploaded_to_this_item' => __( 'Uploaded To This Item', 'festival_act' ),
		'items_list'            => __( 'Items List', 'festival_act' ),
		'items_list_navigation' => __( 'Items List Navigation', 'festival_act' ),
		'filter_items_list'     => __( 'Filter Items List', 'festival_act' ),
	);
	$args = array(
		'label'                 => __( 'Festival Act', 'festival_act' ),
		'description'           => __( 'Festival Act Description', 'festival_act' ),
		'labels'                => $labels,
		'supports'              => array('title' , 'trackbacks' , 'content' , 'revisions' , 'excerpt' , 'custom_fields' , 'author' , 'post_attributes' , 'featured_image' , 'post_formats' , 'comments'),
		'taxonomies'            => array( ''),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'rewrite'               => array( 'slug' => 'festival-acts' ),
	);
	register_post_type( 'Festival Act', $args );

	$labels = array(
		'name'                  => _x( 'Contests', 'Post Type General Name', 'contest' ),
		'singular_name'         => _x( 'Contest', 'Post Type Singular Name', 'contest' ),
		'menu_name'             => __( 'Contests', 'contest' ),
		'name_admin_bar'        => __( 'Add New', 'contest' ),
		'archives'              => __( 'Item Archives', 'contest' ),
		'parent_item_colon'     => __( 'Parent Item', 'contest' ),
		'all_items'             => __( 'All Items', 'contest' ),
		'add_new_item'          => __( 'Add New Item', 'contest' ),
		'add_new'               => __( 'Add New', 'contest' ),
		'new_item'              => __( 'Not Found', 'contest' ),
		'edit_item'             => __( 'Edit Item', 'contest' ),
		'update_item'           => __( 'Update Item', 'contest' ),
		'view_item'             => __( 'View Item', 'contest' ),
		'search_items'          => __( 'Search Item', 'contest' ),
		'not_found'             => __( 'Not Found', 'contest' ),
		'not_found_in_trash'    => __( 'Not Found In Trash', 'contest' ),
		'featured_image'        => __( 'Featured Image', 'contest' ),
		'set_featured_image'    => __( 'Set Featured Image', 'contest' ),
		'remove_featured_image' => __( 'Remove Featured Image', 'contest' ),
		'use_featured_image'    => __( 'Use As Featured Image', 'contest' ),
		'insert_into_item'      => __( 'Contests', 'contest' ),
		'uploaded_to_this_item' => __( 'Uploaded To This Item', 'contest' ),
		'items_list'            => __( 'Items List', 'contest' ),
		'items_list_navigation' => __( 'Items List Navigation', 'contest' ),
		'filter_items_list'     => __( 'Filter Items List', 'contest' ),
		);
	$args = array(
		'label'                 => __( 'Post Type', 'contest' ),
		'description'           => __( 'Post Type Description', 'contest' ),
		'labels'                => $labels,
		'supports'              => array('title' , 'trackbacks' , 'content' , 'revisions' , 'excerpt' , 'custom_fields' , 'author' , 'post_attributes' , 'featured_image' , 'post_formats' , 'comments'),
		'taxonomies'            => array( ''),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		);
	register_post_type( 'Contest', $args );

	$labels = array(
		'name'                  => _x( 'Artists', 'Post Type General Name', 'artist' ),
		'singular_name'         => _x( 'Artist', 'Post Type Singular Name', 'artist' ),
		'menu_name'             => __( 'Artists', 'artist' ),
		'name_admin_bar'        => __( 'Add New', 'artist' ),
		'archives'              => __( 'Item Archives', 'artist' ),
		'parent_item_colon'     => __( 'Parent Item', 'artist' ),
		'all_items'             => __( 'All Items', 'artist' ),
		'add_new_item'          => __( 'Add New Item', 'artist' ),
		'add_new'               => __( 'Add New', 'artist' ),
		'new_item'              => __( 'Not Found', 'artist' ),
		'edit_item'             => __( 'Edit Item', 'artist' ),
		'update_item'           => __( 'Update Item', 'artist' ),
		'view_item'             => __( 'View Item', 'artist' ),
		'search_items'          => __( 'Search Item', 'artist' ),
		'not_found'             => __( 'Not Found', 'artist' ),
		'not_found_in_trash'    => __( 'Not Found In Trash', 'artist' ),
		'featured_image'        => __( 'Featured Image', 'artist' ),
		'set_featured_image'    => __( 'Set Featured Image', 'artist' ),
		'remove_featured_image' => __( 'Remove Featured Image', 'artist' ),
		'use_featured_image'    => __( 'Use As Featured Image', 'artist' ),
		'insert_into_item'      => __( 'Artists', 'artist' ),
		'uploaded_to_this_item' => __( 'Uploaded To This Item', 'artist' ),
		'items_list'            => __( 'Items List', 'artist' ),
		'items_list_navigation' => __( 'Items List Navigation', 'artist' ),
		'filter_items_list'     => __( 'Filter Items List', 'artist' ),
		);
	$args = array(
		'label'                 => __( 'Post Type', 'artist' ),
		'description'           => __( 'Post Type Description', 'artist' ),
		'labels'                => $labels,
		'supports'              => array('title' , 'trackbacks' , 'content' , 'revisions' , 'excerpt' , 'custom_fields' , 'author' , 'post_attributes' , 'featured_image' , 'post_formats' , 'comments'),
		'taxonomies'            => array( ''),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		);
	register_post_type( 'Artist', $args );
	$labels = array(
		'name'                  => _x( 'Crafts', 'Post Type General Name', 'craft' ),
		'singular_name'         => _x( 'Craft', 'Post Type Singular Name', 'craft' ),
		'menu_name'             => __( 'Crafts', 'craft' ),
		'name_admin_bar'        => __( 'Add New', 'craft' ),
		'archives'              => __( 'Item Archives', 'craft' ),
		'parent_item_colon'     => __( 'Parent Item', 'craft' ),
		'all_items'             => __( 'All Items', 'craft' ),
		'add_new_item'          => __( 'Add New Item', 'craft' ),
		'add_new'               => __( 'Add New', 'craft' ),
		'new_item'              => __( 'Not Found', 'craft' ),
		'edit_item'             => __( 'Edit Item', 'craft' ),
		'update_item'           => __( 'Update Item', 'craft' ),
		'view_item'             => __( 'View Item', 'craft' ),
		'search_items'          => __( 'Search Item', 'craft' ),
		'not_found'             => __( 'Not Found', 'craft' ),
		'not_found_in_trash'    => __( 'Not Found In Trash', 'craft' ),
		'featured_image'        => __( 'Featured Image', 'craft' ),
		'set_featured_image'    => __( 'Set Featured Image', 'craft' ),
		'remove_featured_image' => __( 'Remove Featured Image', 'craft' ),
		'use_featured_image'    => __( 'Use As Featured Image', 'craft' ),
		'insert_into_item'      => __( 'Crafts', 'craft' ),
		'uploaded_to_this_item' => __( 'Uploaded To This Item', 'craft' ),
		'items_list'            => __( 'Items List', 'craft' ),
		'items_list_navigation' => __( 'Items List Navigation', 'craft' ),
		'filter_items_list'     => __( 'Filter Items List', 'craft' ),
		);
	$args = array(
		'label'                 => __( 'Post Type', 'craft' ),
		'description'           => __( 'Post Type Description', 'craft' ),
		'labels'                => $labels,
		'supports'              => array('title' , 'trackbacks' , 'content' , 'revisions' , 'excerpt' , 'custom_fields' , 'author' , 'post_attributes' , 'featured_image' , 'post_formats' , 'comments'),
		'taxonomies'            => array( ''),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		);
	register_post_type( 'Craft', $args );
}
add_action( 'init', 'custom_post_types', 0 );

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
    echo '<section id="main">';
}

function my_theme_wrapper_end() {
    echo '</section>';
}


/**
 * Ensure cart contents update when products are added to the cart via AJAX
 */
function my_header_add_to_cart_fragment( $fragments ) {

    ob_start();
    $count = WC()->cart->cart_contents_count;
    ?><a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><?php
    if ( $count > 0 ) {
        ?>
        <span class="cart-contents-count"><?php echo esc_html( $count ); ?></span>
        <?php
    }
        ?></a><?php

    $fragments['a.cart-contents'] = ob_get_clean();

    return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'my_header_add_to_cart_fragment' );

function woocommmerce_style() {
	wp_enqueue_style('woocommerce_stylesheet', WP_PLUGIN_URL. '/woocommerce/assets/css/woocommerce.css',false,'1.0',"all");
 }
 add_action( 'wp_head', 'woocommmerce_style' );


 function aff_customize_register( $wp_customize ) {

	$wp_customize->add_section( 'aff_section' , array(
		'title'      => __( 'AFF Theme Options', 'afftheme' ),
		'priority'   => 30,
	) );

	$wp_customize->add_setting(
		'aff_parade_flyer',
		array(
			'default'      => '',
			'transport'    => 'postMessage'
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'aff_parade_flyer',
			array(
				'label'    => 'AFF Parade Flyer',
				'settings' => 'aff_parade_flyer',
				'section'  => 'aff_section'
			)
		)
	);
 }
 add_action( 'customize_register', 'aff_customize_register' );
<?php
/**
 * ProfileTree functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ProfileTree
 */

if ( ! defined( 'THEME_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'THEME_VERSION', '1.0.0' );
}

if ( ! function_exists( 'profiletree_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function profiletree_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on ProfileTree, use a find and replace
		 * to change 'profiletree' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'profiletree', get_template_directory() . '/languages' );

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
			[
				'main-menu' => esc_html__( 'Primary', 'profiletree' ),
			]
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			[
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			]
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
			[
				'height'      => 36,
				'width'       => 212,
				'flex-width'  => true,
				'flex-height' => true,
			]
		);
	}
endif;
add_action( 'after_setup_theme', 'profiletree_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function profiletree_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'profiletree_content_width', 640 );
}
add_action( 'after_setup_theme', 'profiletree_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function profiletree_widgets_init() {
	register_sidebar(
		[
			'name'          => esc_html__( 'Sidebar', 'profiletree' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'profiletree' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		]
	);
}
add_action( 'widgets_init', 'profiletree_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function profiletree_scripts() {

	$version = THEME_VERSION;
	$path    = get_template_directory_uri();

	/**
	 * Styles
	 */
	// Main style css.
	wp_enqueue_style( 'profiletree-style', get_stylesheet_uri(), [], $version );
	wp_enqueue_style( 'profiletree-theme-style', $path . '/css/theme.css', [], $version );

	// Custom css for override.
	wp_enqueue_style( 'profiletree-custom-css', $path . '/css/custom.css', [], $version );

	// Google fonts.
	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Darker+Grotesque:wght@600&family=Manrope:wght@400;500;600;800&display=swap', [], null );

	/**
	 * Scripts
	 */
	// Theme's scrips.
	wp_enqueue_script( 'profiletree-custom-js', $path . '/js/custom.js', [ 'jquery' ], $version, true );

	// Alpine Js.
	wp_enqueue_script( 'alpine-js', 'https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js', [], null );

}
add_action( 'wp_enqueue_scripts', 'profiletree_scripts' );

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
 * All classes here
 */
require get_template_directory() . '/inc/class-profiletree-menu-walker.php';
require get_template_directory() . '/inc/class-svg-enable.php';

/**
 * Load ACF Options panel.
 */
require get_template_directory() . '/inc/class-acf-options-panel.php';

/**
 * Update color settings from options.
 */
function add_theme_options() {
	$primary_color = get_field( 'primary_color', 'option' );
	$hover_color   = get_field( 'hover_color', 'option' );
	$text_color   = get_field( 'text_color', 'option' );
	$light_color = get_field( 'light_color', 'option' );
	$dark_color = get_field( 'dark_color', 'option' );
	$border_color = get_field( 'border_color', 'option' );
	$dark_bg_color = get_field( 'dark_theme_bg', 'option' );
	$dark_bg_light = get_field( 'dark_theme_light_bg', 'option' );
	?>
	<style>
		:root {
			--clr-primary: <?php echo $primary_color ? esc_html( $primary_color ) : '#33BC77'; ?>;
			--clr-hover: <?php echo $hover_color ? esc_html( $hover_color ) : '#4b9a64'; ?>;
			--clr-text: <?php echo $text_color ? esc_html( $text_color ) : '#262629'; ?>;
			--clr-light: <?php echo $light_color ? esc_html( $light_color ) : '#F9F9F9'; ?>;
			--clr-dark: <?php echo $dark_color ? esc_html( $dark_color ) : '#262629'; ?>;
			--clr-border: <?php echo $border_color ? esc_html( $border_color ) : '#D8D8D8'; ?>;
			--clr-d-body: <?php echo $dark_bg_color ? esc_html( $dark_bg_color ) : '#1E2C38'; ?>;
			--clr-d-dark: <?php echo $dark_bg_light ? esc_html( $dark_bg_light ) : '#273847'; ?>;
		}
	</style>
	<?php
}
add_filter( 'wp_head', 'add_theme_options', 10 );

/**
 * This will remove the default image sizes and the medium_large size.
 *
 * @param array $sizes default sizes.
 */
function prefix_remove_default_images( $sizes ) {
	unset( $sizes['small'] ); // 150px.
	unset( $sizes['medium'] ); // 300px.
	unset( $sizes['large'] ); // 1024px.
	unset( $sizes['medium_large'] ); // 768px.
	return $sizes;
}
add_filter( 'intermediate_image_sizes_advanced', 'prefix_remove_default_images' );

/**
 * This will remove the default image sizes and the medium_large size.
 */
function remove_big_image_sizes() {
	remove_image_size( '1536x1536' ); // 2 x Medium Large (1536 x 1536)
	remove_image_size( '2048x2048' ); // 2 x Large (2048 x 2048)
}
add_action( 'init', 'remove_big_image_sizes' );

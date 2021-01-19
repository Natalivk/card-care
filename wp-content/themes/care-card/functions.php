<?php
/**
 * Care Card functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Care_Card
 */
//Custom Widget
include_once('includes/widgets/social_widget.php');

function register_navwalker(){
    require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );
if ( ! file_exists( get_template_directory() . '/class-wp-bootstrap-navwalker.php' ) ) {
    // File does not exist... return an error.
    return new WP_Error( 'class-wp-bootstrap-navwalker-missing', __( 'It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker' ) );
} else {
    // File exists... require it.
    require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'THEMENAME' ),
) );
if (!defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', '1.0.0');
}


if (!function_exists('care_card_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function care_card_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Care Card, use a find and replace
         * to change 'care-card' to the name of your theme in all the template files.
         */
        load_theme_textdomain('care-card', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(
            array(
                'menu-1' => esc_html__('Primary', 'care-card'),
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
                'care_card_custom_background_args',
                array(
                    'default-color' => 'ffffff',
                    'default-image' => '',
                )
            )
        );

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support(
            'custom-logo',
            array(
                'height' => 250,
                'width' => 250,
                'flex-width' => true,
                'flex-height' => true,
            )
        );
    }
endif;
add_action('after_setup_theme', 'care_card_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function care_card_content_width()
{
    $GLOBALS['content_width'] = apply_filters('care_card_content_width', 640);
}

add_action('after_setup_theme', 'care_card_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function care_card_widgets_init()
{
    register_sidebar(
        array(
            'name' => esc_html__('Sidebar', 'care-card'),
            'id' => 'sidebar-1',
            'description' => esc_html__('Add widgets here.', 'care-card'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );
}

add_action('widgets_init', 'care_card_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function care_card_scripts()
{
    wp_enqueue_style('care-card-style', get_stylesheet_uri(), array(), _S_VERSION);
    wp_style_add_data('care-card-style', 'rtl', 'replace');

    wp_enqueue_script('care-card-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'care_card_scripts');

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
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}
function scripts()
{
    // wp_register_style('style', get_template_directory_uri() . '/public/css/app.css', [], 2, 'all');
    wp_register_style('style', get_template_directory_uri() . '/public/css/app.css');
    wp_enqueue_style('style');

    wp_enqueue_script('jquery');

    wp_register_script('app', get_template_directory_uri() . '/public/js/app.js', ['jquery'], 1, true);
    wp_enqueue_script('app');
}

add_action('wp_enqueue_scripts', 'scripts');

add_action('wp_ajax_join', 'join_form');
add_action('wp_ajax_nopriv_join', 'join_form');
function join_form()
{
    if (!wp_verify_nonce($_POST['nonce'], 'ajax-nonce')) {
        wp_send_json_error('Nonce is incorrect', 401);
        die();
    }

    $formdata = [];

    wp_parse_str($_POST['join'], $formdata);

    // Admin email
    $admin_email = get_option('admin_email');

    // Email Headers
    $headers[] = 'Content-Type: text/html; charset=UTF-8';
    $headers[] = 'From: Website <' . $admin_email . '>';
    $headers[] = 'Reply-to' . $formdata['email'];

    // Sending email to
    $send_to = $admin_email;

    // Subject
    $subject = "Join Now" . $formdata['email'];

    //Message
    $message = '';
    foreach ($formdata as $index => $field) {
        $message .= '<strong>' . $index . '</strong>' . $field . '<br />';
    }
    try {
        if (wp_mail($send_to, $subject, $message, $headers)) {
            wp_send_json_success('Email sent');
        } else {
            wp_send_json_error('Email error');
        }
    } catch (Exception $e) {
        wp_send_json_error($e->getMessage());
    }
}

add_action('phpmailer_init', 'custom_mailer');

//function custom_mailer( PHPMailer $phpmailer){
//    $phpmailer->SetFrom('carecard@annkv.com', 'Care Card');
//    $phpmailer->Host = 'mail.annkv.com';
//    $phpmailer->Port = 465;
//    $phpmailer->SMTPAuth = true;
//    $phpmailer->SMTPSecure = 'tls';
//    $phpmailer->Username = SMTP_LOGIN;
//    $phpmailer->Password = SMTP_PASSWORD;
//    $phpmailer->IsSMTP();
//}

add_filter('use_block_editor_for_post', '__return_false', 10);
function strappress_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'strappress'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here.', 'strappress'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer 1', 'strappress'),
        'id' => 'footer-1',
        'description' => esc_html__('Add widgets here.', 'strappress'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer 2', 'strappress'),
        'id' => 'footer-2',
        'description' => esc_html__('Add widgets here.', 'strappress'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer 3', 'strappress'),
        'id' => 'footer-3',
        'description' => esc_html__('Add widgets here.', 'strappress'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));
}

add_action('widgets_init', 'strappress_widgets_init');
add_action('wp_enqueue_scripts', 'enqueue_load_fa');
function enqueue_load_fa()
{
    wp_enqueue_style('load-fa', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
}
/**
 * Register Custom Navigation Walker
 */

<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Care_Card
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
    <header id="masthead" class="site-header">
        <div class="care-container">
            <div class="header-inner">

                <div class="site-branding">
                    <?php
                    the_custom_logo();
                    ?>
                </div>

                <div class="main-menu">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'menu-1',
                            'menu_id' => 'primary-menu',
                        )
                    );
                    ?>
                    <div class="join-now">
                        <div id="join-now-btn" class="column">
                            <div class="content">
                                <a id="mbtn" href="#">JOIN NOW</a>
                            </div>
                        </div>
                    </div>
                    <div class="mobile-menu">
                        <nav class="nav">
                            <button class="toggle-menu">
                                <span></span>
                            </button>
                        </nav>
                        <div id="menu">
                            <nav class="main-nav">
                                <ul>
                                    <?php
                                    wp_nav_menu(
                                        array(
                                            'theme_location' => 'menu-1',
                                            'menu_id' => 'primary-menu',
                                        )
                                    );
                                    ?>
                                </ul>
                            </nav>

                        </div>

                    </div>
                </div>
            </div>

        </div>

        <?php get_template_part('includes/form', 'join') ?>
    </header>

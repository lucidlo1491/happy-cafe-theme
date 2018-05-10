<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Happy_Cafe
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'happy-cafe' ); ?></a>

	<header id="masthead" class="site-header container">
        <div class="row justify-content-center align-items-center">
            <!-- phone number and opening timing -->
            <div class="header-wrap col-sm-12">
                <div class="header-phone">
                    <i class="fa fa-<?= get_field('header_icon', 'option'); ?>" aria-hidden="true"></i>
                    <?= get_field('phone_and_timing_fields', 'option'); ?>
                </div>
                <!-- phone number and opening timing ends -->
                <div class="site-branding">
                    <img class="aligncenter" src="<?= bloginfo('template_directory'); ?>/assets/images/happy-cafe-logo.png"  alt="Happy Cafe" width="238" height="164" />
                </div><!-- .site-branding -->
            </div>


            <nav id="site-navigation" class="main-navigation col-sm-12">
                <!--<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'happy-cafe' ); ?></button>-->
                <button class="navbar-toggler hidden-md-up" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="navbar-collapse" id="navbarCollapse">
                    <?php
                        wp_nav_menu(
                                array(
                                    'theme_location' => 'main-menu',
                                    'menu_id'        => 'primary-menu',
                                    'walker'         => new wp_bootstrap_navwalker(),
                                    'menu_class'     => 'nav justify-content-around text-uppercase'
                                )
                        );
                     ?>
                </div>
            </nav><!-- #site-navigation -->
        </div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">

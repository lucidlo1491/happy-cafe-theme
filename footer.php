<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Happy_Cafe
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-6 col-md-4 happyintro">
                    <?php dynamic_sidebar('footer-1'); ?>
                </div>
                <div class="col-sm-6 col-md-2 footer-link">

                    <?php wp_nav_menu( array(
                        'theme_location' => 'footer-menu',
                        'depth' => '2',
                        'container' => 'nav',
                        'container_class'    => 'footer-nav-container',
                        'menu_class'     => 'footer-nav',   
                    ) ); ?>
                </div>
                <div class="col-sm-6 col-md-2 socialise">
                    <?php dynamic_sidebar('footer-3'); ?>
                </div>
                <div class="col-sm-6 col-md-4 map">
                    <?php dynamic_sidebar('footer-4'); ?>
                </div>
            </div>
            <div class="row justify-content-center align-items-center any-question-row">
                <div class="col-sm-12 col-md-8 footer-content">
                    <h3><?= get_field('footer_title', 'option')?></h3>
                    <p><?= get_field('footer_content', 'option')?></p>
                </div>
                <div class="col-sm-12 col-md-4 footer-img">
                    <?php

                    $image = get_field('footer_image', 'option');

                    if( !empty($image) ){?>

                        <img class="alignright" src="<?= $image; ?>" alt="<?= get_field('footer_image', 'option')?>" width="335" height="165" />

                    <?php } ?>
                </div>
            </div>
            <div class="copyright-outer">
                <?php echo do_shortcode('[copyright-year]'); ?>
            </div><!-- .site-info -->
        </div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

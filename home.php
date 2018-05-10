<?php
/**
 * Template Name: Home Template
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Happy_Cafe
 */

get_header(); ?>

	<div id="primary" class="content-area">
        <?php
        $homesliders = get_field('home_page_gallery');
        if( !empty($homesliders) ){ ?>
            <ul class="home-slider">
                <?php foreach( $homesliders as $homeslider ){ ?>
                    <li class="slider-item" style="background-image:url('<?= $homeslider['url']; ?>');">
                        <div class="slick-item slider-description">
                                <h2><a href="<?= get_field('home_slider_link'); ?>"><?= $homeslider['title']; ?></a></h2>
                                <p class=description-text><?= $homeslider['description']; ?></p>
                            <a class="ghost-white-cta" href="<?= get_field('home_slider_link'); ?>"><?= get_field('home_slider_link_text'); ?></a>
                        </div>

                    </li>
                <?php } ?>
            </ul>
        <?php } else { ?>
                    <div class="featured-image text-center" style="background-image:url('<?= bloginfo('template_directory'); ?>/assets/images/home-slider.jpg');">
                        <div class="featured-image-item slider-description">
                            <h2><a href="<?= get_field('home_slider_link'); ?>"><?= get_bloginfo( 'name' ); ?></a></h2>
                            <p class=description-text><?= get_bloginfo( 'description' ); ?></p>
                            <a class="ghost-white-cta" href="<?= get_field('home_slider_link'); ?>"><?= get_field('home_slider_link_text'); ?></a>
                        </div>
                    </div>
        <?php } ?>
		<main id="main" class="site-main container">
            <section class="row justify-content-center section-divider-bottom">
                <div class="col-sm-12 col-md-8">
                    <p style="color: <?= get_field('choose_text_colour'); ?>"><?= get_field('home_intro'); ?></p>
                    <?php
                    $signature = get_field('home_signature');
                    if( !empty($signature) ){ ?>
                        <img src="<?= $signature['url']; ?>" alt="<?php echo $signature['alt']; ?>" width="194" height="62" />
                    <?php } ?>
                </div>
            </section>
            <section class="row what-we-famous-for section-divider">
                <div class="col-sm-12 what-we-famous-for-heading">
                    <h2 class="gold-heading"><?= get_field('section_title'); ?></h2>
                </div>
                <div class="w-100 section-divider"></div>
                    <?php
                    // check if the flexible content field has rows of data
                    if( have_rows('section_content') ) {
                        // loop through the rows of data
                        while ( have_rows('section_content') ) {
                            the_row();//flex content
                            // check current row layout
                            while ( have_rows('inner_section_content') ) {
                                the_row();//repeater field
                                // check if the nested repeater field has rows of data
                                ?>
                                <div class="col-sm-12 col-md-4 menu-home-items">
                                    <?php $featuredimage = get_sub_field('feature_content_image'); ?>
                                    <img class="aligncenter" src="<?= $featuredimage['url']; ?>" alt="<?= $featuredimage['alt'] ?>" width="380" height="425"/>
                                    <div class="content-section">
                                        <h3 class="gold-subheading"><a href="<?= get_sub_field('cta_link'); ?>"><?= get_sub_field('content_feature_title'); ?></a></h3>
                                        <p class="goldtext-content"><?= get_sub_field('content_description'); ?></p>
                                    </div>
                                </div>

                                <?php
                            }
                        }
                    }
                    ?>
            </section>
            <!-- if page have I need a coffee section -->
            <?php if( get_field('section_need_coffee_title') ) { ?>
                <section class="row need-a-coffee-home section-divider">
                    <div class="col-sm-12 section-divider text-center">
                        <h2 class="gold-heading"><?= get_field('section_need_coffee_title'); ?></h2>
                        <p class="goldtext-content" style="padding-bottom: 30px;"><?= get_field('section_need_coffee_content'); ?></p>
                        <a class="ghost-blue-cta" href="<?= get_field('section_need_coffee_cta_link'); ?>"><?= get_field('section_need_coffee_cta_text'); ?></a>
                    </div>
                </section>
            <?php } else {
                //dont show I need a coffee section
            } ?>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer();

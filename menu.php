<?php
/**
 * Template Name: Menu Page Template
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
            $featuredimage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "large" );
            if( !empty($featuredimage) ){ ?>
                <div class="featured-image text-center" style="background-image:url('<?= $featuredimage[0]; ?>');">
                    <div class="featured-image-item featured-description">
                        <h2 class="text-uppercase"><?= get_field('page_title'); ?></h2>
                        <p class=description-text><?= get_field('title_description'); ?></p>
                    </div>
                </div>

                </div>
            <?php } else { ?>
                <div class="featured-image text-center" style="background-image:url('<?= bloginfo('template_directory'); ?>/assets/images/home-slider.jpg');">
                    <div class="featured-image-item slider-description">
                        <h2 class="text-uppercase"><a href="<?= get_field('home_slider_link'); ?>"><?= get_bloginfo( 'name' ); ?></a></h2>
                        <p class=description-text><?= get_bloginfo( 'description' ); ?></p>
                    </div>
                </div>
            <?php } ?>
		<main id="main" class="site-main container">
            <div class="row">
                <div class="col-md-9">
                    <section class="organic-menu-section section-divider-bottom">
                        <div class="row section-divider">
                            <div class="col-sm-12 menu-title">
                                <h2 class="blue-title"><u><?= get_field('first_title'); ?></u></h2>
                            </div>
                        </div>
                        <div class="organic-items section-divider">
                            <?php
                            // check if the flexible content field has rows of data
                            if( have_rows('organic_coffee_section') ) {
                                // loop through the rows of data
                                while ( have_rows('organic_coffee_section') ) {
                                    the_row();//flex content
                                    // check current row layout
                                    while ( have_rows('organic_coffee_item') ) {
                                        the_row();//repeater field
                                        // check if the nested repeater field has rows of data
                                        ?>
                                        <div class="row justify-content-center menu-row">
                                            <div class="col-sm-12 col-md-3 menu-items">
                                                <?php $organicimage = get_sub_field('organic_coffee_image'); ?>
                                                <img class="aligncenter" src="<?= $organicimage['url']; ?>" alt="<?= $organicimage['alt'] ?>" width="380" height="425"/>
                                            </div>
                                            <div class="col-sm-12 col-md-6 menu-items">
                                                <div class="clearfix">
                                                    <h3 class="gold-subheading float-left"><?= get_sub_field('organic_coffee_title'); ?></h3>
                                                    <p class="goldtext-content float-right"><?= get_sub_field('organic_coffee_price'); ?></p>
                                                </div>
                                                    <p class="goldtext-content"><?= get_sub_field('organic_coffee_description'); ?></p>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                            }
                            ?>
                        </div>
                    </section>
                    <section class="organic-menu-section section-divider-bottom">
                        <div class="row section-divider">
                            <div class="col-sm-12 menu-title">
                                <h2 class="blue-title"><u><?= get_field('second_title'); ?></u></h2>
                            </div>
                        </div>
                        <div class="organic-items section-divider">
                            <?php
                            // check if the flexible content field has rows of data
                            if( have_rows('desserts_section') ) {
                                // loop through the rows of data
                                while ( have_rows('desserts_section') ) {
                                    the_row();//flex content
                                    // check current row layout
                                    while ( have_rows('desserts_item') ) {
                                        the_row();//repeater field
                                        // check if the nested repeater field has rows of data
                                        ?>
                                        <div class="row justify-content-center menu-row">
                                            <div class="col-sm-12 col-md-3 menu-items">
                                                <?php $dessertimage = get_sub_field('desserts_images'); ?>
                                                <img class="aligncenter" src="<?= $dessertimage['url']; ?>" alt="<?= $dessertimage['alt'] ?>" width="380" height="425" />
                                            </div>
                                            <div class="col-sm-12 col-md-6 menu-items">
                                                <div class="clearfix">
                                                    <h3 class="gold-subheading float-left"><?= get_sub_field('desserts_title'); ?></h3>
                                                    <p class="goldtext-content float-right"><?= get_sub_field('desserts_price'); ?></p>
                                                </div>
                                                <p class="goldtext-content"><?= get_sub_field('desserts_description'); ?></p>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                            }
                            ?>
                        </div>
                    </section>
                    <section class="organic-menu-section section-divider-bottom">
                        <div class="row section-divider">
                            <div class="col-sm-12 menu-title">
                                <h2 class="blue-title"><u><?= get_field('third_title'); ?></u></h2>
                            </div>
                        </div>
                        <div class="organic-items section-divider">
                            <?php
                            // check if the flexible content field has rows of data
                            if( have_rows('sandwiches_section') ) {
                                // loop through the rows of data
                                while ( have_rows('sandwiches_section') ) {
                                    the_row();//flex content
                                    // check current row layout
                                    while ( have_rows('sandwiches_item') ) {
                                        the_row();//repeater field
                                        // check if the nested repeater field has rows of data
                                        ?>
                                        <div class="row justify-content-center menu-row">
                                            <div class="col-sm-12 col-md-3 menu-items">
                                                <?php $sandwichicimage = get_sub_field('sandwiches_image'); ?>
                                                <img class="aligncenter" src="<?= $sandwichicimage['url']; ?>" alt="<?= $sandwichicimage['alt'] ?>" width="380" height="425"/>
                                            </div>
                                            <div class="col-sm-12 col-md-6 menu-items">
                                                <div class="clearfix">
                                                    <h3 class="gold-subheading float-left"><?= get_sub_field('sandwiches_title'); ?></h3>
                                                    <p class="goldtext-content float-right"><?= get_sub_field('sandwiches_price'); ?></p>
                                                </div>
                                                <p class="goldtext-content"><?= get_sub_field('sandwiches_description'); ?></p>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                            }
                            ?>
                        </div>
                    </section>
                </div>
                <div class="col-md-3">
                    <?php
                    if (is_active_sidebar('blogpostsidebar')){
                        dynamic_sidebar('blogpostsidebar');
                    }
                    ?>
                </div>
            </div>
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

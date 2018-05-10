<?php
/**
 * Template Name: About Template
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
            <section class="row justify-content-center">
                    <?php
                    // check if the flexible content field has rows of data
                    if( have_rows('about_intro_content') ) {
                        // loop through the rows of data
                        while ( have_rows('about_intro_content') ) {
                            the_row();//flex content
                            // check current row layout
                            while ( have_rows('about_intro_items') ) {
                                the_row();//repeater field
                                // check if the nested repeater field has rows of data
                                ?>
                                <div class="col-sm-12 col-md-5">
                                    <p class="goldtext-content"><?= get_sub_field('about_intro_content_area_left'); ?></p>
                                </div>
                                <div class="col-sm-12 col-md-5">
                                    <p class="goldtext-content"><?= get_sub_field('about_intro_content_area_right'); ?></p>
                                </div>
                                <?php
                            }
                        }
                    }
                    ?>
            </section>
            <section class="happycafe-numbers">
                <div class="row justify-content-center section-divider">
                    <div class="col-sm-12 number-title text-center">
                        <h3 class="blue-title"><?= get_field('happy_cafe_by_numbers_title'); ?></h3>
                    </div>
                </div>
                <div class="row justify-content-center align-items-center stats-row">
                    <?php
                    // check if the flexible content field has rows of data
                    if( have_rows('happy_cafe_by_numbers_row') ) {
                        // loop through the rows of data
                        while ( have_rows('happy_cafe_by_numbers_row') ) {
                            the_row();//flex content
                            // check current row layout
                            while ( have_rows('happy_cafe_by_numbers_items') ) {
                                the_row();//repeater field
                                // check if the nested repeater field has rows of data
                                ?>
                                <div class="col-sm-12 col-md-3">
                                    <p class="stats-numbers"><?= number_format(get_sub_field('happy_cafe_stats')); ?></p>
                                    <p class="stats-text"><?= get_sub_field('happy_cafe_stats_text'); ?></p>
                                </div>
                                <?php
                            }
                        }
                    }
                    ?>
                </div>
            </section>
            <section class="what-we-are section-divider">
                <div class="row">
                    <?php
                    // check if the flexible content field has rows of data
                    if( have_rows('what_we_are') ) {
                        // loop through the rows of data
                        while ( have_rows('what_we_are') ) {
                            the_row();//flex content
                            // check current row layout
                            while ( have_rows('what_we_are_items') ) {
                                the_row();//repeater field
                                // check if the nested repeater field has rows of data
                                ?>
                                <div class="col-sm-12 col-md-4 what-we-are-items">
                                    <?php $whatweareimage = get_sub_field('what_we_are_featured'); ?>
                                    <img class="aligncenter" src="<?= $whatweareimage['url']; ?>" alt="<?= $whatweareimage['alt'] ?>" width="350" height="275" />
                                    <div class="content-section">
                                        <h3 class="text-uppercase gold-subheading"><?= get_sub_field('what_we_are_title'); ?></h3>
                                        <p class="goldtext-content"><?= get_sub_field('what_we_are_content'); ?></p>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                    }
                    ?>
                </div>
            </section>
            <section class="row join-our-team-section section-divider-top">
                <?php $whatweareimage = get_field('join_our_team_image'); ?>
                <div class="col-sm-12 align-self-end join-our-team text-center" style="background-image: url('<?= get_field('join_our_team_image'); ?>');">
                    <a class="gold-cta" href="<?= get_field('join_out_team_link'); ?>"><?= get_field('join_our_team_cta_text'); ?></a>
                </div>
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

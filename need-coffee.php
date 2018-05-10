<?php
/**
 * Template Name: I Need a Coffee Page Template
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
            <section class="need-cooffee-intro-section section-divider-bottom">
                <div class="row section-divider justify-content-center need-coffee-intro">
                    <div class="col-sm-12 col-md-7">
                        <p class="text-center goldtext-content font-weight-bold"><?= get_field('need_coffee_intro_text'); ?></p>
                    </div>
                </div>
                <div class="need-coffee-items section-divider">
                    <?php
                    // check if the flexible content field has rows of data
                    if( have_rows('need_coffee_content') ) {
                        // loop through the rows of data
                        while ( have_rows('need_coffee_content') ) {
                            the_row();//flex content
                            // check current row layout
                            while ( have_rows('need_coffee_item') ) {
                                the_row();//repeater field
                                // check if the nested repeater field has rows of data
                                ?>
                                <div class="row justify-content-end need-coffee-row">
                                    <?php $needcoffeeimage = get_sub_field('i_need_a_coffee_image'); ?>
                                    <div class="col-sm-12 col-md-4">
                                        <div class="new-product-image-items" style="background: url('<?= $needcoffeeimage['url']; ?>') no-repeat center top;">
                                            <?php if( get_sub_field('is_this_new') ) { ?>
                                                <span class="new-product"><?= get_sub_field('new_product_text'); ?></span>
                                            <?php }?>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 need-coffee-content-items">
                                        <p><?= do_shortcode(get_sub_field('i_need_coffee_content')); ?></p>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                    }
                    ?>
                </div>
            </section>
            <section class="testimonial-section section-divider-bottom">
                <div class="row justify-content-center testimonial-items section-divider">
                    <?php
                    // check if the flexible content field has rows of data
                    if( have_rows('testimonial_section') ) {
                        // loop through the rows of data
                        while ( have_rows('testimonial_section') ) {
                            the_row();//flex content
                            // check current row layout
                            while ( have_rows('testimonial_items') ) {
                                the_row();//repeater field
                                // check if the nested repeater field has rows of data
                                ?>
                                <div class="col-sm-12 col-md-6 testimonial-item">
                                    <div class="gold-bubble">
                                        <p class=" "><?= get_sub_field('testimonial'); ?></p>
                                        <p class=""><?= get_sub_field('persons_name'); ?></p>
                                    </div>
                                    <?php $happycustomerimage = get_sub_field('happy_customer_image'); ?>
                                    <div class="testimonial-image">
                                        <img class="aligncenter" src="<?= $happycustomerimage['url']; ?>" alt="<?= $happycustomerimage['alt'] ?>" width="138" height="138" />
                                    </div>
                                </div>
                                <?php
                            }
                        }
                    }
                    ?>
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

<?php
/**
 * Template Name: Contact Page Template
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
            <section class="contact-content row">
                <div class="col-sm-12 col-md-6 map-column">
                        <div class="map">
                            <p class="text-center goldtext-content font-weight-bold"><?= get_field('select_location'); ?></p>
                        </div>
                    <div class="address-section section-divider">

                        <?php
                        // check if the flexible content field has rows of data
                        if( have_rows('address_field') ) {
                            // loop through the rows of data
                            while ( have_rows('address_field') ) {
                                the_row();//flex content
                                // check current row layout
                                while ( have_rows('address_field_items') ) {
                                    the_row();//repeater field
                                    // check if the nested repeater field has rows of data
                                    ?>
                                    <div class="row address-content align-items-center">
                                        <div class="col-sm-4 col-lg-2">
                                            <div class="address-icon">
                                                <i class="fa fa-<?= get_sub_field('select_address_icons'); ?>" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                        <div class="col-sm-8 col-lg-10">
                                            <p class="goldtext-content"><?= get_sub_field('adress_content'); ?></p>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                        }
                        ?>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 form-column">
                    <div class="form-item">
                        <p><?= do_shortcode(get_field('address_form')); ?></p>
                    </div>
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

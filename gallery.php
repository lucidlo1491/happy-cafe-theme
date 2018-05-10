<?php
/**
 * Template Name: Gallery Template
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
            <section class="gallery-item">
                    <?php
                    $galleryimages = get_field('gallery_section');
                        if( $galleryimages ) { ?>
                            <div class="row justify-content-center gallery">
                            <?php foreach( $galleryimages as $galleryimage ) { ?>
                                <div class="col-sm-6 col-md-3 image-col">
                                    <a data-fancybox="gallery" class="fancybox" rel="ligthbox" href="<?= $galleryimage['url']; ?>">
                                        <img class="gal-image" src="<?= $galleryimage['sizes']['thumbnail']; ?>" alt="<?= $galleryimage['alt']; ?>" />
                                    </a>
                                </div>
                            <?php } ?>
                            </div>
                      <?php  } ?>
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

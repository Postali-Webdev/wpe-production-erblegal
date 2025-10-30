<?php
/**
 * Template Name: Location Contact
 * @package Postali Child
 * @author Postali LLC
**/


global $post;
$parent_ID = wp_get_post_parent_id( $post->ID );

//ACF Fields
$hero_bg = get_field('hero_banner_background_image');
$banner_data = [
    'image'     => $hero_bg,
    'title'     => get_field('hero_title'),
    'sub-title' => get_field('hero_sub_title'),
    'publish-date'  => false,
    'category'      => false
];

get_header(); ?>

<div id="page-contact" class="bg-dk-blue">

    <?php get_template_part('block', 'simple-banner', [ 'data' => [ 'banner' => $banner_data ] ] ); ?>

    <section id="panel-2">
        <div class="container wrapper wrapper-1640">
            <div class="columns">
                <div class="column-50">
                    <?php echo do_shortcode( get_field('form_embed') ); ?>
                </div>
                <?php if( have_rows('locations', 'options') ) : ?>
                <div class="column-50">
                    <div class="locations-column">
                    <?php while( have_rows('locations', 'options') ) : the_row(); 
                    $location_page = get_sub_field('location_page');
                    if( $location_page->ID == $parent_ID) :
                    ?>
                        <div class="location">
                            <div class="title-wrapper">
                                <p class="title"><?php the_sub_field('location_name'); ?> Office</p>
                                <div class="line-ruler"></div>
                            </div>
                            <div class="wrapper-50-50">
                                <div class="copy">
                                    <p><?php the_sub_field('address'); ?></p>
                                    <p class="phone"><span class="red">PH: </span><a href="tel:<?php the_sub_field('phone_number'); ?>"> <?php the_sub_field('phone_number'); ?></a></p>
                                    <a href="<?php the_sub_field('directions_link'); ?>" class="btn" target="_blank">Directions</a>
                                </div>
                                <div class="responsive-iframe">
                                    <iframe src="<?php the_sub_field('map_embed'); ?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                        </div>
                    <?php endif; endwhile; ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <?php if( get_field('add_featured_testimonial_block') ) : ?>
    <section id="featured-testimonial-panel">
        <div class="container full">
            <div class="columns">
                <div class="column-full">
                    <?php get_template_part('block', 'featured-testimonial', ['data' => ['testimonial' => get_field('featured_testimonial') ] ]); ?>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <?php if( get_field('add_closing_cta_block') ) : ?>
    <section id="closing-cta-panel" class="wrapper wrapper-1640">
        <div class="container">
            <div class="column-full">
            <?php get_template_part('block', 'closing-cta', [ 'data' => ['cta' => get_field('closing_cta_block')] ] ); ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

</div>

<?php get_footer(); ?>
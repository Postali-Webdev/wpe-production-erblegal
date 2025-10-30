<?php
/**
 * Template Default
 * @package Postali Child
 * @author Postali LLC
**/

get_header();

//ACF Fields
$hero_bg = get_field('hero_background_image');
$featured_att = get_field('p2_featured_attorney');
$banner_data = [
    'image'     => $hero_bg,
    'title'     => get_field('hero_title'),
    'sub-title' => get_field('hero_sub_title'),
    'publish-date'  => false,
    'category'      => false
];
?>

<div id="default-page" class="bg-dk-blue">
    <?php get_template_part('block', 'simple-banner', [ 'data' => [ 'banner' => $banner_data ] ] ); ?>
    
    <section id="panel-2">
        <div class="container wrapper wrapper-900">
            <div class="columns">
                <div class="column-full block">
                    <?php the_field('main_copy'); ?>
                </div>
            </div>
        </div>
    </section>

    <?php if( get_field('add_featured_testimonial_block') ) : ?>
    <section id="featured-testimonial-panel">
        <div class="container full">
            <div class="columns">
                <div class="column-full">
                    <?php get_template_part('block', 'featured-testimonial', ['data' => ['testimonial' => get_field('featured_testimonial_block') ] ]); ?>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <?php if( get_field('add_closing_cta_block') ) : ?>
    <section id="closing-cta-panel" class="wrapper wrapper-1640">
        <div class="container">
            <div class="column-full">
            <?php get_template_part('block', 'closing-cta', [ 'data' => ['cta' => get_field('closing_cta_block_default')] ] ); ?>
            </div>
        </div>
    </section>
    <?php endif; ?>


</div>

<?php get_footer(); ?>
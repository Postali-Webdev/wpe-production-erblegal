<?php
/**
 * Template Name: Practice Area Child
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

<div id="pa-child" class="bg-dk-blue">
    
    <?php get_template_part('block', 'simple-banner', [ 'data' => [ 'banner' => $banner_data ] ] ); ?>

    <section id="panel-2">
        <div class="container wrapper wrapper-1200">
            <div class="columns">
                <div class="column-50 block">
                    <h2><?php the_field('p2_panel_title'); ?></h2>
                    <?php the_field('p2_copy'); ?>
                </div>
                <div class="column-50 block">
                    <div class="attorney-postcard">
                        <div class="image-outer-wrapper">
                            <div class="image-inner-wrapper">
                                <img class="headshot" src="<?php echo $featured_att['headshot']['url']; ?>" alt="<?php echo $featured_att['headshot']['url']; ?>">
                            </div>
                            <img class="award" src="<?php echo $featured_att['award']['url']; ?>" alt="<?php echo $featured_att['award']['alt']; ?>">
                        </div>
                        <div class="copy-wrapper">
                            <p class="italic-text"><em><?php echo $featured_att['short_description']; ?></em></p>
                            <a href="<?php echo $featured_att['awards_page_link']; ?>" class="view-all-link">View Firm Awards</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="panel-3">
        <div class="container wrapper wrapper-900">
            <div class="columns">
                <div class="column-full block">
                    <?php the_field('p3_main_copy'); ?>
                </div>
            </div>
        </div>
    </section>

</div>


<?php get_footer();?>
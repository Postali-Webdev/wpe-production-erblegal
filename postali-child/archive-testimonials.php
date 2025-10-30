<?php 

$banner_data = [
    'image'     => get_field('testimonials_banner_background_image', 'options'),
    'title'     => get_field('testimonials_banner_title', 'options'),
    'sub-title' => get_field('testimonials_banner_sub_title', 'options'),
    'publish-date'  => false,
    'category'      => false
];

get_header(); ?>

<div id="results-page" class="bg-dk-blue">

    <?php get_template_part('block', 'simple-banner', [ 'data' => [ 'banner' => $banner_data ] ] ); ?>

    <?php if( have_posts() ) : ?>
    <section id="panel-2">
        <div class="container wrapper wrapper-1200">
            <div class="columns">
                <div class="column-full block">
                    <div class="testimonials-container">
                    <?php while( have_posts() ) : the_post(); ?>
                        <div class="testimonial">
                            <p>“<?php echo get_field('testimonial'); ?>”</p>
                            <p class="dual-fonts"><span class="cursive-text red"><?php the_field('first_name'); ?></span> <?php the_field('last_name'); ?></p>
                        </div>
                    <?php endwhile; ?>
                    </div>
                    <?php echo get_pagination(); ?>
                </div>
            </div>
        </div>
    </section>
    <?php endif; wp_reset_postdata(); ?>

    <section id="panel-3" class="wrapper wrapper-1640">
        <div class="container">
            <div class="column-full">
                <?php get_template_part('block', 'closing-cta', [ 'data' => ['cta' => get_field('testimonials_closing_cta', 'options')] ] ); ?>
            </div>
        </div>
    </section>

</div>

<?php get_footer(); ?>


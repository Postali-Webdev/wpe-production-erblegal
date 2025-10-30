<?php 

$banner_data = [
    'image'     => get_field('results_banner_background_image', 'options'),
    'title'     => get_field('title'),
    'sub-title' => "Written by Erb Legal LLC",
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
                    <div class="results-container">
                    <?php while( have_posts() ) : the_post(); ?>
                        <div class="result">
                            <p><?php the_field('copy') ?></p>
                            <p><em><?php the_field('disclaimer'); ?></em></p>
                            <a target="_blank" href="<?php the_field('button_link'); ?>" class="btn white"><?php the_field('button_title'); ?></a>
                        </div>
                    <?php endwhile; ?>
                    </div>
                    <?php echo get_pagination(); ?>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

</div>

<?php get_footer(); ?>


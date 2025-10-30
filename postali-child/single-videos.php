<?php get_header(); 

$banner_data = [
    'image'         => get_field('videos_banner_background_image', 'options'),
    'title'         => get_field('title'),
    'sub-title'     => get_field('video_description'),
    'publish-date'  => false,
    'category'      => false
];

?>

<div id="videos-page" class="bg-dk-blue">
    
    <?php get_template_part('block', 'simple-banner', [ 'data' => [ 'banner' => $banner_data ] ] ); ?>

    <?php if( have_posts() ) : ?>
    <section id="panel-2">
        <div class="container wrapper wrapper-1640">
            <div class="columns">
                <div class="column-full block">
                    <div class="videos-wrapper">
                        <?php while( have_posts() ) : the_post(); 
                        $video_thumb = get_field('video_thumbnail'); ?>
                            <div class="video">
                                <div class="top-wrapper">
                                    <?php if( $video_thumb ) : ?>
                                        <img src="<?php echo $video_thumb['url']; ?>" alt="<?php echo $video_thumb['alt']; ?>">
                                    <?php endif; ?>
                                </div>
                                <a href="<?php the_field('video_embed_url'); ?>" class="video-link" data-lity></a>
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
                <?php get_template_part('block', 'closing-cta', [ 'data' => ['cta' => get_field('videos_closing_cta', 'options')] ] ); ?>
            </div>
        </div>
    </section>

</div>

<?php get_footer(); ?>
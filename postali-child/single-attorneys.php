<?php 

//ACF Fields
$hero_bg = get_field('bio_image');

get_header(); ?>

<div id="attorney-bio" class="bg-dk-blue">
    
    <section id="banner">
        <div class="columns">
            <div class="column-33">
                <?php if($hero_bg) : ?><img src="<?php echo $hero_bg['url']; ?>" alt="<?php echo $hero_bg['alt']; ?>" class="banner-background"><?php endif; ?>
                <div class="quote-wrapper">
                    <p class="sub-title"><?php the_field('quote'); ?></p>
                    <p class="dual-fonts"><span class="cursive-text red"><?php the_field('first_name') ?></span> <?php the_field('last_name'); ?></p>
                </div>
            </div>
            <div class="column-66">
                <div class="intro-wrapper">
                    <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
                    <h1>About <?php echo get_field('first_name') . ' ' . get_field('last_name'); ?></h1>
                    <?php the_field('intro_copy'); ?>
                </div>
            </div>
        </div>
    </section>

    <span id="main-content"></span>

    <?php if(!is_single(array(1246, 1447))) { ?>

    <section id="panel-2">
        <?php get_template_part('block', 'awards-slider'); ?>
    </section>

    <?php } ?>

    <section id="panel-3">
        <div class="container wrapper wrapper-900">
            <div class="columns">
                <div class="column-full block">
                    <?php the_field('main_copy'); ?>
                </div>
            </div>
        </div>
    </section>

    <section id="panel-4">
        <div class="container full">
            <div class="columns">
                <div class="column-full">
                    <?php get_template_part('block', 'featured-testimonial', ['data' => ['testimonial' => get_field('testimonial') ] ]); ?>
                </div>
            </div>
        </div>
    </section>

    <?php if( have_rows('credentials_list') ) : ?>
    <section id="panel-5">
        <div class="container wrapper wrapper-900">
            <div class="columns">
                <div class="column-full block">
                    <?php while( have_rows('credentials_list') ) : the_row(); ?>
                        <div class="credential-list">
                            <p class="title red"><?php the_sub_field('title'); ?></p>
                            <?php if( have_rows('list') ) : ?>
                                <ul>
                                    <?php while( have_rows('list') ) : the_row(); 
                                    $list_item = get_sub_field('list_item'); ?>
                                    <?php if( $list_item['is_linked'] ) : ?>
                                        <li><a href="<?php echo esc_url($list_item['title_and_link']['url']); ?>"><?php echo esc_html($list_item['title_and_link']['title']); ?></a></li>
                                    <?php else : ?>
                                        <li><?php echo $list_item['title']; ?></li>
                                    <?php endif; ?>
                                    <?php endwhile; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

</div>




<?php get_footer(); ?>
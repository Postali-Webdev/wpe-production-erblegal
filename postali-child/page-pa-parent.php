<?php
/**
 * Template Name: Practice Area Parent
 * @package Postali Child
 * @author Postali LLC
**/

get_header();

//ACF Fields
$hero_bg = get_field('hero_background_image');
$featured_att = get_field('hero_featured_attorney');
$hero_lower_group = get_field('hero_below_the_fold');
?>

<div id="pa-parent" class="bg-dk-blue">
    <section id="banner">
        <div class="img-bg-wrapper">
        <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
        <?php if($hero_bg) : ?><img src="<?php echo $hero_bg['url']; ?>" alt="<?php echo $hero_bg['alt']; ?>" class="banner-background"><?php endif; ?>
            <div class="container wide">
                <div class="columns">
                    <div class="column-50">
                        <div class="copy-wrapper">
                            <h1><?php the_field('hero_title'); ?></h1>
                            <p class="sub-title"><?php the_field('hero_cta_copy'); ?></p>
                            <div class="cta-wrapper">
                                <p class="dual-fonts"><?php the_field('hero_cursive_copy'); ?></p>
                                <a href="tel:<?php the_field('phone_number', 'options'); ?>" class="btn"><?php the_field('phone_number', 'options'); ?></a>
                            </div>
                        </div>
                        <p class="view-all-link">Scroll To Read More</p>
                    </div>
                    <div class="column-50 block">
                        <div class="attorney-postcard">
                            <div class="image-outer-wrapper">
                                <div class="image-inner-wrapper">
                                    <img class="headshot" src="<?php echo $featured_att['headshot']['url']; ?>" alt="<?php echo $featured_att['headshot']['url']; ?>">
                                    <p class="dual-fonts"><?php echo $featured_att['name']; ?></p>
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
        </div>
        <div class="bg-blue hero-below-fold">
            <div class="container wide">
                <div class="columns">
                    <div class="column-50 block">
                        <h2><?php echo $hero_lower_group['title_h2']; ?></h2>
                        <?php echo $hero_lower_group['copy']; ?>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>

    <section id="body-wrapper">
        <?php 
            if( have_rows('body') ) {
                while( have_rows('body') ) {
                    the_row();

                    if( get_row_layout() == 'copy' ) {
                        ?> 
                        <?php if( get_sub_field('light_blue_background') ) : ?> 
                            <div class="bg-off-blue">
                        <?php endif; ?>
                        <section class="wrapper wrapper-900">
                            <div class="container">
                                <div class="columns">
                                    <div class="column-full block">
                                        <?php the_sub_field('copy'); ?>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <?php if( get_sub_field('light_blue_background') ) : ?> 
                        </div>    
                        <?php endif; ?>
                        <?php
                    }

                    if( get_row_layout() == 'testimonial_block' ) { ?>
                        <section class="wrapper wrapper-1640">
                            
                            <div class="columns">
                                <div class="column-full center block">
                                    <?php get_template_part('block', 'featured-testimonial', ['data' => ['testimonial' => get_sub_field('testimonial') ] ]); ?>
                                </div>
                            </div>
                            
                        </section>
                    <?php }
                    
                    if( get_row_layout() == 'cta_block' ) { ?>
                        <section class="wrapper wrapper-1920">
                            <div class="columns">
                                <div class="column-full center block">
                                    <?php get_template_part('block', 'closing-cta', [ 'data' => ['cta' => get_sub_field('cta')] ] ); ?>
                                </div>
                            </div>
                        </section>
                    <?php }

                    if( get_row_layout() == 'awards_slider' ) { 
                        if( get_sub_field('enable_awards_slider') ) { ?>
                        <section class="wrapper wrapper-1920">
                            <div class="columns">
                                <div class="column-full center block">
                                    <?php get_template_part('block', 'awards-slider'); ?>
                                </div>
                            </div>
                        </section>
                    <?php }
                    }
                    
                    if( get_row_layout() == 'list' ) { ?>
                        <?php if( get_sub_field('light_blue_background') ) : ?> 
                            <div class="bg-off-blue">
                        <?php endif; ?>
                        <section class="wrapper wrapper-1200 list-el">
                            <div class="container">
                                <div class="columns">
                                    <div class="column-full center block">
                                        <div class="wrapper wrapper-900">
                                            <?php if( get_sub_field('section_title') ) : ?>
                                                <h2><?php the_sub_field('section_title'); ?></h2>
                                            <?php endif; ?>
                                            <?php if( get_sub_field('section_copy') ) {
                                                the_sub_field('section_copy');
                                            } ?>
                                        </div>

                                        <?php $list_arr = get_sub_field('list'); ?> 
                                        <div class="list-wrapper">     
                                        <?php foreach( $list_arr as $item ) {
                                            if( $item['accordion_list'] ) { ?>
                                                <div class="accordions">
                                                    <div class="accordions_title">
                                                        <h4><?php echo esc_html( $item['accordion_title']) ?></h4>
                                                    </div>
                                                    <div class="accordions_content">
                                                        <?php echo $item['accordion_copy']; ?>
                                                    </div>
                                                </div>     
                                            <?php } else { ?>
                                                
                                                <div class="list-item<?php if( $item['link'] ) { echo ' list-item-linked'; } ?>">
                                                    <?php if( $item['link'] ) : ?>
                                                        <a class="link" title="<?php echo esc_html( $item['title'] ); ?>" href="<?php echo esc_url( $item['link'] ); ?>"></a>
                                                    <?php endif; ?>
                                                    <h4><?php echo esc_html( $item['title'] ); ?></h4>
                                                </div>
                                            <?php }
                                        } ?>
                                        </div>
                        
                                    </div>
                                </div>
                            </div>
                        </section>
                        <?php if( get_sub_field('light_blue_background') ) : ?> 
                            </div>
                        <?php endif; ?>
                    <?php }





                }
            }
        
        
        ?>
        <?php ?>
    </section>
</div>

<?php get_footer();?>
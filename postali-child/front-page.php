<?php
/**
 * Template Name: Front Page
 * @package Postali Child
 * @author Postali LLC
**/
get_header();

global $post;
$current_post_ID = $post->ID;

$courthouse_locations = "all";

if( $current_post_ID == '764' ) {
    $courthouse_locations = "summit";
} else if( $current_post_ID == '769' ) {
    $courthouse_locations = "medina";
} else if( $current_post_ID == '771' ) {
    $courthouse_locations = "portage";
}

//ACF Fields
$hero_bg = get_field('hero_image');
$logo_img = get_field('hero_erb_logo');
$p2_video_thumb = get_field('p2_video_embed_thumbnail');
$p5_left_col = get_field('p5_left_column');
$p5_center_col = get_field('p5_center_column');
$p5_right_col = get_field('p5_right_column');
?>

<div id="front-page" class="bg-dk-blue">

<section id="banner">
    <?php if($hero_bg) : ?><img src="<?php echo $hero_bg['url']; ?>" alt="<?php echo $hero_bg['alt']; ?>" class="banner-background"><?php endif; ?>
    <div class="container wide">
        <div class="columns">
            <div class="column-50">
                <h1><?php the_field('hero_title'); ?></h1>
                <div class="cta-wrapper">
                    <p class="cta-title"><?php the_field('hero_cta_copy'); ?></p>
                    <?php if(is_page('1438')) { ?>
                    <a href="tel:419-548-5944" class="btn">419-548-5944</a>
                    <?php } else { ?>
                    <a href="tel:<?php the_field('phone_number', 'options'); ?>" class="btn"><?php the_field('phone_number', 'options'); ?></a>
                    <?php } ?>
                </div>
            </div>
            <div class="column-50 block">
                <?php if( have_rows('hero_attorney_names') ) : ?>
                <div class="name-wrapper">
                <?php while( have_rows('hero_attorney_names') ) : the_row(); ?>
                    <p class="dual-fonts"><?php the_sub_field('attorney_name'); ?></p>
                <?php endwhile; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="columns awards-row">
            <div class="column-50">
                <?php if($logo_img) : ?><img src="<?php echo $logo_img['url']; ?>" alt="<?php echo $logo_img['url']; ?>" class="erb-logo"><?php endif; ?>
            </div>
            <div class="column-50 block">
                <p class="review-sub-title">
                    <?php the_field('hero_review_copy'); ?>
                </p>
                <?php if( have_rows('hero_review_badges') ) : ?>
                <div class="review-badge-wrapper">
                <?php while( have_rows('hero_review_badges') ) : the_row(); $badge_img = get_sub_field('badge'); ?>
                    <?php if($badge_img) : ?><img src="<?php echo $badge_img['url']; ?>" alt="<?php echo $badge_img['url']; ?>" class="reviews-badge"><?php endif; ?>
                <?php endwhile; ?>
                </div>
                <?php endif; ?>
                <?php the_field('hero_copy'); ?>
            </div>
        </div>
    </div>
</section>

<section id="panel-2" class="wrapper wrapper-1200">
    <div class="container">
        <div class="columns">
            <div class="column-50">
                <p class="dual-fonts"><?php the_field('p2_panel_label'); ?></p>
            </div>
        </div>
        <div class="spacer-60"></div>
        <div class="columns">
            <div class="column-50 block">
                <h2><?php the_field('p2_panel_title'); ?></h2>
                <p class="sub-title"><?php the_field('p2_panel_sub_title'); ?></p>
            </div>
            <div class="column-50">
                <?php the_field('p2_panel_copy'); ?>
            </div>
        </div>
        <?php if( have_rows('p2_attorneys') ) : ?>
            <div class="attorney-wrapper">
                <?php while( have_rows('p2_attorneys') ) : the_row(); 
                $att_obj = get_sub_field('attorney');
                $post_ID = $att_obj->ID;
                $attorney_img = get_field('bio_image', $post_ID);
                $attorney_link = get_the_permalink( $post_ID );
                $attorney_fist_name = get_field('first_name', $post_ID);
                $attorney_last_name = get_field('last_name', $post_ID); ?>
                <div class="attorney-item">
                    <?php if( $attorney_img ) : ?><img src="<?php echo $attorney_img['url']; ?>" alt="<?php echo $attorney_img['alt']; ?>"><?php endif; ?>
                    <div class="copy-wrapper">
                        <h3><?php echo $attorney_fist_name . ' ' . $attorney_last_name; ?></h3>
                        <a href="<?php echo esc_url($attorney_link); ?>" class="btn">Read <?php echo $attorney_fist_name; ?>'s Bio</a>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
        <?php if( have_rows('awards', 'options') ) : $count = 0;?>
        <div class="columns">
            <div class="column-full">
                <div class="awards-wrapper">
                    <?php while( have_rows('awards', 'options') ) : the_row(); $count++;
                    $award_obj = get_sub_field('award'); 
                    if( $count < 5 ) : ?>        
                        <img src="<?php echo esc_url($award_obj['url']); ?>" alt="<?php echo esc_html($award_obj['alt']); ?>" class="award">
                    <?php endif;
                 endwhile; ?>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <div class="spacer-60"></div>
        <div class="columns">
            <div class="column-50 block">
                <h3><?php the_field('p2_lower_panel_title'); ?></h3>
                <div class="spacer-30"></div>
                <p><?php the_field('p2_lower_panel_copy'); ?></p>
            </div>
            <div class="column-50 block">
                <?php if( have_rows('p2_numbered_reasons_list') ) : $count = 0; ?>
                    <div class="numbered-list">
                    <?php while( have_rows('p2_numbered_reasons_list') ) : the_row(); $count++; ?>
                        <div class="numbered-item">
                            <p class="large-text"><?php echo ($count < 10 ? '0' : '') . $count; ?></p>    
                            <span class="horizontal-divide"></span>
                            <p class="reason"><?php the_sub_field('reason'); ?></p>
                        </div>    
                    <?php endwhile; ?>
                    </div>
                <?php endif; ?>
                <div class="spacer-30"></div>
                <p><em><?php the_field('p2_italic_copy'); ?></em></p>
            </div>
        </div>
        <?php if( get_field('p2_video_embed_url') ) : ?>
        <div class="columns">
            <div class="column-full center">
                <div class="video-popup" style="background-image:url('<?php echo esc_url($p2_video_thumb['url']); ?>');">
                    <a href="<?php echo esc_url( get_field('p2_video_embed_url') ); ?>" data-lity></a>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>

<section id="panel-3">
    <div class="container full">
        <div class="columns">
            <div class="column-full">
                <?php get_template_part('block', 'featured-testimonial', ['data' => ['testimonial' => get_field('p3_featured_testimonial_block') ] ]); ?>
            </div>
        </div>
    </div>
</section>

<section id="panel-4" class="wrapper wrapper-1200">
    <div class="container">
        <div class="columns">
            <div class="column-full center block">
                 <p class="dual-fonts"><?php the_field('p4_panel_label'); ?></p>
                 <h2><?php the_field('p4_panel_title'); ?></h2>
                 <p class="sub-title"><?php the_field('p4_sub_title'); ?></p>
                 <?php if( have_rows('p4_featured_practice_areas') ) : ?>
                    <div class="pa-wrapper">
                    <?php while( have_rows('p4_featured_practice_areas') ) : the_row(); 
                        $bg_image = get_sub_field('background_image'); ?>
                        <div class="practice-area">
                            <img src="<?php echo $bg_image['url']; ?>" alt="<?php echo $bg_image['alt']; ?>" class="background-img">
                            <div class="copy-wrapper">
                                <h3><?php the_sub_field('title'); ?></h3>
                                <p><?php the_sub_field('copy'); ?></p>
                            </div>
                            <a href="<?php the_sub_field('page_link'); ?>" class="btn">Learn More About <?php the_sub_field('title'); ?></a>
                        </div>
                    <?php endwhile; ?>
                    </div>
                 <?php endif; ?>
                 <a href="<?php the_field('p4_all_practice_areas_link'); ?>" class="view-all-link">See more practice areas we handle</a>
            </div>
        </div>
    </div>
</section>

<section id="panel-5" class="wrapper wrapper-1640">
    <div class="container">
        <div class="columns">
            <div class="column-33">
                <h2 class="mobile-section-title"><?php the_field('p5_panel_title'); ?></h2>
                <div class="left-col-wrapper">
                    <img src="<?php echo esc_url($p5_left_col['partners_image']['url']); ?>" alt="<?php echo esc_url($p5_left_col['partners_image']['alt']); ?>" class="partner-img">
                    <div class="copy-wrapper">
                        <?php echo $p5_left_col['location_copy']; ?>
                    </div>
                </div>
            </div>
            <div class="column-66">
                <div class="columns">
                    <h2 class="desktop-section-title"><?php the_field('p5_panel_title'); ?></h2>
                    <div class="column-50">
                        <h3><?php echo $p5_center_col['column_title']; ?></h3>
                        <?php if( have_rows('courthouses', 'options') ) : $count = 0; ?>
                            <ul>
                                <?php while( have_rows('courthouses', 'options')  ) : the_row(); $count++;
                                    $courthouses_link = get_sub_field('courthouse_link');                                 
                                    $county = get_sub_field('county');
                                    if( $courthouse_locations ==  $county ) : ?>
                                        <li><a target="_blank" href="<?php echo esc_url($courthouses_link['url']); ?>"><?php echo esc_html($courthouses_link['title']); ?></a></li>
                                    <?php elseif( $courthouse_locations == "all" && $county !== 'medina' && $county !== 'wayne' ) : ?>
                                        <li><a target="_blank" href="<?php echo esc_url($courthouses_link['url']); ?>"><?php echo esc_html($courthouses_link['title']); ?></a></li>
                                    <?php endif; ?>
                                    
                                <?php endwhile; ?>
                            </ul>
                            <a href="<?php echo esc_url( $p5_center_col['all_courthouses_link'] ); ?>" class="view-all-link">View All Courthouses</a>
                        <?php endif; ?>
                    </div>
                    <div class="column-50">
                        <div class="copy-wrapper">
                            <h3><?php echo $p5_right_col['column_title']; ?></h3>
                            <p><?php echo $p5_right_col['column_copy']; ?></p>
                        </div>
                        <a href="<?php echo esc_url( $p5_right_col['contact_page_link'] ); ?>" class="view-all-link">Contact Us For Pricing Options</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="panel-6" class="wrapper wrapper-1640">
    <div class="container full">
        <div class="columns">
            <div class="column-full block center">
                <p class="dual-fonts"><?php echo get_field('p6_panel_label'); ?></p>
                <h2>Our Blog</h2>
                <?php get_template_part('block', 'recent-posts'); ?>
                <a href="<?php the_field('p6_blogs_page_link') ?>" class="btn">View All Blogs</a>
            </div>
        </div>
    </div>
</section>

<section id="panel-7" class="wrapper wrapper-1640">
    <div class="container">
        <div class="column-full">
            <?php get_template_part('block', 'closing-cta', [ 'data' => ['cta' => get_field('closing_cta_block')] ] ); ?>
        </div>
    </div>
</section>


</div><!-- #front-page -->

<?php get_footer();?>
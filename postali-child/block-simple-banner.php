<?php 

$banner_data = $args['data']['banner'];
$hero_bg = $banner_data['image'];
$hero_title = $banner_data['title'];
$hero_subtitle = $banner_data['sub-title'];
$hero_date = $banner_data['publish-date'];
$hero_category = $banner_data['category'];

global $post;
$current_post_ID = $post->ID;
$parent_ID = wp_get_post_parent_id( $post->ID );
$grandparent_ID = wp_get_post_parent_id( $parent_ID );
$greatgrandparent_ID = wp_get_post_parent_id( $grandparent_ID );

?>


<section id="banner" class="simple-banner">
    <div class="img-bg-wrapper">
        <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
        <?php if($hero_bg) : ?><img src="<?php echo $hero_bg['url']; ?>" alt="<?php echo $hero_bg['alt']; ?>" class="banner-background"><?php endif; ?>
        <div class="container wrapper wrapper-900">
            <div class="columns ">
                <div class="column-full block">
                    <?php if( $hero_date ) : ?><p class="red date"><?php echo $hero_date; ?></p><?php endif; ?>
                    <?php if( $hero_title ) : ?><h1><?php echo $hero_title; ?></h1><?php endif; ?>
                    <?php if( $hero_subtitle ) : ?><p class="sub-title"><?php echo $hero_subtitle; ?></p><?php endif; ?>
                    <?php if( $hero_category ) : ?><p class="category">Category: <a href="<?php echo esc_url( $hero_category['url'] ); ?>"><?php echo esc_html($hero_category['title'] ); ?></a></p><?php endif; ?>
                    <?php if(  have_rows('locations', 'options') ) {
                        $locations_total = count(get_field('locations', 'options'));
                        $count = 0;
                        $has_location = false;
                        while( have_rows('locations', 'options') ) {
                            the_row(); 
                            $count++;
                            $location_page = get_sub_field('location_page');
                            if( $location_page->ID == $current_post_ID || $location_page->ID == $parent_ID || $location_page->ID == $grandparent_ID || $location_page->ID == $greatgrandparent_ID ) { 
                                $has_location = true; ?>
                                <a href="tel:<?php the_sub_field('phone_number'); ?>" class="btn"><?php the_sub_field('phone_number'); ?></a>
                            <?php } elseif( !$has_location ) { 
                                if( $count == $locations_total ) { ?>
                                    <a href="tel:<?php the_field('phone_number', 'options'); ?>" class="btn"><?php the_field('phone_number', 'options'); ?></a>
                                <?php }    
                            }
                        }   
                    } ?>
                </div>
            </div>
        </div>
    </div>
</section>
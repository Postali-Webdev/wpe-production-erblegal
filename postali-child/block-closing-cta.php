<?php 
$cta_obj = $args['data']['cta'];

global $post;
$current_post_ID = $post->ID;
$parent_ID = wp_get_post_parent_id( $post->ID );
$grandparent_ID = wp_get_post_parent_id( $parent_ID );
$greatgrandparent_ID = wp_get_post_parent_id( $grandparent_ID );

?>

<div class="closing-cta-block">
    <h2><?php echo $cta_obj['block_title']; ?></h2>
    <p class="sub-title"><?php echo $cta_obj['block_copy']; ?></p>
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
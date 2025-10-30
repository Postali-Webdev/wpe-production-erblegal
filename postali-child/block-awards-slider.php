<?php global $post;

$post_id = $post->ID;

if( is_singular('attorneys') ) { 
    $name = get_field('first_name', $post_id) == "Thomas" ? "tom" : get_field('first_name', $post_id) ;
    $name .= "'s";
} else {
    $name = 'Our';
} ?>

<div class="awards-block">
    <div class="title-wrapper">
        <p class="dual-fonts"><span class="cursive-text red"><?php echo $name; ?></span> Awards</p>
        <div class="line-ruler"></div>
    </div>
    <?php if( have_rows('awards', 'options') ) : ?>
    <div class="awards-outer-wrapper">
        <div class="awards-inner-wrapper">
            <?php while( have_rows('awards', 'options') ) : the_row(); 
            $award_img = get_sub_field('award'); ?>

            <?php if( is_singular('attorneys') ) { 
                $attorney_arr = get_sub_field('attorney'); 
                if( $attorney_arr ) {
                    foreach( $attorney_arr as $attorney) {
                        if( $attorney->ID === $post_id ) : ?> 
                            <div class="award">
                                <img src="<?php echo esc_url($award_img['url']); ?>" alt="<?php echo esc_html($award_img['alt']); ?>">
                                <p><?php the_sub_field('description'); ?></p>
                            </div> 
                        <?php endif;
                    }
                }
            } else { ?>
                <div class="award">
                    <img src="<?php echo esc_url($award_img['url']); ?>" alt="<?php echo esc_html($award_img['alt']); ?>">
                    <p><?php the_sub_field('description'); ?></p>
                </div>
            <?php } ?>
            
            <?php endwhile; ?>
        </div>
    </div>
    <?php endif; ?>
</div>
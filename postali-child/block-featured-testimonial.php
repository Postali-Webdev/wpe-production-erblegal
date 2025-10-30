<?php
$testimonial_obj = $args['data']['testimonial'];
$bg_image = $testimonial_obj['reviews_background_image'] ? $testimonial_obj['reviews_background_image']['url'] : '/wp-content/uploads/2021/04/reviews-background-img.jpg';
?>

<div class="review-wrapper wrapper wrapper-1640" style="background-image:url('<?php echo esc_url($bg_image); ?>');">
    <div class="columns">
        <div class="column-50 block">
            <p class="dual-fonts"><?php echo $testimonial_obj['panel_label']; ?></p>
            <img class="stars" src="/wp-content/uploads/2021/04/5-star-review-icon.svg" alt="5 stars">
            <div class="title-wrapper">
                <p class="quote">“</p>
                <h2><?php echo $testimonial_obj['bold_quote']; ?></h2>
            </div>
        </div>
        <div class="column-50 block">
            <p class="sub-title"><?php echo $testimonial_obj['thin_quote']; ?>"</p>
            <img src="<?php echo $testimonial_obj['review_source_logo']['url']; ?>" alt="<?php echo $testimonial_obj['review_source_logo']['alt']; ?>" class="review-logo">
            <a href="<?php echo $testimonial_obj['all_reviews_page_link']; ?>" class="btn">See All Reviews</a>
        </div>
    </div>
</div>
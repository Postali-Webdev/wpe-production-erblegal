<?php 
$args = array( 
    'posts_per_page'    => 4, 
    'posts_type'         => 'posts',
    'posts__not_in'      => array( $post->ID )
);
$post_query = new WP_Query($args);

?>

<div class="recent-posts-block">
    <?php if( $post_query->have_posts() ) : ?>
    <div class="recent-posts-wrapper">
        <?php while( $post_query->have_posts() ) : $post_query->the_post(); 
            foreach (get_the_category() as $cat) { 
                $category_name = $cat->name; 
                $category_link = '/blog/category/' . $cat->slug . '/';
            } ?>
            <div class="recent-post">
                <div class="top-wrapper">
                    <img src="<?php echo get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : '/wp-content/uploads/2023/04/erb-blog-What-to-consider-when-offered-a-plea-bargain.jpg'; ?>" alt="featured blog post image">
                    <p class="date"><?php echo the_date('F d, Y'); ?></p>
                    <p class="title"><?php echo get_the_title(); ?></p>
                    <p class="category">Category: <a href="<?php echo esc_url($category_link); ?>"><?php echo $category_name; ?></a></p>
                </div>
                <a href="<?php echo get_the_permalink(); ?>" class="blog-link view-all-link">Read Blog</a>
            </div>
        <?php endwhile; ?>
    </div>
    <?php endif; wp_reset_postdata(); ?>
</div>
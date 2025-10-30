<?php

if( is_home() || is_category() ) {
	$post_id = 502; 
}

 $banner_data = [
    'image'     => get_field('blog_background_image', $post_id),
    'title'     => get_field('blog_hero_title', $post_id),
    'sub-title' => get_field('blog_sub_title', $post_id),
    'publish-date'  => false,
    'category'      => false
];

get_header(); ?>



<div id="blogs-page" class="bg-dk-blue">

    <?php get_template_part('block', 'simple-banner', [ 'data' => [ 'banner' => $banner_data ] ] ); ?>

    <?php if( have_posts() ) : ?>
    <section id="panel-2">
        <div class="container wrapper wrapper-1640">
            <div class="columns">
                <div class="column-full block">
                    <div class="posts-wrapper">
                        <?php while( have_posts() ) : the_post(); 
                        foreach (get_the_category() as $cat) { 
                            $category_name = $cat->name; 
                            $category_link = '/blog/category/' . $cat->slug . '/';
                        } ?>
                            <div class="post">
                                <div class="top-wrapper">
                                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="featured blog post image">
                                    <p class="date"><?php echo the_date('F d, Y'); ?></p>
                                    <p class="title"><?php echo get_the_title(); ?></p>
                                    <p class="category">Category: <a href="<?php echo esc_url($category_link); ?>"><?php echo $category_name; ?></a></p>
                                </div>
                                <a href="<?php echo get_the_permalink(); ?>" class="blog-link view-all-link">Read Blog</a>
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
            <?php get_template_part('block', 'closing-cta', [ 'data' => ['cta' => get_field('cta_block', $post_id)] ] ); ?>
        </div>
    </div>
</section>

</div>






<?php get_footer(); ?>
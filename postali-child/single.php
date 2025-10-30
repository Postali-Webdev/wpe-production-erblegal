<?php
get_header();

if( have_posts() ) {
    while( have_posts() ) {
        the_post();

        foreach (get_the_category() as $cat) { 
            $category_arr = [
                'title' => $cat->name,
                'url' => '/blog/category/' . $cat->slug . '/'
            ];
        }
        
        $banner_img = [
            'url'   => get_the_post_thumbnail_url(),
            'alt'   => 'blog featured image'
        ];

         $banner_data = [
            'image'     => $banner_img,
            'title'     => get_the_title(),
            'sub-title' => "Written by Erb Legal LLC",
            'publish-date'  => get_the_date('F d, Y'),
            'category'      => $category_arr
        ]; ?>

        <div id="blog-post" class="bg-dk-blue">
            <?php get_template_part('block', 'simple-banner', [ 'data' => [ 'banner' => $banner_data ] ] ); ?>
            
            <section id="panel-2">
                <div class="container wrapper wrapper-900">
                    <div class="columns">
                        <div class="column-full block">
                            <?php echo the_content(); ?>
                        </div>
                    </div>
                </div>
            </section>

            <section id="panel-3" class="wrapper wrapper-1920">
                <div class="container full">
                    <div class="columns">
                        <div class="column-full block center">
                            <p class="dual-fonts"><span class="cursive-text red">legal</span> Blog</p>
                            <?php get_template_part('block', 'recent-posts'); ?>
                            <a href="/blog/" class="btn">View All Blogs</a>
                        </div>
                    </div>
                </div>
            </section>

        </div>

    <?php }
} wp_reset_postdata(); ?>

<?php get_footer(); ?>


 


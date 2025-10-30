<?php
/**
 * Template Name: Sitemap
 * @package Postali Child
 * @author Postali LLC
**/


get_header();


?>

<div id="default-page" class="bg-dk-blue">

    <section id="banner" class="simple-banner">
        <div class="img-bg-wrapper">
            <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
            <img src="/wp-content/uploads/2021/04/practice-areas-landing-header-img.jpg" alt="lawyers walking" class="banner-background">
            <div class="container wrapper wrapper-900">
                <div class="columns ">
                    <div class="column-full block">
                        <h1>Sitemap</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section id="panel-2">
        <div class="container wrapper wrapper-900">
            <div class="columns">
                <div class="column-50 block">
                    <p class="red sm-title">PAGES</p>
                    <ul>
                    <?php
                    // Add pages you'd like to exclude in the exclude here
                    wp_list_pages(
                        array(
                            'exclude' => '',
                            'title_li' => '',
                        )
                    );
                    ?>
                    </ul>
                </div>

                <div class="column-50 block">
                    <p class="red sm-title">BLOG POSTS</p>
                    <?php
                    // Add categories you'd like to exclude in the exclude here
                    $cats = get_categories('exclude=');
                    foreach ($cats as $cat) {
                    echo "<li><h3>".$cat->cat_name."</h3>";
                    echo "<ul>";
                    query_posts('posts_per_page=-1&cat='.$cat->cat_ID);
                    while(have_posts()) {
                        the_post();
                        $category = get_the_category();
                        // Only display a post link once, even if it's in multiple categories
                        if ($category[0]->cat_ID == $cat->cat_ID) {
                        echo '<li><a href="'.get_permalink().'">'.get_the_title().'</a></li>';
                        }
                    }
                    echo "</ul>";
                    echo "</li>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <?php if( get_field('add_featured_testimonial_block') ) : ?>
    <section id="featured-testimonial-panel">
        <div class="container full">
            <div class="columns">
                <div class="column-full">
                    <?php get_template_part('block', 'featured-testimonial', ['data' => ['testimonial' => get_field('featured_testimonial_block') ] ]); ?>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <?php if( get_field('add_closing_cta_block') ) : ?>
    <section id="closing-cta-panel" class="wrapper wrapper-1640">
        <div class="container">
            <div class="column-full">
            <?php get_template_part('block', 'closing-cta', [ 'data' => ['cta' => get_field('closing_cta_block_default')] ] ); ?>
            </div>
        </div>
    </section>
    <?php endif; ?>


</div>

<?php get_footer(); ?>
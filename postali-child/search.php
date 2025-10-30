<?php
/**
 * @package Postali Child
 * @author Postali LLC
**/
get_header(); ?>

<div id="search-page" class="bg-dk-blue">

    <section id="banner">
        <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
        <div class="container wrapper wrapper-1200">
            <div class="columns">
                <div class="column-full block">
                    <h1>Search results for "<?php _e( get_search_query() ); ?>"</h1>
                </div>
            </div>
        </div>
    </section>

    
    <section id="panel-2">
        <div class="container wrapper wrapper-1200">
            <div class="columns">
                <div class="column-full block">
                    <?php if( have_posts() ) : ?>
                        <?php while( have_posts() ) : the_post(); ?>
                            <a class="result" href="<?php echo get_the_permalink(); ?>">
                                <p class="red date"><?php echo get_the_date(); ?></p>
                                <h3><?php echo get_the_title(); ?></h3>
                                <p class="copy">
                                    <?php 
                                        if ( has_excerpt() ) {
                                            the_excerpt();
                                        } else {
                                            excerpt_function($post->ID, $_GET['s']);
                                        } 
                                    ?>
                                </p>
                            </a>
                        <?php endwhile; ?>
                    <?php else : ?>
                        <p class="copy">No Results Available.</p>
                        <a href="/" class="btn">Return To Home</a>
                    <?php endif; ?>
                    <?php echo get_pagination(); ?>
                </div>
            </div>
        </div>
    </section>

</div>

<?php get_footer(); ?>
<?php
/**
 * @package Postali Child
 * @author Postali LLC
**/

get_header();

?>

<div id="error-page" class="bg-dk-blue">
        
    <section id="banner" class="simple-banner">
        <div class="img-bg-wrapper">
            <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
            <img src="/wp-content/uploads/2021/04/practice-areas-landing-header-img.jpg" alt="attorneys photo" class="banner-background">
            <div class="container wrapper wrapper-1200">
                <div class="columns ">
                    <div class="column-full block wrapper wrapper-480">
                        <h1>404</h1>
                        <p class="big-text">Oops! Our apologies, but this page seems to be missing.</p>
                        <p class="sub-text">This might be because you typed the address wrong, or the page you’re looking for may be been moved or deleted.</p>
                        <a href="/" class="btn">Take me to the homepage</a>
                        <a href="/awards/" class="view-all-link">View Our Awards</a>
                        <a href="/reviews/" class="view-all-link">View Our Client Testimonials</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php get_footer(); ?>
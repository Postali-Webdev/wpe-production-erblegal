<?php
/**
 * Template Name: Contact
 * @package Postali Child
 * @author Postali LLC
**/

get_header();

//ACF Fields
$hero_bg = get_field('hero_banner_background_image');
$banner_data = [
    'image'     => $hero_bg,
    'title'     => get_field('hero_title'),
    'sub-title' => get_field('hero_sub_title'),
    'publish-date'  => false,
    'category'      => false
];

?>

<div id="page-contact" class="bg-dk-blue">

    <?php get_template_part('block', 'simple-banner', [ 'data' => [ 'banner' => $banner_data ] ] ); ?>

    <section id="panel-2">
        <div class="container wrapper wrapper-1640">
            <div class="columns">
                <div class="column-50">
                    <?php echo do_shortcode( get_field('form_embed') ); ?>

                    <?php if( have_rows('videos') ): ?>
                    <?php while( have_rows('videos') ): the_row(); ?>  
                        <div class="video-popup" style="background-image:url('<?php the_sub_field('video_poster'); ?>');">
                            <a href="<?php the_sub_field('video_url'); ?>" data-lity=""></a>
                        </div>
                        <div class="spacer-30"></div>
                    <?php endwhile; ?>
                    <?php endif; ?> 

                </div>
                <?php if( have_rows('locations', 'options') ) : ?>
                <div class="column-50">
                    <div class="locations-column">
                        <div class="location">
                            <div class="title-wrapper">
                                <p class="title">Medina Office</p>
                                <div class="line-ruler"></div>
                            </div>
                            <div class="wrapper-50-50">
                                <div class="copy">
                                    <p>805 E WASHINGTON ST STE 220,  <br>Medina, OH 44256-3331</p>
                                    <p class="phone"><span class="red">PH: </span><a href="tel:330-574-7719"> 330-574-7719</a></p>
                                    <a href="https://goo.gl/maps/oUUqPP1cWZKPVRYp6" class="btn" target="_blank">Directions</a>
                                </div>
                                <div class="responsive-iframe">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12019.090013415956!2d-81.8479957!3d41.139492!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8830c9bfa927f609%3A0x7496711259277ecf!2sErb%20Legal%20LLC!5e0!3m2!1sen!2sus!4v1686849900754!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

</div>

<?php get_footer(); ?>
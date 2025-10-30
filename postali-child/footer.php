<?php
/**
 * Theme footer
 *
 * @package Postali Child
 * @author Postali LLC
**/

$location_count = count(get_field('locations', 'options'));

global $post;
$current_post_ID = $post->ID;
$parent_ID = wp_get_post_parent_id( $post->ID );
$grandparent_ID = wp_get_post_parent_id( $parent_ID );
$greatgrandparent_ID = wp_get_post_parent_id( $grandparent_ID );


$office_name = "Medina Office";
$address = "805 E WASHINGTON ST STE 220,  <br>Medina, OH 44256-3331";
$phone_number = "330-574-8063";
$directions_link = "https://goo.gl/maps/oUUqPP1cWZKPVRYp6";
$map_embed = "https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12019.090013415956!2d-81.8479957!3d41.139492!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8830c9bfa927f609%3A0x7496711259277ecf!2sErb%20Legal%20LLC!5e0!3m2!1sen!2sus!4v1686849900754!5m2!1sen!2sus";

?>
<footer class="bg-grey">

    <div class="footer-wrapper">
        <div class="left-col">
            <?php the_custom_logo(); ?>
            <?php if(  have_rows('locations', 'options') ) {
                $locations_total = count(get_field('locations', 'options'));
                $count = 0;
                $has_location = false;
                while( have_rows('locations', 'options') ) {
                    the_row(); 
                    $count++;
                    $location_page = get_sub_field('location_page');
                    if( $location_page->ID == $current_post_ID || $location_page->ID == $parent_ID || $location_page->ID == $grandparent_ID || $location_page->ID == $greatgrandparent_ID ) { 
                        $has_location = true; 
                        $office_name = get_sub_field('location_name');
                        $address = get_sub_field('address');
                        $phone_number = get_sub_field('phone_number');
                        $directions_link = get_sub_field('directions_link');
                        $map_embed = get_sub_field('map_embed');
                        ?>
                        <a href="tel:<?php the_sub_field('phone_number'); ?>" class="btn"><?php the_sub_field('phone_number'); ?></a>
                    <?php } elseif( !$has_location ) { 
                        if( $count == $locations_total ) { ?>
                            <a href="tel:<?php the_field('phone_number', 'options'); ?>" class="btn"><?php the_field('phone_number', 'options'); ?></a>
                        <?php }    
                    }
                }   
            } ?>
        </div>
        <div class="right-col">
            <div class="location-grid location-grid">
                <div class="location">
                    <div class="copy-wrapper">
                        <p class="red sm-title"><?php echo $office_name; ?></p>
                        <p><?php echo $address; ?></p>
                        <a href="tel:<?php echo $phone_number; ?>">PH: <?php echo $phone_number; ?></a>
                        <a class="directions" href="<?php echo $directions_link; ?>" target="_blank">DIRECTIONS</a>
                    </div>
                    <div class="responsive-iframe">
                        <iframe src="<?php echo $map_embed; ?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>    
                    </div>
                </div>
            </div>
            
            <div class="copyright">
                <div class="social-wrapper">
                    <p class="dual-fonts"><span class="cursive-text red">follow</span> us on social</p>
                    <?php if( have_rows('social_media_accounts', 'options') ) : ?>
                        <?php while( have_rows('social_media_accounts', 'options') ) : the_row();
                            $social_icon = get_sub_field('icon'); ?>
                            <a href="<?php the_sub_field('url'); ?>" target="_blank" class="social-icon" style="background-image:url('<?php echo $social_icon['url']; ?>');" title="link to <?php the_sub_field('name'); ?>"></a>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
                <p class="disclaimer"><?php the_field('disclaimer', 'options'); ?> <br><br> &copy; <?php echo date('Y'); ?> All Rights Reserved.</p>

                <div class="copyright-links"> 
                    <p class="red sm-title">Site Navigation</p>
                    <?php wp_nav_menu( [ 'container' => false, 'theme_location' => 'footer-nav' ] ); ?> 
                </div>

                <?php if(is_page_template('front-page.php')) { ?>
                <a href="https://www.postali.com" title="Site design and development by Postali" target="blank"><img src="https://www.postali.com/wp-content/themes/postali-site/img/postali-tag.png" alt="Postali | Results Driven Marketing" style="display:block; max-width:250px; margin:0 0 30px;"></a>
                <?php } ?>
            </div>

        </div>
    </div>
</footer>

    <!-- callrail script -->
    <script type="text/javascript" src="//cdn.callrail.com/companies/766141035/57b3c6f3970354d413fe/12/swap.js"></script>

    <!-- chat script -->
    <script src="https://blazeo.com/scripts/invitation.ashx?company=erblegal" async></script> 

    <?php wp_footer(); ?>

</body>
</html>
<?php
/**
 * Template Name: Courthouses
 * @package Postali Child
 * @author Postali LLC
**/

$banner_data = [
    'image'     => get_field('hero_background_image'),
    'title'     => get_field('hero_title'),
    'sub-title' => get_field('hero_sub_title'),
    'publish-date'  => false,
    'category'      => false
];

get_header(); ?>

<div id="courthouses-page" class="bg-dk-blue">
    <?php get_template_part('block', 'simple-banner', [ 'data' => [ 'banner' => $banner_data ] ] ); ?>
    
    <section id="panel-2">
        <div class="container wrapper wrapper-900">
            <div class="columns">
                <div class="column-full block">
                    <?php 
                    $couthouses_arr = get_field('courthouses', 'options');
                    $sorted_courthouses_arr = [];
                    
                    foreach( $couthouses_arr as $key => $courthouse ) {                        
                        $sorted_courthouses_arr[$courthouse['county']][$key] = $courthouse;
                    }

                    foreach( $sorted_courthouses_arr as $key => $county_arr ) {
                        $count = 0;
                        $county_arr_length = count($county_arr);
                        foreach( $county_arr as $county ) { 
                            $count++;
                            
                            if( $count == 1 ) {
                                echo '<p class="red title">' . $key . '</p><ul>';
                            }
                            echo "<li><a target='_blank' href='{$county['courthouse_link']['url']}'>{$county['courthouse_link']['title']}</a></li>";
                            if( $count == $county_arr_length ) {
                                echo '</ul>';
                            }
                        }
                    } ?>
                </div>
            </div>
        </div>
    </section>

    <section id="panel-3" class="wrapper wrapper-1640">
        <div class="container">
            <div class="column-full">
                <?php get_template_part('block', 'closing-cta', [ 'data' => ['cta' => get_field('closing_cta_block')] ] ); ?>
            </div>
        </div>
    </section>

</div>


<?php get_footer(); ?>
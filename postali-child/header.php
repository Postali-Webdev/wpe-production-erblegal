<?php
/**
 * Theme header.
 *
 * @package Postali Child
 * @author Postali LLC
**/


if( is_tree(764) ) { //akron
	$theme_location = 'header-nav-akron';
	$homepage_url = '/akron/';
} elseif( is_tree(769) ) { //medina
	$theme_location = 'header-nav-medina';
	$homepage_url = '/medina/';
} elseif( is_tree(771) ) { //ravenna
	$theme_location = 'header-nav-ravenna';
	$homepage_url = '/ravenna/';
} elseif( is_tree(1542) ) { //mansfield
	$theme_location = 'header-nav-mansfield';
	$homepage_url = '/mansfield/';
} elseif( is_tree(1438) ) { //strongsville
	$theme_location = 'header-nav-strongsville';
	$homepage_url = '/strongsville/';
}




 else { //global
	$theme_location = 'header-nav';
	$homepage_url = '/';
}

?><!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TPPDCWM');</script>
<!-- End Google Tag Manager -->

<!-- Add JSON Schema here -->
<?php 
// Global Schema
$global_schema = get_field('global_schema', 'options');
$akron_schema = get_field('akron_schema', 'options') ? get_field('akron_schema', 'options') : get_field('global_schema', 'options');
$medina_schema = get_field('medina_schema', 'options') ? get_field('medina_schema', 'options') : get_field('global_schema', 'options');
$portage_schema = get_field('portage_schema', 'options') ? get_field('portage_schema', 'options') : get_field('global_schema', 'options');
$mansfield_schema = get_field('mansfield_schema', 'options') ? get_field('mansfield_schema', 'options') : get_field('global_schema', 'options');
$strongsville_schema = get_field('strongsville_schema', 'options') ? get_field('strongsville_schema', 'options') : get_field('global_schema', 'options');

if( is_tree(764) ) { //akron
    echo '<script type="application/ld+json">' . $akron_schema . '</script>';
} elseif( is_tree(769) ) { //medina
    echo '<script type="application/ld+json">' . $medina_schema . '</script>';
} elseif( is_tree(771) ) { //ravenna
    echo '<script type="application/ld+json">' . $portage_schema . '</script>';
} elseif( is_tree(1542) ) { //mansfield
    echo '<script type="application/ld+json">' . $mansfield_schema . '</script>';
} elseif( is_tree(1438) ) { //strongsville
    echo '<script type="application/ld+json">' . $strongsville_schema . '</script>';
} else { //global
    echo '<script type="application/ld+json">' . $global_schema . '</script>';
}

// Single Page Schema
$single_schema = get_field('single_schema');
if ( !empty($single_schema) ) :
    echo '<script type="application/ld+json">' . $single_schema . '</script>';
endif; ?>

<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!--  ClickCease.com tracking-->
<script type='text/javascript'>var script = document.createElement('script');
    script.async = true; script.type = 'text/javascript';
    var target = 'https://www.clickcease.com/monitor/stat.js';
    script.src = target;var elem = document.head;elem.appendChild(script);
    </script>
    <noscript>
    <a href='https://www.clickcease.com' rel='nofollow'><img src='https://monitor.clickcease.com' alt='ClickCease'/></a>
    </noscript>
<!--  ClickCease.com tracking-->

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TPPDCWM"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

	<header>
		<div id="header-top">
			<div id="header-top_left">
			<a href="<?php echo $homepage_url; ?>" class="custom-logo-link" rel="home"><img src="/wp-content/uploads/2021/04/erb-logo.svg" class="custom-logo" alt="Erb Legal" decoding="async"></a>
			</div>
			
			<div id="header-top_right">
				<div id="header-top_menu">
						<?php
							$args = array(
								'container' => false,
								'theme_location' => $theme_location
							);
							wp_nav_menu( $args );
						?>			
					<div id="header-top_mobile">
						<div id="menu-icon" class="toggle-nav">
							<span class="line line-1"></span>
							<span class="line line-2"></span>
							<span class="line line-3"></span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

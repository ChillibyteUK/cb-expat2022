<?php
/**
 * The header for the theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package cb-hydronix
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, minimum-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <!-- <link rel="preload" href="<?php echo get_stylesheet_directory_uri(); ?>/fonts/poppins-v15-latin-300.woff2" as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="<?php echo get_stylesheet_directory_uri(); ?>/fonts/poppins-v15-latin-300.ttf" as="font" type="font/ttf" crossorigin="anonymous">
    <link rel="preload" href="<?php echo get_stylesheet_directory_uri(); ?>/fonts/poppins-v15-latin-600.woff2" as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="<?php echo get_stylesheet_directory_uri(); ?>/fonts/poppins-v15-latin-600.ttf" as="font" type="font/ttf" crossorigin="anonymous"> -->
<?php
if (get_field('ga_property', 'options')) { 
    ?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=<?=get_field('ga_property','options')?>"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', '<?=get_field('ga_property','options')?>');
</script>
    <?php
}
if (get_field('gtm_property', 'options')) {
    ?>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','<?=get_field('gtm_property','options')?>');</script>
<!-- End Google Tag Manager -->
    <?php
}
if (get_field('google_site_verification','options')) {
    echo '<meta name="google-site-verification" content="' . get_field('google_site_verification','options') . '" />';
}
if (get_field('bing_site_verification','options')) {
    echo '<meta name="msvalidate.01" content="' . get_field('bing_site_verification','options') . '" />';
}

wp_head();
?>
	
<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "Organization",
  "name": "Expatriate Healthcare",
  "alternateName": "Expatriate Group",
  "url": "https://www.expatriatehealthcare.com/",
  "logo": "https://www.expatriatehealthcare.com/wp-content/uploads/2018/01/EH-health-insurance-with-strap.jpg",
  "description": "Dedicated expat insurance provider protecting individuals, families & corporates worldwide. We give expats security when living abroad. Get a quote now!",
  "address": [
    {
      "@type": "PostalAddress",
      "streetAddress": "John de Mierre House, Bridge Road",
      "addressLocality": "Haywards Heath",
      "addressRegion": "West Sussex",
      "postalCode": "RH16 1UA",
      "addressCountry": "UK"
    },
    {
      "@type": "PostalAddress",
      "streetAddress": "D4-6-9 Solaris Dutamas, Jalan Dutamas 1",
      "addressLocality": "Kuala Lumpur",
      "postalCode": "50480",
      "addressCountry": "Malaysia"
    }
  ],
  "telephone": "+44 (0)20 3551 6634",
  "email": "info@expatriategroup.com",
  "memberOf": {
    "@type": "Organization",
    "name": "Strategic Insurance Services"
  },
  "sameAs": [
    "https://x.com/expathealthcare/",
    "https://www.facebook.com/expathealthcare",
    "https://www.crunchbase.com/organization/expatriate-healthcare",
    "https://www.linkedin.com/company/expatriate-healthcare/"
  ]
}
</script>
	
</head>

<body <?php body_class(); ?> <?php understrap_body_attributes(); ?>>
<?php
do_action('wp_body_open'); 
?>
<div class="site" id="page">
	<div id="wrapper-navbar" class="fixed-top">

		<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>

		<nav id="nav" class="navbar navbar-expand-lg navbar-light container-xl" aria-labelledby="nav-label">
            <?php the_custom_logo(); ?>
            <a type="button" class="d-lg-none btn btn-primary text-white" data-bs-toggle="modal" data-bs-target="#quoteModal">Get Quote</a>
            <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#primaryNav" aria-controls="primaryNav" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
                <span class="navbar-icon"><i class="fa fa-bars"></i></span>
                <div class="close-icon py-1"><i class="fa fa-times"></i></div>
            </button>
            <div class="container-xl d-flex w-100 justify-content-lg-end">
                <div class="d-flex flex-column w-100 justify-content-end">
                    <div id="top-nav" class="d-none d-lg-block mb-2">
                        <?php
                            wp_nav_menu(array(
                                'theme_location'  => 'top_nav',
                                'container_class' => 'd-flex justify-content-end',
                                'menu_class' => 'navbar-nav',
                                'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
                            ))
                        ?>
                    </div>
                    <div id="main-nav">
                <?php
                    wp_nav_menu(
                        array(
                            'theme_location'  => 'primary_nav',
                            'container_class' => 'collapse navbar-collapse',
                            'container_id'    => 'primaryNav',
                            'menu_class'      => 'navbar-nav w-100 justify-content-between align-content-center',
                            'fallback_cb'     => '',
                            'menu_id'         => 'main-menu',
                            'depth'           => 3,
                            'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
                        )
                    );
                ?>
                    </div>
                </div>
            </div>
		</nav>
    </div>

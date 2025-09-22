<?php

function cssmap_fn(){
    wp_enqueue_script(
      'cssmap-script', 
      '//cssmapsplugin.com/5/jquery.cssmap.min.js', 
      array('jquery'),
      '5.6.0',
      true
     );
    wp_enqueue_style(
      'cssmap-continents', 
      get_stylesheet_directory_uri().'/cssmap-continents/cssmap-continents.css',
      array(),
      '5.6',
      'screen'
     );
  }
  add_action('wp_enqueue_scripts', 'cssmap_fn');

get_header();

?>
<main>
<section class="country_hero mb-5">
    <div class="container-xl">
        <h1 class="country_hero__title text-center">Your Destination</h1>
        <div class="country_hero__intro text-center"><?=get_field('country_guide_intro','options')?></div>
        <div id="map-continents">
            <ul class="continents">
                <li class="c1"><a href="#africa">Africa</a></li>
                <li class="c2"><a href="#asia">Asia</a></li>
                <li class="c3"><a href="#australia">Australia</a></li>
                <li class="c4"><a href="#europe">Europe</a></li>
                <li class="c5"><a href="#north-america">North America</a></li>
                <li class="c6"><a href="#south-america">South America</a></li>
            </ul>
        </div>
    </div>
</section>
<div class="container-xl">
<?php
$continents = get_terms(array(
        'taxonomy' => 'continent',
        'hide_empty' => false
    ));

foreach ($continents as $c) {
    ?>
    <a id="<?=$c->slug?>" class="anchor"></a>
    <section class="mb-5">
        <div class="row mb-4">
            <div class="col-lg-7">
                <h2><?=$c->name?> Expat Country Guides</h2>
                <div class="mb-4"><?=apply_filters('the_content',$c->description)?></div>
            </div>
            <div class="col-lg-5 text-center">
                <img src="<?=wp_get_attachment_image_url(get_field('image',$c),'large')?>" class="rounded-5">
            </div>
        </div>
        <div class="row g-4 mb-5">
        <?php
        $cc = new WP_Query(array(
            'post_type' => 'country',
            'tax_query' => array(
                array(
                    'taxonomy' => 'continent',
                    'field' => 'term_id',
                    'terms' => $c->term_id
                )
                ),
            'orderby' => 'title',
            'order' => 'ASC',
            'posts_per_page' => -1
        ));
        if ($cc->have_posts()) {
            while($cc->have_posts()) {
                $cc->the_post();
				
				if ( get_the_ID() == 18724 ) {
					$country_link = "https://www.expatriatehealthcare.com/thailand-health-insurance/";
				} else {
					$country_link = get_the_permalink();
				}
                ?>
            <div class="col-6 col-md-4 col-lg-2">
                <a href="<?=$country_link?>" class="archive__card">
                    <div class="fi fis fi-<?=get_field('country_code',get_the_ID())?>"></div>
                    <div class="archive__title">Moving to<br><?=get_the_title(get_the_ID())?></div>
                </a>
            </div>
                <?php

            }
        }
        wp_reset_postdata();
        ?>
        </div>
    </section>
    <?php
}

wp_reset_postdata();
?>
</div>
</main>
<!-- map name="image-map">
    <area target="" alt="North America" title="North America" href="#north-america" coords="235,311,254,279,289,264,315,227,350,140,432,85,452,1,0,2,0,269" shape="poly">
    <area target="" alt="South America" title="South America" href="#south-america" coords="223,499,181,362,213,316,233,318,255,282,290,266,407,335,353,499" shape="poly">
    <area target="" alt="Africa" title="Africa" href="#africa" coords="463,218,406,230,420,311,462,326,494,352,514,460,616,423,644,327,636,284,606,291,575,248,552,225,517,218,492,209" shape="poly">
    <area target="" alt="Australia" title="Australia" href="#australia" coords="849,353,789,383,800,454,1013,486,1008,359,944,367,892,355" shape="poly">
    <area target="" alt="Europe" title="Europe" href="#europe" coords="564,227,569,190,587,114,603,77,526,62,433,84,397,108,439,220,488,210" shape="poly">
    <area target="" alt="Asia" title="Asia" href="#asia" coords="565,230,607,289,637,282,677,334,806,375,844,353,893,355,918,358,1022,351,1022,11,501,2,496,47,607,76,588,114,571,185" shape="poly">
</map -->
<?php

add_action('wp_footer',function(){
    ?>
<script type="text/javascript" src="<?=get_stylesheet_directory_uri()?>/js/jquery.cssmap.min.js"></script>
<script>
(function($){
    $("#map-continents").CSSMap({
        "size": 750,
        "mapStyle": "blue",
        "tooltips": "sticky",
        "responsive": "auto"
    });
})(jQuery);
</script>
    <?php
},9999);

get_footer();
<main>
<section class="country_hero mb-5">
    <div class="container-xl">
        <h1 class="country_hero__title text-center">Expat Country Guides</h1>
        <div class="country_hero__intro text-center">Thinking about moving abroad? Our comprehensive expat guides are here to help you feel at home, wherever you go. From navigating healthcare systems to planning your big move, we cover everything you need to know to settle in with confidence. Click on the map to explore guides by continent, or scroll down to browse all countries at a glance. Your next chapter starts here.</div>
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
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-4">
                <select class="form-select jumpSelect mb-3" aria-label="Jump to continent">
                    <option selected>Jump to continent...</option>
    <?
    $continents = get_terms(array(
            'taxonomy' => 'continent',
            'hide_empty' => false
        ));

    foreach ($continents as $c) {
    ?>
                    <option value="#<?=$c->slug?>"><?=$c->name?></option>
    <?php
    }
    ?>  
                </select> 
            </div>

    <?php
    $cc = get_unique_acf_country_values();
    ?>
            <div class="col-lg-4">
                <select class="form-select jumpSelect mb-3" aria-label="Jump to continent">
                    <option selected>Jump to country...</option>
    <?
            foreach ($cc as $c) {
                $sanitized = preg_replace( '/[^a-zA-Z0-9]/', '', $c );
            ?>
                <option value="#<?=$sanitized?>"><?=$c?></option>
                <?php
            }
            ?> 
                </select> 
            </div>
            <div class="col-lg-2"></div>
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

    $countrieslist = get_unique_acf_country_values_by_continent($c->slug);
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
            foreach ( $countrieslist as $country ) {
                $sanitized = preg_replace( '/[^a-zA-Z0-9]/', '', $country );
                ?>
            <div class="col-6 col-md-4 col-lg-3" id="<?=$sanitized?>">
                <div class="archive__card">
                    <div class="h3 mb-3"><?=$country?></div>
                    <?php
                    $count = 1;
                    $posts = get_country_guides_by_country($country);
                    foreach ( $posts as $post ) {
                        if ( $count == 1 ) {
                        ?>
                        <a href="<?php echo get_the_permalink($post); ?>" class="mb-3 fi fis fi-<?=get_field('country_code',$post)?>"></a>
                        <?php
                        }
                    ?>
                    <a href="<?php echo get_the_permalink($post); ?>" class="btn btn-primary mb-3 fs-7"><?=esc_html(get_the_title($post))?></a>
                    <?php
                        $count++;
                    }
                    ?>
                </div>
            </div>
                <?php

            }
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

<link rel='stylesheet' id='cssmap-continents-css' href='https://www.expatriatehealthcare.com/wp-content/themes/cb-expat2022/cssmap-continents/cssmap-continents.css?ver=5.6' media='screen' />
<script src="//cssmapsplugin.com/5/jquery.cssmap.min.js?ver=5.6.0" id="cssmap-script-js"></script>
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
<script>
document.querySelectorAll('.jumpSelect').forEach(select => {
  select.addEventListener('change', function() {
    const anchor = this.value;
    if (anchor) {
      window.location.hash = anchor;
    }
  });
});
</script>
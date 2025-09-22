<?php
$theme = get_field('product') == 'default' || !get_field('product') ? get_field('page_theme',get_the_ID()) : get_field('product');
$stats = get_field('hero_spinner','options');
?>
<!-- stat_spinner -->
<div class="container pb-5">
    <div class="row g-4 hero__counter mt-1">
        <div class="col-4 col-md-12 col-lg-4 text-center">
            <div class="h3 text--<?=$theme?>"><?=do_shortcode("[countup start='0' separator=',' grouping='true' suffix='+' easing='true']" . $stats['stat_1'] . "[/countup]")?></div>
            <div class="text--black"><?=$stats['stat_text_1']?></div>
        </div>
        <div class="col-4 col-md-12 col-lg-4 text-center">
            <div class="h3 text--<?=$theme?>"><?=do_shortcode("[countup start='0' separator=',' grouping='true' suffix='+' easing='true']" . $stats['stat_2'] . "[/countup]")?></div>
            <div class="text--black"><?=$stats['stat_text_2']?></div>
        </div>
        <div class="col-4 col-md-12 col-lg-4 text-center">
            <div class="h3 text--<?=$theme?>"><?=do_shortcode("[countup start='0' separator=',' grouping='true' suffix='+' prefix='In ' easing='true']" . $stats['stat_3'] . "[/countup]")?></div>
            <div class="text--black"><?=$stats['stat_text_3']?></div>
        </div>
    </div>
</div>
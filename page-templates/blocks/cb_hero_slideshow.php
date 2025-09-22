<!-- hero_slideshow -->
<section class="hero carousel slide carousel-fade break-out mb-2 mb-md-5" data-ride="carousel">
    <div class="carousel-inner">
        <?php
        $active = 'active';
        while (have_rows('slides')) {
            the_row();
            $theme = get_sub_field("theme");
            $text = $theme == 'light' ? 'text--light' : '';
            $pad = get_sub_field('spinner_position') == 'Right' ? 'mb-80' : '';
            $cols = get_sub_field('spinner_position') == 'Right' ? 'col-md-7 col-lg-6' : 'col-12 col-xl-6';
            ?>
        <div class="carousel-item <?=$active?>" style="background-image:url(<?=wp_get_attachment_image_url(get_sub_field('image'),'full')?>)">
            <div class="container align-self-start pt-150 <?=$pad?>">
                <div class="row py-3">
                    <div class="<?=$cols?>">
                        <h1 class="text--<?=$theme?> mb-4"><?=get_sub_field('title')?></h1>
                        <div class="hero__intro mb-4"><div class="hero__inner <?=$text?>"><?=apply_filters('the_content',get_sub_field('text'))?></div></div>
                        <div class="buttons">
                            <?php
                            if (is_front_page()) {
                                ?>
                            <button type="button" class="btn btn-default me-3 mb-2" data-bs-toggle="modal" data-bs-target="#quoteModal">Get Quote</button>
                                <?php
                            }
                            elseif(get_sub_field('cta_1')) {
                                $cta1 = get_sub_field('cta_1');
                                ?>
                            <a href="<?=$cta1['url']?>" class="btn btn-<?=$theme?> px-4 me-3 mb-2" target="<?=$cta1['target']?>"><?=$cta1['title']?></a>
                                <?php
                            }

                            if (get_sub_field('cta_2')) {
                                $cta2 = get_sub_field('cta_2');
                                ?>
                            <a href="<?=$cta2['url']?>" class="btn btn-<?=$theme?>--inverse mb-2 border-<?=$theme?>" target="<?=$cta2['target']?>"><?=$cta2['title']?></a>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <?php
                    // cbdump(get_sub_field('show_spinner')[0]);
                    if (get_sub_field('show_spinner')) {
                       $stats = get_field('hero_spinner','options');
                       if (get_sub_field('spinner_position') == 'Right') {
                           ?>
                    <div class="col-md-5 offset-lg-1 d-none d-md-block">
                        <div class="row g-4 hero__counter pt-2">
                            <div class="col-4 col-md-12 col-lg-4 text-lg-end text-center">
                                <div class="h3 text--<?=$theme?>"><?=do_shortcode("[countup start='0' separator=',' grouping='true' suffix='+' easing='true']" . $stats['stat_1'] . "[/countup]")?></div>
                                <div class="text--black"><?=$stats['stat_text_1']?></div>
                            </div>
                            <div class="col-4 col-md-12 col-lg-4 text-lg-end text-center">
                                <div class="h3 text--<?=$theme?>"><?=do_shortcode("[countup start='0' separator=',' grouping='true' suffix='+' easing='true']" . $stats['stat_2'] . "[/countup]")?></div>
                                <div class="text--black"><?=$stats['stat_text_2']?></div>
                            </div>
                            <div class="col-4 col-md-12 col-lg-4 text-lg-end text-center">
                                <div class="h3 text--<?=$theme?>"><?=do_shortcode("[countup start='0' separator=',' grouping='true' suffix='+' prefix='In ' easing='true']" . $stats['stat_3'] . "[/countup]")?></div>
                                <div class="text--black"><?=$stats['stat_text_3']?></div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-8 offset-2 col-md-6 offset-md-3 offset-lg-6 text-lg-end text-center">
<!--                                 <a href="<?=$stats['trustpilot_link']?>" target="_blank">
                                    <img src="<?=esc_url($stats['trustpilot'])?>" class="img-fluid">
                                </a> -->
                            </div>
                        </div>
                    </div>
                           <?php
                       }
                       else {
                           ?>
                    </div>
                    <div class="row">
                        <div class="col-12 col-xl-6 pt-3">
                           <div class="row g-4 hero__counter">
                            <div class="col-4 text-center">
                                <div class="h3 text--<?=$theme?>"><?=do_shortcode("[countup start='0' separator=',' grouping='true' suffix='+' easing='true']" . $stats['stat_1'] . "[/countup]")?></div>
                                <div class="text--black"><?=$stats['stat_text_1']?></div>
                            </div>
                            <div class="col-4 text-center">
                                <div class="h3 text--<?=$theme?>"><?=do_shortcode("[countup start='0' separator=',' grouping='true' suffix='+' easing='true']" . $stats['stat_2'] . "[/countup]")?></div>
                                <div class="text--black"><?=$stats['stat_text_2']?></div>
                            </div>
                            <div class="col-4 text-center">
                                <div class="h3 text--<?=$theme?>"><?=do_shortcode("[countup start='0' separator=',' grouping='true' suffix='+' prefix='In ' easing='true']" . $stats['stat_3'] . "[/countup]")?></div>
                                <div class="text--black"><?=$stats['stat_text_3']?></div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-12 text-center mx-auto w-50">
                                <a href="<?=$stats['trustpilot_link']?>" target="_blank">
                                    <img src="<?=esc_url($stats['trustpilot'])?>" class="img-fluid">
                                </a>
                            </div>
                        </div>
                    </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
            <?php
            $active = '';
        }
        ?>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
        <path class="st0" fill="white" d="M100,67.6c-25,37.9-75,37.9-100,0V100h100V67.6z"/>
    </svg>
</section>
<!-- stat_spinner -->
<div class="d-md-none container pb-2">
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
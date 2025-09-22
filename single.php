<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;
get_header();

the_post();

$categories = get_the_category();
$cats = wp_list_pluck($categories, 'name');
$cats = implode(', ', $cats);
?>
<main id="main" class="pad-top">
    <div class="container-xl py-5">
        <div class="row mb-5">
            <a href="javascript:history.go(-1)" class="back">Back</a>
            <div class="col-md-8 post">
                <?php
                if (get_the_post_thumbnail_url(get_the_ID())) {
                    ?>
                    <img src="<?=get_the_post_thumbnail_url(get_the_ID(),'large')?>" class="post__image">
                    <?php
                }
                $time = estimate_reading_time_in_minutes(get_the_content(null, false, $p->ID), 200, true, false);
                ?>
                <h1 class="text--default"><?=get_the_title()?></h1>
                <div class="post__meta">
                    <span class="post__date"><?=get_the_date('jS F, Y')?></span> in
                    <?=$cats?> &ndash;
                    <span class="post__read"><time itemprop="timeRequired" datetime="PT<?=$time?>M"><?=$time?>m read</time></span>
                </div>
                <?=apply_filters('the_content',get_the_content())?>
                <div class="mt-4 px-4">
                    <?php cb_post_nav(); ?>
                </div>
            </div>
            <div class="col-md-4">
                <h2 class="h3">Latest Expat News</h2>
                <div class="mb-4"><?=recent_posts(get_the_ID())?></div>
                <div class="h3 text--default">Country Guides</div>
                <div class="mb-4">
                    <img src="<?=get_stylesheet_directory_uri()?>/img/map.png" class="d-flex w-75 mb-3">
                    <a href="/country-facts/" class="btn btn-default more">View all Country Guides</a>
                </div>
                <div class="h3 text--default">Stay Connected</div>
                <?=do_shortcode('[social_fb_icon]')?>
                <?=do_shortcode('[social_tw_icon]')?>
                <?=do_shortcode('[social_ig_icon]')?>
                <?=do_shortcode('[social_in_icon]')?>
            </div>
        </div>
        <h2 class="h3 text--black mb-4">Related News</h2>
        <?=related_posts()?>
    </div>
</main>
<?php

get_footer();
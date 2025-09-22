<?php
/**
 * Template Name: Insights Index
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
?>
<main id="main" class="pad-top">
<section class="container py-5">
    <h1 class="hero__title mb-5">Expat Blog</h1>
	Whether you're planning your first move abroad or you're a seasoned expat, our Insights hub is here to guide you. From global healthcare updates and insurance advice to travel tips and cultural know-how, we provide the knowledge you need to live confidently - wherever you are in the world. Dive into expert articles, practical guides, and the latest news tailored for the international lifestyle. Navigate our blogs using the categories on the right or scroll the page to find the information you need.<br>
	<br>
    <div class="row g-5">
        <div class="col-lg-8 order-2 order-lg-1">
            <div class="h2 text--black mb-4">Latest News</div>
            <div class="row g-4">
        <?php
        $w = new WP_Query( array (
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => 2,
            'orderby' => 'publish_date',
            'order' => 'DESC',
        ));
        while ($w->have_posts()) {
            $w->the_post();
            $categories = get_the_category();
            ?>
            <div class="col-md-6 index_blog">
                <a class="index_blog__card" href="<?=get_the_permalink()?>">
                    <div class="index_blog__image aspect-9by5" style="background-image:url('<?=get_the_post_thumbnail_url($w->ID, 'large')?>'"></div>
                    <div class="index_blog__content">
                        <?php
                        if ( ! empty( $categories ) ) {
                            ?>
                            <div class="index_blog__cat"><?=esc_html( $categories[0]->name )?></div>
                            <?php
                        }
                        ?>
                        <h2 class="fs-3 index_blog__title pb-2"><?=get_the_title()?></h2>
                        <div class="d-flex flex-column">
                            <div class="index_blog__read"><?=estimate_reading_time_in_minutes(get_the_content(null, false, $p->ID), 200, true, false)?>m read</div>
                            <div class="index_blog__meta">
                                <div class="index_blog__date"><?=get_the_date('jS F, Y', $p->ID)?></div>
                                <div class="readmore">Read more</div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <?php
        }
        
        ?>
                </div>
        </div>
        <div class="col-lg-4 order-1 order-lg-3 mb-4">
            <div class="h2 text--black mb-4">Category</div>
            <ul class="insights-nav d-none d-lg-block">
            <?php
                $categories = get_categories();

                if ( get_post_type_archive_link( 'post' ) == "https://www.expatriatehealthcare.com" ) {
                    $homelink = "/insights/";
                } else {
                    $homelink = get_post_type_archive_link( 'post' );
                }
            ?>
                <li>
                    <a class="active" href="<?=$homelink;?>">All</a>
                </li>
            <?php
            foreach( $categories as $cat ) {
                ?>
                <li>
                    <a class="" href="<?=get_category_link( $cat->term_id )?>"><?=$cat->name?></a>
                </li>
                <?php
            }
            ?>
            </ul>
            <div class="d-lg-none">
                <select name="cat" id="category" class="form-select">
                    <option value="/insights/">All</option>
                    <?php
                    foreach( $categories as $cat ) {
                        ?>
                    <option value="<?=get_category_link( $cat->term_id )?>"><?=$cat->name?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
        </div>
    </div>
</section>
<?php
$section = 0;
foreach (get_categories() as $c) {
    if ($section == 0) {
        ?>
<section class="py-5">
    <div class="container">
        <div class="shadow rounded-5 pb-5 heroContent bg-light">
            <?php
            $h = new WP_Query(array(
                'post_type' => 'page',
                'meta_query' => array(
                    array(
                        'key' => 'is_hero',
                        'value' => 'Yes',
                        'compare' => 'LIKE'
                    )
                )
            ));
            while ($h->have_posts()) {
                $h->the_post();
                ?>
                <div class="heroContent__post">
                    <a href="<?=get_the_permalink($h->ID)?>">
                        <div class="row bg-white">
                            <div class="col-md-4">
                                <div class="heroContent__image" style="background-image:url('<?=get_the_post_thumbnail_url($h->ID, 'large')?>'"></div>
                            </div>
                            <div class="col-md-8 heroContent__words"">
                                <h2><?=get_the_title($h->ID)?></h2>
                                <div class="heroContent__intro"><?=wp_trim_words(get_the_content($h->ID))?></div>
                                <div class="readmore">Read more</div>
                            </div>
                        </div>
                    </a>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>
        <?php
    }
    if ($section == 1) {
        ?>
<section class="py-5">
    <div class="container">
        <div class="shadow rounded-5 p-5">
            <div class="row">
                <div class="col-md-6">
                    <img src="<?=get_stylesheet_directory_uri()?>/img/map.png">
                </div>
                <div class="col-md-6">
                    <h2 class="text-black">Country Guides</h2>
                    <div class="fs-4 mb-4">Get the essential information to bring countries to life in your mind's eye...</div>
                    <a href="/country-facts/" class="btn btn-default more">View all Country Guides</a>
                </div>
            </div>
        </div>
    </div>
</section>
        <?php
    }
    ?>
<section class="mb-5">
    <div class="container">
        <div class="d-flex justify-content-between">
            <div class="h2 text--black mb-4"><?=$c->name?></div>
            <a href="<?=get_category_link($c->term_id)?>" class="view-all">View All</a>
        </div>
        <div class="row g-4">
        <?php
        $q = get_posts(array(
            'numberposts' => 4,
            'category' => $c->term_id
        ));
        foreach ($q as $p) {
            ?>
            <div class="col-lg-3 col-md-6 index_blog">
                <a class="index_blog__card" href="<?=get_the_permalink($p->ID)?>">
                    <div class="index_blog__image aspect-9by5" style="background-image:url('<?=get_the_post_thumbnail_url($p->ID, 'large')?>'"></div>
                    <div class="index_blog__content">
                        <h2 class="fs-5 index_blog__title pb-2 mb-0"><?=get_the_title($p->ID)?></h2>
                        <div class="d-flex flex-column">
                            <div class="index_blog__read"><?=estimate_reading_time_in_minutes(get_the_content(null, false, $p->ID), 200, true, false)?>m read</div>
                            <div class="index_blog__meta">
                                <div class="index_blog__date"><?=get_the_date('jS F, Y', $p->ID)?></div>
                                <div class="readmore">Read more</div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <?php
        }
        ?>
        </div>
    </div>
</section>
    <?php
    $section++;
}?>
    </div>
</div>
<?php

add_action('wp_footer', function(){
    ?>
<script>
(function($){
    $('.form-select').on('change',function(){
        window.location.href = this.value;
    });

    $('.heroContent').slick({
        dots: true,
        infinite: true,
        speed: 600,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 5000,
        fade: true
    });

})(jQuery);
</script>
    <?php
},9999);

get_footer();
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
    <?php
    if (get_the_archive_description()) {
        ?>
    <div class="h1 hero__title mb-4">Expat Insights</div>
    <div class="mb-4 col-lg-8"><?=get_the_archive_description()?></div>
        <?php
    }
    else {
        ?>
    <div class="h1 hero__title mb-5">Expat Insights</div>
        <?php
    }
    ?>
    <div class="row g-5 d-none d-lg-flex">
        <div class="col-lg-8">
            <h1 class="h2 text--black mb-4"><?=single_cat_title()?></h1>
        </div>
        <div class="col-lg-4">
            <div class="h2 text--black mb-4">Category</div>
        </div>
    </div>
    <div class="row g-5 postsContainer">
        <div class="order-1 order-lg-3 col-md-12 col-lg-4 mb-4">
            <div class="d-lg-none h1 text--black mb-4">Category</div>
            <ul class="insights-nav d-none d-lg-block">
            <?php
                $categories = get_categories();

                $cat = get_queried_object();
                $current_cat = $cat->term_id;

            ?>
                <li>
                    <a href="/insights/">All</a>
                </li>
            <?php
            foreach( $categories as $cat ) {
                $active = $cat->term_id == $current_cat ? 'active' : '';
                ?>
                <li>
                    <a class="<?=$active?>" href="<?=get_category_link( $cat->term_id )?>"><?=$cat->name?></a>
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
                        $active = $cat->term_id == $c->term_id ? 'selected' : '';
                        ?>
                    <option value="<?=get_category_link( $cat->term_id )?>" <?=$active?>><?=$cat->name?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <?php
        $d = 1;
        $m = 2;
        while (have_posts()) {
            the_post();
            $d = $d == 3 ? 4 : $d;
            $img = get_the_post_thumbnail_url($p->ID, 'large');
            $img = $img == '' ? get_stylesheet_directory_uri() . '/img/default.jpg' : $img;
            ?>
            <div class="order-<?=$m?> order-lg-<?=$d?> col-md-6 col-lg-4 index_blog">
                <a class="index_blog__card" href="<?=get_the_permalink($p->ID)?>">
                    <div class="index_blog__image aspect-9by5" style="background-image:url('<?=$img?>')"></div>
                    <div class="index_blog__content">
                        <h2 class="fs-4 index_blog__title pb-2"><?=get_the_title($p->ID)?></h2>
                        <div class="index_blog__meta">
                            <div class="index_blog__date"><?=get_the_date('jS F, Y', $p->ID)?></div>
                            <div class="readmore">Read more</div>
                        </div>
                    </div>
                </a>
            </div>
            <?php
            $m++;
            $d++;
        }
        ?>
    </div>
    <nav class="pagination py-4 d-flex justify-content-between">
        <?php
        if ($next_url = next_posts($wp_query->max_num_pages, false)) {
            ?>
<a class="btn btn-default--inverse no-decoration" href="<?=$next_url?>">Older Posts</a>
            <?php
        }
        global $wp;
        if ( get_previous_posts_link() != '' ) {
            ?>
<a class="btn btn-default--inverse no-decoration" href="<?=esc_url(get_previous_posts_page_link())?>">Newer Posts</a>
            <?php
        }
        ?>
    </nav>
</section>
</main>
<?php

add_action('wp_footer', function(){
    ?>
<script>
(function($){
    $('.form-select').on('change',function(){
        window.location.href = this.value;
    });

})(jQuery);
</script>
    <?php
},9999);

get_footer();

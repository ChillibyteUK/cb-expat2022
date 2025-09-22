<?php
$theme = get_field('product') == 'default' || !get_field('product') ? get_field('page_theme',get_the_ID()) : get_field('product');
?>
<!-- short_hero -->
<section class="short_hero theme--<?=$theme?>">
    <div class="container-xl">
<?php
//14588 and 15197
$parents = array(14588,15197);
if ( ( in_array(wp_get_post_parent_id(),$parents) ) ) {
?>
        <div class="row">
            <div class="col">
<?php
    if ( function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
    }
?>
            </div>
        </div>
<?php
}
?>
        <div class="row">
            <div class="col-md-7">
                <h1 class="text--<?=$theme?> mb-4 mt-5 mt-lg-0"><?=get_field('title')?></h1>
                <div class="mb-4"><?=apply_filters('the_content',get_field('text'))?></div>
            </div>
            <div class="col-md-5 align-self-center text-center">
                <?php
                if(get_field('cta_1')) {
                    $cta1 = get_field('cta_1');
                    ?>
                <a href="<?=$cta1['url']?>" class="btn btn-<?=$theme?> px-4 mb-2" target="<?=$cta1['target']?>"><?=$cta1['title']?></a>
                    <?php
                }
                if (get_field('cta_2')) {
                    $cta2 = get_field('cta_2');
                    ?>
                <a href="<?=$cta2['url']?>" class="btn btn-<?=$theme?>--inverse mx-3 mb-2 border-<?=$theme?>" target="<?=$cta2['target']?>"><?=$cta2['title']?></a>
                    <?php
                }
                if (get_field('modal')['modal_id']) {
                    $modal = get_field('modal');
                    ?>
                <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#<?=$modal['modal_id']?>Modal"><?=$modal['button_text']?></button>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</section>

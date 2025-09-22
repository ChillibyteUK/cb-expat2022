<?php
// $theme = get_field('page_theme',get_the_ID());
$theme = get_field('product') == 'default' || !get_field('product') ? get_field('page_theme',get_the_ID()) : get_field('product');

$order_image = (get_field('order') == 'text_left') ? 'ps-lg-5 order-1 order-lg-2' : 'pe-lg-5 order-1 order-lg-1';
$order_text = (get_field('order') == 'text_left') ? 'pe-lg-5 order-2 order-lg-1' : 'ps-lg-5 order-2 order-lg-2';
$above_title = get_field('above_title');
$title = get_field('title');

$features = (get_field('order') == 'text_left') ? 'f-left' : 'f-right';

$pad = '';
if (get_field('padding')) {
    $pad = implode(' ', get_field('padding'));
}

?>    
<!-- text_image -->
<section class="text_image theme--<?=$theme?> <?=$pad?>">
    <div class="container-xl">
        <div class="row py-3">
            <div class="col-lg-6 text_image__content align-items-start d-flex flex-column align-self-center <?=$order_text?>">
                <?php
                if ( $above_title ) {
                    ?>
                <p class="mb-1 d-lg-block d-none fw-bold text--<?=$theme?> text-uppercase"><?=$above_title?></p>
                    <?php
                }
                if ( $title ) {
                    ?>
                <h2 class="d-lg-block d-none text-black mb-4"><?=$title?></h2>
                    <?php
                }
                ?>
                <?=get_field('content')?>
            </div>
            <div class="col-lg-6 text_image__image text-center mb-5 mb-lg-0 align-self-center text_image__image_col <?=$order_image?>">
                <?php
                if ( $above_title ) {
                    ?>
                <p class="mb-1 text-start d-lg-none d-block fw-bold text--<?=$theme?>"><?=$above_title?></p>
                    <?php
                }
                if ( $title ) {
                    ?>
                <h2 class="text-start d-lg-none d-block mb-4"><?=$title?></h2>
                    <?php
                }
                ?>
                <img src="<?=wp_get_attachment_image_url(get_field('image'), 'large')?>" class="img-fluid rounded-5">
                <?php
                if (get_field('key_features')) {
                    ?>
                <div class="key_features card rounded-5 <?=$features?>">
                    <div class="fs-6 fw-bold text--black mb-2">Key Features</div>
                    <?php
                    $arr = explode( '<br />', get_field('features') );
                    echo '<ul class="ul-feature">';
                    foreach ($arr as $a) {
                        echo '<li>' . trim($a) . '</li>';
                    }
                    echo '</ul>';
                    ?>
                </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</section>
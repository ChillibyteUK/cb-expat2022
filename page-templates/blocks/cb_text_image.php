<?php
// $theme = get_field('page_theme',get_the_ID());
$theme = get_field('product') == 'default' || !get_field('product') ? get_field('page_theme',get_the_ID()) : get_field('product');

$order_image = (get_field('order') == 'text_left')
    ? 'ps-lg-5 order-2 order-lg-2'
    : 'pe-lg-5 order-1 order-lg-1';

$order_text = (get_field('order') == 'text_left')
    ? 'pe-lg-5 order-1 order-lg-1'
    : 'ps-lg-5 order-2 order-lg-2';

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

            <div class="col-12 d-lg-none order-1">
                <?php if ($above_title): ?>
                    <p class="mb-1 fw-bold text--<?=$theme?> text-uppercase"><?=$above_title?></p>
                <?php endif; ?>

                <?php if ($title): ?>
                    <h2 class="text-black mb-4"><?=$title?></h2>
                <?php endif; ?>
            </div>

            <div class="col-lg-6 text_image__image text-center mb-5 mb-lg-0 align-self-center text_image__image_col <?=$order_image?> order-2">
                <img src="<?=wp_get_attachment_image_url(get_field('image'), 'large')?>" class="img-fluid rounded-5">
            </div>

            <div class="col-lg-6 text_image__content align-items-start d-flex flex-column align-self-center <?=$order_text?> order-3">
                <div class="d-none d-lg-block">
                    <?php if ($above_title): ?>
                        <p class="mb-1 fw-bold text--<?=$theme?> text-uppercase"><?=$above_title?></p>
                    <?php endif; ?>

                    <?php if ($title): ?>
                        <h2 class="text-black mb-4"><?=$title?></h2>
                    <?php endif; ?>
                </div>

                <?= get_field('content') ?>
            </div>

        </div>
    </div>
</section>
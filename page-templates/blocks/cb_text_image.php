<?php
$theme = get_field('product') == 'default' || !get_field('product')
    ? get_field('page_theme', get_the_ID())
    : get_field('product');

$is_text_left = (get_field('order') == 'text_left');

$order_image = $is_text_left
    ? 'ps-lg-5 order-2 order-lg-2'
    : 'pe-lg-5 order-2 order-lg-1';

$order_text = $is_text_left
    ? 'pe-lg-5 order-3 order-lg-1'
    : 'ps-lg-5 order-3 order-lg-2';

$above_title = get_field('above_title');
$title       = get_field('title');

$features = $is_text_left ? 'f-left' : 'f-right';

$pad = '';
if (get_field('padding')) {
    $pad = implode(' ', get_field('padding'));
}
?>

<!-- text_image -->
<section class="text_image theme--<?= esc_attr($theme); ?> <?= esc_attr($pad); ?>">
    <div class="container-xl">
        <div class="row py-3">

            <?php if ($above_title || $title): ?>
                <div class="col-12 d-lg-none order-1">
                    <?php if ($above_title): ?>
                        <p class="mb-1 fw-bold text--<?= esc_attr($theme); ?> text-uppercase">
                            <?= esc_html($above_title); ?>
                        </p>
                    <?php endif; ?>

                    <?php if ($title): ?>
                        <h2 class="text-black mb-4"><?= esc_html($title); ?></h2>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <div class="col-lg-6 text_image__image text-center mb-5 mb-lg-0 align-self-center text_image__image_col <?= esc_attr($order_image); ?>">
                <img src="<?= esc_url(wp_get_attachment_image_url(get_field('image'), 'large')); ?>" class="img-fluid rounded-5">

                <?php if (get_field('key_features')): ?>
                    <div class="key_features card rounded-5 <?= esc_attr($features); ?>">
                        <div class="fs-6 fw-bold text--black mb-2">Key Features</div>
                        <?php
                        $arr = explode('<br />', get_field('features'));
                        echo '<ul class="ul-feature">';
                        foreach ($arr as $a) {
                            echo '<li>' . esc_html(trim($a)) . '</li>';
                        }
                        echo '</ul>';
                        ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="col-lg-6 text_image__content align-items-start d-flex flex-column align-self-center <?= esc_attr($order_text); ?>">
                <div class="d-none d-lg-block" aria-hidden="true">
                    <?php if ($above_title): ?>
                        <p class="mb-1 fw-bold text--<?= esc_attr($theme); ?> text-uppercase">
                            <?= esc_html($above_title); ?>
                        </p>
                    <?php endif; ?>

                    <?php if ($title): ?>
                        <div class="text-black mb-4 h2"><?= esc_html($title); ?></div>
                    <?php endif; ?>
                </div>

                <?= get_field('content'); ?>
            </div>

        </div>
    </div>
</section>
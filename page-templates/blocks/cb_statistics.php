<!-- cb_statistics -->
<?php
if( have_rows('statistic') ) {
    $product = get_field('product');
?>
<section class="py-5 bg--grey-100 break-out">
    <div class="container-xl">
        <div class="row">
<?php
    while( have_rows('statistic') ) {
        the_row();
?>
            <div class="col-lg-4 col-md-4 col-12">
<?php
$image = get_sub_field('logo');
if( !empty( $image ) ) {
?>
                <div class="px-5 my-3 mb-4 text-center">
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="card-img-top img-fluid cb_statistic_img" />
                </div>
<?php
}
?>
                <div class="text-center px-2 h2 text--<?=$product?> mb-0"><?=do_shortcode("[countup start='0' separator=',' grouping='true' prefix='" . get_sub_field('prefix') . "' suffix='" . get_sub_field('suffix') . "' easing='true']" . get_sub_field('statistics') . "[/countup]")?></div>
                <div class="text-center px-2"><?php echo get_sub_field('strapline'); ?></div>
            </div>
<?php
    }
?>
        </div>
    </div>
</section>
<?php
}
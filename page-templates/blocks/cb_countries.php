<!-- cb_countries -->
<section class="pb-5">
    <div class="container-xl">
        <div class="countries">
<?php
$countries = get_field('countries');
if ($countries) {
    foreach ($countries as $c) {
?>
        <div class="col-md-3 col-12 mb-3 country">
<?php
$image = get_the_post_thumbnail_url($c,'large');
?>
            <a href="<?=get_the_permalink($c); ?>" class="text-white no_decoration">
                <div class="country__container m-2 p-3" style="background-image: url(<?=esc_url($image)?>);">
                    <div class="overlay"></div>
                    <div class="country__label">
                        <span class="fi fi-<?=get_field('country_code',$c)?> me-2"></span>
                        <?=get_field('country',$c)?>
                    </div>
                    <div class="mt-5 pt-5"></div>
                    <h4 class="px-2 mt-5 pt-5 h4 text-white">
                        <div class="fs-6">Moving to</div>
                        <div class="fs-2"><?=get_field('country',$c)?></div>
    </h4>
                </div>
            </a>
        </div>
<?php
    }
}
?>
        </div>
    </div>
</section>
<?php
add_action('wp_footer',function(){
    ?>
<script>
(function($){
    $('.countries').slick({
        dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 4000,
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 576,
                settings: {
                    dots: false,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            },
        ]
    });
})(jQuery);
</script>
    <?php
},9999);
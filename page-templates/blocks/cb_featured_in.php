<?php
// $theme = get_field('page_theme',get_the_ID());
$theme = 'black';
?>
<!-- featured_in -->
<section class="featured_in py-5 break-out mb-0 bg--grey-100">
    <div class="container position-relative">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6 text-center">
                <h2 class="text--<?=$theme?>"><?=get_field('name')?></h2>
                <?=get_field('description')?>
            </div>
            <div class="col-lg-3"></div>
        </div>
        <div class="row responsive_slider">
            <?php
            $logos = get_field('steps');
            foreach ( $logos as $logo ) {
                $img = wp_get_attachment_image_src($logo['image'],'full');
                // $image_hover = wp_get_attachment_image_src($logo['image_hover'],'full');
                ?>
            <div class="py-4 px-4 col">
            <?php 
            if ($img) {
            ?>
                <div class="logo_hover">
                    <div class="logo_1"><img src="<?=$img[0]?>" width="<?=$img[1]?>" height="<?=$img[2]?>" class="img-fluid ms-auto me-auto"></div>
                    <!-- <div class="logo_2"><img src="<?=$image_hover[0]?>" width="<?=$image_hover[1]?>" height="<?=$image_hover[2]?>" class="img-fluid ms-auto me-auto"></div> -->
                </div>
            <?php
            }
            ?>
            </div>
            <?php
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
        $('.responsive_slider').slick({
            dots: false,
            infinite: false,
            speed: 300,
            slidesToShow: 7,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
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

<!-- why_carousel -->
<section class="py-5 why_carousel break-out bg--grey-100">
    <div class="container-xl">
        <div class="row g-4">
            <div class="col-lg-4">
                <h2><?=get_field('cb_why_carousel_title')?></h2>
                <div class="mb-4"><?=get_field('cb_why_carousel_text')?></div>
                <div class="appendDots d-flex">
                    <img src="<?=get_stylesheet_directory_uri()?>/img/prev.svg" alt="Previous" class="prevArrow" id="whyPrev">
                    <div class="appendDots" id="whyDots"></div>
                    <img src="<?=get_stylesheet_directory_uri()?>/img/next.svg" alt="Next" class="nextArrow" id="whyNext">
                </div>
            </div>
            <div class="col-lg-8">
                <div class="why_slick pb-4">
                    <?php
                    while( have_rows('cb_why_carousel_carousel') ) {
                        the_row();
                        $img = get_sub_field('cb_why_carousel_icon');
                        ?>
                    <div class="pb-2 h-100">
                        <div class="card h-100 p-4 rounded-5 m-2">
                            <img class="mb-4 why_slick__icon" src="<?=wp_get_attachment_image_url($img,'full')?>">
                            <h3 class="fw-bold text-black mb-2 fs-6"><?=get_sub_field('cb_why_carousel_title')?></h3>
                            <?=get_sub_field('cb_why_carousel_text')?>
                        </div>
                    </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php

add_action('wp_footer',function(){
    ?>
<script>
(function($){
	$('.why_slick').slick({
        dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 3,
        slidesToScroll: 1,
        prevArrow: "#whyPrev",
        nextArrow: "#whyNext",
        appendDots: "#whyDots",
        autoplay: true,
        autoplaySpeed: 3000,
        responsive: [
	      {
	        breakpoint: 992,
	        settings: {
	            slidesToShow: 2,
	            slidesToScroll: 2,
	            dots: true
	        }
          },
	      {
	        breakpoint: 576,
	        settings: {
	            slidesToShow: 1,
	            slidesToScroll: 1,
	            dots: true
	        }
          },
        ]
	});

    $( "#whyDots .slick-dots li" ).on('click',function() {
		$("#whyDots .slick-dots li").removeClass("slick-active");
		$( this ).toggleClass( "slick-active" );
	});

})(jQuery);
</script>
    <?php
},9999);

/*

<!-- why_carousel -->
<section class="py-5 why-bg break-out">
    <div class="container-xl">
        <div class="row">
            <div class="col-lg-4">
                <div class="h2"><?=get_field("cb_why_carousel_title")?></div>
                <div class=""><?=get_field("cb_why_carousel_text")?></div>


                <div class="carousel-indicators-old appendDots_why position-relative mt-3 d-none d-md-flex">
                    <div class="d-flex mb-4">
                        <img src="/wp-content/uploads/2022/04/next.svg" alt="Previous" class="flipme prevArrowWHY">
                    </div>
                    <div class="d-flex position-relative appendDotsWHY"></div>
                    <div class="d-flex mb-4">
                        <img src="<?=get_stylesheet_directory_uri()?>/next.svg" alt="Next" class="nextArrowWHY">
                    </div>
                </div>

                <div class="carousel-indicators-old appendDots_why position-relative mt-3 d-flex d-md-none mb-3">
                    <div class="d-flex mb-4">
                        <img src="/wp-content/uploads/2022/04/next.svg" alt="Previous" class="flipme prevArrowWHY_MOB">
                    </div>
                    <div class="d-flex position-relative appendDotsWHY_MOB"></div>
                    <div class="d-flex mb-4">
                        <img src="/wp-content/uploads/2022/04/next.svg" alt="Next" class="nextArrowWHY_MOB">
                    </div>
                </div>
            </div>
            <div class="col-lg-8 d-none d-md-block">
                <div class="row">
                    <div id="carouselExampleIndicators" class="carousel_REMOVE slide">
                        <div class="carousel-inner_REMOVE cb_why_slick">
                            <div class="carousel-item_REMOVE active">
                                <div class="row">
    <?php
        $carousel_count = 0;
        while( have_rows('cb_why_carousel_carousel') ) : the_row();
            if (($carousel_count % 3) == 0 && $carousel_count != 0) {
    ?>
                                </div>
                            </div>
                            <div class="carousel-item_REMOVE">
                                <div class="row">
    <?php
            }
            $carousel_count++;
    ?>
                <div class="col-lg-4 col-6 d-flex align-items-stretch">
                    <div class="card w-100 shadow_REMOVE rounded-5 mb-5">
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-lg-6">
<?php
$image = get_sub_field('cb_why_carousel_icon');
if( !empty( $image ) ):
?>
                                    <div class="mb-4"><img src="<?=esc_url($image['url'])?>" alt="<?=esc_attr($image['alt'])?>" /></div>
<?php
endif;
?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h3 class="card-text mb-1 fw-bold text-black mb-2 fs-6"><?=get_sub_field('cb_why_carousel_title')?></h3>
                                    <?=get_sub_field('cb_why_carousel_text')?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    <?php
        endwhile;
    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 d-block d-md-none">
                <div class="row">
                    <div id="carouselExampleIndicatorsMobile" class="carousel_REMOVE slide">
                        <div class="carousel-inner_REMOVE cb_why_mob_slick">
                            <div class="carousel-item_REMOVE active">
                                <div class="row">
    <?php
        $carousel_count = 0;
        while( have_rows('cb_why_carousel_carousel') ) : the_row();
            if (($carousel_count % 2) == 0 && $carousel_count != 0) {
    ?>
                                </div>
                            </div>
                            <div class="carousel-item_REMOVE">
                                <div class="row">
    <?php
            }
            $carousel_count++;
    ?>
                <div class="col-lg-4 col-6 d-flex align-items-stretch">
                    <div class="card w-100 shadow_REMOVE rounded-5 mb-5">
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-lg-6">
<?php
$image = get_sub_field('cb_why_carousel_icon');
if( !empty( $image ) ):
?>
                                    <div class="mb-4"><img src="<?=esc_url($image['url'])?>" alt="<?=esc_attr($image['alt'])?>" /></div>
<?php
endif;
?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h3 class="card-text mb-1 fw-bold text-black mb-2 fs-6"><?=get_sub_field('cb_why_carousel_title')?></h3>
                                    <?=get_sub_field('cb_why_carousel_text')?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    <?php
        endwhile;
    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="text-center">
                <a class="btn btn-primary me-3" href="#">Contact Us</a>
                <a class="btn btn-primary--inverse" href="#">Get Quote</a>
            </div>
        </div>
    </div>
</section>

*/
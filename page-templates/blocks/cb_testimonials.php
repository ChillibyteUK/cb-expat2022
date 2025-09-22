<?php
/*
// $theme = get_field('page_theme',get_the_ID());
$theme = 'black';
$background_colour = (get_field('background') == 'grey') ? 'bg--grey-100' : '';
$ppp = get_field('max_num');
?>
<!-- cb_testimonials ALTERNATIVE -->
<section class="py-5 break-out <?=$background_colour?>">
    <div class="container">
        <div class="row py-5">
            <div class="col-lg-7">
                <h3 class="mb-4 text--<?=$theme?>">What our global customers say</h3>
                    <div class="col-lg-12">
            <?php
            $t = new WP_Query(array(
                'post_type' => 'testimonials',
                'posts_per_page' => $ppp,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'subject',
                        'field' => 'term_id',
                        'terms' => get_field('subject')
                    )
                    ),
                    'orderby' => 'rand'
            ));

            if( $t->have_posts() ) {
                ?>
                    <div class="cb_testimonial_slick_alt">
                    <?php
                    while( $t->have_posts() ) {
                        $t->the_post();
                        $product = get_the_terms( get_the_ID(), 'subject' );
                        $product = $product[0]->name;
                        ?>
                        <div>
                            <div class="cb_testimonial_testimonial mb-3"><?=get_field('testimonial',get_the_ID());?></div>
                            <div class="cb_testimonial_person fw-bold text-black"><?=get_the_title(get_the_ID());?></div>
                            <div class="cb_testimonial_position mb-3">International <?=$product?> Customer</div>
                        </div>
                        <?php
                    }
                    ?>
                    </div>

                    <div class="appendDots d-flex">
                        <img src="<?=get_stylesheet_directory_uri()?>/img/prev.svg" alt="Previous" class="prevArrow" id="tstPrev">
                        <div class="appendDots" id="tstDots"></div>
                        <img src="<?=get_stylesheet_directory_uri()?>/img/next.svg" alt="Next" class="nextArrow" id="tstNext">
                    </div>

                <?php
            }
            wp_reset_postdata();
            ?>
                    </div>
            </div>
            <div class="col-lg-5 align-items-center d-flex flex-d align-self-center flex-column">
                <img src="https://www.expatriatehealthcare.com/wp-content/uploads/2024/05/trustpilot-24.png" alt="Trustpilot" />
            </div>
        </div>
    </div>
</section>
<?php
add_action('wp_footer',function(){
    ?>
<script>
(function($){
	$('.cb_testimonial_slick_alt').slick({
	  dots: true,
	  infinite: true,
	  speed: 300,
	  slidesToShow: 1,
	  slidesToScroll: 1,
      fade: true,
      autoplay: true,
      autoplaySpeed: 6000,
	  prevArrow: "#tstPrev",
	  nextArrow: "#tstNext",
	  appendDots: "#tstDots"
	});
})(jQuery);
</script>

    <?php
},9999);

*/

$theme = 'black';
$background_colour = (get_field('background') == 'grey') ? 'bg--grey-100' : '';
?>
<section class="py-5 break-out <?=$background_colour?>">
    <div class="container">
        <h3 class="mb-4 text--<?=$theme?>">What our global customers say</h3>
<div id="wid_1749544485275"></div>
	</div>
</section>
<script>
sc = document.createElement("script");
sc.setAttribute("defer",true);
sc.setAttribute("src","https://dbwx2z9xa7qt9.cloudfront.net/bundle.js?cachebust=1749544485275");
sc.setAttribute("theme","light");
sc.setAttribute("footer", "true"); 
sc.setAttribute("widget-type","carousel");
sc.setAttribute("token","6841c25292d74fa057fbf935");
sc.setAttribute('apiurl', "https://server.onlinereviews.tech/api/v0.0.9");
sc.setAttribute('stats',"false");
sc.setAttribute('addReview',"false");
sc.setAttribute('profile-pic',"true");
sc.setAttribute('review-name',"true");
sc.setAttribute('positive-stars',"true");
sc.setAttribute('wl', "true");
sc.setAttribute('wlndig', "https://go.revyoo.co/expatriate");
sc.setAttribute('lang', "us");
sc.setAttribute('brandStyle', "%7B%22sidebar_background%22%3A%22%23191919%22%2C%22sidebar_text%22%3A%22white%22%2C%22brand_button_text_color%22%3A%22%231e1e1e%22%2C%22brand_main_color%22%3A%22%2326e47f%22%2C%22brand_button_border_radius%22%3A%226px%22%2C%22brand_sidebar_text_color_opacity%22%3A%22%23ffffff1a%22%2C%22brand_button_hover%22%3A%22rgb(73%2C%20232%2C%20148)%22%2C%22brand_button_active%22%3A%22rgb(25%2C%20201%2C%20107)%22%2C%22brand_main_color_opacity%22%3A%22%2326e47f1a%22%2C%22brand_font%22%3A%22Montserrat%22%2C%22star_color%22%3A%22%23fcd73e%22%2C%22brand_main_background%22%3A%22%23f6f8f7%22%2C%22brand_card_background%22%3A%22white%22%2C%22poweredByLink%22%3A%22https%3A%2F%2Frevyoo.co%22%2C%22poweredicon%22%3A%22https%3A%2F%2Frecensioni-io-static-folder.s3.eu-central-1.amazonaws.com%2Fpublic_onlinereviews%2Fapp.revyoo.co%2Fpowered.png%22%7D");
document.getElementById("wid_1749544485275").appendChild(sc);
</script>

<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$stats = get_field('hero_spinner','options');
$tp_img = esc_url($stats['trustpilot']);

if ( is_front_page() ) {
?>
<div class="half-bg">
	<div class="container shadow rounded-5 py-5 bg-white">
		<div class="row">
			<div class="col-lg-6 offset-lg-3">
				<h3 class="text--default text-center">Join Our Community of Expats</h3>
				<div class="text-center">Never miss an Expatriate Group update. Our newsletter is the perfect way to receive the latest expat blogs and news, as well as important information from us. Sign up below.</div>
				<div class="text-center mt-4">
					<?=do_shortcode('[gravityform id="1" title="false" description="false" ajax="true" tabindex="49"]')?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
}
?>
</main>
<footer class="wrapper pb-0 pt-5" id="wrapper-footer">
	<div class="container-xl">
        <div class="pt-5">

		<div class="row g-3">
			<div class="col-md-3">
				<div class="row gy-3">
					<div class="col-sm-4 col-xl-12">
						<div class="text-white fw-bold mb-1">UK Office</div>
						<div class="font-lightblue"><?=get_field('contact_address_uk','options')?></div>
					</div>
					<div class="col-sm-4 col-xl-12">
						<div class="text-white fw-bold mb-1">EU Office</div>
						<div class="font-lightblue"><?=get_field('contact_address','options')?></div>
					</div>
					<div class="col-sm-4 col-xl-12">
						<div class="text-white fw-bold mb-1">Asia Office</div>
						<div class="font-lightblue"><?=get_field('contact_address_asia','options')?></div>
					</div>
					<div class="col-sm-4 col-xl-12">
						<div class="text-white fw-bold mb-1">Registered Address</div>
						<div class="font-lightblue"><?=get_field('registered_address','options')?></div>
					</div>
					<div class="col-12">
						<div class="text-white fw-bold mb-1"><a href="/contact-us/" class="text-white">Get in Touch</a></div>
						<div class="font-lightblue">Tel: <?=do_shortcode('[contact_phone]')?> (UK)</div>
						<div class="font-lightblue">Tel: <?=get_field('malaysia_phone','options')?> (MY)</div>
						<div class="font-lightblue">Fax: <?=get_field('contact_fax','options')?></div>
						<div class="font-lightblue">Email: <?=do_shortcode('[contact_email]')?></div>
					</div>
					<div class="col-12">
						<div class="text-white fw-bold mb-1">Office Times</div>
						<div class="font-lightblue"><?=get_field('office_times','options')?></div>
					</div>
				</div>
			</div>

			<div class="col-md-3">
				<div class="text-white fw-bold mb-1">iPMI</div>
				<div class="footer_menu mb-4"><?php
				wp_nav_menu( array(
					'theme_location' => 'footer_menu1'
				) );
				?></div>
				<div class="text-white fw-bold mb-1">Treatment</div>
				<div class="footer_menu mb-4"><?php
				wp_nav_menu( array(
					'theme_location' => 'footer_menu2'
				) );
				?></div>
			</div>

			<div class="col-md-3">
				<div class="text-white fw-bold mb-1">Travel Insurance</div>
				<div class="footer_menu mb-4"><?php
				wp_nav_menu( array(
					'theme_location' => 'footer_menu3'
				) );
				?></div>
				<div class="text-white fw-bold mb-1">Other Products</div>
				<div class="footer_menu mb-4"><?php
				wp_nav_menu( array(
					'theme_location' => 'footer_menu4'
				) );
				?></div>
			</div>
			
			<div class="col-md-3">
				<div class="col mb-4">
					<img src="<?=get_stylesheet_directory_uri()?>/img/Expatriate_WHITE.svg" class="img-fluid footer-img" alt="expatriate group">
				</div>
				<div class="col mb-3">
					<?=do_shortcode('[social_fb_icon]')?>
					<?=do_shortcode('[social_tw_icon]')?>
					<?=do_shortcode('[social_ig_icon]')?>
					<?=do_shortcode('[social_in_icon]')?>
				</div>
				<div class="col mb-3">
					<i class="fa fa-cc-visa fa-2x me-2 text-white" aria-hidden="true"></i>
					<i class="fa fa-cc-mastercard fa-2x me-2 text-white" aria-hidden="true"></i>
					<i class="fa fa-cc-amex fa-2x me-2 text-white" aria-hidden="true"></i>
					<i class="fa fa-cc-paypal fa-2x me-0 text-white" aria-hidden="true"></i>
				</div>
				<div class="col mb-3">
					<div class="text-white fw-bold mb-1">Useful Links</div>
					<div class="footer_menu mb-4"><?php
					wp_nav_menu( array(
						'theme_location' => 'footer_menu5'
					) );
					?></div>
				</div>
			</div>

		</div><!-- row end -->

		<div class="row mb-4 pt-5">
			<div class="col-md-8 text-white fs-8 mb-4 mb-md-0">
				Expatriate Group & Expatriate Healthcare are trading styles of Strategic Insurance Services Limited<br><br>Non-European Union resident policies are sold by Strategic Insurance Services Limited (SISL). SISL is authorised and regulated by the Financial Conduct Authority (FCA) in the United Kingdom. FCA Firm Reference Number is 307133. SISL is authorised to carry on Regulated Activities in accordance with the permissions granted by the FCA under PART IV of the Financial Services and Markets ACT 2000. Address: Delmon House, 36-38 Church Road, Burgess Hill RH15 9AE, United Kingdom.<br><br>European Union resident policies are sold by Strategic Insurance Brokers (Cyprus) Ltd (SIBC). Company Number: HE394431. SIBC is authorised and regulated by the Cypriot Insurance Superintendent, per Authorization Number: 7255. Address: Androkleous 19a, 1061 Nicosia, Cyprus.
			</div><!--col end -->
			<div class="col-md-4 text-center text-md-end">
				<a href="https://strategicins.co.uk/" target="_blank"><img src="<?=get_stylesheet_directory_uri()?>/img/strategic_globe.png" class="img-fluid"></a>
			</div><!--col end -->
		</div><!-- row end -->

        <div class="colophon site-footer border-top border-2 py-4">
            <div class="text-center text-white fs-8"><?php echo date("Y"); ?> Expatriate Group. All Rights Reserved. <a href="https://www.chillibyte.co.uk/" rel="nofollow noopener" target="_blank" class="cb position-relative ms-2" style="top: 3px;" title="Digital Marketing by Chillibyte"></a></div>
        </div>
    </div>
</footer>
<div class="modal fade" id="quoteModal" tabindex="-1" aria-labelledby="quoteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <div class="modal-title text-center mx-auto" id="quoteModalLabel">
			<p class="mb-1 text-primary fw-bold text-uppercase">Quick Quote</p>
			<div class="h3 text-black">Choose your expat insurance product</div>
		</div>
        <button type="button" class="btn-modal btn-close align-self-start" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
      </div>
      <div class="modal-body">
        <div class="row gy-2 g-md-4">
			<div class="col-md-6">
				<div class="card p-4">
					<div class="fw-bold fs-5 text-black mb-2">International Health Insurance</div>
					<div class="d-none d-md-block"><?=get_field('health_modal','options')?></div>
					<a class="btn btn-health" target="_blank" href="<?=get_field('health_quote','options')?>">Get Quote</a>
					<a class="btn btn-default mt-3" target="_blank" href="https://www.expatriatehealthcare.com/short-term-healthcare/">Short Term Healthcare Quote</a>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card p-4 h-100">
					<div class="fw-bold fs-5 text-black mb-2">Travel Insurance</div>
					<div class="d-none d-md-block"><?=get_field('travel_modal','options')?></div>
					<a class="btn btn-travel" target="_blank" href="<?=get_field('travel_quote','options')?>">Get Quote</a>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card p-4">
					<div class="fw-bold fs-5 text-black mb-2">Life Insurance</div>
					<div class="d-none d-md-block"><?=get_field('life_modal','options')?></div>
					<a class="btn btn-life" target="_blank" href="<?=get_field('life_quote','options')?>">Get Quote</a>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card p-4">
					<div class="fw-bold fs-5 text-black mb-2">Income Protection Insurance</div>
					<div class="d-none d-md-block"><?=get_field('income_modal','options')?></div>
					<a class="btn btn-income" target="_blank" href="<?=get_field('income_quote','options')?>">Get Quote</a>
				</div>
			</div>
		</div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="renewModal" tabindex="-1" aria-labelledby="renewModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <div class="modal-title text-center mx-auto" id="renewModalLabel">
			<p class="mb-1 text-primary fw-bold text-uppercase">Renewals</p>
			<div class="h3 text-black">Renew your expat insurance product</div>
		</div>
        <button type="button" class="btn-modal btn-close align-self-start" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
      </div>
      <div class="modal-body">
        <div class="row gy-2 g-md-4">
			<div class="col-md-6">
				<div class="card p-4">
					<div class="fw-bold fs-5 text-black mb-2">International Health Insurance</div>
					<a class="btn btn-health" href="<?=get_field('health_renewal','options')?>">Renew</a>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card p-4">
					<div class="fw-bold fs-5 text-black mb-2">Travel Insurance</div>
					<a class="btn btn-travel" href="<?=get_field('travel_renewal','options')?>">Renew</a>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card p-4">
					<div class="fw-bold fs-5 text-black mb-2">Life Insurance</div>
					<a class="btn btn-life" href="<?=get_field('life_renewal','options')?>">Renew</a>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card p-4">
					<div class="fw-bold fs-5 text-black mb-2">Income Protection Insurance</div>
					<a class="btn btn-income" href="<?=get_field('income_renewal','options')?>">Renew</a>
				</div>
			</div>
		</div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="retrieveModal" tabindex="-1" aria-labelledby="retrieveModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <div class="modal-title text-center mx-auto" id="retrieveModalLabel">
			<p class="mb-1 text-primary fw-bold text-uppercase">Retrieve Quote</p>
			<div class="h3 text-black">Retrieve your expat quote</div>
		</div>
        <button type="button" class="btn-modal btn-close align-self-start" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
      </div>
      <div class="modal-body">
        <div class="row gy-2 g-md-4">
			<div class="col-md-6">
				<div class="card p-4">
					<div class="fw-bold fs-5 text-black mb-2">International Health Insurance</div>
					<a class="btn btn-health" href="<?=get_field('health_retrieve','options')?>">Retrieve Quote</a>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card p-4">
					<div class="fw-bold fs-5 text-black mb-2">Travel Insurance</div>
					<a class="btn btn-travel" href="<?=get_field('travel_retrieve','options')?>">Retrieve Quote</a>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card p-4">
					<div class="fw-bold fs-5 text-black mb-2">Life Insurance</div>
					<a class="btn btn-life" href="<?=get_field('life_retrieve','options')?>">Retrieve Quote</a>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card p-4">
					<div class="fw-bold fs-5 text-black mb-2">Income Protection Insurance</div>
					<a class="btn btn-income" href="<?=get_field('income_retrieve','options')?>">Retrieve Quote</a>
				</div>
			</div>
		</div>
      </div>
    </div>
  </div>
</div>
<?php

if (get_field('quote_button')) {
	$product = get_field('product');
	$url = get_field($product .'_quote','options');
	?>
<div class="sticky-buttons" id="stickyButton">
    <a class="btn btn-<?=$product?>" href="<?=$url?>">Get a Quote</a>
</div>
	<?php
}
?>
</div>

<?php wp_footer(); ?>

<script type="text/javascript">
            window.lhnJsSdkInit = function () {
                        lhnJsSdk.setup = {
                                    application_id: "25b6deec-7bbc-4d57-a525-ee1c600a1ae8",
                                    application_secret: "4d901e617f434a7081cbec2f0eaa02130c53ffc4962f40c981"
                        };
                        lhnJsSdk.controls = [{
                                    type: "hoc",
                                    id: "a79421ff-f390-41bc-8a02-e7f59ea88d23"
                        }];
            };
 
            (function (d, s) {
                        var newjs, lhnjs = d.getElementsByTagName(s)[0];
                        newjs = d.createElement(s);
                        newjs.src = "https://developer.livehelpnow.net/js/sdk/lhn-jssdk-current.min.js";
                        lhnjs.parentNode.insertBefore(newjs, lhnjs);
            }(document, "script"));
	</script>
	
</body>

</html>


<?php

function acf_blocks() {
	if( function_exists('acf_register_block') ) {
		acf_register_block(array(
			'name'				=> 'cb_hero_slideshow',
			'title'				=> __('CB Hero Slideshow'),
			'description'		=> __(''),
			'render_template'	=> 'page-templates/blocks/cb_hero_slideshow.php',
			'category'			=> 'layout',
			'icon'				=> 'button',
			'keywords'			=> array( 'hero', 'slideshow' ),
			'mode'				=> 'edit',
            'supports' => array('mode' => false),
		));
		acf_register_block(array(
			'name'				=> 'cb_short_hero',
			'title'				=> __('CB Short Hero'),
			'description'		=> __(''),
			'render_template'	=> 'page-templates/blocks/cb_short_hero.php',
			'category'			=> 'layout',
			'icon'				=> 'button',
			'keywords'			=> array( 'short', 'hero' ),
			'mode'				=> 'edit',
            'supports' => array('mode' => false),
		));
		acf_register_block(array(
			'name'				=> 'cb_text_image',
			'title'				=> __('CB Text/Image'),
			'description'		=> __(''),
			'render_template'	=> 'page-templates/blocks/cb_text_image.php',
			'category'			=> 'layout',
			'icon'				=> 'align-pull-right',
			'keywords'			=> array( 'text', 'video' ),
			'mode'	=> 'edit',
            'supports' => array('mode' => false),
		));
		acf_register_block(array(
			'name'				=> 'cb_centred_block',
			'title'				=> __('CB Centred Text Block'),
			'description'		=> __(''),
			'render_template'	=> 'page-templates/blocks/cb_centred_block.php',
			'category'			=> 'layout',
			'icon'				=> 'align-pull-right',
			'keywords'			=> array( 'centred', 'text', 'width' ),
			'mode'	=> 'edit',
            'supports' => array('mode' => false),
		));
		acf_register_block(array(
			'name'				=> 'cb_cards',
			'title'				=> __('CB Cards'),
			'description'		=> __(''),
			'render_template'	=> 'page-templates/blocks/cb_cards.php',
			'category'			=> 'layout',
			'icon'				=> 'button',
			'keywords'			=> array( 'cards' ),
			'mode'				=> 'edit',
            'supports' => array('mode' => false),
		));
		acf_register_block(array(
			'name'				=> 'cb_featured_in',
			'title'				=> __('CB Logo Carousel'),
			'description'		=> __(''),
			'render_template'	=> 'page-templates/blocks/cb_featured_in.php',
			'category'			=> 'layout',
			'icon'				=> 'align-pull-right',
			'keywords'			=> array( 'logo', 'carousel' ),
			'mode'	=> 'edit',
            'supports' => array('mode' => false),
		));
        acf_register_block(array(
			'name'				=> 'cb_why_carousel',
			'title'				=> __('CB Why Carousel'),
			'description'		=> __(''),
			'render_template'	=> 'page-templates/blocks/cb_why_carousel.php',
			'category'			=> 'layout',
			'icon'				=> 'button',
			'keywords'			=> array( 'why', 'carousel' ),
			'mode'				=> 'edit',
            'supports' => array('mode' => false),
		));
        acf_register_block(array(
			'name'				=> 'cb_testimonials',
			'title'				=> __('CB Testimonials'),
			'description'		=> __(''),
			'render_template'	=> 'page-templates/blocks/cb_testimonials.php',
			'category'			=> 'layout',
			'icon'				=> 'button',
			'keywords'			=> array( 'testimonials' ),
			'mode'				=> 'edit',
            'supports' => array('mode' => false),
		));
        acf_register_block(array(
			'name'				=> 'cb_faq_block',
			'title'				=> __('CB FAQ'),
			'description'		=> __(''),
			'render_template'	=> 'page-templates/blocks/cb_faq_block.php',
			'category'			=> 'layout',
			'icon'				=> 'align-pull-right',
			'keywords'			=> array( 'faq' ),
			'mode'	=> 'edit',
            'supports' => array('mode' => false),
		));
        acf_register_block(array(
			'name'				=> 'cb_accordion',
			'title'				=> __('CB Accordion'),
			'description'		=> __(''),
			'render_template'	=> 'page-templates/blocks/cb_accordion.php',
			'category'			=> 'layout',
			'icon'				=> 'align-pull-right',
			'keywords'			=> array( 'accordion' ),
			'mode'	=> 'edit',
            'supports' => array('mode' => false),
		));
        acf_register_block(array(
			'name'				=> 'cb_news',
			'title'				=> __('CB News'),
			'description'		=> __(''),
			'render_template'	=> 'page-templates/blocks/cb_news.php',
			'category'			=> 'layout',
			'icon'				=> 'align-pull-right',
			'keywords'			=> array( 'news' ),
			'mode'	=> 'edit',
            'supports' => array('mode' => false),
		));
        acf_register_block(array(
			'name'				=> 'cb_ctas',
			'title'				=> __('CB CTA Buttons'),
			'description'		=> __(''),
			'render_template'	=> 'page-templates/blocks/cb_ctas.php',
			'category'			=> 'layout',
			'icon'				=> 'align-pull-right',
			'keywords'			=> array( 'cta', 'buttons' ),
			'mode'	=> 'edit',
            'supports' => array('mode' => false),
		));
		acf_register_block(array(
			'name'				=> 'cb_products',
			'title'				=> __('CB Products'),
			'description'		=> __(''),
			'render_template'	=> 'page-templates/blocks/cb_products.php',
			'category'			=> 'layout',
			'icon'				=> 'button',
			'keywords'			=> array( 'products' ),
			'mode'				=> 'edit',
            'supports' => array('mode' => false),
		));
		acf_register_block(array(
			'name'				=> 'cb_benefits',
			'title'				=> __('CB Benefits'),
			'description'		=> __(''),
			'render_template'	=> 'page-templates/blocks/cb_benefits.php',
			'category'			=> 'layout',
			'icon'				=> 'button',
			'keywords'			=> array( 'benefits' ),
			'mode'				=> 'edit',
            'supports' => array('mode' => false),
		));
		acf_register_block(array(
			'name'				=> 'cb_benefit_table--health',
			'title'				=> __('CB Health Benefit Table'),
			'description'		=> __(''),
			'render_template'	=> 'page-templates/blocks/cb_benefit_table--health.php',
			'category'			=> 'layout',
			'icon'				=> 'button',
			'keywords'			=> array( 'benefit', 'table', 'health' ),
			'mode'				=> 'edit',
            'supports' => array('mode' => false),
		));
		acf_register_block(array(
			'name'				=> 'cb_benefit_table--travel',
			'title'				=> __('CB Travel Benefit Table'),
			'description'		=> __(''),
			'render_template'	=> 'page-templates/blocks/cb_benefit_table--travel.php',
			'category'			=> 'layout',
			'icon'				=> 'button',
			'keywords'			=> array( 'benefit', 'table', 'travel' ),
			'mode'				=> 'edit',
            'supports' => array('mode' => false),
		));
		acf_register_block(array(
			'name'				=> 'cb_statistics',
			'title'				=> __('CB Statistics'),
			'description'		=> __(''),
			'render_template'	=> 'page-templates/blocks/cb_statistics.php',
			'category'			=> 'layout',
			'icon'				=> 'button',
			'keywords'			=> array( 'statistics' ),
			'mode'				=> 'edit',
            'supports' => array('mode' => false),
		));
		acf_register_block(array(
			'name'				=> 'cb_rewards',
			'title'				=> __('CB Rewards Table'),
			'description'		=> __(''),
			'render_template'	=> 'page-templates/blocks/cb_rewards.php',
			'category'			=> 'layout',
			'icon'				=> 'button',
			'keywords'			=> array( 'rewards', 'table' ),
			'mode'				=> 'edit',
            'supports' => array('mode' => false),
		));
		acf_register_block(array(
			'name'				=> 'cb_countries',
			'title'				=> __('CB Countries'),
			'description'		=> __(''),
			'render_template'	=> 'page-templates/blocks/cb_countries.php',
			'category'			=> 'layout',
			'icon'				=> 'button',
			'keywords'			=> array( 'countries' ),
			'mode'				=> 'edit',
            'supports' => array('mode' => false),
		));
		acf_register_block(array(
			'name'				=> 'cb_three_images',
			'title'				=> __('CB Three Images'),
			'description'		=> __(''),
			'render_template'	=> 'page-templates/blocks/cb_three_images.php',
			'category'			=> 'layout',
			'icon'				=> 'button',
			'keywords'			=> array( 'three', 'images' ),
			'mode'				=> 'edit',
            'supports' => array('mode' => false),
		));
		acf_register_block(array(
			'name'				=> 'cb_country_hero',
			'title'				=> __('CB Country Hero'),
			'description'		=> __(''),
			'render_template'	=> 'page-templates/blocks/cb_country_hero.php',
			'category'			=> 'layout',
			'icon'				=> 'button',
			'keywords'			=> array( 'country', 'hero' ),
			'mode'				=> 'edit',
            'supports' => array('mode' => false),
			'post_types' => array( 'country','expat-country-guides' ),
		));
		acf_register_block(array(
			'name'				=> 'cb_title_content',
			'title'				=> __('CB Title Content'),
			'description'		=> __(''),
			'render_template'	=> 'page-templates/blocks/cb_title_content.php',
			'category'			=> 'layout',
			'icon'				=> 'button',
			'keywords'			=> array( 'title', 'content' ),
			'mode'				=> 'edit',
            'supports' => array('mode' => false),
		));
		acf_register_block(array(
			'name'				=> 'cb_modal_form',
			'title'				=> __('CB Modal Form'),
			'description'		=> __(''),
			'render_template'	=> 'page-templates/blocks/cb_modal_form.php',
			'category'			=> 'layout',
			'icon'				=> 'button',
			'keywords'			=> array( 'modal','form' ),
			'mode'				=> 'edit',
			'supports' => array('mode' => false),
		));
		acf_register_block(array(
			'name'				=> 'cb_spinner',
			'title'				=> __('CB Stat Spinner'),
			'description'		=> __(''),
			'render_template'	=> 'page-templates/blocks/cb_spinner.php',
			'category'			=> 'layout',
			'icon'				=> 'button',
			'keywords'			=> array( 'stat','spinner' ),
			'mode'				=> 'edit',
			'supports' => array('mode' => false),
		));
		acf_register_block(array(
			'name'				=> 'cb_places',
			'title'				=> __('CB Places'),
			'description'		=> __(''),
			'render_template'	=> 'page-templates/blocks/cb_places.php',
			'category'			=> 'layout',
			'icon'				=> 'button',
			'keywords'			=> array( 'places' ),
			'post_types'			=> array( 'country' ),
			'mode'				=> 'edit',
            'supports' => array('mode' => false),
		));
		acf_register_block(array(
			'name'				=> 'cb_hospital_list',
			'title'				=> __('CB Hospital List'),
			'description'		=> __(''),
			'render_template'	=> 'page-templates/blocks/cb_hospital_list.php',
			'category'			=> 'layout',
			'icon'				=> 'button',
			'keywords'			=> array( 'hospital', 'list' ),
			'mode'				=> 'edit',
            'supports' => array('mode' => false),
		));
		acf_register_block(array(
			'name'				=> 'cb_children',
			'title'				=> __('CB Child Pages'),
			'description'		=> __(''),
			'render_template'	=> 'page-templates/blocks/cb_children.php',
			'category'			=> 'layout',
			'icon'				=> 'button',
			'keywords'			=> array( 'child', 'pages' ),
			'mode'				=> 'edit',
            'supports' => array('mode' => false),
		));
		acf_register_block(array(
			'name'				=> 'cb_cashless_hero',
			'title'				=> __('CB Cashless Hero'),
			'description'		=> __(''),
			'render_template'	=> 'page-templates/blocks/cb_cashless_hero.php',
			'category'			=> 'layout',
			'icon'				=> 'button',
			'keywords'			=> array( 'cashless', 'hero' ),
			'mode'				=> 'edit',
            'supports' => array('mode' => false),
		));
		acf_register_block(array(
			'name'				=> 'cb_expat_pay',
			'title'				=> __('CB Expat Pay CTA'),
			'description'		=> __(''),
			'render_template'	=> 'page-templates/blocks/cb_expat_pay.php',
			'category'			=> 'layout',
			'icon'				=> 'button',
			'keywords'			=> array( 'expat', 'pay' ),
			'mode'				=> 'edit',
            'supports' => array('mode' => false),
		));
		acf_register_block(array(
			'name'				=> 'cb_countries_2025',
			'title'				=> __('CB Countries 2025'),
			'description'		=> __(''),
			'render_template'	=> 'page-templates/blocks/cb_countries_2025.php',
			'category'			=> 'layout',
			'icon'				=> 'button',
			'keywords'			=> array( 'expat', 'countries' ),
			'mode'				=> 'edit',
            'supports' => array('mode' => false),
		));
/*		acf_register_block(array(
			'name'				=> 'cb_image_title',
			'title'				=> __('CB Image Title'),
			'description'		=> __(''),
			'render_template'	=> 'page-templates/blocks/cb_image_title.php',
			'category'			=> 'layout',
			'icon'				=> 'cover-image',
			'keywords'			=> array( 'image', 'title' ),
			'mode'	=> 'edit',
            'supports' => array('mode' => false),
		));
		acf_register_block(array(
			'name'				=> 'cb_video',
			'title'				=> __('CB Video'),
			'description'		=> __(''),
			'render_template'	=> 'page-templates/blocks/cb_video.php',
			'category'			=> 'layout',
			'icon'				=> 'format-video',
			'keywords'			=> array( 'video' ),
			'mode'	=> 'edit',
            'supports' => array('mode' => false),
		));


		acf_register_block(array(
			'name'				=> 'cb_howto_block2',
			'title'				=> __('CB HowTo (Accordion)'),
			'description'		=> __(''),
			'render_template'	=> 'page-templates/blocks/cb_howto_accordion.php',
			'category'			=> 'layout',
			'icon'				=> 'align-pull-right',
			'keywords'			=> array( 'howto-accordion' ),
			'mode'	=> 'edit',
            'supports' => array('mode' => false),
		));
		acf_register_block(array(
			'name'				=> 'cb_cta_button',
			'title'				=> __('CB CTA Button'),
			'description'		=> __(''),
			'render_template'	=> 'page-templates/blocks/cb_cta_button.php',
			'category'			=> 'layout',
			'icon'				=> 'button',
			'keywords'			=> array( 'cta-button' ),
			'mode'	=> 'edit',
            'supports' => array('mode' => false),
		));

		acf_register_block(array(
			'name'				=> 'cb_banner_cta',
			'title'				=> __('CB Banner CTA'),
			'description'		=> __(''),
			'render_template'	=> 'page-templates/blocks/cb_banner_cta.php',
			'category'			=> 'layout',
			'icon'				=> 'button',
			'keywords'			=> array( 'banner', 'cta' ),
			'mode'				=> 'edit',
            'supports' => array('mode' => false),
		));
		acf_register_block(array(
			'name'				=> 'cb_start_container',
			'title'				=> __('CB Start Container'),
			'description'		=> __(''),
			'render_template'	=> 'page-templates/blocks/cb_start_container.php',
			'category'			=> 'layout',
			'icon'				=> 'button',
			'keywords'			=> array( 'start', 'container' ),
			'mode'				=> 'edit',
            'supports' => array('mode' => false),
		));
		acf_register_block(array(
			'name'				=> 'cb_end_container',
			'title'				=> __('CB End Container'),
			'description'		=> __(''),
			'render_template'	=> 'page-templates/blocks/cb_end_container.php',
			'category'			=> 'layout',
			'icon'				=> 'button',
			'keywords'			=> array( 'end', 'container' ),
			'mode'				=> 'edit',
            'supports' => array('mode' => false),
		));
		acf_register_block(array(
			'name'				=> 'cb_four_col_nav',
			'title'				=> __('CB 4 Col Nav'),
			'description'		=> __(''),
			'render_template'	=> 'page-templates/blocks/cb_four_col_nav.php',
			'category'			=> 'layout',
			'icon'				=> 'button',
			'keywords'			=> array( '4', 'four', 'col', 'nav' ),
			'mode'				=> 'edit',
            'supports' => array('mode' => false),
		));






*/
	}
}
add_action('acf/init', 'acf_blocks');

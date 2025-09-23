<?php

require_once CB_THEME_DIR . '/inc/cb-performance.php';
require_once CB_THEME_DIR . '/inc/cb-utility.php';
require_once CB_THEME_DIR . '/inc/cb-types.php';
require_once CB_THEME_DIR . '/inc/cb-taxes.php';
require_once CB_THEME_DIR . '/inc/cb-blog.php';
require_once CB_THEME_DIR . '/inc/cb-blocks.php';
require_once CB_THEME_DIR . '/inc/cb-brokers.php';


if (function_exists('acf_add_options_page')) {
    acf_add_options_page(
        array(
            'page_title' 	=> 'Site-Wide Settings',
            'menu_title'	=> 'Site-Wide Settings',
            'menu_slug' 	=> 'theme-general-settings',
            'capability'	=> 'edit_posts',
        )
    );
}
 
add_filter( 'gform_submit_button_1', 'form_submit_button', 10, 2 );
function form_submit_button( $button, $form ) {
    return "<button class='btn btn-primary rounded-pill px-4 mx-auto' id='gform_submit_button_{$form['id']}'><span>Subscribe</span></button>";
}

function widgets_init()
{

    register_sidebar(
        array(
            'name'          => 'Footer Col 1',
            'id'            => 'footer-1',
            'description'   => 'Footer Col 1',
            'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
            'after_widget'  => '</div>',
        )
    );

    register_nav_menus(array(
        'top_nav' => 'Top Nav',
    ));

    register_nav_menus(array(
        'primary_nav' => 'Primary Nav',
    ));

    register_nav_menus(array(
        'footer_menu1' => 'Footer Menu - iPMI',
    ));
    register_nav_menus(array(
        'footer_menu2' => 'Footer Menu - Treatment',
    ));
    register_nav_menus(array(
        'footer_menu3' => 'Footer Menu - Travel Insurance',
    ));
    register_nav_menus(array(
        'footer_menu4' => 'Footer Menu - Other Products',
    ));
    register_nav_menus(array(
        'footer_menu5' => 'Footer Menu - Useful Links',
    ));

    unregister_sidebar('hero');
    unregister_sidebar('herocanvas');
    unregister_sidebar('statichero');
    unregister_sidebar('left-sidebar');
    unregister_sidebar('right-sidebar');
    unregister_sidebar('footerfull');
    unregister_nav_menu('primary');

}
add_action('widgets_init', 'widgets_init', 11);


function cb_news_posts($cat) {
	$args = array(
		'post_type' => 'post',
    	'posts_per_page' => 4,
	);

	if ($cat != 'all') {
		$args['category_name'] = $cat; 
	}
	$ps = new WP_Query($args);

	return $ps;
}

// add quote buttons to primary_nav
function add_first_nav_item($items, $args) {
	if( $args->theme_location == 'primary_nav' ) {
		return $items . '
        <li class="d-none d-lg-block">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#quoteModal">Get Quote</button>
        </li>
        ';
	}
	return $items;
}
add_filter('wp_nav_menu_items','add_first_nav_item', 10, 2);

// add retrieve/renew links to top_nav
function add_top_nav_items($items, $args) {
	if( $args->theme_location == 'top_nav' ) {
        $phone = get_field('contact_phone','options');
        $phone_link = parse_phone($phone);
        $malaysia_phone = get_field('malaysia_phone','options');
        $malaysia_phone_link = parse_phone($malaysia_phone);
		return $items . '
        <li class="menu-item nav-item">
            <a type="button" class="nav-link" data-bs-toggle="modal" data-bs-target="#retrieveModal">Retrieve Quote</a>
        </li>
        <li class="menu-item nav-item">
            <a class="nav-link fw-bold" href="tel:' . $malaysia_phone_link . '">' . $malaysia_phone . ' (MY)</a>
        </li>
        <li class="menu-item nav-item">
            <a class="nav-link fw-bold" href="tel:' . $phone_link . '">' . $phone . ' (UK)</a>
        </li>
        ';
	}
	return $items;
}
add_filter('wp_nav_menu_items','add_top_nav_items', 10, 2);
// mobile nav
function add_mobile_nav_items($items, $args) {
	if( $args->theme_location == 'primary_nav' ) {
		return $items . '
        <li class="menu-item nav-item d-lg-none">
            <a class="nav-link fw-bold" href="/contact-us/">Contact Us</a>
        </li>
        <li class="menu-item nav-item d-lg-none">
            <a class="nav-link fw-bold" href="/brokers/">Brokers</a>
        </li>
        <li class="menu-item nav-item d-lg-none mt-2">
            <a type="button" class="d-block btn btn-default--inverse border-default" data-bs-toggle="modal" data-bs-target="#retrieveModal">Retrieve Quote</a>
        </li>
        <li class="d-block d-lg-none my-2">
            <a type="button" class="d-block btn btn-primary text-white" data-bs-toggle="modal" data-bs-target="#quoteModal">Get Quote</a>
        </li>
        ';
	}
	return $items;
}
add_filter('wp_nav_menu_items','add_mobile_nav_items', 10, 2);


add_shortcode('quote_button', function($atts){
    extract(shortcode_atts(array(
        'type' => 'default',
        'label' => 'Get a Quote'
    ), $atts));

    $out = '';

    if ($type == 'health') {
        $out = '<a href="' . get_field('health_quote','options') . '" class="btn btn-health">' . $label . '</a>';
    }
    elseif ($type == 'travel') {
        $out = '<a href="' . get_field('travel_quote','options') . '" class="btn btn-travel">' . $label . '</a>';
    }
    elseif ($type == 'life') {
        $out = '<a href="' . get_field('life_quote','options') . '" class="btn btn-life">' . $label . '</a>';
    }
    elseif ($type == 'income') {
        $out = '<a href="' . get_field('income_quote','options') . '" class="btn btn-income">' . $label . '</a>';
    }
    else {
        $out = '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#quoteModal">' . $label . '</button>';
    }

    return $out;

});


function country_cards($id) {
    ob_start();

    $q = new WP_Query(array(
        'post_type' => 'country',
        'posts_per_page' => 4,
        'post__not_in' => array($id)
    ));

    echo '<div class="row g-4 countries">';
    while ($q->have_posts()) {
        $q->the_post();
        $c = get_the_ID();
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
                    <div class="px-2 mt-5 pt-5 h4 text-white">
                        <div class="fs-6">Moving to</div>
                        <div class="fs-2"><?=get_field('country',$c)?></div>
                    </div>
                </div>
            </a>
        </div>
        <?php
    }
    echo '</div>';

    $output = ob_get_clean();
    return $output;
}


// override Gutenberg blocks here

add_filter( 'register_block_type_args', 'core_image_block_type_args', 10, 3 );
function core_image_block_type_args( $args, $name ) {
    if ( $name == 'core/table' ) {
        $args['render_callback'] = 'modify_core_table';
    }
    if ( $name == 'core/paragraph' ) {
        $args['render_callback'] = 'modify_core_add_container';
    }
    if ( $name == 'core/columns' ) {
        $args['render_callback'] = 'modify_core_add_container';
    }
    if ( $name == 'core/heading' ) {
        $args['render_callback'] = 'modify_core_heading';
    }
    if ( $name == 'core/shortcode' ) {
        $args['render_callback'] = 'modify_core_shortcode';
    }
    if ( $name == 'core/list' ) {
        $args['render_callback'] = 'modify_core_list';
    }
    if ( $name == 'core/image' ) {
        $args['render_callback'] = 'modify_core_add_container';
    }
    if ( $name == 'core/group' ) {
        $args['render_callback'] = 'modify_core_add_container';
    }
    return $args;
}

function modify_core_table($attributes, $content) {
    ob_start();

    $xml = simplexml_load_string($content);

    $caption = $xml->figcaption;

    $content = preg_replace('/<table>/','<table class="table table-sm">',$content);
    $content = preg_replace('/<figcaption>.*<\/figcaption>/','',$content);

    ?>
    <div class="container-xl cb_table table-responsive">
        <figcaption><?=$caption?></figcaption>
        <?=$content?>
    </div>
    <?php
    $content = ob_get_clean();
	return $content;
}

function modify_core_add_container($attributes, $content) {
    ob_start();
    ?>
    <div class="container-xl">
        <?=$content?>
    </div>
    <?php
    $content = ob_get_clean();
	return $content;
}

function modify_core_list($attributes, $content) {
    ob_start();
    ?>
    <div class="container-xl list-dots">
        <?=$content?>
    </div>
    <?php
    $content = ob_get_clean();
	return $content;
}

function modify_core_heading($attributes, $content) {
    ob_start();
    $id = strtolower( wp_strip_all_tags( $content ) );
    $id = cbslugify($id);
    ?>
    <div class="container-xl pt-4" id="<?=$id?>">
        <?=$content?>
    </div>
    <?php
    $content = ob_get_clean();
	return $content;
}

function modify_core_shortcode($attributes, $content) {
    ob_start();
    ?>
    <div class="container-xl pb-4">
        <?=$content?>
    </div>
    <?php
    $content = ob_get_clean();
	return $content;
}

function parse_tick($str, $t = 'select') {
    $replacement = '<img src="' . get_stylesheet_directory_uri() . '/img/tick_' . $t . '.png" alt="Yes" class="img-fluid" style="max-width: 25px;" />';
    $str = preg_replace('/{tick}/', $replacement, $str);
    return $str;
}


function table_of_contents() {
    ob_start();
    global $post;
	$blocks = parse_blocks( $post->post_content );
	$headings = array();
	foreach( $blocks as $block ) {
		if( 'core/heading' === $block['blockName'] )
            // cbdump($block['attrs']);
            // return ob_get_clean();
            if (!$block['attrs']['level'] || $block['attrs']['level'] == 2) {
    			$headings[] = wp_strip_all_tags( $block['innerHTML'] );
            }
	}
	if( !empty( $headings ) ) {
        echo '<div class="table-of-contents">';
        echo '<strong>Contents</strong>';
		echo '<ol>';
		foreach( $headings as $heading ) {
            $id = strtolower( $heading );
            $id = cbslugify($id);
			echo '<li><a href="#' . $id . '">' . $heading . '</a></li>';
        }
		echo '</ol>';
		echo '</div>';
	}
    return ob_get_clean();
}

add_shortcode('toc','table_of_contents');

// Function to display pages in a hierarchical list
function display_page_hierarchy($parent_id = 0) {
    // Get the pages with the specified parent, sorted by title
    $args = array(
        'post_type' => 'page',
        'post_status' => 'publish',
        'parent' => $parent_id,
        'sort_column' => 'post_title', // Sort by post title for alphabetical order
        'sort_order' => 'ASC'          // Sort ascending (A-Z)
    );

    $pages = get_pages($args);

    $output = '';
    
    if (!empty($pages)) {
        $output .= '<ul>';
        foreach ($pages as $page) {
            $output .= '<li><a href="' . get_permalink($page->ID) . '">' . $page->post_title . '</a>';

            // Recursively display child pages, also sorted by title
            $output .= display_page_hierarchy($page->ID); // Get nested child pages

            $output .= '</li>';
        }
        $output .= '</ul>';
    }

    return $output;
}

// Register the shortcode to display the hierarchical page list
function register_page_list_shortcode() {
    // Start output buffering
    ob_start();

    // Display the hierarchical list
    echo display_page_hierarchy();

    // Return the buffered content
    return ob_get_clean();
}
add_shortcode('page_list', 'register_page_list_shortcode');



/* 20230330 - adding timeRequired to article schema
I don't think the new Yoast functions are mature enough to do this yet.


function add_time_required_to_yoast_article_schema( $data ) {
    $post_id = get_the_ID();
    $time = estimate_reading_time_in_minutes(get_the_content(null, false, $post_id), 200, true, false);

    $time_required = 'PT' . $time . 'M'; // replace this with the time required for the article in ISO 8601 duration format

    $data['@type'] = 'Article';
    $data['timeRequired'] = array(
      '@type' => 'Duration',
      'description' => 'Estimated time to read the article',
      'value' => $time_required
    );

    return $data;
}

add_filter( 'wpseo_schema_article', 'add_time_required_to_yoast_article_schema' );

*/

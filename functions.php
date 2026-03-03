<?php
/**
 * Understrap Child Theme functions and definitions
 *
 * @package UnderstrapChild
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

define('CB_THEME_DIR', WP_CONTENT_DIR . '/themes/cb-expat2022');

require_once CB_THEME_DIR . '/inc/cb-theme.php';
// require_once CB_THEME_DIR . '/inc/cb-news.php';


/**
 * Removes the parent themes stylesheet and scripts from inc/enqueue.php
 */
function understrap_remove_scripts() {
	wp_dequeue_style( 'understrap-styles' );
	wp_deregister_style( 'understrap-styles' );

	wp_dequeue_script( 'understrap-scripts' );
	wp_deregister_script( 'understrap-scripts' );
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );



/**
 * Enqueue our stylesheet and javascript file
 */
function theme_enqueue_styles() {

	// Get the theme data.
	$the_theme = wp_get_theme();

	$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	// Grab asset urls.
	$theme_styles  = "/css/child-theme{$suffix}.css";
	$theme_scripts = "/js/child-theme{$suffix}.js";

	wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . $theme_styles, array(), $the_theme->get( 'Version' ) );
	//wp_enqueue_style( 'font-awesome-v4', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/fontawesome.min.css', array(), $the_theme->get( 'Version' ) );
	//wp_enqueue_style( 'font-awesome-v4-brands', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/brands.min.css', array(), $the_theme->get( 'Version' ) );
	
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . $theme_scripts, array(), $the_theme->get( 'Version' ), true );

	wp_enqueue_script( 'slick-scripts', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', array(), '1.8.1', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );



/**
 * Load the child theme's text domain
 */
function add_child_theme_textdomain() {
	load_child_theme_textdomain( 'cb-expat', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );



/**
 * Overrides the theme_mod to default to Bootstrap 5
 *
 * This function uses the `theme_mod_{$name}` hook and
 * can be duplicated to override other theme settings.
 *
 * @param string $current_mod The current value of the theme_mod.
 * @return string
 */
function understrap_default_bootstrap_version( $current_mod ) {
	return 'bootstrap5';
}
add_filter( 'theme_mod_understrap_bootstrap_version', 'understrap_default_bootstrap_version', 20 );



/**
 * Loads javascript for showing customizer warning dialog.
 */
function understrap_child_customize_controls_js() {
	wp_enqueue_script(
		'understrap_child_customizer',
		get_stylesheet_directory_uri() . '/js/customizer-controls.js',
		array( 'customize-preview' ),
		'20130508',
		true
	);
}
add_action( 'customize_controls_enqueue_scripts', 'understrap_child_customize_controls_js' );

function add_trustpilot_code(){
?>
<!-- TrustBox script -->
<script type="text/javascript" src="//widget.trustpilot.com/bootstrap/v5/tp.widget.bootstrap.min.js" async></script>
<!-- End TrustBox script -->
<?php
}
add_action('wp_head', 'add_trustpilot_code');

function bg_disable_front_page_wpseo_next_rel_link( $link ) {
    if ( is_post_type_archive( 'country' ) ) {
        return false;
    }

    return $link;
}
add_filter( 'wpseo_next_rel_link', 'bg_disable_front_page_wpseo_next_rel_link' );

function get_unique_acf_country_values_by_continent( $continent_slug ) {
    $unique_countries = [];

    $query = new WP_Query([
        'post_type'      => 'expat-country-guides',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
        'fields'         => 'ids',
        'meta_key'       => 'country',
        'tax_query'      => [
            [
                'taxonomy' => 'continent',
                'field'    => 'slug',
                'terms'    => $continent_slug,
            ],
        ],
    ]);

    if ( $query->have_posts() ) {
        foreach ( $query->posts as $post_id ) {
            $value = get_field('country', $post_id);
            if ( $value ) {
                if ( is_array($value) ) {
                    $unique_countries = array_merge($unique_countries, $value);
                } else {
                    $unique_countries[] = $value;
                }
            }
        }
    }

    // Remove duplicates and sort
    $unique_countries = array_unique($unique_countries);
    sort($unique_countries, SORT_NATURAL | SORT_FLAG_CASE);

    return $unique_countries;
}

function get_unique_acf_country_values() {
    $unique_countries = [];

    $query = new WP_Query([
        'post_type'      => 'expat-country-guides',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
        'fields'         => 'ids',
        'meta_key'       => 'country',
    ]);

    if ( $query->have_posts() ) {
        foreach ( $query->posts as $post_id ) {
            $value = get_field('country', $post_id);
            if ( $value ) {
                if ( is_array($value) ) {
                    $unique_countries = array_merge($unique_countries, $value);
                } else {
                    $unique_countries[] = $value;
                }
            }
        }
    }

    // Remove duplicates and sort
    $unique_countries = array_unique($unique_countries);
    sort($unique_countries, SORT_NATURAL | SORT_FLAG_CASE);

    return $unique_countries;
}

function get_country_guides_by_country( $country_name ) {
    $query = new WP_Query([
        'post_type'      => 'expat-country-guides',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
        'orderby' => 'title',
        'order' => 'DESC',
        'meta_query'     => [
            [
                'key'     => 'country',
                'value'   => $country_name,
                'compare' => '='
            ]
        ]
    ]);

    return $query->posts;
}

// Add shortcode [srg_logo]
function srg_logo_shortcode() {
    $logo_url = 'https://www.expatriatehealthcare.com/wp-content/uploads/2025/10/SRG-Teal-300x60.png';

    return '<a href="https://specialistrisk.com/" target="_blank"><img src="' . esc_url( $logo_url ) . '" alt="SRG Logo" 
        class="img-fluid mx-auto d-block d-sm-inline float-sm-end ms-sm-3 mb-3 srg-logo" /></a>';
}
add_shortcode( 'srg_logo', 'srg_logo_shortcode' );

function ehc_normalise_date_ddmmyyyy($raw) {
    $raw = trim((string) $raw);
    if ($raw === '') return '';

    $formats = ['d/m/Y', 'd-m-Y', 'Y-m-d', 'Y/m/d'];

    foreach ($formats as $fmt) {
        $dt = DateTime::createFromFormat($fmt, $raw);
        if ($dt) {
            return $dt->format('d/m/Y');
        }
    }

    // already dd/mm/yyyy?
    if (preg_match('~^\d{2}/\d{2}/\d{4}$~', $raw)) return $raw;

    return '';
}

add_action('gform_after_submission_4', function($entry, $form) {

    $target = 'https://quote.expatriatehealthcare.com/healthcare';

    $qty   = (int) rgar($entry, '1');   // People to insure (field 1)
    $cover = (string) rgar($entry, '3'); // Area of cover (field 3)
    $email = (string) rgar($entry, '4'); // Email (field 4)

    // Cover: your GF stores the LABEL text, but target expects 1/2/3.
    // Map by prefix:
    $coverVal = '0';
    if (stripos($cover, 'Area 1') === 0) $coverVal = '1';
    if (stripos($cover, 'Area 2') === 0) $coverVal = '2';
    if (stripos($cover, 'Area 3') === 0) $coverVal = '3';

    // GF field IDs for DOB1..DOB10 in your form are 5..14
    $dobFieldIds = range(5, 14);

    $post = [
        'QtyPeople'  => (string) $qty,
        'Cover'      => $coverVal,
        'Email'      => $email,
        'QuickQuote' => '1',
        'QuoteID'    => '0',
        'Step'       => '1',
        'Section'    => 'process',
    ];

    // Fill DOB fields up to qty selected
    for ($i = 1; $i <= min($qty, 10); $i++) {
        $gfFieldId = (string) (4 + $i); // 5..14
        $rawDob    = (string) rgar($entry, $gfFieldId);

        $dob = ehc_normalise_date_ddmmyyyy($rawDob);

        // send the combined DOB string
        $post["DOB{$i}"] = $dob;

        // OPTIONAL: also send split values (can help if their backend expects it)
        if ($dob) {
            [$d, $m, $y] = explode('/', $dob);
            $post["DOB{$i}_D"] = $d;
            $post["DOB{$i}_M"] = $m;
            $post["DOB{$i}_Y"] = $y;
        }
    }

    // Debug what we’re about to send (optional)
    // error_log('EHC POST: ' . print_r($post, true));

    // Output auto-posting form
    echo '<!doctype html><html><head><meta charset="utf-8"><title>Redirecting…</title></head><body>';
    echo '<form id="ehcPost" method="POST" action="' . esc_url($target) . '">';

    foreach ($post as $k => $v) {
        echo '<input type="hidden" name="' . esc_attr($k) . '" value="' . esc_attr($v) . '">';
    }

    echo '</form>';
    echo '<script>document.getElementById("ehcPost").submit();</script>';
    echo '</body></html>';

    exit;
}, 10, 2);
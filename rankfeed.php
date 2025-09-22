<?php
define('WP_USE_THEMES', false); // Don't load theme support functionality
require_once("../../../wp-load.php");


// require __DIR__.'/db_credentials.php';

function parseToXML($htmlStr)
{
    $xmlStr=str_replace("&#8211;", '-', $htmlStr);
    $xmlStr=str_replace("&#038;", '&', $xmlStr);
    $xmlStr=str_replace("&#8217;", "'", $xmlStr);
    $xmlStr = htmlspecialchars($xmlStr);
    // $xmlStr=str_replace('<', '&lt;', $xmlStr);
    // $xmlStr=str_replace('>', '&gt;', $xmlStr);
    // $xmlStr=str_replace('"', '&quot;', $xmlStr);
    // // $xmlStr=str_replace("-", '&#45;', $xmlStr);
    // $xmlStr=str_replace("'", '&#39;', $xmlStr);
    // $xmlStr=str_replace("&", '&amp;', $xmlStr);
    return $xmlStr;
}



$coords = array();
header("Content-type: text/xml");
echo "<?xml version='1.0' ?>";

echo '<markers>';

// Perform rank query
$ranks = new WP_Query(array(
    'post_type' => 'ranks',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'orderby' => 'menu_order',
    'order' => 'ASC'
));

$rank = 1;
while ($ranks->have_posts()) {
    $ranks->the_post();

    if (!preg_match('/^[0-9]/', get_field('lat'))) {
        continue;
    }

    $country = 'country="' . get_the_title() . '" ';
    $cc = 'cc="' . get_field('country_code') . '" ';

    echo '<marker ';
    echo 'id="' . get_the_ID() . '" ';
    echo 'rank="' . $rank . '" ';
    $rank++;
    echo 'lat="' . get_field('lat') . '" ';
    echo 'lng="' . get_field('long') . '" ';
    echo 'zoom="' . get_field('zoom') . '" ';
    echo 'living="' . number_format(get_field('living_cost')) . '" ';
    echo 'hours="' . get_field('hours') . '" ';

    $salpct = sprintf("%.1f", (get_field('living_cost') / get_field('salary') ) * 100);
    // $salpct = 100 - $notsal;

    echo 'salary="' . $salpct . '" ';
    echo 'job="' . get_field('best_job') . '" ';
    echo 'flag="' . get_stylesheet_directory_uri() . '/img/flags/4x3/' . strtolower(get_field('country_code')) . '.svg" ';
    echo $country;
    echo $cc;
    echo "/>";

}

echo '</markers>';

die();

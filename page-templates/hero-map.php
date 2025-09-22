<?php
/**
 * Template Name: Map Hero Page
 *
 * Template for displaying a page with a hero map title.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();

$cc = 'XX';

?>
<style>
    #top {
        margin-top: 10rem;
    }
    #map {
        height: 540px;
        width: 100%;
    }

    .rank {
        border: 1px solid rgba(0, 0, 0, .125);
        border-radius: .25rem;
        margin-bottom: 0.5rem;
        overflow: hidden;
        display: grid;
        grid-template-columns: 1fr 2fr 2fr;
        grid-gap: 0px;
        grid-template-areas:
            "flag title title"
            "flag showLink infoLink";
    }

    .rank h5 {
        grid-area: title;
        padding-left: 0.25rem;
        font-weight: bold;
        font-size: 1rem;
    }

    .rank .flag {
        grid-area: flag;
        grid-row: 1 / span 2;
    }
    .rank .flag .flag-image {
        height: 45px;
    }

    .rank a {
        display: inline-block;
        text-align: right;
        padding-right: 0.25rem;
    }

    .showLink {
        grid-area: showLink;
        font-size: 0.8rem;
    }

    .infoLink {
        grid-area: infoLink;
        font-size: 0.8rem;
    }

    .infowin {
        width: 300px;
    }

    .infowin .flag {
        display: inline-block;
        width: 50px;
        vertical-align: top;
        padding-top: 5px;
    }

    .infowin .flag .flag-image {
        width: 50px;
    }

    .infowin .infoRank {
        display: inline-block;
        width: 50px;
        font-weight: 700;
        font-size: 22px;
        text-align: right;
        padding: 5px;
    }

    .infowin .title {
        display: inline;
        width: 200px;
        font-weight: 700;
        font-size: 22px;
        padding: 5px;
        margin-bottom: 5px;
    }

    .infowin .salary,
    .infowin .hours,
    .infowin .cost {
        display: flex;
        padding: 5px 0;
    }

    .infowin .subtitle {
        width: 230px;
        font-size: 16px;
    }

    .infowin .value {
        width: 70px;
        font-weight: 700;
        font-size: 18px;
    }

    .infowin a {
        display: inline-block;
        width: 100%;
        text-align: center;
        font-size: 18px;
    }

    .bg-grey {
        background-color: #f5f7f8;
    }

    .h2 {
        color: #164E95;
    }

    .rank-no {
        display: inline-block;
        width: 30px;
        text-align: right;
        margin: 0 10px;
    }

    .rank-flag {
        height: 1.6rem;
        width: auto;
        vertical-align: baseline;
    }

    a {
        color: #F86B35;
    }

    ol {
        padding-inline-start: 1rem;
    }

    .table tbody {
        display: table-row-group;
    }
    .news-image {
        height: 200px;
        background-size: cover;
        background-position: center center;
    }
    .bg-grey {
        position: relative;
        min-height: 260px;
    }
    a.more-button {
        position: absolute;
        bottom: 10px;
        right: 10px;
        color: #fff !important;
        border-radius: 5px;
        padding: 8px 10px;
        display: inline-block;
        text-transform: uppercase;
        font-size: 16px;
        font-weight: 600;
        background-color: #2CA1D8;
    }
    h4 {
        color: #00A0E3;
    }
</style>
<div class="container" id="top">
    <h1 class="mb-4"><?=get_the_title()?></h1>
    <div class="row">
        <div class="col-12">
            <?=get_field('pre-map_content')?>
        </div>
    </div>
</div>
<div class="container mt-4" id="mapanchor">
    <div class="row pb-4">
        <div class="col-12 col-md-4">
            <div id="sidebar"></div>
        </div>
        <div class="col-12 col-md-8">
            <div id=map></div>
        </div>
    </div>
</div>
<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <?=get_field('post-map_content')?>
        </div>
    </div>
</div>
<?php
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
        $bg = ($rank % 2) ? 'bg-grey' : 'bg-white';
        ?>
<div class="py-4 <?=$bg?>">
    <div class="container">
        <div class="row py-4" id="<?=get_field('country_code')?>">
            <div class="mb-4 col-12">
                <div class="h2"><img src="<?=get_stylesheet_directory_uri()?>/img/flags/4x3/<?=strtolower(get_field('country_code'))?>.svg"
                        class="rank-flag"><span class="rank-no"><?=$rank?></span><?=get_the_title()?></div>
            </div>
            <div class="mb-4 col-6">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="h4"><span class="small">Best Paid Job</span></div>
                        <div class="h4"><?=get_field('best_job')?></div>
                    </div>
                </div>
            </div>
            <div class="mb-4 col-6">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="h4"><span class="small">Average Working Hours</span></div>
                        <div class="h4"><?=get_field('hours')?></div>
                    </div>
                </div>
            </div>
            <div class="mb-4 col-4">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="h4"><span class="small">Average Cost of Living</span></div>
                        <div class="h4">$<?=number_format(get_field('living_cost'))?></div>
                    </div>
                </div>
            </div>
            <div class="mb-4 col-4">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="h4"><span class="small">Average Monthly Salary</span></div>
                        <div class="h4">$<?=number_format(get_field('salary'))?></div>
                    </div>
                </div>
            </div>
            <div class="mb-4 col-4">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="h4"><span class="small">Cost of Living Percentage</span></div>
                        <div class="h4"><?php
                $pct = (get_field('living_cost') / get_field('salary')) * 100;
                echo number_format($pct, 1);
            ?>%</div>
                    </div>
                </div>
            </div>
            <div class="mb-4 col-12"><?=get_field('pre_table_content')?></div>
            <div class="mb-4 col-4 mt-auto">
                <img src="<?=get_the_post_thumbnail_url(get_the_ID(), 'full' )?>" class="img-fluid">
            </div>
            <div class="mb-4 col-8">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>Occupation</th>
                            <th>Avg Monthly Salary</th>
                            <th>Avg Cost of Living</th>
                            <th>% of Salary Spent<br />on Living Costs</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while (have_rows('joblist')) {
                            the_row();
                            ?>
                        <tr>
                            <td><?=get_sub_field('occupation')?></td>
                            <td>$<?=number_format(get_sub_field('salary'))?></td>
                            <td>$<?=number_format(get_field('living_cost'))?></td>
                            <td><?php
                                $pct = ( get_field('living_cost') / get_sub_field('salary') ) * 100;
                                echo number_format($pct,1);
                            ?>%</td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="mb-4 col-12">
                <?=get_field('post_table_content')?>
                <div class="text-right pt-2"><a href="#mapanchor">Back to Map <i class="fa fa-arrow-up"></i></a></div>
            </div>
        </div>
    </div>
</div>
<?php
        $rank++;
    }
    wp_reset_postdata();
    ?>
<div class="container my-4">
    <div class="row">
        <div class="col-12">
            <?=get_field('post_rank_content')?>
        </div>
    </div>
</div>

<?php
include get_stylesheet_directory() . 'page-templates/blocks/cb_news.php';
?>






<?php
add_action('wp_footer', function () use ($cc) {
    $baseurl = get_stylesheet_directory_uri(); ?>
<!-- <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script> -->
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCnXd47ooEXN_r-OW1TXnQCkp86eQosWww&callback=initMap&libraries=&v=weekly"
    defer></script>
<script src="<?=$baseurl?>/js/hero-map.js"></script>
<?php
},9999);

get_footer();

?>
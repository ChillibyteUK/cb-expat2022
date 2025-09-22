<?php
$myurl = explode("/", $_SERVER['REQUEST_URI']);
if (strtolower($myurl[1]) == "broker") {
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: https://forms.expatriatehealthcare.com/broker/" . $myurl[2] . "/");
}

get_header();
?>
<!-- short_hero -->
<section class="short_hero theme--default">
    <div class="container-xl">
        <div class="row">
            <div class="col-md-8">
                <h1 class="text--default mb-4 mt-5 mt-lg-0">Sorry, this page cannot be found</h1>
                <div class="mb-4 h3">Explore our Insurance Products</div>
            </div>
            <div class="col-md-4 align-self-center text-center">
                <a href="/international-health-insurance/" class="btn d-block btn-health px-4 mb-2">International Health Insurance</a>
                <a href="/travel-insurance/" class="btn d-block btn-travel px-4 mb-2">Travel Insurance</a>
                <a href="/term-life-insurance/" class="btn d-block btn-life px-4 mb-2">Life Insurance</a>
                <a href="/income-replacement-insurance/" class="btn d-block btn-income px-4 mb-2">Income Protection</a>
                <?php
                if (get_field('show_spinner')) {
                $stats = get_field('hero_spinner','options');
                ?>
                <div class="row mt-4">
                    <div class="col-8 offset-2 col-md-6 offset-md-3 offset-lg-3 text-center">
                        <a href="<?=$stats['trustpilot_link']?>" target="_blank">
                            <img src="<?=esc_url($stats['trustpilot'])?>" class="img-fluid">
                        </a>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
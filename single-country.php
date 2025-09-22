<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;
get_header();

the_post();
?>
<main id="main">

<?=apply_filters('the_content',get_the_content())?>

<div class="container-xl">
    <div class="d-flex justify-content-between flex-wrap mb-4">
        <h2>Other Country Guides</h2>
        <a href="/country-facts/" class="view-all">See More</a>
    </div>
    <?=country_cards(get_the_ID())?>
</div>

</main>
<?php

get_footer();
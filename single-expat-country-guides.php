<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;
get_header();

the_post();
?>
<main id="main">

<?=apply_filters('the_content',get_the_content())?>

</main>
<?php

get_footer();
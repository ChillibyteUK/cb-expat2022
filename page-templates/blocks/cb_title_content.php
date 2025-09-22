<?php
$above_title = get_field('above_title');
$title = get_field('title');
$theme = get_field('product') != 'default' ? get_field('product') : get_field('page_theme',get_the_ID());
?>
<!-- title_content -->
<section class="title_content theme--<?=$theme?> my-5">
    <div class="container-xl">
        <?
        if ( $above_title ) {
            ?>
        <p class="mb-1 d-lg-block d-none fw-bold text--<?=$theme?> text-uppercase"><?=$above_title?></p>
            <?
        }
        if ( $title ) {
            ?>
        <h2 class="d-lg-block d-none text-black mb-4"><?=$title?></h2>
            <?
        }
        ?>
        <?=get_field('content')?>
    </div>
</section>

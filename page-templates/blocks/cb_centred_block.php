<?php
$theme = get_field('page_theme',get_the_ID());

$break = get_field('background') == 'grey' ? 'break-out bg--grey-100 py-5' : 'pt-5 pb-4';
if (get_field('id')) {
    ?>
<a id="<?=get_field('id')?>" class="anchor"></a>
    <?php
}
?>
<!-- centred_block -->
<section class="centred_block <?=$break?>">
    <div class="container-xl">
        <?php
        if (get_field('pre_title')) {
            ?>
        <p class="text-center mb-1 fw-bold text--<?=$theme?> text-uppercase"><?=get_field('pre_title')?></p>
        <h2 class="text-center text-black mb-4"><?=get_field('title')?></h2>
        <?php
        }
        elseif (get_field('title')) {
            ?>
            <h2 class="text-center text--theme mb-4"><?=get_field('title')?></h2>
            <?php
        }
        ?>
        <div class="text-center col-lg-6 mx-auto"><?=apply_filters('the_content',get_field('content'))?></div>
    </div>
</section>
<?php
$theme = get_field('product') == 'default' || !get_field('product') ? get_field('page_theme',get_the_ID()) : get_field('product');
$r = random_str(8);
?>
<!-- faq -->
<section class="faq py-5">
    <div class="container position-relative">
        <?php
            if (get_field('faq_title')) {
                ?>
        <h2 class="mb-4 text-center"><?=get_field('faq_title')?></h2>
                <?php
            }
            if (get_field('faq_introduction')) {
                ?>
        <div class="row">
            <div class="col-lg-6 offset-lg-3 mb-4 text-center"><?=get_field('faq_introduction')?></div>
        </div>
                <?php
            }
            echo '<div id="accordion_'. $r .'">';
            $counter = 99;
            $show = 'show';
            $collapsed = '';
            while (have_rows('faq')) {
                the_row();
                ?>
        <div class="py-4 border-bottom">
            <div class="question question--<?=$theme?> <?=$collapsed?>" itemprop="name" data-bs-toggle="collapse" data-bs-target="#collapse_<?=$counter?>" aria-expanded="true" aria-controls="collapseOne">
                <h3 class="h4"><?=get_sub_field('question')?></h3>
            </div>
            <div class="answer collapse <?=$show?>" id="collapse_<?=$counter?>" class="accordion-collapse collapse show" aria-labelledby="heading_<?=$counter?>" data-bs-parent="#accordion_<?=$r?>">
                <div class="pt-2"><?=apply_filters('the_content',get_sub_field('answer'))?></div>
            </div>
        </div>
                <?php
                $counter++;
                $show = '';
                $collapsed = 'collapsed';
            }
            echo '</div>';

        if (get_field('more_link')) {
            ?>
        <div class="text-center mt-4">
            <a href="<?=get_field('more_link')?>" class="btn btn-<?=$theme?>">See more</a>
        </div>
            <?php
        }
        ?>
    </div>
</section>
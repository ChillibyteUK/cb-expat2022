<section class="ctas py-5 text-center">
    <?php
    if (get_field('cta_1')) {
        $cta1 = get_field('cta_1');
        $product = get_field('cta_1_product');
        $style = get_field('cta_1_style') == 'normal' ? '' : get_field('cta_1_style');
        $m = get_field('cta_2') ? 'me-3' : '';
        ?>
    <a href="<?=$cta1['url']?>" target="<?=$cta1['target']?>" class="btn btn-<?=$product?><?=$style?> <?=$m?>"><?=$cta1['title']?></a>
        <?php
    }
    if (get_field('cta_2')) {
        $cta2 = get_field('cta_2');
        $product = get_field('cta_2_product');
        $style = get_field('cta_2_style');
        ?>
    <a href="<?=$cta2['url']?>" target="<?=$cta2['target']?>" class="btn btn-<?=$product?><?=$style?>"><?=$cta2['title']?></a>
        <?php
    }
    ?>
</section>
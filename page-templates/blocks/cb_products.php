<!-- cb_products -->
<?php
if( have_rows('product') ):
    $count = count(get_field('product'));

    if ( $count == 4 ) {
        $row_class = "3";
    } else {
        $row_class = "4";
    }
?>
<section class="pt-5 cb_product container-xl">
    <div class="row justify-content-center">
<?php
    while( have_rows('product') ) : the_row();
?>
        <div class="col-lg-<?php echo $row_class; ?> col-md-<?php echo $row_class; ?> col-12 d-flex align-items-stretch mb-3 p-3">
            <div class="card w-100">
                <div class="card-body theme--<?=get_sub_field('theme')?> p-4">
                    <?php
                    if (get_sub_field('title_order') == 'title_strap') {
                        ?>
                    <h3 class="h2 card-text mb-1 text--black"><?=get_sub_field('title')?></h3>
                    <div><?=get_sub_field('strapline')?></div>
                        <?php
                    }
                    else {
                        ?>
                    <div><?=get_sub_field('strapline')?></div>
                    <h3 class="card-text mb-3 text--black"><?=get_sub_field('title')?></h3>
                        <?php
                    }

                    $image = get_sub_field('logo');
                    if( !empty( $image ) ) {
                        ?>
                    <div class="px-5 my-3 mb-4"><img src="<?=esc_url($image['url'])?>" alt="<?=esc_attr($image['alt'])?>" style="max-width:207px" class="card-img-top img-fluid" /></div>
                        <?php
                    }
                    ?>
                    <div class="text_<?=get_sub_field('theme')?>"><?=get_sub_field('text')?></div>
                </div>
                <!-- <div class="card-footer text-center no_background py-4">
                    <?php $link = get_sub_field('link'); ?>
                    <a href="<?=$link['url']?>" class="no_decoration text--<?=get_sub_field('theme')?>"><?=$link['title']?></a>
                </div> -->
            </div>
        </div>
<?php
    endwhile;
?>
    </div>
</section>
<?php
endif;
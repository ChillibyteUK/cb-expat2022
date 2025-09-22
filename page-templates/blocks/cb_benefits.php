<!-- cb_benefits -->
<?php
$column_size = (get_field('columns') == '2') ? 'col-lg-6 col-md-6' : 'col-md-6 col-xl-4 col-md-4';

if( have_rows('benefit') ):
?>
<section class="pt-5 cb_benefit container-xl">
    <div class="row g-3 justify-content-center">
<?php
    while( have_rows('benefit') ) {
        the_row();
?>
        <div class="<?=$column_size?> col-12 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">
                    <div class="d-flex flex-wrap mb-4">
                        <?php
                        $image = get_sub_field('icon');
                        if( !empty( $image ) ) {
                            ?>
                        <img src="<?=esc_url($image['url'])?>" alt="<?=esc_attr($image['alt'])?>" class="card-img-top img-fluid benefit_icon" />
                            <?php
                        }
                        ?>
                        <h3 class="card-text h3 mb-1 text--black px-2 d-flex align-items-center"><?=get_sub_field('title')?></h3>
                    </div>
                    <div class="px-2"><?=get_sub_field('text')?></div>
                </div>
            </div>
        </div>
<?php
    }
?>
    </div>
</section>
<?php
endif;
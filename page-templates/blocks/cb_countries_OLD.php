<!-- cb_countries -->
<?php
if( have_rows('country') ):
?>
<section class="pb-5">
    <div class="container-xl">
        <div class="row">
<?php
    while( have_rows('country') ) : the_row();
?>
        <div class="col-md-3 col-12 mb-3 country">
<?php
$image = get_sub_field('image');
?>
            <a href="<?php echo get_sub_field('link'); ?>" class="text-white no_decoration">
                <div class="country__container p-3" style="background-image: url(<?php echo esc_url($image['url']); ?>);">
                    <div class="country__label">
                        <span class="fi fi-<?php echo get_sub_field('country_code'); ?> me-2"></span>
                        <?php echo get_sub_field('country'); ?>
                    </div>
                    <div class="mt-5 pt-5"></div>
                    <div class="px-2 mt-5 pt-5 h4 text-white">
                        <div class="fs-6">Moving to</div>
                        <div class="fs-2"><?php echo get_sub_field('country'); ?></div>
                    </div>
                </div>
            </a>
        </div>
<?php
    endwhile;
?>
        </div>
    </div>
</section>
<?php
endif;
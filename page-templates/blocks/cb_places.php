<section class="places pb-5">
    <div class="container-xl">
        <div class="row g-5">
            <?php
            while(have_rows('places')) {
                the_row();
                if (get_sub_field('image')) {
                    ?>
            <div class="col-md-4">
                <img src="<?=wp_get_attachment_image_url(get_sub_field('image'),'large')?>" class="rounded-5">
            </div>
            <div class="col-md-6 d-flex flex-column justify-content-center">
                    <?php
                }
                else {
                    ?>
            <div class="col-md-8 offset-md-2 d-flex flex-column justify-content-center">
                    <?php
                }
                ?>
                <h3><?=get_sub_field('place')?></h3>
                <?=apply_filters('the_content',get_sub_field('content'))?>
            </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>
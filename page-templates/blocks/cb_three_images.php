<!-- three_images -->
<section class="three_images py-5">
    <div class="container-xl">
        <div class="row g-4">
            <div class="col-md-4">
                <img src="<?=wp_get_attachment_image_url(get_field('col_1'),'large')?>" class="three_images__img">
            </div>
            <div class="col-md-4">
                <img src="<?=wp_get_attachment_image_url(get_field('col_2'),'large')?>" class="three_images__img">
            </div>
            <div class="col-md-4">
                <img src="<?=wp_get_attachment_image_url(get_field('col_3'),'large')?>" class="three_images__img">
            </div>
        </div>
    </div>
</section>
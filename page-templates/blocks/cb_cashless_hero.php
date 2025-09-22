<!-- cashless_hero -->
<section class="cashless_hero mb-2 mb-md-5">
    <div class="container align-self-start pt-150">
        <div class="row py-3">
            <div class="col-lg-8 mb-4">
                <h1 class="mb-4"><?=get_field('title')?></h1>
                <div class="hero__intro mb-4"><div class="hero__inner"><?=apply_filters('the_content',get_field('text'))?></div></div>
                <div class="buttons">
                    <?php
                    if(get_field('cta')) {
                        $cta1 = get_field('cta');
                        ?>
                    <a href="<?=$cta1['url']?>" class="btn btn-default px-4 me-3 mb-2" target="<?=$cta1['target']?>"><?=$cta1['title']?></a>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <div class="col-lg-4 mb-4 d-flex justify-content-center align-items-center">
                <img src="<?=wp_get_attachment_image_url(get_field('image'),'full')?>" class="img-fluid">
            </div>
        </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none">
        <path class="st0" fill="white" d="M100,67.6c-25,37.9-75,37.9-100,0V100h100V67.6z"/>
    </svg>
</section>

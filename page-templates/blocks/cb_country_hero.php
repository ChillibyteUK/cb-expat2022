<section class="country_hero">
    <div class="container-xl">
        <a href="javascript:history.go(-1)" class="back d-block mb-3">Back</a>
        <div class="row">
            <div class="col-md-2 country_hero__flag">
                <div class="fi fis fi-<?=get_field('country_code',get_the_ID())?>"></div>
            </div>
            <div class="col-md-8">
                <h1 class="country_hero__title"><?=get_field('title')?></h1>
                <div class="country_hero__intro"><?=get_field('intro')?></div>
            </div>
        </div>
    </div>
</section>
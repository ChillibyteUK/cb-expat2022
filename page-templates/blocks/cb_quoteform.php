<!-- quoteform -->
<section class="break-out bg--grey-100 mt-5 ">
    <div class="container pb-3">
        <div class="row justify-content-center align-content-center">
            <h2 class="h3 text-center text--health mt-4"><?=get_field('title')?></h2>
            <p class="text-center fs-6"><?=get_field('subtitle')?></p>
            <div class="progress-grid col-md-2 col-3 text-center align-items-center d-flex justify-content-start align-content-center flex-column">
                <a class="rounded-circle border progress-circle text-white d-flex flex-column justify-content-center mb-2" href="#form_stage_1" role="button" aria-expanded="true" aria-controls="form_stage_1">1</a>
                <span class="d-flex fw-bold progress-text" data-bs-toggle="collapse" href="#form_stage_1" role="button" aria-expanded="true" aria-controls="form_stage_1">Let’s get started</span>
            </div>
            <div class="progress-grid col-md-2 col-3 text-center align-items-center d-flex justify-content-start align-content-center flex-column">
                <a class="rounded-circle border progress-circle text-white d-flex flex-column justify-content-center mb-2 collapsed" data-bs-toggle="collapse" href="#form_stage_2" role="button" aria-expanded="false" aria-controls="form_stage_0">2</a>
                <span class="d-flex fw-bold progress-text collapsed" data-bs-toggle="collapse" href="#form_stage_2" role="button" aria-expanded="false" aria-controls="form_stage_2"><span class="d-none d-md-block">Healthcare Insurance&nbsp;</span>Premiums</span>
            </div>
            <div class="progress-grid col-md-2 col-3 text-center align-items-center d-flex justify-content-start align-content-center flex-column">
                <a class="rounded-circle border progress-circle text-white d-flex flex-column justify-content-center mb-2 collapsed" data-bs-toggle="collapse" href="#form_stage_3" role="button" aria-expanded="false" aria-controls="form_stage_0">3</a>
                <span class="d-flex fw-bold progress-text collapsed" data-bs-toggle="collapse" href="#form_stage_3" role="button" aria-expanded="false" aria-controls="form_stage_3"><span class="d-none d-md-block">Healthcare Insurance&nbsp;</span>Policy Details</span>
            </div>
            <div class="progress-grid col-md-2 col-3 text-center align-items-center d-flex justify-content-start align-content-center flex-column">
                <a class="rounded-circle border progress-circle text-white d-flex flex-column justify-content-center mb-2 collapsed" data-bs-toggle="collapse" href="#form_stage_4" role="button" aria-expanded="false" aria-controls="form_stage_0">4</a>
                <span class="d-flex fw-bold progress-text collapsed" data-bs-toggle="collapse" href="#form_stage_4" role="button" aria-expanded="false" aria-controls="form_stage_4"><span class="d-none d-md-block">Healthcare Insurance&nbsp;</span>Declaration</span>
            </div>
        </div>
        <div class="pt-5 pb-2">
            <?php echo do_shortcode('[gravityform id="4" title="false" ajax="true"]'); ?>
        </div>
    </div>
</section>
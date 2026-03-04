<style>
.progress-circle {
    background-color: #00A0E3 !important;
    border-color: #00A0E3 !important;
    color: #fff !important;
    width: 30px;
    height: 30px;
    font-size: 0.8rem;
    z-index: 99;
    text-decoration: none;
}

.progress-circle.collapsed {
    background-color: #fff !important;
    border-color: #676b75 !important;
    color: #676b75 !important;
}

.progress-text {
  font-size: 0.7rem;
  color: #000;
}

.progress-text.collapsed {
  color: #676b75;
}

.small-text {
  font-size: 0.6rem;
}

.providedby {
    color: #00A0E3  !important;
  font-size: 0.8rem;
}

.side-link {
    text-decoration: none;
    color: #000;
}

.progress-grid {
    position: relative;
}

.progress-grid::after {
    border-bottom: 1px solid #676b75;
    width: 50%;
    position: absolute;
    content: "";
    right: 0px;
    top: 15px;
}

.progress-grid::before {
    border-bottom: 1px solid #676b75;
    width: 50%;
    position: absolute;
    content: "";
    left: 0px;
    top: 15px;
}

.progress-grid:first-of-type::before {
  display: none;
}

.progress-grid:last-of-type::after {
  display:none;
}

.container-form-border {
    border-top: 5px solid #2ca1d8;
    border-bottom: 5px solid #2ca1d8;
}

#gform_submit_button_4 {
    border-radius: 50rem;
    padding: .575rem 1.5rem;
    transition: all .3s ease;
    box-shadow: rgba(0, 0, 0, .16) 0 3px 6px, rgba(0, 0, 0, .23) 0 3px 6px;
    color: #fff;
    background: #00A0E3;
    min-width: 120px;
    border: none;
    font-size: 0.8rem;
}
</style>
<!-- quoteform -->
<section class="break-out bg--grey-100 mt-5 quoteform">
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
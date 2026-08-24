<?php
/**
 * CB Quote Form block.
 *
 * The "form_type" select chooses which Gravity Form is embedded, which brand
 * colour the block uses and how the progress steps are labelled.
 * Healthcare is the default and is used whenever the field is empty or unknown.
 */

$form_types = array(
    'healthcare' => array(
        'form_id'    => 4,
        'colour'     => '#00A0E3',
        'accent'     => '#2CA1D8',
        'text_class' => 'text--health',
        'step_label' => 'Healthcare Insurance',
    ),
    'travel' => array(
        'form_id'    => 5,
        'colour'     => '#d73671',
        'accent'     => '#d73671',
        'text_class' => 'text--travel',
        'step_label' => 'Travel Insurance',
    ),
);

$form_type = get_field('form_type');

if ( ! isset( $form_types[ $form_type ] ) ) {
    $form_type = 'healthcare';
}

$form         = $form_types[ $form_type ];
$form_id      = (int) $form['form_id'];
$colour       = $form['colour'];
$accent       = $form['accent'];
$text_class   = $form['text_class'];
$step_label   = $form['step_label'];
$theme_class  = 'quoteform--' . $form_type;
?>
<style>
.quoteform.<?=$theme_class?> .progress-circle{background-color:<?=$colour?>!important;border-color:<?=$colour?>!important;color:#fff!important;width:30px;height:30px;font-size:.8rem;z-index:99;text-decoration:none}
.quoteform.<?=$theme_class?> .progress-circle.collapsed{background-color:#fff!important;border-color:#676b75!important;color:#676b75!important}
.quoteform.<?=$theme_class?> .progress-grid::after,.quoteform.<?=$theme_class?> .progress-grid::before{border-bottom:1px solid #676b75;width:50%;position:absolute;content:"";top:15px}
.quoteform.<?=$theme_class?> .progress-text{font-size:.7rem;color:#000}
.quoteform.<?=$theme_class?> .progress-text.collapsed{color:#676b75}
.quoteform.<?=$theme_class?> .small-text{font-size:.6rem}
.quoteform.<?=$theme_class?> .providedby{color:<?=$colour?>!important;font-size:.8rem}
.quoteform.<?=$theme_class?> .side-link{text-decoration:none;color:#000}
.quoteform.<?=$theme_class?> .progress-grid{position:relative}
.quoteform.<?=$theme_class?> .progress-grid::after{right:0}
.quoteform.<?=$theme_class?> .progress-grid::before{left:0}
.quoteform.<?=$theme_class?> .progress-grid:first-of-type::before,.quoteform.<?=$theme_class?> .progress-grid:last-of-type::after{display:none}
.quoteform.<?=$theme_class?> .container-form-border{border-top:5px solid <?=$accent?>;border-bottom:5px solid <?=$accent?>}
.quoteform.<?=$theme_class?> .quoteform__title{color:<?=$accent?>!important}
.quoteform.<?=$theme_class?> #gform_submit_button_<?=$form_id?>{border-radius:50rem;padding:.575rem 1.5rem;transition:.3s;box-shadow:rgba(0,0,0,.16) 0 3px 6px,rgba(0,0,0,.23) 0 3px 6px;color:#fff;background:<?=$colour?>;min-width:120px;border:none;font-size:.8rem}

.quoteform.<?=$theme_class?> #gform_<?=$form_id?> label {
    font-weight: 400;
}

.quoteform.<?=$theme_class?> .gform_wrapper.gravity-theme #gform_<?=$form_id?> .gfield_required {
    display: none;
}

.quoteform .rounded {
    border-radius: 1rem!important;
}

.quoteform .bg--grey-100 {
    background-color: #F3F2EE;
}
</style>
<!-- quoteform -->
<section class="break-out mt-5 quoteform <?=$theme_class?> mb-5">
    <div class="container pb-3 bg--grey-100 px-5 rounded shadow">
        <div class="row justify-content-center align-content-center">
            <h2 class="h3 text-center quoteform__title <?=$text_class?> mt-4"><?=get_field('title')?></h2>
            <p class="text-center fs-6"><?=get_field('subtitle')?></p>
            <div class="progress-grid col-md-2 col-3 text-center align-items-center d-flex justify-content-start align-content-center flex-column">
                <a class="rounded-circle border progress-circle text-white d-flex flex-column justify-content-center mb-2" href="#form_stage_1" role="button" aria-expanded="true" aria-controls="form_stage_1">1</a>
                <span class="d-flex fw-bold progress-text" data-bs-toggle="collapse" href="#form_stage_1" role="button" aria-expanded="true" aria-controls="form_stage_1">Let’s get started</span>
            </div>
            <div class="progress-grid col-md-2 col-3 text-center align-items-center d-flex justify-content-start align-content-center flex-column">
                <a class="rounded-circle border progress-circle text-white d-flex flex-column justify-content-center mb-2 collapsed" data-bs-toggle="collapse" href="#form_stage_2" role="button" aria-expanded="false" aria-controls="form_stage_0">2</a>
                <span class="d-flex fw-bold progress-text collapsed" data-bs-toggle="collapse" href="#form_stage_2" role="button" aria-expanded="false" aria-controls="form_stage_2"><span class="d-none d-md-block"><?=esc_html($step_label)?>&nbsp;</span>Premiums</span>
            </div>
            <div class="progress-grid col-md-2 col-3 text-center align-items-center d-flex justify-content-start align-content-center flex-column">
                <a class="rounded-circle border progress-circle text-white d-flex flex-column justify-content-center mb-2 collapsed" data-bs-toggle="collapse" href="#form_stage_3" role="button" aria-expanded="false" aria-controls="form_stage_0">3</a>
                <span class="d-flex fw-bold progress-text collapsed" data-bs-toggle="collapse" href="#form_stage_3" role="button" aria-expanded="false" aria-controls="form_stage_3"><span class="d-none d-md-block"><?=esc_html($step_label)?>&nbsp;</span>Policy Details</span>
            </div>
            <div class="progress-grid col-md-2 col-3 text-center align-items-center d-flex justify-content-start align-content-center flex-column">
                <a class="rounded-circle border progress-circle text-white d-flex flex-column justify-content-center mb-2 collapsed" data-bs-toggle="collapse" href="#form_stage_4" role="button" aria-expanded="false" aria-controls="form_stage_0">4</a>
                <span class="d-flex fw-bold progress-text collapsed" data-bs-toggle="collapse" href="#form_stage_4" role="button" aria-expanded="false" aria-controls="form_stage_4"><span class="d-none d-md-block"><?=esc_html($step_label)?>&nbsp;</span>Declaration</span>
            </div>
        </div>
        <div class="pt-5 pb-2">
            <?php echo do_shortcode('[gravityform id="' . $form_id . '" title="false" ajax="true"]'); ?>
        </div>
    </div>
</section>

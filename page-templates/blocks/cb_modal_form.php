<!-- modal_form -->
<div class="modal fade" id="<?=get_field('id')?>Modal" tabindex="-1" aria-labelledby="<?=get_field('id')?>Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title text-center mx-auto" id="<?=get_field('id')?>Label">
                    <?php
                    if (get_field('pre_title')) {
                        ?>
                    <p class="mb-1 text-primary fw-bold text-uppercase"><?=get_field('pre_title')?></p>
                        <?php
                    }
                    ?>
                    <div class="h3 text-black"><?=get_field('title')?></div>
		        </div>
                <button type="button" class="btn-modal btn-close align-self-start" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
            </div>
            <div class="modal-body">
                <?=get_field('content')?>
            </div>
        </div>
    </div>
</div>
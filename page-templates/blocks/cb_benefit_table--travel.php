<section>
    <div class="container-xl table-responsive">
        <table class="table benefit_table benefit_table--travel">
            <colgroup>
                <col width="60%">
                <col width="40%">
            </colgroup>
<?php

while( have_rows('section') ) {
    the_row();
    $rand = random_str(8);
    $notes = get_sub_field('notes');
    ?>
    <tr>
        <th colspan="4" class="benefit__title text--travel" data-bs-toggle="collapse" href="#c_<?=$rand?>" role="button">
            <?php
            if (get_sub_field('section_pre_title')) {
                echo '<div class="fs-8">' . get_sub_field('section_pre_title') . '</div>';
            }
            ?>
            <?=get_sub_field('section_title')?>
        </th>
    </tr>
    <tbody class="accordion-body collapse show" id="c_<?=$rand?>">
        <?php
    while( have_rows('features')) {
        the_row();
        ?>
        <tr>
            <td><?=get_sub_field('feature')?></td>
            <td><?=get_sub_field('detail')?></td>
        </tr>
        <?php
    }
    if ($notes) {
        ?>
        <tr>
            <td colspan="4"><small><?=$notes?></small></td>
        </tr>
        <?php
    }
    ?></tbody><?php
}
if (get_field('fine_print')) {
    ?>
        <tr>
            <td colspan="4"><small><?=parse_tick(get_field('fine_print'))?></small></td>
        </tr>
    <?php
}
?>
        </table>
    </div>
</section>

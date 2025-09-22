<a id="top" class="anchor"></a>
<div class="container pb-5">
    <ul class="nav nav-tabs" id="hospitals" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="europe-tab" data-bs-toggle="tab" data-bs-target="#europe-tab-pane"type="button" role="tab" aria-controls="europe-tab-pane" aria-selected="true">Europe</a>
        </li>
        <li class="nav-item">
            <button class="nav-link" id="middleeast-tab" data-bs-toggle="tab" data-bs-target="#middleeast-tab-pane" type="button" role="tab" aria-controls="middleeast-tab-pane" aria-selected="false">Middle East</button>
        </li>
        <li class="nav-item">
            <button class="nav-link" id="asia-tab" data-bs-toggle="tab" data-bs-target="#asia-tab-pane" type="button" role="tab" aria-controls="asia-tab-pane" aria-selected="false">Asia</button>
        </li>
        <li class="nav-item">
            <button class="nav-link" id="australasia-tab" data-bs-toggle="tab" data-bs-target="#australasia-tab-pane" type="button" role="tab" aria-controls="australasia-tab-pane" aria-selected="false">Australasia</button>
        </li>
        <li class="nav-item">
            <button class="nav-link" id="africa-tab" data-bs-toggle="tab" data-bs-target="#africa-tab-pane" type="button" role="tab" aria-controls="africa-tab-pane" aria-selected="false">Africa</button>
        </li>
    </ul>
    <div class="tab-content" id="hospitalContent">
        <?php
        $active = 'show active';
        $conts = array('europe', 'middleeast', 'asia', 'australasia', 'africa');

        foreach ($conts as $cont) {
            ?>
        <div class="tab-pane fade <?=$active?>" id="<?=$cont?>-tab-pane" role="tabpanel" aria-labelledby="<?=$cont?>-tab" tabindex="0">
            <div class="py-4">
            <?php
            $cc = get_field('countries_' . $cont);
            $countries = wp_list_pluck($cc, 'country_name');
            $countryLinks = array();
            foreach ($countries as $c) {
                $countryLinks[] = '<a href="#' . cbslugify($c) . '" class="countryNav">' . $c . '</a>&nbsp;';
            }
            echo implode(', ',$countryLinks);
            ?>
            </div>
            <?php
            while(have_rows('countries_' . $cont)) {
                the_row();
                echo '<a class="anchor" id="' . cbslugify(get_sub_field('country_name')) . '"></a>';
                echo '<h2>' . get_sub_field('country_name') . '</h2>';
                $hospitals = get_sub_field('hospital');
                ?>
            <div class="table-responsive">
                <table class="table table-sm table-striped fs-7">
                    <tr class="d-flex">
                        <th class="col-3">Hospital Name</th>
                        <th class="col-3">Address</th>
                        <th class="col-2">Tel</th>
                        <th class="col-2">Fax</th>
                        <th class="col-2">Website</th>
                    </tr>
                    <?php
                    foreach ($hospitals as $h) {
                        ?>
                    <tr class="d-flex">
                        <td class="col-3"><?=ucwords(strtolower($h['hospital_name']))?></td>
                        <td class="col-3"><?=$h['address']?></td>
                        <td class="col-2"><?=$h['tel']?></td>
                        <td class="col-2"><?=$h['fax']?></td>
                        <td class="col-2"><a href="https://<?=$h['web']?>" target="_blank" rel="noopener nofollow"><?=$h['web']?></a></td>
                    </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>
            <div class="text-end"><a href="#top"><i class="fa fa-arrow-up"></i></a></div>
                <?php
            }
            $active = '';
            ?>
        </div>
        <?php
        }
        ?>
    </div>
</div>
<div class="container-xl">
<?php
	if (get_field('before_content')) {
		?>
		<div class="text-black small w-md-75 mx-auto text-center"><?=get_field('before_content')?></div>
		<?php
	}
	?>
    <div class="table-responsive">
        <table class="table">
            <colgroup>
                <col style="min-width:150px">
                <col style="min-width:150px">
                <col style="min-width:150px">
                <col style="min-width:150px">
            </colgroup>
            <thead>
            <tr>
                <th scope="col" class="text--health border-0">Claim Free Period</th>
                <th scope="col" class="border-0 text-center"><img src="/wp-content/uploads/2022/04/primary.png" style="max-width: 150px;"></th>
                <th scope="col" class="border-0 text-center"><img src="/wp-content/uploads/2022/04/primary_plus.png" style="max-width: 150px;"></th>
                <th scope="col" class="border-0 text-center"><img src="/wp-content/uploads/2022/04/select.png" style="max-width: 150px;"></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th class="py-3" scope="row">1 Year</th>
                <td class="text-center py-3">-5%</td>
                <td class="text-center py-3">-10%</td>
                <td class="text-center py-3">-10%</td>
            </tr>
            <tr>
                <th class="py-3" scope="row">2 Years</th>
                <td class="text-center py-3">-7.5%</td>
                <td class="text-center py-3">-15%</td>
                <td class="text-center py-3">-15%</td>
            </tr>
            <tr>
                <th class="py-3" scope="row">3 Year +</th>
                <td class="text-center py-3">-10%</td>
                <td class="text-center py-3">-20%</td>
                <td class="text-center py-3">-20%</td>
            </tr>
            </tbody>
        </table>
    </div>
    <?php
	if (get_field('after_content')) {
		?>
		<div class="text-black small w-md-75 mx-auto text-center"><?=get_field('after_content')?></div>
		<?php
	}
	?>
</div>
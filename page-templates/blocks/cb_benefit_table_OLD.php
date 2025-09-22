<!-- cb_benefit_table -->
<section class="py-5 container-xl" id="cb_benefit_table">
    <div class="row">
    	<div class="col-md-3 justify-content-start d-flex flex-column">
		<?php
		$row_counter = 1;
		if( have_rows('rows') ):
			while( have_rows('rows') ) : the_row();
				if ( $row_counter == 1 ) {
					$aria_expanded = "true";
				} else {
					$aria_expanded = "false";
				}
		?>
		<button class="btn btn--tab w-100 mt-2 text-start" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample<?php echo $row_counter; ?>" aria-expanded="<?php echo $aria_expanded; ?>" aria-controls="multiCollapseExample<?php echo $row_counter; ?>"><?php the_sub_field("name"); ?></button>
		<?php
			$row_counter++;
			endwhile;
		endif;
		?>


    	</div>
    	<div class="col-md-9">
		    <div class="row">
				<div class="col-md-6 p-3 text--health h6 align-items-end d-flex">Product Feature</div>
				<div class="col-md-2 p-3"><img src="/wp-content/uploads/2022/04/select.png" alt="select" class="img-fluid" /></div>
				<div class="col-md-2 p-3"><img src="/wp-content/uploads/2022/04/primary.png" alt="primary" class="img-fluid" /></div>
				<div class="col-md-2 p-3"><img src="/wp-content/uploads/2022/04/primary_plus.png" alt="primary+" class="img-fluid" /></div>
		    </div>
		<?php
		$table_counter = 1;
		if( have_rows('rows') ):
			while( have_rows('rows') ) : the_row();
				$row_counter = 1;
				if( have_rows('features') ):
					while( have_rows('features') ): the_row();

						if ( $row_counter == 1 ) {
							$top_border = "border-top";
						} else {
							$top_border = "";
						}

						if ( $table_counter == 1 ) {
							$is_collapse = "collapse show";
						} else {
							$is_collapse = "collapse";
						}
		?>
		    <div class="row <?php echo $is_collapse; ?>" id="multiCollapseExample<?php echo $table_counter; ?>" data-bs-parent="#cb_benefit_table">
				<div class="col-md-6 p-3 <?php echo $top_border; ?> border-start border-end border-bottom d-flex align-items-center fs-8 text--black">
					<?php the_sub_field("feature"); ?>
				</div>
				<div class="col-md-2 text-center p-3 <?php echo $top_border; ?> border-end border-bottom d-flex align-items-center justify-content-center fs-8 text--select_product">
					<?php
					if ( get_sub_field("select") =="{tick}" ) {
					?>
					<img src="<?=get_stylesheet_directory_uri()?>/img/tick_select.png" alt="Yes" class="img-fluid" style="max-width: 25px;" />
					<?php
					} else {
						the_sub_field("select"); 
					}
					?>
				</div>
				<div class="col-md-2 text-center p-3 <?php echo $top_border; ?> border-end border-bottom d-flex align-items-center justify-content-center fs-8 text--primary_product">
					<?php
					if ( get_sub_field("primary") =="{tick}" ) {
					?>
					<img src="<?=get_stylesheet_directory_uri()?>/img/tick_primary.png" alt="Yes" class="img-fluid" style="max-width: 25px;" />
					<?php
					} else {
						the_sub_field("primary"); 
					}
					?>
				</div>
				<div class="col-md-2 text-center p-3 <?php echo $top_border; ?> border-end border-bottom d-flex align-items-center justify-content-center fs-8 text--primary_plus_product">
					<?php
					if ( get_sub_field("primary_plus") =="{tick}" ) {
					?>
					<img src="<?=get_stylesheet_directory_uri()?>/img/tick_primary_plus.png" alt="Yes" class="img-fluid" style="max-width: 25px;" />
					<?php
					} else {
						the_sub_field("primary_plus"); 
					}
					?>
				</div>
		    </div>
		<?php
					$row_counter++;
					endwhile;
				endif;

				$table_counter++;
			endwhile;
		endif;
		?>
	</div>
	</div>
</section>
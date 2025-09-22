<!-- news -->
<div class="container-xl pb-5">
	<div class="row mb-5">
		<div class="col-lg-10 offset-lg-1 flex-wrap d-flex flex-stretch">
			<button class="btn btn--tab news_selector active" data-bs-slide-to="0" data-bs-target="#newsCarousel">All</button>
			<button class="btn btn--tab news_selector" data-bs-slide-to="1" data-bs-target="#newsCarousel">Expatriate Insurance</button>
			<button class="btn btn--tab news_selector" data-bs-slide-to="2" data-bs-target="#newsCarousel">Travel Inspiration</button>
			<button class="btn btn--tab news_selector" data-bs-slide-to="3" data-bs-target="#newsCarousel">Moving Abroad</button>
			<button class="btn btn--tab news_selector" data-bs-slide-to="4" data-bs-target="#newsCarousel">Travel Safety Tips</button>
    	</div>
	</div>
	<div id="newsCarousel" class="carousel slide">
		<div class="carousel-inner">
	<?php

$tabs = array(
	'all',
	'expatriate-insurance', // 11
	'travel-inspiration', // 12
	'moving-abroad', // 9
	'travel-safety-tips	', // 223
);

	$active = 'active';
	foreach ($tabs as $t) {
		$news = cb_news_posts($t);
		?>
			<div class="carousel-item <?=$active?>">
				<div class="row">
		<?php
		echo '<h1>' . $t . '</h1>';
		// cbdump($news);
		while ($news->have_posts()) {
			$news->the_post();
			$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'large');
			$categories = get_the_category();
			if ($news->current_post == 0) {
				?>
					<div class="col-lg-6 d-lg-flex align-items-stretch flex-column d-none">
						<a href="<?=get_the_permalink()?>" class="news d-flex m-2 h-100">
							<div class="news__content rounded-5 flex-fill me-2 d-flex" style="background-image: url(<?=$featured_img_url;?>); background-size: cover;">
								<div class="bg-white m-4 rounded-5 align-self-end flex-fill">
									<div class="p-4">
										<div class="row">
											<div class="col-8">
												<?php
												if ( ! empty( $categories ) ) {
													?>
													<div class="news__cat"><?=esc_html( $categories[0]->name )?></div>
													<?php
												}
												?>
												<div class="fw-bold text-black mb-3 h5"><?=get_the_title()?></div>
												<div class="mb-0 d-flex">
													<div class="news__date"><?=get_the_date()?></div>
												</div>
											</div>
											<div class="col-4 align-items-stretch d-flex">
												<div class="big_readmore d-flex w-100 justify-content-center align-items-center rounded-5">
													<img src="<?=get_stylesheet_directory_uri()?>/img/arrow-right--white.svg" class="img-fluid">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</a>
					</div>
					<div class="col-lg-6">
						<div class="row gy-2 align-items-stretch flex-column">
							<div class="d-lg-none col-12 px-lg-0">
								<a href="<?=get_the_permalink()?>" class="news d-flex m-2 h-100">
									<div class="news__content news__content--sm rounded-5 flex-fill me-2 d-flex">
										<div class="news__image" style="background-image:url(<?=$featured_img_url?>)"></div>
										<div class="news__detail">
											<?php
											if ( ! empty( $categories ) ) {
												?>
												<div class="news__cat"><?=esc_html( $categories[0]->name )?></div>
												<?php
											}
											?>
											<div class="fw-bold text-black mb-2 h5"><?=get_the_title($news->ID)?></div>
											<div class="mb-3 d-flex">
												<div class="news__date"><?=get_the_date();?></div>
											</div>
											<div class="readmore">Read more</div>
										</div>
									</div>
								</a>
							</div>
				<?php
			}
			else {
				?>
							<div class="col-12 px-lg-0">
								<a href="<?=get_the_permalink()?>" class="news d-flex m-2 h-100">
									<div class="news__content news__content--sm rounded-5 flex-fill me-2 d-flex">
										<div class="news__image" style="background-image:url(<?=$featured_img_url?>)"></div>
										<div class="news__detail">
											<?php
											if ( ! empty( $categories ) ) {
												?>
												<div class="news__cat"><?=esc_html( $categories[0]->name )?></div>
												<?php
											}
											?>
											<div class="fw-bold text-black mb-2 h5"><?=get_the_title($news->ID)?></div>
											<div class="mb-3 d-flex">
												<div class="news__date"><?=get_the_date();?></div>
											</div>
											<div class="readmore">Read more</div>
										</div>
									</div>
								</a>
							</div>
				<?php
			}
		}
		?>
						</div>
					</div>
				</div>
			</div>		
		<?php
		$active = '';
	}
	?>
		</div>
	</div>
	<div class="py-4 text-center">
		<a href="/insights/" class="btn btn-primary">Expat Insights</a>
	</div>
</div>
<?php

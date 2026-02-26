<?php
/**
 * The template for displaying a single FAQ post
 *
 * @package cb-expat2022
 */

defined( 'ABSPATH' ) || exit;
get_header();

the_post();

?>
<main id="main" class="pad-top">
    <div class="container-xl py-5">
        <div class="row mb-5">
            <a href="javascript:history.go(-1)" class="back">Back</a>
			<?php
			if ( function_exists( 'yoast_breadcrumb' ) ) {
				yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' );
			}
			?>
            <div class="col-md-8 post">
                <h1 class="text--default"><?= esc_html( get_the_title() ); ?></h1>
                <?php the_content(); ?>
                <div class="mt-4 px-4">
                    <?php cb_post_nav(); ?>
                </div>
            </div>
            <div class="col-md-4">
                <h2 class="h3">Related Expat FAQs</h2>
                <div class="mb-4">
					<?php
				    $q = new WP_Query(
						array(
							'post_type'      => 'faq',
							'post_status'    => 'publish',
							'posts_per_page' => 5,
							'post__not_in'   => array( $post ),
						)
					);

					if ( $q->have_posts() ) {
						?>
						<div class="recent">
							<?php
							while ( $q->have_posts() ) {
								$q->the_post();
								?>
								<a class="recent__post" href="<?= esc_url( get_the_permalink() ); ?>">
									<div class="recent__title"><?= esc_html( get_the_title() ); ?></div>
								</a>
								<?php
							}
							?>
						</div>
						<?php
					}

    				wp_reset_postdata();
					?>
				</div>
                <div class="h3 text--default">Country Guides</div>
                <div class="mb-4">
                    <img src="<?= esc_url( get_stylesheet_directory_uri() ); ?>/img/map.png" class="d-flex w-75 mb-3">
                    <a href="/country-facts/" class="btn btn-default more">View all Country Guides</a>
                </div>
                <div class="h3 text--default">Stay Connected</div>
                <?= do_shortcode( '[social_fb_icon]' ); ?>
                <?= do_shortcode( '[social_tw_icon]' ); ?>
                <?= do_shortcode( '[social_ig_icon]' ); ?>
                <?= do_shortcode( '[social_in_icon]' ); ?>
            </div>
        </div>
        <h2 class="h3 text--black mb-4">Related Expat News</h2>
        <?php
		$q = new WP_Query(
			array(
				'post_type'      => 'post',
				'posts_per_page' => 4,
			)
		);
		if ( $q->have_posts() ) {
			?>
			<div class="row gx-4">
			<?php
			while ( $q->have_posts() ) {
				$q->the_post();
				?>
				<div class="col-sm-6 col-lg-3 mb-4">
					<a class="news__item" href="<?= esc_url( get_the_permalink() ); ?>">
						<div class="news__image" style="background-image:url(<?= esc_url( get_the_post_thumbnail_url( get_the_ID(), 'medium' ) ); ?>)"></div>
						<div class="news__inner">
							<div class="news__title"><?= esc_html( get_the_title() ); ?></div>
							<div class="news__date"><?= esc_html( get_the_date() ); ?></div>
							<div class="d-flex justify-content-end me-4">
								<div class="readmore">Read more</div>
							</div>
						</div>
					</a>
				</div>
				<?php
			}
			?>
			</div>
			<?php
		}
		wp_reset_postdata()
		?>
    </div>
</main>
<?php

get_footer();
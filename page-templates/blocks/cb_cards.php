<?php
$theme = get_field('page_theme',get_the_ID());
?>
<!-- cb_cards -->
<section class="card_block theme--<?=$theme?> py-5">
    <div class="container-xl">
        <div class="row">
        <?php
        while( have_rows('card') ) {
            the_row();
            ?>
            <div class="col-xl-3 col-md-6 col-12 d-flex align-items-stretch mb-3">
                <div class="card w-100 shadow">
                    <div class="p-3">
                    <?php
                    $image = get_sub_field('image');
                    if( !empty( $image ) ) {
                        ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="card-img-top img-fluid rounded" />
                        <?php
                    }
                    ?>
                    </div>
                    <div class="card-body">
                        <h3 class="card-text text--<?=$theme?> mb-1"><?php echo get_sub_field('title'); ?></h3>
                        <?php echo get_sub_field('text'); ?>
                        <?php
                        $link = get_sub_field('cta');
                        if( $link ): 
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>
                            <a class="btn btn-health text-white d-block mt-4" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>

                        <?php
                        endif;
                        ?>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
        </div>
    </div>
</section>
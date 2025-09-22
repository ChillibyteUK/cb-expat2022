<section class="children">
    <div class="container pb-5">
        <div class="row g-4">
            <?php
            $parent = get_the_ID();
            $q = new WP_Query(array(
                'post_type' => 'page',
                'post_parent' => $parent,
                'posts_per_page' => -1
            ));
            while ($q->have_posts()) {
                $q->the_post();
                ?>
                <div class="col-md-3 mb-4">
                    <a href="<?=get_the_permalink()?>">
                        <div class="card px-2 py-4 text-center"><?=get_the_title()?></div>
                    </a>
                </div>
                <?php
            }
            wp_reset_postdata();
            ?>
        </div>
    </div>
</section>
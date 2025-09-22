<?php

function recent_posts($post)
{
    ob_start();

    $q = new WP_Query(array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => 5,
        'post__not_in' => array( $post )
    ));

    if ($q->have_posts()) {
        ?>
        <div class="recent">
            <?php
            while ($q->have_posts()) {
                $q->the_post(); ?>
                <a class="recent__post" href="<?=get_the_permalink()?>">
                    <div class="recent__title"><?=get_the_title()?></div>
                    <div class="recent__date"><?=get_the_date()?></div>
                </a>
                <?php
            }
            ?>
        </div>
        <?php
    }

    wp_reset_postdata();
    $ob_str = ob_get_contents();
    ob_end_clean();
    return $ob_str;
}


function related_posts() {

    ob_start();

    $post_id = get_the_ID();
    $cat_ids = array();
    $categories = get_the_category( $post_id );

    if(!empty($categories) && !is_wp_error($categories)):
        foreach ($categories as $category):
            array_push($cat_ids, $category->term_id);
        endforeach;
    endif;

    $current_post_type = get_post_type($post_id);

    $query_args = array( 
        'category__in'   => $cat_ids,
        'post_type'      => $current_post_type,
        'post__not_in'    => array($post_id),
        'posts_per_page'  => '4',
     );

    $related_cats_post = new WP_Query( $query_args );

    if ($related_cats_post->have_posts()) {
        ?>
        <div class="row gx-4">
        <?php
        while ($related_cats_post->have_posts()){
            $related_cats_post->the_post(); 
            ?>
            <div class="col-sm-6 col-lg-3 mb-4">
                <a class="news__item" href="<?=get_the_permalink()?>">
                    <div class="news__image" style="background-image:url(<?=get_the_post_thumbnail_url(get_the_ID(), 'medium')?>)"></div>
                    <div class="news__inner">
                        <div class="news__title"><?=get_the_title()?></div>
                        <div class="news__date"><?=get_the_date()?></div>
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

     wp_reset_postdata();
     $ob_str = ob_get_contents();
     ob_end_clean();
     return $ob_str;

}

function cb_post_nav()
{
        ?>
        <div class="d-flex justify-content-between">
        <?php
        $prev_post_obj = get_adjacent_post( '', '', true );
        if ($prev_post_obj) {
            $prev_post_ID   = isset( $prev_post_obj->ID ) ? $prev_post_obj->ID : '';
            $prev_post_link     = get_permalink( $prev_post_ID );
            ?>
        <a href="<?php echo $prev_post_link; ?>" rel="next" class="btn btn-previous">Previous</a>
           <?php
        }

        $next_post_obj  = get_adjacent_post( '', '', false );
        if ($next_post_obj) {
            $next_post_ID   = isset( $next_post_obj->ID ) ? $next_post_obj->ID : '';
            $next_post_link     = get_permalink( $next_post_ID );
            ?>
        <a href="<?php echo $next_post_link; ?>" rel="next" class="btn btn-next">Next</a>
           <?php
        }
        ?>
        </div>
        <?php

}
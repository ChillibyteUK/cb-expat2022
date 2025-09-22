<?php
add_filter('manage_edit-broker_columns', 'my_extra_broker_columns');
function my_extra_broker_columns($columns) {
    $columns['company'] =__('Company','myplugindomain');
    $columns['key_contact'] =__('Key Contact','myplugindomain');
    $columns['logo'] =__('Logo','myplugindomain');
    $columns['landing_page'] =__('Landing Page','myplugindomain');
    return $columns;
}

add_action( 'manage_broker_posts_custom_column', 'my_broker_column_content', 10, 2 );
function my_broker_column_content( $column_name, $post_id ) {
	if ($column_name == 'company') {
	    $slices = get_field("company", $post_id);
	    echo $slices;
	}
	if ($column_name == 'key_contact') {
	    $slices = get_field("key_contact", $post_id);
	    echo $slices;
	}
	if ($column_name == 'logo') {
	    $image = get_field('logo', $post_id);
	    if( !empty($image) ):
	    	echo '<img src="https://quote.expatriatehealthcare.com/uploads/images/brokers/' . $image . '" />';
	    endif;
	}
	if ($column_name == 'landing_page') {
	    $slices = get_field("landing_page", $post_id);
	    echo $slices;
	}
}

add_filter( 'manage_edit-broker_sortable_columns', 'my_sortable_broker_column' );
function my_sortable_broker_column( $columns ) {
    $columns['company'] = 'title';
    $columns['key_contact'] = 'title';
    $columns['landing_page'] = 'title';

    //To make a column 'un-sortable' remove it from the array
    //unset($columns['date']);

    return $columns;
}

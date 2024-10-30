<?php
// Let us create Taxonomy for Custom Post Type
add_action( 'init', 'webspeed_calendar_create_events_custom_taxonomy', 0 );

//create a custom taxonomy name it "type" for your posts
function webspeed_calendar_create_events_custom_taxonomy() {

  $labels = array(
    'name' => _x( 'Kalender Type', 'taxonomy general name' ),
    'singular_name' => _x( 'Kalender Type', 'taxonomy singular name' ),
    'search_items' =>  __( 'Søg kalender Type' ),
    'all_items' => __( 'Alle kalender Typer' ),
    'parent_item' => __( 'Parent kalender Type' ),
    'parent_item_colon' => __( 'Parent kalender Type:' ),
    'edit_item' => __( 'Ret kalender Type' ),
    'update_item' => __( 'Updater kalender Type' ),
    'add_new_item' => __( 'Tilføj ny kalender Type' ),
    'new_item_name' => __( 'Ny kalender Type navn' ),
    'menu_name' => __( 'Typer' ),
  );

  register_taxonomy('webspeeed_calendar_type',array('kalender'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'publicly_queryable' => false,
    'show_in_rest' => true,
    'show_in_nav_menus'  => false,
    'rewrite' => array( 'slug' => 'calendar-type' ),
  ));
}
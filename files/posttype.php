<?php

add_action('init', 'create_posttype_kalender');

function create_posttype_kalender() {
	register_post_type(
		'kalender',
		array(
			'labels' => array(
				'name' => __('Kalender', 'websepeed-calendar-domain'),
				'singular_name' => __('Kalender', 'websepeed-calendar-domain'),
			),
			'public' => true,
			'show_in_admin_bar' => false,
			'show_in_nav_menus' => false,
			'publicly_queryable' => false,
			'query_var' => false,
			'exclude_from_search' => true,
			'menu_icon' => 'dashicons-calendar',
			'supports' => array(
				'title',
				'thumbnail',
			),
			'show_in_rest' => true,
			'rewrite' => array(
				'slug' => 'kalender',
			),
		)
	);

}


<?php

add_shortcode('kalender', 'webspeed_kalender_shortcode');
function webspeed_kalender_shortcode($atts) {
	global $post;
	ob_start();

  extract(shortcode_atts(array('number' => '-1', 'class' => ' no-class'), $atts));

  $loop = new WP_Query(array(
    'post_type' => 'kalender',
    'posts_per_page' => $number,

    'meta_key'     => 'dato_start',
        'meta_type'    => 'DATETIME',
        'meta_value'   => current_time('mysql'), 
        'meta_compare' => '>=', 
        'orderby'      => 'meta_value',
        'order'        => 'ASC'
      ),
  );

  if ($loop->have_posts()) {

		echo '<div class="cal-flow grid gap-1">';
		while ($loop->have_posts()): $loop->the_post();

      $dato_start = get_field('dato_start');
      $dato_start_timestamp = strtotime($dato_start);

      echo '<div class="cal-item' . $class . '">';

            echo '<div class="cal-title">' . get_the_title() . '</div>';
            echo '<div class="date-time"><span class="date">&#x1F5D3; ' . date('m. F Y', $dato_start_timestamp) . '</span><span class="time">&#x23F1; ' . date('H:i', $dato_start_timestamp) . '</span></div>';
            if( get_field('bemaerkning')){
              echo '<div class="cal-txt">' . get_field('bemaerkning') . '</div>';
            }
           
            // terms
            $terms = get_the_terms( $post->ID, 'webspeeed_calendar_type' ); 
            if ($terms) {
              echo '<div class="cal-type">';
                echo 'Type: ';
                foreach($terms as $term) {
                  echo $term->name;
                }
              echo '</div>';
            }
            

      echo '</div>';

		endwhile;
		wp_reset_query();
		echo '</div>';

	}

  $myvariable = ob_get_clean();
	return $myvariable;
}
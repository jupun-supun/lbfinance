<?php
/**
 * The template to display the courses archive
 *
 * @package WordPress
 * @subpackage ThemeREX Addons
 * @since v1.2
 */

get_header(); 

do_action('trx_addons_action_start_archive');

if (have_posts()) {

	?><div class="sc_courses sc_courses_default">

		<div class="sc_courses_columns <?php echo esc_attr(trx_addons_get_columns_wrap_class()); ?> columns_padding_bottom"><?php

			$trx_addons_courses_style   = explode('_', trx_addons_get_option('courses_style'));
			$trx_addons_courses_type    = $trx_addons_courses_style[0];
			$trx_addons_courses_columns = empty($trx_addons_courses_style[1]) ? 1 : max(1, $trx_addons_courses_style[1]);
			
			while ( have_posts() ) { the_post(); 
				trx_addons_get_template_part(array(
												'cpt/courses/tpl.'.trim($trx_addons_courses_type).'-item.php',
												'cpt/courses/tpl.default-item.php'
												),
												'trx_addons_args_sc_courses',
												array(
													'type' => $trx_addons_courses_type,
													'columns' => $trx_addons_courses_columns,
													'hide_excerpt' => false,
													'slider' => false
												)
											);
			}
	
		?></div><!-- .trx_addons_courses_columns_wrap --><?php

    ?></div><!-- .sc_courses --><?php

	the_posts_pagination( array(
		'mid_size'  => 2,
		'prev_text' => esc_html__( '<', 'trx_addons' ),
		'next_text' => esc_html__( '>', 'trx_addons' ),
		'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'trx_addons' ) . ' </span>',
	) );

} else {

	trx_addons_get_template_part('templates/tpl.posts-none.php');

}

do_action('trx_addons_action_end_archive');

get_footer();
?>
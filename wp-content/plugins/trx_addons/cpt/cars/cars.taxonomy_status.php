<?php
/**
 * ThemeREX Addons Custom post type: Cars (Taxonomy 'Status' support)
 *
 * @package WordPress
 * @subpackage ThemeREX Addons
 * @since v1.6.3
 */

// Don't load directly
if ( ! defined( 'TRX_ADDONS_VERSION' ) ) {
	die( '-1' );
}


// -----------------------------------------------------------------
// -- Custom post type registration
// -----------------------------------------------------------------

// Define Custom post type and taxonomy constants for 'Cars'
if ( ! defined('TRX_ADDONS_CPT_CARS_TAXONOMY_STATUS') )
		define('TRX_ADDONS_CPT_CARS_TAXONOMY_STATUS', trx_addons_cpt_param('cars', 'taxonomy_status'));

// Register post type and taxonomy
if (!function_exists('trx_addons_cpt_cars_taxonomy_status_init')) {
	add_action( 'init', 'trx_addons_cpt_cars_taxonomy_status_init' );
	function trx_addons_cpt_cars_taxonomy_status_init() {
		
		register_taxonomy( TRX_ADDONS_CPT_CARS_TAXONOMY_STATUS, TRX_ADDONS_CPT_CARS_PT, array(
			'post_type' 		=> TRX_ADDONS_CPT_CARS_PT,
			'hierarchical'      => true,
			'labels'            => array(
				'name'              => esc_html__( 'Status', 'trx_addons' ),
				'singular_name'     => esc_html__( 'Status', 'trx_addons' ),
				'search_items'      => esc_html__( 'Search Status', 'trx_addons' ),
				'all_items'         => esc_html__( 'All Statuses', 'trx_addons' ),
				'parent_item'       => esc_html__( 'Parent Status', 'trx_addons' ),
				'parent_item_colon' => esc_html__( 'Parent Status:', 'trx_addons' ),
				'edit_item'         => esc_html__( 'Edit Status', 'trx_addons' ),
				'update_item'       => esc_html__( 'Update Status', 'trx_addons' ),
				'add_new_item'      => esc_html__( 'Add New Status', 'trx_addons' ),
				'new_item_name'     => esc_html__( 'New Status Name', 'trx_addons' ),
				'menu_name'         => esc_html__( 'Statuses', 'trx_addons' ),
			),
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => trx_addons_cpt_param('cars', 'taxonomy_status_slug') )
			)
		);
	}
}


// Replace standard theme templates
//-------------------------------------------------------------

// Change standard category template for cars categories (groups)
if ( !function_exists( 'trx_addons_cpt_cars_taxonomy_template' ) ) {
	add_filter('taxonomy_template',	'trx_addons_cpt_cars_taxonomy_template');
	function trx_addons_cpt_cars_taxonomy_template( $template ) {
		if ( is_tax(TRX_ADDONS_CPT_CARS_TAXONOMY_STATUS) ) {
			if (($template = trx_addons_get_file_dir('cpt/cars/tpl.cars.archive_status.php')) == '') 
				$template = trx_addons_get_file_dir('cpt/cars/tpl.cars.archive.php');
		}
		return $template;
	}	
}



// Admin utils
// -----------------------------------------------------------------

// Show <select> with cars categories in the admin filters area
if (!function_exists('trx_addons_cpt_cars_taxonomy_status_admin_filters')) {
	add_action( 'restrict_manage_posts', 'trx_addons_cpt_cars_taxonomy_status_admin_filters' );
	function trx_addons_cpt_cars_taxonomy_status_admin_filters() {
		trx_addons_admin_filters(TRX_ADDONS_CPT_CARS_PT, TRX_ADDONS_CPT_CARS_TAXONOMY_STATUS);
	}
}
  
// Clear terms cache on the taxonomy 'status' save
if (!function_exists('trx_addons_cpt_cars_taxonomy_status_admin_clear_cache_status')) {
	add_action( 'edited_'.TRX_ADDONS_CPT_CARS_TAXONOMY_STATUS, 'trx_addons_cpt_cars_taxonomy_status_admin_clear_cache_status', 10, 1 );
	add_action( 'delete_'.TRX_ADDONS_CPT_CARS_TAXONOMY_STATUS, 'trx_addons_cpt_cars_taxonomy_status_admin_clear_cache_status', 10, 1 );
	add_action( 'created_'.TRX_ADDONS_CPT_CARS_TAXONOMY_STATUS, 'trx_addons_cpt_cars_taxonomy_status_admin_clear_cache_status', 10, 1 );
	function trx_addons_cpt_cars_taxonomy_status_admin_clear_cache_status( $term_id=0 ) {  
		trx_addons_admin_clear_cache_terms(TRX_ADDONS_CPT_CARS_TAXONOMY_STATUS);
	}
}
?>
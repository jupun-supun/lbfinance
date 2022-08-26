<?php
/**
 * ThemeREX Addons Custom post type: Car's agents
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

// Define Custom post type and taxonomy constants for 'Agents'
if ( ! defined('TRX_ADDONS_CPT_CARS_AGENTS_PT') )
		define('TRX_ADDONS_CPT_CARS_AGENTS_PT', trx_addons_cpt_param('cars_agents', 'post_type'));
if ( ! defined('TRX_ADDONS_CPT_CARS_AGENTS_TAXONOMY') )
		define('TRX_ADDONS_CPT_CARS_AGENTS_TAXONOMY', trx_addons_cpt_param('cars_agents', 'taxonomy'));

// Register post type and taxonomy
if (!function_exists('trx_addons_cpt_cars_agents_init')) {
	add_action( 'init', 'trx_addons_cpt_cars_agents_init' );
	function trx_addons_cpt_cars_agents_init() {
		
		global $TRX_ADDONS_STORAGE;
		$TRX_ADDONS_STORAGE['post_types'][] = TRX_ADDONS_CPT_CARS_AGENTS_PT;
		$TRX_ADDONS_STORAGE['meta_box_'.TRX_ADDONS_CPT_CARS_AGENTS_PT] = array(
			"description" => array(
				"title" => esc_html__("Short description", 'trx_addons'),
				"desc" => wp_kses_data( __("Brief information about this agent. Will be used on the agent's single page", 'trx_addons') ),
				"std" => "",
				"type" => "textarea"
			),
			"position" => array(
				"title" => esc_html__("Position", 'trx_addons'),
				"desc" => wp_kses_data( __("Agent's position in the company (agency)", 'trx_addons') ),
				"class" => "trx_addons_column-1_2",
				"std" => "",
				"type" => "text"
			),
			"languages" => array(
				"title" => esc_html__("Languages", 'trx_addons'),
				"desc" => wp_kses_data( __("Comma separated languages list", 'trx_addons') ),
				"class" => "trx_addons_column-1_2",
				"std" => "",
				"type" => "text"
			),
			"address" => array(
				"title" => esc_html__("Address", 'trx_addons'),
				"desc" => wp_kses_data( __("Agent's address - it will be used for invoices", 'trx_addons') ),
				"class" => "trx_addons_column-1_2",
				"std" => "",
				"type" => "text"
			),
			"phone_mobile" => array(
				"title" => esc_html__("Mobile phone", 'trx_addons'),
				"desc" => '',
				"class" => "trx_addons_column-1_2",
				"std" => "",
				"type" => "text"
			),
			"phone_office" => array(
				"title" => esc_html__("Office phone", 'trx_addons'),
				"desc" => '',
				"class" => "trx_addons_column-1_2",
				"std" => "",
				"type" => "text"
			),
			"phone_fax" => array(
				"title" => esc_html__("Fax", 'trx_addons'),
				"desc" => '',
				"class" => "trx_addons_column-1_2",
				"std" => "",
				"type" => "text"
			),
			"email" => array(
				"title" => esc_html__("E-mail", 'trx_addons'),
				"desc" => wp_kses_data( __('E-mail address', 'trx_addons') ),
				"class" => "trx_addons_column-1_2",
				"std" => "",
				"type" => "text"
			),
			"skype" => array(
				"title" => esc_html__("Skype", 'trx_addons'),
				"desc" => wp_kses_data( __('Name of this agent in the Skype', 'trx_addons') ),
				"class" => "trx_addons_column-1_2",
				"std" => "",
				"type" => "text"
			),
			"socials_info" => array(
				"title" => esc_html__("Social profiles", 'trx_addons'),
				"desc" => wp_kses_data( __("Select icon and specify URLs of agent's profiles in the popular social networks", 'trx_addons') ),
				"type" => "info"
			),
			'socials' => array(
				"title" => esc_html__("Socials", 'trx_addons'),
				"desc" => wp_kses_data( __("Clone fields group and select icon/image, specify social network's title and URL to your profile", 'trx_addons') ),
				"clone" => true,
				"std" => array(array()),
				"type" => "group",
				"fields" => array(
					'title' => array(
						"title" => esc_html__('Title', 'trx_addons'),
						"desc" => wp_kses_data( __("Social network's name. If empty - icon's name will be used", 'trx_addons') ),
						"class" => "trx_addons_column-1_3 trx_addons_new_row",
						"std" => "",
						"type" => "text"
					),
					'url' => array(
						"title" => esc_html__('URL to your profile', 'trx_addons'),
						"desc" => wp_kses_data( __("Specify URL of your profile in this network", 'trx_addons') ),
						"class" => "trx_addons_column-1_3",
						"std" => "",
						"type" => "text"
					),
					"name" => array(
						"title" => esc_html__("Icon", 'trx_addons'),
						"desc" => wp_kses_data( __('Select icon of this network', 'trx_addons') ),
						"class" => "trx_addons_column-1_3",
						"std" => "",
						"options" => array(),
						"type" => "icons"
					)
				)
			)
		);
		
		// Register post type and taxonomy
		register_post_type( TRX_ADDONS_CPT_CARS_AGENTS_PT, array(
			'label'               => esc_html__( 'Cars Agents', 'trx_addons' ),
			'description'         => esc_html__( 'Agent Description', 'trx_addons' ),
			'labels'              => array(
				'name'                => esc_html__( 'Cars Agents', 'trx_addons' ),
				'singular_name'       => esc_html__( 'Cars Agent', 'trx_addons' ),
				'menu_name'           => esc_html__( 'Cars Agents', 'trx_addons' ),
				'parent_item_colon'   => esc_html__( 'Parent Item:', 'trx_addons' ),
				'all_items'           => esc_html__( 'All Agents', 'trx_addons' ),
				'view_item'           => esc_html__( 'View Agent', 'trx_addons' ),
				'add_new_item'        => esc_html__( 'Add New Agent', 'trx_addons' ),
				'add_new'             => esc_html__( 'Add New', 'trx_addons' ),
				'edit_item'           => esc_html__( 'Edit Agent', 'trx_addons' ),
				'update_item'         => esc_html__( 'Update Agent', 'trx_addons' ),
				'search_items'        => esc_html__( 'Search Agent', 'trx_addons' ),
				'not_found'           => esc_html__( 'Not found', 'trx_addons' ),
				'not_found_in_trash'  => esc_html__( 'Not found in Trash', 'trx_addons' ),
			),
			'taxonomies'          => array(TRX_ADDONS_CPT_CARS_AGENTS_TAXONOMY),
			'supports'            => trx_addons_cpt_param('cars_agents', 'supports'),
			'public'              => true,
			'hierarchical'        => false,
			'has_archive'         => true,
			'can_export'          => true,
			'show_in_admin_bar'   => true,
			'show_in_menu'        => true,
			'menu_position'       => '52.05',
			'menu_icon'			  => 'dashicons-id',
			'capability_type'     => 'post',
			'rewrite'             => array( 'slug' => trx_addons_cpt_param('cars_agents', 'post_type_slug') )
			)
		);

		register_taxonomy( TRX_ADDONS_CPT_CARS_AGENTS_TAXONOMY, TRX_ADDONS_CPT_CARS_AGENTS_PT, array(
			'post_type' 		=> TRX_ADDONS_CPT_CARS_AGENTS_PT,
			'hierarchical'      => true,
			'labels'            => array(
				'name'              => esc_html__( 'Agencies', 'trx_addons' ),
				'singular_name'     => esc_html__( 'Agency', 'trx_addons' ),
				'search_items'      => esc_html__( 'Search Agencies', 'trx_addons' ),
				'all_items'         => esc_html__( 'All Agencies', 'trx_addons' ),
				'parent_item'       => esc_html__( 'Parent Agency', 'trx_addons' ),
				'parent_item_colon' => esc_html__( 'Parent Agency:', 'trx_addons' ),
				'edit_item'         => esc_html__( 'Edit Agency', 'trx_addons' ),
				'update_item'       => esc_html__( 'Update Agency', 'trx_addons' ),
				'add_new_item'      => esc_html__( 'Add New Agency', 'trx_addons' ),
				'new_item_name'     => esc_html__( 'New Agency Name', 'trx_addons' ),
				'menu_name'         => esc_html__( 'Agencies', 'trx_addons' ),
			),
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => trx_addons_cpt_param('cars_agents', 'taxonomy_slug') )
			)
		);
	}
}

// Add 'Agents' parameters in the ThemeREX Addons Options
if (!function_exists('trx_addons_cpt_cars_agents_options')) {
	add_action( 'trx_addons_filter_options', 'trx_addons_cpt_cars_agents_options');
	function trx_addons_cpt_cars_agents_options($options) {

		trx_addons_array_insert_after($options, 'cpt_section', array(
			'cars_agents_info' => array(
				"title" => esc_html__('Cars agents', 'trx_addons'),
				"desc" => wp_kses_data( __('Settings of the cars agents profile', 'trx_addons') ),
				"type" => "info"
			),
			'cars_agents_style' => array(
				"title" => esc_html__('Style of the archive', 'trx_addons'),
				"desc" => wp_kses_data( __("Style of the agents archive", 'trx_addons') ),
				"std" => 'default_2',
				"options" => apply_filters('trx_addons_filter_cpt_archive_styles', array(
					'default_1' => esc_html__('Default /1 column/', 'trx_addons'),
					'default_2' => esc_html__('Default /2 columns/', 'trx_addons'),
					'default_3' => esc_html__('Default /3 columns/', 'trx_addons')
				), TRX_ADDONS_CPT_CARS_AGENTS_PT),
				"type" => "select"
			),
			'cars_agents_list_style' => array(
				"title" => esc_html__('Style of the cars list', 'trx_addons'),
				"desc" => wp_kses_data( __("Style of the cars archive on the Agent's profile page", 'trx_addons') ),
				"std" => 'default_3',
				"options" => apply_filters('trx_addons_filter_cpt_single_styles', array(
					'default_1' => esc_html__('Default /1 column/', 'trx_addons'),
					'default_2' => esc_html__('Default /2 columns/', 'trx_addons'),
					'default_3' => esc_html__('Default /3 columns/', 'trx_addons')
				), TRX_ADDONS_CPT_CARS_AGENTS_PT),
				"type" => "select"
			)
		));
		return $options;
	}
}


// Return true if it's agents page
if ( !function_exists( 'trx_addons_is_cars_agents_page' ) ) {
	function trx_addons_is_cars_agents_page() {
		return defined('TRX_ADDONS_CPT_CARS_AGENTS_PT') 
					&& !is_search()
					&& (
						(is_single() && get_post_type()==TRX_ADDONS_CPT_CARS_AGENTS_PT)
						|| is_post_type_archive(TRX_ADDONS_CPT_CARS_AGENTS_PT)
						|| is_tax(TRX_ADDONS_CPT_CARS_AGENTS_TAXONOMY)
						);
	}
}


// Return taxonomy for the current post type
if ( !function_exists( 'trx_addons_cpt_cars_agents_post_type_taxonomy' ) ) {
	add_filter( 'trx_addons_filter_post_type_taxonomy',	'trx_addons_cpt_cars_agents_post_type_taxonomy', 10, 2 );
	function trx_addons_cpt_cars_agents_post_type_taxonomy($tax='', $post_type='') {
		if ( defined('TRX_ADDONS_CPT_CARS_AGENTS_PT') && $post_type == TRX_ADDONS_CPT_CARS_AGENTS_PT )
			$tax = TRX_ADDONS_CPT_CARS_AGENTS_TAXONOMY;
		return $tax;
	}
}


// Return link to the all posts for the breadcrumbs
if ( !function_exists( 'trx_addons_cpt_cars_agents_get_blog_all_posts_link' ) ) {
	add_filter('trx_addons_filter_get_blog_all_posts_link', 'trx_addons_cpt_cars_agents_get_blog_all_posts_link', 10, 2);
	function trx_addons_cpt_cars_agents_get_blog_all_posts_link($link='', $args=array()) {
		if ($link=='') {
			if (trx_addons_is_cars_agents_page() && (!is_post_type_archive(TRX_ADDONS_CPT_CARS_AGENTS_PT) || is_tax(TRX_ADDONS_CPT_CARS_AGENTS_TAXONOMY)))
				$link = '<a href="'.esc_url(get_post_type_archive_link( TRX_ADDONS_CPT_CARS_AGENTS_PT )).'">'
							. esc_html__('All Agents', 'trx_addons')
							. '</a>';
		}
		return $link;
	}
}


// Return current page title
if ( !function_exists( 'trx_addons_cpt_cars_agents_get_blog_title' ) ) {
	add_filter( 'trx_addons_filter_get_blog_title', 'trx_addons_cpt_cars_agents_get_blog_title');
	function trx_addons_cpt_cars_agents_get_blog_title($title='') {
		if ( defined('TRX_ADDONS_CPT_CARS_AGENTS_PT') ) {
			if ( is_post_type_archive(TRX_ADDONS_CPT_CARS_AGENTS_PT) )
				$title = esc_html__('All Agents', 'trx_addons');

		}
		return $title;
	}
}

// Return agent or author parameters (avatar, name, link, socials, etc.)
if ( !function_exists( 'trx_addons_cars_get_agent_data' ) ) {
	function trx_addons_cars_get_agent_data($meta) {
		$data = array(
			'image' => '',
			'image_id' => 0,
			'title' => '',
			'name' => '',
			'position' => '',
			'description' => '',
			'email' => '',
			'skype' => '',
			'socials' => array(),
			'address' => '',
			'phone_mobile' => '',
			'phone_office' => '',
			'phone_fax' => '',
			'posts_link' => ''
		);
		
		// Owner
		if ($meta['agent_type']=='owner') {
			$data['title'] = __('Owner', 'trx_addons');
			$data['name'] = $meta['owner_name'];
			$data['email'] = $meta['owner_email'];
			$data['skype'] = $meta['owner_skype'];
			$data['phone_mobile'] = $meta['owner_phone'];
			$data['position'] = __("Car's owner", 'trx_addons');

		// Agent
		} else if ($meta['agent_type']=='agent') {
			$agent_id = $meta['agent'];
			$agent_meta = get_post_meta($agent_id, 'trx_addons_options', true);
			$data = array_merge($data, $agent_meta);
			$data['image_id'] = get_post_thumbnail_id($agent_id);
			$data['title'] = __('Agent', 'trx_addons');
			$data['name'] = get_the_title($agent_id);
			$data['posts_link'] = get_permalink($agent_id);

		// Author
		} else {
			$user_id = get_the_author_meta('ID');
			$user_data = get_userdata($user_id);
			$data['title'] = __('Author', 'trx_addons');
			$data['name'] = $user_data->display_name;
			$data['description'] = get_user_meta($user_id, 'description', true);
			$data['email'] = $user_data->user_email;
			$data['posts_link'] = get_author_posts_url($user_id);
			$user_meta = trx_addons_users_get_meta($user_id);
			if (!empty($user_meta['socials'])) $data['socials'] = $user_meta['socials'];
		}
		if (empty($data['image']) && empty($data['image_id']) && !empty($data['email'])) {
			if (($avatar = get_avatar($data['email'], 512))!='')
				$data['image'] = trx_addons_get_tag_attrib($avatar, '<img>', 'src');
		}
		return $data;
	}
}

// Return agent's email, skype and socials, prepared for output
if ( !function_exists( 'trx_addons_cars_get_agent_socials' ) ) {
	function trx_addons_cars_get_agent_socials($meta) {
		$icons = array();
		$socials_type = trx_addons_get_option('socials_type');
		if (!empty($meta['email']))
			$icons[] = array(
						'name' => $socials_type == 'images'
										? (($fdir=trx_addons_get_file_url('css/socials/mail.png'))!='' ? $fdir : '')
										: 'trx_addons_icon-mail',
						'title' => __('Mail to the agent', 'trx_addons'),
						'url' => sprintf('mailto:%s', antispambot($meta['email']))
						);
		if (!empty($meta['skype']))
			$icons[] = array(
						'name' => $socials_type == 'images'
										? (($fdir=trx_addons_get_file_url('css/socials/skype.png'))!='' ? $fdir : '')
										: 'trx_addons_icon-skype',
						'title' => __('Start conversation by Skype', 'trx_addons'),
						'url' => sprintf('skype:%s', $meta['skype'])
						);
		return array_merge($icons, $meta['socials']);
	}
}



// Replace standard theme templates
//-------------------------------------------------------------

// Change standard single template for agents posts
if ( !function_exists( 'trx_addons_cpt_cars_agents_single_template' ) ) {
	add_filter('single_template', 'trx_addons_cpt_cars_agents_single_template');
	function trx_addons_cpt_cars_agents_single_template($template) {
		global $post;
		if (is_single() && $post->post_type == TRX_ADDONS_CPT_CARS_AGENTS_PT)
			$template = trx_addons_get_file_dir('cpt/cars/tpl.agents.single.php');
		return $template;
	}
}

// Change standard archive template for agents posts
if ( !function_exists( 'trx_addons_cpt_cars_agents_archive_template' ) ) {
	add_filter('archive_template',	'trx_addons_cpt_cars_agents_archive_template');
	function trx_addons_cpt_cars_agents_archive_template( $template ) {
		if ( is_post_type_archive(TRX_ADDONS_CPT_CARS_AGENTS_PT) )
			$template = trx_addons_get_file_dir('cpt/cars/tpl.agents.archive.php');
		return $template;
	}	
}

// Change standard category template for agents categories (groups)
if ( !function_exists( 'trx_addons_cpt_cars_agents_taxonomy_template' ) ) {
	add_filter('taxonomy_template',	'trx_addons_cpt_cars_agents_taxonomy_template');
	function trx_addons_cpt_cars_agents_taxonomy_template( $template ) {
		if ( is_tax(TRX_ADDONS_CPT_CARS_AGENTS_TAXONOMY) )
			$template = trx_addons_get_file_dir('cpt/cars/tpl.agents.archive.php');
		return $template;
	}	
}



// Admin utils
// -----------------------------------------------------------------

// Show <select> with agents categories in the admin filters area
if (!function_exists('trx_addons_cpt_cars_agents_admin_filters')) {
	add_action( 'restrict_manage_posts', 'trx_addons_cpt_cars_agents_admin_filters' );
	function trx_addons_cpt_cars_agents_admin_filters() {
		trx_addons_admin_filters(TRX_ADDONS_CPT_CARS_AGENTS_PT, TRX_ADDONS_CPT_CARS_AGENTS_TAXONOMY);
	}
}
  
// Clear terms cache on the taxonomy save
if (!function_exists('trx_addons_cpt_cars_agents_admin_clear_cache')) {
	add_action( 'edited_'.TRX_ADDONS_CPT_CARS_AGENTS_TAXONOMY, 'trx_addons_cpt_cars_agents_admin_clear_cache', 10, 1 );
	add_action( 'delete_'.TRX_ADDONS_CPT_CARS_AGENTS_TAXONOMY, 'trx_addons_cpt_cars_agents_admin_clear_cache', 10, 1 );
	add_action( 'created_'.TRX_ADDONS_CPT_CARS_AGENTS_TAXONOMY, 'trx_addons_cpt_cars_agents_admin_clear_cache', 10, 1 );
	function trx_addons_cpt_cars_agents_admin_clear_cache( $term_id=0 ) {  
		trx_addons_admin_clear_cache_terms(TRX_ADDONS_CPT_CARS_AGENTS_TAXONOMY);
	}
}
?>
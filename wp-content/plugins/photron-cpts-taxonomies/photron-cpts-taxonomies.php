<?php
/*
Plugin Name: Photron Custom Post Types & Taxonomies
Plugin URI: photron.com
Description: Custom post types and taxonomies for photron.com
Version: 1.0
Author: Michelle McGinnis
Author URI: http://friendlywp.com
License: 
License URI: 
*/

// Register Custom Post Type
function cpts() {
	// RE-REGISTER PRODUCT TAGS SO IT'S HIERARCHICAL
	$labels = array(
	    'name'                       => 'Product Tags',
	    'singular_name'              => 'Product Tag',
	    'menu_name'                  => 'Product Tags',
	    'all_items'                  => 'All Product Tags',
	    'parent_item'                => 'Parent Product Tag',
	    'parent_item_colon'          => 'Parent Product Tag:',
	    'new_item_name'              => 'New Product Tag',
	    'add_new_item'               => 'Add New Product Tag',
	    'edit_item'                  => 'Edit Product Tag',
	    'update_item'                => 'Update Product Tag',
	    'separate_items_with_commas' => 'Separate items with commas',
	    'search_items'               => 'Search Product Tags',
	    'add_or_remove_items'        => 'Add or remove Product tags',
	    'choose_from_most_used'      => 'Choose from the most used Product tags',
	    'not_found'                  => 'Not Found',
	  );
	  $rewrite = array(
	    'slug'                       => 'product-tag',
	    'with_front'                 => true,
	    'hierarchical'               => true,
	  );
	  $args = array(
	    'labels'                     => $labels,
	    'hierarchical'               => true,
	    'public'                     => true,
	    'show_ui'                    => true,
	    'show_admin_column'          => true,
	    'show_in_nav_menus'          => true,
	    'show_tagcloud'              => true,
	    'rewrite'                    => $rewrite,
	  );
	  //register_taxonomy( 'product_tag', 'product', $args );
	  
	  // MAX MEMORY
	$labels = array(
	    'name'                       => 'Maximum Memory',
	    'singular_name'              => 'Maximum Memory',
	    'menu_name'                  => 'Max Memory',
	    'all_items'                  => 'All Memory',
	    'parent_item'                => 'Parent Memory',
	    'parent_item_colon'          => 'Parent Memory:',
	    'new_item_name'              => 'New Memory',
	    'add_new_item'               => 'Add New Memory',
	    'edit_item'                  => 'Edit Memory',
	    'update_item'                => 'Update Memory',
	    'separate_items_with_commas' => 'Separate items with commas',
	    'search_items'               => 'Search Memory',
	    'add_or_remove_items'        => 'Add or remove Memory',
	    'choose_from_most_used'      => 'Choose from the most used Memory',
	    'not_found'                  => 'Not Found',
	  );
	  $rewrite = array(
	    'slug'                       => 'high-speed-cameras/max-memory',
	    'with_front'                 => true,
	    'hierarchical'               => true,
	  );
	  $args = array(
	    'labels'                     => $labels,
	    'hierarchical'               => true,
	    'public'                     => true,
	    'show_ui'                    => true,
	    'show_admin_column'          => true,
	    'show_in_nav_menus'          => true,
	    'show_tagcloud'              => true,
	    'rewrite'                    => $rewrite,
	  );
	  register_taxonomy( 'memory_option', 'product', $args );

	  // LIGHT SENSITIVITY (ISO) OPTIONS
	$labels = array(
	    'name'                       => 'Light Sensitivity',
	    'singular_name'              => 'Light Sensitivity',
	    'menu_name'                  => 'Light Sensitivity',
	    'all_items'                  => 'All Light Sensitivity',
	    'parent_item'                => 'Parent Light Sensitivity',
	    'parent_item_colon'          => 'Parent Light Sensitivity:',
	    'new_item_name'              => 'New Light Sensitivity',
	    'add_new_item'               => 'Add New Light Sensitivity',
	    'edit_item'                  => 'Edit Light Sensitivity',
	    'update_item'                => 'Update Light Sensitivity',
	    'separate_items_with_commas' => 'Separate items with commas',
	    'search_items'               => 'Search Light Sensitivity',
	    'add_or_remove_items'        => 'Add or remove Light Sensitivity',
	    'choose_from_most_used'      => 'Choose from the most used Light Sensitivity',
	    'not_found'                  => 'Not Found',
	  );
	  $rewrite = array(
	    'slug'                       => 'high-speed-cameras/iso',
	    'with_front'                 => true,
	    'hierarchical'               => true,
	  );
	  $args = array(
	    'labels'                     => $labels,
	    'hierarchical'               => true,
	    'public'                     => true,
	    'show_ui'                    => true,
	    'show_admin_column'          => true,
	    'show_in_nav_menus'          => true,
	    'show_tagcloud'              => true,
	    'rewrite'                    => $rewrite,
	  );
	  register_taxonomy( 'sensitivity_option', 'product', $args );

	  // DATA RATE OPTIONS
	$labels = array(
	    'name'                       => 'Data Rate',
	    'singular_name'              => 'Data Rate',
	    'menu_name'                  => 'Data Rate',
	    'all_items'                  => 'All Data Rate',
	    'parent_item'                => 'Parent Data Rate',
	    'parent_item_colon'          => 'Parent Data Rate:',
	    'new_item_name'              => 'New Data Rate',
	    'add_new_item'               => 'Add New Data Rate',
	    'edit_item'                  => 'Edit Data Rate',
	    'update_item'                => 'Update Data Rate',
	    'separate_items_with_commas' => 'Separate items with commas',
	    'search_items'               => 'Search Data Rate',
	    'add_or_remove_items'        => 'Add or remove Data Rate',
	    'choose_from_most_used'      => 'Choose from the most used Data Rate',
	    'not_found'                  => 'Not Found',
	  );
	  $rewrite = array(
	    'slug'                       => 'high-speed-cameras/data-rate',
	    'with_front'                 => true,
	    'hierarchical'               => true,
	  );
	  $args = array(
	    'labels'                     => $labels,
	    'hierarchical'               => true,
	    'public'                     => true,
	    'show_ui'                    => true,
	    'show_admin_column'          => true,
	    'show_in_nav_menus'          => true,
	    'show_tagcloud'              => true,
	    'rewrite'                    => $rewrite,
	  );
	  register_taxonomy( 'data_rate_option', 'product', $args );

	  // RESOLUTION OPTIONS
	$labels = array(
	    'name'                       => 'Resolution',
	    'singular_name'              => 'Resolution',
	    'menu_name'                  => 'Resolution',
	    'all_items'                  => 'All Resolution',
	    'parent_item'                => 'Parent Resolution',
	    'parent_item_colon'          => 'Parent Resolution:',
	    'new_item_name'              => 'New Resolution',
	    'add_new_item'               => 'Add New Resolution',
	    'edit_item'                  => 'Edit Resolution',
	    'update_item'                => 'Update Resolution',
	    'separate_items_with_commas' => 'Separate items with commas',
	    'search_items'               => 'Search Resolution',
	    'add_or_remove_items'        => 'Add or remove Resolution',
	    'choose_from_most_used'      => 'Choose from the most used Resolution',
	    'not_found'                  => 'Not Found',
	  );
	  $rewrite = array(
	    'slug'                       => 'high-speed-cameras/resolution',
	    'with_front'                 => true,
	    'hierarchical'               => true,
	  );
	  $args = array(
	    'labels'                     => $labels,
	    'hierarchical'               => true,
	    'public'                     => true,
	    'show_ui'                    => true,
	    'show_admin_column'          => true,
	    'show_in_nav_menus'          => true,
	    'show_tagcloud'              => true,
	    'rewrite'                    => $rewrite,
	  );
	  register_taxonomy( 'resolution_option', 'product', $args );

	  // FRAME RATE OPTIONS
	$labels = array(
	    'name'                       => 'Max Frame Rates',
	    'singular_name'              => 'Max Frame Rate',
	    'menu_name'                  => 'Frame Rates',
	    'all_items'                  => 'All Frame Rates',
	    'parent_item'                => 'Parent Frame Rate',
	    'parent_item_colon'          => 'Parent Frame Rate:',
	    'new_item_name'              => 'New Frame Rate',
	    'add_new_item'               => 'Add New Frame Rate',
	    'edit_item'                  => 'Edit Frame Rate',
	    'update_item'                => 'Update Frame Rate',
	    'separate_items_with_commas' => 'Separate items with commas',
	    'search_items'               => 'Search Frame Rates',
	    'add_or_remove_items'        => 'Add or remove Frame Rates',
	    'choose_from_most_used'      => 'Choose from the most used Frame Rates',
	    'not_found'                  => 'Not Found',
	  );
	  $rewrite = array(
	    'slug'                       => 'high-speed-cameras/frame-rate',
	    'with_front'                 => true,
	    'hierarchical'               => true,
	  );
	  $args = array(
	    'labels'                     => $labels,
	    'hierarchical'               => true,
	    'public'                     => true,
	    'show_ui'                    => true,
	    'show_admin_column'          => true,
	    'show_in_nav_menus'          => true,
	    'show_tagcloud'              => true,
	    'rewrite'                    => $rewrite,
	  );
	  register_taxonomy( 'frame_rate_option', 'product', $args );

	  // FULL RES FRAME RATE OPTIONS
	$labels = array(
	    'name'                       => 'Full-Res Max Frame Rates',
	    'singular_name'              => 'Full-Res Max Frame Rate',
	    'menu_name'                  => 'Full-Res Frame Rate',
	    'all_items'                  => 'All Full-Res Frame Rates',
	    'parent_item'                => 'Parent Full-Res Frame Rate',
	    'parent_item_colon'          => 'Parent Full-Res Frame Rate:',
	    'new_item_name'              => 'New Full-Res Frame Rate',
	    'add_new_item'               => 'Add New Full-Res Frame Rate',
	    'edit_item'                  => 'Edit Full-Res Frame Rate',
	    'update_item'                => 'Update Full-Res Frame Rate',
	    'separate_items_with_commas' => 'Separate items with commas',
	    'search_items'               => 'Search Frame Rates',
	    'add_or_remove_items'        => 'Add or remove Full-Res Frame Rates',
	    'choose_from_most_used'      => 'Choose from the most used Full-Res Frame Rates',
	    'not_found'                  => 'Not Found',
	  );
	  $rewrite = array(
	    'slug'                       => 'high-speed-cameras/full-res-fps',
	    'with_front'                 => true,
	    'hierarchical'               => true,
	  );
	  $args = array(
	    'labels'                     => $labels,
	    'hierarchical'               => true,
	    'public'                     => true,
	    'show_ui'                    => true,
	    'show_admin_column'          => true,
	    'show_in_nav_menus'          => true,
	    'show_tagcloud'              => true,
	    'rewrite'                    => $rewrite,
	  );
	  register_taxonomy( 'full_res_fps_option', 'product', $args );

	  // MISCELLANEOUS ATTRIBUTES
	$labels = array(
	    'name'                       => 'Miscellaneous Attributes',
	    'singular_name'              => 'Miscellaneous Attribute',
	    'menu_name'                  => 'Misc Attributes',
	    'all_items'                  => 'All Misc Attributes',
	    'parent_item'                => 'Parent Misc Attribute',
	    'parent_item_colon'          => 'Parent Misc Attribute:',
	    'new_item_name'              => 'New Misc Attribute',
	    'add_new_item'               => 'Add New Misc Attribute',
	    'edit_item'                  => 'Edit Misc Attribute',
	    'update_item'                => 'Update Misc Attribute',
	    'separate_items_with_commas' => 'Separate items with commas',
	    'search_items'               => 'Search Frame Rates',
	    'add_or_remove_items'        => 'Add or remove Misc Attributes',
	    'choose_from_most_used'      => 'Choose from the most used Misc Attributes',
	    'not_found'                  => 'Not Found',
	  );
	  $rewrite = array(
	    'slug'                       => 'high-speed-cameras/misc-attribute',
	    'with_front'                 => true,
	    'hierarchical'               => true,
	  );
	  $args = array(
	    'labels'                     => $labels,
	    'hierarchical'               => true,
	    'public'                     => true,
	    'show_ui'                    => true,
	    'show_admin_column'          => true,
	    'show_in_nav_menus'          => true,
	    'show_tagcloud'              => true,
	    'rewrite'                    => $rewrite,
	  );
	  register_taxonomy( 'miscellaneous_option', 'product', $args );

	 // FAQ CATEGORIES
	  $labels = array(
	    'name'                       => 'FAQ Categories',
	    'singular_name'              => 'FAQ Category',
	    'menu_name'                  => 'FAQ Categories',
	    'all_items'                  => 'All FAQ Categories',
	    'parent_item'                => 'Parent FAQ Category',
	    'parent_item_colon'          => 'Parent FAQ Category:',
	    'new_item_name'              => 'New FAQ Category',
	    'add_new_item'               => 'Add New FAQ Category',
	    'edit_item'                  => 'Edit FAQ Category',
	    'update_item'                => 'Update FAQ Category',
	    'separate_items_with_commas' => 'Separate items with commas',
	    'search_items'               => 'Search FAQ Categories',
	    'add_or_remove_items'        => 'Add or remove FAQ categories',
	    'choose_from_most_used'      => 'Choose from the most used FAQ categories',
	    'not_found'                  => 'Not Found',
	  );
	  $rewrite = array(
	    'slug'                       => 'faq-category',
	    'with_front'                 => true,
	    'hierarchical'               => true,
	  );
	  $args = array(
	    'labels'                     => $labels,
	    'hierarchical'               => true,
	    'public'                     => true,
	    'show_ui'                    => true,
	    'show_admin_column'          => true,
	    'show_in_nav_menus'          => true,
	    'show_tagcloud'              => true,
	    'rewrite'                    => $rewrite,
	  );
	  register_taxonomy( 'faq_categories', 'faq', $args );

	  // Video CATEGORIES
	  $labels = array(
	    'name'                       => 'Video Categories',
	    'singular_name'              => 'Video Category',
	    'menu_name'                  => 'Video Categories',
	    'all_items'                  => 'All Video Categories',
	    'parent_item'                => 'Parent Video Category',
	    'parent_item_colon'          => 'Parent Video Category:',
	    'new_item_name'              => 'New Video Category',
	    'add_new_item'               => 'Add New Video Category',
	    'edit_item'                  => 'Edit Video Category',
	    'update_item'                => 'Update Video Category',
	    'separate_items_with_commas' => 'Separate items with commas',
	    'search_items'               => 'Search Video Categories',
	    'add_or_remove_items'        => 'Add or remove Video categories',
	    'choose_from_most_used'      => 'Choose from the most used Video categories',
	    'not_found'                  => 'Not Found',
	  );
	  $rewrite = array(
	    'slug'                       => 'videos/category',
	    'with_front'                 => true,
	    'hierarchical'               => true,
	  );
	  $args = array(
	    'labels'                     => $labels,
	    'hierarchical'               => true,
	    'public'                     => true,
	    'show_ui'                    => true,
	    'show_admin_column'          => true,
	    'show_in_nav_menus'          => true,
	    'show_tagcloud'              => true,
	    'rewrite'                    => $rewrite,
	  );
	 // register_taxonomy( 'video_categories', 'video', $args );

	   // Example Applications
	  $labels = array(
	    'name'                       => 'Demonstrated Uses',
	    'singular_name'              => 'Demonstrated Use',
	    'menu_name'                  => 'Applications',
	    'all_items'                  => 'All Applications',
	    'parent_item'                => 'Parent Application',
	    'parent_item_colon'          => 'Parent Application:',
	    'new_item_name'              => 'New Application',
	    'add_new_item'               => 'Add New Application',
	    'edit_item'                  => 'Edit Application',
	    'update_item'                => 'Update Application',
	    'separate_items_with_commas' => 'Separate items with commas',
	    'search_items'               => 'Search Applications',
	    'add_or_remove_items'        => 'Add or remove applications',
	    'choose_from_most_used'      => 'Choose from the most used applications',
	    'not_found'                  => 'Not Found',
	  );
	  $rewrite = array(
	    'slug'                       => 'videos/examples',
	    'with_front'                 => true,
	    'hierarchical'               => false,
	  );
	  $args = array(
	    'labels'                     => $labels,
	    'hierarchical'               => false,
	    'public'                     => true,
	    'show_ui'                    => true,
	    'show_admin_column'          => true,
	    'show_in_nav_menus'          => true,
	    'show_tagcloud'              => true,
	    'rewrite'                    => $rewrite,
	  );
	  register_taxonomy( 'video_tags', 'video', $args );
	
	// Distributor Countries
	  $labels = array(
	    'name'                       => 'Distributor Countries',
	    'singular_name'              => 'Distributor Country',
	    'menu_name'                  => 'Distributor Countries',
	    'all_items'                  => 'All Distributor Countries',
	    'parent_item'                => 'Parent Distributor Country',
	    'parent_item_colon'          => 'Parent Distributor Country:',
	    'new_item_name'              => 'New Distributor Country',
	    'add_new_item'               => 'Add New Distributor Country',
	    'edit_item'                  => 'Edit Distributor Country',
	    'update_item'                => 'Update Distributor Country',
	    'separate_items_with_commas' => 'Separate items with commas',
	    'search_items'               => 'Search Distributor Countries',
	    'add_or_remove_items'        => 'Add or remove Distributor Countries',
	    'choose_from_most_used'      => 'Choose from the most used Distributor Countries',
	    'not_found'                  => 'Not Found',
	  );
	  $rewrite = array(
	    'slug'                       => 'contact/distributors/country',
	    'with_front'                 => true,
	    'hierarchical'               => true,
	  );
	  $args = array(
	    'labels'                     => $labels,
	    'hierarchical'               => true,
	    'public'                     => true,
	    'show_ui'                    => true,
	    'show_admin_column'          => true,
	    'show_in_nav_menus'          => true,
	    'show_tagcloud'              => true,
	    'rewrite'                    => $rewrite,
	  );
	 register_taxonomy( 'distributor_country', 'distributor', $args );

	 // Distributor States
	  $labels = array(
	    'name'                       => 'Distributor States',
	    'singular_name'              => 'Distributor State',
	    'menu_name'                  => 'Distributor States',
	    'all_items'                  => 'All Distributor States',
	    'parent_item'                => 'Parent Distributor State',
	    'parent_item_colon'          => 'Parent Distributor State:',
	    'new_item_name'              => 'New Distributor State',
	    'add_new_item'               => 'Add New Distributor State',
	    'edit_item'                  => 'Edit Distributor State',
	    'update_item'                => 'Update Distributor State',
	    'separate_items_with_commas' => 'Separate items with commas',
	    'search_items'               => 'Search Distributor States',
	    'add_or_remove_items'        => 'Add or remove distributor states',
	    'choose_from_most_used'      => 'Choose from the most used Distributor States',
	    'not_found'                  => 'Not Found',
	  );
	  $rewrite = array(
	    'slug'                       => 'contact/distributors/state',
	    'with_front'                 => true,
	    'hierarchical'               => true,
	  );
	  $args = array(
	    'labels'                     => $labels,
	    'hierarchical'               => true,
	    'public'                     => true,
	    'show_ui'                    => true,
	    'show_admin_column'          => true,
	    'show_in_nav_menus'          => true,
	    'show_tagcloud'              => true,
	    'rewrite'                    => $rewrite,
	  );
	 register_taxonomy( 'distributor_state', 'distributor', $args );

	 // FAQ
	  $labels = array(
	    'name'                => 'FAQs',
	    'singular_name'       => 'FAQ',
	    'menu_name'           => 'FAQs',
	    'parent_item_colon'   => 'Parent FAQ:',
	    'all_items'           => 'All FAQs',
	    'view_item'           => 'View FAQ',
	    'add_new_item'        => 'Add New FAQ',
	    'add_new'             => 'Add New',
	    'edit_item'           => 'Edit FAQ',
	    'update_item'         => 'Update FAQ',
	    'search_items'        => 'Search FAQ',
	    'not_found'           => 'Not found',
	    'not_found_in_trash'  => 'Not found in Trash',
	  );
	  $args = array(
	    'label'               => 'faq',
	    'description'         => 'Individual FAQs',
	    'labels'              => $labels,
	    'supports'            => array( 'title', 'editor', 'revisions', ),
	    'taxonomies'          => array( 'faq_categories' ),
	    'hierarchical'        => true,
	    'public'              => true,
	    'show_ui'             => true,
	    'show_in_menu'        => true,
	    'show_in_nav_menus'   => true,
	    'show_in_admin_bar'   => true,
	    'menu_position'       => 20,
	    'menu_icon'           => 'dashicons-editor-help',
	    'can_export'          => true,
	    'has_archive'         => true,
	    'exclude_from_search' => false,
	    'publicly_queryable'  => true,
	    'capability_type'     => 'page',
	  );
	  register_post_type( 'faq', $args );

	  // Distributor
	  $labels = array(
	    'name'                => 'Distributors',
	    'singular_name'       => 'Distributor',
	    'menu_name'           => 'Distributors',
	    'parent_item_colon'   => 'Parent Distributor:',
	    'all_items'           => 'All Distributors',
	    'view_item'           => 'View Distributor',
	    'add_new_item'        => 'Add New Distributor',
	    'add_new'             => 'Add New',
	    'edit_item'           => 'Edit Distributor',
	    'update_item'         => 'Update Distributor',
	    'search_items'        => 'Search Distributor',
	    'not_found'           => 'Not found',
	    'not_found_in_trash'  => 'Not found in Trash',
	  );
	   $rewrite = array(
	    'slug'                       => 'distributors',
	    'with_front'                 => true,
	    'hierarchical'               => true,
	  );
	  $args = array(
	    'label'               => 'distributor',
	    'description'         => 'Individual Distributors',
	    'labels'              => $labels,
	    'supports'            => array( 'title', 'editor', 'revisions', ),
	    'taxonomies'          => array( 'distributor_country', 'distributor_state' ),
	    'hierarchical'        => true,
	    'public'              => true,
	    'show_ui'             => true,
	    'show_in_menu'        => true,
	    'show_in_nav_menus'   => true,
	    'show_in_admin_bar'   => true,
	    'menu_position'       => 20,
	    'menu_icon'           => 'dashicons-admin-site',
	    'can_export'          => true,
	    'has_archive'         => true,
	    'exclude_from_search' => false,
	    'publicly_queryable'  => true,
	    'capability_type'     => 'page',
	    'rewrite'                    => $rewrite,
	  );
	  register_post_type( 'distributor', $args );

	  // Video
	  $labels = array(
	    'name'                => 'Videos',
	    'singular_name'       => 'Video',
	    'menu_name'           => 'Videos',
	    'parent_item_colon'   => 'Parent Video:',
	    'all_items'           => 'All Videos',
	    'view_item'           => 'View Video',
	    'add_new_item'        => 'Add New Video',
	    'add_new'             => 'Add New',
	    'edit_item'           => 'Edit Video',
	    'update_item'         => 'Update Video',
	    'search_items'        => 'Search Video',
	    'not_found'           => 'Not found',
	    'not_found_in_trash'  => 'Not found in Trash',
	  );
	  $rewrite = array(
	    'slug'                       => 'videos',
	    'with_front'                 => true,
	    'hierarchical'               => false,
	  );
	  $args = array(
	    'label'               => 'video',
	    'description'         => 'Individual Videos',
	    'labels'              => $labels,
	    'supports'            => array( 'title', 'revisions', 'thumbnail' ),
	    'taxonomies'          => array( 'video_categories' ),
	    'hierarchical'        => true,
	    'public'              => true,
	    'show_ui'             => true,
	    'show_in_menu'        => true,
	    'show_in_nav_menus'   => true,
	    'show_in_admin_bar'   => true,
	    'menu_position'       => 20,
	    'menu_icon'           => 'dashicons-video-alt3',
	    'can_export'          => true,
	    'has_archive'         => true,
	    'exclude_from_search' => false,
	    'publicly_queryable'  => true,
	    'capability_type'     => 'page',
	    'rewrite'                    => $rewrite,
	  );
	  register_post_type( 'video', $args );

	  // SLIDER
	  $labels = array(
	    'name'                => 'Sliders',
	    'singular_name'       => 'Slider',
	    'menu_name'           => 'Sliders',
	    'parent_item_colon'   => 'Parent Slider:',
	    'all_items'           => 'All Sliders',
	    'view_item'           => 'View Slider',
	    'add_new_item'        => 'Add New Slider',
	    'add_new'             => 'Add New',
	    'edit_item'           => 'Edit Slider',
	    'update_item'         => 'Update Slider',
	    'search_items'        => 'Search Slider',
	    'not_found'           => 'Not found',
	    'not_found_in_trash'  => 'Not found in Trash',
	  );
	 $rewrite = array(
	        'slug'                => 'slider',
	        'with_front'          => true,
	        'pages'               => true,
	        'feeds'               => true,
	    );
	  $args = array(
	    'label'               => 'slider',
	    'description'         => 'Individual Sliders',
	    'labels'              => $labels,
	    'supports'            => array( 'title', 'revisions',),
	    'hierarchical'        => true,
	    'public'              => true,
	    'show_ui'             => true,
	    'show_in_menu'        => true,
	    'show_in_nav_menus'   => true,
	    'show_in_admin_bar'   => true,
	    'menu_position'       => 20,
	    'menu_icon'           => 'dashicons-images-alt',
	    'can_export'          => true,
	    'has_archive'         => true,
	    'exclude_from_search' => false,
	    'publicly_queryable'  => true,
	    'rewrite'             => $rewrite,
	    'capability_type'     => 'page',
	  );
	 // register_post_type( 'slider', $args );
}

function mm_flush_rules() {
	cpts();
	flush_rewrite_rules();
}

// Hook into the 'init' action
register_activation_hook( __FILE__, 'mm_flush_rules');

add_action( 'init', 'cpts', 999 );
/// Remove product_tag support from products
function fwc_unregister_tags() {
    unregister_taxonomy_for_object_type('product_tag', 'product');
}
add_action('init', 'fwc_unregister_tags',1000);

/***************************/
/****** TITLES IN EDITOR ***/
/***************************/
// CHANGE TITLE FIELD TEXT FOR CPTs
add_filter( 'enter_title_here', 'hwp_enter_title_here' );
function hwp_enter_title_here( $title ){
    $screen = get_current_screen();
 

    if ( 'faq' == $screen->post_type ) {
        $title = 'Enter Question Here';
    }

    if ( 'video' == $screen->post_type ) {
        $title = 'Enter Video Title Here';
    }

    if ( 'slide' == $screen->post_type ) {
        $title = 'Enter Slide Headline Here';
    }

 
    return $title;
}


/***************************/
/******* SHORTCODES ********/
/***************************/
// FAQ SHORTCODE
// Usage: [faqs topic=admissions sortbycat=true]
add_shortcode('faqs', 'sf_display_faqs');
function sf_display_faqs( $atts, $content = null) {
    // ENQUEUE THE SCRIPT IN THE FOOTER WHEN THIS SHORTCODE IS PRESENT
    wp_enqueue_script( 'nested-accordion', 
        plugins_url( '/js/nested-accordion.js' , __FILE__ ),
        array( 'jquery' ),
        '',
        true );

    extract( shortcode_atts( array(
      'sortbycat'      => 'false',
      'cat'           => '', // title or slug of category
      //'hierarchical'    => 'false',
      ), $atts ) );


    // SHOW FAQS SORTED BY All TOPICS
    if($sortbycat == 'true' )  {
        $content .= '<div class="accordion" id="acc1">';
        $content .= '<p class="excol"></p>';

        if ( $cat !== '') {
            $catID = get_term_by( 'slug', $cat, 'faq_categories' );
           // echo 'catID=' . $catID->term_id;
            $args = array(
                //'child_of'      => $catID->term_id,
                // 'child_of'      => $catID->term_id,
                'orderby' => 'menu_order',
            );
        } else {
            $args = array(
                'orderby' => 'menu_order',
            );
        }
         

        $terms = get_terms('faq_categories', $args);
        if(!empty($terms)):
            foreach($terms as $i => $term):
                $content .= '<h2>' . $term->name . '<span class="icon"></span></h2>';
                $content .= '<div>';
                $faqs = get_posts('posts_per_page=-1&post_type=faq&faq_categories=' . $term->slug . '&orderby=menu_order&order=ASC');
                global $post;
                $temp = $post;

                if($faqs) :
                    foreach($faqs as $post) : setup_postdata($post);

                            $content .= '<h3 class="question">';
                            $content .= get_the_title();
                            $content .= '<span class="icon"></span></h3>';

                            $content .= '<div class="answer">';
                                $content .= wpautop( do_shortcode( get_the_content() ) );
                                $content .= '<a href="' . get_permalink() . '" class="permalink faq-link">Link to this FAQ</a>';
                            $content .= '</div>';

                    endforeach;
                endif;
                $post = $temp;
                $content .= '</div>';
            endforeach;
        endif;
        $content .= '</div>'; // .accordion
    // SHOW JUST DESIGNATED TOPIC, NOT SORTED
    } elseif($cat !== '')  {
        $content .= '<div class="accordion" id="acc1">';
        $content .= '<p class="excol"></p>';
            
            $content .= '<div>';
            $faqs = get_posts('posts_per_page=-1&post_type=faq&faq_categories=' . $cat . '&orderby=menu_order&order=ASC');
            //print_r($faqs);
            global $post;
            $temp = $post;

            if($faqs) :
                foreach($faqs as $post) : setup_postdata($post);
                    
                        $content .= '<h3 class="question">';
                        $content .= get_the_title();
                        $content .= '<span class="icon"></span></h3>';

                        $content .= '<div class="answer">';
                            $content .= wpautop( do_shortcode( get_the_content() ) );
                            $content .= '<a href="' . get_permalink() . '" class="permalink faq-link">Link to this FAQ</a>';
                        $content .= '</div>';
                    
                endforeach;
            endif;
            $post = $temp;
            $content .= '</div>';
               
        $content .= '</div>'; // .accordion
    } else {
    // SHOW ALL FAQS LISTED IN MENU ORDER
        $content .= '<div class="accordion" id="acc1">';
        $content .= '<p class="excol"></p>';
            $faqs = get_posts('posts_per_page=-1&post_type=faq&faq_categories=' . $cat . '&orderby=menu_order&order=ASC');
            global $post;
            $temp = $post;

            if($faqs) :
                foreach($faqs as $post) : setup_postdata($post);
                            
                                $content .= '<h3 class="question">';
                                $content .= get_the_title();
                                $content .= '<span class="icon"></span></h3>';

                                $content .= '<div class="answer">';
                                    $content .= wpautop( do_shortcode( get_the_content() ) );
                                    $content .= '<a href="' . get_permalink() . '" class="permalink faq-link">Link to this FAQ</a>';
                                $content .= '</div>';
                            
                        endforeach;
            endif;
            $post = $temp;
        $content .= '</div>'; // .accordion
    }
    // add initShow: ".new", to first args to show questions in each cat on load
     $content .= '<script type="text/javascript" language="javascript">
                            jQuery(document).ready(function($) {
                                
                                $("#main").accordion({
                                  objID: "#acc1", 
                                  obj: "div", 
                                  wrapper: "div", 
                                  el: ".h",
                                  elToWrap: "span,i",
                                  head: "h2, h3", 
                                  next: "div", 
                                  standardExpansible : false,
                                });

                                $("#main .accordion").expandAll({
                                      trigger: ".h", 
                                      ref: ".excol", 
                                      cllpsEl: "div.outer",
                                      speed: 200,
                                      oneSwitch : false,
                                      instantHide: true,
                                      expTxt : "Expand All",
                                      cllpsTxt : "Collapse All",
                                  });
                            });
                        </script>';
    return $content;
}

// create shortcode to display slider
// [slider title="Slider Name Here"]
// NOW USING SLICK INSTEAD OF FLEXSLIDER, SEE https://kenwheeler.github.io/slick/
//wp_register_style('slick', '//cdn.jsdelivr.net/jquery.slick/1.4.1/slick.css', false);
//wp_register_script('slickjs', '//cdn.jsdelivr.net/jquery.slick/1.4.1/slick.min.js', array('jquery'), true);

add_shortcode( 'slider', 'friendly_slick_slider_shortcode' );
function friendly_slick_slider_shortcode( $atts ) {
    ob_start();
 
    // define attributes and their defaults
    extract( shortcode_atts( array (
        'title' => 'Home Page Slider',
        'order' => 'asc',
        'orderby' => 'menu_order',
        'posts' => -1,
    ), $atts ) );
 
    // define query parameters based on attributes
    $options = array(
        'post_type' => 'slider',
        'name' => $title,
        'posts_per_page' => 1,
    );
   
    $featured_query = new WP_Query( $options );
    // run the loop based on the query
    if ( $featured_query->have_posts() ) { 
    	$output = '';
        $output .= '<span><script type="text/javascript" language="javascript">';
            $output .= 'jQuery(document).ready(function($) {';
            $output .= "$('.slick').slick({";
            	 $output .= "speed: 300,";
                    $output .= "infinite:true,";
                    $output .= "autoplay:true,";
                    $output .= "fade:true,";
                    $output .= "focusOnSelect:true,";
                    $output .= "autoplaySpeed:4000,";

               /* if ($displaytype == 'regular') {
                    $output .= "speed: 300,";
                    $output .= "infinite:true,";
                    $output .= "autoplay:true,";
                    $output .= "fade:true,";
                    $output .= "autoplaySpeed:4000,";
                } elseif ($displaytype == 'centerfeature') {
                   // $output .= "speed: 300,";
                    $output .= "centerMode: true,";
                    $output .= "adaptiveHeight: true,";
                    $output .= "centerPadding: '0px',";
                    $output .= "slidesToShow: 3,";
                    $output .= "slidesToScroll: 1,";
                    $output .= "infinite:true,";
                    //$output .= "variableWidth:true,";
                    $output .= "autoplay:true,";
                    //$output .= "fade:false,";
                    $output .= "autoplaySpeed:4000,";
                    
                }*/
            $output .= '});';
            $output .= '});';
            $output .= '</script></span>';
            $output .= wp_enqueue_style( 'slick' );
        $output .= wp_enqueue_script( 'slickjs' );

    	while ( $featured_query->have_posts() ) { 
         	$featured_query->the_post();

           // $fq_id = get_the_ID();

         	if ( function_exists('get_field') && get_field('slider_type') ) {
                $displaytype = get_field('slider_type');
            }
            
           
            

            //$output .= '<div class="slick slick-' . $fq_id . ' ' . $displaytype . '">';
           // $output .= '<ul class="slides">';
            
            // REGULAR SLIDER
            if (function_exists('get_field') && get_field('frames') ) {
                $output .= '<div class="slick slick-' . $fq_id . ' ' . $displaytype . '">';
                while(has_sub_field('frames')) {
                    $overlay_heading_text = get_sub_field('overlay_heading_text');
                    $overlay_smaller_text = get_sub_field('overlay_smaller_text');
                    $button_color = 'blue';
                    $button_text = get_sub_field('button_text');
                    $button_destination = get_sub_field('button_destination');
                    $slide_image = get_sub_field('slide_image');  
                    if ( !wp_is_mobile() ) {
                        $image_info =  wp_get_attachment_image_src( $slide_image, 'widescreen' );
                    } else {
                        $image_info =  wp_get_attachment_image_src( $slide_image, 'pagewidth' );
                    }


                    $output .= '<div>';
                        if ($button_destination) {
                            $output .= '<a href="' . $button_destination . '">';
                        }
                            //$output .= '<img alt="' . $overlay_heading_text . '" src="' . $image_info[0] . '" />';
                        	$output .= get_sub_field('video');
                        if ($button_destination) {
                            $output .= '</a>';
                        }
                    $output .= '<span class="overlay"><span>'; 
                        if ($overlay_heading_text) {
                            $output .= '<h3>' . $overlay_heading_text . '</h3>';    
                        }

                        if ($overlay_smaller_text) {
                            $output .= '<p>' . $overlay_smaller_text . '</p>';    
                        }
                        if ($button_destination && $button_text) {
                            $output .= '<a href="' . $button_destination . '" class="button ' . $button_color . '">' . $button_text . '</a>';

                        }
                    $output .= '</span></span></div>';
                    
                } //endwhile frames subfields
            } // regular subfields endif


             // FEATURED CONTENT SLIDER
            elseif (function_exists('get_field') && get_field('featured_content') ) {
                $featured_content = get_field('featured_content');
                $row_count = count($featured_content);
                $output .= '<div class="slick slick-' . $fq_id . ' ' . $displaytype . ' count-' . $row_count . '">';
               while ( has_sub_field('featured_content') ) {
               
                        $cover = get_sub_field('featured_image');
                        $headline = get_sub_field('headline');
                        $content = get_sub_field('copy');
                        $link = get_sub_field('link_to');
                        $button_text = get_sub_field('button_text');
                        $display_style = get_sub_field('display_style');

                        $attr = array(
                            'alt' =>  trim(strip_tags( $headline )),
                            );
                        $image = wp_get_attachment_image( $cover, 'thumbnail', $attr );
                        
                        $output .= '<div class="featured_book cf ' . $display_style . '">';
                            //$output .= '<div class="featured_book cf ' . $display_style . '">';
                            $output .= '<a href="' . $link . '">' . $image . '</a>';
                            
                            $output .= '<div class="text"><h3>' . $headline . '</h3>';
                            
                            if ($content) {
                               $output .= $content . ' <a class="button" href="' . $link . '">' . $button_text . '</a>';
                            }
                            $output .= '</div>';
                           // $output .= '</div>';
                        $output .= '</div>';
                   
                    
                } //endwhile featured_content subfields
            } // regular subfields endif
           
          $output .= '</div>';
            
		} // main slider query endwhile

    } // main slider query endif

    
    ob_get_clean();
    wp_reset_postdata();
    return $output;

}

// VIDEOS SHORTCODE
// Usage: [videos cat=admissions sortbycat=true]
add_shortcode('videos', 'sf_display_videos');
function sf_display_videos( $atts, $content = null) {

    extract( shortcode_atts( array(
      'sortbyuse'      => 'false',
      'use'           => '', // title or slug of category
      'camera'		=> '', // either specific camera or 'true' to show current camera's videos only
      //'hierarchical'    => 'false',
      ), $atts ) );


    // SHOW VIDEOS SORTED BY USES (automated if on tax archives, this is to force display of just one tag)
    if($sortbyuse == 'true' )  {
        $content .= '<div class="videos-list sortedbyuse">';
        //$catID = get_term_by( 'slug', $use, 'video_tags' );

        $args = array(
           // 'child_of'      => $catID->term_id,
           'order' => 'ASC', 
        ); 

        $terms = get_terms('video_tags', $args);
        if(!empty($terms)):
            foreach($terms as $i => $term):
                $content .= '<h2>' . $term->name . '<span class="icon"></span></h2>';
                $content .= '<div class="use-group">';
                $videos = get_posts('posts_per_page=-1&post_type=video&video_tags=' . $term->slug . '&orderby=menu_order&order=ASC');
                global $post;
                $temp = $post;

                if($videos) {
            	$count = 0;
            	$listedvid = 0;
                foreach($videos as $post) : setup_postdata($post);

                    $content .= '<div class="vid listedvid-' . $listedvid . '">';

                    $content .= '<a class="imglink play-button" rel="lightbox[gallery-mkm' . $count . ']" href="' . get_field('video_url',false,false) . '"><img src="' . get_video_thumbnail() . '" /></a>';
                    //$content .= '<span class="icon"></span></h3>';

                    $content .= '<span class="copy">';
                    	$content .= '<h6><a href="' . get_permalink() . '">' . get_the_title() . '</a></h6>';
                        //$content .= do_shortcode( get_field('video_description') );
                        //$content .= custom_taxonomies_terms_links();
                        if (function_exists('get_field') && get_field('related_cameras'))  {
                        	$content .= '<h6 class="taghead padtop">Camera Used</h6>';
	                    	$cameras = get_field('related_cameras');
	                    	foreach($cameras as $camera) {
	                    		$content .= '<a class="button blue" href="' . get_permalink($camera->ID) . '">' . get_the_title($camera->ID) . '</a>';
	                    	}

	                    }  
                        $content .= '</span>';
                    $content .= '</div>';
	                $listedvid++;
	            endforeach;
            }
            $post = $temp;
                $content .= '</div>';
            endforeach;
        endif;
        $content .= '</div>'; // .accordion
        wp_reset_postdata();
    // SHOW VIDEOS WITH DESIGNATED USE ONLY (automated if on tax archives, this is to force display of just one tag aka 'use')
    } elseif($use !== '')  {
        $content .= '<div class="videos-list unsorted">';
        	// get posts with the current taxonomy archive term; if we're anywhere eles, all videos will be shown
            $videos = get_posts('posts_per_page=-1&post_type=video&orderby=menu_order&order=ASC&video_tags='.$use);
            global $post;
            $temp = $post;

            if($videos) {
            	$count = 0;
            	$listedvid = 0;
                foreach($videos as $post) : setup_postdata($post);

                    $content .= '<div class="vid listedvid-' . $listedvid . '">';

                    $content .= '<a class="imglink play-button" rel="lightbox[gallery-mkm' . $count . ']" href="' . get_field('video_url',false,false) . '"><img src="' . get_video_thumbnail() . '" /></a>';
                    //$content .= '<span class="icon"></span></h3>';

                    $content .= '<span class="copy">';
                    	$content .= '<h6><a href="' . get_permalink() . '">' . get_the_title() . '</a></h6>';
                        //$content .= do_shortcode( get_field('video_description') );
                        $content .= custom_taxonomies_terms_links();
                        if (function_exists('get_field') && get_field('related_cameras'))  {
                        	$content .= '<h6 class="taghead padtop">Camera Used</h6>';
	                    	$cameras = get_field('related_cameras');
	                    	foreach($cameras as $camera) {
	                    		$content .= '<a class="button blue" href="' . get_permalink($camera->ID) . '">' . get_the_title($camera->ID) . '</a>';
	                    	}

	                    }  
                        $content .= '</span>';
                    $content .= '</div>';
	                $listedvid++;
	            endforeach;
            }
            $post = $temp;
        $content .= '</div>'; // .videos-list
        apply_filters('the_content', $content);
        wp_reset_postdata();
    } elseif ( $camera !== '' ) {
    // SHOW ALL VIDEOS FOR CURRENT OR LISTED CAMERA
    	if ($camera == 'current') {
    		$value = get_queried_object_id();
    	} /*else {
    		$camera_object = get_page_by_title($camera, null, 'product'); // title of camera
    		$value = $camera_object->ID;
    	} */
    	else {
    		$value = $camera; // camera= ID of camera product page
    	}
        $content .= '<div class="videos-list unsorted">';
        	$args = array(
	            'posts_per_page' => -1,
	            'post_type' => 'video',
	            'orderby' => 'menu_order',
	            'meta_query' => array(
					array(
						'key' => 'related_cameras', // name of custom field
						'value' => '"' . $value . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
						'compare' => 'LIKE'
					)
				)
	        ); 
        	// get posts with the current taxonomy archive term; if we're anywhere eles, all videos will be shown
            $videos = get_posts($args);
            global $post;
            $temp = $post;

            if($videos) {
            	$count = 0;
            	$listedvid = 0;
                foreach($videos as $post) : setup_postdata($post);

                    $content .= '<div class="vid listedvid-' . $listedvid . '">';

                    $content .= '<a class="imglink play-button" rel="lightbox[gallery-mkm' . $count . ']" href="' . get_field('video_url',false,false) . '"><img src="' . get_video_thumbnail() . '" /></a>';
                    //$content .= '<span class="icon"></span></h3>';

                    $content .= '<span class="copy">';
                    	$content .= '<h6><a href="' . get_permalink() . '">' . get_the_title() . '</a></h6>';
                        //$content .= do_shortcode( get_field('video_description') );
                        $content .= custom_taxonomies_terms_links();
                        $content .= '</span>';
                    $content .= '</div>';
	                $listedvid++;
	            endforeach;
            }
            $post = $temp;
        $content .= '</div>'; // .videos-list
        apply_filters('the_content', $content);
        wp_reset_postdata();
    } else {
    // SHOW ALL VIDEOS LISTED IN MENU ORDER
        $content .= '<div class="videos-list unsorted">';
        	$term = get_term_by( 'slug', get_query_var('term'), get_query_var('taxonomy') );
        	$args = array(
	            'posts_per_page' => -1,
	            'post_type' => 'video',
	            'orderby' => 'menu_order',
	            'video_tags' => $term->slug,
	        ); 
        	// get posts with the current taxonomy archive term; if we're anywhere eles, all videos will be shown
            $videos = get_posts($args);
            global $post;
            $temp = $post;

            if($videos) {
            	$count = 0;
            	$listedvid = 0;
                foreach($videos as $post) : setup_postdata($post);

                    $content .= '<div class="vid listedvid-' . $listedvid . '">';

                    $content .= '<a class="imglink play-button" rel="lightbox[gallery-mkm' . $count . ']" href="' . get_field('video_url',false,false) . '"><img src="' . get_video_thumbnail() . '" /></a>';
                    //$content .= '<span class="icon"></span></h3>';

                    $content .= '<span class="copy">';
                    	$content .= '<h6><a href="' . get_permalink() . '">' . get_the_title() . '</a></h6>';
                        //$content .= do_shortcode( get_field('video_description') );
                        $content .= custom_taxonomies_terms_links();
                        if (function_exists('get_field') && get_field('related_cameras'))  {
                        	$content .= '<h6 class="taghead padtop">Camera Used</h6>';
	                    	$cameras = get_field('related_cameras');
	                    	foreach($cameras as $camera) {
	                    		$content .= '<a class="button blue" href="' . get_permalink($camera->ID) . '">' . get_the_title($camera->ID) . '</a>';
	                    	}

	                    }  
                        $content .= '</span>';
                    $content .= '</div>';
	                $listedvid++;
	            endforeach;
            }
            $post = $temp;
        $content .= '</div>'; // .videos-list
        apply_filters('the_content', $content);
        wp_reset_postdata();
    }
   $count++;
    return $content;
}

function custom_field_excerpt($text) {
	global $post;
	if ( '' != $text ) {
		$text = strip_shortcodes( $text );
		$text = apply_filters('the_content', $text);
		$text = str_replace(']]>', ']]>', $text);
		$excerpt_length = 30; // 30 words
		$excerpt_more = apply_filters('excerpt_more', ' ' . '...');
		$text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
	}
	return apply_filters('the_excerpt', $text);
}

// DISPLAY LIST OF TAXONOMY TERMS/IMAGES
// Add a shortcode that executes our function [list_terms cat="xx"]
add_shortcode( 'terms_list', 'terms_list_custom_taxonomy' );
function terms_list_custom_taxonomy( $atts ) {

// Inside the function we extract custom taxonomy parameter of our shortcode

	extract( shortcode_atts( array(
		'cat' => '',
	), $atts ) );

	// arguments for function wp_list_categories
	$args = array( 
		'taxonomy' => $cat,
		'title_li' => '',
		'orderby' => 'name',
  		'order' => 'ASC'
	);
	ob_start();
	$categories = get_categories($args);
	$list .= '<ul class="term-images">';
	  foreach($categories as $category) { 
		  	if (function_exists('get_field') && get_field('image', $cat . '_' . $category->term_id)) {
		  		$image_url = get_field('image', $cat . '_' . $category->term_id);
		  	} else {
		  		$image_url = '';
		  	}
		    $list .= '<li class="' . $category->slug . '"><a href="' . get_term_link($category->slug, $cat) . '" title="' . $category->name . ' : ' . $category->description . ' ">';
		    if ($image_url) {
		    	$list .= '<img src="' . $image_url . '" alt="' . $category->name . '" />';
		    } else {
		    	$list .= '<h4><span>' . $category->name . '</span></h4>';
		    }
		    $list .= '</a> </li> ';
		} 
	$list .= '</ul>';	

	ob_get_clean();
	return $list;
}

// create shortcode with parameters so that the user can define what's queried - default is to list all blog posts
add_shortcode( 'list-posts', 'friendly_list_posts_shortcode' );
function friendly_list_posts_shortcode( $atts ) {
    ob_start();
 
    // define attributes and their defaults
    extract( shortcode_atts( array (
        'type' => 'post',
        'order' => 'asc',
        'orderby' => 'menu_order',
        'posts' => -1,
        'category' => '',
    ), $atts ) );
 
    // define query parameters based on attributes
    $options = array(
        'post_type' => $type,
        'order' => $order,
        'orderby' => $orderby,
        'posts_per_page' => $posts,
        'category_name' => $category,
    );
    $query = new WP_Query( $options );
    // run the loop based on the query
    if ( $query->have_posts() ) { ?>
        	<?php while ( $query->have_posts() ) { 
        		$query->the_post();  ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article">
					<?php include(locate_template('content-listing.php')); ?>
				</article>
			<?php } ?>
    <?php
        $myvariable = ob_get_clean();
        return $myvariable;
    }
}

//Allow Text widgets to execute shortcodes
add_filter('widget_text', 'do_shortcode');



// get taxonomies terms links
function custom_taxonomies_terms_links(){
  // get post by post id
  $post = get_post( $post->ID );

  // get post type by post
  $post_type = $post->post_type;

  // get post type taxonomies
  $taxonomies = get_object_taxonomies( $post_type, 'objects' );

  $out = array();
  foreach ( $taxonomies as $taxonomy_slug => $taxonomy ){

    // get the terms related to post
    $terms = get_the_terms( $post->ID, $taxonomy_slug );

    if ( !empty( $terms ) ) {
      $out[] = "<h6 class='taghead'>" . $taxonomy->label . "</h6>\n";
      foreach ( $terms as $term ) {
        $out[] =
          '  <a class="button orange" href="'
        .    get_term_link( $term->slug, $taxonomy_slug ) .'">'
        .    $term->name
        . "</a>\n";
      }
      $out[] = "\n";
    }
  }

  return implode('', $out );
}

//* Create a [show_search] shortcode for displaying search box
add_shortcode('show_search', 'display_search');
function display_search($atts) {

	ob_start();
		echo '<div class="search-in-page widget-search">';
		get_search_form();
		echo '</div>';
	return ob_get_clean();

}

// TERM LIST DISPLAYING ALL TERMS BY TAXONOMY
add_shortcode('display_terms', 'display_terms');
function display_terms($atts) {
	 // define attributes and their defaults
    extract( shortcode_atts( array (
        'tax' => '',
        'order' => 'asc',
        'orderby' => 'menu_order',
    ), $atts ) );

	$args = array( 'orderby=' . $orderby . '&order=' . $order );

	$terms = get_terms( $tax, $args );
	if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
		ob_start();
	    $count = count( $terms );
	    $i = 0;
	    $display = '<ul class="prod-tags">';
	    foreach ( $terms as $term ) {
	       $term_name = $term->name;
			$term_slug = $term->slug;
			$term_link = get_term_link( $term );
			$term_description = $term->description;
			$display .= '<li class="' . $tax . '"><a href="' . $term_link . '"';
			if ($term_description) {
				$display .= ' data-tooltip="' . $term_description . '"';
			}
			$display .= '>' . $term_name . '</a></li>';
	    }
	    $display .= '</ul>';
	    echo $display;
	    return ob_get_clean();
	}
}

//* Create a [show_terms tax="group_info"] shortcode for displaying terms from a specific taxonomy
add_shortcode('show_terms', 'old_display_terms');
function old_display_terms($atts) {
	 // define attributes and their defaults
    extract( shortcode_atts( array (
        'tax' => '',
        'order' => 'asc',
        'orderby' => 'menu_order',
    ), $atts ) );

	$args = array( 'orderby=' . $orderby . '&order=' . $order );

	$terms = get_terms( $tax, $args );
	if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
		ob_start();
	    $count = count( $terms );
	    $i = 0;
	    $term_list = '<ul class="term-list">';
	    foreach ( $terms as $term ) {
	        $i++;
	    	$term_list .= '<li><a href="' . get_term_link( $term ) . '" title="' . sprintf( __( 'View all post filed under %s', 'my_localization_domain' ), $term->name ) . '">' . $term->name . '</a>';
	    	if ( $count != $i ) {
	            $term_list .= '</li>';
	        }
	        else {
	            $term_list .= '</li></ul>';
	        }
	    }
	    echo $term_list;
	    return ob_get_clean();

	}
}

if( function_exists('register_field_group') ):
register_field_group(array (
	'key' => 'group_53dbec696f645',
	'title' => 'Copyright & Address',
	'fields' => array (
		array (
			'key' => 'field_53dbec7722c18',
			'label' => 'Copyrighted to:',
			'name' => 'copyrighted',
			'prefix' => '',
			'type' => 'text',
			'instructions' => 'Name of the entity this site is copyrighted by, for instance <strong>My Company Name, LLC</strong>. This will appear in the footer along with the current year.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_53dbece922c19',
			'label' => 'Street Address',
			'name' => 'street_address',
			'prefix' => '',
			'type' => 'text',
			'instructions' => 'Street or PO Box address for footer',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_53dbed0522c1a',
			'label' => 'City',
			'name' => 'city',
			'prefix' => '',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_53dbed0c22c1b',
			'label' => 'State',
			'name' => 'state',
			'prefix' => '',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_53dbed1122c1c',
			'label' => 'ZIP',
			'name' => 'zip',
			'prefix' => '',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_53dbed1b6f3fe',
			'label' => 'Phone',
			'name' => 'phone',
			'prefix' => '',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_53dbed596f400',
			'label' => 'Contact Email',
			'name' => 'contact_email',
			'prefix' => '',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_53dbed216f3ff',
			'label' => 'Contact Page Link',
			'name' => 'contact_page_link',
			'prefix' => '',
			'type' => 'page_link',
			'instructions' => 'Link to the contact page',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'post_type' => array (
				0 => 'page',
			),
			'taxonomy' => '',
			'allow_null' => 0,
			'multiple' => 0,
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'acf-options-copyright-address',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'seamless',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => array (
		0 => 'permalink',
		1 => 'the_content',
		2 => 'excerpt',
		3 => 'custom_fields',
		4 => 'discussion',
		5 => 'comments',
		6 => 'revisions',
		7 => 'slug',
		8 => 'author',
		9 => 'format',
		10 => 'page_attributes',
		11 => 'featured_image',
		12 => 'categories',
		13 => 'tags',
		14 => 'send-trackbacks',
	),
));

endif;

// PARSE URLS YOUTUBE VIDEO 
function mkm_parse_url($url, $part) {
	//$playlist = 'http://www.youtube.com/watch?v=A7izsd5IXq8&playnext=1&list=PL6753173C0F0BE9ED';
	$parsed_url = parse_url($url);
	parse_str($parsed_url['query'],$q);
	$url_part = $q[$part];
	return $url_part; 
}

// TERM LIST FOR PRODUCT OPTIONS
function display_options($option_name) {
	$options = get_the_terms($product->ID, $option_name);
	if ( $options &&  !is_wp_error( $options )) {
		$option_links = array();
		
		foreach ($options as $term) {
			//$option_links[] = $option->name;
			$term_name = $term->name;
			$term_slug = $term->slug;
			$term_link = get_term_link($term->slug, $option_name);
			$term_description = $term->description;
			$display .= '<li class="' . $option_name . '"><a href="' . $term_link . '"';
			if ($term_description) {
				$display .= ' data-tooltip="' . $term_description . '"';
			}
			$display .= '>' . $term_name . '</a></li>';
		}

	}
	return $display;
}

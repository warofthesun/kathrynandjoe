<?php

// Flush rewrite rules for custom post types
add_action( 'after_switch_theme', 'starter_flush_rewrite_rules' );

// Flush your rewrite rules
function starter_flush_rewrite_rules() {
	flush_rewrite_rules();
}

// let's create the function for the custom type
function custom_post() {
	// creating (registering) the custom type
	register_post_type( 'custom_type', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		// let's now add all the options for this post type
		array( 'labels' => array(
			'name' => __( 'Custom Types', 'startertheme' ), /* This is the Title of the Group */
			'singular_name' => __( 'Custom Post', 'startertheme' ), /* This is the individual type */
			'all_items' => __( 'All Custom Posts', 'startertheme' ), /* the all items menu item */
			'add_new' => __( 'Add New', 'startertheme' ), /* The add new menu item */
			'add_new_item' => __( 'Add New Custom Type', 'startertheme' ), /* Add New Display Title */
			'edit' => __( 'Edit', 'startertheme' ), /* Edit Dialog */
			'edit_item' => __( 'Edit Post Types', 'startertheme' ), /* Edit Display Title */
			'new_item' => __( 'New Post Type', 'startertheme' ), /* New Display Title */
			'view_item' => __( 'View Post Type', 'startertheme' ), /* View Display Title */
			'search_items' => __( 'Search Post Type', 'startertheme' ), /* Search Custom Type Title */
			'not_found' =>  __( 'Nothing found in the Database.', 'startertheme' ), /* This displays if there are no entries yet */
			'not_found_in_trash' => __( 'Nothing found in Trash', 'startertheme' ), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'This is the example custom post type', 'startertheme' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */
			'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'custom_type', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'custom_type', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky')
		) /* end of options */
	); /* end of register post type */

	/* this adds your post categories to your custom post type */
	register_taxonomy_for_object_type( 'category', 'custom_type' );
	/* this adds your post tags to your custom post type */
	register_taxonomy_for_object_type( 'post_tag', 'custom_type' );

}

	// adding the function to the Wordpress init
	add_action( 'init', 'custom_post');

	/*
	for more information on taxonomies, go here:
	http://codex.wordpress.org/Function_Reference/register_taxonomy
	*/

	// now let's add custom categories (these act like categories)
	register_taxonomy( 'custom_cat',
		array('custom_type'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
		array('hierarchical' => true,     /* if this is true, it acts like categories */
			'labels' => array(
				'name' => __( 'Custom Categories', 'startertheme' ), /* name of the custom taxonomy */
				'singular_name' => __( 'Custom Category', 'startertheme' ), /* single taxonomy name */
				'search_items' =>  __( 'Search Custom Categories', 'startertheme' ), /* search title for taxomony */
				'all_items' => __( 'All Custom Categories', 'startertheme' ), /* all title for taxonomies */
				'parent_item' => __( 'Parent Custom Category', 'startertheme' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'Parent Custom Category:', 'startertheme' ), /* parent taxonomy title */
				'edit_item' => __( 'Edit Custom Category', 'startertheme' ), /* edit custom taxonomy title */
				'update_item' => __( 'Update Custom Category', 'startertheme' ), /* update title for taxonomy */
				'add_new_item' => __( 'Add New Custom Category', 'startertheme' ), /* add new title for taxonomy */
				'new_item_name' => __( 'New Custom Category Name', 'startertheme' ) /* name title for taxonomy */
			),
			'show_admin_column' => true,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'custom-slug' ),
		)
	);

	// now let's add custom tags (these act like categories)
	register_taxonomy( 'custom_tag',
		array('custom_type'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
		array('hierarchical' => false,    /* if this is false, it acts like tags */
			'labels' => array(
				'name' => __( 'Custom Tags', 'startertheme' ), /* name of the custom taxonomy */
				'singular_name' => __( 'Custom Tag', 'startertheme' ), /* single taxonomy name */
				'search_items' =>  __( 'Search Custom Tags', 'startertheme' ), /* search title for taxomony */
				'all_items' => __( 'All Custom Tags', 'startertheme' ), /* all title for taxonomies */
				'parent_item' => __( 'Parent Custom Tag', 'startertheme' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'Parent Custom Tag:', 'startertheme' ), /* parent taxonomy title */
				'edit_item' => __( 'Edit Custom Tag', 'startertheme' ), /* edit custom taxonomy title */
				'update_item' => __( 'Update Custom Tag', 'startertheme' ), /* update title for taxonomy */
				'add_new_item' => __( 'Add New Custom Tag', 'startertheme' ), /* add new title for taxonomy */
				'new_item_name' => __( 'New Custom Tag Name', 'startertheme' ) /* name title for taxonomy */
			),
			'show_admin_column' => true,
			'show_ui' => true,
			'query_var' => true,
		)
	);




?>

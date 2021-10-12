<?php

register_taxonomy('teams_cat', array( 'team' ), array(
    'label' => __( 'Teams Taxonomy', 'west'),
    'labels' => array(
        'name' => __( 'Teams Categoties', 'west'),
        'singular_name' => __( 'Teams Category', 'west'),
        'search_items' => __('Search Teams Category', 'west'),
        'all_items' => __('All Teams Categories', 'west'),
        'parent_item' => __('Parent Teams Category', 'west'),
        'parent_item_colon' => __('Parent Teams Category', 'west'),
        'edit_item' => __('Edit Teams Category', 'west'),
        'update_item' => __('Update Teams Category', 'west'),
        'add_new_item' => __('Add Teams Category', 'west'),
        'new_item_name' => __('New Teams Category', 'west'),
        'menu_name' => __( 'Teams Category', 'west'),
    ),
    'description' => __( 'Teams Categories', 'west'),
    'public' => true,
    'show_in_nav_menus' => true,
    'show_ui' => true,
    'show_tagcloud' => true,
    'hierarchical' => true,
    'rewrite'               => array( 'slug'=>'team_cats', 'hierarchical'=>false, 'with_front'=>false, 'feed'=>false ),
    'show_admin_column' => true,
));



register_post_type('team' , array(
    'label' => __( 'teams', 'west' ),
    'labels' => array(
        'name' => __( 'teams', 'west' ),
        'singular_name' => __( 'team', 'west' ),
        'menu_name' => __( 'Team Members', 'west' ),
        'all_items' => __( 'All Team Members', 'west' ),
        'add_new' => __( 'Add Team Member', 'west' ),
        'add_new_item' => __('Add New Member', 'west' ),
        'edit' => __( 'Edit Team Member', 'west' ),
        'edit_item' => __( 'Edit Team Memeber', 'west' ),
        'new_item' => __( 'New Team Memeber', 'west' ),
    ),
    'description' => '',
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_rest' => false,
    'rest_base' => '',
    'show_in_menu' => true,
    'exclude_from_search' => false,
    'capability_type' => array( 'team', 'teams' ),
    'map_meta_cap' => false,
    'capabilities' => array(
        'publish_posts' => 'publish_teams',
        'edit_posts' => 'edit_teams',
        'edit_others_posts' => 'edit_others_teams',
        'edit_published_posts' => 'edit_published_teams',
        'delete_posts' => 'delete_teams',
        'delete_others_posts' => 'delete_others_teams',
        'read_private_posts' => 'read_private_teams',
        'edit_post' => 'edit_team',
        'delete_post' => 'delete_team',
        'read_post' => 'read_team',
    ),
    'hierarchical' => true,
    'rewrite' => array( 'slug' => 'team', 'with_front' => true, 'pages' => true, 'feeds' => false, 'feed' => false ),
    'has_archive' => 'teams',
    'query_var' => true,
    'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'author' ),
    'taxonomies' => array( 'teams_cat' ),
));


register_post_type('slider' , array(
    'label' => __( 'Sliders', 'west' ),
    'labels' => array(
        'name' => __( 'Sliders', 'west' ),
        'singular_name' => __( 'slider', 'west' ),
        'menu_name' => __( 'Sliders', 'west' ),
        'all_items' => __( 'All Sliders', 'west' ),
        'add_new' => __( 'Add Slider', 'west' ),
        'add_new_item' => __('Add Slider', 'west' ),
        'edit' => __( 'Edit Slider', 'west' ),
        'edit_item' => __( 'Edit Slider', 'west' ),
        'new_item' => __( 'New Slider', 'west' ),
    ),
    'description' => '',
    'public' =>false,
    'publicly_queryable' => false,
    'show_ui' => true,
    'show_in_rest' => false,
    'rest_base' => '',
    'show_in_menu' => true,
    'exclude_from_search' => true,
    'capability_type' => array( 'slider', 'sliders' ),
    'map_meta_cap' => false,
    'capabilities' => array(
        'publish_posts' => 'publish_sliders',
        'edit_posts' => 'edit_sliders',
        'edit_others_posts' => 'edit_others_sliders',
        'edit_published_posts' => 'edit_published_sliders',
        'delete_posts' => 'delete_sliders',
        'delete_others_posts' => 'delete_others_sliders',
        'read_private_posts' => 'read_private_sliders',
        'edit_post' => 'edit_slider',
        'delete_post' => 'delete_slider',
        'read_post' => 'read_slider',
    ),
    'hierarchical' => true,
    'supports' => array( 'title', 'editor' )
));


/*add_rewrite_rule( '^ru/blog/(.+)/page/(.+)/?$', 'index.php?category_name=$matches[1]&paged=$matches[2]&lang=ru', 'top' );
add_rewrite_rule( '^blog/(.+)/page/(.+)/?$', 'index.php?category_name=$matches[1]&paged=$matches[2]', 'top' );
add_rewrite_rule( '^ru/blog/(.+)/(.+)/?$', 'index.php?name=$matches[2]&lang=ru', 'top' );
add_rewrite_rule( '^blog/(.+)/(.+)/?$', 'index.php?name=$matches[2]', 'top' );
add_rewrite_rule( '^blog/(.+)/?$', 'index.php?category_name=$matches[1]', 'top' );*/
//flush_rewrite_rules();

remove_post_type_support( $post_type = 'team', $supports = 'revisions' );

add_theme_support( 'responsive-embeds' );


add_action( 'admin_init', function() {

    $role = get_role( 'administrator' );
    $role->add_cap( 'publish_teams' );
    $role->add_cap( 'edit_teams' );
    $role->add_cap( 'edit_others_teams' );
    $role->add_cap( 'edit_published_teams' );
    $role->add_cap( 'delete_teams' );
    $role->add_cap( 'delete_private_teams' );
    $role->add_cap( 'delete_others_teams' );
    $role->add_cap( 'read_private_teams' );
    $role->add_cap( 'edit_team' );
    $role->add_cap( 'delete_team' );
    $role->add_cap( 'read_team' );

    $role = get_role( 'administrator' );
    $role->add_cap( 'publish_sliders' );
    $role->add_cap( 'edit_sliders' );
    $role->add_cap( 'edit_others_sliders' );
    $role->add_cap( 'edit_published_sliders' );
    $role->add_cap( 'delete_sliders' );
    $role->add_cap( 'delete_private_sliders' );
    $role->add_cap( 'delete_others_sliders' );
    $role->add_cap( 'read_private_sliders' );
    $role->add_cap( 'edit_slider' );
    $role->add_cap( 'delete_slider' );
    $role->add_cap( 'read_slider' );

}, 99 );

<?php
/*
 *  Author: Vadim
 *  Custom functions, support, custom post types and more.
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


/*------------------------------------*\
	Functions
\*------------------------------------*/

add_action( 'init', 'WEST_THEME::init' );

class WEST_THEME
{

    static function init()
    {

        require_once( 'inc/shortcodes.php' );
        require_once( 'inc/service.php' );
        require_once( 'inc/cpt.php' );

        if (function_exists('add_theme_support')) {

            add_theme_support('menus');
            add_theme_support('widgets');
            //add_theme_support( 'title-tag' );

            add_theme_support('post-thumbnails');
            add_image_size('post_archive', 380, 240, true );
            add_image_size('team_archive', 380, 470, true );
            add_image_size('post_widget', 120, 80, true );

            load_theme_textdomain( 'udft', get_template_directory() . '/languages' );
        }

        add_filter('widget_text', 'do_shortcode');


        if ( ! is_admin() ) {

            wp_enqueue_style('app_css', get_template_directory_uri() . '/assets/css/app.css');

            wp_register_script('custom_js', get_template_directory_uri() . '/assets/js/app.js', array(), false, true);
            wp_enqueue_script('custom_js');
        }


        register_nav_menus(array(
            'header-location' => 'Top Memu',
        ));

        add_action( 'wp_enqueue_scripts', array( 'WEST_THEME', 'add_ajax_data' ), 99 );
        add_filter( 'body_class', array( 'WEST_THEME', 'bodyClass' ), 99 );

        add_post_type_support( 'page', 'excerpt' );

    }


    static function add_ajax_data()
    {
        wp_localize_script('custom_js', 'ajaxdata',
            array(
                'ajaxurl' => admin_url('admin-ajax.php'),
            )
        );
    }


    static function get_template_part( $template, $part_name = null, $mode = 'return', $data = array() )
    {
        if ($mode == 'return') {
            ob_start();
            get_template_part( $template, $part_name, $data );
            $out = ob_get_contents();
            ob_end_clean();

            return $out;
        } else {
            get_template_part( $template, $part_name, $data );
        }
    }


    static function bodyClass( $classes ) {
        global $post;

        if ( is_singular( 'page' ) ) {
            $classes[] = 'page-' . strtolower( get_the_title( $post->ID ) );
        }

        return $classes;
    }

}













<?php

function west_get_slider( $atts ) {

    $slider_name = is_array( $atts ) ? $atts['name'] : $atts;

    $out = $nav = '';
    $slider = get_page_by_title( $slider_name, OBJECT, 'slider' );
    if ( is_object( $slider ) ) {
        $out .= '<div class="west-slider top-slider swiper"><div class="swiper-wrapper">';
        $nav = '<div class="west-slider__nav-box">';
        $items = get_field( 'slider_item', $slider->ID );
        foreach( $items as $i => $item ) {
            $out .=
                '<div class="west-slider__item-box swiper-slide">
                    <img src="' . $item['image'] . '" />
                    <div class="west-slider__item-background"></div>
                    <div class="west-slider__item">
                        <div class="west-slider__item-content-box">
                            <div class="west-slider__item-title">' . $item['title'] . '</div>
                            <div class="west-slider__item-subtitle">' . $item['subtitle'] . '</div>
                            <a class="west__button slider__item-button" href="' . $item['button_link']['url'] . '">' . $item['button_link']['title'] . '</a>
                        </div>
                    </div>
                </div>';
            $nav .= '<div class="west-slider__nav-item"><div class="west-slider__nav-item-content"><div class="west-slider__nav-item__number">0' . ( $i+1 ) . '</div><div class="west-slider__nav-item__content">' . $item['navigation_caption'] . '</div></div></div>';
        }
        $nav .= '</div>';
        $out .= '</div>';
        $out .= $nav;
        $out .= '</div>';
    }

    return $out;

}

add_shortcode( 'west_get_slider', 'west_get_slider' );

function west_get_section_heading ( $atts ) {
    $atts = shortcode_atts( array(
        'title' => '',
        'subtitle' => '',
        'description' => ''
    ), $atts );

    $description = ( $atts['description'] && $atts['description'] != '' ) ? '<div class="section-description">' . $atts['description'] . '</div>' : '';

    $out =
        '<div class="section-heading">
            <div class="section-title">' . $atts['title'] . '</div>
            <h2 class="section-subtitle">' . $atts['subtitle'] . '</h2>
            <div class="section-decor"></div>' .
            $description .
        '</div>';

    return $out;
}

add_shortcode( 'get_section_heading', 'west_get_section_heading' );


function west_get_post_type_block( $atts ) {
    $atts = shortcode_atts( array(
        'post_type' => 'post',
        'ppp' => 3,
    ), $atts );
    return WEST_THEME::get_template_part( 'templates/archive-general', null, 'return', array( 'post_type' => $atts['post_type'], 'ppp' => $atts['ppp'] ) );
}

add_shortcode( 'get_post_type_block', 'west_get_post_type_block' );


function west_get_last_posts( $atts ) {
    $atts = shortcode_atts( array(
        'post_type' => 'post',
        'ppp' => 3,
        'template' => 'templates/single-widget-post'
    ), $atts );
    $query = new WP_Query( array( 'post_type' => $atts['post_type'], 'posts_per_page' => $atts['ppp'] ) );

    $out = '';
    if ( count( $query->posts ) > 0 ) {
        $out = '<div class="blog-widget">';
        foreach ( $query->posts as $p ) {
            $out .= WEST_THEME::get_template_part( $atts['template'], null, 'return', array( 'post' => $p ) );
        }
        $out .= '</div>';
    }

    return $out;

}

add_shortcode( 'get_last_posts', 'west_get_last_posts' );
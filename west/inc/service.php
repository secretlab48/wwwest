<?php

add_filter('upload_mimes', 'kmwp_mime_types');

function kmwp_mime_types( $mimes ) {

    $mimes['svg'] = 'image/svg+xml';
    return $mimes;

}

add_filter( 'wp_revisions_to_keep', function( $num, $post ) {
    if ( post_type_supports( $post->post_type, 'revisions' ) )
        $num = 0;

    return $num;

}, PHP_INT_MAX, 2 );

function west_load_theme_textdomain() {
    load_theme_textdomain( 'west', get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'west_load_theme_textdomain' );

if ( ! function_exists( 'wes_paging_nav' ) ) :
    function west_paging_nav() {
        global $wp_query;
        
        if ( $wp_query->max_num_pages < 2 ) {
            return;
        }
        ?>
        <nav class="navigation paging-navigation" role="navigation">
            <h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'west' ); ?></h1>
            <div class="nav-links">

                <?php if ( get_next_posts_link() ) : ?>
                    <div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'west' ) ); ?></div>
                <?php endif; ?>

                <?php if ( get_previous_posts_link() ) : ?>
                    <div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'west' ) ); ?></div>
                <?php endif; ?>

            </div>
        </nav>
        <?php
    }
endif;

if ( ! function_exists( 'west_entry_meta' ) ) :
    function west_entry_meta() {
        if ( is_sticky() && is_home() && ! is_paged() ) {
            echo '<span class="featured-post">' . esc_html__( 'Sticky', 'west' ) . '</span>';
        }

        if ( ! has_post_format( 'link' ) && 'post' === get_post_type() ) {
            west_entry_date();
        }

        $categories_list = get_the_category_list( __( ', ', 'west' ) );
        if ( $categories_list ) {
            echo '<span class="categories-links">' . $categories_list . '</span>';
        }

        /* translators: Used between list items, there is a space after the comma. */
        $tags_list = get_the_tag_list( '', __( ', ', 'west' ) );
        if ( $tags_list && ! is_wp_error( $tags_list ) ) {
            echo '<span class="tags-links">' . $tags_list . '</span>';
        }

        // Post author.
        if ( 'post' === get_post_type() ) {
            printf(
                '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
                esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
                /* translators: %s: Author display name. */
                esc_attr( sprintf( __( 'View all posts by %s', 'west' ), get_the_author() ) ),
                get_the_author()
            );
        }
    }
endif;


if ( ! function_exists( 'west_entry_date' ) ) :
    function west_entry_date( $echo = true ) {
        if ( has_post_format( array( 'chat', 'status' ) ) ) {
            /* translators: 1: Post format name, 2: Date. */
            $format_prefix = _x( '%1$s on %2$s', '1: post format name. 2: date', 'west' );
        } else {
            $format_prefix = '%2$s';
        }

        $date = sprintf(
            '<span class="date"><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a></span>',
            esc_url( get_permalink() ),
            /* translators: %s: Post title. */
            esc_attr( sprintf( __( 'Permalink to %s', 'west' ), the_title_attribute( 'echo=0' ) ) ),
            esc_attr( get_the_date( 'c' ) ),
            esc_html( sprintf( $format_prefix, get_post_format_string( get_post_format() ), get_the_date() ) )
        );

        if ( $echo ) {
            echo $date;
        }

        return $date;
    }
endif;




add_filter( 'template_include', function( $template ) {

    global $wp_query, $post;

    if ( is_singular( 'page' ) ) {
        $id_en = apply_filters( 'wpml_object_id', $post->ID, get_post_type(), true, 'en' );
        if ( $id_en == 146 ) {
            $template = get_stylesheet_directory() . '/assets/templates/page-about.php';
        }
    }

    return str_replace( array( 'category.php', 'search.php' ), 'index.php', $template );

} );
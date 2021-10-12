<?php
    global $wp_query;
    $queried_objec_name = isset( $args['post_type'] ) ? $args['post_type'] : get_queried_object()->name;
    $current_post_type = ( $queried_objec_name == '' ) ? 'post' : $queried_objec_name;
    $base = $current_post_type != 'team' ? 'blog' : $current_post_type . 's';
    $ppp = isset( $args['ppp'] ) ? $args['ppp'] : get_option( 'posts_per_page' );
    preg_match( '/page\/(\d+)/', $_SERVER['REQUEST_URI'], $page );
    $offset = isset( $page[1] ) ? $page[1] : 1;
    $save_query = $wp_query;
    $query = new WP_Query( array( 'post_type' => $current_post_type, 'posts_per_page' => $ppp, 'paged' => $offset ) );
    $wp_query = $query;

    if (have_posts()): ?>
        <div class="container">
            <div class="row">
                <?php while (have_posts()) : the_post(); ?>
                    <?php get_template_part( 'templates/single-archive-' . $current_post_type ); ?>
                <?php endwhile; ?>
                <?php
                    if ( ! isset( $args['ppp'] ) ) {
                        $site_url = get_site_url();
                        $pagination = WEST_THEME::get_template_part('pagination', null, 'return', array('base' => $site_url . '/' . $base . '/'));
                        $pagination = preg_replace('/' . str_replace('://', '...', $site_url) . '(.+)?\/page\/(\d+)\/?/', $site_url . "/$base/page/$2", $pagination);
                        echo $pagination;
                    }
                    else {
                        if ( $query->post_count < $query->found_posts ) {
                            $archive_link = ( $current_post_type == 'post' ) ? get_site_url() . '/blog' : get_post_type_archive_link( $current_post_type );
                            echo '<div class="post-type-archive-link"><a href="' . $archive_link . '">View all ' . $current_post_type . 's</a>';
                        }
                    }
                ?>
            </div>
        </div>
    <?php else: ?>
    <article>
        <h2><?php _e( 'Sorry, nothing to display.', 'tpl' ); ?></h2>
    </article>
    <?php endif; ?>

    <?php $wp_query = $save_query; ?>


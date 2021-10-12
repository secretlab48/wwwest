<?php
    global $post;
    $meta_data = get_fields( $post->ID );
    $thumbnail = get_the_post_thumbnail( $post->ID, 'team_archive');
    $socials_block = '';
    if ( isset( $meta_data['socials'] ) && count( $meta_data['socials'] ) ) {
        $socials_block = '<div class="team-archive-item__socials">';
        foreach ( $meta_data['socials'] as $social => $link ) {
            if ( $link != '' ) {
                $socials_block .= '<a class="team-archive-item__social fa fa-' . $social . '" href="' . $link . '"></a>';
            }
        }
        $socials_block .= '</div>';
    }

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'team-archive-item-box col-lg-4 col-md-6 col-sm-12' ); ?>>
    <div class="team-archive-item__header">
        <div class="team-archive-item__background"></div>
        <div class="team-archive-item__img-box">
            <?php echo $thumbnail; ?>
            <div class="team-archive-item__hover"></div>
            <?php echo $socials_block; ?>
        </div>
    </div>
    <div class="post-archive-item__content">
        <h3><a class="post-link" href="<?php echo get_permalink( $post->ID ); ?>"><?php echo get_the_title( $post); ?></a></h3>
        <div class="post-archive-item__excerpt"><?php echo get_the_excerpt( $post ); ?></div>
    </div>
</article>
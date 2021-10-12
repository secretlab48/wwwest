<?php
    global $post;
    $meta_data = get_fields( $post->ID );
    $meta_block =
        '<div class="post-archive-item__meta">
            <div class="post-archive-items__meta-item views"><img src="' . get_template_directory_uri() . '/assets/img/eye.png" / width="20" height="12"><span>' . $meta_data['views_qnt'] . '</span></div>
            <div class="post-archive-items__meta-item commentss"><img src="' . get_template_directory_uri() . '/assets/img/comments.png" width="16" height="15"/><span>' . $meta_data['comments_qnt'] . '</span></div>
        </div>';
    $thumbnail = get_the_post_thumbnail( $post->ID, 'post_archive');
    $date = explode( ' ' , get_the_date( 'd M', $post->ID ) );
    $date = '<div class="post-archive-item__date-day">' . $date[0] . '</div><div class="post-archive-item__date-month">' . $date[1] . '</div>';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-archive-item-box col-lg-4 col-md-6 col-sm-12' ); ?>>
    <div class="post-archive-item__header">
        <?php echo $thumbnail; ?>
        <div class="post-archive-item__date"><?php echo $date; ?></div>
    </div>
    <div class="post-archive-item__content">
        <h3><a class="post-link" href="<?php echo get_permalink( $post->ID ); ?>"><?php echo get_the_title( $post); ?></a></h3>
        <div class="post-archive-item__excerpt"><?php echo get_the_excerpt( $post ); ?></div>
        <?php echo $meta_block; ?>
    </div>
</article>

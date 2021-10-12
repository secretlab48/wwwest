<?php
global $post;
$p = isset( $args['post'] ) ? $args['post'] : $post;
$thumbnail = get_the_post_thumbnail( $p->ID, 'post_widget');
?>

<a class="widget-post_box" href="<?php echo get_permalink( $p->ID ); ?>">
    <div class="widget-post__content-box">
        <?php echo $thumbnail; ?>
        <div class="widget-post__content">
            <div class="widget-post__title"><? echo get_the_title( $p->ID ); ?></div>
            <div class="widget-post__date"><?php echo get_the_date( 'M j, Y' ); ?></div>
        </div>
    </div>
</a>

<?php $post = $p; ?>

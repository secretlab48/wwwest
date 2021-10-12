<?php
/*
Template Name: Posts Archive
*/
?>

<?php get_header(); ?>

    <section class="standard-section post=archive">
        <div class="container">
            <div class="row">
                <div class="col">
                    <?php echo do_shortcode( '[get_section_heading title="Our stories" subtitle="latest blog"]' ); ?>
                    <?
                        $data = isset( $args ) ? $args : array();
                        get_template_part( 'templates/archive-general', null, $data );
                    ?>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>
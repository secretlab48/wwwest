<?php get_header(); ?>

    <section class="standard-section team-archive">
        <div class="container">
            <div class="row">
                <div class="col">
                    <?php echo do_shortcode( '[get_section_heading title="Who we are" subtitle="meet our teem" description="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat."]' ); ?>
                    <?
                        $data = isset( $args ) ? $args : array();
                        get_template_part( 'templates/archive-general', null, $data );
                    ?>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>
<?php
/*
Template Name: Home Page Template
*/

get_header();
?>

<section class="standard-section">
    <div class="container">
        <div class="row">
            <div class="col">
                <?php
                    echo do_shortcode( '[get_section_heading title="Our stories" subtitle="latest blog"]' );
                ?>
            </div>
        </div>
    </div>
    <?php echo do_shortcode( '[get_post_type_block post_type="post" ppp=2]' ); ?>
</section>

<section class="standard-section">
    <div class="container">
        <div class="row">
            <div class="col">
                <?php
                    echo do_shortcode( '[get_section_heading title="Who we are" subtitle="meet our teem" description="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat."]' );
                ?>
            </div>
        </div>
    </div>
    <?php echo do_shortcode( '[get_post_type_block post_type="team" ppp=3]' ); ?>
</section>

<section class="standard-section">
    <div class="container">
        <div class="row">
            <div class="col">
                <?php
                echo do_shortcode( '[get_section_heading title="Service" subtitle="what we do" description="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. "]' );
                ?>
            </div>
        </div>
    </div>
    <div class="accordeon-block container">
        <div class="row">
            <div class="accordeon-block__img-box col-lg-6"><img src="<?php echo get_template_directory_uri() . '/assets/img/p5.jpg'; ?>" /></div>
            <div class="accordeon-block__accordeon-box col-lg-6">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button photography-button" type="button" data-bs-toggle="collapse" data-bs-target="#photography" aria-expanded="true" aria-controls="photography">
                                photography
                            </button>
                        </h2>
                        <div id="photography" class="accordion-collapse collapse show" aria-labelledby="photography" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button creativity-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#creativity" aria-expanded="false" aria-controls="creativity">
                                creativity
                            </button>
                        </h2>
                        <div id="creativity" class="accordion-collapse collapse" aria-labelledby="creativity" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button webdesign-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#webdesign" aria-expanded="false" aria-controls="webdesign">
                                web design
                            </button>
                        </h2>
                        <div id="webdesign" class="accordion-collapse collapse" aria-labelledby="webdesign" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<? get_footer(); ?>

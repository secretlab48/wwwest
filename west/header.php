<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?></title>

        <link href="<?php echo get_template_directory_uri(); ?>/assets//img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/assets/img/icons/touch.png" rel="apple-touch-icon-precomposed">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<?php wp_head(); ?>

	</head>
	<body <?php body_class(); ?>>

		<div class="site-wrapper">

            <header class="header__element" role="banner">

                <div class="header__container">

                    <div class="header__box">
                        <div class="header__logo-box">
                            <a href="<?php echo get_site_url(); ?>">MoGo</a>
                        </div>

                        <!--<div class="header__menu-box">-->
                            <nav class="header__menu top-menu">
                                <?php wp_nav_menu( array( 'menu' => 'top-menu', 'container' => null, 'menu_class' => 'menu__top-menu' ) ); ?>
                                <div class="search-form-item glyphicon glyphicon-search"><?php get_search_form( ); ?></div>
                            </nav>
                        <!--</div>-->
                        <div class="menu-manage"><span></span><span></span><span></span></div>
                    </div>

                </div>

            </header>

            <?php echo do_shortcode ('[west_get_slider name="Top Slider"]' ); ?>

            <main role="main">



<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<?php wp_head(); ?>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <div id="wrapper">
        <header>
            <a href="<?php echo esc_url(home_url()); ?>" title="<?php bloginfo('name'); ?>">
                <div id="logo">
                    <?php $image = get_header_image(); ?>
                    <?php if (!empty($image)) : ?>
                        <img src="<?php echo esc_url($image); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="logo">
                    <?php else : ?>
                        <img src="<?php echo get_theme_support('custom-header', 'default-image'); ?>" alt="logo">
                    <?php endif; ?>
                </div>
                <?php
                if (display_header_text()) : ?>
                    <div id="titre">
                        <h1 class="site-title"><?php bloginfo('name'); ?></h1>
                        <h2 class="site-description"><?php bloginfo('description') ?></h2>
                    </div>
                <?php endif; ?>
            </a>
            <div id="recherche">
                <?php get_search_form(); ?>
            </div>
        </header>
        <!-- Menu burger -->

        <div class="burger-icon">
            <div>
                <i class="fas fa-bars"></i>
            </div>
        </div>

        <!-- Menu burger fin -->

        <nav id="menuPrincipal">
            <?php
            wp_nav_menu(array('sort_column' => 'menu-order', 'theme_location' => 'principal'));
            ?>
        </nav>




        <!-- SLIDER -->
        <?php
        $slider_image_1 = get_theme_mod('themeTuto_slider1');
        $slider_image_2 = get_theme_mod('themeTuto_slider2');
        $slider_image_3 = get_theme_mod('themeTuto_slider3');
        ?>

        <!-- SLIDER -->
        <section id="slider">
            <div class="slider-wrapper">
                <div class="slider-slide">
                    <img src="<?php echo esc_url($slider_image_1); ?>" alt="Slider Image 1">
                </div>
                <div class="slider-slide">
                    <img src="<?php echo esc_url($slider_image_2); ?>" alt="Slider Image 2">
                </div>
                <div class="slider-slide">
                    <img src="<?php echo esc_url($slider_image_3); ?>" alt="Slider Image 3">
                </div>
            </div>
        </section>






        <main id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
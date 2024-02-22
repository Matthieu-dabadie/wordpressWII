<?php

function themeTuto_enqueue_scripts()
{
    // Enqueue Font Awesome
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css');

    // Enqueue Slick Carousel styles
    wp_enqueue_style('slick', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css');
    wp_enqueue_style('slick-theme', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css');

    // Enqueue theme stylesheet
    wp_enqueue_style('themeTuto-style', get_stylesheet_uri());

    // Enqueue jQuery
    wp_enqueue_script('jquery');

    // Enqueue Slick Carousel script
    wp_enqueue_script('slick-carousel', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), '1.8.1', true);


    wp_enqueue_script(
        'themeTuto-script',
        '/wp-content/themes/themeTuto/js/script.js',
        array('jquery'),
        '1.0.0',
        array(
            'strategy'  => 'defer',
        )
    );

    // Enqueue custom script slickInit.js avec jQuery comme dépendance
    wp_enqueue_script(
        'slickInit-script',
        '/wp-content/themes/themeTuto/js/slickInit.js',
        array('jquery', 'slick-carousel'),
        '1.0.0',
        true
    );
}
add_action('wp_enqueue_scripts', 'themeTuto_enqueue_scripts');


//-----------------------


$header_args = array(
    'flex-height' => true,
    'height' => 150,
    'flex-width' => true,
    'width' => 206,
    'default-image' => get_template_directory_uri() . '/images/logo.png',
);
add_theme_support('custom-header', $header_args);

add_theme_support('custom-background', array('default-color' => 'cccccc'));

function mon_theme_customize_register($wp_customize)
{
    $wp_customize->add_setting('couleur_texte_generale', array(
        'default'           => '#333',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'couleur_texte_generale', array(
        'label'    => __('Couleur du Texte', 'mon-theme'),
        'section'  => 'colors',
        'settings' => 'couleur_texte_generale',
    )));
}
add_action('customize_register', 'mon_theme_customize_register');

function themeTuto_customize_register($wp_customize)
{
    // Ajouter un slider 
    $wp_customize->add_section('slider_settings', array(
        'title' => 'Slider',
        'priority' => 120,
    ));

    // Ajout de l'option pour le slider 1
    $wp_customize->add_setting('themeTuto_slider1', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
    ));

    // Ajout du contrôleur pour le slider 1
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'themeTuto_slider1', array(
        'label' => "Slide 1",
        'section' => 'slider_settings',
        'settings' => 'themeTuto_slider1',
    )));

    // Ajout de l'option pour le slider 2
    $wp_customize->add_setting('themeTuto_slider2', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
    ));

    // Ajout du contrôleur pour le slider 2
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'themeTuto_slider2', array(
        'label' => "Slide 2",
        'section' => 'slider_settings',
        'settings' => 'themeTuto_slider2',
    )));

    // Ajout de l'option pour le slider 3
    $wp_customize->add_setting('themeTuto_slider3', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
    ));

    // Ajout du contrôleur pour le slider 3
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'themeTuto_slider3', array(
        'label' => "Slide 3",
        'section' => 'slider_settings',
        'settings' => 'themeTuto_slider3',
    )));


    // Ajouter la section "Layout"
    $wp_customize->add_section('layout_section', array(
        'title'    => __('Layout', 'mon-theme'),
        'priority' => 40,
    ));

    // Ajouter le contrôle de largeur de la sidebar
    $wp_customize->add_setting('largeur_sidebar', array(
        'default'           => '25',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('largeur_sidebar', array(
        'type'        => 'range',
        'section'     => 'layout_section',
        'label'       => __('Largeur de la sidebar', 'mon-theme'),
        'description' => __('Réglez la largeur de la sidebar entre 20% et 40%', 'mon-theme'),
        'input_attrs' => array(
            'min'   => 20,
            'max'   => 40,
            'step'  => 5,
        ),
    ));

    // Footer
    $wp_customize->add_section('my_footer', array(
        'title' => 'footer',
        'priority' => 120,
    ));

    $wp_customize->add_setting('themeTuto_credits', array(
        'default' => 'oui',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));

    $wp_customize->add_control('themeTuto_credits', array(
        'settings' => 'themeTuto_credits',
        'label' => "Souhaitez-vous montrer le copyright ?",
        'section' => 'my_footer',
        'type' => 'radio',
        'choices' => array(
            'oui' => 'oui',
            'non' => 'non'
        )
    ));

    // Nouvelles options pour le footer
    $wp_customize->add_setting('phone_number', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('phone_number', array(
        'label'    => __('Phone Number', 'mon-theme'),
        'section'  => 'my_footer',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('address', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('address', array(
        'label'    => __('Address', 'mon-theme'),
        'section'  => 'my_footer',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('facebook_url', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('facebook_url', array(
        'label'    => __('Facebook URL', 'mon-theme'),
        'section'  => 'my_footer',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('twitter_url', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('twitter_url', array(
        'label'    => __('Twitter URL', 'mon-theme'),
        'section'  => 'my_footer',
        'type'     => 'text',
    ));

    // Ajout de la section pour la Google Map
    $wp_customize->add_section('contact_map_section', array(
        'title' => __('Page Contact - Google Map', 'mon-theme'),
        'priority' => 130,
    ));
}
add_action('customize_register', 'themeTuto_customize_register');

function customize_contact_page($wp_customize)
{
    $wp_customize->add_setting('show_google_map', array(
        'default' => false,
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('show_google_map', array(
        'label' => __('Afficher la Google Map ?', 'mon-theme'),
        'section' => 'contact_map_section',
        'type' => 'radio',
        'choices' => array(
            'yes' => __('Oui', 'mon-theme'),
            'no' => __('Non', 'mon-theme'),
        ),
    ));

    $wp_customize->add_setting('google_map_api_key', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('google_map_api_key', array(
        'label' => __('Clé API Google Map', 'mon-theme'),
        'section' => 'contact_map_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('google_map_latitude', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('google_map_latitude', array(
        'label' => __('Latitude', 'mon-theme'),
        'section' => 'contact_map_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('google_map_longitude', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('google_map_longitude', array(
        'label' => __('Longitude', 'mon-theme'),
        'section' => 'contact_map_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('google_map_zoom', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('google_map_zoom', array(
        'label' => __('Zoom', 'mon-theme'),
        'section' => 'contact_map_section',
        'type' => 'range',
        'input_attrs' => array(
            'min' => 1,
            'max' => 20,
            'step' => 1,
        ),
    ));
}

function theme_customize_css()
{
    $couleurTexte = get_theme_mod('couleur_texte_generale', '#333');
    $couleurTitre = get_theme_mod('couleur_texte_entete', '');

?>
    <style>
        body {
            color: <?php echo $couleurTexte; ?>;
        }

        header h1 {
            color: <?php echo $couleurTitre ? $couleurTitre : 'inherit'; ?>;
        }

        #colonneDroite {
            width: <?php echo get_theme_mod('largeur_sidebar', '25%'); ?>;
        }
    </style>
<?php
}
add_action('wp_head', 'theme_customize_css');

function themeTuto_register_sidebars()
{
    if (function_exists('register_sidebar')) {
        register_sidebar(array(
            'id' => 'sidebar-droite',
            'name' => 'Barre latérale principale',
            'description' => 'Colonne de widgets qui apparait à droite',
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'id' => 'sidebar-bas',
            'name' => 'Zone de dépôt en pied de page',
            'description' => 'Emplacement de widgets au-dessus du footer',
            'before_widget' => '<div class="widget-bas">',
            'after_widget' => '</div>',
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'id' => 'contact-sidebar',
            'name' => 'Contact Sidebar',
            'description' => 'Widgets for the Contact page.',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        ));
    }
}
add_action('widgets_init', 'themeTuto_register_sidebars');

function nbMotsExtraits()
{
    return 25;
}
add_filter('excerpt_length', 'nbMotsExtraits');

function finExtrait($more)
{
    return '&nbsp;[&rarr;]';
}
add_filter('excerpt_more', 'finExtrait');

function enqueue_google_maps_script()
{
    if (is_page_template('contact.php')) {
        $api_key = get_theme_mod('google_map_api_key', '');
        if (!empty($api_key)) {
            wp_enqueue_script('google-maps', "https://maps.googleapis.com/maps/api/js?key={$api_key}&callback=initMap", array('jquery'), null, true);
        }
    }
}
add_action('wp_enqueue_scripts', 'enqueue_google_maps_script');

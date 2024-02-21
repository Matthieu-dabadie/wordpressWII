<?php

// Ajout font awesome

function enqueue_custom_scripts()
{
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css');
}

add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');


$header_args = array(
    'flex-height' => true,
    'height' => 150,
    'flex-width' => true,
    'width' => 206,
    'default-image' => get_template_directory_uri() . '/images/logo.png',
);
add_theme_support('custom-header', $header_args);

add_theme_support('custom-background', array('default-color' => 'cccccc'));

function themeTuto_scripts()
{
    wp_enqueue_style('themeTuto-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'themeTuto_scripts');

add_theme_support('title-tag');

if (function_exists('register_nav_menus')) {
    register_nav_menus(array(
        'principal' => 'Menu principal',
        'footer' => 'Menu footer',
    ));
}


function themeTuto_customize_register($wp_customize)
{
    $wp_customize->add_setting('text_color', array(
        'default' => '#000000',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'text_color', array(
        'label' => 'Couleur du texte',
        'section' => 'colors',
        'settings' => 'text_color',
    )));

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

    //----------------------------

    $wp_customize->add_section('layout_section', array(
        'title' => __('Layout', 'montheme'),
        'priority' => 40,
    ));


    $wp_customize->add_setting('sidebar_width', array(
        'default' => '25%',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('sidebar_width', array(
        'label' => __('Largeur de la sidebar', 'montheme'),
        'section' => 'layout_section',
        'type' => 'range',
        'input_attrs' => array(
            'min' => 20,
            'max' => 40,
            'step' => 5,
        ),
    ));

    //------------------------------

    if (isset($wp_customize->selective_refresh)) {
        $wp_customize->selective_refresh->add_partial(
            'blogname',
            array('selector' => '.site-title')
        );
        $wp_customize->selective_refresh->add_partial(
            'blogdescription',
            array('selector' => '.site-description')
        );
        $wp_customize->selective_refresh->add_partial(
            'header_image',
            array('selector' => '#logo')
        );
        $wp_customize->selective_refresh->add_partial('themeTuto_credits', array(
            'selector' => '#copyright'
        ));
    }

    // Nouvelles options pour le footer
    $wp_customize->add_setting('phone_number', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('phone_number', array(
        'label'    => __('Phone Number', 'text-domain'),
        'section'  => 'my_footer',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('address', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('address', array(
        'label'    => __('Address', 'text-domain'),
        'section'  => 'my_footer',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('facebook_url', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('facebook_url', array(
        'label'    => __('Facebook URL', 'text-domain'),
        'section'  => 'my_footer',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('twitter_url', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('twitter_url', array(
        'label'    => __('Twitter URL', 'text-domain'),
        'section'  => 'my_footer',
        'type'     => 'text',
    ));

    //------------------------------


}
add_action('customize_register', 'themeTuto_customize_register');




function theme_customize_css()
{
    $couleurTexte = get_theme_mod('text_color');
    $couleurTitre = get_header_textcolor();
?>
    <style>
        body {
            color: <?php echo $couleurTexte; ?>;
        }

        header h1 {
            color: <?php echo $couleurTitre; ?>;
        }

        #colonneDroite {
            width: <?php echo get_theme_mod('sidebar_width', '25%'); ?>;
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
    }
}
add_action('widgets_init', 'themeTuto_register_sidebars');

function nbMotsExtraits($length)
{
    return 25;
}
add_filter('excerpt_length', 'nbMotsExtraits');

function finExtrait($more)
{
    return '&nbsp;[&rarr;]';
}
add_filter('excerpt_more', 'finExtrait');


//--------------- Modèle de page Contact-------

function register_contact_sidebar()
{
    register_sidebar(array(
        'name'          => __('Contact Sidebar', 'text_domain'),
        'id'            => 'contact-sidebar',
        'description'   => __('Widgets for the Contact page.', 'text_domain'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'register_contact_sidebar');

function customize_contact_page($wp_customize)
{
    $wp_customize->add_setting('show_google_map', array(
        'default' => false,
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('show_google_map', array(
        'label' => __('Afficher la Google Map ?', 'text_domain'),
        'section' => 'contact_map_section',
        'type' => 'radio',
        'choices' => array(
            'yes' => __('Oui', 'text_domain'),
            'no' => __('Non', 'text_domain'),
        ),
    ));

    $wp_customize->add_setting('google_map_api_key', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('google_map_api_key', array(
        'label' => __('Clé API Google Map', 'text_domain'),
        'section' => 'contact_map_section',
        'type' => 'text',
    ));
}
add_action('customize_register', 'customize_contact_page');

//--------------- Modèle de page Contact----FIN---
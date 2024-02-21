/*
Template Name: Page contact
*/

<?php get_header(); ?>
<main id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if (is_active_sidebar('sidebar-gauche')) : ?>
        <aside id="colonneGauche">
            <?php dynamic_sidebar('sidebar-gauche'); ?>
        </aside>
        <?php endif;
    if (have_posts()) :
        while (have_posts()) : the_post(); ?>
            <section id="pages" class="haut">
                <h2><?php the_title(); ?></h2>
                <?php the_content(); ?>
            </section>
    <?php endwhile;
    endif; ?>
</main>
<section id="map" style="height: 400px;">
</section>

<?php get_footer(); ?>
<script src="<?php echo esc_url(get_theme_mod('themeTuto_API', '')); ?>" async defer></script>
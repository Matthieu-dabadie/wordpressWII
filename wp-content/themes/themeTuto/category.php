<?php get_header();
if (is_active_sidebar('sidebar-droite')) : ?>
    <section id="categories" class="haut avecAside">
    <?php else : ?>
        <section id="categories" class="haut">
        <?php endif; ?>
        <h2>Catégorie: <?php the_category('&bull;'); ?></h2>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> - <?php the_date(); ?></p>
        <?php endwhile;
        endif; ?>
        </section>
        <?php get_sidebar();
        get_footer(); ?>
<?php get_header();
if (is_active_sidebar('sidebar-droite')) : ?>
    <section id="recherches" class="haut avecAside">
    <?php else : ?>
        <section id="recherches" class="haut">
        <?php endif; ?>
        <h2>Résultat de votre recherche :</h2>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> - <?php the_date(); ?></p>
        <?php the_excerpt();
            endwhile;
        endif; ?>
        </section>
        <?php get_sidebar();
        get_footer(); ?>
<?php get_header();
if (is_active_sidebar('sidebar-droite')) : ?>
    <section id="articles" class="haut avecAside">
    <?php else : ?>
        <section id="articles" class="haut">
            <?php endif;
        if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div class="unArticle">
                    <h2>
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h2>
                    <?php the_excerpt(); ?>
                    <p class="infos">
                        <?php comments_number('Aucun commentaire', 'Un seul commentaire', '% commentaires'); ?>
                    </p>
                </div>
        <?php endwhile;
            the_posts_pagination();
        endif; ?>
        </section>
        <?php get_sidebar();
        get_footer(); ?>


        <?php get_footer(); ?>
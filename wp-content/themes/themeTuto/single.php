<?php get_header();
if (have_posts()) : while (have_posts()) : the_post();
        if (is_active_sidebar('sidebar-droite')) : ?>
            <section id="articleSeul" class="haut avecAside">
            <?php else : ?>
                <section id="articleSeul" class="haut">
                <?php endif; ?>
                <div class="precSuiv">
                    <div class="articlePrec">
                        <?php previous_post_link(); ?>
                    </div>
                    <div class="articleSuiv">
                        <?php next_post_link(); ?>
                    </div>
                </div>
                <h2><?php the_title(); ?></h2>
                <?php the_content(); ?>
                <?php wp_link_pages(); ?>
                <p>Les articles et le profil de <?php the_author_posts_link(); ?></p>
                <p>Publié le <?php the_date(); ?></p>
                <p>Catégorie(s) : <?php the_category(); ?></p>
                <p><?php the_tags(); ?></p>
                <div id="comments">
                    <h3>Les commentaires de l'article</h3>
                    <?php comments_template(); ?>
                </div>
                </section>
        <?php endwhile;
endif;
get_sidebar();
get_footer(); ?>
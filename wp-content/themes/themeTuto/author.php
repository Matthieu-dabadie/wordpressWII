<?php get_header();
$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
if (is_active_sidebar('sidebar-droite')) : ?>
    <section id="auteur" class="haut avecAside">
    <?php else : ?>
        <section id="auteur" class="haut">
        <?php endif; ?>
        <h2><?php echo $curauth->display_name; ?></h2>
        <p>Compétences : <?php echo $curauth->description; ?></p>
        <p>Site web : <a href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a></p>
        <p>Email : <a href="mailto:<?php echo $curauth->user_email; ?>"><?php echo $curauth->user_email; ?></a></p>
        <h3>Les articles de <?php echo $curauth->first_name; ?> <?php echo $curauth->last_name; ?></h3>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> - <?php the_date(); ?></p>
        <?php endwhile;
        endif; ?>
        </section>
        <?php get_sidebar();
        get_footer(); ?>
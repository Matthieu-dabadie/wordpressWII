<?php if (!comments_open()) : ?>
    <h3>Les commentaire sont fermés.</h3>
<?php elseif (have_comments()) : ?>
    <h3>Il y a <?php comments_number('', 'Un seul commentaire', '% commentaires'); ?> pour cet article.</h3>
    <ol><?php wp_list_comments(); ?></ol>
    <?php if (get_comment_pages_count() > 1) :
        previous_comments_link();
        next_comments_link();
    endif;
    comment_form();
else : ?>
    <h3>Soyez le premier à saisir un commentaire !</h3>
<?php comment_form();
endif; ?>
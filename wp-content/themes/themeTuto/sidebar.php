<?php
// Récupérer la largeur de la barre latérale depuis les paramètres de personnalisation
$sidebar_width = get_theme_mod('largeur_sidebar', '25');
?>

<?php if (is_active_sidebar('sidebar-droite')) : ?>
    <aside id="colonneDroite" style="width: <?php echo esc_attr($sidebar_width); ?>%;">
        <?php dynamic_sidebar('sidebar-droite'); ?>
    </aside>
<?php endif; ?>
</main>
<?php if (is_active_sidebar('sidebar-bas')) : ?>
    <aside id="bas">
        <?php dynamic_sidebar('sidebar-bas'); ?>
    </aside>
<?php endif; ?>
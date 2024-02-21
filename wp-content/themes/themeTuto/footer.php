<footer>
    <nav id="menuFooter">
        <?php
        wp_nav_menu(array(
            'sort_column' => 'menu-order',
            'theme_location' => 'footer',
            'fallback_cb' => false
        ));
        ?>
    </nav>
    <div>
        <div class="contact-info">
            <p><i class="fas fa-phone"></i> <a href="tel:<?php echo esc_html(get_theme_mod('phone_number')); ?>"><?php echo esc_html(get_theme_mod('phone_number')); ?></a></p>
            <br>
            <p><i class="fas fa-map-marker-alt"></i> <a href="Adresse:<?php echo esc_html(get_theme_mod('address')); ?>"><?php echo esc_html(get_theme_mod('address')); ?></a></p>
        </div>
        <div class=" social-icons">
            <p><a href="<?php echo esc_url(get_theme_mod('facebook_url')); ?>" target="_blank"><i class="fab fa-facebook"></i></a></p>
            <br>
            <p><a href="<?php echo esc_url(get_theme_mod('twitter_url')); ?>" target="_blank"><i class="fab fa-twitter"></i></a></p>
        </div>
    </div>


    <?php
    $copyright = get_theme_mod('themeTuto_credits');
    if ($copyright == 'oui') {
        echo '<i id="copyright">&copy; CEFii - ' . date('Y') . ' / Tous droits réservés.</i>';
    }
    ?>

</footer>


<!-- Fermeture du wrapper -->
</div><!-- fermeture wrapper -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



</body>

</html>
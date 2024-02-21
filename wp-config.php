<?php

/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link https://fr.wordpress.org/support/article/editing-wp-config-php/ Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'cefiidev1380');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', '');

/** Adresse de l’hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8mb4');

/** Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '>i.5`0lru.4:v+>V`EE+.^1,XFI_]CT2Ze?nXA;Pch62Sa?D:z<kEzvnl5a&5%?:');
define('SECURE_AUTH_KEY',  'HZ@*cD^NN`>$1q.7%C}Bg($Wl#~ZG,fzyp%U8Fd<1}7RG|jTusYrOLvJ~V*.{q~W');
define('LOGGED_IN_KEY',    'nyojZzgG~HBL^W^3pLdIU-MVaH{{y^CSu[:ERS[~w*e-4pNNy!=nDH?j7_P5?mog');
define('NONCE_KEY',        ' SCx^Us6?c,G&`_56D*iWTxr`P[%3#za9Lb3u|/^U(HB_HOs]L;S8UNw-T(onM5h');
define('AUTH_SALT',        'S~ftdsX62|FNzt<O9*hRjprcOcLAaXQz5)t-|4 <o4n:P[t9h.FoyzrIAV!0i?~k');
define('SECURE_AUTH_SALT', ']B~8mfsh`]%l?!LZ[qUP@XU)rk{.Se}cnBs7Yql60Mt#nBA>}0v@^/+$.=UO?5Uo');
define('LOGGED_IN_SALT',   'n[]G:#H![Mq;wT|;(A7vZUwUtnRi[{8 /^b(|2[H[tc2W#}ze^1-|.^JbKI8x!|o');
define('NONCE_SALT',       '^2=A8cjf8mJkaU#_6i#HRq[:t H BOJ,16B+!L(@m,NMR#>,ERe0p[B]Vothaok.');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wii_';

/**
 * Pour les développeurs et développeuses : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs et développeuses d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur la documentation.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define('WP_DEBUG', true);

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if (!defined('ABSPATH'))
  define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');

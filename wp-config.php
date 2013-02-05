<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clefs secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur 
 * {@link http://codex.wordpress.org/Editing_wp-config.php Modifier
 * wp-config.php} (en anglais). C'est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d'installation. Vous n'avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'delaville-immobilier');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', '');

/** Adresse de l'hébergement MySQL. */
define('DB_HOST', 'localhost:3306');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8');

/** Type de collation de la base de données. 
  * N'y touchez que si vous savez ce que vous faites. 
  */
define('DB_COLLATE', '');

/**#@+
 * Clefs uniques d'authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant 
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n'importe quel moment, afin d'invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '`Rn6y@[>964T`Uiv]3!<vuH9UFr&zWjNf|yGGl6$g*#7MCn1^CkN_ue%)cKk;28x');
define('SECURE_AUTH_KEY',  'kkbzT&)cJfo5GaEG]-[}W%TXR.IbW}DK7lPkwTvWM6-;7JD}qnItL`3Q*C^bgP5r');
define('LOGGED_IN_KEY',    'TZmfhu+c1tyjw+aT<R9<$d&E]du(0>GD.aT0K_r|.?/S7,t(cO4Z_HCywH2Ag px');
define('NONCE_KEY',        'P-q)Y1s:JwRw9Z$0ZdON5LknFaZ;($Ke_[Z4r^)7d,y^;6G?i?$Nj=B&?F^7ZoDJ');
define('AUTH_SALT',        'c`,~H:1WQtA_1W1tzW9$gxBNj>Wj3V<1UYY>i:~VEx&DRZ={7M|JuqV/u?+:3O>V');
define('SECURE_AUTH_SALT', ':bn<v3!wuG|h1=<z+hz|`XwlT0MK&xRq;NYo+nw%O~?2p2A<DGKeZZjI#pylp5#@');
define('LOGGED_IN_SALT',   '=jSxT-|7w!AHh_K=*L9-7|V;a:8e3JBo?AiPt1,oLUmZ.<!q:7c^u[^gNpeQMk_F');
define('NONCE_SALT',       '$)$-j?3Tn4#Ybq?db>hFA|&0CvGc A6>,aK*3v/Ald9De:O], gpD}sMBaH8!{D9');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique. 
 * N'utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés!
 */
$table_prefix  = 'wp_';

/**
 * Langue de localisation de WordPress, par défaut en Anglais.
 *
 * Modifiez cette valeur pour localiser WordPress. Un fichier MO correspondant
 * au langage choisi doit être installé dans le dossier wp-content/languages.
 * Par exemple, pour mettre en place une traduction française, mettez le fichier
 * fr_FR.mo dans wp-content/languages, et réglez l'option ci-dessous à "fr_FR".
 */
define('WPLANG', 'fr_FR');

/** 
 * Pour les développeurs : le mode deboguage de WordPress.
 * 
 * En passant la valeur suivante à "true", vous activez l'affichage des
 * notifications d'erreurs pendant votre essais.
 * Il est fortemment recommandé que les développeurs d'extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de 
 * développement.
 */ 
define('WP_DEBUG', false); 

/* C'est tout, ne touchez pas à ce qui suit ! Bon blogging ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
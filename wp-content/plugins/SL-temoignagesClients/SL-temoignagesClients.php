<?php
/* 
 Plugin Name: Sparkling Lengua - Testiomonial clients
 * Description: Un plugin pour gérer la présentation des témoignages clients de Sparkling Lengua
 * Version: 0.1
 * Author: Sandrine Martinez
 * Author URI: sandrine.martinez.10.free.fr
 */

//function pour créer une table dans la bdd pour l'identification des membres de la team'
function install_table_clients(){
    global $wpdb;
    $wpdb->query("CREATE TABLE IF NOT EXISTS {$wpdb->prefix}testimonialclients (testimonial_clients_id INT PRIMARY KEY AUTO_INCREMENT, societe VARCHAR(450) NOT NULL, nom VARCHAR(250) NOT NULL, prenom VARCHAR(250) NOT NULL, statut VARCHAR(450) NOT NULL, temoignage LONGTEXT NOT NULL, logo VARCHAR(1200) NOT NULL, link VARCHAR(1200) NULL, langue VARCHAR(10) NOT NULL), order_testimonial_client INT;");
}
//vérifie à l'activation du plugin temoignagesClients si la table team existe déjà sinon elle est créée'
register_activation_hook(__FILE__, 'install_table_clients');

//ajoute un menu dans l'administration pour le plugin team
add_action('admin_menu', 'add_admin_menu_client_testimonial');
function add_admin_menu_client_testimonial(){
    add_menu_page('SL Clients plugin', 'SL Clients plugin', 'manage_options', 'SLclientsTestimonial', 'SLpageClientTestimonial');
    add_submenu_page('SLclientsTestimonial', 'Ajouter un témoignage client', 'Ajouter un témoignage client', 'manage_options', 'SLaddClientTestimonial', 'SLpageAddClientTestimonial');
    add_submenu_page(null, 'Modifier un témoignage client', 'Modifier un témoignage client', 'manage_options', 'SLmodifyClientTestimonial', 'SLpageModifyClientTestimonial');
}

//function pour créer le contenu de la page d'administration du plugin testimonial
function SLpageClientTestimonial(){
    require_once 'SLpageClientTestimonial.php';
}

//function pour créer le contenu de la page d'administration d'ajout d'un témoignage client
function SLpageAddClientTestimonial(){
    require_once 'SLpageAddClientTestimonial.php';
}

//function pour créer le contenu de la page d'administration de modification d'un témoignage client
function SLpageModifyClientTestimonial(){
    require_once 'SLpageModifyClientTestimonial.php';
}

//function pour charger un fichier jquery
function play_jquery_clients(){
    wp_enqueue_script('SLclients', plugins_url().'/SL-temoignagesClients/SLclientsTestimonial.js', array('jquery'), '1.0.0', true);
}
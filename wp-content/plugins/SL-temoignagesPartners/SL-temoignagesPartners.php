<?php
/* 
 Plugin Name: Sparkling Lengua - Testiomonial partners
 * Description: Un plugin pour gérer la présentation des témoignages partners de Sparkling Lengua
 * Version: 0.1
 * Author: Sandrine Martinez
 * Author URI: sandrine.martinez.10.free.fr
 */

//function pour créer une table dans la bdd pour l'identification des membres de la team'
function install_table_partners(){
    global $wpdb;
    $wpdb->query("CREATE TABLE IF NOT EXISTS {$wpdb->prefix}testimonialpartners (testimonial_partners_id INT PRIMARY KEY AUTO_INCREMENT, nom VARCHAR(250) NULL, prenom VARCHAR(250) NOT NULL, langage VARCHAR(450) NOT NULL, temoignage LONGTEXT NOT NULL, langue VARCHAR(10) NOT NULL);");
}
//vérifie à l'activation du plugin temoignagesClients si la table team existe déjà sinon elle est créée'
register_activation_hook(__FILE__, 'install_table_partners');

//ajoute un menu dans l'administration pour le plugin team
add_action('admin_menu', 'add_admin_menu_partner_testimonial');
function add_admin_menu_partner_testimonial(){
    add_menu_page('SL Partners plugin', 'SL Partners plugin', 'manage_options', 'SLpartnersTestimonial', 'SLpagePartnerTestimonial');
    add_submenu_page('SLpartnersTestimonial', 'Ajouter un témoignage partenaire', 'Ajouter un témoignage partenaire', 'manage_options', 'SLaddPartnerTestimonial', 'SLpageAddPartnerTestimonial');
    add_submenu_page(null, 'Modifier un témoignage partenaire', 'Modifier un témoignage partenaire', 'manage_options', 'SLmodifyPartnerTestimonial', 'SLpageModifyPartnerTestimonial');
}

//function pour créer le contenu de la page d'administration du plugin testimonial partner
function SLpagePartnerTestimonial(){
    require_once 'SLpagePartnerTestimonial.php';
}

//function pour créer le contenu de la page d'administration d'ajout d'un témoignage partner
function SLpageAddPartnerTestimonial(){
    require_once 'SLpageAddPartnerTestimonial.php';
}

//function pour créer le contenu de la page d'administration de modification d'un témoignage partner
function SLpageModifyPartnerTestimonial(){
    require_once 'SLpageModifyPartnerTestimonial.php';
}

//function pour charger un fichier jquery
function play_jquery_partners(){
    wp_enqueue_script('SLpartners', plugins_url().'/SL-temoignagesPartners/SLpartnersTestimonial.js', array('jquery'), '1.0.0', true);
}
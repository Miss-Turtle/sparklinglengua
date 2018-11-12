<?php

/* 
 Plugin Name: Sparkling Lengua - Meet the team
 * Description: Un plugin pour gérer la présentation des membres de l'équipe de Sparkling Lengua
 * Version: 0.1
 * Author: Sandrine Martinez
 * Author URI: sandrine.martinez.10.free.fr
 */

//function pour créer une table dans la bdd pour l'identification des membres de la team'
function install_table_team(){
    global $wpdb;
    $photo_defaut = get_template_directory_uri()."/img/team/portrait.jpg";
    $photoCouleur_defaut = get_template_directory_uri()."/img/teamCouleur/portrait.jpg";
    $wpdb->query("CREATE TABLE IF NOT EXISTS {$wpdb->prefix}team (team_member_id INT PRIMARY KEY AUTO_INCREMENT, nom VARCHAR(250) NOT NULL, prenom VARCHAR(250) NOT NULL, competences LONGTEXT NULL, statuts VARCHAR(450) NOT NULL, email VARCHAR(250) NOT NULL, presentation LONGTEXT NULL, sparklinglenguaTime LONGTEXT NULL, photo VARCHAR(1200) DEFAULT '$photo_defaut' NOT NULL, photoCouleur VARCHAR(1200) DEFAULT '$photoCouleur_defaut' NOT NULL, langue VARCHAR(10) NOT NULL, order INT);");
}
//vérifie à l'activation du plugin meetTheTeam si la table team existe déjà sinon elle est créée'
register_activation_hook(__FILE__, 'install_table_team');

//ajoute un menu dans l'administration pour le plugin team
add_action('admin_menu', 'add_admin_menu');
function add_admin_menu(){
    add_menu_page('SL Team plugin', 'SL Team plugin', 'manage_options', 'SLmemberTeam', 'SLpageTeam');
    add_submenu_page('SLmemberTeam', 'Ajouter un membre à l\'équipe', 'Ajouter un membre à l\'équipe', 'manage_options', 'SLaddMemberTeam', 'SLpageAddTeamMember');
    add_submenu_page(null, 'Modifier un membre de l\'équipe', 'Modifier un membre de l\'équipe', 'manage_options', 'SLmodifyMemberTeam', 'SLpageModifyTeamMember');
}

//function pour créer le contenu de la page d'administration du plugin team
function SLpageTeam(){
    require_once 'SLpageTeam.php';
}

//function pour créer le contenu de la page d'administration du plugin team : ajouter un membre
function SLpageAddTeamMember(){        
    require_once 'SLpageAddTeamMember.php';     
}

//function pour créer le contenu de la page d'administration du plugin team : modifier un membre
function SLpageModifyTeamMember(){
    require_once 'SLpageModifyTeamMember.php';
}

//function pour associer un fichier jquery
function play_Jquery_team(){
    wp_enqueue_script('SLteam', plugins_url()."/SL-meetTheTeam/SLteam.js", array('jquery'), '1.0.0', true);
}
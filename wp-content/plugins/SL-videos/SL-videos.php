<?php
/* 
 Plugin Name: Sparkling Lengua - Videos
 * Description: Un plugin pour télécharger des vidéos sur la page vidéos et photos
 * Version: 0.1
 * Author: Sandrine Martinez
 * Author URI: sandrine.martinez.10.free.fr
 */

 //function pour créer une table dans la bdd pour l'identification des membres de la team'
function install_table_videos(){
    global $wpdb;
    $wpdb->query("
    	CREATE TABLE IF NOT EXISTS {$wpdb->prefix}video (
    		videoID INT PRIMARY KEY AUTO_INCREMENT, 
    		videoTitre VARCHAR(250) NOT NULL, 
    		videoUri VARCHAR(1200), 
    		videoLien VARCHAR(1200),
    		videoLangue VARCHAR(10) NOT NULL, 
    		videoOrder INT
    		);
    ");
}

//vérifie à l'activation du plugin Videos si la table videos existe déjà sinon elle est créée'
register_activation_hook(__FILE__, 'install_table_videos');

//ajoute un menu dans l'administration pour le plugin team
add_action('admin_menu', 'add_admin_menu_videos');
function add_admin_menu_videos(){
    add_menu_page('SL Videos plugin', 'SL Videos plugin', 'manage_options', 'SLVideo', 'SLpageVideo');
    add_submenu_page('SLVideo', 'Ajouter une vidéo', 'Ajouter une vidéo', 'manage_options', 'SLaddVideo', 'SLpageAddVideo');
    add_submenu_page(null, 'Modifier une vidéo', 'Modifier une vidéo', 'manage_options', 'SLmodifyVideo', 'SLpageModifyVideo');
}

//function pour créer le contenu de la page d'administration du plugin team
function SLpageVideo(){
    require_once 'SLpageVideo.php';
}

//function pour créer le contenu de la page d'administration du plugin team : ajouter un membre
function SLpageAddVideo(){        
    require_once 'SLpageAddVideo.php';     
}

//function pour créer le contenu de la page d'administration du plugin team : modifier un membre
function SLpageModifyVideo(){
    require_once 'SLpageModifyVideo.php';
}

//function pour associer un fichier jquery
function play_Jquery_videos(){
    wp_enqueue_script('SLteam', plugins_url()."/SL-videos/SLvideos.js", array('jquery'), '1.0.0', true);
}
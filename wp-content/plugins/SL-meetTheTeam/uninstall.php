<?php
//si le plugin team n'est pas défini comme en cours de désinstallation on sort du fichier uninstall
if ( !defined( 'WP_UNINSTALL_PLUGIN' ) ){
    exit();
}
    
//sinon on exécute la function pour supprimer la table team créée lors de l'activation du plugin meetTheTeam lorsque que le plugin est désactivé
function uninstall_table_team(){
    //si le plugin a été désinstallé on supprime la table team
    global $wpdb;
    $wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}team;"); 
}
uninstall_table_team();
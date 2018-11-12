<?php
//si le plugin testimonial clients n'est pas défini comme en cours de désinstallation on sort du fichier uninstall
if ( !defined( 'WP_UNINSTALL_PLUGIN' ) ){
    exit();
}
    
//sinon on exécute la function pour supprimer la table testimonial clients 
function uninstall_table_partners(){
    //si le plugin a été désinstallé on supprime la table testimonial clients
    global $wpdb;
    $wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}testimonialpartners;"); 
}
uninstall_table_partners();
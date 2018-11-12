<?php
/*
 * Template Name: Contact
 */
display_header(); 
$pageAncestor = display_langue();
display_header_entete($pageAncestor); 

//écrire "adresse" en fonction de la langue
switch($pageAncestor){
    case 'en':
        print('<h2>Address</h2>');
        break;
    case 'fr':
        print('<h2>Adresse</h2>');
        break;
    case 'es':
        print('<h2>Dirección</h2>');
        break;
    case 'de':
        print('<h2>Anschrift</h2>');
        break;
    case 'it':
        print('<h2>Indirizzo</h2>');
        break;
    case 'nl':
        print('<h2>Adres</h2>');
        break;
}
//boucle pour faire apparaître le contenu de la page
print('<div class="contact">');
if (have_posts()){
    while (have_posts()) {
        the_post();
        the_content();
    }
}
global $post;
$postID = get_post_meta($post->ID, 'googleMap');
printf('<div id="googleMap">%s</div>',$postID[0]);

print('</div><br>');
//affichage du contenu du plugin SL Team
global $wpdb;
$recup = $wpdb->get_results('SELECT * FROM '.$wpdb->prefix.'team WHERE langue =\''.$pageAncestor.'\' ORDER BY team_member_id ASC');
if($recup){
    //écrire "emails" en fonction de la langue
    switch($pageAncestor){
        case 'en':
            print('<h2 class="clear">E-mails</h2>');
            break;
        case 'fr':
            print('<h2 class="clear">Adresses électroniques</h2>');
            break;
        case 'es':
            print('<h2 class="clear">Correo electrónico</h2>');
            break;
        case 'de':
            print('<h2 class="clear">E-Mail-Adressen</h2>');
            break;
        case 'it':
            print('<h2 class="clear">E-mail</h2>');
            break;
        case 'nl':
            print('<h2 class="clear">E-mail</h2>');
            break;
    }
    foreach ($recup as $line){
        print('<div class="teamEmail">');
            printf('<div class="divImgContact"><img class="imgContact" src="%s" alt="%s %s"></div>', stripcslashes($line->photo), ucfirst(stripslashes($line->prenom)), strtoupper(stripslashes($line->nom)));
            print('<div class="detailEmail">');
                printf('<p>%s %s</p>', ucfirst(stripslashes($line->prenom)), strtoupper(stripslashes($line->nom)));
                printf('<p>%s</p>', stripslashes($line->statuts));
                switch($pageAncestor){
                    case 'en':
                        printf('<p>E-mail: <a href="mailto:%s" titre="email">%s</a></p>', 
                            stripslashes($line->email), stripslashes($line->email));
                        break;
                    case 'fr':
                        printf('<p>E-mail : <a href="mailto:%s" titre="email">%s</a></p>', 
                            stripslashes($line->email), stripslashes($line->email));
                        break;
                    case 'es':
                        printf('<p>Email : <a href="mailto:%s" titre="email">%s</a></p>', 
                            stripslashes($line->email), stripslashes($line->email));
                        break;
                    case 'de':
                        printf('<p>E-Mail: <a href="mailto:%s" titre="email">%s</a></p>', 
                            stripslashes($line->email), stripslashes($line->email));
                        break;
                    case 'it':
                        printf('<p>E-mail: <a href="mailto:%s" titre="email">%s</a></p>', 
                            stripslashes($line->email), stripslashes($line->email));
                        break;
                    case 'nl':
                        printf('<p>E-mail: <a href="mailto:%s" titre="email">%s</a></p>', 
                            stripslashes($line->email), stripslashes($line->email));
                        break;
                }              
            print('</div><!-- #detailEmail -->');
        print('</div><!-- #teamEmail -->');
    }
}
print('</div><!-- #content -->');
display_sidebar($pageAncestor);
display_footer();
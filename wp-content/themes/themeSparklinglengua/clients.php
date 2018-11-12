<?php
/*
 * Template Name: Clients
 */
display_header(); 
$pageAncestor = display_langue();
display_header_entete($pageAncestor);
global $post;
    print('<div id="teamBackground">');
        if (have_posts()){
            while (have_posts()) {
                the_post();
                the_content();
            }
        }
        //affichage du contenu du plugin SL Clients
        global $wpdb;
        $recup = $wpdb->get_results('SELECT * FROM '.$wpdb->prefix.'testimonialclients WHERE langue =\''.$pageAncestor.'\' ORDER BY order_testimonial_client ASC');
        print('<div id="carrousel">'); 
            $arrowLeft = get_template_directory_uri().'/img/arrow-left.png';
            $arrowLeftHover = get_template_directory_uri().'/img/arrow-left-hover.png';
            $arrowRight = get_template_directory_uri().'/img/arrow-right.png';
            $arrowRightHover = get_template_directory_uri().'/img/arrow-right-hover.png';
            print('<div id="carrouselContenu">');
                if($recup){
                    foreach ($recup as $line){
                        printf('<div id="divTemoignageContenu" name="temoignage-%s">', $line->testimonial_clients_id);
                            print('<div class="detailTranslatorText">');
                                printf('%s', nl2br(stripslashes($line->temoignage)));            
                            print('</div>');           
                            print('<div class="divLogo">');
                                printf('<a href="%s" titre="%s" target="_blank">', $line->link, $line->link);
                                printf('<img class="logoClient" src="%s" alt="logo %s" /></a>', $line->logo, stripslashes($line->societe));
                            print('</div><!-- .divLogo -->');
                            print('<div class="divSignature">');
                                printf('<p class="signatureClients">%s %s - %s<br><span class="nomClient">%s</span></p>', ucfirst(stripslashes($line->prenom)), strtoupper(stripslashes($line->nom)), stripslashes($line->statut), strtoupper(stripslashes($line->societe)));
                            print('</div><!-- #divSignature -->');
                        print('</div><!-- #divTemoignageContenu -->');
                    }        
                } else {
                    printf('<p style="color: #1A2038 !important;">');
                    spark_construction($pageAncestor);
                    printf('</p>');
                }
            print('</div><!-- #carrouselContenu -->');
            print('<div class="arrows">');
                printf('<img src="%s" alt="arrow left" id="arrowLeft" name="arrowLeft" onmouseover="document.arrowLeft.src=\'%s\'" onmouseout="document.arrowLeft.src=\'%s\'"/>', $arrowLeft, $arrowLeftHover, $arrowLeft);
                printf('<img src="%s" alt="arrow right" id="arrowRight" name="arrowRight" onmouseover="document.arrowRight.src=\'%s\'" onmouseout="document.arrowRight.src=\'%s\'"/>', $arrowRight, $arrowRightHover, $arrowRight);
                print('<span class="clear">&nbsp;</span>');
            print('</div><!-- .arrows -->');
        print('</div><!-- #carrousel -->');
        print('<div id="listeClients">');
            foreach ($recup as $line2){        
                $url = sprintf('%s?p=%s&testimonial=%s', get_page_link(), $post->ID, $line2->testimonial_clients_id);
                print('<div class="divClient">');
                    printf('<a href="%s" title="%s">', $url, $line2->societe);
                    printf('<img src="%s" alt="logo" class="logoClient" />', $line2->logo);
                    print('</a>');
                print('</div>');
            }   
        print('</div><!-- #listeClients -->');
    print('</div><!-- #teamBackground -->');
print('</div><!-- #content -->');  
if(isset($_GET['testimonial'])){
    if(!empty($_GET['testimonial'])){
        print('<div id="lightbox">');
        $recupTemoignage = $wpdb->get_row('SELECT * FROM '.$wpdb->prefix.'testimonialclients WHERE testimonial_clients_id =\''.$_GET['testimonial'].'\'');
        if($recupTemoignage){
            printf('<div class="detailTranslator">');
                print('<div class="detailTranslatorText">');
                    printf('%s', nl2br(stripslashes($recupTemoignage->temoignage)));            
                print('</div>');            
                print('<div class="divLogo">');
                    printf('<a href="%s" titre="%s" target="_blank">', $recupTemoignage->link, $recupTemoignage->link);
                    printf('<img class="logoClient" src="%s" alt="logo %s" />', $recupTemoignage->logo, stripslashes($recupTemoignage->societe));
                print('</a></div>');
                print('<div class="divSignatureLightbox">');
                    printf('<p class="signatureClients">%s %s - %s<br><span class="nomClient">%s</span></p>', ucfirst(stripslashes($recupTemoignage->prenom)), strtoupper(stripslashes($recupTemoignage->nom)), stripslashes($recupTemoignage->statut), strtoupper(stripslashes($recupTemoignage->societe)));
                print('</div>');
                printf('<a href="%s?p=%s" titre="clients"><div class="btnClose">x</div></a>', get_page_link(), $post->ID);
            print('</div>');
        }
        print('<span class="close">');        
        print('</span>');
        print('</div><!-- #lightbox -->');
        printf('<a href="%s?p=%s" titre="clients">', get_page_link(), $post->ID);
        print('<div id="lightbox-shadowTestimonial"></div><!-- #lightbox-shadowTestimonial -->');
        print('</a>');
    }
}
display_sidebar($pageAncestor);
display_footer();
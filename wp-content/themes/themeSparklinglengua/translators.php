<?php
/*
 * Template Name: Translators
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
        $recup = $wpdb->get_results('SELECT * FROM '.$wpdb->prefix.'testimonialpartners WHERE langue =\''.$pageAncestor.'\' ORDER BY order_testimonial_partner ASC');
        print('<div id="carrousel">'); 
            $arrowLeft = get_template_directory_uri().'/img/arrow-left.png';
            $arrowLeftHover = get_template_directory_uri().'/img/arrow-left-hover.png';
            $arrowRight = get_template_directory_uri().'/img/arrow-right.png';
            $arrowRightHover = get_template_directory_uri().'/img/arrow-right-hover.png';
            $portrait = get_template_directory_uri().'/img/portrait.jpg';    
            print('<div id="carrouselContenu">');
                if($recup){
                    foreach ($recup as $line){             
                        printf('<div id="divTemoignageContenu" name="temoignage-%s">', $line->testimonial_partners_id);
                            printf('<div class="clientTemoignage detailTranslatorText">%s</div>', nl2br(stripslashes($line->temoignage)));
                            printf('<div class="signature">%s %s - %s</div>', ucfirst(stripslashes($line->prenom)), strtoupper(stripslashes($line->nom)), stripslashes($line->langage));
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
        if($recup){
            print('<div id="listeTranslators">');
            foreach ($recup as $line2){        
                $url = sprintf('%s?testimonial=%s', get_page_link(), $line2->testimonial_partners_id);
                print('<div class="divTranslator translators">');
                    printf('<a href="%s" class="translatorLink" title="Translator">', $url); 
                        printf('%s', ucfirst(stripslashes($line2->prenom)));
                    print('</a>');
                print('</div>');
            }
            print('</div>');
        }
        if(isset($_GET['testimonial'])){
            if(!empty($_GET['testimonial'])){
                print('<div id="lightbox">');
                    print('<div class="detailTranslator">');
                        $recupTemoignage = $wpdb->get_row('SELECT * FROM '.$wpdb->prefix.'testimonialpartners WHERE testimonial_partners_id =\''.$_GET['testimonial'].'\'');
                        if($recupTemoignage){
                            printf('<div class="clientTemoignage detailTranslatorText">%s</div>', nl2br(stripslashes($recupTemoignage->temoignage)));    
                            printf('<div class="nameTranslator">%s %s - %s</div>', ucfirst(stripslashes($recupTemoignage->prenom)), strtoupper(stripslashes($recupTemoignage->nom)), stripslashes($recupTemoignage->langage));
                        }
                        printf('<a href="%s" title="translators"><div class="btnClose">X</div></a>', get_page_link());
                        print('</div><!-- class detailTranslator -->');
                print('</div><!-- #lightbox -->');
                print('<div id="lightbox-shadow">');                
                print('</div><!-- #lightbox-shadow -->');
            }
        }
    print('</div><!-- #teamBackground -->');   
print('</div><!-- #content -->');    
display_sidebar($pageAncestor);
display_footer();
<?php
/*
 * Template Name: Team
 */
display_header(); 
$pageAncestor = display_langue();
display_header_entete($pageAncestor); 
print('<div id="teamBackground">');
    if (have_posts()){
        while (have_posts()) {
            the_post();
            the_content();
        }
    }    
    //définition des textes en dur en fonction de la langue
    $enConstruction = '';
    $specialSkills = '';
    $sparklinglenguaTime = '';
    switch($pageAncestor){
        case 'en':
            $enConstruction = 'Under construction';
            $specialSkills = 'Special skills:';
            $sparklinglenguaTime = 'It\'s Sparkling time ';
            break;
        case 'de':
            $enConstruction = 'Seite in Arbeit ...';
            $specialSkills = 'Stärken :';
            $sparklinglenguaTime = 'It\'s Sparkling time ';
            break;
        case 'es':
            $enConstruction = 'Página en fase de elaboración';
            $specialSkills = 'Capacidades :';
            $sparklinglenguaTime = 'It\'s Sparkling time ';
            break;
        case 'fr':
            $enConstruction = 'En cours de construction...';
            $specialSkills = 'Compétences :';
            $sparklinglenguaTime = 'It\'s Sparkling time ';
            break;
        case 'it':
            $enConstruction = 'La pagina sarà disponibile a breve';
            $specialSkills = 'Competenze :';
            $sparklinglenguaTime = 'It\'s Sparkling time ';
            break;
        case 'nl':
            $enConstruction = 'Deze pagina is nog in aanbouw';
            $specialSkills = 'Speciale vaardigheden:';
            $sparklinglenguaTime = 'It\'s Sparkling time ';
            break;
    }
    //on affiche les membres de l'équipe en fonction de la langue de la page
    global $wpdb;
    $rows = $wpdb->get_results('SELECT * FROM '.$wpdb->prefix.'team WHERE langue = \''.$pageAncestor.'\' ORDER BY orderTeamMember ASC');
    if($rows){
        foreach ($rows as $row){
            print('<div class="tdPhotoTeam">');
            printf('<a href="?member=%s#lightbox" title="%s %s">', $row->team_member_id, $row->prenom, $row->nom);
            printf('<img class="imgTeam" src="%s" onmouseover="javascript:this.src=\'%s\';" onmouseout="javascript:this.src=\'%s\';" alt="%s">', $row->photo, $row->photoCouleur, $row->photo, $row->prenom);
            print('</a>');
            print('</div>');
        }
    } else {
        printf('<p>%s</p>', $enConstruction);
    }
    extract($_GET);       
    //affichage d'une lightbox pour voir le détail d'un membre de l'équipe    
    if(isset($_GET['member'])){
        if(!empty($_GET['member'])){
            //on récupère les détails du membre de l'équipe et on l'affiche dans une lightbox
            print('<div id="lightbox">');
            $rowMember = $wpdb->get_row('SELECT * FROM '.$wpdb->prefix.'team WHERE team_member_id = \''.$_GET['member'].'\'');
            printf('<img class="imgTeamLightbox" src="%s" onmouseover="javascript:this.src=\'%s\';"'
                    .' onmouseout="javascript:this.src=\'%s\';" alt="%s">', 
                    $rowMember->photo, $rowMember->photoCouleur, $rowMember->photo, $rowMember->prenom);
            print('<div class="detailTeamMember">');
                printf('<a href="%s" title="Team"><div class="btnClose">X</div></a>', get_page_link());
                printf('<h1>%s %s</h1>', ucwords($rowMember->prenom), strtoupper($rowMember->nom));
                printf('<h2>%s</h2>', ucwords($rowMember->statuts));
                printf('<h3>%s %s</h3>', $specialSkills, $rowMember->competences);
                printf('<p class="clientTemoignage">%s</p>', nl2br(stripslashes($rowMember->presentation)));
                printf('<p class="sparklingTimeDetails"><span class="sparklingTime">%s</span> %s</p>', $sparklinglenguaTime, nl2br(stripslashes($rowMember->sparklinglenguaTime)));
            print('</div>');
            print('</div><!-- #lightbox -->');
            print('<div id="lightbox-shadow">');
            print('</div><!-- #lightbox-shadow -->');
        }
    } 
    print('</div><!-- #teamBackground -->');     
print('</div><!-- #content -->');   
display_sidebar($pageAncestor);
display_footer();
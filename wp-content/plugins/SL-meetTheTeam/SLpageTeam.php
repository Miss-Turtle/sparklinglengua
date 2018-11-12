<?php
require_once 'style.html';
play_Jquery_team();
print('<div class="wrap">');
    printf('<h1>%s</h1>', get_admin_page_title());
    ?>
<span id="LSbtnHoverForm" class="btnAdd">
        <a href="admin.php?page=SLaddMemberTeam" title="Ajouter un nouveau membre">Ajouter un nouveau membre</a>
    </span>
    <p>Plugin servant à ajouter une présentation d'un nouveau membre de l'équipe de Sparkling Lengua</p>
    <h2>Membres de l'équipe enregistrés</h2>
    <?php 
    global $wpdb;
    //affiche les données en regroupant par langue
    $rowLangues = $wpdb->get_results('SELECT * FROM '.$wpdb->prefix.'team WHERE langue IS NOT NULL GROUP BY langue');                  
        
    if($rowLangues){
        foreach ($rowLangues as $rowLangue){        
        printf('<p id="%sParagrapheMemberTeam">Membre de l\'équipe pour la version <span class="bold maj orange">"%s"</span> du site</p>', $rowLangue->langue, $rowLangue->langue);
        }
        foreach ($rowLangues as $rowLangue){
        printf('<span id="%sLSbtnHover" class="btnHover">Langue 
          <span class="maj">"%s"</span></span>', $rowLangue->langue, $rowLangue->langue);        
        }        
        foreach ($rowLangues as $rowLangue){
            printf('<table id="%sTableMemberTeam" class="wp-list-table widefat fixed pages">', $rowLangue->langue);
            ?>
    <thead>
        <tr>
            <th style="width: 52px; height: 52px;">Photo</th>
            <th style="width: 52px; height: 52px;">Photo couleur</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Statut</th>
            <th>Email</th>
            <th style="text-align: center;">Ordre d'affichage</th>
            <th style="text-align: center; width: 70px;">Modifier</th>
            <th style="text-align: center; width: 80px;">Supprimer</th>
        </tr>
    </thead>
    <tbody>
    <?php
    //affiche les données des membres par langue
        $rowLangueTeamMembers = $wpdb->get_results('SELECT * FROM '.$wpdb->prefix.'team WHERE langue = \''.$rowLangue->langue.'\' ORDER BY orderTeamMember ASC');
            if($rowLangueTeamMembers){
                foreach ($rowLangueTeamMembers as $rowLangueTeamMember){
                    print('<tr>');
                    printf('<td><img src="%s" alt="photo" class="photoMiniature"/></td>', $rowLangueTeamMember->photo);
                    printf('<td><img src="%s" alt="photoCouleur" class="photoMiniature"/></td>', $rowLangueTeamMember->photoCouleur);
                    printf('<td>%s</td>', stripslashes($rowLangueTeamMember->nom));
                    printf('<td>%s</td>', stripslashes($rowLangueTeamMember->prenom));
                    printf('<td>%s</td>', stripslashes($rowLangueTeamMember->statuts));
                    printf('<td>%s</td>', $rowLangueTeamMember->email);
                    printf('<td class="aligncenter">%s</td>', $rowLangueTeamMember->orderTeamMember);
                    printf('<td class="aligncenter"><a href="admin.php?page=SLmodifyMemberTeam&member=%s" titre="modifier"><img class="btnModif" src="%s/img/modifier.png" alt="modifier"/></a></td>',$rowLangueTeamMember->team_member_id, get_template_directory_uri());
                    printf('<td class="aligncenter"><a href="admin.php?page=SLmemberTeam&member=%s&delete=verification" titre="supprimer"><img id="deleteMember" class="btnModif" src="%s/img/supprimer.png" alt="supprimer"/></a></td>', $rowLangueTeamMember->team_member_id, get_template_directory_uri());
                    print('</tr>');
                }
            }
            printf('</tbody>');
            printf('</table>');
        }
    }
    //on vérifie si une demande de suppression a été réalisée en récupérant le get passé dans le lien de suppression
    extract($_GET);
    if(isset($_GET['delete']) && isset($_GET['member'])){
        if(!empty($_GET['delete']) && $_GET['delete'] == 'verification' && !empty($_GET['member'])){
            print('<div id="lightbox">');
            print('<p class="bold">Voulez-vous supprimer définitivement ce membre de la base ?</p>');
            printf('<a href="admin.php?page=SLmemberTeam&member=%s&memberDelete=true" titre="supprimer"><span id="btnOkDelete">OK</span></a>', $_GET['member']);
            print('<a href="admin.php?page=SLmemberTeam" titre="annuler"><span id="btnAnnuleDelete">Annuler</span></a>');
            print('</div><!-- #lightbox -->');
            print('<div id="lightbox-shadow"></div><!-- #lightbox-shadow -->');      
        }
    }
    //on vérifie que la demande de suppréssion a été validée
        if(isset($_GET['memberDelete']) && isset($_GET['member'])){
            if(!empty($_GET['memberDelete']) && $_GET['memberDelete'] == 'true' && !empty($_GET['member'])){
                print('<div id="lightbox">');
                print('<p class="bold">Opération réussie</p>');
                print('<p class="bold">Membre supprimé de la base</p>');                      
                print('<a href="admin.php?page=SLmemberTeam" titre="team members"><span id="btnOk">OK</span></a>');                
                print('</div><!-- #lightbox -->');
                print('<div id="lightbox-shadow"></div><!-- #lightbox-shadow -->');  
                //on supprime du serveur l'image du membre
                $rowImgDelete = $wpdb->get_row('SELECT photo FROM '.$wpdb->prefix.'team WHERE team_member_id = \''.$_GET['member'].'\'');                
                $imgDeleteArray = explode('/', $rowImgDelete->photo);
                $imgDeleteNom = end($imgDeleteArray);
                $imgDelete = get_theme_root().'/themeSparklinglengua/img/team/'.$imgDeleteNom;
                $imgDefaut = get_theme_root().'/themeSparklinglengua/img/team/portrait.jpg';
                if(is_file($imgDelete)){//on vérifie que l'image à supprimer n'est pas celle par défaut
                    if($imgDelete != $imgDefaut){
                        unlink($imgDelete);
                    }                    
                }        
                //on supprime du serveur l'image couleur du membre
                $imgCouleurDeleteArray = explode('/', $rowImgDelete->photoCouleur);
                $imgCouleurDeleteNom = end($imgCouleurDeleteArray);
                $imgCouleurDelete = get_theme_root().'/themeSparklinglengua/img/teamCouleur/'.$imgCouleurDeleteNom;
                $imgCouleurDefaut = get_theme_root().'/themeSparklinglengua/img/teamCouleur/portrait.jpg';
                if(is_file($imgCouleurDelete)){//on vérifie que l'image à supprimer n'est pas celle par défaut
                    if($imgCouleurDelete != $imgCouleurDefaut){
                        unlink($imgCouleurDelete);
                    }                    
                }  
                $wpdb->delete($wpdb->prefix.'team', array('team_member_id' => $_GET['member']));              
            }
        }
        printf('<br>');
        printf('</div>');
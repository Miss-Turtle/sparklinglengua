<?php
require_once 'style.html';
play_Jquery_videos();
print('<div class="wrap">');
    printf('<h1>%s</h1>', get_admin_page_title());
    ?>
<span id="LSbtnHoverForm" class="btnAdd">
    <a href="admin.php?page=SLaddVideo" title="Ajouter une vidéo">Ajouter une vidéo</a>
</span>
<p>Plugin servant à ajouter une vidéo pour la page vidéos et photos</p>
<h2>Vidéos</h2>
<?php
global $wpdb;
//affiche les données en regroupant par langue
$rowVideos = $wpdb->get_results('SELECT * FROM '.$wpdb->prefix.'video WHERE videoLangue IS NOT NULL ORDER BY videoOrder ASC'); 
//.....................................................................................................
//test du nombre de vidéos sur chaque page pour afficher la liste des langues disponibles
$compteurEN = 0;
$compteurFR = 0;
$compteurDE = 0;
$compteurES = 0;
$compteurIT = 0;
$compteurNL = 0;
foreach ($rowVideos as $videoInfo) {    
    if($videoInfo->videoLangue == 'en'){
        $compteurEN++;
    }
    if($videoInfo->videoLangue == 'fr'){
        $compteurFR++;
    }
    if($videoInfo->videoLangue == 'de'){
        $compteurDE++;
    }
    if($videoInfo->videoLangue == 'es'){
        $compteurES++;
    }
    if($videoInfo->videoLangue == 'it'){
        $compteurIT++;
    }
    if($videoInfo->videoLangue == 'nl'){
        $compteurNL++;
    }
}
?>
<ul class="menuLangues">
    <?php if($compteurEN > 0){ ?>
        <li class="listeLangues langueEN">Page "EN"</li>
    <?php } 
    if($compteurFR > 0){ ?>
        <li class="listeLangues langueFR">Page "FR"</li>
    <?php    } 
    if($compteurDE > 0){ ?>
        <li class="listeLangues langueDE">Page "DE"</li>
    <?php    } 
    if($compteurES > 0){ ?>
        <li class="listeLangues langueES">Page "ES"</li>
    <?php    }  
    if($compteurIT > 0){ ?>
        <li class="listeLangues langueIT">Page "IT"</li>
    <?php    } 
    if($compteurNL > 0){ ?>
        <li class="listeLangues langueNL">Page "NL"</li>
    <?php    } ?>    
</ul>
<table>
    <tr>
        <th>Titre vidéo</th>
        <th>Ordre d'affichage</th>
        <th>Modifier</th>
        <th>Supprimer</th>
    </tr>
    <tr class="enLigneTable"></tr>
    <?php 
    if(count($rowVideos > 0)){
        foreach($rowVideos as $video){
            ?>
            <tr class="<?php printf('%sLigneTable', $video->videoLangue); ?>">
                <td><?php printf('%s', $video->videoTitre); ?></td>
                <td  style="text-align: center;"><?php printf('%s', $video->videoOrder); ?></td>
                <td  style="text-align: center;">
                    <a href="admin.php?page=SLmodifyVideo&video=<?php printf('%s', $video->videoID); ?>" 
                    titre="modifier">
                        <img class="btnModif" src="<?php printf('%s', get_template_directory_uri()); ?>/img/modifier.png" alt="modifier"/>
                    </a>
                </td>
                <td  style="text-align: center;">
                    <a href="admin.php?page=SLVideo&video=<?php printf('%s', $video->videoID); ?>&delete=verification" titre="supprimer">
                        <img class="btnModif" src="<?php printf('%s', get_template_directory_uri()); ?>/img/supprimer.png" alt="supprimer"/>
                    </a>
                </td>
            </tr>
            <?php
        } 
    }
    ?>
</table>
<?php
//on vérifie si une demande de suppression a été réalisée en récupérant le get passé dans le lien de suppression
    extract($_GET);
    if(isset($_GET['delete']) && isset($_GET['video'])){
        if(!empty($_GET['delete']) && $_GET['delete'] == 'verification' && !empty($_GET['video'])){
            print('<div id="lightbox">');
            print('<p class="bold">Supprimer définitivement cette vidéo ?</p>');
            printf('<a href="admin.php?page=SLVideo&video=%s&videoDelete=true" titre="supprimer"><span id="btnOkDelete">OK</span></a>', $_GET['video']);
            print('<a href="admin.php?page=SLVideo" titre="annuler"><span id="btnAnnuleDelete">Annuler</span></a>');
            print('</div><!-- #lightbox -->');
            print('<div id="lightbox-shadow"></div><!-- #lightbox-shadow -->');      
        }
    }
    //on vérifie que la demande de suppréssion a été validée
        if(isset($_GET['videoDelete']) && isset($_GET['video'])){
            if(!empty($_GET['videoDelete']) && $_GET['videoDelete'] == 'true' && !empty($_GET['video'])){
                print('<div id="lightbox">');
                print('<p class="bold">Opération réussie</p>');
                print('<p class="bold">Vidéo supprimée</p>');                      
                print('<a href="admin.php?page=SLVideo" titre="video members"><span id="btnOk">OK</span></a>');                
                print('</div><!-- #lightbox -->');
                print('<div id="lightbox-shadow"></div><!-- #lightbox-shadow -->');  
                //on supprime du serveur la vidéo
                
                $rowDelete = $wpdb->get_row('SELECT video FROM '.$wpdb->prefix.'videos WHERE videoID = \''.$_GET['video'].'\'');                
                $videoDeleteArray = explode('/', $rowDelete->videoUri); 
                $videoDeleteNom = end($videoDeleteArray);
                $videoFileDelete = get_theme_root().'/themeSparklinglengua/videos/'.$videoDeleteNom;
                if(is_file($videoFileDelete)){
                    unlink($videoFileDelete);
                }   
                $wpdb->delete($wpdb->prefix.'video', array('videoID' => $_GET['video']));              
            }
        }
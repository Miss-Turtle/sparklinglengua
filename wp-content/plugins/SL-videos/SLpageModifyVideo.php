<?php
require_once 'style.html';
global $wpdb;
/*-----------------------------------------------------------------------------------------
Verification d'un retour d'information du paramètre [get]
-----------------------------------------------------------------------------------------*/
if(isset($_GET['video'])){
    $videoAModifier = $wpdb->get_row('SELECT * FROM '.$wpdb->prefix.'video WHERE videoID = \''.$_GET['video'].'\'');
}
/*..................................................................................
ON VERIFIE SI UN FICHIER VIDEO EST TRANSMIS
..................................................................................*/
$row = $wpdb->get_row('SELECT * FROM '.$wpdb->prefix.'video WHERE videoID = \''.$videoAModifier->videoID.'\'');
$videoID = $row->videoID;
//si un champ de téléchargement est présent
if(isset($_FILES['video'])){ 
    //si aucune erreur détectée sur le fichier
    if($_FILES['video']['error'] == 0){                     
        //si pas d'erreur dans le fichier on supprime celui déjà présent sur le serveur
        $videoDeleteArray = explode('/', $videoAModifier->videoUri); 
        $videoDeleteNom = end($videoDeleteArray);
        $videoFileDelete = get_theme_root().'/themeSparklinglengua/videos/'.$videoDeleteNom;
        if(is_file($videoFileDelete)){
            unlink($videoFileDelete);
        }
        //téléchargement du fichier video dans le dossier video
        $chemin = get_template_directory_uri().'/videos/'.$videoAModifier->videoID.'-'.$_FILES['video']['name'];
        $chemin2 = get_theme_root().'/themeSparklinglengua/videos/'.$videoAModifier->videoID.'-'.$_FILES['video']['name'];
        move_uploaded_file($_FILES['video']['tmp_name'], $chemin2);
        //mise à jour de la base avec l'emplacement de l'image téléchargée
        $wpdb->update($wpdb->prefix."video", ['videoUri' => $chemin], ['videoID'=> $videoAModifier->videoID]);
    }
}
/*-----------------------------------------------------------------------------------------
Verification d'un retour d'information du formulaire [post] et [files]
-----------------------------------------------------------------------------------------*/
if(isset($_POST)){
	if(!empty($_POST['langue']) && !empty($_POST['titre'])){
		$langue = $_POST['langue'];
		$ordre = $_POST['orderVideo'];
		$titre = $_POST['titre'];
        $code = $_POST['code'];
		//die();
		$wpdb->update($wpdb->prefix."video", [
			'videoLangue' => $langue,
			'videoOrder' => $ordre,
			'videoTitre' => $titre,
            'videoLien' => $code,
		], 
        ['videoID'=> $videoAModifier->videoID]);	
        print('<div id="lightbox">');
        print('<p class="bold">Vidéo modifiée</p>');
        print('<a href="admin.php?page=SLVideo" titre="ok"><span id="btnOk">OK</span></a>');
        print('</div><!-- #lightbox -->');
        print('<div id="lightbox-shadow">');                
        print('</div><!-- #lightbox-shadow -->'); 	
	}
}

?>
<h1>Modifier une vidéo</h1>
<a href="admin.php?page=SLVideo" title="liste vidéos" class="listeVideos">Retour à la liste des vidéos</a>
<p class="bold">Les champs renseignés avec une <span class="etoile">*</span> sont requis.</p>
<form action="admin.php?page=SLmodifyVideo&video=<?php print($videoAModifier->videoID);?>" method="post" enctype="multipart/form-data">
    <table id="formTableAddVideo">
        <tr>
            <td class="labelForm">
	            <label for="langue">Langue :</label>
	            <p class="etoile">*</p>
            </td>
            <td id="langue">
                <input name="langue" type="radio" value="en"  
                       <?php if($videoAModifier->videoLangue == 'en'){ print('checked="checked"'); } ?>/>EN
                <input name="langue" type="radio" value="fr"  
                       <?php if($videoAModifier->videoLangue == 'fr'){ print('checked="checked"'); } ?>/>FR            
                <input name="langue" type="radio" value="es"  
                       <?php if($videoAModifier->videoLangue == 'es'){ print('checked="checked"'); } ?>/>ES
                <input name="langue" type="radio" value="de"  
                       <?php if($videoAModifier->videoLangue == 'de'){ print('checked="checked"'); } ?>/>DE
                <input name="langue" type="radio" value="it"  
                       <?php if($videoAModifier->videoLangue == 'it'){ print('checked="checked"'); } ?>/>IT
                <input name="langue" type="radio" value="nl" 
                       <?php if($videoAModifier->videoLangue == 'nl'){ print('checked="checked"'); } ?>/>NL
            </td>
        </tr>
        <tr>
            <td class="labelForm"><label for="orderVideo">Ordre d'affichage :</label></td>
            <td>
            	<input id="orderTeamMember" name="orderVideo" type="text" 
                value="<?php print($videoAModifier->videoOrder); ?>"/>
            </td>
            
        </tr>
        <tr>
            <td class="labelForm">
	            <label for="titre">Titre :</label>
	            <p class="etoile">*</p>
            </td>
            <td>
            	<input id="titre" name="titre" type="text" value="<?php print($videoAModifier->videoTitre); ?>" autocomplete="off" required/>
            </td>            
        </tr>
        <tr>
            <td class="labelForm">
                <label for="code">Vidéo code :</label>
            </td>
            <td>
                <?php if(!empty($videoAModifier->videoLien)){ 
                    print(stripslashes($videoAModifier->videoLien));
                } ?><br>
                <textarea id="code" name="code" autocomplete="off" 
                style="width: 100%; height: 70px;"><?php print(stripslashes($videoAModifier->videoLien)); ?>
                </textarea>
            </td>            
        </tr>
        <tr>
            <td class="labelForm">
            	<label for="video">Vidéo :</label>
            </td>
            <td>
            <?php if(!empty($videoAModifier->videoUri)){ ?>
            <video width="250px" controls="controls">
                <source src="<?php print($videoAModifier->videoUri); ?>" type="video/mp4">
                <p><a href="/media/video.oga">Download this video file.</a></p>
            </video><br>
            <?php } ?>
                <p class="fileTaille">Taille maximum autorisée : 2Go</p>
                <input type="hidden" name="MAX_FILE_SIZE" value="2000000000" />
                <input id="video" name="video" type="file"/>
            </td>
        </tr>
        <tr>
            <td>
            	<label class="labelForm"></label>
            </td>
            <td>
            	<input value="Enregistrer" type="submit" style="font-weight: bold;"/>
            </td>
        </tr>
    </table>
</form>
</div>
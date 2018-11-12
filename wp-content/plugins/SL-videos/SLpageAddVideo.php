<?php
require_once 'style.html';
/*-----------------------------------------------------------------------------------------
Verification d'un retour d'information du formulaire [post] et [files]
-----------------------------------------------------------------------------------------*/
if(isset($_POST)){
	if(!empty($_POST['langue']) && !empty($_POST['titre'])){
		$langue = $_POST['langue'];
		$ordre = $_POST['orderVideo'];
		if(!empty($_POST['orderVideo']) || $_POST['orderVideo'] == NULL){
			$ordre = '0';
		}
		$titre = $_POST['titre'];
		$code = $_POST['code'];
		global $wpdb;
		$wpdb->insert($wpdb->prefix."video", [
			'videoLangue' => $langue,
			'videoOrder' => $ordre,
			'videoTitre' => $titre,
			'videoLien' => $code,
		]);
		$id = $wpdb->insert_id;
		/*..................................................................................
		ON VERIFIE SI UN FICHIER VIDEO EST TRANSMIS
		..................................................................................*/
		$row = $wpdb->get_row('SELECT * FROM '.$wpdb->prefix.'video WHERE videoID = \''.$id.'\'');
		$videoID = $row->videoID;
		//si un champ de téléchargement est présent
		if(isset($_FILES)){ 
			//si aucune erreur détectée sur le fichier
			if($_FILES['video']['error'] == 0){                     
				//téléchargement du fichier video dans le dossier video
				$chemin = get_template_directory_uri().'/videos/'.$videoID.'-'.$_FILES['video']['name'];
				$chemin2 = get_theme_root().'/themeSparklinglengua/videos/'.$videoID.'-'.$_FILES['video']['name'];
				move_uploaded_file($_FILES['video']['tmp_name'], $chemin2);
				//mise à jour de la base avec l'emplacement de l'image téléchargée
				$wpdb->update($wpdb->prefix."video", array('videoUri' => $chemin), array('videoID' => $videoID));                    
			}
		}
		print('<div id="lightbox">');
		print('<p class="bold">Nouvelle vidéo enregistrée</p>');
		print('<a href="admin.php?page=SLVideo" titre="ok"><span id="btnOk">OK</span></a>');
		print('</div><!-- #lightbox -->');
		print('<div id="lightbox-shadow">');                
		print('</div><!-- #lightbox-shadow -->');
	}
}

?>
<h1>Ajouter une vidéo</h1>
<a href="admin.php?page=SLVideo" title="liste vidéos" class="listeVideos">Retour à la liste des vidéos</a>
<p class="bold">Les champs renseignés avec une <span class="etoile">*</span> sont requis.</p>
<form action="admin.php?page=SLaddVideo" method="post" enctype="multipart/form-data">
    <table id="formTableAddVideo">
        <tr>
            <td class="labelForm">
	            <label for="langue">Langue :</label>
	            <p class="etoile">*</p>
            </td>
            <td id="langue">
                <input name="langue" type="radio" value="en" />EN
                <input name="langue" type="radio" value="fr" />FR            
                <input name="langue" type="radio" value="es" />ES
                <input name="langue" type="radio" value="de" />DE
                <input name="langue" type="radio" value="it" />IT
                <input name="langue" type="radio" value="nl" />NL
            </td>
        </tr>
        <tr>
            <td class="labelForm"><label for="orderVideo">Ordre d'affichage :</label></td>
            <td>
            	<input id="orderTeamMember" name="orderVideo" type="text" />
            </td>
            
        </tr>
        <tr>
            <td class="labelForm">
	            <label for="titre">Titre :</label>
	            <p class="etoile">*</p>
            </td>
            <td>
            	<input id="titre" name="titre" type="text" autocomplete="off" required/>
            </td>            
        </tr>
        <tr>
            <td class="labelForm">
	            <label for="code">Vidéo code :</label>
            </td>
            <td>
            	<p class="fileTaille">Exemple : intégration d'un code YouTube (iframe)</p><br>
            	<textarea id="code" name="code" autocomplete="off" style="width: 100%; height: 70px;"></textarea>
            </td>            
        </tr>
        <tr>
            <td class="labelForm">
            	<label for="video">Vidéo :</label>
            </td>
            <td>
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
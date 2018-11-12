<?php 
require_once 'style.html';
play_Jquery_team();
if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['statuts']) && isset($_POST['email']) && isset($_POST['langue'])){   
    if(!empty($_POST['langue'])){         
        global $wpdb;
        $orderTeamMember = $_POST['orderTeamMember'];
        $langue = $_POST['langue'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $competences = $_POST['competences'];
        $statuts = $_POST['statuts'];
        $email = $_POST['email'];
        $presentation = $_POST['presentation'];
        $sparklinglenguaTime = $_POST['sparklinglenguaTime'];

        //on intègre les informations des champs en base
		if(!empty($orderTeamMember)){
			$wpdb->insert($wpdb->prefix."team", array(
				'orderTeamMember' => $orderTeamMember,
				'langue' => $langue,
				'nom' => $nom,
				'prenom' => $prenom,
				'competences' => $competences,
				'statuts' => $statuts,
				'email' => $email,
				'presentation' => $presentation,
				'sparklinglenguaTime' => $sparklinglenguaTime
			));
		} else {
			$wpdb->insert($wpdb->prefix."team", array(
				'langue' => $langue,
				'nom' => $nom,
				'prenom' => $prenom,
				'competences' => $competences,
				'statuts' => $statuts,
				'email' => $email,
				'presentation' => $presentation,
				'sparklinglenguaTime' => $sparklinglenguaTime
			));
		}

		//récupération de données dans l'enregistrement qui vient d'être fait
		$row2 = $wpdb->get_row('SELECT * FROM '.$wpdb->prefix.'team WHERE email = \''.$email.'\'');
        $idMember = $row2->team_member_id;
        
		//si un champ de téléchargement est présent
		if(isset($_FILES)){ 
			//si aucune erreur détectée sur le fichier
			if($_FILES['photo']['error'] == 0){                     
				//téléchargement du fichier image dans le dossier image du template
				$chemin = get_template_directory_uri().'/img/team/'.$idMember.'-'.$_FILES['photo']['name'];
				$chemin2 = get_theme_root().'/themeSparklinglengua/img/team/'.$idMember.'-'.$_FILES['photo']['name'];
				move_uploaded_file($_FILES['photo']['tmp_name'], $chemin2);

				//mise à jour de la base avec l'emplacement de l'image téléchargée
				$wpdb->update($wpdb->prefix."team", array('photo' => $chemin), array('email' => $email));   
			}

			if($_FILES['photoCouleur']['error'] == 0){             
				//téléchargement du fichier image dans le dossier image du template
				$cheminCouleur = get_template_directory_uri().'/img/teamCouleur/'.$idMember.'-couleur-'.$_FILES['photoCouleur']['name'];
				$cheminCouleur2 = get_theme_root().'/themeSparklinglengua/img/teamCouleur/'.$idMember.'-couleur-'.$_FILES['photoCouleur']['name'];
                move_uploaded_file($_FILES['photoCouleur']['tmp_name'], $cheminCouleur2);
                
				//mise à jour de la base avec l'emplacement de l'image téléchargée
				$wpdb->update($wpdb->prefix."team", array('photoCouleur' => $cheminCouleur), array('email' => $email));    
			}
		}

		print('<div id="lightbox">');
		print('<p class="bold">Nouveau membre enregistré</p>');
		print('<a href="admin.php?page=SLmemberTeam" titre="ok"><span id="btnOk">OK</span></a>');
		print('</div><!-- #lightbox -->');
		print('<div id="lightbox-shadow">');           
		print('</div><!-- #lightbox-shadow -->');
    }        

} 

print('<div class="wrap">');
printf('<h1>%s</h1><span id="LSbtnHoverForm" class="btnAdd"><a href="admin.php?page=SLaddMemberTeam" title="Ajouter un nouveau membre">Ajouter un nouveau membre</a></span>', get_admin_page_title()); 
?>

<p>Renseignez les informations du nouveau membre de l'équipe de Sparkling Lengua dans le formulaire.</p>
<p class="bold">Les champs renseignés avec une <span class="etoile">*</span> sont requis.</p>
<form action="admin.php?page=SLaddMemberTeam" method="post" enctype="multipart/form-data">
    <table id="formTableAddMember">
        <tr>
            <td class="labelForm"><label for="langue">Langue :</label><p class="etoile">*</p></td>
            <td id="langue">
                <input name="langue" type="radio" value="en"  
                       <?php if($langue == 'en'){ print('checked="checked"'); } ?>/>EN
                <input name="langue" type="radio" value="fr"  
                       <?php if($langue == 'fr'){ print('checked="checked"'); } ?>/>FR       
                <input name="langue" type="radio" value="es"  
                       <?php if($langue == 'es'){ print('checked="checked"'); } ?>/>ES
                <input name="langue" type="radio" value="de"  
                       <?php if($langue == 'de'){ print('checked="checked"'); } ?>/>DE
                <input name="langue" type="radio" value="it"  
                       <?php if($langue == 'it'){ print('checked="checked"'); } ?>/>IT
                <input name="langue" type="radio" value="nl" 
                       <?php if($langue == 'nl'){ print('checked="checked"'); } ?>/>NL
            </td>
            <td class="td230px"><p id="pErrorFormLangue">Renseigner la "Langue"</p></td>
        </tr>
        <tr>
            <td class="labelForm"><label for="orderTeamMember">Ordre d'affichage :</label></td>
            <td><input id="orderTeamMember" name="orderTeamMember" type="text" value="<?php print(stripslashes($row->orderTeamMember)); ?>"/></td>
            <td class="td230px"></td>
        </tr>
        <tr>
            <td class="labelForm"><label for="nom">Nom :</label></td>
            <td><input id="nom" name="nom" type="text" value="<?php print($nom); ?>" autocomplete="off" /></td>
            <td class="td230px"><p id="pErrorFormNom">Renseigner le "Nom"</p></td>
        </tr>
        <tr>
            <td class="labelForm"><label for="prenom">Prénom :</label></td>
            <td><input id="prenom" name="prenom" type="text" value="<?php print($prenom); ?>" autocomplete="off" /></td>
            <td class="td230px"><p id="pErrorFormPrenom">Renseigner le "Prénom"</p></td>
        </tr>
        <tr>
            <td class="labelForm"><label for="statuts">Poste :</label></td>
            <td><input id="statuts" name="statuts" type="text" value="<?php print($statuts); ?>" autocomplete="off" /></td>
            <td class="td230px"><p id="pErrorFormPoste">Renseigner le "Poste"</p></td>
        </tr>
        <tr>
            <td class="labelForm"><label for="email">Email :</label></td>
            <td><input id="email" name="email" type="email" value="<?php print($email); ?>" placeholder="mail@domain.com" autocomplete="off" /></td>
            <td class="td230px"><p id="pErrorFormEmail">Renseigner un "Email"</p></td>
        </tr>
        <tr>
            <td class="labelForm"><label for="competences">Compétences :</label></td>
            <td><textarea id="competences" name="competences" style="width: 100%; height: 80px;"><?php print($competences); ?></textarea></td>
            <td class="td230px"></td>
        </tr>
        <tr>
            <td class="labelForm"><label for="presentation">Présentation :</label></td>
            <td><?php wp_editor(stripslashes($presentation), 'presentation'); ?></td>
            <td class="td230px"></td>
        </tr>
        <tr>
            <td class="labelForm"><label for="sparklinglenguaTime">Sparkling Time :</label></td>
            <td><textarea id="sparklinglenguaTime" name="sparklinglenguaTime" style="width: 100%; height: 150px;"><?php print($sparklinglenguaTime); ?></textarea></td>
            <td class="td230px"></td>
        </tr>
        <tr>
            <td class="labelForm"><label for="photo">Photo :</label></td>
            <td><img src="<?php print(get_template_directory_uri().'/img/team/portrait.jpg'); ?>" class="photoMiniature" alt="photo" style="float: left; margin-right: 10px;"/>
                <p class="fileTaille">Taille maximum autorisée : 2Mo</p>
                <input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
                <input id="photo" name="photo" type="file"/></td>
            <td class="td230px"></td>
        </tr>
        <tr>
            <td class="labelForm"><label for="photoCouleur">Photo couleur:</label></td>
            <td><img src="<?php print(get_template_directory_uri().'/img/team/portrait.jpg'); ?>" class="photoMiniature" alt="photoCouleur" style="float: left; margin-right: 10px;"/>
                <p class="fileTaille">Taille maximum autorisée : 2Mo</p>
                <input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
                <input id="photoCouleur" name="photoCouleur" type="file"/></td>
            <td class="td230px"></td>
        </tr>
        <tr>
            <td><label class="labelForm"></label></td>
            <td><input value="Enregistrer" type="submit" style="font-weight: bold;"/></td>
            <td class="td230px"></td>
        </tr>
    </table>
</form>
</div>


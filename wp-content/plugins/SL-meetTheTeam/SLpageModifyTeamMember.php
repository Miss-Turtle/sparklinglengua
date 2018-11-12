<?php 

require_once 'style.html';

play_Jquery_team();

extract($_GET);

extract($_POST);

extract($_FILES);

if(isset($_GET['member'])){

    if(!empty($_GET['member'])){

        global $wpdb;

        $row = $wpdb->get_row('SELECT * FROM '.$wpdb->prefix.'team WHERE team_member_id = \''.$_GET['member'].'\'');

    }

}

?>

<div class="wrap">

<h1>Modifier les informations d'un membre de l'équipe<?php get_admin_page_title(); ?></h1>

<span id="LSbtnHoverForm" class="btnAdd">

    <a href="admin.php?page=SLaddMemberTeam" title="Ajouter un nouveau membre">Ajouter un nouveau membre</a>

</span>

<p>Renseignez les informations du membre de l'équipe de Sparkling Lengua à modifier ou compléter dans le formulaire.</p>

<p class="bold">Les champs renseignés avec une <span class="etoile">*</span> sont requis.</p>

<form action="admin.php?page=SLmodifyMemberTeam&member=<?php print($row->team_member_id); ?>" method="post" enctype="multipart/form-data">

    <table id="formTableAddMember">

        <tr>

            <td class="labelForm"><label for="langue">Langue :</label><p class="etoile">*</p></td>

            <td id="langue">

                <input name="member" type="hidden" value="$row->team_member_id"/>

                <input name="langue" type="radio" value="en"  

                       <?php if($row->langue == 'en'){ print('checked="checked"'); } ?>/>EN

                <input name="langue" type="radio" value="fr"  

                       <?php if($row->langue == 'fr'){ print('checked="checked"'); } ?>/>FR            

                <input name="langue" type="radio" value="es"  

                       <?php if($row->langue == 'es'){ print('checked="checked"'); } ?>/>ES

                <input name="langue" type="radio" value="de"  

                       <?php if($row->langue == 'de'){ print('checked="checked"'); } ?>/>DE

                <input name="langue" type="radio" value="it"  

                       <?php if($row->langue == 'it'){ print('checked="checked"'); } ?>/>IT

                <input name="langue" type="radio" value="nl" 

                       <?php if($row->langue == 'nl'){ print('checked="checked"'); } ?>/>NL

            </td>

            <td class="td230px"><p id="pErrorFormLangue">Renseigner le champ "Langue"</p></td>

        </tr>

        <tr>

            <td class="labelForm"><label for="orderTeamMember">Ordre d'affichage :</label></td>

            <td><input id="orderTeamMember" name="orderTeamMember" type="text" value="<?php print(stripslashes($row->orderTeamMember)); ?>"/></td>

            <td class="td230px"></td>

        </tr>

        <tr>

            <td class="labelForm"><label for="nom">Nom :</label><p class="etoile">*</p></td>

            <td><input id="nom" name="nom" type="text" value="<?php print(stripslashes($row->nom)); ?>"/></td>

            <td class="td230px"><p id="pErrorFormNom">Renseigner le champ "Nom"</p></td>

        </tr>

        <tr>

            <td class="labelForm"><label for="prenom">Prénom :</label><p class="etoile">*</p></td>

            <td><input id="prenom" name="prenom" type="text" value="<?php print(stripslashes($row->prenom)); ?>"/></td>

            <td class="td230px"><p id="pErrorFormPrenom">Renseigner le champ "Prénom"</p></td>

        </tr>

        <tr>

            <td class="labelForm"><label for="statuts">Poste :</label><p class="etoile">*</p></td>

            <td><input id="statuts" name="statuts" type="text" value="<?php print(stripslashes($row->statuts)); ?>"/></td>

            <td class="td230px"><p id="pErrorFormPoste">Renseigner le champ "Poste"</p></td>

        </tr>

        <tr>

            <td class="labelForm"><label for="email">Email :</label><p class="etoile">*</p></td>

            <td><input id="email" name="email" type="email" value="<?php print($row->email); ?>"/></td>

            <td class="td230px"><p id="pErrorFormEmail">Renseigner le champ "Email"</p></td>

            </tr>

        <tr>

            <td class="labelForm"><label for="competences">Compétences :</label></td>

            <td><textarea id="competences" name="competences" style="width: 100%; height: 80px;"><?php print(stripslashes($row->competences)); ?></textarea></td>

            <td class="td230px"></td>

        </tr>

        <tr>

            <td class="labelForm"><label for="presentation">Présentation :</label></td>

            <td><?php wp_editor(stripslashes($row->presentation), 'presentation'); ?></td>

            <td class="td230px"></td>

        </tr>

        <tr>

            <td class="labelForm"><label for="sparklinglenguaTime">Sparkling Time :</label></td>

            <td><textarea id="sparklinglenguaTime" name="sparklinglenguaTime" style="width: 100%; height: 150px;"><?php print(stripslashes($row->sparklinglenguaTime)); ?></textarea></td>

            <td class="td230px"></td>

        </tr>

        <tr>

            <td class="labelForm"><label for="photo">Photo :</label></td>

            <td><img src="<?php print($row->photo); ?>" class="photoMiniature" alt="photo" style="float: left; margin-right: 10px;"/>

                <p class="fileTaille">Taille maximum autorisée : 2Mo</p>

                <input type="hidden" name="MAX_FILE_SIZE" value="2000000" />

                <input id="photo" name="photo" type="file"/></td>

            <td class="td230px"></td>

        </tr>

        <tr>

            <td class="labelForm"><label for="photoCouleur">Photo couleur :</label></td>

            <td><img src="<?php print($row->photoCouleur); ?>" class="photoMiniature" alt="photoCouleur" style="float: left; margin-right: 10px;"/>

                <p class="fileTaille">Taille maximum autorisée : 2Mo</p>

                <input type="hidden" name="MAX_FILE_SIZE" value="2000000" />

                <input id="photoCouleur" name="photoCouleur" type="file"/></td>

            <td class="td230px"></td>

        </tr>

        <tr>

            <td><label class="labelForm"></label></td>

            <td><input value="Enregistrer" type="submit" style="font-weight: bold;"/></td>

            <td class="td220px"></td>

        </tr>

    </table>

</form>



<?php

//récupération des données dans l'enregistrement qui vient d'être fait

$idMember = $row->team_member_id;

$imgDeleteArray = explode('/', $row->photo);

$imgDeleteNom = end($imgDeleteArray);

$imgDelete = get_theme_root().'/themeSparklinglengua/img/team/'.$imgDeleteNom;

$imgDefaut = get_theme_root().'/themeSparklinglengua/img/team/portrait.jpg';

$imgCouleurDeleteArray = explode('/', $row->photoCouleur);

$imgCouleurDeleteNom = end($imgDeleteArray);

$imgCouleurDelete = get_theme_root().'/themeSparklinglengua/img/teamCouleur/'.$imgCouleurDeleteNom;

$imgCouleurDefaut = get_theme_root().'/themeSparklinglengua/img/teamCouleur/portrait.jpg';

//si un champ de téléchargement photo est présent

if(isset($_FILES['photo'])){ 

    //si aucune erreur détectée sur le fichier

    if($_FILES['photo']['error'] == 0){                                     

        //suppression de la photo précédente si ce n'est pas l'image par défaut

        if(is_file($imgDelete)){ 

            if($imgDelete != $imgDefaut){

                unlink($imgDelete);

            }                

        }

        //téléchargement du fichier image dans le dossier image du template

        $chemin = get_template_directory_uri().'/img/team/'.$idMember.'-'.$_FILES['photo']['name'];

        $chemin2 = get_theme_root().'/themeSparklinglengua/img/team/'.$idMember.'-'.$_FILES['photo']['name'];

        move_uploaded_file($_FILES['photo']['tmp_name'], $chemin2);

        //mise à jour de la base avec l'emplacement de l'image téléchargée

        $wpdb->update($wpdb->prefix."team", array('photo' => $chemin), array('team_member_id' => $row->team_member_id));        

    }

}

//si un champ de téléchargement photo couleur est présent

if(isset($_FILES['photoCouleur'])){ 

    //si aucune erreur détectée sur le fichier

    if($_FILES['photoCouleur']['error'] == 0){                                     

        //suppression de la photo précédente si ce n'est pas l'image par défaut

        if(is_file($imgCouleurDelete)){ 

            if($imgCouleurDelete != $imgCouleurDefaut){

                unlink($imgCouleurDelete);

            }                

        }

        //téléchargement du fichier image couleur dans le dossier image du template

        $cheminCouleur = get_template_directory_uri().'/img/teamCouleur/'.$idMember.'-couleur-'.$_FILES['photoCouleur']['name'];

        $cheminCouleur2 = get_theme_root().'/themeSparklinglengua/img/teamCouleur/'.$idMember.'-couleur-'.$_FILES['photoCouleur']['name'];

        move_uploaded_file($_FILES['photoCouleur']['tmp_name'], $cheminCouleur2);

        //mise à jour de la base avec l'emplacement de l'image téléchargée

        $wpdb->update($wpdb->prefix."team", array('photoCouleur' => $cheminCouleur), array('team_member_id' => $row->team_member_id));        

    }

}



//mise à jour des champs textuels

if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['statuts']) && isset($_POST['email']) && isset($_POST['langue'])){      

        if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['statuts']) && !empty($_POST['email']) && !empty($_POST['langue'])){            

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



            $wpdb->update($wpdb->prefix."team", array(

                    'orderTeamMember' => $orderTeamMember,

                    'langue' => $langue,

                    'nom' => $nom,

                    'prenom' => $prenom,

                    'competences' => $competences,

                    'statuts' => $statuts,

                    'email' => $email,

                    'presentation' => $presentation,

                    'sparklinglenguaTime' => $sparklinglenguaTime

                ),

                array('team_member_id' => $row->team_member_id));                              

                print('<div id="lightbox">');

                print('<p class="bold">Modification enregistrée</p>');

                print('<a href="admin.php?page=SLmemberTeam" titre="ok"><span id="btnOk">OK</span></a>');

                print('</div><!-- #lightbox -->');

                print('<div id="lightbox-shadow">');                

                print('</div><!-- #lightbox-shadow -->');  

        }        

    }

    ?>

</div>


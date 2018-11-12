<?php
require_once 'style.html';
play_jquery_clients();
extract($_POST);
extract($_FILES);
//on vérifie si des données ont été envoyées par le formulaire
if(isset($_POST['langue']) && isset($_POST['societe']) && isset($_POST['nom']) && isset($_POST['prenom'])
        && isset($_POST['statut']) && isset($_POST['temoignage'])&& isset($_POST['link'])){
    if(!empty($_POST['langue']) && !empty($_POST['societe']) && !empty($_POST['nom']) && !empty($_POST['prenom'])
        && !empty($_POST['statut']) && !empty($_POST['temoignage'])){
        $order_testimonial_client = $_POST['order_testimonial_client'];
        $langue = $_POST['langue'];
        $societe = $_POST['societe'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $statut = $_POST['statut'];
        $temoignage = $_POST['temoignage'];
        $link = $_POST['link'];
        
        //on vérifie que la société n'existe pas déjà en base
        global $wpdb;
        //on rentre les données en base        
        $wpdb->insert($wpdb->prefix.'testimonialclients', array(
            'order_testimonial_client' => $order_testimonial_client,
            'langue' => $langue,
            'societe' => $societe,
            'nom' => $nom,
            'prenom' => $prenom,
            'statut' => $statut,
            'temoignage' => $temoignage,
            'link' => $link
        ));

        //on récupère les informations qui viennent d'être enregistrées
        $row = $wpdb->get_row('SELECT * FROM '.$wpdb->prefix.'testimonialclients WHERE societe =\''.$societe.'\'');
        //on vérifie si un fichier est disponible au téléchargement
        if(isset($_FILES)){
            if($_FILES['logo']['error'] == 0){                    
                //chemin de l'image url
                $cheminLogo = get_template_directory_uri().'/img/clientsLogo/'.$row->testimonial_clients_id.'-'.$_FILES['logo']['name'];
                //chemin de l'image racine des dossiers
                $cheminLogoR = get_theme_root().'/themeSparklinglengua/img/clientsLogo/'.$row->testimonial_clients_id.'-'.$_FILES['logo']['name'];
                //mise à jour de la base avec l'url de l'image
                $wpdb->update($wpdb->prefix.'testimonialclients', array('logo' => $cheminLogo), array('societe' => $row->societe));
                //téléchargement du logo dans dossier img
                move_uploaded_file($_FILES['logo']['tmp_name'], $cheminLogoR);                                        
            }
        }
        print('<div id="lightbox">');
        print('<p class="bold">Témoignage ajouté</p>');
        print('<a href="admin.php?page=SLclientsTestimonial" titre="ok"><span id="btnOk">OK</span></a>');
        print('</div><!-- #lightbox -->');
        print('<div id="lightbox-shadow">');                
        print('</div><!-- #lightbox-shadow -->');
    }
}

?>
<div class="wrap">
    <h1>Ajout d'un témoignage client</h1>
    <a href="admin.php?page=SLaddClientTestimonial" title="ajouter témoignage"><span id="btnAdd" class="marginLeft25">Ajouter un témoignage client</span></a>
    <p class="bold">Les champs renseignés avec une "<span class="etoile">*</span>" sont obligatoires</p>
    <form action="admin.php?page=SLaddClientTestimonial" method="post" enctype="multipart/form-data">
        <table id="formTableAdd">
            <tbody>
                <tr>
                    <td class="verticalAlignTop"><label for="langue">Langue : <span class="etoile">*</span></label></td>
                    <td id="langue">
                        <input type="radio" name="langue" value="en" 
                               <?php if($langue == 'en'){ print('checked="checked"'); } ?>/><span>EN</span>
                        <input type="radio" name="langue" value="fr" 
                               <?php if($langue == 'fr'){ print('checked="checked"'); } ?>/><span>FR</span>
                        <input type="radio" name="langue" value="es" 
                               <?php if($langue == 'es'){ print('checked="checked"'); } ?>/><span>ES</span>
                        <input type="radio" name="langue" value="de" 
                               <?php if($langue == 'de'){ print('checked="checked"'); } ?>/><span>DE</span>
                        <input type="radio" name="langue" value="it" 
                               <?php if($langue == 'it'){ print('checked="checked"'); } ?>/><span>IT</span>
                        <input type="radio" name="langue" value="nl" 
                               <?php if($langue == 'nl'){ print('checked="checked"'); } ?>/><span>NL</span>
                    </td>
                    <td class="td230px"><span class="etoile langue">Renseigner le champ "Langue"</span></td>
                </tr>
                <tr>
                    <td class="verticalAlignTop"><label for="order_testimonial_client">Ordre d'affichage : </label></td>
                    <td><input type="text" id="order_testimonial_client" name="order_testimonial_client" value="<?php print($order_testimonial_client); ?>" autocomplete="off"/></td>
                    <td class="td230px"></td>
                </tr>
                <tr>
                    <td class="verticalAlignTop"><label for="societe">Société : <span class="etoile">*</span></label></td>
                    <td><input type="text" id="societe" name="societe" value="<?php print($societe); ?>" autocomplete="off" required /></td>
                    <td class="td230px"><span class="etoile societe">Renseigner le champ "Société"</span></td>
                </tr>
                <tr>
                    <td class="verticalAlignTop"><label for="nom">Nom : <span class="etoile">*</span></label></td>
                    <td><input type="text" id="nom" name="nom" value="<?php print($nom); ?>" autocomplete="off" required /></td>
                    <td class="td230px"><span class="etoile nom">Renseigner le champ "Nom"</span></td>
                </tr>
                <tr>
                    <td class="verticalAlignTop"><label for="prenom">Prénom : <span class="etoile">*</span></label></td>
                    <td><input type="text" id="prenom" name="prenom" value="<?php print($prenom); ?>" autocomplete="off" required /></td>
                    <td class="td230px"><span class="etoile prenom">Renseigner le champ "Prénom"</span></td>
                </tr>
                <tr>
                    <td class="verticalAlignTop"><label for="statut">Statut : <span class="etoile">*</span></label></td>
                    <td><input type="text" id="statut" name="statut" value="<?php print($statut); ?>" autocomplete="off" required /></td>
                    <td class="td230px"><span class="etoile statut">Renseigner le champ "Statut"</span></td>
                </tr>
                <tr>
                    <td class="verticalAlignTop"><label for="temoignage">Témoignage : <span class="etoile">*</span></label></td>
                    <td><?php wp_editor(stripslashes($temoignage), 'temoignage'); ?></td>
                    <td class="td230px"><span class="etoile temoignage">Renseigner le champ "Témoignage"</span></td>
                </tr>
                <tr>
                    <td class="verticalAlignTop"><label for="link">Lien : </label></td>
                    <td><input type="text" id="link" name="link" value="<?php print($link); ?>" autocomplete="off" /></td>
                    <td class="td230px"></td>
                </tr>
                <tr>
                    <td class="verticalAlignTop"><label>Logo : <span class="etoile">*</span></label></td>
                    <td>
                        <img src="<?php print(get_template_directory_uri().'/img/document.png'); ?>" alt="logo" />
                        <span class="etoile">Taille maximum autorisée : 2Mo</span>
                        <input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
                        <input id="logo" name="logo" type="file" required/>
                    </td>
                    <td class="td230px"><span class="etoile logo">Télécharger le "Logo"</span></td>
                </tr>
                <tr>
                    <td class="verticalAlignTop"><label></label></td>
                    <td><input type="submit" value="Enregistrer" /></td>
                    <td class="td230px"></td>
                </tr>
            </tbody>
        </table>
    </form>
</div>
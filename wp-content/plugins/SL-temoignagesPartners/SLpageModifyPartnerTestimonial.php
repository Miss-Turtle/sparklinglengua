<?php
require_once 'style.html';
play_jquery_partners();
extract($_POST);
extract($_GET);
global $wpdb;
//on récupère les données du client
if(isset($_GET['partner'])){
    if(!empty($_GET['partner'])){
        $recup = $wpdb->get_row('SELECT * FROM '.$wpdb->prefix.'testimonialpartners WHERE testimonial_partners_id =\''.$_GET['partner'].'\'');
    }
}
//on vérifie si des données ont été envoyées par le formulaire
if(isset($_POST['langue']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['langage']) && isset($_POST['temoignage'])){
    if(!empty($_POST['langue']) && !empty($_POST['prenom']) && !empty($_POST['langage']) && !empty($_POST['temoignage'])){
        $order_testimonial_partner = $_POST['order_testimonial_partner'];
        $langue = $_POST['langue'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $langage = $_POST['langage'];
        $temoignage = $_POST['temoignage'];
        
        //on vérifie que la société existe déjà en base        
        $verification = $wpdb->get_row('SELECT * FROM '.$wpdb->prefix.'testimonialpartners WHERE testimonial_partners_id =\''.$_GET['partner'].'\'');        
        if($verification !== NULL){
            //on rentre les données en base        
            $wpdb->update($wpdb->prefix.'testimonialpartners', array(
                'order_testimonial_partner' => $order_testimonial_partner,
                'langue' => $langue,
                'nom' => $nom,
                'prenom' => $prenom,
                'langage' => $langage,
                'temoignage' => $temoignage
            ), array('testimonial_partners_id' => $_GET['partner']));

            //on affiche une lightbox pour prévenir que l'enregistrement est réussi                                               
            print('<div id="lightbox">');
            print('<p class="bold">Modification enregistrée</p>');
            print('<a href="admin.php?page=SLpartnersTestimonial" titre="ok"><span id="btnOk">OK</span></a>');
            print('</div><!-- #lightbox -->');
            print('<div id="lightbox-shadow">');                
            print('</div><!-- #lightbox-shadow -->');
        }      
    }
}

?>
<div class="wrap">
    <h1>Ajout d'un témoignage partenaire</h1>
    <a href="admin.php?page=SLaddPartnerTestimonial" title="ajouter témoignage"><span id="btnAdd" class="marginLeft25">Ajouter un témoignage partenaire</span></a>
    <p class="bold">Les champs renseignés avec une "<span class="etoile">*</span>" sont obligatoires</p>
    <form action="admin.php?page=SLmodifyPartnerTestimonial&partner=<?php print($_GET['partner']); ?>" method="post">
        <table id="formTableAdd">
            <tbody>
                <tr>
                    <td class="verticalAlignTop"><label for="langue">Langue : <span class="etoile">*</span></label></td>
                    <td id="langue">
                        <input type="radio" name="langue" value="en" 
                               <?php if($recup->langue == 'en'){ print('checked="checked"'); } ?>/><span>EN</span>
                        <input type="radio" name="langue" value="fr" 
                               <?php if($recup->langue == 'fr'){ print('checked="checked"'); } ?>/><span>FR</span>
                        <input type="radio" name="langue" value="es" 
                               <?php if($recup->langue == 'es'){ print('checked="checked"'); } ?>/><span>ES</span>
                        <input type="radio" name="langue" value="de" 
                               <?php if($recup->langue == 'de'){ print('checked="checked"'); } ?>/><span>DE</span>
                        <input type="radio" name="langue" value="it" 
                               <?php if($recup->langue == 'it'){ print('checked="checked"'); } ?>/><span>IT</span>
                        <input type="radio" name="langue" value="nl" 
                               <?php if($recup->langue == 'nl'){ print('checked="checked"'); } ?>/><span>NL</span>
                    </td>
                    <td class="td230px"><span class="etoile langue">Renseigner le champ "Langue"</span></td>
                </tr>
                <tr>
                    <td class="verticalAlignTop"><label for="order_testimonial_partner">Ordre d'affichage : </label></td>
                    <td><input type="text" id="order_testimonial_partner" name="order_testimonial_partner" value="<?php print(stripslashes($recup->order_testimonial_partner)); ?>" autocomplete="off" /></td>
                    <td class="td230px"></td>
                </tr>
                <tr>
                    <td class="verticalAlignTop"><label for="nom">Nom : </label></td>
                    <td><input type="text" id="nom" name="nom" value="<?php print(stripslashes($recup->nom)); ?>" autocomplete="off" /></td>
                    <td class="td230px"></td>
                </tr>
                <tr>
                    <td class="verticalAlignTop"><label for="prenom">Prénom : <span class="etoile">*</span></label></td>
                    <td><input type="text" id="prenom" name="prenom" value="<?php print(stripslashes($recup->prenom)); ?>" autocomplete="off" required /></td>
                    <td class="td230px"><span class="etoile prenom">Renseigner le champ "Prénom"</span></td>
                </tr>
                <tr>
                    <td class="verticalAlignTop"><label for="langage">Langage : <span class="etoile">*</span></label></td>
                    <td><input type="text" id="langage" name="langage" value="<?php print(stripslashes($recup->langage)); ?>" autocomplete="off" required /></td>
                    <td class="td230px"><span class="etoile langage">Renseigner le champ "Langage"</span></td>
                </tr>
                <tr>
                    <td class="verticalAlignTop"><label for="temoignage">Témoignage : <span class="etoile">*</span></label></td>
                    <td><?php wp_editor(stripslashes($recup->temoignage), 'temoignage'); ?></td>
                    <td class="td230px"><span class="etoile temoignage">Renseigner le champ "Témoignage"</span></td>
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
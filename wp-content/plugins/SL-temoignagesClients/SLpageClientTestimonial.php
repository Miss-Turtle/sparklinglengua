<?php
require_once 'style.html';
play_jquery_clients();
global $wpdb;
$row = $wpdb->get_results('SELECT * FROM '.$wpdb->prefix.'testimonialclients WHERE langue IS NOT NULL GROUP BY langue');
print('<div class="wrap">');
extract($_GET);
if(isset($_GET['delete'])){
    if(!empty($_GET['delete'])){
        print('<div id="lightbox">');
        print('<p class="bold">Voulez-vous vraiment supprimer ce témoignage ?</p>');
        printf('<a href="admin.php?page=SLclientsTestimonial&deleteOk=%s" titre="delete"><span id="btnOk">Ok</span></a>', $_GET['delete']);
        print('<a href="admin.php?page=SLclientsTestimonial" titre="delete" style="margin-left: 20px;"><span id="btnAnnuler">Annuler</span></a>');
        print('</div><!-- #lightbox -->');
        print('<div id="lightbox-shadow">');                
        print('</div><!-- #lightbox-shadow -->');
    }
}
if(isset($_GET['deleteOk'])){
    if(!empty($_GET['deleteOk'])){
        print('<div id="lightbox">');
        print('<p class="bold">Témoignage supprimé</p>');
        print('<a href="admin.php?page=SLclientsTestimonial" titre="delete"><span id="btnOk">Ok</span></a>');
        print('</div><!-- #lightbox -->');
        print('<div id="lightbox-shadow">');                
        print('</div><!-- #lightbox-shadow -->');
        $wpdb->delete($wpdb->prefix.'testimonialclients', array('testimonial_clients_id' => $_GET['deleteOk']));
    }
}
?>
    
    <h1>Administration des témoignages clients</h1>
    <a href="admin.php?page=SLaddClientTestimonial" title="ajouter témoignage"><span id="btnAdd" class="marginLeft25">Ajouter un témoignage client</span></a>
    <p>Voir les différents témoignages clients classés par langues</p>
    <?php
    if($row){
        foreach ($row as $line){
            printf('<span id="btnLangue" class="marginRight25 %s-h2">Langue "%s"</span>', $line->langue, strtoupper($line->langue));    
        }
        foreach ($row as $line){
            printf('<h2 id="%s-h2">Témoignages "<span class="orange maj bold">%s</span>"</h2>', $line->langue, $line->langue);    
        }        
        foreach ($row as $line){            
    ?>
    <table id="<?php print($line->langue); ?>-table-clients" class="wp-list-table widefat fixed pages">
        <thead>
            <tr>
                <th style="width: 122px;">Logo</th>
                <th>Société</th>
                <th>Nom et prénom du témoin</th>
                <th>Statut du témoin</th>
                <th>Témoignage</th>
                <th class="textAlignCenter">Ordre d'affichage</th>
                <th class="textAlignCenter width80">Modifier</th>
                <th class="textAlignCenter width80">Supprimer</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $row2 = $wpdb->get_results('SELECT * FROM '.$wpdb->prefix.'testimonialclients WHERE langue =\''.$line->langue.'\' ORDER BY order_testimonial_client ASC');
                if($row2){
                    foreach ($row2 as $line2){
            ?>
            <tr>
                <td><div id="imgClient"><img class="logo" src="<?php print($line2->logo); ?>" alt="logo" /></div></td>
                <td><?php print(stripslashes($line2->societe)); ?></td>
                <td><?php print(ucfirst(stripslashes($line2-> prenom)).' '.strtoupper(stripslashes($line2->nom))); ?></td>
                <td><?php print(stripslashes($line2->statut)); ?></td>
                <td><?php print(substr(stripslashes($line2->temoignage), 0, 50).'...'); ?></td>
                <td class="textAlignCenter"><?php print(stripslashes($line2->order_testimonial_client)); ?></td>
                <td class="textAlignCenter">
                    <a href="admin.php?page=SLmodifyClientTestimonial&client=<?php print($line2->testimonial_clients_id); ?>" title="modifier">
                    <img class="btnTaille" src="<?php print(get_template_directory_uri().'/img/modifier.png'); ?>" alt="modifier" />
                    </a>
                </td>
                <td class="textAlignCenter">
                    <a href="admin.php?page=SLclientsTestimonial&delete=<?php print($line2->testimonial_clients_id); ?>" title="supprimer">
                    <img class="btnTaille" src="<?php print(get_template_directory_uri().'/img/supprimer.png'); ?>" alt="supprimer" />
                    </a>
                </td>
            </tr>
            <?php
                    }
                }
            ?>
        </tbody>
    </table>
    <?php                
        }
    }
    ?>
</div>
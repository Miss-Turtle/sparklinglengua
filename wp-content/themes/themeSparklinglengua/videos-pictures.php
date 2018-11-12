<?php
/*
Template Name: Videos et photos
*/

display_header();
$pageAncestor = display_langue();
display_header_entete($pageAncestor); 
  
if (have_posts()){
    while (have_posts()) {
        the_post();
        the_content();
    }
} 

global  $post;

//----------------------------------------------------------------------
//AFFICHAGE VIDEOS ET PHOTOS
//----------------------------------------------------------------------
global $wpdb;
$videos = $wpdb->get_results("
	SELECT * FROM {$wpdb->prefix}video WHERE videoLangue = '$pageAncestor' ORDER BY videoOrder ASC
"); 
switch($pageAncestor){
	case 'en':
		$videoTitre = 'Videos:';
		break;
	case 'fr':
		$videoTitre = 'Vidéos:';
		break;
	case 'de':
		$videoTitre = 'Videos :';
		break;
	case 'es':
		$videoTitre = 'Videos :';
		break;
	case 'it':
		$videoTitre = 'Video :';
		break;
	case 'nl':
		$videoTitre = 'Video\'s:';
		break;
}
?>
<h2><?php print($videoTitre); ?></h2>
<?php
foreach($videos as $video){ 	
?>
<div class="videoContent">
	<?php
	if(!empty($video->videoUri)){
	?>
	<video width="560px" controls src="<?php printf('%s', $video->videoUri); ?>">
		<?php print($video->videoTitre); ?>
	</video>
	<?php } 
	if(!empty($video->videoLien)){
		print(stripslashes($video->videoLien));
	}
	?>
	<h3><?php print($video->videoTitre); ?></h3>
</div>
<?php }
print('</div><!-- #content -->');  
display_sidebar($pageAncestor);
display_footer();
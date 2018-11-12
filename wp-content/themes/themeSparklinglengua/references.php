<?php
/*
 * Template Name: References
 */
display_header();
$pageAncestor = display_langue();
display_header_entete($pageAncestor);
display_jquery();
display_owlCarousel();
  
if (have_posts()){
    while (have_posts()) {
        the_post();
        the_content();
    }
}
global  $post;

//----------------------------------------------------------
//CAROUSEL
//----------------------------------------------------------
$post_ID = get_the_ID();
global $wpdb; 
//fonction pour afficher le carrousel avec les images correpondant à la langue
$recupImg = $wpdb->get_results('SELECT * FROM '.$wpdb->prefix.'posts WHERE post_parent = \'498\' AND post_type = \'attachment\'');
if(!empty($recupImg)){
    printf('<div id="owl-demo">');         
    foreach ($recupImg as $img){ 
        printf('<div>');
        printf('<div class="item"><a href="%s" title="%s" target="_blank"><img class="imgCarrousel" src="%s" alt="%s"></a></div>', $img->guid, $img->post_title, $img->guid, $img->post_title);
        printf('<div class="imgTitreCarrousel">%s</div>', $img->post_title);
        printf('</div>');
    }              
    printf('</div>');
    printf('<div class="customNavigation">');
    printf('<a class="btnCarouselPrev prev"></a>');        
    printf('<a class="btnCarousel play">Autoplay</a>');
    printf('<span style="color: #FFFFFF; font-size: 16px; font-weight: bold;"> | </span>');
    printf('<a class="btnCarousel stop">Stop</a>');
    printf('<a class="btnCarouselNext next"></a>');
    printf('</div>');
}   
print('</div><!-- #content -->');
display_sidebar($pageAncestor);
display_footer();
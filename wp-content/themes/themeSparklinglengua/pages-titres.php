<?php
//dans le cas d'un titre similaire, on recherche l'url fr correspondant
$pageFrSolutions = '';
$pageFrClients = '';
$pageFrContact = '';
$pageFrCreation = '';
$pageFrBase = get_page_by_title('fr');
$pageFrBaseChildren = get_children($pageFrBase->ID, 'page');
foreach ($pageFrBaseChildren as $children){
    switch ($children->post_title){
        case 'Solutions':
            $pageFrSolutions = $children->guid;
            $pageFrChildren = get_children($children->ID, 'page');
            foreach ($pageFrChildren as $child){
                if($child->post_title == 'Copywriting / Création'){
                    $pageFrCreation = $child->guid;
                }
            }
            break;
        case 'Témoignages':
            $pageFrChildren = get_children($children->ID, 'page');
            foreach ($pageFrChildren as $child){
                if($child->post_title == 'Clients'){
                    $pageFrClients = $child->guid;
                }
            }            
            break;
        case 'Contact':
            $pageFrContact = $children->guid;
            break;
    }
}

//dans le cas d'un titre similaire, on recherche l'url en correspondant
$pageEnSolutions = '';
$pageEnClients = '';
$pageEnContact = '';
$pageEnBase = get_page_by_title('en');
$pageEnBaseChildren = get_children($pageEnBase->ID, 'page');
foreach ($pageEnBaseChildren as $children){
    switch ($children->post_title){
        case 'Solutions':
            $pageEnSolutions = $children->guid;
            break;
        case 'Testimonials':
            $pageEnChildren = get_children($children->ID, 'page');
            foreach ($pageEnChildren as $child){
                if($child->post_title == 'Clients'){
                    $pageEnClients = $child->guid;
                }
            }
            break;
        case 'Clients':
            $pageEnClients = $children->guid;
            break;
        case 'Contact':
            $pageEnContact = $children->guid;
            break;
    }
}

//dans le cas d'un titre similaire, on recherche l'url nl correspondant
$pageNlContact = '';
$pageNlBase = get_page_by_title('nl');
$pageNlBaseChildren = get_children($pageNlBase->ID, 'page');
foreach ($pageNlBaseChildren as $children){
    switch ($children->post_title){
        case 'Contact':
            $pageNlContact = $children->guid;
            break;
    }
}
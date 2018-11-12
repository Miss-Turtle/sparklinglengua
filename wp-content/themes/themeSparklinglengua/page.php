<?php
/*
 * Template Name: Page
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
if($post->post_content == ''){
    spark_construction($pageAncestor);
}

//récupération des pages enfants et de leur lien
$idPage = get_the_ID();
$childPages = get_children($idPage);
$compteur = 0;
$childPage1 = '';
$childPage2 = '';
foreach ($childPages as $childPage){
    if($compteur == 0){
        $childPage1 = $childPage->guid; 
    }
    if($compteur == 1){
        $childPage2 = $childPage->guid; 
    }
    $compteur++;
}
//on verifie la version de la langue de la page
$theID = get_the_ID();
switch ($pageAncestor){
    case 'en':
        switch($theID){
            case '27':
                print('<div class="temoignageBulles">'); 
                printf('<a class="Clients" href="%s" title="Clients"><span class="ClientsText">Clients</span></a>',
                        $childPage2);
                printf('<a class="Traducteurs" href="%s" title="Translators"><span class="TraducteursText">Translators</span></a>',
                        $childPage1);
                print('</div>');
                break;
            case '11':
                print('<div class="philosophieCitation">');
                print('<p><span class="citationSignature">"</span>Enthusiasm is the yeast that makes your hopes shine to the stars.<br> 
                Enthusiasm is the sparkle in your eyes, the swing in your gait.<br>
                The grip of your hand, the irresistible surge of will and energy to execute your ideas.<span class="citationSignature">"<br>
                Henry Ford</span></p>');
                print('</div>');
                break;
        }
        break;
    case 'fr':
        switch($theID){
            case '72':
                print('<div class="temoignageBulles">'); 
                printf('<a class="Clients" href="%s" title="Clients"><span class="ClientsText">Clients</span></a>',
                        $childPage2);
                printf('<a class="Traducteurs" href="%s" title="Traducteurs"><span class="TraducteursText">Traducteurs</span></a>',
                        $childPage1);
                print('</div>');
                break;
            case '56':
                print('<div class="philosophieCitation">');
                print('<p><span class="citationSignature">"</span>L\'enthousiasme est la levure qui fait que vos espoirs atteignent les étoiles.<br>
                L\'enthousiasme est l\'étincelle dans votre regard, l\'élan dans votre démarche, la force dans votre main, l\'irrésistible jaillissement de ce que vous avez décidé.
                <span class="citationSignature">"<br>
                Henry Ford</span></p>');
                print('</div>');
                break;
        }
        break;
    case 'es':
        switch($theID){
            case '116':
                print('<div class="temoignageBulles">'); 
                printf('<a class="Clients" href="%s" title="Clientes"><span class="ClientsText">Clientes</span></a>',
                        $childPage2);
                printf('<a class="Traducteurs" href="%s" title="Traductores"><span class="TraducteursText">Traductores</span></a>',
                        $childPage1);
                print('</div>');
                break;
            case '100':
                print('<div class="philosophieCitation">');
                print('<p><span class="citationSignature">"</span>El entusiasmo es la fuerza que impulsa tus esperanzas hacia las estrellas, entusiasmo es el brillo en tus ojos, el ímpetu en tu andar, '
                . 'el apretón de tu mano, tu irresistible fuerza de voluntad y la energía para llevar a cabo tus ideas.<span class="citationSignature">"<br>
                Henry Ford</span></p>');
                print('</div>');
                break;
        }
        break;
    case 'de':
        switch($theID){
            case '160':
                print('<div class="temoignageBulles">'); 
                printf('<a class="Clients" href="%s" title="Kunden"><span class="ClientsText">Kunden</span></a>',
                        $childPage2);
                printf('<a class="Traducteurs" href="%s" title="Übersetzer"><span class="TraducteursText">Übersetzer</span></a>',
                        $childPage1);
                print('</div>');
                break;
            case '144':
                print('<div class="philosophieCitation">');
                print('<p><span class="citationSignature">"</span>Die Begeisterungsfähigkeit trägt deine Hoffnungen empor zu den Sternen.<br> '
                . 'Sie ist das Funkeln in deinen Augen, die Beschwingtheit deines Gangs, der Druck deiner Hand und der Wille und die Entschlossenheit, deine Wünsche in die Tat umzusetzen.<span class="citationSignature">"<br>
                Henry Ford</span></p>');
                print('</div>');
                break;
        }
        break;
    case 'it':
        switch($theID){
            case '204':
                print('<div class="temoignageBulles">'); 
                printf('<a class="Clients" href="%s" title="Clienti"><span class="ClientsText">Clienti</span></a>',
                        $childPage2);
                printf('<a class="Traducteurs" href="%s" title="Traduttori"><span class="TraducteursText">Traduttori</span></a>',
                        $childPage1);
                print('</div>');
                break;
            case '188':
                print('<div class="philosophieCitation">');
                print('<p><span class="citationSignature">"</span>L\'entusiasmo è il lievito che fa salire le speranze alle stelle.<br> '
                . 'L\'entusiasmo è lo scintillio negli occhi, il ritmo del passo, la stretta di mano, l\'impulso irresistibile della volontà e dell\'energia per mettere in atto le idee.<span class="citationSignature">"<br>
                Henry Ford</span></p>');
                print('</div>');
                break;
        }
        break;
    case 'nl':
        switch($theID){
            case '248':
                print('<div class="temoignageBulles">'); 
                printf('<a class="Clients" href="%s" title="Klanten"><div class="ClientsText">Klanten</div></a>',
                        $childPage2);
                printf('<a class="Traducteurs" href="%s" title="Vertalers"><div class="TraducteursText">Vertalers</div></a>',
                        $childPage1);
                print('</div>');
                break;
            case '232':
                print('<div class="philosophieCitation">');
                print('<p><span class="citationSignature">"</span>Enthousiasme is de gist die je verwachtingen tot in de hemel doet groeien.<br> '
                . 'Enthousiasme is die glinstering in je ogen, die draai in je benen, die greep van je hand, die onweerstaanbare wilskracht en energie om je ideeën te verwezenlijken.<span class="citationSignature">"<br>
                Henry Ford</span></p>');
                print('</div>');
                break;
        }
        break;
}
print('</div><!-- #content -->');
display_sidebar($pageAncestor);
display_footer();
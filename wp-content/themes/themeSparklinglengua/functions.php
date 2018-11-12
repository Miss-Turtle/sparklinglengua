<?php

//masquer le numéro de version de wordpress
remove_action('wp_head', 'wp_generator');

//masquer les erreurs de connexion
add_filter('login_errors',create_function('$a', "return null;"));

//désactiver windows live writter
remove_action('wp_head', 'wlwmanifest_link');

function display_header(){
    require_once 'header.php';
}

function display_footer(){
    require_once 'footer.php';
}

function display_sidebar($pageAncestor){
    require_once 'sidebar.php';
}

//désactivation de la fonction qui transforme les guillemets, apostrophes...
remove_filter('the_content', 'wptexturize');
         
//---------------------------------------------------------------------------------------------------
//MENUS
//---------------------------------------------------------------------------------------------------
//création de 2 types de menu : navigation & langage
register_nav_menus(array(
        'navEn' => 'Menu de Navigation En',
        'navFr' => 'Menu de Navigation Fr',
        'navEs' => 'Menu de Navigation Es',
        'navDe' => 'Menu de Navigation De',
        'navIt' => 'Menu de Navigation It',
        'navNl' => 'Menu de Navigation Nl',
        'navLang' => 'Menu de Langage'));

//---------------------------------------------------------------------------------------------------
//JQUERY
//---------------------------------------------------------------------------------------------------
function display_jquery(){
    wp_enqueue_script('sparklinglengua', plugins_url()."/js/sparklinglengua.js", array('jquery'), '1.0.0', true);
}

//---------------------------------------------------------------------------------------------------
//HEADER
//---------------------------------------------------------------------------------------------------

//fonction pour meta-description
function display_meta_description($postID){
    switch($postID){
        //pages "EN"
        case '2': //Home page
            $metaDescription = print('<meta name="description" content="Consider Sparkling Lengua your trusted one-stop-shop for all your translation, subtitling, desktop publishing, graphic creation and copywriting needs." />');
            break;
        case '7': //About us
            $metaDescription = print('<meta name="description" content="With an experienced team and an extensive network of native-speaking translators, Sparkling Lengua offers high quality translations in more than 80 languages." />');
            break;
        case '9': //Meet the team
            $metaDescription = print('<meta name="description" content="We come from a variety of educational and professional backgrounds, including translation, marketing, sales, desktop publishing, graphical creation and web design." />');
            break;
        case '11': //Our philosophy
            $metaDescription = print('<meta name="description" content="We believe in a respectful, proactive and optimist approach and cannot stress enough the importance of trust and a real partnership with our clients." />');
            break;
        case '13': //Solutions
            $metaDescription = print('<meta name="description" content="Sparkling Lengua provides comprehensive solutions to cultivate business success; from content creation and engineering to translation and desktop publishing." />');
            break;
        case '15': //Translation/localization/transcreation
            $metaDescription = print('<meta name="description" content="You can count on our expertise and network for all your translation, localization and transcreation needs." />');
            break;
        case '17': //Video subtitling/Voice-over (dubbing)
            $metaDescription = print('<meta name="description" content="We can subtitle any video content from scratch, and voice-over is also a possibility. Come to us with your project and we’ll make it work." />');
            break;
        case '19': //Desktop Publishing (DTP)
            $metaDescription = print('<meta name="description" content="You can count on us for all your desktop publishing and visual communication design needs." />');
            break;
        case '21': //Copywriting/Creation
            $metaDescription = print('<meta name="description" content="Our network of skilled copywriters expertly crafts compelling success stories and testimonials for you." />');
            break;
        case '23': //Why us?
            $metaDescription = print('<meta name="description" content="Sparkling Lengua prides itself in its highly transparent and competitive pricing as well as its first-class project management and communications." />');
            break;
        case '25': //We dit it!
            $metaDescription = print('<meta name="description" content="Knowing a picture is worth a thousand words, we let our work and results speak for themselves." />');
            break;
        case '27': //Testimonials
            $metaDescription = print('<meta name="description" content="They say word-of-mouth is the best form of advertising… Feel free to check out what our clients and our translators are saying about Sparkling Lengua!" />');
            break;
        case '29': //Clients
            $metaDescription = print('<meta name="description" content="Many valued clients trust our translation and localization expertise. Read what they say about us." />');
            break;
        case '31': //Translators
            $metaDescription = print('<meta name="description" content="We see our translators as our partners and value our collaboration and their opinion. Here is how they see us." />');
            break;
        case '33': //Contact us
            $metaDescription = print('<meta name="description" content="All our contact details at your fingertips – Sparkling Lengua looks forward to hearing from you." />');
            break;  
        //pages "FR"
        case '52': //Notre société
            $metaDescription = print('<meta name="description" content="Avec une équipe expérimentée et un réseau étendu de traducteurs, Sparkling Lengua offre des traductions de haute qualité dans plus de 80 langues." />');
            break;
        case '54': //L’équipe
            $metaDescription = print('<meta name="description" content="Nous venons d’horizons éducatifs et professionnels différents : traduction, marketing, vente, création graphique et conception de site." />');
            break;
        case '56': //Notre philosophie
            $metaDescription = print('<meta name="description" content="Respectueux, proactifs et optimistes, nous attachons une énorme importance à la confiance et à un véritable partenariat avec nos clients." />');
            break;
        case '58': //Solutions
            $metaDescription = print('<meta name="description" content="Sparkling Lengua offre des solutions complètes pour cultiver la réussite d\'entreprise ; de la création de contenu et l\'engineering à la traduction et la PAO." />');
            break;
        case '60': //Traduction / Localisation / Transcréation
            $metaDescription = print('<meta name="description" content="Vous pouvez compter sur notre expertise et notre réseau pour tous vos besoins de traduction, localisation et transcréation." />');
            break;
        case '62': //Sous‑titrage / Doublage vidéo
            $metaDescription = print('<meta name="description" content="Nous pouvons sous-titrer n\'importe quel contenu vidéo de A à Z et le doublage est une autre possibilité. Ensemble, nous trouverons une solution." />');
            break;
        case '64': //Publication assistée par ordinateur (PAO)
            $metaDescription = print('<meta name="description" content="Vous pouvez compter sur nous pour tous vos besoins de publication assistée par ordinateur et de conception de communication visuelle." />');
            break;
        case '66': //Copywriting / Création
            $metaDescription = print('<meta name="description" content="Les rédacteurs qualifiés de notre réseau rédigent habilement des success stories et des témoignages pour vous." />');
            break;
        case '68': //Pourquoi nous ?
            $metaDescription = print('<meta name="description" content="Chez Sparkling Lengua, nous sommes fiers de nos prix compétitifs des plus transparents, de notre gestion de projet de premier plan et de nos communications." />');
            break;
        case '70': //Nos réalisations
            $metaDescription = print('<meta name="description" content="Sachant qu\'une image vaut mieux qu\'un long discours, nous laissons notre travail et nos résultats parler d\'eux-mêmes." />');
            break;
        case '72': //Témoignages
            $metaDescription = print('<meta name="description" content="Le bouche à oreille serait la meilleure forme de publicité… Découvrez ce que nos clients et traducteurs pensent de Sparkling Lengua !" />');
            break;
        case '74': //Clients
            $metaDescription = print('<meta name="description" content="De nombreux clients précieux font confiance à notre expertise de la traduction et de la localisation. Découvrez ce qu\'ils disent de nous." />');
            break;
        case '76': //Traducteurs
            $metaDescription = print('<meta name="description" content="Nous considérons nos traducteurs comme nos partenaires et apprécions notre collaboration. Voici ce qu\'ils pensent de nous." />');
            break;
        case '78': //Contact
            $metaDescription = print('<meta name="description" content="Toutes nos coordonnées, directement accessibles – Sparkling Lengua a hâte d\'avoir de vos nouvelles." />');
            break;
        //pages "DE"
        case '140': //Wir über uns
            $metaDescription = print('<meta name="description" content="Sparkling Lengua bietet hochwertige Übersetzungen in 80+ Sprachen – mit einem versierten Team und einem umfassenden Netzwerk muttersprachlicher Fachübersetzer." />');
            break;
        case '142': //Unser Team
            $metaDescription = print('<meta name="description" content="Übersetzung, Marketing, Vertrieb, DTP, grafische Kreation, Webdesign – unsere Mitarbeiter bringen ganz unterschiedliche Erfahrungshorizonte ein." />');
            break;
        case '144': //Unsere Philosophie
            $metaDescription = print('<meta name="description" content="Wir sind vorausschauende, zupackende Optimisten. Das Vertrauen unserer Kunden rechtfertigen wir als respektvolle, umsichtige Partner." />');
            break;
        case '146': //Lösungen
            $metaDescription = print('<meta name="description" content="Sparkling Lengua kultiviert geschäftliche Erfolge – mit Gesamtlösungen (Design, Texten, Engineering, DTP ...), die weit über Übersetzung" />');
            break;
        case '148': //Übersetzung / Lokalisierung / Transkreation
            $metaDescription = print('<meta name="description" content="Übersetzung, Lokalisierung, Transkreation – unsere Kernkompetenzen, bei denen wir alle ziehen." />');
            break;
        case '150': //Video‑Untertitelung / Voice‑over (Nachvertonung)
            $metaDescription = print('<meta name="description" content="Was, wenn Ihre Videos mehrere Sprachen sprächen? Einfach Ihre Datei einsenden – den (Untertitelung/Voice-over) übernehmen wir für Sie." />');
            break;
        case '152': //Desktop‑Publishing (DTP)
            $metaDescription = print('<meta name="description" content="Ob kreatives Design oder Desktop-Publishing – auch visuelle Kommunikation ist bei uns in Händen." />');
            break;
        case '154': //Texten / Kreation
            $metaDescription = print('<meta name="description" content="Einprägsame Storys aus der Feder unserer routinierten Texter erleichtern Ihnen den Ausbau Ihrer Marktpräsenz." />');
            break;
        case '156': //Warum wir?
            $metaDescription = print('<meta name="description" content="Eine transparente, wettbewerbsorientierte Preisgestaltung verbinden wir mit einem routinierten, zuvorkommenden Projektmanagement." />');
            break;
        case '158': //Erfolgsgeschichten
            $metaDescription = print('<meta name="description" content="Ein Bild sagt mehr als 1000 Worte. Lassen wir einige unserer Glanzleistungen für sich" />');
            break;
        case '160': //Referenzen
            $metaDescription = print('<meta name="description" content="Gibt es eine bessere Werbung als Mundpropaganda? Erfahren Sie, was unsere Kunden und Partner zu sagen haben!" />');
            break;
        case '162': //Kunden
            $metaDescription = print('<meta name="description" content="Kunden aus aller Welt vertrauen auf unsere Starqualitäten. Was sie wohl zu sagen haben?" />');
            break;
        case '164': //Übersetzer
            $metaDescription = print('<meta name="description" content="Die Meinung unserer Übersetzer – die meisten davon langjährige Partner – ist uns wichtig. Wie sie uns wohl sehen?" />');
            break;
        case '166': //Kontakt
            $metaDescription = print('<meta name="description" content="Ob telefonisch oder per E-Mail – lassen Sie uns von sich hören!" />');
            break;
        //pages "ES"
        case '96': //Empresa
            $metaDescription = print('<meta name="description" content="Con un equipo experimentado y una extensa red de traductores nativos, Sparkling Lengua ofrece traducciones de gran calidad en más de 80 idiomas." />');
            break;
        case '98': //Conoce al equipo
            $metaDescription = print('<meta name="description" content="Venimos de trayectorias profesionales y educativas muy diversas, como la traducción, el marketing, las ventas, la autoedición, la creación gráfica y el diseño web." />');
            break;
        case '100': //Nuestra filosofía
            $metaDescription = print('<meta name="description" content="Creemos en un enfoque respetuoso, dinámico y optimista y queremos subrayar la importancia de crear vínculos de confianza y alianzas reales con nuestros clientes." />');
            break;
        case '102': //Soluciones
            $metaDescription = print('<meta name="description" content="Sparkling Lengua da soluciones completas que facilitan el éxito de las empresas, desde la creación de contenidos e ingeniería hasta la traducción y la autoedición." />');
            break;
        case '104': //Traducción / Localización / Adaptación
            $metaDescription = print('<meta name="description" content="Puede confiar en nuestros conocimientos especializados y en nuestra red para todas sus necesidades de traducción, localización y transcreación." />');
            break;
        case '106': //Subtitulado / Voz en off (Doblaje)
            $metaDescription = print('<meta name="description" content="Podemos crear los subtítulos de cualquier contenido en vídeo desde el principio; también nos podemos encargar del doblaje. Preséntenos su proyecto y lo pondremos en funcionamiento." />');
            break;
        case '108': //Desktop publishing (DTP)
            $metaDescription = print('<meta name="description" content="Puede confiarnos todas sus necesidades de autoedición (DTP) y diseño de comunicación visual." />');
            break;
        case '110': //Redacción de textos
            $metaDescription = print('<meta name="description" content="Contamos con una red de redactores experimentados que escriben convincentes casos reales y referencias para su empresa." />');
            break;
        case '112': //¿Por qué Sparkling?
            $metaDescription = print('<meta name="description" content="Sparkling Lengua se enorgullece de sus precios competitivos y transparentes así como de su excelente nivel en la gestión de los proyectos y las comunicaciones." />');
            break;
        case '114': //Logros
            $metaDescription = print('<meta name="description" content="Todos sabemos que una imagen vale más que mil palabras, y por eso dejamos que nuestro trabajo y nuestros resultados hablen por sí mismos." />');
            break;
        case '116': //Referencias
            $metaDescription = print('<meta name="description" content="Dicen que el boca a boca es la mejor publicidad... Mire lo que nuestros clientes y nuestros traductores comentan acerca de Sparkling Lengua." />');
            break;
        case '118': //Clientes
            $metaDescription = print('<meta name="description" content="Son muchos los clientes que han confiado en nuestra experiencia en traducción y localización. Lea lo que dicen sobre nosotros." />');
            break;
        case '120': //Traductores
            $metaDescription = print('<meta name="description" content="Consideramos a nuestros traductores como nuestros socios, y damos un gran valor a nuestra colaboración y a su opinión. Así es como nos ven." />');
            break;
        case '122': //Contacto
            $metaDescription = print('<meta name="description" content="Todos nuestros datos de contacto a su alcance: en Sparkling Lengua estamos a su disposición." />');
            break;
        //pages "IT"
        //pages "NL"  
        case '228': //Over ons
            $metaDescription = print('<meta name="description" content="Sparkling Lengua beschikt over een ervaren team en uitgebreid netwerk van vertalers die in hun moedertaal vertalen. We bieden kwaliteitsvolle vertalingen in meer dan 80 talen." />');
            break;
        case '230': //Maak kennis met het team
            $metaDescription = print('<meta name="description" content="Ieder van ons heeft zijn of haar eigen opleiding en professionele achtergrond: vertaling, marketing, sales, desktoppublishing, grafische creaties en webdesign." />');
            break;
        case '232': //Onze filosofie
            $metaDescription = print('<meta name="description" content="We geloven in een respectvolle, proactieve en optimistische aanpak. We kunnen niet genoeg onderstrepen hoe belangrijk het vertrouwen en een echte samenwerking met onze klanten is." />');
            break;
        case '234': //Oplossingen
            $metaDescription = print('<meta name="description" content="Sparkling Lengua biedt uitgebreide oplossingen voor bedrijfssucces: van creatie van content en engineering tot vertaling en desktoppublishing." />');
            break;
        case '236': //Vertaling/lokalisatie/transcreatie
            $metaDescription = print('<meta name="description" content="U kunt rekenen op onze expertise en ons netwerk voor al uw behoeften in vertaling, lokalisatie en transcreatie." />');
            break;
        case '238': //Video-ondertiteling/Voice-over (dubbing)
            $metaDescription = print('<meta name="description" content="We kunnen elke video van nul af aan ondertitelen. Ook voice-over behoort tot de mogelijkheden. Kom met uw project bij ons en we maken er werk van." />');
            break;
        case '240': //Desktoppublishing (DTP)
            $metaDescription = print('<meta name="description" content="U kunt op ons rekenen voor al uw behoeften voor desktoppublishing en visuele communicatie." />');
            break;
        case '242': //Copywriting/creatie
            $metaDescription = print('<meta name="description" content="We hebben een netwerk van ervaren copywriters met een vlotte pen. Zij kunnen voor u overtuigende succesverhalen en klantengetuigenissen schrijven." />');
            break;
        case '244': //Waarom ons?
            $metaDescription = print('<meta name="description" content="Sparkling Lengua gaat prat op zijn uiterst transparante en scherpe prijzen, maar ook op zijn eersteklas projectmanagement en communicatie." />');
            break;
        case '246': //Onze resultaten
            $metaDescription = print('<meta name="description" content="Omdat een beeld meer zegt dan duizend woorden, laten we ons werk en onze resultaten voor zich spreken." />');
            break;
        case '248': //Getuigenissen
            $metaDescription = print('<meta name="description" content="Men zegt wel eens dat mond-aan-mondreclame de beste reclame is... Lees wat onze klanten en vertalers te zeggen hebben over Sparkling Lengua!" />');
            break;
        case '250': //Klanten
            $metaDescription = print('<meta name="description" content="Vele gewaardeerde klanten hebben vertrouwen in onze expertise in vertaling en lokalisatie. Lees wat ze over ons vertellen." />');
            break;
        case '252': //Vertalers
            $metaDescription = print('<meta name="description" content="Onze vertalers zijn onze partners. We waarderen onze samenwerking en hun mening. Zo denken ze over ons." />');
            break;
        case '254': //Contact
            $metaDescription = print('<meta name="description" content="Al onze contactgegevens binnen handbereik – Sparkling Lengua hoort graag van u." />');
            break;    
    }
    return $metaDescription;
}

//fonction titre de la page
function display_title_page(){
    print('<h1>');
    the_title();
    print('</h1>');
}

//fonction pour récupérrer la langue de la page
function display_langue(){
    $pageAncestors = get_ancestors(get_the_ID(), 'page');
    $pageAncestor0 = get_the_title($pageAncestors[0]);
    $pageAncestor1 = get_the_title($pageAncestors[1]);
    $pageAncestor = '';
    if($pageAncestor0 == 'en' || $pageAncestor0 == 'fr' || $pageAncestor0 == 'es' || $pageAncestor0 == 'de' || $pageAncestor0 == 'it' || $pageAncestor0 == 'nl'){
        $pageAncestor = $pageAncestor0;
    }
    if($pageAncestor1 == 'en' || $pageAncestor1 == 'fr' || $pageAncestor1 == 'es' || $pageAncestor1 == 'de' || $pageAncestor1 == 'it' || $pageAncestor1 == 'nl'){
        $pageAncestor = $pageAncestor1;
    }
    return $pageAncestor;
}

//fonction entête
function display_header_entete($pageAncestor){
    display_jquery();
    print'<header>';
    require_once 'pages-titres.php';    
    printf('<a href="%s" title="Sparkling Lengua"><img src="%s/img/logo.jpg" alt="logo"></a>',home_url(), get_template_directory_uri());
    require_once 'menu-langue.php';
    switch($pageAncestor){
        case 'en':
            wp_nav_menu(array('theme_location' => 'navEn'));
            break;
        case 'fr':
            wp_nav_menu(array('theme_location' => 'navFr'));
            break;
        case 'es':
            wp_nav_menu(array('theme_location' => 'navEs'));
            break;
        case 'de':
            wp_nav_menu(array('theme_location' => 'navDe'));
            break;
        case 'it':
            wp_nav_menu(array('theme_location' => 'navIt'));
            break;
        case 'nl':
            wp_nav_menu(array('theme_location' => 'navNl'));
            break;
    }
    div_id_slide(); 
    div_slide_lietmotiv($pageAncestor);
    print'</header>';
    print'<div id="content">';
    display_title_page();
}

//---------------------------------------------------------------------------------------------------
//SOUS MENU
//---------------------------------------------------------------------------------------------------

//fonction pour scinder une phrase contenant des "/" et la reconstruire en intégrant un saut à la ligne après ce symbole
function sous_menu_saut_ligne($page){
    $sentenceSousMenu = explode('/', $page);
    $wordsSousMenu = '';
    $word1 = '';
    $word2 = '';
    $word3 = '';
    for ($i = 0, $sizeSentence = count($sentenceSousMenu); $i < $sizeSentence; $i++){
        if($i == 0){
            $word1 = $sentenceSousMenu[$i];
            $wordsSousMenu = $word1;
        }
        if($i == 1){
            $word2 = $sentenceSousMenu[$i];
            $wordsSousMenu = $word1.' /<br>'.$word2;
        }
        if($i == 2){
            $word3 = $sentenceSousMenu[$i];
            $wordsSousMenu = $word1.' /<br>'.$word2.' /<br>'.$word3;
        }
    }
    return $wordsSousMenu;
}

//fonction pour récupérer les pages enfant et les lister en liens
function contenu_sous_menu($postID, $postTitle){
    //initialisation d'une variable
    $sousMenuActif == '';
    //on récupère les pages enfants
    $postPages = get_pages(array('child_of' => $postID, 'sort_column' => 'ID'));
    //si les pages ont des enfants alors on affiche le sous menu vers les enfants
    if(!empty($postPages)){
        foreach ($postPages as $page){
            $wordsSousMenu = sous_menu_saut_ligne($page->post_title);
            printf('<a href="%s" title="%s" class="sousMenu">%s</a>', $page->guid, $page->post_title, $wordsSousMenu);
        }
    } 
    //si la page n'a pas d'enfant et n'est pas la page contact 
    //on récupère l'ancêtre pour récuppérer ses enfants et les lister en liens
    if(empty($postPages) &&  $postTitle != 'Contact' && $postTitle != 'Contacto' && $postTitle != 'Kontakt' && $postTitle != 'Contatti') {
        $postAncestors = get_ancestors($postID, 'page');
        //on récupère les pages enfants
        $postPages = get_pages(array('child_of' => $postAncestors[0], 'sort_column' => 'ID'));
        foreach ($postPages as $page){
            $wordsSousMenu = sous_menu_saut_ligne($page->post_title);
            //si le titre de la page correspond à la page active alors on ajoute la classe "sousMenuActif"
            if($postTitle == $page->post_title){ 
                printf('<a href="%s" title="%s" class="sousMenu sousMenuActif">%s</a>', $page->guid, $page->post_title, $wordsSousMenu);
            } else {
                printf('<a href="%s" title="%s" class="sousMenu">%s</a>', $page->guid, $page->post_title, $wordsSousMenu);
            }
        }
    }   
}

//fonction pour sous menu des pages
function sous_menu(){
    global $post;    
    switch($post->post_title){
        case $post->post_title:  
            contenu_sous_menu($post->ID, $post->post_title);
            break;
    }
}

//---------------------------------------------------------------------------------------------------
//SLIDES
//---------------------------------------------------------------------------------------------------

//fonction liste des images pour les différents slides
function img_slide_1(){
    printf('<img src="%s/img/baniere-montagne.jpg" alt="carousel">', get_template_directory_uri());
    printf('<img src="%s/img/baniere-montagne.jpg" alt="carousel">', get_template_directory_uri());
    printf('<img src="%s/img/baniere-feuilles-vertes.jpg" alt="carousel">', get_template_directory_uri());
    printf('<img src="%s/img/baniere-mains-plante.jpg" alt="carousel" class="active">', get_template_directory_uri());
}
function img_slide_2(){
    printf('<img src="%s/img/baniere-galet.jpg" alt="carousel">', get_template_directory_uri());
    printf('<img src="%s/img/baniere-galet.jpg" alt="carousel">', get_template_directory_uri());
    printf('<img src="%s/img/baniere-pomme-orange.jpg" alt="carousel">', get_template_directory_uri());
    printf('<img src="%s/img/baniere-coquelicots.jpg" alt="carousel" class="active">', get_template_directory_uri());
}
function img_slide_3(){
    printf('<img src="%s/img/baniere-pomme-orange.jpg" alt="carousel">', get_template_directory_uri());
    printf('<img src="%s/img/baniere-pomme-orange.jpg" alt="carousel">', get_template_directory_uri());
    printf('<img src="%s/img/baniere-vignes.jpg" alt="carousel">', get_template_directory_uri());
    printf('<img src="%s/img/baniere-framboises-carre.jpg" alt="carousel" class="active">', get_template_directory_uri());
}
function img_slide_4(){
    printf('<img src="%s/img/baniere-flaque.jpg" alt="carousel">', get_template_directory_uri());
    printf('<img src="%s/img/baniere-flaque.jpg" alt="carousel">', get_template_directory_uri());
    printf('<img src="%s/img/baniere-lettres.jpg" alt="carousel">', get_template_directory_uri());
    printf('<img src="%s/img/baniere-main-eau.jpg" alt="carousel" class="active">', get_template_directory_uri());
}
function img_slide_5(){
    printf('<img src="%s/img/baniere-terre.jpg" alt="carousel">', get_template_directory_uri());
    printf('<img src="%s/img/baniere-terre.jpg" alt="carousel">', get_template_directory_uri());
    printf('<img src="%s/img/baniere-pinceau.jpg" alt="carousel" class="active">', get_template_directory_uri());
}
function img_slide_6(){
    printf('<img src="%s/img/baniere-terre.jpg" alt="carousel">', get_template_directory_uri());
    printf('<img src="%s/img/baniere-terre.jpg" alt="carousel">', get_template_directory_uri());
    printf('<img src="%s/img/baniere-bloc-note.jpg" alt="carousel" class="active">', get_template_directory_uri());
}
function img_slide_7(){
    printf('<img src="%s/img/baniere-galet.jpg" alt="carousel">', get_template_directory_uri());
    printf('<img src="%s/img/baniere-galet.jpg" alt="carousel">', get_template_directory_uri());
    printf('<img src="%s/img/baniere-doigts.jpg" alt="carousel">', get_template_directory_uri());
    printf('<img src="%s/img/baniere-coquelicots.jpg" alt="carousel" class="active">', get_template_directory_uri());
}
function img_slide_8(){
    printf('<img src="%s/img/baniere-framboises-carre.jpg" alt="carousel">', get_template_directory_uri());
    printf('<img src="%s/img/baniere-framboises-carre.jpg" alt="carousel">', get_template_directory_uri());
    printf('<img src="%s/img/baniere-pissenlit.jpg" alt="carousel" class="active">', get_template_directory_uri());
}
function img_slide_9(){
    printf('<img src="%s/img/baniere-etoile.jpg" alt="carousel">', get_template_directory_uri());
}
function img_slide_10(){
    printf('<img src="%s/img/baniere-panneau.jpg" alt="carousel">', get_template_directory_uri());
}
function img_slide_11(){
    printf('<img src="%s/img/baniere-main-coquelicots.jpg" alt="carousel">', get_template_directory_uri());
}
function img_slide_12(){
    printf('<img src="%s/img/baniere-pissenlit.jpg" alt="carousel">', get_template_directory_uri());
}
function img_slide_13(){
    printf('<img src="%s/img/baniere-pinceau.jpg" alt="carousel">', get_template_directory_uri());
}

//fonction pour définir les images de la sidebar qui défilent
function img_sidebar_1(){
    printf('<img src="%s/img/fotofolia-montagne.jpg" alt="picture">', get_template_directory_uri());
    printf('<img src="%s/img/fotofolia-montagne.jpg" alt="picture">', get_template_directory_uri());
    printf('<img src="%s/img/fotofolia-feuilles-vertes.jpg" alt="picture">', get_template_directory_uri());
    printf('<img src="%s/img/fotofolia-mains-plante.jpg" alt="picture" class="active">', get_template_directory_uri());
}
function img_sidebar_2(){
    printf('<img src="%s/img/fotofolia-galet.jpg" alt="picture">', get_template_directory_uri());
    printf('<img src="%s/img/fotofolia-galet.jpg" alt="picture">', get_template_directory_uri());
    printf('<img src="%s/img/fotofolia-pomme-orange.jpg" alt="picture">', get_template_directory_uri());
    printf('<img src="%s/img/fotofolia-coquelicots.jpg" alt="picture" class="active">', get_template_directory_uri());
}
function img_sidebar_3(){
    printf('<img src="%s/img/fotofolia-pomme-orange.jpg" alt="picture">', get_template_directory_uri());
    printf('<img src="%s/img/fotofolia-pomme-orange.jpg" alt="picture">', get_template_directory_uri());
    printf('<img src="%s/img/fotofolia-vignes.jpg" alt="picture">', get_template_directory_uri());
    printf('<img src="%s/img/fotofolia-framboises-carre.jpg" alt="picture" class="active">', get_template_directory_uri());
}
function img_sidebar_4(){
    printf('<img src="%s/img/fotofolia-flaque.jpg" alt="picture">', get_template_directory_uri());
    printf('<img src="%s/img/fotofolia-flaque.jpg" alt="picture">', get_template_directory_uri());
    printf('<img src="%s/img/fotofolia-lettres.jpg" alt="picture">', get_template_directory_uri());
    printf('<img src="%s/img/fotofolia-main-eau.jpg" alt="picture" class="active">', get_template_directory_uri());
}
function img_sidebar_5(){
    printf('<img src="%s/img/fotofolia-terre.jpg" alt="picture">', get_template_directory_uri());
    printf('<img src="%s/img/fotofolia-terre.jpg" alt="picture">', get_template_directory_uri());
    printf('<img src="%s/img/fotofolia-pinceau.jpg" alt="picture" class="active">', get_template_directory_uri());
}
function img_sidebar_6(){
    printf('<img src="%s/img/fotofolia-terre.jpg" alt="picture">', get_template_directory_uri());
    printf('<img src="%s/img/fotofolia-terre.jpg" alt="picture">', get_template_directory_uri());
    printf('<img src="%s/img/fotofolia-bloc-note.jpg" alt="picture" class="active">', get_template_directory_uri());
}
function img_sidebar_7(){
    printf('<img src="%s/img/fotofolia-galet.jpg" alt="picture">', get_template_directory_uri());
    printf('<img src="%s/img/fotofolia-galet.jpg" alt="picture">', get_template_directory_uri());
    printf('<img src="%s/img/fotofolia-doigts.jpg" alt="picture">', get_template_directory_uri());
    printf('<img src="%s/img/fotofolia-coquelicots.jpg" alt="picture" class="active">', get_template_directory_uri());
}
function img_sidebar_8(){
    printf('<img src="%s/img/fotofolia-framboises-carre.jpg" alt="picture">', get_template_directory_uri());
    printf('<img src="%s/img/fotofolia-framboises-carre.jpg" alt="picture">', get_template_directory_uri());
    printf('<img src="%s/img/fotofolia-pissenlit.jpg" alt="picture" class="active">', get_template_directory_uri());
}
function img_sidebar_9(){
    printf('<img src="%s/img/fotofolia-etoile.jpg" alt="picture">', get_template_directory_uri());
}
function img_sidebar_10(){
    printf('<img src="%s/img/fotofolia-panneau.jpg" alt="picture">', get_template_directory_uri());
}
function img_sidebar_11(){
    printf('<img src="%s/img/fotofolia-main-coquelicots.jpg" alt="picture">', get_template_directory_uri());
}
function img_sidebar_12(){
    printf('<img src="%s/img/fotofolia-pissenlit.jpg" alt="picture">', get_template_directory_uri());
}
function img_sidebar_13(){
    printf('<img src="%s/img/fotofolia-pinceau.jpg" alt="picture">', get_template_directory_uri());
}

//fonction pour faire apparaitre la div slide
function div_id_slide(){
    //choix des images du slide en fonction du titre de la page
    $divOuverture = '<div id="slide">';
    $divFermeture = '</div><!-- #slide -->';
    switch_case_slide_carousel($divOuverture, $divFermeture);
}

//fonction pour faire apparaître la div image dans la sidebar
function display_contentRightImg(){
    //choix des images du slide en fonction du titre de la page
    $divOuverture = '<div id="slideRight">';
    $divFermeture = '</div><!-- #slideRight -->';
    switch_case_slide_carousel($divOuverture, $divFermeture);
}

//fonction pour lister les cas de page où doivent apparaître les éléments
function switch_case_slide_carousel($divOuverture, $divFermeture){
    global $post;
    switch ($post->ID) {
        case '7': //'About us':
        case '11': //'Our philosophy':
        case '52': //'À propos de nous':
        case '56': //'Notre philosophie':
        case '96': //'Empresa':
        case '100': //'Nuestra filosofía':
        case '140': //'Wir über uns':
        case '144': //'Philosophie':
        case '184': //'Su di noi':
        case '188': //'La nostra filosofia':
        case '228': //'Over ons':
        case '232': //'Onze filosofie':
            print($divOuverture);
            if($divOuverture == '<div id="slide">'){
                img_slide_1();
            }
            if($divOuverture == '<div id="slideRight">'){
                img_sidebar_1();
            }
            print($divFermeture);
            break;
        case '9': //'Meet the team':
        case '54': //'L’équipe':
        case '98': //'Conoce al equipo':
        case '142': //'Unser Team':
        case '186': //'Il gruppo':
        case '230': //'Maak kennis met het team':
            print($divOuverture);
            if($divOuverture == '<div id="slide">'){
                img_slide_2();
            }
            if($divOuverture == '<div id="slideRight">'){
                img_sidebar_2();
            }
            print($divFermeture);
            break;
        case '13': //'Solutions':
        case '58': //'Solutions':
        case '102': //'Soluciones':
        case '146': //'Lösungen':
        case '190': //'Soluzioni':
        case '234': //'Oplossingen':
            print($divOuverture);
            if($divOuverture == '<div id="slide">'){
                img_slide_3();
            }
            if($divOuverture == '<div id="slideRight">'){
                img_sidebar_3();
            }
            print($divFermeture);
            break;
        case '15': //'Translation / Localization / Transcreation':
        case '60': //'Traduction / Localisation / Transcréation':
        case '104': //'Traducción / Localización / Adaptación':
        case '148': //'Übersetzung / Lokalisierung / Transkreation':
        case '192': //'Traduzione / Localizzazione / Transcreazione':
        case '236': //'Vertaling / lokalisatie / transcreatie':
            print($divOuverture);
            if($divOuverture == '<div id="slide">'){
                img_slide_4();
            }
            if($divOuverture == '<div id="slideRight">'){
                img_sidebar_4();
            }
            print($divFermeture);
            break;
        case '17': //'Video Subtitling / Voice&#x2011;over (Dubbing)':
        case '62': //'Sous&#x2011;titrage / Doublage vidéo':
        case '106': //'Subtitulado / Voz en off':
        case '150': //'Video&#x2011;Untertitelung / Voice&#x2011;over':
        case '194': //'Sottotitolaggio / Doppiaggio':
        case '238': //'Ondertiteling van video&apos;s / voice&#x2011;over':
        case '19': //'Desktop Publishing (DTP)':
        case '64': //'Publication assistée par ordinateur':
        case '108': //'Diseño gráfico':
        case '152': //'Desktop&#x2011;Publishing':
        case '196': //'Desktop publishing':
        case '240': //'Desktoppublishing':
            print($divOuverture);
            if($divOuverture == '<div id="slide">'){
                img_slide_5();
            }
            if($divOuverture == '<div id="slideRight">'){
                img_sidebar_5();
            }
            print($divFermeture);
            break;
        case '21': //'Copywriting / Creation':
        case '66': //'Copywriting / Création':
        case '110': //'Redacción de textos':
        case '154': //'Texten / Kreation':
        case '198': //'Copywriting / Creazione':
        case '242': //'Copywriting / ontwerp':
            print($divOuverture);
            if($divOuverture == '<div id="slide">'){
                img_slide_6();
            }
            if($divOuverture == '<div id="slideRight">'){
                img_sidebar_6();
            }
            print($divFermeture);
            break;
        case '23': //'Why us?':
        case '68': //'Pourquoi nous?':
        case '112': //'¿Por qué trabajar con nosotros?':
        case '156': //'Warum wir?':
        case '200': //'Perché noi?':
        case '244': //'Waarom ons?':
            print($divOuverture);
            if($divOuverture == '<div id="slide">'){
                img_slide_7();
            }
            if($divOuverture == '<div id="slideRight">'){
                img_sidebar_7();
            }
            print($divFermeture);
            break;
        case '25': //'We did it!':
        case '70': //'Nos réalisations':
        case '114': //'Logros':       
        case '158': //'Erfolgsgeschichten':
        case '202': //'I nostri motivi di orgoglio:':
        case '246': //'Het is ons gelukt!':
            print($divOuverture);
            if($divOuverture == '<div id="slide">'){
                img_slide_8();
            }
            if($divOuverture == '<div id="slideRight">'){
                img_sidebar_8();
            }
            print($divFermeture);
            break;
        case '27': //'Testimonials':
        case '72': //'Témoignages':
        case '116': //'Referencias':
        case '160': //'Referenzen':
        case '204': //'Testimonianze':
        case '248': //'Klanten en vertalers aan het woord':
            print($divOuverture);
            if($divOuverture == '<div id="slide">'){
                img_slide_9();
            }
            if($divOuverture == '<div id="slideRight">'){
                img_sidebar_9();
            }
            print($divFermeture);
            break;
        case '29': //'Clients':
        case '74': //'Clients':
        case '118': //'Clientes':
        case '162': //'Kunden':
        case '206': //'Clienti':
        case '250': //'Klanten':
            print($divOuverture);
            if($divOuverture == '<div id="slide">'){
                img_slide_10();
            }
            if($divOuverture == '<div id="slideRight">'){
                img_sidebar_10();
            }
            print($divFermeture);
            break;
        case '31': //'Translators':
        case '76': //'Traducteurs':
        case '120': //'Traductores':
        case '164': //'Übersetzer':
        case '208': //'Traduttori':
        case '252': //'Vertalers':
            print($divOuverture);
            if($divOuverture == '<div id="slide">'){
                img_slide_11();
            }
            if($divOuverture == '<div id="slideRight">'){
                img_sidebar_11();
            }
            print($divFermeture);
            break;
        case '33': //'Contact':
        case '78': //'Contact':
        case '122': //'Contacto':
        case '166': //'Kontakt':
        case '210': //'Contatti':
        case '254': //'Contact':
            print($divOuverture);
            if($divOuverture == '<div id="slide">'){
                img_slide_12();
            }
            if($divOuverture == '<div id="slideRight">'){
                img_sidebar_12();
            }
            print($divFermeture);
            break;
        case '770': //'Videos & pictures':
        case '778': //'Vidéos et photos':
        case '776': //'Vídeos e imágenes':
        case '772': //'Videos und Bilder':
        case '774': //'Video e immagini':
        case '780': //'Video's en afbeeldingen':
            print($divOuverture);
            if($divOuverture == '<div id="slide">'){
                img_slide_13();
            }
            if($divOuverture == '<div id="slideRight">'){
                img_sidebar_13();
            }
            print($divFermeture);
            break;
    }
}

//fonction pour afficher la phrase lietmotiv en fonction de la langue et des pages
//1.1- définition des phrases lietmotiv "en"
function lietmotiv_en_1(){
    print('<h2 id="lietmotiv">A partnership approach for peak results</h2>');
    print('<h2 id="lietmotiv">A partnership approach for peak results</h2>');
    print('<h2 id="lietmotiv">Time is precious, use it wisely!</h2>');
    print('<h2 id="lietmotiv" class="active">Growing your success</h2>');
}
function lietmotiv_en_2(){
    print('<h2 id="lietmotiv">Strong capabilities, a flexible approach</h2>');
    print('<h2 id="lietmotiv">Strong capabilities, a flexible approach</h2>');
    print('<h2 id="lietmotiv">Stand out from the others</h2>');
    print('<h2 id="lietmotiv" class="active">We care because we share</h2>');
}
function lietmotiv_en_3(){
    print('<h2 id="lietmotiv">Stand out from the others</h2>');
    print('<h2 id="lietmotiv">Stand out from the others</h2>');
    print('<h2 id="lietmotiv">We cultivate business success!</h2>');
    print('<h2 id="lietmotiv" class="active">Shaping global products to local markets</h2>');
}
function lietmotiv_en_4(){
    print('<h2 id="lietmotiv">Clear, dynamic text that sparkles with impact!</h2>');
    print('<h2 id="lietmotiv">Clear, dynamic text that sparkles with impact!</h2>');
    print('<h2 id="lietmotiv">Let us give sparkles to your translations!</h2>');
    print('<h2 id="lietmotiv" class="active">A thirst for languages</h2>');
}
function lietmotiv_en_5(){
    print('<h2 id="lietmotiv">Map out your business success</h2>');
    print('<h2 id="lietmotiv">Map out your business success</h2>');
    print('<h2 id="lietmotiv" class="active">Draw new horizons!</h2>');
}
function lietmotiv_en_6(){
    print('<h2 id="lietmotiv">Map out your business success</h2>');
    print('<h2 id="lietmotiv">Map out your business success</h2>');
    print('<h2 id="lietmotiv" class="active">Sparkling Lengua gives you, and your text, the star treatment!</h2>');
}
function lietmotiv_en_7(){
    print('<h2 id="lietmotiv">Strong capabilities, a flexible approach</h2>');
    print('<h2 id="lietmotiv">Strong capabilities, a flexible approach</h2>');
    print('<h2 id="lietmotiv">Sparkling Lengua, your star network</h2>');
    print('<h2 id="lietmotiv" class="active">We care because we share</h2>');
}
function lietmotiv_en_8(){
    print('<h2 id="lietmotiv">Shaping global products to local markets</h2>');
    print('<h2 id="lietmotiv">Shaping global products to local markets</h2>');
    print('<h2 id="lietmotiv" class="active">Spread... the words!</h2>');
}
function lietmotiv_en_9(){
    print('<h2 id="lietmotiv" class="active1">Many valued clients trust our translation and localization expertise</h2>');
}
function lietmotiv_en_10(){
    print('<h2 id="lietmotiv" class="active1">Many valued clients trust our translation and localization expertise</h2>');
}
function lietmotiv_en_11(){
    print('<h2 id="lietmotiv" class="active1">What our partners are thinking</h2>');
}
function lietmotiv_en_12(){
    print('<h2 id="lietmotiv" class="active1">Spread... the words!</h2>');
}
function lietmotiv_en_13(){
    print('<h2 id="lietmotiv" class="active1">Draw new horizons!</h2>');
}
//1.2- définition des phrases lietmotiv "fr"
function lietmotiv_fr_1(){
    print('<h2 id="lietmotiv">Une approche de partenariat pour des résultats au sommet</h2>');
    print('<h2 id="lietmotiv">Une approche de partenariat pour des résultats au sommet</h2>');
    print('<h2 id="lietmotiv">Votre temps est précieux, faites-en bon usage !</h2>');
    print('<h2 id="lietmotiv" class="active">Nous cultivons votre réussite</h2>');
}
function lietmotiv_fr_2(){
    print('<h2 id="lietmotiv">De solides capacités, une approche flexible</h2>');
    print('<h2 id="lietmotiv">De solides capacités, une approche flexible</h2>');
    print('<h2 id="lietmotiv">Démarquez-vous des autres !</h2>');
    print('<h2 id="lietmotiv" class="active">Nous nous soucions de vous car nous partageons vos préoccupations</h2>');
}
function lietmotiv_fr_3(){
    print('<h2 id="lietmotiv">Démarquez-vous des autres !</h2>');
    print('<h2 id="lietmotiv">Démarquez-vous des autres !</h2>');
    print('<h2 id="lietmotiv">Nous cultivons la réussite de votre entreprise !</h2>');
    print('<h2 id="lietmotiv" class="active">Nous adaptons vos produits internationaux aux marchés locaux</h2>');
}
function lietmotiv_fr_4(){
    print('<h2 id="lietmotiv">Un texte clair et dynamique, à l’effet pétillant !</h2>');
    print('<h2 id="lietmotiv">Un texte clair et dynamique, à l’effet pétillant !</h2>');
    print('<h2 id="lietmotiv">Vos traductions pétillent avec nous !</h2>');
    print('<h2 id="lietmotiv" class="active">La soif des langues</h2>');
}
function lietmotiv_fr_5(){
    print('<h2 id="lietmotiv">La réussite de votre entreprise à l’échelle mondiale  </h2>');
    print('<h2 id="lietmotiv">La réussite de votre entreprise à l’échelle mondiale  </h2>');
    print('<h2 id="lietmotiv" class="active">Créez-vous de nouveaux horizons !</h2>');
}
function lietmotiv_fr_6(){
    print('<h2 id="lietmotiv">La réussite de votre entreprise à l’échelle mondiale  </h2>');
    print('<h2 id="lietmotiv">La réussite de votre entreprise à l’échelle mondiale  </h2>');
    print('<h2 id="lietmotiv" class="active">Sparkling Lengua vous traite, vos documents et vous, comme des stars !</h2>');
}
function lietmotiv_fr_7(){
    print('<h2 id="lietmotiv">De solides capacités, une approche flexible</h2>');
    print('<h2 id="lietmotiv">De solides capacités, une approche flexible</h2>');
    print('<h2 id="lietmotiv">Sparkling Lengua, votre réseau vedette</h2>');
    print('<h2 id="lietmotiv" class="active">Nous nous soucions de vous car nous partageons vos préoccupations</h2>');
}
function lietmotiv_fr_8(){
    print('<h2 id="lietmotiv">Nous adaptons vos produits internationaux aux marchés locaux</h2>');
    print('<h2 id="lietmotiv">Nous adaptons vos produits internationaux aux marchés locaux</h2>');
    print('<h2 id="lietmotiv" class="active">Faites passer…les mots !</h2>');
}
function lietmotiv_fr_9(){
    print('<h2 id="lietmotiv" class="active1">De nombreux clients font confiance à notre expérience en traduction et localisation</h2>');
}
function lietmotiv_fr_10(){
    print('<h2 id="lietmotiv" class="active1">De nombreux clients font confiance à notre expérience en traduction et localisation</h2>');
}
function lietmotiv_fr_11(){
    print('<h2 id="lietmotiv" class="active1">L’avis de nos partenaires</h2>');
}
function lietmotiv_fr_12(){
    print('<h2 id="lietmotiv" class="active1">Faites passer…les mots !</h2>');
}
function lietmotiv_fr_13(){
    print('<h2 id="lietmotiv" class="active1">Créez-vous de nouveaux horizons !</h2>');
}
//1.3- définition des phrases lietmotiv "es"
function lietmotiv_es_1(){
    print('<h2 id="lietmotiv">Un enfoque cooperativo para llegar a lo más alto</h2>');
    print('<h2 id="lietmotiv">Un enfoque cooperativo para llegar a lo más alto</h2>');
    print('<h2 id="lietmotiv">El tiempo es oro, ¡hay que aprovecharlo!</h2>');
    print('<h2 id="lietmotiv" class="active">Cultivamos su éxito</h2>');
}
function lietmotiv_es_2(){
    print('<h2 id="lietmotiv">Un enfoque basado en la experiencia y la flexibilidad</h2>');
    print('<h2 id="lietmotiv">Un enfoque basado en la experiencia y la flexibilidad</h2>');
    print('<h2 id="lietmotiv">Hacemos que se desmarque de la mayoría</h2>');
    print('<h2 id="lietmotiv" class="active">Compartimos sus preocupaciones</h2>');
}
function lietmotiv_es_3(){
    print('<h2 id="lietmotiv">Hacemos que se desmarque de la mayoría</h2>');
    print('<h2 id="lietmotiv">Hacemos que se desmarque de la mayoría</h2>');
    print('<h2 id="lietmotiv">Cultivamos el éxito empresarial</h2>');
    print('<h2 id="lietmotiv" class="active">Adaptamos productos globales a mercados locales</h2>');
}
function lietmotiv_es_4(){
    print('<h2 id="lietmotiv">Textos claros y dinámicos, con efectos deslumbrantes</h2>');
    print('<h2 id="lietmotiv">Textos claros y dinámicos, con efectos deslumbrantes</h2>');
    print('<h2 id="lietmotiv">Hacemos que sus traducciones brillen con luz propia</h2>');
    print('<h2 id="lietmotiv" class="active">Sed de idiomas</h2>');
}
function lietmotiv_es_5(){
    print('<h2 id="lietmotiv">Le guiamos hacia el éxito de su negocio</h2>');
    print('<h2 id="lietmotiv">Le guiamos hacia el éxito de su negocio</h2>');
    print('<h2 id="lietmotiv" class="active">Imagine nuevos horizontes</h2>');
}
function lietmotiv_es_6(){
    print('<h2 id="lietmotiv">Le guiamos hacia el éxito de su negocio</h2>');
    print('<h2 id="lietmotiv">Le guiamos hacia el éxito de su negocio</h2>');
    print('<h2 id="lietmotiv" class="active">Sparkling Lengua le da a usted, y a sus textos, un tratamiento de estrella</h2>');
}
function lietmotiv_es_7(){
    print('<h2 id="lietmotiv">Un enfoque basado en la experiencia y la flexibilidad</h2>');
    print('<h2 id="lietmotiv">Un enfoque basado en la experiencia y la flexibilidad</h2>');
    print('<h2 id="lietmotiv">Sparkling Lengua, una red estelar</h2>');
    print('<h2 id="lietmotiv" class="active">Compartimos sus preocupaciones</h2>');
}
function lietmotiv_es_8(){
    print('<h2 id="lietmotiv">Adaptamos productos globales a mercados locales</h2>');
    print('<h2 id="lietmotiv">Adaptamos productos globales a mercados locales</h2>');
    print('<h2 id="lietmotiv" class="active">¡Haga correr la voz!</h2>');
}
function lietmotiv_es_9(){
    print('<h2 id="lietmotiv" class="active1">Numerosos clientes confían en nuestra experiencia en traducción y localización </h2>');
}
function lietmotiv_es_10(){
    print('<h2 id="lietmotiv" class="active1">Numerosos clientes confían en nuestra experiencia en traducción y localización </h2>');
}
function lietmotiv_es_11(){
    print('<h2 id="lietmotiv" class="active1">Lo que opinan nuestros colaboradores</h2>');
}
function lietmotiv_es_12(){
    print('<h2 id="lietmotiv" class="active1">¡Haga correr la voz!</h2>');
}
function lietmotiv_es_13(){
    print('<h2 id="lietmotiv" class="active1">Imagine nuevos horizontes</h2>');
}
//1.4- définition des phrases lietmotiv "de"
function lietmotiv_de_1(){
    print('<h2 id="lietmotiv">Ihr Partner für Spitzenergebnisse</h2>');
    print('<h2 id="lietmotiv">Ihr Partner für Spitzenergebnisse</h2>');
    print('<h2 id="lietmotiv">Zeit ist Geld. Nutzen Sie sie sorgsam!</h2>');
    print('<h2 id="lietmotiv" class="active">Wir nähren Ihren Erfolg</h2>');
}
function lietmotiv_de_2(){
    print('<h2 id="lietmotiv">Starke Leistung, ganz nach Maß</h2>');
    print('<h2 id="lietmotiv">Starke Leistung, ganz nach Maß</h2>');
    print('<h2 id="lietmotiv">Damit Sie sich von der Masse abheben</h2>');
    print('<h2 id="lietmotiv" class="active">Gemeinsam für Ihren Markenauftritt</h2>');
}
function lietmotiv_de_3(){
    print('<h2 id="lietmotiv">Damit Sie sich von der Masse abheben</h2>');
    print('<h2 id="lietmotiv">Damit Sie sich von der Masse abheben</h2>');
    print('<h2 id="lietmotiv">Wir kultivieren geschäftliche Erfolge!</h2>');
    print('<h2 id="lietmotiv" class="active">Globale Produkte, getrimmt auf lokale Märkte</h2>');
}
function lietmotiv_de_4(){
    print('<h2 id="lietmotiv">Klare, brillante, spritzige Texte</h2>');
    print('<h2 id="lietmotiv">Klare, brillante, spritzige Texte</h2>');
    print('<h2 id="lietmotiv">Übersetzungen mit Pfiff</h2>');
    print('<h2 id="lietmotiv" class="active">Eine erfrischende Erfahrung</h2>');
}
function lietmotiv_de_5(){
    print('<h2 id="lietmotiv">Markenwelten ganz nach Maß</h2>');
    print('<h2 id="lietmotiv">Markenwelten ganz nach Maß</h2>');
    print('<h2 id="lietmotiv" class="active">Wenn sich neue Horizonte eröffnen</h2>');
}
function lietmotiv_de_6(){
    print('<h2 id="lietmotiv">Markenwelten ganz nach Maß</h2>');
    print('<h2 id="lietmotiv">Markenwelten ganz nach Maß</h2>');
    print('<h2 id="lietmotiv" class="active">Bei uns sind Sie – und Ihr Text – der Star!</h2>');
}
function lietmotiv_de_7(){
    print('<h2 id="lietmotiv">Starke Leistung, ganz nach Maß</h2>');
    print('<h2 id="lietmotiv">Starke Leistung, ganz nach Maß</h2>');
    print('<h2 id="lietmotiv">Sparkling Lengua – Griff nach den Sternen</h2>');
    print('<h2 id="lietmotiv" class="active">Gemeinsam für Ihren Markenauftritt</h2>');
}
function lietmotiv_de_8(){
    print('<h2 id="lietmotiv">Globale Produkte, getrimmt auf lokale Märkte</h2>');
    print('<h2 id="lietmotiv">Globale Produkte, getrimmt auf lokale Märkte</h2>');
    print('<h2 id="lietmotiv" class="active">Sagen Sie’s ... weiter!</h2>');
}
function lietmotiv_de_9(){
    print('<h2 id="lietmotiv" class="active1">Kunden aus aller Welt vertrauen auf unsere Starqualitäten</h2>');
}
function lietmotiv_de_10(){
    print('<h2 id="lietmotiv" class="active1">Kunden aus aller Welt vertrauen auf unsere Starqualitäten</h2>');
}
function lietmotiv_de_11(){
    print('<h2 id="lietmotiv" class="active1">Was unsere Partner zu sagen haben</h2>');
}
function lietmotiv_de_12(){
    print('<h2 id="lietmotiv" class="active1">Sagen Sie’s ... weiter!</h2>');
}
function lietmotiv_de_13(){
    print('<h2 id="lietmotiv" class="active1">Wenn sich neue Horizonte eröffnen</h2>');
}
//1.5- définition des phrases lietmotiv "it"
function lietmotiv_it_1(){
    print('<h2 id="lietmotiv">Un approccio collaborativo per conquistare le vette della qualità</h2>');
    print('<h2 id="lietmotiv">Un approccio collaborativo per conquistare le vette della qualità</h2>');
    print('<h2 id="lietmotiv">Il tempo è prezioso, usatelo con cura!</h2>');
    print('<h2 id="lietmotiv" class="active">Il vostro successo cresce con noi</h2>');
}
function lietmotiv_it_2(){
    print('<h2 id="lietmotiv">Le vostre esigenze: le nostre priorità</h2>');
    print('<h2 id="lietmotiv">Le vostre esigenze: le nostre priorità</h2>');
    print('<h2 id="lietmotiv">Fate la differenza!</h2>');
    print('<h2 id="lietmotiv" class="active">Le vostre esigenze: le nostre priorità</h2>');
}
function lietmotiv_it_3(){
    print('<h2 id="lietmotiv">Fate la differenza!</h2>');
    print('<h2 id="lietmotiv">Fate la differenza!</h2>');
    print('<h2 id="lietmotiv">Coltiviamo il vostro successo</h2>');
    print('<h2 id="lietmotiv" class="active">Adattiamo i prodotti globali ai mercati locali</h2>');
}
function lietmotiv_it_4(){
    print('<h2 id="lietmotiv">Testi chiari, dinamici e...effervescenti!</h2>');
    print('<h2 id="lietmotiv">Testi chiari, dinamici e...effervescenti!</h2>');
    print('<h2 id="lietmotiv">Fate frizzare le vostre traduzioni</h2>');
    print('<h2 id="lietmotiv" class="active">Assetati di lingue</h2>');
}
function lietmotiv_it_5(){
    print('<h2 id="lietmotiv">Delineate il successo della vostra azienda</h2>');
    print('<h2 id="lietmotiv">Delineate il successo della vostra azienda</h2>');
    print('<h2 id="lietmotiv" class="active">Disegnate nuovi orizzonti!</h2>');
}
function lietmotiv_it_6(){
    print('<h2 id="lietmotiv">Delineate il successo della vostra azienda</h2>');
    print('<h2 id="lietmotiv">Delineate il successo della vostra azienda</h2>');
    print('<h2 id="lietmotiv" class="active">Sparkling Lengua garantisce, a voi e ai vostri testi, un servizio stellare!</h2>');
}
function lietmotiv_it_7(){
    print('<h2 id="lietmotiv">Grandi capacità e approccio flessibile</h2>');
    print('<h2 id="lietmotiv">Grandi capacità e approccio flessibile</h2>');
    print('<h2 id="lietmotiv">Sparkling Lengua, la tua rete stellare</h2>');
    print('<h2 id="lietmotiv" class="active">Le vostre esigenze: le nostre priorità</h2>');
}
function lietmotiv_it_8(){
    print('<h2 id="lietmotiv">Adattiamo i prodotti globali ai mercati locali</h2>');
    print('<h2 id="lietmotiv">Adattiamo i prodotti globali ai mercati locali</h2>');
    print('<h2 id="lietmotiv" class="active">Passaparola!</h2>');
}
function lietmotiv_it_9(){
    print('<h2 id="lietmotiv" class="active1">Molti clienti si affidano al nostro know-how nella traduzione e nella localizzazione</h2>');
}
function lietmotiv_it_10(){
    print('<h2 id="lietmotiv" class="active1">Molti clienti si affidano al nostro know-how nella traduzione e nella localizzazione</h2>');
}
function lietmotiv_it_11(){
    print('<h2 id="lietmotiv" class="active1">Cosa ne pensano i nostri collaboratori</h2>');
}
function lietmotiv_it_12(){
    print('<h2 id="lietmotiv" class="active1">Passaparola!</h2>');
}
function lietmotiv_it_13(){
    print('<h2 id="lietmotiv" class="active1">Disegnate nuovi orizzonti!</h2>');
}
//1.6- définition des phrases lietmotiv "nl"
function lietmotiv_nl_1(){
    print('<h2 id="lietmotiv">Een partnerschapsaanpak voor resultaten van topkwaliteit</h2>');
    print('<h2 id="lietmotiv">Een partnerschapsaanpak voor resultaten van topkwaliteit</h2>');
    print('<h2 id="lietmotiv">Uw tijd is kostbaar. Wij springen er efficiënt mee om.</h2>');
    print('<h2 id="lietmotiv" class="active">Wij helpen u te groeien door uw projecten tot een succes te maken</h2>');
}
function lietmotiv_nl_2(){
    print('<h2 id="lietmotiv">Laat u verrassen door ons kwaliteitswerk en onze flexibele aanpak</h2>');
    print('<h2 id="lietmotiv">Laat u verrassen door ons kwaliteitswerk en onze flexibele aanpak</h2>');
    print('<h2 id="lietmotiv">Wij onderscheiden ons van de rest</h2>');
    print('<h2 id="lietmotiv" class="active">Uw doel is ons doel en we bewegen hemel en aarde om dit te realiseren</h2>');
}
function lietmotiv_nl_3(){
    print('<h2 id="lietmotiv">Wij onderscheiden ons van de rest</h2>');
    print('<h2 id="lietmotiv">Wij onderscheiden ons van de rest</h2>');
    print('<h2 id="lietmotiv">Wij cultiveren uw succes!</h2>');
    print('<h2 id="lietmotiv" class="active">Wij maken uw internationale producten perfect geschikt voor lokale markten </h2>');
}
function lietmotiv_nl_4(){
    print('<h2 id="lietmotiv">Wij bieden u vlotte, dynamische teksten met een grote overtuigingskracht!</h2>');
    print('<h2 id="lietmotiv">Wij bieden u vlotte, dynamische teksten met een grote overtuigingskracht!</h2>');
    print('<h2 id="lietmotiv">Wij bieden u sprankelende vertalingen.</h2>');
    print('<h2 id="lietmotiv" class="active">Kwaliteitswerk dankzij onze dorst naar talen</h2>');
}
function lietmotiv_nl_5(){
    print('<h2 id="lietmotiv">Wij zetten uw bedrijf duidelijk op de kaart </h2>');
    print('<h2 id="lietmotiv">Wij zetten uw bedrijf duidelijk op de kaart </h2>');
    print('<h2 id="lietmotiv" class="active">Wij ondersteunen uw groeipad!</h2>');
}
function lietmotiv_nl_6(){
    print('<h2 id="lietmotiv">Wij zetten uw bedrijf duidelijk op de kaart </h2>');
    print('<h2 id="lietmotiv">Wij zetten uw bedrijf duidelijk op de kaart </h2>');
    print('<h2 id="lietmotiv" class="active">Sparkling Lengua geeft u en uw teksten een sterbehandeling!</h2>');
}
function lietmotiv_nl_7(){
    print('<h2 id="lietmotiv">Laat u verrassen door ons kwaliteitswerk en onze flexibele aanpak</h2>');
    print('<h2 id="lietmotiv">Laat u verrassen door ons kwaliteitswerk en onze flexibele aanpak</h2>');
    print('<h2 id="lietmotiv">Sparkling Lengua, uw netwerk van sterren</h2>');
    print('<h2 id="lietmotiv" class="active">Uw doel is ons doel en we bewegen hemel en aarde om dit te realiseren</h2>');
}
function lietmotiv_nl_8(){
    print('<h2 id="lietmotiv">Wij maken uw internationale producten perfect geschikt voor lokale markten </h2>');
    print('<h2 id="lietmotiv">Wij maken uw internationale producten perfect geschikt voor lokale markten </h2>');
    print('<h2 id="lietmotiv" class="active">Men zegge het voort!</h2>');
}
function lietmotiv_nl_9(){
    print('<h2 id="lietmotiv" class="active1">Klanten vertrouwen op ons voor onze expertise op het gebied van vertaling en lokalisatie</h2>');
}
function lietmotiv_nl_10(){
    print('<h2 id="lietmotiv" class="active1">Klanten vertrouwen op ons voor onze expertise op het gebied van vertaling en lokalisatie</h2>');
}
function lietmotiv_nl_11(){
    print('<h2 id="lietmotiv" class="active1">Wat onze partners van ons vinden</h2>');
}
function lietmotiv_nl_12(){
    print('<h2 id="lietmotiv" class="active1">Men zegge het voort!</h2>');
}
function lietmotiv_nl_13(){
    print('<h2 id="lietmotiv" class="active1">Wij ondersteunen uw groeipad!</h2>');
}
//2.1- définition des pages recevant le lietmotiv "en"
function switch_page_title_en(){
    global $post;
    switch ($post->ID) {
        case '7': //'About us':
        case '11': //'Our philosophy':
            lietmotiv_en_1();
            break;
        case '9': //'Meet the team':
            lietmotiv_en_2();
            break;
        case '13': //'Solutions':
            lietmotiv_en_3();
            break;
        case '15': //'Translation / Localization / Transcreation':
            lietmotiv_en_4();
            break;
        case '17': //'Video Subtitling / Voice&#x2011;over (Dubbing)':
        case '19': //'Desktop Publishing (DTP)':
            lietmotiv_en_5();
            break;
        case '21': //'Copywriting / Creation':
            lietmotiv_en_6();
            break;
        case '23': //'Why us?':                
            lietmotiv_en_7();
            break;
        case '25': //'We did it!':
            lietmotiv_en_8();
            break;
        case '27': //'Testimonials':
            lietmotiv_en_9();
            break;
        case '29': //'Clients':
            lietmotiv_en_10();
            break;
        case '31': //'Translators':
            lietmotiv_en_11();
            break;
        case '33': //'Contact':
            lietmotiv_en_12();
            break;
        case '738': //'Videos':
            lietmotiv_en_13();
            break;
    } 
}
//2.2- définition des pages recevant le lietmotiv "fr"
function switch_page_title_fr(){
    global $post;
    switch ($post->ID) {
        case '52': //'À propos de nous':
        case '56': //'Notre philosophie':
            lietmotiv_fr_1();
            break;
        case '54': //'L’équipe':
            lietmotiv_fr_2();
            break;
        case '58': //'Solutions':
            lietmotiv_fr_3();
            break;
        case '60': //'Traduction / Localisation / Transcréation':
            lietmotiv_fr_4();
            break;
        case '62': //'Sous‑titrage / Doublage vidéo':
        case '64': //'Publication assistée par ordinateur':
            lietmotiv_fr_5();
            break;
        case '66': //'Copywriting / Création':
            lietmotiv_fr_6();
            break;
        case '68': //'Pourquoi nous?':                
            lietmotiv_fr_7();
            break;
        case '70': //'Nos réalisations':
            lietmotiv_fr_8();
            break;
        case '72': //'Témoignages':
            lietmotiv_fr_9();
            break;
        case '74': //'Clients':
            lietmotiv_fr_10();
            break;
        case '76': //'Traducteurs':
            lietmotiv_fr_11();
            break;
        case '78': //'Contact':
            lietmotiv_fr_12();
            break;
        case '7--': //'Videos':
            lietmotiv_fr_13();
            break;
    } 
}
//2.3- définition des pages recevant le lietmotiv "es"
function switch_page_title_es(){
    global $post;
    switch ($post->ID) {
        case '96': //'Empresa':
        case '100': //'Nuestra filosofía':
            lietmotiv_es_1();
            break;
        case '98': //'Conoce al equipo':
            lietmotiv_es_2();
            break;
        case '102': //'Soluciones':
            lietmotiv_es_3();
            break;
        case '104': //'Traducción / Localización / Adaptación':
            lietmotiv_es_4();
            break;
        case '106': //'Subtitulado / Voz en off':
        case '108': //'Diseño gráfico':
            lietmotiv_es_5();
            break;
        case '110': //'Redacción de textos':
            lietmotiv_es_6();
            break;
        case '112': //'¿Por qué trabajar con nosotros?':                
            lietmotiv_es_7();
            break;
        case '114': //'Logros':
            lietmotiv_es_8();
            break;
        case '116': //'Referencias':
            lietmotiv_es_9();
            break;
        case '118': //'Clientes':
            lietmotiv_es_10();
            break;
        case '120': //'Traductores':
            lietmotiv_es_11();
            break;
        case '122': //'Contacto':
            lietmotiv_es_12();
            break;
        case '--': //'Videos':
            lietmotiv_es_13();
            break;
    } 
}
//2.4- définition des pages recevant le lietmotiv "de"
function switch_page_title_de(){
    global $post;
    switch ($post->ID) {
        case '140': //'Wir über uns':
        case '144': //'Philosophie':
            lietmotiv_de_1();
            break;
        case '142': //'Unser Team':
            lietmotiv_de_2();
            break;
        case '146': //'Lösungen':
            lietmotiv_de_3();
            break;
        case '148': //'Übersetzung / Lokalisierung / Transkreation':
            lietmotiv_de_4();
            break;
        case '150': //'Video-Untertitelung / Voice‑over':
        case '152': //'Desktop‑Publishing':
            lietmotiv_de_5();
            break;
        case '154': //'Texten / Kreation':
            lietmotiv_de_6();
            break;
        case '156': //'Warum wir?':                
            lietmotiv_de_7();
            break;
        case '158': //'Erfolgsgeschichten':
            lietmotiv_de_8();
            break;
        case '160': //'Referenzen':
            lietmotiv_de_9();
            break;
        case '162': //'Kunden':
            lietmotiv_de_10();
            break;
        case '164': //'Übersetzer':
            lietmotiv_de_11();
            break;
        case '166': //'Kontakt':
            lietmotiv_de_12();
            break;
        case '--': //'Videos':
            lietmotiv_de_13();
            break;
    } 
}
//2.5- définition des pages recevant le lietmotiv "it"
function switch_page_title_it(){
    global $post;
    switch ($post->ID) {
        case '184': //'Su di noi':
        case '188': //'La nostra filosofia':
            lietmotiv_it_1();
            break;
        case '186': //'Il gruppo':
            lietmotiv_it_2();
            break;
        case '190': //'Soluzioni':
            lietmotiv_it_3();
            break;
        case '192': //'Traduzione / Localizzazione / Transcreazione':
            lietmotiv_it_4();
            break;
        case '194': //'Sottotitolaggio / Doppiaggio':
        case '196': //'Desktop publishing':
            lietmotiv_it_5();
            break;
        case '198': //'Copywriting / Creazione':
            lietmotiv_it_6();
            break;
        case '200': //'Perché noi?':                
            lietmotiv_it_7();
            break;
        case '202': //'I nostri motivi di orgoglio:':
            lietmotiv_it_8();
            break;
        case '204': //'Testimonianze':
            lietmotiv_it_9();
            break;
        case '206': //'Clienti':
            lietmotiv_it_10();
            break;
        case '208': //'Traduttori':
            lietmotiv_it_11();
            break;
        case '210': //'Contatti':
            lietmotiv_it_12();
            break;
        case '--': //'Videos':
            lietmotiv_it_13();
            break;
    } 
}
//2.6- définition des pages recevant le lietmotiv "nl"
function switch_page_title_nl(){
    global $post;
    switch ($post->ID) {
        case '228': //'Over ons':
        case '232': //'Onze filosofie':
            lietmotiv_nl_1();
            break;
        case '230': //'Maak kennis met het team':
            lietmotiv_nl_2();
            break;
        case '234': //'Oplossingen':
            lietmotiv_nl_3();
            break;
        case '236': //'Vertaling / lokalisatie / transcreatie':
            lietmotiv_nl_4();
            break;
        case '238': //'Ondertiteling van video's / voice‑over':
        case '240': //'Desktoppublishing':
            lietmotiv_nl_5();
            break;
        case '242': //'Copywriting / ontwerp':
            lietmotiv_nl_6();
            break;
        case '244': //'Waarom ons?':                
            lietmotiv_nl_7();
            break;
        case '246': //'Het is ons gelukt!':
            lietmotiv_nl_8();
            break;
        case '248': //'Klanten en vertalers aan het woord':
            lietmotiv_nl_9();
            break;
        case '250': //'Klanten':
            lietmotiv_nl_10();
            break;
        case '252': //'Vertalers':
            lietmotiv_nl_11();
            break;
        case '254': //'Contact':
            lietmotiv_nl_12();
            break;
        case '--': //'Videos':
            lietmotiv_nl_13();
            break;
    } 
}

//3.1- définition de la langue des pages recevant le lietmotiv
function div_slide_lietmotiv($pageAncestor){
    //on vérifie la langue pour changer la langue du lietmotiv
    print('<div id="slideLietmotiv">');
    //choix du lietmotiv en fonction des langues
    switch ($pageAncestor){
        case 'en': 
            switch_page_title_en();
            break;
        case 'fr':
            switch_page_title_fr();
            break;
        case 'es':
            switch_page_title_es();
            break;
        case 'de':
            switch_page_title_de();
            break;
        case 'it':
            switch_page_title_it();
            break;
        case 'nl':
            switch_page_title_nl();
            break;
    }
    print('</div><!-- #slideLietmotiv -->');
}

//function pour afficher le texte de la sidebar
function display_contentRightText($pageAncestor){
    $theID = get_the_ID();
    //on verifie la version de la langue de la page
    print('<div class="contentRightText">');
    switch ($pageAncestor){
        case 'en':
            //si le titre parent est un des suivants on affiche le contenu suivant            
            switch($theID){
                case '23':
                    print('<br><p>');
                    print('<strong>Our well-organized terminology management, state-of-the-art production 
                        solutions and scheduling capabilities ensure efficient and cost-effective 
                        translation/localization – Irrespective of the volume!</strong>');
                    print('</p>');
                    break;
            }
            break;
        case 'fr':
            //si le titre parent est un des suivants on affiche le contenu suivant
            switch($theID){
                case '68':
                    print('<br><p>');
                    print('<strong>Notre gestion bien organisée de la terminologie, 
                        nos solutions de production à la pointe de la technologie et nos capacités de 
                        planification garantissent une traduction (localisation) efficace et rentable, 
                        quel que soit le volume !</strong>');
                    print('</p>');
                    break;
            }
            break;
        case 'es':
            //si le titre parent est un des suivants on affiche le contenu suivant
            switch($theID){
                case '112':
                    print('<br><p>');
                    print('<strong>Gracias a una buena organización de la terminología, 
                        las últimas tecnologías en sistemas de producción y nuestra capacidad de 
                        planificación, gestionamos sus proyectos de traducción y localización de manera 
                        eficaz y rentable, independientemente del volumen del encargo.</strong>');
                    print('</p>');
                    break;
            }
            break;
        case 'de':
            //si le titre parent est un des suivants on affiche le contenu suivant
            switch($theID){
                case '156':
                    print('<br><p>');
                    print('<strong>Wie groß oder wie klein Ihr Projekt auch sein mag: 
                        Eine durchdachte Terminologieverwaltung, modernste Produktions-systeme und 
                        führende Planungstools garantieren eine effiziente, wirtschaftliche Bearbeitung.
                        </strong>');
                    print('</p>');
                    break;
            }
            break;
        case 'it':
            //si le titre parent est un des suivants on affiche le contenu suivant
            switch($theID){
                    case '200':
                        print('<br><p>');
                        print('<strong>La nostra gestione terminologica ben organizzata e le nostre 
                            soluzioni di produzione e di programmazione all\'avanguardia garantiscono 
                            traduzioni/localizzazioni efficienti e convenienti, indipendentemente dai volumi!
                            </strong>');
                        print('</p>');
                        break;
            }
            break;
        case 'nl':
            //si le titre parent est un des suivants on affiche le contenu suivant
            switch($theID){
                case '244':
                    print('<br><p>');
                    print('<strong>Met goed georganiseerd terminologiebeheer, geavanceerde 
                        productieoplossingen en betrouwbare projectplanning zorgen we ervoor dat uw 
                        projecten op efficiënte en kosteneffectieve wijze worden vertaald/gelokaliseerd – 
                        ongeacht het volume!</strong>');
                    print('</p>');
                    break;
            }
            break;
    } 
    print('</div><!-- contentRightText -->');
}

//récupération de owl carousel
function display_owlCarousel(){
    wp_enqueue_script('owlCarousel', get_template_directory_uri().'/owlCarousel/owl.carousel.js');
    wp_enqueue_style('owlCarouselCSS', get_template_directory_uri().'/owlCarousel/owl.carousel.css');
    wp_enqueue_style('owlthemeCSS', get_template_directory_uri().'/owlCarousel/owl.theme.css');
    wp_enqueue_script('dtp', get_template_directory_uri().'/js/dtp.js');
}

//page en construction
function spark_construction($pageAncestor){
    switch ($pageAncestor) {
        case 'en':
            printf('Under construction');
            break;
        case 'fr':
            printf('En cours de traduction...');
            break;
        case 'de':
            printf('Seite in Arbeit ...');
            break;
        case 'es':
            printf('Página en fase de elaboración');
            break;
        case 'it':
            printf('La pagina sarà disponibile a breve');
            break;
        case 'nl':
            printf('Deze pagina is nog in aanbouw');
            break;
    }
}
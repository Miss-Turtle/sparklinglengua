<?php

$pageTitle = get_the_title();
global $post; 
//initialisation des variables
$menuLangueActifEn = '';
$menuLangueActifFr = '';
$menuLangueActifEs = '';
$menuLangueActifDe = '';
$menuLangueActifIt = '';
$menuLangueActifNl = '';
//récupération de l'ID de la page pour activer la class du menu actif
switch($post->ID){
    case '7':
    case '9':
    case '11':
    case '13':
    case '15':
    case '17':
    case '19':
    case '21':
    case '23':
    case '25':
    case '27':
    case '29':
    case '31':
    case '33':
        $menuLangueActifEn = ' menuLangueActif';
        break;
    case '52':
    case '54':
    case '56':
    case '58':
    case '60':
    case '62':
    case '64':
    case '66':
    case '68':
    case '70':
    case '72':
    case '74':
    case '76':
    case '78':
        $menuLangueActifFr = ' menuLangueActif';
        break;
    case '96':
    case '98':
    case '100':
    case '102':
    case '104':
    case '106':
    case '108':
    case '110':
    case '112':
    case '114':
    case '116':
    case '118':
    case '120':
    case '122':
        $menuLangueActifEs = ' menuLangueActif';
        break;
    case '140':
    case '142':
    case '144':
    case '146':
    case '148':
    case '150':
    case '152':
    case '154':
    case '156':
    case '158':
    case '160':
    case '162':
    case '164':
    case '166':
        $menuLangueActifDe = ' menuLangueActif';
        break;
    case '184':
    case '186':
    case '188':
    case '190':
    case '192':
    case '194':
    case '196':
    case '198':
    case '200':
    case '202':
    case '204':
    case '206':
    case '208':
    case '210':
        $menuLangueActifIt = ' menuLangueActif';
        break;
    case '228':
    case '230':
    case '232':
    case '234':
    case '236':
    case '238':
    case '240':
    case '242':
    case '244':
    case '246':
    case '248':
    case '250':
    case '252':
    case '254':
        $menuLangueActifNl = ' menuLangueActif';
        break;
}

//correspondance des id de page pour récupérer les urls vers les autres langues
print('<div id="divMenuLangue">');
    switch ($post->ID){
        case '7':
        case '52':
        case '96':
        case '140':
        case '184':
        case '228':
            printf('<a href="%s" title="url en" class="menuLangue%s">EN</a>|', get_post('7')->guid, $menuLangueActifEn);
            printf('<a href="%s" title="url fr" class="menuLangue%s">FR</a>|', get_post('52')->guid, $menuLangueActifFr);
            printf('<a href="%s" title="url es" class="menuLangue%s">ES</a>|', get_post('96')->guid, $menuLangueActifEs);
            printf('<a href="%s" title="url de" class="menuLangue%s">DE</a>|', get_post('140')->guid, $menuLangueActifDe);
            printf('<a href="%s" title="url it" class="menuLangue%s">IT</a>|', get_post('184')->guid, $menuLangueActifIt);
            printf('<a href="%s" title="url nl" class="menuLangue%s">NL</a>', get_post('228')->guid, $menuLangueActifNl);
            break;
        case '9':
        case '54':
        case '98':
        case '142':
        case '186':
        case '230':
            printf('<a href="%s" title="url en" class="menuLangue%s">EN</a>|', get_post('9')->guid, $menuLangueActifEn);
            printf('<a href="%s" title="url fr" class="menuLangue%s">FR</a>|', get_post('54')->guid, $menuLangueActifFr);
            printf('<a href="%s" title="url es" class="menuLangue%s">ES</a>|', get_post('98')->guid, $menuLangueActifEs);
            printf('<a href="%s" title="url de" class="menuLangue%s">DE</a>|', get_post('142')->guid, $menuLangueActifDe);
            printf('<a href="%s" title="url it" class="menuLangue%s">IT</a>|', get_post('186')->guid, $menuLangueActifIt);
            printf('<a href="%s" title="url nl" class="menuLangue%s">NL</a>', get_post('230')->guid, $menuLangueActifNl);
            break;
        case '11':
        case '56':
        case '100':
        case '144':
        case '188':
        case '232':
            printf('<a href="%s" title="url en" class="menuLangue%s">EN</a>|', get_post('11')->guid, $menuLangueActifEn);
            printf('<a href="%s" title="url fr" class="menuLangue%s">FR</a>|', get_post('56')->guid, $menuLangueActifFr);
            printf('<a href="%s" title="url es" class="menuLangue%s">ES</a>|', get_post('100')->guid, $menuLangueActifEs);
            printf('<a href="%s" title="url de" class="menuLangue%s">DE</a>|', get_post('144')->guid, $menuLangueActifDe);
            printf('<a href="%s" title="url it" class="menuLangue%s">IT</a>|', get_post('188')->guid, $menuLangueActifIt);
            printf('<a href="%s" title="url nl" class="menuLangue%s">NL</a>', get_post('232')->guid, $menuLangueActifNl);
            break;
        case '13':
        case '58':
        case '102':
        case '146':
        case '190':
        case '234':
            printf('<a href="%s" title="url en" class="menuLangue%s">EN</a>|', get_post('13')->guid, $menuLangueActifEn);
            printf('<a href="%s" title="url fr" class="menuLangue%s">FR</a>|', get_post('58')->guid, $menuLangueActifFr);
            printf('<a href="%s" title="url es" class="menuLangue%s">ES</a>|', get_post('102')->guid, $menuLangueActifEs);
            printf('<a href="%s" title="url de" class="menuLangue%s">DE</a>|', get_post('146')->guid, $menuLangueActifDe);
            printf('<a href="%s" title="url it" class="menuLangue%s">IT</a>|', get_post('190')->guid, $menuLangueActifIt);
            printf('<a href="%s" title="url nl" class="menuLangue%s">NL</a>', get_post('234')->guid, $menuLangueActifNl);
            break;
        case '15':
        case '60':
        case '104':
        case '148':
        case '192':
        case '236':
            printf('<a href="%s" title="url en" class="menuLangue%s">EN</a>|', get_post('15')->guid, $menuLangueActifEn);
            printf('<a href="%s" title="url fr" class="menuLangue%s">FR</a>|', get_post('60')->guid, $menuLangueActifFr);
            printf('<a href="%s" title="url es" class="menuLangue%s">ES</a>|', get_post('104')->guid, $menuLangueActifEs);
            printf('<a href="%s" title="url de" class="menuLangue%s">DE</a>|', get_post('148')->guid, $menuLangueActifDe);
            printf('<a href="%s" title="url it" class="menuLangue%s">IT</a>|', get_post('192')->guid, $menuLangueActifIt);
            printf('<a href="%s" title="url nl" class="menuLangue%s">NL</a>', get_post('236')->guid, $menuLangueActifNl);
            break;
        case '17':
        case '62':
        case '106':
        case '150':
        case '194':
        case '238':
            printf('<a href="%s" title="url en" class="menuLangue%s">EN</a>|', get_post('17')->guid, $menuLangueActifEn);
            printf('<a href="%s" title="url fr" class="menuLangue%s">FR</a>|', get_post('62')->guid, $menuLangueActifFr);
            printf('<a href="%s" title="url es" class="menuLangue%s">ES</a>|', get_post('106')->guid, $menuLangueActifEs);
            printf('<a href="%s" title="url de" class="menuLangue%s">DE</a>|', get_post('150')->guid, $menuLangueActifDe);
            printf('<a href="%s" title="url it" class="menuLangue%s">IT</a>|', get_post('194')->guid, $menuLangueActifIt);
            printf('<a href="%s" title="url nl" class="menuLangue%s">NL</a>', get_post('238')->guid, $menuLangueActifNl);
            break;
        case '19':
        case '64':
        case '108':
        case '152':
        case '196':
        case '240':
            printf('<a href="%s" title="url en" class="menuLangue%s">EN</a>|', get_post('19')->guid, $menuLangueActifEn);
            printf('<a href="%s" title="url fr" class="menuLangue%s">FR</a>|', get_post('64')->guid, $menuLangueActifFr);
            printf('<a href="%s" title="url es" class="menuLangue%s">ES</a>|', get_post('108')->guid, $menuLangueActifEs);
            printf('<a href="%s" title="url de" class="menuLangue%s">DE</a>|', get_post('152')->guid, $menuLangueActifDe);
            printf('<a href="%s" title="url it" class="menuLangue%s">IT</a>|', get_post('196')->guid, $menuLangueActifIt);
            printf('<a href="%s" title="url nl" class="menuLangue%s">NL</a>', get_post('240')->guid, $menuLangueActifNl);
            break;
        case '21':
        case '66':
        case '110':
        case '154':
        case '198':
        case '242':
            printf('<a href="%s" title="url en" class="menuLangue%s">EN</a>|', get_post('21')->guid, $menuLangueActifEn);
            printf('<a href="%s" title="url fr" class="menuLangue%s">FR</a>|', get_post('66')->guid, $menuLangueActifFr);
            printf('<a href="%s" title="url es" class="menuLangue%s">ES</a>|', get_post('110')->guid, $menuLangueActifEs);
            printf('<a href="%s" title="url de" class="menuLangue%s">DE</a>|', get_post('154')->guid, $menuLangueActifDe);
            printf('<a href="%s" title="url it" class="menuLangue%s">IT</a>|', get_post('198')->guid, $menuLangueActifIt);
            printf('<a href="%s" title="url nl" class="menuLangue%s">NL</a>', get_post('242')->guid, $menuLangueActifNl);
            break;
        case '23':
        case '68':
        case '112':
        case '156':
        case '200':
        case '244':
            printf('<a href="%s" title="url en" class="menuLangue%s">EN</a>|', get_post('23')->guid, $menuLangueActifEn);
            printf('<a href="%s" title="url fr" class="menuLangue%s">FR</a>|', get_post('68')->guid, $menuLangueActifFr);
            printf('<a href="%s" title="url es" class="menuLangue%s">ES</a>|', get_post('112')->guid, $menuLangueActifEs);
            printf('<a href="%s" title="url de" class="menuLangue%s">DE</a>|', get_post('156')->guid, $menuLangueActifDe);
            printf('<a href="%s" title="url it" class="menuLangue%s">IT</a>|', get_post('200')->guid, $menuLangueActifIt);
            printf('<a href="%s" title="url nl" class="menuLangue%s">NL</a>', get_post('244')->guid, $menuLangueActifNl);
            break;
        case '25':
        case '70':
        case '114':
        case '158':
        case '202':
        case '246':
            printf('<a href="%s" title="url en" class="menuLangue%s">EN</a>|', get_post('25')->guid, $menuLangueActifEn);
            printf('<a href="%s" title="url fr" class="menuLangue%s">FR</a>|', get_post('70')->guid, $menuLangueActifFr);
            printf('<a href="%s" title="url es" class="menuLangue%s">ES</a>|', get_post('114')->guid, $menuLangueActifEs);
            printf('<a href="%s" title="url de" class="menuLangue%s">DE</a>|', get_post('158')->guid, $menuLangueActifDe);
            printf('<a href="%s" title="url it" class="menuLangue%s">IT</a>|', get_post('202')->guid, $menuLangueActifIt);
            printf('<a href="%s" title="url nl" class="menuLangue%s">NL</a>', get_post('246')->guid, $menuLangueActifNl);
            break;
        case '27':
        case '72':
        case '116':
        case '160':
        case '204':
        case '248':
            printf('<a href="%s" title="url en" class="menuLangue%s">EN</a>|', get_post('27')->guid, $menuLangueActifEn);
            printf('<a href="%s" title="url fr" class="menuLangue%s">FR</a>|', get_post('72')->guid, $menuLangueActifFr);
            printf('<a href="%s" title="url es" class="menuLangue%s">ES</a>|', get_post('116')->guid, $menuLangueActifEs);
            printf('<a href="%s" title="url de" class="menuLangue%s">DE</a>|', get_post('160')->guid, $menuLangueActifDe);
            printf('<a href="%s" title="url it" class="menuLangue%s">IT</a>|', get_post('204')->guid, $menuLangueActifIt);
            printf('<a href="%s" title="url nl" class="menuLangue%s">NL</a>', get_post('248')->guid, $menuLangueActifNl);
            break;
        case '29':
        case '74':
        case '118':
        case '162':
        case '206':
        case '250':
            printf('<a href="%s" title="url en" class="menuLangue%s">EN</a>|', get_post('29')->guid, $menuLangueActifEn);
            printf('<a href="%s" title="url fr" class="menuLangue%s">FR</a>|', get_post('74')->guid, $menuLangueActifFr);
            printf('<a href="%s" title="url es" class="menuLangue%s">ES</a>|', get_post('118')->guid, $menuLangueActifEs);
            printf('<a href="%s" title="url de" class="menuLangue%s">DE</a>|', get_post('162')->guid, $menuLangueActifDe);
            printf('<a href="%s" title="url it" class="menuLangue%s">IT</a>|', get_post('206')->guid, $menuLangueActifIt);
            printf('<a href="%s" title="url nl" class="menuLangue%s">NL</a>', get_post('250')->guid, $menuLangueActifNl);
            break;
        case '31':
        case '76':
        case '120':
        case '164':
        case '208':
        case '252':
            printf('<a href="%s" title="url en" class="menuLangue%s">EN</a>|', get_post('31')->guid, $menuLangueActifEn);
            printf('<a href="%s" title="url fr" class="menuLangue%s">FR</a>|', get_post('76')->guid, $menuLangueActifFr);
            printf('<a href="%s" title="url es" class="menuLangue%s">ES</a>|', get_post('120')->guid, $menuLangueActifEs);
            printf('<a href="%s" title="url de" class="menuLangue%s">DE</a>|', get_post('164')->guid, $menuLangueActifDe);
            printf('<a href="%s" title="url it" class="menuLangue%s">IT</a>|', get_post('208')->guid, $menuLangueActifIt);
            printf('<a href="%s" title="url nl" class="menuLangue%s">NL</a>', get_post('252')->guid, $menuLangueActifNl);
            break;
        case '33':
        case '78':
        case '122':
        case '166':
        case '210':
        case '254':
            printf('<a href="%s" title="url en" class="menuLangue%s">EN</a>|', get_post('33')->guid, $menuLangueActifEn);
            printf('<a href="%s" title="url fr" class="menuLangue%s">FR</a>|', get_post('78')->guid, $menuLangueActifFr);
            printf('<a href="%s" title="url es" class="menuLangue%s">ES</a>|', get_post('122')->guid, $menuLangueActifEs);
            printf('<a href="%s" title="url de" class="menuLangue%s">DE</a>|', get_post('166')->guid, $menuLangueActifDe);
            printf('<a href="%s" title="url it" class="menuLangue%s">IT</a>|', get_post('210')->guid, $menuLangueActifIt);
            printf('<a href="%s" title="url nl" class="menuLangue%s">NL</a>', get_post('254')->guid, $menuLangueActifNl);
            break;
    }
print('</div>');
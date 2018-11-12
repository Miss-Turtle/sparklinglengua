(function($){
    //-----------------------------------------------------------
    //message d'alerte pour les champs requis non renseignés
    //-----------------------------------------------------------
    $('input[type=submit]').click(function(){
        var valid = true;
        var invalid = false; 
        //on vérifie que la langue est renseignée sinon on fait apparaître un message d'erreur
        if($('#langue input:checked').val() == 'en' || $('#langue input:checked').val() == 'fr' 
                || $('#langue input:checked').val() == 'es' || $('#langue input:checked').val() == 'de' 
                || $('#langue input:checked').val() == 'it' || $('#langue input:checked').val() == 'nl'){
            $('.langue').hide();
        } else {
            $('.langue').show();
            return invalid;
        }
        //on vérifie que le prénom est renseigné sinon on fait appara^tre une alerte
        if($('#prenom').val() !== ''){
            $('.prenom').hide();
        } else {
            $('.prenom').show();
            return invalid;
        }
        //on vérifie que le statut est renseigné sinon on fait appara^tre une alerte
        if($('#langage').val() !== ''){
            $('.langage').hide();
        } else {
            $('.langage').show();
            return invalid;
        }
        //on vérifie que le témoignage est renseigné sinon on fait appara^tre une alerte
        if($('#tinymce').val() !== ''){
            $('.temoignage').hide();
        } else {
            $('.temoignage').show();
            return invalid;
        }
        return valid;
    });
    
    //on cache les langues différentes de l'anglais de l'admin
    $('#fr-h2').hide();    $('#es-h2').hide();    $('#de-h2').hide();    $('#it-h2').hide();
    $('#nl-h2').hide();
    $('#fr-table-clients').hide();    $('#es-table-clients').hide();    $('#de-table-clients').hide();
    $('#it-table-clients').hide();    $('#nl-table-clients').hide();
    $('.fr-h2').click(function(){//si clic sur fr alors on fait apparaître les données fr
        $('#fr-h2').show();    $('#es-h2').hide();    $('#de-h2').hide();    $('#it-h2').hide();
        $('#nl-h2').hide();        $('#en-h2').hide();
        $('#fr-table-clients').show();    $('#es-table-clients').hide();    $('#de-table-clients').hide();
        $('#it-table-clients').hide();    $('#nl-table-clients').hide();        $('#en-table-clients').hide();
    });
    $('.es-h2').click(function(){//si clic sur es alors on fait apparaître les données es
        $('#fr-h2').hide();    $('#es-h2').show();    $('#de-h2').hide();    $('#it-h2').hide();
        $('#nl-h2').hide();        $('#en-h2').hide();
        $('#fr-table-clients').hide();    $('#es-table-clients').show();    $('#de-table-clients').hide();
        $('#it-table-clients').hide();    $('#nl-table-clients').hide();        $('#en-table-clients').hide();
    });
    $('.de-h2').click(function(){//si clic sur de alors on fait apparaître les données de
        $('#fr-h2').hide();    $('#es-h2').hide();    $('#de-h2').show();    $('#it-h2').hide();
        $('#nl-h2').hide();        $('#en-h2').hide();
        $('#fr-table-clients').hide();    $('#es-table-clients').hide();    $('#de-table-clients').show();
        $('#it-table-clients').hide();    $('#nl-table-clients').hide();        $('#en-table-clients').hide();
    });
    $('.it-h2').click(function(){//si clic sur it alors on fait apparaître les données it
        $('#fr-h2').hide();    $('#es-h2').hide();    $('#de-h2').hide();    $('#it-h2').show();
        $('#nl-h2').hide();        $('#en-h2').hide();
        $('#fr-table-clients').hide();    $('#es-table-clients').hide();    $('#de-table-clients').hide();
        $('#it-table-clients').show();    $('#nl-table-clients').hide();        $('#en-table-clients').hide();
    });
    $('.nl-h2').click(function(){//si clic sur nl alors on fait apparaître les données nl
        $('#fr-h2').hide();    $('#es-h2').hide();    $('#de-h2').hide();    $('#it-h2').hide();
        $('#nl-h2').show();        $('#en-h2').hide();
        $('#fr-table-clients').hide();    $('#es-table-clients').hide();    $('#de-table-clients').hide();
        $('#it-table-clients').hide();    $('#nl-table-clients').show();        $('#en-table-clients').hide();
    });
    $('.en-h2').click(function(){//si clic sur en alors on fait apparaître les données en
        $('#fr-h2').hide();    $('#es-h2').hide();    $('#de-h2').hide();    $('#it-h2').hide();
        $('#nl-h2').hide();        $('#en-h2').show();
        $('#fr-table-clients').hide();    $('#es-table-clients').hide();    $('#de-table-clients').hide();
        $('#it-table-clients').hide();    $('#nl-table-clients').hide();        $('#en-table-clients').show();
    });

})(jQuery);
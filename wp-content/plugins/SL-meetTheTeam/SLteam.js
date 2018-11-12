(function($){

        

    //--------------------------------------------------------------------------

    //Formulaire team member in admin wordpress - plugin team

    //--------------------------------------------------------------------------

    //les tables à cacher au chargement

    $('#TableMemberTeam').hide(); $('#deTableMemberTeam').hide(); $('#esTableMemberTeam').hide();

    $('#itTableMemberTeam').hide(); $('#frTableMemberTeam').hide(); $('#nlTableMemberTeam').hide();

    //les paragraphes à cacher au chargement

    $('#ParagrapheMemberTeam').hide(); $('#deParagrapheMemberTeam').hide(); $('#esParagrapheMemberTeam').hide();

    $('#itParagrapheMemberTeam').hide(); $('#frParagrapheMemberTeam').hide(); $('#nlParagrapheMemberTeam').hide();

    //le clic sur les boutons fait apparaitre les tables et paragraphes correspondant à la langue et cache les autres

    $('#LSbtnHover').click(function(){

        $('#ParagrapheMemberTeam').show();

        $('#TableMemberTeam').show();

        $('#enTableMemberTeam').hide(); $('#deTableMemberTeam').hide(); $('#esTableMemberTeam').hide();

        $('#itTableMemberTeam').hide(); $('#frTableMemberTeam').hide(); $('#nlTableMemberTeam').hide();

        $('#enParagrapheMemberTeam').hide(); $('#deParagrapheMemberTeam').hide(); $('#esParagrapheMemberTeam').hide();

        $('#itParagrapheMemberTeam').hide(); $('#frParagrapheMemberTeam').hide(); $('#nlParagrapheMemberTeam').hide();

    });

    $('#enLSbtnHover').click(function(){

        $('#enParagrapheMemberTeam').show();

        $('#enTableMemberTeam').show();

        $('#TableMemberTeam').hide(); $('#deTableMemberTeam').hide(); $('#esTableMemberTeam').hide();

        $('#itTableMemberTeam').hide(); $('#frTableMemberTeam').hide(); $('#nlTableMemberTeam').hide();

        $('#ParagrapheMemberTeam').hide(); $('#deParagrapheMemberTeam').hide(); $('#esParagrapheMemberTeam').hide();

        $('#itParagrapheMemberTeam').hide(); $('#frParagrapheMemberTeam').hide(); $('#nlParagrapheMemberTeam').hide();

    });

    $('#frLSbtnHover').click(function(){

        $('#frParagrapheMemberTeam').show();

        $('#frTableMemberTeam').show();

        $('#enTableMemberTeam').hide(); $('#deTableMemberTeam').hide(); $('#esTableMemberTeam').hide();

        $('#itTableMemberTeam').hide(); $('#TableMemberTeam').hide(); $('#nlTableMemberTeam').hide();

        $('#enParagrapheMemberTeam').hide(); $('#deParagrapheMemberTeam').hide(); $('#esParagrapheMemberTeam').hide();

        $('#itParagrapheMemberTeam').hide(); $('#ParagrapheMemberTeam').hide(); $('#nlParagrapheMemberTeam').hide();

    });

    $('#esLSbtnHover').click(function(){

        $('#esParagrapheMemberTeam').show();

        $('#esTableMemberTeam').show();

        $('#enTableMemberTeam').hide(); $('#deTableMemberTeam').hide(); $('#TableMemberTeam').hide();

        $('#itTableMemberTeam').hide(); $('#frTableMemberTeam').hide(); $('#nlTableMemberTeam').hide();

        $('#enParagrapheMemberTeam').hide(); $('#deParagrapheMemberTeam').hide(); $('#ParagrapheMemberTeam').hide();

        $('#itParagrapheMemberTeam').hide(); $('#frParagrapheMemberTeam').hide(); $('#nlParagrapheMemberTeam').hide();

    });

    $('#deLSbtnHover').click(function(){

        $('#deParagrapheMemberTeam').show();

        $('#deTableMemberTeam').show();

        $('#enTableMemberTeam').hide(); $('#TableMemberTeam').hide(); $('#esTableMemberTeam').hide();

        $('#itTableMemberTeam').hide(); $('#frTableMemberTeam').hide(); $('#nlTableMemberTeam').hide();

        $('#enParagrapheMemberTeam').hide(); $('#ParagrapheMemberTeam').hide(); $('#esParagrapheMemberTeam').hide();

        $('#itParagrapheMemberTeam').hide(); $('#frParagrapheMemberTeam').hide(); $('#nlParagrapheMemberTeam').hide();

    });

    $('#itLSbtnHover').click(function(){

        $('#itParagrapheMemberTeam').show();

        $('#itTableMemberTeam').show();

        $('#enTableMemberTeam').hide(); $('#deTableMemberTeam').hide(); $('#esTableMemberTeam').hide();

        $('#TableMemberTeam').hide(); $('#frTableMemberTeam').hide(); $('#nlTableMemberTeam').hide();

        $('#enParagrapheMemberTeam').hide(); $('#deParagrapheMemberTeam').hide(); $('#esParagrapheMemberTeam').hide();

        $('#ParagrapheMemberTeam').hide(); $('#frParagrapheMemberTeam').hide(); $('#nlParagrapheMemberTeam').hide();

    });

    $('#nlLSbtnHover').click(function(){

        $('#nlParagrapheMemberTeam').show();

        $('#nlTableMemberTeam').show();

        $('#enTableMemberTeam').hide(); $('#deTableMemberTeam').hide(); $('#esTableMemberTeam').hide();

        $('#itTableMemberTeam').hide(); $('#frTableMemberTeam').hide(); $('#TableMemberTeam').hide();

        $('#enParagrapheMemberTeam').hide(); $('#deParagrapheMemberTeam').hide(); $('#esParagrapheMemberTeam').hide();

        $('#itParagrapheMemberTeam').hide(); $('#frParagrapheMemberTeam').hide(); $('#ParagrapheMemberTeam').hide();

    });

    

    //--------------------------------------------------------------------------

    //Formulaire add team member in admin wordpress - plugin team

    //--------------------------------------------------------------------------

        

    //on cache les paragraphes signalant une erreur au chargement

    $('#pErrorFormLangue').hide(); $('#pErrorFormNom').hide(); $('#pErrorFormPrenom').hide(); $('#pErrorFormPoste').hide(); $('#pErrorFormEmail').hide();

    //au clic sur le bouton submit lancement de vérification des champs requis (si vide alerte)

    $('input[type=submit]').click(function(){

        var valid = true;

        if($('input#nom').val() == ''){            

            if($('#pErrorFormNom').is(':visible')){

                

            } else {

                $('#pErrorFormNom').show();

            }            

            var valid = false;

        } else {

            $('#pErrorFormNom').hide();

        }

        

        if($('input#prenom').val() == ''){

            if($('#pErrorFormPrenom').is(':visible')){

                

            } else {

                $('#pErrorFormPrenom').show();

            }            

            var valid = false;

        }

         else {

            $('#pErrorFormPrenom').hide();

        }

        if($('input#statuts').val() == ''){

            if($('#pErrorFormPoste').is(':visible')){

                

            } else {

                $('#pErrorFormPoste').show();

            }            

            var valid = false;

        } else {

            $('#pErrorFormPoste').hide();

        }

        if($('input#email').val() == ''){

            if($('#pErrorFormEmail').is(':visible')){

                

            } else {

                $('#pErrorFormEmail').show();

            }            

            var valid = false;

        } else {

            $('#pErrorFormEmail').hide();

        }    

        if($('#langue input:checked').val() == 'en' || $('#langue input:checked').val() == 'fr' || $('#langue input:checked').val() == 'es' || $('#langue input:checked').val() == 'de' || $('#langue input:checked').val() == 'it' || $('#langue input:checked').val() == 'nl'){

            $('#pErrorFormLangue').hide();

        } else {

            if($('#pErrorFormLangue').is(':visible')){

                

            } else {

                $('#pErrorFormLangue').show();

            }            

            var valid = false;

        }

        return valid;

    });

    

})(jQuery);


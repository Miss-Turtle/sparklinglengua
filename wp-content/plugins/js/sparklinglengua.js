(function($){
    //--------------------------------------------------------------------------
    //MENU
    //--------------------------------------------------------------------------
    //cache les sous-menus
    $('.sub-menu').hide();
    //déploie les sous-menus une fois la souris sur le champ menu
    $('.menu').children('.menu-item').hover(function(){
        $(this).children('.sub-menu').slideDown('1000');
    });
    //cache le sous-menus une fois la souris hors du champ menu
    $('.menu').children('.menu-item').mouseleave(function(){
        $(this).children('.sub-menu').slideUp('1000');
    });  
    
    //--------------------------------------------------------------------------
    //Slide
    //--------------------------------------------------------------------------
    
    $('#slideLietmotiv h2#lietmotiv.active').css('display', 'inline');
    $('#slideLietmotiv h2#lietmotiv.active1').css('display', 'inline');
    setInterval(function(){        
        //slide header img
        $('#slide img.active').fadeOut(function(){            
            if($('#slide img.active').prev().length > 0){
                $('#slide img.active').removeClass('active').fadeOut().prev().addClass('active');
            } 
            if($('#slide img.active').prev().length === 0) {
                $('#slide img.active').removeClass('active');
                $('#slide img:last').fadeIn(function(){
                    $('#slide img').fadeIn();
                }).addClass('active');
            }            
        });  
        //slide right img
        $('#slideRight img.active').fadeOut(function(){            
            if($('#slideRight img.active').prev().length > 0){
                $('#slideRight img.active').removeClass('active').fadeOut().prev().addClass('active');
            } 
            if($('#slideRight img.active').prev().length === 0) {
                $('#slideRight img.active').removeClass('active');
                $('#slideRight img:last').fadeIn(function(){
                    $('#slideRight img').fadeIn();
                }).addClass('active');
            }            
        }); 
        //lietmotiv
        $('#slideLietmotiv h2#lietmotiv.active').css('display', 'inline').fadeOut(function(){
            if($('#slideLietmotiv h2#lietmotiv.active').prev().length > 0){
                $('#slideLietmotiv h2#lietmotiv.active').removeClass('active').css('display', 'none').prev().css('display', 'inline').addClass('active');            
            }
            if($('#slideLietmotiv h2#lietmotiv.active').prev().length === 0){
                $('#slideLietmotiv h2#lietmotiv.active').removeClass('active').css('display', 'none');
                $('#slideLietmotiv h2#lietmotiv:last').css('display', 'inline').addClass('active');
            }
        });
    }, 10000);   
    
    //--------------------------------------------------------------------------
    //Testimonial 
    //--------------------------------------------------------------------------
    
    //cache les div de témoignage si différente de la première
    var $carrouselContenu = $('div #divTemoignageContenu');
    $carrouselContenu.hide();
    $carrouselContenu.first().show().addClass('active');
    
    if($('div #divTemoignageContenu.active').prev().length == 0 && $('div #divTemoignageContenu.active').next().length > 0){
        $('#arrowLeft').hide();
        $('#arrowRight').show();
    } else if ($('div #divTemoignageContenu.active').prev().length == 0 && $('div #divTemoignageContenu.active').next().length == 0){
        $('#arrowLeft').hide();
        $('#arrowRight').hide();        
    }
    
    //au click sur la flèche droite passe au contenu suivant s'il y en a
    $('#arrowRight').click(function(){
        if($('div #divTemoignageContenu.active').next().length > 0){
            $('div #divTemoignageContenu.active').removeClass('active').css('display', 'none').next().css('display', 'block').addClass('active');
        }        
        //apparition et disparition des flèches s'il y a du contenu qui suit
        if($('div #divTemoignageContenu.active').prev().length == 0 && $('div #divTemoignageContenu.active').next().length > 0){
            $('#arrowLeft').hide();
            $('#arrowRight').show();
        } else if ($('div #divTemoignageContenu.active').prev().length > 0 && $('div #divTemoignageContenu.active').next().length == 0){
            $('#arrowLeft').show();
            $('#arrowRight').hide();
        } else if ($('div #divTemoignageContenu.active').prev().length > 0 && $('div #divTemoignageContenu.active').next().length > 0){
            $('#arrowLeft').show();
            $('#arrowRight').show();
        }
    });
    
    //au click sur la flèche gauche passe au contenu suivant s'il y en a
    $('#arrowLeft').click(function(){
        if($('div #divTemoignageContenu.active').prev().length > 0){
            $('div #divTemoignageContenu.active').removeClass('active').css('display', 'none').prev().css('display', 'block').addClass('active');
        }
        //apparition et disparition des flèches s'il y a du contenu qui suit
        if($('div #divTemoignageContenu.active').prev().length == 0 && $('div #divTemoignageContenu.active').next().length > 0){
            $('#arrowLeft').hide();
            $('#arrowRight').show();
        } else if ($('div #divTemoignageContenu.active').prev().length > 0 && $('div #divTemoignageContenu.active').next().length == 0){
            $('#arrowLeft').show();
            $('#arrowRight').hide();
        } else if ($('div #divTemoignageContenu.active').prev().length > 0 && $('div #divTemoignageContenu.active').next().length > 0){
            $('#arrowLeft').show();
            $('#arrowRight').show();
        }
    });   
    
    //faire apparaître la lightbox
    $('#lightbox').fadeIn(1000);
    $('#lightbox-shadow').fadeIn(1000);
    //faire disparaître la lightbox au click sur le bouton close
    $('.btnClose').click(function(){
        $('#lightbox').fadeOut(1000);
        $('#lightbox-shadow').fadeOut(1000);
    });
    
    //function pour afficher les selectors en fonction de la taille de l'écran
    function windowSize(){
        //récupération de la résolution de l'écran en largeur pour vérifier si on passe sur max-width: 640
        //si oui le margin top correspond à la hauteur du menu de la sidebar qui passe au dessus dans cette version de css
        if($(document).width() > 625){
            $('#content').css('margin-top', 0);
        }
        if($(document).width() <= 625){
            $('#content').css('margin-top', $('#content-right').height());
        }
        //on met un interval pour actualiser la hauteur du lietmotiv car au début de l'animation il est plus grand qu'à la fin
        setInterval(function(){
            $('#slideLietmotiv').css('height', $('#lietmotiv.active').height());
            $('#slideLietmotiv').css('height', $('#lietmotiv.active1').height());
            //récupération de la hauteur de l'image du carousel pour donner la hauteur à la div slide qui la contient
            $('#slide').css('height', $('#slide>img').height());
        }, 1000);        
        
    }
    windowSize();
    //au moment du resize de la fenêtre on fait les actions suivantes
    $(window).resize(function(){
        windowSize();
    });
    
    
})(jQuery);

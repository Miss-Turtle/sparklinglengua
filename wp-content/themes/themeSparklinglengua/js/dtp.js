(function($){
    //owl carousel
    $("#owl-demo").owlCarousel({
        autoPlay: 5000, //Set AutoPlay to 5 seconds
        items : 3,      
        itemsDesktop : [1199,3],      
        itemsDesktopSmall : [979,3],
        itemsTablet : [768,2],
        itemsMobile : [479,1],
        stopOnHover : true,
        navigation : false,    
        navigationText : ["prev","next"],    
        rewindNav : true,    
        scrollPerPage : false,     
        //Pagination    
        pagination : true,    
        paginationNumbers: false,     
        // Responsive     
       responsive: true,    
       responsiveRefreshRate : 200,    
       responsiveBaseWidth: window,     
       // CSS Styles    
       baseClass : "owl-carousel",    
       theme : "owl-theme",     
       //Lazy load    
       lazyLoad : true,    
       lazyFollow : true,    
       lazyEffect : "scaleUp",     
       //Auto height    
       autoHeight : false,     
       //JSON     
       jsonPath : false,     
       jsonSuccess : false,     
       //Mouse Events    
       dragBeforeAnimFinish : true,   
       mouseDrag : true,    
       touchDrag : true,     
       //Transitions    
       transitionStyle : true,     
       //Other    
       addClassActive : true,     
       //Callbacks   
       beforeUpdate : false,   
       afterUpdate : false,    
       beforeInit: false,     
       afterInit: false,     
       beforeMove: false,     
       afterMove: false,    
       afterAction: false,    
       startDragging : false,    
       afterLazyLoad : false
    });
    //get carousel instance data and store it in variable owl
    var owl = $("#owl-demo");
    // Custom Navigation Events
    $(".next").click(function(){
        owl.trigger('owl.next');
    });
    $(".prev").click(function(){
        owl.trigger('owl.prev');
    });
    $(".play").click(function(){
        owl.trigger('owl.play',1000); //owl.play event accept autoPlay speed as second parameter
    });
    $(".stop").click(function(){
        owl.trigger('owl.stop');
    });
})(jQuery);

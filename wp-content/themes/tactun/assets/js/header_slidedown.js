jQuery(document).ready(function($){

    /*--------------------------------------------------------------
     # 3. Header Slidedown
     --------------------------------------------------------------*/
    $(window).scroll(function(){
        if($(window).scrollTop() >= 100){
           $('#masthead').addClass('fixed');
        }else{
           $('#masthead').removeClass('fixed');
        };    
        if($(window).scrollTop() >= 600){  
            $('#masthead.fixed').addClass('slideDown');
        }
        else{
            $('#masthead.fixed').removeClass('slideDown');
        }

    });

});
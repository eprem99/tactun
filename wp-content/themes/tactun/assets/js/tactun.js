

// Start Document
jQuery(document).ready(function($){
    "use strict";
    if($( window ).width() > 960){
        window.addEventListener('load', () => {
            var swiper = new Swiper('.swiper-container',{
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                }
            });
        }, false);
    }else{
        window.addEventListener('load', () => {
            var swiper = new Swiper('.swiper-container',{
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                  },
            });
        }, false);  
    }
    $('.oval').click(function(event) {
        $('header .serach').addClass('active');
    });
    $('.close-search').click(function(event) {
        $('header .serach').removeClass('active');

    });
    
    $('.widget-title, .widgettitle').click(function(event) {
        $(this).parent().toggleClass('active');
    });  

    $('.dropdown, .select').select2({
        placeholder: 'Select product',
        width: '100%',        
    }).select2('val', $('.select option:eq(1)').val());

    /******* SWIPER ******/
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 3,
        spaceBetween: 35,
        loop: true,
        preloadImages: false,
        lazy: true,
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      });

      swiper.on('slideChange', function () {
        $(".mySwiper .swiper-slide").each(function(index) {
            if(swiper.realIndex == index){
               var img = $(this).data('img');
               $('.woocommerce-product-gallery__image a').attr('href', img);
               $('.woocommerce-product-gallery__image img').remove();
               $('.woocommerce-product-gallery__image a').html('<img class="wp-post-image" loading="lazy"  src="'+img+'" data-src="'+img+'">');
            }
          });
      //  console.log(swiper.realIndex);
      });


    //   var swiper2 = new Swiper(".woocommerce-products-gallerys", {
    //     loop: true,
    //     spaceBetween: 10,
    //     navigation: {
    //       nextEl: ".swiper-button-next",
    //       prevEl: ".swiper-button-prev",
    //     },
    //     thumbs: {
    //       swiper: swiper,
    //     },
    //   });
//     var swiper = new Swiper('.news-slider',{
//       pagination: {
//         el: '.swiper-pagination',
//         dynamicBullets: true,
//         clickable: true,
//         slidesPerView: 1,
//       },
//     })
// $(window).resize(function(){

//   swiper.update();
// })

    /******* BANNER ******/
    $('.parallax-window').parallax();
    var bannerheight = $('body').find('.banner').height()/2;
    var bannerblock = $('body').find('.banner-block').height()/2;
    $('.banner-block').css({'margin-top' : bannerheight - bannerblock });
    console.log(bannerheight);
    console.log(bannerblock);

    // header slide doun 
    $(window).scroll(function(){
        if($(window).scrollTop() >= 300){
           $('#masthead').addClass('fixed');
        }else{
           $('#masthead').removeClass('fixed');
        };    
        if($(window).scrollTop() >= 600){  
            $('#masthead.fixed').addClass('slideDown');
        }else{
            $('#masthead.fixed').removeClass('slideDown');
        }

    });
    /*--------------------------------------------------------------
     # Mobile Menu 1
     --------------------------------------------------------------*/
    $('.hamburger-button').on('click', function() {
        $(this).toggleClass('nt-mm1-button-open');
        $('.nt-mm1-wrapper').toggleClass('nt-mm1-show-menu');
    });

    // Add submenu chevron
    $('.dropdown-menu-wrapper ul li ul').before($('<span class="nt-mm1-chevron"><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"     width="451.847px" height="451.847px" viewBox="0 0 451.847 451.847" style="enable-background:new 0 0 451.847 451.847;"     xml:space="preserve"><g><path d="M225.923,354.706c-8.098,0-16.195-3.092-22.369-9.263L9.27,151.157c-12.359-12.359-12.359-32.397,0-44.751        c12.354-12.354,32.388-12.354,44.748,0l171.905,171.915l171.906-171.909c12.359-12.354,32.391-12.354,44.744,0c12.365,12.354,12.365,32.392,0,44.751L248.292,345.449C242.115,351.621,234.018,354.706,225.923,354.706z"/></g></svg></span>'));

    // Submenu slide up/down
    $(".mobile-menu > li > span, .sub-menu > li > span").click(function(event) {
        event.preventDefault();
        if (false == $(this).next().is(':visible')) {
            // If another submenu is open, slide this up
            $(this).parent().siblings().find(".sub-menu").slideUp(300);
        }
        $(this).next().slideToggle(300);
        $(this).toggleClass("nt-mm1-submenu-active");
    });


$('.main-menu .menu li').each(function(index, el) {
	var pos = $(this).offset();
	var mega = $(this).hasClass('mega');
	var whidth = $(this).width();
    if(mega == true){
    	$('> ul',this).prepend('<span></span>');
    	$('ul > span',this).css('left', pos.left-whidth);
    }
	console.log(mega);

});

jQuery(window).scroll(function ($) {
    "use strict";
    var scroll = jQuery(window).scrollTop();
    if (scroll >= 600) {
        jQuery('#scrolltop').addClass('islive');
    }else{
        jQuery('#scrolltop').removeClass('islive');
    }

});

$("#scrolltop").click(function() {
    $('html, body').animate({scrollTop:0}, 400);
});


  var allPanels = $('.accordion > .panel > .acdesc').hide();

  $('.accordion .panel').each(function(index, el) {
      if(index == 0){
         $(this).addClass('active');
         $('.acdesc', this).show();
      }
  });

  $('.accordion > .panel > .actitle > span').click(function() {
    $(this).parent().parent().addClass('active');
    allPanels.slideUp();
    $(this).parent().next().slideDown();
    $(this).parent().parent().siblings('.panel').removeClass('active');
    return false;
  });
    
    
    $(window).scroll(function(){
        if ($("footer").length > 0) {
        var top = $('body').find("footer").offset().top;
        var height = ($(".static .vc_column-inner").height());
       // console.log(height);
        if($(window).width() > 1020 && $(window).scrollTop() >= 650){
            $('.static .vc_column-inner').addClass('fixed');
        }else if($(window).scrollTop() == top-height){
            $('.static .vc_column-inner').removeClass('fixed');
        }else{
             $('.static .vc_column-inner').removeClass('fixed');
        }
    }
    });

    $('section[data-vc-full-width="true"]').each(function(index, el) {
            $(this).addClass('no-margin');
    });

$('.filter-scroll button').click(function(event) {
    $('html, body').animate({
        scrollTop: $("#response").offset().top-100
    }, 1000);
});
    ////////// FILTER  ///////////////
    // $('#filter').submit(function(){
    //     var filter = $('#filter');
    //     $.ajax({
    //         url:filter.attr('action'),
    //         data:filter.serialize(), // form data
    //         type:filter.attr('method'), // POST
    //         beforeSend:function(xhr){
    //             setTimeout(function() {
    //                $('#response').addClass('reload'); // changing the button label're
    //                $('#response div, #true_loadmore').hide('slow/400/fast');
    //             }, 10);
    //         },
    //         success:function(data){
    //             setTimeout(function() {
    //                 $('#response').removeClass('reload'); // changing the button label back
    //                 $('#response div').show('slow/400/fast');
    //                  $('#response').html(data); // insert data
    //             }, 1000);
    //         }
    //     });
    //     return false;
    // });


    $('#true_loadmore').click(function(e){
        e.preventDefault();
        $(this).text('Processing...'); 
        var data = {
            'action': 'loadmore',
            'query': true_posts,
            'page' : current_page,
            'type': post_type,
            'post_per_row' : post_per_row,
        };
        $.ajax({
            url: ajaxurl,
            data: data,
            type: 'POST',
            success:function(data){
                if( data ) { 
                    $('#true_loadmore').text('More');
                    $('#response').append(data);
                    current_page++;
                    if (current_page == max_pages) jQuery("#true_loadmore").remove();
                    } else {
                    $('#true_loadmore').remove();
                }
            }
        });
    });
 
jQuery(function($){
    if($('#primary').find('#true_loadmore').length){
    var canBeLoaded = true, // this param allows to initiate the AJAX call only if necessary
        bottomOffset = 2000; // the distance (in px) from the page bottom when you want to load more posts
 
    $(window).scroll(function(){
        var data = {
            'action': 'loadmore',
            'query': true_posts,
            'page' : current_page,
            'type': post_type,
            'post_per_row' : post_per_row,
        };
        if( $(document).scrollTop() > ( $(document).height() - bottomOffset ) && canBeLoaded == true ){
            $.ajax({
                url : ajaxurl,
                data:data,
                type:'POST',
                beforeSend: function( xhr ){
                    $("#true_loadmore").text('Processing...'); 
                    setTimeout(function() {
                       $('#true_loadmore').addClass('reload'); // changing the button label're
                     $('#true_loadmore').text('');
                    }, 10);
                    canBeLoaded = false; 
                },
                success:function(data){
                    if( data ) {
                         // where to insert posts
                        if (current_page == max_pages) jQuery("#true_loadmore").remove();
                        canBeLoaded = true; // the ajax is completed, now we can run it again
                        current_page++;
                        setTimeout(function() {
                       $('#true_loadmore').removeClass('reload'); // changing the button label back
                        $('#response div').show('slow/400/fast');
                        $('#response').append(data); // insert data
                    }, 2000);
                    }  else {
                  //  $('#true_loadmore').remove();
                    }
                }
            });
        }
    });
   }
});

jQuery('#addevent').on('click',function(event) {
    jQuery('.cal-clients').toggleClass('open');
});

$(window).resize(function(){
    padding();
}); 
 padding();
function padding(){
 var width = $( window ).width();
  if(width > 1200){
   var pading = (width - 1130) / 2;
   $('.home .news-block').css('padding-left', pading);
   $('.home .news-slider .swiper-pagination').css('margin-left', pading);
  }
};


});

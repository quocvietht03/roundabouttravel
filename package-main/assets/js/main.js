(function ($) {
  'use strict';

  var swiper = new Swiper('.swiper', {
    slidesPerView: 1,
    spaceBetween: 0,
    loop: true,
    breakpoints: {
      768: {
        slidesPerView: 2,
      },
      1024: {
        slidesPerView: 3,
      }
    },
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
  });
  var swiper_deal = new Swiper('.deal-slider-ss .swiper_deal', {
    slidesPerView: 1,
    spaceBetween: 0,
    autoplay: {
      delay: 3000,
    },
    loop: true,
    breakpoints: {
      768: {
        slidesPerView: 1,
      },
      1024: {
        slidesPerView: 1,
      }
    },
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
  });
  $('.single .post-content-format p img').each(function(){
    var imageUrl = $(this).attr('src');
    $(this).parent().append( "<div class='be-bg-blur'></div>" );
    $(this).parent().children(".be-bg-blur").attr('style', 'background-image: url("' + imageUrl +'")');
    $(this).parent().css({'display':'inline-block','position':'relative'});
    $(this).parent().children(".be-bg-blur").css({'position':'absolute','background-size':'cover','filter':'blur(8px)','-webkit-filter':'blur(8px)','width':'100%','height':'calc(100% - 32px)','top':'16px','left':'0','z-index':'-1'});
    });
}) (jQuery);

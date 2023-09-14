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

}) (jQuery);

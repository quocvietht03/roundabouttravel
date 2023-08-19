(function ($) {
  'use strict';

  var swiper = new Swiper('.swiper', {
    slidesPerView: 2,
    spaceBetween: 20,
    loop: true,
    pagination: {
      el: '.swiper-pagination',
    },
  });

}) (jQuery);

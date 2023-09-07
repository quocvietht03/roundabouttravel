(function ($) {
  'use strict';


  function addServiceListeners(){

    applyLoadLabelDisplay();

    $('.gform_wrapper').on('focus', 'input[type="text"], input[type="tel"], input[type="email"], select, textarea', function () {
        var $field_elem = $(this);
        if ($field_elem.parents('.gfield').length <= 0) return;
        new apply_advanced_label_display($field_elem.parents('.gfield '));
    });
  }
  addServiceListeners();

  jQuery(document).on('gform_post_render', function(event, form_id, current_page){
    // if (form_id == 3) {
      addServiceListeners();
    // }
  });

  // Contact us form field effect
  var field_validate = function (value, validates, current) {
      var current = current || 0;
      var current_vali = function () {
          return (validates[current]) ? validates[current] : true;
      }

      switch (current_vali()) {
          case 'no_empty':

              return (!value) ? false : field_validate(value, validates, current += 1);
              break;

          case 'email':

              var email_filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
              return (!email_filter.test(value)) ? false : field_validate(value, validates, current += 1);
              break;

        case 'phone':

            var phone_filter = /^[0-9\ \+]+$/;
            return (!phone_filter.test(value)) ? false : field_validate(value, validates, current += 1);
            break;

          case 'number':

              var number_filter = /^[0-9\,]+$/;
              return (!number_filter.test(value)) ? false : field_validate(value, validates, current += 1);
              break;

          case true:

              return true;
              break;
      }
  }

  function PhoneNumberInput(inp) {
    var phonenumberKeys = '0123456789';

    // restricts input to numeric keys 0-9 +
    inp[0].addEventListener('keypress', function(e) {
      var event = e || window.event;
      var target = event.target;

      if(![32,43,47,48,49,50,51,52,53,54,55,56,57,58].includes(event.charCode)){
        event.preventDefault();
        return;
      }

    });
  }

  var apply_advanced_label_display = function ($container) {
      return $container.each(function () {
          var $container = $(this);

          if ( $(this).hasClass('field-phone-number') ) {
            var phoneNumber = new PhoneNumberInput( $(this).find('input'));
          }

          $container.find('input[type="text"], input[type="tel"], input[type="email"], select, textarea').on({
              focus(e) {
                  if ( $(this).parents('fieldset').hasClass('field-full-name') ) {
                    $(this).parents('span').addClass('__is_focus');
                  } else {
                    $(this).parents('.gfield').addClass('__is_focus');
                  }

              },
              blur(e) {
                  var $field = $(this);

                  if ( $(this).parents('fieldset').hasClass('field-full-name') ) {
                    $(this).parents('span').removeClass('__is_focus');
                  } else {
                    $(this).parents('.gfield').removeClass('__is_focus');
                  }

                  if (this.value) {
                    if ( $(this).parents('fieldset').hasClass('field-full-name') ) {
                      $(this).parents('span').addClass('__has_value');
                    } else {
                      $(this).parents('.gfield').addClass('__has_value');
                    }
                  } else {
                    if ( $(this).parents('fieldset').hasClass('field-full-name') ) {
                      $(this).parents('span').removeClass('__has_value');
                    } else {
                      $(this).parents('.gfield').removeClass('__has_value');
                    }
                  }

                  var requried = function () {
                    var value = $field.attr('aria-required');

                    return (value == 'true') ? true : false;
                  };

                  if (requried()) {
                      var $container = $field.closest('.gfield');
                      var base_validate = ['no_empty'];

                      if ($container.hasClass('field-email-address'))
                          base_validate.push('email');

                      if ($container.hasClass('field-phone-number'))
                          base_validate.push('phone');

                      var passed =  field_validate(this.value, base_validate);

                      if ( $(this).parents('fieldset').hasClass('field-full-name') ) {
                        if (true == passed) {
                          $(this).parents('span').removeClass('__invalid').addClass('__passed');
                        } else {
                          $(this).parents('span').removeClass('__passed').addClass('__invalid');
                        }

                      } else {
                        if (true == passed) {
                          $(this).parents('.gfield').removeClass('__invalid').addClass('__passed');
                        } else {
                          $(this).parents('.gfield').removeClass('__passed').addClass('__invalid');
                        }
                      }
                  }
              }
          })
      })
  }

  function applyLoadLabelDisplay() {
    $('.gform_wrapper .gfield').each(function() {
      var inputValue = $(this).find('input, select, textarea').val();

      if ( $(this).hasClass('field-full-name') ) {
        $(this).find('span').each(function() {
          inputValue = $(this).find('input').val();
          if(inputValue !== '') {
            $(this).addClass('__has_value');
          } else {
            $(this).removeClass('__has_value');
          }
        });

      } else {

        if ( $(this).hasClass('field-phone-number') ) {
          var phone_filter = /^[0-9\ \+]+$/;

          if(!phone_filter.test(inputValue) && inputValue !== '' && typeof inputValue !== 'undefined') {
            $(this).addClass('__invalid');
          } else {
            $(this).removeClass('__invalid');
          }

        }else{
          if(inputValue !== '') {
            $(this).addClass('__has_value');
          } else {
            $(this).removeClass('__has_value');
          }
        }

      }

    });
  }
  applyLoadLabelDisplay();

  $('.gform_wrapper').on('focus', ' input[type="text"], input[type="tel"], input[type="email"], select, textarea', function () {
      var $field_elem = $(this);
      if ($field_elem.parents('.gfield').length <= 0) return;
      new apply_advanced_label_display($field_elem.parents('.gfield'));
  });

}) (jQuery);

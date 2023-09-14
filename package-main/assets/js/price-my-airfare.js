(function( $ ){

    jQuery(document).on('gform_post_render', function(event, form_id, current_page){

        if ( form_id != 3 ) {
            return;
        }

        if ( current_page == 4 ) {

            let deal_name    = $('.detail-wrapper-shortcode #deal-name').val();
            let deal_url     = $('.detail-wrapper-shortcode #deal-url').val();
            let deal_airline = $('.detail-wrapper-shortcode #deal-airline').val();
            let deal_class   = $('.detail-wrapper-shortcode #deal-class').val();
            
            let first_name   = $('#gform_wrapper_3 .field-full-name .name_first').find('input').val();
            let last_name    = $('#gform_wrapper_3 .field-full-name .name_last').find('input').val();
            let phone_number = $('#gform_wrapper_3 .field-phone-number').find('input').val();
            let email        = $('#gform_wrapper_3 .field-email-address').find('input').val();
            let date         = $('#gform_wrapper_3 .departure-date').find('input').val();
            let travel_class = $('#gform_wrapper_3 .travel-class').find('select').val();
            let select_airline = $('#gform_wrapper_3 .select-airline').find('select').val();
            let adults         = $('#gform_wrapper_3 .adults').find('select').val();
            let children       = $('#gform_wrapper_3 .children').find('select').val();
            let infants        = $('#gform_wrapper_3 .infants').find('select').val();

            let trip_preference= $('#gform_wrapper_3 .trip-preference').find('textarea').text();
            let comment        = $('#gform_wrapper_3 .comments').find('textarea').text();

            $('#gform_wrapper_3').find('.deal-name input').val(deal_name ? deal_name : 'No');
            $('#gform_wrapper_3').find('.deal-url input').val(deal_url ? deal_url : 'No');
            $('#gform_wrapper_3').find('.deal-airline input').val(deal_airline ? deal_airline : 'No');
            $('#gform_wrapper_3').find('.deal-class input').val(deal_class ? deal_class : 'No');
            
            $('#gform_wrapper_3 .__wrapper-details').find('.confirm-text.name').html(first_name);
            $('#gform_wrapper_3 .__wrapper-details').find('.confirm-text.lastname').html(last_name);
            $('#gform_wrapper_3 .__wrapper-details').find('.confirm-text.phone').html(phone_number);
            $('#gform_wrapper_3 .__wrapper-details').find('.confirm-text.email').html(email);
            $('#gform_wrapper_3 .__wrapper-details').find('.confirm-text.departure_date').html(date);
            $('#gform_wrapper_3 .__wrapper-details').find('.confirm-text.class').html(travel_class);
            $('#gform_wrapper_3 .__wrapper-details').find('.confirm-text.airline').html(select_airline);
            $('#gform_wrapper_3 .__wrapper-details').find('.confirm-text .adults').html(adults);
            $('#gform_wrapper_3 .__wrapper-details').find('.confirm-text .children').html(children);
            $('#gform_wrapper_3 .__wrapper-details').find('.confirm-text .infants').html(infants);
            $('#gform_wrapper_3 .__wrapper-details').find('.confirm-text.preference_notes').html(trip_preference);
            $('#gform_wrapper_3 .__wrapper-details').find('.confirm-text.comments').html(comment);

        }
        


    });

    var getUrlParameter = function getUrlParameter(sParam) {
        var sPageURL = window.location.search.substring(1),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;

        for (i = 0; i < sURLVariables.length; i++) {
            sParameterName = sURLVariables[i].split('=');

            if (sParameterName[0] === sParam) {
                return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
            }
        }
        return false;
    };

})( jQuery );
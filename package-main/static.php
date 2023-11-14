<?php
 /**
  * Load scripts
  *
  */

  add_action( 'wp_enqueue_scripts', 'package_main_scripts' );
  if( ! function_exists( 'package_main_scripts' ) ) {
      function package_main_scripts() {

        wp_enqueue_style( 'swiper-css', PJ_URI . 'assets/css/swiper.min.css', false, PJ_VERSION );
        wp_enqueue_script( 'swiper-js',  PJ_URI . 'assets/js/swiper.min.js', ['jquery'], PJ_VERSION, true );
        wp_enqueue_style( 'select2-lib', PJ_URI . 'assets/libs/select2/select2.min.css', false, PJ_VERSION );

        wp_enqueue_style( 'main-css', PJ_URI . 'assets/css/main.css', false, PJ_VERSION );
        wp_enqueue_script( 'main-js', PJ_URI . 'assets/js/main.js', ['jquery'], PJ_VERSION, true );
        wp_enqueue_script( 'select2-lib', PJ_URI . 'assets/libs/select2/select2.min.js', ['jquery'], PJ_VERSION, true );
        wp_enqueue_script( 'gravityform-js', PJ_URI . 'assets/js/gravityform.js', ['jquery'], PJ_VERSION, true );

        wp_enqueue_script( 'price-my-airfare-js', PJ_URI . 'assets/js/price-my-airfare.js', ['jquery'], PJ_VERSION, true );
        //wp_enqueue_script( 'planmytrip-js', PJ_URI . 'assets/js/planmytrip-classic.js', ['jquery'], PJ_VERSION, true );
        
        
        
        //wp_enqueue_script( 'bootstrap-js', PJ_URI . 'assets/libs/bootstrap/bootstrap.min.js', ['jquery'], PJ_VERSION, true );
        //wp_enqueue_style( 'bootstrap-css', PJ_URI . 'assets/libs/bootstrap/bootstrap.min.css', false, PJ_VERSION );
        
        wp_enqueue_script( 'leaflet-js', PJ_URI . 'assets/libs/leaflet/leaflet.js', ['jquery'], PJ_VERSION, true );
        wp_enqueue_script( 'leaflet.geodesic', PJ_URI . 'assets/libs/leaflet/leaflet.geodesic', ['jquery'], PJ_VERSION, true );
        wp_enqueue_style( 'leaflet-css', PJ_URI . 'assets/libs/leaflet/leaflet.css', false, PJ_VERSION );

        //wp_enqueue_script( 'planmytrip-map-js', PJ_URI . 'assets/js/planmytrip-map.js', ['jquery'], PJ_VERSION, true );

        // jQuery Form - Plan My Trip Classic
        //wp_enqueue_script( 'vaccrue-jquery-form', '//cdnjs.cloudflare.com/ajax/libs/jquery.form/3.50/jquery.form.min.js', array( 'jquery' ), '3.50' );
        //wp_enqueue_script( 'jquery-cookie', '//cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js', array( 'jquery' ), '1.4.1' );

        wp_enqueue_style( 'animate-css', PJ_URI . 'assets/libs/animate.css/animate.min.css', false, PJ_VERSION );
        //wp_enqueue_style( 'font-awesome-css', PJ_URI . 'assets/libs/font-awesome/all.min.css', false, PJ_VERSION );
        
        //wp_deregister_script( 'jquery' );
        //wp_register_script( 'jquery',  PJ_URI . 'assets/modules/plan-my-trip/js/jquery.min.js', false, '2.2.4' );
        //wp_enqueue_script( 'jquery' );

        wp_enqueue_style( 'jquery-ui-smoothness',  PJ_URI . 'assets/modules/plan-my-trip/css/smoothness/jquery-ui-1.10.4.custom.min.css' );
        wp_enqueue_script( 'jquery-ui-custom',  PJ_URI . 'assets/modules/plan-my-trip/js/jquery-ui-1.10.4.custom.min.js', array( 'jquery' ) );
        wp_enqueue_script( 'jquery-form-rat',  PJ_URI . 'assets/modules/plan-my-trip/js/jquery.form.js', array( 'jquery' ) );
        //wp_enqueue_script( 'bookmytrip',  PJ_URI . 'assets/modules/plan-my-trip/js/bookmytrip.js', array( 'jquery' ) );
        // jQuery Form - Plan My Trip Classic
        
        // wp_localize_script( 'main-js', 'PJ_Global', apply_filters( 'pj/wp_localize_script/PJ_Global', [
        //    'ajax_url' => admin_url( 'admin-ajax.php' ),
        //    'user_info' => wp_get_current_user(),
        // ] ) );
        //
        // wp_localize_script( 'enquiry-gravity-form-event', 'PJ_Global',[
        //    'ajax_url' => admin_url( 'admin-ajax.php' ),
        //    'user_info' => wp_get_current_user(),
        // ]  );
      }
  }

  {
    /**
     * Compiler Scss
     *
     */
    add_action( 'init', function() {
        if( true != PJ_DEV_MODE ) return;
        package_main_scss_compiler(
            file_get_contents( PJ_DIR . 'assets/scss/main.scss' ),
            PJ_DIR . 'assets/css/main.css',
            PJ_DIR . 'assets/scss',
            'ScssPhp\ScssPhp\Formatter\Compressed',
            false
        );
    } );
  }
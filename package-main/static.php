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

        wp_enqueue_style( 'main-css', PJ_URI . 'assets/css/main.css', false, PJ_VERSION );
        wp_enqueue_script( 'main-js', PJ_URI . 'assets/js/main.js', ['jquery'], PJ_VERSION, true );
        wp_enqueue_script( 'gravityform-js', PJ_URI . 'assets/js/gravityform.js', ['jquery'], PJ_VERSION, true );
        // wp_enqueue_script( 'planmytrip-js', PJ_URI . 'assets/js/planmytrip-classic.js', ['jquery'], PJ_VERSION, true );

        if ( is_page_template( 'page-template/template-plan-trip.php' ) ) {
          wp_deregister_script( 'jquery' );
          wp_register_script( 'jquery', '//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js', false, '2.2.4' );
          wp_enqueue_script( 'jquery' );

          wp_enqueue_style( 'jquery-ui-smoothness', '//www.roundabouttravel.com.au/wp-content/themes/rat/modules/plan-my-trip/css/smoothness/jquery-ui-1.10.4.custom.min.css' );
          wp_enqueue_script( 'jquery-ui-custom', '//www.roundabouttravel.com.au/wp-content/themes/rat/modules/plan-my-trip/js/jquery-ui-1.10.4.custom.min.js', array( 'jquery' ) );
          wp_enqueue_script( 'jquery-form-rat', '//www.roundabouttravel.com.au/wp-content/themes/rat/modules/plan-my-trip/js/jquery.form.js', array( 'jquery' ) );
          wp_enqueue_script( 'bookmytrip', '//www.roundabouttravel.com.au/wp-content/themes/rat/modules/plan-my-trip/js/bookmytrip.js', array( 'jquery' ) );
      
        }

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
<?php
// add SVG to allowed file uploads
add_action('upload_mimes', 'pj_types_to_uploads');
function pj_types_to_uploads($file_types){
    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes );

    return $file_types;
}

// Adds an options page to the admin menu
add_action('acf/init', 'pj_acf_op_init');
function pj_acf_op_init() {
  if( function_exists('acf_add_options_page') ) {
    $option_page = acf_add_options_page(array(
      'page_title'    => __('Theme General Settings'),
      'menu_title'    => __('Theme Settings'),
      'menu_slug'     => 'theme-general-settings',
      'capability'    => 'edit_posts',
      'redirect'      => false
    ));
  }
}

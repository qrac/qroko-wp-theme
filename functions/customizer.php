<?php
//----------------------------------------------------
// Customizer
//----------------------------------------------------

// Customize Register
function qroko_customize_register($wp_customize) {

  // Max site width
  $wp_customize->add_setting('qroko_max_site_width', array(
    'default' => null,
    'type' => 'option',
    'sanitize_callback' => 'absint'
  ));
  $wp_customize->add_control('qroko_max_site_width', array(
    'label' => __('Maximum site width', 'qroko'),
    'description' => __('Allows you to change the maximum width of your site. The width you set will also be applied to the block editor. The unit is px.', 'qroko'),
    'section' => 'title_tagline',
    'settings' => 'qroko_max_site_width',
    'type' => 'number',
    'input_attrs' => array(
      'min' => 0
    ),
    'priority' => 100
  ));

  // Page top thumbnail
  $wp_customize->add_setting('qroko_page_top_thumbnail', array(
    'default' => false,
    'type' => 'option',
    'sanitize_callback' => 'qroko_sanitize_checkbox'
  ));
  $wp_customize->add_control('qroko_page_top_thumbnail', array(
    'label' => __('Display thumbnails at the top of the page', 'qroko'),
    'description' => '',
    'section' => 'title_tagline',
    'settings' => 'qroko_page_top_thumbnail',
    'type' => 'checkbox',
    'priority' => 110
  ));

  // Sanitize checkbox
  function qroko_sanitize_checkbox($checked){
    return ((isset($checked) && true == $checked) ? true : false);
  }

}
add_action('customize_register', 'qroko_customize_register');
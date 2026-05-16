<?php

if (!defined('ABSPATH')) {
  exit;
}

/**
 * Default settings.
 */
function jlc_sm_get_default_settings()
{
  return [
    'enabled' => '0',
    'heading' => 'Natalia Bustillo',
    'subheading' => 'Estética Total',
    'message' => 'Pronto estará disponible nuestra plataforma',
    'deadline' => '2026-06-15T07:00',

    'desktop_image_id' => '',
    'desktop_image_url' => JLC_SM_IMAGES_URL . 'banner-solo_mantenimiento_desktop.webp',

    'mobile_image_id' => '',
    'mobile_image_url' => JLC_SM_IMAGES_URL . 'banner-solo_mantenimiento_mobile.webp',

    'instagram_url' => 'https://www.instagram.com/',
    'email_address' => 'contacto@nataliabustillo.com',
    'whatsapp_url' => 'https://wa.me/573000000000',

    'footer_text' => 'Desarrollado por',
    'footer_link_text' => 'Jairo Colón Developer.',
    'footer_link_url' => 'https://jairocolon.com',

    'custom_css' => '',
  ];
}

/**
 * Get plugin settings merged with defaults.
 */
function jlc_sm_get_settings()
{
  $defaults = jlc_sm_get_default_settings();
  $settings = get_option(JLC_SM_OPTION_NAME, []);

  if (!is_array($settings)) {
    $settings = [];
  }

  return wp_parse_args($settings, $defaults);
}

/**
 * Sanitize plugin settings.
 */
function jlc_sm_sanitize_settings($input)
{
  $defaults = jlc_sm_get_default_settings();
  $output = [];

  $input = is_array($input) ? $input : [];

  $output['enabled'] = !empty($input['enabled']) ? '1' : '0';

  $output['heading'] = isset($input['heading'])
    ? sanitize_text_field($input['heading'])
    : $defaults['heading'];

  $output['subheading'] = isset($input['subheading'])
    ? sanitize_text_field($input['subheading'])
    : $defaults['subheading'];

  $output['message'] = isset($input['message'])
    ? sanitize_text_field($input['message'])
    : $defaults['message'];

  $output['deadline'] = isset($input['deadline'])
    ? sanitize_text_field($input['deadline'])
    : $defaults['deadline'];

  $output['desktop_image_id'] = isset($input['desktop_image_id'])
    ? absint($input['desktop_image_id'])
    : '';

  $output['desktop_image_url'] = isset($input['desktop_image_url']) && !empty($input['desktop_image_url'])
    ? esc_url_raw($input['desktop_image_url'])
    : $defaults['desktop_image_url'];

  $output['mobile_image_id'] = isset($input['mobile_image_id'])
    ? absint($input['mobile_image_id'])
    : '';

  $output['mobile_image_url'] = isset($input['mobile_image_url']) && !empty($input['mobile_image_url'])
    ? esc_url_raw($input['mobile_image_url'])
    : $defaults['mobile_image_url'];

  $output['instagram_url'] = isset($input['instagram_url'])
    ? esc_url_raw($input['instagram_url'])
    : '';

  $output['email_address'] = isset($input['email_address'])
    ? sanitize_email($input['email_address'])
    : '';

  $output['whatsapp_url'] = isset($input['whatsapp_url'])
    ? esc_url_raw($input['whatsapp_url'])
    : '';

  $output['footer_text'] = isset($input['footer_text'])
    ? sanitize_text_field($input['footer_text'])
    : '';

  $output['footer_link_text'] = isset($input['footer_link_text'])
    ? sanitize_text_field($input['footer_link_text'])
    : '';

  $output['footer_link_url'] = isset($input['footer_link_url'])
    ? esc_url_raw($input['footer_link_url'])
    : '';

  $output['custom_css'] = isset($input['custom_css'])
    ? wp_strip_all_tags($input['custom_css'])
    : '';

  return wp_parse_args($output, $defaults);
}

/**
 * Register settings.
 */
function jlc_sm_register_settings()
{
  register_setting(
    'jlc_sm_settings_group',
    JLC_SM_OPTION_NAME,
    [
      'type' => 'array',
      'sanitize_callback' => 'jlc_sm_sanitize_settings',
      'default' => jlc_sm_get_default_settings(),
    ]
  );
}

add_action('admin_init', 'jlc_sm_register_settings');
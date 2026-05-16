<?php

if (!defined('ABSPATH')) {
  exit;
}

/**
 * Sanitize hex color.
 */
function jlc_sm_sanitize_hex_color($value, $fallback = '')
{
  $value = sanitize_hex_color($value);

  return $value ? $value : $fallback;
}

/**
 * Sanitize numeric value.
 */
function jlc_sm_sanitize_number($value, $fallback = 0, $min = null, $max = null)
{
  if ($value === '' || $value === null || !is_numeric($value)) {
    return $fallback;
  }

  $value = floatval($value);

  if ($min !== null && $value < $min) {
    $value = $min;
  }

  if ($max !== null && $value > $max) {
    $value = $max;
  }

  return $value;
}

/**
 * Sanitize font weight.
 */
function jlc_sm_sanitize_font_weight($value, $fallback = '500')
{
  $allowed = [
    '300',
    '400',
    '500',
    '600',
    '700',
    '800',
    '900',
  ];

  $value = sanitize_text_field($value);

  return in_array($value, $allowed, true) ? $value : $fallback;
}

/**
 * Default settings.
 */
function jlc_sm_get_default_settings()
{
  return [
    'enabled' => '0',

    /**
     * Content
     */
    'heading' => 'Natalia Bustillo',
    'subheading' => 'Estética Total',
    'message' => 'Pronto estará disponible nuestra plataforma',
    'deadline' => '2026-06-15T07:00',

    /**
     * Countdown labels
     */
    'countdown_days_label' => 'Días',
    'countdown_hours_label' => 'Horas',
    'countdown_minutes_label' => 'Minutos',
    'countdown_seconds_label' => 'Segundos',

    /**
     * Images
     */
    'desktop_image_id' => '',
    'desktop_image_url' => JLC_SM_IMAGES_URL . 'banner-solo_mantenimiento_desktop.webp',

    'mobile_image_id' => '',
    'mobile_image_url' => JLC_SM_IMAGES_URL . 'banner-solo_mantenimiento_mobile.webp',

    /**
     * Social links
     */
    'instagram_url' => 'https://www.instagram.com/',
    'email_address' => 'contacto@nataliabustillo.com',
    'whatsapp_url' => 'https://wa.me/573000000000',

    /**
     * Footer
     */
    'footer_text' => 'Desarrollado por',
    'footer_link_text' => 'Jairo Colón Developer.',
    'footer_link_url' => 'https://jairocolon.com',

    /**
     * Style settings
     */
    'overlay_color' => '#ff5f00',
    'overlay_opacity' => '0.72',

    'heading_color' => '#ffffff',
    'heading_size_desktop' => '92',
    'heading_size_mobile' => '42',
    'heading_weight' => '600',

    'subheading_color' => '#ffffff',
    'subheading_size_desktop' => '52',
    'subheading_size_mobile' => '24',
    'subheading_weight' => '400',

    'message_color' => '#ffffff',
    'message_size_desktop' => '54',
    'message_size_mobile' => '24',
    'message_weight' => '500',

    'icon_color' => '#ffffff',
    'icon_size_desktop' => '50',
    'icon_size_mobile' => '48',
    'icon_gap' => '40',

    'countdown_card_background' => '#000000',
    'countdown_card_opacity' => '0.45',
    'countdown_card_radius' => '12',
    'countdown_card_width_desktop' => '150',
    'countdown_card_height_desktop' => '150',
    'countdown_card_height_mobile' => '120',
    'countdown_gap' => '28',

    'countdown_number_color' => '#ffffff',
    'countdown_number_size_desktop' => '65',
    'countdown_number_size_mobile' => '44',
    'countdown_number_weight' => '800',

    'countdown_label_color' => '#ffffff',
    'countdown_label_size_desktop' => '20',
    'countdown_label_size_mobile' => '18',
    'countdown_label_weight' => '500',

    'footer_color' => '#ffffff',
    'footer_size_desktop' => '18',
    'footer_size_mobile' => '15',

    /**
     * Custom CSS
     */
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

  /**
   * Settings
   */
  $output['enabled'] = !empty($input['enabled']) ? '1' : '0';

  /**
   * Content
   */
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

  /**
   * Countdown labels
   */
  $output['countdown_days_label'] = isset($input['countdown_days_label'])
    ? sanitize_text_field($input['countdown_days_label'])
    : $defaults['countdown_days_label'];

  $output['countdown_hours_label'] = isset($input['countdown_hours_label'])
    ? sanitize_text_field($input['countdown_hours_label'])
    : $defaults['countdown_hours_label'];

  $output['countdown_minutes_label'] = isset($input['countdown_minutes_label'])
    ? sanitize_text_field($input['countdown_minutes_label'])
    : $defaults['countdown_minutes_label'];

  $output['countdown_seconds_label'] = isset($input['countdown_seconds_label'])
    ? sanitize_text_field($input['countdown_seconds_label'])
    : $defaults['countdown_seconds_label'];

  /**
   * Images
   */
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

  /**
   * Social links
   */
  $output['instagram_url'] = isset($input['instagram_url'])
    ? esc_url_raw($input['instagram_url'])
    : '';

  $output['email_address'] = isset($input['email_address'])
    ? sanitize_email($input['email_address'])
    : '';

  $output['whatsapp_url'] = isset($input['whatsapp_url'])
    ? esc_url_raw($input['whatsapp_url'])
    : '';

  /**
   * Footer
   */
  $output['footer_text'] = isset($input['footer_text'])
    ? sanitize_text_field($input['footer_text'])
    : '';

  $output['footer_link_text'] = isset($input['footer_link_text'])
    ? sanitize_text_field($input['footer_link_text'])
    : '';

  $output['footer_link_url'] = isset($input['footer_link_url'])
    ? esc_url_raw($input['footer_link_url'])
    : '';

  /**
   * Style settings
   */
  $output['overlay_color'] = isset($input['overlay_color'])
    ? jlc_sm_sanitize_hex_color($input['overlay_color'], $defaults['overlay_color'])
    : $defaults['overlay_color'];

  $output['overlay_opacity'] = isset($input['overlay_opacity'])
    ? jlc_sm_sanitize_number($input['overlay_opacity'], $defaults['overlay_opacity'], 0, 1)
    : $defaults['overlay_opacity'];

  $output['heading_color'] = isset($input['heading_color'])
    ? jlc_sm_sanitize_hex_color($input['heading_color'], $defaults['heading_color'])
    : $defaults['heading_color'];

  $output['heading_size_desktop'] = isset($input['heading_size_desktop'])
    ? jlc_sm_sanitize_number($input['heading_size_desktop'], $defaults['heading_size_desktop'], 12, 180)
    : $defaults['heading_size_desktop'];

  $output['heading_size_mobile'] = isset($input['heading_size_mobile'])
    ? jlc_sm_sanitize_number($input['heading_size_mobile'], $defaults['heading_size_mobile'], 12, 120)
    : $defaults['heading_size_mobile'];

  $output['heading_weight'] = isset($input['heading_weight'])
    ? jlc_sm_sanitize_font_weight($input['heading_weight'], $defaults['heading_weight'])
    : $defaults['heading_weight'];

  $output['subheading_color'] = isset($input['subheading_color'])
    ? jlc_sm_sanitize_hex_color($input['subheading_color'], $defaults['subheading_color'])
    : $defaults['subheading_color'];

  $output['subheading_size_desktop'] = isset($input['subheading_size_desktop'])
    ? jlc_sm_sanitize_number($input['subheading_size_desktop'], $defaults['subheading_size_desktop'], 10, 120)
    : $defaults['subheading_size_desktop'];

  $output['subheading_size_mobile'] = isset($input['subheading_size_mobile'])
    ? jlc_sm_sanitize_number($input['subheading_size_mobile'], $defaults['subheading_size_mobile'], 10, 90)
    : $defaults['subheading_size_mobile'];

  $output['subheading_weight'] = isset($input['subheading_weight'])
    ? jlc_sm_sanitize_font_weight($input['subheading_weight'], $defaults['subheading_weight'])
    : $defaults['subheading_weight'];

  $output['message_color'] = isset($input['message_color'])
    ? jlc_sm_sanitize_hex_color($input['message_color'], $defaults['message_color'])
    : $defaults['message_color'];

  $output['message_size_desktop'] = isset($input['message_size_desktop'])
    ? jlc_sm_sanitize_number($input['message_size_desktop'], $defaults['message_size_desktop'], 10, 120)
    : $defaults['message_size_desktop'];

  $output['message_size_mobile'] = isset($input['message_size_mobile'])
    ? jlc_sm_sanitize_number($input['message_size_mobile'], $defaults['message_size_mobile'], 10, 90)
    : $defaults['message_size_mobile'];

  $output['message_weight'] = isset($input['message_weight'])
    ? jlc_sm_sanitize_font_weight($input['message_weight'], $defaults['message_weight'])
    : $defaults['message_weight'];

  $output['icon_color'] = isset($input['icon_color'])
    ? jlc_sm_sanitize_hex_color($input['icon_color'], $defaults['icon_color'])
    : $defaults['icon_color'];

  $output['icon_size_desktop'] = isset($input['icon_size_desktop'])
    ? jlc_sm_sanitize_number($input['icon_size_desktop'], $defaults['icon_size_desktop'], 12, 120)
    : $defaults['icon_size_desktop'];

  $output['icon_size_mobile'] = isset($input['icon_size_mobile'])
    ? jlc_sm_sanitize_number($input['icon_size_mobile'], $defaults['icon_size_mobile'], 12, 100)
    : $defaults['icon_size_mobile'];

  $output['icon_gap'] = isset($input['icon_gap'])
    ? jlc_sm_sanitize_number($input['icon_gap'], $defaults['icon_gap'], 0, 120)
    : $defaults['icon_gap'];

  $output['countdown_card_background'] = isset($input['countdown_card_background'])
    ? jlc_sm_sanitize_hex_color($input['countdown_card_background'], $defaults['countdown_card_background'])
    : $defaults['countdown_card_background'];

  $output['countdown_card_opacity'] = isset($input['countdown_card_opacity'])
    ? jlc_sm_sanitize_number($input['countdown_card_opacity'], $defaults['countdown_card_opacity'], 0, 1)
    : $defaults['countdown_card_opacity'];

  $output['countdown_card_radius'] = isset($input['countdown_card_radius'])
    ? jlc_sm_sanitize_number($input['countdown_card_radius'], $defaults['countdown_card_radius'], 0, 80)
    : $defaults['countdown_card_radius'];

  $output['countdown_card_width_desktop'] = isset($input['countdown_card_width_desktop'])
    ? jlc_sm_sanitize_number($input['countdown_card_width_desktop'], $defaults['countdown_card_width_desktop'], 80, 320)
    : $defaults['countdown_card_width_desktop'];

  $output['countdown_card_height_desktop'] = isset($input['countdown_card_height_desktop'])
    ? jlc_sm_sanitize_number($input['countdown_card_height_desktop'], $defaults['countdown_card_height_desktop'], 80, 320)
    : $defaults['countdown_card_height_desktop'];

  $output['countdown_card_height_mobile'] = isset($input['countdown_card_height_mobile'])
    ? jlc_sm_sanitize_number($input['countdown_card_height_mobile'], $defaults['countdown_card_height_mobile'], 70, 220)
    : $defaults['countdown_card_height_mobile'];

  $output['countdown_gap'] = isset($input['countdown_gap'])
    ? jlc_sm_sanitize_number($input['countdown_gap'], $defaults['countdown_gap'], 0, 120)
    : $defaults['countdown_gap'];

  $output['countdown_number_color'] = isset($input['countdown_number_color'])
    ? jlc_sm_sanitize_hex_color($input['countdown_number_color'], $defaults['countdown_number_color'])
    : $defaults['countdown_number_color'];

  $output['countdown_number_size_desktop'] = isset($input['countdown_number_size_desktop'])
    ? jlc_sm_sanitize_number($input['countdown_number_size_desktop'], $defaults['countdown_number_size_desktop'], 14, 140)
    : $defaults['countdown_number_size_desktop'];

  $output['countdown_number_size_mobile'] = isset($input['countdown_number_size_mobile'])
    ? jlc_sm_sanitize_number($input['countdown_number_size_mobile'], $defaults['countdown_number_size_mobile'], 14, 100)
    : $defaults['countdown_number_size_mobile'];

  $output['countdown_number_weight'] = isset($input['countdown_number_weight'])
    ? jlc_sm_sanitize_font_weight($input['countdown_number_weight'], $defaults['countdown_number_weight'])
    : $defaults['countdown_number_weight'];

  $output['countdown_label_color'] = isset($input['countdown_label_color'])
    ? jlc_sm_sanitize_hex_color($input['countdown_label_color'], $defaults['countdown_label_color'])
    : $defaults['countdown_label_color'];

  $output['countdown_label_size_desktop'] = isset($input['countdown_label_size_desktop'])
    ? jlc_sm_sanitize_number($input['countdown_label_size_desktop'], $defaults['countdown_label_size_desktop'], 10, 60)
    : $defaults['countdown_label_size_desktop'];

  $output['countdown_label_size_mobile'] = isset($input['countdown_label_size_mobile'])
    ? jlc_sm_sanitize_number($input['countdown_label_size_mobile'], $defaults['countdown_label_size_mobile'], 10, 50)
    : $defaults['countdown_label_size_mobile'];

  $output['countdown_label_weight'] = isset($input['countdown_label_weight'])
    ? jlc_sm_sanitize_font_weight($input['countdown_label_weight'], $defaults['countdown_label_weight'])
    : $defaults['countdown_label_weight'];

  $output['footer_color'] = isset($input['footer_color'])
    ? jlc_sm_sanitize_hex_color($input['footer_color'], $defaults['footer_color'])
    : $defaults['footer_color'];

  $output['footer_size_desktop'] = isset($input['footer_size_desktop'])
    ? jlc_sm_sanitize_number($input['footer_size_desktop'], $defaults['footer_size_desktop'], 10, 60)
    : $defaults['footer_size_desktop'];

  $output['footer_size_mobile'] = isset($input['footer_size_mobile'])
    ? jlc_sm_sanitize_number($input['footer_size_mobile'], $defaults['footer_size_mobile'], 10, 40)
    : $defaults['footer_size_mobile'];

  /**
   * Custom CSS
   */
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
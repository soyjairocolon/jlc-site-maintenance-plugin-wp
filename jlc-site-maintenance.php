<?php

/**
 * Plugin Name: JLC Site Maintenance
 * Plugin URI: https://jairocolon.dev/plugins/jlc-site-maintenance
 * Description: Lightweight and customizable maintenance mode plugin for WordPress with countdown, responsive backgrounds, custom content, social links and live preview support.
 * Version: 1.0.0
 * Author: Jairo Colón
 * Author URI: https://jairocolon.dev
 * License: GPL2
 * Text Domain: jlc-site-maintenance
 * Copyright (c) 2026 Jairo Colón Developer
 */

if (!defined('ABSPATH')) {
  exit;
}

/**
 * Constants
 */
define('JLC_SM_VERSION', '1.0.0');
define('JLC_SM_PATH', plugin_dir_path(__FILE__));
define('JLC_SM_URL', plugin_dir_url(__FILE__));
define('JLC_SM_OPTION_NAME', 'jlc_sm_settings');

define('JLC_SM_ADMIN_PATH', JLC_SM_PATH . 'admin/');
define('JLC_SM_SECTIONS_PATH', JLC_SM_ADMIN_PATH . 'sections/');
define('JLC_SM_TEMPLATES_PATH', JLC_SM_PATH . 'templates/');

define('JLC_SM_ASSETS_URL', JLC_SM_URL . 'assets/');
define('JLC_SM_CSS_URL', JLC_SM_ASSETS_URL . 'css/');
define('JLC_SM_JS_URL', JLC_SM_ASSETS_URL . 'js/');

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
    'desktop_image_url' => JLC_SM_ASSETS_URL . 'images/banner-solo_mantenimiento_desktop.webp',
    'mobile_image_id' => '',
    'mobile_image_url' => JLC_SM_ASSETS_URL . 'images/banner-solo_mantenimiento_mobile.webp',
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
    : $defaults['instagram_url'];

  $output['email_address'] = isset($input['email_address'])
    ? sanitize_email($input['email_address'])
    : $defaults['email_address'];

  $output['whatsapp_url'] = isset($input['whatsapp_url'])
    ? esc_url_raw($input['whatsapp_url'])
    : $defaults['whatsapp_url'];

  $output['footer_text'] = isset($input['footer_text'])
    ? sanitize_text_field($input['footer_text'])
    : $defaults['footer_text'];

  $output['footer_link_text'] = isset($input['footer_link_text'])
    ? sanitize_text_field($input['footer_link_text'])
    : $defaults['footer_link_text'];

  $output['footer_link_url'] = isset($input['footer_link_url'])
    ? esc_url_raw($input['footer_link_url'])
    : $defaults['footer_link_url'];

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

/**
 * Add admin menu page.
 */
function jlc_sm_add_admin_menu()
{
  add_menu_page(
    'JLC Site Maintenance',
    'JLC Maintenance',
    'manage_options',
    'jlc-site-maintenance',
    'jlc_sm_render_settings_page',
    'dashicons-admin-tools',
    58
  );
}

add_action('admin_menu', 'jlc_sm_add_admin_menu');

/**
 * Render admin settings page.
 */
function jlc_sm_render_settings_page()
{
  if (!current_user_can('manage_options')) {
    return;
  }

  $settings = jlc_sm_get_settings();

  include JLC_SM_ADMIN_PATH . 'jlc-settings-page.php';
}

/**
 * Enqueue admin assets only on plugin page.
 */
function jlc_sm_enqueue_admin_assets($hook)
{
  if ($hook !== 'toplevel_page_jlc-site-maintenance') {
    return;
  }

  wp_enqueue_media();

  wp_enqueue_style(
    'jlc-sm-admin-base',
    JLC_SM_CSS_URL . 'admin/jlc-admin-base.css',
    [],
    JLC_SM_VERSION
  );

  wp_enqueue_style(
    'jlc-sm-admin-tabs',
    JLC_SM_CSS_URL . 'admin/jlc-admin-tabs.css',
    ['jlc-sm-admin-base'],
    JLC_SM_VERSION
  );

  wp_enqueue_style(
    'jlc-sm-admin-settings',
    JLC_SM_URL . 'admin/sections/settings/jlc-admin-settings.css',
    ['jlc-sm-admin-tabs'],
    JLC_SM_VERSION
  );

  wp_enqueue_style(
    'jlc-sm-admin-content',
    JLC_SM_URL . 'admin/sections/content/jlc-admin-content.css',
    ['jlc-sm-admin-settings'],
    JLC_SM_VERSION
  );

  wp_enqueue_style(
    'jlc-sm-admin-custom-css',
    JLC_SM_URL . 'admin/sections/custom-css/jlc-admin-custom-css.css',
    ['jlc-sm-admin-content'],
    JLC_SM_VERSION
  );

  wp_enqueue_script(
    'jlc-sm-admin',
    JLC_SM_JS_URL . 'jlc-admin.js',
    ['jquery'],
    JLC_SM_VERSION,
    true
  );

  wp_localize_script(
    'jlc-sm-admin',
    'jlcSmAdmin',
    [
      'mediaTitle' => 'Seleccionar imagen',
      'mediaButton' => 'Usar esta imagen',
    ]
  );
}

add_action('admin_enqueue_scripts', 'jlc_sm_enqueue_admin_assets');

/**
 * Check if maintenance mode is enabled.
 */
function jlc_sm_is_enabled()
{
  $settings = jlc_sm_get_settings();

  return isset($settings['enabled']) && $settings['enabled'] === '1';
}

/**
 * Check if current request is preview mode.
 */
function jlc_sm_is_preview()
{
  return isset($_GET['jlc_sm_preview']) && $_GET['jlc_sm_preview'] === '1';
}

/**
 * Check if current user can bypass maintenance mode.
 */
function jlc_sm_can_bypass_maintenance()
{
  return is_user_logged_in() && current_user_can('manage_options');
}

/**
 * Avoid blocking critical WordPress requests.
 */
function jlc_sm_should_skip_request()
{
  if (is_admin()) {
    return true;
  }

  if (wp_doing_ajax()) {
    return true;
  }

  if (defined('REST_REQUEST') && REST_REQUEST) {
    return true;
  }

  if (defined('WP_CLI') && WP_CLI) {
    return true;
  }

  global $pagenow;

  if ($pagenow === 'wp-login.php') {
    return true;
  }

  return false;
}

/**
 * Render maintenance page for non-admin visitors.
 */
function jlc_sm_render_maintenance_page()
{
  if (jlc_sm_should_skip_request()) {
    return;
  }

  $is_preview = jlc_sm_is_preview();

  if (!$is_preview && !jlc_sm_is_enabled()) {
    return;
  }

  if (!$is_preview && jlc_sm_can_bypass_maintenance()) {
    return;
  }

  if ($is_preview && !jlc_sm_can_bypass_maintenance()) {
    wp_safe_redirect(home_url('/'));
    exit;
  }

  if ($is_preview) {
    status_header(200);
  } else {
    status_header(503);
  }

  nocache_headers();

  include JLC_SM_TEMPLATES_PATH . 'jlc-maintenance-page.php';
  exit;
}

add_action('template_redirect', 'jlc_sm_render_maintenance_page', 1);

/**
 * Add settings link in plugins list.
 */
function jlc_sm_add_plugin_action_links($links)
{
  $settings_link = '<a href="' . esc_url(admin_url('admin.php?page=jlc-site-maintenance')) . '">Settings</a>';

  array_unshift($links, $settings_link);

  return $links;
}

add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'jlc_sm_add_plugin_action_links');

/**
 * Open plugin row links in new tab.
 */
function jlc_sm_plugin_row_meta($plugin_meta, $plugin_file)
{
  if ($plugin_file !== plugin_basename(__FILE__)) {
    return $plugin_meta;
  }

  foreach ($plugin_meta as $key => $meta) {
    $plugin_meta[$key] = str_replace(
      '<a ',
      '<a target="_blank" rel="noopener noreferrer" ',
      $meta
    );
  }

  return $plugin_meta;
}

add_filter(
  'plugin_row_meta',
  'jlc_sm_plugin_row_meta',
  10,
  2
);

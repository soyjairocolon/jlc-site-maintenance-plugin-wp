<?php

if (!defined('ABSPATH')) {
  exit;
}

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
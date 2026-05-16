<?php

if (!defined('ABSPATH')) {
  exit;
}

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

  status_header($is_preview ? 200 : 503);
  nocache_headers();

  include JLC_SM_TEMPLATES_PATH . 'jlc-maintenance-page.php';
  exit;
}

add_action('template_redirect', 'jlc_sm_render_maintenance_page', 1);
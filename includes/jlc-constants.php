<?php

if (!defined('ABSPATH')) {
  exit;
}

/**
 * Core
 */
define('JLC_SM_VERSION', '1.0.0');

define('JLC_SM_PATH', plugin_dir_path(dirname(__FILE__)));
define('JLC_SM_URL', plugin_dir_url(dirname(__FILE__)));

define('JLC_SM_OPTION_NAME', 'jlc_sm_settings');

/**
 * Includes
 */
define('JLC_SM_INCLUDES_PATH', JLC_SM_PATH . 'includes/');

/**
 * Admin
 */
define('JLC_SM_ADMIN_PATH', JLC_SM_PATH . 'admin/');
define('JLC_SM_SECTIONS_PATH', JLC_SM_ADMIN_PATH . 'sections/');

/**
 * Templates
 */
define('JLC_SM_TEMPLATES_PATH', JLC_SM_PATH . 'templates/');

/**
 * Assets
 */
define('JLC_SM_ASSETS_PATH', JLC_SM_PATH . 'assets/');
define('JLC_SM_ASSETS_URL', JLC_SM_URL . 'assets/');

define('JLC_SM_CSS_URL', JLC_SM_ASSETS_URL . 'css/');
define('JLC_SM_JS_URL', JLC_SM_ASSETS_URL . 'js/');
define('JLC_SM_IMAGES_URL', JLC_SM_ASSETS_URL . 'images/');
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
require_once plugin_dir_path(__FILE__) . 'includes/jlc-constants.php';

/**
 * Settings
 */
require_once JLC_SM_INCLUDES_PATH . 'jlc-settings.php';

/**
 * Admin
 */
require_once JLC_SM_INCLUDES_PATH . 'jlc-admin.php';

/**
 * Maintenance
 */
require_once JLC_SM_INCLUDES_PATH . 'jlc-maintenance.php';

/**
 * Plugin links
 */
require_once JLC_SM_INCLUDES_PATH . 'jlc-plugin-links.php';
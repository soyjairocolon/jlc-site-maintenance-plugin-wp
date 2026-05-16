<?php

if (!defined('ABSPATH')) {
  exit;
}

/**
 * Add settings link in plugins list.
 */
function jlc_sm_add_plugin_action_links($links)
{
  $settings_link = '<a href="' . esc_url(admin_url('admin.php?page=jlc-site-maintenance')) . '">Settings</a>';

  array_unshift($links, $settings_link);

  return $links;
}

add_filter(
  'plugin_action_links_' . plugin_basename(dirname(__DIR__) . '/jlc-site-maintenance.php'),
  'jlc_sm_add_plugin_action_links'
);

/**
 * Open plugin row links in new tab.
 */
function jlc_sm_plugin_row_meta($plugin_meta, $plugin_file)
{
  if ($plugin_file !== plugin_basename(dirname(__DIR__) . '/jlc-site-maintenance.php')) {
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
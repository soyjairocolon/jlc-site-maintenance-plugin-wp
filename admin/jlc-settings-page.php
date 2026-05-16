<?php
if (!defined('ABSPATH')) {
  exit;
}

$allowed_tabs = [
  'settings',
  'content',
  'custom-css',
];

$current_tab = isset($_GET['tab'])
  ? sanitize_key($_GET['tab'])
  : 'settings';

if (!in_array($current_tab, $allowed_tabs, true)) {
  $current_tab = 'settings';
}

$settings_url = add_query_arg(
  [
    'page' => 'jlc-site-maintenance',
    'tab'  => 'settings',
  ],
  admin_url('admin.php')
);

$content_url = add_query_arg(
  [
    'page' => 'jlc-site-maintenance',
    'tab'  => 'content',
  ],
  admin_url('admin.php')
);

$custom_css_url = add_query_arg(
  [
    'page' => 'jlc-site-maintenance',
    'tab'  => 'custom-css',
  ],
  admin_url('admin.php')
);

$preview_url = add_query_arg(
  'jlc_sm_preview',
  '1',
  home_url('/')
);

$is_settings_tab = $current_tab === 'settings';
$is_content_tab = $current_tab === 'content';
$is_custom_css_tab = $current_tab === 'custom-css';

$settings_section_path = JLC_SM_SECTIONS_PATH . 'settings/jlc-section-settings.php';
$content_section_path = JLC_SM_SECTIONS_PATH . 'content/jlc-section-content.php';
$custom_css_section_path = JLC_SM_SECTIONS_PATH . 'custom-css/jlc-section-custom-css.php';
?>

<div class="wrap jlc-sm-admin-wrap">
  <div class="jlc-sm-admin-header">
    <h1 class="jlc-sm-admin-title">
      JLC Site Maintenance
    </h1>

    <p class="jlc-sm-admin-description">
      Configura la página de mantenimiento del sitio web.
    </p>
  </div>

  <form method="post" action="options.php" class="jlc-sm-admin-form">
    <?php settings_fields('jlc_sm_settings_group'); ?>

    <!-- TABS -->
    <nav class="nav-tab-wrapper jlc-sm-tabs">
      <a
        href="<?php echo esc_url($settings_url); ?>"
        data-tab-target="settings"
        class="nav-tab <?php echo $is_settings_tab ? 'nav-tab-active' : ''; ?>">
        Settings
      </a>

      <a
        href="<?php echo esc_url($content_url); ?>"
        data-tab-target="content"
        class="nav-tab <?php echo $is_content_tab ? 'nav-tab-active' : ''; ?>">
        Content
      </a>

      <a
        href="<?php echo esc_url($custom_css_url); ?>"
        data-tab-target="custom-css"
        class="nav-tab <?php echo $is_custom_css_tab ? 'nav-tab-active' : ''; ?>">
        Custom CSS
      </a>

      <a
        href="<?php echo esc_url($preview_url); ?>"
        class="nav-tab"
        target="_blank"
        rel="noopener noreferrer">
        Preview
      </a>
    </nav>

    <?php
    if (file_exists($settings_section_path)) {
      include $settings_section_path;
    }

    if (file_exists($content_section_path)) {
      include $content_section_path;
    }

    if (file_exists($custom_css_section_path)) {
      include $custom_css_section_path;
    }
    ?>

    <div class="jlc-sm-admin-actions">
      <?php submit_button('Guardar cambios'); ?>
    </div>
  </form>
</div>
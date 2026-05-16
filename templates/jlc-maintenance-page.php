<?php
if (!defined('ABSPATH')) {
  exit;
}

$settings = function_exists('jlc_sm_get_settings')
  ? jlc_sm_get_settings()
  : [];

$site_url = home_url('/');

$heading = isset($settings['heading'])
  ? trim((string) $settings['heading'])
  : '';

$subheading = isset($settings['subheading'])
  ? trim((string) $settings['subheading'])
  : '';

$message = isset($settings['message'])
  ? trim((string) $settings['message'])
  : '';

$deadline = isset($settings['deadline']) && !empty($settings['deadline'])
  ? trim((string) $settings['deadline'])
  : '2026-06-15T07:00';

$deadline_iso = $deadline . ':00-05:00';

$countdown_days_label = isset($settings['countdown_days_label'])
  ? trim((string) $settings['countdown_days_label'])
  : 'Días';

$countdown_hours_label = isset($settings['countdown_hours_label'])
  ? trim((string) $settings['countdown_hours_label'])
  : 'Horas';

$countdown_minutes_label = isset($settings['countdown_minutes_label'])
  ? trim((string) $settings['countdown_minutes_label'])
  : 'Minutos';

$countdown_seconds_label = isset($settings['countdown_seconds_label'])
  ? trim((string) $settings['countdown_seconds_label'])
  : 'Segundos';

$instagram_url = isset($settings['instagram_url'])
  ? trim((string) $settings['instagram_url'])
  : '';

$email_address = isset($settings['email_address'])
  ? trim((string) $settings['email_address'])
  : '';

$whatsapp_url = isset($settings['whatsapp_url'])
  ? trim((string) $settings['whatsapp_url'])
  : '';

$desktop_bg = isset($settings['desktop_image_url']) && !empty($settings['desktop_image_url'])
  ? trim((string) $settings['desktop_image_url'])
  : JLC_SM_IMAGES_URL . 'banner-solo_mantenimiento_desktop.webp';

$mobile_bg = isset($settings['mobile_image_url']) && !empty($settings['mobile_image_url'])
  ? trim((string) $settings['mobile_image_url'])
  : JLC_SM_IMAGES_URL . 'banner-solo_mantenimiento_mobile.webp';

$footer_text = isset($settings['footer_text'])
  ? trim((string) $settings['footer_text'])
  : '';

$footer_link_text = isset($settings['footer_link_text'])
  ? trim((string) $settings['footer_link_text'])
  : '';

$footer_link_url = isset($settings['footer_link_url'])
  ? trim((string) $settings['footer_link_url'])
  : '';

$custom_css = isset($settings['custom_css'])
  ? trim((string) $settings['custom_css'])
  : '';

$page_title_parts = array_filter([
  $heading,
  $subheading,
]);

$page_title = !empty($page_title_parts)
  ? implode(' - ', $page_title_parts)
  : get_bloginfo('name');

$has_brand = !empty($heading) || !empty($subheading);
$has_socials = !empty($instagram_url) || !empty($email_address) || !empty($whatsapp_url);
$has_footer = !empty($footer_text) || (!empty($footer_link_text) && !empty($footer_link_url));

$css_url = JLC_SM_CSS_URL . 'jlc-maintenance.css';
$js_url  = JLC_SM_JS_URL . 'jlc-maintenance.js';

/**
 * Dynamic style variables.
 */
$overlay_color = $settings['overlay_color'] ?? '#ff5f00';
$overlay_opacity = $settings['overlay_opacity'] ?? '0.72';

$heading_color = $settings['heading_color'] ?? '#ffffff';
$heading_size_desktop = $settings['heading_size_desktop'] ?? '92';
$heading_size_mobile = $settings['heading_size_mobile'] ?? '42';
$heading_weight = $settings['heading_weight'] ?? '600';

$subheading_color = $settings['subheading_color'] ?? '#ffffff';
$subheading_size_desktop = $settings['subheading_size_desktop'] ?? '52';
$subheading_size_mobile = $settings['subheading_size_mobile'] ?? '24';
$subheading_weight = $settings['subheading_weight'] ?? '400';

$message_color = $settings['message_color'] ?? '#ffffff';
$message_size_desktop = $settings['message_size_desktop'] ?? '54';
$message_size_mobile = $settings['message_size_mobile'] ?? '24';
$message_weight = $settings['message_weight'] ?? '500';

$icon_color = $settings['icon_color'] ?? '#ffffff';
$icon_size_desktop = $settings['icon_size_desktop'] ?? '50';
$icon_size_mobile = $settings['icon_size_mobile'] ?? '48';
$icon_gap = $settings['icon_gap'] ?? '40';

$countdown_card_background = $settings['countdown_card_background'] ?? '#000000';
$countdown_card_opacity = $settings['countdown_card_opacity'] ?? '0.45';
$countdown_card_radius = $settings['countdown_card_radius'] ?? '12';
$countdown_card_width_desktop = $settings['countdown_card_width_desktop'] ?? '150';
$countdown_card_height_desktop = $settings['countdown_card_height_desktop'] ?? '150';
$countdown_card_height_mobile = $settings['countdown_card_height_mobile'] ?? '120';
$countdown_gap = $settings['countdown_gap'] ?? '28';

$countdown_number_color = $settings['countdown_number_color'] ?? '#ffffff';
$countdown_number_size_desktop = $settings['countdown_number_size_desktop'] ?? '65';
$countdown_number_size_mobile = $settings['countdown_number_size_mobile'] ?? '44';
$countdown_number_weight = $settings['countdown_number_weight'] ?? '800';

$countdown_label_color = $settings['countdown_label_color'] ?? '#ffffff';
$countdown_label_size_desktop = $settings['countdown_label_size_desktop'] ?? '20';
$countdown_label_size_mobile = $settings['countdown_label_size_mobile'] ?? '18';
$countdown_label_weight = $settings['countdown_label_weight'] ?? '500';

$footer_color = $settings['footer_color'] ?? '#ffffff';
$footer_size_desktop = $settings['footer_size_desktop'] ?? '18';
$footer_size_mobile = $settings['footer_size_mobile'] ?? '15';
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title><?php echo esc_html($page_title); ?></title>
  <meta name="robots" content="noindex, nofollow">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="<?php echo esc_url($css_url); ?>?ver=<?php echo esc_attr(JLC_SM_VERSION); ?>">

  <?php if (!empty($custom_css)) : ?>
    <style id="jlc-sm-custom-css">
      <?php echo wp_strip_all_tags($custom_css); ?>
    </style>
  <?php endif; ?>
</head>

<body class="jlc-sm-body">
  <main
    class="jlc-sm-page"
    data-home-url="<?php echo esc_url($site_url); ?>"
    data-deadline="<?php echo esc_attr($deadline_iso); ?>"
    style="
      --jlc-sm-bg-desktop: url('<?php echo esc_url($desktop_bg); ?>');
      --jlc-sm-bg-mobile: url('<?php echo esc_url($mobile_bg); ?>');

      --jlc-sm-overlay-color: <?php echo esc_attr($overlay_color); ?>;
      --jlc-sm-overlay-opacity: <?php echo esc_attr($overlay_opacity); ?>;

      --jlc-sm-heading-color: <?php echo esc_attr($heading_color); ?>;
      --jlc-sm-heading-size-desktop: <?php echo esc_attr($heading_size_desktop); ?>px;
      --jlc-sm-heading-size-mobile: <?php echo esc_attr($heading_size_mobile); ?>px;
      --jlc-sm-heading-weight: <?php echo esc_attr($heading_weight); ?>;

      --jlc-sm-subheading-color: <?php echo esc_attr($subheading_color); ?>;
      --jlc-sm-subheading-size-desktop: <?php echo esc_attr($subheading_size_desktop); ?>px;
      --jlc-sm-subheading-size-mobile: <?php echo esc_attr($subheading_size_mobile); ?>px;
      --jlc-sm-subheading-weight: <?php echo esc_attr($subheading_weight); ?>;

      --jlc-sm-message-color: <?php echo esc_attr($message_color); ?>;
      --jlc-sm-message-size-desktop: <?php echo esc_attr($message_size_desktop); ?>px;
      --jlc-sm-message-size-mobile: <?php echo esc_attr($message_size_mobile); ?>px;
      --jlc-sm-message-weight: <?php echo esc_attr($message_weight); ?>;

      --jlc-sm-icon-color: <?php echo esc_attr($icon_color); ?>;
      --jlc-sm-icon-size-desktop: <?php echo esc_attr($icon_size_desktop); ?>px;
      --jlc-sm-icon-size-mobile: <?php echo esc_attr($icon_size_mobile); ?>px;
      --jlc-sm-icon-gap: <?php echo esc_attr($icon_gap); ?>px;

      --jlc-sm-countdown-card-background: <?php echo esc_attr($countdown_card_background); ?>;
      --jlc-sm-countdown-card-opacity: <?php echo esc_attr($countdown_card_opacity); ?>;
      --jlc-sm-countdown-card-radius: <?php echo esc_attr($countdown_card_radius); ?>px;
      --jlc-sm-countdown-card-width-desktop: <?php echo esc_attr($countdown_card_width_desktop); ?>px;
      --jlc-sm-countdown-card-height-desktop: <?php echo esc_attr($countdown_card_height_desktop); ?>px;
      --jlc-sm-countdown-card-height-mobile: <?php echo esc_attr($countdown_card_height_mobile); ?>px;
      --jlc-sm-countdown-gap: <?php echo esc_attr($countdown_gap); ?>px;

      --jlc-sm-countdown-number-color: <?php echo esc_attr($countdown_number_color); ?>;
      --jlc-sm-countdown-number-size-desktop: <?php echo esc_attr($countdown_number_size_desktop); ?>px;
      --jlc-sm-countdown-number-size-mobile: <?php echo esc_attr($countdown_number_size_mobile); ?>px;
      --jlc-sm-countdown-number-weight: <?php echo esc_attr($countdown_number_weight); ?>;

      --jlc-sm-countdown-label-color: <?php echo esc_attr($countdown_label_color); ?>;
      --jlc-sm-countdown-label-size-desktop: <?php echo esc_attr($countdown_label_size_desktop); ?>px;
      --jlc-sm-countdown-label-size-mobile: <?php echo esc_attr($countdown_label_size_mobile); ?>px;
      --jlc-sm-countdown-label-weight: <?php echo esc_attr($countdown_label_weight); ?>;

      --jlc-sm-footer-color: <?php echo esc_attr($footer_color); ?>;
      --jlc-sm-footer-size-desktop: <?php echo esc_attr($footer_size_desktop); ?>px;
      --jlc-sm-footer-size-mobile: <?php echo esc_attr($footer_size_mobile); ?>px;
    ">
    <section class="jlc-sm-content">
      <?php if ($has_brand) : ?>
        <header class="jlc-sm-brand">
          <?php if (!empty($heading)) : ?>
            <h1 class="jlc-sm-title"><?php echo esc_html($heading); ?></h1>
          <?php endif; ?>

          <?php if (!empty($subheading)) : ?>
            <p class="jlc-sm-subtitle"><?php echo esc_html($subheading); ?></p>
          <?php endif; ?>
        </header>
      <?php endif; ?>

      <?php if (!empty($message)) : ?>
        <p class="jlc-sm-message"><?php echo esc_html($message); ?></p>
      <?php endif; ?>

      <div class="jlc-sm-countdown" aria-label="Contador de lanzamiento">
        <article class="jlc-sm-time-box">
          <strong id="jlc-sm-days">00</strong>
          <?php if (!empty($countdown_days_label)) : ?>
            <span><?php echo esc_html($countdown_days_label); ?></span>
          <?php endif; ?>
        </article>

        <article class="jlc-sm-time-box">
          <strong id="jlc-sm-hours">00</strong>
          <?php if (!empty($countdown_hours_label)) : ?>
            <span><?php echo esc_html($countdown_hours_label); ?></span>
          <?php endif; ?>
        </article>

        <article class="jlc-sm-time-box">
          <strong id="jlc-sm-minutes">00</strong>
          <?php if (!empty($countdown_minutes_label)) : ?>
            <span><?php echo esc_html($countdown_minutes_label); ?></span>
          <?php endif; ?>
        </article>

        <article class="jlc-sm-time-box">
          <strong id="jlc-sm-seconds">00</strong>
          <?php if (!empty($countdown_seconds_label)) : ?>
            <span><?php echo esc_html($countdown_seconds_label); ?></span>
          <?php endif; ?>
        </article>
      </div>

      <?php if ($has_socials) : ?>
        <nav class="jlc-sm-socials" aria-label="Canales de contacto">
          <?php if (!empty($instagram_url)) : ?>
            <a
              class="jlc-sm-social-link"
              href="<?php echo esc_url($instagram_url); ?>"
              target="_blank"
              rel="noopener noreferrer"
              aria-label="Instagram">
              <svg viewBox="0 0 24 24" aria-hidden="true">
                <path d="M7 2h10a5 5 0 0 1 5 5v10a5 5 0 0 1-5 5H7a5 5 0 0 1-5-5V7a5 5 0 0 1 5-5Zm0 2a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3V7a3 3 0 0 0-3-3H7Zm5 4a4 4 0 1 1 0 8a4 4 0 0 1 0-8Zm0 2a2 2 0 1 0 0 4a2 2 0 0 0 0-4Zm5.25-2.75a1 1 0 1 1 0 2a1 1 0 0 1 0-2Z" />
              </svg>
            </a>
          <?php endif; ?>

          <?php if (!empty($email_address)) : ?>
            <a
              class="jlc-sm-social-link"
              href="mailto:<?php echo esc_attr($email_address); ?>"
              aria-label="Correo electrónico">
              <svg viewBox="0 0 24 24" aria-hidden="true">
                <path d="M4 4h16a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2Zm0 4.24V18h16V8.24l-7.36 5.52a1.07 1.07 0 0 1-1.28 0L4 8.24ZM4.8 6l7.2 5.4L19.2 6H4.8Z" />
              </svg>
            </a>
          <?php endif; ?>

          <?php if (!empty($whatsapp_url)) : ?>
            <a
              class="jlc-sm-social-link"
              href="<?php echo esc_url($whatsapp_url); ?>"
              target="_blank"
              rel="noopener noreferrer"
              aria-label="WhatsApp">
              <svg viewBox="0 0 24 24" aria-hidden="true">
                <path d="M12.04 2a9.9 9.9 0 0 1 8.56 14.88L22 22l-5.27-1.36A9.9 9.9 0 0 1 2.15 12A9.9 9.9 0 0 1 12.04 2Zm0 2A7.9 7.9 0 0 0 4.15 12a7.82 7.82 0 0 0 1.14 4.08l.25.39l-.72 2.67l2.75-.71l.38.22A7.9 7.9 0 1 0 12.04 4Zm-3.4 3.9c.18-.01.37-.01.55-.01c.15 0 .34-.04.53.4c.2.48.67 1.66.73 1.78c.06.12.1.26.02.42c-.07.16-.11.26-.23.4c-.12.14-.25.31-.36.42c-.12.12-.24.25-.1.5c.14.25.63 1.04 1.35 1.68c.93.83 1.7 1.08 1.95 1.2c.25.12.4.1.55-.06c.16-.18.63-.74.8-1c.17-.25.34-.21.57-.13c.23.08 1.47.7 1.72.82c.25.12.42.18.48.28c.06.1.06.58-.14 1.13c-.2.55-1.15 1.08-1.6 1.15c-.41.06-.93.09-1.5-.09c-.34-.1-.78-.25-1.34-.49c-2.36-1.02-3.9-3.39-4.02-3.55c-.12-.16-.96-1.28-.96-2.44c0-1.16.6-1.73.82-1.97c.22-.24.48-.31.65-.32Z" />
              </svg>
            </a>
          <?php endif; ?>
        </nav>
      <?php endif; ?>
    </section>

    <?php if ($has_footer) : ?>
      <footer class="jlc-sm-footer">
        <?php if (!empty($footer_text)) : ?>
          <?php echo esc_html($footer_text); ?>
        <?php endif; ?>

        <?php if (!empty($footer_link_url) && !empty($footer_link_text)) : ?>
          <a href="<?php echo esc_url($footer_link_url); ?>" target="_blank" rel="noopener noreferrer">
            <?php echo esc_html($footer_link_text); ?>
          </a>
        <?php endif; ?>
      </footer>
    <?php endif; ?>
  </main>

  <script src="<?php echo esc_url($js_url); ?>?ver=<?php echo esc_attr(JLC_SM_VERSION); ?>" defer></script>
</body>

</html>
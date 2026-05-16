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
  : JLC_SM_URL . 'assets/images/banner-solo_mantenimiento_desktop.webp';

$mobile_bg = isset($settings['mobile_image_url']) && !empty($settings['mobile_image_url'])
  ? trim((string) $settings['mobile_image_url'])
  : JLC_SM_URL . 'assets/images/banner-solo_mantenimiento_mobile.webp';

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

$css_url = JLC_SM_URL . 'assets/css/jlc-maintenance.css';
$js_url  = JLC_SM_URL . 'assets/js/jlc-maintenance.js';
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
          <span>Días</span>
        </article>

        <article class="jlc-sm-time-box">
          <strong id="jlc-sm-hours">00</strong>
          <span>Horas</span>
        </article>

        <article class="jlc-sm-time-box">
          <strong id="jlc-sm-minutes">00</strong>
          <span>Minutos</span>
        </article>

        <article class="jlc-sm-time-box">
          <strong id="jlc-sm-seconds">00</strong>
          <span>Segundos</span>
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
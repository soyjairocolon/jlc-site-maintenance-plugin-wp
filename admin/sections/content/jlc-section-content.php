<?php
if (!defined('ABSPATH')) {
  exit;
}

$font_weights = [
  '300' => '300 - Light',
  '400' => '400 - Regular',
  '500' => '500 - Medium',
  '600' => '600 - Semi Bold',
  '700' => '700 - Bold',
  '800' => '800 - Extra Bold',
  '900' => '900 - Black',
];
?>

<!-- CONTENT -->
<section
  id="jlc-sm-content"
  class="jlc-sm-admin-section jlc-sm-admin-section-content"
  <?php echo !$is_content_tab ? 'style="display:none;"' : ''; ?>>

  <div class="jlc-sm-section-header">
    <h2>Content</h2>
    <p>Contenido visual, textos y estilos de la página de mantenimiento.</p>
  </div>

  <div class="jlc-sm-content-group">
    <h3>General Content</h3>

    <table class="form-table" role="presentation">
      <tr>
        <th scope="row">
          <label for="jlc-sm-heading">Heading</label>
        </th>

        <td>
          <input
            type="text"
            id="jlc-sm-heading"
            class="regular-text"
            name="<?php echo esc_attr(JLC_SM_OPTION_NAME); ?>[heading]"
            value="<?php echo esc_attr($settings['heading']); ?>">
        </td>
      </tr>

      <tr>
        <th scope="row">
          <label for="jlc-sm-subheading">Subheading</label>
        </th>

        <td>
          <input
            type="text"
            id="jlc-sm-subheading"
            class="regular-text"
            name="<?php echo esc_attr(JLC_SM_OPTION_NAME); ?>[subheading]"
            value="<?php echo esc_attr($settings['subheading']); ?>">
        </td>
      </tr>

      <tr>
        <th scope="row">
          <label for="jlc-sm-message">Message</label>
        </th>

        <td>
          <input
            type="text"
            id="jlc-sm-message"
            class="large-text"
            name="<?php echo esc_attr(JLC_SM_OPTION_NAME); ?>[message]"
            value="<?php echo esc_attr($settings['message']); ?>">
        </td>
      </tr>

      <tr>
        <th scope="row">
          <label for="jlc-sm-deadline">Deadline</label>
        </th>

        <td>
          <input
            type="datetime-local"
            id="jlc-sm-deadline"
            name="<?php echo esc_attr(JLC_SM_OPTION_NAME); ?>[deadline]"
            value="<?php echo esc_attr($settings['deadline']); ?>">

          <p class="description">
            Fecha y hora final del contador.
          </p>
        </td>
      </tr>
    </table>
  </div>

  <div class="jlc-sm-content-group">
    <h3>Countdown Labels</h3>

    <table class="form-table" role="presentation">
      <tr>
        <th scope="row">
          <label for="jlc-sm-countdown-days-label">Days Label</label>
        </th>

        <td>
          <input
            type="text"
            id="jlc-sm-countdown-days-label"
            class="regular-text"
            name="<?php echo esc_attr(JLC_SM_OPTION_NAME); ?>[countdown_days_label]"
            value="<?php echo esc_attr($settings['countdown_days_label']); ?>">
        </td>
      </tr>

      <tr>
        <th scope="row">
          <label for="jlc-sm-countdown-hours-label">Hours Label</label>
        </th>

        <td>
          <input
            type="text"
            id="jlc-sm-countdown-hours-label"
            class="regular-text"
            name="<?php echo esc_attr(JLC_SM_OPTION_NAME); ?>[countdown_hours_label]"
            value="<?php echo esc_attr($settings['countdown_hours_label']); ?>">
        </td>
      </tr>

      <tr>
        <th scope="row">
          <label for="jlc-sm-countdown-minutes-label">Minutes Label</label>
        </th>

        <td>
          <input
            type="text"
            id="jlc-sm-countdown-minutes-label"
            class="regular-text"
            name="<?php echo esc_attr(JLC_SM_OPTION_NAME); ?>[countdown_minutes_label]"
            value="<?php echo esc_attr($settings['countdown_minutes_label']); ?>">
        </td>
      </tr>

      <tr>
        <th scope="row">
          <label for="jlc-sm-countdown-seconds-label">Seconds Label</label>
        </th>

        <td>
          <input
            type="text"
            id="jlc-sm-countdown-seconds-label"
            class="regular-text"
            name="<?php echo esc_attr(JLC_SM_OPTION_NAME); ?>[countdown_seconds_label]"
            value="<?php echo esc_attr($settings['countdown_seconds_label']); ?>">
        </td>
      </tr>
    </table>
  </div>

  <div class="jlc-sm-content-group">
    <h3>Background Images</h3>

    <table class="form-table" role="presentation">
      <tr>
        <th scope="row">Desktop Image</th>

        <td>
          <input
            type="hidden"
            class="jlc-sm-image-id"
            name="<?php echo esc_attr(JLC_SM_OPTION_NAME); ?>[desktop_image_id]"
            value="<?php echo esc_attr($settings['desktop_image_id']); ?>">

          <div class="jlc-sm-media-field">
            <input
              type="url"
              class="regular-text jlc-sm-image-url"
              name="<?php echo esc_attr(JLC_SM_OPTION_NAME); ?>[desktop_image_url]"
              value="<?php echo esc_url($settings['desktop_image_url']); ?>">

            <button
              type="button"
              class="button button-secondary jlc-sm-upload-image">
              Seleccionar imagen
            </button>
          </div>

          <div class="jlc-sm-image-preview">
            <?php if (!empty($settings['desktop_image_url'])) : ?>
              <img
                src="<?php echo esc_url($settings['desktop_image_url']); ?>"
                alt="">
            <?php endif; ?>
          </div>
        </td>
      </tr>

      <tr>
        <th scope="row">Mobile Image</th>

        <td>
          <input
            type="hidden"
            class="jlc-sm-image-id"
            name="<?php echo esc_attr(JLC_SM_OPTION_NAME); ?>[mobile_image_id]"
            value="<?php echo esc_attr($settings['mobile_image_id']); ?>">

          <div class="jlc-sm-media-field">
            <input
              type="url"
              class="regular-text jlc-sm-image-url"
              name="<?php echo esc_attr(JLC_SM_OPTION_NAME); ?>[mobile_image_url]"
              value="<?php echo esc_url($settings['mobile_image_url']); ?>">

            <button
              type="button"
              class="button button-secondary jlc-sm-upload-image">
              Seleccionar imagen
            </button>
          </div>

          <div class="jlc-sm-image-preview">
            <?php if (!empty($settings['mobile_image_url'])) : ?>
              <img
                src="<?php echo esc_url($settings['mobile_image_url']); ?>"
                alt="">
            <?php endif; ?>
          </div>
        </td>
      </tr>
    </table>
  </div>

  <div class="jlc-sm-content-group">
    <h3>Social Links</h3>

    <table class="form-table" role="presentation">
      <tr>
        <th scope="row">
          <label for="jlc-sm-instagram">Instagram URL</label>
        </th>

        <td>
          <input
            type="url"
            id="jlc-sm-instagram"
            class="regular-text"
            name="<?php echo esc_attr(JLC_SM_OPTION_NAME); ?>[instagram_url]"
            value="<?php echo esc_url($settings['instagram_url']); ?>">
        </td>
      </tr>

      <tr>
        <th scope="row">
          <label for="jlc-sm-email">Email</label>
        </th>

        <td>
          <input
            type="email"
            id="jlc-sm-email"
            class="regular-text"
            name="<?php echo esc_attr(JLC_SM_OPTION_NAME); ?>[email_address]"
            value="<?php echo esc_attr($settings['email_address']); ?>">
        </td>
      </tr>

      <tr>
        <th scope="row">
          <label for="jlc-sm-whatsapp">WhatsApp URL</label>
        </th>

        <td>
          <input
            type="url"
            id="jlc-sm-whatsapp"
            class="regular-text"
            name="<?php echo esc_attr(JLC_SM_OPTION_NAME); ?>[whatsapp_url]"
            value="<?php echo esc_url($settings['whatsapp_url']); ?>">
        </td>
      </tr>
    </table>
  </div>

  <div class="jlc-sm-content-group">
    <h3>Footer</h3>

    <table class="form-table" role="presentation">
      <tr>
        <th scope="row">
          <label for="jlc-sm-footer-text">Footer Text</label>
        </th>

        <td>
          <input
            type="text"
            id="jlc-sm-footer-text"
            class="regular-text"
            name="<?php echo esc_attr(JLC_SM_OPTION_NAME); ?>[footer_text]"
            value="<?php echo esc_attr($settings['footer_text']); ?>">
        </td>
      </tr>

      <tr>
        <th scope="row">
          <label for="jlc-sm-footer-link-text">Footer Link Text</label>
        </th>

        <td>
          <input
            type="text"
            id="jlc-sm-footer-link-text"
            class="regular-text"
            name="<?php echo esc_attr(JLC_SM_OPTION_NAME); ?>[footer_link_text]"
            value="<?php echo esc_attr($settings['footer_link_text']); ?>">
        </td>
      </tr>

      <tr>
        <th scope="row">
          <label for="jlc-sm-footer-link-url">Footer Link URL</label>
        </th>

        <td>
          <input
            type="url"
            id="jlc-sm-footer-link-url"
            class="regular-text"
            name="<?php echo esc_attr(JLC_SM_OPTION_NAME); ?>[footer_link_url]"
            value="<?php echo esc_url($settings['footer_link_url']); ?>">
        </td>
      </tr>
    </table>
  </div>

  <div class="jlc-sm-content-group">
    <h3>Overlay Styles</h3>

    <div class="jlc-sm-style-grid">
      <label class="jlc-sm-style-field">
        <span>Overlay Color</span>
        <input
          type="color"
          name="<?php echo esc_attr(JLC_SM_OPTION_NAME); ?>[overlay_color]"
          value="<?php echo esc_attr($settings['overlay_color']); ?>">
      </label>

      <label class="jlc-sm-style-field">
        <span>Overlay Opacity</span>
        <input
          type="number"
          min="0"
          max="1"
          step="0.01"
          name="<?php echo esc_attr(JLC_SM_OPTION_NAME); ?>[overlay_opacity]"
          value="<?php echo esc_attr($settings['overlay_opacity']); ?>">
      </label>
    </div>
  </div>

  <div class="jlc-sm-content-group">
    <h3>Text Styles</h3>

    <div class="jlc-sm-style-grid">
      <label class="jlc-sm-style-field">
        <span>Heading Color</span>
        <input
          type="color"
          name="<?php echo esc_attr(JLC_SM_OPTION_NAME); ?>[heading_color]"
          value="<?php echo esc_attr($settings['heading_color']); ?>">
      </label>

      <label class="jlc-sm-style-field">
        <span>Heading Desktop Size</span>
        <input
          type="number"
          min="12"
          max="180"
          name="<?php echo esc_attr(JLC_SM_OPTION_NAME); ?>[heading_size_desktop]"
          value="<?php echo esc_attr($settings['heading_size_desktop']); ?>">
      </label>

      <label class="jlc-sm-style-field">
        <span>Heading Mobile Size</span>
        <input
          type="number"
          min="12"
          max="120"
          name="<?php echo esc_attr(JLC_SM_OPTION_NAME); ?>[heading_size_mobile]"
          value="<?php echo esc_attr($settings['heading_size_mobile']); ?>">
      </label>

      <label class="jlc-sm-style-field">
        <span>Heading Weight</span>
        <select name="<?php echo esc_attr(JLC_SM_OPTION_NAME); ?>[heading_weight]">
          <?php foreach ($font_weights as $value => $label) : ?>
            <option value="<?php echo esc_attr($value); ?>" <?php selected($settings['heading_weight'], $value); ?>>
              <?php echo esc_html($label); ?>
            </option>
          <?php endforeach; ?>
        </select>
      </label>

      <label class="jlc-sm-style-field">
        <span>Subheading Color</span>
        <input
          type="color"
          name="<?php echo esc_attr(JLC_SM_OPTION_NAME); ?>[subheading_color]"
          value="<?php echo esc_attr($settings['subheading_color']); ?>">
      </label>

      <label class="jlc-sm-style-field">
        <span>Subheading Desktop Size</span>
        <input
          type="number"
          min="10"
          max="120"
          name="<?php echo esc_attr(JLC_SM_OPTION_NAME); ?>[subheading_size_desktop]"
          value="<?php echo esc_attr($settings['subheading_size_desktop']); ?>">
      </label>

      <label class="jlc-sm-style-field">
        <span>Subheading Mobile Size</span>
        <input
          type="number"
          min="10"
          max="90"
          name="<?php echo esc_attr(JLC_SM_OPTION_NAME); ?>[subheading_size_mobile]"
          value="<?php echo esc_attr($settings['subheading_size_mobile']); ?>">
      </label>

      <label class="jlc-sm-style-field">
        <span>Subheading Weight</span>
        <select name="<?php echo esc_attr(JLC_SM_OPTION_NAME); ?>[subheading_weight]">
          <?php foreach ($font_weights as $value => $label) : ?>
            <option value="<?php echo esc_attr($value); ?>" <?php selected($settings['subheading_weight'], $value); ?>>
              <?php echo esc_html($label); ?>
            </option>
          <?php endforeach; ?>
        </select>
      </label>

      <label class="jlc-sm-style-field">
        <span>Message Color</span>
        <input
          type="color"
          name="<?php echo esc_attr(JLC_SM_OPTION_NAME); ?>[message_color]"
          value="<?php echo esc_attr($settings['message_color']); ?>">
      </label>

      <label class="jlc-sm-style-field">
        <span>Message Desktop Size</span>
        <input
          type="number"
          min="10"
          max="120"
          name="<?php echo esc_attr(JLC_SM_OPTION_NAME); ?>[message_size_desktop]"
          value="<?php echo esc_attr($settings['message_size_desktop']); ?>">
      </label>

      <label class="jlc-sm-style-field">
        <span>Message Mobile Size</span>
        <input
          type="number"
          min="10"
          max="90"
          name="<?php echo esc_attr(JLC_SM_OPTION_NAME); ?>[message_size_mobile]"
          value="<?php echo esc_attr($settings['message_size_mobile']); ?>">
      </label>

      <label class="jlc-sm-style-field">
        <span>Message Weight</span>
        <select name="<?php echo esc_attr(JLC_SM_OPTION_NAME); ?>[message_weight]">
          <?php foreach ($font_weights as $value => $label) : ?>
            <option value="<?php echo esc_attr($value); ?>" <?php selected($settings['message_weight'], $value); ?>>
              <?php echo esc_html($label); ?>
            </option>
          <?php endforeach; ?>
        </select>
      </label>
    </div>
  </div>

  <div class="jlc-sm-content-group">
    <h3>Icon Styles</h3>

    <div class="jlc-sm-style-grid">
      <label class="jlc-sm-style-field">
        <span>Icon Color</span>
        <input
          type="color"
          name="<?php echo esc_attr(JLC_SM_OPTION_NAME); ?>[icon_color]"
          value="<?php echo esc_attr($settings['icon_color']); ?>">
      </label>

      <label class="jlc-sm-style-field">
        <span>Icon Desktop Size</span>
        <input
          type="number"
          min="12"
          max="120"
          name="<?php echo esc_attr(JLC_SM_OPTION_NAME); ?>[icon_size_desktop]"
          value="<?php echo esc_attr($settings['icon_size_desktop']); ?>">
      </label>

      <label class="jlc-sm-style-field">
        <span>Icon Mobile Size</span>
        <input
          type="number"
          min="12"
          max="100"
          name="<?php echo esc_attr(JLC_SM_OPTION_NAME); ?>[icon_size_mobile]"
          value="<?php echo esc_attr($settings['icon_size_mobile']); ?>">
      </label>

      <label class="jlc-sm-style-field">
        <span>Icon Gap</span>
        <input
          type="number"
          min="0"
          max="120"
          name="<?php echo esc_attr(JLC_SM_OPTION_NAME); ?>[icon_gap]"
          value="<?php echo esc_attr($settings['icon_gap']); ?>">
      </label>
    </div>
  </div>

  <div class="jlc-sm-content-group">
    <h3>Countdown Styles</h3>

    <div class="jlc-sm-style-grid">
      <label class="jlc-sm-style-field">
        <span>Card Background</span>
        <input
          type="color"
          name="<?php echo esc_attr(JLC_SM_OPTION_NAME); ?>[countdown_card_background]"
          value="<?php echo esc_attr($settings['countdown_card_background']); ?>">
      </label>

      <label class="jlc-sm-style-field">
        <span>Card Opacity</span>
        <input
          type="number"
          min="0"
          max="1"
          step="0.01"
          name="<?php echo esc_attr(JLC_SM_OPTION_NAME); ?>[countdown_card_opacity]"
          value="<?php echo esc_attr($settings['countdown_card_opacity']); ?>">
      </label>

      <label class="jlc-sm-style-field">
        <span>Card Radius</span>
        <input
          type="number"
          min="0"
          max="80"
          name="<?php echo esc_attr(JLC_SM_OPTION_NAME); ?>[countdown_card_radius]"
          value="<?php echo esc_attr($settings['countdown_card_radius']); ?>">
      </label>

      <label class="jlc-sm-style-field">
        <span>Card Desktop Width</span>
        <input
          type="number"
          min="80"
          max="320"
          name="<?php echo esc_attr(JLC_SM_OPTION_NAME); ?>[countdown_card_width_desktop]"
          value="<?php echo esc_attr($settings['countdown_card_width_desktop']); ?>">
      </label>

      <label class="jlc-sm-style-field">
        <span>Card Desktop Height</span>
        <input
          type="number"
          min="80"
          max="320"
          name="<?php echo esc_attr(JLC_SM_OPTION_NAME); ?>[countdown_card_height_desktop]"
          value="<?php echo esc_attr($settings['countdown_card_height_desktop']); ?>">
      </label>

      <label class="jlc-sm-style-field">
        <span>Card Mobile Height</span>
        <input
          type="number"
          min="70"
          max="220"
          name="<?php echo esc_attr(JLC_SM_OPTION_NAME); ?>[countdown_card_height_mobile]"
          value="<?php echo esc_attr($settings['countdown_card_height_mobile']); ?>">
      </label>

      <label class="jlc-sm-style-field">
        <span>Countdown Gap</span>
        <input
          type="number"
          min="0"
          max="120"
          name="<?php echo esc_attr(JLC_SM_OPTION_NAME); ?>[countdown_gap]"
          value="<?php echo esc_attr($settings['countdown_gap']); ?>">
      </label>

      <label class="jlc-sm-style-field">
        <span>Number Color</span>
        <input
          type="color"
          name="<?php echo esc_attr(JLC_SM_OPTION_NAME); ?>[countdown_number_color]"
          value="<?php echo esc_attr($settings['countdown_number_color']); ?>">
      </label>

      <label class="jlc-sm-style-field">
        <span>Number Desktop Size</span>
        <input
          type="number"
          min="14"
          max="140"
          name="<?php echo esc_attr(JLC_SM_OPTION_NAME); ?>[countdown_number_size_desktop]"
          value="<?php echo esc_attr($settings['countdown_number_size_desktop']); ?>">
      </label>

      <label class="jlc-sm-style-field">
        <span>Number Mobile Size</span>
        <input
          type="number"
          min="14"
          max="100"
          name="<?php echo esc_attr(JLC_SM_OPTION_NAME); ?>[countdown_number_size_mobile]"
          value="<?php echo esc_attr($settings['countdown_number_size_mobile']); ?>">
      </label>

      <label class="jlc-sm-style-field">
        <span>Number Weight</span>
        <select name="<?php echo esc_attr(JLC_SM_OPTION_NAME); ?>[countdown_number_weight]">
          <?php foreach ($font_weights as $value => $label) : ?>
            <option value="<?php echo esc_attr($value); ?>" <?php selected($settings['countdown_number_weight'], $value); ?>>
              <?php echo esc_html($label); ?>
            </option>
          <?php endforeach; ?>
        </select>
      </label>

      <label class="jlc-sm-style-field">
        <span>Label Color</span>
        <input
          type="color"
          name="<?php echo esc_attr(JLC_SM_OPTION_NAME); ?>[countdown_label_color]"
          value="<?php echo esc_attr($settings['countdown_label_color']); ?>">
      </label>

      <label class="jlc-sm-style-field">
        <span>Label Desktop Size</span>
        <input
          type="number"
          min="10"
          max="60"
          name="<?php echo esc_attr(JLC_SM_OPTION_NAME); ?>[countdown_label_size_desktop]"
          value="<?php echo esc_attr($settings['countdown_label_size_desktop']); ?>">
      </label>

      <label class="jlc-sm-style-field">
        <span>Label Mobile Size</span>
        <input
          type="number"
          min="10"
          max="50"
          name="<?php echo esc_attr(JLC_SM_OPTION_NAME); ?>[countdown_label_size_mobile]"
          value="<?php echo esc_attr($settings['countdown_label_size_mobile']); ?>">
      </label>

      <label class="jlc-sm-style-field">
        <span>Label Weight</span>
        <select name="<?php echo esc_attr(JLC_SM_OPTION_NAME); ?>[countdown_label_weight]">
          <?php foreach ($font_weights as $value => $label) : ?>
            <option value="<?php echo esc_attr($value); ?>" <?php selected($settings['countdown_label_weight'], $value); ?>>
              <?php echo esc_html($label); ?>
            </option>
          <?php endforeach; ?>
        </select>
      </label>
    </div>
  </div>

  <div class="jlc-sm-content-group">
    <h3>Footer Styles</h3>

    <div class="jlc-sm-style-grid">
      <label class="jlc-sm-style-field">
        <span>Footer Color</span>
        <input
          type="color"
          name="<?php echo esc_attr(JLC_SM_OPTION_NAME); ?>[footer_color]"
          value="<?php echo esc_attr($settings['footer_color']); ?>">
      </label>

      <label class="jlc-sm-style-field">
        <span>Footer Desktop Size</span>
        <input
          type="number"
          min="10"
          max="60"
          name="<?php echo esc_attr(JLC_SM_OPTION_NAME); ?>[footer_size_desktop]"
          value="<?php echo esc_attr($settings['footer_size_desktop']); ?>">
      </label>

      <label class="jlc-sm-style-field">
        <span>Footer Mobile Size</span>
        <input
          type="number"
          min="10"
          max="40"
          name="<?php echo esc_attr(JLC_SM_OPTION_NAME); ?>[footer_size_mobile]"
          value="<?php echo esc_attr($settings['footer_size_mobile']); ?>">
      </label>
    </div>
  </div>
</section>
<?php
if (!defined('ABSPATH')) {
  exit;
}
?>

<!-- CONTENT -->
<section
  id="jlc-sm-content"
  class="jlc-sm-admin-section jlc-sm-admin-section-content"
  <?php echo !$is_content_tab ? 'style="display:none;"' : ''; ?>>

  <div class="jlc-sm-section-header">
    <h2>Content</h2>
    <p>Contenido visual y textos de la página de mantenimiento.</p>
  </div>

  <table class="form-table" role="presentation">

    <!-- HEADING -->
    <tr>
      <th scope="row">
        <label for="jlc-sm-heading">
          Heading
        </label>
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

    <!-- SUBHEADING -->
    <tr>
      <th scope="row">
        <label for="jlc-sm-subheading">
          Subheading
        </label>
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

    <!-- MESSAGE -->
    <tr>
      <th scope="row">
        <label for="jlc-sm-message">
          Message
        </label>
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

    <!-- DEADLINE -->
    <tr>
      <th scope="row">
        <label for="jlc-sm-deadline">
          Deadline
        </label>
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

    <!-- DESKTOP IMAGE -->
    <tr>
      <th scope="row">
        Desktop Image
      </th>

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

    <!-- MOBILE IMAGE -->
    <tr>
      <th scope="row">
        Mobile Image
      </th>

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

    <!-- INSTAGRAM -->
    <tr>
      <th scope="row">
        <label for="jlc-sm-instagram">
          Instagram URL
        </label>
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

    <!-- EMAIL -->
    <tr>
      <th scope="row">
        <label for="jlc-sm-email">
          Email
        </label>
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

    <!-- WHATSAPP -->
    <tr>
      <th scope="row">
        <label for="jlc-sm-whatsapp">
          WhatsApp URL
        </label>
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

    <!-- FOOTER TEXT -->
    <tr>
      <th scope="row">
        <label for="jlc-sm-footer-text">
          Footer Text
        </label>
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

    <!-- FOOTER LINK TEXT -->
    <tr>
      <th scope="row">
        <label for="jlc-sm-footer-link-text">
          Footer Link Text
        </label>
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

    <!-- FOOTER LINK URL -->
    <tr>
      <th scope="row">
        <label for="jlc-sm-footer-link-url">
          Footer Link URL
        </label>
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
</section>
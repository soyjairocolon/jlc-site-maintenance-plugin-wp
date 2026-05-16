<?php
if (!defined('ABSPATH')) {
  exit;
}
?>

<!-- CUSTOM CSS -->
<section
  id="jlc-sm-custom-css"
  class="jlc-sm-admin-section jlc-sm-admin-section-custom-css"
  <?php echo !$is_custom_css_tab ? 'style="display:none;"' : ''; ?>>

  <div class="jlc-sm-section-header">
    <h2>Custom CSS</h2>
    <p>CSS adicional cargado únicamente en maintenance mode.</p>
  </div>

  <textarea
    name="<?php echo esc_attr(JLC_SM_OPTION_NAME); ?>[custom_css]"
    rows="18"
    class="large-text code jlc-sm-custom-css-field"
    placeholder=".jlc-sm-page { }"><?php echo esc_textarea($settings['custom_css']); ?></textarea>
</section>
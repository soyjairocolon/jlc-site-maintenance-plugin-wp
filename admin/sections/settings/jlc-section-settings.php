<?php
if (!defined('ABSPATH')) {
  exit;
}
?>
<section
  id="jlc-sm-settings"
  class="jlc-sm-admin-section jlc-sm-admin-section-settings"
  <?php echo !$is_settings_tab ? 'style="display:none;"' : ''; ?>>

  <div class="jlc-sm-section-header">
    <h2>Settings</h2>
    <p>Configuración general del modo mantenimiento.</p>
  </div>

  <table class="form-table" role="presentation">
    <tr>
      <th scope="row">
        Maintenance Mode
      </th>

      <td>
        <label class="jlc-sm-checkbox-wrapper">
          <input
            type="checkbox"
            name="<?php echo esc_attr(JLC_SM_OPTION_NAME); ?>[enabled]"
            value="1"
            <?php checked($settings['enabled'], '1'); ?>>

          <span>
            Activar modo mantenimiento
          </span>
        </label>

        <p class="description">
          Los administradores seguirán viendo el sitio normalmente.
        </p>
      </td>
    </tr>
  </table>
</section>
Con esto ya quedó modularizado el PHP correctamente y sin romper la lógica actual.

El siguiente paso ya sería limpiar y modularizar el CSS del admin:

jlc-admin-base.css
jlc-admin-tabs.css
sections/settings/jlc-admin-settings.css
sections/content/jlc-admin-content.css
sections/custom-css/jlc-admin-custom-css.css

Y luego actualizar el enqueue para cargar todos esos archivos separados.
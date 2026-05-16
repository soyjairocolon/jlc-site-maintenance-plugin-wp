Perfecto. Para hacerlo bien y no romper nada, lo dividimos en una nueva sección o sub-bloque dentro de Content llamado Style Settings. Así todo lo visual queda administrable desde el mismo módulo.

Orden correcto:

1. jlc-site-maintenance.php

Aquí agregamos todos los nuevos settings y sanitización:

overlay color
overlay opacity
heading color / size / weight
subheading color / size
message color / size
icon color / size / gap
contador card background
contador card opacity
contador border radius
contador gap
contador number color / size / weight
contador label color / size / weight
textos contador: Días, Horas, Minutos, Segundos
2. admin/sections/content/jlc-section-content.php

Aquí agregamos los campos nuevos en el admin, dentro de Content:

bloque de textos
bloque de imágenes
bloque de redes
bloque de estilos
bloque de contador
3. templates/jlc-maintenance-page.php

Aquí conectamos esos settings al frontend:

variables CSS inline en <main>
textos dinámicos del contador
tamaños/colores dinámicos
overlay dinámico
4. assets/css/jlc-maintenance.css

Aquí ajustamos el CSS para que use variables CSS dinámicas en vez de valores fijos.

Ejemplo:

color: var(--jlc-sm-heading-color);
font-size: var(--jlc-sm-heading-size);
5. admin/sections/content/jlc-admin-content.css

Aquí solo mejoramos la UI de esos nuevos campos:

grupos visuales
grids
inputs color
inputs numéricos
separadores
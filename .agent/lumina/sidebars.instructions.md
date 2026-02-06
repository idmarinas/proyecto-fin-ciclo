# SIDE BARS DE LÚMINA

*(Documento técnico de los sidebars del foro y del área comercial)*

Este documento describe los dos sidebars principales utilizados en Lúmina:

1. El **sidebar del foro**, orientado a navegación, soporte y contenido.
2. El **sidebar comercial**, orientado a información, servicios y conversión.

Ambos sidebars son modulares, personalizables y construidos con `<Ui:Card>` y TailwindCSS.

---

# 🟦 1. Sidebar del foro

El sidebar del foro está diseñado para acompañar la navegación dentro de subforos, hilos y páginas relacionadas.  
Su objetivo es ofrecer accesos rápidos, contexto y herramientas útiles para los usuarios.

Este sidebar puede incluir cualquiera de los siguientes bloques, en cualquier orden.

---

## 🟦 1.1. Buscador

Permite buscar hilos, usuarios o contenido dentro del foro.

<code>
&lt;twig:Ui:Card class="p-4 border bg-white rounded-xl space-y-3"&gt;
    &lt;h3 class="text-lg font-semibold text-gray-800"&gt;Buscar&lt;/h3&gt;
    &lt;input type="text" placeholder="Buscar en el foro..." class="w-full border rounded-lg p-2"&gt;
&lt;/twig:Ui:Card&gt;
</code>

---

## 🟦 1.2. Información del subforo

Muestra datos del subforo actual: descripción, estadísticas y enlaces.

Incluye:

- Nombre
- Descripción
- Hilos totales
- Mensajes totales
- Última actividad

---

## 🟦 1.3. Estadísticas del foro

Bloque con datos globales:

- Usuarios online
- Usuarios registrados
- Hilos totales
- Mensajes totales

---

## 🟦 1.4. Hilos recientes

Lista de los hilos más recientes del foro o subforo.

---

## 🟦 1.5. Hilos populares

Lista de hilos con más actividad o respuestas.

---

## 🟦 1.6. Categorías / Subforos

Lista de categorías principales o subforos relacionados.

---

## 🟦 1.7. Etiquetas populares

Nube de etiquetas o lista de tags más utilizados.

---

## 🟦 1.8. Ayuda rápida

Bloque informativo que enlaza a documentación, guías o artículos útiles.

---

## 🟦 1.9. Contacto directo

Bloque destacado para contactar con soporte, especialmente útil para incidencias críticas.

---

## 🟦 1.10. Información del usuario

Incluye:

- Nombre del usuario
- Enlaces a perfil, hilos, notificaciones, ajustes

---

## 🟦 1.11. Reglas del foro

Lista de normas básicas y enlace a la versión completa.

---

## 🟦 1.12. Novedades / Anuncios

Bloque para comunicar actualizaciones, cambios o noticias importantes.

---

## 🟦 1.13. Top usuarios

Ranking de usuarios más activos o con más puntos.

---

## 🟦 1.14. Mantenimientos programados

Lista de mantenimientos próximos o en curso.

---

## 🟦 1.15. Encuesta rápida

Pequeña encuesta interactiva para recoger feedback.

---

## 🟦 1.16. Frase del día

Bloque motivacional o informativo.

---

# 🟦 2. Sidebar comercial de Lúmina

Este sidebar está orientado a:

- Mostrar servicios
- Destacar novedades
- Promocionar upgrades
- Informar sobre el estado de los servicios
- Enlazar a documentación
- Mostrar testimonios
- Ofrecer recursos útiles

Es ideal para páginas generales, dashboard o áreas de soporte.

---

## 🟦 2.1. Servicios principales

Lista de los servicios de Lúmina:

- Facturación electrónica
- Gestión de servicios
- Panel de control
- Integraciones API
- Soporte técnico
- Automatización

---

## 🟦 2.2. Anuncio destacado

Bloque para destacar una novedad importante o lanzamiento.

---

## 🟦 2.3. Promoción / Upgrade

Bloque para invitar al usuario a mejorar su plan o contratar servicios adicionales.

---

## 🟦 2.4. Estado de los servicios

Indicadores visuales del estado actual:

- 🟢 Operativo
- 🟡 Degradado
- 🔴 Caído
- 🔵 Mantenimiento

---

## 🟦 2.5. Mantenimiento programado

Información sobre mantenimientos próximos.

---

## 🟦 2.6. Consejos / Tips

Pequeños consejos de uso o recomendaciones.

---

## 🟦 2.7. Integraciones destacadas

Lista de integraciones populares:

- Shopify
- WooCommerce
- Stripe
- Zapier

---

## 🟦 2.8. Testimonios

Opiniones de clientes o casos de éxito.

---

## 🟦 2.9. Recursos útiles

Enlaces a:

- Documentación
- API
- Tutoriales
- FAQ

---

## 🟦 2.10. Seguridad

Bloque para recordar activar 2FA o revisar ajustes de seguridad.

---

## 🟦 2.11. Blog de Lúmina

Lista de artículos recientes.

---

## 🟦 2.12. CTA comercial

Bloque final para invitar a contratar Lúmina.

---

# 🟦 3. Relación con otros archivos

Este archivo forma parte de la documentación general de Lúmina.

Archivos relacionados:

- `contexto-lumina.md`
- `lumina-informacion.md`
- `lumina-servicios.md`
- `foro-estructura.md`
- `componentes-ui.md`  

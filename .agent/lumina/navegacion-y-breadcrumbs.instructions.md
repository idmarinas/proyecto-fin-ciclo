# NAVEGACIÓN Y BREADCRUMBS EN LÚMINA

*(Documento técnico sobre rutas, jerarquía y navegación visual)*

Este documento describe cómo funciona la navegación dentro de Lúmina, con especial atención a los breadcrumbs, rutas del foro y patrones de navegación coherentes.

---

# 🟦 1. Filosofía de navegación

La navegación en Lúmina se basa en:

### ✔ Jerarquía clara

El usuario debe saber siempre dónde está y cómo volver atrás.

### ✔ Coherencia

Las rutas siguen patrones predecibles y consistentes.

### ✔ Simplicidad

Evitar rutas profundas o confusas.

### ✔ Contexto

Los breadcrumbs muestran la posición exacta dentro del foro o la plataforma.

---

# 🟦 2. Tipos de navegación

Lúmina utiliza tres tipos principales de navegación:

## 2.1. Navegación principal (global)

Incluye:

- Inicio
- Panel de control
- Servicios
- Facturación
- Foro
- Documentación
- Perfil

Se muestra en el header principal.

---

## 2.2. Navegación contextual

Depende de la página actual.

Ejemplos:

- En un subforo → botón “Crear hilo”
- En un hilo → acciones del hilo
- En servicios → accesos rápidos a configuraciones

---

## 2.3. Navegación jerárquica (breadcrumbs)

Es la más importante dentro del foro.

---

# 🟦 3. Breadcrumbs

Los breadcrumbs muestran la ruta completa desde el índice del foro hasta el hilo actual.

Ejemplo típico:

<code>
Foros › Desarrollo y Tecnología › Symfony › Error en controlador
</code>

---

# 🟦 4. Estructura de breadcrumbs

Los breadcrumbs siguen esta estructura:

<code>
Inicio (opcional)
› Foros
› Foro principal
› Subforo
› Hilo
</code>

### ✔ 4.1. Inicio

Opcional, según la página.

### ✔ 4.2. Foros

Siempre presente en páginas del foro.

### ✔ 4.3. Foro principal

Categoría general (ej. “Desarrollo y Tecnología”).

### ✔ 4.4. Subforo

Tema específico (ej. “Symfony”).

### ✔ 4.5. Hilo

Título del hilo actual.

---

# 🟦 5. Componente de breadcrumbs

El componente se encuentra en:

<code>
templates/components/App/Breadcrumb.html.twig
</code>

Ejemplo genérico (Twig UX Component):

<code>
&lt;twig:App:Breadcrumb 
    :forum="forum"
    :subforum="subforum"
    :thread="thread"
/&gt;
</code>

---

# 🟦 6. Reglas de diseño

- El diseño está centralizado en el componente `App:Breadcrumb` y sus subcomponentes.
- Usa tokens como `text-muted-foreground` y `text-foreground`.
- Espaciado inferior integrado o ajustable.
- El componente se encarga de determinar automáticamente el último elemento para no renderizar enlace.

---

# 🟦 7. Integración con el foro

Los breadcrumbs se incluyen en:

- `forum/index.html.twig`
- `forum/subforum.html.twig`
- `forum/thread.html.twig`

---

# 🟦 8. Relación con otros archivos

- `estructura-plantillas.md`
- `foro-estructura.md`
- `componentes-ui.md`  

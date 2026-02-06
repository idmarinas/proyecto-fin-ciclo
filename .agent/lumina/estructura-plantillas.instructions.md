# ESTRUCTURA DE PLANTILLAS DE LÚMINA

*(Documento técnico sobre la organización de vistas y plantillas Twig)*

Este documento describe cómo se estructuran las plantillas de Lúmina, los patrones de organización, los componentes reutilizables y las convenciones de diseño.  
Sirve como referencia para desarrollo, mantenimiento y ampliación del sistema.

---

# 🟦 1. Filosofía de la arquitectura de plantillas

Las plantillas de Lúmina siguen estos principios:

### ✔ Modularidad

Cada parte de la interfaz está dividida en bloques reutilizables.

### ✔ Claridad

Las plantillas están organizadas por función, no por tamaño del archivo.

### ✔ Reutilización

Los componentes UI se reutilizan mediante `<Ui:Card>`, `<ux:icon>` y bloques Twig.

### ✔ Separación de responsabilidades

La lógica mínima se mantiene en Twig; la lógica compleja vive en controladores o servicios.

---

# 🟦 2. Estructura general de carpetas

La estructura recomendada para las plantillas es:

<code>
templates/
│
├── base/
│   ├── layout.html.twig
│   ├── header.html.twig
│   ├── footer.html.twig
│   └── navigation.html.twig
│
├── components/
│   ├── ui/
│   │   ├── card.html.twig
│   │   ├── badge.html.twig
│   │   ├── button.html.twig
│   │   └── alert.html.twig
│   └── forum/
│       ├── thread-item.html.twig
│       ├── reply-item.html.twig
│       ├── thread-status.html.twig
│       └── breadcrumbs.html.twig
│
├── forum/
│   ├── index.html.twig
│   ├── subforum.html.twig
│   ├── thread.html.twig
│   ├── create-thread.html.twig
│   └── sidebar.html.twig
│
├── commercial/
│   ├── sidebar-commercial.html.twig
│   └── services.html.twig
│
└── errors/
    ├── 404.html.twig
    ├── 500.html.twig
    └── maintenance.html.twig
</code>

---

# 🟦 3. Plantilla base

La plantilla base define:

- HTML general
- Header
- Footer
- Navegación
- Contenedor principal
- Inclusión de sidebars

Ejemplo conceptual:

<code>
&lt;!DOCTYPE html&gt;
&lt;html&gt;
&lt;body&gt;

    {% include 'base/header.html.twig' %}

    &lt;main class="container mx-auto flex gap-8"&gt;
        &lt;section class="flex-1"&gt;
            {% block content %}{% endblock %}
        &lt;/section&gt;

        &lt;aside class="w-80"&gt;
            {% block sidebar %}{% endblock %}
        &lt;/aside&gt;
    &lt;/main&gt;

    {% include 'base/footer.html.twig' %}

&lt;/body&gt;
&lt;/html&gt;
</code>

---

# 🟦 4. Plantillas del foro

## 4.1. `forum/index.html.twig`

Lista de foros principales.

## 4.2. `forum/subforum.html.twig`

Muestra:

- Imagen del subforo
- Descripción
- Lista de hilos
- Botón “Crear hilo”
- Sidebar contextual

## 4.3. `forum/thread.html.twig`

Incluye:

- Cabecera del hilo
- Estado visual
- Contenido
- Respuestas
- Acciones del hilo
- Sidebar contextual

## 4.4. `forum/create-thread.html.twig`

Formulario con:

- Título
- Contenido
- Tipo de ayuda
- Tipo de hilo

---

# 🟦 5. Componentes del foro

## 5.1. `thread-item.html.twig`

Representa un hilo en una lista.

Incluye:

- Título
- Estado
- Tipo de ayuda
- Autor
- Fecha

## 5.2. `reply-item.html.twig`

Representa una respuesta dentro de un hilo.

## 5.3. `thread-status.html.twig`

Bloques visuales para:

- Resuelto
- En progreso
- Sin respuestas
- Cerrado

## 5.4. `breadcrumbs.html.twig`

Ruta jerárquica:

<code>
Foros › Subforo › Hilo
</code>

---

# 🟦 6. Sidebars

Los sidebars se documentan en detalle en `sidebars.md`, pero aquí se define su estructura:

## 6.1. `forum/sidebar.html.twig`

Incluye bloques como:

- Buscador
- Info del subforo
- Hilos recientes
- Categorías
- Reglas
- Estadísticas

## 6.2. `commercial/sidebar-commercial.html.twig`

Incluye:

- Servicios
- Promociones
- Estado de servicios
- Integraciones
- Testimonios
- CTA comercial

---

# 🟦 7. Componentes UI

Los componentes UI se documentan en `componentes-ui.md`, pero aquí se listan:

- `<Ui:Card>`
- `<ux:icon>`
- Botones
- Badges
- Formularios
- Listas de hilos
- Bloques de estado

---

# 🟦 8. Convenciones de Twig

### ✔ Bloques principales

- `block content`
- `block sidebar`
- `block title`

### ✔ Variables comunes

- `user`
- `subforum`
- `thread`
- `recent_threads`
- `popular_threads`

### ✔ Reglas

- No mezclar lógica compleja en Twig
- Mantener plantillas pequeñas
- Reutilizar componentes siempre que sea posible

---

# 🟦 9. Relación con otros archivos

Este archivo forma parte de la documentación general de Lúmina.

Archivos relacionados:

- `contexto-lumina.md`
- `lumina-informacion.md`
- `lumina-servicios.md`
- `foro-estructura.md`
- `componentes-ui.md`
- `sidebars.md`  

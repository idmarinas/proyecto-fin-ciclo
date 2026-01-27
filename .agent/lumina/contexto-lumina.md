# LÚMINA — CONTEXTO PARA COPILOT

*(Archivo de contexto persistente para nuevos chats)*

## 🟦 Descripción general del proyecto

Lúmina es una plataforma que ofrece servicios digitales orientados a la gestión de negocios, facturación, soporte técnico, automatización y administración de servicios. Incluye un foro avanzado donde los usuarios pueden crear hilos, reportar incidencias, resolver dudas y comunicarse con soporte.

El objetivo del proyecto es construir una experiencia profesional, modular, clara y escalable, con una interfaz moderna basada en TailwindCSS, Twig, componentes `<Ui:Card>` y `<ux:icon>`, y una arquitectura limpia.

---

## 🟦 Estructura del foro

El foro está compuesto por:

- **Subforos**: cada uno con nombre, descripción, imagen, estadísticas y breadcrumbs.
- **Hilos**: cada hilo pertenece a un subforo y tiene:
    - Título
    - Contenido
    - Tipo de ayuda
    - Tipo de hilo (público o privado)
    - Estado del hilo
    - Autor
    - Fecha de creación
    - Respuestas
- **Respuestas**: mensajes dentro de un hilo.
- **Sidebars**: uno para el foro y otro comercial/informativo.

---

## 🟦 Estados del hilo

Los hilos pueden tener uno de estos estados:

- **Resuelto**
- **En progreso**
- **Sin respuestas**
- **Cerrado**

Cada estado se muestra con un bloque visual grande, icono y color distintivo.

---

## 🟦 Tipos de ayuda disponibles

Los hilos incluyen un campo obligatorio “Tipo de ayuda”, con estas opciones:

1. Problemas con facturación
2. Consulta sobre facturación
3. Incidencia en el servicio (no afecta a la actividad del negocio)
4. Incidencia crítica en el servicio (afecta a la actividad del negocio)
5. Otro motivo

---

## 🟦 Tipos de hilo

- **Público**
- **Privado** (solo si el usuario tiene permisos para crearlos)

---

## 🟦 Formularios

### Formulario de creación de hilos

Incluye:

- Título
- Contenido
- Tipo de ayuda
- Tipo de hilo (según permisos)

El tipo de usuario NO se elige: es automático.

---

## 🟦 Sidebars

### Sidebar del foro (completo)

Incluye bloques como:

- Buscador
- Información del subforo
- Estadísticas
- Hilos recientes
- Hilos populares
- Categorías
- Etiquetas
- Ayuda rápida
- Contacto directo
- Información del usuario
- Reglas
- Novedades
- Top usuarios
- Mantenimientos
- Encuestas
- Frase del día

### Sidebar comercial de Lúmina

Incluye:

- Servicios principales
- Anuncio destacado
- Promociones
- Estado de servicios
- Mantenimientos
- Consejos
- Integraciones
- Testimonios
- Recursos útiles
- Seguridad
- Blog
- CTA comercial

---

## 🟦 Servicios principales de Lúmina

Los servicios principales (cada uno con descripción ampliada en otro archivo) son:

- Facturación electrónica
- Gestión de servicios
- Panel de control
- Integraciones API
- Soporte técnico
- Automatización

---

## 🟦 Estilo y diseño

- TailwindCSS
- Twig
- Componentes `<Ui:Card>`
- Iconos `<ux:icon>`
- Diseño modular, limpio y profesional
- Jerarquía visual clara
- Bloques reutilizables

---

## 🟦 Objetivo del proyecto

Construir un sistema completo, modular y escalable que represente:

- Claridad
- Profesionalidad
- Coherencia visual
- Facilidad de mantenimiento
- Extensibilidad futura

---

## 🟦 Información sobre Iván (para personalización)

- Arquitecto del sistema
- Le gusta la modularidad, claridad y mantenibilidad
- Trabaja con Symfony, PHP, JS, Tailwind, Stimulus, Turbo
- Está construyendo un foro y un agente local
- Prefiere respuestas estructuradas, técnicas y bien pensadas
- Le gusta iterar y mejorar cada parte del sistema

---

## 🟦 Cómo debe responder Copilot en este proyecto

- Mantener coherencia con el diseño de Lúmina
- Proponer mejoras cuando sean útiles
- Ser explícito, modular y detallado
- Evitar ambigüedades
- Mantener un tono profesional y colaborativo
- Recordar siempre el contexto del foro y los servicios
- No repetir información innecesariamente
- Ser capaz de continuar el proyecto desde cualquier punto

---

## 🟦 Finalidad de este archivo

Este archivo sirve como **contexto persistente** para que Copilot pueda:

- Continuar el proyecto en nuevos chats
- Recordar la estructura del foro
- Recordar los estados del hilo
- Recordar los tipos de ayuda
- Recordar los sidebars
- Recordar el estilo visual
- Recordar los servicios de Lúmina
- Mantener coherencia en futuras respuestas

Este archivo debe ser cargado o pegado al inicio de cualquier nuevo chat para que Copilot tenga el contexto completo del proyecto.

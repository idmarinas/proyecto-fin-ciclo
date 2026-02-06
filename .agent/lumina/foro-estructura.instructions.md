# FORO DE LÚMINA — ESTRUCTURA Y FUNCIONAMIENTO

*(Documento técnico y funcional del sistema de foros)*

Este documento describe la estructura completa del foro de Lúmina, sus componentes, estados, flujos y elementos visuales.  
Sirve como referencia para desarrollo, diseño, soporte y documentación interna.

---

# 🟦 1. Objetivo del foro

El foro de Lúmina está diseñado para:

- Resolver dudas de usuarios
- Reportar incidencias
- Ofrecer soporte técnico
- Mantener un historial público de soluciones
- Facilitar la comunicación entre usuarios y el equipo de soporte
- Clasificar problemas según su impacto en el negocio

El foro es una parte esencial del ecosistema de Lúmina y está integrado con otros módulos como la gestión de servicios, el soporte técnico y la documentación.

---

# 🟦 2. Estructura general del foro

El foro se compone de:

## ✔ **Foros principales**

Agrupan subforos por temática general.  
Ejemplos:

- Desarrollo y Tecnología
- Facturación
- Servicios
- Consultas generales

## ✔ **Subforos**

Cada subforo contiene hilos relacionados con un tema específico.  
Incluye:

- Nombre
- Descripción
- Imagen
- Estadísticas (hilos, mensajes, actividad)
- Breadcrumbs
- Sidebar contextual

## ✔ **Hilos**

Cada hilo representa una conversación o incidencia.  
Incluye:

- Título
- Contenido
- Tipo de ayuda
- Tipo de hilo (público/privado)
- Estado del hilo
- Autor
- Fecha de creación
- Respuestas
- Acciones (seguir, compartir, reportar, marcar como resuelto)

## ✔ **Respuestas**

Mensajes dentro de un hilo.  
Incluyen:

- Autor
- Contenido
- Fecha
- Acciones (editar, eliminar, reportar)

---

# 🟦 3. Estados del hilo

Los hilos pueden tener uno de estos estados:

### 🟢 **Resuelto**

El problema ha sido solucionado.  
Se muestra un bloque verde con icono grande y mensaje claro.

### 🟡 **En progreso**

El hilo está activo y recibiendo respuestas.  
Bloque amarillo con icono de actividad.

### 🔴 **Sin respuestas**

El hilo no tiene respuestas.  
Bloque rojo invitando a participar.

### 🔒 **Cerrado**

El hilo está bloqueado.  
No se permite responder.  
Se muestra un bloque gris con icono de candado.

---

# 🟦 4. Tipos de ayuda

Cada hilo debe clasificarse según el tipo de ayuda que el usuario necesita:

1. **Problemas con facturación**
2. **Consulta sobre facturación**
3. **Incidencia en el servicio (no afecta a la actividad del negocio)**
4. **Incidencia crítica en el servicio (afecta a la actividad del negocio)**
5. **Otro motivo**

Esta clasificación permite:

- Priorizar incidencias
- Filtrar hilos
- Mostrar badges visuales
- Automatizar flujos de soporte

---

# 🟦 5. Tipos de hilo

Los hilos pueden ser:

### ✔ Público

Visible para todos los usuarios.

### ✔ Privado

Visible solo para el autor y el equipo de soporte.  
Solo disponible si el usuario tiene permisos.

---

# 🟦 6. Formularios del foro

## ✔ Formulario de creación de hilos

Incluye:

- Título
- Contenido
- Tipo de ayuda (select)
- Tipo de hilo (público/privado según permisos)

El tipo de usuario NO se elige: es automático.

## ✔ Formulario de respuesta

Incluye:

- Editor de texto
- Botón de enviar
- Opciones de adjuntar archivos (si se implementa)

---

# 🟦 7. Sidebars del foro

El foro utiliza un sidebar modular que puede incluir:

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

El sidebar comercial se documenta en `sidebars.md`.

---

# 🟦 8. Breadcrumbs

Los breadcrumbs siguen esta estructura:

Son esenciales para la navegación y la jerarquía visual.

---

# 🟦 9. Acciones disponibles en un hilo

- Responder
- Seguir hilo
- Compartir
- Reportar
- Marcar como resuelto
- Cerrar (solo moderadores)
- Editar (autor o moderador)
- Eliminar (autor o moderador)

---

# 🟦 10. Visualización del hilo

La página del hilo incluye:

- Cabecera con título y estado
- Información del autor
- Tipo de ayuda (badge)
- Contenido del hilo
- Respuestas
- Sidebar contextual
- Acciones rápidas
- Bloques de estado (resuelto, cerrado, etc.)

---

# 🟦 11. Visualización del subforo

La página del subforo incluye:

- Imagen destacada
- Título
- Descripción
- Estadísticas
- Botón “Crear hilo”
- Lista de hilos con badges de estado y tipo de ayuda
- Sidebar contextual

---

# 🟦 12. Visualización del índice del foro

Incluye:

- Lista de foros principales
- Subforos destacados
- Estadísticas globales
- Acceso rápido a categorías
- Sidebar general

---

# 🟦 13. Integración con otros módulos

El foro se integra con:

- **Gestión de servicios** → incidencias automáticas
- **Soporte técnico** → contacto directo
- **Documentación** → enlaces contextuales
- **Panel de control** → actividad reciente
- **Automatización** → flujos basados en eventos

---

# 🟦 14. Relación con otros archivos

Este archivo forma parte de la documentación general de Lúmina.

Archivos relacionados:

- `contexto-lumina.md`
- `lumina-informacion.md`
- `lumina-servicios.md`
- `componentes-ui.md`
- `sidebars.md`  

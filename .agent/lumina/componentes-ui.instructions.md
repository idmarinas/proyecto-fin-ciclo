# COMPONENTES UI DE LÚMINA

*(Documento técnico de los elementos visuales y patrones de interfaz)*

Este documento describe los componentes visuales utilizados en Lúmina, su estructura, estilo, comportamiento y propósito.  
Sirve como referencia para desarrollo, diseño y mantenimiento del sistema.

---

## 🟦 1. Filosofía de diseño

Los componentes UI de Lúmina siguen estos principios:

### ✔ Claridad

Interfaz limpia, jerarquía visual clara, textos legibles y bloques bien definidos.

### ✔ Modularidad

Cada componente es independiente, reutilizable y fácil de extender.

### ✔ Consistencia

Todos los elementos comparten estilos, espaciados, tipografías y patrones comunes.

### ✔ Accesibilidad

Contrastes adecuados, tamaños legibles, navegación intuitiva.

### ✔ Profesionalidad

Estética moderna, colores equilibrados, iconografía clara.

---

## 🟦 2. Tecnologías utilizadas

Los componentes están construidos con:

- TailwindCSS
- Twig
- Componentes personalizados:
    - `<Ui:Card>`
    - `<ux:icon>`
- Estructura semántica HTML
- Clases utilitarias para espaciado, color y tipografía

---

## 🟦 3. Componentes principales

A continuación se describen los componentes más utilizados en Lúmina.

---

### 3.1. `<Ui:Card>`

El componente base para contenedores visuales.

**Propósito:**

- Agrupar contenido
- Crear bloques visuales
- Mantener consistencia en el diseño

**Características:**

- Bordes redondeados
- Sombra ligera opcional
- Fondo blanco o temático
- Padding interno configurable

**Ejemplo de uso:**

<code>
&lt;twig:Ui:Card class="p-6 border bg-white rounded-xl"&gt;
    Contenido del bloque
&lt;/twig:Ui:Card&gt;
</code>

---

### 3.2. `<ux:icon>`

Componente para iconografía.

**Propósito:**

- Representar acciones
- Mostrar estados
- Aportar claridad visual

**Características:**

- Tamaño configurable
- Color configurable
- Compatible con Heroicons y otros sets

**Ejemplo:**

<code>
&lt;ux:icon name="check-circle" class="w-6 h-6 text-green-600" /&gt;
</code>

---

### 3.3. Botones

Los botones siguen un patrón consistente.

**Tipos principales:**

- Primario (azul)
- Secundario (gris)
- Peligro (rojo)
- Éxito (verde)

**Ejemplo:**

<code>
&lt;button class="px-4 py-2 bg-primary text-primary-foreground rounded-lg hover:bg-primary/90"&gt;
    Guardar cambios
&lt;/button&gt;
</code>

---

### 3.4. Badges

Pequeños indicadores visuales para estados o categorías.

**Usos:**

- Estado del hilo
- Tipo de ayuda
- Categorías
- Etiquetas

**Ejemplo:**

<code>
&lt;span class="px-2 py-1 text-xs bg-success/20 text-success-foreground rounded"&gt;
    Resuelto
&lt;/span&gt;
</code>

---

### 3.5. Bloques de estado del hilo

Cada estado del hilo tiene un bloque visual grande.

#### 🟢 Resuelto

<code>
&lt;div class="p-4 bg-success/10 border border-success/20 rounded-xl flex items-center gap-3"&gt;
    &lt;ux:icon name="check-circle" class="w-8 h-8 text-success-foreground" /&gt;
    &lt;div&gt;
        &lt;h3 class="text-success-foreground font-semibold"&gt;Este hilo está resuelto&lt;/h3&gt;
        &lt;p class="text-success-foreground/80 text-sm"&gt;El autor ha marcado este hilo como solucionado.&lt;/p&gt;
    &lt;/div&gt;
&lt;/div&gt;
</code>

*(Los demás estados siguen el mismo patrón con tokens e iconos distintos: advertencia para “En progreso”, peligro para “Sin respuestas”, neutro para “Cerrado”).*

---

### 3.6. Formularios

Los formularios utilizan:

- Inputs con borde gris
- Focus azul
- Espaciado amplio
- Etiquetas claras

**Ejemplo:**

<code>
&lt;div&gt;
    &lt;label class="block text-sm font-medium text-gray-700 mb-1"&gt;Título&lt;/label&gt;
    &lt;input type="text" class="w-full border rounded-lg p-3 focus:ring-blue-500 focus:border-blue-500" /&gt;
&lt;/div&gt;
</code>

---

### 3.7. Listas de hilos

Cada hilo se muestra con:

- Título
- Estado
- Tipo de ayuda
- Autor
- Fecha
- Iconos de actividad

**Ejemplo simplificado:**

<code>
&lt;div class="p-4 border-b flex justify-between items-center"&gt;
    &lt;div&gt;
        &lt;a href="#" class="text-blue-700 font-medium hover:underline"&gt;Título del hilo&lt;/a&gt;
        &lt;div class="text-xs text-gray-500"&gt;Publicado por Iván · hace 2 horas&lt;/div&gt;
    &lt;/div&gt;
    &lt;span class="px-2 py-1 bg-yellow-100 text-yellow-800 rounded text-xs"&gt;En progreso&lt;/span&gt;
&lt;/div&gt;
</code>

---

### 3.8. Sidebars

Los sidebars utilizan `<Ui:Card>` y bloques verticales con:

- Títulos
- Listas
- Botones
- Iconos
- Colores temáticos

Los detalles completos de los sidebars se documentan en `sidebars.md`.

---

### 3.9. Breadcrumbs

Jerarquía visual para navegación, gestionada de forma centralizada.

**Ejemplo:**

<code>
&lt;twig:App:Breadcrumb :forum="forum" :subforum="subforum" :thread="thread" /&gt;
</code>

---

### 3.10. Avatares

Representan usuarios. Utilizan el filtro `default('')` en los templates para evitar errores con URLs de avatar nulas.

**Ejemplo:**

<code>
&lt;img src="{{ user.avatar|default('') }}" class="w-10 h-10 rounded-full border" /&gt;
</code>

---

### 3.11. Tarjetas de información

Usadas para:

- Estadísticas
- Resúmenes
- Bloques de ayuda
- Anuncios

Se construyen normalmente con `<Ui:Card>` y combinaciones de iconos, títulos y texto.

---

## 🟦 4. Patrones de diseño

### ✔ Espaciado

- `space-y-*` para bloques verticales
- `p-*` para padding interno

### ✔ Tipografía

- Títulos: `text-xl`, `font-semibold`
- Texto normal: `text-gray-700`
- Texto secundario: `text-gray-500`

### ✔ Colores

- Azul → acciones principales
- Verde → éxito
- Amarillo → progreso
- Rojo → error
- Gris → neutro

---

## 🟦 5. Relación con otros archivos

Este archivo forma parte de la documentación general de Lúmina.

Archivos relacionados:

- `contexto-lumina.md`
- `lumina-informacion.md`
- `lumina-servicios.md`
- `foro-estructura.md`
- `sidebars.md`  

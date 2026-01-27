# ESTILOS Y COLORES DE LÚMINA

*(Guía visual y de diseño para la plataforma)*

Este documento define la paleta de colores, tipografías, espaciados y estilos generales utilizados en Lúmina.  
Sirve como referencia para mantener coherencia visual en toda la plataforma.

---

# 🟦 1. Filosofía visual

Lúmina utiliza un diseño:

### ✔ Profesional

Colores equilibrados, tipografía clara, bloques bien definidos.

### ✔ Moderno

Basado en TailwindCSS, con sombras suaves y bordes redondeados.

### ✔ Modular

Cada bloque visual es independiente y reutilizable.

### ✔ Accesible

Contrastes adecuados y tamaños legibles.

---

# 🟦 2. Paleta de colores

Lúmina utiliza una paleta basada en tonos suaves, profesionales y accesibles.

## 2.1. Colores principales

| Uso              | Color    | Clase Tailwind                    |
|------------------|----------|-----------------------------------|
| Acción principal | Azul     | `bg-blue-700`, `text-blue-700`    |
| Éxito            | Verde    | `bg-green-50`, `text-green-800`   |
| Advertencia      | Amarillo | `bg-yellow-50`, `text-yellow-800` |
| Error            | Rojo     | `bg-red-50`, `text-red-800`       |
| Neutro           | Gris     | `text-gray-600`, `bg-gray-100`    |

---

# 🟦 3. Tipografía

Lúmina utiliza una tipografía sans-serif moderna (por defecto en Tailwind).

### ✔ Títulos

- `text-xl`
- `font-semibold`

### ✔ Subtítulos

- `text-lg`
- `font-medium`

### ✔ Texto normal

- `text-gray-700`

### ✔ Texto secundario

- `text-gray-500`

---

# 🟦 4. Espaciado

El espaciado es clave para la claridad visual.

### ✔ Espaciado vertical entre bloques

`space-y-6` o `space-y-8`

### ✔ Padding interno de tarjetas

`p-4`, `p-5` o `p-6`

### ✔ Márgenes exteriores

`mb-4`, `mt-6`

---

# 🟦 5. Bordes y sombras

### ✔ Bordes

- `rounded-lg`
- `rounded-xl`

### ✔ Sombras

- `shadow-sm`
- `shadow-md` (para bloques destacados)

---

# 🟦 6. Componentes visuales clave

## 6.1. Tarjetas `<Ui:Card>`

Base de la mayoría de bloques.

## 6.2. Iconos `<ux:icon>`

Usados para:

- Estados
- Acciones
- Indicadores visuales

## 6.3. Badges

Pequeños indicadores de estado o categoría.

Ejemplo:

<code>
&lt;span class="px-2 py-1 text-xs bg-green-100 text-green-800 rounded"&gt;
    Resuelto
&lt;/span&gt;
</code>

---

# 🟦 7. Estados del hilo (colores)

| Estado         | Color    | Icono          |
|----------------|----------|----------------|
| Resuelto       | Verde    | `check-circle` |
| En progreso    | Amarillo | `clock`        |
| Sin respuestas | Rojo     | `x-circle`     |
| Cerrado        | Gris     | `lock-closed`  |

---

# 🟦 8. Botones

### ✔ Primario

`bg-blue-700 text-white hover:bg-blue-800`

### ✔ Secundario

`bg-gray-200 text-gray-800 hover:bg-gray-300`

### ✔ Peligro

`bg-red-600 text-white hover:bg-red-700`

### ✔ Éxito

`bg-green-600 text-white hover:bg-green-700`

---

# 🟦 9. Formularios

- Inputs con borde gris: `border-gray-300`
- Focus azul: `focus:ring-blue-500`
- Padding amplio: `p-3`
- Etiquetas claras: `text-sm font-medium`

---

# 🟦 10. Relación con otros archivos

- `componentes-ui.md`
- `estructura-plantillas.md`
- `sidebars.md`
- `foro-estructura.md`  

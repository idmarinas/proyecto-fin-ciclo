# Guía de Estilo de Código (Agnóstica)

Esta guía define los principios lógicos y arquitectónicos para el proyecto `proyecto-fin-ciclo`. Los detalles de formato visual (indentación, espacios, llaves, etc.) están automatizados y se definen en el archivo de configuración correspondiente.

## 1. Fuente de Verdad para el Formato

Todas las reglas de formato visual (estilo IntelliJ/PHPStorm) se encuentran en:

- [`.agent/docs/.editorconfig`](file:///.agent/docs/.editorconfig)

Las IAs y editores deben respetar estrictamente este archivo para mantener la consistencia con el entorno de desarrollo principal (PHPStorm).

## 2. Convenciones de Nombrado

- **Clases y Namespaces**: PascalCase (ej. `UserCrudController`).
- **Métodos y Variables**: camelCase (ej. `configureFields`, `$userRepository`).
- **Constantes**: UPPER_SNAKE_CASE (ej. `STATUS_ACTIVE`).
- **Archivos de configuración (YAML)**: snake_case (ej. `services.yaml`).

## 3. Principios de Diseño

- **S.O.L.I.D**: Seguir los principios de diseño orientado a objetos.
- **KISS (Keep It Simple, Stupid)**: Evitar la sobre-ingeniería.
- **DRY (Don't Repeat Yourself)**: Abstraer lógica común en servicios o traits.

## 4. Manejo de Errores

- Utilizar excepciones específicas en lugar de códigos de error.
- Documentar las excepciones lanzadas en los bloques PHPDoc si aportan valor semántico.

## 5. Comentarios y Documentación

- Escribir código que sea auto-explicativo.
- Usar PHPDoc solo cuando el tipado de PHP no sea suficiente (ej. colecciones genéricas) o para explicar el "por qué" de una lógica compleja, no el "qué" (que debería ser evidente por el código).

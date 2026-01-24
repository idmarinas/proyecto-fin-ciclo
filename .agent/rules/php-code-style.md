# PHP Code Style Rules

Para mantener la consistencia en el proyecto `proyecto-fin-ciclo`, se deben seguir las siguientes reglas de formato de código PHP.

## 1. Espacios en Funciones y Métodos

### 1.1 Definición

Debe haber **exactamente un espacio** entre el nombre de la función y el paréntesis de apertura.

- ✅ `public function __construct ()`
- ✅ `public function getTitle (): string`
- ❌ `public function __construct()`

### 1.2 Llamadas

Debe haber **exactamente un espacio** entre el nombre del método/función y el paréntesis de apertura en las llamadas.

- ✅ `Method ()`
- ✅ `IdField::new ('id')`
- ❌ `Method()`

## 2. Interfaces Fluídas (Method Chaining)

El punto y coma `;` final **DEBE** ir en su propia línea después del último método de la cadena.

- ✅

  ```php
  yield TextField::new ('title')
      ->setRequired (true)
  ;
  ```

- ❌

  ```php
  yield TextField::new('title')
      ->setRequired(true);
  ```

## 3. Conversión de Tipos (Type Casting)

**NO** debe haber espacios entre el operador de casting y la variable.

- ✅ `(string)$variable`
- ✅ `(array)$data`
- ❌ `(string) $variable`

## 4. Estructuras de Control

Se sigue el estándar PSR-12, pero manteniendo el espacio antes del paréntesis en las definiciones de métodos. Las palabras clave como `if`, `for`, `foreach`, `while` también llevan espacio antes del paréntesis (estándar).

## 5. Declaración de Clases y Métodos

- Las llaves de apertura `{` para clases y métodos deben ir en una nueva línea.
- No debe haber una línea en blanco inmediatamente después de la llave de apertura de una clase.

## 6. Atributos PHP

Los atributos deben ir preferiblemente en su propia línea encima del elemento que afectan.

- ✅

  ```php
  #[Override]
  public function configureCrud (Crud $crud): Crud
  ```

<!--suppress HtmlDeprecatedAttribute -->
<div align="center">

# Lúmina — Foro de Ayuda y Soporte

![GitHub release](https://img.shields.io/github/release/idmarinas/proyecto-fin-ciclo.svg?style=for-the-badge)
![GitHub Release Date](https://img.shields.io/github/release-date/idmarinas/proyecto-fin-ciclo.svg?style=for-the-badge)

</div>

> Lúmina es una plataforma de soporte técnico y gestión de incidencias con foro integrado, construida con Symfony 8 y diseñada para empresas que necesitan un canal de ayuda estructurado, moderno y accesible.

---

> [!WARNING]
> **Proyecto de Fin de Ciclo — Contenido ficticio**
>
> Este repositorio es el resultado de un **Proyecto de Fin de Ciclo** del **Grado Superior de Desarrollo de Aplicaciones Web (DAW)**, elaborado con fines exclusivamente académicos y de evaluación.
>
> **Lúmina**, así como todos sus servicios, datos, empresas, personas, precios, marcas, logotipos y cualquier otro contenido que aparezca en esta plataforma son **completamente ficticios**. Cualquier parecido con la realidad es pura coincidencia. Este proyecto no tiene ninguna intención comercial ni pretende representar un servicio o empresa real.

---

<br />

<div align="center">

[![Test Suite](https://img.shields.io/github/actions/workflow/status/idmarinas/proyecto-fin-ciclo/php.yml?branch=1.x&style=for-the-badge&logo=github&logoColor=white&label=Lumina%20Foro%20de%20ayuda%20Test%20Suite)][test-suit]

<br />

![Github commits (since latest release)](https://img.shields.io/github/commits-since/idmarinas/proyecto-fin-ciclo/latest/1.x?style=for-the-badge)
![GitHub commit activity](https://img.shields.io/github/commit-activity/w/idmarinas/proyecto-fin-ciclo/1.x?style=for-the-badge)
![GitHub last commit](https://img.shields.io/github/last-commit/idmarinas/proyecto-fin-ciclo/1.x?style=for-the-badge)

</div>

<br />

## ¿Qué es Lúmina?

Lúmina es una plataforma digital orientada a la gestión de soporte técnico para negocios. Ofrece un foro de ayuda estructurado por categorías y subforos, con estados de hilo (resuelto, en progreso, cerrado), hilos públicos y privados, clasificación por tipo de incidencia y un panel de administración completo.

**Funcionalidades principales:**

- Foro con subforos temáticos, hilos y respuestas
- Clasificación de incidencias por tipo de ayuda y criticidad
- Hilos públicos y privados según permisos
- Panel de administración con EasyAdmin
- Sistema de autenticación con dos firewalls (admin / usuario)
- Borrado lógico (soft delete) en todas las entidades
- Envío de correos transaccionales (bienvenida, recuperación de contraseña)

---

## 🖱️ Tecnologías

[![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white)](https://www.php.net)
[![Symfony](https://img.shields.io/badge/symfony-black.svg?style=for-the-badge&logo=symfony&logoColor=white)](https://www.symfony.com)
[![MySQL](https://img.shields.io/badge/mysql-4479A1.svg?style=for-the-badge&logo=mysql&logoColor=white)](https://www.mysql.com)
[![TailwindCSS](https://img.shields.io/badge/tailwindcss-%2338B2AC.svg?style=for-the-badge&logo=tailwind-css&logoColor=white)](https://www.tailwindcss.com)
![GitHub code size in bytes](https://img.shields.io/github/languages/code-size/idmarinas/proyecto-fin-ciclo?style=for-the-badge)

| Capa       | Tecnología                                           |
|------------|------------------------------------------------------|
| Backend    | PHP 8.4+, Symfony 8.0, Doctrine ORM 3.6              |
| Base datos | MySQL 8.4                                            |
| Frontend   | TailwindCSS 4.1, Twig UX Components, Stimulus, Turbo |
| Admin      | EasyAdmin 4                                          |
| Deploy     | Docker (FrankenPHP + Caddy), Traefik, Deployer       |

---

## 🛠️ Herramientas

![Dependabot](https://img.shields.io/badge/dependabot-025E8C?style=for-the-badge&logo=dependabot&logoColor=white)
[![GitHub Actions](https://img.shields.io/badge/github%20actions-%232671E5.svg?style=for-the-badge&logo=githubactions&logoColor=white)](https://github.com/features/actions)
[![Docker](https://img.shields.io/badge/docker-%230db7ed.svg?style=for-the-badge&logo=docker&logoColor=white)](https://www.docker.com)
[![Composer](https://img.shields.io/badge/composer-%238c5530?style=for-the-badge&logo=composer&logoColor=white)](https://getcomposer.org)

---

## Instalación

### Requisitos previos

- [Docker](https://www.docker.com/) y Docker Compose

> **Nota:** No se necesita PHP, Composer ni Node.js instalados localmente. Todo se ejecuta dentro de los contenedores Docker.
> El `package.json` existe únicamente para que el IDE pueda ofrecer autocompletado de TailwindCSS.

---

### 1. Clonar el repositorio

```bash
git clone https://github.com/idmarinas/proyecto-fin-ciclo.git
cd proyecto-fin-ciclo
```

---

### 2. Inicializar el entorno

Este script crea el fichero `.env.docker` necesario para los servicios Docker. Instala dependencias, limpia la caché y vuelca las variables de entorno, todo dentro de un contenedor temporal:

```powershell
# Dev - Init .env.docker
.\.docker\scripts\dev\init-env-docker.ps1
```

> Si necesitas regenerar `.env.docker` sin reinstalar dependencias, usa el script de Composer:
> **Dev - Create .env.docker** → `composer dev:dump:env`

---

### 3. Levantar los servicios

```bash
# Dev - Webserver
docker compose -f compose.yaml -f compose.override.yaml --env-file .env.docker up -d webserver database database_test mailer
```

Esto levanta:

| Servicio        | Descripción                                | Puerto local  |
|-----------------|--------------------------------------------|---------------|
| `webserver`     | PHP con FrankenPHP + Caddy                 | `443` (HTTPS) |
| `database`      | MySQL 8.4 para desarrollo                  | `13306`       |
| `database_test` | MySQL 8.4 para tests                       | `13307`       |
| `mailer`        | Mailpit — captura de correos en desarrollo | `8025` (web)  |

---

### 4. Cargar la base de datos con datos de ejemplo

```bash
# Dev - Reload DB
composer dev:fixtures:load
```

Este comando ejecuta dentro del contenedor: drop del esquema, recreación y carga de fixtures.

---

### 5. Compilar los assets (TailwindCSS)

Los assets se compilan con dos comandos de Composer, sin necesidad de npm:

```bash
# Compila los estilos principales y los estilos de la página de error
composer tailwind:build
```

Esto ejecuta internamente:

1. `php bin/console tailwind:build` — estilos principales de la aplicación
2. `php bin/console tailwind:build assets/styles/exception_error.css` — estilos de la página de error

---

### 6. Acceder a la aplicación

| URL                       | Descripción             |
|---------------------------|-------------------------|
| `https://localhost`       | Aplicación principal    |
| `https://localhost/admin` | Panel de administración |
| `http://localhost:8025`   | Mailpit (correos dev)   |

---

## Tests

### Cargar datos de prueba

```bash
# Test - Reload DB
composer test:fixtures:load
```

### Ejecutar la suite

```bash
php bin/phpunit --exclude-group ignore
```

---

## Otros scripts útiles

| Script Composer           | Descripción                                              |
|---------------------------|----------------------------------------------------------|
| `composer auto-scripts`   | Limpia caché, instala assets e importmap *(Clear Cache)* |
| `composer dev:dump:env`   | Regenera el fichero `.env.docker`                        |
| `composer tailwind:build` | Compila todos los assets CSS                             |

[//]: # (@formatter:off)
[sonarcloud]: https://sonarcloud.io/dashboard?id=SONAR_PROJECT_NAME_CHANGE_ME
[test-suit]: https://github.com/idmarinas/proyecto-fin-ciclo/actions/workflows/php.yml

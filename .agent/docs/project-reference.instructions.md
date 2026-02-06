# Project Reference for "Foro de Ayuda y Soporte"

## Project Overview

This is a Symfony 8.0 forum support application (`proyecto-fin-ciclo`) using:

- **Framework**: Symfony 8.0 with MicroKernelTrait pattern
- **Backend**: PHP 8.4+ with Doctrine 3.6 ORM
- **Database**: MySQL/MariaDB with soft-delete logical deletion via Gedmo
- **Frontend**: TailwindCSS 4.1 + Twig UX Components + Stimulus.js (UX framework) + Turbo for AJAX
- **Admin**: EasyAdmin 4.27 with Tailwind styling for CRUD management
- **Deployment**: Docker (FrankenPHP for web, MySQL container, Traefik reverse proxy)
- **Deployment Tool**: Deployer for automated CI/CD orchestration

## Architecture Patterns

### Directory Structure

- `src/Controller/` - Main app controllers (except Admin and User subfolders)
- `src/Controller/Admin/` - EasyAdmin controllers (prefix: `/admin`)
- `src/Controller/User/` - User-specific controllers (prefix: `/user`)
- `src/Entity/Forum/` - Forum entities: `Thread.php`, `Message.php`
- `src/Entity/User/` - User entities: `User.php`, `ResetPasswordRequest.php`
- `src/Repository/` - Doctrine repository classes
- `src/Form/` - Symfony form types
- `src/Security/` - Security checkers (`AdminChecker`, `UserChecker`) and related classes
- `src/Traits/Entity/` - Reusable entity traits (`BanTrait`, `TreeTrait`)
- `src/Traits/Controller/` - Controller utilities (e.g., `NotificationsTrait`)
- `config/routes/` - Additional route definitions
- `templates/` - Twig templates organized by feature
- `templates/components/` - Twig UX Components (auto-registered)
- `assets/controllers/` - Stimulus JavaScript controllers
- `tests/Factory/` - Zenstruck Foundry model factories
- `tests/DataFixtures/` - Doctrine fixtures

### Entity Design

**Key Traits Used:**

- `UuidTrait` (from IDMarinas Common Bundle) - Primary key generation
- `TimestampableEntity` (Gedmo) - Auto `createdAt`/`updatedAt` tracking
- `SoftDeleteableEntity` (Gedmo) - Logical deletion with `deletedAt` field
- `BanTrait` (custom `src/Traits/Entity/BanTrait.php`) - User ban functionality
- `TreeTrait` (custom `src/Traits/Entity/TreeTrait.php`) - Hierarchical entity support

**Example Entity Convention** (`User`):

```php
#[ORM\Entity(repositoryClass: UserRepository::class)]
#[Gedmo\SoftDeleteable]
class User implements Stringable, UserInterface, PasswordAuthenticatedUserInterface, SoftDeleteable, Timestampable
{
    use UuidTrait;
    use SoftDeleteableEntity;
    use TimestampableEntity;
    // ... properties
}
```

### Frontend Architecture: Stimulus + Turbo + Twig Components

**Interactive Components** - Use Twig UX Components (`symfony/ux-twig-component`, `symfony/stimulus-bundle`, `symfony/ux-turbo`):

- Located in `templates/components/` and `templates/admin/components/`.
- Generic UI components should be placed in `templates/components/Ui/`.
- Stimulus controllers in `assets/controllers/` for interactivity (e.g., `csrf_protection_controller.js`).
- Turbo Frame/Stream for AJAX-like responses without full page reload.
- Example: `<twig:Turbo:Frame id="form-container">` wraps partial content.

**CSS Framework** - TailwindCSS via `symfonycasts/tailwind-bundle`:

- Asset Mapper handles CSS build (no webpack)
- Utility classes directly in Twig: `class="flex items-center justify-between"`
- Custom plugin: `tales-from-a-dev/twig-tailwind-extra` provides Twig `tailwind_merge` filter

**Icon System** - Symfony UX Icons with Tabler icon set:

- Usage: `<twig:ux:icon name="tabler:users" class="size-5" />`.
- **Set Preference**: Use the **tabler** set (`tabler:*`) whenever possible for consistency.
- Icons are automatically fetched and cached; check `config/packages/ux_icons.yaml` for aliases.
- Local custom icons can be placed in `assets/icons/`.

**UI Building Blocks** - Symfony UX Toolkit (Dev only):

- Used during development to generate base components in `templates/components/Ui/`.
- Not required in production as components are copied to the template directory.

### Security Architecture

**Two Firewall Pattern** (`config/packages/security.yaml`):

1. **Admin Firewall** (`^/admin`) - Form login with `AdminChecker`
    - Pattern: `^/%app.route_prefix.admin%(|/.*)$`
    - Default target: `admin_dashboard`
2. **Main Firewall** (`^/`) - Form login with `UserChecker` + `switch_user: true` (impersonation)
    - Default target: `app_user_profile_index`

Both use:

- Email-based provider (`App\Entity\User\User`)
- CSRF protection on forms (enabled by default in `config/packages/csrf.yaml`)
- Remember-me tokens signed with password + timestamps
- Clear site data on logout (cookies, storage, cache, executionContexts)

### Routing Convention

- **Admin routes**: `prefix: /admin`, `name_prefix: admin_` → route names like `admin_dashboard`
- **User routes**: `prefix: /user`, `name_prefix: app_user_` → route names like `app_user_profile_index`
- **Public routes**: `prefix: /` (or empty), `name_prefix: app_` → route names like `app_home`
- Use attribute-based routing with `#[Route]` decorators
- Exclude Admin/User controllers from public routing config to avoid conflicts

### Data Access Layer

**Repository Pattern:**

- All repositories in `src/Repository/` matching entity structure
- Use Doctrine QueryBuilder for custom queries
- Return typed collections or single entities

**Soft Delete Handling:**

- Gedmo `SoftDeleteable` filter auto-enabled in Doctrine config
- Queries automatically exclude deleted entities unless explicitly included
- Access deleted entities via: `$repository->findWithDeleted()` or query without filter

## Testing & Development

### Test Framework Stack

- **PHPUnit** with Zenstruck Foundry and DAMA Doctrine extensions
- `failOnDeprecation: true` - Strict deprecation handling
- Test environment: `APP_ENV=test` (see `phpunit.dist.xml`)

### Key Test Commands

```bash
# Run all tests
php bin/phpunit

# Run specific test file
php bin/phpunit tests/Controller/AdminControllerTest.php

# With coverage
php bin/phpunit --coverage-html build/reports/html-coverage
```

### Factories & Fixtures

- Create test data using `tests/Factory/*.php` (Foundry model factories)
- Load fixtures with `tests/DataFixtures/*.php` for seeding
- Factories support attributes for flexible object creation

### Docker Development Workflow

```bash
# Initialize environment (first time)
# Via VS Code task: "Init Env Docker" or:
# .docker/scripts/dev/init-env-docker.ps1

# Build development image
# Via VS Code task: "Build Docker Image DEV" or:
# .docker/scripts/dev/BuildDockerImage.ps1

# Start dev services (webserver, MySQL, MySQL test)
# Via VS Code task "Dev - Webserver" or:
# docker compose -f compose.yaml -f compose.override.yaml up -d webserver database database_test
```

## Critical Configuration Files

| File                                                                          | Purpose               | Key Settings                                       |
|-------------------------------------------------------------------------------|-----------------------|----------------------------------------------------|
| [.env](.env), [.env.local](.env.local)                                        | Environment variables | `APP_ENV`, `DATABASE_*`, `APP_SERVER_NAME`         |
| [config/bundles.php](config/bundles.php)                                      | Bundle registration   | Order matters for overrides (Tailwind, Icons, UI)  |
| [config/packages/doctrine.yaml](config/packages/doctrine.yaml)                | Doctrine/Database     | Mapping to `src/Entity`, soft-delete filter config |
| [config/packages/security.yaml](config/packages/security.yaml)                | Security firewalls    | Two firewalls + checkers, remember-me tokens       |
| [config/services.yaml](config/services.yaml)                                  | Service container     | Autowiring: `App\:` from `src/`                    |
| [compose.yaml](compose.yaml) + [compose.override.yaml](compose.override.yaml) | Docker services       | MySQL, PHP (FrankenPHP), Caddy, Traefik labels     |

## Third-Party Bundles & Custom Integrations

**Key IDMarinas Bundles** (in dev):

- `idmarinas/seo-bundle` - SEO optimization + sitemap (config: [config/packages/idm_seo.php](config/packages/idm_seo.php))
- `idmarinas/common-bundle` - Provides `UuidTrait` and utilities

**Integrated Bundles:**

- **EasyAdmin** - Admin CRUD interface at `/admin` (auto-registered in routes)
- **Doctrine Extensions** (Gedmo) - Timestamps, soft-delete, custom behaviors
- **Twig Components** + **Stimulus** - Interactive frontend components
- **Tailwind + Asset Mapper** - Modern CSS framework + build system
- **Symfony UX Icons** - Icon system integration
- **Security**: Reset password & email verification bundles

## Common Coding Patterns

### Creating an Entity

1. Place in `src/Entity/{Domain}/`
2. Use ORM attributes: `#[ORM\Entity(repositoryClass: FooRepository::class)]`
3. Include required traits: `UuidTrait`, `TimestampableEntity`, `SoftDeleteableEntity`
4. Implement relevant interfaces: `Stringable`, `SoftDeleteable`, `Timestampable`
5. Add unique constraint attributes if needed

### Creating a Form

1. Place in `src/Form/`
2. Extend `AbstractType`
3. Use entity-bound forms when mapping to entities
4. CSRF protection enabled by default in security config

### Creating a Controller

1. Admin: `src/Controller/Admin/Foo.php` with route prefix `/admin`
2. User: `src/Controller/User/Foo.php` with route prefix `/user`
3. Public: `src/Controller/Foo.php` with no special prefix
4. Use `#[Route]` attribute with explicit paths
5. Type-hint injected services (autowiring enabled)

### Database Migrations

- Use Doctrine Migrations: `bin/console make:migration`
- Place in `migrations/`
- Run: `bin/console doctrine:migrations:migrate`
- Test database: `database_test` service in compose.yaml

## Deployment Notes

- **Image Building**: `docker build --target prod -f .docker/Dockerfile -t idmarinas/pfc:VERSION .`
- **Image Export**: `docker save -o deployer.tar idmarinas/pfc:VERSION`
- **Production**: See `compose.prod.yaml` and `deploy.php` for CI/CD integration via Deployer
- **Logs**: Mounted as Docker volumes; download and refresh periodically
- **Secrets**: Via Docker secrets (db_password, cloudflare_api_token)

## Naming Conventions & Code Style

**PHP Classes & Methods**

- Classes: PascalCase (`UserController`, `ThreadService`)
- Methods/Functions: camelCase (`getUserProfile()`, `processPayment()`)
- Boolean methods: Prefix with `is`, `has`, `can` (`isValid()`, `hasPermission()`)
- Properties: camelCase (`$userName`, `$isActive`)

**Database & Entity Properties**

- Tables: snake_case, plural (`users`, `forum_threads`)
- Columns: snake_case (`first_name`, `created_at`)
- Foreign keys: `{entity_singular}_id` (`user_id`, `thread_id`)

**Frontend**

- Twig variables: snake_case (`user_name`, `product_list`)
- Twig files: snake_case (`user_profile.html.twig`)
- CSS: Tailwind utilities directly in templates
- Routes: kebab-case (`/users/profile`, `/forum/threads`)

**Commit Messages**

- Follow Conventional Commits: `feat:`, `fix:`, `docs:`, `test:`, etc.
- Be atomic and clear
- Use `[skip ci]` to skip workflows if needed

## Code Quality Tools

- **PHPStan**: Static analysis (config: `phpstan.dist.neon`)
- **Rector**: Automated code upgrades (config: `rector.php`)
- **GitHub Actions**: Continuous integration workflows
- **SonarCloud**: Code quality metrics (optional, see badges in README)

## Key Architectural Patterns & Design Decisions

### Soft Deletes with Gedmo

All user-facing entities use Gedmo's `SoftDeleteableEntity` trait. The soft-delete filter is **enabled by default** in Doctrine config. Queries automatically exclude deleted entities unless explicitly included via repository methods.

### UUID Primary Keys

All entities use `UuidTrait` from IDMarinas Common Bundle for generating universally unique identifiers, avoiding integer ID collisions in distributed systems.

### Turbo-Driven UI

Forms and page sections are wrapped in `<twig:Turbo:Frame>` components. Form submissions return `*.stream.html.twig` templates with `<twig:Turbo:Stream>` directives for targeted DOM updates without full page reloads.

### Asset Mapper (No Webpack)

CSS and JS are built via `symfonycasts/tailwind-bundle`. No webpack configuration needed. Check `importmap.php` for JavaScript entry points.

### Two-Firewall Security Model

Separate security contexts for admin (`/admin`) and main app (`/user`, `/`) with distinct checkers and login flows. Admin firewall has stricter configuration than the main firewall.

### Deployer-Based Deployment

Production deployments use Deployer (`deploy.php`) with custom task orchestration in `.deployer/`. Never use manual Docker commands for production—use Deployer tasks instead.

---

    **Last Updated**: January 2026 | **Symfony Version**: 8.0 | **PHP**: ≥8.4

# Theme Management System Documentation

## Overview

This is a comprehensive theme management system with CRUD operations for Themes, Components, and their relationships. All theme-related files are organized in a dedicated `theme` folder structure for better code organization.

## Database Structure

### Tables Created

1. **themes**

    - `id` - Primary key
    - `name` - Theme name
    - `slug` - URL-friendly identifier (auto-generated)
    - `status` - Active/Inactive status
    - `created_at`, `updated_at` - Timestamps

2. **components**

    - `id` - Primary key
    - `name` - Component name
    - `slug` - URL-friendly identifier (auto-generated)
    - `status` - Active/Inactive status
    - `created_at`, `updated_at` - Timestamps

3. **theme_components** (Pivot table)
    - `id` - Primary key
    - `theme_id` - Foreign key to themes
    - `component_id` - Foreign key to components
    - `created_at`, `updated_at` - Timestamps
    - Unique constraint on `theme_id` + `component_id`

## File Structure

```
main-admin/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       └── Admin/
│   │           └── Theme/                    # Theme controllers folder
│   │               ├── ThemeController.php
│   │               ├── ComponentController.php
│   │               └── ThemeComponentController.php
│   └── Models/
│       ├── Theme.php
│       └── Component.php
│
├── database/
│   ├── migrations/
│   │   ├── 2025_12_05_000010_create_themes_table.php
│   │   ├── 2025_12_05_000011_create_components_table.php
│   │   └── 2025_12_05_000012_create_theme_components_table.php
│   └── seeders/
│       ├── ThemeSeeder.php
│       ├── ComponentSeeder.php
│       └── ThemeComponentSeeder.php
│
└── resources/
    └── views/
        └── admin/
            └── theme/                         # Theme views folder
                ├── themes/
                │   ├── index.blade.php
                │   ├── create.blade.php
                │   └── edit.blade.php
                ├── components/
                │   ├── index.blade.php
                │   ├── create.blade.php
                │   └── edit.blade.php
                └── theme-components/
                    ├── index.blade.php
                    └── edit.blade.php
```

## Features

### 1. Theme CRUD

-   **List Themes** - View all themes with component count
-   **Create Theme** - Add new themes with name, slug, status
-   **Edit Theme** - Update theme details
-   **Delete Theme** - Remove themes (cascades to relationships)
-   **Toggle Status** - Quick activate/deactivate

### 2. Component CRUD

-   **List Components** - View all components with theme count
-   **Create Component** - Add new components
-   **Edit Component** - Update component details
-   **Delete Component** - Remove components (cascades to relationships)
-   **Toggle Status** - Quick activate/deactivate

### 3. Theme-Component Management

-   **View Relationships** - See all themes and their assigned components
-   **Manage Assignments** - Add/remove components from themes
-   **Multi-select Interface** - Easy checkbox interface for bulk assignments

## Routes

### Theme Routes

```php
// Resource routes
GET    /admin/themes           - admin.themes.index
GET    /admin/themes/create    - admin.themes.create
POST   /admin/themes           - admin.themes.store
GET    /admin/themes/{id}/edit - admin.themes.edit
PUT    /admin/themes/{id}      - admin.themes.update
DELETE /admin/themes/{id}      - admin.themes.destroy

// Custom routes
PATCH  /admin/themes/{id}/toggle-status - admin.themes.toggle-status
```

### Component Routes

```php
// Resource routes
GET    /admin/components           - admin.components.index
GET    /admin/components/create    - admin.components.create
POST   /admin/components           - admin.components.store
GET    /admin/components/{id}/edit - admin.components.edit
PUT    /admin/components/{id}      - admin.components.update
DELETE /admin/components/{id}      - admin.components.destroy

// Custom routes
PATCH  /admin/components/{id}/toggle-status - admin.components.toggle-status
```

### Theme-Component Routes

```php
GET  /admin/theme-components              - admin.theme-components.index
GET  /admin/theme-components/{theme}/edit - admin.theme-components.edit
PUT  /admin/theme-components/{theme}      - admin.theme-components.update
```

## Navigation

Theme menu is added to the admin header with a dropdown containing:

-   **Themes** - Manage themes
-   **Components** - Manage components
-   **Theme Components** - Manage relationships

## Default Seeded Data

### Themes

1. Default Theme (Active)
2. Dark Theme (Active)
3. Light Theme (Active)
4. Corporate Theme (Active)
5. Creative Theme (Inactive)

### Components

1. Header (Active)
2. Footer (Active)
3. Sidebar (Active)
4. Navigation (Active)
5. Hero Section (Active)
6. About Section (Active)
7. Services Section (Active)
8. Contact Form (Active)
9. Testimonials (Active)
10. Blog Section (Inactive)

### Theme-Component Relationships

-   **Default Theme**: Header, Footer, Navigation, Hero Section, About Section, Services Section, Contact Form
-   **Dark Theme**: Header, Footer, Sidebar, Navigation, Hero Section
-   **Light Theme**: Header, Footer, Navigation, About Section, Services Section
-   **Corporate Theme**: Header, Footer, Sidebar, Navigation, Services Section, Contact Form

## Model Features

### Auto-Slug Generation

Both Theme and Component models automatically generate slugs from names:

```php
// Creating a theme
$theme = Theme::create(['name' => 'My New Theme']);
// Automatically generates slug: 'my-new-theme'
```

### Relationships

```php
// Get all components for a theme
$theme->components;

// Get all themes for a component
$component->themes;

// Sync components to a theme
$theme->components()->sync([1, 2, 3]);

// Attach a component
$theme->components()->attach($componentId);

// Detach a component
$theme->components()->detach($componentId);
```

## Installation & Setup

1. **Run Migrations**

    ```bash
    php artisan migrate
    ```

2. **Run Seeders**

    ```bash
    php artisan db:seed --class=ThemeSeeder
    php artisan db:seed --class=ComponentSeeder
    php artisan db:seed --class=ThemeComponentSeeder

    # Or run all seeders
    php artisan db:seed
    ```

3. **Access Admin Panel**
    - Navigate to `/admin/themes` for theme management
    - Navigate to `/admin/components` for component management
    - Navigate to `/admin/theme-components` for relationship management

## Usage Examples

### Creating a Theme via Code

```php
use App\Models\Theme;

$theme = Theme::create([
    'name' => 'Premium Theme',
    'slug' => 'premium-theme', // Optional, auto-generates if not provided
    'status' => true,
]);
```

### Creating a Component via Code

```php
use App\Models\Component;

$component = Component::create([
    'name' => 'Pricing Table',
    'slug' => 'pricing-table',
    'status' => true,
]);
```

### Assigning Components to a Theme

```php
// Sync (replaces all existing)
$theme->components()->sync([1, 2, 3]);

// Attach (adds without removing existing)
$theme->components()->attach([4, 5]);

// Detach (removes specific)
$theme->components()->detach([2]);
```

## UI Features

-   **Bootstrap 5** styling
-   **Bootstrap Icons** for visual elements
-   **Responsive** tables and forms
-   **Pagination** for large datasets
-   **Status badges** for visual status indication
-   **Confirmation dialogs** for destructive actions
-   **Helpful sidebars** with quick tips
-   **Breadcrumb navigation**
-   **Alert messages** for success/error feedback

## Security

-   CSRF protection on all forms
-   Laravel validation on all inputs
-   Unique constraint on slugs
-   Cascade delete on relationships
-   Status toggle with authentication

## Future Enhancements

Consider adding:

-   Theme preview/screenshot upload
-   Component code/template editor
-   Theme export/import functionality
-   Version control for themes
-   Theme activation history
-   Component dependency management
-   Search and filter functionality

---

**Created:** December 5, 2025
**Version:** 1.0

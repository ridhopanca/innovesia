# Innovesia CMS

A modern Laravel-based Content Management System (CMS) for managing company websites with a flexible page and section-based architecture.

## Tech Stack

- **Framework**: Laravel 13.x
- **PHP**: ^8.3
- **Frontend**: TailwindCSS 4.x with Vite
- **Database**: SQLite (default), MySQL/PostgreSQL compatible

## Features

- **Page Management**: Create and manage static pages (Home, About, Product, Portfolio, Articles, Community)
- **Section-Based Architecture**: Each page consists of modular sections that can be edited independently
- **Draft & Publish Workflow**: Make changes in draft mode and publish when ready
- **Article System**: Blog/article functionality with category filtering
- **Admin CMS**: Secure admin panel at `/cms` for content management
- **User Authentication**: Login system with profile management
- **Live Preview**: Preview changes before publishing

## Project Structure

```
app/
├── Http/
│   └── Controllers/
│       ├── AuthController.php         # Authentication logic
│       ├── PageController.php         # Public page display
│       ├── PreviewController.php      # Preview functionality
│       └── Admin/
│           ├── PageController.php     # Admin page management
│           └── SectionController.php  # Section editing
└── Models/
    ├── Page.php                       # Page model
    ├── Section.php                    # Section model
    └── User.php                       # User model

resources/views/
├── pages/                             # Public page templates
├── auth/                              # Login and profile views
├── layouts/                           # Layout templates
└── components/                        # Reusable components
```

## Installation

### Prerequisites

- PHP 8.3 or higher
- Composer
- Node.js (for asset building)

### Setup

```bash
# Clone the repository
git clone <repository-url>
cd innovesia

# Install dependencies
composer install
npm install

# Environment setup
cp .env.example .env
php artisan key:generate

# Database setup
php artisan migrate
php artisan db:seed

# Build assets
npm run build
```

### Development

```bash
# Start development server
composer run dev
```

This will start:

- Laravel server
- Queue worker
- Log watcher
- Vite dev server

## Routes

### Public Routes

| Route             | Description      |
| ----------------- | ---------------- |
| `/`               | Home page        |
| `/about`          | About page       |
| `/product`        | Product page     |
| `/portfolio`      | Portfolio page   |
| `/articles`       | Articles listing |
| `/community`      | Community page   |
| `/artikel/{slug}` | Article detail   |

### Admin Routes (Authentication Required)

| Route               | Description             |
| ------------------- | ----------------------- |
| `/login`            | Login page              |
| `/update-profile`   | Update profile/password |
| `/cms`              | Admin dashboard         |
| `/cms/pages/{slug}` | Edit page sections      |

## Database Schema

### Pages Table

- `id` - Primary key
- `title` - Page title
- `slug` - Unique identifier
- `template` - Page template
- `status` - published/draft/modified

### Sections Table

- `id` - Primary key
- `page_id` - Foreign key to pages
- `type` - Section type (hero, content, gallery, etc.)
- `order` - Display order
- `content` - Published content (JSON)
- `draft_content` - Draft content (JSON)
- `page_template` - Template reference

## License

MIT License

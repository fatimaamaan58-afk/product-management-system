# Product Management System

A Laravel-based web application for managing product inventory, categories, brands, and sales, featuring role-based authorization and real-time statistics.

## Features

- **Product & Inventory Management:** Full CRUD functionality, category and brand grouping, media/image uploads, stock tracking, and soft deletes.
- **Security & Authorization:** User authentication, role-based access control (Policies and Middleware), and form request validation.
- **Search & Navigation:** Dynamic search by product name/SKU, category and price filtering, and pagination.
- **Dashboard & Analytics:** Overview metrics for total products, out-of-stock items, categories, and inventory statistics.

## Tech Stack

- **Backend:** PHP 8.x, Laravel
- **Database:** MySQL
- **Frontend:** Blade, Tailwind CSS / Bootstrap

## Requirements

- PHP >= 8.1
- Composer
- MySQL
- Node.js & NPM

## Setup Instructions

1. Clone the repository:
```bash
git clone [https://github.com/fatimaamaan58-afk/product-management-system.git](https://github.com/fatimaamaan58-afk/product-management-system.git)
cd product-management-system
Install dependencies:

Bash
composer install
npm install && npm run dev
Configure environment:

Bash
cp .env.example .env
php artisan key:generate
Set up database and storage:

Bash
php artisan migrate:fresh --seed
php artisan storage:link
Run the server:

Bash
php artisan serve
Database Models
Users: System user accounts and roles.

Categories: Product categories (hasMany Products).

Brands: Product brands (hasMany Products).

Products: Main catalog items (belongsTo Category, Brand).

License
MIT License

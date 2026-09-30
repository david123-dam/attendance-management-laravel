# Attendance Management System - Laravel 13

A Laravel 13 final project for managing students, departments, and daily attendance.

## Requirements
- PHP 8.3+
- Composer
- MySQL 8+
- Node.js is optional because the UI uses a simple CSS file and CDN icons.

## Features
- Login, logout, and registration
- Dashboard with attendance statistics
- Department CRUD with search
- Student CRUD with search and department filter
- Attendance CRUD with date/status/student filters
- Student attendance history
- Relational database: Departments -> Students -> Attendances
- Seeded demo data
- Responsive modern UI

## Setup
1. Create a MySQL database, for example `laravel13sv9`.
2. Update `.env` with your MySQL username/password.
3. Run:

```bash
composer install
php artisan key:generate
php artisan migrate:fresh --seed
php artisan serve
```

4. Open http://127.0.0.1:8000

### Demo login
- Email: `admin@attendance.test`
- Password: `password`

Teacher demo:
- Email: `teacher@attendance.test`
- Password: `password`

## GitHub
After testing, initialize Git, commit the project, create a GitHub repository, and push the source code.
Do not commit `.env` or real passwords.

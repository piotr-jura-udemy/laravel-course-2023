# Task Management Application

This is a simple task management application built with Laravel for educational purposes.

## Prerequisites

- PHP 8.3 or higher
- Composer
- SQLite (default database)
- Node.js and npm (for frontend assets)

## Setup

1. Clone the repository:
   ```
   git clone https://github.com/yourusername/task-management.git
   cd task-management
   ```

2. Install PHP dependencies:
   ```
   composer install
   ```

3. Copy the `.env.example` file to `.env`:
   ```
   cp .env.example .env
   ```
   The default configuration uses SQLite, so no additional database setup is required.

4. Generate application key:
   ```
   php artisan key:generate
   ```

5. Run database migrations and seed the database:
   ```
   php artisan migrate --seed
   ```

6. Install and compile frontend assets:
   ```
   npm install
   npm run dev
   ```

7. Start the development server:
   ```
   php artisan serve
   ```

The application should now be running at `http://localhost:8000`.

## Features

- Create, read, update, and delete tasks
- Mark tasks as complete/incomplete
- Paginated task list
- Form validation

This project is intended for educational purposes to demonstrate basic Laravel functionality and CRUD operations.
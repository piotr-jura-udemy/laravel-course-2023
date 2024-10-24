# Project Setup and Start Guide

This project uses Laravel as the framework and SQLite as the database. To set up and start the project, follow these steps:

**Step 1: Clone the Project**

Clone the project repository to your local machine using Git:
```bash
git clone https://github.com/your-username/project-name.git
```
**Step 2: Install Dependencies**

Navigate to the project directory and install the required dependencies using Composer:
```bash
composer install
```
**Step 3: Set Up Environment Variables**

Copy the `.env.example` file to `.env` and update the database settings to use SQLite:
```bash
cp .env.example .env
```
In the `.env` file, set `DB_CONNECTION` to `sqlite` and `DB_DATABASE` to the path where you want to store the SQLite database file.

**Step 4: Generate Application Key**

Generate a new application key using the following command:
```bash
php artisan key:generate
```
**Step 5: Run Migrations**

Run the migrations to set up the database schema:
```bash
php artisan migrate
```
**Step 6: Seed the Database (Optional)**

If you want to populate the database with some initial data, run the following command:
```bash
php artisan db:seed
```
**Step 7: Start the Development Server**

Start the development server using the following command:
```bash
php artisan serve
```
Open your web browser and navigate to `http://localhost:8000` to access the project.

That's it! You should now have the project set up and running on your local machine.

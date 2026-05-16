# TaskManager - Project Goal & Overview

## 🎯 Project Goal

Build a simple, secure, and user-friendly web application where authenticated users can manage their daily tasks. Each user can create, read, update, and delete their own tasks, mark them as complete or incomplete, and view them sorted by due date. The application demonstrates core Laravel concepts such as authentication, authorization (policies), CRUD operations, Eloquent ORM relationships, and CSRF protection.

---

## 📋 Features

- **User Authentication** – Register, login, logout (Laravel Breeze with Blade).
- **Task Management (CRUD)**  
  - Create a task (title, description, due date)  
  - Read (list all tasks for the logged‑in user)  
  - Update task details  
  - Delete a task  
- **Task Completion Toggle** – One‑click button to mark a task as done / undone.
- **Task Listing** – Tasks ordered by due date (earliest first); completed tasks are visually distinct (strikethrough / faded text).
- **Authorization** – Users can only edit or delete their own tasks (Laravel Policies).
- **CSRF Protection** – Every form includes a CSRF token (handled automatically by Laravel).
- **Responsive UI** – Clean, mobile‑friendly design using Tailwind CSS (provided by Breeze).

---

## 🧰 Technology Stack

| Category       | Technology                         |
|----------------|------------------------------------|
| Backend        | Laravel 13.x (PHP 8.4+)            |
| Frontend       | Blade templates, Tailwind CSS      |
| Authentication | Laravel Breeze (Blade stack)       |
| Database       | SQLite (development), MySQL (production optional) |
| Tools          | Composer, NPM, Vite                |

---

## 🗄️ Database Structure

**Table:** `tasks`

| Column         | Type                | Description                         |
|----------------|---------------------|-------------------------------------|
| id             | bigint (PK)         | Auto‑increment primary key          |
| user_id        | foreignId           | References `users.id` (cascade delete) |
| title          | string(255)         | Task title (required)               |
| description    | text (nullable)     | Optional task details               |
| due_date       | date (nullable)     | Optional deadline                   |
| is_completed   | boolean             | Default `false`                     |
| timestamps     | created_at, updated_at |                                   |

**Relationships**
- `User` has many `Task`s.
- `Task` belongs to one `User`.

---

## 🚀 What This Project Demonstrates

- Setting up a Laravel project with authentication (Breeze).
- Creating migrations, models, and a resource controller.
- Using Eloquent relationships (`hasMany`, `belongsTo`).
- Implementing validation and flash messages.
- Protecting routes with authentication middleware.
- Using Laravel Policies to restrict user actions.
- Working with Blade forms, `@csrf`, and HTTP methods (GET, POST, PUT/PATCH, DELETE).
- Compiling frontend assets with Vite.
- Organising code following MVC pattern.

---

## 📦 Future Improvements (Ideas)

- Add task categories / tags.
- Allow users to set priority (low, medium, high).
- Implement task search and filtering.
- Add pagination for large task lists.
- Send email reminders for tasks due soon.
- Attach files to tasks.
- Build an API with Laravel Sanctum for a mobile app.

---

## 🧪 How to Run the Project Locally

1. Clone the repository:  
   `git clone https://github.com/abirmehmed/TaskManager.git`
2. Install dependencies:  
   `composer install`  
   `npm install`
3. Create `.env` file:  
   `cp .env.example .env`
4. Generate application key:  
   `php artisan key:generate`
5. Set database (SQLite):  
   `touch database/database.sqlite`  
   Update `DB_CONNECTION=sqlite` in `.env`
6. Run migrations:  
   `php artisan migrate`
7. Compile assets:  
   `npm run build` (or `npm run dev` for hot reload)
8. Start server:  
   `php artisan serve`

Then visit `http://127.0.0.1:8000/register` to create an account.

---

## 📝 License

This project is open‑source and available under the [MIT License](LICENSE). 

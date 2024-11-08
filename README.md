# CRM Project - Sales Opportunity Management

This repository contains a CRM project built with Laravel for the backend and Vue.js for the frontend. The project includes modules for user management and sales opportunity management, designed to help users track and manage sales opportunities effectively.

## Getting Started

Follow the instructions below to set up and run the project locally.

### Prerequisites

- [PHP](https://www.php.net/downloads)
- [Composer](https://getcomposer.org/download/)
- [Node.js](https://nodejs.org/) (includes npm)

### Installation

1. **Clone the repository:**
   ```bash
   git clone https://github.com/your-username/your-repository.git
   cd your-repository
   ```

2. **Install PHP dependencies:**
   ```bash
   composer install
   ```

3. **Install JavaScript dependencies:**
   ```bash
   npm install
   ```

4. **Generate JWT Secret:**
   ```bash
   php artisan jwt:secret
   ```

5. **Run migrations and seed the database:**
   ```bash
   php artisan migrate:fresh
   php artisan module:seed OpportunitiesManagement
   php artisan module:seed UserManagement
   ```

6. **Cache configuration:**
   ```bash
   php artisan config:cache
   ```

7. **Clear optimization cache (if necessary):**
   ```bash
   php artisan optimize:clear
   ```

8. **Start the development server:**
   ```bash
   php artisan serve
   ```

9. **Run Vite to bundle assets( run in another terminal):**
   ```
   vite
   ```

### Additional Notes

- Make sure to set up your `.env` file with the correct database and environment configuration.
- You can customize the project configuration by modifying `.env` variables as needed.

### Usage

Once the server is running, you can access the application locally at `http://127.0.0.1:8000`.

default Users: 

```angular2html
Adminstrator:
userName: adminstrator
password: 123456

```

```angular2html
user:
userName: user
password: 123456
```

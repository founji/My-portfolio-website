# Professional Portfolio - Founji Idriss Nangatie

A high-end, responsive portfolio website built with PHP, HTML, CSS, and MySQL.

## Features
- **Modern Design**: Clean and professional aesthetic with glassmorphism.
- **Responsive**: Fully optimized for mobile and desktop.
- **Dark Mode**: Theme toggle for user preference.
- **Admin Dashboard**: Manage your projects easily.
- **Dynamic Content**: Projects are fetched from a MySQL database.

## Setup Instructions

1. **Prerequisites**:
   - Install a local server like **XAMPP** or **WAMP**.
   - Ensure **PHP** and **MySQL** are running.

2. **Database Setup**:
   - Open **phpMyAdmin**.
   - Create a new database named `portfolio_db`.
   - Import the `database.sql` file provided in the root directory.

3. **Configuration**:
   - Open `includes/db.php`.
   - Update the database credentials (default: `localhost`, `root`, `""`).

4. **Admin Access**:
   - Go to `http://localhost/your-project-folder/admin/`.
   - Default login:
     - **Username**: `admin`
     - **Password**: `admin123`
   - *Note: In a production environment, please secure the login with hashed passwords.*

## Folder Structure
- `admin/`: Admin dashboard and management pages.
- `assets/`: CSS, JS, and image assets.
- `includes/`: Reusable components and connection logic.
- `uploads/`: Directory for uploaded project images.
- `index.php`: Home page.

## Credits
Built for Founji Idriss Nangatie.
